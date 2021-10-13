<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

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
        $user = auth()->user();
        $hasuserjoined = false;

        if($user){
            $eventUser = $user->eventParticipantes->toArray();

            foreach($eventUser as $y){
                if($y['id'] == $id){
                    $hasuserjoined = true;
                }
            }
        }

        // procura o usuário a partir do ID e transforma em um array
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.mostrar',['event'=> $event, 'eventOwner'=> $eventOwner, 'hasuserjoined'=>$hasuserjoined]);


    }
    public function dashboard(){

        $user = auth()->user();

        $events = $user->events;

        $eventsAsparticipant = $user->eventParticipantes;

        return view('events.dashboard', ['events'=>$events, 'eventsparticipant'=> $eventsAsparticipant]);
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

        $user = auth()->user();
        $event->user_id = $user->id;


        // salvar dado no banco
        $event->save();

        return redirect("/")->with('msg','Evento criado com sucesso !!!');


        
    }

    public function destroy($id){

        // evento que remove um registro do banco 
        Event::findOrFail($id)->delete();


        // tredireciona o usuário com uma mensagem
        return redirect('/dashboard')->with('msg', 'Evento removido com sucesso !!!');
    }

    public function edit($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if($user->id != $event->user_id){
            return redirect("/dashboard");
        }


        return view('events.edit',['event'=> $event]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            // atribuir a variavel a extensão do arquivo
            $extension = $requestImage->extension();

            // cria uma hash e concatena com o tempo atual
            $imageName = md5($requestImage->getClientOriginalName() .  strtotime("now") . "." . $extension);

            // mover o arquivo/imagem para o diretório
            $request-> image->move(public_path('img/events'), $imageName);

            // salvar a url do arquivo/imagem no banco
            $data['image'] = $imageName;

        }


        

        // faz a busca e a atualização do registro no campo
        Event::findOrFail($request -> id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento Atualizado com sucesso !!!');
    }

    public function joinEvent($id){

        $user = auth()->user();

        $user->eventParticipantes()->attach($id);

        $event = Event::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento'> $event->title);
    }
    public function leaveEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        $user->eventParticipantes()->detach($id);

        return redirect('/dashboard')->with('msg', 'Você Saiu com sucesso do evento !!!');

    }

}
