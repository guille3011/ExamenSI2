<?php

namespace Database\Seeders;

use App\Models\TypeOfCase;
use Illuminate\Database\Seeder;

class TypeOfCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TypeOfCase::create([
           'nombre' => 'Caso Civil',
       ]); 

        TypeOfCase::create([
           'nombre' => 'Caso Familiar',
        ]);
        
        TypeOfCase::create([
            'nombre' => 'Caso Penal',
        ]); 

        TypeOfCase::create([
            'nombre' => 'Caso Laboral',
        ]); 
    }
}
