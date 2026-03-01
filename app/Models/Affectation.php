<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;
use App\Models\Fonction;

class Affectation extends Model
{
    protected $primaryKey = 'id_affectation';

    protected $fillable = [
        'id_personne',
        'id_fonction',
        'date_debut',
        'date_fin'
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id_personne', 'id_personne');
    }

    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'id_fonction', 'id_fonction');
    }
}

