<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Techniciens extends Model
{
    protected $table = 'techniciens';

    protected $fillable = [
        'nom',
        'prenom',
        'specialite',
    ];

    /**
     * Relation avec les réparations
     */
    public function reparations(): HasMany
    {
        return $this->hasMany(Reparations::class, 'technicien_id');
    }
}
