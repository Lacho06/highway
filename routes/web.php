<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreferenceController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [CategoryController::class, 'viewIndex'])->name('index');

Route::get('contact', [ContactController::class, 'store'])->middleware('verbHttp')->name('contact');

Route::post('contact', [ContactController::class, 'store'])->name('contact');

Route::get('buy', [AdminController::class, 'notFound'])->middleware('verbHttp');

Route::post('buy', [ContactController::class, 'buy'])->name('buy');

Route::get('about', [PlanController::class, 'viewAbout'])->name('about');

Route::get('blog', [PostController::class, 'viewBlog'])->name('blog');

Route::get('single-post/{id}', [PostController::class, 'viewSinglePost'])->name('single-post');

Route::post('admin/mail/deleteSelected', [MailController::class, 'deleteSelected'])->middleware('auth')->name('mail.deleteSelected');

Route::get('admin/mail', [MailController::class, 'index'])->middleware('auth')->name('mail.index');

Route::delete('admin/mail/deleteAll', [MailController::class, 'deleteAll'])->middleware('auth')->name('mail.deleteAll');

Route::post('admin/mail', [MailController::class, 'store'])->middleware('auth')->name('mail.store');

Route::get('admin/mail/{mail}', [MailController::class, 'show'])->middleware('auth')->name('mail.show');

Route::delete('admin/mail/{mail}', [MailController::class, 'destroy'])->middleware('auth')->name('mail.destroy');

Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

Route::get('admin/preference', [AdminController::class, 'notFound'])->middleware('verbHttp')->middleware('auth')->name('preference.store');

Route::post('admin/preference', [PreferenceController::class, 'store'])->middleware('auth')->name('preference.store');

Route::put('admin/preference/{preference}', [PreferenceController::class, 'update'])->middleware('auth')->name('preference.update');

Route::post('admin/category/deleteSelected', [CategoryController::class, 'deleteSelected'])->middleware('auth')->name('category.deleteSelected');

Route::post('admin/category/image', [CategoryController::class, 'addImage'])->middleware('auth')->name('category.addImage');

Route::delete('admin/category/image/{image}', [CategoryController::class, 'deleteImage'])->middleware('auth')->name('category.deleteImage');

Route::delete('admin/category/deleteAll', [CategoryController::class, 'deleteAll'])->middleware('auth')->name('category.deleteAll');

Route::resource('admin/category', CategoryController::class)->middleware('auth')->names('category');

Route::post('admin/post/deleteSelected', [PostController::class, 'deleteSelected'])->middleware('auth')->name('post.deleteSelected');

Route::delete('admin/post/deleteAll', [PostController::class, 'deleteAll'])->middleware('auth')->name('post.deleteAll');

Route::resource('admin/post', PostController::class)->middleware('auth')->names('post');

Route::post('admin/post/image', [PostController::class, 'updateImage'])->middleware('auth')->name('post.updateImage');

Route::post('admin/plan/feature', [PlanController::class, 'addFeature'])->middleware('auth')->name('plan.addFeature');

Route::delete('admin/plan/feature/{feature}', [PlanController::class, 'deleteFeature'])->middleware('auth')->name('plan.deleteFeature');

Route::post('admin/plan/deleteSelected', [PlanController::class, 'deleteSelected'])->middleware('auth')->name('plan.deleteSelected');

Route::delete('admin/plan/deleteAll', [PlanController::class, 'deleteAll'])->middleware('auth')->name('plan.deleteAll');

Route::resource('admin/plan', PlanController::class)->middleware('auth')->names('plan');

Route::get('admin/cardAbout', [CardController::class, 'cardAbout'])->middleware('auth')->name('card.about');

Route::post('admin/cardImage', [CardController::class, 'storeImage'])->middleware('auth')->name('cardImage.store');

Route::put('admin/cardImage/{card}', [CardController::class, 'updateImage'])->middleware('auth')->name('cardImage.update');

Route::delete('admin/card/deleteAll', [CardController::class, 'deleteAll'])->middleware('auth')->name('card.deleteAll');

Route::post('admin/card/deleteSelected', [CardController::class, 'deleteSelected'])->middleware('auth')->name('card.deleteSelected');

Route::resource('admin/card', CardController::class)->except('index')->middleware('auth')->names('card');

Auth::routes();
