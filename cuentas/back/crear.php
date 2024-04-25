<?php
// Configuración de la conexión a la base de datos
include("../../base de datos/con_db.php");

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $num_identificacion = $_POST["num_identificacion"];
    $tipo_id = $_POST["cboTipoid"];
    $telefono = $_POST["num_telefono"];
    $tipo_usuario = $_POST["cboTipoUsuarios"];

    // Validar si el correo electrónico ya existe en la base de datos
    $sql_email_check = "SELECT * FROM usuario WHERE email='$email'";
    $result_email_check = $conex->query($sql_email_check);
    if ($result_email_check->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
    } else {
        // Validar si el número de documento ya existe en la base de datos
        $sql_num_identificacion_check = "SELECT * FROM usuario WHERE num_ID='$num_identificacion'";
        $result_num_identificacion_check = $conex->query($sql_num_identificacion_check);
        if ($result_num_identificacion_check->num_rows > 0) {
            echo "El número de identificación ya está registrado.";
        } else {
            // Preparar la consulta SQL de inserción
            $sql_insert = "INSERT INTO usuario (nombre, apellido, email, password, num_ID, tipo_id, teléfono, tipo_usuario) 
                           VALUES ('$nombres', '$apellidos', '$email', '$password', '$num_identificacion', '$tipo_id', '$telefono', '$tipo_usuario')";
            
            // Ejecutar la consulta SQL de inserción
            if ($conex->query($sql_insert) === TRUE) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error al registrar el usuario: " . $conex->error;
            }
        }
    }
}

// Cerrar conexión
$conex->close();
?>
