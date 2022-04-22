<?php

namespace App\Http\Controllers;
use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //ajouter résumé
    public function addexperience(Request $request){
        Experience::create([
            'poste' => request('poste'),
            'name_company' => request('name_company'),
            'country' =>request('country'),
            'debut' => request('debut'),
            'fin' => request('fin'),
            'description' => request('description'),
            'id_cv' => request('id_cv'),
        ]);
        return response()->json([
            "message" => "ajout avec success"
        ]);
    }
    //affiche experiences
    public function getexperience($id){
        $experience = Experience::where("id_cv","=",$id)->get();
        return response()->json($experience);
    }
    //affiche experience a modifier
    public function afficheexperience($id){
        $experience = Experience::where("id","=",$id)->first();
        return response()->json($experience);
    }
    //supprimer experience
    public function deleteexperience($id){
        $experience = Experience::find($id);
        $experience->delete();
        return response()->json($experience);
    }
    //modifier experience
    public function modifierexperience(Request $request,$id ){
        $experience = Experience::where('id','=',$id)->update([
        'poste'=>$request->poste,
        'name_company'=>$request->name_company,
        'country'=>$request->country,
        'debut'=>$request->debut,
        'fin'=>$request->fin,
        'description'=>$request->description,
        
        ]);
        return response()->json($experience);
    }
}
