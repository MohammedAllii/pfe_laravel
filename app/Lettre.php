<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lettre extends Model
{
    protected $fillable = [
        'name', 'email', 'titre','phone','contenu','id_user','pdf','poste',
    ];
}
