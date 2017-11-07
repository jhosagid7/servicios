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
        <title>Ingresar Proveedores</title>
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


$nombre_prov=$_POST["nombre_prov"];
$preRif=$_POST["preRif"];
$rif_prov=$preRif . $_POST["rif_prov"];
$telefono_prov=$_POST["telefono_prov"];
$direccion_prov=$_POST["direccion_prov"];

$sql="insert into proveedor(id_proveedor,nombre_prov,rif_prov,telefono_prov,direccion_prov)

values(null,'$nombre_prov','$rif_prov','$telefono_prov','$direccion_prov')";

/*echo $sql; */

$conexion = mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");


$resultado = mysqli_query($conexion,$sql);

if(!$resultado){//
echo 'error...';
}


?>









<h3>Sus datos Fueron Almacenados Exitosamente</h3>

<p>
    <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php'>Regresar</a>
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