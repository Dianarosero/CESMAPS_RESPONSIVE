<?php
// Conexión a la base de datos
include("../../base de datos/con_db.php");

// Recibir datos del formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$contacto = $_POST['contacto'];
$descripcion = $_POST['descripcion'];
$categoria_nombre = $_POST['categoria']; // Nombre de la categoría desde el formulario

// Verificar si el título de la publicación ya existe
$titulo_existente = false;
$check_query = "SELECT id FROM publicaciones WHERE titulo = '$titulo'";
$result_check = $conex->query($check_query);

if ($result_check && $result_check->num_rows > 0) {
    $titulo_existente = true;
} 

if ($titulo_existente) {
    session_start();
    $_SESSION['mensaje'] = 'El título de la publicación ya existe. Por favor, elija otro título.';
    header('Location: publicar.php');
    exit;
}

// Buscar el ID de la categoría por nombre
$categoria_id = null;
$categoria_query = "SELECT id FROM categorias WHERE nombre = '$categoria_nombre'";
$result_categoria = $conex->query($categoria_query);

if ($result_categoria && $result_categoria->num_rows > 0) {
    $row = $result_categoria->fetch_assoc();
    $categoria_id = $row['id'];
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error: La categoría seleccionada no es válida';
    header('Location: publicar.php');
    exit;
}

// Añadir archivo
$nombre_archivo = $_FILES['archivo']['name'];
$archivo_temporal = $_FILES['archivo']['tmp_name'];
$ruta_archivo = "Publicaciones/" . $nombre_archivo;

move_uploaded_file($archivo_temporal, $ruta_archivo);

// Insertar datos en la tabla 'publicaciones'
$sql = "INSERT INTO publicaciones (titulo, autor, contacto, descripcion, archivo, estado, id_categoria)
        VALUES ('$titulo', '$autor', '$contacto', '$descripcion', '$ruta_archivo', '0', '$categoria_id')";

if ($conex->query($sql) === TRUE) {
    session_start();
    $_SESSION['mensaje'] = 'Publicación creada exitosamente';
    header('Location: publicar.php');
    exit;
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error al crear la publicación: ' . $conex->error;
    header('Location: publicar.php');
    exit;
}

// Cerrar conexión
$conex->close();
?>
