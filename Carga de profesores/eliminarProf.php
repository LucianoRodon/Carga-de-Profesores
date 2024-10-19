<?php
include 'bdprofesores.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM docente WHERE id_docente = $id";

    if ($conn->query($sql) === TRUE) {
        $sql = "SET @count = 0";
        $conn->query($sql);

        $sql = "UPDATE docente SET id_docente = @count:= @count + 1";
        $conn->query($sql);

        $sql = "ALTER TABLE docente AUTO_INCREMENT = 1";
        $conn->query($sql);

        header("Location: CargaProf.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
