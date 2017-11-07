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
        <title>Compras</title>
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
                        <h2>Modulo de Administraci&oacute;n de Compras</h2><p>
                      </p>
     
                      <hr>

                      <?php if($_SESSION['privilegio'] == 'Administrador'){ ?>

                      <p>
                        <input class="btn btn-info" type="submit" name="ingresar_compras" value="Ingresar Compra">
                      </p>
                      <p>
                        <input class="btn btn-info" type="submit" name="ver_compras"  value="Ver Compra">
                      </p>
                      <?php }else{ ?>
                      <p>
                        <input class="btn btn-info" type="submit" name="ver_compras"  value="Ver Compra">
                      </p>
                      <?php } ?>
                    </form>
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