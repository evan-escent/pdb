<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calender_event;
use Redirect,Response;


class CalenderController extends Controller
{
    public function index() {
        return view('calender');
    }

    public function add_cal_event() {
    	return view('add_calendar_event');
    }
}
