<?php

namespace App\Http\Controllers\backEnd\user;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
Use Hash;
use App\User;
use App\UserUserInfo;
use App\Admin; 
use Auth;

class userVarifiController extends Controller
{

    public function userVarification($id){

        $data = array(); 
        $data['id'] = $id;
        return view('backEnd.user.userProfile.password',$data); 
    }
    public function updatePassword(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6'
        ]);
        $hashedPassword = Hash::make($request->password);

        if ($validator->passes()) {
          
            User::find($id)->update([
                "password"        => $hashedPassword,
                "emailVerification"   => 1
            ]);

            return redirect()->route('user.login');
        }
        if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
       
    }


}
