<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professeur extends Model
{
    use HasFactory;

    protected $table = 'professeur';

    protected $fillable = [
        `num_prof`,
        `nom_prof`,
        `prenom_prof`,
        `login`,
        `mdp`,
        `email`
    ];
}
