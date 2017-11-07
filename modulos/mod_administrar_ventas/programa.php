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
                          if(empty($_POST["ingresar_ventas"]))
                          {
                            $_POST["ingresar_ventas"]=0;
                          }
                          if(empty($_POST["actualizar_ventas"]))
                          {
                          $_POST["actualizar_ventas"]=0;
                          }
                          if(empty($_POST["ver_ventas"]))
                          {
                          $_POST["ver_ventas"]=0;
                          }

                          $ingresar_ventas=$_POST["ingresar_ventas"];
                          $actualizar_ventas=$_POST["actualizar_ventas"];
                          $ver_ventas=$_POST["ver_ventas"];

                          if($ingresar_ventas)
                          {
                          	
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Ventas</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='tipo_prod'>Tipo de producto</label></th>
                                          <td><input name=tipo_prod type='text' class='form-control' id='tipo_prod' placeholder='Tipo de producto' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>litros:</th>
                                          <td><input class=form-control type=number max=1000 min=200 name=litros value='' placeholder='Cantidad de litros' required/></td>
                                        </tr>
                                        <tr>
                                          <th scope=row>fecha</th>
                                          <td><input class=form-control type=date name=fecha required/></td>
                                        </tr>
                                        <tr>
                                        	<th>
                                        		Productor
                                        	</th>
                                        	<td>
                                        	<select name='id_productor' class='form-control'required>
                                        	<option value=''>Selecctione Productor</option>";
                                          $conexion=mysqli_connect("localhost","root","","servicios");
                                          mysqli_select_db($conexion,"servicios");

                                          $productores=mysqli_query($conexion,"select * from productores");
                                        	while($dato=mysqli_fetch_array($productores))
                          					{
                          						?>
                          						<option value='<?php echo $dato['id_productor']?>'><?php echo "<h3>Empresa: </h3>" . $dato['nombre_empresa_prod']?> - <?php echo "<h3>Nombre: </h3>" .  $dato['nombre_contacto_prod']?> - <?php echo "<h3>Cedula: </h3>" .  $dato['cedula_contacto_prod']?></option>
                          						<?php
                          					}

                                        	echo "</select>
                                        	</td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_ventas' type=submit value='OK Ingresar'/>
                                                  <input class='btn btn-warning' type=reset value=Limpiar>
                                                  <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_ventas/administrar_ventas.php>Regresar</a>
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
                          else if($actualizar_ventas)
                          {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Ventas</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='Rif'>Ingrese N° de Rif</label></th>
                                          <td><input name=rif_prov type='text' class='form-control' id='rif_prov' placeholder='Ingrese N° de Rif' value='' required></td>
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
                          else if($ver_ventas)
                          {
                          $conexion=mysqli_connect("localhost","root","","servicios");
                          mysqli_select_db($conexion,"servicios");

                          $buscar=mysqli_query($conexion,"select * from ventas");

                          echo"<h1>Ver ventas</h1>";
                          echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>C&oacute;digo</th><th>Tipo de producto</th><th>Litros</th><th>Fecha</th><th>id productor</th><th>";

                          while($dato=mysqli_fetch_array($buscar))
                          {
                          echo"<tr><td>";
                          echo $dato["id_ventas"];
                          echo"</td><td>";

                          echo $dato["tipo_prod"];
                          echo"</td><td>";

                          echo $dato["litros"];
                          echo"</td><td>";

                          echo $dato["fecha"];
                          echo"</td><td>";

                          echo $dato["id_productor"];
                          echo"</td><td>";
                          
                          }

                          echo"</table>";
                          $num=mysqli_num_rows($buscar);

                          echo"<h3>Numero de Ventas: $num</h3>";
                          echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_ventas/administrar_ventas.php>Regresar</a>
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