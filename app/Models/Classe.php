<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classe';


    protected $fillable = [
        'num_classe',
        'nom_classe',
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'num_classe');
    }
}
