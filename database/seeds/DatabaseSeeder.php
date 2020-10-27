<?php

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
        // Usuario Programador
        DB::table('users')->insert([
        	'role' => 'admin',
        	'name' => 'Yesid Valencia Betancurt',
        	'email' => 'yevabe@gmail.com',
        	'password' => bcrypt('QP@cSD3%D6kS'),
        ]);
        // Usuario Administrador
        DB::table('users')->insert([
        	'role' => 'admin',
        	'name' => 'Julio Cesar Alzate',
        	'email' => 'julialzate@une.net.co',
        	'password' => bcrypt('gBk*5wjKOYB&'),
        ]);
        // Categorias de Proyectos
        DB::table('categories')->insert([
        	'name' => 'Fase de Diseño',
        ]);
        DB::table('categories')->insert([
        	'name' => 'En Ejecución',
        ]);
        DB::table('categories')->insert([
        	'name' => 'Terminado',
        ]);
    }
}
