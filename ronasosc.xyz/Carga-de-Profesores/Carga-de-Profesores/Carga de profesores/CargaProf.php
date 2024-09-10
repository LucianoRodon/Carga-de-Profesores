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
                        <input type="number" class="form-control" name="DNI" required>
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
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <select class="form-control" name="nacionalidad" required>
                            <option value="">Selecciona tu nacionalidad</option>
                            <option value="afgano">Afgano</option>
                            <option value="alemán">Alemán</option>
                            <option value="argentino">Argentino</option>
                            <option value="australiano">Australiano</option>
                            <option value="brasileño">Brasileño</option>
                            <option value="canadiense">Canadiense</option>
                            <option value="chino">Chino</option>
                            <option value="colombiano">Colombiano</option>
                            <option value="cubano">Cubano</option>
                            <option value="danés">Danés</option>
                            <option value="español">Español</option>
                            <option value="estadounidense">Estadounidense</option>
                            <option value="francés">Francés</option>
                            <option value="griego">Griego</option>
                            <option value="hindú">Hindú</option>
                            <option value="inglés">Inglés</option>
                            <option value="italiano">Italiano</option>
                            <option value="japonés">Japonés</option>
                            <option value="mexicano">Mexicano</option>
                            <option value="nigeriano">Nigeriano</option>
                            <option value="portugués">Portugués</option>
                            <option value="ruso">Ruso</option>
                            <option value="sueco">Sueco</option>
                            <option value="suizo">Suizo</option>
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
                    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
                </form>
            </div>


            <div class="p-2">
                <button class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#formularioRegistro" aria-expanded="false" aria-controls="formularioRegistro">
                    <i class="fa-solid fa-chevron-right me-2"></i>

                </button>
            </div>

            <div class="flex-grow-1 p-4">
                <table class="table table-hover shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Numero de Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Nacionalidad</th>
                            <th scope="col">Género</th>
                            <th scope="col">Estudios</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'bdprofesores.php';
                        $sql = "SELECT * FROM docente";
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
                                echo "<td>" . $row["nacionalidad"] . "</td>";
                                echo "<td>" . $row["genero"] . "</td>";
                                echo "<td>" . $row["estudios"] . "</td>";
                                echo "<td>
                                        <a href='formEdicion.php?id=" . $row["id_docente"] . "' class='btn btn-small btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>
                                        <a href='eliminarProf.php?id=" . $row["id_docente"] . "' class='btn btn-small btn-danger'><i class='fa-solid fa-trash'></i></a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13' class='text-center'>No hay registros</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>