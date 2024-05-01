<?php
include("../../base de datos/con_db.php");

if (isset($_POST['publicacion_id']) && isset($_POST['estado'])) {
    $publicacionId = $_POST['publicacion_id'];
    $estado = $_POST['estado'];

    $sql = "UPDATE publicaciones SET estado = '$estado' WHERE id = '$publicacionId'";
    if ($conex->query($sql) === TRUE) {
        echo "Estado actualizado correctamente";
    } else {
        echo "Error al actualizar el estado: " . $conex->error;
    }
} else {
    echo "No se recibieron datos para actualizar el estado";
}

$conex->close();
?>
