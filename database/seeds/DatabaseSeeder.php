<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('profiles')->insert([
            'name' => 'Solicitante',
        ]);

        DB::table('profiles')->insert([
            'name' => 'Aprobador',
        ]);

        DB::table('states')->insert([
            'name' => 'Creado',
        ]);

        DB::table('states')->insert([
            'name' => 'Finalizado',
        ]);

        DB::table('states')->insert([
            'name' => 'Aprobado',
        ]);
    }
}
