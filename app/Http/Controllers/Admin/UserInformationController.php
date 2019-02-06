<?php

namespace App\Http\Controllers\Admin;

use App\UserInfo;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'userName'=>'required|unique:userinfos|max:255',
            'firstName'=>'required',
            'lastName'=>'required',
            'address'=>'required',
            'city'=>'required',
            'country'=>'required',
            'postal'=>'required',
            'image'=>'required',
            'about'=>'required'
        ]);
        $user = new UserInfo();
        $slug = str_slug($request->userName);

        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('userImage')){
                Storage::disk('public')->makeDirectory('userImage');
            }
            $image = Image::make($image)->resize(1200,720)->stream();
            Storage::disk('public')->put('userImage/'.$imageName,$image);


        }else{
            $imageName = 'default.png';
        }
        $user->userName = $request->userName;
        $user->firsName = $request->lastName;
        $user->aboutName=$request->firstName;
        $user->lastt = $request->about;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->address= $request->address;
        $user->postal= $request->postal;
        $user->userId = Auth::User()->id;
        $user->profilePhoto = $imageName;
        $user->save();
        Toastr::success('Your profile updated successfully');
        return redirect()->route('admin.profile-hit');



    }

}
