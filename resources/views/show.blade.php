@extends('layouts/app')

@section('show')
    書籍名稱 : {{ $data->Name }}<hr>
    書籍內容 : {{ $data->Content }}<hr>
    作者 : {{ $data->users->name }}<hr>
    出版社 : {{ $data->publishing->Name }}<hr>
    <a href="http://127.0.0.1:8000">回上一頁</a>
@endsection