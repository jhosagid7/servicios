<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION["nombre"]))
{
    header("Location: http://localhost/farmauni");
}  else {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Farma Uni</title>
        <!-- llamamos hoja de estilos css -->
        <link href="http://localhost/farmauni/css/estilos.css" rel="stylesheet">
       <link type="text/css" href="http://localhost/farmauni/css/bootstrap.css" rel="stylesheet" />
        <link type="text/css" href="http://localhost/farmauni/css/datatables/dataTables.bootstrap.css" rel="stylesheet" />
        
        <!--    ESTILO GENERAL   -->
        
        <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->

        <script type="text/javascript" language="javascript" src="http://localhost/farmauni/js/jquery-ui-1.10.3.js"></script>
        <script type="text/javascript" language="javascript" src="http://localhost/farmauni/js/bootstrap.js"></script>
        
        <!--    JQUERY    -->
        <!--    FORMATO DE TABLAS    -->
        
        

        <script type="text/javascript">
            

           
        </script>
    </head>
    <body>
        <section id="container">
            <header>

            </header>
            <section id="cont-menu">
                <ul id="button">
                    <li><a href="http://localhost/farmauni/modulos/mod_administrador/administrador.php">Inicio</a></li>
                    <li><a href="http://localhost/farmauni/modulos/mod_administrador/registroclientes.php">Clientes</a></li>
                    <li><a href="http://localhost/farmauni/modulos/mod_pedidos/pedidos.php">Pedidos</a></li>
                    <li><a href="http://localhost/farmauni/modulos/mod_productos/archivoproducto.php">Productos</a></li>
                    <li><a href="http://localhost/farmauni/config/salir.php">Cerrar sesion</a></li>
                  
                </ul>
            </section>
            <section id="mainContainer">

            <?php
        echo"<h4> Bienvenido ".$_SESSION["nombre"];
        echo" su permiso es de ".$_SESSION["privilegio"];
        echo "</h4>";
        ?>
        
    

    <article id="contenido">
<?php
echo"<center>";

$idmedica=$_POST["idmedica"];
$conexion=mysqli_connect("localhost","root","","farmacia");
mysqli_select_db($conexion,"farmacia");

$resultadoa=mysqli_query($conexion,"select * from inventario where idmedic='$idmedica'");
if(mysqli_num_rows($resultadoa)>0){

$buscar=mysqli_query($conexion,"select * from inventario where idmedic='$idmedica'");

while($dato=mysqli_fetch_array($buscar))
{
	
?>
<html>
<center>


<form method=POST action=actualizar.php>
<h1>Actualizar Producto</h1><center>

<p> <table width=300 border=0>
  <tr>
    <th scope=row>Codigo:</th>
    <td><input class=text type=num name=idmedica value=<?php echo $dato["idmedic"]; ?> /></td>
  </tr>
  <tr>
    <th scope=row>Nombre producto:</th>
    <td><input class=text type=text name=nombremedica required value=<?php echo $dato["nombremedic"];?> /></td>
  </tr>
  <tr>
    <th scope=row>Descripcion:</th>
    <td><input class=text type=text name=descripcionmedica required/ value=<?php echo $dato["descripcionmedic"];?> /></td>
  </tr>
  <tr>
    <th scope=row>Existencias:</th>
    <td><input class=text type=number name=existenciasmedica required value=<?php echo $dato["existenciasmedic"];?> /></td>
  </tr>
  <tr>
    <th scope=row>valor:</th>
    <td><input class=text type=double name=valormedica required  value=<?php echo $dato["valor"];?>  /></td>
  </tr>
  <tr>
    <th scope=row>Fecha entrada:</th>
    <td><input class=text type=date name=fechaentrad required  value=<?php echo $dato["fechaentra"];?>  /></td>
  </tr>
  <tr>
    <th scope=row>Fecha vencimiento:</th>
    <td><input class=text type=date name=fechavencim required  value=<?php echo $dato["fechavenci"];?>  /></td>
  </tr>
</table>


<p                                                        >                                                                                     
<input name=ingresarmedica type=submit value=OK Acualizar producto/>
<p                                                         ><input type=reset value=Limpiar>
<p                                                         >
    <a href=http://localhost/farmauni/modulos/mod_productos/archivoproducto.php>Regresar</a>
    
</center>

<?php
}
}
else{
	
	
	
echo"<h3>codigo no encontrado</h3>";

echo"<h4>favor inserte codigo existente</h4>";
echo"<a href=http://localhost/farmauni/modulos/mod_productos/archivoproducto.php>Regresar</a>";
	}
?>
</center>
</html>

</article>
    
            </section>
            
            <footer>
                <div> Desarrollado por Baron, Gonzalez y Hernandez febrero 2017 </div> 
            </footer>
        </section>

    </body>
 
</html>
<?php   
}
        ?>




