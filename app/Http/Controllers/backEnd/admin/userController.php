<?php

namespace App\Http\Controllers\backEnd\admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
Use Mail;
Use Hash;
use App\User;
use App\UserUserInfo;
use App\Admin; 
use Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = array(); 
        $data['userInfos'] = User::valid()->orderBy('id', 'DESC')->get();
        return view('backEnd.admin.users.listData',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.admin.users.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $admin_id = Auth::guard('admin')->id();


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

       

        if ($validator->passes()) {
            User::create([
                'admin_id'                  => $admin_id,
                'name'                      => $request->name,
                'email'                     => $request->email
            ]);
            $user_id=User::valid()->latest('id')->first();
            // echo "<pre>";
            // print_r($user_id->id);
            // exit();

            UserUserInfo::create([
                'user_id' => $user_id->id,
            ]);

            //email send
            $details = [
                'link' => url('userVarification/'.$user_id->id),
                'userName' => $request->name,
            ];

            \Mail::to($user_id->email)->send(new \App\Mail\MyTestMail($details));
           

            toast('User Created Successfully','success');
            return redirect()->route('admin.users.index');
        }
        if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        dd("kaj cholse");
        return view('backEnd.admin.users.show'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('backEnd.admin.users.edit',$data); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->update(['valid' => 0]);
        $user->delete();

        $userInfo = UserUserInfo::where('user_id', $id)->first();
        $userInfo->update(['valid' => 0]);
        $userInfo->delete();

        toast('User Deleted Successfully','success');
    }
}
