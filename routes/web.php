<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    // Day 2-3 - import ui package
use App\Http\Controllers\ArticleController;

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
