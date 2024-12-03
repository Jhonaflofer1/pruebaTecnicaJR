<?php
include('conexion.php');
include('header.php');
?>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CRUD Using PHP/MySQL</a>
            </div>

            <!-- Sidebar Menu Items -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PHP CRUD <small>Create, Read, Update and Delete</small>
                        </h1>
                    </div>
                </div>

                <div class="col-lg-12">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action']) && $_GET['action'] == 'addArticulo') {
                        $id = isset($_POST['Id']) ? trim($_POST['Id']) : null;
                        $nombre = isset($_POST['Nombre']) ? trim($_POST['Nombre']) : null;
                        $descripcion = isset($_POST['Descripcion']) ? trim($_POST['Descripcion']) : null;
                        $precio = isset($_POST['Precio']) ? trim($_POST['Precio']) : null;
                        $stock = isset($_POST['Stock']) ? trim($_POST['Stock']) : null;

                        // Validar que todos los campos estén completos
                        $errores = [];
                        if (empty($id)) $errores[] = "El campo ID es obligatorio.";
                        if (empty($nombre)) $errores[] = "El campo Nombre es obligatorio.";
                        if (empty($descripcion)) $errores[] = "El campo Descripción es obligatorio.";
                        if (empty($precio)) $errores[] = "El campo preci es obligatorio.";
                        if (empty($stock)) $errores[] = "El campo Stock es obligatorio.";

                        if (count($errores) > 0) {
                            echo "<div class='alert alert-danger'><strong>Error:</strong><ul>";
                            foreach ($errores as $error) {
                                echo "<li>$error</li>";
                            }
                            echo "</ul></div>";
                        } else {
                            // Insertar los datos en la base de datos
                            $sql = "INSERT INTO articulos (Id, Nombre, Descripcion, precio, Stock) VALUES ('$id', '$nombre', '$descripcion', '$precio',  '$stock')";

                            if (mysqli_query($conn, $sql)) {
                                echo "<script type='text/javascript'>
                                  alert('Registro agregado correctamente.');
                                  window.location = 'index.php';
                                </script>";
                            } else {
                                echo "<div class='alert alert-danger'>Error al insertar el registro: " . mysqli_error($conn) . "</div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
