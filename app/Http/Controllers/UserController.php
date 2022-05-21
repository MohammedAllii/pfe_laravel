<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{ 
    //supprimer compte
    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
    //photo de profil
    public function upload(Request $request,$id){
        try{
            $user = User::find($id);
            if($request->hasFile("img")){
                $file = $request->file("img");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:/Users/wiouu/hamoudat/public/images/',$filename);
                $user->avatar=$filename;
                $res=$user->save();
                return response()->json($user);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        
    }
    //photo de couverture
    public function uploadcouverture(Request $request,$id){
        try{
            $user = User::find($id);
            if($request->hasFile("couverture")){
                $file = $request->file("couverture");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:/Users/wiouu/hamoudat/public/images/',$filename);
                $user->avatar_couverture=$filename;
                $res=$user->save();
                return response()->json($user);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        
    }
    //affichage user dans une autre page
    public function getUser($id){
        $user= User::find($id);
        return response()->json($user);
    }
    //get user data
    public function afficheuser($id){
        $user = User::find($id);
        return response()->json($user);
    }
    //modifier name user
    public function updatename(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'name'=>$request->name
            ]);
        return response()->json($user);
    }
    //modifier email user
    public function updateemail(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'email'=>$request->email
            ]);
        return response()->json($user);
    }
    //modifier password
    public function updatepassword(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'password'=>Hash::make($request->password)
            ]);
        return response()->json($user);
    }
    //affiche company
    public function getcompany(){
        $company = User::where('role','=','company')->get();
        return response()->json($company);
    }
    //modifier company info
    public function updatecompany(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'site_web'=>$request->site_web,
            'annee_fondation'=>$request->annee_fondation,
            'nb_employee'=>$request->nb_employee,
            'gouvernorat'=>$request->gouvernorat,
            'adresse'=>$request->adresse,
            'description_entreprise'=>$request->description_entreprise,
            'linkedin'=>$request->linkedin,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,


            ]);
        return response()->json($user);
    }
    //modifier user info 
    public function updateuser(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'adresse' =>$request->adresse,
            'name'=>$request->name,
            'email'=>$request->email,
            'last_name' =>$request->last_name,
            'gouvernorat' =>$request->gouvernorat,
            'date_naissance' =>$request->date_naissance,
            'phone' =>$request->phone,
            'civilite' =>$request->civilite,
            'specialite' =>$request->specialite,
            'role'=> $request->role,
            'site_web' =>$request->site_web,
            'description_entreprise'=>$request->description_entreprise,
            'facebook'=> $request->facebook,
            'linkedin'=> $request->linkedin,
            'twitter'=> $request->twitter,
            'nb_employee'=> $request->nb_employee,
            'annee_fondation'=> $request->annee_fondation,


        ]);
        return response()->json($user);
    }
    //affiche users
    public function alluser(){
        $user = User::where('role','=','user')->get();
        return response()->json($user);
    }
    //affiche company
    public function allcompany(){
        $company = User::where('role','=','company')->get();
        return response()->json($company);
    }
    //affiche company
    public function alladmins(){
        $admin = User::where('role','=','admin')->get();
        return response()->json($admin);
    }
    //ajouter skills in profile
    public function addskillsusers(Request $request,$id ){
        $user = User::where('id','=',$id)->update([
        'skills_user'=>$request->skills_user
        ]);
        return response()->json($user);
    }
    //ajouter Resume in profile
    public function addresumeuser(Request $request,$id ){
        $user = User::where('id','=',$id)->update([
        'resume_user'=>$request->resume_user
        ]);
        return response()->json($user);
    }
    //ajouter interet in profile
    public function addinteretuser(Request $request,$id ){
        $user = User::where('id','=',$id)->update([
        'interet_user'=>$request->interet_user
        ]);
        return response()->json($user);
    }
    //Add Admin
    public function addAdmin(Request $request){
        $user = User::create([
            'name' => request('name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' =>Hash::make(request('password')),
            'role' => request('role'),
            'adresse' => request('adresse'),
            'gouvernorat' => request('gouvernorat'),
            'civilite' => request('civilite'),
            'phone' => request('phone'),
            'specialite' => request('specialite'),
        ]);
        return response()->json($user);
    }
}
