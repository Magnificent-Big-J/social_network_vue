<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
class profilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug',$slug)->first();

        return view('profiles.profile',compact('user'));
    }
    public function edit($slug)
    {
        $user = User::where('slug',$slug)->first();

        return view('profiles.edit',compact('user'));
    }
    public function update(Request $r)
    {


        $this->validate($r,[
            'about'=>'required|max:255',
            'location'=>'required'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about
        ]);
        if($r->hasFile('avatar'))
        {
            $avatar = $r->file('avatar');
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('avatars/',$avatar_new_name);
            Auth::user()->update([
               'avatar'=>'avatars/'.$avatar_new_name
            ]);
        }
       // dd(Auth::user()->profile);

        session::flash('success','Profile successfully updated.');
       return redirect()->back();
    }
}
