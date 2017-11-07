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
        <title>Actualizar compras</title>
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

$codigo=$_POST["codigo"];
$conexion=mysqli_connect("localhost","root","","servicios");
mysqli_select_db($conexion,"servicios");
/*$v="select * from prooveedores where rif_prov='$rif_prov'";
echo $v; exit;*/
$resultadoa=mysqli_query($conexion,"select * from compras where codigo='$codigo'");
if(mysqli_num_rows($resultadoa)>0){

$buscar=mysqli_query($conexion,"select * from compras where codigo='$codigo'");

while($dato=mysqli_fetch_array($buscar))
{
	
?>
<html>
<center>


<form method='POST' action='actualizar.php'>
<h3>Actualizar datos de la compra N° <?php echo $dato["codigo"];?></h3><center>

<table class='table  table-hover table-condensed dataTable'>
  <tr>
    <th ><label for='id_compra'>Codigo</label></th>
    <td><input name='id_compra' type='text' class='form-control' id='id_compra' placeholder='codigo< value='<?php echo $dato["id_compra"];?>'' required></td>
  </tr>
  <tr>
    <th scope=row>Detalle:</th>
    <td><input class='form-control' type='text' name='detalle' readonly value='<?php echo $dato["detalle"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Litros:</th>
    <td><textarea class='form-control' type='text' name='litros' required><?php echo $dato["litros"];?></textarea></td>
  </tr>
  <tr>
    <th scope=row>Fecha:</th>
    <td><input class='form-control' type='text' name='fecha' required value='<?php echo $dato["fecha"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Nombre contacto del proveedor:</th>
    <td><input class='form-control' type='text' name='nombre_contacto_prov' required  value='<?php echo $dato["nombre_contacto_prov"];?>'  /></td>
  </tr>
  <tr>
    <th scope=row>Cedula contacto del proveedor:</th>
    <td><input class='form-control' type='text' name='cedula_contacto_prov' required  value='<?php echo $dato["cedula_contacto_prov"];?>'  /></td>
  </tr>
  <tr>
    <th colspan="2" scope=row> 
        <div class='box-footer'>
            <input class='btn btn-primary' name='actualizar_proveedor' type=submit value='OK Ingresar'/>
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



