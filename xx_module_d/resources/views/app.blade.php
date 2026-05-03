<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>圖書管理系統 - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        {{-- 檢查 Auth 裡有沒有使用者已經登入 --}}
        @auth
            @can('isAdmin')
                <!-- 如果使用者是超級管理員 -->
                <div class="alert alert-success">
                    <!-- 顯示已登入使用者的名稱 -->
                    歡迎 超級管理員!
                </div>
            @elsecan('isManager')
                <!-- 如果使用者是出版社管理員 -->
                <div class="alert alert-success">
                    <!-- 顯示已登入使用者的名稱 -->
                    歡迎 出版社管理員 {{ Auth::user()->name }}!
                </div>
            @endcan

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">登出</button>
            </form>
        @else
            <div class="alert alert-info">
                尚未登入
            </div>
        @endauth

        {{-- 檢查 Session 裡有沒有名為 msg 的提示 --}}
        @if (session('msg'))
            <div class="alert alert-light">
                {{ session('msg') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
