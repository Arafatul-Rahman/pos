<?php

namespace App\Http\Controllers\backEnd\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
Use Alert;
use App\User;

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
    public function resetPassword(){
        return view('backEnd.user.resetPassword');
    }

    public function resetEmail(Request $request){

        $data =  $request->all();
        $user = User::where('email', '=', $request->email)->first();
        if ($user === null) {
            toast('Wrong Mail','error');
            return view('backEnd.user.resetPassword');
        }else{
             $details = [
                'link' => url('resetPasswordShow/'.$user->id),
                'userName' => $user->name,
            ];

            \Mail::to($user->email)->send(new \App\Mail\userResetPassword($details));
            Alert::success("Please cheaqe Your Mail.", "Hi! $user->name We will send you instructions in email");
            return view('backEnd.user.resetPassword');
        }

    }

    public function resetPasswordShow($id){

        $data = array(); 
        $data['id'] = $id;
        return view('backEnd.user.updatePassword',$data); 
    }
    public function updateResetPassword(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);
        $hashedPassword = Hash::make($request->password);

        if ($validator->passes()) {
          
            User::find($id)->update([
                "password"        => $hashedPassword,
            ]);

            return redirect()->route('user.login');
        }
        if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
       
    }
}
