<?php

namespace App\Http\Controllers;
use App\FavorisCv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavorisCvController extends Controller
{
    //add favoris
    public function addfavoriscv($id_user,$id_cv){
        try{
        $fav = FavorisCv::where('id_user','=',$id_user)->where('id_cv','=',$id_cv)->first();
        if(!$fav){
        $favoris = FavorisCv::create([
            'id_cv' => request('id_cv'),
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
    public function getcvs($id){
        $cv = DB::table('cvs')
        ->join('favoris_cvs','favoris_cvs.id_cv','cvs.id')
        ->join('users','users.id','favoris_cvs.id_user')
        ->where('favoris_cvs.id_user',$id)
        ->get();
        return response()->json($cv);
        }
    //supprimer cv sauvegarder
    public function deletecvsave($id_cv,$id_user){
        $favoris = FavorisCv::where('id_cv','=',$id_cv)->where('id_user','=',$id_user)->delete();
        return response()->json($favoris);
}
    //supprimer tous cv sauvegarder
    public function deleteallcvsave($id_user){
        $favoris = FavorisCv::where('id_user','=',$id_user)->delete();
        return response()->json($favoris);
    }
}
