@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-dark fw-bold">📚 Materias Sin Profesor</h2>

        <div class="card shadow-lg border-0 p-4 bg-light">
            <form id="filter-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="carrera" class="form-label fw-semibold">Selecciona una Carrera:</label>
                        <select id="carrera" class="form-select custom-select">
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

                    <div class="col-md-6 mb-3">
                        <label for="grado" class="form-label fw-semibold">Selecciona un Grado:</label>
                        <select id="grado" class="form-select custom-select">
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

            <div id="materias-container" class="mt-4 text-center">
                <!-- Aquí se mostrarán las materias sin profesor -->
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 12px;
            background: #ffffff;
            padding: 25px;
        }

        .custom-select {
            border: 2px solid #007bff;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .custom-select:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #0056b3;
        }

        .list-group-item {
            background: #ffffff;
            border-left: 5px solid #007bff;
            font-weight: 500;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .list-group-item:hover {
            background: #e9ecef;
            transform: translateY(-3px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

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
                            materiasContainer.innerHTML = "";
                            if (data.length > 0) {
                                let html = "<ul class='list-group mx-auto' style='max-width: 600px;'>";
                                data.forEach(materia => {
                                    html += `<li class='list-group-item shadow-sm d-flex align-items-center'><i class='fas fa-book me-2 text-primary'></i> ${materia.unidad_curricular}</li>`;
                                });
                                html += "</ul>";
                                materiasContainer.innerHTML = html;
                            } else {
                                materiasContainer.innerHTML = "<p class='text-danger text-center fw-semibold'>No hay materias sin profesor.</p>";
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
