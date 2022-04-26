<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'poste', 'lieu_travail', 'contrat','temps_travail','salaire','periode','etat','description','id_company',
    ];
}
