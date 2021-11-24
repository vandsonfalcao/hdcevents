@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
<div class="container-content">
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar..." />
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
        <h2>Resultados da busca por: {{ $search }}</h2>
        @else
        <h2>Proximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos proximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="{{ $event->image}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/y', strtotime($event->date))}}</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participants">{{count($event->users)}} Participantes</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
            @if (count($events) == 0 && $search)
            <p>Nada foi encontrado!<br /><a href="/">Ver todos.</a></p>
            @elseif (count($events) == 0)
            <p>Não há eventos disponiveis...</p>
            @endif
        </div>
    </div>
</div>
@endsection