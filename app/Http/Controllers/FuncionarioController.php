<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_SESSION))
            session_start();
        //$dados = array();
        //if (request('find') != null) {
        //    $busca = request('find');
        //    $dados = Funcionario::where('nome', 'like', "$busca%")->get();
        //} else {
        //    $dados = Funcionario::all();
        //}
        //return view("funcionario.index", ['dados' => $dados]);
        $filtro = request()->input('filtro');
        $dados = Funcionario::where('nome','LIKE',$filtro.'%')->orderBy('nome')->paginate(5);
        return view('funcionario/index')->with('dados',$dados)->with('filtro',$filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['senha'] = sha1($request['senha']);
        $request['ativado'] = 1;
        if (!isset($request['admin']))
            $request['admin'] = 0;
        Funcionario::create($request->all());
        return redirect()->route('funcionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Funcionario::find($id);
        return view("funcionario.edit", ['dados' => $dados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['senha'] = sha1($request['senha']);
        if (!isset($request['admin'])) {
            $target = Funcionario::find($id);
            $request['admin'] = $target['admin'];
        }
        Funcionario::find($id)->update($request->all());
        return redirect()->route('funcionario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect()->route('funcionario.index');
    }
}
