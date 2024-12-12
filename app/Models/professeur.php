<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class professeur extends Authenticatable
{
    use HasFactory;

    protected $table = 'professeur';
    protected $primaryKey = 'num_prof';
    public $timestamps = false;

    protected $fillable = [
        'num_prof',
        'nom_prof',
        'prenom_prof',
        'login',
        'mdp',
        'email'
    ];

    public function getAuthPassword()
    {
        return $this->mdp; // Si le champ est `mdp` au lieu de `password`
    }
}
