<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Etudiant extends Authenticatable
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'etudiant';

    // Attributs de la base de données
    protected $fillable = [
        'nom_etudiant',
        'prenom_etudiant',
        'annee_obtention',
        'login',
        'mdp',
        'num_classe',
        'en_activite'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_etudiant';

    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;

    // Relation entre les Etudiants et les Professeurs
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'num_classe');
    }
}
