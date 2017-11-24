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
        <title>Actualizar prooveedores</title>
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
$preRif=$_POST["preRif"];
$rif_prov=$preRif.$_POST["rif_prov"];
$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");

$resultadoa=mysqli_query($conexion,"select * from proveedor where rif_prov='$rif_prov'");
if(mysqli_num_rows($resultadoa)>0){

$buscar=mysqli_query($conexion,"select * from proveedor where rif_prov='$rif_prov'");

while($dato=mysqli_fetch_array($buscar))
{
	
?>
<html>
<center>


<form id='form-actualizar-proveedor' method='POST' action='actualizar.php'>
<h3>Actualizar datos del proveedor <?php echo $dato["nombre_prov"];?></h3><center>

<table class='table  table-hover table-condensed dataTable'>
  <tr>
    <th ><label for='nombre_prov'>Nombre del proveedor</label></th>
    <td><input name='nombre_prov' type='text' class='form-control' id='nombre_prov' placeholder='Nombre del proveedor' value="<?php echo $dato["nombre_prov"];?>" required></td>
  </tr>
  <tr>
    <th scope=row>Rif del proveedor:</th>
    <td><input class='form-control' type='text' name='rif_prov' readonly value='<?php echo $dato["rif_prov"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Telefono del proveedor:</th>
    <td><input class='form-control' type='text' name='telefono_prov' required value='<?php echo $dato["telefono_prov"];?>' /></td>
  </tr>
  <tr>
  <th scope=row>Direcci&oacute;n del proveedor:</th>
  <td><textarea class='form-control' type='text' name='direccion_prov' required><?php echo $dato["direccion_prov"];?></textarea></td>
  </tr>
  <tr>
    <th colspan="2" scope=row> 
        <div class='box-footer'>
            <input class='btn btn-primary' id='btn_actualizar_proveedor' name='btn_actualizar_proveedor' type=submit value='OK Ingresar'/>
            <input class='btn btn-warning' type=reset value=Limpiar>
            <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php'>Regresar</a>
        </div>
    </th>
  </tr>
  
</table>
</center>
</form>


<?php
}
}
else{
	
	
	
echo"<h3>Rif no encontrado</h3>";

echo"<h4>favor inserte Rif existente</h4>";
echo"<a class='btn btn-info href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>";
	}
?>
</center>
</html>

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
<script src="js/programa.js"></script>


