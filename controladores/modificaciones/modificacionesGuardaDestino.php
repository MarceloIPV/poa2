<?php 

$origen1= $_POST["origen1"];
$item1= $_POST["item1"];
$mes1= $_POST["mes1"];

$idSueldos= $_POST["idSueldos"];
$montoAsignadoOrigen= $_POST["montoAsignadoOrigen"];
$disminucionOrigen= $_POST["disminucionOrigen"];
$totalOrigen= $_POST["totalOrigen"];

$origen2= $_POST["origen2"];
$item2= $_POST["item2"];
$aumentoDestino= $_POST["aumentoDestino"];
$montoAsignadoDestino= $_POST["montoAsignadoDestino"];
$totalDestino= $_POST["totalDestino"];

$mes2= $_POST["mes2"];

$justificacion= $_POST["justificacion"];
$fecha_actual = date('Y-m-d');

$hora_actual= date('H:i:s');	

$hora_actual2= date('s');


$hora__dos=date('H:i');

$anioa=date('Y');
session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];


require_once "../../config/config2.php";




$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_modificacion_organismo_actividades` (`idOrganismo`, `actividadOrigen`, `idFinancieroOrigen`, `mesOrigen`, `montoAsignadoOrigen`,`disminucionOrigen`,`totalOrigen`, `actividadDestino`, `idFinancieroDestino`, `mesDestino`,`montoAsignadoDestino`,`aumentoDestino`, `totalDestino`, `fecha`, `hora`, `justificacion`, `idSueldo`) VALUES
($idOrganismoSession,'$origen1', '$item1', '$mes1',  '$montoAsignadoOrigen','$disminucionOrigen','$totalOrigen','$origen2','$item2','$mes2','$montoAsignadoDestino','$aumentoDestino', '$totalDestino', '$fecha_actual' ,'$hora_actual','$justificacion','$idSueldos');";



$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;

	
?>


