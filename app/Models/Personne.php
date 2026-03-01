<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commission;
use App\Models\Evenement;
use App\Models\Fonction;
use App\Models\Affectation;



class Personne extends Model
{
    protected $primaryKey = 'id_personne';

    protected $fillable = [
        'nom',
        'prenoms',
        'telephone',
        'email',
        'pays'
    ];

    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'id_personne', 'id_personne');
    }

    public function fonctions()
    {
        return $this->belongsToMany(
            Fonction::class,
            'affectations',
            'id_personne',
            'id_fonction'
        )->withPivot('date_debut', 'date_fin')
         ->withTimestamps();
    }

    public function evenements()
    {
        return $this->belongsToMany(
            Evenement::class,
            'participations',
            'id_personne',
            'id_evenement'
        )->withPivot('role');
    }

    public function commissions()
    {
        return $this->belongsToMany(
            Commission::class,
            'membre_commission',
            'id_personne',
            'id_commission'
        );
    }
}
