@extends('app')

@section('title', '書籍列表')

@section('content')
    <h1>書籍列表</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">新增書籍</a>
    @if($books->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>書名</th>
                    <th>作者</th>
                    <th>ISBN</th>
                    <th>出版社</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->description }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm me-1">編輯</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;" onsubmit="return confirm('確定要刪除此書籍嗎？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>目前沒有任何書籍資料。</p>
    @endif
@endsection
