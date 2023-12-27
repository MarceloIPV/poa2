
<?php 	

require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_honorarios2022; ");
$jason['indicadorInformacion']=$indicadorInformacion;

?>
