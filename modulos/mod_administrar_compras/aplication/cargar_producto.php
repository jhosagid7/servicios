<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
    include_once "../../../connection/conexion.php";
}

function getProducto()
{
     $mysqli = getConn();
     $id = $_POST['id_producto'];
     $query = "SELECT * FROM producto WHERE id_producto = $id";
     $result = $mysqli->query($query);
     $list = $result->fetch_array(MYSQLI_ASSOC);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $list .= "$row[id_producto] " - " $row[producto]";
    }
     
     return $list;
}
 echo getProducto();
