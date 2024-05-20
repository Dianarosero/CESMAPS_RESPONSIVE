<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="../front/publicar/img/flavicon-01.png" rel="icon">
    <link href="../front/publicar/img/flavicon-01.png" rel="apple-touch-icon">
    <title>Buscador de Publicaciones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-horizontal {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .card-horizontal {
                flex-direction: row;
            }

            .card-horizontal .card-body {
                flex: 1;
                padding: 1.25rem;
            }
        }

        .btn-custom {
            background-color: #073763;
            border-color: #073763;
        }

        .btn-custom:hover {
            background-color: #062a52;
            border-color: #062a52;
        }

        /* Estilos para el encabezado y el footer */
        #header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

       
    </style>
</head>
<body>
    <div id="header">
        <img src="../front/publicar/img/flavicon-01.png" alt="Logo" width="200">
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Consulte el Estado de su Publicación</h1>
        <form action="" method="GET" class="form-inline justify-content-center mt-4">
            <input type="text" oninput="convertirAMayusculas()" name="title" id="texto"class="form-control mr-2 custom-input" placeholder="Ingrese el título de la publicación">
            <button type="submit" class="btn btn-primary btn-custom">Buscar</button>
        </form>

        <?php
        // Conexión a la base de datos
        include("../../base de datos/con_db.php");

        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
            $sql = "SELECT * FROM publicaciones WHERE titulo = '$title'";
            $result = $conex->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                    $estado = $row['estado'] == 1 ? 'Inactiva' : 'Activa';
                    echo "
                    <div class='card mb-3 mt-5 card-horizontal'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['titulo']}</h5>
                            
                            <p class='card-text'><small class='text-muted'>Estado: $estado</small></p>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "
                <div class='alert alert-warning mt-5' role='alert'>
                    Verifique el nombre ingresado, es posible que el administrador esté procesando la publicación. Recuerda que se tiene un plazo máximo de 24 horas desde su registro en el sitio web.
                    Si necesitas soporte, <a href='https://wa.me/tu-numero-de-whatsapp' class='alert-link'>haz clic aquí para contactarnos por WhatsApp</a>.
                </div>
                ";
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['title']) && empty($_GET['title'])) {
            echo "
            <div class='alert alert-danger mt-5' role='alert'>
                No se ha proporcionado ningún título para buscar.
            </div>
            ";
        }

        $conex->close();
        ?>
    </div>
    
    <script>
function convertirAMayusculas() {
  var input = document.getElementById("texto");
  input.value = input.value.toUpperCase();
}
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
