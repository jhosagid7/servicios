<?php
session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_proveedor/usuario.php");
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
                          if(empty($_POST["ingresar_proveedor"]))
                          {
                            $_POST["ingresar_proveedor"]=0;
                          }
                          if(empty($_POST["eliminar_proveedor"]))
                          {
                            $_POST["eliminar_proveedor"]=0;
                          }

                          if(empty($_POST["actualizar_proveedor"]))
                          {
                          $_POST["actualizar_proveedor"]=0;
                          }
                          if(empty($_POST["ver_proveedor"]))
                          {
                          $_POST["ver_proveedor"]=0;
                          }

                          $ingresar_proveedor=$_POST["ingresar_proveedor"];
                          $eliminar_proveedor=$_POST["eliminar_proveedor"];
                          $actualizar_proveedor=$_POST["actualizar_proveedor"];
                          $ver_proveedor=$_POST["ver_proveedor"];

                          if($ingresar_proveedor)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Proveedor</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='nombre_prov'>Nombre del proveedor</label></th>
                                          <td><input name=nombre_prov type='text' class='form-control' id='nombre_prov' placeholder='Nombre del proveedor' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Rif:</th>
                                          <td>
                                              <div class='col-md-3'><select class='form-control' name='preRif' id='preRif'>
                                                    <option value='V-'>V</option>
                                                    <option value='E-'>E</option>
                                                    <option value='J-'>J</option>
                                                    <option value='G-'>G</option>
                                                    <option value='P-'>P</option>
                                                </select>
                                                </div>
                                                <div class='col-md-9'>
                                                        <input class='form-control' type=number name=rif_prov value='' placeholder='Rif' /></td>
                                                </div>
                                          
                                          
                                        </tr>
                                        <tr>
                                        <th scope=row>Telefono:</th>
                                        <td><input class=form-control type=number name=telefono_prov required value='' placeholder='Telefono'/></td>
                                        </tr>
                                        <tr>
                                        <th scope=row>Direcci&oacute;n:</th>
                                        <td><textarea class=form-control type=text name=direccion_prov required placeholder='Direcci&oacute;n'></textarea></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_proveedor' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>
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
                          else if($eliminar_proveedor)
                          {
  echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Eliminar Proveedor</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=eliminar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='rif_prov'>Ingrese N° de Rif</label></th>
                                          <td> 
                                              <div class='col-md-3'>
                                                  <select class='form-control' name='preRif' id='preRif'>
                                                        <option value='V-'>V-</option>
                                                        <option value='E-'>E-</option>
                                                        <option value='J-'>J-</option>
                                                        <option value='G-'>G-</option>
                                                        <option value='P-'>P-</option>
                                                    </select>
                                                </div>
                                                <div class='col-md-9'>
                                                <input class='form-control' type=number name=rif_prov value='' placeholder='Ejemp. 13021811' /></td>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-danger' name='eliminar_proveedor' type=submit value='OK Eliminar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>
                                              </div>
                                          </th>
                                        </tr>
                                        
                                      </table>
                                </form
                              </div><!-- /.box -->
                          </div>
                      </div>
                  </section></center>";
                          }
                          else if($actualizar_proveedor)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Proveedores</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='Rif'>Ingrese N° de Rif</label></th>
                                            <td>
                                                    <div class='col-md-3'>
                                                            <select class='form-control' name='preRif' id='preRif'>
                                                                  <option value='V-'>V-</option>
                                                                  <option value='E-'>E-</option>
                                                                  <option value='J-'>J-</option>
                                                                  <option value='G-'>G-</option>
                                                                  <option value='P-'>P-</option>
                                                              </select>
                                                          </div>
                                                          <div class='col-md-9'>
                                                              <input class='form-control' type=number name=rif_prov value='' placeholder='Ejemp. 13021811' /></td>
                                                          </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_proveedor' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>
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
                          else if($ver_proveedor)
                          {
                          $conexion=mysqli_connect("localhost","root","","servicio");
                          mysqli_select_db($conexion,"servicio");

                          $buscar=mysqli_query($conexion,"select * from Proveedor");

                          echo"<h1>Ver Proveedores</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>Id</th><th>Nombre del proveedor</th><th>Rif del proveedor</th><th>Telefono del proveedor</th><th>Direcci&oacute;n del proveedor</th></tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["id_proveedor"];
                          echo"</td><td>";

                          echo $dato["nombre_prov"];
                          echo"</td><td>";

                          echo $dato["rif_prov"];
                          echo"</td><td>";

                          echo $dato["telefono_prov"];
                          echo"</td><td>";

                          echo $dato["direccion_prov"];
                          echo"</td><td>";

                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de Proveedores: $num</h3>";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_proveedores/administrar_proveedores.php>Regresar</a>
                              ";
                            



                          }



                          echo"</center>";


                          ?>
                        </article>
                        <footer>
                            <div></div> 
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