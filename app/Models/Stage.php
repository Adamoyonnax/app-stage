<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'stage';

    // Attributs de la base de données
    protected $fillable = [
        'num_stage',
        'debut_stage',
        'fin_stage',
        'type_stage',
        'desc_projet',
        'observation_stage',
        'num_etudiant',
        'num_prof',
        'num_entreprise'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_stage';

    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;

}
