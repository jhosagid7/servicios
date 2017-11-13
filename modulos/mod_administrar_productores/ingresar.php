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
        <title>Ingresar Productores</title>
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

$nombre_empresa_prod=$_POST["nombre_empresa_prod"];
$preRif=$_POST["preRif"];
$rif_prod=$preRif.$_POST["rif_prod"];

$telefono_prod=$_POST["telefono_prod"];
$direccion_prod = $_POST["direccion_prod"];

$sql="insert into productor(id_productor,nombre_empresa_prod,rif_prod,telefono_prod,direccion_prod)

values(null,'$nombre_empresa_prod','$rif_prod','$telefono_prod','$direccion_prod')";

$conexion = mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");


$resultado = mysqli_query($conexion,$sql);

if(!$resultado){//
echo 'error...';
}


?>









<h3>Sus datos Fueron Almacenados Exitosamente</h3>

<p>
    <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php'>Regresar</a>
</p>  
	







</center>




              <p>&nbsp;</p>
              <p>&nbsp;</p>                  
            
          </article>
        
        </section>
                          
      <footer>
          <div></div> 
      </footer>
      </section>
    </body>
    <?php   
    }else{
      header("Location: " . BASE_URL . "app/404.php");
    }
  }  ?>
</html>