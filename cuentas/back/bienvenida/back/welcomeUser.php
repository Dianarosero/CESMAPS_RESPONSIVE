<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/usuario/img/flavicon-01.png" rel="icon">
  <link href="../front/usuario/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/usuario/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/usuario/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/usuario/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/usuario/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../front/usuario/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../front/usuario/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/usuario/vendor/simple-datatables/style_welcome.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/usuario/css/style_welcomeU.css" rel="stylesheet">

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
   
  </style>


</head>

<body>

  <main>
    
    <div class="container-lg"> 
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
  
              <div class="d-flex justify-content-center py-4 align-items-center">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../front/usuario/img/flavicon-01.png" alt="" style="margin-right: 10px;"> <!-- Añade un margen a la derecha del icono -->
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->
  
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Bienvenido</h5>
                    <p class="text-center small">¿Qué deseas hacer?</p>
                  </div>
  
                  <!-- Second Row of Buttons (Listar, Publicaciones, Visualizar Info) -->
                  <div class="row justify-content-center text-center">
                  <div class="col-md-8 mb-3">
                      <a class="btn btn-secondary btn-md" href="../../../../rutas/ruta/back/buscar.php">
                        Buscar ruta
                      </a>
                    </div>
                    <div class="col-md-5 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Listar
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../../../rutas/instalacion/back/listar.php">Instalaciones</a></li>
                        <li><a class="dropdown-item" href="../../../../rutas/punto/back/listarP.php">Puntos</a></li>
                      </ul>
                    </div>
                    <div class="col-md-5 mb-3">
                      <a class="btn btn-secondary btn-md" href="../../../../publicaciones/back/listado.php">
                        Publicaciones
                      </a>
                    </div>

                    <div class="col-md-8 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Info.personal
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../visualizarInf.php">Visualizar Datos</a></li>
                        <li><a class="dropdown-item" href="../../editarD.php">Editar Datos</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </div>
              </div>

<!-- Banner -->
<div class="banner-container">
  <img id="responsive-banner" src="https://as1.ftcdn.net/v2/jpg/04/73/15/88/1000_F_473158862_4sY6hRueMurQ18pLdwfGZUzAfMJgcQ3G.jpg" alt="Banner">
</div>

<script>
  // Obtener el ancho de la ventana y restar 2 píxeles
  function setBannerWidth() {
    var windowWidth = window.innerWidth;
    var banner = document.getElementById("responsive-banner");
    var bannerWidth = windowWidth - 2;
    banner.style.maxWidth = bannerWidth + "px";
  }

  // Llamar a la función cuando se carga la página y cuando se redimensiona la ventana
  window.onload = setBannerWidth;
  window.onresize = setBannerWidth;
</script>




              <div class="credits-container" style="text-align: center;">
                Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados &copy; 2024
              </div>
  
            </div>
          </div>
        </div>
  
      </div>
    
  </main><!-- End #main -->
  
  <a href="../../../../base de datos/cerrar.php" class="logout-button">
    <img src="../front/usuario/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
  </a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/usuario/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../front/usuario/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/usuario/vendor/chart.js/chart.umd.js"></script>
  <script src="../front/usuario/vendor/echarts/echarts.min.js"></script>
  <script src="../front/usuario/vendor/quill/quill.min.js"></script>
  <script src="../front/usuario/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../front/usuario/vendor/tinymce/tinymce.min.js"></script>
  <script src="../front/usuario/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/usuario/js/main.js"></script>

</body>




</html>
