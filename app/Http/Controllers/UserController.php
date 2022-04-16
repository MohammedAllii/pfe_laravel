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
        $destination='C:/Users/wiouu/hamoudat/public/images/'.$user->avatar;
                   if(File::exists($destination)){
                       File::delete($destination);
                   }
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
                $destination='C:/Users/wiouu/hamoudat/public/images/'.$user->avatar;
                   if(File::exists($destination)){
                       File::delete($destination);
                   }
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
}
