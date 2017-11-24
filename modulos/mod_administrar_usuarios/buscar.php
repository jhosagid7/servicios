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

$usuario=$_POST["usuario"];
$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");

$resultadoa=mysqli_query($conexion,"select * from usuario where usuario='$usuario'");
if(mysqli_num_rows($resultadoa)>0){

$buscar=mysqli_query($conexion,"select * from usuario where usuario='$usuario'");

while($dato=mysqli_fetch_array($buscar))
{
	//print_r($dato); exit;
?>
<html>
<center>


<form id='form-actualizar-usuario' method=POST action=actualizar.php>
<h3>Actualizar datos del usuario <?php echo $dato["usuario"];?></h3><center>

<table class='table  table-hover table-condensed dataTable'>
  <tr>
    <th ><label for='nombre'>Nombre del usuario</label></th>
    <td><input name=nombre type='text' class='form-control' id='nombre' placeholder='nombre' value="<?php echo $dato["nombre"];?>" required></td>
  </tr>
  <tr>
  <th scope=row>Usuario:</th>
  <td><input class=form-control type='text' name='usuario' readonly value=<?php echo $dato["usuario"];?> /></td>
  </tr>
  <tr>
  <th scope=row>clave:</th>
  <td><input class=form-control type='password' name='clave' readonly  value=<?php echo $dato["clave"];?>  /></td>
  </tr>
  <tr>
    <th scope=row>Pregunta de seguridad:</th>
    <td><input class=form-control type='text' name='pregunta' value='<?php echo $dato["pregunta"];?>' /></td>
  </tr>
  <tr>
    <th scope=row>Respuesta:</th>
    <td><input class='form-control' type='text' name='respuesta' value=<?php echo $dato["respuesta"];?> /></td>
  </tr>
  <tr>
    <th scope=row>Privilegio:</th>
    <td><select name='privilegio' class='form-control' >
            <option value='<?php echo $dato["privilegio"];?>'><?php echo $dato["privilegio"];?></option>
            <?php 
            if($dato["privilegio"] === 'Administrador'){
              ?>
              <option value='Usuario'>Usuario</option>
              <?php
            }else{
            ?>
            <option value='Administrador'>Administrador</option>
            <?php
            }
            ?>
        </select>
  </tr>
  <tr>

  </tr>
  <tr>

  </tr>
  <tr>
    <th colspan="2" scope=row> 
        <div class='box-footer'>
            <input class='btn btn-primary' id='btn_actualizar_usuario' name='btn_actualizar_usuario' type=submit value='OK Ingresar'/>
            <input class='btn btn-warning' type=reset value=Limpiar>
            <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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
	
	
	
echo"<h3>Usuario no encontrado</h3>";

echo"<h4>Favor inserte usuario existente</h4>";
echo"<a class='btn btn-info href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>";
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