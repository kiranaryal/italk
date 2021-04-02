@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}"
             style="height:200px" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class=" justify-content-between align-items-baseline">

            <div class="d-flex text-align-center">
                    <div class="h1">{{$user->username}}
             </div>
            <div class="d-flex text-align-right pl-5">
                @can('update',$user->profile)
                     <a href="/profile/{{$user->id}}/settings">s</a> 
                @else

                    <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                    <a href="/message/{{$user->id}}">message</a>


  
  <p></p>


</div>
               
               
               
                @endcan
            </div>
           
            <div class="align-right pl-5"> 

                @can('update', $user->profile)
                <a href="/p/create">Add new posts</a>
                @endcan
            </div>       
     </div>
            
            @can('update',$user->profile)
            <a href="/profile/{{ $user->id }}/edit">edit profile</a>
            @endcan
     <div class="d-flex">
        <div class="pr-3"> <strong>{{$postscount }}</strong>posts</div>
        <div class="pr-3" > <strong>{{$followerscount }}</strong>followers </div>
        <div class="pr-3"> <strong>{{$followingcount }}</strong>following </div>
    </div>
         <div><strong> {{$user->profile->title}}</strong></div>
        <div>{{$user->profile->description}} </div>
        <div><a href="">{{$user->profile->url}}</a></div>
            
    </div>
    <div class="col-6 justify-content-center  ">
     @foreach($user->posts as $post)
     <div class="container p-2">
           <a href="/p/{{$post->id}}" class=""> 
           <img src="/storage/{{ $post->image}}" style="height:300px;" ></a>
     </div>
            
         
        
     @endforeach
        
     </div>
 



    
    </div>
</div>
@endsection
