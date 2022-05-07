<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

Route::post('contact', [ContactController::class, 'store'])->name('contact');

Route::get('about', [PlanController::class, 'viewAbout'])->name('about');

Route::get('blog', [PostController::class, 'viewBlog'])->name('blog');

Route::get('single-post/{id}', [PostController::class, 'viewSinglePost'])->name('single-post');

Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

Route::post('admin/category/image', [CategoryController::class, 'addImage'])->middleware('auth')->name('category.addImage');

Route::delete('admin/category/image/{image}', [CategoryController::class, 'deleteImage'])->middleware('auth')->name('category.deleteImage');

Route::resource('admin/category', CategoryController::class)->middleware('auth')->names('category');

Route::resource('admin/post', PostController::class)->middleware('auth')->names('post');

Route::post('admin/post/image', [PostController::class, 'updateImage'])->middleware('auth')->name('post.updateImage');

Route::post('admin/plan/feature', [PlanController::class, 'addFeature'])->middleware('auth')->name('plan.addFeature');

Route::delete('admin/plan/feature/{feature}', [PlanController::class, 'deleteFeature'])->middleware('auth')->name('plan.deleteFeature');

Route::resource('admin/plan', PlanController::class)->middleware('auth')->names('plan');

Auth::routes();
