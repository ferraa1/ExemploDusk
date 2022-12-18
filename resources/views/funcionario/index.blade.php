@extends('funcionario.layout')

@section('titulo','Funcionario')

@section('conteudo')

<form action="{{ route('funcionario.index') }}" method="get">
  <fieldset>
    <legend>Consultar Funcionarios</legend>
    @method('GET')
    <label for="filtro">Nome</label>
    <br>
    <input type="text" name="filtro" id="filtro">
    <br>
    <br>
    <button class="btn btn-primary" type="submit">Consultar</button>
  </fieldset>
</form>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOME</th>
      <th scope="col">USUÁRIO</th>
      <th scope="col">ADMIN</th>
      <!--<th scope="col">ATIVADO</th>-->

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->nome }}</td>
    <td>{{ $item->usuario }}</td>
    <td>{{ $item->admin }}</td>
    <!--<td>{{ $item->ativado }}</td>-->

    <td><a href="{{ route('funcionario.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('funcionario.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $dados->appends(array('filtro' => $filtro))->links() }}
@endsection