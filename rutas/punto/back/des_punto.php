<?php
include("../../../base de datos/con_db.php");
// Definir variables para los mensajes de error
$nombre_error = $instalacion_error = $descripcion_error = $imagen_error = "";

// Establecer la conexión a la base de datos (usando MySQLi)
$conex = mysqli_connect("localhost", "root", "", "cesmaps");

// Verificar si la conexión fue exitosa
if (!$conex) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta para obtener las instalaciones
$query_instalaciones = "SELECT * FROM instalaciones";
$result_instalaciones = mysqli_query($conex, $query_instalaciones);

// Array para almacenar las opciones de instalaciones
$opciones_instalaciones = array();

// Iterar sobre los resultados y almacenar las opciones
while ($fila_instalacion = mysqli_fetch_assoc($result_instalaciones)) {
    $opciones_instalaciones[] = $fila_instalacion;
}

// Cerrar la conexión
mysqli_close($conex);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y realizar las validaciones
    $nombre = trim($_POST['nombre_punto']);
    if (empty($nombre)) {
        $nombre_error = "Por favor, ingresa el nombre del punto.";
    }

    $instalacion = trim($_POST['instalacion']);
    if (empty($instalacion)) {
        $instalacion_error = "Por favor, selecciona una instalación.";
    }

    $descripcion = trim($_POST['descripcion']);
    if (empty($descripcion)) {
        $descripcion_error = "Por favor, ingresa una descripción.";
    }

    $nombre = $_POST['nombre_punto'];
    $descripcion = $_POST['descripcion'];

    $foto = $_FILES['imagen']['name'];
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    $ruta_imagen = "Puntos/".$foto;

    if (empty($nombre) || empty($descripcion) || empty($foto)) {
      echo "<script>alert('Por favor, completa todos los campos y selecciona una imagen.')</script>";
  } else {
      $conex = mysqli_connect("localhost", "root", "", "cesmaps");
      // Consulta para verificar si ya existe
      $consulta_existencia = "SELECT * FROM puntos WHERE nombre = '$nombre'";
      $resultado_existencia = mysqli_query($conex, $consulta_existencia);
  
      if (mysqli_num_rows($resultado_existencia) > 0) {
          echo "<script>alert('El punto ya existe.')</script>";
      } else {
          // Mover la imagen cargada a una ubicación deseada
          if (move_uploaded_file($imagen_temporal,$ruta_imagen)) {
            // Insertar los datos en la tabla de puntos
            $query = "INSERT INTO puntos (nombre,descripcion,foto,id_instalacion,id_sede) VALUES ('$nombre','$descripcion', '$ruta_imagen' ,'$instalacion','1')";

          // Ejecutar la consulta de inserción y verificar si fue exitosa
          if (mysqli_query($conex, $consulta_insertar)) {
              echo "<script>alert('Punto creado exitosamente.')</script>";
          } else {
              echo "<script>alert('No se ha podido crear el punto: " . mysqli_error($conex) . "')</script>";
          }
      }
  }
  
        // Cerrar la conexión
        mysqli_close($conex);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Crear Punto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../front/crear/img/flavicon-01.png" rel="icon">
  <link href="../front/crear/img/flavicon-01.png" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="../front/crear/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../front/crear/css/style_crearP.css" rel="stylesheet">
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
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../front/crear/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear Punto</h5>
                    <p class="text-center small">Crea un nuevo punto de instalación</p>
                  </div>
                  <form class="needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" novalidate onsubmit="return validateForm()">
                    <div class="mb-4">
                      <label for="nombre_punto" class="form-label">Nombre del Punto</label>
                      <input type="text" name="nombre_punto" class="form-control" id="nombre_punto" required>
                    </div>
                    <div class="mb-4">
                      <label for="instalacion" class="form-label">Instalación</label>
                      <select name="instalacion" class="form-select" id="instalacion" required>
                          <option value="">Selecciona una instalación</option>
                          <?php foreach ($opciones_instalaciones as $instalacion) : ?>
                              <option value="<?php echo $instalacion['id']; ?>"><?php echo $instalacion['nombre']; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-4">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-4">
                      <label for="imagen" class="form-label">Seleccionar Imagen</label>
                      <input type="file" name="imagen" class="form-control" id="imagen" required>
                    </div>
                    <div class="col-12 mt-4">
                      <button class="btn btn-primary w-100" type="submit" name="crear">Crear</button>
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
  <script>
    // Función para validar el formulario antes de enviar
    function validateForm() {
      var nombre = document.getElementById("nombre_punto").value;
      var instalacion = document.getElementById("instalacion").value;
      var descripcion = document.getElementById("descripcion").value;
      var imagen = document.getElementById("imagen").value;

      // Verificar campos vacíos
      if (nombre == "" || instalacion == "" || descripcion == "" || imagen == "") {
        alert("Por favor, complete todos los campos.");
        return false; // Detener el envío del formulario
      }
    }
  </script>
</body>
</html>
