<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
class ProfileController extends Controller
{
    function profileedit(){
      return view('admin.profile.index');
    }
    function profilepost(Request $request){
      $request->validate([
        'profile_name' => 'required'],[
          'profile_name.required' => 'Please Provite Your Profile Name'
      ]);
      User::find(Auth::id())->update([
        'name' => $request->profile_name
      ]);
    return back()->with('profile_update_status', 'Profile Name Change Successfully');
    }
    function passwordpost(Request $request){
      $request->validate([
        'old_password' => 'required',
        'password' => 'confirmed|required',
        'password_confirmation' => 'required'
      ]);
      if($request->old_password == $request->password){
        return back()->with('old_and_new_password_match', 'Please change Your New Password');
      }

       $old_password_from_user = $request->old_password;
       $password_from_user_db = Auth::user()->password;
      if(Hash::check($old_password_from_user, $password_from_user_db)){
        User::find(Auth::id())->update([
          'password' => Hash::make($request->password)
        ]);
        return back()->with('passwort_match_status','Password Change Successfully');
      }else{
        return back()->with('passwort_not_match_status', 'Password Not Match with Databash');
      }


    }
}
