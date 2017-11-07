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
        <title>Usuarios</title>
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

$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$clave=$_POST["clave"];
$pregunta=$_POST["pregunta"];
$respuesta=$_POST["respuesta"];
$privilegio=$_POST["privilegio"];
//print_r($_POST); exit;

 

$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");


mysqli_query($conexion,"update usuario set  nombre ='$nombre',pregunta='$pregunta' ,respuesta='$respuesta' ,privilegio='$privilegio' where usuario='$usuario'");









echo"<h3>El registro ya ha sido Actualizado</h3>";

echo"<p                                                         >
    <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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