<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProfesorMateriaController;
use App\Http\Controllers\UnidadCurricularController;

// Opción 1: Usando método de controlador
Route::controller(ProfesorController::class)->group(function () {
    Route::get('/profesores', 'index')->name('profesores.index');
    Route::get('/profesores/create', 'create')->name('profesores.create');
    Route::post('/profesores', 'store')->name('profesores.store');
    Route::get('/profesores/{profesor}', 'show')->name('profesores.show');
    Route::get('/profesores/{profesor}/edit', 'edit')->name('profesores.edit');
    Route::put('/profesores/{profesor}', 'update')->name('profesores.update');
    Route::delete('/profesores/{profesor}', 'destroy')->name('profesores.destroy');
});

// Opción 2: Usando resource (recomendado)
Route::resource('profesores', ProfesorController::class);

Route::group(['prefix' => 'profesores'], function () {
    // Rutas para asignación de materias
    Route::get('/{profesorId}/asignar-materias', [ProfesorMateriaController::class, 'asignarMaterias'])
        ->name('profesores.asignar-materias');

    Route::post('/{profesorId}/store-materias', [ProfesorMateriaController::class, 'storeMaterias'])
        ->name('profesores.store-materias');

    Route::get('/{profesorId}/ver-materias', [ProfesorMateriaController::class, 'verMaterias'])
        ->name('profesores.ver-materias');

    Route::delete('/eliminar-materia/{id}', [ProfesorMateriaController::class, 'eliminarMateria'])
        ->name('profesores.eliminar-materia');

    Route::get('/profesores/materias', [ProfesorController::class, 'todasMaterias'])->name('profesores.todas-materias');


});

// Nueva ruta agregada para obtener unidades curriculares filtradas por carrera y grado
// En routes/web.php
Route::get('/unidades-curriculares/{carrera}/{grado}', [ProfesorMateriaController::class, 'obtenerUnidadesCurriculares'])
    ->name('unidades-curriculares.obtener');


Route::get('/materias-sin-profesor', [UnidadCurricularController::class, 'index'])->name('profesores.todas-materias');
Route::get('/api/materias-sin-profesor', [UnidadCurricularController::class, 'materiasSinProfesor'])->name('materias.sin.profesor');

