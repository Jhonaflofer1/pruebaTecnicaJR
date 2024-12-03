<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizar Cliente</title>
</head>
<body>
<?php
// Comprobar si los datos han sido enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $zz = $_POST['id'];
    $fname = $_POST['Nombre'];
    $lname = $_POST['Apellido'];
    $mname = $_POST['Estado'];
    $address = $_POST['FechaNacimiento'];

    // Validación de los datos
    if (empty($zz) || empty($fname) || empty($lname) || empty($mname) || empty($address)) {
        die("Todos los campos son obligatorios.");
    }

    // Incluir archivo de conexión
    include('conexion.php');

    // Verificar si la conexión fue exitosa
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para evitar inyección SQL
    $stmt = $conn->prepare("UPDATE clientes SET Nombre=?, Apellido=?, Estado=?, FechaNacimiento=? WHERE id=?");

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssssi", $fname, $lname, $mname, $address, $zz);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script type="text/javascript">
                alert("Actualización exitosa.");
                window.location = "index.php";
              </script>';
    } else {
        die("Error en la actualización: " . $stmt->error);
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
