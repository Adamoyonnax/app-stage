<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spec_Entreprise extends Model
{
    use HasFactory;
    protected $table = 'spec_entreprise';

    // Colonnes modifiables
    protected $fillable = [
        'num_entreprise',
        'num_spec',
    ];
    protected $primaryKey = 'num_spec';
}
