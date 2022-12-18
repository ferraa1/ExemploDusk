<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="nome">Nome</label>
<br>
<input type="text" name="nome" id="nome" value="@if (isset($dados->nome)) {{ $dados->nome }} @endif">
<br>
<label for="usuario">Usuário</label>
<br>
<input type="text" name="usuario" id="usuario" value="@if (isset($dados->usuario)) {{ $dados->usuario }} @endif">
<br>
<label for="senha">Senha</label>
<br>
<input type="password" name="senha" id="senha" value="">
<br>
<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['admin'] == 1) {
?>
    <label for="admin">Admin</label>
    <br>
    <input type="radio" name="admin" id="admin" value="0" checked>
    <label for="admin">Funcionário</label>
    <input type="radio" name="admin" id="admin" value="1">
    <label for="admin">Administrador</label>
    <br>
<?php
}
?>
<input required=true type="checkbox" id="concordar" name="concordar" value="Concordo">
<label for="concordar">O usuário concorda com o armazenamento de seus dados no sistema.</label>
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar" id="acao">@if(isset($dados->nome)) Editar @else Cadastrar @endif</button>