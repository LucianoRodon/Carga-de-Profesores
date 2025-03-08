@extends('layouts.app') <!-- o tu layout base si es diferente -->

@section('content')
    <div class="container mt-4">
        <h2>Profesores Inactivos</h2>

        @if($profesoresInactivos->isEmpty())
            <div class="alert alert-warning">
                No hay profesores inactivos.
            </div>
        @else
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha de inactivacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesoresInactivos as $profesor)
                        <tr>
                            <td>{{ $profesor->dni }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->apellido }}</td>
                            <td>{{ $profesor->email }}</td>
                            <td>{{ $profesor->telefono }}</td>
                            <td>{{ \Carbon\Carbon::parse($profesor->fecha_inactivacion)->subHours(3)->format('d/m/Y H:i') ?? 'No disponible' }}</td>
                            <td>
                                <a href="{{ route('profesores.show', $profesor->id) }}" class="btn btn-info btn-sm">
                                    Ver detalles
                                </a>
                                <!-- Cambiar el formulario de activación con un ícono de check -->
                                <form action="{{ route('profesores.activar', $profesor->id) }}" method="POST" style="display:inline-block;" class="activar-form">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> <!-- Icono de check -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            {{ $profesoresInactivos->links() }}
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activarForms = document.querySelectorAll('.activar-form');

            activarForms.forEach(form => {
                form.addEventListener('submit', function(e) {
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
                            form.submit();  // Envía el formulario si el usuario confirma
                        }
                    });
                });
            });
        });
    </script>
@endsection
