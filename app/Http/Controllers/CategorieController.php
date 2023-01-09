<?php

namespace App\Http\Controllers;

use App\Categorie;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\categorieRequest;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::where('parent_id', null)->paginate(5);

        return view('categories.index', [
            'categories' => $categories,
            'title'      => 'Catégories',
            'sous'       => false,
            'parent'     => null
        ]);
    }

    function list_sub($id){
        $parent = Categorie::find($id);
        $categories = Categorie::where('parent_id', $id)->paginate(5);

        return view('categories.index', [
            'categories' => $categories,
            'title'      => $parent->nom,
            'sous'       => true,
            'parent'     => $parent
        ]);
    }

    public function create_sub($id){
        $categorie = new Categorie;
        $categorie->parent_id = $id;

        return view('categories.create', [
            'categorie'   => $categorie,
            'title'       => 'Nouvelle sous-catégorie',
            'form_action' => route('categorie.store')
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'title'       => 'Nouvelle Catégorie',
            'form_action' => route('categorie.store')
        ]);
    }

    public function store(categorieRequest $request)
    {
        $categorie = Categorie::create($request->except('image_ids'));

        foreach(explode("|", $request->image_ids) as $img_id){
            $categorie->image_id = empty($img_id)?null:$img_id;
        }

        $categorie->save();

        Alert::success('Succès ', 'Ajout effectué.')->toToast();
        return redirect()->route('categorie.index');
    }

    public function edit(Categorie $categorie)
    {
        return view('categories.create', [
            'categorie'   => $categorie,
            'title'       => 'Modifier Catégorie',
            'form_action' => route('categorie.update', $categorie)
        ]);
    }

    public function update(categorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->except('image_ids'));

        foreach(explode("|", $request->image_ids) as $img_id){
            $categorie->image_id = empty($img_id)?null:$img_id;
        }

        $categorie->save();

        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('categorie.index');
    }

    public function destroy(Categorie $categorie)
    {
        if($categorie->products->count() == 0 &&  $categorie->children->count() == 0){
            $categorie->delete();
            Alert::success('Succès', 'Suppression effectuée.')->toToast();
        }
        else{
            Alert::warning('Avertissement', 'Catégorie non vide.');
        }
        return redirect()->back();
    }
}
