<?php
include 'bdprofesores.php';

if (isset($_POST['btnregistrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['DNI'];
    $fecha = $_POST['fecha_nac'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    $nacionalidad = $_POST['nacionalidad'];
    $estudios = $_POST['estudios'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];


    $sql = "INSERT INTO docente (DNI, Nombre, Apellido, telefono, fecha_nac, Genero, Direccion, nacionalidad, estudios, email) 
            VALUES ('$dni', '$nombre', '$apellido', '$telefono', '$fecha', '$genero', '$direccion', '$nacionalidad', '$estudios', '$email')";

    if ($conn->query($sql) == TRUE) {
        header("Location: CargaProf.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
