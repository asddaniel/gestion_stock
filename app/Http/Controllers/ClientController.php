<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', ["clients"=>Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $dettes = 0;
        foreach ($client->ventes as  $vente) {
           // print_r($vente->produit->prix??0);
           foreach ($vente->lignes as $ligne) {
            $dettes+= ($ligne->produit->prix??0)*$ligne->quantite;
           }

        }
        //dd( (object)$client->payements->toArray());
        $payements = 0;
        foreach ($client->payements as $payement) {
             $payements+=$payement->montant;
        }



        return view("clients.show", ["client"=>$client, "dettes"=>$dettes, "payements"=>$payements]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
