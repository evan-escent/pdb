<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calender_event;
use Redirect,Response;


class CalenderController extends Controller
{
    public function index() {
    	$events = [];
    	$data = Calender_event::all();
    	if ($data->count()) {
    		foreach ($data as $key => $value) {
    			$events[] = \Calendar::event(
    				$value->title,
    				true,
    				new \DateTime($value->start),
    				new \DateTime($value->end.' +1 day')
    			);
    		}
    	}
    $calendar = \Calendar::addEvents($events);
    return view('calender', compact('calendar'));
    }
}
