<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: maruf
 * Date: 28-Feb-19
 * Time: 1:19 PM
 */
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Web Development', 'Mobile Application Development', 'Operating System', 'IOS', 'Machine Learning', 'Social Media', 'Iot'];
        $tags = ['PHP', 'HTML', 'CSS', 'JAVASCRIPT', 'JAVA', 'JQUERY', 'AJAX', 'XML', 'JAVA', 'PYTHON', 'C', 'C++', 'LARAVEL', 'DJANGO', 'BOOTSTRAP', 'MATERIAL CSS', 'FOUNDATION', 'C#', 'OBJECT ORIENTED PROGRAMING', 'ARDUINO'];
        foreach ($categories as $category){
            DB::table('categories')->insert([
               'name'=> $category,
               'slug'=>str_slug($category),
               'created_at'=> now(),
               'updated_at'=>now()
            ]);
        }
        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'tagName' => $tag,
                'tagSlug' => str_slug($tag),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
