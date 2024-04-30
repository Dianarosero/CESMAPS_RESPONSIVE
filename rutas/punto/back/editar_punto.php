<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar Punto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../front/editar/img/flavicon-01.png" rel="icon">
  <link href="../front/editar/img/flavicon-01.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../front/editar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../front/editar/css/style_editarP.css" rel="stylesheet">

 <!-- Inline CSS to remove right margin -->
 <style>
    body {
      margin-right: 0 !important;
    }
  </style>
</head>

<body>

  
  <!-- JavaScript para mostrar la ventana emergente -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var puntoSeleccionado = prompt("Ingrese el punto que desea editar:");
      if (puntoSeleccionado != null) {
        // Establecer el punto seleccionado en el label azul
        document.getElementById("nombre_instalacion").value = puntoSeleccionado;
      }
    });
  </script>

  <a href="../../../cuentas/back/bienvenida/back/welcome.php" class="btn-back">
    <img src="../front/editar/img/volver-01-01-01.png" alt="Volver">
  </a>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4 align-items-center">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="../front/editar/img/flavicon-01.png" alt="" style="margin-right: 10px;">
                  <span>CESMAPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3"> <!-- Agregando la clase "card" para aplicar estilos -->
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Editar Punto</h5>
                  </div>

                  <form class="needs-validation" method="POST" action="tu_archivo_php.php" enctype="multipart/form-data">
                    <div class="mb-4">
                      <select name="nombre_punto" class="form-select" id="nombre_instalacion" required>
                        <option value="San Francisco">San Francisco</option>
                        <option value="Otro punto">Otro punto</option>
                        <!-- Agregar más opciones según sea necesario -->
                      </select>
                    </div>

                    <div class="mb-4">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required>Es el bloque con mayor capacidad al contar con 6 pisos con salones de clases y modernas aulas de informática y salas Mac fue inaugurado en diciembre del 2012. Podemos ubicarla de varias maneras la primer ingresado por la parte del colegio maría Goretti, también entrado por la entrada principal de la universidad y por el Edificio Holanda cuando entramos tendremos que subir al 3 o 4 piso estas cuentas con unas intercepciones que nos llevaran al Edificio San Francisco</textarea>
                    </div>

                    <div class="mb-4">
                      <label for="imagen" class="form-label">Seleccionar Imagen</label>
                      <input type="file" name="imagen" class="form-control" id="imagen" required>
                    </div>

                    <div class="col-12 mt-4">
                      <button class="btn btn-primary w-100" type="button" onclick="mostrarVentanaEmergente()">Editar</button>
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

  <a href="../../../base de datos/cerrar.php" class="logout-button">
    <img src="../front/editar/img/cerrar_sesion-01.png" alt="Cerrar Sesión">
  </a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../front/editar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
