@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>

        <form action="">
            <input type="text" id="search" name ="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitle">Veja os  eventos dos próximos eventos</p>

        <div id="cards-container" class="row">
            
            @foreach ($events as $x)

                <div class="card col-mod-3">
                    <!--<img src="" alt="{{ $x ->title }}">-->
                    <div class="card-body">
                        <div class="card-date">01/01/2000</div>
                        <div class="card-title">{{$x -> title }}</div>
                        <p class="card-participantes">
                            x participantes
                        </p>
                        <a href="" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>

                <!--<p>{{ $x -> title }} -- {{ $x->description }}</p>-->
    
            @endforeach            
        </div>
    </div>


        
@endsection
