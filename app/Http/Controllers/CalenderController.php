<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calender_event;
//use Maximof\Laravel8Calendar;
use Redirect,Response;


class CalenderController extends Controller
{
    public function index() {
        return view('calender');
    }
}
