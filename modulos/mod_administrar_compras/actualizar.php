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




$nombre_prov=$_POST["nombre_prov"];
$rif_prov=$_POST["rif_prov"];
$telefono_prov=$_POST["telefono_prov"];
$direccion_prov=$_POST["direccion_prov"];
$nombre_contacto_prov=$_POST["nombre_contacto_prov"];
$cedula_contacto_prov=$_POST["cedula_contacto_prov"];


$conexion=mysqli_connect("localhost","root","","servicios");
mysqli_select_db($conexion,"servicios");

/*$v="update proveedores set  nombre_prov ='$nombre_prov',rif_prov='$rif_prov',direccion_prov='$direccion_prov',telefono_prov='$telefono_prov',nombre_contacto_prov='$nombre_contacto_prov',cedula_contacto_prov='$cedula_contacto_prov' where rif_prov='$rif_prov'";
echo $v; exit;*/
mysqli_query($conexion,"update proveedores set  nombre_prov ='$nombre_prov',rif_prov='$rif_prov',direccion_prov='$direccion_prov',telefono_prov='$telefono_prov',nombre_contacto_prov='$nombre_contacto_prov',cedula_contacto_prov='$cedula_contacto_prov' where rif_prov='$rif_prov'");









echo"<h3>El registro ya ha sido Actualizado</h3>";

echo"<p                                                         >
    <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>
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