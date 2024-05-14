<?php
$host = 'localhost';
$dbname = 'u814985592_cesmaps';
$username = 'u814985592_cesmaps';
$password = '12345Cesmaps';

try {
    $conex = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>