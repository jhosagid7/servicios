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
        <title>Eliminar proveedor</title>
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

$rif_prov=$_POST["rif_prov"];

$conexion=mysqli_connect("localhost","root","","servicios");
mysqli_select_db($conexion,"servicios");





$resultadoe=mysqli_query($conexion,"select * from proveedores where rif_prov='$rif_prov'");

if(mysqli_num_rows($resultadoe)>0)


{
mysqli_query($conexion,"delete from proveedores where rif_prov='$rif_prov'");

echo"<h3>Sus datos Fueron Eliminados Exitosamente</h3>";
}

else
{
echo"<p>";

echo"<h3>codigo no encontrado</h3>";

echo"<h4>favor inserte Rif existente</h4>";

}












echo"<p                                                         >
    <a class='btn btn-info href=http://localhost/servicios/modulos/mod_administar_proveedores/administrar_proveedores.php>Regresar</a>
    ";
	







echo"</center>";


?>

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