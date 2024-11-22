<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
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

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'num_classe');
    }

}
