<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//user

Route::get('/', 'MainController@index')->name('main');
Route::resource('news','NewsController');
Route::resource('categories','CategoriesController');



//admin

Route::group(['middleware' => ['auth','admin']],function() {
    Route::get('/home','Admin\HomeController@index')->name('home');
    Route::resource('admins', 'Admin\AdminController');
    Route::resource('admin-categories','Admin\CategoriesController');
    Route::get('admin/profile', 'Admin\ProfileController@edit')->name('admin.profile');
});

Route::resource('admin-news','Admin\NewsController');
