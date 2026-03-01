<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id_personne',
        'id_evenement',
        'role'
    ];
}

