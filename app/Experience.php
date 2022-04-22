<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'poste', 'name_company', 'country','debut','fin','description','id_cv',
    ];
}
