<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Editar Publicaciones</title>


  <!-- Favicons -->
  <link href="../front/editar/img/flavicon-01.png" rel="icon">
  <link href="../front/editar/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/editar/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../front/editar/vendor/aos/aos.css" rel="stylesheet">
  <link href="../front/editar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/editar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/editar/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/editar/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../front/editar/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/editar/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/editar/css/style_editar.css" rel="stylesheet">

  <style>
  .btn-back,
  .logout-button {
    background: none; /* Quita cualquier fondo del botón */
    border: none; /* Quita cualquier borde del botón */
    padding: 0; /* Quita cualquier relleno del botón */
  }

  /* Estilo para las imágenes en los botones */
  .btn-back img,
  .logout-button img {
    display: block; /* Asegura que la imagen sea un bloque para controlar su tamaño */
    width: 100px; /* Establece el ancho de la imagen */
    height: auto; /* Permite que la altura se ajuste automáticamente según el ancho */
  }
  .fixed-buttons {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999; /* Asegura que los botones estén por encima de otros elementos */
      padding: 10px; /* Espacio alrededor de los botones */
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  </style>
</head>

<body>


  

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center position-relative">
    <!-- Botones siempre en la parte superior de la sección de héroe -->
    <div class="fixed-buttons">
      <a href="../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
        <img src="../front/editar/img/volver-01-01-01.png" alt="Volver">
      </a>

      <a href="../../base de datos/cerrar.php" class="logout-button">
        <img src="../front/editar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
      </a>
    </div>

    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Publicaciones<span></span></h2>
          <p class="animate__animated animate__fadeInUp">Aquí se visualizarán las Publicaciones que se encuentran en nuestra universidad</p>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">
        <div class="row">

          <?php
            // Conexión a la base de datos
            include("../../base de datos/con_db.php");
            // Consulta para obtener las publicaciones
            $sql = "SELECT * FROM publicaciones";
              $result = $conex->query($sql);

              if ($result->num_rows > 0) {
                // Mostrar datos en cada icon-box
                while($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">';
                  echo '<div class="icon-box">';
                  echo '<h4 class="title"><a>' . $row["titulo"] . '</a></h4>';
                  echo '<img src="' . $row["archivo"] . '" style="max-width: 100%;">';
                  
                  // Verifica el estado y establece el atributo 'checked' en consecuencia
                  $checked = ($row["estado"] == 0) ? 'checked' : ''; // 0 para Mostrar y 1 para Ocultar
                  
                  // Agrega el identificador único al checkbox
                  echo '<div class="form-check form-switch">';
                  echo '<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked_' . $row["id"] . '" onchange="updateEstado(' . $row["id"] . ', this)" ' . $checked . '>';
                  echo '<label class="form-check-label" for="flexSwitchCheckChecked_">Visualizar</label>';
                  echo '</div>';
                  // Botón para eliminar la publicación
                  echo '<form action="eliminar_publicacion.php" method="post">';
                  echo '<input type="hidden" name="publicacion_id" value="' . $row["id"] . '">';
                  echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
              }
              
              
              
              } else {
                  echo "No se encontraron publicaciones.";
              }
              $conex->close();
          ?>
        </div>
      </div>
      
    </section><!-- End Icon Boxes Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados
      </div>
    </div>
  </footer><!-- End  Footer -->

  <!-- Vendor JS Files -->
  <script src="../front/editar/vendor/aos/aos.js"></script>
  <script src="../front/editar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/editar/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../front/editar/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../front/editar/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../front/editar/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/editar/js/main.js"></script>


<script>
function updateEstado(publicacionId, checkbox) {
    var estado = checkbox.checked ? 0 : 1; // 0 si está marcado, 1 si no está marcado
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
                    }
    };
    xhttp.open("POST", "actualizar_estado.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("publicacion_id=" + publicacionId + "&estado=" + estado);
}


</script>


              
</body>

</php>