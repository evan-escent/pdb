<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function index() {
    	 $user = Auth::user();
        return view('account', compact('user'));
	}
}