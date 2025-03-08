@extends('layouts.app') <!-- o tu layout base si es diferente -->

@section('content')
    <div class="container mt-4">
        <h2 class="text-center text-danger">🚫 Profesores Inactivos</h2>

        @if($profesoresInactivos->isEmpty())
            <div class="alert alert-warning text-center">
                No hay profesores inactivos.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Fecha de inactivación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profesoresInactivos as $profesor)
                            <tr class="align-middle text-center">
                                <td>{{ $profesor->dni }}</td>
                                <td>{{ $profesor->nombre }}</td>
                                <td>{{ $profesor->apellido }}</td>
                                <td>{{ $profesor->email }}</td>
                                <td>{{ $profesor->telefono }}</td>
                                <td>{{ \Carbon\Carbon::parse($profesor->fecha_inactivacion)->subHours(3)->format('d/m/Y H:i') ?? 'No disponible' }}
                                </td>
                                <td>
                                    <a href="{{ route('profesores.show', $profesor->id) }}" class="btn btn-info btn-sm shadow">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <form action="{{ route('profesores.activar', $profesor->id) }}" method="POST"
                                        style="display:inline-block;" class="activar-form">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm shadow">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $profesoresInactivos->links() }}
            </div>
        @endif
    </div>

    <style>
        .table-hover tbody tr:hover {
            background-color:rgb(231, 231, 231) !important;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-success {
            transition: transform 0.2s;
        }

        .btn-success:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const activarForms = document.querySelectorAll('.activar-form');

            activarForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Activar Profesor',
                        text: '¿Estás seguro de que deseas activar a este profesor?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, activar',
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
@endsection