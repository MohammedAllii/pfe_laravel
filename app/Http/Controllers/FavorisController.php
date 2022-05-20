<?php

namespace App\Http\Controllers;
use App\Favoris;
use App\Offre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FavorisController extends Controller
{   //add favoris
    public function addfavoris($id_user,$id_offre){
        try{
        $fav = Favoris::where('id_user','=',$id_user)->where('id_offre','=',$id_offre)->first();
        if(!$fav){
        $favoris = Favoris::create([
            'id_offre' => request('id_offre'),
            'id_user' => request('id_user'),
        ]);}
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
            return response()->json($favoris);
    }
    //favoris afficher
    public function getoffres($id){
        $offre = DB::table('offres')
        ->join('favoris','favoris.id_offre','offres.id')
        ->join('users','users.id','offres.id_company')
        ->where('favoris.id_user',$id)
        ->get();
        return response()->json($offre);
            }
    //supprimer offre sauvegarder
    public function deleteoffresave($id_offre,$id_user){
        $favoris = Favoris::where('id_offre','=',$id_offre)->where('id_user','=',$id_user)->delete();
        return response()->json($favoris);
}
    //supprimer tous offre sauvegarder
    public function deletealloffresave($id_user){
        $favoris = Favoris::where('id_user','=',$id_user)->delete();
        return response()->json($favoris);
    }
    }