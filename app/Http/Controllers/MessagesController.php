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

    $messages = Message::where('user_id', $user)->orwhere('profile_id',$user)->latest()->paginate(15)->get();
 
    return view('profiles.chat',compact('messages'));

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
        return redirect()->route('profile.show', $profile->id);

    }
    public function show( $profile)
    {
       $user = auth()->user()->id;

        $messages = Message::wherein('user_id', [$profile,$user])->latest()->paginate(2);
   
        return view('profiles.messages',compact('messages','profile'));

   
   
   
    }
}
