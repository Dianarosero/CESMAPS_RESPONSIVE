<?php
// Iniciar sesión para poder usar variables de sesión
session_start();

// Conexión a la base de datos
include("../../base de datos/con_db.php");

// Obtener datos del formulario de inicio de sesión
$email = trim($_POST['username']);
$password = trim($_POST['password']);

// Consulta para verificar la combinación de email y contraseña
$consulta = "SELECT * FROM usuario WHERE email='$email' AND password='$password'";
$resultado = mysqli_query($conex, $consulta);

// Verificar si se encontró algún resultado
if (mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_assoc($resultado);

    // Iniciar sesión y establecer variables de sesión
    $_SESSION['usuario'] = $email;
    $_SESSION['idusuario'] = $filas['id']; // Suponiendo que 'id' es el nombre de la columna que contiene el ID del usuario

    // Redirigir según el tipo de usuario (id_cargo)
    if ($filas['id_cargo'] == 1) { // Admin
        header('Location: bienvenida/back/welcome.php');
        exit();
    } elseif ($filas['id_cargo'] == 2) { // Usuario normal
        header('Location: bienvenida/back/welcomeUser.php');
        exit();
    }
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error en la autenticación, ingrese nuevamente los datos.';
    header('Location: logg.php');
    exit;
}

// Liberar resultados y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conex);
?>