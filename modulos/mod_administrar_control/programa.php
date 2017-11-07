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
                          //echo"<center>";
                          if(empty($_POST["ingresar_control"]))
                          {
                            $_POST["ingresar_control"]=0;
                          }
                          if(empty($_POST["eliminar_control"]))
                          {
                            $_POST["eliminar_control"]=0;
                          }

                          if(empty($_POST["actualizar_control"]))
                          {
                          $_POST["actualizar_control"]=0;
                          }
                          if(empty($_POST["ver_control"]))
                          {
                          $_POST["ver_control"]=0;
                          }

                          $ingresar_control=$_POST["ingresar_control"];
                          $eliminar_control=$_POST["eliminar_control"];
                          $actualizar_control=$_POST["actualizar_control"];
                          $ver_control=$_POST["ver_control"];

                          if($ingresar_control)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de control de la empresa</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='compra'>Compras de la empresa</label></th>
                                          <td><input name=compra type='text' class='form-control' id='compra' placeholder='Compras de la empresa' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Ventas de la empresa:</th>
                                          <td><input class=form-control type=text name=venta value='' placeholder='Ventas de la empresa'/></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Existencia:</th>
                                          <td><input class=form-control type=text name=existencia required placeholder='Existencia'/></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Fecha:</th>
                                          <td><input class=form-control type=date name=fecha required value='' placeholder='Fecha'/></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_control' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                                              </div>
                                          </th>
                                        </tr>
                                        
                                      </table>
                                </form>
                              </div><!-- /.box -->
                          </div>
                      </div>
                  </section></center>";

                           }
                          else if($eliminar_control)
                          {
  echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Eliminar control</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=eliminar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='rif_prod'>Ingrese N° de Rif</label></th>
                                          <td><input name=rif_prod type='text' class='form-control' id='rif_prod' placeholder='Ingrese N° de Rif' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-danger' name='eliminar_control' type=submit value='OK Eliminar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                                              </div>
                                          </th>
                                        </tr>
                                        
                                      </table>
                                </form>
                              </div><!-- /.box -->
                          </div>
                      </div>
                  </section></center>";
                          }
                          else if($actualizar_control)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar control</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='cedula'>Ingrese N° de Rif</label></th>
                                          <td><input name=rif_prod type='text' class='form-control' id='rif_prod' placeholder='Ingrese N° de Rif' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_control' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                                              </div>
                                          </th>
                                        </tr>
                                        
                                      </table>
                                </form>
                              </div><!-- /.box -->
                          </div>
                      </div>
                  </section></center>";
                          }
                          else if($ver_control)
                          {
                          $conexion=mysqli_connect("localhost","root","","servicios");
                          mysqli_select_db($conexion,"servicios");

                          $buscar=mysqli_query($conexion,"select * from control");

                          echo"<h1>Ver control</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>Id</th><th>Compra</th><th>Venta</th><th>Existencia</th><th>Fecha</th></tr>";

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
                          echo"</td><td>";
                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de compras: $num</h3>";
                          echo"<input class='btn btn-primary' name=imprimirver type=button onclick=window.print() value=Imprimir />";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_control/administrar_control.php>Regresar</a>
                              ";
                            



                          }



                          echo"</center>";


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