<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Buscar Ruta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../front/img/flavicon-01.png" rel="icon">
  <link href="../front/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../front/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../front/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../front/css/style_buscar.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    /* Estilos adicionales para hacer la página responsive */
    @media (max-width: 768px) {
      .register {
        padding-top: 50px; /* Ajusta el espacio en la parte superior en pantallas pequeñas */
      }
      .card {
        width: 100%; /* Hace que la tarjeta ocupe todo el ancho en pantallas pequeñas */
      }
      .btn {
        margin-top: 20px; /* Ajusta el espacio entre los botones en pantallas pequeñas */
      }
      .form-select {
        width: 100%; /* Hace que los combobox ocupen todo el ancho en pantallas pequeñas */
      }
    }
  </style>
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buscar Ruta</h5>
                    <p class="text-center small">Selecciona tu punto de partida y destino</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="startPoint" class="form-label">Punto de Partida</label>
                      <select class="form-select" id="startPoint" required>
                        <option selected disabled value="">Elegir...</option>
                        <option value="point1">Punto 1</option>
                        <option value="point2">Punto 2</option>
                        <option value="point3">Punto 3</option>
                      </select>
                      <div class="invalid-feedback">Por favor selecciona tu punto de partida.</div>
                    </div>
                    <div class="col-12">
                      <label for="destination" class="form-label">Punto de Destino</label>
                      <select class="form-select" id="destination" required>
                        <option selected disabled value="">Elegir...</option>
                        <option value="point1">Punto 1</option>
                        <option value="point2">Punto 2</option>
                        <option value="point3">Punto 3</option>
                      </select>
                      <div class="invalid-feedback">Por favor selecciona tu destino.</div>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-primary w-100" type="submit">Buscar Recorrido</button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-secondary w-100" type="button">Información Punto</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="../front/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/vendor/chart.js/chart.umd.js"></script>
  <script src="../front/vendor/echarts/echarts.min.js"></script>
  <script src="../front/vendor/quill/quill.min.js"></script>
  <script src="../front/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../front/vendor/tinymce/tinymce.min.js"></script>
  <script src="../front/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="../front/js/main.js"></script>
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Derechos de autor <strong><span>Encryption</span></strong>. Todos los derechos reservados
      </div>
    </div>
  </footer><!-- End  Footer -->
</body>
</html>
