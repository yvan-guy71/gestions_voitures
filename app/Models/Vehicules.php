<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicules extends Model
{
    protected $table = 'vehicules';

    protected $fillable = [
        'immatriculation',
        'marque',
        'modele',
        'couleur',
        'annee',
        'kilometrage',
        'carrosserie',
        'energie',
        'boite',
    ];

    /**
     * Relation avec les réparations
     */
    public function reparations(): HasMany
    {
        return $this->hasMany(Reparations::class, 'vehicule_id');
    }
}
