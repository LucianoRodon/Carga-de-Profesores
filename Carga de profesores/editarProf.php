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

    $sql_verificar = "SELECT * FROM docente WHERE DNI = '$DNI' AND id_docente != $id";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        echo "<script>alert('Error: El DNI $DNI ya está registrado por otro docente.'); window.history.back();</script>";
    } else {
        $sql = "UPDATE docente SET nombre='$nombre', apellido='$apellido', DNI='$DNI', 
        fecha_nac='$fecha_nac', email='$email', telefono='$telefono', genero='$genero', 
        direccion='$direccion', id_localidad='$localidad_id' , estudios='$estudios', ExpProfecional='$ExpProfecional',
        DispHoraria='$DispHoraria', estado='$estado' WHERE id_docente=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                window.location.href = 'CargaProf.php'; 
            </script>";
            exit();
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }
}

$conn->close();
?>
