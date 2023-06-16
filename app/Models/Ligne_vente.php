<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ligne_vente extends Model
{
    use HasFactory;
    protected $fillable = [
            "vente_id",
            "produit_id",
            "quantite"
    ];
    /**
     * Get the produit associated with the Ligne_vente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produit(): HasOne
    {
        return $this->hasOne(Produit::class, 'id', 'produit_id');
    }

    /**
     * Get the vente associated with the Ligne_vente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vente(): HasOne
    {
        return $this->hasOne(Vente::class, 'id', 'vente_id');
    }
}
