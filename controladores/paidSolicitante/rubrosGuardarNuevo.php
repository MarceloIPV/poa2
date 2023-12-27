<?php 

$deporte= $_POST["deporte"];
$idModalidad= $_POST["idModalidad"];
$idNombres= $_POST["idNombres"];
$idprueba= $_POST["idprueba"];
$idategoria= $_POST["idategoria"];
$fechaInicio= $_POST["fechaInicio"];
$fechaFin= $_POST["fechaFin"];
$ciudad= $_POST["ciudad"];
$oficina= $_POST["oficina"];
$atletas= $_POST["atletas"];
$dias= $_POST["dias"];
$pax= $_POST["pax"];
$valorTotal= $_POST["valorTotal"];
$observaciones= $_POST["observaciones"];


session_start();
$idOrganismo= $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_eventos` (`actividadDeportiva`, `deporte`, `modalidad`, `nombreEvento`, `prueba`, `categoria`, `fechaInicio`, `fechaFin`, `sede`, `numeroOficina`, `numeroAtletas`, `numeroDias`, `numeroPax`, `valorTotal`, `Observaciones`, `idOrganismo`) VALUES ('1','$deporte', '$idModalidad','$idNombres' ,'$idprueba', '$idategoria', '$fechaInicio', '$fechaFin', '$ciudad', '$oficina', '$atletas', '$dias', '$pax', '$valorTotal', '$observaciones','$idOrganismo');
";
echo( "Correcto");

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
	
?>


