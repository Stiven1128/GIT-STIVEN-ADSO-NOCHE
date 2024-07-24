<?php
require_once '../config/conexion.php';


$sql = "SELECT DISTINCT ano FROM gestion_administrativo ORDER BY ano DESC";
$result = $conexion->query($sql);

$years = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $years[] = $row["ano"];
    }
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($years);
?>
