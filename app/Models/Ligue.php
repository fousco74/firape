<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligue extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ligue';
    protected $fillable = [
        'nom_ligue',
        'type_ligue',
        'zone'
    ];

    // Relations
    public function clubs()
    {
        return $this->hasMany(Club::class, 'id_ligue', 'id_ligue');
    }
}
