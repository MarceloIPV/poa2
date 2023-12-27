<?php 

$idMontos= $_POST["idMontos"];



require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="DELETE FROM `poa_honorarios2022_montos` WHERE (`idMontos` = '$idMontos');";

$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;
echo $sql;
?>






