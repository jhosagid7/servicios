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
        <title>Actualizar empresa</title>
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
$rif_emp=$preRif.$_POST["rif_emp"];
$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");
/* $v="select * from datos_empresa where rif_emp='$rif_emp'";
echo $v; exit; */
$resultadoa=mysqli_query($conexion,"select * from datos_empresa where rif_emp='$rif_emp'");
if(mysqli_num_rows($resultadoa)>0){

$buscar=mysqli_query($conexion,"select * from datos_empresa where rif_emp='$rif_emp'");

while($dato=mysqli_fetch_array($buscar))
{
	
?>
<html>
<center>


<form id='form-actualizar-empresa' method='POST' action='actualizar.php'>
<h3>Actualizar datos de la empresa <?php echo $dato["nombre_emp"];?></h3><center>

<table class='table  table-hover table-condensed dataTable'>
  <tr>
    <th ><label for='nombre_emp'>Nombre de la empresa</label></th>
    <td><input name='nombre_emp' type='text' class='form-control' id='nombre_emp' placeholder='Nombre de la empresa' value="<?php echo $dato["nombre_emp"];?>" required></td>
  </tr>
  <tr>
    <th scope=row>Rif de la empresa:</th>
    <td><input class='form-control' type='text' name='rif_emp' readonly value='<?php echo $dato["rif_emp"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Direcci&oacute;n:</th>
    <td><textarea class='form-control' type='text' name='direccion_emp' required><?php echo $dato["direccion_emp"];?></textarea></td>
  </tr>
  <tr>
    <th scope=row>Telefono:</th>
    <td><input class='form-control' type='text' name='telefono_emp' required value='<?php echo $dato["telefono_emp"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Correo:</th>
    <td><input class='form-control' type='text' name='correo_emp' required  value='<?php echo $dato["correo_emp"];?>'  /></td>
  </tr>
  
  <tr>
    <th colspan="2" scope=row> 
        <div class='box-footer'>
            <input class='btn btn-primary' id='btn_actualizar_empresa' name='btn_actualizar_empresa' type=submit value='OK Ingresar'/>
            <input class='btn btn-warning' type=reset value=Limpiar>
            <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php'>Regresar</a>
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
echo"<a class='btn btn-info href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>";
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
