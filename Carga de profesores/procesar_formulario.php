<?php
include 'bdprofesores.php';

if (isset($_POST['btnregistrar'])) {
    var_dump($_POST);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['DNI'];
    $fecha = $_POST['fecha_nac'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    $localidad_id = $_POST['localidad']; // Cambia 'localidad' por 'localidad_id'
    $estudios = $_POST['estudios'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado = isset($_POST['estado']) ? 1 : 0;
    $ExpProfecional = $_POST['ExpProfecional'];
    $DispHoraria = $_POST['DispHoraria'];

    $sql_verificar = "SELECT * FROM docente WHERE DNI = '$dni'";
    $result_verificar = $conn->query($sql_verificar);



    if ($result_verificar->num_rows > 0) {
        echo "<script>alert('Error: El DNI $dni ya está registrado.'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO docente (DNI, Nombre, Apellido, telefono, fecha_nac, Genero, Direccion, id_localidad, estudios, email, ExpProfecional, DispHoraria, estado) 
        VALUES ('$dni', '$nombre', '$apellido', '$telefono', '$fecha', '$genero', '$direccion', '$localidad_id', '$estudios', '$email', '$ExpProfecional', '$DispHoraria', '$estado')";


        if ($conn->query($sql) === TRUE) {
            header("Location: CargaProf.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (empty($localidad_id)) {
        echo "<script>alert('Por favor, selecciona una localidad.'); window.history.back();</script>";
        exit();
    }
    
    $conn->close();
}
?>
