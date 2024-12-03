<?php 
include('conexion.php');

// Realizar la consulta para obtener todos los clientes
$sql = "SELECT Id, Nombre, Descripcion,Precio, Stock  FROM Articulos";
$result = mysqli_query($conn, $sql);

// Verificar si hay registros
if (mysqli_num_rows($result) > 0) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Listado de Articulos</title>
        <!-- Cargar Bootstrap desde CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            /* Ajustar tamaño de la tabla */
            .table-sm td, .table-sm th {
                padding: 0.3rem; /* Reducir el padding */
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <a href="index.php" class="btn btn-primary mb-3">Regresar al Menú Principal</a> <!-- Botón para regresar -->
            <table class="table table-sm table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';

    // Mostrar cada cliente en una fila de la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['Id'] . '</td>';
        echo '<td>' . $row['Nombre'] . '</td>';
        echo '<td>' . $row['Descripcion'] . '</td>';
        echo '<td>' . $row['Precio'] . '</td>';
        echo '<td>' . $row['Stock'] . '</td>';
        echo '<td>
               <a href="searchfrmArticulo.php?action=edit&id=' . $row['Id'] . '" class="btn btn-sm btn-info">Buscar</a>
               <a href="editArticulo.php?id=' . $row['Id'] . '" class="btn btn-warning btn-sm">Editar</a> |
               <a href="del.php?id=' . $row['Id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de eliminar este cliente?\');">Eliminar</a>
              </td>';
        echo '</tr>';
    }

    echo '</tbody>
            </table>
        </div>';

} else {
    echo '<div class="container mt-5"><p>No hay registros disponibles.</p></div>';
}

// Cerrar la conexión
mysqli_close($conn);

// Incluir los scripts de Bootstrap al final
echo '
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>';
?>
