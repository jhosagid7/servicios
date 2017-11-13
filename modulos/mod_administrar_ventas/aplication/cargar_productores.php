<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
    include_once "../../../connection/conexion.php";
}

//Esta funcion me permite traer los proveedores
function getProductores()
{
    $mysqli = getConn();
    $query = 'SELECT * FROM productor';
    $result = $mysqli->query($query);
    $list = '<option value="0">Elige un Productor de la lista</option>';
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $list .= "<option value='$row[id_productor]'>$row[nombre_empresa_prod]</option>";
    }
    
    return $list;
}
 echo getProductores();
