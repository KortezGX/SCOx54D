@extends('app')

@section('title', '出版社列表')

@section('content')
    <h1 class="mb-4">出版社列表</h1>
    <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">新增出版社</a>
    @if ($publishers->count() === 0)
        <p>目前沒有出版社資料。</p>
    @else
        <table class="table table-bordered mb-3">
            <thead>
                <tr>
                    <th>出版社名稱</th>
                    <th>出版社地址</th>
                    <th>出版社電話</th>
                    <th>出版社 ISBN 代碼</th>
                    <th>是否啟用</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>{{ $publisher->phone }}</td>
                        <td>{{ $publisher->isbn_code }}</td>
                        <td>{{ $publisher->is_active ? '是' : '否' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
