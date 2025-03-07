<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function index()
    {
        // Obtener todas las carreras y grados
        $carreras = DB::table('carreras')->get();
        $grados = DB::table('grados')->get();

        // Retornar la vista con las variables
        return view('profesores.todas-materias', compact('carreras', 'grados'));
    }


    public function materiasSinProfesor(Request $request)
    {
        $request->validate([
            'carrera' => 'required|integer',
            'grado' => 'required|integer',
        ]);

        $materias = DB::select("
            SELECT uc.id_uc, uc.unidad_curricular
            FROM unidad_curricular uc
            JOIN carrera_uc cu ON uc.id_uc = cu.id_uc
            JOIN carrera_grado cg ON cu.id_carrera = cg.id_carrera
            JOIN grado_uc gu ON uc.id_uc = gu.id_uc AND cg.id_grado = gu.id_grado
            LEFT JOIN profesor_unidad_curricular puc 
                ON puc.id_uc = uc.id_uc AND puc.id_carrera = cu.id_carrera AND puc.id_grado = gu.id_grado
            WHERE puc.id IS NULL
                AND cu.id_carrera = ? 
                AND gu.id_grado = ?
        ", [$request->carrera, $request->grado]);

        return response()->json($materias);
    }


}
