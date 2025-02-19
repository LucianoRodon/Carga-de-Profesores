<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadesTableSeeder extends Seeder
{
    public function run()
    {
        $localidades = [
            ['id_localidad' => 1, 'localidad' => 'Buenos Aires'],
            ['id_localidad' => 2, 'localidad' => 'Córdoba'],
            ['id_localidad' => 3, 'localidad' => 'Rosario'],
            ['id_localidad' => 4, 'localidad' => 'Mendoza'],
            ['id_localidad' => 5, 'localidad' => 'San Miguel de Tucumán'],
            ['id_localidad' => 6, 'localidad' => 'La Plata'],
            ['id_localidad' => 7, 'localidad' => 'Mar del Plata'],
            ['id_localidad' => 8, 'localidad' => 'Salta'],
            ['id_localidad' => 9, 'localidad' => 'Santa Fe'],
            ['id_localidad' => 10, 'localidad' => 'San Juan'],
            ['id_localidad' => 11, 'localidad' => 'Resistencia'],
            ['id_localidad' => 12, 'localidad' => 'Santiago del Estero'],
            ['id_localidad' => 13, 'localidad' => 'Corrientes'],
            ['id_localidad' => 14, 'localidad' => 'Bahía Blanca'],
            ['id_localidad' => 15, 'localidad' => 'Posadas'],
            ['id_localidad' => 16, 'localidad' => 'San Salvador de Jujuy'],
            ['id_localidad' => 17, 'localidad' => 'Paraná'],
            ['id_localidad' => 18, 'localidad' => 'Neuquén'],
            ['id_localidad' => 19, 'localidad' => 'Formosa'],
            ['id_localidad' => 20, 'localidad' => 'San Fernando del Valle de Catamarca'],
            ['id_localidad' => 21, 'localidad' => 'Río Cuarto'],
            ['id_localidad' => 22, 'localidad' => 'Comodoro Rivadavia'],
            ['id_localidad' => 23, 'localidad' => 'San Luis'],
            ['id_localidad' => 24, 'localidad' => 'Quilmes'],
            ['id_localidad' => 25, 'localidad' => 'Lanús'],
            ['id_localidad' => 26, 'localidad' => 'La Rioja'],
            ['id_localidad' => 27, 'localidad' => 'Morón'],
            ['id_localidad' => 28, 'localidad' => 'Trelew'],
            ['id_localidad' => 29, 'localidad' => 'Villa María'],
            ['id_localidad' => 30, 'localidad' => 'Rafaela']
        ];

        DB::table('localidades')->insert($localidades);
    }
}
