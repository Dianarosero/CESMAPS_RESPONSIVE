<?php
// Incluir el archivo de conexión a la base de datos
include("../../../base de datos/con_db.php");

// Obtener el ID del punto desde la URL
$id_punto = $_GET['id'];

// Consulta SQL para obtener los datos del punto específico
$sql = "SELECT * FROM puntos WHERE id = $id_punto";
$result = $conex->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Iterar sobre los resultados y almacenar los datos en variables
    while($row = $result->fetch_assoc()) {
        $titulo = $row["nombre"];
        $archivo = $row["foto"];
        $descripcion = $row["descripcion"];
    }
} else {
    // Si no se encontraron resultados, mostrar un mensaje
    echo "<p>No se encontraron datos del punto.</p>";
}

// Cerrar la conexión a la base de datos
$conex->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link href="../front/listar/img/flavicon-01.png" rel="icon">
    <link href="../front/listar/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?></title>
    <link rel="stylesheet" href="../front/listar/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/listar/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../front/listar/css/style_listarP.css">
    <style>
        .btn-back,
        .logout-button {
            background: none;
            border: none;
            padding: 0;
        }

        .btn-back img,
        .logout-button img {
            display: block;
            width: 100px;
            height: auto;
        }

        .fixed-buttons {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>

    <!-- Botones siempre en la parte superior -->
    <div class="fixed-buttons">
        <a href="listarP.php" class="btn-back">
            <img src="../front/listar/img/volver-01-01-01.png" alt="Volver">
        </a>
        <a href="../../../index.html" class="logout-button">
            <img src="../front/listar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
        </a>
    </div>

    <section id="hero" class="d-flex justify-content-center align-items-center position-relative">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown" name="titulo"><?php echo htmlspecialchars($titulo); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section id="punto-info" class="punto-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img name="archivo" src="<?php echo htmlspecialchars($archivo); ?>" class="img-fluid" alt="Imagen del punto">
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <p name="descripcion"><?php echo htmlspecialchars($descripcion); ?></p>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados
            </div>
        </div>
    </footer>

    <script src="../front/listar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../front/listar/vendor/php-email-form/validate.js"></script>
    <script src="../front/listar/js/main.js"></script>

</body>

</html>
