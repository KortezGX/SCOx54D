@extends('app')

@section('title', '新增書籍')

@section('content')
    <h1>新增書籍</h1>

    <form action="{{ route('books.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">書名</label>
            <input type="text" class="form-control" id="name" name="name" required value="POST 新增書籍測試">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">作者</label>
            <input type="text" class="form-control" id="author" name="author" required value="POST 新增書籍測試作者">
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required value="321">
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">出版社</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required value="POST 新增書籍測試出版社">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">描述</label>
            <textarea class="form-control" id="description" name="description" rows="3" require>POST 新增書籍測試描述</textarea>
        </div>

        <button type="submit" class="btn btn-primary">新增書籍</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">返回列表</a>
    </form>
@endsection

