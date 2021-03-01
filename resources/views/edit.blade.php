@extends('layouts/app')

@section('edit')
    <h1>編輯書籍</h1><hr>
    書籍名稱 : {{ $data->Name }}<hr>
    書籍內容 : <textarea id="content">{{ $data->Content }}</textarea><hr>
    作者 : {{ $data->users->name }}<hr>
    出版社 : {{ $data->publishing->Name }}<hr>
    <button onclick="update('{{ $data->Id }}', '{{ route('update', $data) }}', '{{ csrf_token() }}')">編輯完成</button>
@endsection