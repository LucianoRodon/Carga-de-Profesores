@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-dark text-white text-center fw-bold fs-4">
                <i class="fas fa-chalkboard-teacher"></i> Asignar Materias a {{ $profesor->nombre }}
                {{ $profesor->apellido }}
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('profesores.store-materias', $profesor->id) }}" method="POST"
                    class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="fw-bold text-primary">Carrera <i class="fas fa-graduation-cap"></i></label>
                            <select id="carrera" name="carrera" class="form-select border-primary shadow-sm" required>
                                <option value="" disabled selected>Seleccione Carrera</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-success">Grado <i class="fas fa-school"></i></label>
                            <select id="grado" name="grado" class="form-select border-success shadow-sm" required>
                                <option value="" disabled selected>Seleccione Grado</option>
                                @foreach($grados as $grado)
                                    <option value="{{ $grado->id_grado }}">{{ $grado->grado }} - {{ $grado->division }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold text-danger">Unidad Curricular <i class="fas fa-book"></i></label>
                            <select id="unidad_curricular" name="unidad_curricular"
                                class="form-select border-danger shadow-sm" required>
                                <option value="" disabled selected>Seleccione Materia</option>
                                @foreach($unidadesCurriculares as $unidad)
                                    <option value="{{ $unidad->id_uc }}">{{ $unidad->unidad_curricular }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-4 mt-5">
                        <button type="submit" id="asignarBtn" class="btn btn-primary shadow-sm rounded-pill px-4" disabled>
                            <i class="fas fa-plus-circle"></i> Asignar Materia
                        </button>
                        <a href="{{ route('profesores.ver-materias', $profesor->id) }}"
                            class="btn btn-warning shadow-sm rounded-pill px-4">
                            <i class="fas fa-book-open"></i> Materias Asignadas
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-4 mt-5">
            <a href="{{ route('profesores.index') }}" class="btn btn-secondary shadow-sm rounded-pill px-4">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const carrera = document.getElementById("carrera");
            const grado = document.getElementById("grado");
            const unidadCurricular = document.getElementById("unidad_curricular");
            const asignarBtn = document.getElementById("asignarBtn");

            function resetFields() {
                grado.value = ''; // Resetear grado
                unidadCurricular.innerHTML = '<option value="" disabled selected>Seleccione Materia</option>';
                asignarBtn.disabled = true;
            }

            function validarCampos() {
                asignarBtn.disabled = !(carrera.value && grado.value && unidadCurricular.value);
            }

            function cargarUnidadesCurriculares() {
                const carreraId = carrera.value;
                const gradoId = grado.value;

                if (carreraId && gradoId) {
                    fetch(`/unidades-curriculares/${carreraId}/${gradoId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al obtener unidades curriculares');
                            }
                            return response.json();
                        })
                        .then(data => {
                            unidadCurricular.innerHTML = '<option value="" disabled selected>Seleccione Materia</option>';

                            if (data.length === 0) {
                                unidadCurricular.innerHTML += '<option value="" disabled>No hay materias disponibles</option>';
                            } else {
                                data.forEach(unidad => {
                                    unidadCurricular.innerHTML += `<option value="${unidad.id_uc}">${unidad.unidad_curricular}</option>`;
                                });
                            }

                            validarCampos();
                        })
                        .catch(error => {
                            console.error('Error al obtener unidades curriculares:', error);
                            unidadCurricular.innerHTML = '<option value="" disabled>Error al cargar materias</option>';
                        });
                }
            }

            carrera.addEventListener("change", resetFields);
            grado.addEventListener("change", cargarUnidadesCurriculares);
            unidadCurricular.addEventListener("change", validarCampos);
        });


    </script>


@endsection