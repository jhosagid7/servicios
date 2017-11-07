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
        <title>Ingresar Empresa</title>
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

$conexion = mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");

/*$idmedica=$_POST["idmedica"];*/
$nombre_emp=$_POST["nombre_emp"];
$preRif=$_POST["preRif"];
$rif_emp=$preRif.$_POST["rif_emp"];
$direccion_emp=$_POST["direccion_emp"];
$telefono_emp=$_POST["telefono_emp"];
$correo_emp=$_POST["correo_emp"];


$reg = "select * from datos_empresa";
$registros = mysqli_query($conexion,$reg);



if(mysqli_num_rows($registros)){
  echo "<b style='color:red'>Solo se puede registrar una sola empresa en el sistema...</b>";
  echo"
  <p>&nbsp;</p>
              <p>&nbsp;</p> 
  <p>
    <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php'>Regresar</a>
</p>
</article>
        
        </section>
                          
      <footer>
          <div></div> 
      </footer>
      </section>
    </body>
";

}else{


$sql="insert into datos_empresa(id_datos_empresa,nombre_emp,rif_emp,direccion_emp,telefono_emp,correo_emp)

values(null,'$nombre_emp','$rif_emp','$direccion_emp','$telefono_emp','$correo_emp')";

/*echo $sql; 
*/



$resultado = mysqli_query($conexion,$sql);

if(!$resultado){//
echo 'errror...';
}


?>









<h3>Sus datos Fueron Almacenados Exitosamente</h3>

<p>
    <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php'>Regresar</a>
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
    } 
    }else{
      header("Location: " . BASE_URL . "app/404.php");
    }
  }  ?>
</html>