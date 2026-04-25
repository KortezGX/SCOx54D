<?php

use App\Http\Controllers\BooksController;
// 添加 AuthController 的命名空間
use App\Http\Controllers\AuthController;
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
// Route::get('/books/update', [BooksController::class, 'update']); // 更新書籍的路由
// Route::get('/books/delete', [BooksController::class, 'destroy']); // 刪除書籍的路由
// Route::get('/books/list', [BooksController::class, 'index']); // 列出書籍的路由

Route::prefix('00_module_d')->group(function () {
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BooksController::class, 'index'])->name('index'); // 列出所有書籍頁面的路由 books.index

        Route::get('/new', [BooksController::class, 'create'])->name('create'); // 顯示新增書籍表單的路由 books.create
        Route::post('/', [BooksController::class, 'store'])->name('store'); // 處理新增書籍表單提交的路由 books.store

        Route::get('/{book}/edit', [BooksController::class, 'edit'])->name('edit'); // 顯示編輯書籍表單的路由 books.edit
        Route::put('/{book}', [BooksController::class, 'update'])->name('update'); // 處理編輯書籍表單提交的路由 books.update

        Route::delete('/{book}', [BooksController::class, 'destroy'])->name('destroy'); // 刪除書籍的路由 books.destroy

        Route::get('/{book:isbn}', [BooksController::class, 'show'])->name('show'); // 顯示單一書籍詳細資訊的路由 books.show
    });
});

Route::prefix('00_module_d')->group(function () {
    // 公開的 routes
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [App\Http\Controllers\AuthController::class, 'show'])->name('show'); // 顯示登入頁面的路由 login.show
        Route::post('/', [App\Http\Controllers\AuthController::class, 'login'])->name('submit'); // 處理登入表單提交的路由 login.submit
    });

    // 需要登入才能訪問的 routes
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout'); // 處理登出功能的路由 logout
});
