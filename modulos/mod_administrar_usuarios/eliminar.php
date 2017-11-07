<?php
session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_proveedor/usuario.php");
}else {
  if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador"){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema</title>
        <!-- llamamos hoja de estilos css -->
        <?php require_once('../../app/Header_admin.php'); ?>
        <script type="text/javascript">
            
        </script>
    </head>
    <body>
     <!-- Main content -->
        <section class="content">
            <section id="container">
                <header>
                </header>
                <?php require_once('../../modulos/mod_administrador/menu_administrador.php'); ?>
                    <section id="mainContainer">
                      <article id="contenido">
               <?php

echo"<center>";




$usuario=$_POST["usuario"];

$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");





$resultadoe=mysqli_query($conexion,"select * from usuario where usuario='$usuario'");

if(mysqli_num_rows($resultadoe)>0)


{
mysqli_query($conexion,"delete from usuario where usuario='$usuario'");

echo"<h3>Sus datos Fueron Eliminados Exitosamente</h3>";
echo "</article>
                        <footer>
                            <div></div> 
                        </footer>
                    </section>
                </section>

        </section>
                
        
    </body>";
}

else
{
echo"<p>";

echo"<h3>codigo no encontrado</h3>";

echo"<h4>favor inserte nombre de usuario existente</h4>";
echo "</article>
                        <footer>
                            <div></div> 
                        </footer>
                    </section>
                </section>

        </section>
                
        
    </body>";
?>
 <?php   
    
         header("Location: " . BASE_URL . "app/404.php");
    
}      ?>
</html>";

}












echo"<p                                                         >
    <a class='btn btn-info href=http://localhost/servicios/modulos/mod_productos/archivoproducto.php>Regresar</a>
    ";
  







echo"</center>";


?>
              </article>
                        <footer>
                            <div></div> 
                        </footer>
                    </section>
                </section>

        </section>
                
        
    </body>

 <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>






