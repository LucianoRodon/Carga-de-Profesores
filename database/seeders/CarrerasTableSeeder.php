<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;

class CarrerasTableSeeder extends Seeder
{
    public function run()
    {
        $carreras = [
            [
                'id_carrera' => 2,
                'carrera' => 'Técnico Superior en Desarrollo de Software',
                'descripcion' => 'Formación en desarrollo de software',
                'cupo' => 120
            ],
            [
                'id_carrera' => 3,
                'carrera' => 'Técnico Superior en Infraestructura de Tecnología de la Información',
                'descripcion' => 'Formación en infraestructura tecnológica',
                'cupo' => 120
            ],
            [
                'id_carrera' => 5,
                'carrera' => 'Técnico Superior En Análisis Funcional De Sistemas Informáticos',
                'descripcion' => 'Formación en análisis de sistemas informáticos',
                'cupo' => 213
            ]
        ];

        // Elimina registros existentes para evitar duplicados
        DB::table('carreras')->whereIn('id_carrera', [2, 3, 5])->delete();

        // Inserta los nuevos registros
        DB::table('carreras')->insert($carreras);
    }
}
