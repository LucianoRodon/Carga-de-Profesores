<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesorUnidadCurricular extends Model
{
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
}
