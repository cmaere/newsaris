<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests;

class login extends Controller
{
	public function authenticate()
	    {
	        if (Auth::attempt(['email' => $email, 'password' => $password]))
	        {
	            return redirect()->intended('main');
	        }
	    }
}
