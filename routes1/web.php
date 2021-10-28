<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('video', App\Http\Controllers\VideoUploadController::class);

Route::POST('videos/update', [App\Http\Controllers\VideoUploadController::class,'updateVideo'])->name('updateVideo');

Route::get('example', [App\Http\Controllers\VideoUploadController::class,'getExample']);
Route::post('example', [App\Http\Controllers\VideoUploadController::class,'postExample'])->name('valideCaptcha');
Route::POST('reload-captcha', [App\Http\Controllers\VideoUploadController::class,'reloadCaptcha']);
// Route::resource('/news-content/news-paper', App\Http\Controllers\AdminController\NewsPaperController::class);
