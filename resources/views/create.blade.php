@extends('layouts/app')

@section('create')
<h1>新增書籍</h1>

書籍名稱 : <input type="text" id="bookName">
<hr>
作者 : {{ $User->name }}
<hr>
出版社 : 
<select id="publishing">
    @foreach($Publishing as $value)
        <option value="{{ $value->Id }}">{{ $value->Name }}</option>
    @endforeach
</select>
<hr>
<button onclick="store('{{ $User->id }}', '{{ route('store') }}', '{{ csrf_token() }}')">新增書籍</button>
@endsection