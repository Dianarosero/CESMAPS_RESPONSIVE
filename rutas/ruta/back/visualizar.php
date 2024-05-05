<?php
// Incluir el archivo de conexión a la base de datos
include("../../../base de datos/con_db.php");

// Obtener los valores seleccionados del formulario
$idPuntoPartida = $_POST['punto_partida'];
$idPuntoDestino = $_POST['punto_destino'];

// Consulta SQL para obtener el nombre del punto de partida
$sqlPuntoPartida = "SELECT nombre FROM puntos WHERE id = $idPuntoPartida";
$resultadoPuntoPartida = mysqli_query($conex, $sqlPuntoPartida);

// Consulta SQL para obtener el nombre del punto de destino
$sqlPuntoDestino = "SELECT nombre FROM puntos WHERE id = $idPuntoDestino";
$resultadoPuntoDestino = mysqli_query($conex, $sqlPuntoDestino);

// Verificar si las consultas fueron exitosas
if ($resultadoPuntoPartida && $resultadoPuntoDestino) {
    // Obtener los nombres de los puntos de partida y destino
    $nombrePuntoPartida = mysqli_fetch_assoc($resultadoPuntoPartida)['nombre'];
    $nombrePuntoDestino = mysqli_fetch_assoc($resultadoPuntoDestino)['nombre'];
} else {
    // Manejar el caso en el que alguna consulta falló
    echo "Error al obtener los nombres de los puntos.";
}

// Liberar resultados de las consultas
mysqli_free_result($resultadoPuntoPartida);
mysqli_free_result($resultadoPuntoDestino);


// Consulta SQL para obtener la información de la ruta
$sql = "SELECT * FROM rutas WHERE id_punto_ini = $idPuntoPartida AND id_punto_fin = $idPuntoDestino";
$result = $conex->query($sql);
// Verificar si se encontraron resultados en la consulta
if ($result->num_rows > 0) {
    // Obtener los datos de la ruta
    $row = $result->fetch_assoc();
$imagen = $row['ruta_foto'];
$descripcion = $row['descripcion'];
$tiempo = $row ['timpo_estimado'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Visualizar Ruta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../front//recorrido/img/favicon.png" rel="icon">
  <link href="../front/recorrido/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../front/recorrido/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/recorrido/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/recorrido/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../front/recorrido/vendor/aos/aos.css" rel="stylesheet">
  <link href="../front/recorrido/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../front/recorrido/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../front/recorrido/css/style_recorrido.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: UpConstruction
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <div class="fixed-buttons">
        <a href="buscar.php" class="btn-back">
            <img src="../front/recorrido/img/volver-01-01-01.png" alt="Volver">
        </a>
        <a href="../../../index.html" class="logout-button">
            <img src="../front/recorrido/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
        </a>
    </div>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h3 data-aos="fade-down">Ruta <br><span><?php echo $nombrePuntoPartida.'-'.$nombrePuntoDestino; ?></span></h3>
            <p data-aos="fade-up">Tiempo estimado: <?php echo $tiempo;?> minutos.</p></h4>
          </div>
        </div>
      </div>
    </div>
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-item active" style="background-image: url(../front/recorrido/img/index.png)"></div>
    </div>
  </section><!-- End Hero Section -->
  <main id="main">
<!-- ======= Our Projects Section ======= -->
<section id="installation-info" class="installation-info">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <img name="foto" src="<?php echo $imagen; ?>" class="img-fluid" alt="Imagen de la ruta">
            <!-- <img src="../front/recorrido\img\Castellana - Goretti-01.png" class="img-fluid" alt="San Francisco" style="margin-top: 50px;"> -->
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-md-8">
            <h3>Descripción</h3>
            <p><?php echo $descripcion; ?></p>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Anuncios</h2>
          </div>
        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../front/recorrido/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="../front/recorrido/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="container">
    <div class="copyright">
    </div>
  </div>
</footer><!-- End  Footer -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="../front/recorrido/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/recorrido/vendor/aos/aos.js"></script>
  <script src="../front/recorrido/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../front/recorrido/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../front/recorrido/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../front/recorrido/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../front/recorrido/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="../front/recorrido/js/main.js"></script>
</body>
</html>