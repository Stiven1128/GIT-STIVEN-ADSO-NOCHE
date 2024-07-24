<?php
// get_values.php
header('Content-Type: application/json');

$year = $_GET['year'] ?? null;

if (!$year) {
    echo json_encode(['error' => 'Año no proporcionado']);
    exit;
}

include '../config/conexion.php'; // Incluye tu archivo de conexión a la base de datos

$query = $conexion->prepare("SELECT valorEx, valorNo, valorFe, bono FROM gestion_administrativo WHERE year = ?");
$query->bind_param("s", $year);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'No se encontraron datos para el año proporcionado']);
}

$query->close();
$conexion->close();
?>
