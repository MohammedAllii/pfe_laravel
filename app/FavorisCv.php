<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavorisCv extends Model
{
    protected $fillable = [
        'id_user','id_cv',
       ];
}
