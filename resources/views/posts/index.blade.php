@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row"> 
   <div class="col-9 d-flex">
    @forelse($posts as $post)
    <div class="container">
    <div class="row">
        <div class="col-6 offset-3">
        
            <a href="/profile/{{$post->user->id}}">
            <img src="/storage/{{$post->image }}" class="w-100">
            </a>

        </div>
    </div>
        <div class="row pt-2 pb-4">

          
           
           
               
         <div class=" col-6 offset-3 ">
         <div>
         <p>
            <span class="pr-2 font-weight-bold"> 
            <a href="/profile/{{$post->user->id}}">
            <span class="text-dark">{{$post->user->username}}
            </span></a>
            </span>{{ $post->caption}}
            </p>
            </div>
        </div>
        </div>





        </div>
        @empty
       <h1>
     
     
     please follow someone to see their post
     
        </h1>
    @endforelse
    {{ $posts->links() }}


    </div>  
    <div class="col-3 d-flex"> 
     @forelse($users as $user)
            <tr>
    
            <td><a href="/profile/{{$user->id}}">
         
           
           {{$user->name}}
           <img src="/storage/{{$user->profile->image }}" class="w-100 rounded-circle" style="max-width:40px" >
            </a><h1>
           
            
            </h1>
            </td>
                
            </tr>

           @empty
         @endforelse


    </div> 
    </div>
    
</div>
@endsection
