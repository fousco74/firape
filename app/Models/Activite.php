<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evenement;

class Activite extends Model
{
    protected $primaryKey = 'id_activite';

    protected $fillable = [
        'libelle',
        'type'
    ];

    public function evenements()
    {
        return $this->hasMany(Evenement::class, 'id_activite', 'id_activite');
    }
}

