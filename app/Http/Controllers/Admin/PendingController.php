<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingController extends Controller
{
    public function index()
    {
        $post = Post::where('is_approved',false)->latest()->get();
        return view('admin.PendingPost.pending-post',[
            'posts'=>$post
        ]);
    }
}
