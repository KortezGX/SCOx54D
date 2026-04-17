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

// Route::get('/books/add', [BooksController::class, 'store']); // 新增書籍的路由
Route::get('/books/update', [BooksController::class, 'update']); // 更新書籍的路由
Route::get('/books/delete', [BooksController::class, 'destroy']); // 刪除書籍的路由
// Route::get('/books/list', [BooksController::class, 'index']); // 列出書籍的路由

Route::prefix('00_module_d')->group(function () {
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BooksController::class, 'index'])->name('index'); // 列出所有書籍頁面的路由 books.index

        Route::get('/new', [BooksController::class, 'create'])->name('create'); // 顯示新增書籍表單的路由 books.create
        Route::post('/', [BooksController::class, 'store'])->name('store'); // 處理新增書籍表單提交的路由 books.store
    });
});