<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\User;
use Auth;
use Image;
use Exception;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*** Show the Event page.***/
    public function index()
    {
        $events = Event::all();
        return view('event.index', array('events' => $events));
    }

    /*** Show the Event detail page.***/
    public function eventDetail($id)
    {
        $event = Event::find($id);
        return view('event.eventDetail', array('event' => $event));
    }

    /*** Joining an Event.***/
    public function eventJoin(Request $request)
    {
            try {
            $user_id = Auth::user()->id;
            $event_id = $request->event_id;
            $event = Event::find($event_id);
            $user = User::find($user_id);
            $event->users()->attach($user);
            $success = 'You have successfully joined the event.';
            return redirect()->back()->with('success', $success);
        }catch(Exception $exception) {
            $error = 'You have alerady joined the event.';
            return redirect()->back()->with('error', $error);;
        }
}

}
