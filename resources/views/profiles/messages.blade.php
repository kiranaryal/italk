
     @extends('layouts.app')

@section('content')

 <div class="container ">


 <div class="row">
 <div class="col-3"></div>
 <div class="col-6 bg-secondary p-3 m-3 rounded">
<div class="container ">
@forelse($profile as $profile)
<div class="h3">
<img src="{{ $profile->user->profile->profileImage() }}" style="height:40px" class="rounded-circle w-10">

{{$profile->user->username}}
</div>
@empty
@endforelse
<div>
{{ $messages->onEachSide(5)->links() }}
</div>
@forelse ($messages->reverse() as $message)
@if($message->user == auth()->user())


<div class=" float-right bg-primary rounded">

@else
<div class="float-left bg-success rounded">
@endif
  

  <div class="col">

<!-- <img src="{{ $message->user->profile->profileImage() }}" style="height:40px" class="rounded-circle w-10"> -->
  

   <!-- <p class="chat1">{{$message->user->name }}</p>   -->
             
  <div class="m-1 text-break">{{ $message->message }}</div>

  </div>
  <!-- <p class="chat2"> {{$message->created_at}}</p> -->
</div>
<br>
<br>

@empty
  <p>This profile has no messages</p>
@endforelse
<meta name="csrf-token" content="{{ csrf_token() }}">
  <form action="/message/store" class="p-3" enctype="multipart/form-data" method="post">
  @csrf
<input type="text"class="form-control" name="message">
 <input type="hidden" name="profile_id" value="{{ $profile_no }}">
 

 </form>
</div>
  
  
  
 

 </div>
</div>

</div>

@endsection