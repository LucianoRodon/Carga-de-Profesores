@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header" style="background-color:rgb(0, 74, 122); color: white;">
                    <h2>Detalles del Profesor</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>ID:</strong> {{ $profesor->id }}<br>
                            <strong>DNI:</strong> {{ $profesor->dni }}<br>
                            <strong>Nombre Completo:</strong> {{ $profesor->nombre }} {{ $profesor->apellido }}<br>
                            <strong>Email:</strong> {{ $profesor->email }}<br>
                            <strong>Teléfono:</strong> {{ $profesor->telefono }}<br>
                            <strong>Género:</strong> {{ $profesor->genero }}<br>
                            <strong>Fecha Nacimiento:</strong> {{ $profesor->fecha_nacimiento }}<br>
                            <strong>Dirección:</strong> {{ $profesor->direccion }}<br>
                            <strong>Localidad:</strong>
                            {{ $profesor->localidad ? $profesor->localidad->localidad : 'No especificada' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Estudios:</strong> {{ $profesor->estudios ?? 'No especificado' }}<br>
                            <strong>Experiencia:</strong> {{ $profesor->experiencia ?? 'No especificado' }}<br>
                            <strong>Profesión:</strong> {{ $profesor->profesion ?? 'No especificado' }}<br>
                            <strong>Disponibilidad Horaria:</strong>
                            {{ $profesor->disponibilidad_horaria ?? 'No especificado' }}<br>
                            <strong>Estado:</strong>
                            <span class="badge {{ $profesor->estado == 'Activo' ? 'bg-success' : 'bg-danger' }}">
                                {{ $profesor->estado }}
                            </span><br>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Última Modificación:</strong> {{ $profesor->updated_at->diffForHumans() }}<br>
                        <strong>Fecha de Creación:</strong> {{ $profesor->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('profesores.edit', $profesor) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection