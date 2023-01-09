<?php

namespace App\Http\Controllers;
use App\Product;
use App\Categorie;
use App\Order;
use Illuminate\Http\Request;
use App\Admin;
use App\Notifications\OrderAvertissment;
Use Session;
use App\Destination;
use App\PaymentMethod;

class FrontController extends Controller
{
    public function index()
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/landing",
            "front/default/landing"
        ], [
            'categories' => Categorie::with('children')->get(),
            'products' => Product::all()
        ]);
    }

    public function show_categorie($categorie_id)
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/categorie-products",
            "front/default/categorie-products"
        ], [
            'products' => Categorie::findOrFail($categorie_id)->products()->paginate(5),
            'childrens' => Categorie::findOrFail($categorie_id)->children,
            'categories' => Categorie::all(),
        ]);
    }

    public function categories()
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/categories",
            "front/default/categories"
        ], [
            'categorie' => Categorie::all(),
            'products' => Product::all(),
        ]);
    }

    public function show_product($id)
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/products",
            "front/default/products"
        ], [
            'product' => Product::findOrFail($id),
            'products'=>Product::all(),
            'categories'=>Categorie::all()
        ]);
    }

    public function validation($id)
    {
        if(Session::has('cart.items')){
            $items = Session::get('cart.items');

            for($i=0; $i<count($items); $i++){
                if($items[$i]['id'] == $id){
                    return redirect()->route('front.cart');
                }
            }
        }

        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/validation",
            "front/default/validation"
        ], [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function cart()
    {
        $items = [];
        $total = 0;

        if(Session::has('cart.items')){
            $items = Session::get('cart.items');

            for($i=0; $i<count($items); $i++){
                $total += $items[$i]['qte'] * $items[$i]['price'];
                $items[$i]['product'] = Product::findOrFail($items[$i]['id']);
            }
        }

        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/cart",
            "front/default/cart"
        ], [
            'items' => $items,
            'total' => $total
        ]);
    }

    public function cnx()
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/cnx",
            "front/default/cnx"
        ]);
    }

    public function contactus()
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/contactus",
            "front/default/contactus"
        ]);
    }

    public function order_1()
    {
        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/order-step1",
            "front/default/order-step1"
        ]);
    }

    public function order_2($id)
    {
        $cmd = Order::findOrFail($id);

        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/order-step2",
            "front/default/order-step2"
        ],[
            'order'=>$cmd,
            'destinations' => Destination::all()
        ]);
    }

    public function order_3($id)
    {
        $cmd = Order::findOrFail($id);

        $theme = resolve('theme');

        return view()->first([
            "front/{$theme}/order-step3",
            "front/default/order-step3"
        ],[
            'order'=>$cmd,
            'methods'=>PaymentMethod::all()
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $qte= $request->get('qte') ?? 1 ;
        $product_found = false;
        $new_cart = array_map(function($x) use ($product, &$product_found, $qte) {
            if ($x['id'] == $product->id){
                $product_found = true;
                return [
                    'id' => $product->id,
                    'name'=> $product->name,
                    'qte' => $qte,
                    'price' => $product->price
                ];
            }
            return $x;
        }, $request->session()->get('cart.items', []));

        if(!$product_found){
            $new_cart[] = [
                'id' => $product->id,
                'name'=> $product->name,
                'qte' => $qte,
                'price'=> $product->price
            ];
        }

        $request->session()->put('cart.items', $new_cart);

        $total = 0;
        $items = Session::get('cart.items');

        for($i=0; $i<count($items); $i++){
            $total += $items[$i]['qte'] * $items[$i]['price'];
        }

        if($request->ajax()){
            return ['product' => $product, 'total' => $total];
        }

        return redirect()->route('front.cart');
    }

    public function removeItem($id)
    {
        $new_cart = array_filter(request()->session()->get('cart.items', []), function($x) use ($id) {
            return $x['id'] != $id;
        });

        session()->put('cart.items', $new_cart);
        return redirect()->route('front.cart');
    }

    public function convert_cart(Request $req)
    {
        $req->validate([
            'nom'=>'required|string',
            'email'=>'required|string',
            'tel'=>'required|min:10,max:14'
        ]);

        $products=session()->get('cart.items');
        $nom=$req->get('nom');
        $email=$req->get('email');
        $tel=$req->get('tel');

        $cmd=Order::create([
            'shipping_name' => $nom,
            'shipping_phone' => $tel,
            'shipping_email' => $email,
            'is_quote' => false,
            'shipper_id' => 1,
        ]);

        foreach($products as $pro){
            $cmd->products()->attach($pro['id'],['qte'=>$pro['qte'],'original_price'=>$pro['price'],'remise'=>0]);
        }

        $admin=Admin::find(1);
        $admin->notify(new OrderAvertissment($cmd));

        return redirect()->route('front.order-step2',$cmd->id);
    }

    public function order_2_shippingInfo(Request $req,$id)
    {
        $cmd=Order::findOrFail($id);
        $cmd->shipping_address=$req->get('shipping_address');
        $cmd->destination_id=$req->get('destination_id');
        $cmd->save();

        return redirect()->route('front.order-step3', $cmd->id);
    }

    public function order_3_paymentInfo(Request $req,$id)
    {
        $cmd=Order::findOrFail($id);
        $cmd->payment_method=$req->get('method_id');
        $cmd->is_validated=true;
        $cmd->save();
        session()->put('cart.items', []);
        return redirect()->route('home');
    }
}
