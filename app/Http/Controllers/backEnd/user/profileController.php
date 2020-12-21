<?php

namespace App\Http\Controllers\backEnd\user; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\UserUserInfo;
use App\User; 
use Auth; 


class profileController extends Controller
{
    public function getUser() 
    { 

        $data = array(); 
        $data['user_id'] = $user_id = Auth::guard('user')->id();
        $data['userInfo'] = UserUserInfo::valid()->find($user_id);
        $data['UseruserInfo'] = User::valid()->find($user_id);
        return view('backEnd.user.userProfile.userProfile',$data); 
    }
    public function updateProfile(Request $request) 
    { 
        $output = array();
        $data = $request->all();
        $authId = Auth::guard('user')->id();
        $result = User::find($authId)->update([
                "name"              => $request->name,
                "address"           => $request->address

        ]);
        $result = UserUserInfo::find($authId)->update([
                "surname"           => $request->surname,
                "designation"       => $request->designation,
                "mobile"            => $request->mobile,
                "office_phone"      => $request->office_phone,
                "fax"               => $request->fax,
                "dob"               => $request->dob,
                "gender"            => $request->gender,
                "about"             => $request->about
        ]);
        // if ($result == true) {
        //     $output['status']  = 1;
        //     $output['message'] = 'Profile has been Updated';
        //     return response()->json($output);
        // } else {
        //     $output['status']  = 0;
        //     $output['message'] = 'Profile has not been Updated';
        //     return response()->json($output);
        // } 
        toast('Your Profile Has Been Updated','success');
        return redirect('profile');

    }


    public function userImage() 
    {  
        $data = array(); 
        $data['user_id'] = $user_id = Auth::guard('user')->id();
        $data['userInfo'] = UserUserInfo::valid()->find($user_id);
        return view('backEnd.user.userProfile.imagePage',$data); 
    }
    public function uplodeImage(Request $request) 
    {  
        $data = $request->image;
        $authId = Auth::guard('user')->id();
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= "user".time().'.png';
        $path = public_path() . "/backEnd/admin/assets/uploads/user/" . $image_name;

        file_put_contents($path, $data);

         $result = UserUserInfo::find($authId)->update([
            "image" => $image_name,
        ]);
        $result = User::find($authId)->update([
            "image" => $image_name,
        ]);
        toast('Your Photo Has Been Updated','success');
        return response()->json(['status'=>true]);

    }
    
}
