<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CESMAPS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="front-index/img/flavicon-01.png" rel="icon">
  <link href="front-index/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="front-index/vendor/aos/aos.css" rel="stylesheet">
  <link href="front-index/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="front-index/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="front-index/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="front-index/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="front-index/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="front-index/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="front-index/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Descubre la mejor ruta que te lleva a tu destino</h1>
          <h2>mientras exploras estrategias innovadoras que impulsan la publicidad y el éxito de emprendimientos</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="cuentas/back/logg.php" class="btn-get-started scrollto">Iniciar</a>
            <a href="cuentas/back/createUser.php" class="btn-get-started scrollto">Registrarse</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="front-index/img/logocesmaps-01-02.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright 2024 <strong><span>Encryption</span></strong>. Todos los derechos reservados.
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- ======= Banner Arriba ======= -->
  <a href="https://wa.me/3156268049" target="_blank" class="top-bar">
    <div class="scrolling-text-container">
      <div class="scrolling-text">
        <span>Descubre todas las oportunidades para compartir y promocionar tu emprendimiento aquí, impulsándolo hacia un éxito aún mayor</span>
      </div>
    </div>
  </a>

<!-- Floating Banner -->
<div class="floating">
    <?php
      // PHP code to fetch and display floating banner
      include("base de datos/con_db.php");
      // Verifica si la conexión fue exitosa
      if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
      }
      // Consulta para obtener una publicación aleatoria que sea una imagen o gif
      $sql1 = "SELECT * FROM publicaciones WHERE estado = '0' AND tipo_archivo <> 'video/mp4' AND ancho_archivo > alto_archivo ORDER BY RAND() LIMIT 1";
      $result1 = $conex->query($sql1);
      // Verifica si se encontraron resultados
      if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
          $ruta_archivo = 'CESMAPS_RESPONSIVE/../publicaciones/back/' . $row['ruta_archivo'];
          echo '<img src="' . $ruta_archivo . '" alt="Banner Image">';
        }
      } else {
        echo "No se encontraron imágenes.";
      }
      $conex->close();
    ?>
</div>
<!-- End Floating Banner -->

<!-- Banner Container -->
<?php
    // PHP code to fetch and display video banner
    include("base de datos/con_db.php");
    // Verifica si la conexión fue exitosa
    if ($conex->connect_error) {
      die("Error de conexión: " . $conex->connect_error);
    }
    // Consulta para obtener una publicación aleatoria que sea un video en formato mp4
    $sql = "SELECT * FROM publicaciones WHERE estado = '0' AND tipo_archivo = 'video/mp4' ORDER BY RAND() LIMIT 1";
    $result = $conex->query($sql);
    // Verifica si se encontraron resultados
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $ruta_archivo = 'CESMAPS_RESPONSIVE/../publicaciones/back/' . $row['ruta_archivo'];
        echo '<div class="banner-container">';
        echo '<div class="banner">';
        echo '<div class="video-wrapper">';
        echo '<button type="button" class="close" aria-label="Close" onclick="cerrarBanner()"><span aria-hidden="true">&times;</span></button>';
        echo '<video id="videoPlayer" controls>';
        echo '<source src="' . $ruta_archivo . '" type="video/mp4">';
        echo 'Tu navegador no soporta el tag de video.';
        echo '</video>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "No se encontraron videos.";
    }
    $conex->close();
  ?>
  <!-- End Banner Container -->

  <!-- JavaScript files and scripts -->
  <script>
    // JavaScript function for closing the banner-container
    function cerrarBanner() {
      var videoPlayer = document.getElementById("videoPlayer");
      if (videoPlayer) {
        videoPlayer.pause();
      }
      var bannerContainer = document.querySelector(".banner-container");
      if (bannerContainer) {
        bannerContainer.style.display = "none";
      }
    }
  </script>

  

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="front-index/vendor/aos/aos.js"></script>
  <script src="front-index/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="front-index/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="front-index/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="front-index/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="front-index/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="front-index/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="front-index/js/main.js"></script>

</body>

</html>