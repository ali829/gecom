<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
Use Alert;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index',[
            'title'     => 'Fournisseurs',
            'suppliers' => Supplier::paginate(5),
        ]);
    }

    public function create()
    {
        return view('suppliers.create',[
            'title'         => 'Nouveau Fournisseur',
            'form_action'   => route('supplier.store'),
        ]);
    }

    public function store(Request $request)
    {
        Supplier::create($request->all());
        Alert::success('Succès ', 'Ajout effectué.')->toToast();
        return redirect()->route('supplier.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.create',[
            'title'         => 'Modifier Fournisseur',
            'supplier'      => $supplier,
            'form_action'   => route('supplier.update',$supplier),
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('supplier.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }
}
