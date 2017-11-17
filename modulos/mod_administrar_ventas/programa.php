<?php
session_start();
require_once '../../app/Config.php';

if (!isset($_SESSION["nombre"])) {
    header("Location: ../mod_usuario/usuario.php");
} else {
    if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador" || $_SESSION["privilegio"] == "Usuario") {
    ?>

  <!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema</title>
        <!-- llamamos hoja de estilos css -->
        <?php include_once '../../app/Header_admin.php'; ?>
        <script type="text/javascript">
            
        </script>
    </head>
    <body>
     <!-- Main content -->
        <section class="content">
            <section id="container">
                <header>
                </header>
                <?php include_once '../../modulos/mod_administrador/menu_administrador.php'; ?>
                    <section id="mainContainer">
                      <article id="contenido">
                        <?php
                          //echo"<center>";
                        if (empty($_POST["ingresar_ventas"])) {
                            $_POST["ingresar_ventas"]=0;
                        }
                        if (empty($_POST["actualizar_ventas"])) {
                            $_POST["actualizar_ventas"]=0;
                        }
                        if (empty($_POST["ver_ventas"])) {
                            $_POST["ver_ventas"]=0;
                        }

                          $ingresar_ventas=$_POST["ingresar_ventas"];
                          $actualizar_ventas=$_POST["actualizar_ventas"];
                          $ver_ventas=$_POST["ver_ventas"];

                        if ($ingresar_ventas) {
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
                                <form id='form-ingresar-ventas' role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
								<tr>
									<td colspan='2'>
									<h3><b>Datos del Productor</b></h3>
									<select class='form-control' name='prod_select' id='prod_select'>
									</select>
									</td>
								</tr>   
								<div id='datos_prov'> 
								<tr>
								    <th ><label for='nombre_empresa_prod'>Nombre empresa</label></th>
									<td><input id='nombre_empresa_prod' name='nombre_empresa_prod' type='text' class='form-control' id='nombre_prov' placeholder='Nombre empresa' value='' ></td>
									</tr>
									<tr>
									<th ><label for='Rif'>Ingrese N° de Rif</label></th>
										<td>
											<div id='divPreRif' class='col-md-3'>
												<select class='form-control' name='preRif' id='preRif'>
													<option value='V-'>V-</option>
													<option value='E-'>E-</option>
													<option value='J-'>J-</option>
													<option value='G-'>G-</option>
													<option value='P-'>P-</option>
												</select>
											</div>
											<div id='inpRif' class='col-md-9'>
												<input id='rif_prod' class='form-control' type='text' name='rif_prod' value='' placeholder='Ejemp. 13021811' /></td>
											</div>
										</td>
									</tr>
									<tr>
										<th scope='row'>Telefono</th>
										<td><input id='telefono_prod' class='form-control' type='text' name='telefono_prod'/></td>
									</tr>
									<tr>
										<th>
										Dirección
										</th>
										<td>
										<textarea id='direccion_prod' class='form-control' name='direccion_prod'></textarea>
										</td>
									</tr>
									</div>
									<tr>
										<td colspan='2'>
											<h3><b>Datos de Venta</b></h3>
											
										</td>
												
									</tr> 
									<tr>
										<th scope='row'>
										Producto
										<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal'><i class='fa fa-search' aria-hidden='true'></i></button>
										</th>
										<td><input id='producto' class='form-control' type='text' name='producto'/></td>
									</tr>
									<tr>
										<th scope='row'>Precio Unitario</th>
										<td><input id='precio_unit' class='form-control' type='text' name='precio_unit'/></td>
									</tr>
									<tr>
										<th scope='row'>Cantidad</th>
										<td><input id='cantidad' class='form-control' type='text' name='cantidad'/>
										<div id='mensaje_error_cantidad' class='alert alert-danger' hidden></div>
										</td>
									</tr>
									<tr>
										<th scope='row'>Monto de la venta</th>
										<td><input id='monto_total_venta' class='form-control' type='text' name='monto_total_venta'/></td>
									</tr>
									<tr>
										<th colspan='2' scope=row> 
										<div class='box-footer'>
											<input class='btn btn-primary' id='btn_ingresar_ventas' name='btn_ingresar_ventas' type=submit value='OK Ingresar'/>
											<input class='btn btn-warning' type=reset value=Limpiar>
											<a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_compras/administrar_compras.php>Regresar</a>
										</div>
									</th>
									</tr>
									</table>
                                </form>
                              </div><!-- /.box -->
                          </div>
                      </div>
                  </section></center>";
                        } elseif ($actualizar_ventas) {
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
                        } elseif ($ver_ventas) {
                            $conexion=mysqli_connect("localhost", "root", "", "servicios");
                            mysqli_select_db($conexion, "servicios");

                            $buscar=mysqli_query($conexion, "select * from ventas");

                            echo"<h1>Ver ventas</h1>";
                            echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>C&oacute;digo</th><th>Tipo de producto</th><th>Litros</th><th>Fecha</th><th>id productor</th><th>";

                            while ($dato=mysqli_fetch_array($buscar)) {
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
  <script src="js/programa.js"></script>
        <?php
    } else {
        header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
		<div id='mensaje_error' class="alert alert-danger" hidden></div>
		<div id='mensaje_warning' class="alert alert-warning" hidden></div>
        <select class='form-control' name='produ_select' id='produ_select'></select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
