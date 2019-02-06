<?php

namespace App\Http\Controllers\Admin;

use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInformationController extends Controller
{
    //

    public function myProfile(){
        return view('admin.profile.index');
    }
    public function myEdit(){
        return view('admin.profile.edit');
    }
    public function store(Request $request){
        $this->validate($request,[
            'userName'=>'required|unique:userinfos|max:255'
        ]);
        $user = new UserInfo();

    }

}
