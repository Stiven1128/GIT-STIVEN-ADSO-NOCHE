<?php
include "../config/conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Verificar si se ha recibido la cédula del formulario
    if (!empty($_POST['cedula'])) {
        // Obtener la cédula del formulario
        $cedula = $_POST['cedula'];

        // Verificar si la cédula existe en la base de datos
        $consulta = $conexion->prepare("SELECT * FROM empleado WHERE cedula = ?");
        $consulta->bind_param("i", $cedula);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            // Mostrar los datos del empleado en los campos del formulario
            $empleado = $resultado->fetch_assoc();
            echo json_encode($empleado); // Devolver los datos como JSON
        } else {
            echo "error"; // Devolver un mensaje de error si la cédula no está registrada
        }


    $consulta->close();
    }
}

?>