<?php
session_start();
include "../config/conexion.php";

$BONIFICACION = $_REQUEST['tipoBoni'];
$VALORBONO = $_REQUEST['valorBono'];



mysqli_query($conexion, "insert into bonificacion(tipo_bono, valor_bono) values 
                       ('$BONIFICACION', '$VALORBONO')")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "Fue registrado correctamente.";
header('Location: ../views/formularioBonificacion.html'); // Redirigir a una página predeterminada


mysqli_close($conexion);
?>