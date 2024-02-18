<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    // Day 2-3 - import ui package
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;     // Day 4-4, 4-5

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
// Day 3-3
Route::get('/', [ArticleController::class, 'index']);

// Day 1
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
// Day 3-2
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);
// Day 3-4
Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
// Day 4-7 edit article
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/edit/{id}', [ArticleController::class, 'update']);

// Day 4-4 delete comment
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
// Day 4-5 create comment
Route::post('/comments/add', [CommentController::class, 'create']);

// Practice Routing
/* 
Route::get('/articles', function() {
    return "Article List";
} );

Route::get('/articles/detail/{id}', function($id) {
    return  "Detail Page $id";
} );
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
