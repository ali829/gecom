<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categorie;
use App\Http\Requests\productRequest;
Use Alert;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index',[
            'products' =>  Product::paginate(5),
            'title'    => 'Produits'
        ]);
    }

    public function create()
    {
        return view('products.create',[
            'categories'    => Categorie::all(),
            'title'         => 'nouveau produit',
            'form_action'   =>  route('product.store')
        ]);
    }

    public function store(productRequest $request)
    {

        $data = $request->except(['image_ids', 'hasVariants', 'variants']);

        $variantes = json_decode($request->variants);

        if($request->hasVariants === 'true'){
            $data['options'] = $variantes->options;
        }else{
            $data['options'] = 'default';
        }

        $product = Product::create($data);

        foreach(explode("|", $request->image_ids) as $img_id){
            if($img_id != ""){
                $product->images()->attach($img_id);
            }
        }

        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        return view('products.create',[
            'product'       =>  Product::findOrFail($id),
            'categories'    =>  Categorie::all(),
            'title'         => 'modifier produit',
            'form_action'   =>  route('product.update',$id)
        ]);
    }

    public function update(productRequest $request, $id)
    {
        $data = $request->except('image_ids');
        $product = Product::findOrFail($id);

        $product->update($data);
        $product->images()->detach();

        foreach(explode("|", $request->image_ids) as $img_id){
            if($img_id != ""){
                $product->images()->attach($img_id);
            }
        }

        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $pro=Product::find($id);
        $pro->shippers()->detach();
        $pro->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }

    public function getProducts(){
        $search = request()->search;

        if($search == ''){
           $products = Product::orderby('name','asc')->select('id','name','price','ref')->limit(5)->get();
        }else{
           $products = Product::orderby('name','asc')->select('id','name','price','ref')->where('name', 'like', '%' .$search . '%')->orWhere('ref', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = [];

        foreach($products as $product){
           $response[] = [
                "id"    => $product->id,
                "text"  => $product->name,
                "prix"  => $product->price
           ];
        }

        return $response;
    }
    public function getProductPrix($id){
        $prix=Product::findOrFail($id)->price;
        return response()->json(array('success' => true, 'prix' => $prix));
    }

}
