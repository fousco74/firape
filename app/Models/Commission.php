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

    /**
     * Relation avec les personnes (membres de la commission)
     */
    public function personnes()
    {
        return $this->belongsToMany(
            Personne::class,
            'membre_commission',
            'id_commission',
            'id_personne'
        );
    }

    /**
     * Compter le nombre de membres
     */
    public function countMembres()
    {
        return $this->personnes()->count();
    }

    /**
     * Vérifier si la commission possède au moins un membre
     */
    public function hasMembres()
    {
        return $this->personnes()->exists();
    }
}
