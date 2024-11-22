<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    protected $table = 'specialite';

    // Colonnes modifiables
    protected $fillable = [
        'num_spec',
        'libelle',
    ];

    protected $primaryKey = 'num_spec';

    public function entreprises()
    {
        return $this->belongsToMany(Entreprise::class, 'spec_entreprise', 'num_spec', 'num_entreprise');
    }

}
