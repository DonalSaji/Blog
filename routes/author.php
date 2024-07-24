<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function() {

    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/signin', 'back.pages.auth.signin')->name('signin');
        Route::post('/signin', [AuthorController::class, 'signin'])->name('signin');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        // Route::get('/register', [AuthorController::class, 'register_view'])->name('register');
        // Route::post('/register', [AuthorController::class, 'register'])->name('register');
        Route::get('/logout', [AuthorController::class, 'logout'])->name('logout');

        Route::prefix('posts')->name('posts.')->group(function() {
             Route::view('/add-post', 'back.pages.add-post')->name('add-post');
             Route::post('/create',[AuthorController::class, 'createPost'] )->name('create');
             Route::view('/all','back.pages.all-post')->name('all-post');
             Route::get('/edit-post', [AuthorController::class, 'editpost'])->name('edit-post');
             Route::post('/update-post', [AuthorController::class, 'updatepost'])->name('update-post');
        });
    });
});
