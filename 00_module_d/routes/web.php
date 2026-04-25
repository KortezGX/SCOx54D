<?php

// 添加 AuthCheck middleware 的命名空間
use App\Http\Middleware\AuthCheck;
// 添加 AuthController 的命名空間
use App\Http\Controllers\AuthController;
// 添加 PublisherController 的命名空間
use App\Http\Controllers\PublisherController;
// 添加 BooksController 的命名空間
use App\Http\Controllers\BookController;

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

Route::prefix('00_module_d')->group(function () {
    // 公開的 routes
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [App\Http\Controllers\AuthController::class, 'show'])->name('show'); // 顯示登入頁面的路由 login.show
        Route::post('/', [App\Http\Controllers\AuthController::class, 'login'])->name('submit'); // 處理登入表單提交的路由 login.submit
    });

    // 使用 middleware 保護需要登入才能訪問的 routes
    Route::middleware([AuthCheck::class])->group(function () {
        // 登出
        Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout'); // 處理登出功能的路由 logout

        // 超級管理員的出版社
        Route::prefix('publishers')->name('publishers.')->group(function () {
            Route::get('/', [App\Http\Controllers\PublisherController::class, 'index'])->name('index'); // 列出所有出版社的路由 publishers.index
            Route::get('/new', [App\Http\Controllers\PublisherController::class, 'create'])->name('create'); // 顯示新增出版社表單的路由 publishers.create
            Route::post('/', [App\Http\Controllers\PublisherController::class, 'store'])->name('store'); // 處理新增出版社表單提交的路由 publishers.store
            // 後續還可以添加編輯、刪除出版社的路由
        });

        // 管理書籍的 routes
        Route::prefix('books')->name('books.')->group(function () {
            Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('index'); // 列出所有書籍的路由 books.index
            Route::get('/new', [App\Http\Controllers\BookController::class, 'create'])->name('create'); // 顯示新增書籍表單的路由 books.create
            Route::post('/', [App\Http\Controllers\BookController::class, 'store'])->name('store'); // 處理新增書籍表單提交的路由 books.store
            // 後續還可以添加編輯、刪除書籍的路由
        });
    });
});
