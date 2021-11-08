<?php

namespace Database\Seeders;

use App\Models\TypeOfProcedure;
use Illuminate\Database\Seeder;

class TypeOfProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfProcedure::create([
            'nombre' => 'Permiso de viajes a menores',
        ]); 

        TypeOfProcedure::create([
            'nombre' => 'Registro de antecedentes Penales',
        ]); 

        TypeOfProcedure::create([
            'nombre' => 'Inscripcion de bienes e inmuebles',
        ]); 

        TypeOfProcedure::create([
            'nombre' => 'Registros de moviemientos',
        ]); 

        TypeOfProcedure::create([
            'nombre' => 'Solicitud de doble nacionalidad',
        ]); 
    }
}
