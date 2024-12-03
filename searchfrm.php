<?php
include('conexion.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detalle del Clientee</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Regresar al Manu Anterior</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Detalle del Cliente</h1>

        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];

            // Consulta SQL para obtener los detalles
            $query = 'SELECT * FROM clientes WHERE id = ' . $id;
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $i = $row['Nombre'];
                $a = $row['Apellido'];
                $b = $row['Estado'];
                $c = $row['FechaNacimiento'];
            } else {
                echo '<div class="alert alert-warning text-center" role="alert">
                        No se encontraron detalles para el ID proporcionado.
                      </div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center" role="alert">
                    El parámetro "id" es inválido o no está presente en la URL.
                  </div>';
        }
        ?>

        <?php if (isset($row)): ?>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" value="<?php echo htmlspecialchars($id); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" value="<?php echo htmlspecialchars($i); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" value="<?php echo htmlspecialchars($a); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" value="<?php echo htmlspecialchars($b); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fechaNacimiento" value="<?php echo htmlspecialchars($c); ?>" readonly>
                    </div>
                    <a href="index.php" class="btn btn-primary">Regresar al Menú Principal</a>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; <?php echo date('Y'); ?> Gestión de Estudiantes. Todos los derechos reservados.</p>
    </footer>

    <!-- jQuery and Bootstrap Bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
