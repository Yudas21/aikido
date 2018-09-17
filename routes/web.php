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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect(url(''));
});
Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('gallery/foto', 'GalleryController@foto');
Route::get('gallery/video', 'GalleryController@video');
Route::get('news', 'NewsController@index');
Route::get('schedule', 'ScheduleController@index');

Route::get('login', 'LoginController@index');
Route::post('login/check_login', 'LoginController@checkLogin');
Route::get('login/forgotpassword', 'LoginController@forgotPassword');
Route::post('login/pforgotpassword', 'LoginController@pForgotPassword');
Route::get('admin/dashboard', 'AdminController@index');
Route::get('admin/logout', 'AdminController@logout');
Route::get('admin/profile', 'AdminController@profile');
Route::patch('admin/update_profile/{profile}', 'AdminController@profile_update');
Route::patch('admin/update_password/{profile}', 'AdminController@password_update');

// Menu 
Route::get('admin/menu', 'AdminController@menu');
Route::get('admin/add_menu', 'AdminController@menu_add');
Route::post('admin/padd_menu', 'AdminController@menu_store');
Route::get('admin/update_menu/{menu}', 'AdminController@menu_update');
Route::patch('admin/pupdate_menu/{menu}', 'AdminController@menu_pupdate');
Route::post('admin/delete_menu/{menu}', 'AdminController@menu_destroy');

Route::get('admin/level', 'AdminController@level');
Route::get('admin/add_level', 'AdminController@level_add');
Route::post('admin/padd_level', 'AdminController@level_store');
Route::get('admin/update_level/{level}', 'AdminController@level_update');
Route::patch('admin/pupdate_level/{level}', 'AdminController@level_pupdate');
Route::post('admin/delete_level/{level}', 'AdminController@level_destroy');
Route::get('admin/access_level/{level}', 'AdminController@level_access');
Route::post('admin/update_access_level/{level}', 'AdminController@level_access_update');

