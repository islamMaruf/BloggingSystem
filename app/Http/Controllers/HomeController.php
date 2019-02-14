<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index(){
        $posts =  Post::with('categories','user.info')->where('status',1)->where('is_approved',1)->get();
        return view('layouts.fontend.multiplepost',[
            'posts'=>$posts
        ]);
    }
}
