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


Route::get('/',[
   'uses'=> 'HomeController@index',
   'as'=>'home-index'
]);

Auth::routes();
Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=> ['auth','admin']],function (){

    Route::get('/dashboard',[
        'uses'=> 'DashboardController@index',
        'as'=> 'dashboard-hit'
    ]);
    Route::resource('tags','TagController');
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::resource('users','UserController');
    Route::put('approve/{id}/post',[
        'uses'=>'DashboardController@approve',
        'as'=>'approve'
    ]);

    Route::put('status/{id}/post',[
        'uses'=>'DashboardController@status',
        'as'=>'status'
    ]);

    Route::get('/my-profile',[
       'uses'=>'UserInformationController@myProfile',
       'as'=>'profile-hit'
    ]);
    Route::get('/my-edit',[
        'uses'=>'UserInformationController@myEdit',
        'as'=>'edit-hit'
    ]);

    Route::post('/profile-store',[
        'uses'=>'UserInformationController@store',
        'as'=>'store-info'
    ]);
    Route::get('/pending',[
        'uses'=>'PendingController@index',
        'as'=> 'pending-post'
    ]);
    Route::get('/subscriber',[
        'uses'=> 'SubscriberController@index',
        'as'=>'subscriber'
    ]);
    Route::delete('/subscriber/delete/{id}',[
        'uses' =>'SubscriberController@destroy',
        'as'=>'subscriber.delete'
    ]);

});
Route::group(['as'=> 'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard-hit');
    Route::resource('posts','PostController');
    Route::put('status/{id}/post',[
        'uses'=>'DashboardController@status',
        'as'=>'status'
    ]);
    Route::get('/my-profile',[
        'uses'=>'UserInformationController@myProfile',
        'as'=>'profile-hit'
    ]);
    Route::get('/my-edit',[
        'uses'=>'UserInformationController@myEdit',
        'as'=>'edit-hit'
    ]);

    Route::post('/profile-store',[
        'uses'=>'UserInformationController@store',
        'as'=>'store-info'
    ]);
});


