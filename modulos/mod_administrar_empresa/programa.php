<?php
session_start();
require_once ('../../app/Config.php');

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_empresa/usuario.php");
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
                          if(empty($_POST["ingresar_empresa"]))
                          {
                            $_POST["ingresar_empresa"]=0;
                          }
                          if(empty($_POST["eliminar_empresa"]))
                          {
                            $_POST["eliminar_empresa"]=0;
                          }

                          if(empty($_POST["actualizar_empresa"]))
                          {
                          $_POST["actualizar_empresa"]=0;
                          }
                          if(empty($_POST["ver_empresa"]))
                          {
                          $_POST["ver_empresa"]=0;
                          }

                          $ingresar_empresa=$_POST["ingresar_empresa"];
                          $eliminar_empresa=$_POST["eliminar_empresa"];
                          $actualizar_empresa=$_POST["actualizar_empresa"];
                          $ver_empresa=$_POST["ver_empresa"];

                          if($ingresar_empresa)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Empresa</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='nombre_emp'>Nombre de la empresa</label></th>
                                          <td><input name=nombre_emp type='text' class='form-control' id='nombre_emp' placeholder='Nombre de la empresa' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Rif de la empresa:</th>
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
                                                  <input class='form-control' type=number name=rif_emp value='' placeholder='Ejemp. 13021811' /></td>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Direcci&oacute;n:</th>
                                          <td><textarea class=form-control type=text name=direccion_emp required placeholder='Direcci&oacute;n'></textarea></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Telefono de la empresa:</th>
                                          <td><input class=form-control type=number name=telefono_emp required value='' placeholder='Telefono'/></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Correo de la empresa:</th>
                                          <td><input class=form-control type=email name=correo_emp required  value=''  placeholder='Correo de la empresa'/></td>
                                        </tr>
                                        
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_empresa' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>
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
                          else if($eliminar_empresa)
                          {
  echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Eliminar Empresa</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=eliminar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='rif_emp'>Ingrese N° de Rif</label></th>
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
                                                    <input class='form-control' type=number name=rif_emp value='' placeholder='Ejemp. 13021811' /></td>
                                                </div>
                                              </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-danger' name='eliminar_empresa' type=submit value='OK Eliminar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>
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
                          else if($actualizar_empresa)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Empresa</h3>
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
                                                    <input class='form-control' type=number name=rif_emp value='' placeholder='Ejemp. 13021811' /></td>
                                                </div>
                                              </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_empresa' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>
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
                          else if($ver_empresa)
                          {
                          $conexion=mysqli_connect("localhost","root","","servicio");
                          mysqli_select_db($conexion,"servicio");

                          $buscar=mysqli_query($conexion,"select * from datos_empresa");

                          echo"<h1>Datos de la empresa</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'><tr><th>Id</th><th>Nombre de la empresa</th><th>Rif de la empresa</th><th>Direcci&oacute;n</th><th>Telefono de la empresa</th><th>Correo de la empresa</th></tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<td>";
                          echo $dato["id_datos_empresa"];
                          echo"</td><td>";

                          echo $dato["nombre_emp"];
                          echo"</td><td>";

                          echo $dato["rif_emp"];
                          echo"</td><td>";

                          echo $dato["direccion_emp"];
                          echo"</td><td>";

                          echo $dato["telefono_emp"];
                          echo"</td><td>";

                          echo $dato["correo_emp"];
                          echo"</td><td>";

                          
                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de empresas registradas: $num</h3>";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_empresa/administrar_empresa.php>Regresar</a>
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