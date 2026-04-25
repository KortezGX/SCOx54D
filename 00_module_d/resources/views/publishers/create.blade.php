@extends('app')

@section('title', '新增出版社')

@section('content')
    <h1 class="mb-4">新增出版社</h1>
    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">出版社名稱</label>
            <input type="text" class="form-control" id="name" name="name" required value="測試出版社">
        </div>
        <div class="form-group">
            <label for="address">出版社地址</label>
            <input type="text" class="form-control" id="address" name="address" required value="測試地址">
        </div>
        <div class="form-group">
            <label for="phone">出版社電話</label>
            <input type="text" class="form-control" id="phone" name="phone" required value="測試電話">
        </div>
        <div class="form-group">
            <label for="isbn_code">出版社 ISBN 代碼(3碼)</label>
            <input type="text" class="form-control" id="isbn_code" name="isbn_code" required value="123">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
            <label class="form-check-label" for="is_active">是否啟用</label>
        </div>
        <button type="submit" class="btn btn-primary">新增出版社</button>
    </form>
@endsection
