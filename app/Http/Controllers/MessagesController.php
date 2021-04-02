<?php

namespace App\Http\Controllers;
use App\Message;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessagesController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

  


public function index(){

    $user = auth()->user()->id;
    $messages =
// Message::where('user_id', $user)->orwhere('profile_id',$user)->count() ? 
Message::where('user_id', $user)->orwhere('profile_id',$user)
->latest()->paginate(15);
$user_following= auth()->user()->following()->pluck('profiles.user_id');
$users = User:: wherein('id',$user_following)->get();
     return view('profiles.chat',compact(['messages','user','users']));
    
    
}


    public function store(Request $request)
    {
        $profile = Profile::findOrFail($request->profile_id);
        $user=$request->profile_id;
        Message::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'profile_id' => $request->profile_id ,
        ]);
     return redirect('/message/'.$user);

    }
    public function show( $profile)
    {
       $user = auth()->user()->id;
       if($user == $profile)
       {
           return redirect('/profile/'.auth()->user()->id);
       }
        $messages = Message::Where('profile_id',$profile)->where('user_id',$user)->
        orWhere('profile_id',$user)->where('user_id',$profile)

        ->latest()->paginate(12);
       
          return view('profiles.messages',compact('messages','profile'));

   
   
   
    }
}
