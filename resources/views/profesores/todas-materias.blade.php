@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Materias Sin Profesor</h2>

        <form id="filter-form">
            <div class="row">
                <div class="col-md-6">
                    <label for="carrera">Selecciona una Carrera:</label>
                    <select id="carrera" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @if(isset($carreras) && count($carreras) > 0)
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        @else
                            <option value="">No hay carreras disponibles</option>
                        @endif
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="grado">Selecciona un Grado:</label>
                    <select id="grado" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @if(isset($grados) && count($grados) > 0)
                            @foreach($grados as $grado)
                                <option value="{{ $grado->id_grado }}">{{ $grado->grado }} - {{ $grado->division }}</option>
                            @endforeach
                        @else
                            <option value="">No hay grados disponibles</option>
                        @endif
                    </select>
                </div>
            </div>
        </form>

        <div id="materias-container" class="mt-4">
            <!-- Aquí se mostrarán las materias sin profesor -->
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const carreraSelect = document.getElementById("carrera");
            const gradoSelect = document.getElementById("grado");
            const materiasContainer = document.getElementById("materias-container");

            function obtenerMateriasSinProfesor() {
                const carrera = carreraSelect.value;
                const grado = gradoSelect.value;

                if (carrera && grado) {
                    fetch("{{ route('materias.sin.profesor') }}?carrera=" + carrera + "&grado=" + grado)
                        .then(response => response.json())
                        .then(data => {
                            materiasContainer.innerHTML = ""; // Limpiar contenido previo
                            if (data.length > 0) {
                                let html = "<ul class='list-group'>";
                                data.forEach(materia => {
                                    html += `<li class='list-group-item'>${materia.unidad_curricular}</li>`;
                                });
                                html += "</ul>";
                                materiasContainer.innerHTML = html;
                            } else {
                                materiasContainer.innerHTML = "<p class='text-danger'>No hay materias sin profesor.</p>";
                            }
                        })
                        .catch(error => console.error("Error al obtener las materias:", error));
                }
            }

            carreraSelect.addEventListener("change", obtenerMateriasSinProfesor);
            gradoSelect.addEventListener("change", obtenerMateriasSinProfesor);
        });
    </script>
@endsection
