<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/admin/img/flavicon-01.png" rel="icon">
  <link href="../front/admin/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../front/admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../front/admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/admin/vendor/simple-datatables/style_welcome.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/admin/css/style_welcome.css" rel="stylesheet">

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
                  <img src="../front/admin/img/flavicon-01.png" alt="" style="margin-right: 10px;"> <!-- Añade un margen a la derecha del icono -->
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->
  
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Bienvenido Administradordxx</h5>
                    <p class="text-center small">¿Que deseas hacer?</p>
                  </div>
  
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Listar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../../../rutas/instalacion/back/listar.php">Instalaciones</a></li>
                        <li><a class="dropdown-item" href="../../rutas/back/listarP.php">Puntos</a></li>
                      </ul>
                    </div>  
                  </div> 
                  
                  <div class="row justify-content-center text-center">
                    <div class="col-md-4 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Buscar ruta&nbsp;&nbsp;&nbsp;
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../../../rutas/ruta/back/buscar.php">Buscar Ruta</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Visualizar Info&nbsp;&nbsp;&nbsp;
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../visualizarInf.php">Visualizar Datos</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                      <button type="button" class="btn btn-secondary btn-md dropdown-toggle" data-bs-toggle="dropdown">
                        Publicaciones&nbsp;&nbsp;&nbsp;
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../../../publicaciones/back/publicar.php">Publicar</a></li>
                        <li><a class="dropdown-item" href="editar.php">Editar</a></li>
                        <li><a class="dropdown-item" href="listar.php">Listar</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </div>
              </div>
  
              <div class="credits-container" style="text-align: center;">
                Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados &copy; 2024
              </div>
  
            </div>
          </div>
        </div>
  
      </section>
  
    </div>
    
  </main><!-- End #main -->
      <a href="../../../../base de datos/cerrar.php" class="logout-button">
        <img src="../front/admin/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
      </a>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../front/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/admin/vendor/chart.js/chart.umd.js"></script>
  <script src="../front/admin/vendor/echarts/echarts.min.js"></script>
  <script src="../front/admin/vendor/quill/quill.min.js"></script>
  <script src="../front/admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../front/admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="../front/admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/admin/js/main.js"></script>

</body>

</html>