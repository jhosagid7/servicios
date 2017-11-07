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
        <title>Sistema</title>
        <!-- llamamos hoja de estilos css -->
        <?php require_once('../../app/Header_admin.php'); ?>
        <script type="text/javascript">
            
        </script>
    </head>
    <body>
     <!-- Main content -->
        <section class="content">
            <section id="container">
                <header>
                </header>
                <?php require_once('../../modulos/mod_administrador/menu_administrador.php'); ?>
                    <section id="mainContainer">
                      <article id="contenido">
                      <?php
                           $conexion=mysqli_connect("localhost","root","","servicios");
                          mysqli_select_db($conexion,"servicios");

                          $buscar=mysqli_query($conexion,"select * from control");

                          echo"<h1>Ver control</h1>  <a class='btn btn-danger small' href='reporte_general_pdf.php' >Descargar PDF</a>";
                          echo"<table id='reporte_general'  class='table table-striped table-bordered' cellspacing='0' width='100%' >
                          <tr>
                          <th>Id</th>
                          <th>Compra</th>
                          <th>Venta</th>
                          <th>Existencia</th>
                          <th>Fecha</th>
                          
                          </tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["id_control"];
                          echo"</td><td>";

                          echo $dato["compra"];
                          echo"</td><td>";

                          echo $dato["venta"];
                          echo"</td><td>";

                          echo $dato["existencia"];
                          echo"</td><td>";

                          echo $dato["fecha"];
                          echo"</td></tr>";
                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                              ";
                            



                         
                          ?>

                      </article>
                        <footer>
                            <div> Desarrollado por Baron, Gonzalez y Hernandez agosto 2017 </div> 
                        </footer>
                    </section>
                </section>

        </section>
                
        
    </body>

 <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>

<script ;>
  
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#reporte_general').DataTable();
} );  
</script>