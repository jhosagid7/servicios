<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
	include_once "../../../connection/conexion.php";
}

//Funcion que me permite llamar el proveedor
function getProveedorName()
{
	$mysqli = getConn();
	$nombre_prov = $_POST['nombre_prov'];
	$query = "SELECT * FROM proveedor WHERE nombre_prov = '". $nombre_prov ."'";
	$result = $mysqli->query($query);
	$reg = mysqli_num_rows($result);
	if ($reg) {
		echo 'false';
	} else {
		echo 'true';
	}
}
echo getProveedorName();
