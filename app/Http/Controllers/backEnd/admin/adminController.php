<?php

namespace App\Http\Controllers\backEnd\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
Use Alert;
use App\AdminUserInfo;
use App\Admin;


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

        $remember_me = $request->has('remember_me') ? true : false; 

        if (Auth::guard('admin')->attempt($data, $remember_me)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('errors', 'Something is Wrong');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function resetPassword(){
        return view('backEnd.admin.resetPassword');
    }

    public function resetEmail(Request $request){

        $data =  $request->all();
        $admin = Admin::where('email', '=', $request->email)->first();
        if ($admin === null) {
            toast('Wrong Mail','error');
            return view('backEnd.admin.resetPassword');
        }else{
             $details = [
                'link' => url('admin/resetPasswordShow/'.$admin->id),
                'userName' => $admin->name,
            ];

            \Mail::to($admin->email)->send(new \App\Mail\ResetPassword($details));
            Alert::success("Please cheaqe Your Mail.", "Hi! $admin->name We will send you instructions in email");
            return view('backEnd.admin.resetPassword');
        }

    }

    public function resetPasswordShow($id){

        $data = array(); 
        $data['id'] = $id;
        return view('backEnd.admin.updatePassword',$data); 
    }
    public function updatePassword(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);
        $hashedPassword = Hash::make($request->password);

        if ($validator->passes()) {
          
            Admin::find($id)->update([
                "password"        => $hashedPassword,
            ]);

            return redirect()->route('admin.login');
        }
        if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
       
    }

}
