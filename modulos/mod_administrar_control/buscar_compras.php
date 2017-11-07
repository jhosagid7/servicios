<?php

session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_usuario/usuario.php");
}else {
  if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador" || $_SESSION["privilegio"] == "Usuario"){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control</title>
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
          	<div class="table table-responsive">
          	<?php

/*var_dump($_POST['_comp']);*/

if ( ! isset( $_POST['_comp'] ) AND $_POST['_comp'] === '1' ) {
	header("Location: " . BASE_URL . "app/404.php");
}else{

  $_comp = $_POST['_comp'];
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];
	
	

     $conexion=mysqli_connect("localhost","root","","servicios");
     mysqli_select_db($conexion,"servicios");

    $buscar=mysqli_query($conexion,"select c.id_compra as codigo, pv.nombre_prov, pv.rif_prov, pv.nombre_contacto_prov, pv.cedula_contacto_prov, c.detalle, c.litros, c.fecha from compras  c, proveedores pv WHERE c.fecha BETWEEN '$desde' AND '{$hasta}'");
   	
   	echo"<h1>Ver control</h1><a class='btn btn-danger' href='" . BASE_URL . "modulos/mod_administrar_control/reporte_general_compras_fecha_pdf.php?desde=".$desde."&hasta=".$hasta."&_comp=".$_comp."'>Descargar PDF</a>";
                          echo"<table id='reporte_general'  class='table table-striped table-bordered' cellspacing='0' width='100%'  >
                          <tr>
                          <th>C&oacute;digo</th>
                          <th>Nombre Empresa</th>
                          <th>Rif</th>
                          <th>Nombre Contacto</th>
                          <th>Cedula Contacto</th>
                          <th>Detalle</th>
                          <th>Litros</th>
                          <th>Fecha</th>
                          </tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["codigo"];
                          echo"</td><td>";

                          echo $dato["nombre_prov"];
                          echo"</td><td>";

                          echo $dato["rif_prov"];
                          echo"</td><td>";

                          echo $dato["nombre_contacto_prov"];
                          echo"</td><td>";

                          echo $dato["cedula_contacto_prov"];
                          echo"</td><td>";


                          echo $dato["detalle"];
                          echo"</td><td>";

                          echo $dato["litros"];
                          echo"</td><td>";

                          echo $dato["fecha"];
                          echo"</td>";

                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de compras: $num</h3>";
                          
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                              ";
}
?>
</div><!-- /.box-body -->
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