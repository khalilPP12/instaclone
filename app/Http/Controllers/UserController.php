<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Showpost(){
        $posts=Post::with("user")->get();
        return view('instagram.feed',['data'=>$posts]);
    }
    public function store(Request $request){
        $post=new Post();
        $post->title=$request->title;
        if($request->has('photo')){
            $post->photo=$request->photo->store('images');
   
        }
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect('profile');
    }
    public function comments(Request $request)
    {
      $user=User::find(Auth::user()->id);
      $user->can_comments()->attach($request->post_id,['content'=>$request->content,'username'=>Auth::user()->name]);
      return redirect('/');
    }
    public function likes(Request $request){
        $user=User::find(Auth::user()->id);
        if($user->can_likes()->where('post_id',$request->post_id)->first()){
            $user->can_likes()->detach($request->post_id);
        }
        else{
            $user->can_likes()->attach($request->post_id);
        }
        
        return redirect('/');
    }

    public function follow_page($id)
    {
        $data=[];
        $posts=Post::where('user_id',$id)->get();
        $profile=Profil::where('user_id',$id)->get();
        foreach ($profile as $key => $value) {
            global $data;
            $data=[
                'id'=>$value->user_id,
                'bio'=>$value->bio  ,
                'name'=>$value->username,
                'photo'=>$value->photo
            ];
        }
        if($id==Auth::user()->id)
        {
           return redirect('profile');
        }
        else{
            return view('instagram.follow_page',['data'=>$posts,"info"=>$data,'follow_number'=>User::find($id)]);
        }
    }

    public function follow(Request $request)
    {

            $user=User::find(Auth::user()->id);
            $follow= $user->following()->where('user_id_2',$request->user_id)->first();

            if($follow)
            {
                $user->following()->detach($request->user_id);
                return redirect()->route('follow_page', ['id' =>$request->user_id ]);
            }
            else{
                $user->following()->attach($request->user_id);
                return redirect()->route('follow_page', ['id' =>$request->user_id ]);
            }
    }
    public function like(Request $request)
    {

            $user=User::find(Auth::user()->id);
            $like= $user->can_likes()->where('post_id',$request->post_id)->first();

            if($like)
            {
                $user->can_likes()->detach($request->post_id);
            }
            else{
                $user->can_likes()->attach($request->post_id);
            }
    }
}
