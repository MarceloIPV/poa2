<?php 

$mes= $_POST["mes"];
$idSueldos= $_POST["idSueldos"];
$fondosReserva= $_POST["fondosReserva"];


$sueldo= $_POST["sueldo"];
$aporte= $_POST["aporte"];
$decimoTercera= $_POST["decimoTercera"];
$fondosReserva= $_POST["fondosReserva"];
$decimoCuarta= $_POST["decimoCuarta"];
$justificacion= $_POST["justificacion"];
$total= $_POST["total"];





extract($_POST);
require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql ="INSERT INTO `poa_modificaciones_sueldos_salarios`(`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `justificacion`, `total`, `mes`) VALUES ($idSueldos, '$sueldo', '$aporte', '$decimoTercera', '$decimoCuarta', '$fondosReserva', 'A', '$justificacion', '$total', '$mes');";
$cantidad=$objeto->getObtenerInformacionGeneral($sql);

?>


