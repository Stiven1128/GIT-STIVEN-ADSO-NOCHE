<?php
// getValoresExtras.php

header('Content-Type: application/json');

// Incluye el archivo de conexión a la base de datos
require_once('../config/conexion.php');

// Obtener los valores de las horas extras desde la tabla gestion_administrativo
$sql = "SELECT valorEx, valorNo, valorFe FROM gestion_administrativo LIMIT 1";
$result = $conexion->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['valorEx'] = $row['valorEx'];
    $response['valorNo'] = $row['valorNo'];
    $response['valorFe'] = $row['valorFe'];
} else {
    $response['valorEx'] = null;
    $response['valorNo'] = null;
    $response['valorFe'] = null;
}

echo json_encode($response);

$conexion->close();
?>
