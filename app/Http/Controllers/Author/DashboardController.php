<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('author.dashboard');
    }
    public function status($id)
    {
        $post = Post::find($id);
        if($post->status ==false){
            $post->status = true;
            $post->save();
            Toastr::success('Post is published','Success');
        }else{
            Toastr::success('Post already published','Info');

        }
        return redirect()->back();
    }
}
