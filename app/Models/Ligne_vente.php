<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_vente extends Model
{
    use HasFactory;
    protected $fillable = [
            "vente_id",
            "produit_id",
            "quantite"
    ];
}
