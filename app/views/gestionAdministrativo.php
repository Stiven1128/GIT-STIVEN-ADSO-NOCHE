<?php

include('../includes/functions.php');
// Redirigir si no está logueado o no es administrador
redirect_if_not_logged_in();
redirect_if_not_admin();
// Regenerar ID de sesión al iniciar sesión
if (!isset($_SESSION['regenerated'])) {
  session_regenerate_id(true);
  $_SESSION['regenerated'] = true;
}

// Establecer headers para controlar el caché
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/foundation.css">
    <link rel="stylesheet" href="../../public/css/app.css">
    <link rel="stylesheet" href="../../public/css/FormularioEmpleado.css">
    <title>Formulario</title>

    <style>
        body{
            margin: 0;
            background-color: #ffff;
          }
          header {
              display: flex;
              height: 100px;
              background-color: rgb(0, 0, 0);
              justify-content: space-between;
              align-items: center;
              padding: 10px;
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              z-index: 1000; 
          }
  
          .containerX {
              margin-top: 150px; /* Ajusta el margen superior para dejar espacio para el menú */
              position: relative;
              z-index: 999; /* Asegura que el formulario esté por debajo del menú */
          }
            body{
              font-family:sans-serif;
              
            }
            .logo{
              display: flex;
              align-items:center;
            }
            a {
              text-decoration:none;
              list-style: none;
              color:black;
            }
            ul{
              list-style:none;
            }
            .logo img{
              height:80px;
              
            }
            ul, ol {
                    list-style:none;
           
                }
                
          .nav{
            width: 500px;
            margin: 0 auto; 
          }
                
          h2{
            background-color:rgb(0, 0, 0);
            font-size:50px;
            
            padding-top:23px;
            color:rgb(255, 255, 255);
            text-transform:uppercase;
          }
                .nav > li {
                    float:left;
                }
                
                .nav li a {
                    background-color:rgb(0, 0, 0);
                    color:#ffffff;
                    text-decoration:none;
                    padding:10px 12px;
                    display:block;
                    font-size: 25px;
                    border-radius: 15px;
                    margin-right:5px;
                    margin-bottom:5px;
                }
                
                .nav li a:hover {
                    background-color:#787171;
                }
                
                .nav li ul {
                    display:none;
                    position:absolute;
                    min-width:140px;
                    z-index: 999;
           
                }
                
                 .nav li:hover > ul {
                    display:block;
                }
                
                .nav li ul li {
                    position:relative;
           
                }
                
                .nav li ul li ul {
                    right:-140px;
                    top:0px;
          }

        select{
            background-color: rgb(76, 84, 88);
        }
        option{
            background-color: rgb(76, 84, 88);
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
    
    
        </nav>
      </header>
            <div class="containerX">
                <div class="callout">
                    <h1 style="text-align: center;">Gestion Administrativo</h1>
                    <form action="../controllers/gestion.php" method="post" required="required" name="form1">
                        <div class="form-row">
                            <div class="form-column">
                                <label>Año
                                    <select name="año" required>
                                        <option value=""></option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-column">
                                <label>Valor Hora Extra
                                    <input type="text" class="cel" name="valorEx" placeholder="Valor Hora Extra" required>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label>Valor Hora Extra Nocturna
                                    <input type="text" class="cel" name="valorNo" placeholder="Valor Hora Extra Nocturna" required>
                                </label>
                            </div>
                            <div class="form-column">
                                <label>Valor Hora Extra Dominical o Festivo
                                    <input type="text" class="cel" name="valorFe" placeholder="Valor Hora Extra Dominical o Festivo" required>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label>Auxilio Transporte
                                    <input type="text" class="cel" name="auxilio" placeholder="Auxilio Transporte" required>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="cell">
                                <input type="submit" class="success button" value="Registrar">
                                <input type="button" onclick="window.consulta.showModal();" class="button" value="Consultar">
                                <input type="reset" class="alert button" value="Limpiar">
                                <input type="submit" class="button" onclick="location.href='../views/index.html'" value="Atras">
                            </div>
                        </div>
                        <dialog id="consulta">
                            <iframe src="../controllers/select1.php" width="600" height="400"></iframe>
                            <button onclick="window.consulta.close();" class="button">Cerrar</button>
                        </dialog>
                    </form>
                </div>
            </div>
    
</body>
</html>

