<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;

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

Route::get('/', [CategoryController::class, 'viewIndex'])->name('index');

Route::get('about', [PlanController::class, 'viewAbout'])->name('about');

Route::get('blog', [PostController::class, 'viewBlog'])->name('blog');

Route::get('single-post/{id}', [PostController::class, 'viewSinglePost'])->name('single-post');

Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

Route::post('admin/category/image', [CategoryController::class, 'addImage'])->name('category.addImage');

Route::delete('admin/category/image/{image}', [CategoryController::class, 'deleteImage'])->name('category.deleteImage');

Route::resource('admin/category', CategoryController::class)->names('category');

Route::resource('admin/post', PostController::class)->names('post');

Route::resource('admin/plan', PlanController::class)->names('plan');

Auth::routes();
