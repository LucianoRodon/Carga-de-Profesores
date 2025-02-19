<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadCurricularTableSeeder extends Seeder
{
    public function run()
    {
        $unidadesCurriculares = [
            ['id_uc' => 1, 'unidad_curricular' => 'Comunicacion', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Taller'],
            ['id_uc' => 2, 'unidad_curricular' => 'UDI 1', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Materia'],
            ['id_uc' => 3, 'unidad_curricular' => 'Matemática', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 4, 'unidad_curricular' => 'Física Aplicada a las Tecnologías de la Información', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Taller'],
            ['id_uc' => 5, 'unidad_curricular' => 'Administración', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 6, 'unidad_curricular' => 'InglésTécnico', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 7, 'unidad_curricular' => 'Arquitectura de las computadoras', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 8, 'unidad_curricular' => 'Lógica y Programación', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 9, 'unidad_curricular' => 'Infraestructura de Redes 1', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 10, 'unidad_curricular' => 'Inglés Técnico 1', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 11, 'unidad_curricular' => 'Tecnología de la Información', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 12, 'unidad_curricular' => 'Lógica y Estructura de Datos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 13, 'unidad_curricular' => 'Ingeniería de Software 1', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 14, 'unidad_curricular' => 'Sistemas Operativos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 15, 'unidad_curricular' => 'Psicosociología de las Organizaciones', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 16, 'unidad_curricular' => 'Modelos de Negocios', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Taller'],
            ['id_uc' => 17, 'unidad_curricular' => 'Gestión de Software 1', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 18, 'unidad_curricular' => 'Análisis de Sistemas Organizacionales', 'tipo' => 'Anual', 'horas_sem' => 5, 'horas_anual' => 160, 'formato' => 'Taller'],
            ['id_uc' => 19, 'unidad_curricular' => 'Problemáticas Socio Contemporáneas', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Materia'],
            ['id_uc' => 20, 'unidad_curricular' => 'UDI 2', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Materia'],
            ['id_uc' => 21, 'unidad_curricular' => 'Estadística', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 22, 'unidad_curricular' => 'Innovación y Desarrollo Emprendedor', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Taller'],
            ['id_uc' => 23, 'unidad_curricular' => 'Algoritmos y Estructura de Datos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 24, 'unidad_curricular' => 'Base de Datos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 25, 'unidad_curricular' => 'Infraestructura de Redes 2', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Laboratorio'],
            ['id_uc' => 26, 'unidad_curricular' => 'Práctica Profesionalizante 1', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Proyecto'],
            ['id_uc' => 27, 'unidad_curricular' => 'Inglés Técnico 2', 'tipo' => 'Anual', 'horas_sem' => 3, 'horas_anual' => 96, 'formato' => 'Materia'],
            ['id_uc' => 28, 'unidad_curricular' => 'Programación 1', 'tipo' => 'Anual', 'horas_sem' => 6, 'horas_anual' => 192, 'formato' => 'Taller'],
            ['id_uc' => 29, 'unidad_curricular' => 'Ingeniería de Software 2', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 30, 'unidad_curricular' => 'Bases de Datos 1', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 31, 'unidad_curricular' => 'Gestión de Software 2', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 32, 'unidad_curricular' => 'Estrategias de Negocios', 'tipo' => 'Anual', 'horas_sem' => 2, 'horas_anual' => 128, 'formato' => 'Proyecto'],
            ['id_uc' => 33, 'unidad_curricular' => 'Desarrollo de Sistemas', 'tipo' => 'Anual', 'horas_sem' => 5, 'horas_anual' => 160, 'formato' => 'Taller'],
            ['id_uc' => 34, 'unidad_curricular' => 'Ética y Responsabilidad Social', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Materia'],
            ['id_uc' => 35, 'unidad_curricular' => 'Derecho y Legislación laboral', 'tipo' => 'Cuatrimestral', 'horas_sem' => 3, 'horas_anual' => 48, 'formato' => 'Materia'],
            ['id_uc' => 36, 'unidad_curricular' => 'Administración de Bases de Datos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 37, 'unidad_curricular' => 'Seguridad de los Sistemas', 'tipo' => 'Anual', 'horas_sem' => 5, 'horas_anual' => 160, 'formato' => 'Materia'],
            ['id_uc' => 38, 'unidad_curricular' => 'Integridad y Migración de Datos', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Proyecto'],
            ['id_uc' => 39, 'unidad_curricular' => 'Administración de Sistemas Operativos y Red', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 40, 'unidad_curricular' => 'Práctica Profesionalizante 2', 'tipo' => 'Anual', 'horas_sem' => 8, 'horas_anual' => 256, 'formato' => 'Proyecto'],
            ['id_uc' => 41, 'unidad_curricular' => 'Redes y Comunicación', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Laboratorio'],
            ['id_uc' => 42, 'unidad_curricular' => 'Programación 2', 'tipo' => 'Anual', 'horas_sem' => 6, 'horas_anual' => 192, 'formato' => 'Taller'],
            ['id_uc' => 43, 'unidad_curricular' => 'Gestión de Proyectos de Software', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Materia'],
            ['id_uc' => 44, 'unidad_curricular' => 'Bases de Datos 2', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 45, 'unidad_curricular' => 'Sistema de Información Organizacional', 'tipo' => 'Anual', 'horas_sem' => 4, 'horas_anual' => 128, 'formato' => 'Taller'],
            ['id_uc' => 46, 'unidad_curricular' => 'Desarrollo de Sistemas Web', 'tipo' => 'Anual', 'horas_sem' => 5, 'horas_anual' => 160, 'formato' => 'Taller']
        ];

        DB::table('unidad_curricular')->insert($unidadesCurriculares);
    }
}
