<?php 

$idModalidad= $_POST["idModalidad"];
$cedula= $_POST["cedula"];
$sexo= $_POST["sexo"];
$cargo= $_POST["cargo"];
$nombres= $_POST["nombres"];
$apellidos= $_POST["apellidos"];
$fechaInicio= $_POST["fechaInicio"];
$fechaFin= $_POST["fechaFin"];
$valorMes= $_POST["valorMes"];
$valorTotal= $_POST["valorTotal"];
$meses= $_POST["meses"];
$sector= $_POST["sector"];


session_start();
$idOrganismo = $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";
$fecha = date("Y-m-d"); 
$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_interdisciplinario` (`cedula`, `modalidad`, `sexo`, `cargo`, `nombres`, `apellidos`, `fechaInicio`, `fechaFin`, `valor`, `numeroMeses`, `valorTotal`, `sector`, `idOrganismo`, `fecha`) VALUES ('$cedula', '$idModalidad', '$sexo', '$cargo', '$nombres', '$apellidos', '$fechaInicio', '$fechaFin', '$valorMes', '$meses', '$valorTotal', '$sector','$idOrganismo', '$fecha');";


echo( "Correcto");
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
	
?>


