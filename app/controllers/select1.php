<?php
  
  include "../config/conexion.php";

  $registros = mysqli_query($conexion, "select *
                        from gestion_administrativo") or
    die("Problemas en el select:" . mysqli_error($conexion));

  while ($reg = mysqli_fetch_array($registros)) {
    echo "Año: " . $reg['ano'] . "<br>";
    echo "Valor Hora Extra: " . $reg['valorEx'] . "<br>";
    echo "Valor Hora Nocturna: " . $reg['valorNo'] . "<br>";
    echo "Valor Hora Dominical o Festivo: " . $reg['valorFe'] . "<br>";
    echo "Auxilio Transporte: " . $reg['auxilioTrans'] . "<br>";
    echo "<br>";
    echo "<hr>";
  }

  mysqli_close($conexion);
?>
