<?php

namespace App\Http\Controllers;
use App\Cv;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CvController extends Controller
{
    public function registercv(){
        $cvs = Cv::create([
            'name' => request('name'),
            'email' => request('email'),
            'poste' =>request('poste'),
            'localite' =>request('localite'),
            'id_user' =>request('id_user')
        ]);
        return response()->json($cvs);
    }
    public function allCv($id){
        $cv = Cv::all()->where('id_user','=',$id);
        Carbon::setlocale('fr');
        foreach($cv as $cvs){
            $cvs->setAttribute('added',Carbon::parse($cvs->created_at)->diffForHumans());
        }
        return response()->json($cv);
    }
    //tous les cv
    public function allCvs(){
        $cv = Cv::paginate(4)->where('resume','!=',null);
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
    //update resume
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
            public function deletecv($id){
                $cv = Cv::find($id);
                $cv->delete();
                return response()->json($cv);
    }
    //recherche cv by poste
    public function recherchecv($recherche){
        $cv = Cv::where('poste','like','%'.$recherche.'%')->get();
        return response()->json($cv);
    }
        

}
