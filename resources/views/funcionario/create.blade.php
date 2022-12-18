@extends('funcionario.layout')

@section('titulo','Funcionario')

@section('conteudo')
<form action="{{ route('funcionario.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Funcionario</legend>
        @method("POST")
        @csrf

        @include('funcionario.form')
    </fieldset>
</form>
@endsection