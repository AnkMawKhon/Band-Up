<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use File;
use App\Jam;
use App\User;
use App\Event;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*** Show all the users.***/
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('user.index', array('users' => $users));
    }

    /*** Show the profile of current user.***/
    public function profile()
    {
        $jams = User::find(Auth::user()->id)->jams;
        return view('user.profile', array('user' => Auth::user(), 'jams' => $jams));
    }

    /*** Show the profile of one user.***/
    public function userDetail($id)
    {
        $user = User::find($id);
        $jams = User::find($id)->jams;
        return view('user.userDetail', array('user' => $user, 'jams' => $jams));
    }

    /*** Update User Information.***/
    public function update(Request $request)
    {
        $this->validate($request, array (
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ));
        $user = User::find(Auth::user()->id);
        if($request->hasFile('avatar')) {
            if ($user->avatar !== 'default.jpg') {
                // $file = public_path('uploads/avatars/' . $user->avatar);
                $file = 'uploads/avatars/' . $user->avatar;
                //$destinationPath = 'uploads/' . $id . '/';
                if (File::exists($file)) {
                    unlink($file);
                }
            }
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->bio = $request->bio;
            $user->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();
        return redirect('user/profile');
    }
}
