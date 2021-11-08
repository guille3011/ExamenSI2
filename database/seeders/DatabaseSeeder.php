<?php

namespace Database\Seeders;

use App\Models\Expedient;
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
        $this->call([
            UserSeeder::class,
            AdministratorSeeder::class,
            ClientSeeder::class,
            TypeOfCaseSeeder::class,
            TypeOfProcedureSeeder::class,
            ExpedientSeeder::class,
        ]);
    }
}
