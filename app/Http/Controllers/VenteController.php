<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Ligne_vente;
use App\Http\Requests\StoreVenteRequest;
use App\Http\Requests\UpdateVenteRequest;
use App\Models\Payement;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventes.index', ["ventes"=>Vente::all(), "clients"=>Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenteRequest $request)
    {
        Vente::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {    $produits = Produit::all();
        $lignes_ventes  = Ligne_vente::where('vente_id', $vente->id)->get();
        $ventes = $vente;
        return view("ventes.show", compact('ventes', 'produits', 'lignes_ventes'));
    }
    public function payer(Vente $vente){
        $montant = 0;
        // dd($vente);
        foreach ($vente->lignes as $ligne) {
            $montant += $ligne->quantite * $ligne->produit->prix;
        }
        $payement = Payement::create([
            'client_id' => $vente->client_id,
            'montant' => $montant
        ]);
        $vente->update(['is_paid' => 1]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenteRequest $request, Vente $vente)
    {
        $vente->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        $vente->delete();
        // dd($vente);
        return redirect()->back();
    }
}
