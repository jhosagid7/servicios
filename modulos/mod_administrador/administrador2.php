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
        <?php require_once('../../header.php');?>
         <!-- Left side column. contains the logo and sidebar -->
            <?php require_once('menu_left.php');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <?php require_once('../../sidebar_right.php');?>

                <!-- Main content -->
                <section class="content">


                </section><!-- /.content -->
            <?php require_once('../../footer.php');?>

            <?php   
    }else{
         header("Location: " . BASE_URL . "app/404.php");
    }
}      ?>