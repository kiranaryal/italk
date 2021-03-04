<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
 
 
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
 
        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);
        return redirect()->route('posts.show', $post->id);
    }
}
