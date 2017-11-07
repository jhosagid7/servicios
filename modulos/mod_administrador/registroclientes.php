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
?>
    
    
    
    
      
       
       <h3>Registrar Clientes</h3>
    <form action="registro.php" method="POST">
   <table>
   <tr>
        <td>
    <label for="nombreuser">Nombre de Usuario:</label>
</td>
<td>
    <input id="nombreuser" class="text" type="text"required name="nombre_usuario">
</td>
    </tr>
    <tr>
    <td>
    <label for="cedula">Cedula de Identidad:</label>
</td>
<td>
    <input id="cedula" class="text" type="text"required name="cedula">
    </td>
    </tr> 
<tr>
<td>
    <label for="edad">Edad:</label>
    </td>
    <td>
    <input id="cedula" class="text" type="text"required name="edad">
    </td>
    </tr>
<tr>
<td>
    <label for="telefono">Telefono:</label>
</td>
<td>

    <input id="telefono" class="text" type="text"required name="telefono">
    </td>
    </tr>
<tr>
<td>
    <label for="direccion">Direccion:</label>
    </td>
    <td>
    <input id="direccion" class="text" type="text"required name="direccion">
    </td>
    </tr>
<tr>
<td>
    <label for="login">Login:</label>
    </td>
    <td>
    <input id="login" class="text" type="text"required name="login">
    </td>
    </tr>
<tr>
<td>
    <label for="clave">Clave:</label>
    </td>
    <td>
    <input id="clave" class="text" type="password"required name="clave">
    </td>
 </tr>   
    </tr>
    <td>
        <label for="correo">Correo:</label>
        </td>
        <td>
    <input id="correo" class="text" type="email"required name="correo">
    </td>
    </tr>


  <tr>  
  <tr>
  <td>
    <input type="submit" value="Registrarse!" name="registrarse">
    </td>
    <tr>
    </form>
    </table>
    </article>
    
            </section>
            
            <footer>
                <div> Desarrollado por Baron, Gonzalez y Hernandez 2017 </div> 
            </footer>
        </section>

    </body>
 
</html>
<?php   
}
        ?>
