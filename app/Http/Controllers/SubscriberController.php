<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //



    public function store(Request $request){
        $this->validate($request,[
           'email' => 'required|email|unique:subscribers'
        ]);

        $subscribe = new Subscriber();
        $subscribe->email = $request->email ;
        $subscribe->save();
        Toastr::success('You successfully added to your subscriber list','Success');
        return redirect()->back();

    }
}
