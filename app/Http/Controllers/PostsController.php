<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Post;
use App\User;
use App\Like;
class PostsController extends Controller
{
        




    public function __construct(){
        $this -> middleware(['auth','verified']);
    }
       public function index( $user){

            
             $users = (auth()->user()->following()) ? auth()->user()->following()->pluck('profiles.user_id') : 0 ;
            //  $users = auth()->user()->following()->pluck('profiles.user_id') ;
            if(count($users) > 0)
            { $posts = Post::
             wherein('user_id',$users)->with('user')
             ->orWhere('user_id',$user)
              ->latest()
            ->paginate(5);
        }
        else{
            $posts = Post::
             wherein('user_id',[$user])
              ->latest()
            ->paginate(5);
        }
      
        //    $likes = (auth()->user()) ? auth()->user()->likes->contains($post) :false;
            
        
        
        $user_following= auth()->user()->following()->pluck('profiles.user_id');
        $users = User:: wherein('id',$user_following)->get();
        return view('posts.index',compact('posts','users'));
      
        
       

       }

    public function create(){
        return view('posts.create'); 
    }
    public function store() {
        $data = request()->validate([
            'caption' => 'required',
            'image'=>'required|image',
        ]);
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        


        return redirect('/profile/'.auth()->user()->id);
    }


    public function show(Post $post){
      
        $user = auth()->user()->id;
        $likestatus =$post->likes->where('user_id',$user)->count();
        $likescount =  $post->likes->count();
      
        






      
        
     
        return view('posts.show', compact('post','user','likescount','likestatus'));


    }
    public function destroy($id){
        $post = POST::find($id);
        $post->delete();

        return redirect('/profile/'.auth()->user()->id)->with('success', 'post deleted!');

    }

}
