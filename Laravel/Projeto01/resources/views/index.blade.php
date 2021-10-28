@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

    
    

    <form class="row" action="/" method="POST" enctype="multipart/form-data"  >
        
        @csrf
        <div class="col-md-6 m-auto row" style="border: 1px solid red; border-radius:15px; padding: 10px">
            <h4>Cadastrar time</h4>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do Time</label>
                <input type="text" class="form-control" style="width: 400px" id="nome" name="nome" aria-describedby="emailHelp">
                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Escudo do Time</label><br>
                <input type="file" class="form-control-file" style="width: 400px" id="escudo" name="escudo">
        
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" style="width: 400px" name="cidade" aria-describedby="emailHelp">
        
            </div>
    
            <div class="mb-3">
                <label for="image">Estado</label>
                <input type="text" class="form-control" id="estado" style="width: 400px" name="estado" aria-describedby="emailHelp">
        
                
            </div>
            <div class="mb-4"  style=" text-align:right">
                <input type="submit" value="Cadastrar">
            </div>
        </div>
       
        
    </form>
    <h3>Clubes Cadastrados</h3>
    <table class="container table table-bordered info" style="text-align: center">
       
            
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Escudo</th>
                </thead>
               
                    <tbody>
                        @foreach ($clubes as $x)

                        <tr style="padding-top: 20px">
                            <td>{{$x ->id}}</td>
                            <td>{{$x ->clube_nome}}</td>
                            <td>{{$x ->clube_cidade}}</td>
                            <td>{{$x ->clube_estado}}</td>
                            <td> <img style="width: 50px; height:50px" src="/img/escudos/{{ $x->clube_escudo }}" alt="{{ $x ->nome }}" class="img-fluid"></td>
                        </tr>
                        
                        @endforeach
                        
                    </tbody>
              

        
    </table>


@endsection
