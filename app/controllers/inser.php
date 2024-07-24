<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
</head>
<body>
<?php
session_start();
include "../config/conexion.php";

$CEDULA = $_REQUEST['cedula'];
$NOMBRE = $_REQUEST['nombre'];
$APELLIDO = $_REQUEST['apellido'];
$DIRECCION = $_REQUEST['direccion'];
$TELEFONO = $_REQUEST['telefono'];
$CORREO = $_REQUEST['correo'];
$CARGO = $_REQUEST['cargo'];
$SUELDO = $_REQUEST['sueldo'];

// Primero, verificamos si ya existe un empleado con la misma cédula
$query = "SELECT * FROM empleado WHERE Cedula = '$CEDULA'";
$resultado = mysqli_query($conexion, $query);

if(mysqli_num_rows($resultado) > 0) {
    // Si encuentra un registro, el usuario ya existe
    echo "<script>alert('La cédula $CEDULA ya está registrada en el sistema.'); window.location.href='../views/formularioEmpleado.html';</script>";
} else {
    // Si no encuentra registros, insertamos el nuevo empleado
    $insertar = "INSERT INTO empleado (Cedula, Nombres, Apellidos, Direccion, Telefono, Correo, Cargo, Sueldo) VALUES ('$CEDULA', '$NOMBRE', '$APELLIDO', '$DIRECCION', '$TELEFONO', '$CORREO', '$CARGO', '$SUELDO')";
    $result_insert = mysqli_query($conexion, $insertar);
    
}
header('Location: ../views/formularioEmpleado.html'); // Redirigir a una página predeterminada


mysqli_close($conexion);
?>
</body>
</html>