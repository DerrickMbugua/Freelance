<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use \Auth;

class ProfileController extends Controller
{
    //
    public function show(){
        $show=Profile::where('user_id',Auth::user()->id)->get();
      // $show=Profile::all();
return view('profile')->with('show',$show);
    }
    
    public function create(Request $req){
        $User = Auth::user();
        if($User->profile){
            abort(500);
        }
        $profile=new Profile;
        $profile->overview=$req->overview;
        $profile->english_proficiency=$req->english_proficiency;
        $profile->experience_level=$req->experience_level;
        $profile->skills=$req->skills;
        $profile->hourly_rate=$req->hourly_rate;
        $profile->user_id=$req->user_id;        
       $User->profile()->save($profile);        
        $req->session()->flash('status','Profile has been created successfully');
        return redirect('profile');
    }

    //view profile on client side
    public function profile($id){
$profile=Profile::where('user_id',$id)->get();
return view('viewprofile',['profile'=>$profile]);
    }
}
