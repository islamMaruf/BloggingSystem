<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $totalPost = Post::count();
        $totalCategory = Category::count();
        $totalTag = Tag::count();
        $totalAuthor = User::count('role_id',2);
        return view('admin.dashboard',[
            'postCount' => $totalPost,
            'categoryCount' => $totalCategory,
            'authorCount'=>$totalAuthor,
            'tagCount'=>$totalTag
        ]);
    }
}
