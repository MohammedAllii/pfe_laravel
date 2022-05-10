<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Recrutement;
use Carbon\Carbon;
class RecrutementController extends Controller
{
    //postuler a une offre
    public function postule(Request $request,$id_user,$id_offre){
        $recrutement = Recrutement::where('id_user','=',$id_user)->where('id_offre','=',$id_offre)->first();
        
        try{
            if(!$recrutement){
            if($request->hasFile("img")){
                $file = $request->file("img");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:/Users/wiouu/hamoudat/public/cvs/',$filename);
                $req = Recrutement::create([
                    'name_candidat' => request('name_candidat'),
                    'email' => request('email'),
                    'last_name_candidat' =>request('last_name_candidat'),
                    'reponse1' =>request('reponse1'),
                    'reponse2' =>request('reponse2'),
                    'reponse3' =>request('reponse3'),
                    'id_user' =>request('id_user'),
                    'id_offre' =>request('id_offre'),
                    'cv' =>$filename
                ]);
                return response()->json(["message" => "bravooo"]);
            }
        }}catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        return response()->json($req);
    }
    //offre afficher candidat
    public function getoffrescandidat($id){
        $offre = DB::table('offres')
        ->join('recrutements','recrutements.id_offre','offres.id')
        ->join('users','users.id','recrutements.id_user')
        ->where('offres.id',$id)
        ->get();
        return response()->json($offre);
            }
            //offre afficher candidat
    public function countoffrescandidat($id){
        $offre = DB::table('offres')
        ->join('recrutements','recrutements.id_offre','offres.id')
        ->join('users','users.id','recrutements.id_user')
        ->where('offres.id',$id)
        ->count();
        return response()->json($offre);
            }
            //afficher details offre
    public function getcandidatdetails($id_user,$id_offre){
        $offre = DB::table('offres')
        ->join('recrutements','recrutements.id_offre','offres.id')
        ->join('users','users.id','recrutements.id_user')
        ->where('offres.id',$id_offre)
        ->where('users.id',$id_user)
        ->first();
        return response()->json($offre);
            }
            //afficher info user(cv,formation,experience)
    public function getcandidatinfo($id_user){
        $offre = DB::table('users')
        ->join('cvs','cvs.id_user','users.id')
        ->join('diplomes','diplomes.id_cv','cvs.id')
        ->where('users.id',$id_user)
        ->get();
        return response()->json($offre);
            }
}
