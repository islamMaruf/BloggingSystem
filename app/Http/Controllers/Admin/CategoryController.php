<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.Category.categories',[
            'categories'=> $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
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
        $this->validate($request,[
            'name'=> 'required|min:3|unique:categories',
            'image' => 'required|mimes:jpg,png,jpeg,bmp'
        ]);
        $image = $request->file('image');
        $name = $request->name;
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }
            $category = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('category/'.$imageName,$category);
        }else{
            $imageName = "default.png";
        }
        $category = new Category();
        $category['name'] = $name;
        $category['slug']= $slug;
        $category['image'] = $imageName;
        $category->save();
        Toastr::success('Category Successfully Saved' ,'Success');
        return redirect()->route('admin.categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::latest()->get();
        return view('admin.Category.categories-edit',[
            'categories'=>$categories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($request, $id)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|unique:categories',
            'image' => 'required|mimes:jpg,png,jpeg,bmp'
        ]);
        $image = $request->file('image');
        $name = $request->name;
        $slug = str_slug($request->name);
        $category =Category::find($id);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }
            if(Storage::disk('public')->exists('category/'.$category->image)){
                Storage::disk('public')->exists('category/'.$category->image)->delete();
            }else{
                $categoryName = Image::make($image)->resize(1600,479)->stream();
                Storage::disk('public')->put('category/'.$imageName,$categoryName);
            }
        }else{
            $imageName = "default.png";
        }
        $category['name'] = $name;
        $category['slug']= $slug;
        $category['image'] = $imageName;
        $category->save();
        Toastr::success('Category Successfully Updated' ,'Warning');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
