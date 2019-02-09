<?php

namespace App\Http\Controllers\Author;

use App\Information;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserInformationController extends Controller
{
    public function myProfile(){
        $user = Information::where('user_id',Auth::user()->id)->first();
        return view('author.profile.index',[
            'user'=>$user
        ]);
    }
    public function myEdit(){
        return view('author.profile.edit');
    }
    public function store(Request $request){
        $this->validate($request,[
            'userName'=>'required|unique:information|max:255',
            'firstName'=>'required',
            'lastName'=>'required',
            'address'=>'required',
            'city'=>'required',
            'country'=>'required',
            'postal'=>'required',
            'image'=>'required',
            'about'=>'required',

        ]);
        $user = new Information();
        $slug = str_slug($request->userName);

        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('userImage')){
                Storage::disk('public')->makeDirectory('userImage');
            }
            $userImage = Image::make($image)->resize(400,400)->stream();
            Storage::disk('public')->put('userImage/'.$imageName,$userImage);
        }else{
            $imageName = 'default.png';
        }
        $user->userName = $request->userName;
        $user->firstName = $request->firstName;
        $user->lastName=$request->lastName;
        $user->about = $request->about;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->address= $request->address;
        $user->postal= $request->postal;
        $user->user_id= Auth::User()->id;
        $user->profilePhoto = $imageName;
        $user->save();
        Toastr::success('Your profile updated successfully');
        return redirect()->route('author.profile-hit');



    }
}
