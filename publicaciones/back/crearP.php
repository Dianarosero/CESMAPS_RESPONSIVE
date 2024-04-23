<?php
// Conexión a la base de datos
include("../../base de datos/con_db.php");

// Recibir datos del formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$contacto = $_POST['contacto'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$categoria_nombre = $_POST['categoria']; // Nombre de la categoría desde el formulario

// Buscar el ID de la categoría por nombre
$categoria_id = null;
$categoria_query = "SELECT id FROM categorias WHERE nombre = '$categoria_nombre'";
$result = $conex->query($categoria_query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $categoria_id = $row['id'];
} else {
    echo "Error: La categoría seleccionada no es válida";
    $conex->close();
    exit;
}

//Añadir archivo
$nombre_archivo = $_FILES['archivo']['name'];
$archivo_temporal = $_FILES['archivo']['tmp_name'];
$ruta_archivo = "Publicaciones/" . $nombre_archivo;

move_uploaded_file($archivo_temporal, $ruta_archivo); // Agregar punto y coma aquí

// Insertar datos en la tabla 'publicaciones'
$sql = "INSERT INTO publicaciones (titulo, autor, contacto, descripcion, archivo, estado, id_categoria)
        VALUES ('$titulo', '$autor', '$contacto', '$descripcion', '$ruta_archivo', '$estado', '$categoria_id')";

if ($conex->query($sql) === TRUE) {
    echo "<script>
    alert('publicacion creada exitosamente');
    </script>";
    header("refresh:0; url=publicar.php");
} else {
    echo "Error al crear la publicación: " . $conex->error;
}

// Cerrar conexión
$conex->close();

?>