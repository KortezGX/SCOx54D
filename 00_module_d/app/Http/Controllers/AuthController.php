<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 顯示登入頁面
    public function show() {
        return view('login');
    }

    // 登入功能
    public function login(Request $request) {
        // 在此處理登入邏輯，例如驗證使用者輸入的帳號密碼是否正確
    }

    // 登出功能
    public function logout() {
        // 在此處理登出邏輯，例如清除使用者的 session
    }
}
