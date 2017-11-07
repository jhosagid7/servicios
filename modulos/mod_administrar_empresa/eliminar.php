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
        <title>Eliminar empresa</title>
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
$preRif=$_POST["preRif"];
$rif_emp=$preRif.$_POST["rif_emp"];

$conexion=mysqli_connect("localhost","root","","servicio");
mysqli_select_db($conexion,"servicio");





$resultadoe=mysqli_query($conexion,"select * from datos_empresa where rif_emp='$rif_emp'");

if(mysqli_num_rows($resultadoe)>0)


{
mysqli_query($conexion,"delete from datos_empresa where rif_emp='$rif_emp'");

echo"<h3>Sus datos Fueron Eliminados Exitosamente</h3>";
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
}

else
{
echo"<p>";

echo"<h3>codigo no encontrado</h3>";

echo"<h4>favor inserte Rif existente</h4>";
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
}












echo"<p                                                         >
    <a class='btn btn-info href=http://localhost/servicios/modulos/mod_administar_empresa/administrar_empresa.php>Regresar</a>
    ";
	







echo"</center>";


?>

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