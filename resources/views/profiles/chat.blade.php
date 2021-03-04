

@extends('layouts.app')

@section('content')





                 
@forelse ($messages as $message)
 <a href="/message/{{$message->user->id}}" >{{ $message->user->name }} </a>
  <p>{{ $message->message }}</p>

  <hr>
@empty
  <p>This profile has no messages</p>
@endforelse














@endsection