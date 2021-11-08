<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            //'id' => 1,
            'name'=> 'Sara Cuellar Rosas',
            'email' =>'sara@example.com',
            'cargo' =>'Abogado',
            'password' =>Hash::make('123123'),
        ]);

        User::create([
            //'id' => 2,
            'name'=> 'Ronal Lazarte Rivera',
            'email' =>'ronald@example.com',
            'cargo' =>'Procurador',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            //'id' => 3,
            'name'=> 'Abner Caceres Mamani',
            'email' =>'abner@example.com',
            'cargo' =>'Procurador',
            'password' =>Hash::make('000111'),
        ]);

        User::create([
            //'id' => 4,
            'name'=> 'Patricia Calderon Cruz',
            'email' =>'patricia@example.com',
            'cargo' =>'Abogado',
            'password' => Hash::make('000777'),
        ]);
    }
}
