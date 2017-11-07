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
                          if(empty($_POST["ingresar_usuario"]))
                          {
                            $_POST["ingresar_usuario"]=0;
                          }
                          if(empty($_POST["eliminar_usuario"]))
                          {
                            $_POST["eliminar_usuario"]=0;
                          }

                          if(empty($_POST["actualizar_usuario"]))
                          {
                          $_POST["actualizar_usuario"]=0;
                          }
                          if(empty($_POST["ver_usuario"]))
                          {
                          $_POST["ver_usuario"]=0;
                          }

                          $ingresar_usuario=$_POST["ingresar_usuario"];
                          $eliminar_usuario=$_POST["eliminar_usuario"];
                          $actualizar_usuario=$_POST["actualizar_usuario"];
                          $ver_usuario=$_POST["ver_usuario"];

                          if($ingresar_usuario)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Usuarios</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='nombre'>Nombre: </label></th>
                                          <td><input name=nombre type='text' class='form-control' id='nombre' placeholder='Nombre' value='' required></td>
                                        </tr>
                                        <tr>
                                        <th scope=row>Nombre de usuario:</th>
                                        <td><input class=form-control type=text name=usuario required  value='' placeholder='Usuario'/></td>
                                      </tr>
                                      <tr>
                                        <th scope=row>clave:</th>
                                        <td><input class=form-control type=password name=clave required value=''  placeholder='Clave'/></td>
                                      </tr>
                                        <tr>
                                          <th scope=row>Pregunta de seguridad:</th>
                                          <td><input class=form-control type=text name=pregunta required value='' placeholder='Pregunta secreta' /></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>Respuesta secreta:</th>
                                          <td><input class=form-control type=text name=respuesta required value='' placeholder='Respuesta secreta'/></td>
                                        </tr>
                                        <tr>
                                        <th scope=row>Privilegio:</th>
                                        <td><select name=privilegio class='form-control' required placeholder='Rol'>
                                                <option value=0>Seleccione privilegio...</option>
                                                <option value=1>Administrador</option>
                                                <option value=2>Usuario</option>
                                            </select>
                                      </tr>
                                        
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_usuario' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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
                          else if($eliminar_usuario)
                          {
  echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Eliminar Usuarios</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=eliminar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='usuario'>Ingrese nombre de usuario</label></th>
                                          <td><input name=usuario type='text' class='form-control' id='usuario' placeholder='Ingrese nombre de usuario' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-danger' name='eliminar_usuario' type=submit value='OK Eliminar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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
                          else if($actualizar_usuario)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Usuarios</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='usuario'>Ingrese nombre de usuario</label></th>
                                          <td><input name=usuario type='text' class='form-control' id='usuario' placeholder='Ingrese nombre de usuario' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_usuario' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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
                          else if($ver_usuario)
                          {
                          $conexion=mysqli_connect("localhost","root","","servicio");
                          mysqli_select_db($conexion,"servicio");

                          $buscar=mysqli_query($conexion,"select * from usuario");

                          echo"<h1>Ver Usuarios</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>Id</th><th>Nombre</th><th>Usuario</th><th>Clave</th><th>Pregunta</th><th>Respuesta</th><th>Privilegio</th></tr>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["id_usuario"];
                          echo"</td><td>";

                          echo $dato["nombre"];
                          echo"</td><td>";

                          echo $dato["usuario"];
                          echo"</td><td>";

                          echo $dato["clave"];
                          echo"</td><td>";

                          echo $dato["pregunta"];
                          echo"</td><td>";

                          echo $dato["respuesta"];
                          echo"</td><td>";

                          echo $dato["privilegio"];
                          echo"</td><td>";
                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de Usuarios: $num</h3>";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_usuarios/administrar_usuarios.php>Regresar</a>
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