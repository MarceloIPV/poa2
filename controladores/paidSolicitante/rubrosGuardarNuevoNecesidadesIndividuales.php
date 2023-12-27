<?php 

$modalidad= $_POST["modalidad"];
$articulo= $_POST["articulo"];
$cantidad= $_POST["cantidad"];
$nombres= $_POST["nombres"];
$apellidos= $_POST["apellidos"];
$valorUnitario= $_POST["valorUnitario"];
$valorTotal= $_POST["valorTotal"];
$sector= $_POST["sector"];


session_start();
$idOrganismo = $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_necesidades_individuales` (`modalidad`, `nombres`, `apellidos`, `articulo`, `cantidad`, `valorUnitario`, `valorTotal`, `sector`, `idOrganismo`) VALUES ('$modalidad', '$nombres','$apellidos','$articulo','$cantidad' ,'$valorUnitario', '$valorTotal', '$sector','$idOrganismo');";
echo( "Correcto");
echo $sql;
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
	
?>


