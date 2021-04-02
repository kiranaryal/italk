
     @extends('layouts.app')

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
  <form action="/message/store"  enctype="multipart/form-data" method="post">
  @csrf
<textarea name="message" id="body" cols="30" rows="10"></textarea>
 <input type="hidden" name="profile_id" value="{{ $profile }}">
 <button>submit</button>

 </form>
@forelse ($messages as $message)
@if($message->user == auth()->user())
<div class="float-right">
  @endif
<img src="{{ $message->user->profile->profileImage() }}" style="height:20px" class="rounded-circle w-10">
             
  <p class="chat1">{{$message->user->name }}</p> <p class="chat2"> {{$message->created_at}}</p>
  <br>
  <p class="chat3">{{ $message->message }}</p>
  <hr>
</div>
@empty
  <p>This profile has no messages</p>
@endforelse
{{ $messages->onEachSide(1)->links() }}




@endsection