<?php

include "../config/conexion.php";

// Obtener la cédula del formulario
$CEDULA = $_REQUEST['cedula'];

// Consultar si el empleado con la cédula proporcionada existe
$query = "SELECT * FROM empleado WHERE cedula = '$CEDULA'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    // Si el empleado existe, eliminarlo
    mysqli_query($conexion, "DELETE FROM empleado WHERE cedula = '$CEDULA'")
        or die("Problemas en el delete: " . mysqli_error($conexion));
    echo "El empleado fue eliminado correctamente.";
} else {
    // Si el empleado no existe, mostrar un mensaje
    echo "Empleado no existente.";
}

mysqli_close($conexion);

?>

