<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store( $post)
    {
        
 
        Like::updateOrCreate([
            
            'user_id' => auth()->user()->id,
            'post_id' => $post,
            
        ]);
        return redirect()->route('posts.show', $post);
    }
    public function destroy($post){
        $userId = auth()->user()->id;

        $like = Like::where('user_id',$userId);
        $like->delete();

        return redirect()->route('posts.show', $post);

    }
    
}
