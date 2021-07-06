@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div>
    <h1>Welcome</h1>
    @if (10 > 5)
    <p>Olá {{$nome}}</p>
    @endif

    @for($i = 0; $i < count($arr); $i++) <p>{{$arr[$i]}}</p>
        @endfor

        @foreach($nomes as $nome)
        <p>{{$nome}}</p>
        @endforeach
</div>

@endsection