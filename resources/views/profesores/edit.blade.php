@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header" style="background-color:rgb(0, 74, 122); color: white;">
                    <h3 class="mb-0">
                        <i class="fas fa-user-edit me-2"></i>Editar Profesor: 
                        {{ $profesor->nombre }} {{ $profesor->apellido }}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profesores.update', $profesor) }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nombre" 
                                           class="form-control @error('nombre') is-invalid @enderror" 
                                           value="{{ old('nombre', $profesor->nombre) }}" 
                                           required>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="apellido" 
                                           class="form-control @error('apellido') is-invalid @enderror" 
                                           value="{{ old('apellido', $profesor->apellido) }}" 
                                           required>
                                    @error('apellido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">DNI</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="number" name="dni" 
                                           class="form-control @error('dni') is-invalid @enderror" 
                                           value="{{ old('dni', $profesor->dni) }}" 
                                           required>
                                    @error('dni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', $profesor->email) }}" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="number" name="telefono" 
                                           class="form-control @error('telefono') is-invalid @enderror" 
                                           value="{{ old('telefono', $profesor->telefono) }}" 
                                           required>
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha Nacimiento</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    <input type="date" name="fecha_nacimiento" 
                                           class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                           value="{{ old('fecha_nacimiento', $profesor->fecha_nacimiento) }}" 
                                           required>
                                    @error('fecha_nacimiento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Género</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    <select name="genero" class="form-select @error('genero') is-invalid @enderror" required>
                                        @foreach($generos as $key => $genero)
                                            <option value="{{ $key }}" 
                                                {{ old('genero', $profesor->genero) == $key ? 'selected' : '' }}>
                                                {{ $genero }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('genero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label class="form-label">Disponibilidad Horaria 
                                <i class="fas fa-exclamation-circle" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Recuerde: 1 hora cátedra equivale a 40 minutos" 
                                style="color: gray;"></i>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                <input type="number" name="disponibilidad_horaria" 
                                    class="form-control @error('disponibilidad_horaria') is-invalid @enderror" 
                                    value="{{ old('disponibilidad_horaria', $profesor->disponibilidad_horaria) }}">
                                @error('disponibilidad_horaria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dirección</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    <textarea name="direccion" 
                                              class="form-control @error('direccion') is-invalid @enderror" 
                                              required>{{ old('direccion', $profesor->direccion) }}</textarea>
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Localidad</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                    <select name="id_localidad" class="form-select @error('id_localidad') is-invalid @enderror">
                                        <option value="" disabled selected>Seleccionar Localidad</option>
                                        @foreach($localidades as $localidad)
                                            <option value="{{ $localidad->id_localidad }}" 
                                                {{ old('id_localidad', $profesor->id_localidad) == $localidad->id_localidad ? 'selected' : '' }}>
                                                {{ $localidad->localidad }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_localidad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estudios</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    <textarea name="estudios" 
                                            class="form-control @error('estudios') is-invalid @enderror">{{ old('estudios', $profesor->estudios) }}</textarea>
                                </div>
                                @error('estudios')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Experiencia</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    <textarea name="experiencia" 
                                            class="form-control @error('experiencia') is-invalid @enderror">{{ old('experiencia', $profesor->experiencia) }}</textarea>
                                </div>
                                @error('experiencia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="d-flex justify-content-between">
                            <a href="{{ route('profesores.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
