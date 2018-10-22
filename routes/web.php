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
    return view('front.home');
});
Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('gallery/foto', 'GalleryController@foto');
Route::get('gallery/video', 'GalleryController@video');
Route::get('news', 'NewsController@index');
Route::get('news/detail/{news}', 'NewsController@detail');
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

// CRUD Menu
Route::get('admin/menu', 'AdminController@menu');
Route::get('admin/add_menu', 'AdminController@menu_add');
Route::post('admin/padd_menu', 'AdminController@menu_store');
Route::get('admin/update_menu/{menu}', 'AdminController@menu_update');
Route::patch('admin/pupdate_menu/{menu}', 'AdminController@menu_pupdate');
Route::delete('admin/delete_menu/{menu}', 'AdminController@menu_destroy');

// CRUD Level
Route::get('admin/level', 'AdminController@level');
Route::get('admin/add_level', 'AdminController@level_add');
Route::post('admin/padd_level', 'AdminController@level_store');
Route::get('admin/update_level/{level}', 'AdminController@level_update');
Route::patch('admin/pupdate_level/{level}', 'AdminController@level_pupdate');
Route::delete('admin/delete_level/{level}', 'AdminController@level_destroy');
Route::get('admin/access_level/{level}', 'AdminController@level_access');
Route::post('admin/update_access_level/{level}', 'AdminController@level_access_update');

// CRUD Users
Route::get('admin/users', 'AdminController@users');
Route::get('admin/add_users', 'AdminController@users_add');
Route::post('admin/padd_users', 'AdminController@users_store');
Route::get('admin/update_users/{users}', 'AdminController@users_update');
Route::patch('admin/pupdate_users/{users}', 'AdminController@users_pupdate');
Route::get('admin/update_password_users/{users}', 'AdminController@users_update_password');
Route::patch('admin/pupdate_password_users/{users}', 'AdminController@users_pupdate_password');
Route::delete('admin/delete_users/{users}', 'AdminController@users_delete');

// CRUD Pages
Route::get('admin/pages', 'AdminController@pages');
Route::get('admin/add_pages', 'AdminController@pages_add');
Route::post('admin/padd_pages', 'AdminController@pages_store');
Route::get('admin/update_pages/{pages}', 'AdminController@pages_update');
Route::patch('admin/pupdate_pages/{pages}', 'AdminController@pages_pupdate');
Route::delete('admin/delete_pages/{pages}', 'AdminController@pages_destroy');
Route::get('admin/upload_pages/{pages}', 'AdminController@pages_upload');
Route::patch('admin/pupload_pages/{pages}', 'AdminController@pages_pupload');


// CRUD Organisasi
Route::get('admin/organization', 'AdminController@organization');
Route::get('admin/add_organization', 'AdminController@organization_add');
Route::post('admin/padd_organization', 'AdminController@organization_store');
Route::get('admin/update_organization/{org}', 'AdminController@organization_update');
Route::patch('admin/pupdate_organization/{org}', 'AdminController@organization_pupdate');
Route::delete('admin/delete_organization/{org}', 'AdminController@organization_destroy');

// CRUD News
Route::get('admin/news', 'AdminController@news');
Route::get('admin/add_news', 'AdminController@news_add');
Route::post('admin/padd_news', 'AdminController@news_store');
Route::get('admin/update_news/{news}', 'AdminController@news_update');
Route::patch('admin/pupdate_news/{news}', 'AdminController@news_pupdate');
Route::delete('admin/delete_news/{news}', 'AdminController@news_destroy');
Route::get('admin/upload_news/{news}', 'AdminController@news_upload');
Route::patch('admin/pupload_news/{pages}', 'AdminController@news_pupload');

// CRUD Schedule
Route::get('admin/schedule', 'AdminController@schedule');
Route::get('admin/add_schedule', 'AdminController@schedule_add');
Route::post('admin/padd_schedule', 'AdminController@schedule_store');
Route::get('admin/update_schedule/{schedule}', 'AdminController@schedule_update');
Route::patch('admin/pupdate_schedule/{schedule}', 'AdminController@schedule_pupdate');
Route::delete('admin/delete_schedule/{schedule}', 'AdminController@schedule_destroy');

// CRUD Image Gallery
Route::get('admin/image_gallery', 'AdminController@gallery_image');
Route::get('admin/add_image_gallery', 'AdminController@gallery_image_add');
Route::post('admin/padd_image_gallery', 'AdminController@gallery_image_store');
Route::get('admin/update_image_gallery/{image}', 'AdminController@gallery_image_update');
Route::patch('admin/pupdate_image_gallery/{image}', 'AdminController@gallery_image_pupdate');
Route::delete('admin/delete_image_gallery/{image}', 'AdminController@gallery_image_destroy');

// CRUD Video Gallery
Route::get('admin/video_gallery', 'AdminController@gallery_video');
Route::get('admin/add_video_gallery', 'AdminController@gallery_video_add');
Route::post('admin/padd_video_gallery', 'AdminController@gallery_video_store');
Route::get('admin/update_video_gallery/{video}', 'AdminController@gallery_video_update');
Route::patch('admin/pupdate_video_gallery/{video}', 'AdminController@gallery_video_pupdate');
Route::delete('admin/delete_video_gallery/{video}', 'AdminController@gallery_video_destroy');

// CRUD Kurikulum
Route::get('admin/kurikulum', 'AdminController@kurikulum');
Route::get('admin/add_kurikulum', 'AdminController@kurikulum_add');
Route::post('admin/padd_kurikulum', 'AdminController@kurikulum_store');
Route::get('admin/update_kurikulum/{kurikulum}', 'AdminController@kurikulum_update');
Route::patch('admin/pupdate_kurikulum/{kurikulum}', 'AdminController@kurikulum_pupdate');
Route::delete('admin/delete_kurikulum/{kurikulum}', 'AdminController@kurikulum_destroy');

