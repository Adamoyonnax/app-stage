<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    //  Nom de la table dans la base de données
    protected $table = 'specialite';

    // Attributs de la base de données
    protected $fillable = [
        'num_spec',
        'libelle'
    ];

    // Attribut primaire et unique
    protected $primaryKey = 'num_spec';

    // Désactive la création d'attributs 'created_at' et 'updated_at'
    public $timestamps = false;

    // Relation entre les Entreprisee et les Spécialités formant spec_Enteprise
    public function entreprises()
    {
        return $this->belongsToMany(Entreprise::class, 'spec_entreprise', 'num_spec', 'num_entreprise');
    }

}
