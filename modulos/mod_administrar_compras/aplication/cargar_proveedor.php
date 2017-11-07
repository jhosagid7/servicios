<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
    include_once "../../../connection/conexion.php";
}

//Esta funcion me permite traer los proveedores
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
