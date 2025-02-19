<?php
namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Carrera;
use App\Models\Grado;
use App\Models\UnidadCurricular;
use App\Models\ProfesorUnidadCurricular;
use Illuminate\Http\Request;

class ProfesorMateriaController extends Controller
{
    // Vista para asignar materias
    public function asignarMaterias($profesorId)
    {
        $profesor = Profesor::findOrFail($profesorId);
        $carreras = Carrera::all();
        $grados = Grado::all();
        $unidadesCurriculares = UnidadCurricular::all();

        return view('profesores.asignar-materias', compact(
            'profesor', 
            'carreras', 
            'grados', 
            'unidadesCurriculares'
        ));
    }

    // Guardar asignación de materias
    public function storeMaterias(Request $request, $profesorId)
    {
        $request->validate([
            'carrera' => 'required|exists:carreras,id_carrera',
            'grado' => 'required|exists:grados,id_grado',
            'unidad_curricular' => 'required|exists:unidad_curricular,id_uc',
        ]);

        // Verificar si ya existe la asignación
        $existente = ProfesorUnidadCurricular::where([
            'profesor_id' => $profesorId,
            'id_carrera' => $request->carrera,
            'id_grado' => $request->grado,
            'id_uc' => $request->unidad_curricular
        ])->exists();

        if ($existente) {
            return back()->with('error', 'Esta materia ya está asignada al profesor.');
        }

        // Crear nueva asignación
        ProfesorUnidadCurricular::create([
            'profesor_id' => $profesorId,
            'id_carrera' => $request->carrera,
            'id_grado' => $request->grado,
            'id_uc' => $request->unidad_curricular
        ]);

        return back()->with('success', 'Materia asignada correctamente.');
    }
    

    // Ver materias asignadas
    public function verMaterias($profesorId)
    {
        $profesor = Profesor::findOrFail($profesorId);
        $materias = ProfesorUnidadCurricular::where('profesor_id', $profesorId)
            ->with(['carrera', 'grado', 'unidadCurricular'])
            ->get();

        return view('profesores.ver-materias', compact('profesor', 'materias'));
    }

    // Eliminar asignación de materia
    public function eliminarMateria($id)
    {
        $asignacion = ProfesorUnidadCurricular::findOrFail($id);
        $asignacion->delete();

        return back()->with('success', 'Materia eliminada correctamente.');
    }
}
