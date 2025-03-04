<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfesorUnidadCurricular extends Model
{
    use SoftDeletes;
    protected $table = 'profesor_unidad_curricular';

    protected $fillable = [
        'profesor_id',
        'id_carrera',
        'id_grado',
        'id_uc'
    ];

    // Relaciones
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }

    public function unidadCurricular()
    {
        return $this->belongsTo(UnidadCurricular::class, 'id_uc');
    }

    // Método para verificar disponibilidad de materia
    public static function estaDisponible($carreraId, $gradoId, $unidadCurricularId)
    {
        return !self::where([
            'id_carrera' => $carreraId,
            'id_grado' => $gradoId,
            'id_uc' => $unidadCurricularId
        ])->exists();
    }

    // Método para verificar asignación a otro profesor
    public static function estaAsignadaAOtroProfesor($carreraId, $gradoId, $unidadCurricularId, $profesorActualId = null)
    {
        $query = self::where([
            'id_carrera' => $carreraId,
            'id_grado' => $gradoId,
            'id_uc' => $unidadCurricularId
        ]);

        // Si se proporciona el profesor actual, excluirlo de la verificación
        if ($profesorActualId) {
            $query->where('profesor_id', '!=', $profesorActualId);
        }

        return $query->exists();
    }


}
