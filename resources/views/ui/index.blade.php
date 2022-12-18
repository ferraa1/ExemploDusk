<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Exemplo Dusk</title>
</head>
<body>
    <div class="container text-center my-5 p-5 rounded shadow-lg">
        <h1>Exemplo Dusk</h1>
        <form action="{{ route('ui.store') }}" method="post">
            <fieldset>
                <legend>Login</legend>
                @method("POST")
                @csrf
                <label for="usuario">Usuário</label>
                <br>
                <input required=true type="text" name="usuario" id="usuario" value="">
                <br>
                <label for="senha">Senha</label>
                <br>
                <input required=true type="password" name="senha" id="senha" value="">
                <br>
                <br>
                <button class="btn btn-primary" type="submit" id="entrar">Entrar</button>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>