@extends('layout.main')

@section('title', 'Página Inicial')

@section('content')

    <div>
        <form action="/salvar" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao">
    
            <label for="valor">Valor</label>
            <input type="number" id="valor" name="valor">

            <input type="submit" value="Cadastrar">


        </form>
     
    </div>

@endsection