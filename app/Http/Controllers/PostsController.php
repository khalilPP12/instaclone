<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function feed(){
        $posts=Post::with("can_have_comments")->get();
        
        return view('instagram.feed',['data'=>$posts]);

        // return view('instagram.feed');

    }
    public function profile(){
        $data=[];
        $posts=Post::where('user_id',Auth::user()->id)->get(); 
        $profile=Profil::where('user_id',Auth::user()->id)->get();  
        foreach($profile as $value){
            global $data;
            $data=[
                'photo'=>$value->photo,
                'username'=>$value->username,
                'bio'=>$value->bio,
                'website'=>$value->website,

            ];
        }
        return view('instagram.profile',['data'=>$posts, 'info'=>$data]);
    }
    public function edit_profile($id)
    {
        $profile =Profil::where('user_id',$id)->get();
   

       
        $profile=Profil::where('user_id',Auth::user()->id)->get(); 

       
        return view('instagram.edit_profile',['data'=>$profile]);
    }
    public function add_post(){
        return view('instagram.add_post');
    }
    public function update_profil(Request $request,$id){
    $profil =Profil::find($id);
    $profil->username=$request->username;
    $profil->website=$request->website;
    $profil->bio=$request->bio;
    $profil->email=$request->email;
    $profil->phone=$request->phone;
    if($request->has('photo')){
        $profil->photo=$request->photo->store('images');
    }
    $profil->gender=$request->gender;
    $profil->user_id=Auth::user()->id;

    $user=User::find($profil->user_id);
    $user->photo=$profil->photo;
    $user->save();
    $profil->save();
    return redirect('/profile');
 }
}
