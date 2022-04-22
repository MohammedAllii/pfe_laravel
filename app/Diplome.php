<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $fillable = [
        'etablissement', 'diplome', 'country','discipline','debut','fin','description','id_cv',
    ];
}
