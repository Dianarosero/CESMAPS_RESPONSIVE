<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/publicar/img/favicon.png" rel="icon">
  <link href="../front/publicar/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../front/publicar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/publicar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../front/publicar/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../front/publicar/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../front/publicar/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../front/publicar/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../front/publicar/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/publicar/css/style.css" rel="stylesheet">

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
                  <img src="../front/publicar/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear Publicacion</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="crearP.php" method="post" enctype="multipart/form-data" novalidate>
                    <div class="col-12">
                        <label for="tituloInput" class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control" id="tituloInput" required>
                        <div class="invalid-feedback">Por favor ingresa un título.</div>
                    </div>

                    <div class="col-12">
                        <label for="autorInput" class="form-label">Autor</label>
                        <input type="text" name="autor" class="form-control" id="autorInput">
                        <div class="invalid-feedback">Por favor ingresa el nombre del autor.</div>
                    </div>

                    <div class="col-12">
                        <label for="contactoInput" class="form-label">Contacto</label>
                        <input type="email" name="contacto" class="form-control" id="contactoInput" required>
                        <div class="invalid-feedback">Por favor ingresa un correo electrónico válido.</div>
                    </div>

                    <div class="col-12">
                        <label for="descripcionInput" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" id="descripcionInput" required></textarea>
                        <div class="invalid-feedback">Por favor ingresa una descripción.</div>
                    </div>

                    <div class="col-12">
                        <label for="fileInput" class="form-label">Archivo Adjunto</label>
                        <input type="file" class="form-control" id="fileInput" name="archivo">
                    </div>

                    <div class="col-12">
                        <label for="estadoSelect" class="form-label">Estado</label>
                        <select class="form-select" id="estadoSelect" name="estado" required>
                            <option value="" disabled selected>Seleccione un Estado</option>
                            <option value="activar">Activar</option>
                            <option value="desactivar">Desactivar</option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un estado.</div>
                    </div>

                    <div class="col-12">
                        <label for="categoriaSelect" class="form-label">Categoría</label>
                        <select class="form-select" id="categoriaSelect" name="categoria" required>
                            <option value="" disabled selected>Seleccione una Categoría</option>
                            <option value="informacion_universitaria">INFORMACIÓN UNIVERSITARIA</option>
                            <option value="emprendimientos">EMPRENDIMIENTOS</option>
                            <option value="empleos">EMPLEOS</option>
                            <option value="arriendos">ARRIENDOS</option>
                            <option value="otros">OTROS</option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione una categoría.</div>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Crear Publicación</button>
                    </div>
                    
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/publicar/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../front/publicar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../front/publicar/vendor/chart.js/chart.umd.js"></script>
  <script src="../front/publicar/vendor/echarts/echarts.min.js"></script>
  <script src="../front/publicar/vendor/quill/quill.js"></script>
  <script src="../front/publicar/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../front/publicar/vendor/tinymce/tinymce.min.js"></script>
  <script src="../front/publicar/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../front/publicar/js/main.js"></script>

</body>

</html>