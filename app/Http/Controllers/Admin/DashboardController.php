<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Notifications\AuthorApprovePost;
use App\Notifications\SendNotificationSubscriber;
use App\Post;
use App\Subscriber;
use App\Tag;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(){
        $totalPost = Post::count();
        $totalCategory = Category::count();
        $totalTag = Tag::count();
        $totalAuthor = User::where('role_id',2)->count();
        $totalPendingPost = Post::where('is_approved',false)->count();
        return view('admin.dashboard',[
            'postCount' => $totalPost,
            'categoryCount' => $totalCategory,
            'authorCount'=>$totalAuthor,
            'tagCount'=>$totalTag,
            'pendingPostCount'=>$totalPendingPost
        ]);
    }

    public function approve($id){
        $post = Post::find($id);
        if($post->is_approved ==false){
            $post->is_approved = true;
            $post->save();
//            $user = User::where('id',$post->user->id)->get();
//            Notification::send($user,new AuthorApprovePost($post));
            $post->user->notify(new AuthorApprovePost($post));
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber){
                Notification::route('mail',$subscriber->email)
                    ->notify(new SendNotificationSubscriber($post));
            }
            Toastr::success('Post is approved','Success');
        }else{
            Toastr::success('Post is already approved','Info');
        }
        return redirect()->back();
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
