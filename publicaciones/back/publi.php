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

    .text-area-margin {
        margin-top: 20px;
    }

    .audio-player-margin {
        margin-top: -20px; /* Ajusta este valor según sea necesario */
    }
</style>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo htmlspecialchars($_GET['titulo']); ?></title>
<meta content="" name="description">
<meta content="" name="keywords">
<!-- Favicons -->
<link href="../front/recorrido/img/flavicon-01.png" rel="icon">
<link href="../front/recorrido/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="../front/recorrido/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../front/recorrido/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../front/recorrido/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../front/recorrido/vendor/aos/aos.css" rel="stylesheet">
<link href="../front/recorrido/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../front/recorrido/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="../front/recorrido/css/style_recorrido.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <div class="fixed-buttons">
        <a href="javascript:history.go(-1)" class="btn-back">
            <img src="../front/recorrido/img/volver-01-01-01.png" alt="Volver">
        </a>
        <a href="../../base de datos/cerrar.php" class="logout-button">
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
            <style>
            h2[data-aos="fade-down"] span {
                    font-size: 50%; /* Puedes ajustar este valor según necesites */
            }
            </style>
            <h2 data-aos="fade-down"><?php echo htmlspecialchars($_GET['titulo']); ?></h2>
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
            <?php 
          $archivo = $_GET['ruta_archivo'];
          $extension = pathinfo($archivo, PATHINFO_EXTENSION);

          // Verificar el tipo de archivo y mostrar el contenido correspondiente
          if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) {
            // Mostrar imagen si el archivo es una imagen
            echo '<img src="' . htmlspecialchars($archivo) . '" class="img-fluid" alt="Publicidad">';
          } elseif (in_array($extension, array('mp4', 'avi', 'mov', 'wmv'))) {
            // Mostrar reproductor de video si el archivo es un video
            echo '<video controls class="img-fluid"><source src="' . htmlspecialchars($archivo) . '" type="video/mp4">Your browser does not support the video tag.</video>';
          } elseif ($extension == 'pdf') {
            // Mostrar reproductor de PDF si el archivo es un PDF
            echo '<div class="embed-responsive embed-responsive-16by9" style="max-width: 100%; overflow-y: auto;">';
            echo '<iframe src="' . htmlspecialchars($archivo) . '" class="embed-responsive-item" frameborder="0" style="width: 100%; min-height: 500px;"></iframe>';
            echo '</div>';
          } else {
            // Mostrar un mensaje de error si el tipo de archivo no es compatible
            echo 'Tipo de archivo no compatible.';
          }
        ?>
            </div>
            <div class="col-md-6 text-area-margin">
                
                <div class="col-md-12 mt-5">
                    <h3>Descripción</h3>
                    <p><?php echo $_GET['descripcion']; ?></p>
                    <?php if(isset($_GET['autor']) && !empty($_GET['autor'])): ?>
        <div><br><h6>PUBLICADO POR:</h6><?php echo $_GET['autor']; ?></div>
          <?php endif; ?>
  
          <?php if(isset($_GET['contacto']) && !empty($_GET['contacto'])): ?>
        <div><br><h6>CONTACTO:</h6>
        <?php 
        $contacto = $_GET['contacto'];
        if(filter_var($contacto, FILTER_VALIDATE_EMAIL)) {
          echo '<a href="https://mail.google.com/mail/?view=cm&fs=1&to='.$contacto.'" target="_blank">'.$contacto.'</a>';
        } elseif(preg_match('/^\+?\d+$/', $contacto)) {
          // Suponiendo que solo se permiten números y el símbolo '+'
          echo '<a href="tel:'.$contacto.'">'.$contacto.'</a>';
        } else {
          // Si no es un correo electrónico ni un número de teléfono válido, simplemente mostrarlo
          echo $contacto;
        }
          ?>
        </div>
        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

    
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados
      </div>
    </div>
  </footer><!-- End  Footer -->
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
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
