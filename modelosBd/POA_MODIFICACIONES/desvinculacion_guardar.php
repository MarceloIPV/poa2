<?php 

$idSueldos= $_POST["idSueldos"];
$tipo_desvinculacion= $_POST["tipo_desvinculacion"];
$enero__despido= $_POST["enero__despido"];
$febrero__despido= $_POST["febrero__despido"];
$marzo__despido= $_POST["marzo__despido"];
$abril__despido= $_POST["abril__despido"];
$mayo__despido= $_POST["mayo__despido"];
$junio__despido= $_POST["junio__despido"];
$julio__despido= $_POST["julio__despido"];
$agosto__despido= $_POST["agosto__despido"];
$septiembre__despido= $_POST["septiembre__despido"];
$octubre__despido= $_POST["octubre__despido"];
$noviembre__despido= $_POST["noviembre__despido"];
$diciembre__despido= $_POST["diciembre__despido"];
$total= $_POST["total"];


	
date_default_timezone_set("America/Guayaquil");

$anio = date('Y');

$fecha_actual = date('Y-m-d');

$hora_actual= date('H:i:s');	



session_start();
$idOrganismoSession = $_SESSION["idOrganismoSession"];


require_once "../../config/config2.php";
require_once "../../conexion/conexion.php";


$conexionRecuperada= new conexion();
$conexionEstablecida=$conexionRecuperada->cConexion();

$objeto= new usuarioAcciones();


if ($tipo_desvinculacion=="desahucio") {
	$item=49;
}else if($tipo_desvinculacion=="despido") {
	$item=156;
}else if($tipo_desvinculacion=="renuncia") {
	$item=94;
}else if($tipo_desvinculacion=="compensación") {
	$item=50;
}

$consultaDe=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='$item' AND idOrganismo='$idOrganismoSession';");

$idSueldosSalariosAc__consultas=$objeto->getObtenerInformacionGeneral("SELECT idActividad FROM poa_sueldossalarios2022 WHERE idSueldos='$idSueldos';");
$idSueldosSalariosAc=$idSueldosSalariosAc__consultas[0][idActividad];

if (!empty($consultaDe[0][idProgramacionFinanciera])) {

	$idProgramacionFinanc=$consultaDe[0][idProgramacionFinanciera];

	$consultaDe__2=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idItem='$item' AND idOrganismo='$idOrganismoSession' AND idProgramacionFinanciera='$idProgramacionFinanc';");
	

	$sumadorEnero=floatval($consultaDe__2[0][enero])+floatval($enero__despido);
	$sumadorFebrero=floatval($consultaDe__2[0][febrero])+floatval($febrero__despido);
	$sumadorMarzo=floatval($consultaDe__2[0][marzo])+floatval($marzo__despido);
	$sumadorAbril=floatval($consultaDe__2[0][abril])+floatval($abril__despido);
	$sumadorMayo=floatval($consultaDe__2[0][mayo])+floatval($mayo__despido);
	$sumadorJunio=floatval($consultaDe__2[0][junio])+floatval($junio__despido);
	$sumadorJulio=floatval($consultaDe__2[0][julio])+floatval($julio__despido);
	$sumadorAgosto=floatval($consultaDe__2[0][agosto])+floatval($agosto__despido);
	$sumadorSeptiembre=floatval($consultaDe__2[0][septiembre])+floatval($septiembre__despido);
	$sumadorOctubre=floatval($consultaDe__2[0][octubre])+floatval($octubre__despido);
	$sumadorNoviembre=floatval($consultaDe__2[0][noviembre])+floatval($noviembre__despido);
	$sumadorDiciembre=floatval($consultaDe__2[0][diciembre])+floatval($diciembre__despido);
	$totalicimos=floatval($sumadorEnero) + floatval($sumadorFebrero) + floatval($sumadorMarzo) + floatval($sumadorAbril) + floatval($sumadorMayo) + floatval($sumadorJunio) + floatval($sumadorJulio) + floatval($sumadorAgosto) + floatval($sumadorSeptiembre) + floatval($sumadorOctubre) + floatval($sumadorNoviembre) + floatval($sumadorDiciembre);


	$sql2 ="UPDATE poa_programacion_financiera SET enero='$sumadorEnero',febrero='$sumadorFebrero',marzo='$sumadorMarzo',abril='$sumadorAbril',mayo='$sumadorMayo',junio='$sumadorJunio',julio='$sumadorJulio',agosto='$sumadorAgosto',septiembre='$sumadorSeptiembre',octubre='$sumadorOctubre',noviembre='$sumadorNoviembre',diciembre='$sumadorDiciembre',fecha='$fecha_actual',totalSumaItem='$totalicimos',totalTotales='$totalicimos' WHERE idOrganismo='$idOrganismoSession' AND idProgramacionFinanciera='$idProgramacionFinanc';";
	$resultado= $conexionEstablecida->exec($sql2);


}else{

	$sql2 ="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`) VALUES (NULL, '$enero__despido', '$febrero__despido', '$marzo__despido', '$abril__despido', '$mayo__despido', '$junio__despido', '$julio__despido', '$agosto__despido', '$septiembre__despido', '$octubre__despido', '$noviembre__despido', '$diciembre__despido', '$total', '$total', NULL, NULL, '$idOrganismoSession', '$item','$idSueldosSalariosAc', NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL);";
	$resultado= $conexionEstablecida->exec($sql2);

}

$sql ="INSERT INTO `poa_modificacion_desvinculacion_inicio` (`idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `estado`) VALUES ($idSueldos, $idOrganismoSession, '$tipo_desvinculacion', $enero__despido, $febrero__despido, $marzo__despido, $abril__despido, $mayo__despido, $junio__despido, $julio__despido, $agosto__despido, $septiembre__despido,$octubre__despido,$noviembre__despido,$diciembre__despido,$total,1);";


$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
	
?>


