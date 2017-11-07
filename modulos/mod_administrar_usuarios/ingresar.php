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
/*print_r($_POST);*/
echo"<center>";



/*$idmedica=$_POST["idmedica"];*/
$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$clave=$_POST["clave"];
$pregunta=$_POST["pregunta"];
$respuesta=$_POST["respuesta"];
$privilegio=$_POST["privilegio"];


$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");


mysqli_query($conexion,"insert into usuario(id_usuario,nombre,usuario,clave,pregunta,respuesta,privilegio)

values(null,'$nombre','$usuario','$clave','$pregunta','$respuesta','$privilegio')");












echo"<h3>Sus datos Fueron Almacenados Exitosamente</h3>";

echo"<p><a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php'>Regresar</a></p>";
  







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