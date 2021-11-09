<?php

namespace App\Http\Controllers;

//use o Model de events para resgatar os dados da tabela
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $events = Event::where([['title', 'like', '%' . $search . '%']])->get();
        } else {
            $events = Event::all();
        }


        return view('welcome', ['events' => $events, 'search' => $search]);
    }
    public function create()
    {
        return view('events.create');
    }
    public function store(request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->private = $request->private;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->items = $request->items;

        //image upload
        $requestImage = $request->image;
        $extension = pathinfo($requestImage, PATHINFO_EXTENSION);
        $imageName = md5($requestImage->getclientOriginalName() . strtotime('now')) . "." . $extension;
        $requestImage->move(public_path('img/events'), $imageName);
        $event->image = $imageName;

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }
    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }
}
