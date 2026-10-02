<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'immatriculation',
        'annee',
        'couleur',
        'carburant',
        'transmission',
        'nombre_places',
        'prix_par_jour',
        'disponible',
        'image',
        'description',
    ];

    protected $casts = [
        'disponible' => 'boolean',
        'prix_par_jour' => 'decimal:2',
    ];

public function reservations()
{
    return $this->hasMany(Reservation::class);
}
}
