<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Grado;

class GradosTableSeeder extends Seeder
{
    public function run()
    {
        $grados = [
            ['id_grado' => 1, 'id_carrera' => 2, 'grado' => 1, 'division' => '1', 'detalle' => 'Primero Primera', 'capacidad' => 56],
            ['id_grado' => 2, 'id_carrera' => 2, 'grado' => 1, 'division' => '2', 'detalle' => 'Primero Segunda', 'capacidad' => 2],
            ['id_grado' => 3, 'id_carrera' => 2, 'grado' => 1, 'division' => '3', 'detalle' => 'Primero Tercera', 'capacidad' => 30],
            ['id_grado' => 4, 'id_carrera' => 3, 'grado' => 2, 'division' => '1', 'detalle' => 'Segundo Primera', 'capacidad' => 2],
            ['id_grado' => 5, 'id_carrera' => 3, 'grado' => 2, 'division' => '2', 'detalle' => 'Segundo Segunda', 'capacidad' => 30],
            ['id_grado' => 6, 'id_carrera' => 3, 'grado' => 2, 'division' => '3', 'detalle' => 'Segundo Tercera', 'capacidad' => 2],
            ['id_grado' => 7, 'id_carrera' => 5, 'grado' => 3, 'division' => '1', 'detalle' => 'Tercero Primera', 'capacidad' => 30],
            ['id_grado' => 8, 'id_carrera' => 5, 'grado' => 3, 'division' => '2', 'detalle' => 'Tercero Segunda', 'capacidad' => 30]
        ];

        // Primero inserta los registros
        DB::table('grados')->insert($grados);

        // Luego usa firstOrCreate para asegurar la creación
        foreach ($grados as $grado) {
            Grado::firstOrCreate(
                ['id_grado' => $grado['id_grado']],
                $grado
            );
        }
    }
}
