@extends('app')

@section('title', '新增書籍')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">新增書籍</h1>

            <form action="{{ route('books.store') }}" method="POST" class="mt-4">
                @csrf

                <div class="mb-3">
                    <label for="publisher_id" class="form-label">所屬出版社：</label>
                    <select name="publisher_id" id="publisher_id" class="form-select">
                        @foreach ($publishers as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">書名：</label>
                    <input type="text" name="title" id="title" class="form-control" value="測試書名">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">描述：</label>
                    <input type="text" name="description" id="description" class="form-control" value="測試描述">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">作者：</label>
                    <input type="text" name="author" id="author" class="form-control" value="測試作者">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN：</label>
                    <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN為特定規則產生"
                        disabled>
                </div>

                <button type="submit" class="btn btn-primary">儲存書籍</button>
            </form>
        </div>
    </div>
@endsection
