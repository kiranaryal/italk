@extends('layouts.app')

@section('content')
<div class="container">
   @auth

   <meta http-equiv="refresh" content="0, URL=/{{Auth::user()->id}}" />
   @endauth

   
</div>
@endsection
