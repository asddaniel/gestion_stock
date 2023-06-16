<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Approvisionnement extends Model
{
    use HasFactory;
    protected $fillable = [
        "produit_id",
        "quantite",
        "prix_achat"
    ];

    /**
     * Get the produit associated with the Approvisionnement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produit(): HasOne
    {
        return $this->hasOne(Produit::class, 'id', 'produit_id');
    }
}
