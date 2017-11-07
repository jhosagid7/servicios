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
        <title>Actualizar Datos de la empresa</title>
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




$nombre_emp=$_POST["nombre_emp"];
$rif_emp=$_POST["rif_emp"];
$direccion_emp=$_POST["direccion_emp"];
$telefono_emp=$_POST["telefono_emp"];
$correo_emp=$_POST["correo_emp"];
            


$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");

/*$v="update proveedores set  nombre_prov ='$nombre_prov',rif_prov='$rif_prov',direccion_prov='$direccion_prov',telefono_prov='$telefono_prov',nombre_contacto_prov='$nombre_contacto_prov',cedula_contacto_prov='$cedula_contacto_prov' where rif_prov='$rif_prov'";
echo $v; exit;*/
mysqli_query($conexion,"update datos_empresa set  nombre_emp ='$nombre_emp',rif_emp='$rif_emp',direccion_emp='$direccion_emp',telefono_emp='$telefono_emp',correo_emp='$correo_emp' where rif_emp='$rif_emp'");









echo"<h3>El registro ya ha sido Actualizado</h3>";

echo"<p                                                         >
    <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>
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