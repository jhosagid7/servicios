<?php
//Este archivo me permite cargar los proveedores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
	include_once "../../../connection/conexion.php";
}

//Funcion que me permite llamar el proveedor
function getUsuarioName()
{
	$mysqli = getConn();
	$usuario = $_POST['usuario'];
	$query = "SELECT * FROM usuario WHERE usuario = '". $usuario ."'";
	$result = $mysqli->query($query);
	$reg = mysqli_num_rows($result);
	if ($reg) {
		echo 'false';
	} else {
		echo 'true';
	}
}
echo getUsuarioName();
