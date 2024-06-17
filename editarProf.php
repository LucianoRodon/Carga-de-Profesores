<?php
include 'bdprofesores.php';

if (isset($_POST['btneditar'])) {
    $id = $_POST['id'];
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


    $sql = "UPDATE docente SET DNI='$dni', nombre='$nombre', apellido='$apellido', telefono='$telefono', fecha_nac='$fecha', email='$email', nacionalidad = '$nacionalidad' WHERE id_docente=$id";

    if ($conn->query($sql) == TRUE) {
        header("Location: CargaProf.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
