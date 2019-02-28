<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: maruf
 * Date: 28-Feb-19
 * Time: 1:19 PM
 */

class CategoryTagSeeder extends Seeder
{
    public function run(){
        $categories = ['Web Development','Mobile Application Development','Operating System','IOS','Machine Learning','Social Media','Iot'];
        $tags = ['PHP','HTML','CSS','JAVASCRIPT','JAVA','JQUERY','AJAX','XML','JAVA','PYTHON','C','C++','LARAVEL','DJANGO','BOOTSTRAP','MATERIAL CSS','FOUNDATION','C#','OBJECT ORIENTED PROGRAMING','ARDUINO'];
        for($i=0;$i<=count($categories);$i++) {
            DB::table('categories')->insert([
                'name'=> $categories[$i],
                'slug'=> str_slug($categories[$i]),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
        foreach ($tags as $tag ){
            DB::table('tags')->insert([
                'tagName'=> $tag,
                'tagSlug'=>str_slug($tag),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }

    }

}