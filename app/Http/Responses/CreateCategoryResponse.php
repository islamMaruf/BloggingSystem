<?php
/**
 * Created by PhpStorm.
 * User: maruf
 * Date: 24-Jan-19
 * Time: 7:56 PM
 */

namespace App\Http\Responses;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


use Illuminate\Contracts\Support\Responsable;

class CreateCategoryResponse implements Responsable
{

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request)
    {
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
}