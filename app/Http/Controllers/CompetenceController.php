<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competence;
use Illuminate\Support\Facades\File;
class CompetenceController extends Controller
{
    //ajouter competence
    public function addcompetence(Request $request){
        Competence::create([
            'competence' => request('competence'),
            'experience' => request('experience'),
            'id_cv' => request('id_cv'),
            'id_user'=>request('id_user')
        ]);
        return response()->json([
            "message" => "ajout avec success"
        ]);
    }
    //affiche competences
    public function getcompetence($id){
        $competence = Competence::where("id_cv","=",$id)->get();
        return response()->json($competence);
    }
    //affiche competences profile
    public function getcompetenceuser($id){
        $competence = Competence::where("id_user","=",$id)->get();
        return response()->json($competence);
    }
    //supprimer competence
    public function deletecompetence($id){
        $competence = Competence::find($id);
        $competence->delete();
        return response()->json($competence);
    }
    //modifier competence
    public function modifiercompetence(Request $request,$id ){
        $competence = Competence::where('id','=',$id)->update([
        'competence'=>$request->competence,
        'experience'=>$request->experience,

        
        ]);
        return response()->json($competence);
    }

}
