<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadCurricular;
use Illuminate\Support\Facades\Log;


class UnidadCurricularController extends Controller
{
    public function obtenerUnidadesCurriculares($carrera, $grado)
    {
        Log::info("Buscando unidades curriculares para carrera: $carrera y grado: $grado");
    
        $unidadesCurriculares = UnidadCurricular::whereHas('carreras', function ($query) use ($carrera) {
            $query->where('carrera_uc.id_carrera', $carrera);
        })
        ->whereHas('grados', function ($query) use ($grado) {
            $query->where('grado_uc.id_grado', $grado);
        })
        ->get();
    
        Log::info("Materias encontradas: ", $unidadesCurriculares->toArray());
    
        return response()->json($unidadesCurriculares);
    }

    
}
