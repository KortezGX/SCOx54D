@extends('app')

@section('title', '書籍詳細資訊')

@section('content')
    <h1>書籍詳細</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $book->name }}</h2>
            <p class="card-text"><strong>作者：</strong>{{ $book->author }}</p>
            <p class="card-text"><strong>ISBN：</strong>{{ $book->isbn }}</p>
            <p class="card-text"><strong>出版社：</strong>{{ $book->publisher }}</p>
            <p class="card-text"><strong>描述：</strong>{{ $book->description }}</p>
            <p class="card-text text-muted"><small>建立時間：{{ $book->created_at?->format('Y-m-d H:i:s') }}</small></p>
            <p class="card-text text-muted"><small>更新時間：{{ $book->updated_at?->format('Y-m-d H:i:s') }}</small></p>

            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">編輯書籍</a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">返回列表</a>
        </div>
    </div>
@endsection