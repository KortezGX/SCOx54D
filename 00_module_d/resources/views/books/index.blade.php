@extends('app')

@section('title', '書籍列表')

@section('content')
    <h1>書籍列表</h1>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>目前沒有任何書籍資料。</p>
    @endif
@endsection
