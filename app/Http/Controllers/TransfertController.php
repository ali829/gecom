<?php

namespace App\Http\Controllers;

use App\Entrepot;
use App\Product;
use App\Transfert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransfertController extends Controller
{
    public function index()
    {
        return view('transferts.index', [
            'transferts' => Transfert::paginate(5),
            'title' => 'Transferts',
        ]);
    }

    public function create()
    {
        return view('transferts.create', [
            'entrepots' => Entrepot::with('variantes')->get(),
            'products' => Product::all(),
            'title' => 'Nouveau Transfert',
        ]);
    }

    public function show(Transfert $transfert){
        // TODO
        return 'TODO';
    }

    public function store(Request $request)
    {
        $data = json_decode($request->data);

        $transfert = Transfert::create([
            'origine_id' => $data->origin,
            'destination_id' => $data->destination,
            'date' => Carbon::now(),
        ]);

        foreach ($data->transfers as $transfer) {
            if($transfer->qte > 0){
                $transfert->variantes()->attach($transfer->variante, ['qte' => $transfer->qte]);
            }
        }

        Alert::success('Succès', 'Ajout effectué.')->toToast();
        return redirect()->route('transfert.index');
    }
}
