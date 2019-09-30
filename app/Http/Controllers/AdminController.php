<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\Jam;
use App\Admin;
use Image;
use Exception;
use Embed;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    
    /*** Show the Admin Upload page.***/
    public function adminUpload()
    {
        return view('admin.adminUpload');
    }
    /*** Create a new Admin.***/
    public function adminCreate(Request $request)
    {
        $this->validate($request, array (
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required |string|min:6',
        ));
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('success', 'New admin has been added.');
    }

    /*** Show the Event Upload page.***/
    public function eventUpload()
    {
        return view('admin.eventUpload');
    }

    /*** Create a new Event.***/
    public function eventCreate(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'lat' => 'required|gt:0',
            'lng' => 'required|gt:0',
        ));
        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time().'.'.$picture->getClientOriginalExtension();
            Image::make($picture)->save( public_path('uploads/events/' . $filename) );
            $event = new Event();
            $event->name = $request->name;
            $event->picture = $filename;
            $event->description = $request->description;
            $event->lat = $request->lat;
            $event->lng = $request->lng;
            $event->youtube = $this->YoutubeID($request->youtube);
            if($event->youtube) {
                info($event->youtube);
            }
            $event->date = $request->date;
            $event->save();
            $request->session()->flash('alert-success', 'User was successful added!');
            return redirect('admin/event/upload')->with('success', 'Event has been uploaded successfully.');
        }
    }

    /*** Using Embed Youtube.***/
    function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }

    /*** Show the Delete Jam Session page.***/
    public function jamDelete() 
    {
        $jams = Jam::all();
        return view('admin.jamDelete', array('jams' => $jams));
    }

    /*** Delete Jam Sessions.***/
    public function jamRemove(Request $request)
    {
        $id = $request->id;
        $deleteJam = Jam::find($id);
        $deleteJam->delete();
        return('deleted');
    }
}
