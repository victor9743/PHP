<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){

        $nome = "Victor Costa";
        $idade = 24;
        $profissao = "Desenvolvedor Web";
        $array = [1,2,3,4,5];
        $nomes = ["victor","carlos", "bia", "alberto"];

        return view('index',["nome"=>$nome, "idade"=> $idade, "profissao" => $profissao, "array"=> $array, "nomes" => $nomes]);

    }
    public function create(){
        return view('events.create');
    }
}
