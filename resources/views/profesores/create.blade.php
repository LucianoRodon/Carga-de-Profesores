@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-white text-center fw-bold fs-4"
                        style="background: linear-gradient(90deg, #004a7a, #007bb5);">
                        <i class="fas fa-user-plus"></i> Crear Nuevo Profesor
                    </div>

                    <div class="card-body p-4">
                        {{-- Mostrar errores de validación al principio del formulario --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                <strong><i class="fas fa-exclamation-triangle"></i> ¡Ups!</strong> Hay algunos problemas con el
                                formulario:
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profesores.store') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="fw-bold">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text"
                                            class="form-control shadow-sm @error('nombre') is-invalid @enderror"
                                            name="nombre" value="{{ old('nombre') }}" required>
                                    </div>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        <input type="text"
                                            class="form-control shadow-sm @error('apellido') is-invalid @enderror"
                                            name="apellido" value="{{ old('apellido') }}" required>
                                    </div>
                                    @error('apellido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">DNI</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="number"
                                            class="form-control shadow-sm @error('dni') is-invalid @enderror" name="dni"
                                            value="{{ old('dni') }}" required>
                                    </div>
                                    @error('dni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email"
                                            class="form-control shadow-sm @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="number"
                                            class="form-control shadow-sm @error('telefono') is-invalid @enderror"
                                            name="telefono" value="{{ old('telefono') }}" required>
                                    </div>
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Género</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-transgender-alt"></i></span>
                                        <select class="form-select shadow-sm @error('genero') is-invalid @enderror"
                                            name="genero" required>
                                            <option value="" disabled selected>Seleccione Género</option>
                                            @foreach($generos as $key => $genero)
                                                <option value="{{ $key }}" {{ old('genero') == $key ? 'selected' : '' }}>
                                                    {{ $genero }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('genero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date"
                                            class="form-control shadow-sm @error('fecha_nacimiento') is-invalid @enderror"
                                            name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                    </div>
                                    @error('fecha_nacimiento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Localidad</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <select name="id_localidad"
                                            class="form-select shadow-sm @error('id_localidad') is-invalid @enderror"
                                            required>
                                            <option value="" disabled selected>Seleccionar Localidad</option>
                                            @foreach($localidades as $localidad)
                                                <option value="{{ $localidad->id_localidad }}" {{ old('id_localidad') == $localidad->id_localidad ? 'selected' : '' }}>
                                                    {{ $localidad->localidad }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_localidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">Dirección</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        <textarea class="form-control shadow-sm @error('direccion') is-invalid @enderror"
                                            name="direccion" required>{{ old('direccion') }}</textarea>
                                    </div>
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Estudios</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <textarea class="form-control shadow-sm @error('estudios') is-invalid @enderror"
                                            name="estudios">{{ old('estudios') }}</textarea>
                                    </div>
                                    @error('estudios')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">Experiencia</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <textarea class="form-control shadow-sm @error('experiencia') is-invalid @enderror"
                                            name="experiencia">{{ old('experiencia') }}</textarea>
                                    </div>
                                    @error('experiencia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Profesión</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        <input type="text"
                                            class="form-control shadow-sm @error('profesion') is-invalid @enderror"
                                            name="profesion" value="{{ old('profesion') }}">
                                    </div>
                                    @error('profesion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="fw-bold">Disponibilidad Horaria
                                        <i class="fas fa-exclamation-circle" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Recuerde: 1 hora cátedra equivale a 40 minutos"
                                            style="color: gray;"></i>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="number"
                                            class="form-control shadow-sm @error('disponibilidad_horaria') is-invalid @enderror"
                                            name="disponibilidad_horaria" value="{{ old('disponibilidad_horaria') }}">
                                    </div>
                                    @error('disponibilidad_horaria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-bold">Estado</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        <select class="form-control shadow-sm @error('estado') is-invalid @enderror"
                                            name="estado" required>
                                            @foreach($estados as $key => $estado)
                                                <option value="{{ $key }}" {{ old('estado') == $key ? 'selected' : '' }}>
                                                    {{ $estado }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('estado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-success btn-lg shadow-sm rounded-pill px-2">
                                        <i class="fas fa-check"></i> Crear Profesor
                                    </button>
                                    <a href="{{ route('profesores.index') }}"
                                        class="btn btn-danger btn-lg shadow-sm rounded-pill px-3 ms-2">
                                        <i class="fas fa-times"></i> Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection