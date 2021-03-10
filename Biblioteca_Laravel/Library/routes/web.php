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

Route::get('/admin/home', 'App\Http\Controllers\LibraryController@adminHome')->name('admin.home')->middleware('user_type');

Auth::routes();

Route::post('/logout','App\Http\Controllers\HomeController@closeSession');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return
        redirect('/login');
});
Route::get('/error', 'App\Http\Controllers\LibraryController@getError');

Route::get('/admin/create', 'App\Http\Controllers\LibraryController@adminCreate');

Route::get('/admin/edit/{id?}', 'App\Http\Controllers\LibraryController@adminEdit');

Route::get('/admin/delete/{bookId?}', 'App\Http\Controllers\LibraryController@adminDelete');

Route::get('/user/home', 'App\Http\Controllers\LibraryController@userHome');

Route::get('/logout', 'App\Http\Controllers\HomeController@closeSession');

Route::post('/create', 'App\Http\Controllers\LibraryController@adminCreatePost');

Route::post('/edit', 'App\Http\Controllers\LibraryController@adminEditPost');

