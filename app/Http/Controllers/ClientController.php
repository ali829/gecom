<?php

namespace App\Http\Controllers;

use Alert;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\clientRequest;

class ClientController extends Controller
{

    public function index()
    {
        return view('clients.index',[
            'title'     => 'Clients',
            'clients'   => Client::paginate(5),
        ]);
    }


    public function create()
    {
        return view('clients.create',[
            'title'         => 'Créer nouveau client',
            'form_action'   => route('client.store')
        ]);
    }


    public function store(clientRequest $request)
    {
        Client::create($request->all());
        Alert::success('Succès ', 'Ajout effectué.')->toToast();
        return redirect()->route('client.index');
    }

    public function edit(Client $client)
    {
        return view('clients.create',[
            'title'         =>'modifier client',
            'client'        =>$client,
            'form_action'   =>route('client.update',$client)
        ]);
    }


    public function update(clientRequest $request, Client $client)
    {
        $client->update($request->all());
        Alert::success('Succès', 'Modification effectuée.')->toToast();
        return redirect()->route('client.index');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        Alert::success('Succès', 'Suppression effectuée.')->toToast();
        return redirect()->back();
    }

    public function getClients(){
        $search = request()->search;

        if($search == ''){
           $clients = Client::orderby('nom','asc')->select('id','nom','prenom','tel','adresse')->limit(5)->get();
        }else{
           $clients = Client::orderby('nom','asc')->select('id','nom','prenom','tel','adresse')->where('nom', 'like', '%' .$search . '%')->orWhere('prenom', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = [];

        foreach($clients as $client){
           $response[] = [
                "id"     => $client->id,
                "nom"    => $client->nom,
                "prenom" => $client->prenom,
                "tel"    => $client->tel,
                "adress" => $client->adresse
           ];
        }

        return $response;
    }
}
