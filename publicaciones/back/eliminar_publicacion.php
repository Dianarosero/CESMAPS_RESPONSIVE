<?php
// Verificar si se ha enviado el ID de la publicación
if(isset($_POST['publicacion_id'])) {
    // Conexión a la base de datos
    include("../../base de datos/con_db.php");
    
    // Obtener el ID de la publicación a eliminar
    $publicacion_id = $_POST['publicacion_id'];
    
    // Consulta para eliminar la publicación
    $sql = "DELETE FROM publicaciones WHERE id = $publicacion_id";
    
    // Ejecutar la consulta
    if ($conex->query($sql) === TRUE) {
        // Redireccionar a la página principal
        header("Location: editar.php"); // Reemplaza "editar.php" con la ruta correcta de tu página principal
        exit();
    } else {
        // Manejar el error, si lo hay
        echo "Error al eliminar la publicación: " . $conex->error;
    }
    
    // Cerrar la conexión
    $conex->close();
} else {
    // Redireccionar si no se ha proporcionado el ID de la publicación
    header("Location: editar.php"); // Reemplaza "editar.php" con la ruta correcta de tu página principal
    exit();
}
?>
