<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
</head>
<body>
<?php
session_start();
include "../config/conexion.php";

$ANO = $_REQUEST['año'];
$VALOREXTRA = $_REQUEST['valorEx'];
$VALORNOCTURNA = $_REQUEST['valorNo'];
$VALORFESTIVO = $_REQUEST['valorFe'];
$AUXILIO = $_REQUEST['auxilio'];


mysqli_query($conexion, "insert into gestion_administrativo(ano,valorEx,valorNo,valorFe,auxilioTrans) values 
                       ('$ANO','$VALOREXTRA','$VALORNOCTURNA','$VALORFESTIVO','$AUXILIO')")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "Fue registrado correctamente.";
header('Location: ../views/gestionAdministrativo.html'); // Redirigir a una página predeterminada


mysqli_close($conexion);
?>
</body>
</html>