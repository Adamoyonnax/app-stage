<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spec_Entreprise extends Model
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'spec_entreprise';

    // Attributs de la base de données
    protected $fillable = [
        'num_entreprise',
        'num_spec'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_spec';

    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;
}
