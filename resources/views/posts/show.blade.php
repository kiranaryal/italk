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
                        <img src="{{$post->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px" >
                    </div>    
                    <div>
                        <h3> 
                        <a href="/profile/{{$post->user->id}}">
                        <span class="success">{{$post->user->username}}</span></a></h3>
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
        <div class="pl-4 pt-2 pb-4 d-flex">
         @if (Auth::check())
       
         @if($likestatus === 1)
         <a href="/dislike/{{$post->id}}">

          <img src="/img/dislike.jpg"class="w-100 " style="max-width:60px" alt="like">
          </a>
          @elseif($likestatus === 0)
           <a href="/like/{{$post->id}}">
          <img src="/img/like.jpg"class="w-100 " style="max-width:60px" alt="like">
          </a>
          @endif 
        @endif


        <span class="pl-4 pt-1 h3">
  {{$likescount}}
</span>
</div>
    <h3>Comments</h3>
                 
        @if (Auth::check())
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <form action="/c"  enctype="multipart/form-data" method="post">
          @csrf
        <input name="body"  id="body" cols="30" rows="10">
         <input type="hidden" name="post_id" value="{{ $post->id }}">
         
          </form>
          <p></p>
        
        @endif




@forelse ($post->comments->reverse() as $comment)
<img src="{{$comment->user->profile->profileImage()}}" class="w-100 pl-2 rounded-circle " style="max-width:40px" >
<b>
{{ $comment->user->name}}
</b>
<br>
  <p class=" pl-4 ">{{ $comment->body }}</p>
  <hr>

@empty
  <p>This post has no comments</p>
@endforelse




    </div>
    
</div>
@endsection
