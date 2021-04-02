<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image;
class ProfilesController extends Controller
{
    

    public function index(User $user)
    {
        
  
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postscount= Cache::remember('count.posts.'.$user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        }  );
        $followerscount =Cache::remember('count.followers.'.$user->id, now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        }  );
         
        $followingcount = Cache::remember('count.following.'.$user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        }  );

        return view('profiles.index', compact('user', 'follows','postscount','followerscount','followingcount'));
    }


    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }







    public function update(User $user){
        $this->authorize('update',$user->profile);


            $data =request()->validate([
                'title' => 'required',
                'description'=>'required',
                'url'=>'required',
                'image'=>'',

            ]);

                    if(request('image')){
                        $imagePath = request('image')->store('profile','public');
                        $image =Image::make (public_path("storage/{$imagePath}"))->fit(1000,1000);
                        $image->save();
                        
                        
                        $imageArray = ['image'=> $imagePath];
                    }


            
            auth()->user()->profile->update(array_merge(
                $data,
                $imageArray ?? []
            ));


            return redirect("/profile/{$user->id}");



    }

    public function settings(User $user){
            $this->authorize('update',$user->profile);
        $user=auth()->user();
            return view("/profiles/settings",compact('user'));
        }
        public function changeusername(Request $request){
            $user=auth()->user()->id;
            $username = $request->validate([
                
                'username' => 'required|string|max:255|unique:users',
            ]);
            User::where('id',$user)->update(['username'=>$username['username']]);
            
            return redirect("/profile/{$user}/settings");
        }
        
        public function changeemail(Request $request){
            $user=auth()->user()->id;
            $email = $request->validate([
                
                'email' => 'required|string|email:strict|max:255|unique:users',
            ]);
           
            User::where('id',$user)->update(['email'=>$email['email']]);
            return redirect("/profile/{$user}/settings");
        }
        public function changepassword(Request $request){
            $user=auth()->user()->id;

            $password =$request->validate([
                
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]); 
            
            
            
            $newpassword=Hash::make($request->password);
            User::where('id',$user)->update(['password'=>$newpassword]);
            return redirect("/profile/{$user}/settings");
        }
        public function deleteuser(){
            $user=auth()->user()->id;
            
            $profile= User::where('id',$user);
        
            $profile->delete();
            return redirect("/");
        }
}
