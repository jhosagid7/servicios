<?php
session_start();
require_once ('../../app/Config.php');
include('../..//libs/mpdf60/mpdf.php');
$mpdf=new mPDF();

if(!isset($_SESSION["nombre"]))
{
  header("Location: ../mod_usuario/usuario.php");
}else {
if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador" || $_SESSION["privilegio"] == "Usuario"){





                      
                           $conexion=mysqli_connect("localhost","root","","servicios");
                          mysqli_select_db($conexion,"servicios");

                          $buscar=mysqli_query($conexion,"select c.id_compra as codigo, pv.nombre_prov, pv.rif_prov, pv.nombre_contacto_prov, pv.cedula_contacto_prov, c.detalle, c.litros, c.fecha from compras  c, proveedores pv");

                          $html = utf8_encode("<h1>Reporte general de compras</h1>
                          <table id='reporte_general'  class='table table-striped table-bordered' cellspacing='0' width='100%' >
                          <thead >
                          <tr>
                          <th class='blue'>Codigo</th>
                          <th>Nombre empresa</th>
                          <th>Rif</th>
                          <th>Nombre de contacto</th>
                          <th>Cedula</th>
                          <th>Detalles</th>
                          <th>Litros</th>
                          <th>Fecha</th>
                          </tr></thead>");


                          while($dato=mysqli_fetch_array($buscar))
                          {
                          $html .= utf8_encode(
                            "<tbody><tr>
                              <td style='text-aling: center;'>
                                ".$dato["codigo"]."
                              </td>
                              <td>
                                ".$dato["nombre_prov"]." 
                              </td>
                              <td>
                                ".$dato["rif_prov"]."
                              </td>
                              <td>
                                ". $dato["nombre_contacto_prov"]."
                              </td>
                              <td>
                                ". $dato["cedula_contacto_prov"]."
                              </td>
                              <td>
                                ".$dato["detalle"]."
                              </td>
                              <td>
                                ". $dato["litros"]."
                              </td>
                              <td>
                                ". $dato["fecha"]."
                              </td>
                            </tr>"
                          );
                          }

                          $html .= utf8_encode("</tbody></table>");
                          $num=mysqli_num_rows($buscar);

                          $html .= utf8_encode("<h3>Numero de compras: $num</h3>");
                          
                            

 # --- \\ PARAMETROS PARA GENERAR EL DOCUMENTO MPDF // --- #<br>
   
    // Se especifica el modo del nuevo documento <br>
    $mode=''; // (Blanco para establecer el valor por defecto)<br>
    /* Se especifica un tamaño de página predefinido o como un arreglo<br>
     * de ancho y altura en milímetros */   
    /*$format=array(180,150);*/
    // Establecemos el tamaño de la fuente por defecto para el documento (pt)<br>
    $font_s=''; // (Blanco para establecer el valor por defecto)<br>
    // Establecemos el tipo de letra familia a aplicar en el documento<br>
    $font_f=''; // (Blanco para establecer el valor por defecto)<br>
    // Establecemos los márgenes de las páginas en milímetros para el documento<br>
    $marg_l=5;  // Margen izquierdo<br>
    $marg_r=5;  // Margen derecho<br>
    $marg_t=30; // Margen superior<br>
    $marg_b=10; // Margen inferior<br>
    $marg_h=5;  // Margen de la cabecera de la página<br>
    $marg_f=5;  // Margen del pie de página<br>
    
    # --- \\ AQUÍ APLICAMOS MPDF // --- #<br>
    
    // Creamos un objeto de clase mPDF para crear el documento.<br>
    /*$mpdf=new mPDF($mode,$format ,$font_s,$font_f,$marg_l,$marg_r,$marg_t,$marg_b,$marg_h,$marg_f);*/
    // Establecemos la línea límite de la cabecera por defecto<br>
    $mpdf->defaultheaderline=1;
    // Establecemos la línea límite del pie de página por defecto<br>
    $mpdf->defaultfooterline=1;
    // Definimos la cabecera del documento mediante la función SetHeader<br>
    $mpdf->SetHeader($Header);
    // Definimos el pie de página del documento mediante la función SetFooter<br>
    $mpdf->SetFooter('PÁGINA: {PAGENO}');
    // Establecemos la hoja de estilo en cascada a utilizar en el documento<br>
    $stylesheet = file_get_contents(BASE_URL.'plantilla/css/bootstrap.min.css');
    $mpdf->WriteHTML($stylesheet, 1);
    // Definimos el cuerpo del documento mediante la función WriteHTML<br>
    $mpdf->WriteHTML($html,2);
    // Generamos el documento PDF<br>
    /*$mpdf->Output('Documento-Prueba.pdf','I');*/
    $mpdf->Output('Documento-Prueba.pdf','D');

                         

                        /*$mpdf->WriteHTML($html);
*/
                        // Genera el fichero y fuerza la descarga
                       /* $mpdf->Output('nombre.pdf','D'); exit;*/
                          ?>

                      

 <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>