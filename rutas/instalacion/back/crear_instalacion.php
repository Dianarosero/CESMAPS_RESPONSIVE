<?php
include("../../../base de datos/sesiones.php");
include("../../../base de datos/con_db.php");

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
                echo "<script>alert('Instalación creada exitosamente.')</script>";
            } else {
                echo "<script>alert('No se ha podido crear la instalación: " . mysqli_error($conex) . "')</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
            <?php
                if($_SESSION['usuario'] == 'administracion@gmail.com'){
                    echo '<a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
                    <img src="../front/crear/img/volver-01-01-01.png" alt="Volver">
                </a>';
                }else{
                    echo '<a href="../../../cuentas/back/bienvenida/back/welcomeUser.php" class="btn-back">
                    <img src="../front/crear/img/volver-01-01-01.png" alt="Volver">
                </a>';
                }
            ?>
    <main>
        <div class="container">
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
        </div>
    </main>
    <a href="../../../base de datos/cerrar.php" class="logout-button">
        <img src="../front/crear/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
    </a>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../front/crear/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Botón flotante -->
<button id="toggleButton" onclick="toggleBanner()" class="floating-button rounded-circle btn-primary">
  <i class="bi bi-bell" style="font-size: 24px;"></i>
</button>


<!-- Contenedor del banner flotante (inicialmente visible) -->
<div class="floating-banner" id="floatingBanner">
<?php
      // PHP code to fetch and display floating banner
      include("../../../base de datos/con_db.php");
      // Verifica si la conexión fue exitosa
      if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
      }
      // Consulta para obtener una publicación aleatoria que sea una imagen o gif
      $sql1 = "SELECT * FROM publicaciones WHERE estado = '0' AND tipo_archivo <> 'video/mp4' AND ancho_archivo < alto_archivo ORDER BY RAND() LIMIT 1";
      $result1 = $conex->query($sql1);
      // Verifica si se encontraron resultados
      if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
          $ruta_archivo = '../../../publicaciones/back/' . $row['ruta_archivo'];
          echo '<div class="banner-content">';
          echo '<img src="' . $ruta_archivo . '" alt="Banner Image">';
          echo '</div>';
        }
      } else {
        echo "No se encontraron imágenes.";
      }
      $conex->close();
    ?>
</div>

<Script>
function toggleBanner() {
  var banner = document.querySelector('.floating-banner');
  banner.classList.toggle('hidden');
}
</Script>
</body>
</html>
