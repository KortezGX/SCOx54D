<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 如果 session 中沒有 user_type，表示未登入，題目要求未登入回傳 401 狀態碼
        if (!session()->has('user_type')) {
            abort(401); // Laravel 的 abort 函式會直接返回指定狀態碼的 HTTP 回應
        }

        // 如果 session 中有 user_type，表示已登入，允許請求繼續處理
        return $next($request);
    }
}
