
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
$nombremedica=$_POST["nombremedica"];
$descripcionmedica=$_POST["descripcionmedica"];
$existenciasmedica=$_POST["existenciasmedica"];
$valormedica=$_POST["valormedica"];
$fechaentrad=$_POST["fechaentrad"];
$fechavencim=$_POST["fechavencim"];

$conexion=mysqli_connect("localhost","root","","farmacia");
mysqli_select_db($conexion,"farmacia");


mysqli_query($conexion,"update inventario set  idmedic='$idmedica', nombremedic='$nombremedica',descripcionmedic='$descripcionmedica',existenciasmedic='$existenciasmedica',valor='$valormedica' ,fechaentra='$fechaentrad',fechavenci='$fechavencim'  where idmedic='$idmedica'");









echo"<h3>El registro ya ha sido Actualizado</h3>";

echo"<p                                                         >
    <a href=http://localhost/farmauni/modulos/mod_productos/archivoproducto.php>Regresar</a>
    ";
	







echo"</center>";


?>
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