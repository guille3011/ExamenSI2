<?php

namespace Database\Seeders;

use App\Models\Expedient;
use Illuminate\Database\Seeder;

class ExpedientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expedient::create([
            'nombre' => 'Caso de incumpliemineto de deberes gg1',
            'fecha_creacion' => '2019/08/12',
            'estado' => 'Pendiente',
            'id_client' => 1,
            'id_lawyer' => 1,
            'id_procurator' =>2,
            'id_typecase' =>2,
        ]);

        Expedient::create([
            'nombre' => 'Caso de incumpliemineto de dinero gg2',
            'fecha_creacion' => '2020/08/12',
            'estado' => 'Pendiente',
            'id_client' => 1,
            'id_lawyer' => 1,
            'id_procurator' =>2,
            'id_typecase' =>2,
        ]);

        Expedient::create([
            'nombre' => 'Caso Robo1',
            'fecha_creacion' => '2019/10/12',
            'estado' => 'Pendiente',
            'id_client' => 2,
            'id_lawyer' => 1,
            'id_procurator' =>1,
            'id_typecase' =>3,
        ]);

        Expedient::create([
            'nombre' => 'Caso terrorismo 1',
            'fecha_creacion' => '2021/08/12',
            'estado' => 'Pendiente',
            'id_client' => 3,
            'id_lawyer' => 4,
            'id_procurator' =>2,
            'id_typecase' =>4,
        ]);

        Expedient::create([
            'nombre' => 'caso asalto a mano armada 1',
            'fecha_creacion' => '2020/11/12',
            'estado' => 'Pendiente',
            'id_client' => 3,
            'id_lawyer' => 4,
            'id_procurator' =>1,
            'id_typecase' =>2,
        ]);

        Expedient::create([
            'nombre' => 'caso robo de bicicletas 1',
            'fecha_creacion' => '2020/12/12',
            'estado' => 'Pendiente',
            'id_client' => 4,
            'id_lawyer' => 4,
            'id_procurator' =>1,
            'id_typecase' =>1,
        ]);
    }
}
