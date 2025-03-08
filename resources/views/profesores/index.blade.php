@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header" style="background-color:rgb(0, 74, 122); color: white;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">
                                <i class="fas fa-chalkboard-teacher me-2"></i>Registros
                            </h3>
                            <a href="{{ route('profesores.create') }}" class="btn btn-success">
                                <i class="fas fa-plus-circle me-1"></i>Nuevo Profesor
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('profesores.index') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Buscar por DNI, nombre o apellido" value="{{ request('search') }}">
                                        <button class="btn btn-outline-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>

                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Disponibilidad Horaria</th>
                                        <th>Estado</th>
                                        <th>Materias</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($profesores as $profesor)
                                                                @if($profesor->estado === 'Activo')
                                                                                            <tr>
                                                                                                <td>{{ $profesor->dni }}</td>
                                                                                                <td>{{ $profesor->nombre }}</td>
                                                                                                <td>{{ $profesor->apellido }}</td>
                                                                                                <td>{{ $profesor->telefono }}</td>
                                                                                                <td>{{ $profesor->email }}</td>
                                                                                                <td>{{ $profesor->disponibilidad_horaria }} hs</td>
                                                                                                <td>
                                                                                                    <span class="badge bg-success">Activo</span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div class="btn-group" role="group">
                                                                                                        <a href="{{ route('profesores.asignar-materias', $profesor->id) }}"
                                                                                                            class="btn btn-dark btn-sm">
                                                                                                            <i class="fas fa-chalkboard-teacher"></i>
                                                                                                        </a>
                                                                                                        <a href="{{ route('profesores.ver-materias', $profesor->id) }}"
                                                                                                            class="btn btn-warning btn-sm">
                                                                                                            <i class="fas fa-book-open"></i>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div class="btn-group" role="group">
                                                                                                        <a href="{{ route('profesores.show', $profesor) }}"
                                                                                                            class="btn btn-info btn-sm" title="Ver Detalles">
                                                                                                            <i class="fas fa-eye"></i>
                                                                                                        </a>
                                                                                                        <a href="{{ route('profesores.edit', $profesor) }}"
                                                                                                            class="btn btn-warning btn-sm" title="Editar">
                                                                                                            <i class="fas fa-edit"></i>
                                                                                                        </a>
                                                                                                        <form action="{{ route('profesores.destroy', $profesor) }}" method="POST"
                                                                                                            class="d-inline delete-form" data-asignaciones="{{ $profesor->asignaciones->map(function ($asignacion) {
                                                                        return $asignacion->unidadCurricular->unidad_curricular;
                                                                    })->implode(', ') }}">
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <button type="submit" class="btn btn-danger btn-sm delete-btn"
                                                                                                                data-bs-toggle="tooltip" title="Inactivar">
                                                                                                                <i class="fas fa-ban"></i>
                                                                                                            </button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                @endif
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="alert alert-info">
                                                    No se encontraron registros de profesores activos
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $profesores->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    let asignaciones = form.getAttribute('data-asignaciones');
                    let asignacionesHtml = asignaciones
                        ? `<ul class="list-group mb-3">${asignaciones.split(', ').map(a => `<li class="list-group-item">${a}</li>`).join('')}</ul>`
                        : `<p class="text-muted">No hay asignaciones.</p>`;

                    Swal.fire({
                        title: 'Inactivar Profesor',
                        html: `
                                <div class="alert alert-warning" role="alert">
                                    <i class="fas fa-exclamation-triangle me-3 fs-4"></i>
                                    <strong>Atención:</strong> Se eliminarán las siguientes asignaciones de materias del profesor.
                                </div>
                                ${asignacionesHtml}
                                ¿Estás seguro de que deseas continuar?
                            `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, inactivar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

@endpush