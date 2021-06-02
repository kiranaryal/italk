
@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2> User details</h2>
    <table class="table table-striped text-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr><td><img src="{{$user->profile->profileImage() }}" class="w-100 rounded-circle " style="max-width:40px" >
                <a href="/profile/{{$user->id}}" class="text-white">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else

    sorry  no results found!
    search again

    @endif
</div>
@endsection