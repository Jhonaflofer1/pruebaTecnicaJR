<?php
include('conexion.php');
include('header.php');
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Articulo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            color: #ffffff !important;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        h2 {
            color: #343a40;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 15px;
            background-color: #343a40;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Regresar al Menú Principal</a>
        </div>
    </nav>

    <!-- Formulario -->
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Registrar Nuevos Articulo</h2>
            <p class="text-center text-muted">Llena el formulario para agregar un nuevo Articulo.</p>
            <form method="post" action="transacArticulo.php?action=addArticulo">
                <div class="mb-3">
                    <label for="id_persona" class="form-label">ID</label>
                    <input type="text" class="form-control" id="Id" name="Id" placeholder="Ingresa el ID" required>
                </div>
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingresa el nombre" required>
                </div>
                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingresa una Descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="Precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="Precio" name="Precio" placeholder="Ingresa el precio" required>
                </div>
                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="Stock" name="Stock" placeholder="Ingresa el Stock" required>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Registro</button>
                    <button type="reset" class="btn btn-outline-secondary">Limpiar Formulario</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Sistema de Registro de tienda ujueta. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
