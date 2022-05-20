<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    protected $fillable = [
        'titre', 'url','id_cv','id_user'
    ];
}
