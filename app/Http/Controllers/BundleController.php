<?php

namespace App\Http\Controllers;

use Alert;
use App\Bundle;
use App\Product;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index()
    {
        return view('bundles.index', [
            'title' => 'les packes',
            'bundles' => Bundle::paginate(5),
        ]);
    }

    public function create()
    {
        return view('bundles.create', [
            'title' => 'nouveau pack',
            'products' => Product::with('variantes')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'discount' => 'required|numeric|between:0,99.99',
            "products" => "required|array|min:2|max:3",
        ]);
        $name = $request->get('name');
        $discount = $request->get('discount');
        $products = $request->get('products');
        $bundle = Bundle::create(['name' => $name, 'discount' => $discount]);
        $bundle->products()->sync($products);
        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('bundle.index');
    }

    public function edit($id)
    {
        $bundle = Bundle::findOrFail($id);

        return view('bundles.create', [
            'bundle' => $bundle,
            'title' => 'Modifier un pack',
            'form_action' => route('bundle.update', $id),
            'bundle_products' => $bundle->products,
        ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'discount' => 'required|numeric|between:0,99.99',
            "products" => "required|array|min:2|max:3",
        ]);
        $data = $request->only('name', 'discount');
        $products = $request->get('products');
        $bundle = Bundle::findOrFail($id);
        $bundle->update($data);
        $bundle->products()->sync($products);
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('bundle.index');
    }

    public function destroy($id)
    {
        $bundle = Bundle::findOrFail($id);
        $bundle->products()->sync([]);
        $bundle->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }
}
