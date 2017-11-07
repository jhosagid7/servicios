<?php
session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_usuario/usuario.php");
}else {
  if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador"){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar productores</title>
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
<?php

echo"<center>";


/*print_r($_POST);*/

$nombre_empresa_prod=$_POST["nombre_empresa_prod"];
$rif_prod=$_POST["rif_prod"];
$direccion_prod=$_POST["direccion_prod"];
$telefono_prod=$_POST["telefono_prod"];
$correo_prod=$_POST["correo_prod"];
 

$conexion=mysqli_connect("localhost","root","","servicios");
mysqli_select_db($conexion,"servicios");


mysqli_query($conexion,"update productores set  nombre_empresa_prod ='$nombre_empresa_prod',rif_prod='$rif_prod',direccion_prod='$direccion_prod',telefono_prod='$telefono_prod' ,correo_prod='$correo_prod' where rif_prod='$rif_prod'");









echo"<h3>El registro ya ha sido Actualizado</h3>";

echo"<p                                                         >
    <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>
    ";
	







echo"</center>";


?>
</article>
                        <footer>
                            <div> Desarrollado por Baron, Gonzalez y Hernandez agosto 2017 </div> 
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