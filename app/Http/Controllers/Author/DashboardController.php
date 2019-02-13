<?php

namespace App\Http\Controllers\Author;

use App\Post;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $post = Auth::User()->posts()->latest()->get();

        return view('author.dashboard',[
            'post'=>$post
        ]);
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
