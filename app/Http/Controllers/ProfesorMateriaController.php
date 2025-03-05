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

        // Verificar si la unidad curricular ya está asignada a otro profesor
        if (
            ProfesorUnidadCurricular::estaAsignadaAOtroProfesor(
                $request->carrera,
                $request->grado,
                $request->unidad_curricular,
                $profesorId
            )
        ) {
            return back()->with('error', 'Esta materia ya está asignada a otro profesor.');
        }

        // Verificar si ya existe la asignación para este profesor
        $existente = ProfesorUnidadCurricular::where([
            'profesor_id' => $profesorId,
            'id_carrera' => $request->carrera,
            'id_grado' => $request->grado,
            'id_uc' => $request->unidad_curricular
        ])->exists();

        if ($existente) {
            return back()->with('error', 'Esta materia ya está asignada a este profesor.');
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

    public function obtenerUnidadesCurriculares($carreraId, $gradoId)
    {
        // Obtener todas las unidades curriculares para la carrera y grado
        $unidadesCurriculares = UnidadCurricular::whereHas('carreras', function ($query) use ($carreraId) {
            $query->where('carreras.id_carrera', $carreraId);
        })->whereHas('grados', function ($query) use ($gradoId) {
            $query->where('grados.id_grado', $gradoId);
        })->get();

        // Obtener las materias ya asignadas a cualquier profesor para este grado y carrera
        $materiasAsignadas = ProfesorUnidadCurricular::where([
            'id_carrera' => $carreraId,
            'id_grado' => $gradoId
        ])->pluck('id_uc');

        // Filtrar unidades curriculares excluyendo las asignadas
        $unidadesDisponibles = $unidadesCurriculares->filter(function ($unidad) use ($materiasAsignadas) {
            return !$materiasAsignadas->contains($unidad->id_uc);
        });

        return response()->json($unidadesDisponibles->values());
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

        $unidadCurricular = $asignacion->unidadCurricular->unidad_curricular;

        $asignacion->delete();

        return redirect()->back()
            ->with('success', "La materia {$unidadCurricular} ha sido eliminada correctamente.");
    }



}
