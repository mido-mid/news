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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//admin

Route::group(['middleware' => ['auth','admin']],function() {
    Route::get('/dashboard',function (){
        return view('Admin.dashboard');
    })->name('dashboard');
    Route::resource('admins', 'AdminController');
    Route::resource('categories','CategoriesController');
    Route::resource('users','CategoriesController');
    Route::get('admin/profile', 'ProfileController@edit')->name('admin.profile');
    Route::put('admin/profile', 'ProfileController@update')->name('admin.profileupdate');
    Route::put('admin/profile/password', 'ProfileController@password')->name('admin.profilepassword');
});
