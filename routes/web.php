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
    Route::resource('admins-sponsors','Admin\SponsorsController');
    Route::get('admin/pending_news', 'Admin\NewsController@getPendingNews')->name('admin.pending_news');
    Route::put('admin/approve_news', 'Admin\NewsController@approveNew')->name('admin.approve_news');
    Route::get('admin/profile', 'Admin\ProfileController@edit')->name('admin.profile');
    Route::put('admin/profile/{id}', 'Admin\ProfileController@update')->name('admin.profile.update');
});

Route::resource('admin-news','Admin\NewsController');
