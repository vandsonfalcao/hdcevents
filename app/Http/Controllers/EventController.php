<?php

namespace App\Http\Controllers;

//use o Model de events para resgatar os dados da tabela
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }
    public function create()
    {
        return view('events.create');
    }
    public function store(request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->private = $request->private;
        $event->city = $request->city;
        $event->description = $request->description;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }
}
