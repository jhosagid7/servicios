<?php
require_once("../../../connection/conexion.php");

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
