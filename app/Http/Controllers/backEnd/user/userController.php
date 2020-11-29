<?php

namespace App\Http\Controllers\backEnd\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class userController extends Controller
{
    public function home()
    {
    	return view('backEnd.user.home');
    }
    public function login()
    {
    	return view('backEnd.user.login');
    }
    public function postLogin(Request $request)
    {
    	 $data = array(
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'valid'     => 1
        );

        if (Auth::guard('user')->attempt($data)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('errors', 'Email or password is not correct.');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
}
