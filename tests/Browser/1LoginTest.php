<?php
namespace Tests\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Funcionario;
class LoginTest extends DuskTestCase
{
    //deleta dados após teste:
    use DatabaseMigrations;
    /**
     * Teste para verificar se o funcionário pode logar no sistema.
     * @test
     */
    public function the_funcionario_can_login()
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
                //confirmar
                ->assertSee('Menu');
            echo "\nFINALIZADO: LoginTest\n";
        });
    }
}
