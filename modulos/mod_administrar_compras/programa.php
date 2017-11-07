<?php
session_start();
include_once '../../app/Config.php';

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
                        if (empty($_POST["ingresar_compras"])) {
                            $_POST["ingresar_compras"]=0;
                        }
                        if (empty($_POST["actualizar_compras"])) {
                            $_POST["actualizar_compras"]=0;
                        }
                        if (empty($_POST["ver_compras"])) {
                            $_POST["ver_compras"]=0;
                        }

                          $ingresar_compras=$_POST["ingresar_compras"];
                          $actualizar_compras=$_POST["actualizar_compras"];
                          $ver_compras=$_POST["ver_compras"];

                        if ($ingresar_compras) {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registro de Compras</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=ingresar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                    <tr>
                                        <td colspan='2'>
                                                <h3><b>Datos del Proveedor</b></h3>
                                                <select class='form-control' name='prov_select' id='prov_select'>
                                                        
                                                    </select>
                                        </td>
                                            
									</tr>   
									<div id='datos_prov'> 
                                    <tr>
                                          <th ><label for='nombre_prov'>Nombre del proveedor</label></th>
                                          <td><input id='nombre_prov' name='nombre_prov' type='text' class='form-control' id='nombre_prov' placeholder='Nombre del proveedor' value='' ></td>
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
                                                                    <input id='rif_prov' class='form-control' type='text' name='rif_prov' value='' placeholder='Ejemp. 13021811' /></td>
                                                                </div>
                                                  </td>
                                              </tr>
                                        <tr>
                                          <th scope='row'>Telefono</th>
                                          <td><input id='telefono_prov' class='form-control' type='text' name='telefono_prov'/></td>
                                        </tr>
                                        <tr>
                                          <th>
                                          Dirección
                                          </th>
                                          <td>
                                            <textarea id='direccion_prov' class='form-control' name='direccion_prov'></textarea>
                                          </td>
										</tr>
										</div>
                                        <tr>
                                                <td colspan='2'>
                                                        <h3><b>Datos de Combra</b></h3>
                                                        <select class='form-control' name='producto_select' id='producto_select'>
                                                                <option value='0'>Selecciones Producto</option>
                                                                <option value='E-'>Diesel</option>
                                                                <option value='J-'>Gasolina</option>
                                                                
                                                            </select>
                                                </td>
                                                    
                                            </tr> 
                                            <tr>
                                                    <th scope='row'>N° de factura de compra</th>
                                                    <td><input id='num_factura' class='form-control' type='text' name='num_factura'/></td>
                                                  </tr>
                                            <tr>
                                                    <th scope='row'>Producto</th>
                                                    <td><input id='producto' class='form-control' type='text' name='producto'/></td>
                                                  </tr>
                                                  <tr>
                                                        <th scope='row'>Precio Unitario</th>
                                                        <td><input id='precio_unit' class='form-control' type='text' name='precio_unit'/></td>
                                                      </tr>
                                                      <tr>
                                                            <th scope='row'>Precio Venta</th>
                                                            <td><input id='precio_venta' class='form-control' type='text' name='precio_venta'/></td>
                                                          </tr>
                                                          <tr>
                                                                <th scope='row'>Cantidad</th>
                                                                <td><input id='cantidad' class='form-control' type='text' name='cantidad'/></td>
                                                              </tr>
                                                              <tr>
                                                                    <th scope='row'>Monto de la compra</th>
                                                                    <td><input id='monto_total_compra' class='form-control' type='text' name='monto_total_compra'/></td>
                                                                  </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='ingresar_compras' type=submit value='OK Ingresar'/>
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
                        } elseif ($actualizar_compras) {
                            echo "<center><section class='content'>
                    <div class='row'>
                        <!-- left column -->
                        <div class='col-md-12'>
                            <!-- general form elements -->
                            <div class='box box-primary'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Actualizar Compras</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role='form' method=POST action=buscar.php>
                                    <table class='table  table-hover table-condensed dataTable'>
                                        <tr>
                                          <th ><label for='Rif'>Ingrese N° de C&oacute;digo</label></th>
                                          <td><input name=codigo type='text' class='form-control' id='codigo' placeholder='Ingrese N° de Codigo' value='' required></td>
                                        </tr>
                                        <tr>
                                          <th colspan='2' scope=row> 
                                              <div class='box-footer'>
                                                  <input class='btn btn-primary' name='buscar_proveedor' type=submit value='OK Ingresar'/>
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
                        } elseif ($ver_compras) {
                            $conexion=mysqli_connect("localhost", "root", "", "servicios");
                            mysqli_select_db($conexion, "servicios");

                            $buscar=mysqli_query($conexion, "select * from compras");

                            echo"<h1>Ver compras</h1>";
                            echo"<table  class='table  table-hover table-condensed dataTable'  ><tr><th>C&oacute;digo</th><th>Detalles</th><th>Litros</th><th>Fecha</th><th>id proveedor</th><th>";

                            while ($dato=mysqli_fetch_array($buscar)) {
                                echo"<tr><td>";
                                echo $dato["id_compra"];
                                echo"</td><td>";

                                echo $dato["detalle"];
                                echo"</td><td>";

                                echo $dato["litros"];
                                echo"</td><td>";

                                echo $dato["fecha"];
                                echo"</td><td>";

                                echo $dato["id_proveedor"];
                                echo"</td><td>";
                            }

                            echo"</table>";
                            $num=mysqli_num_rows($buscar);

                            echo"<h3>Numero de Compras: $num</h3>";
                            echo"<p                                                         >
                              <a class='btn btn-info' href=http://localhost/servicios/modulos/mod_administrar_compras/administrar_compras.php>Regresar</a>
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
            <script src="js/programa.js"></script>      
        
      </body>

        <?php
    } else {
        header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>
