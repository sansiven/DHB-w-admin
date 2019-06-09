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

/* 
Two approachhes to protect asmin routes
1. With Sessions 
    - We will start asmin session at the time of successful logn and the compare that session variable in every admin function like in dashboard function in our case. This approach is the simplest approach which we will use in many cases. 
    
2. With Middleware
    - Middleware we basically use for user's authentication in laravel.
    - We will add Route::group that will contain all our admin routes that needs protection.
    Also we need tomake changes in RedirectIfAuthenticated.php file of laravel from where we redirect to login page 
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');  
    Route::get('/admin/settings', 'AdminController@settings'); 
    Route::get('/admin/check-pwd', 'AdminController@chkPassword'); 
    Route::match(['get','post'],'/admin/update-pwd', 'AdminController@updatePassword');
    Route::match(['get','post'],'/admin/header_contents/add','TitleContentsController@add');
    Route::resource('/admin/header_contents','TitleContentsController');
    Route::resource('/admin/about_contents', 'AboutContentsController');
});

Route::get('/logout', 'AdminController@logout');

