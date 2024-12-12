<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authentificable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Authentificable
{
    use HasFactory;

    protected $table = 'entreprise';

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

    protected $primaryKey = 'num_entreprise';
    public $timestamps = false;


    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'spec_entreprise', 'num_entreprise', 'num_spec');
    }
}

