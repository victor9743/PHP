@extends('layouts.main')
@section('title', 'Contato')

@section('content')

    @if($id != null)
        <h2>Esta é a página do contato nº {{ $id }}</h2>
    @endif
@endsection