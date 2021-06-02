@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row"> 
        <div class="col-9">
         @forelse($posts as $post)
             <div class="container" >
                <div class="row">
                     <div class="col-6 offset-3">
        
                         <a href="/profile/{{$post->user->id}}">
                                  <img src="/storage/{{$post->image }}" class="p-2 w-100">
                              </a>

                     </div>
                </div>
            <div class="row pt-2 pb-4">
                <div class=" col-6 offset-3 ">
                    <div>
                        <p>
                            <span class="pr-2 font-weight-bold"> 
                                <a href="/profile/{{$post->user->id}}">
                                        <span class="success">{{$post->user->username}}
                                        </span>
                                </a>
                            {{ $post->caption}}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
        @empty
       <h1> please follow someone to see their post
        </h1>
         @endforelse
        {{ $posts->links() }}


    </div>  
    <div class="col-3 "> 
            @forelse($users as $user)
                    <tr>
    
                        <td>
                            <h1>
                            <a href="/profile/{{$user->id}}">
                                <img src="{{$user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px" >
                            <span class="text-white h3">
                            {{$user->name}}
                            
                            </span>

                            </a>
           
            
                              </h1>
                         </td>
                
                    </tr>

           @empty
         @endforelse


    </div> 

    
</div>
@endsection


