<?php
//Este archivo me permite cargar los nombres de las empresas de los productores por medio del ide*/
if (is_file('../../../connection/conexion.php')) {
	include_once "../../../connection/conexion.php";
}

//Funcion que me permite llamar el nombre de la empresa del productor
function getProductorName()
{
	$mysqli = getConn();
	$nombre_empresa_prod = $_POST['nombre_empresa_prod'];
	$query = "SELECT * FROM productor WHERE nombre_empresa_prod = '". $nombre_empresa_prod ."'";
	$result = $mysqli->query($query);
	$reg = mysqli_num_rows($result);
	if ($reg) {
		echo 'false';
	} else {
		echo 'true';
	}
}
echo getProductorName();
