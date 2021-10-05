<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            // fazendo busca no banco
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else{
            // chama todos os eventos do banco
            $events = Event::all();


        }

        
        return view('index',["events"=>$events, 'search' => $search]);

    }
    public function create(){
        return view('events.create');
    }

    public function mostrar($id){
        
        // findOrFail faz uma busca
        $event = Event::findOrFail($id);

        return view('events.mostrar',['event'=> $event]);


    }

    public function store(Request $request){
        // os dados virão pelo request

        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;
        
        //  upload da imagem

        //  verificar se existe uma imagem e se ela é válida
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            // atribuir a variavel a extensão do arquivo
            $extension = $requestImage->extension();

            // cria uma hash e concatena com o tempo atual
            $imageName = md5($requestImage->getClientOriginalName() .  strtotime("now") . "." . $extension);

            // mover o arquivo/imagem para o diretório
            $request-> image->move(public_path('img/events'), $imageName);

            // salvar a url do arquivo/imagem no banco
            $event->image = $imageName;

        }


        // salvar dado no banco
        $event->save();

        return redirect("/")->with('msg','Evento criado com sucesso !!!');


        
    }
}
