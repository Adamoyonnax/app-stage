<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'classe';

    // Attributs de la base de données.
    protected $fillable = [
        'num_classe',
        'nom_classe',
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_classe';
    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;

    // Relation entre les Etudiants et les Professeurs
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'num_classe');
    }
}
