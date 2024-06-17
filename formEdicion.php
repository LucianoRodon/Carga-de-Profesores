<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
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
                <input type="text" class="form-control" name="nacionalidad" value="<?php echo $row['nacionalidad']; ?>" required>
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
