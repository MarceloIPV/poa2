<?php 

$idNombres= $_POST["idNombres"];
$sede= $_POST["sede"];
$instituciones= $_POST["instituciones"];
$fechaInicio= $_POST["fechaInicio"];
$fechaFin= $_POST["fechaFin"];
$deportes= $_POST["deportes"];
$fechaInicio= $_POST["fechaInicio"];
$fechaFin= $_POST["fechaFin"];
$categoria= $_POST["categoria"];
$damas= $_POST["damas"];
$caballeros= $_POST["caballeros"];
$entrenadores= $_POST["entrenadores"];
$valorTotal= $_POST["valorTotal"];
$observaciones= $_POST["observaciones"];



session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_encuentroactivo` (`nombres`, `sede`,`instituciones`, `fechaInicio`, `fechFin`, `deportes`, `categoria`, `mujeres`, `hombres`, `entrenadores`, `valorTotal`, `observaciones`, `idOrganismo`) VALUES ('$idNombres', '$sede', '$instituciones', '$fechaInicio', '$fechaFin', '$deportes', '$categoria', '$damas', '$caballeros', '$entrenadores', '$valorTotal', '$observaciones','$idOrganismoSession');
";



$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
	
?>