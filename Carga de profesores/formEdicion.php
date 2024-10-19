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
        <form class="col-4 p-3" action="editarProf.php" method="post" onsubmit="return confirmSave();">
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
                <label for="email" class="form-label">Email</label>
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

            <input type="hidden" name="localidad_original" value="<?php echo $row['id_localidad']; ?>">

            <div class="mb-3">
                <label for="localidad" class="form-label">Localidad</label>
                <select class="form-control" name="localidad" required>
                    <option value="">Selecciona tu localidad</option>
                    <option value="1" <?php echo ($row['id_localidad'] == 1) ? 'selected' : ''; ?>>Buenos Aires</option>
                    <option value="2" <?php echo ($row['id_localidad'] == 2) ? 'selected' : ''; ?>>Córdoba</option>
                    <option value="3" <?php echo ($row['id_localidad'] == 3) ? 'selected' : ''; ?>>Rosario</option>
                    <option value="4" <?php echo ($row['id_localidad'] == 4) ? 'selected' : ''; ?>>Mendoza</option>
                    <option value="5" <?php echo ($row['id_localidad'] == 5) ? 'selected' : ''; ?>>San Miguel de Tucumán</option>
                    <option value="6" <?php echo ($row['id_localidad'] == 6) ? 'selected' : ''; ?>>La Plata</option>
                    <option value="7" <?php echo ($row['id_localidad'] == 7) ? 'selected' : ''; ?>>Mar del Plata</option>
                    <option value="8" <?php echo ($row['id_localidad'] == 8) ? 'selected' : ''; ?>>Salta</option>
                    <option value="9" <?php echo ($row['id_localidad'] == 9) ? 'selected' : ''; ?>>Santa Fe</option>
                    <option value="10" <?php echo ($row['id_localidad'] == 10) ? 'selected' : ''; ?>>San Juan</option>
                    <option value="11" <?php echo ($row['id_localidad'] == 11) ? 'selected' : ''; ?>>Resistencia</option>
                    <option value="12" <?php echo ($row['id_localidad'] == 12) ? 'selected' : ''; ?>>Santiago del Estero</option>
                    <option value="13" <?php echo ($row['id_localidad'] == 13) ? 'selected' : ''; ?>>Corrientes</option>
                    <option value="14" <?php echo ($row['id_localidad'] == 14) ? 'selected' : ''; ?>>Bahía Blanca</option>
                    <option value="15" <?php echo ($row['id_localidad'] == 15) ? 'selected' : ''; ?>>Posadas</option>
                    <option value="16" <?php echo ($row['id_localidad'] == 16) ? 'selected' : ''; ?>>San Salvador de Jujuy</option>
                    <option value="17" <?php echo ($row['id_localidad'] == 17) ? 'selected' : ''; ?>>Paraná</option>
                    <option value="18" <?php echo ($row['id_localidad'] == 18) ? 'selected' : ''; ?>>Neuquén</option>
                    <option value="19" <?php echo ($row['id_localidad'] == 19) ? 'selected' : ''; ?>>Formosa</option>
                    <option value="20" <?php echo ($row['id_localidad'] == 20) ? 'selected' : ''; ?>>San Fernando del Valle de Catamarca</option>
                    <option value="21" <?php echo ($row['id_localidad'] == 21) ? 'selected' : ''; ?>>Río Cuarto</option>
                    <option value="22" <?php echo ($row['id_localidad'] == 22) ? 'selected' : ''; ?>>Comodoro Rivadavia</option>
                    <option value="23" <?php echo ($row['id_localidad'] == 23) ? 'selected' : ''; ?>>San Luis</option>
                    <option value="24" <?php echo ($row['id_localidad'] == 24) ? 'selected' : ''; ?>>Quilmes</option>
                    <option value="25" <?php echo ($row['id_localidad'] == 25) ? 'selected' : ''; ?>>Lanús</option>
                    <option value="26" <?php echo ($row['id_localidad'] == 26) ? 'selected' : ''; ?>>La Rioja</option>
                    <option value="27" <?php echo ($row['id_localidad'] == 27) ? 'selected' : ''; ?>>Morón</option>
                    <option value="28" <?php echo ($row['id_localidad'] == 28) ? 'selected' : ''; ?>>Trelew</option>
                    <option value="29" <?php echo ($row['id_localidad'] == 29) ? 'selected' : ''; ?>>Villa María</option>
                    <option value="30" <?php echo ($row['id_localidad'] == 30) ? 'selected' : ''; ?>>Rafaela</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estudios" class="form-label">Estudios</label>
                <input type="text" class="form-control" name="estudios" value="<?php echo $row['estudios']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="ExpProfecional" class="form-label">Experiencia Profesional</label>
                <input type="text" class="form-control" name="ExpProfecional" value="<?php echo $row['ExpProfecional']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="DispHoraria" class="form-label">Disponibilidad Horaria (minutos)</label>
                <input type="number" class="form-control" name="DispHoraria" value="<?php echo $row['DispHoraria']; ?>" min="0" max="960" required>
            </div>


            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <br>
                <input type="checkbox" class="form-check-input" name="estado" value="1" <?php echo ($row['estado'] == 1) ? 'checked' : ''; ?>>
                <span class="form-check-label">Activo</span>
            </div>


            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <script>
        function confirmSave() {
            return confirm("¿Estás seguro de que deseas guardar los cambios?");
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $DNI = $_POST['DNI'];
        $fecha_nac = $_POST['fecha_nac'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];
        $direccion = $_POST['direccion'];
        $localidad_id = $_POST['localidad'];
        $estudios = $_POST['estudios'];
        $ExpProfecional = $_POST['ExpProfecional'];
        $DispHoraria = $_POST['DispHoraria'];
        $estado = isset($_POST['estado']) ? 1 : 0;

        $sql = "UPDATE docente SET nombre='$nombre', apellido='$apellido', DNI='$DNI', fecha_nac='$fecha_nac', 
        email='$email', telefono='$telefono', genero='$genero', direccion='$direccion', 
        id_localidad='$localidad_id', estudios='$estudios', ExpProfecional='$ExpProfecional',
        DispHoraria='$DispHoraria', estado='$estado' WHERE id_docente=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Los cambios se han guardado exitosamente.');
                window.location.href = 'CargaProf.php';
            </script>";
            exit();
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }
    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybRSHl0MbXS3+ENr7er4SYs7p3gT8U4TTf4/0G3Zp/uhBIAJg"
        crossorigin="anonymous"></script>
</body>

</html>