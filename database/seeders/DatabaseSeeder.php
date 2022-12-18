<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
			FuncionarioSeeder::class
        ]);
    }
}
//php artisan migrate:fresh --seed
//Dropar todas as tabelas, recriar as tabelas e rodar todas as seed;

//php artisan db:seed
//Mantem as tabelas e roda todas as seed;

//php artisan db:seed -class=EstadoSeeder
//Mantem as tabelas e roda uma seed especıfica;