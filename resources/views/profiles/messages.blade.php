
     @extends('layouts.app')

@section('content')




                 
@forelse ($messages as $message)
  <p>{{ $message->user->name }} {{$message->created_at}}</p>
  <p>{{ $message->message }}</p>
  <hr>
@empty
  <p>This profile has no messages</p>
@endforelse
{{ $messages->onEachSide(1)->links() }}


{{ $messages->onEachSide(1)->links() }}


















@endsection