<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('index');
})->name('index');

Route::get('about', function(){
    return view('pages.about');
})->name('about');

Route::get('blog', function(){
    return view('pages.blog');
})->name('blog');

Route::get('single-post', function(){
    return view('pages.single-post');
})->name('single-post');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
