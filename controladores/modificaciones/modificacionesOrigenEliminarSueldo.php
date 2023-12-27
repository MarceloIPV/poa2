<?php 

$idOrigen= $_POST["idOrigen"];

require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="DELETE FROM `ezonshar_mdepsaddb2`.`poa_modificaciones_sueldos_salarios` WHERE (`idModificacion` = '$idOrigen');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;


?>




