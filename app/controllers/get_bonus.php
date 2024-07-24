<?php
require_once '../config/conexion.php';

// Cambiar la consulta para obtener los bonos desde la tabla bonificacion
$sql = "SELECT DISTINCT id_bono, tipo_bono, valor_bono FROM bonificacion ORDER BY tipo_bono DESC";
$result = $conexion->query($sql);

$bonus = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bonus[] = array(
            "id_bono" => $row["id_bono"],
            "tipo_bono" => $row["tipo_bono"],
            "valor_bono" => $row["valor_bono"]
        );
    }
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($bonus);
?>
