<?php 

$idHonorarios= $_POST["idHonorarios"];
$nombre= $_POST["nombre"];
$cedula= $_POST["cedula"];


require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="UPDATE `poa_honorarios2022` SET `cedula` = '$cedula', `nombres` = '$nombre' WHERE (`idHonorarios` = '$idHonorarios');
";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;

?>






