<?php

namespace App\Http\Controllers;
use App\Cv;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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
                   if(File::exists($destination)){
                       File::delete($destination);
                   }
                $file = $request->file("img");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:/Users/wiouu/hamoudat/public/cvs/',$filename);
                $cv->avatar=$filename;
                $res=$cv->save();
                return response()->json($user);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }}

}
