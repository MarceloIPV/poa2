<?php 

$actividad= $_POST["actividad"];
$item= $_POST["item"];
$codigo= $_POST["codigo"];
$mes= $_POST["meses"];
$monto= $_POST["monto"];
$idOrigen= $_POST["idOrigen"];

session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];


require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO poa_disminucion_sueldo_destino (`actividad`,`idOrganismo`, `item`,`idOrigen`, `itemPresupuestario`, `mes`, `monto`, `estado`, `estado_montos`)VALUES ('$actividad','$idOrganismoSession','$item','$idOrigen', '$codigo', '$mes', '$monto', 'A','1');";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;


$sql1 ="UPDATE `poa_modificaciones_sueldos_salarios` SET `estado` = 'D' WHERE (`idModificacion` = '$idOrigen');
";
$indicadorInformacion1=$objeto->getObtenerInformacionGeneral($sql1);
	$jason['indicadorInformacion']=$indicadorInformacion1;

	
?>


