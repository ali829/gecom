<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Destination;
use App\Shipper;
use App\Product;
use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{

    public function index()
    {
        return view('orders.index',[
            'title' => 'Commandes',
            'orders' => Order::orderBy('created_at','desc')->paginate(8),
        ]);
    }
    public function createSpecified(Client $client=null)
    {   
        if(!$client){
            return view('orders.createSpecified',[
                'title'=>'creer une commande',
                'clients'=>Client::all(),
                'destinations'=>Destination::all(),
                'payments'=>PaymentMethod::all(),
                'shippers'=>Shipper::all(),
                'products'=>Product::whereVisible(1),
                'form_action'=>route('order.store')
            ]);
        }
        else{
            return view('orders.createSpecified',[
                'title'=>'creer une commande',
                'client'=>$client,
                'destinations'=>Destination::all(),
                'payments'=>['espece','m1','m2'],
                'shippers'=>Shipper::all(),
                'products'=>Product::whereVisible(1),
                'form_action'=>route('order.store')
            ]);
        }
           
                
            
    }

    public function show(Order $order)
    {
        return view('orders.show',[
            'title' => 'commande details',
            'order' => $order,
            'shipper'=>Shipper::findOrFail($order->shipper_id)
        ]);
    }

    public function edit(Order $order)
    {
        return view('orders.update',[
            'title' => 'Modifier un devis',
            'order' => $order,
            'shipper'=>Shipper::findOrFail($order->shipper_id)
        ]);
    }

    public function update(Request $request,$order_id)
    {
        $order=Order::findOrFail($order_id);
        $is_quote=$request->has('is_quote');
        $order->is_quote=$is_quote;
        $order->save();
        $order->products()->sync([]);
        $products=$request->get('products');
        if ($products) {    
            foreach($products as $pro){
                $order->products()->attach($pro[0],['qte'=>$pro[2],'original_price'=>(float)$pro[4],'remise'=>(float)$pro[3]]);
            }
        }
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function createOrder(OrderRequest $request){

        $products=$request->get('products');
        $client_id=$request->get('client_id');
        $shipping_name=$request->get('shipping_name');
        $shipping_address=$request->get('shipping_address');
        $shipping_phone=$request->get('shipping_phone');
        $payment_method=$request->get('payment_method');
        $is_quote=$request->has('is_quote');
        $shipper_id=$request->get('shipper_id');
        $destination_id=$request->get('destination_id');
        $email=$request->get('email') ?? null;
        $sucsess=false;
        $cmd=new Order;
        $cmd->shipping_name=$shipping_name;
        $cmd->shipping_address=$shipping_address;
        $cmd->shipping_email=$email;
        $cmd->shipping_phone=$shipping_phone;
        $cmd->payment_method=$payment_method;
        $cmd->is_quote=$is_quote;
        $cmd->is_validated=true;
        $cmd->client_id=$client_id;
        $cmd->destination_id=$destination_id;
        $cmd->shipper_id=$shipper_id;
        $cmd->save();
        $ranges=Shipper::find($cmd->shipper_id)->shipment_ranges;
        $total_weight=0;
        $shippingPrice=0;
        if ($products) {    
            foreach($products as $pro){
                $shipped_pro=Product::find($pro[0]);
                $total_weight+=($shipped_pro->weight*(int)$pro[2]);
                $cmd->products()->attach($pro[0],['qte'=>$pro[2],'original_price'=>(float)$pro[4],'remise'=>(float)$pro[3]]);
            }
        }
        $range_found=false;
        foreach ($ranges as $range) {
            $rmn=$range->min_weight*1000;
            $rmx=$range->max_weight*1000;
           // dd(($range->max_weight)*1000 >= $shipped_pro->weight && ($range->max_weight)*1000 < $shipped_pro->weight);
           if( $total_weight < $rmx && $total_weight >= $rmn ){
            $range_found=true;
            $shippingPrice=$range->destinations()->where('destination_id',$cmd->destination_id)->first()->pivot->price;
           }
        }
        if($range_found){
            $cmd->shipping_price=$shippingPrice;
            $cmd->save();
        }
        else{
            $cmd->products()->sync([]);
            $cmd->delete();
            return response()->json(['error' => 'veulliez choisir un autre livreur','weight'=> $total_weight], 422);
            
        }
        
         return response()->json(['success'=>'Got Simple Ajax Request.']);
     }
}
