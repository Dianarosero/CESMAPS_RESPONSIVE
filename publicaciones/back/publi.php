<!DOCTYPE html>
<html lang="en">

<head>
  <link href="../front/listar/img/flavicon-01.png" rel="icon">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo htmlspecialchars($_GET['titulo']); ?></title>
  <link href="../front/listar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/listar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/listar/css/style_listarI.css" rel="stylesheet">
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
      <a href="listado.php" class="btn-back">
        <img src="../front/listar/img/volver-01-01-01.png" alt="Volver">
      </a>

      <a href="cerrar_sesion.php" class="logout-button">
        <img src="../front/listar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
      </a>
    </div>

    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown" name="titulo"><?php echo htmlspecialchars($_GET['titulo']); ?></h2>
          </div>
        </div>
      </div>
    </section><!-- End Hero -->

    <!-- ======= Installation Info Section ======= -->
    <section id="installation-info" class="installation-info">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <img name="archivo" src="<?php echo htmlspecialchars($_GET['archivo']); ?>" class="img-fluid" alt="San Francisco" style="margin-top: 50px;">
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-md-8">
            <p name="descripcion"><?php echo htmlspecialchars($_GET['descripcion']); ?></p>
          </div>
        </div>
      </div>
    </section><!-- End Installation Info Section -->


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

  <!-- Template Main JS File -->
  <script src="../front/listar/js/main.js"></script>

</body>

</html>
