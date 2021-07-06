@extends('layouts.main')

@section('title', 'HDC Events - Produto')

@section('content')

<div>
    @if($busca != "")
    <h1>O usuario esta buscando por {{$busca}}</h1>
    @else
    <h1>Sem busca</h1>
    @endif
</div>
@endsection