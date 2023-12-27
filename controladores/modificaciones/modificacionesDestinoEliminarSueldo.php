<?php 

$id= $_POST["id"];

require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="DELETE FROM `poa_modificacion_organismo_actividades` WHERE (`idModificacionOr` = '$id');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;



?>




