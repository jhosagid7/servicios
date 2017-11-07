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
        <title>Ingresar control</title>
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
/*print_r($_POST); exit;*/
echo"<center>";



/*$idmedica=$_POST["idmedica"];*/
$compra=$_POST["compra"];
$venta=$_POST["venta"];
$existencia=$_POST["existencia"];
$fecha=$_POST["fecha"];

$sql="insert into proveedores(id_control,compra,venta,existencia,fecha)

values(null,'$compra','$venta','$existencia','$fecha')";

/*echo $sql; */

$conexion = mysqli_connect("localhost","root","","servicios");
mysqli_select_db($conexion,"servicios");


$resultado = mysqli_query($conexion,$sql);

if(!$resultado){//
echo 'errror...';
}


?>









<h3>Sus datos Fueron Almacenados Exitosamente</h3>

<p>
    <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php'>Regresar</a>
</p>  
	







</center>




              <p>&nbsp;</p>
              <p>&nbsp;</p>                  
            
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