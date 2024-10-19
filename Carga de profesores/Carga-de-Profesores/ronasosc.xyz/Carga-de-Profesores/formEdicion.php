<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <h1 class="text-center p-3">Editar Datos del Profesor</h1>
    <div class="container-fluid row">
        <?php
        include 'bdprofesores.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM docente WHERE id_docente = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "No se encontró el profesor";
                exit();
            }
        }
        ?>
        <form class="col-4 p-3" action="editarProf.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_docente']; ?>">
            <h3 class="text-center text-secondary">Editar Profesor</h3>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="number" class="form-control" name="DNI" value="<?php echo $row['DNI']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="number" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" required>
            </div>


            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-control" name="genero" required>
                    <option value="Masculino" <?php echo ($row['genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Femenino" <?php echo ($row['genero'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                    <option value="Otro" <?php echo ($row['genero'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                    <option value="Prefiero no decirlo" <?php echo ($row['genero'] == 'Prefiero no decirlo') ? 'selected' : ''; ?>>Prefiero no decirlo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <select class="form-control" name="nacionalidad" required>
                    <option value="">Selecciona tu nacionalidad</option>
                    <option value="afgano" <?php echo ($row['nacionalidad'] == 'afgano') ? 'selected' : ''; ?>>Afgano</option>
                    <option value="alemán" <?php echo ($row['nacionalidad'] == 'alemán') ? 'selected' : ''; ?>>Alemán</option>
                    <option value="argentino" <?php echo ($row['nacionalidad'] == 'argentino') ? 'selected' : ''; ?>>Argentino</option>
                    <option value="australiano" <?php echo ($row['nacionalidad'] == 'australiano') ? 'selected' : ''; ?>>Australiano</option>
                    <option value="brasileño" <?php echo ($row['nacionalidad'] == 'brasileño') ? 'selected' : ''; ?>>Brasileño</option>
                    <option value="canadiense" <?php echo ($row['nacionalidad'] == 'canadiense') ? 'selected' : ''; ?>>Canadiense</option>
                    <option value="chino" <?php echo ($row['nacionalidad'] == 'chino') ? 'selected' : ''; ?>>Chino</option>
                    <option value="colombiano" <?php echo ($row['nacionalidad'] == 'colombiano') ? 'selected' : ''; ?>>Colombiano</option>
                    <option value="cubano" <?php echo ($row['nacionalidad'] == 'cubano') ? 'selected' : ''; ?>>Cubano</option>
                    <option value="danés" <?php echo ($row['nacionalidad'] == 'danés') ? 'selected' : ''; ?>>Danés</option>
                    <option value="español" <?php echo ($row['nacionalidad'] == 'español') ? 'selected' : ''; ?>>Español</option>
                    <option value="estadounidense" <?php echo ($row['nacionalidad'] == 'estadounidense') ? 'selected' : ''; ?>>Estadounidense</option>
                    <option value="francés" <?php echo ($row['nacionalidad'] == 'francés') ? 'selected' : ''; ?>>Francés</option>
                    <option value="griego" <?php echo ($row['nacionalidad'] == 'griego') ? 'selected' : ''; ?>>Griego</option>
                    <option value="hindú" <?php echo ($row['nacionalidad'] == 'hindú') ? 'selected' : ''; ?>>Hindú</option>
                    <option value="inglés" <?php echo ($row['nacionalidad'] == 'inglés') ? 'selected' : ''; ?>>Inglés</option>
                    <option value="italiano" <?php echo ($row['nacionalidad'] == 'italiano') ? 'selected' : ''; ?>>Italiano</option>
                    <option value="japonés" <?php echo ($row['nacionalidad'] == 'japonés') ? 'selected' : ''; ?>>Japonés</option>
                    <option value="mexicano" <?php echo ($row['nacionalidad'] == 'mexicano') ? 'selected' : ''; ?>>Mexicano</option>
                    <option value="nigeriano" <?php echo ($row['nacionalidad'] == 'nigeriano') ? 'selected' : ''; ?>>Nigeriano</option>
                    <option value="portugués" <?php echo ($row['nacionalidad'] == 'portugués') ? 'selected' : ''; ?>>Portugués</option>
                    <option value="ruso" <?php echo ($row['nacionalidad'] == 'ruso') ? 'selected' : ''; ?>>Ruso</option>
                    <option value="sueco" <?php echo ($row['nacionalidad'] == 'sueco') ? 'selected' : ''; ?>>Sueco</option>
                    <option value="suizo" <?php echo ($row['nacionalidad'] == 'suizo') ? 'selected' : ''; ?>>Suizo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estudios" class="form-label">Estudios</label>
                <input type="text" class="form-control" name="estudios" value="<?php echo $row['estudios']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" name="btneditar" value="ok">Guardar Cambios</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
