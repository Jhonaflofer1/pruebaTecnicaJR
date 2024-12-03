
<?php
$host = "localhost";      // Servidor
$user = "root";           // Usuario (cambiar si es necesario)
$password = "";           // Contraseña (cambiar si es necesario)
$dbname = "tienda_ujueta"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
<?php
