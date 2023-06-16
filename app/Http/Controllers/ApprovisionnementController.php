<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Http\Requests\StoreApprovisionnementRequest;
use App\Http\Requests\UpdateApprovisionnementRequest;
use App\Models\Produit;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("approvisionnements.index", ["approvisionnements"=>Approvisionnement::all(), "produits"=>Produit::all()]);
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
    public function store(StoreApprovisionnementRequest $request)
    {
       $app =  Approvisionnement::create($request->validated());
       $app->produit->update(["quantite"=>$app->produit->quantite+$app->quantite]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovisionnementRequest $request, Approvisionnement $approvisionnement)
    {
        $approvisionnement->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approvisionnement $approvisionnement)
    {
        $approvisionnement->delete();
        return redirect()->back();
    }
}
