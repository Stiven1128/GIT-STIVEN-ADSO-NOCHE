<?php
include "../config/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Verificar si se ha recibido la cédula del formulario
    if (!empty($_POST['cedula'])) {
        // Obtener y validar los datos del formulario
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $cargo = $_POST['cargo'];
        $sueldo = $_POST['sueldo'];

        // Verificar si la cédula existe en la base de datos
        $consulta_verificar = $conexion->prepare("SELECT * FROM empleado WHERE cedula = ?");
        $consulta_verificar->bind_param("i", $cedula);
        $consulta_verificar->execute();
        $resultado_verificar = $consulta_verificar->get_result();

        if ($resultado_verificar->num_rows > 0) {
            // La cédula existe, proceder con la actualización
            $consulta_actualizar = $conexion->prepare("UPDATE empleado SET direccion = ?, telefono = ?, correo = ?, cargo = ?, sueldo = ? WHERE cedula = ?");
            $consulta_actualizar->bind_param("ssssii", $direccion, $telefono, $correo, $cargo, $sueldo, $cedula);

            if ($consulta_actualizar->execute()) {
                echo "¡Actualización exitosa!";
            } else {
                echo "Error al actualizar los datos: " . $conexion->error;
            }

            $consulta_actualizar->close();
        } else {
            echo "La cédula no está registrada.";
        }

        header('Location: ../views/formularioActualizar.html'); // Redirigir a una página predeterminada

        $consulta_verificar->close();


    $conexion->close();
    }
}
?>