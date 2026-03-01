<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;


class Commission extends Model
{
    protected $primaryKey = 'id_commission';

    protected $fillable = [
        'nom_commission'
    ];

    public function personnes()
    {
        return $this->belongsToMany(
            Personne::class,
            'membre_commission',
            'id_commission',
            'id_personne'
        );
    }
}

