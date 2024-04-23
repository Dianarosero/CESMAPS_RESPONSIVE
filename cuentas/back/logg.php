<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/inicio/img/flavicon-01.png" rel="icon">
  <link href="../front/inicio/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/inicio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/inicio/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/inicio/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/inicio/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../front/inicio/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../front/inicio/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/inicio/vendor/simple-datatables/style_logg.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/inicio/css/style_logg.css" rel="stylesheet">

  <style>
    .credits-container {
      text-align: center;
      margin-top: 20px; /* Ajusta el margen superior según sea necesario */
    }
  </style>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../front/inicio/img/flavicon-01.png" alt="">
                  <span class="d-none d-lg-block">CESMAPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ubicacion & Publicidad</h5>
                    <p class="text-center small">Ingresa tu usuario y contraseña para iniciar sesión</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Correo Electronico</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Por favor ingresa tu usuario!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor ingresa tu contraseña!</div>
                    </div>

                  
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Ingresar</button>
                    </div>
                    
                    <div class="col-12 mt-2"> <!-- Agregado mt-2 para añadir espacio -->
                      <button class="btn btn-primary w-100" type="submit">Crear Cuenta</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits-container">                
               <!-- Designed by <a href="https://bootstrapmade.com/">Encryption</a>-->
               Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/inicio/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../front/inicio/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/inicio/vendor/chart.js/chart.umd.js"></script>
  <script src="../front/inicio/vendor/echarts/echarts.min.js"></script>
  <script src="../front/inicio/vendor/quill/quill.min.js"></script>
  <script src="../front/inicio/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../front/inicio/vendor/tinymce/tinymce.min.js"></script>
  <script src="../front/inicio/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/inicio/js/main.js"></script>
  <script src="../front/inicio/js/min-max.js"></script>


  <div class="floating-banner" id="floatingBanner">
    <button id="toggleButton" onclick="toggleBanner()">Mostrar / Ocultar</button>
    <div class="banner-content">
    <img src="../front/inicio/img/flavicon-01.png" alt="">
    </div>
</div>

</body>

</html>
