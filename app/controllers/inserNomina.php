<?php
session_start();
include "../config/conexion.php";

// Verificar si los datos necesarios están presentes en $_POST
if (isset($_POST['numero_nomina']) && isset($_POST['cedula']) && isset($_POST['auxTrans']) && isset($_POST['anio_nomina']) && isset($_POST['diasLa']) && isset($_POST['dxp']) && isset($_POST['dxs']) && isset($_POST['td']) && isset($_POST['fecha_nomina']) && isset($_POST['hed']) && isset($_POST['hen']) && isset($_POST['hedf']) && isset($_POST['salario']) && isset($_POST['vhe']) && isset($_POST['boni']) && isset($_POST['salDev'])) {

    // Obtener los datos del formulario
    $idNomina = $_POST['numero_nomina'];
    $idEmpleado = $_POST['cedula'];
    $auxilioTransporte = $_POST['auxTrans'];
    $anio = $_POST['anio_nomina'];
    $diasLaborados = $_POST['diasLa'];
    $descuentoPension = $_POST['dxp'];
    $descuentoSalud = $_POST['dxs'];
    $sueldoNeto = $_POST['td'];
    $fechaNomina = $_POST['fecha_nomina']; // Fecha completa
    $hed = $_POST['hed'];
    $hen = $_POST['hen'];
    $hedf = $_POST['hedf'];
    $salario = $_POST['salario'];
    $vhe = $_POST['vhe'];
    $boni = $_POST['boni'];
    $salDev = $_POST['salDev'];

    // Verificar si ya existe una nómina con el mismo ID
    $sql_check = "SELECT * FROM nomina WHERE idnomina = ?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("i", $idNomina);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Error: Ya existe una nómina con el mismo ID.";
    } else {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO nomina (idnomina, idempleado, auxilioTrans, mes, ano, diaslaborados, descuentopension, descuentosalud, sueldoneto, hed, hen, hedf, salario, vhe, boni, salDev) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iiisiiiiiiiddddi", $idNomina, $idEmpleado, $auxilioTransporte, $fechaNomina, $anio, $diasLaborados, $descuentoPension, $descuentoSalud, $sueldoNeto, $hed, $hen, $hedf, $salario, $vhe, $boni, $salDev);
        
        if ($stmt->execute()) {
            echo "Nómina registrada exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

} else {
    echo "Error: Datos faltantes en el formulario.";
}

header('Location: ../views/nomina.html'); // Redirigir a una página predeterminada

$stmt_check->close();
$conexion->close();
?>