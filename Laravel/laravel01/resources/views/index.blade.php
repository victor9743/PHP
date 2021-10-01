@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

        <img src="/img/sucesso.jpg">
        <h2>
        <?php
            echo $profissao
        ?>
        </h2>
            @if(3==2)
                <h3>É igual</h3>
            @else
                <h4>Diferente</h4>
            @endif
            
            <h1>Meu nome é {{ $nome }}, tenho {{ $idade }} anos. Minha Profissão é de: {{ $profissao }}</h1>

            @for($i=0; $i< count($array); $i++)
                
                <p>{{ $array[$i] }}</p>
                
            @endfor
       
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nome</th>
                    </tr>     
                </thead>
                <tbody>
                
                        @foreach($nomes as $nome)
                        <tr>
                            <td>{{ $loop -> index + 1 }}</td>
                            <td>{{ $nome }}</td>    
                        </tr>
                        @endforeach
                 
                </tbody>
            </table>
@endsection
