<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadCurricular extends Model
{
    use HasFactory;

    protected $table = 'unidad_curricular'; // Nombre correcto de la tabla
    protected $primaryKey = 'id_uc';
    public $timestamps = false; // Si la tabla no tiene timestamps

    protected $fillable = ['unidad_curricular'];

    // Relación con Carreras a través de carrera_uc
    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'carrera_uc', 'id_uc', 'id_carrera');
    }

    // Relación con Grados a través de grado_uc
    public function grados()
    {
        return $this->belongsToMany(Grado::class, 'grado_uc', 'id_uc', 'id_grado');
    }
}
class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    
    public function unidadesCurriculares()
    {
        return $this->belongsToMany(UnidadCurricular::class, 'carrera_uc', 'id_carrera', 'id_uc');
    }
}

class Grado extends Model
{
    use HasFactory;
    protected $table = 'grados';
    protected $primaryKey = 'id_grado';
    
    public function unidadesCurriculares()
    {
        return $this->belongsToMany(UnidadCurricular::class, 'grado_uc', 'id_grado', 'id_uc');
    }
}


