<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Información del Estudiante</title>
    <!-- Cargar Bootstrap desde CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Portal Estudiantil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Editar Información del Cliente</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Editar Información del Cliente</h1>
            </div>
        </div>

        <?php
        include('conexion.php');

        $query = 'SELECT * FROM clientes WHERE id =' . $_GET['id'];
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($result);

        $zz = $row['Id'];
        $i = $row['Nombre'];
        $a = $row['Apellido'];
        $b = $row['Estado'];
        $c = $row['FechaNacimiento'];
        ?>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <form method="post" action="edit1.php">
                    <input type="hidden" name=id value="<?php echo $zz; ?>" />
                    
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $i; ?>" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label for="Apellido">Apellido</label>
                        <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $a; ?>" placeholder="Apellido">
                    </div>

                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <input type="text" class="form-control" id="Estado" name="Estado" value="<?php echo $b; ?>" placeholder="Estado">
                    </div>

                    <div class="form-group">
                        <label for="FechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $c; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Actualizar Registro</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
