<?php
// Conexión a la base de datos
include("../../base de datos/con_db.php");

// Verificar errores de carga de archivo
if ($_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
    session_start();
    $_SESSION['mensaje'] = 'Error al cargar el archivo: ' . $_FILES['archivo']['error'];
    header('Location: publicar.php');
    exit;
}

// Recibir datos del formulario
$titulo = mysqli_real_escape_string($conex, $_POST['titulo']);
$autor = mysqli_real_escape_string($conex, $_POST['autor']);
$contacto = mysqli_real_escape_string($conex, $_POST['contacto']);
$descripcion = mysqli_real_escape_string($conex, $_POST['descripcion']);
$categoria_nombre = mysqli_real_escape_string($conex, $_POST['categoria']); 

// Verificar si el título de la publicación ya existe
$check_query = "SELECT id FROM publicaciones WHERE titulo = '$titulo'";
$result_check = $conex->query($check_query);

if ($result_check && $result_check->num_rows > 0) {
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
$tipo_archivo = $_FILES["archivo"]["type"];
$tamaño_archivo = $_FILES["archivo"]["size"];
$archivo_temporal = $_FILES['archivo']['tmp_name'];
$ruta_archivo = "Publicaciones/" . $nombre_archivo;

// Inicializar ancho y alto
$ancho = 0;
$alto = 0;

// Verificar si el archivo subido es una imagen
$es_imagen = getimagesize($archivo_temporal);
if ($es_imagen !== false) {
    // Obtener las dimensiones de la imagen
    $ancho = $es_imagen[0];
    $alto = $es_imagen[1];
}

// Mover archivo a la carpeta de destino
if (!move_uploaded_file($archivo_temporal, $ruta_archivo)) {
    session_start();
    $_SESSION['mensaje'] = 'Error al mover el archivo a la carpeta de destino.';
    header('Location: publicar.php');
    exit;
}

// Añadir img_interactiva
$nombre_img = $_FILES['img_interactiva']['name'];
$img_temporal = $_FILES['img_interactiva']['tmp_name'];

// Inicializa la ruta de la imagen interactiva como cadena vacía por defecto
$ruta_img = '';

// Añadir img_interactiva si se ha cargado un archivo
if (!empty($nombre_img)) {
    $ruta_img = "Publicaciones/" . $nombre_img;

    // Mover archivo de imagen interactiva a la carpeta de destino
    if (!move_uploaded_file($img_temporal, $ruta_img)) {
        session_start();
        $_SESSION['mensaje'] = 'Error al mover la imagen interactiva a la carpeta de destino.';
        header('Location: publicar.php');
        exit;
    }
}

// Insertar datos en la tabla 'publicaciones'
$sql = "INSERT INTO publicaciones (titulo, autor, contacto, descripcion, tipo_archivo,ancho_archivo,alto_archivo, ruta_archivo, img_interactiva, estado, id_categoria)
        VALUES ('$titulo', '$autor', '$contacto', '$descripcion', '$tipo_archivo', '$ancho','$alto','$ruta_archivo', ";

// Agregar la ruta de la imagen interactiva si se ha cargado un archivo
if (!empty($ruta_img)) {
    $sql .= "'$ruta_img', ";
} else {
    $sql .= "NULL, ";
}

$sql .= "'0', '$categoria_id')";

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
