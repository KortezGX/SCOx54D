<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 確保有 use App\Models\Books; 的引用
        $books = Books::all(); // 取得所有書籍資料
        return view('books.index', ['books' => $books]); // 設置 books 變數傳遞給 view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create'); // 顯示 Resource 目錄下的 books/create.blade.php view
    }

    /**
     * Store a newly created resource in storage.
     * 確保有 use App\Models\Books; 的引用
     */
    public function store(Request $request)
    {
        // day 1 的練習(模擬新增書籍資料)
        // $book = new Books();
        // $book->name = '測試書籍';
        // $book->description = '這是一筆由 BooksController 新增的測試資料。';
        // $book->author = '範例作者';
        // $book->isbn = '123';
        // $book->publisher = '範例出版社';
        // $book->save();
        // return '書籍已建立';

        // day 2 的練習(使用 Post 請求來新增書籍資料)
        $book = new Books();
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->publisher = $request->input('publisher');
        $book->save();

        return redirect()->route('books.index', [], 302)->with('success', '書籍已建立'); // 重定向到 books.index 路由，並帶上成功訊息
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        // 確保有 use App\Models\Books; 的引用
        $book = Books::first(); // 取得第一筆書籍資料
        if ($book) {
            $book->name = '更新後的書籍名稱';
            $book->description = '這是一筆由 BooksController 更新的測試資料。';
            $book->author = '更新後的作者';
            $book->isbn = '456';
            $book->publisher = '更新後的出版社';
            $book->save();
            return '書籍已更新';
        }
        return '沒有找到書籍資料';
    }

    /**
     * Remove the specified resource from storage.
     * 確保有 use App\Models\Books; 的引用
     */
    public function destroy(Books $book)
    {
        // day 1 的練習(模擬刪除書籍資料)
        // $book = Books::where('isbn', '456')->first(); // 根據 ISBN 找到 456 的書籍資料
        // if ($book) {
        //     $book->delete();
        //     return '書籍已刪除';
        // }
        // return '沒有找到書籍資料';

        // day 2 的練習(使用 Delete 請求來刪除書籍資料)
        $book->delete();
        return redirect()->route('books.index', [], 302)->with('success', '書籍已刪除'); // 重定向到 books.index 路由，並帶上成功訊息
    }
}
