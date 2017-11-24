<?php
session_start();
require_once ('../../app/Config.php');

if (!isset($_SESSION["nombre"])) {
    header("Location: ../mod_usuario/usuario.php");
} else {
    if (isset($_SESSION["privilegio"]) and  $_SESSION["privilegio"] == "Administrador") {
    ?>

  <!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar productores</title>
        <!-- llamamos hoja de estilos css -->
        <?php require_once('../../app/Header_admin.php'); ?>
        <script type="text/javascript">
            
        </script>
    </head>
    <body>
      <section id="container">
      <header>

      </header>
        <?php require_once('../mod_administrador/menu_administrador.php'); ?>
        <section id="mainContainer">
          <article id="contenido">
<?php
  echo"<center>";
  $preRif=$_POST["preRif"];
  $rif_prod=$preRif.$_POST["rif_prod"];
  $conexion=mysqli_connect("localhost", "root", "", "servicio");
  mysqli_select_db($conexion, "servicio");

  $resultadoa=mysqli_query($conexion, "select * from productor where rif_prod='$rif_prod'");
if (mysqli_num_rows($resultadoa)>0) {
    $buscar=mysqli_query($conexion, "select * from productor where rif_prod='$rif_prod'");

    while ($dato=mysqli_fetch_array($buscar)) {
        ?>
      <html>
      <center>


      <form id='form-actualizar-productor' method='POST' action='actualizar.php'>
        <h3>Actualizar datos del productor <?php echo $dato["nombre_empresa_prod"];?></h3><center>

  <table class='table  table-hover table-condensed dataTable'>
    <tr>
      <th ><label for='nombre_empresa_prod'>Nombre de la empresa</label></th>
      <td><input name=nombre_empresa_prod type='text' class='form-control' id='nombre_empresa_prod' placeholder='Nombre de la empresa' value="<?php echo $dato["nombre_empresa_prod"];?>" required></td>
    </tr>
    <tr>
      <th scope=row>Rif del productor:</th>
      <td><input class='form-control' type='text' name='rif_prod' readonly value='<?php echo $dato["rif_prod"];?>' /></td>
    </tr>
    <tr>
      <th scope=row>Telefono del productor:</th>
      <td><input class='form-control' type='text' name='telefono_prod' required value='<?php echo $dato["telefono_prod"];?>' /></td>
    </tr>
    <tr>
        <th>
        Dirección
        </th>
        <td>
        <textarea id='direccion_prod' class='form-control' name='direccion_prod'><?php if ($dato["direccion_prod"]) {
            echo $dato["direccion_prod"];
} ?></textarea>
        </td>
    </tr>
    <tr>
      <th colspan="2" scope=row> 
        <div class='box-footer'>
            <input class='btn btn-primary' id='btn_actualizar_productor' name='btn_actualizar_productor' type=submit value='OK Ingresar'/>
            <input class='btn btn-warning' type=reset value=Limpiar>
            <a class='btn btn-info' href='http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php'>Regresar</a>
        </div>
      </th>
    </tr>
  
  </table>
  </center>
  </form>


    <?php
    }
} else {
    echo"<h3>Rif no encontrado</h3>";

    echo"<h4>favor inserte Rif existente</h4>";
    echo"<a class='btn btn-info href=http://localhost/servicios/modulos/mod_administrar_productores/administrar_productores.php>Regresar</a>";
}
?>
</center>
</html>

</article>
        </section>
                          
      <footer>
          <div></div> 
      </footer>
      </section>
    </body>
    <?php
    } else {
        header("Location: " . BASE_URL . "app/404.php");
    }
}  ?>
</html>
<script src="js/programa.js"></script>


