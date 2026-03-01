<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;

class Fonction extends Model
{
    protected $primaryKey = 'id_fonction';

    protected $fillable = [
        'libelle'
    ];

    public function personnes()
    {
        return $this->belongsToMany(
            Personne::class,
            'affectations',
            'id_fonction',
            'id_personne'
        )->withPivot('date_debut', 'date_fin')
         ->withTimestamps();
    }
}

