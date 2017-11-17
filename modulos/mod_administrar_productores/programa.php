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
                        $empty = 1;
                          //echo"<center>";
                          if(empty($_POST["ingresar_productor"]))
                          {
                            $_POST["ingresar_productor"]=0;
                          }
                          if(empty($_POST["eliminar_productor"]))
                          {
                            $_POST["eliminar_productor"]=0;
                          }

                          if(empty($_POST["actualizar_productor"]))
                          {
                          $_POST["actualizar_productor"]=0;
                          }
                          if(empty($_POST["ver_productor"]))
                          {
                          $_POST["ver_productor"]=0;
                          }

                          $ingresar_productor=$_POST["ingresar_productor"];
                          $eliminar_productor=$_POST["eliminar_productor"];
                          $actualizar_productor=$_POST["actualizar_productor"];
                          $ver_productor=$_POST["ver_productor"];

                          if($ingresar_productor)
                          {
                            $empty = 0;
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Productor</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form id='form-ingresar-productor' role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='nombre_empresa_prod'>Nombre de la empresa</label></th>
                                          <td><input name=nombre_empresa_prod type='text' class='form-control' id='nombre_empresa_prod' placeholder='Nombre de la empresa' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Rif del productor:</th>
                                            <td>
                                                <div class='col-md-3'>
                                                    <select class='form-control' name='preRif' id='preRif'>
                                                        <option value='V-'>V</option>
                                                        <option value='E-'>E</option>
                                                        <option value='J-'>J</option>
                                                        <option value='G-'>G</option>
                                                        <option value='P-'>P</option>
                                                    </select>
                                                </div>
                                                <div class='col-md-9'>
                                                    <input class='form-control' type=number  name=rif_prod placeholder='Rif del productor' /></td>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Telefono del productor:</th>
                                          <td><input class=form-control type=number name=telefono_prod required value='' placeholder='Telefono del productor'/></td>
										</tr>
										<tr>
										<th>
										Dirección
										</th>
										<td>
										<textarea id='direccion_prod' class='form-control' name='direccion_prod'></textarea>
										</td>
									</tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' id='btn_ingresar_productor' name='btn_ingresar_productor' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>
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
                          else if($eliminar_productor)
                          {
                            $empty = 0;
  echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Eliminar Productor</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=eliminar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='rif_prod'>Ingrese N° de Rif</label></th>
                                          <td>
                                                <div class='col-md-3'>
                                                    <select class='form-control' name='preRif' id='preRif'>
                                                        <option value='V-'>V</option>
                                                        <option value='E-'>E</option>
                                                        <option value='J-'>J</option>
                                                        <option value='G-'>G</option>
                                                        <option value='P-'>P</option>
                                                    </select>
                                                </div>
                                                <div class='col-md-9'>
                                                    <input class='form-control' type=number name=rif_prod value='' placeholder='Rif' /></td>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-danger' name='eliminar_productor' type=submit value='OK Eliminar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>
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
                          else if($actualizar_productor)
                          {
                            $empty = 0;
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Productores</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='rif_prod'>Ingrese N° de Rif</label></th>
                                          <td>
                                                <div class='col-md-3'>
                                                        <select class='form-control' name='preRif' id='preRif'>
                                                            <option value='V-'>V</option>
                                                            <option value='E-'>E</option>
                                                            <option value='J-'>J</option>
                                                            <option value='G-'>G</option>
                                                            <option value='P-'>P</option>
                                                        </select>
                                                </div>
                                                <div class='col-md-9'>
                                                    <input class='form-control' type=number name=rif_prod value='' placeholder='Rif del productor' /></td>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_productor' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>
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
                          else if($ver_productor)
                          {
                            $empty = 0;
                          $conexion=mysqli_connect("localhost","root","","servicio");
                          mysqli_select_db($conexion,"servicio");

                          $buscar=mysqli_query($conexion,"select * from productor");

                          echo"<h1>Ver Productores</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>Id</th><th>Nombre de la empresa</th><th>Rif del productor</th><th>Telefono del productor</th></tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["id_productor"];
                          echo"</td><td>";

                          echo $dato["nombre_empresa_prod"];
                          echo"</td><td>";

                          echo $dato["rif_prod"];
                          echo"</td><td>";

                          echo $dato["telefono_prod"];
                          echo"</td><td>";

                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de Productores: $num</h3>";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>
                              ";
                            



                          }else if($empty)
                          {
                              ?>
                              <center>
                            <h1>Sistema de administracion de <?php echo APP_NAME; ?></h1>
                        </center>
                              <?php
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
                
    <script src="js/programa.js"></script>    
    </body>

 <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>