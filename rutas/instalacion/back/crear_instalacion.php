<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: CESMAPS_RESPONSIVE/cuentas/back/bienvenida/back/welcome.php");
    exit;
}

// Establecer la conexión con la base de datos
$conex = mysqli_connect("localhost", "root", "", "cesmaps");

// Verificar la conexión
if (!$conex) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre_punto'];
    $descripcion = $_POST['descripcion'];

    $foto = $_FILES['imagen']['name'];
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    $ruta_imagen = "Instalaciones/".$foto;

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($descripcion) || empty($foto)) {
        echo "<script>alert('Por favor, completa todos los campos y selecciona una imagen.')</script>";
    } else {
        // Consulta para verificar si la instalación ya existe
        $consulta_existencia = "SELECT * FROM instalaciones WHERE nombre = '$nombre'";
        $resultado_existencia = mysqli_query($conex, $consulta_existencia);

        if (mysqli_num_rows($resultado_existencia) > 0) {
            echo "<script>alert('La instalación ya existe.')</script>";
        } else {
            // Mover la imagen cargada a una ubicación deseada
            move_uploaded_file($imagen_temporal, $ruta_imagen);

            // Construir la consulta SQL para insertar la instalación
            $consulta_insertar = "INSERT INTO instalaciones (nombre, descripcion, foto, id_sede) VALUES ('$nombre', '$descripcion', '$ruta_imagen', '1')";

            // Ejecutar la consulta de inserción y verificar si fue exitosa
            if (mysqli_query($conex, $consulta_insertar)) {
                echo "<script>alert('Los datos se han insertado correctamente.')</script>";
            } else {
                echo "<script>alert('Error al insertar los datos: " . mysqli_error($conex) . "')</script>";
            }
        }
    }
}

// Cerrar la conexión
mysqli_close($conex);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Crear Instalación</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../front/crear/img/flavicon-01.png" rel="icon">
    <link href="../front/crear/img/flavicon-01.png" rel="apple-touch-icon">
    <!-- Vendor CSS Files -->
    <link href="../front/crear/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../front/crear/css/style_crearI.css" rel="stylesheet">
</head>
<body>
    <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
        <img src="../front/crear/img/volver-01-01-01.png" alt="Volver">
    </a>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4 align-items-center">
                                <a href="" class="logo d-flex align-items-center w-auto">
                                    <img src="../front/crear/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                                    <span>CESMAPS</span>
                                </a>
                            </div><!-- End Logo -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Crear Instalación</h5>
                                        <p class="text-center small">Crea una nueva instalación</p>
                                    </div>
                                    <form class="needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" novalidate>
                                        <div class="mb-4">
                                            <label for="nombre_instalacion" class="form-label">Nombre de la Instalación</label>
                                            <input type="text" name="nombre_punto" class="form-control" id="nombre_instalacion" required>
                                            <div class="invalid-feedback">Por favor, ingresa el nombre de la instalación.</div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="descripcion" class="form-label">Descripción</label>
                                            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                                            <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="imagen" class="form-label">Seleccionar Imagen</label>
                                            <input type="file" name="imagen" class="form-control" id="imagen" required>
                                            <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Crear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="credits-container" style="text-align: center;">
                                Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados &copy; 2024
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="../../../base de datos/cerrar.php" class="logout-button">
        <img src="../front/crear/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
    </a>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../front/crear/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
