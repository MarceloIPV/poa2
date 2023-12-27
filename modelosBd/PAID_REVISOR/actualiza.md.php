<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');

	
    session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
    
	/*=====  End of Parametros Iniciales  ======*/
	

	$objeto= new usuarioAcciones();

	switch ($tipo) {

		case  "actualiza__items__financieros":
		
			 $conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
			
			$query="UPDATE poa_paid_programacion_financiera SET `enero` = $enero, `febrero` = $febrero, `marzo` = $marzo, `abril` = $abril, `mayo` = $mayo, `junio` = $junio, `julio` = $julio, `agosto` = $agosto, `septiembre` = $septiembre, `octubre` = $octubre, `noviembre` = $noviembre, `diciembre` = $diciembre, `totalSumaItem` = $total,`fecha` = '$fecha_actual' WHERE `idProgramacionFinanciera` = $idProgramacionFinanciera;";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;

		

    }

	echo json_encode($jason);