<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orcamentos;

class financas extends Controller
{
    //

    public function index(){

        $financas = orcamentos::all();

        return view('index', ['orcamentos'=> $financas]);
    }
    public function cadastrar(){
        return view('cadastro');
    }
    public function store(Request $parametros){

        $orcamento = new orcamentos;

        $orcamento->descricao_financa = $parametros->descricao;
        $orcamento->valor_financa = $parametros->valor;

        $orcamento->save();

        return redirect("/");

    }

}
