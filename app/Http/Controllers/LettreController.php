<?php

namespace App\Http\Controllers;
use App\Lettre;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LettreController extends Controller
{
    public function registerlettre(){
        $lettre = Lettre::create([
            'name' => request('name'),
            'email' => request('email'),
            'poste' =>request('poste'),
            'phone' =>request('phone'),
            'titre' =>request('titre'),
            'contenu' =>request('contenu'),
            'id_user' =>request('id_user')
        ]);
        return response()->json($lettre);
    }
    public function allLettres($id){
        $lettre = Lettre::all()->where('id_user','=',$id);
        Carbon::setlocale('fr');
        foreach($lettre as $lettres){
            $lettres->setAttribute('added',Carbon::parse($lettres->created_at)->diffForHumans());
        }
        return response()->json($lettre);
    }
            //supprimer lettre
            public function deletelettre($id){
                $lettre = Lettre::find($id);
                $lettre->delete();
                return response()->json($lettre);
                     }
    //telecharger lettre
    public function downloadlettre(Request $request){
        try{
            if($request->hasFile("img")){
                $file = $request->file("img");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:/Users/wiouu/hamoudat/public/lettres/',$filename);
                Lettre::create([
                    'titre' =>request('titre'),
                    'id_user' =>request('id_user'),
                    'pdf' =>$filename
                ]);
                return response()->json(["message" => "bravoo"]);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => "ereeeeeeeur"
            ]);
        }}
        //affichage lettre
    public function affichelettre($id){
        $lettre = Lettre::find($id);
        Carbon::setlocale('fr');
            $lettre->setAttribute('added',Carbon::parse($lettre->created_at)->format('j F Y'));
        return response()->json($lettre);
    }
    //affichage lettre by id
    public function getlettre($id){
        $lettre = Lettre::find($id);
        return response()->json($lettre);
    }
    //modifier lettre
    public function modifierlettre(Request $request,$id ){
        $lettre = Lettre::where('id','=',$id)->update([
        'email' => $request->email,
        'poste' =>$request->poste,
        'phone' =>$request->phone,
        'titre' =>$request->titre,
        'contenu' =>$request->contenu,
        
        ]);
        return response()->json($lettre);
    }
}
