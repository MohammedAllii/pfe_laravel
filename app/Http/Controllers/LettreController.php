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
    //tous les cv
    public function allCvs(){
        $cv = Cv::all()->where('resume','!=',null);
        Carbon::setlocale('fr');
        foreach($cv as $cvs){
            $cvs->setAttribute('added',Carbon::parse($cvs->created_at)->diffForHumans());
        }
        return response()->json($cv);
    }
    //affichage cv
    public function affichecv($id){
        $cv = Cv::find($id);
        return response()->json($cv);
    }
    public function updatecvresume(Request $request,$id ){
        $cv = Cv::where('id','=',$id)->update([
        'description'=>$request->description
        
        ]);
        return response()->json($cvs);
    }
    
    
    //modifier cv avatar
    public function uploadcv(Request $request,$id){
            try{
                $cv = Cv::find($id);
                if($request->hasFile("img")){
                    $destination='C:/Users/wiouu/hamoudat/public/cvs/'.$cv->avatar;
                    $file = $request->file("img");
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('C:/Users/wiouu/hamoudat/public/cvs/',$filename);
                    $cv->avatar=$filename;
                    $res=$cv->save();
                    return response()->json($cv);
                }
            }catch(Exeption $e){
                return response()->json([
                    "message" => $e->getMessage()
                ]);
            }}
        //info personnels
        public function updateinfo(Request $request,$id ){
            $cv = Cv::where('id','=',$id)->update([
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'poste'=>$request->poste,
            'localite'=>$request->localite,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'adresse'=>$request->adresse,
            'code_postal'=>$request->code_postal,
            'etat'=>$request->etat,
            'ville'=>$request->ville,
            'nationalite'=>$request->nationalite,
            'date_naissance'=>$request->date_naissance
            
            ]);
            return response()->json($cv);
        }
        //ajouter résumé
        public function addresume(Request $request,$id ){
            $cv = Cv::where('id','=',$id)->update([
            'resume'=>$request->resume
            ]);
            return response()->json($cv);
        }
        //ajouter interet
        public function addinteret(Request $request,$id ){
            $cv = Cv::where('id','=',$id)->update([
            'interet'=>$request->interet
            ]);
            return response()->json($cv);
        }
        //ajouter skills
        public function addskills(Request $request,$id ){
            $cv = Cv::where('id','=',$id)->update([
            'skills'=>$request->skills
            ]);
            return response()->json($cv);
        }
        //telecharger cv
        public function downloadcv(Request $request){
            try{
                if($request->hasFile("img")){
                    $file = $request->file("img");
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('C:/Users/wiouu/hamoudat/public/cvs/',$filename);
                    Cv::create([
                        'name' => request('name'),
                        'email' => request('email'),
                        'poste' =>request('poste'),
                        'localite' =>request('localite'),
                        'id_user' =>request('id_user'),
                        'pdf' =>$filename
                    ]);
                    return response()->json(["message" => "3abi kes tey b louz"]);
                }
            }catch(Exeption $e){
                return response()->json([
                    "message" => "ereeeeeeeur"
                ]);
            }}
            //supprimer cv
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
}
