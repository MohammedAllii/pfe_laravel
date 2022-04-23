<?php

namespace App\Http\Controllers;
use App\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    //ajouter langue
    public function addlangue(Request $request){
        Langue::create([
            'langue' => request('langue'),
            'niveau' => request('niveau'),
            'id_cv' => request('id_cv'),
        ]);
        return response()->json([
            "message" => "ajout avec success"
        ]);
    }
    //affiche langues
    public function getlangue($id){
        $langue = Langue::where("id_cv","=",$id)->get();
        return response()->json($langue);
    }
    //modifier liens
    public function modifierlangue(Request $request,$id ){
        $langue = Langue::where('id','=',$id)->update([
        'langue'=>$request->langue,
        'niveau'=>$request->niveau,

        
        ]);
        return response()->json($langue);
    }
    //supprimer lien
    public function deletelangue($id){
        $langue = Langue::find($id);
        $langue->delete();
        return response()->json($langue);
    }
}
