<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;

class UsersController extends Controller {

  public function dashboard(){
    return view('dashboard', array('user'=>auth::user()));
  }
  public function update_avatar(Request $request){
    $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg']);
    $user=Auth::user();
    $avatar = $request->file('avatar');
    $filename = $user ->id.'_avatar' .time() .'.'.$avatar->getClientOriginalExtension();
    Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'.$filename));
    $request->user()->avatar=$filename;
    $request->user()->save();
    //$filename = $user ->id.'_avatar'.time() .'.'.request()->avatar->getClientOriginalExtension();
    //$request->avatar->storeAs('uploads/avatar/',$filename);
    //$user->avatar =$filename;
    //$user->save();
    return back()->with('success','You have successfully uploaded image.');
  }
    //handle user upload avatar
    //if($request->hasFile('avatar')){
       //$avatar = $request->file('avatar');
      // $filename = time() .'.'.$avatar->getClientOriginalExtension();
       //Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/' . $filename));

       //$user=Auth::user();
       //$user->avatar =$filename;
       //$user->save();
    //}
    //return view('dashboard', array('user'=>auth::user()));
  //}

  
}