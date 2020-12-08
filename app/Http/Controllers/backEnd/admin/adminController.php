<?php

namespace App\Http\Controllers\backEnd\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class adminController extends Controller
{
    public function home()
    {
    	return view('backEnd.admin.home');
    }

    public function login()
    {
        return view('backEnd.admin.login');
    }

    public function redirectToLogin()
    {
    	return redirect()->route('admin.login');
    }
    
    public function postLogin(Request $request)
    {
    	 $data = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'valid'    => 1
        );

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('errors', 'Email or password is not correct.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
