<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class professeur extends Authenticatable  // /!\ Il faudra à terme ajouter la majuscule pour respecter la convention.
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'professeur';

    // Attributs de la base de données
    protected $fillable = [
        'num_prof',
        'nom_prof',
        'prenom_prof',
        'login',
        'mdp',
        'email'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_prof';

    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;
}
