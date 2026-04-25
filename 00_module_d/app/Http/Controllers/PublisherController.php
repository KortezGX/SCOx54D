<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 從資料庫中取得所有出版社的資料，並傳遞給 view 顯示
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 顯示新增出版社的表單頁面
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 新增出版社，儲存到資料庫
        $publisher = new Publisher();
        $publisher->name = $request->input('name');
        $publisher->address = $request->input('address');
        $publisher->phone = $request->input('phone');
        $publisher->isbn_code = $request->input('isbn_code');
        $publisher->is_active = $request->input('is_active') === 'on' ? true : false; // 將 checkbox 的值轉換為布林值
        $publisher->save();

        // 新增完成後，重定向到出版社列表頁面
        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
