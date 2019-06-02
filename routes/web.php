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

Route::get('/', function () {
    return redirect()->route('blogs.index');
});

Route::get('/blogs/index', 'BlogController@index')->name('blogs.index');
Route::get('/blogs/date', 'BlogController@getWhereDate')->name('blogs.date');
Route::get('/blogs/in', 'BlogController@getWhereId')->name('blogs.in');
Route::get('/blogs/trash', 'BlogController@getTrashed')->name('blogs.trash');
Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogController@store')->name('blogs.store');
Route::get('/blogs/{id}/delete', 'BlogController@destroy')->name('blogs.delete');
Route::get('/blogs/{id}/restore', 'BlogController@restore')->name('blogs.restore');
