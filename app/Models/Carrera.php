<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    public function grados()
    {
        return $this->hasMany(Grado::class, 'id_carrera', 'id_carrera');
    }
}
