<?php

namespace App\Http\Controllers;

use App\Entrepot;
use App\Destination;
use App\Http\Requests\entrepotRequest;
Use Alert;

class EntrepotController extends Controller
{
    public function index()
    {
        return view('entrepot.index', [
            'title'     => 'Entrepôts',
            'entrepots' =>  Entrepot::paginate(5),
        ]);
    }

    public function create()
    {
        return view('entrepot.create',[
            'title'        => 'Nouveau Entropôt',
            'destinations' =>  Destination::all(),
            'form_action'  =>  route('entrepot.store')
        ]);
    }

    public function store(entrepotRequest $request)
    {
        Entrepot::create($request->all());
        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('entrepot.index');
    }

    public function edit(Entrepot $entrepot)
    {
        return view('entrepot.create',[
            'title'        => 'Modifier Entrepôt',
            'entrepot'     =>  $entrepot,
            'destinations' =>  Destination::all(),
            'form_action'  =>  route('entrepot.update',$entrepot)
        ]);
    }

    public function update(entrepotRequest $request, Entrepot $entrepot)
    {
        $entrepot->update($request->all());
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('entrepot.index');
    }

    public function destroy(Entrepot $entrepot)
    {
        $entrepot->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }
}
