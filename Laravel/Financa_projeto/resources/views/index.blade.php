@extends('layout.main')

@section('title', 'Página Inicial')

@section('content')

    <h2>Página de Finanças</h2>

    <div>
        <div>
            <h3>Entradas</h3>
            <h4>R$ 0,00</h4>
        </div>

        
        <div>
            <h3>Saídas</h3>
            <h4>R$ 0,00</h4>
        </div>

        
        <div>
            <h3>Saldo</h3>
            <h4>R$ 0,00</h4>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Movimentação</th>
            <th>Valor</th>
        </thead>
        <tbody>
            @foreach ($orcamentos as $x)
                <td>{{ $x->id}}</td>
                <td>{{ $x->descricao_financa}}</td>
                <td>R$ {{ $x->valor_financa}}</td>

            @endforeach
        </tbody>
    </table>
    <a href="/cadastrar" class="btn btn-primary">Cadastrar</a>

    @endsection