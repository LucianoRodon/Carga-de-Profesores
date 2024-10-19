<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CargaProf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f0f8ff;
        }

        h1 {
            color: #004085;
        }

        .btn-primary {
            background-color: #004085;
            border-color: #004085;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #003366;
            border-color: #003366;
        }

        .btn .fa-chevron-right {
            transition: transform 0.3s ease;
        }

        .btn.collapsed .fa-chevron-right {
            transform: rotate(90deg);
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .table thead {
            background-color: #17a2b8;
            color: white;
        }

        .btn-warning {
            background-color: #e0a800;
            border-color: #e0a800;
            color: white;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #cc8c00;
            border-color: #cc8c00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #c82333;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-small {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .collapse-horizontal {
            transition: width 0.3s ease;
        }

        .form-label {
            color: #495057;
        }
    </style>
</head>

<body>
    <h1 class="text-center p-3">Carga de Profesores</h1>
    <div class="container-fluid">


        <div class="d-flex">
            <div class="collapse collapse-horizontal" id="formularioRegistro" style="width: 30%;">
                <form class="p-3 bg-light border rounded shadow-sm" action="procesar_formulario.php" method="post">
                    <h3 class="text-center text-secondary">Registro de Profesor</h3>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="DNI" class="form-label">DNI</label>
                        <input type="number" class="form-control" name="DNI" required pattern="\d{7,8}"
                            oninvalid="this.setCustomValidity('El DNI debe tener de 7 a 8 dígitos')"
                            oninput="this.setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Numero de Telefono</label>
                        <input type="number" class="form-control" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="localidad" class="form-label">Localidad</label>
                        <select class="form-control" name="localidad" required>
                            <option value="">Selecciona tu localidad</option>
                            <option value="1">Buenos Aires</option>
                            <option value="2">Córdoba</option>
                            <option value="3">Rosario</option>
                            <option value="4">Mendoza</option>
                            <option value="5">San Miguel de Tucumán</option>
                            <option value="6">La Plata</option>
                            <option value="7">Mar del Plata</option>
                            <option value="8">Salta</option>
                            <option value="9">Santa Fe</option>
                            <option value="10">San Juan</option>
                            <option value="11">Resistencia</option>
                            <option value="12">Santiago del Estero</option>
                            <option value="13">Corrientes</option>
                            <option value="14">Bahía Blanca</option>
                            <option value="15">Posadas</option>
                            <option value="16">San Salvador de Jujuy</option>
                            <option value="17">Paraná</option>
                            <option value="18">Neuquén</option>
                            <option value="19">Formosa</option>
                            <option value="20">San Fernando del Valle de Catamarca</option>
                            <option value="21">Río Cuarto</option>
                            <option value="22">Comodoro Rivadavia</option>
                            <option value="23">San Luis</option>
                            <option value="24">Quilmes</option>
                            <option value="25">Lanús</option>
                            <option value="26">La Rioja</option>
                            <option value="27">Morón</option>
                            <option value="28">Trelew</option>
                            <option value="29">Villa María</option>
                            <option value="30">Rafaela</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" name="genero" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                            <option value="Prefiero no decir">Prefiero no decir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="estudios" class="form-label">Estudios</label>
                        <input type="text" class="form-control" name="estudios" required>
                    </div>

                    <div class="mb-3">
                        <label for="ExpProfecional" class="form-label">Expericencia Profecional</label>
                        <input type="text" class="form-control" name="ExpProfecional" required>
                    </div>

                    <div class="mb-3">
                        <label for="DispHoraria" class="form-label">Disponibilidad Horaria</label>
                        <input type="number" class="form-control" id="DispHoraria" name="DispHoraria" min="0" max="960" required oninput="updateDispHoraria()">
                        <small id="dispHorariaText" class="form-text text-muted">0 minutos</small>
                    </div>

                    <script>
                        function updateDispHoraria() {
                            var input = document.getElementById("DispHoraria");
                            var dispHorariaText = document.getElementById("dispHorariaText");
                            dispHorariaText.textContent = input.value + " minutos";
                        }
                    </script>



                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <br>
                        <input type="checkbox" class="form-check-input" name="estado" value="1">
                        <span class="form-check-label">Activo</span>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
                </form>
            </div>


            <div class="p-2">
                <button class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#formularioRegistro" aria-expanded="false" aria-controls="formularioRegistro" id="toggleButton">
                    <img id="iconAdd" src="icon-plus.png" alt="Agregar" class="me-0" style="width: 20px; height: 20px;">
                    <i id="iconArrow" class="fa-solid fa-chevron-right me-0"></i>
                    <img id="iconCheck" src="icon_plusinvert.png" alt="Confirmar" class="me-0" style="width: 20px; height: 20px; display: none;">
                </button>

                <script>
                    document.getElementById('toggleButton').addEventListener('click', function() {
                        var iconAdd = document.getElementById('iconAdd');
                        var iconArrow = document.getElementById('iconArrow');
                        var iconCheck = document.getElementById('iconCheck');

                        // Toggle visibility of the icons
                        if (iconAdd.style.display === 'none') {
                            iconAdd.style.display = 'block';
                            iconArrow.style.display = 'block';
                            iconCheck.style.display = 'none';
                        } else {
                            iconAdd.style.display = 'none';
                            iconArrow.style.display = 'none';
                            iconCheck.style.display = 'block';
                        }
                    });
                </script>


            </div>
            <div class="flex-grow-1 p-4">
                <div class="p-3 bg-light border rounded shadow-sm mb-4">
                    <form action="" method="post" class="d-flex flex-column">
                        <div class="d-flex mb-2">
                            <input type="number" name="dni_buscar" class="form-control me-2" placeholder="Buscar por DNI">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Filtrar por Estado</label>
                            <input type="checkbox" class="form-check-input" name="estado_activo" value="1" id="estado_activo">
                            <label class="form-check-label" for="estado_activo">Activos</label>
                            <input type="checkbox" class="form-check-input" name="estado_inactivo" value="1" id="estado_inactivo">
                            <label class="form-check-label" for="estado_inactivo">Inactivos</label>

                        </div>
                    </form>
                </div>

                <table class="table table-hover shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Género</th>
                            <th scope="col">Estudios</th>
                            <th scope="col">Experiencia Profecional</th>
                            <th scope="col">Disponibilidad Horaria</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'bdprofesores.php';

                        // Primero, obtenemos todas las localidades en un array para poder usarlas más tarde
                        $sql_localidades = "SELECT id_localidad, localidad FROM localidad";
                        $result_localidades = $conn->query($sql_localidades);
                        $localidades = [];

                        if ($result_localidades->num_rows > 0) {
                            while ($fila = $result_localidades->fetch_assoc()) {
                                $localidades[$fila['id_localidad']] = $fila['localidad']; // Guardamos la localidad usando el id como clave
                            }
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $filters = [];

                            if (isset($_POST['dni_buscar']) && $_POST['dni_buscar'] != '') {
                                $dni = $_POST['dni_buscar'];
                                $filters[] = "DNI = '$dni'";
                            }

                            if (isset($_POST['estado_activo'])) {
                                $filters[] = "estado = 1";
                            }

                            if (isset($_POST['estado_inactivo'])) {
                                $filters[] = "estado = 0";
                            }

                            $sql = "SELECT * FROM docente";

                            if (!empty($filters)) {
                                $sql .= " WHERE " . implode(" OR ", $filters);
                            }
                        } else {
                            $sql = "SELECT * FROM docente";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["id_docente"] . "</th>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["apellido"] . "</td>";
                                echo "<td>" . $row["DNI"] . "</td>";
                                echo "<td>" . $row["fecha_nac"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["direccion"] . "</td>";
                                $localidad_id = $row['id_localidad'];
                                $localidad_nombre = isset($localidades[$localidad_id]) ? $localidades[$localidad_id] : 'No especificada';
                                echo "<td>" . $localidad_nombre . "</td>";

                                echo "<td>" . $row["genero"] . "</td>";
                                echo "<td>" . $row["estudios"] . "</td>";
                                echo "<td>" . $row["ExpProfecional"] . "</td>";
                                echo "<td>" . $row["DispHoraria"] . "</td>";
                                echo "<td>" . ($row['estado'] == 1 ? 'Activo' : 'Inactivo') . "</td>";
                                echo "<td>
            <a href='formEdicion.php?id=" . $row["id_docente"] . "' class='btn btn-small btn-warning'>
                <img src='icon-trash.png' alt='Editar' style='width: 16px; height: 16px;'>
            </a>
            <a href='eliminarProf.php?id=" . $row["id_docente"] . "' class='btn btn-small btn-danger'>
                <img src='icon-edit.png' alt='Eliminar' style='width: 16px; height: 16px;'>
            </a>
            <button class='btn btn-small btn-info' data-bs-toggle='modal' data-bs-target='#materiaModal" . $row["id_docente"] . "'>Materias</button>
        </td>";
                                echo "<td>
<!-- Modal para elegir Materias -->
                            <div class='modal fade' id='materiaModal" . $row["id_docente"] . "' tabindex='-1' aria-labelledby='materiaModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='materiaModalLabel'>Seleccionar Materia</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <form id='materiaForm" . $row["id_docente"] . "'>
                                                <div id='materiaContainer" . $row["id_docente"] . "'>
                                                    <div class='mb-3'>
                                                        <label for='materia' class='form-label'>Elige una materia:</label>
                                                        <select class='form-select' name='materia[]' id='materia" . $row["id_docente"] . "' required>
                                                            <option value='Administración'>Administración</option>
                                                                <option value='Administración de Bases de Datos'>Administración de Bases de Datos</option>
                                                                <option value='Administración de Sistemas Operativos y Red'>Administración de Sistemas Operativos y Red</option>
                                                                <option value='Algoritmos y Estructura de Datos'>Algoritmos y Estructura de Datos</option>
                                                                <option value='Análisis de Sistemas Organizacionales'>Análisis de Sistemas Organizacionales</option>
                                                                <option value='Arquitectura de las computadoras'>Arquitectura de las computadoras</option>
                                                                <option value='Base de Datos'>Base de Datos</option>
                                                                <option value='Bases de Datos 1'>Bases de Datos 1</option>
                                                                <option value='Bases de Datos 2'>Bases de Datos 2</option>
                                                                <option value='Comunicación'>Comunicación</option>
                                                                <option value='Derecho y Legislación laboral'>Derecho y Legislación laboral</option>
                                                                <option value='Desarrollo de Sistemas'>Desarrollo de Sistemas</option>
                                                                <option value='Desarrollo de Sistemas Web'>Desarrollo de Sistemas Web</option>
                                                                <option value='Ética y Responsabilidad Social'>Ética y Responsabilidad Social</option>
                                                                <option value='Estadística'>Estadística</option>
                                                                <option value='Estrategias de Negocios'>Estrategias de Negocios</option>
                                                                <option value='Física Aplicada a las Tecnologías de la Información'>Física Aplicada a las Tecnologías de la Información</option>
                                                                <option value='Gestión de Proyectos de Software'>Gestión de Proyectos de Software</option>
                                                                <option value='Gestión de Software 1'>Gestión de Software 1</option>
                                                                <option value='Gestión de Software 2'>Gestión de Software 2</option>
                                                                <option value='Ingeniería de Software 1'>Ingeniería de Software 1</option>
                                                                <option value='Ingeniería de Software 2'>Ingeniería de Software 2</option>
                                                                <option value='Infraestructura de Redes 1'>Infraestructura de Redes 1</option>
                                                                <option value='Infraestructura de Redes 2'>Infraestructura de Redes 2</option>
                                                                <option value='Inglés Técnico'>Inglés Técnico</option>
                                                                <option value='Inglés Técnico 1'>Inglés Técnico 1</option>
                                                                <option value='Inglés Técnico 2'>Inglés Técnico 2</option>
                                                                <option value='Innovación y Desarrollo Emprendedor'>Innovación y Desarrollo Emprendedor</option>
                                                                <option value='Integridad y Migración de Datos'>Integridad y Migración de Datos</option>
                                                                <option value='Lógica y Estructura de Datos'>Lógica y Estructura de Datos</option>
                                                                <option value='Lógica y Programación'>Lógica y Programación</option>
                                                                <option value='Matemática'>Matemática</option>
                                                                <option value='Modelos de Negocios'>Modelos de Negocios</option>
                                                                <option value='Práctica Profesionalizante 1'>Práctica Profesionalizante 1</option>
                                                                <option value='Práctica Profesionalizante 2'>Práctica Profesionalizante 2</option>
                                                                <option value='Problemáticas Socio Contemporáneas'>Problemáticas Socio Contemporáneas</option>
                                                                <option value='Programación 1'>Programación 1</option>
                                                                <option value='Programación 2'>Programación 2</option>
                                                                <option value='Psicosociología de las Organizaciones'>Psicosociología de las Organizaciones</option>
                                                                <option value='Redes y Comunicación'>Redes y Comunicación</option>
                                                                <option value='Seguridad de los Sistemas'>Seguridad de los Sistemas</option>
                                                                <option value='Sistema de Información Organizacional'>Sistema de Información Organizacional</option>
                                                                <option value='Sistemas Operativos'>Sistemas Operativos</option>
                                                                <option value='Tecnología de la Información'>Tecnología de la Información</option>
                                                                <option value='UDI 1'>UDI 1</option>
                                                                <option value='UDI 2'>UDI 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type='button' class='btn btn-secondary' onclick='agregarMateria(" . $row["id_docente"] . ")'>Agregar otra materia</button>
                                            </form>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                            <button type='button' class='btn btn-primary'>Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13' class='text-center'>No hay registros</td></tr>";
                        }

                        $conn->close();
                        ?>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

                        <!-- Script para agregar más materias -->
                        <script>
                            function agregarMateria(docenteId) {
                                const container = document.getElementById('materiaContainer' + docenteId);
                                const selects = container.querySelectorAll('select');
                                const nuevaMateria = document.createElement('div');
                                nuevaMateria.classList.add('mb-3', 'd-flex', 'align-items-center');
                                nuevaMateria.innerHTML = `
                                <label for='materia' class='form-label me-2'>Elige otra materia:</label>
                                <select class='form-select me-2' name='materia[]' required>
                                    <option value='Administración'>Administración</option>
                                    <option value='Administración de Bases de Datos'>Administración de Bases de Datos</option>
                                    <option value='Administración de Sistemas Operativos y Red'>Administración de Sistemas Operativos y Red</option>
                                    <option value='Algoritmos y Estructura de Datos'>Algoritmos y Estructura de Datos</option>
                                    <option value='Análisis de Sistemas Organizacionales'>Análisis de Sistemas Organizacionales</option>
                                    <option value='Arquitectura de las computadoras'>Arquitectura de las computadoras</option>
                                    <option value='Base de Datos'>Base de Datos</option>
                                    <option value='Bases de Datos 1'>Bases de Datos 1</option>
                                    <option value='Bases de Datos 2'>Bases de Datos 2</option>
                                    <option value='Comunicación'>Comunicación</option>
                                    <option value='Derecho y Legislación laboral'>Derecho y Legislación laboral</option>
                                    <option value='Desarrollo de Sistemas'>Desarrollo de Sistemas</option>
                                    <option value='Desarrollo de Sistemas Web'>Desarrollo de Sistemas Web</option>
                                    <option value='Ética y Responsabilidad Social'>Ética y Responsabilidad Social</option>
                                    <option value='Estadística'>Estadística</option>
                                    <option value='Estrategias de Negocios'>Estrategias de Negocios</option>
                                    <option value='Física Aplicada a las Tecnologías de la Información'>Física Aplicada a las Tecnologías de la Información</option>
                                    <option value='Gestión de Proyectos de Software'>Gestión de Proyectos de Software</option>
                                    <option value='Gestión de Software 1'>Gestión de Software 1</option>
                                    <option value='Gestión de Software 2'>Gestión de Software 2</option>
                                    <option value='Ingeniería de Software 1'>Ingeniería de Software 1</option>
                                    <option value='Ingeniería de Software 2'>Ingeniería de Software 2</option>
                                    <option value='Infraestructura de Redes 1'>Infraestructura de Redes 1</option>
                                    <option value='Infraestructura de Redes 2'>Infraestructura de Redes 2</option>
                                    <option value='Inglés Técnico'>Inglés Técnico</option>
                                    <option value='Inglés Técnico 1'>Inglés Técnico 1</option>
                                    <option value='Inglés Técnico 2'>Inglés Técnico 2</option>
                                    <option value='Innovación y Desarrollo Emprendedor'>Innovación y Desarrollo Emprendedor</option>
                                    <option value='Integridad y Migración de Datos'>Integridad y Migración de Datos</option>
                                    <option value='Lógica y Estructura de Datos'>Lógica y Estructura de Datos</option>
                                    <option value='Lógica y Programación'>Lógica y Programación</option>
                                    <option value='Matemática'>Matemática</option>
                                    <option value='Modelos de Negocios'>Modelos de Negocios</option>
                                    <option value='Práctica Profesionalizante 1'>Práctica Profesionalizante 1</option>
                                    <option value='Práctica Profesionalizante 2'>Práctica Profesionalizante 2</option>
                                    <option value='Problemáticas Socio Contemporáneas'>Problemáticas Socio Contemporáneas</option>
                                    <option value='Programación 1'>Programación 1</option>
                                    <option value='Programación 2'>Programación 2</option>
                                    <option value='Psicosociología de las Organizaciones'>Psicosociología de las Organizaciones</option>
                                    <option value='Redes y Comunicación'>Redes y Comunicación</option>
                                    <option value='Seguridad de los Sistemas'>Seguridad de los Sistemas</option>
                                    <option value='Sistema de Información Organizacional'>Sistema de Información Organizacional</option>
                                    <option value='Sistemas Operativos'>Sistemas Operativos</option>
                                    <option value='Tecnología de la Información'>Tecnología de la Información</option>
                                    <option value='UDI 1'>UDI 1</option>
                                    <option value='UDI 2'>UDI 2</option>
                                </select>
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMateria(this)">
                                    <i class="icon-trash"></i> <!-- Adjust this line for your icon usage -->
                                </button>
                            `;

                                const nuevaMateriaSelect = nuevaMateria.querySelector('select');
                                let materiaDuplicada = false;

                                // Comprobar si la nueva materia ya ha sido seleccionada
                                selects.forEach((select) => {
                                    if (select.value === nuevaMateriaSelect.value) {
                                        materiaDuplicada = true;
                                    }
                                });

                                if (materiaDuplicada) {
                                    alert('Error: No puedes seleccionar la misma materia más de una vez.');
                                } else {
                                    container.appendChild(nuevaMateria);
                                    actualizarOpciones();
                                }
                            }

                            function eliminarMateria(button) {
                                const materiaDiv = button.parentElement; // Get the parent div of the button
                                materiaDiv.remove(); // Remove the div from the container
                            }

                            function actualizarOpciones() {
                                const selects = document.querySelectorAll('.materia-select');
                                const valoresSeleccionados = Array.from(selects).map(select => select.value);

                                selects.forEach(select => {
                                    Array.from(select.options).forEach(option => {
                                        if (valoresSeleccionados.includes(option.value) && option.value !== select.value) {
                                            option.disabled = true; // Deshabilitar la opción si ya está seleccionada en otro select
                                        } else {
                                            option.disabled = false; // Habilitar si no está seleccionada
                                        }
                                    });
                                });
                            }
                        </script>

                    </tbody>
                </table>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>