<?php

include "../config/conexion.php";


// Obtiene el número de nómina y la cédula enviados desde el cliente
$numero_nomina = $_POST['numero_nomina'];
$cedula = $_POST['cedula'];

// Prepara y ejecuta la consulta para verificar si el número de nómina ya existe
$sql_nomina = "SELECT * FROM nomina WHERE idnomina = ?";
$stmt_nomina = $conexion->prepare($sql_nomina);
$stmt_nomina->bind_param("i", $numero_nomina);
$stmt_nomina->execute();
$result_nomina = $stmt_nomina->get_result();

// Prepara y ejecuta la consulta para verificar si la cédula ya está asociada a un número de nómina
$sql_cedula = "SELECT * FROM nomina WHERE idempleado = ?";
$stmt_cedula = $conexion->prepare($sql_cedula);
$stmt_cedula->bind_param("i", $cedula);
$stmt_cedula->execute();
$result_cedula = $stmt_cedula->get_result();

$response = "success";

if ($result_nomina->num_rows > 0) {
    $response = "exist_nomina";
} elseif ($result_cedula->num_rows > 0) {
    $response = "exist_cedula";
}

echo $response;

// Cierra la conexión a la base de datos
$stmt_nomina->close();
$stmt_cedula->close();
$conexion->close();
?>