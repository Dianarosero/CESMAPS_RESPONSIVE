<?php
include("../../../base de datos/con_db.php");
// Establecer la conexión a la base de datos (usando MySQLi)
$conex = mysqli_connect("localhost", "root", "", "cesmaps") ;

// Verificar si la conexión fue exitosa
if (!$conex) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
    // si le da crear
    if(isset($_POST['crear'])){
        //si los campos estan llenos
        if(strlen($_POST['origen'])>=1 
        && strlen($_POST['destino'])>=1 
        && strlen($_POST['descripcion'])>=1
        && $_FILES['imagenes']['error'] == 0) {
            $origin1=trim($_POST['origen']);
            $destin1=trim($_POST['destino']);
            $consu1 = "SELECT * FROM  puntos WHERE nombre = '$origin1'";
            $consu21 = "SELECT * FROM  puntos WHERE nombre = '$destin1'";
            
            $respta1= mysqli_query($conex, $consu1);
            $respta21= mysqli_query($conex, $consu21);
            
            $fila3 = mysqli_fetch_assoc($respta1);
            $fila4 = mysqli_fetch_assoc($respta21);

            $id_origin = $fila3['id'];
            $id_destin = $fila4['id'];
            
            $consu3 = "SELECT * FROM  rutas WHERE id_punto_ini = '$id_origin' AND id_punto_fin = '$id_destin'";
            $respta3= mysqli_query($conex, $consu3);

            $num_filas1 = mysqli_num_rows($respta1);
            $num_filas21 = mysqli_num_rows($respta21);
            $num_filas3 = mysqli_num_rows($respta3);
                // si los puntos de inicio y fin son diferentes
                if ($_POST['origen']!=$_POST['destino']) {
                    //si existen los puntos
                    // if ($num_filas1 > 0 && $num_filas21 > 0) {
                        // si la ruta no existe
                        if ($num_filas3==0) {
                            $ori=trim($_POST['origen']);
                            $con1 = "SELECT * FROM  puntos WHERE nombre = '$ori'";
                            $res= mysqli_query($conex, $con1);
                            $fila = mysqli_fetch_assoc($res);
                            $id_ori = $fila['id'];


                            $dest=trim($_POST['destino']);
                            $con2 = "SELECT * FROM  puntos WHERE nombre = '$dest'";
                            $res2= mysqli_query($conex, $con2);
                            $fila2 = mysqli_fetch_assoc($res2);
                            $id_dest = $fila2['id'];


                            $desc=trim($_POST['descripcion']);
                            $tiempo=trim($_POST['time']);

                            $foto = $_FILES['imagenes']['name'];
                            $image = $_FILES['imagenes']['tmp_name'];
                            $ruta="Rutas/".$foto;
                            $foto="Rutas/".$foto;
                            
                            move_uploaded_file($image,$ruta);

                            $consulta="INSERT INTO rutas(id_punto_ini, id_punto_fin, descripcion, ruta_foto, timpo_estimado) VALUES 
                            ('$id_ori','$id_dest','$desc','$ruta','$tiempo')";
                            
                            $resultado=mysqli_query($conex,$consulta); 

                            if($resultado){
                                echo "<script>
                                alert('Ruta creada con exito');
                                </script>";
                                header("refresh:0; url=crear.php");
                            }else{
                                echo "<script>
                                alert('La ruta no ha sido creada');
                                </script>";
                                header("refresh:0; url=crear.php");
                            }
                        }else {
                            echo "<script>
                            alert('La ruta ya existe');            
                            </script>";
                            header("refresh:0; url=crear.php");
                        }
                }else {
                    echo "<script>
                        alert('Punto de inicio y fin no pueden ser iguales');            
                        </script>";
                        header("refresh:0; url=crear.php");
                }
        }else{
            echo "<script>
                alert('Completar Campos');          
                </script>";
                header("refresh:0; url=crear.php");
            }
    }  
    
    if(isset($_POST['limpiar'])){
        echo "<script>                            
        window.close();
        </script>";

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crear Ruta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/crear/img/flavicon-01.png" rel="icon">
  <link href="../front/crear/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../front/crear/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/crear/css/style_crearR.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

  <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
    <img src="../front/crear/img/volver-01-01-01.png" alt="Volver">
  </a>

  <main>
    <div class="container">

      
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
                    <h5 class="card-title text-center pb-0 fs-4">Crear Ruta</h5>
                    <p class="text-center small">Crea una nueva ruta</p>
                  </div>

                  <form class="needs-validation" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" novalidate>
                    <div class="mb-4">
                      <label for="punto_partida" class="form-label">Punto de Partida</label>
                      <select name="origen" class="form-select" id="punto_partida" required>
                          <option value="">Selecciona un punto de partida</option>
                          <?php
                            $query_puntos = "SELECT * FROM puntos";
                            $result_puntos = mysqli_query($conex, $query_puntos);
                            while($row_puntos = mysqli_fetch_array($result_puntos)){
                                echo "<option value='".$row_puntos['nombre']."'>".$row_puntos['nombre']."</option>";
                            }
                          ?>
                      </select>
                      <div class="invalid-feedback">Por favor, selecciona un punto de partida.</div>
                    </div>

                    <div class="mb-4">
                      <label for="punto_destino" class="form-label">Punto de Destino</label>
                      <select name="destino" class="form-select" id="punto_destino" required>
                          <option value="">Selecciona un punto de destino</option>
                          <?php
                            $result_puntos = mysqli_query($conex, $query_puntos);
                            while($row_puntos = mysqli_fetch_array($result_puntos)){
                                echo "<option value='".$row_puntos['nombre']."'>".$row_puntos['nombre']."</option>";
                            }
                          ?>
                      </select>
                      <div class="invalid-feedback">Por favor, selecciona un punto de destino.</div>
                    </div>

                    <div class="mb-4">
                      <label for="tiempo_estimado" class="form-label">Tiempo Estimado (minutos)</label>
                      <input type="number" name="time" class="form-control" id="tiempo_estimado" required>
                      <div class="invalid-feedback">Por favor, ingresa el tiempo estimado en minutos.</div>
                    </div>

                    <div class="mb-4">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                      <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                    </div>

                    <div class="mb-4">
                      <label for="imagen" class="form-label">Insertar Imagen</label>
                      <input type="file" name="imagenes" class="form-control" id="imagen" required>
                      <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
                    </div>

                    <div class="col-12 mt-4">
                      <button class="btn btn-primary w-100" type="submit" name="crear">Crear Ruta</button>
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
