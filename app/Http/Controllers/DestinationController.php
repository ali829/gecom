<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Http\Requests\destinationRequest;
use Alert;

class DestinationController extends Controller
{
    public function index()
    {
        return view('destinations.index',[
                'destinations' => Destination::paginate(5),
                'title'        => 'Destinations de livraison'
            ]
        );
    }

    public function create()
    {
        return view('destinations.create',[
                'title'       => 'Nouvelle destination',
                'form_action' =>  route('destination.store')
            ]
        );
    }

    public function store(destinationRequest $request)
    {
        Destination::create($request->all());
        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('destination.index');
    }

    public function edit($id)
    {
     return view('destinations.create',[
                'destination'  =>  Destination::findOrFail($id),
                'title'        => 'Modifier destination',
                'form_action'  =>  route('destination.update',$id)
            ]
        );
    }

    public function update(destinationRequest $request, $id)
    {
        $data=$request->all();
        Destination::findOrFail($id)->update($data);
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('destination.index');
    }

    public function destroy($id)
    {
        $dist=Destination::find($id);
        $dist->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }
}
