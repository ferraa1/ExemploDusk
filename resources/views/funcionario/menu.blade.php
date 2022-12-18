<?php
    if (!isset($_SESSION))
        session_start();
?>
<br>
<div class="btn-group">
    <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
        <a class="btn btn-primary" href="{{ route('funcionario.index') }}" id="funcionario">Funcionários</a>
    <?php } ?>
    <form id="form_delete" name="form_delete" action="{{ route('ui.destroy',$_SESSION['id']) }}" method="post" onsubmit="return confirm('Tem certeza que deseja sair?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-primary" type="submit" id="sair">Sair</button>
    </form>
</div>
<br>
<br>