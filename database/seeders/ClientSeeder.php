<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            //'id' => 1,
            'ci'=> '3233098',
            'nombre' =>'Maria Cortegana Rojas',
            'telefono' =>'77123543',
            'id_lawyer' =>1,
        ]);

        Client::create([
            //'id' => 1,
            'ci'=> '5898123',
            'nombre' =>'Ramiro Valverde Pedraza',
            'telefono' =>'66513321',
            'id_lawyer' =>1,
        ]);

        Client::create([
            //'id' => 1,
            'ci'=> '8789098',
            'nombre' =>'Edith Rojas Perez',
            'telefono' =>'70051245',
            'id_lawyer' =>4,
        ]);

        Client::create([
            //'id' => 1,
            'ci'=> '1178500',
            'nombre' =>'Mario Canaviri Cortez',
            'telefono' =>'76711234',
            'id_lawyer' =>4,
        ]);

        Client::create([
            //'id' => 1,
            'ci'=> '8012345',
            'nombre' =>'Federico Valverde Urrutia',
            'telefono' =>'75009087',
            'id_lawyer' =>1,
        ]);
    }
}
