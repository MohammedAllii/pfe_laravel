<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'name', 'email', 'poste','resume','interet','phone','id_user','localite','avatar','skills','pdf',
    ];
}
