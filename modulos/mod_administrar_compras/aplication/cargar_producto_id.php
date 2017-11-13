<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
	include_once "../../../connection/conexion.php";
}
//Funcion que me permite llamar el proveedor
function getProductoId()
{
	$mysqli = getConn();
	$id = $_POST['id'];
	$query = "SELECT * FROM producto WHERE id_producto = $id";
	$result = $mysqli->query($query);
	$reg = mysqli_num_rows($result);
	if ($reg) {
        /* $list = $list->fetch_array(MYSQLI_ASSOC); */
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$data["data"] = $row;
		}
		echo json_encode($data);
	} else {
		echo json_encode( 'Error al cargar datos' );
	}
}
echo getProductoId();