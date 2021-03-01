@extends('layouts/app')

@section('main')
<div>
    <input type="text" id="keyword">
    <input type="radio" name="search">書名
    <input type="radio" name="search">作者
    <input type="radio" name="search">出版社
    <input type="submit" value="搜尋">
    <input type="reset" value="清除">
    <hr>

    排序 : 
    <select id="orderBy">
        <option>發布日期(Newer)</option>
        <option>發布日期(Older)</option>
        <option>書名(A->Z)</option>
        <option>書名(Z->A)</option>
    </select>
</div>
<hr>

<div>
    @foreach($data as $value)
        <div>
            <h2><a href="{{ route('show', $value) }}">{{ $value->Name }}</a></h2>
            <p>作者 : {{ $value->users->name }}</p>
            <p>出版社 : {{ $value->publishing->Name }}</p>
            <a href="{{ route('edit', $value) }}">編輯</a>
            <button>刪除</button>
        </div>
        <hr>
    @endforeach
</div>
{{ $data->links() }}
<hr>

<div>
    <h5><a href="{{ route('create') }}">新增書籍</a></h5>
</div>
@endsection