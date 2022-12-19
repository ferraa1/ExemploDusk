<?php
namespace Tests\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Funcionario;
class CreateTest extends DuskTestCase
{
    //deleta dados após teste:
    use DatabaseMigrations;
    /**
     * Teste para verificar se o funcionário pode criar outros funcionários no sistema.
     * @test
     */
    public function the_funcionario_can_create()
    {
        //cria um funcionario no banco de dados através do factory
        $funcionario = Funcionario::factory()->create();
        //realiza o teste
        //Reminder: remove --headless from tests/DuskTestCase.php driver() to view the browser
        $this->browse(function (Browser $browser) use ($funcionario) {
            $browser->visit('/')
                //login
                ->type('usuario', $funcionario->usuario)
                ->type('senha', '123')
                ->press('Entrar')
                //criar
                ->clickLink('Funcionários')
                ->clickLink('Cadastrar')
                ->type('nome', 'NOME_FUNCIONARIO_TESTE_DUSK')
                ->type('usuario', 'usuario_funcionario_teste_dusk')
                ->type('senha', '123')
                ->radio('admin', 1)
                ->check('concordar')
                ->press('Cadastrar')
                //confirmar
                ->type('filtro', 'NOME_FUNCIONARIO_TESTE_DUSK')
                ->press('Consultar')
                ->assertSee('NOME_FUNCIONARIO_TESTE_DUSK')
                ->assertSee('usuario_funcionario_teste_dusk');
            echo "\nFINALIZADO: CreateTest\n";
        });
    }
}
