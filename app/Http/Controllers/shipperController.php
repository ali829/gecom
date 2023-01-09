<?php

namespace App\Http\Controllers;

use Alert;
use App\Destination;
use App\Http\Requests\shipperRequest;
use App\Shipper;

class ShipperController extends Controller
{
    public function index()
    {
        return view('shippers.index', [
            'shippers' => Shipper::paginate(5),
            'title' => 'livreurs',
        ]);
    }

    public function create()
    {
        return view('shippers.create', [
            'title' => 'Nouveau livreur',
            'form_action' => route('shipper.store'),
        ]);
    }

    public function store(shipperRequest $request)
    {
        Shipper::create($request->all());
        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('shipper.index');
    }

    public function edit($id)
    {
        return view('shippers.create', [
            'shipper' => Shipper::findOrFail($id),
            'title' => 'Modifier livreur',
            'form_action' => route('shipper.update', $id),
        ]);
    }

    public function update(shipperRequest $request, $id)
    {
        $data = $request->all();
        $shipper = Shipper::findOrFail($id);
        $shipper->update($data);
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('shipper.index');
    }

    public function destroy($id)
    {
        Shipper::findOrFail($id)->delete();
        Alert::success('Succès ', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }

    public function show_pricing($id)
    {
        return view('shippers.pricing', [
            'title' => 'Pricing',
            'shipper' => Shipper::where('id', $id)->with('shipment_ranges.destinations')->first(),
            'destinations' => Destination::all(),
        ]);
    }
}
