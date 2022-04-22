<?php

namespace App\Http\Controllers;
use App\Lien;
use Illuminate\Http\Request;

class LienController extends Controller
{
    //ajouter lien
    public function addlien(Request $request){
        Lien::create([
            'titre' => request('titre'),
            'url' => request('url'),
            'id_cv' => request('id_cv'),
        ]);
        return response()->json([
            "message" => "ajout avec success"
        ]);
    }
    //affiche liens
    public function getlien($id){
        $lien = Lien::where("id_cv","=",$id)->get();
        return response()->json($lien);
    }
}
