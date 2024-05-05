<?php
session_start();

// Verifica si hay un mensaje en la sesión
if (isset($_SESSION['mensaje'])) {
    echo "<script>
          alert('{$_SESSION['mensaje']}');
          </script>";

    // Una vez mostrado, elimina el mensaje de la sesión para que no se muestre de nuevo
    unset($_SESSION['mensaje']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crear Publicacion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/publicar/img/flavicon-01.png" rel="icon">
  <link href="../front/publicar/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../front/publicar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/publicar/css/style_publicar.css" rel="stylesheet">
</head>

<body>

  <a href="../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
    <img src="../front/publicar/img/volver-01-01-01.png" alt="Volver">
  </a>

  <main>
    <div class="container">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4 align-items-center">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../front/publicar/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear Publicación</h5>
                    <p class="text-center small">Crea una nueva publicación</p>
                  </div>

                  <form class="row g-3 needs-validation" action="crearP.php" method="post" enctype="multipart/form-data" novalidate>
                  <div class="mb-4">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" required>
                        <div class="invalid-feedback">Por favor, ingresa un punto de partida.</div>
                    </div>
                    <div class="mb-4">
                        <label for="autor" class="form-label">Publicado por</label>
                        <input type="text" name="autor" class="form-control" id="autor">
                    </div>

                    <div class="mb-4">
                        <label for="contacto" class="form-label">Contacto (email o número de celular)</label>
                        <input type="text" name="contacto" class="form-control" id="contacto">
                    </div>

                    <div class="mb-4">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                      <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                    </div>

                    <div class="mb-4">
                      <label for="archivo" class="form-label">Insertar archivo</label>
                      <input type="file" name="archivo" class="form-control" id="archivo" required>
                      <div class="invalid-feedback">Por favor, inserta un archivo.</div>
                    </div>

                    <div class="mb-4">
                    <label for="categoriaSelect" class="form-label">Categoría</label>
                        <select class="form-select" id="categoriaSelect" name="categoria" required>
                            <option value="" disabled selected>Seleccione una Categoría</option>
                            <?php
                            // Conexión a la base de datos
                            include("../../base de datos/con_db.php");

                            $query_categoria = "SELECT * FROM categorias";
                            $result_categoria = mysqli_query($conex, $query_categoria);
                            while($row_categoria = mysqli_fetch_array($result_categoria)){
                                echo "<option value='" . $row_categoria['nombre'] . "'>" . $row_categoria['nombre'] . "</option>";
                            }
                          ?>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione una categoría.</div>
                    </div>

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100" type="submit" name="submit">Crear Publicación</button>
                    </div>

                  </form>

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

  <a href="../../base de datos/cerrar.php" class="logout-button">
    <img src="../front/publicar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
  </a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/publicar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
