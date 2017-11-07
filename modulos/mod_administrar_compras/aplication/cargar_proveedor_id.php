<?php
require_once("../../../connection/conexion.php");

function getProveedorId(){
	 $mysqli = getConn();
	 $id = $_POST['id_proveedor'];
	 $query = "SELECT * FROM proveedor WHERE id_proveedor = $id";
	 $result = $mysqli->query($query);
	 $reg = mysqli_num_rows($result);
	 if($reg){
		/* $list = $list->fetch_array(MYSQLI_ASSOC); */
		while($row =  $result->fetch_array(MYSQLI_ASSOC)){
			$data["data"] = $row;
		}
		echo json_encode( $data );
	}else{
		echo "error";
	}
 }
 echo getProveedorId();
 