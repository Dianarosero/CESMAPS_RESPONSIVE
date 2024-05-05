<?php
// Incluir el archivo de conexión a la base de datos
include("../../../base de datos/con_db.php");

// Obtener los valores seleccionados del formulario
$idPuntoPartida = $_POST['punto_partida'];
$idPuntoDestino = $_POST['punto_destino'];

// Consulta SQL para obtener la información de la ruta
$sql = "SELECT * FROM rutas WHERE id_punto_ini = $idPuntoPartida AND id_punto_fin = $idPuntoDestino";
$result = $conex->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar los datos de la ruta
    while($row = $result->fetch_assoc()) {
        echo "ID Ruta: " . $row["id"] . "<br>";
        echo "ID Punto de Inicio: " . $row["id_punto_ini"] . "<br>";
        echo "ID Punto de Destino: " . $row["id_punto_fin"] . "<br>";
        echo "Descripción: " . $row["descripcion"] . "<br>";
    }
} else {
    echo "No se encontraron rutas para los puntos seleccionados.";
}
?>
