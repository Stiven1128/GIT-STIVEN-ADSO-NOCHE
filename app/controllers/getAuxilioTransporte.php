<?php
// getAuxilioTransporte.php

header('Content-Type: application/json');

// Incluye el archivo de conexión a la base de datos
require_once('../config/conexion.php');

// Obtener el auxilio de transporte desde la tabla gestion_administrativo
$sql = "SELECT auxilioTrans FROM gestion_administrativo LIMIT 1";
$result = $conexion->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['auxilioTrans'] = $row['auxilioTrans'];
} else {
    $response['auxilioTrans'] = null;
}

echo json_encode($response);

$conexion->close();
?>
