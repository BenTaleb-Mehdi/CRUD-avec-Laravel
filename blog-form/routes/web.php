<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect()->route('articles.index'));
Route::resource('articles', ArticleController::class)->except(['show']);

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
