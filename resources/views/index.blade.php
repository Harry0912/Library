@extends('layouts/app')

@section('main')
<div>
    <input type="text" id="keyword">
    <input type="radio" name="search">書名
    <input type="radio" name="search">作者
    <input type="radio" name="search">出版社
    <input type="submit" value="搜尋">
    <input type="reset" value="清除">
</div>
<hr>

<div>
    <div>
        <h2>JAVA SE7 全方位學習</h2>
        <p>作者 : 韓小瑜</p>
        <p>出版社 : 國民出版社</p>
        <button>編輯</button>
        <button>刪除</button>
    </div>
    <hr>
    <div>
        <h2>JAVA程式設計入門與實作</h2>
        <p>作者 : 蔡小英</p>
        <p>出版社 : 民主出版社</p>
        <button>編輯</button>
        <button>刪除</button>
    </div>
</div>
<hr>

<div>
    <a href="{{ route('create') }}">新增書籍</a>
</div>
@endsection