<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_name",
        "client_id",
        'is_paid'
    ];

    /**
     * Get the client associated with the Vente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    /**
     * Get all of the lignes for the Vente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lignes(): HasMany
    {
        return $this->hasMany(Ligne_vente::class, 'vente_id', 'id');
    }
}
