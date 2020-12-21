<?php

namespace App\Http\Controllers\backEnd\admin; 

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\AdminUserInfo;
use App\Admin; 
use Auth; 


class profileController extends Controller
{
    public function getUser() 
    { 

        $data = array(); 
        $data['admin_id'] = $admin_id = Auth::guard('admin')->id();
        $data['userInfo'] = AdminUserInfo::valid()->find($admin_id);
        $data['AdminUserInfo'] = Admin::valid()->find($admin_id);
        return view('backEnd.admin.userProfile.userProfile',$data); 
    }
    public function updateProfile(Request $request) 
    { 
        $output = array();
        $data = $request->all();
        $authId = Auth::guard('admin')->id();
        $result = Admin::find($authId)->update([
                "name"              => $request->name,
                "address"           => $request->address

        ]);
        $result = AdminUserInfo::find($authId)->update([
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
        return redirect('admin/profile');

    }


    public function userImage() 
    {  
        $data = array(); 
        $data['admin_id'] = $admin_id = Auth::guard('admin')->id();
        $data['userInfo'] = AdminUserInfo::valid()->find($admin_id);
        return view('backEnd.admin.userProfile.imagePage',$data); 
    }
    public function uplodeImage(Request $request) 
    {  
        $data = $request->image;
        $authId = Auth::guard('admin')->id();
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= "admin".time().'.png';
        $path = public_path() . "/backEnd/admin/assets/uploads/user/" . $image_name;

        file_put_contents($path, $data);

         $result = AdminUserInfo::find($authId)->update([
            "image" => $image_name,
        ]);
        Admin::find($authId)->update([
            "image" => $image_name,
        ]);
        toast('Your Photo Has Been Updated','success');
        return response()->json(['status'=>true]);

    }
    
}
