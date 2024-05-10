<?php
include("../../../base de datos/sesiones.php");
include("../../../base de datos/con_db.php");

// Realizar una consulta para obtener todos los puntos
$query_puntos = "SELECT id, nombre, descripcion, foto, id_instalacion FROM puntos";
$resultado_puntos = mysqli_query($conex, $query_puntos);

// Verificar si hay resultados
if (mysqli_num_rows($resultado_puntos) > 0) {
    // Crear un array para almacenar las opciones del combo box
    $opciones_puntos = array();
    while ($fila = mysqli_fetch_assoc($resultado_puntos)) {
        // Agregar cada punto como una opción en el combo box
        $opciones_puntos[$fila['id']] = array(
            'nombre' => $fila['nombre'],
            'descripcion' => $fila['descripcion'],
            'foto' => $fila['foto'],
            'id_instalacion' => $fila['id_instalacion']
        );
    }
}

// Variables para almacenar los valores originales
$nombre_original = "";
$descripcion_original = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha seleccionado un punto para editar
    if (!empty($_POST["nombre_punto"])) {
        // Obtener el ID del punto seleccionado
        $id_punto = $_POST["nombre_punto"];
        // Obtener los valores originales del punto seleccionado
        $nombre_original = $opciones_puntos[$id_punto]['nombre'];
        $descripcion_original = $opciones_puntos[$id_punto]['descripcion'];

        // Verificar si ha habido cambios en el nombre o descripción
        if ($_POST["nombre_nuevo"] != $nombre_original || $_POST["descripcion_nueva"] != $descripcion_original) {
            // Obtener el nuevo nombre del punto
            $nombre_nuevo = $_POST["nombre_nuevo"];

            // Verificar si el nuevo nombre ya existe en otra fila de la tabla
            $query_nombre_existente = "SELECT COUNT(*) as count FROM puntos WHERE nombre='$nombre_nuevo' AND id != '$id_punto'";
            $resultado_nombre_existente = mysqli_query($conex, $query_nombre_existente);
            $fila_nombre_existente = mysqli_fetch_assoc($resultado_nombre_existente);
            $count_nombre_existente = $fila_nombre_existente['count'];

            if ($count_nombre_existente == 0) {
                // No hay otro registro con el mismo nombre, podemos proceder con la actualización
                $descripcion_nueva = $_POST["descripcion_nueva"];
                $query_update = "UPDATE puntos SET nombre='$nombre_nuevo', descripcion='$descripcion_nueva' WHERE id='$id_punto'";
                mysqli_query($conex, $query_update);
            }
        }
    }

    // Verificar si se ha cargado una nueva foto
    if (!empty($_FILES["foto"]["name"])) {
        // Directorio donde se guardarán las imágenes
        $directorio_destino = "Puntos/";

        // Generar un nombre único para la foto
        $nombre_archivo = uniqid() . '_' . $_FILES["foto"]["name"];

        // Ruta completa de destino para la foto
        $ruta_destino = $directorio_destino . $nombre_archivo;

        // Mover la foto al directorio de destino
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_destino)) {
            // Verificar si la foto se movió correctamente
            if (file_exists($ruta_destino)) {
                // Actualizar la URL de la foto en la base de datos
                $url_foto = "Puntos/" . $nombre_archivo;
                $query_update_foto = "UPDATE puntos SET foto='$url_foto' WHERE id='$id_punto'";
                mysqli_query($conex, $query_update_foto) or die(mysqli_error($conex));
            } else {
                echo "Error: No se pudo mover la foto al directorio de destino.";
            }
        } else {
            // Error al mover la foto, manejar según sea necesario
            echo "Error al subir la foto.";
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

  <title>Editar Punto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/editar/img/flavicon-01.png" rel="icon">
  <link href="../front/editar/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../front/editar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/editar/css/style_editarP.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

 <!-- Inline CSS to remove right margin -->
 <style>
    body {
      margin-right: 0 !important;
    }
  </style>
</head>

<body>
  <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
    <img src="../front/editar/img/volver-01-01-01.png" alt="Volver">
  </a>

  <main>
    <div class="container">

      
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4 align-items-center">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="../front/editar/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3"> <!-- Agregando la clase "card" para aplicar estilos -->
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Editar Punto</h5>
                  </div>

                  <form class="needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="mb-4">
                    <!-- Combo box para seleccionar punto -->
                    <select name="nombre_punto" class="form-control" id="nombre_instalacion" required>
                        <option value="">Seleccionar Punto</option>
                        <?php
                        // Mostrar las opciones del combo box
                        foreach ($opciones_puntos as $id => $punto) {
                            echo "<option value=\"$id\">" . $punto['nombre'] . "</option>";
                        }
                        ?>
                    </select>

                    </div>

              <div class="mb-4">
                  <!-- Input para el nuevo nombre -->
                  <input type="text" name="nombre_nuevo" class="form-control" id="nombre_nuevo" placeholder="Nuevo Nombre" required>
              </div>

              <div class="mb-4">
                  <!-- Text area para la nueva descripción -->
                  <textarea name="descripcion_nueva" class="form-control" id="descripcion_nueva" rows="3" placeholder="Nueva Descripción" required></textarea>
              </div>

              <div class="mb-4">
                  <!-- Input para seleccionar la nueva foto -->
                  <label for="foto" class="form-label">Seleccionar Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto" required>
              </div>

              <div class="col-12 mt-4">
                  <!-- Botón para editar -->
                  <button class="btn btn-primary w-100" type="submit" name="editarBtn">Editar</button>
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
    <img src="../front/editar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
  </a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/editar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    // Verificar si el punto se ha editado correctamente
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <?php if (!empty($_POST["nombre_punto"])) { ?>
            <?php if ($_POST["nombre_nuevo"] != $nombre_original || $_POST["descripcion_nueva"] != $descripcion_original) { ?>
                <?php if ($count_nombre_existente == 0) { ?>
                    // Mostrar alerta de éxito si el punto se ha editado correctamente
                    alert("El punto se ha editado correctamente.");
                <?php } else { ?>
                    // Mostrar alerta de error si el nuevo nombre ya está en uso
                    alert("Error: El nuevo nombre ya está en uso.");
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</script>


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
