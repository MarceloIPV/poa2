<?php 

$modalidad= $_POST["modalidad"];
$articulo= $_POST["articulo"];
$cantidad= $_POST["cantidad"];
$valorUnitario= $_POST["valorUnitario"];
$valorTotal= $_POST["valorTotal"];
$sector= $_POST["sector"];


session_start();
$idOrganismo = $_SESSION["idOrganismoSession"];
require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_paid_necesidades_generales` (`modalidad`, `articulo`, `cantidad`, `valorUnitario`, `valorTotal`, `sector`, `idOrganismo`) VALUES ('$modalidad', '$articulo','$cantidad' ,'$valorUnitario', '$valorTotal', '$sector','$idOrganismo');
";


$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$mensaje=1;
$jason['mensaje']=$mensaje;
?>


