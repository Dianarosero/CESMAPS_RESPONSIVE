<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crear Ruta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/crear/img/flavicon-01.png" rel="icon">
  <link href="../front/crear/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../front/crear/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/crear/css/style_crearR.css" rel="stylesheet">
</head>

<body>

  <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
    <img src="../front/crear/img/volver-01-01-01.png" alt="Volver">
  </a>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4 align-items-center">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../front/crear/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear Ruta</h5>
                    <p class="text-center small">Crea una nueva ruta</p>
                  </div>

                  <form class="needs-validation" method="POST" action="tu_archivo_php.php" novalidate>
                    <div class="mb-4">
                      <label for="punto_partida" class="form-label">Punto de Partida</label>
                      <select name="punto_partida" class="form-select" id="punto_partida" required>
                          <option value="">Selecciona un punto de partida</option>
                          <!-- Aquí podrías cargar dinámicamente los puntos de partida desde la base de datos -->
                      </select>
                      <div class="invalid-feedback">Por favor, selecciona un punto de partida.</div>
                    </div>

                    <div class="mb-4">
                      <label for="punto_destino" class="form-label">Punto de Destino</label>
                      <select name="punto_destino" class="form-select" id="punto_destino" required>
                          <option value="">Selecciona un punto de destino</option>
                          <!-- Aquí podrías cargar dinámicamente los puntos de destino desde la base de datos -->
                      </select>
                      <div class="invalid-feedback">Por favor, selecciona un punto de destino.</div>
                    </div>

                    <div class="mb-4">
                      <label for="tiempo_estimado" class="form-label">Tiempo Estimado (minutos)</label>
                      <input type="number" name="tiempo_estimado" class="form-control" id="tiempo_estimado" required>
                      <div class="invalid-feedback">Por favor, ingresa el tiempo estimado en minutos.</div>
                    </div>

                    <div class="mb-4">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                      <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                    </div>

                    <div class="mb-4">
                      <label for="imagen" class="form-label">Insertar Imagen</label>
                      <input type="file" name="imagen" class="form-control" id="imagen" required>
                      <div class="invalid-feedback">Por favor, selecciona una imagen.</div>
                    </div>

                    <div class="col-12 mt-4">
                      <button class="btn btn-primary w-100" type="submit" name="crear">Crear Ruta</button>
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

  </main>

  <a href="../../../base de datos/cerrar.php" class="logout-button">
    <img src="../front/crear/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
  </a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/crear/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    function crearPunto() {
      // Aquí puedes agregar la lógica para crear un nuevo punto de instalación
      // Puedes mostrar un modal, redireccionar a una página de creación de punto, etc.
      // Por ejemplo:
      alert("Aquí se crearía un nuevo punto de instalación.");
    }
  </script>

</body>

</html>
