<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $fillable = [
        'langue', 'niveau','id_cv',
    ];
}
