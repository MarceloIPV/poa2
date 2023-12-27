n<?php 

$actividad= $_POST["actividad"];
$item= $_POST["item"];
$mes= $_POST["meses"];
$monto= $_POST["monto"];
$codigo= $_POST["codigo"];




require_once "../../config/config2.php";

$objeto1= new usuarioAcciones();

	$cantidad=$objeto1->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_modificaciones_origen_destino where mes=-'$mes' ");
	//$cantidad2=$objeto->getObtenerInformacionGeneral("INSERT INTO poa_modificaciones_sueldos_salarios (`idSueldos`, `sueldoSalario`, `aportePatronal`, `decimoTercero`, `decimoCuarto`, `fondosReserva`, `estado`, `mes`) VALUES ('2691', '1', '1', '1', '1', '1', 'A', 'FEBERO');");
	foreach ($cantidad as $row)
	{
		$numero= $row["num"];
	}


if ($numero >= 1) {
	echo '<div class="alert alert-danger" role="alert">
  '.$mes.' ya ingresado anteriormente
</div>';
	# code...
}else{

$objeto= new usuarioAcciones();

$sql ="INSERT INTO poa_modificaciones_origen_destino (`actividad`, `item`,  `itemPresupuestario`, `mes`, `monto`, `estado`,`estado_montos`)VALUES ('$actividad', '$item', '$codigo', '$mes', '$monto', 'A','ORIGEN');";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
	$jason['indicadorInformacion']=$indicadorInformacion;

}
	
?>


                       