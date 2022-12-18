<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class UiController extends Controller
{

    public function index()
    {
        if (!isset($_SESSION))
            session_start();
        return view('ui.index');
    }

    public function store(Request $request)
    {
        if (!isset($_SESSION))
            session_start();
        foreach (Funcionario::all() as $dados) {
            if ($dados['usuario'] == $request['usuario']) {
                if ($dados['senha'] == sha1($request['senha'])) {
                    if ($dados['ativado'] == 1) {
                        $_SESSION['id'] = $dados['id'];
                        $_SESSION['tipo'] = 'funcionario';
                        $_SESSION['nome'] = $dados['nome'];
                        $_SESSION['admin'] = $dados['admin'];
                        $_SESSION['tentativas'] = 0;
                        return view('ui.menu');
                    } else {
                        return view('ui.index');
                    }
                } else {
                    return view('ui.index');
                }
            }
        }
        return view('ui.index');
    }

    public function destroy($id)
    {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
        return view('ui.index');
    }
}
