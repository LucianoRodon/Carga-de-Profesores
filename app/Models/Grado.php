<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grados';
    protected $primaryKey = 'id_grado';

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    public function unidadesCurriculares()
    {
        return $this->hasMany(UnidadCurricular::class, 'id_grado', 'id_grado');
    }
}
