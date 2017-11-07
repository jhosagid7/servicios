<?php
session_start();
require_once ('../../app/Config.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_SESSION["nombre"]))
{
    
    header("Location: ../mod_usuario/usuario.php");
}  else {
    if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador"){
        
                          
                          
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <li><a href="http://localhost/servicios/modulos/mod_administrador/administrador.php">Inicio</a></li>
                     <li><a href="http://localhost/servicios/modulos/mod_administrador/registroclientes.php">Clientes</a></li>
                    <li><a href="http://localhost/servicios/modulos/mod_pedidos/pedidos.php">Pedidos</a></li>
                    <li><a href="http://localhost/servicios/modulos/mod_productos/archivoproducto.php">Productos</a></li>
                    <li><a href="http://localhost/servicios/app/salir.php">Cerrar sesion</a></li>
                  
                </ul>
            </section>
            <section id="mainContainer">

             <?php
        echo"<h4> Bienvenido ".$_SESSION["nombre"];
        echo" su permiso es de ".$_SESSION["privilegio"];
        echo "</h4>";
        ?>
        
    
        
        
    

    <article id="contenido">
    <h1>Sistama de administracion</h1>
            </section>
            
            <footer>
                <div> Desarrollado por Baron, Gonzalez y Hernandez febrero 2017 </div> 
            </footer>
        </section>

    </body>
 <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>
</html>