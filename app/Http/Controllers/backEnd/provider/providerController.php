<?php

namespace App\Http\Controllers\backEnd\provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class providerController extends Controller
{
    public function home()
    {
    	return view('backEnd.provider.home');
    }
    public function login()
    {
    	return view('backEnd.provider.login');
    }
    public function postLogin(Request $request)
    {
    	 $data = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'valid'    => 1
        );

        if (Auth::guard('provider')->attempt($data)) {
            return redirect()->route('provider.home');
        } else {
            return redirect()->route('provider.login')->with('errors', 'Email or password is not correct.');
        }
    }

    public function logout()
    {
        Auth::guard('provider')->logout();
        return redirect()->route('provider.login');
    }
}
