<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Notifications\NewAuthorPost;
use App\Post;
use App\Tag;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user.info')
            ->where('user_id',Auth::user()->id)
            ->latest()
            ->get();
        return view('author.Post.posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.Post.posts_edit',[
            'categories'=>$categories,
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required|min:5',
            'image'=>'required',
            'category'=>'required',
            'tag'=>'required',
            'body'=>'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            $postImage = Image::make($image)->resize(1680,1066)->stream();
            Storage::disk('public')->put('post/'.$imageName,$postImage);
        }else{
            $imageName = 'default.png';
        }
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->user_id = Auth::User()->id;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->publish)){
            $post->status = true;
        }else{
            $post->status = false;
        }

        if(Auth::User()->role->id == 1) {
            $post->is_approved = true;
        }else{
            $post->is_approved = false;
        }
        $post->save();
        $post->categories()->attach($request->category);
        $post->tags()->attach($request->tag);
        $user = User::where('role_id',1)->get();
        Notification::send($user, new NewAuthorPost($post));
        Toastr::success('Post Successfully Saved' ,'Success');
        return redirect()->route('author.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('author.Post.post_view',[
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $category = Category::all();
        return view('author.Post.posts_update',[
            'post'=>$post,
            'categories'=>$category,
            'tags'=>$tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'image'=>'required',
            'category'=>'required',
            'tag'=>'required',
            'body'=>'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }
            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $postImage = Image::make($image)->resize(1680,1066)->stream();
            Storage::disk('public')->put('post/'.$imageName,$postImage);
        }else{
            $imageName = 'default.png';
        }

        $post->title = $request->title;
        $post->slug = $slug;
        $post->user_id = Auth::User()->id;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->publish)){
            $post->status = true;
        }else{
            $post->status = false;
        }

        if(Auth::User()->role->id == 1) {
            $post->is_approved = true;
        }else{
            $post->is_approved = false;
        }
        $post->save();
        $post->categories()->sync($request->category);
        $post->tags()->sync($request->tag);
        Toastr::success('Post Successfully Updated' ,'Success');
        return redirect()->route('author.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {

        if(Storage::disk('public')->exists('post/'.$post->image )){
            Storage::disk('public')->delete('post/'.$post->image);
        };
        $post ->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post Successfully Deleted','Success');
        return redirect()->back();
    }
}
