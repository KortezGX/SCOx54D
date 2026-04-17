@extends('app')

@section('title', '編輯書籍')

@section('content')
    <h1>編輯書籍</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">書名</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $book->name) }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">作者</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required value="{{ old('isbn', $book->isbn) }}">
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">出版社</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required value="{{ old('publisher', $book->publisher) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">描述</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新書籍</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">返回列表</a>
    </form>
@endsection