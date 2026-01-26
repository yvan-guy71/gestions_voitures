<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reparations extends Model
{
    protected $table = 'reparations';

    protected $fillable = [
        'vehicule_id',
        'technicien_id',
        'date',
        'duree_main_oeuvre',
        'objet_reparation',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Relation avec le véhicule
     */
    public function vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicules::class, 'vehicule_id');
    }

    /**
     * Relation avec le technicien
     */
    public function technicien(): BelongsTo
    {
        return $this->belongsTo(Techniciens::class, 'technicien_id');
    }
}
