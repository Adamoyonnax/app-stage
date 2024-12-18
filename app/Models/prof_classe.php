<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prof_classe extends Model
{
    use HasFactory;


    protected $table = 'prof_class';

    protected $fillable = [
        `num_prof`,
        `num_classe`,
        `est_prof_principal`
    ];
}
