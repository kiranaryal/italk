@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        
            <img src="/storage/{{$post->image }}" class="w-100">

        </div>
        <div>
            <div class="d-flex align-items-center">
                     <div class="p-3">
                        <img src="/storage/{{$post->user->profile->image }}" class="w-100 rounded-circle" style="max-width:40px" >
                    </div>    
                    <div>
                        <h3> 
                        <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->username}}</span></a></h3>
                    </div>
                    <div class="d-flex">
                        <div class="pl-2">
                 
                

                        @can('update', $post->user->profile)
                        <div class="pl-2">
                            <a href="/delete/{{$post->id}}">delete</a>
                        </div>  
                        @endcan
                     
                    </div>
             </div>
                <hr>
               

      
        </div>
                <h4>{{ $post->caption}}</h4>
        
         @if (Auth::check())
       
         @if($likestatus === 1)
         <form action="/dislike/{{$post->id}}">
          <button>DISLIKE</button>
          </form>
          @elseif($likestatus === 0)
           <form action="/like/{{$post->id}}">
          <button>LIKE</button>
          </form>
          @endif 
        @endif


         likes:{{$likescount}}
      

       
      
        



                

                 <h3>Comments</h3>
                 
        @if (Auth::check())
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <form action="/c"  enctype="multipart/form-data" method="post">
          @csrf
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
         <input type="hidden" name="post_id" value="{{ $post->id }}">
         <button>submit</button>
          </form>
          <p></p>
        
        @endif
<h3>Comments</h3>



@forelse ($post->comments as $comment)
  <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
  <p>{{ $comment->body }}</p>
  <hr>
@empty
  <p>This post has no comments</p>
@endforelse




    </div>
    
</div>
@endsection
