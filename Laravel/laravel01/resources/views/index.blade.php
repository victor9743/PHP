@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>

        <form action="/" method="GET">
            <input type="text" id="search" name ="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">

        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os  eventos dos próximos eventos</p>
        @endif
        <div id="cards-container" class="row">
            
            @foreach ($events as $x)

                <div class="card col-mod-3">
                    <img src="/img/events/{{ $x->image }}" alt="{{ $x ->title }}">
                    <div class="card-body">
                        <div class="card-date">{{ date('d/m/Y', strtotime($x->date))}}</div>
                        <div class="card-title">{{$x -> title }}</div>
                        <p class="card-participantes">
                            x participantes
                        </p>
                        <a href="/events/{{ $x->id }}" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>

                <!--<p>{{ $x -> title }} -- {{ $x->description }}</p>-->
    
            @endforeach  
            
          
            
        </div>
    </div>
    
    @if(count($events) == 0 && $search)
        <p>Não foi possivel encontrar nenhum evento com {{ $search }} ! <a href="/">Ver Todos !</a></p>
    @elseif(count($events) == 0)
        <p>Não há eventos disponiveis</p>
    @endif


        
@endsection
