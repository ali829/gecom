<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Product;
use App\Shipper;
use App\Entrepot;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\addShipperRequest;
use Alert;
use App\Notifications\ProductAvertissment;
use App\Rules\quantiteRole;
use Illuminate\Http\Request;

class pivotController extends Controller
{
    public function showshippers($id)
    {
        return view('products.showshippers', [
            'shippers' => Product::findOrFail($id)->shippers()->paginate(8),
            'title' => 'list des livreur du produit',
            'id' => $id
        ]);
    }

    public function addshipper($id)
    {
        return view('products.assignshipper', [
            'product' => Product::findOrFail($id),
            'shippers' => Shipper::all(),
            'title' => 'ajouter un livreur au produit'
        ]);
    }

    public function assignShipper($id, addShipperRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->shippers()->attach(Shipper::findOrFail($request->get('shipper_id')));
        Alert::success('Succès', 'shipper assigned succesfully')->toToast();
        return redirect()->action(
            'pivotController@showshippers',
            ['id' => $product->id]
        );
    }

    public function deleteShipper($pid, $sid)
    {
        $product = Product::findOrFail($pid);
        $product->shippers()->detach($sid);
        Alert::success('Succès', 'shipper deletd succefully')->toToast();
        return redirect()->action(
            'pivotController@showshippers',
            ['id' => $product->id]
        );
    }

    public function showentrepots($id)
    {
        return view('products.showEnt', [
            'entrepots' => Product::findOrFail($id)->entrepots()->paginate(8),
            'title' => 'list des entrepots du produit',
            'id' => $id
        ]);
    }
    public function addentrepot($id)
    {
        return view('products.assignEnt', [
            'product' => Product::findOrFail($id),
            'entrepots' => Entrepot::all(),
            'title' => 'ajouter un entrepot au produit'
        ]);
    }

    public function assignentrepot($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entrepot_id' => 'required|integer',
                'quantite' => 'required|integer',
                'avert' => 'required|integer'
            ],
            [
                'quantite.required' => 'la quantite est requise',
                'entrepot_id.required' => 'la quantite est requise',
                'avert.required' => 'l\'avertissement est requise',
                'quantite.integer' => 'la quantite n\'est pas valide',
                'avert.integer' => 'l\'avertissement n\'est pas valid',
                'entrepot_id.integer' => 'l\'entrepot n\'est pas valid'
            ]
        )->validate();
        $ent = Entrepot::findOrFail($request->get('entrepot_id'));
        $product = Product::findOrFail($id);
        $quantite = $request->get('quantite');
        $avert = $request->get('avert');
        $product->entrepots()->save($ent, ['quantite' => $quantite, 'avert' => $avert]);
        Alert::success('Succès', 'l\'entrepot a etait ajoutee au produit')->toToast();
        return redirect()->route('product.showEntrepots', $id);
    }

    public function dettachEntrepot($id, $pid)
    {
        $product = Product::findOrFail($id);
        $product->entrepots()->newPivotStatement()
            ->where('id', $pid)->delete();
        Alert::success('Succès', 'l entrepot est supprime')->toToast();
        return redirect()->route('product.showEntrepots', $id);
    }

    //show products for a entrepot
    public function showproducts($id)
    {
        return view('entrepot.showProducts', [
            'products' => Entrepot::findOrFail($id)->products()->paginate(8),
            'entrepots' => Entrepot::all()->except($id),
            'title' => 'list des produits d\'entrepot ',
            'id' => $id,
            'ent' => Entrepot::findOrFail($id)
        ]);
    }
    public function transfer(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'entrepot_id' => 'required|integer',
                'product_id' => 'required|integer',
                'entrepotdist_id' => 'required|integer',
                'or_quantite'=>'required|integer',
                'quantite'=>['required','integer',new quantiteRole($request->all())]
            ],
            [
                'entrepot_id.required'=>'veulliez selectioner un entrepot',
                'entrepot_id.integer'=>'invalid data',
                'entrepotdist_id.required'=>'veulliez selectioner un entrepot',
                'entrepotdist_id.integer'=>'invalid data',
                'product_id.required'=>'veulliez selectioner un produit',
                'product_id.integer'=>'invalid data',
                'quantite.required'=>'la quantite est requise',
                'quantite.integer'=>'invalid data'
            ]
        )->validate();
        $pro=Product::findOrFail($request->get('product_id'));
        $ent=Entrepot::findOrFail($request->get('entrepot_id'));
        //product original avertissment
        $p_o_a=Entrepot::findOrFail($request->get('entrepot_id'))->
        products()->where('product_id',$request->get('product_id'))->first()->pivot->avert;
        //product original quantite
        $p_o_q= Entrepot::findOrFail($request->get('entrepot_id'))->
        products()->where('product_id',$request->get('product_id'))->first()->pivot->quantite;
        //verification si l entrepot de destination a deja le produit
        if(Entrepot::findOrFail($request->get('entrepotdist_id'))
        ->products()->where('product_id',$request
        ->get('product_id'))->exists()){
             //product distinataire quantite
        $p_d_q=Entrepot::findOrFail($request->get('entrepotdist_id'))->
        products()->where('product_id',$request->get('product_id'))->first()->pivot->quantite;
            //product distinataire avertissment
            $p_d_a=Entrepot::findOrFail($request->get('entrepotdist_id'))->
            products()->where('product_id',$request->get('product_id'))->first()->pivot->avert;
            //ajouter la quantite au entrepot de destination notice the avert
            Entrepot::findOrNew($request->get('entrepotdist_id'))
            ->products()->where('product_id',$request->get('product_id'))->update(['quantite'=>$p_d_q+$request->get('quantite'),'avert'=>$p_d_a]);
            // qte -- from entrepot parent  
            Entrepot::findOrNew($request->get('entrepot_id'))
        ->products()->where('product_id',$request->get('product_id'))->update(['quantite'=>$p_o_q-$request->get('quantite'),'avert'=>$p_o_a]);
            //lancer une notification 
             if( ($p_o_q-$request->get('quantite')) <= $p_o_a){
                $admin=Admin::find(1);
                $admin->notify(new ProductAvertissment($pro,$ent));
                //auth()->user()->notify(new ProductAvertissment($pro,$ent));
            } 
            Alert::success('Succès', 'le produit est transferer')->toToast();
        }
        else{
            Entrepot::findOrNew($request->get('entrepotdist_id'))
            ->products()->save($pro,['quantite'=>$request->get('quantite'),'avert'=>$p_o_a]);
            Entrepot::findOrNew($request->get('entrepot_id'))
            ->products()->where('product_id',$request->get('product_id'))->update(['quantite'=>$p_o_q-$request->get('quantite'),'avert'=>$p_o_a]);
             if(($p_o_q-$request->get('quantite')) <= $p_o_a){
                $admin=Admin::find(1);
                $admin->notify(new ProductAvertissment($pro,$ent));
            } 
            Alert::success('Succès', 'le produit est transferer')->toToast();
        }
        return Redirect()->route('entrepot.showProducts',$request->get('entrepot_id'));
    }

    public function dettachpro($entrepotId,$productId)
    {
        Entrepot::findOrFail($entrepotId)->products()->where('id',$productId)->detach();
        Alert::success('Succès', 'le produit est retirer')->toToast();
        return Redirect()->route('entrepot.showProducts',$entrepotId);
    }
}
