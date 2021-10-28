<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// chamando model
use App\Models\clubes;
use SebastianBergmann\Environment\Console;

class clubController extends Controller
{
    //
    public function index(){

        $lista_clubes = clubes::all();
 
        return view("index", ['clubes'=>$lista_clubes]);
      
    }

    public function salvarDados(Request $campos){
        
        $modelConnection = new clubes;

        $modelConnection->clube_nome = $campos->nome; 
        $modelConnection->clube_cidade = $campos->cidade;
        $modelConnection->clube_estado = $campos->estado;
        // $modelConnection->clube_escudo = $campos->escudo;

        if($campos->hasFile('escudo') && $campos->file('escudo')->isValid())
                $requestImage = $campos->escudo;

                // atribuir a variavel a extensão do arquivo
                $extension = $requestImage->extension();

                // cria uma hash e concatena com o tempo atual
                $imageName = md5($requestImage->getClientOriginalName() .  strtotime("now") . "." . $extension);

                // mover o arquivo/imagem para o diretório
                $campos->escudo->move(public_path('img/escudos'), $imageName);

                // salvar a url do arquivo/imagem no banco
                $modelConnection->clube_escudo = $imageName;

        


        $modelConnection->save();

        return redirect("/");
    }
}
