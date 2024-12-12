<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Etudiant extends Authenticatable
{
    use HasFactory;

    protected $table = 'etudiant';

    // Colonnes modifiables
    protected $fillable = [
        'nom_etudiant',
        'prenom_etudiant',
        'annee_obtention',
        'login',
        'mdp',
        'num_classe',
        'en_activite'
    ];
    protected $primaryKey = 'num_etudiant';
    public $timestamps = false;



    public function classe()
    {
        return $this->belongsTo(Classe::class, 'num_classe');
    }

    public function getAuthPassword()
    {
        return $this->mdp; // Si le champ est `mdp` au lieu de `password`
    }

}
