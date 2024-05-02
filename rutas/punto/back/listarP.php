<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Punto</title>

  <!-- Favicons -->
  <link href="../front/listar/img/flavicon-01.png" rel="icon">
  <link href="../front/listar/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/listar/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../front/listar/vendor/aos/aos.css" rel="stylesheet">
  <link href="../front/listar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/listar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/listar/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/listar/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../front/listar/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/listar/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/listar/css/style_listarP.css" rel="stylesheet">

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
    /* Agregar espacio entre los icon-boxes de arriba y los de abajo */
    #icon-boxes {
      margin-bottom: 50px;
    }
  </style>
</head>

<body>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center position-relative">
    <!-- Botones siempre en la parte superior de la sección de héroe -->
    <div class="fixed-buttons">
      <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
        <img src="../front/listar/img/volver-01-01-01.png" alt="Volver">
      </a>

      <a href="../../../index.html" class="logout-button">
        <img src="../front/listar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
      </a>
    </div>

    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Punto<span></span></h2>
          <p class="animate__animated animate__fadeInUp">Aquí se visualizarán los puntos que se encuentran en nuestra universidad</p>
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
            // Incluir el archivo de conexión a la base de datos
            include("../../../base de datos/con_db.php");

            // Realizar la consulta para obtener los puntos
            $sql = "SELECT * FROM puntos";
            $result = $conex->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
              // Iterar sobre los resultados y mostrar los datos en los icon-boxes
              while($row = $result->fetch_assoc()) {
                // Enlace a la página de detalles de la instalación
                echo '<a href="punto1.php?id=' . $row["id"] . '" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">';
                echo '<div class="icon-box">';
                echo '<h4 class="title">' . $row["nombre"] . '</h4>';
                echo '<img src="' . $row["foto"] . '" style="max-width: 100%;">';
                echo '</div>';
                echo '</a>';
              }
            } else {
              // Si no hay puntos en la base de datos, mostrar un mensaje
              echo "<p>No se encontraron puntos.</p>";
            }

            // Cerrar la conexión a la base de datos
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
  <script src="../front/listar/vendor/aos/aos.js"></script>
  <script src="../front/listar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/listar/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../front/listar/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../front/listar/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../front/listar/vendor/php-email-form/validate.js"></script>
  <script src="../front/listar/js/swiper.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/listar/js/main.js"></script>

</body>

</html>
