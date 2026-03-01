<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_evenement';
    protected $table = 'evenements';

    protected $fillable = [
        'nom',
        'date_debut',
        'date_fin',
        'lieu',
        'id_activite'
    ];

    protected $dates = [
        'date_debut',
        'date_fin',
        'created_at',
        'updated_at'
    ];

    // Relations
    public function activite()
    {
        return $this->belongsTo(Activite::class, 'id_activite', 'id_activite');
    }

    public function participations()
    {
        return $this->hasMany(Participation::class, 'id_evenement', 'id_evenement');
    }

    // Accesseurs pour les dates
    public function getDateDebutFormateeAttribute()
    {
        return $this->date_debut ? $this->date_debut->format('d/m/Y') : 'N/A';
    }

    public function getDateFinFormateeAttribute()
    {
        return $this->date_fin ? $this->date_fin->format('d/m/Y') : 'N/A';
    }

    // Vérifier si l'événement est passé
    public function isPassee()
    {
        return $this->date_fin && $this->date_fin->isPast();
    }

    // Vérifier si l'événement est en cours
    public function isEnCours()
    {
        $now = now();
        return $now->between($this->date_debut, $this->date_fin ?? $this->date_debut);
    }

    // Vérifier si l'événement est futur
    public function isFutur()
    {
        return $this->date_debut->isFuture();
    }

    // Compter les participants
    public function countParticipants()
    {
        return $this->participations()->count();
    }
}
