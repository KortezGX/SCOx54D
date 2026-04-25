<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 引用 Publisher Model
use App\Models\PublisherUser;
// 引用 加密工具
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 顯示登入頁面
    public function show()
    {
        return view('login');
    }

    // 登入功能
    public function login(Request $request)
    {
        // 在此處理登入邏輯，例如驗證使用者輸入的帳號密碼是否正確

        // 先取得使用者輸入的帳號和密碼
        $acc = $request->input('account');
        $pwd = $request->input('password');

        // 判斷是否為 超級管理員
        if ($acc === 'admin' && $pwd === '1234') {
            // 儲存 user_type 為登入身分的 session
            session(['user_type' => 'admin']);
            // 登入成功，重定向到特定頁面
            return redirect()->route('login.show')->with('msg', '超級管理員登入成功！');
        }

        // 判斷是否為 出版社管理員
        $publisher = PublisherUser::where('account', $acc)->first(); // 先判斷帳號是否存在
        if ($publisher && Hash::check($pwd, $publisher->password)) { // 再判斷密碼是否正確
            // 儲存 user_type 和 publisher_id 為登入身分的 session
            session([
                'user_type' => 'publisher',
                'publisher_id' => $publisher->id
            ]);
            // 登入成功，重定向到特定頁面
            return redirect()->route('login.show')->with('msg', '出版社管理員登入成功！');
        }

        // 登入失敗，返回登入頁面並顯示錯誤訊息
        return redirect()->route('login.show')->with('msg', '帳號或密碼錯誤！');
    }

    // 登出功能
    public function logout()
    {
        // 在此處理登出邏輯，例如清除使用者的 session
        session()->flush(); // 清除所有 session 資料
        // 重定向到登入頁面
        return redirect()->route('login.show');
    }
}
