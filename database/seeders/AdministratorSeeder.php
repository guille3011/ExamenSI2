<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::create([
            'nombre' => 'Guillermo Cespedes Lazarte',
            'email' => 'guillermo@gmail.com',
            'password' => Hash::make('5880296'),
        ]);
    }
}
