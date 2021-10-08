@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

   
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>

        <!-- enctype="multipart/form-data"-> necessário para enviar arquivos em formulários html -->
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Imagem do Evento</label>
                <input type="file" class="form-control-file" id="image" name="image">

            </div>
            <div class="form-group">
                <label for="title">Evento</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">

            </div>

            <div class="form-group">
                <label for="title">Data do Evento</label>
                <input type="date" class="form-control" id="date" name="date">

            </div>
            <div class="form-group">
                <label for="title">Cidade</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">

            </div>
            <div class="form-group">
                <label for="title">O evento é privado</label>
                <select type="text" class="form-control" id="private" name="private">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>

            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea  id="description" name="description" placeholder="Descrição do evento"></textarea>

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
                    <input type="checkbox" name="items[]" value="cerveja gratis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="open food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="brindes"> Brindes
                </div>
            </div>
            

            <input type="submit" class="btn btn-primary" value="Criar Evento">

        </form>
    </div>
@endsection