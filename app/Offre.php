<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'poste', 'lieu_travail','pays', 'contrat','temps_travail','salaire','monnaie','periode','etat','description', 'id_company','question1','question2','question3'
    ];
}
