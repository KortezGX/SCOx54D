<?php

namespace App\Http\Controllers;

use App\Models\Book;
// 引用 Publisher Model
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 從資料庫中取得所有書籍的資料，並傳遞給 view 顯示
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 先從資料庫中取得所有出版社的資料，傳遞給 view 顯示在新增書籍的表單中
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 取得書籍數量，用來計算新的書籍代碼
        $bookCount = Book::count();

        // 新增書籍，儲存到資料庫
        $book = new Book();
        $book->publisher_id = $request->input('publisher_id'); // 從表單中取得選擇的出版社 ID
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');

        // 依照題目規則計算 isbn code
        $publisher = Publisher::find($book->publisher_id);
        $isbn_code = $publisher->isbn_code; // 先取得出版社的 isbn code

        // 1 ~ 3 位數 978 或 979，這裡統一使用 978
        // 4 ~ 6 為國家代碼，台灣為 986
        // 7 ~ 9 為出版社代碼，使用資料庫中該出版社的 isbn_code 欄位
        // 10 ~ 12 為書籍代碼，從 001 開始
        // 13 為檢查碼

        // 組合 12 位數字
        $isbn12 = '978' . '986' . $isbn_code . str_pad($bookCount + 1, 3, '0', STR_PAD_LEFT);

        // 計算檢查碼：奇數位 * 1 + 偶數位 * 3，除 10 的負餘數為檢查碼
        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $weight = (($i + 1) % 2 == 1) ? 1 : 3; // 奇數位乘 1，偶數位乘 3
            $sum += (int)$isbn12[$i] * $weight;
        }
        $check_digit = (10 - ($sum % 10)) % 10;

        // 組合成 13 碼 ISBN
        $isbn = $isbn12 . $check_digit;
        $isbn = substr($isbn, 0, 3) . '-' . substr($isbn, 3, 3) . '-' . substr($isbn, 6, 3) . '-' . substr($isbn, 9, 3) . '-' . substr($isbn, 12, 1);
        // 將計算好的 isbn 存到書籍的 isbn 欄位
        $book->isbn = $isbn;

        $book->save();

        // 新增完成後，重定向到書籍列表頁面
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
