<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\OperacaoController;
use App\Http\Controllers\PrecoHoraController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\UiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    //return view('welcome');
    return "HOME - GET";
});

Route::post('/', function () {
    return "Home - POST";
});

Route::put('/', function () {
    return "Home - PUT";
});

Route::delete('/', function () {
    return "Home - DELETE";
});
*/

Route::resource('/ui', UiController::class);
#Route::resource('/cliente', ClienteController::class);
#Route::resource('/endereco', EnderecoController::class);
Route::resource('/funcionario', FuncionarioController::class);
#Route::resource('/operacao', OperacaoController::class);
#Route::resource('/preco_hora', PrecoHoraController::class);
#Route::resource('/vaga', VagaController::class);
#Route::resource('/veiculo', VeiculoController::class);

Route::get('/', function () {
    if (!isset($_SESSION))
            session_start();
    return view('ui.index');
});

Route::get('/menu', function () {
    if (!isset($_SESSION))
            session_start();
    return view('ui.menu');
});
/*
Route::get('/login', function () {
    if (!isset($_SESSION))
            session_start();
    return view('ui.menu');
});

Route::get('/logoff', function () {
    if (!isset($_SESSION))
            session_start();
    return view('ui.index');
});
*/