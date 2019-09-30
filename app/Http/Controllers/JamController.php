<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Jam;
use Illuminate\Support\Facades\Validator;

class JamController extends Controller
{
    public function index()
    {
        $jams = Jam::all();
        return view('jam.index',  array('jams' => $jams));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload()
    {
        return view('jam.jamUpload', array('user' => Auth::user()));
    }

    public function create(Request $request)
    {
        $this->validate($request, array (
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'audio' => 'required|mimes:mpga,wav|max:2000',
        ));
        
        if($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $filename = time().'.'.$audio->getClientOriginalExtension();
            $audio->move( 'uploads/jams/', $filename );
            $jam = new Jam;
            $jam->src = $filename;
            $jam->name = $request->name;
            $jam->des = $request->description;
            $jam->user_id = Auth::user()->id;
            $jam->save();
            return redirect('jam');
        }
        return redirect('jam/upload');
    }
}
