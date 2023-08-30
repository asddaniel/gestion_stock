<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Approvisionnement;
use App\Models\Vente;
use App\Models\Ligne_vente;

class MainController extends Controller
{
    //
    public function home(){
        return view("index", ["produits"=>Produit::all(), "approvisionnement"=>Approvisionnement::all(), "ventes"=>Ligne_vente::all()]);
    }
}
