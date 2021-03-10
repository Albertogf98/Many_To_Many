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

Route::get('/', function () { return redirect('home'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [\App\Http\Controllers\OrderController::class, 'getAdminHome'])->middleware('user_type');

Route::get('/admin/delete/{id?}', [\App\Http\Controllers\OrderController::class, 'getDelete'])->middleware('user_type');;

Route::delete('/delete', [\App\Http\Controllers\OrderController::class, 'delete'])->middleware('user_type');;

Route::get('/user/home', [\App\Http\Controllers\OrderController::class, 'getUserHome']);

Route::get('/create', [\App\Http\Controllers\OrderController::class, 'getCreate']);

Route::post('/insert', [\App\Http\Controllers\OrderController::class, 'postCreate']);

Route::get('/email', [\App\Http\Controllers\MailController::class, 'getMail']);

Route::post('/post/mail', [\App\Http\Controllers\MailController::class, 'postMail']);

