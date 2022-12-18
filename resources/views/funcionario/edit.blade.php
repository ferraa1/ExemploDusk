@extends('funcionario.layout')

@section('titulo','Editar Funcionario')

@section('conteudo')
<form action="{{ route('funcionario.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Funcionario</legend>
        @method("PATCH")
        @csrf

        @include('funcionario.form')
    </fieldset>
</form>
@endsection