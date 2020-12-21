<?php

namespace App\Http\Controllers\backEnd\provider; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\ProviderUserInfo;
use App\Provider_user; 
use Auth; 


class profileController extends Controller
{
    public function getUser() 
    { 
        $data = array(); 
        $data['provider_id'] = $provider_id = Auth::guard('provider')->id();
        $data['userInfo'] = ProviderUserInfo::valid()->find($provider_id);
        $data['ProvideruserInfo'] = Provider_user::valid()->find($provider_id);
        return view('backEnd.provider.userProfile.userProfile',$data); 
    }
    public function updateProfile(Request $request) 
    { 
        $output = array();
        $data = $request->all();
        $authId = Auth::guard('provider')->id();
        $result = Provider_user::find($authId)->update([
                "name"              => $request->name,
                "address"           => $request->address
        ]);
        $result = ProviderUserInfo::find($authId)->update([
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
        return redirect('provider/profile');

    }


    public function userImage() 
    {  
        $data = array(); 
        $data['provider_id'] = $provider_id = Auth::guard('provider')->id();
        $data['userInfo'] = ProviderUserInfo::valid()->find($provider_id);
        return view('backEnd.provider.userProfile.imagePage',$data); 
    }
    public function uplodeImage(Request $request) 
    {  
        $data = $request->image;
        $authId = Auth::guard('provider')->id();
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= "provider".time().'.png';
        $path = public_path() . "/backEnd/admin/assets/uploads/user/" . $image_name;

        file_put_contents($path, $data);

         $result = ProviderUserInfo::find($authId)->update([
            "image" => $image_name,
        ]);
        $result = Provider_user::find($authId)->update([
            "image" => $image_name,
        ]);
         
        toast('Your Photo Has Been Updated','success');
        return response()->json(['status'=>true]);

    }
    
}
