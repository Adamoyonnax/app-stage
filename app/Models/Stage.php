<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $table = 'stage';

    // Colonnes modifiables
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

    protected $primaryKey = 'num_stage';

}
