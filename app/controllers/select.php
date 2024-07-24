<?php
  
  include "../config/conexion.php";

  $registros = mysqli_query($conexion, "select *
                        from empleado") or
    die("Problemas en el select:" . mysqli_error($conexion));

  while ($reg = mysqli_fetch_array($registros)) {
    echo "Cedula: " . $reg['cedula'] . "<br>";
    echo "Nombre: " . $reg['nombres'] . "<br>";
    echo "Apellido: " . $reg['apellidos'] . "<br>";
    echo "Direccion: " . $reg['direccion'] . "<br>";
    echo "Telefono: " . $reg['telefono'] . "<br>";
    echo "Correo: " . $reg['correo'] . "<br>";
    echo "Cargo: " . $reg['cargo'] . "<br>";
    echo "Sueldo: " . $reg['sueldo'] . "<br>";
    echo "<br>";
    echo "<hr>";
  }

  mysqli_close($conexion);
?>
