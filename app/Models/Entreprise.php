<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authentificable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Authentificable
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'entreprise';

    // Attributs de la base de données
    protected $fillable = [
        'num_entreprise',
        'raison_sociale',
        'nom_contact',
        'nom_resp',
        'rue_entreprise',
        'cp_entreprise',
        'ville_entreprise',
        'tel_entreprise',
        'fax_entreprise',
        'email',
        'observation',
        'site_entreprise',
        'niveau',
        'en_activite',
        'login',
        'mdp'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_entreprise';
    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;

    public function specialites()
    {
        // Relation entre les Entreprisees et les Spécialités dans la table spec_Entreprise
        return $this->belongsToMany(Specialite::class, 'spec_entreprise', 'num_entreprise', 'num_spec');
    }
}

