@extends('layouts.main')
@section('title', 'Contatos')

@section('content')
<h1>Esta é a página de contatos</h1>

@if($busca != '')
    <p>O usuário está buscando por: {{ $busca }}</p>
@endif

@endsection
    

