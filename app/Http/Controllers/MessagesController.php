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
    
    
    
    
    public function index($profile_no){
 

    $user = auth()->user()->id;
  
//    $chat_recieved =  Message::where('profile_id',$user)->groupBy('user_id')->latest()->get()->reverse();

  //  $chat_sent = Message::where('user_id',$user)->orderBy('profile_id','DESC')->groupBy('profile_id')
   // ->latest()->paginate();
    // $messages = Message::where('user_id',$user)->groupBy('profile_id')->get();
    //$messages_recieved = Message:: where('profile_id',$user)->latest()->paginate(10);

//dd($chat_recieved);
    $user_following= auth()->user()->following()->pluck('profiles.user_id');
    $users = User:: wherein('id',$user_following)->get();

    
    

    if($user == $profile_no)
    {
        $profile_no1 = Message::where('profile_id',$user)->latest()->first(); //recieved
//->pluck('user_id')
$profile_no2 = Message::Where('user_id',$user)->latest()->first();          //sent

//->pluck('profile_id')
if($profile_no1==NULL && $profile_no2==NULL ){
$messages=NULL;
}

else{
if($profile_no2==NULL){
$profile_no = $profile_no1->where('profile_id',$user)->pluck('user_id')->first();
}
elseif($profile_no1 ==NULL){
$profile_no =$profile_no2->Where('user_id',$user)->pluck('profile_id')->first();

}
elseif($profile_no1->created_at < $profile_no2->created_at){
$profile_no =$profile_no2->profile_id;


}
else{

$profile_no = $profile_no1->user_id;
}

$messages = Message::Where('profile_id',$profile_no)->where('user_id',$user)->
    orWhere('profile_id',$user)->where('user_id',$profile_no)
      ->latest()->paginate(10);

}





}else{
    $messages = Message::Where('profile_id',$profile_no)->where('user_id',$user)->
    orWhere('profile_id',$user)->where('user_id',$profile_no)
      ->latest()->paginate(10);
}

    
    $profile = Profile::where('id',$profile_no)->get();


 return view('profiles.chat',compact(['user','users','messages','profile_no','profile']));
    
    
}


// public function show( $profile_no)
// {
//     $user = auth()->user()->id;
//     $profile = Profile::where('id',$profile_no)->get();
//     if($user == $profile_no)
//     {
//         return redirect('/profile/'.auth()->user()->id);
//     }
//     $messages = Message::Where('profile_id',$profile_no)->where('user_id',$user)->
//     orWhere('profile_id',$user)->where('user_id',$profile_no)
    
//     ->latest()->paginate(10);
    
//     return view('profiles.messages',compact('messages','profile_no','profile'));
    
    
    
    
// }
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
}
