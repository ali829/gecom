<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        return view('promotions.index',[
            'title'      => 'promotions',
            'promotions' =>  Promotion::paginate(5)
        ]);
    }

    public function create()
    {
        return view('Promotions.create',[
            'title'         => 'creer une promotions',
            'form_action'   =>  route('promotion.store')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string',
            'discount'          => 'decimal|required',
            'start_date'        => 'date|required',
            'end_date'          => 'date|required',
            'end_date'          => 'date|required',
            'promotionable_id'  => 'integer|required',
            'promotionable_type'=> 'required|string',
        ]);
        Promotion::create($request->all());
        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('promotions.index');
    }

    public function edit(Promotion $promotion)
    {
        return view('promotions.edit',[
            'title'     => 'modifier une promotion',
            'promotion' =>  $promotion,
        ]);
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'name'               => 'required|string',
            'discount'           => 'decimal|required',
            'start_date'         => 'date|required',
            'end_date'           => 'date|required',
            'end_date'           => 'date|required',
            'promotionable_id'   => 'integer|required',
            'promotionable_type' => 'required|string',
        ]);
        $promotion->update($request->all());
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }
}
