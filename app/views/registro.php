<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/foundation.css">
    <link rel="stylesheet" href="../../public/css/app.css">
    <style>

    .form-date {
    padding: 16px;
    display: flex;
    flex-direction: column;
    }
    .form-date__label {
    font-family: “Helvetica”, arial, sans-serif;
    font-size: 18px;
    line-height: 24px;
    padding-bottom: 8px;
    }
    .form-date__input[type=”date”] {
    appearance: none;
    color: #1D1D1D;
    font-family: “Helvetica”, arial, sans-serif;
    font-size: 18px;
    border:1px solid #ECF0F1;
    background:#ECF0F1;
    padding: 4px;
    display: inline-block;
    visibility: visible;
    width: 140px;
    }
    .form-date__input[type=”date”]:focus {
    color: #495057;
    background-color: #FFFFFF;
    border-color: #80BDFF;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }


            
            .grid-container {
                margin-top: 20px;
                background: white;
                border-style: solid;
                border-width: 3px;
                border-color: #000000;
                padding: 20px;
                margin-bottom: 20px;
            }
            header {
                display: flex;
                height: 100px;
                background-color: #000000;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
            }
            body {
                font-family: sans-serif;
            }
            .logo {
                display: flex;
                align-items: center;
            }
            a {
                text-decoration: none;
                list-style: none;
                color: black;
            }
            ul {
                list-style: none;
            }
            .logo img {
                height: 80px;
            }
            ul, ol {
                list-style: none;
            }
            .nav {
                width: 500px;
                margin: 0 auto;
            }
            h2 {
                background-color: black;
                font-size: 50px;
                padding-top: 23px;
                color: white;
                text-transform: uppercase;
            }
            .nav > li {
                float: left;
            }
            .nav li a {
                background-color: #000000;
                color: #fff;
                text-decoration: none;
                padding: 10px 12px;
                display: block;
                font-size: 25px;
                border-radius: 15px;
                margin-right: 5px;
                margin-bottom: 5px;
            }
            .nav li a:hover {
                background-color: #787171;
            }
            .nav li ul {
                display: none;
                position: absolute;
                min-width: 140px;
            }
            .nav li:hover > ul {
                display: block;
            }
            .nav li ul li {
                position: relative;
            }
            .nav li ul li ul {
                right: -140px;
                top: 0px;
            }
            .button {
                border-radius: 50px;
            }
            #cedula, #select-dias, #salcorrecto, #salario, #auxilio, #hextra, #valextra, #valnocturnas, #valfestivas, #hnocturnas, #hfestivas, #bonificacion, #salariodevengado, #salud, #pension, #totaldevengado {
                border-radius: 50px;
                border: 2px solid black;
            }
            .fechas{
                margin-left: 320px;
                display: flex;
                gap: 15px;
            }
            /* Estilos para el contenedor de los inputs */
    .form-date {
    display: flex;
    align-items: center;
    }

    /* Estilos para las etiquetas */
    .form-date__label {
    margin-right: 10px;
    }

    /* Estilos para los inputs */
    .form-date__input {
    border: none;
    border-bottom: 3px solid black; /* Línea inferior transparente */
    padding: 5px;
    margin-top: 5px;
    background-color: transparent; /* Fondo transparente */
    outline: none; /* Eliminar el contorno al hacer clic */
    }

    /* Eliminar los estilos por defecto del input de tipo month */
    .form-date__input[type="month"] {
    appearance: none;
    }

    /* Eliminar los estilos por defecto del input de tipo datetime-local */
    .form-date__input[type="datetime-local"] {
    appearance: none;
    }

    .grid-container-aux{
        margin-top: 20px;
    }

        
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="../../public/img/pape.png">
        <h2 class="nombre-empresa">CLIP</h2>
    </div>
    <nav>
        <div id="header">
            <nav>
                <ul class="nav">
                    <li><a class="active" href="index.html">Empleado</a>
                        <ul>
                            <li><a href="formularioEmpleado.html">Ingresar Empleado</a></li>
                            <li><a href="formularioActualizar.html">Actualizar Empleado</a></li>
                            <li><a href="formularioEliminar.html">Eliminar Empleado</a></li>
                            <li><a href="gestionAdministrativo.php">Gestión Administrativo</a>
                              <ul>
                                  <li><a href="formularioBonificacion.php">Bonificación</a></li>
                              </ul>
                          </li>
                        </ul>
                    </li>
                    <li><a href="nomina.html">Nomina</a>
                    </li>
                    <li><a href="registro.php">Registros</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </nav>
</header>


<div class="grid-container">
    <?php 

    require_once "../config/conexion.php";


    $query = "SELECT * FROM nomina";


    echo '<table border=1px" cellspacing="0" cellpadding="10"> 
        <tr> 
            <td> <Center><strong> <font face="Arial">Nomina</font></strong></Center> </td> 
            <td> <Center><strong> <font face="Arial">Auxilio de Transporte</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Mes</font></strong> </Center></td> 
            <td> <Center><strong> <font face="Arial">Año</font></strong> </Center></td> 
            <td> <Center><strong> <font face="Arial">Dias Laborados</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Sueldo Neto</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Cedula Empleado</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Salario</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Valor Horas Extras</font></strong> </Center></td>
            <td> <Center><strong> <font face="Arial">Bonificacion</font></strong> </Center></td>    
            <td> <Center><strong> <font face="Arial">Salario Devengado</font></strong></Center> </td> 
        </tr>';

    if ($result = $conexion->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["idnomina"];
            $field2name = $row["auxilioTrans"];
            $field3name = $row["mes"];
            $field4name = $row["ano"];
            $field5name = $row["diaslaborados"];
            $field6name = $row["sueldoneto"];
            $field7name = $row["idempleado"];
            $field8name = $row["salario"];
            $field9name = $row["vhe"];
            $field10name = $row["boni"];
            $field11name = $row["salDev"];


            echo '<tr> 
                    <td><Center>'.$field1name.'</Center></td> 
                    <td><Center>'.$field2name.'</Center></td> 
                    <td><Center>'.$field3name.'</Center></td> 
                    <td><Center>'.$field4name.'</Center></td> 
                    <td><Center>'.$field5name.'</Center></td> 
                    <td><Center>'.$field6name.'</Center></td> 
                    <td><Center>'.$field7name.'</Center></td> 
                    <td><Center>'.$field8name.'</Center></td>
                    <td><Center>'.$field9name.'</Center></td> 
                    <td><Center>'.$field10name.'</Center></td> 
                    <td><Center>'.$field11name.'</Center></td>
                </tr>';
        }
        $result->free();
    } 
    ?>
</div>
</body>
</html>