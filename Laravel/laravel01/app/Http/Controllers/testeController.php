<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

class testeController extends Controller
{
    public function admin(){
        return view('admin');
    }
    public function setup(){
        return view('ferramentas');
    }
}
