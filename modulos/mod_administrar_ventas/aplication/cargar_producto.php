<?php
//Este archivo me permite cargar los producto por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
	include_once "../../../connection/conexion.php";
}

//Esta funcion me permite traer los productos
function getProducto()
{
	$mysqli = getConn();
	$query = 'SELECT * FROM producto';
	$result = $mysqli->query($query);
	$list = '<option value="0">Elige un Producto</option>';
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$list .= "<option value='$row[id_producto]'>$row[producto]</option>";
	}

	return $list;
}
echo getProducto();
