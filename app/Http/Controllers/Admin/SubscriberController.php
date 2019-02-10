<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.subscriber',[
            'subscribers'=> $subscribers
        ]);


    }

    public function destroy($id){
         Subscriber::findOrFail($id)->delete();

        Toastr::success('Subscriber deleted successfully','Success');
        return redirect()->back();

    }
}
