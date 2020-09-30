<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calender_event;
use Redirect,Response;
use Auth;

class CalenderController extends Controller
{
    public function index() {
    	$user = Auth::user();
        $events = Calender_event::where('user_id', $user->id)->get();
        return view('calender', compact('events'));
    }

    public function add_cal_event() {
        $user = Auth::user();
    	return view('add_calendar_event', compact($user));
    }

    public function create_cal_event(Request $request) {
    	$this->validate($request, [
            'title' => 'required'
        ]);
        $event = new Calender_event();
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $user = Auth::user();
        $event->user_id = $user->id;
        $event->save();
    	return redirect('calendar');
    }
}
