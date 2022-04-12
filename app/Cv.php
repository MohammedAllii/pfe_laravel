<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'name', 'email', 'poste','github','linkedin','description','interet','phone','id_user'
    ];
}
