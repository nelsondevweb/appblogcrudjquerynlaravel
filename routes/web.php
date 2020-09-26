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
//     return view('home');
// });
Route::get('/', 'BlogController@index')->name('home');
Route::get('/all-blogs', 'BlogController@allBlogs')->name('all-blogs');
Route::post('/addblog', 'BlogController@saveBlog')->name('addblog');
Route::get('/showeditblog/{id}', 'BlogController@editBlog')->name('showeditBlog');
Route::post('/editblog/{id}', 'BlogController@updateBlog')->name('updateBlog');
Route::delete('/deleteblog/{id}', 'BlogController@deleteBlog')->name('deleteBlog');
// Route::resource('ajaxproducts','ProductAjaxController');
