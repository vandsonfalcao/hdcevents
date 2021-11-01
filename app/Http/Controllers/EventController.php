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

        //image upload
        $requestImage = $request->image;
        $extension = pathinfo($requestImage, PATHINFO_EXTENSION);
        $imageName = md5($requestImage->getclientOriginalName() . strtotime('now')) . "." . $extension;
        $requestImage->move(public_path('img/events'), $imageName);
        $event->image = $imageName;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }
}
