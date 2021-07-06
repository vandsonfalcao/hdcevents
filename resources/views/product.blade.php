@extends('layouts.main')

@section('title', 'HDC Events - Produto')

@section('content')

<div>
    @if($id != null)
    <h1>Produto: {{$id}}</h1>
    @else
    <h1>Produto não selecionado</h1>
    @endif
</div>
@endsection