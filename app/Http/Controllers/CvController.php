<?php

namespace App\Http\Controllers;
use App\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function registercv(){
        $cvs = Cv::create([
            'name' => request('name'),
            'email' => request('email'),
            'poste' =>request('poste'),
            'github' => request('github'),
            'linkedin' => request('linkedin'),
            'description' =>request('description'),
            'phone' =>request('phone'),
            'interet' =>request('interet'),
            'id_user' =>request('id_user')
        ]);
        return response()->json($cvs);
    }
    public function allCv($id){
        $cv = Cv::all()->where('id_user','=',$id);
        return response()->json($cv);
    }
    public function affichecv($id){
        $cvv = Cv::find($id);
        return response()->json($cvv);
    }
}
