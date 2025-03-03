@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center fw-bold fs-4">
            Materias Asignadas a {{ $profesor->nombre }} {{ $profesor->apellido }}
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($materias->isEmpty())
                <div class="alert alert-warning text-center shadow-sm p-3">
                    <i class="fas fa-exclamation-circle me-2"></i> No hay materias asignadas.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Carrera</th>
                                <th>Grado</th>
                                <th>División</th>
                                <th>Materia</th>
                                <th>Hora Semanal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materias as $materia)
                                <tr>
                                    <td>{{ $materia->carrera->carrera }}</td>
                                    <td>{{ $materia->grado->grado }}</td>
                                    <td>{{ $materia->grado->division }}</td>
                                    <td>{{ $materia->unidadCurricular->unidad_curricular }}</td>
                                    <td>{{ $materia->unidadCurricular->horas_sem }}</td>
                                    <td>
                                        <form action="{{ route('profesores.eliminar-materia', $materia->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                onclick="return confirm('¿Está seguro de eliminar esta materia?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('profesores.asignar-materias', $profesor->id) }}" class="btn btn-success shadow-sm">
                    <i class="fas fa-plus"></i> Asignar Nueva Materia
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-4 mt-5">
        <a href="{{ route('profesores.index') }}" class="btn btn-secondary shadow-sm rounded-pill px-4">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>
</div>
@endsection