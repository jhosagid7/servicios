<?php
require_once("../../../connection/conexion.php");

function getProveedores()
{
     $mysqli = getConn();
     $query = 'SELECT * FROM proveedor';
     $result = $mysqli->query($query);
     $list = '<option value="0">Elige un Proveedor</option>';
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $list .= "<option value='$row[id_proveedor]'>$row[nombre_prov]</option>";
    }
     
     return $list;
}
 echo getProveedores();
