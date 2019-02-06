<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $totalPost = Post::count();
        $totalCategory = Category::count();
        $totalTag = Tag::count();
        $totalAuthor = User::where('role_id',2)->count();
        return view('admin.dashboard',[
            'postCount' => $totalPost,
            'categoryCount' => $totalCategory,
            'authorCount'=>$totalAuthor,
            'tagCount'=>$totalTag
        ]);
    }

    public function approve($id){
        $post = Post::find($id);
        if($post->is_approved ==false){
            $post->is_approved = true;
            $post->save();
            Toastr::success('Post is approved','Success');
        }else{
            Toastr::success('Post is already approved','Info');
        }
        return redirect()->back();
    }
}
