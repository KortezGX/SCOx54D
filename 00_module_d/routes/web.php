<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/add', [BooksController::class, 'store']); // 新增書籍的路由
Route::get('/books/update', [BooksController::class, 'update']); // 更新書籍的路由
Route::get('/books/delete', [BooksController::class, 'destroy']); // 刪除書籍的路由
Route::get('/books/list', [BooksController::class, 'index']); // 列出書籍的路由