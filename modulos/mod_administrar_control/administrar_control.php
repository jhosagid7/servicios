<?php
session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_usuario/usuario.php");
}else {
  if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador" || $_SESSION["privilegio"] == "Usuario"){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control</title>
        <!-- llamamos hoja de estilos css -->
        <?php require_once('../../app/Header_admin.php'); ?>
        <script type="text/javascript">
            
        </script>
    </head>
    <body>
      <section id="container">
      <header>

      </header>
        <?php require_once('../mod_administrador/menu_administrador.php'); ?>
        <section id="mainContainer">
          <article id="contenido">
            <div class="table table-responsive">
              <center>
                <table border="0">
                  <tr>
  
                    <td width="736">
    
                    <form name="form1" method="POST" action="programa.php">
                    <center>
      
                      <p>
                        <h2>Administracion de reportes de compras y ventas</h2><p>
                      </p>
     
                      <hr>

                      <?php if($_SESSION['privilegio'] == 'Administrador' || $_SESSION['privilegio'] == 'Usuario'){ ?>
                      
                      <table class='table  table-hover table-condensed dataTable'>
                      <tr><td style="text-align: left" colspan="3"><a href="http://localhost/servicios/modulos/mod_administrar_control/reporte_general.php" class="btn btn-info">Reporte general</a></td></tr>
                        <tr>

                          <th>
                            Compras
                          </th>
                          <td></td>
                          <th>
                            Ventas
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <p>
                        <a href="http://localhost/servicios/modulos/mod_administrar_control/reporte_general_compras.php" class="btn btn-info">Reporte general compras</a>
                      </p>
                      
                          </td>
                          <td></td>
                          <td>
                            <p>
                        <a href="http://localhost/servicios/modulos/mod_administrar_control/reporte_general_ventas.php" class="btn btn-info">Reporte general ventas</a>
                      </p>
                          </td>
                        </tr>
                        </form>
                        <tr>
                          <th style="text-align: center" colspan='3'>
                            <h3>Reporte por fechas</h3>
                          </th style="text-align: center">
                        </tr>
                        <form name="form" method="POST" action="buscar_compras.php">
                        <tr>
                          <th colspan="3">
                              Compras
                          </th>
                          <input type="text" name="_comp" id="_comp" value="1" hidden />
                        </tr>
                        <tr>
                          <td>
                            <p>Desde:</p>
                            <input class="inputo" type="date" name="desde" id="comp_desde" value="" placeholder'Desde'  />
                          </td>
                          <td>
                              <p>Hasta:</p>
                              <input class="inputo" type="date" name="hasta" id="comp_hasta" value="" placeholder'Hasta'  />
                          </td>
                          <td>
                          <button class="btn btn-info" type="submit" value="comp">Buscar</button>
                          </td>
                        </tr>
                        </form>
                        <form name="form" method="POST" action="buscar_ventas.php">
                        <input type="text" name="_comp" id="_comp" value="1" hidden />
                        <tr>
                          <th colspan="3">
                              Ventas
                          </th>
                          
                        </tr>
                        <tr>
                          <td>
                            <p>Desde:</p>
                            <input class="inputo" type="date" name="desde" id="vent_desde" value="" placeholder'Desde'  />
                          </td>
                          <td>
                              <p>Hasta:</p>
                              <input class="inputo" type="date" name="hasta" id="vent_hasta" value="" placeholder'Hasta'  />
                          </td>
                          <td>
                          <button class="btn btn-info" type="submit" value="vent">Buscar</button>
                          </td>
                        </tr>
                        </form>
                      </table>
                      
                      <?php }else{ ?>
                      
                      <?php } ?>
                    
                      <p> 
                        <hr noshade="noshade">   
                      </p> 
                        
                      <p>                                                                                   
                        <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','img1/splash_512.png',1)">
                      </p>
                        
                      <p>     
                        <h3 style="color: !important">Autores: Baron, Gonzalez y Hernandez</h3> 
                      </p>        
                    </a>
                    </td>
                  </tr>
                </table>
              </center>
              <p>&nbsp;</p>
              <p>&nbsp;</p>                  
            </div><!-- /.box-body -->
          </article>
        </section>
                          
      <footer>
          <div> Desarrollado por Baron, Gonzalez y Hernandez agosto 2017 </div> 
      </footer>
      </section>
    </body>
    <?php   
    }else{
      header("Location: " . BASE_URL . "app/404.php");
    }
  }  ?>
</html>