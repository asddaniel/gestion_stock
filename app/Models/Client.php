<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ["name", 'uid'];

    /**
     * Get all of the ventes for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventes(): HasMany
    {
        return $this->hasMany(Vente::class);
    }
    /**
     * Get all of the payement for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payements(): HasMany
    {
        return $this->hasMany(Payement::class, 'client_id', 'id');
    }
}
