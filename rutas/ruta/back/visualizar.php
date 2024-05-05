<?php
// Incluir el archivo de conexión a la base de datos
include("../../../base de datos/con_db.php");

// Obtener los datos del formulario
$puntoPartida = $_POST['punto_partida'];
$puntoDestino = $_POST['punto_destino'];

// Consulta SQL para obtener el ID del punto de partida
$query_punto_partida = "SELECT id, nombre FROM puntos WHERE nombre = '$puntoPartida'";
$result_punto_partida = mysqli_query($conex, $query_punto_partida);
$row_punto_partida = mysqli_fetch_assoc($result_punto_partida);
$id_punto_partida = ($row_punto_partida) ? $row_punto_partida['id'] : null; // Check if result exists

// Consulta SQL para obtener el ID del punto de destino
$query_punto_destino = "SELECT id, nombre FROM puntos WHERE nombre = '$puntoDestino'";
$result_punto_destino = mysqli_query($conex, $query_punto_destino);
$row_punto_destino = mysqli_fetch_assoc($result_punto_destino);
$id_punto_destino = ($row_punto_destino) ? $row_punto_destino['id'] : null; // Check if result exists

if ($id_punto_partida && $id_punto_destino) { 
    // Consulta SQL para obtener las rutas con los puntos de inicio y destino existentes
    $query_rutas = "SELECT r.*, id_punto_ini as punto_inicio_nombre, id_punto_fin as punto_fin_nombre 
                    FROM rutas r 
                    INNER JOIN puntos p_ini ON r.id_punto_ini = p_ini.id 
                    INNER JOIN puntos p_fin ON r.id_punto_fin = p_fin.id 
                    WHERE r.id_punto_ini = $id_punto_partida AND r.id_punto_fin = $id_punto_destino";
    $result_rutas = mysqli_query($conex, $query_rutas);
} else {
    $result_rutas = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Visualizar Ruta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../front/recorrido/img/favicon.png" rel="icon">
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
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <nav class="navbar">
                <div class="container-fluid">
                    <a href="buscar.php" class="logo"><img src="../front/recorrido/img/volver-01-01-01.png" alt="" class="img-fluid" style="width: 100%; max-width: 100px; height: auto; list-style-type: none;"></a>
                    <ul class="navbar-nav">
                        <!-- Agrega más elementos de la barra de navegación aquí si es necesario -->
                    </ul>
                </div>
            </nav>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- Quita el punto alrededor de la imagen de cerrar sesión -->
                    <li><a href="../../../base de datos/cerrar.php" class="logo"><img src="../front/recorrido/img/cerrar_sesion-01.png" alt="" class="img-fluid" style="width: 100%; max-width: 100px; height: auto; list-style-type: none;"></a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                    <?php
                        // Verifica si se han encontrado resultados en la consulta de ruta
                        if ($result_rutas && mysqli_num_rows($result_rutas) > 0) {
                            // Imprime los datos de la ruta en el HTML
                            while ($row_ruta = mysqli_fetch_assoc($result_rutas)) {
                                echo "<h2 data-aos='fade-down'>Ruta <br><span>" . $row_ruta["punto_inicio_nombre"] . " - " . $row_ruta["punto_fin_nombre"] . "</span></h2>";
                                echo "<p data-aos='fade-up'>Tiempo estimado: " . $row_ruta["tiempo_estimado"] . " min</p>";
                                echo "<img src='" . $row_ruta["ruta_foto"] . "' class='img-fluid' alt='foto' style='margin-top: 50px;'>";
                                echo "<p>" . $row_ruta["descripcion"] . "</p>";
                            }
                        } else {
                            echo "No se encontraron resultados para la ruta con puntos de partida '$puntoPartida' y destino '$puntoDestino'";
                        }
                    ?>
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
                        <!-- Aquí puedes mostrar más detalles de la ruta si es necesario -->
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
                                    <img src="../front/recorrido/img/" class="testimonial-img" alt="">
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
                                    <img src="../front/recorrido/img/" class="testimonial-img" alt="">
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
