<?php 

$tipo= $_POST["tipo"];

session_start();
$idOrganismo = $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";
$fecha = date("Y-m-d");  
$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_envioinicial` (`idOrganismo`, `estado`, `fecha`, `identificador`, `estadoEditar`) VALUES ('$idOrganismo', 'A', '$fecha', '$tipo', '1');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;

$mensaje=1;
echo '1';
?>

