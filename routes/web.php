<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$router = app('router');
$router->get('/',function (){
    return view('layouts.fontend.multiplepost');
})->name('home');

$router->get('/hello',function (){
    return view('layouts.fontend.singlePost');
});




Auth::routes();



Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=> ['auth','admin']],function (){
    Route::get('/dashboard',[
        'uses'=> 'DashboardController@index',
        'as'=> 'dashboard-hit'
    ]);

    Route::resource('tags','TagController');
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::put('approve/{id}/post',[
        'uses'=>'DashboardController@approve',
        'as'=>'approve'
    ]);

    Route::get('/my-profile',[
       'uses'=>'UserInformationController@myProfile',
       'as'=>'profile-hit'
    ]);
    Route::get('/my-edit',[
        'uses'=>'UserInformationController@myEdit',
        'as'=>'edit-hit'
    ]);

    Route::get('/profile-store',[
        'uses'=>'UserInformationController@store'
    ]);

});
Route::group(['as'=> 'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard-hit');
});


