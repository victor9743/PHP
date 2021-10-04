<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){

        // chama todos os eventos do banco
        $events = Event::all();

        return view('index',["events"=>$events]);

    }
    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        // os dados virão pelo request

        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;

        // salvar dado no banco
        $event->save();

        return redirect("/");


        
    }
}
