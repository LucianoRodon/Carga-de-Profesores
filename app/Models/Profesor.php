<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{
    use SoftDeletes;

    protected $table = 'profesores';

    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'genero',
        'fecha_nacimiento',
        'direccion',
        'estudios',
        'experiencia',
        'profesion',
        'disponibilidad_horaria',
        'estado',
        'id_localidad'
    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'id_localidad', 'id_localidad');
    }

    // Reescribir método de eliminación para resetear IDs
    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            self::resetAutoIncrement();
        });
    }

    // Método para resetear auto incremento
    public static function resetAutoIncrement()
    {
        $max = self::withTrashed()->max('id');
        \DB::statement("ALTER TABLE profesores AUTO_INCREMENT = " . ($max + 1));
    }

    // Scopes para filtros
    public function scopeActivos($query)
    {
        return $query->where('estado', 'Activo');
    }

    public function scopeInactivos($query)
    {
        return $query->where('estado', 'Inactivo');
    }
}

class UnidadCurricular extends Model
{
    protected $table = 'unidad_curricular';
    protected $primaryKey = 'id_uc';
}
