<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = [
        'competence', 'experience','id_cv','id_user'
    ];
}
