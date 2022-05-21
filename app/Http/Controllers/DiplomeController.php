<?php

namespace App\Http\Controllers;
use App\Diplome;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DiplomeController extends Controller
{
    //ajouter diplome
    public function adddiplome(Request $request){
        Diplome::create([
            'etablissement' => request('etablissement'),
            'diplome' => request('diplome'),
            'country' =>request('country'),
            'discipline' =>request('discipline'),
            'debut' => request('debut'),
            'fin' => request('fin'),
            'description' => request('description'),
            'id_cv' => request('id_cv'),
            'id_user'=>request('id_user')
        ]);
        return response()->json([
            "message" => "ajout avec success"
        ]);
    }
    //affiche diplome
    public function getdiplome($id){
        $diplome = Diplome::where("id_cv","=",$id)->get();
        Carbon::setlocale('fr');
        foreach($diplome as $diplomes){
            $diplomes->setAttribute('debut',Carbon::parse($diplomes->debut)->format('j F Y'));
            $diplomes->setAttribute('fin',Carbon::parse($diplomes->fin)->format('j F Y'));
        }
        
        return response()->json($diplome);
    }
    //affiche diplome profile
    public function getdiplomeuser($id){
        $diplome = Diplome::where("id_user","=",$id)->get();
        Carbon::setlocale('fr');
        foreach($diplome as $diplomes){
            $diplomes->setAttribute('debut',Carbon::parse($diplomes->debut)->format('j F Y'));
            $diplomes->setAttribute('fin',Carbon::parse($diplomes->fin)->format('j F Y'));
        }
        
        return response()->json($diplome);
    }
    //affiche diplome a modifier
    public function affichediplome($id){
        $diplome = Diplome::where("id","=",$id)->first();
        return response()->json($diplome);
    }
    //supprimer diplome
    public function deletediplome($id){
        $diplome = Diplome::find($id);
        $diplome->delete();
        return response()->json($diplome);
    }
    //modifier diplome
    public function modifierdiplome(Request $request,$id ){
        $diplome = Diplome::where('id','=',$id)->update([
        'etablissement'=>$request->etablissement,
        'diplome'=>$request->diplome,
        'country'=>$request->country,
        'discipline'=>$request->discipline,
        'debut'=>$request->debut,
        'fin'=>$request->fin,
        'description'=>$request->description,
        
        ]);
        return response()->json($diplome);
    }
}
