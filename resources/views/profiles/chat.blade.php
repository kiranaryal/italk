

@extends('layouts.app')

@section('content')



<div class="container">
<div class="row">
<div class="col-2">
</div>

<div class="col-7 bg-secondary p-3 m-3 rounded">
<div class="container ">
@forelse($profile as $profile)
<div class="h3">

<img src="{{ $profile->user->profile->profileImage() }}" style="height:40px" class="rounded-circle w-10">

{{$profile->user->name}}
</div>
@empty
@endforelse
<div>@if($messages==NULL)

PLEASE START A CONVERTATION
@else
{{ $messages->onEachSide(5)->links() }}
</div>
@forelse ($messages->reverse() as $message)
@if($message->user == auth()->user())


<div class=" float-right bg-primary rounded">

@else
<div class="float-left bg-success rounded">
@endif
  

 

<!-- <img src="{{ $message->user->profile->profileImage() }}" style="height:40px" class="rounded-circle w-10"> -->
  

   <!-- <p class="chat1">{{$message->user->name }}</p>   -->
             
  <div class="m-1 text-break">{{ $message->message }}</div>

  </div>
  <!-- <p class="chat2"> {{$message->created_at}}</p> -->
<br>
<br>


@empty
  <p>This profile has no messages</p>
@endforelse
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
  <form action="/message/store" class="p-3" enctype="multipart/form-data" method="post">
  @csrf
<input type="text"class="form-control" name="message">
 <input type="hidden" name="profile_id" value="{{ $profile_no }}">
 

 </form>
@endif
</div>
  
  
 


<div class="col-2"> 
     @forelse($users as $user)
<div class="container p-2">
          <a href="/chat/{{$user->id}}">
         
           
           <img src="{{$user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px" >
         <span class="text-white">
 {{$user->name}}
</span>
            </a>
                
</div>
          
           @empty
         @endforelse
 </div>
</div>

</div>
</div>
</div>


</div>


    
@endsection
