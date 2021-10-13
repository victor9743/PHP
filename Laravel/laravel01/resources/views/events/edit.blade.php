@extends('layouts.main')

@section('title', 'Editando Evento')

@section('content')

   
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Edite o seu evento</h1>

        <!-- enctype="multipart/form-data"-> necessário para enviar arquivos em formulários html -->
        <form action="/events/update/{{ $event->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Utilizando o method put para atualizar campos do registro -->
            @method('PUT')


            <div class="form-group">
                <label for="image">Imagem do Evento</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <!-- fazer o preview das imagens -->
                <img src="/img/events/{{ $event ->image }}" alt="{{ $event->title}}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{ $event->title }}">

            </div>

            <div class="form-group">
                <label for="title">Data do Evento</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d')}}">

            </div>
            <div class="form-group">
                <label for="title">Cidade</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{ $event->city }}">

            </div>
            <div class="form-group">
                <label for="title">O evento é privado</label>
                <select type="text" class="form-control" id="private" name="private">
                    <option value="0">Não</option>

                    <!-- 'if ternário' que verifica se o atributo private está com o número 1 ou 0 -->
                    <option value="1"{{ $event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>

            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea  id="description" name="description" placeholder="Descrição do evento">{{ $event ->description}}</textarea>

            </div>

            <div class="form-group">

                    <label for="title">Adicione items de infraestrutura</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="cerveja gratis" > Cerveja grátis
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="open food"> Open food
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="brindes"> Brindes
                    </div>
              
            </div>
            

            <input type="submit" class="btn btn-primary" value="Editar Evento">

        </form>
    </div>
@endsection
