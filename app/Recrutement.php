<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    protected $fillable = [
        'name_candidat', 'email','last_name_candidat','cv','reponse1','reponse2','reponse3', 'id_user','id_offre',
    ];
}
