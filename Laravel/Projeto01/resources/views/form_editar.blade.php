@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')
    <form class="row" action="/update/{{$valor_edit->id}}" method="POST" enctype="multipart/form-data">    
        @csrf
        @method('PUT')
        <div class="col-md-6 m-auto row" style="border: 1px solid red; border-radius:15px; padding: 10px">
            <h4>Cadastrar time</h4>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do Time</label>
                <input type="text" class="form-control" style="width: 400px" id="clube_nome" name="clube_nome" aria-describedby="emailHelp" value="{{ $valor_edit->clube_nome}}">
                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Escudo do Time</label><br>
                <input type="file" class="form-control-file" style="width: 400px" id="clube_escudo" name="clube_escudo">
                <img src="/img/escudos/{{ $valor_edit ->clube_escudo }}" alt="{{ $valor_edit->clube_nome}}" class="img-preview" style="width: 50px">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" style="width: 400px" name="clube_cidade" aria-describedby="emailHelp" value="{{ $valor_edit->clube_cidade }}">
               
            </div>

            <div class="mb-3">
                <label for="image">Estado</label>
                <input type="text" class="form-control" id="clube_estado" style="width: 400px" name="clube_estado" aria-describedby="emailHelp" value="{{ $valor_edit->clube_estado }}">
        
                
            </div>
            <div class="mb-4"  style=" text-align:right">
                <input type="submit" value="Editar">
            </div>
        </div>
    
        
    </form>


@endsection
