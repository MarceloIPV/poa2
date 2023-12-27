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



require_once "../../config/config2.php";

session_start();
 
$idOrganismoSession = $_SESSION["idOrganismoSession"];



$objetoMes= new usuarioAcciones();

	$cantidad=$objetoMes->getObtenerInformacionGeneral("SELECT count(*) as num from poa_modificaciones_sueldos_salarios where mes='$mes' and idSueldos=$idSueldos ");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}


if ($numero >=1 ) {
	echo "1";
}else{


$objeto= new usuarioAcciones();
$sql ="INSERT INTO `poa_modificaciones_sueldos_salarios`(`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `justificacion`, `total`, `mes`, `idOrganismo`) VALUES ($idSueldos, '$sueldo', '$aporte', '$decimoTercera', '$decimoCuarta', '$fondosReserva', 'A', '$justificacion', '$total', '$mes',$idOrganismoSession);";


$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;
	echo "2";
}
?>


