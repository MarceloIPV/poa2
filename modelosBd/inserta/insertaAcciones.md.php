<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	require_once "../../config/files.php";

	/*============================================
	=            Parametros Iniciales            =
	============================================*/
	
	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');

	$hora_actual= date('H:i:s');	

	$hora_actual2= date('s');
	

	$hora__dos=date('H:i');

	$anioa=date('Y');

	//$anioa='2022';

	/*=====  End of Parametros Iniciales e ======*/
	
	session_start();

		
	$idOrganismoSession=$_SESSION["idOrganismoSession"];
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	if (isset($_SESSION["fisicamenteEstructura"])) {
		$fisicamenteEstructura__reales=$_SESSION["fisicamenteEstructura"];
		$idUsuario__ingresos=$_SESSION["idUsuario"];
	}

	


	$objeto= new usuarioAcciones();

	switch ($tipo) {

		case "modificacion__conjunto__enviar":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_inicial` (`idModificacionDerfinitiva`, `idOrganismo`, `periodoIngreso`, `fecha`, `estado`, `idUsuario`, `idUsuarioInfra`, `idUsuarioFinan`, `mesEscodigo`) VALUES (NULL, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual', 'E', 0, 0, 0,'$mes');";
		 	$resultado= $conexionEstablecida->exec($query);

		 	$maximoE=$objeto->getObtenerInformacionGeneral("SELECT MAX(idModificacionDerfinitiva) AS maximo FROM poa_modificaciones_envio_inicial;");

		 	$query2="UPDATE poa_modificaciones_origen_destino SET idModificacionDerfinitiva='". $maximoE[0][maximo]."' WHERE periodoIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession' AND estado IS NULL;";
		 	$resultado2= $conexionEstablecida->exec($query2);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "modificacion__unitaria":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$actividadDestinoUsada=$actividadDestino;

		 	$tipoTramite=0;

		 	if ($identificadorPaginaReal=="origenDesvinculacion") {

		 		if ($actividadDestino=="desvinculacionOrigen") {

		 			$actividadOrigen=4;
		 			$idFinancierioDestino=$eventosDestino;
		 			$tipoTramite=1;

			 		$eventosOrigen=$persona_sueldos_data__origen__desvinculacion;
			 		$idFinancierioOrigen=$persona_sueldos_data__origen__desvinculacion;

			 		$persona_sueldos_data=$persona_sueldos_data__origen__desvinculacion;

		 		}else{

		 			$tipoTramite=3;

		 		}

		 				 		
		 	}else if ($identificadorPaginaReal=="sueldos") {

		 		$itemInformacion=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

		 		if ($actividadDestino=="4" || $actividadDestino==4) {
		 			$idFinancierioDestino=$eventosDestino;
		 			$tipoTramite=1;
		 		}else{
		 			$tipoTramite=3;
		 			$identificadorPaginaReal=$identificadorPaginaReal."__item";
		 		}

		 		$actividadOrigen=4;
		 		$eventosOrigen=$persona_honorarios_data;
		 		$idFinancierioOrigen=$persona_honorarios_data;
		 		
		 		$sumadorOpciones__Origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinancierioOrigen';");

		 		$sumadorOpciones__Destino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinancierioDestino';");


		 	}else if ($identificadorPaginaReal=="honorarios") {

		 		$itemInformacion=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");
		 		
		 		if ($actividadDestino=="4" || $actividadDestino==4) {
		 			$tipoTramite=1;
		 		}else{
		 			$tipoTramite=3;
		 			$identificadorPaginaReal=$identificadorPaginaReal."__item";
		 		}

		 		$actividadOrigen=4;
		 		$eventosOrigen=$persona_honorarios_data;
		 		$idFinancierioOrigen=$persona_honorarios_data;

		 		$sumadorOpciones__Origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idHonorarios='$idFinancierioOrigen';");
		 		$sumadorOpciones__Destino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_honorarios2022 WHERE idHonorarios='$idFinancierioDestino';");


		 	}else if ($identificadorPaginaReal=="desvinculacion") {

		 	
		 		$tipoTramite=1;

		 		$actividadOrigen=4;
		 		$eventosOrigen=$persona_honorarios_data;
		 		$idFinancierioOrigen=$persona_honorarios_data;
		 		
		 		$sumadorOpciones__Origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinancierioOrigen';");

		 		$sumadorOpciones__Destino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

		 	}else{

			 	$origenInformacion=$objeto->getObtenerInformacionGeneral("SELECT idItem,idActividad FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';");
			 	$destinoInformacion=$objeto->getObtenerInformacionGeneral("SELECT idItem,idActividad FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

			 	$actividadOrigen=$origenInformacion[0][idActividad];
			 	$itemOrigen=$origenInformacion[0][idItem];

			 	if ($actividadDestino!="sueldosD" && $actividadDestino!="honorariosD" && $actividadDestino!="desvinculacionD") {
			 		

				 	$actividadDestino=$destinoInformacion[0][idActividad];
				 	$itemDestino=$destinoInformacion[0][idItem];

				 	$sumadorOpciones__Destino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

			 	}



			 	$sumadorOpciones__Origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';");


			 	if ($actividadOrigen==$actividadDestino && $itemOrigen==$itemDestino) {

			 		$tipoTramite=1;
			 		
			 	}else if($actividadOrigen==$actividadDestino){

			 		$tipoTramite=2;	

			 	}else{

			 		$tipoTramite=3;

			 	}

		 	}


		 	$direccionDocumentos="../../documentos/modificacion/justificacionModificacion/";
		 	$nombreDocumentos=$fecha_actual."__".$idOrganismoSession.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["documento__justificacion"]['type'],$_FILES["documento__justificacion"]['size'],$_FILES["documento__justificacion"]['tmp_name'],$_FILES["documento__justificacion"]['name'],$direccionDocumentos,$nombreDocumentos);

			if ($identificadorPaginaReal!="desvinculacion") {

				$totalOrigenInicial=0;
				$totalOrigenVigente=0;
				$totalDestinoInicial=0;
				$totalDestinoVigente=0;

				if (floatval($eneroOrigen__restando)==0) {
					$eneroOrigen__restando=floatval($sumadorOpciones__Origen[0][enero]);
				}
				if (floatval($febreroOrigen__restando)==0) {
					$febreroOrigen__restando=floatval($sumadorOpciones__Origen[0][febrero]);
				}
				if (floatval($marzoOrigen__restando)==0) {
					$marzoOrigen__restando=floatval($sumadorOpciones__Origen[0][marzo]);
				}
				if (floatval($abrilOrigen__restando)==0) {
					$abrilOrigen__restando=floatval($sumadorOpciones__Origen[0][abril]);
				}
				if (floatval($mayoOrigen__restando)==0) {
					$mayoOrigen__restando=floatval($sumadorOpciones__Origen[0][mayo]);
				}
				if (floatval($junioOrigen__restando)==0) {
					$junioOrigen__restando=floatval($sumadorOpciones__Origen[0][junio]);
				}
				if (floatval($julioOrigen__restando)==0) {
					$julioOrigen__restando=floatval($sumadorOpciones__Origen[0][julio]);
				}
				if (floatval($agostoOrigen__restando)==0) {
					$agostoOrigen__restando=floatval($sumadorOpciones__Origen[0][agosto]);
				}
				if (floatval($septiembreOrigen__restando)==0) {
					$septiembreOrigen__restando=floatval($sumadorOpciones__Origen[0][septiembre]);
				}			
				if (floatval($octubreOrigen__restando)==0) {
					$octubreOrigen__restando=floatval($sumadorOpciones__Origen[0][octubre]);
				}
				if (floatval($noviembreOrigen__restando)==0) {
					$noviembreOrigen__restando=floatval($sumadorOpciones__Origen[0][noviembre]);
				}
				if (floatval($diciembreOrigen__restando)==0) {
					$diciembreOrigen__restando=floatval($sumadorOpciones__Origen[0][diciembre]);
				}

				$totalOrigenInicial=floatval($sumadorOpciones__Origen[0][enero]) + floatval($sumadorOpciones__Origen[0][febrero]) + floatval($sumadorOpciones__Origen[0][marzo]) + floatval($sumadorOpciones__Origen[0][abril]) + floatval($sumadorOpciones__Origen[0][mayo]) + floatval($sumadorOpciones__Origen[0][junio]) + floatval($sumadorOpciones__Origen[0][julio]) + floatval($sumadorOpciones__Origen[0][agosto]) + floatval($sumadorOpciones__Origen[0][septiembre]) + floatval($sumadorOpciones__Origen[0][octubre]) + floatval($sumadorOpciones__Origen[0][noviembre]) + floatval($sumadorOpciones__Origen[0][diciembre]);



				$totalOrigenVigente=floatval($eneroOrigen__restando) + floatval($febreroOrigen__restando) + floatval($marzoOrigen__restando) + floatval($abrilOrigen__restando) + floatval($mayoOrigen__restando) + floatval($junioOrigen__restando) + floatval($julioOrigen__restando) + floatval($agostoOrigen__restando) + floatval($septiembreOrigen__restando) + floatval($octubreOrigen__restando) + floatval($noviembreOrigen__restando) + floatval($diciembreOrigen__restando);



				if (floatval($eneroDestino__sumando)==0) {
					$eneroDestino__sumando=floatval($sumadorOpciones__Destino[0][enero]);
				}
				if (floatval($febreroDestino__sumando)==0) {
					$febreroDestino__sumando=floatval($sumadorOpciones__Destino[0][febrero]);
				}
				if (floatval($marzoDestino__sumando)==0) {
					$marzoDestino__sumando=floatval($sumadorOpciones__Destino[0][marzo]);
				}
				if (floatval($abrilDestino__sumando)==0) {
					$abrilDestino__sumando=floatval($sumadorOpciones__Destino[0][abril]);
				}			
				if (floatval($mayoDestino__sumando)==0) {
					$mayoDestino__sumando=floatval($sumadorOpciones__Destino[0][mayo]);
				}
				if (floatval($junioDestino__sumando)==0) {
					$junioDestino__sumando=floatval($sumadorOpciones__Destino[0][junio]);
				}
				if (floatval($julioDestino__sumando)==0) {
					$julioDestino__sumando=floatval($sumadorOpciones__Destino[0][julio]);
				}
				if (floatval($agostoDestino__sumando)==0) {
					$agostoDestino__sumando=floatval($sumadorOpciones__Destino[0][agosto]);
				}
				if (floatval($septiembreDestino__sumando)==0) {
					$septiembreDestino__sumando=floatval($sumadorOpciones__Destino[0][septiembre]);
				}
				if (floatval($octubreDestino__sumando)==0) {
					$octubreDestino__sumando=floatval($sumadorOpciones__Destino[0][octubre]);
				}
				if (floatval($noviembreDestino__sumando)==0) {
					$noviembreDestino__sumando=floatval($sumadorOpciones__Destino[0][noviembre]);
				}
				if (floatval($diciembreDestino__sumando)==0) {
					$diciembreDestino__sumando=floatval($sumadorOpciones__Destino[0][diciembre]);
				}


				$totalDestinoInicial=floatval($sumadorOpciones__Destino[0][enero]) + floatval($sumadorOpciones__Destino[0][febrero]) + floatval($sumadorOpciones__Destino[0][marzo]) + floatval($sumadorOpciones__Destino[0][abril]) + floatval($sumadorOpciones__Destino[0][mayo]) + floatval($sumadorOpciones__Destino[0][junio]) + floatval($sumadorOpciones__Destino[0][julio]) + floatval($sumadorOpciones__Destino[0][agosto]) + floatval($sumadorOpciones__Destino[0][septiembre]) + floatval($sumadorOpciones__Destino[0][octubre]) + floatval($sumadorOpciones__Destino[0][noviembre]) + floatval($sumadorOpciones__Destino[0][diciembre]);

				$totalDestinoVigente=floatval($eneroDestino__sumando) + floatval($febreroDestino__sumando) + floatval($marzoDestino__sumando) + floatval($abrilDestino__sumando) + floatval($mayoDestino__sumando) + floatval($junioDestino__sumando) + floatval($julioDestino__sumando) + floatval($agostoDestino__sumando) + floatval($septiembreDestino__sumando) + floatval($octubreDestino__sumando) + floatval($noviembreDestino__sumando) + floatval($diciembreDestino__sumando);	



			}else{

				$totalOrigenInicial=0;
				$totalOrigenVigente=0;
				$totalDestinoInicial=0;
				$totalDestinoVigente=0;

				if (floatval($eneroOrigen__restando)==0) {
					$eneroOrigen__restando=floatval($sumadorOpciones__Origen[0][enero]);
				}
				if (floatval($febreroOrigen__restando)==0) {
					$febreroOrigen__restando=floatval($sumadorOpciones__Origen[0][febrero]);
				}
				if (floatval($marzoOrigen__restando)==0) {
					$marzoOrigen__restando=floatval($sumadorOpciones__Origen[0][marzo]);
				}
				if (floatval($abrilOrigen__restando)==0) {
					$abrilOrigen__restando=floatval($sumadorOpciones__Origen[0][abril]);
				}
				if (floatval($mayoOrigen__restando)==0) {
					$mayoOrigen__restando=floatval($sumadorOpciones__Origen[0][mayo]);
				}
				if (floatval($junioOrigen__restando)==0) {
					$junioOrigen__restando=floatval($sumadorOpciones__Origen[0][junio]);
				}
				if (floatval($julioOrigen__restando)==0) {
					$julioOrigen__restando=floatval($sumadorOpciones__Origen[0][julio]);
				}
				if (floatval($agostoOrigen__restando)==0) {
					$agostoOrigen__restando=floatval($sumadorOpciones__Origen[0][agosto]);
				}
				if (floatval($septiembreOrigen__restando)==0) {
					$septiembreOrigen__restando=floatval($sumadorOpciones__Origen[0][septiembre]);
				}			
				if (floatval($octubreOrigen__restando)==0) {
					$octubreOrigen__restando=floatval($sumadorOpciones__Origen[0][octubre]);
				}
				if (floatval($noviembreOrigen__restando)==0) {
					$noviembreOrigen__restando=floatval($sumadorOpciones__Origen[0][noviembre]);
				}
				if (floatval($diciembreOrigen__restando)==0) {
					$diciembreOrigen__restando=floatval($sumadorOpciones__Origen[0][diciembre]);
				}

				$totalOrigenInicial=floatval($sumadorOpciones__Origen[0][enero]) + floatval($sumadorOpciones__Origen[0][febrero]) + floatval($sumadorOpciones__Origen[0][marzo]) + floatval($sumadorOpciones__Origen[0][abril]) + floatval($sumadorOpciones__Origen[0][mayo]) + floatval($sumadorOpciones__Origen[0][junio]) + floatval($sumadorOpciones__Origen[0][julio]) + floatval($sumadorOpciones__Origen[0][agosto]) + floatval($sumadorOpciones__Origen[0][septiembre]) + floatval($sumadorOpciones__Origen[0][octubre]) + floatval($sumadorOpciones__Origen[0][noviembre]) + floatval($sumadorOpciones__Origen[0][diciembre]);



				$totalOrigenVigente=floatval($eneroOrigen__restando) + floatval($febreroOrigen__restando) + floatval($marzoOrigen__restando) + floatval($abrilOrigen__restando) + floatval($mayoOrigen__restando) + floatval($junioOrigen__restando) + floatval($julioOrigen__restando) + floatval($agostoOrigen__restando) + floatval($septiembreOrigen__restando) + floatval($octubreOrigen__restando) + floatval($noviembreOrigen__restando) + floatval($diciembreOrigen__restando);



				if (floatval($eneroDestino__sumando)==0) {
					$eneroDestino__sumando=floatval($sumadorOpciones__Destino[0][enero]);
				}
				if (floatval($febreroDestino__sumando)==0) {
					$febreroDestino__sumando=floatval($sumadorOpciones__Destino[0][febrero]);
				}
				if (floatval($marzoDestino__sumando)==0) {
					$marzoDestino__sumando=floatval($sumadorOpciones__Destino[0][marzo]);
				}
				if (floatval($abrilDestino__sumando)==0) {
					$abrilDestino__sumando=floatval($sumadorOpciones__Destino[0][abril]);
				}			
				if (floatval($mayoDestino__sumando)==0) {
					$mayoDestino__sumando=floatval($sumadorOpciones__Destino[0][mayo]);
				}
				if (floatval($junioDestino__sumando)==0) {
					$junioDestino__sumando=floatval($sumadorOpciones__Destino[0][junio]);
				}
				if (floatval($julioDestino__sumando)==0) {
					$julioDestino__sumando=floatval($sumadorOpciones__Destino[0][julio]);
				}
				if (floatval($agostoDestino__sumando)==0) {
					$agostoDestino__sumando=floatval($sumadorOpciones__Destino[0][agosto]);
				}
				if (floatval($septiembreDestino__sumando)==0) {
					$septiembreDestino__sumando=floatval($sumadorOpciones__Destino[0][septiembre]);
				}
				if (floatval($octubreDestino__sumando)==0) {
					$octubreDestino__sumando=floatval($sumadorOpciones__Destino[0][octubre]);
				}
				if (floatval($noviembreDestino__sumando)==0) {
					$noviembreDestino__sumando=floatval($sumadorOpciones__Destino[0][noviembre]);
				}
				if (floatval($diciembreDestino__sumando)==0) {
					$diciembreDestino__sumando=floatval($sumadorOpciones__Destino[0][diciembre]);
				}


				$totalDestinoInicial=floatval($sumadorOpciones__Destino[0][enero]) + floatval($sumadorOpciones__Destino[0][febrero]) + floatval($sumadorOpciones__Destino[0][marzo]) + floatval($sumadorOpciones__Destino[0][abril]) + floatval($sumadorOpciones__Destino[0][mayo]) + floatval($sumadorOpciones__Destino[0][junio]) + floatval($sumadorOpciones__Destino[0][julio]) + floatval($sumadorOpciones__Destino[0][agosto]) + floatval($sumadorOpciones__Destino[0][septiembre]) + floatval($sumadorOpciones__Destino[0][octubre]) + floatval($sumadorOpciones__Destino[0][noviembre]) + floatval($sumadorOpciones__Destino[0][diciembre]);



			}



			$sumadorPlanificacionOrigen=floatval($eneroOrigen) + floatval($febreroOrigen) + floatval($marzoOrigen)  + floatval($abrilOrigen) + floatval($mayoOrigen)  + floatval($junioOrigen)  + floatval($julioOrigen)  + floatval($agostoOrigen)  + floatval($septiembreOrigen)  + floatval($octubreOrigen)  + floatval($noviembreOrigen)  + floatval($diciembreOrigen);
			$sumadorPlanificacionDestino=floatval($eneroDestino) + floatval($febreroDestino) + floatval($marzoDestino)  + floatval($abrilDestino) + floatval($mayoDestino)  + floatval($junioDestino)  + floatval($julioDestino)  + floatval($agostoDestino)  + floatval($septiembreDestino)  + floatval($octubreDestino)  + floatval($noviembreDestino)  + floatval($diciembreDestino);

			$variableIdentificadorasHonoSueldos="";


			if ($actividadDestino=="desvinculacionD") {
				$actividadDestino=4;
				$variableIdentificadorasHonoSueldos="desvinculacionD";
				$idFinancierioDestino=9999999;
			}else if ($actividadDestino=="sueldosD") {
				$actividadDestino=4;
				$variableIdentificadorasHonoSueldos="sueldosD";
				$idFinancierioDestino=9999999;
			}else if($actividadDestino=="honorariosD"){
				$actividadDestino=4;
				$variableIdentificadorasHonoSueldos="honorariosD";
				$idFinancierioDestino=9999998;
			}


			if($identificadorPaginaReal=="origenDesvinculacion" && $actividadDestino=="desvinculacionOrigen"){

				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`,`totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$persona_sueldos_data', $persona_sueldos_data, $enero__origen__desahucio__ingresar, $febrero__origen__desahucio__ingresar, $marzo__origen__desahucio__ingresar, $abril__origen__desahucio__ingresar, $mayo__origen__desahucio__ingresar, $junio__origen__desahucio__ingresar, $julio__origen__desahucio__ingresar, $agosto__origen__desahucio__ingresar, $septiembre__origen__desahucio__ingresar, $octubre__origen__desahucio__ingresar, $noviembre__origen__desahucio__ingresar, $diciembre__origen__desahucio__ingresar, $totalOrigen, $enero__origen__desahucio__restante, $febrero__origen__desahucio__restante, $marzo__origen__desahucio__restante, $abril__origen__desahucio__restante, $mayo__origen__desahucio__restante, $junio__origen__desahucio__restante, $julio__origen__desahucio__restante, $agosto__origen__desahucio__restante, $septiembre__origen__desahucio__restante, $octubre__origen__desahucio__restante, $noviembre__origen__desahucio__restante, $diciembre__origen__desahucio__restante, '4', '$eventosDestino', $idFinancierioDestino, $enero__destino__desahucio__ingresar, $febrero__destino__desahucio__ingresar, $marzo__destino__desahucio__ingresar, $abril__destino__desahucio__ingresar, $mayo__destino__desahucio__ingresar, $junio__destino__desahucio__ingresar, $julio__destino__desahucio__ingresar, $agosto__destino__desahucio__ingresar, $septiembre__destino__desahucio__ingresar, $octubre__destino__desahucio__ingresar, $noviembre__destino__desahucio__ingresar, $diciembre__destino__desahucio__ingresar, $totalDestino__destinoD, $enero__destino__desahucio__restante, $febrero__destino__desahucio__restante, $marzo__destino__desahucio__restante, $abril__destino__desahucio__restante, $mayo__destino__desahucio__restante, $junio__destino__desahucio__restante, $julio__destino__desahucio__restante, $agosto__destino__desahucio__restante, $septiembre__destino__desahucio__restante, $octubre__destino__desahucio__restante, $noviembre__destino__desahucio__restante, $diciembre__destino__desahucio__restante, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','$identificadorPaginaReal','$totalOrigen','$totalOrigen','$totalDestino__destinoD','$totalDestino__destinoD','$totalOrigen','$totalDestino__destinoD');";
				$resultado= $conexionEstablecida->exec($query);
				
				$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

				/*==============================
				=            Orígen            =
				==============================*/
				
				$origenDestinoIgual= $objeto->actualizar__desvinculaciones__origen($persona_sueldos_data,[$enero__origen__desahucio__ingresar,$febrero__origen__desahucio__ingresar,$marzo__origen__desahucio__ingresar,$abril__origen__desahucio__ingresar,$mayo__origen__desahucio__ingresar,$junio__origen__desahucio__ingresar,$julio__origen__desahucio__ingresar,$agosto__origen__desahucio__ingresar,$septiembre__origen__desahucio__ingresar,$octubre__origen__desahucio__ingresar,$noviembre__origen__desahucio__ingresar,$diciembre__origen__desahucio__ingresar],[$enero__origen__despido__intenpestivo__ingresar,$febrero__origen__despido__intenpestivo__ingresar,$marzo__origen__despido__intenpestivo__ingresar,$abril__origen__despido__intenpestivo__ingresar,$mayo__origen__despido__intenpestivo__ingresar,$junio__origen__despido__intenpestivo__ingresar,$julio__origen__despido__intenpestivo__ingresar,$agosto__origen__despido__intenpestivo__ingresar,$septiembre__origen__despido__intenpestivo__ingresar,$octubre__origen__despido__intenpestivo__ingresar,$noviembre__origen__despido__intenpestivo__ingresar,$diciembre__origen__despido__intenpestivo__ingresar],[$enero__origen__renunia__voluntaria__ingresar,$febrero__origen__renunia__voluntaria__ingresar,$marzo__origen__renunia__voluntaria__ingresar,$abril__origen__renunia__voluntaria__ingresar,$mayo__origen__renunia__voluntaria__ingresar,$junio__origen__renunia__voluntaria__ingresar,$julio__origen__renunia__voluntaria__ingresar,$agosto__origen__renunia__voluntaria__ingresar,$septiembre__origen__renunia__voluntaria__ingresar,$octubre__origen__renunia__voluntaria__ingresar,$noviembre__origen__renunia__voluntaria__ingresar,$diciembre__origen__renunia__voluntaria__ingresar],[$enero__origen__vacaciones__no__gozadas__ingresar,$febrero__origen__vacaciones__no__gozadas__ingresar,$marzo__origen__vacaciones__no__gozadas__ingresar,$abril__origen__vacaciones__no__gozadas__ingresar,$mayo__origen__vacaciones__no__gozadas__ingresar,$junio__origen__vacaciones__no__gozadas__ingresar,$julio__origen__vacaciones__no__gozadas__ingresar,$agosto__origen__vacaciones__no__gozadas__ingresar,$septiembre__origen__vacaciones__no__gozadas__ingresar,$octubre__origen__vacaciones__no__gozadas__ingresar,$noviembre__origen__vacaciones__no__gozadas__ingresar,$diciembre__origen__vacaciones__no__gozadas__ingresar],$obtenMaximo__origen[0][maximoObtencioOrigen]);


				
				/*=====  End of Orígen  ======*/
				
				/*===============================
				=            Destino            =
				===============================*/
				
				$destinoOrigenIgual= $objeto->actualizar__desvinculaciones__destino($eventos_intervencion__seleccion,[$enero__destino__desahucio__ingresar,$febrero__destino__desahucio__ingresar,$marzo__destino__desahucio__ingresar,$abril__destino__desahucio__ingresar,$mayo__destino__desahucio__ingresar,$junio__destino__desahucio__ingresar,$julio__destino__desahucio__ingresar,$agosto__destino__desahucio__ingresar,$septiembre__destino__desahucio__ingresar,$octubre__destino__desahucio__ingresar,$noviembre__destino__desahucio__ingresar,$diciembre__destino__desahucio__ingresar],[$enero__destino__despido__intenpestivo__ingresar,$febrero__destino__despido__intenpestivo__ingresar,$marzo__destino__despido__intenpestivo__ingresar,$abril__destino__despido__intenpestivo__ingresar,$mayo__destino__despido__intenpestivo__ingresar,$junio__destino__despido__intenpestivo__ingresar,$julio__destino__despido__intenpestivo__ingresar,$agosto__destino__despido__intenpestivo__ingresar,$septiembre__destino__despido__intenpestivo__ingresar,$octubre__destino__despido__intenpestivo__ingresar,$noviembre__destino__despido__intenpestivo__ingresar,$diciembre__destino__despido__intenpestivo__ingresar],[$enero__destino__renunia__voluntaria__ingresar,$febrero__destino__renunia__voluntaria__ingresar,$marzo__destino__renunia__voluntaria__ingresar,$abril__destino__renunia__voluntaria__ingresar,$mayo__destino__renunia__voluntaria__ingresar,$junio__destino__renunia__voluntaria__ingresar,$julio__destino__renunia__voluntaria__ingresar,$agosto__destino__renunia__voluntaria__ingresar,$septiembre__destino__renunia__voluntaria__ingresar,$octubre__destino__renunia__voluntaria__ingresar,$noviembre__destino__renunia__voluntaria__ingresar,$diciembre__destino__renunia__voluntaria__ingresar],[$enero__destino__vacaciones__no__gozadas__ingresar,$febrero__destino__vacaciones__no__gozadas__ingresar,$marzo__destino__vacaciones__no__gozadas__ingresar,$abril__destino__vacaciones__no__gozadas__ingresar,$mayo__destino__vacaciones__no__gozadas__ingresar,$junio__destino__vacaciones__no__gozadas__ingresar,$julio__destino__vacaciones__no__gozadas__ingresar,$agosto__destino__vacaciones__no__gozadas__ingresar,$septiembre__destino__vacaciones__no__gozadas__ingresar,$octubre__destino__vacaciones__no__gozadas__ingresar,$noviembre__destino__vacaciones__no__gozadas__ingresar,$diciembre__destino__vacaciones__no__gozadas__ingresar],$obtenMaximo__origen[0][maximoObtencioOrigen]);		


				/*=====  End of Destino  ======*/

				// echo $origenDestinoIgual."__".$destinoOrigenIgual;
				
				
			}else if ($identificadorPaginaReal=="sueldos") {

				if ($idFinancierioDestino=="eventoCrear") {
					$obtenMaximo__idFinanciero=$objeto->getObtenerInformacionGeneral("SELECT MAX(idSueldos) AS maximos FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismoSession';");
					$idFinancierioDestino=$obtenMaximo__idFinanciero[0][maximos];
					$eventosDestino=$obtenMaximo__idFinanciero[0][maximos];

				}

				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `sueldoDestino`, `aportePatronalDestino`, `decimoTerceraDestino`, `decimoCuartaDestino`, `fondosReservaDestino`, `sueldoDestino__sumando`, `aportePatronalDestino__sumando`, `decimoTerceraDestino__sumando`, `decimoCuartaDestino__sumando`, `fondosReservaDestino__sumando`, `salarioOrigen`, `aportePatronalOrigen`, `decimoTerceroOrigen`, `decimoCuartoOrigen`, `fondosDeReservaOrigen`, `salarioOrigen__restando`, `aportePatronalOrigen__restando`, `decimoTerceroOrigen__restando`, `decimoCuartoOrigen__restando`, `fondosDeReservaOrigen__restando`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$persona_sueldos_data', $persona_sueldos_data, $eneroOrigen__sueldos, $febreroOrigen__sueldos, $marzoOrigen__sueldos, $abrilOrigen__sueldos, $mayoOrigen__sueldos, $junioOrigen__sueldos, $julioOrigen__sueldos, $agostoOrigen__sueldos, $septiembreOrigen__sueldos, $octubreOrigen__sueldos, $noviembreOrigen__sueldos, $diciembreOrigen__sueldos, $totalOrigen, $enero__origen__restante, $febrero__origen__restante, $marzo__origen__restante, $abril__origen__restante, $mayo__origen__restante, $junio__origen__restante, $julio__origen__restante, $agosto__origen__restante, $septiembre__origen__restante, $octubre__origen__restante, $noviembre__origen__restante, $diciembre__origen__restante, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino__sueldos, $febreroDestino__sueldos, $marzoDestino__sueldos, $abrilDestino__sueldos, $mayoDestino__sueldos, $junioDestino__sueldos, $julioDestino__sueldos, $agostoDestino__sueldos, $septiembreDestino__sueldos, $octubreDestino__sueldos, $noviembreDestino__sueldos, $diciembreDestino__sueldos, $totalMesAsignados__destinos, $enero__origen__restante__destino, $febrero__origen__restante__destino, $marzo__origen__restante__destino, $abril__origen__restante__destino, $mayo__origen__restante__destino, $junio__origen__restante__destino, $julio__origen__restante__destino, $agosto__origen__restante__destino, $septiembre__origen__restante__destino, $octubre__origen__restante__destino, $noviembre__origen__restante__destino, $diciembre__origen__restante__destino, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','$identificadorPaginaReal','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$sumaOrigen1','$sumaOrigen1Restante','$sumaDestino1','$sumaDestino1Restante','$totalOrigen','$totalMesAsignados__destinos');";

				$resultado= $conexionEstablecida->exec($query);

		 		$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

			
				/*==============================
				=            Orígen            =
				==============================*/

				
				$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';",[$eneroOrigen__sueldos,$febreroOrigen__sueldos,$marzoOrigen__sueldos,$abrilOrigen__sueldos,$mayoOrigen__sueldos,$junioOrigen__sueldos,$julioOrigen__sueldos,$agostoOrigen__sueldos,$septiembreOrigen__sueldos,$octubreOrigen__sueldos,$noviembreOrigen__sueldos,$diciembreOrigen__sueldos,$totalOrigen]);

		 		$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';");


		 		$queryEjectuado="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idSueldos='$persona_sueldos_data';";
		 		$resultadoEjecutado= $conexionEstablecida->exec($queryEjectuado);



		 		/*=======================================
		 		=            Aporte patronal            =
		 		=======================================*/
		 		
		 		$origenPatronal=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar,$febrero__origen__aporte__patronal__ingresar,$marzo__origen__aporte__patronal__ingresar,$abril__origen__aporte__patronal__ingresar,$mayo__origen__aporte__patronal__ingresar,$junio__origen__aporte__patronal__ingresar,$julio__origen__aporte__patronal__ingresar,$agosto__origen__aporte__patronal__ingresar,$septiembre__origen__aporte__patronal__ingresar,$octubre__origen__aporte__patronal__ingresar,$noviembre__origen__aporte__patronal__ingresar,$diciembre__origen__aporte__patronal__ingresar,$total__origen__patronal__totales__ingresados]);

				$origenPatronalObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

				
				$queryOrigenPatronal="UPDATE poa_programacion_financiera SET enero='$origenPatronal[0]',febrero='$origenPatronal[1]',marzo='$origenPatronal[2]',abril='$origenPatronal[3]',mayo='$origenPatronal[4]',junio='$origenPatronal[5]',julio='$origenPatronal[6]',agosto='$origenPatronal[7]',septiembre='$origenPatronal[8]',octubre='$origenPatronal[9]',noviembre='$origenPatronal[10]',diciembre='$origenPatronal[11]',totalTotales='$origenPatronal[12]',enero2='".$origenPatronalObtener[0][enero]."',febrero2='".$origenPatronalObtener[0][febrero]."',marzo2='".$origenPatronalObtener[0][marzo]."',abril2='".$origenPatronalObtener[0][abril]."',mayo2='".$origenPatronalObtener[0][mayo]."',junio2='".$origenPatronalObtener[0][junio]."',julio2='".$origenPatronalObtener[0][julio]."',agosto2='".$origenPatronalObtener[0][agosto]."',septiembre2='".$origenPatronalObtener[0][septiembre]."',octubre2='".$origenPatronalObtener[0][octubre]."',noviembre2='".$origenPatronalObtener[0][noviembre]."',diciembre2='".$origenPatronalObtener[0][diciembre]."',total2='".$origenPatronalObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
							 			
				$resultadoOrigenPatronal= $conexionEstablecida->exec($queryOrigenPatronal);		 		
		 		
				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar.", ".$febrero__origen__aporte__patronal__ingresar.", ".$marzo__origen__aporte__patronal__ingresar.", ".$abril__origen__aporte__patronal__ingresar.", ".$mayo__origen__aporte__patronal__ingresar.", ".$junio__origen__aporte__patronal__ingresar.", ".$julio__origen__aporte__patronal__ingresar.", ".$agosto__origen__aporte__patronal__ingresar.", ".$septiembre__origen__aporte__patronal__ingresar.", ".$octubre__origen__aporte__patronal__ingresar.", ".$noviembre__origen__aporte__patronal__ingresar.", ".$diciembre__origen__aporte__patronal__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Aporte patronal  ======*/

		 		
		 		/*============================================
		 		=            Décimo tercer sueldo            =
		 		============================================*/


		 		$origenDecimoTercer=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar,$febrero__origen__decimo__tercero__ingresar,$marzo__origen__decimo__tercero__ingresar,$abril__origen__decimo__tercero__ingresar,$mayo__origen__decimo__tercero__ingresar,$junio__origen__decimo__tercero__ingresar,$julio__origen__decimo__tercero__ingresar,$agosto__origen__decimo__tercero__ingresar,$septiembre__origen__decimo__tercero__ingresar,$octubre__origen__decimo__tercero__ingresar,$noviembre__origen__decimo__tercero__ingresar,$diciembre__origen__decimo__tercero__ingresar,$total__origen__decimo__tercero__totales__ingresados]);

		 		$origenDecimoTercerObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

				$queryOrigenDecimoTercer="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercer[0]',febrero='$origenDecimoTercer[1]',marzo='$origenDecimoTercer[2]',abril='$origenDecimoTercer[3]',mayo='$origenDecimoTercer[4]',junio='$origenDecimoTercer[5]',julio='$origenDecimoTercer[6]',agosto='$origenDecimoTercer[7]',septiembre='$origenDecimoTercer[8]',octubre='$origenDecimoTercer[9]',noviembre='$origenDecimoTercer[10]',diciembre='$origenDecimoTercer[11]',totalTotales='$origenDecimoTercer[12]',enero2='".$origenDecimoTercerObtener[0][enero]."',febrero2='".$origenDecimoTercerObtener[0][febrero]."',marzo2='".$origenDecimoTercerObtener[0][marzo]."',abril2='".$origenDecimoTercerObtener[0][abril]."',mayo2='".$origenDecimoTercerObtener[0][mayo]."',junio2='".$origenDecimoTercerObtener[0][junio]."',julio2='".$origenDecimoTercerObtener[0][julio]."',agosto2='".$origenDecimoTercerObtener[0][agosto]."',septiembre2='".$origenDecimoTercerObtener[0][septiembre]."',octubre2='".$origenDecimoTercerObtener[0][octubre]."',noviembre2='".$origenDecimoTercerObtener[0][noviembre]."',diciembre2='".$origenDecimoTercerObtener[0][diciembre]."',total2='".$origenDecimoTercerObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

				$resultadoOrigenDecimoTercer= $conexionEstablecida->exec($queryOrigenDecimoTercer);		 

		 		
				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar.", ".$febrero__origen__decimo__tercero__ingresar.", ".$marzo__origen__decimo__tercero__ingresar.", ".$abril__origen__decimo__tercero__ingresar.", ".$mayo__origen__decimo__tercero__ingresar.", ".$junio__origen__decimo__tercero__ingresar.", ".$julio__origen__decimo__tercero__ingresar.", ".$agosto__origen__decimo__tercero__ingresar.", ".$septiembre__origen__decimo__tercero__ingresar.", ".$octubre__origen__decimo__tercero__ingresar.", ".$noviembre__origen__decimo__tercero__ingresar.", ".$diciembre__origen__decimo__tercero__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Décimo tercer sueldo  ======*/


		 		/*=====================================
		 		=            Décimo cuarto            =
		 		=====================================*/

		 		$origenDecimoCuarto=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar,$febrero__origen__decimo__cuarto__ingresar,$marzo__origen__decimo__cuarto__ingresar,$abril__origen__decimo__cuarto__ingresar,$mayo__origen__decimo__cuarto__ingresar,$junio__origen__decimo__cuarto__ingresar,$julio__origen__decimo__cuarto__ingresar,$agosto__origen__decimo__cuarto__ingresar,$septiembre__origen__decimo__cuarto__ingresar,$octubre__origen__decimo__cuarto__ingresar,$noviembre__origen__decimo__cuarto__ingresar,$diciembre__origen__decimo__cuarto__ingresar,$total__origen__decimo__cuarto__totales__ingresados]);

		 		$origenDecimoCuartoObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
		 		

				$queryOrigenDecimoCuarto="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuarto[0]',febrero='$origenDecimoCuarto[1]',marzo='$origenDecimoCuarto[2]',abril='$origenDecimoCuarto[3]',mayo='$origenDecimoCuarto[4]',junio='$origenDecimoCuarto[5]',julio='$origenDecimoCuarto[6]',agosto='$origenDecimoCuarto[7]',septiembre='$origenDecimoCuarto[8]',octubre='$origenDecimoCuarto[9]',noviembre='$origenDecimoCuarto[10]',diciembre='$origenDecimoCuarto[11]',totalTotales='$origenDecimoCuarto[12]',enero2='".$origenDecimoCuartoObtener[0][enero]."',febrero2='".$origenDecimoCuartoObtener[0][febrero]."',marzo2='".$origenDecimoCuartoObtener[0][marzo]."',abril2='".$origenDecimoCuartoObtener[0][abril]."',mayo2='".$origenDecimoCuartoObtener[0][mayo]."',junio2='".$origenDecimoCuartoObtener[0][junio]."',julio2='".$origenDecimoCuartoObtener[0][julio]."',agosto2='".$origenDecimoCuartoObtener[0][agosto]."',septiembre2='".$origenDecimoCuartoObtener[0][septiembre]."',octubre2='".$origenDecimoCuartoObtener[0][octubre]."',noviembre2='".$origenDecimoCuartoObtener[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtener[0][diciembre]."',total2='".$origenDecimoCuartoObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

				$resultadoOrigenDecimoCuarto= $conexionEstablecida->exec($queryOrigenDecimoCuarto);		 
		 		

				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	
		 		

		 		/*=====  End of Décimo cuarto  ======*/


		 		/*==========================================
		 		=            Fondos de ereserva            =
		 		==========================================*/

		 		$origenFondosReserva=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar,$febrero__origen__fondos__de__reserva__ingresar,$marzo__origen__fondos__de__reserva__ingresar,$abril__origen__fondos__de__reserva__ingresar,$mayo__origen__fondos__de__reserva__ingresar,$junio__origen__fondos__de__reserva__ingresar,$julio__origen__fondos__de__reserva__ingresar,$agosto__origen__fondos__de__reserva__ingresar,$septiembre__origen__fondos__de__reserva__ingresar,$octubre__origen__fondos__de__reserva__ingresar,$noviembre__origen__fondos__de__reserva__ingresar,$diciembre__origen__fondos__de__reserva__ingresar,$total__origen__fondos__de__reserva__totales__ingresados]);

		 		$origenFondosReservaObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

		 		$queryOrigenFondosReserva="UPDATE poa_programacion_financiera SET enero='$origenFondosReserva[0]',febrero='$origenFondosReserva[1]',marzo='$origenFondosReserva[2]',abril='$origenFondosReserva[3]',mayo='$origenFondosReserva[4]',junio='$origenFondosReserva[5]',julio='$origenFondosReserva[6]',agosto='$origenFondosReserva[7]',septiembre='$origenFondosReserva[8]',octubre='$origenFondosReserva[9]',noviembre='$origenFondosReserva[10]',diciembre='$origenFondosReserva[11]',totalTotales='$origenFondosReserva[12]',enero2='".$origenFondosReservaObtener[0][enero]."',febrero2='".$origenFondosReservaObtener[0][febrero]."',marzo2='".$origenFondosReservaObtener[0][marzo]."',abril2='".$origenFondosReservaObtener[0][abril]."',mayo2='".$origenFondosReservaObtener[0][mayo]."',junio2='".$origenFondosReservaObtener[0][junio]."',julio2='".$origenFondosReservaObtener[0][julio]."',agosto2='".$origenFondosReservaObtener[0][agosto]."',septiembre2='".$origenFondosReservaObtener[0][septiembre]."',octubre2='".$origenFondosReservaObtener[0][octubre]."',noviembre2='".$origenFondosReservaObtener[0][noviembre]."',diciembre2='".$origenFondosReservaObtener[0][diciembre]."',total2='".$origenFondosReservaObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

				$resultadoFondosReserva= $conexionEstablecida->exec($queryOrigenFondosReserva);		 
		 		
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Fondos de ereserva  ======*/

		 		/*================================
		 		=            Salarios            =
		 		================================*/

		 		$origenSalarios=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar,$febrero__origen__salarios__ingresar,$marzo__origen__salarios__ingresar,$abril__origen__salarios__ingresar,$mayo__origen__salarios__ingresar,$junio__origen__salarios__ingresar,$julio__origen__salarios__ingresar,$agosto__origen__salarios__ingresar,$septiembre__origen__salarios__ingresar,$octubre__origen__salarios__ingresar,$noviembre__origen__salarios__ingresar,$diciembre__origen__salarios__ingresar,$total__origen__salarios__totales__ingresados]);


		 		$origenSalariosObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

		 		$queryOrigenSalarios="UPDATE poa_programacion_financiera SET enero='$origenSalarios[0]',febrero='$origenSalarios[1]',marzo='$origenSalarios[2]',abril='$origenSalarios[3]',mayo='$origenSalarios[4]',junio='$origenSalarios[5]',julio='$origenSalarios[6]',agosto='$origenSalarios[7]',septiembre='$origenSalarios[8]',octubre='$origenSalarios[9]',noviembre='$origenSalarios[10]',diciembre='$origenSalarios[11]',totalTotales='$origenSalarios[12]',enero2='".$origenSalariosObtener[0][enero]."',febrero2='".$origenSalariosObtener[0][febrero]."',marzo2='".$origenSalariosObtener[0][marzo]."',abril2='".$origenSalariosObtener[0][abril]."',mayo2='".$origenSalariosObtener[0][mayo]."',junio2='".$origenSalariosObtener[0][junio]."',julio2='".$origenSalariosObtener[0][julio]."',agosto2='".$origenSalariosObtener[0][agosto]."',septiembre2='".$origenSalariosObtener[0][septiembre]."',octubre2='".$origenSalariosObtener[0][octubre]."',noviembre2='".$origenSalariosObtener[0][noviembre]."',diciembre2='".$origenSalariosObtener[0][diciembre]."',total2='".$origenSalariosObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

		 		$resultadoSalarios= $conexionEstablecida->exec($queryOrigenSalarios);	

				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar.", ".$febrero__origen__salarios__ingresar.", ".$marzo__origen__salarios__ingresar.", ".$abril__origen__salarios__ingresar.", ".$mayo__origen__salarios__ingresar.", ".$junio__origen__salarios__ingresar.", ".$julio__origen__salarios__ingresar.", ".$agosto__origen__salarios__ingresar.", ".$septiembre__origen__salarios__ingresar.", ".$octubre__origen__salarios__ingresar.", ".$noviembre__origen__salarios__ingresar.", ".$diciembre__origen__salarios__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


		 		/*=====  End of Salarios  ======*/
		 	
				/*=====  End of Orígen  ======*/

				/*===============================
				=            Destino            =
				===============================*/
				
				$obtenerSalariosInformacionRestarDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinancierioDestino';",[$eneroDestino__sueldos,$febreroDestino__sueldos,$marzoDestino__sueldos,$abrilDestino__sueldos,$mayoDestino__sueldos,$junioDestino__sueldos,$julioDestino__sueldos,$agostoDestino__sueldos,$septiembreDestino__sueldos,$octubreDestino__sueldos,$noviembreDestino__sueldos,$diciembreDestino__sueldos,$totalMesAsignados__destinos]);

				$obtenerSalariosInformacionDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$idFinancierioDestino';");


		 		$queryEjectuadoDestino="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestarDestino[0]',febrero='$obtenerSalariosInformacionRestarDestino[1]',marzo='$obtenerSalariosInformacionRestarDestino[2]',abril='$obtenerSalariosInformacionRestarDestino[3]',mayo='$obtenerSalariosInformacionRestarDestino[4]',junio='$obtenerSalariosInformacionRestarDestino[5]',julio='$obtenerSalariosInformacionRestarDestino[6]',agosto='$obtenerSalariosInformacionRestarDestino[7]',septiembre='$obtenerSalariosInformacionRestarDestino[8]',octubre='$obtenerSalariosInformacionRestarDestino[9]',noviembre='$obtenerSalariosInformacionRestarDestino[10]',diciembre='$obtenerSalariosInformacionRestarDestino[11]',total='$obtenerSalariosInformacionRestarDestino[12]',enero2='".$obtenerSalariosInformacionDestino[0][enero]."',febrero2='".$obtenerSalariosInformacionDestino[0][febrero]."',marzo2='".$obtenerSalariosInformacionDestino[0][marzo]."',abril2='".$obtenerSalariosInformacionDestino[0][abril]."',mayo2='".$obtenerSalariosInformacionDestino[0][mayo]."',junio2='".$obtenerSalariosInformacionDestino[0][junio]."',julio2='".$obtenerSalariosInformacionDestino[0][julio]."',agosto2='".$obtenerSalariosInformacionDestino[0][agosto]."',septiembre2='".$obtenerSalariosInformacionDestino[0][septiembre]."',octubre2='".$obtenerSalariosInformacionDestino[0][octubre]."',noviembre2='".$obtenerSalariosInformacionDestino[0][noviembre]."',diciembre2='".$obtenerSalariosInformacionDestino[0][diciembre]."',total2='".$obtenerSalariosInformacionDestino[0][total]."'  WHERE idSueldos='$idFinancierioDestino';";
		 		$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);




		 		/*=======================================
		 		=            Aporte patronal            =
		 		=======================================*/
		 		
		 		$origenPatronalDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar__destino,$febrero__origen__aporte__patronal__ingresar__destino,$marzo__origen__aporte__patronal__ingresar__destino,$abril__origen__aporte__patronal__ingresar__destino,$mayo__origen__aporte__patronal__ingresar__destino,$junio__origen__aporte__patronal__ingresar__destino,$julio__origen__aporte__patronal__ingresar__destino,$agosto__origen__aporte__patronal__ingresar__destino,$septiembre__origen__aporte__patronal__ingresar__destino,$octubre__origen__aporte__patronal__ingresar__destino,$noviembre__origen__aporte__patronal__ingresar__destino,$diciembre__origen__aporte__patronal__ingresar__destino,$total__origen__patronal__totales__ingresados__destino]);

				$origenPatronalObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

				
				$queryOrigenPatronalDestino="UPDATE poa_programacion_financiera SET enero='$origenPatronalDestino[0]',febrero='$origenPatronalDestino[1]',marzo='$origenPatronalDestino[2]',abril='$origenPatronalDestino[3]',mayo='$origenPatronalDestino[4]',junio='$origenPatronalDestino[5]',julio='$origenPatronalDestino[6]',agosto='$origenPatronalDestino[7]',septiembre='$origenPatronalDestino[8]',octubre='$origenPatronalDestino[9]',noviembre='$origenPatronalDestino[10]',diciembre='$origenPatronalDestino[11]',totalTotales='$origenPatronalDestino[12]',enero2='".$origenPatronalObtenerDestino[0][enero]."',febrero2='".$origenPatronalObtenerDestino[0][febrero]."',marzo2='".$origenPatronalObtenerDestino[0][marzo]."',abril2='".$origenPatronalObtenerDestino[0][abril]."',mayo2='".$origenPatronalObtenerDestino[0][mayo]."',junio2='".$origenPatronalObtenerDestino[0][junio]."',julio2='".$origenPatronalObtenerDestino[0][julio]."',agosto2='".$origenPatronalObtenerDestino[0][agosto]."',septiembre2='".$origenPatronalObtenerDestino[0][septiembre]."',octubre2='".$origenPatronalObtenerDestino[0][octubre]."',noviembre2='".$origenPatronalObtenerDestino[0][noviembre]."',diciembre2='".$origenPatronalObtenerDestino[0][diciembre]."',total2='".$origenPatronalObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
							 			
				$resultadoOrigenPatronalDestino= $conexionEstablecida->exec($queryOrigenPatronalDestino);		 		
		 		
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar__destino.", ".$febrero__origen__aporte__patronal__ingresar__destino.", ".$marzo__origen__aporte__patronal__ingresar__destino.", ".$abril__origen__aporte__patronal__ingresar__destino.", ".$mayo__origen__aporte__patronal__ingresar__destino.", ".$junio__origen__aporte__patronal__ingresar__destino.", ".$julio__origen__aporte__patronal__ingresar__destino.", ".$agosto__origen__aporte__patronal__ingresar__destino.", ".$septiembre__origen__aporte__patronal__ingresar__destino.", ".$octubre__origen__aporte__patronal__ingresar__destino.", ".$noviembre__origen__aporte__patronal__ingresar__destino.", ".$diciembre__origen__aporte__patronal__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','destino');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Aporte patronal  ======*/

		 		
		 		/*============================================
		 		=            Décimo tercer sueldo            =
		 		============================================*/
		 		
		 		$origenDecimoTercerDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar__destino,$febrero__origen__decimo__tercero__ingresar__destino,$marzo__origen__decimo__tercero__ingresar__destino,$abril__origen__decimo__tercero__ingresar__destino,$mayo__origen__decimo__tercero__ingresar__destino,$junio__origen__decimo__tercero__ingresar__destino,$julio__origen__decimo__tercero__ingresar__destino,$agosto__origen__decimo__tercero__ingresar__destino,$septiembre__origen__decimo__tercero__ingresar__destino,$octubre__origen__decimo__tercero__ingresar__destino,$noviembre__origen__decimo__tercero__ingresar__destino,$diciembre__origen__decimo__tercero__ingresar__destino,$total__origen__decimo__tercero__totales__ingresados__destino]);

		 		$origenDecimoTercerObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

				$queryOrigenDecimoTercerDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercerDestino[0]',febrero='$origenDecimoTercerDestino[1]',marzo='$origenDecimoTercerDestino[2]',abril='$origenDecimoTercerDestino[3]',mayo='$origenDecimoTercerDestino[4]',junio='$origenDecimoTercerDestino[5]',julio='$origenDecimoTercerDestino[6]',agosto='$origenDecimoTercerDestino[7]',septiembre='$origenDecimoTercerDestino[8]',octubre='$origenDecimoTercerDestino[9]',noviembre='$origenDecimoTercerDestino[10]',diciembre='$origenDecimoTercerDestino[11]',totalTotales='$origenDecimoTercerDestino[12]',enero2='".$origenDecimoTercerObtenerDestino[0][enero]."',febrero2='".$origenDecimoTercerObtenerDestino[0][febrero]."',marzo2='".$origenDecimoTercerObtenerDestino[0][marzo]."',abril2='".$origenDecimoTercerObtenerDestino[0][abril]."',mayo2='".$origenDecimoTercerObtenerDestino[0][mayo]."',junio2='".$origenDecimoTercerObtenerDestino[0][junio]."',julio2='".$origenDecimoTercerObtenerDestino[0][julio]."',agosto2='".$origenDecimoTercerObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoTercerObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoTercerObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoTercerObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoTercerObtenerDestino[0][diciembre]."',total2='".$origenDecimoTercerObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

				$resultadoOrigenDecimoTercerDestino= $conexionEstablecida->exec($queryOrigenDecimoTercerDestino);		 

				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar__destino.", ".$febrero__origen__decimo__tercero__ingresar__destino.", ".$marzo__origen__decimo__tercero__ingresar__destino.", ".$abril__origen__decimo__tercero__ingresar__destino.", ".$mayo__origen__decimo__tercero__ingresar__destino.", ".$junio__origen__decimo__tercero__ingresar__destino.", ".$julio__origen__decimo__tercero__ingresar__destino.", ".$agosto__origen__decimo__tercero__ingresar__destino.", ".$septiembre__origen__decimo__tercero__ingresar__destino.", ".$octubre__origen__decimo__tercero__ingresar__destino.", ".$noviembre__origen__decimo__tercero__ingresar__destino.", ".$diciembre__origen__decimo__tercero__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','destino');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		
		 		/*=====  End of Décimo tercer sueldo  ======*/
		 		

		 		/*=====================================
		 		=            Décimo cuarto            =
		 		=====================================*/
		 		
		 		$origenDecimoCuartoDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar__destino,$febrero__origen__decimo__cuarto__ingresar__destino,$marzo__origen__decimo__cuarto__ingresar__destino,$abril__origen__decimo__cuarto__ingresar__destino,$mayo__origen__decimo__cuarto__ingresar__destino,$junio__origen__decimo__cuarto__ingresar__destino,$julio__origen__decimo__cuarto__ingresar__destino,$agosto__origen__decimo__cuarto__ingresar__destino,$septiembre__origen__decimo__cuarto__ingresar__destino,$octubre__origen__decimo__cuarto__ingresar__destino,$noviembre__origen__decimo__cuarto__ingresar__destino,$diciembre__origen__decimo__cuarto__ingresar__destino,$total__origen__decimo__cuarto__totales__ingresados__destino]);

		 		$origenDecimoCuartoObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
		 		

				$queryOrigenDecimoCuartoDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuartoDestino[0]',febrero='$origenDecimoCuartoDestino[1]',marzo='$origenDecimoCuartoDestino[2]',abril='$origenDecimoCuartoDestino[3]',mayo='$origenDecimoCuartoDestino[4]',junio='$origenDecimoCuartoDestino[5]',julio='$origenDecimoCuartoDestino[6]',agosto='$origenDecimoCuartoDestino[7]',septiembre='$origenDecimoCuartoDestino[8]',octubre='$origenDecimoCuartoDestino[9]',noviembre='$origenDecimoCuartoDestino[10]',diciembre='$origenDecimoCuartoDestino[11]',totalTotales='$origenDecimoCuartoDestino[12]',enero2='".$origenDecimoCuartoObtenerDestino[0][enero]."',febrero2='".$origenDecimoCuartoObtenerDestino[0][febrero]."',marzo2='".$origenDecimoCuartoObtenerDestino[0][marzo]."',abril2='".$origenDecimoCuartoObtenerDestino[0][abril]."',mayo2='".$origenDecimoCuartoObtenerDestino[0][mayo]."',junio2='".$origenDecimoCuartoObtenerDestino[0][junio]."',julio2='".$origenDecimoCuartoObtenerDestino[0][julio]."',agosto2='".$origenDecimoCuartoObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoCuartoObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoCuartoObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoCuartoObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtenerDestino[0][diciembre]."',total2='".$origenDecimoCuartoObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

				$resultadoOrigenDecimoCuartoDestino= $conexionEstablecida->exec($queryOrigenDecimoCuartoDestino);		 
		 		
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar__destino.", ".$febrero__origen__decimo__cuarto__ingresar__destino.", ".$marzo__origen__decimo__cuarto__ingresar__destino.", ".$abril__origen__decimo__cuarto__ingresar__destino.", ".$mayo__origen__decimo__cuarto__ingresar__destino.", ".$junio__origen__decimo__cuarto__ingresar__destino.", ".$julio__origen__decimo__cuarto__ingresar__destino.", ".$agosto__origen__decimo__cuarto__ingresar__destino.", ".$septiembre__origen__decimo__cuarto__ingresar__destino.", ".$octubre__origen__decimo__cuarto__ingresar__destino.", ".$noviembre__origen__decimo__cuarto__ingresar__destino.", ".$diciembre__origen__decimo__cuarto__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','destino');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	



		 		/*=====  End of Décimo cuarto  ======*/



		 		/*==========================================
		 		=            Fondos de ereserva            =
		 		==========================================*/
		 		
		 		$origenFondosReservaDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar__destino,$febrero__origen__fondos__de__reserva__ingresar__destino,$marzo__origen__fondos__de__reserva__ingresar__destino,$abril__origen__fondos__de__reserva__ingresar__destino,$mayo__origen__fondos__de__reserva__ingresar__destino,$junio__origen__fondos__de__reserva__ingresar__destino,$julio__origen__fondos__de__reserva__ingresar__destino,$agosto__origen__fondos__de__reserva__ingresar__destino,$septiembre__origen__fondos__de__reserva__ingresar__destino,$octubre__origen__fondos__de__reserva__ingresar__destino,$noviembre__origen__fondos__de__reserva__ingresar__destino,$diciembre__origen__fondos__de__reserva__ingresar__destino,$total__origen__fondos__de__reserva__totales__ingresados__destino]);

		 		$origenFondosReservaObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

		 		$queryOrigenFondosReservaDestino="UPDATE poa_programacion_financiera SET enero='$origenFondosReservaDestino[0]',febrero='$origenFondosReservaDestino[1]',marzo='$origenFondosReservaDestino[2]',abril='$origenFondosReservaDestino[3]',mayo='$origenFondosReservaDestino[4]',junio='$origenFondosReservaDestino[5]',julio='$origenFondosReservaDestino[6]',agosto='$origenFondosReservaDestino[7]',septiembre='$origenFondosReservaDestino[8]',octubre='$origenFondosReservaDestino[9]',noviembre='$origenFondosReservaDestino[10]',diciembre='$origenFondosReservaDestino[11]',totalTotales='$origenFondosReservaDestino[12]',enero2='".$origenFondosReservaObtenerDestino[0][enero]."',febrero2='".$origenFondosReservaObtenerDestino[0][febrero]."',marzo2='".$origenFondosReservaObtenerDestino[0][marzo]."',abril2='".$origenFondosReservaObtenerDestino[0][abril]."',mayo2='".$origenFondosReservaObtenerDestino[0][mayo]."',junio2='".$origenFondosReservaObtenerDestino[0][junio]."',julio2='".$origenFondosReservaObtenerDestino[0][julio]."',agosto2='".$origenFondosReservaObtenerDestino[0][agosto]."',septiembre2='".$origenFondosReservaObtenerDestino[0][septiembre]."',octubre2='".$origenFondosReservaObtenerDestino[0][octubre]."',noviembre2='".$origenFondosReservaObtenerDestino[0][noviembre]."',diciembre2='".$origenFondosReservaObtenerDestino[0][diciembre]."',total2='".$origenFondosReservaObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

				$resultadoFondosReservaDestino= $conexionEstablecida->exec($queryOrigenFondosReservaDestino);		 
		 		

				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__fondos__de__reserva__ingresar__destino.", ".$febrero__origen__fondos__de__reserva__ingresar__destino.", ".$marzo__origen__fondos__de__reserva__ingresar__destino.", ".$abril__origen__fondos__de__reserva__ingresar__destino.", ".$mayo__origen__fondos__de__reserva__ingresar__destino.", ".$junio__origen__fondos__de__reserva__ingresar__destino.", ".$julio__origen__fondos__de__reserva__ingresar__destino.", ".$agosto__origen__fondos__de__reserva__ingresar__destino.", ".$septiembre__origen__fondos__de__reserva__ingresar__destino.", ".$octubre__origen__fondos__de__reserva__ingresar__destino.", ".$noviembre__origen__fondos__de__reserva__ingresar__destino.", ".$diciembre__origen__fondos__de__reserva__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','destino');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Fondos de ereserva  ======*/


		 		
		 		/*================================
		 		=            Salarios            =
		 		================================*/
		 		
		 		$origenSalariosDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar__destino,$febrero__origen__salarios__ingresar__destino,$marzo__origen__salarios__ingresar__destino,$abril__origen__salarios__ingresar__destino,$mayo__origen__salarios__ingresar__destino,$junio__origen__salarios__ingresar__destino,$julio__origen__salarios__ingresar__destino,$agosto__origen__salarios__ingresar__destino,$septiembre__origen__salarios__ingresar__destino,$octubre__origen__salarios__ingresar__destino,$noviembre__origen__salarios__ingresar__destino,$diciembre__origen__salarios__ingresar__destino,$total__origen__salarios__totales__ingresados__destino]);


		 		$origenSalariosObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

		 		$queryOrigenSalariosDestino="UPDATE poa_programacion_financiera SET enero='$origenSalariosDestino[0]',febrero='$origenSalariosDestino[1]',marzo='$origenSalariosDestino[2]',abril='$origenSalariosDestino[3]',mayo='$origenSalariosDestino[4]',junio='$origenSalariosDestino[5]',julio='$origenSalariosDestino[6]',agosto='$origenSalariosDestino[7]',septiembre='$origenSalariosDestino[8]',octubre='$origenSalariosDestino[9]',noviembre='$origenSalariosDestino[10]',diciembre='$origenSalariosDestino[11]',totalTotales='$origenSalariosDestino[12]',enero2='".$origenSalariosObtenerDestino[0][enero]."',febrero2='".$origenSalariosObtenerDestino[0][febrero]."',marzo2='".$origenSalariosObtenerDestino[0][marzo]."',abril2='".$origenSalariosObtenerDestino[0][abril]."',mayo2='".$origenSalariosObtenerDestino[0][mayo]."',junio2='".$origenSalariosObtenerDestino[0][junio]."',julio2='".$origenSalariosObtenerDestino[0][julio]."',agosto2='".$origenSalariosObtenerDestino[0][agosto]."',septiembre2='".$origenSalariosObtenerDestino[0][septiembre]."',octubre2='".$origenSalariosObtenerDestino[0][octubre]."',noviembre2='".$origenSalariosObtenerDestino[0][noviembre]."',diciembre2='".$origenSalariosObtenerDestino[0][diciembre]."',total2='".$origenSalariosObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

		 		$resultadoSalariosDestino= $conexionEstablecida->exec($queryOrigenSalariosDestino);	


				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar__destino.", ".$febrero__origen__salarios__ingresar__destino.", ".$marzo__origen__salarios__ingresar__destino.", ".$abril__origen__salarios__ingresar__destino.", ".$mayo__origen__salarios__ingresar__destino.", ".$junio__origen__salarios__ingresar__destino.", ".$julio__origen__salarios__ingresar__destino.", ".$agosto__origen__salarios__ingresar__destino.", ".$septiembre__origen__salarios__ingresar__destino.", ".$octubre__origen__salarios__ingresar__destino.", ".$noviembre__origen__salarios__ingresar__destino.", ".$diciembre__origen__salarios__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','destino');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


		 		/*=====  End of Salarios  ======*/
		 		

				/*=====  End of Destino  ======*/				



		 	}else if($identificadorPaginaReal=="desvinculacion"){

		 		$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `salarioOrigen`, `aportePatronalOrigen`, `decimoTerceroOrigen`, `decimoCuartoOrigen`, `fondosDeReservaOrigen`, `salarioOrigen__restando`, `aportePatronalOrigen__restando`, `decimoTerceroOrigen__restando`, `decimoCuartoOrigen__restando`, `fondosDeReservaOrigen__restando`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL,'4', '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen__sueldos, $febreroOrigen__sueldos, $marzoOrigen__sueldos, $abrilOrigen__sueldos, $mayoOrigen__sueldos, $junioOrigen__sueldos, $julioOrigen__sueldos, $agostoOrigen__sueldos, $septiembreOrigen__sueldos, $octubreOrigen__sueldos, $noviembreOrigen__sueldos, $diciembreOrigen__sueldos, $totalOrigen, $enero__origen__restante, $febrero__origen__restante, $marzo__origen__restante, $abril__origen__restante, $mayo__origen__restante, $junio__origen__restante, $julio__origen__restante, $agosto__origen__restante, $septiembre__origen__restante, $octubre__origen__restante, $noviembre__origen__restante, $diciembre__origen__restante,'4', '$desvinculacion__modificaciones', $desvinculacion__modificaciones, $eneroDesvinculacion__sumando, $febreroDesvinculacion__sumando, $marzoDesvinculacion__sumando, $abrilDesvinculacion__sumando, $mayoDesvinculacion__sumando, $junioDesvinculacion__sumando, $julioDesvinculacion__sumando, $agostoDesvinculacion__sumando, $septiembreDesvinculacion__sumando, $octubreDesvinculacion__sumando, $noviembreDesvinculacion__sumando, $diciembreDesvinculacion__sumando, $totalDesvinculacion__sumar, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','$identificadorPaginaReal','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 		$resultado= $conexionEstablecida->exec($query);

		 		$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");


				/*==============================
				=            Orígen            =
				==============================*/

				
				$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';",[$eneroOrigen__sueldos,$febreroOrigen__sueldos,$marzoOrigen__sueldos,$abrilOrigen__sueldos,$mayoOrigen__sueldos,$junioOrigen__sueldos,$julioOrigen__sueldos,$agostoOrigen__sueldos,$septiembreOrigen__sueldos,$octubreOrigen__sueldos,$noviembreOrigen__sueldos,$diciembreOrigen__sueldos,$totalOrigen]);

		 		$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';");


		 		$queryEjectuado="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idSueldos='$persona_sueldos_data';";
		 		$resultadoEjecutado= $conexionEstablecida->exec($queryEjectuado);




		 		/*=======================================
		 		=            Aporte patronal            =
		 		=======================================*/
		 		
		 		$origenPatronal=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar,$febrero__origen__aporte__patronal__ingresar,$marzo__origen__aporte__patronal__ingresar,$abril__origen__aporte__patronal__ingresar,$mayo__origen__aporte__patronal__ingresar,$junio__origen__aporte__patronal__ingresar,$julio__origen__aporte__patronal__ingresar,$agosto__origen__aporte__patronal__ingresar,$septiembre__origen__aporte__patronal__ingresar,$octubre__origen__aporte__patronal__ingresar,$noviembre__origen__aporte__patronal__ingresar,$diciembre__origen__aporte__patronal__ingresar,$total__origen__patronal__totales__ingresados]);

				$origenPatronalObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

				
				$queryOrigenPatronal="UPDATE poa_programacion_financiera SET enero='$origenPatronal[0]',febrero='$origenPatronal[1]',marzo='$origenPatronal[2]',abril='$origenPatronal[3]',mayo='$origenPatronal[4]',junio='$origenPatronal[5]',julio='$origenPatronal[6]',agosto='$origenPatronal[7]',septiembre='$origenPatronal[8]',octubre='$origenPatronal[9]',noviembre='$origenPatronal[10]',diciembre='$origenPatronal[11]',totalTotales='$origenPatronal[12]',enero2='".$origenPatronalObtener[0][enero]."',febrero2='".$origenPatronalObtener[0][febrero]."',marzo2='".$origenPatronalObtener[0][marzo]."',abril2='".$origenPatronalObtener[0][abril]."',mayo2='".$origenPatronalObtener[0][mayo]."',junio2='".$origenPatronalObtener[0][junio]."',julio2='".$origenPatronalObtener[0][julio]."',agosto2='".$origenPatronalObtener[0][agosto]."',septiembre2='".$origenPatronalObtener[0][septiembre]."',octubre2='".$origenPatronalObtener[0][octubre]."',noviembre2='".$origenPatronalObtener[0][noviembre]."',diciembre2='".$origenPatronalObtener[0][diciembre]."',total2='".$origenPatronalObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
							 			
				$resultadoOrigenPatronal= $conexionEstablecida->exec($queryOrigenPatronal);		 		
		 		
				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar.", ".$febrero__origen__aporte__patronal__ingresar.", ".$marzo__origen__aporte__patronal__ingresar.", ".$abril__origen__aporte__patronal__ingresar.", ".$mayo__origen__aporte__patronal__ingresar.", ".$junio__origen__aporte__patronal__ingresar.", ".$julio__origen__aporte__patronal__ingresar.", ".$agosto__origen__aporte__patronal__ingresar.", ".$septiembre__origen__aporte__patronal__ingresar.", ".$octubre__origen__aporte__patronal__ingresar.", ".$noviembre__origen__aporte__patronal__ingresar.", ".$diciembre__origen__aporte__patronal__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Aporte patronal  ======*/

		 		
		 		/*============================================
		 		=            Décimo tercer sueldo            =
		 		============================================*/
		 		
		 		$origenDecimoTercer=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar,$febrero__origen__decimo__tercero__ingresar,$marzo__origen__decimo__tercero__ingresar,$abril__origen__decimo__tercero__ingresar,$mayo__origen__decimo__tercero__ingresar,$junio__origen__decimo__tercero__ingresar,$julio__origen__decimo__tercero__ingresar,$agosto__origen__decimo__tercero__ingresar,$septiembre__origen__decimo__tercero__ingresar,$octubre__origen__decimo__tercero__ingresar,$noviembre__origen__decimo__tercero__ingresar,$diciembre__origen__decimo__tercero__ingresar,$total__origen__decimo__tercero__totales__ingresados]);

		 		$origenDecimoTercerObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

				$queryOrigenDecimoTercer="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercer[0]',febrero='$origenDecimoTercer[1]',marzo='$origenDecimoTercer[2]',abril='$origenDecimoTercer[3]',mayo='$origenDecimoTercer[4]',junio='$origenDecimoTercer[5]',julio='$origenDecimoTercer[6]',agosto='$origenDecimoTercer[7]',septiembre='$origenDecimoTercer[8]',octubre='$origenDecimoTercer[9]',noviembre='$origenDecimoTercer[10]',diciembre='$origenDecimoTercer[11]',totalTotales='$origenDecimoTercer[12]',enero2='".$origenDecimoTercerObtener[0][enero]."',febrero2='".$origenDecimoTercerObtener[0][febrero]."',marzo2='".$origenDecimoTercerObtener[0][marzo]."',abril2='".$origenDecimoTercerObtener[0][abril]."',mayo2='".$origenDecimoTercerObtener[0][mayo]."',junio2='".$origenDecimoTercerObtener[0][junio]."',julio2='".$origenDecimoTercerObtener[0][julio]."',agosto2='".$origenDecimoTercerObtener[0][agosto]."',septiembre2='".$origenDecimoTercerObtener[0][septiembre]."',octubre2='".$origenDecimoTercerObtener[0][octubre]."',noviembre2='".$origenDecimoTercerObtener[0][noviembre]."',diciembre2='".$origenDecimoTercerObtener[0][diciembre]."',total2='".$origenDecimoTercerObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

				$resultadoOrigenDecimoTercer= $conexionEstablecida->exec($queryOrigenDecimoTercer);		 

		 		
				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar.", ".$febrero__origen__decimo__tercero__ingresar.", ".$marzo__origen__decimo__tercero__ingresar.", ".$abril__origen__decimo__tercero__ingresar.", ".$mayo__origen__decimo__tercero__ingresar.", ".$junio__origen__decimo__tercero__ingresar.", ".$julio__origen__decimo__tercero__ingresar.", ".$agosto__origen__decimo__tercero__ingresar.", ".$septiembre__origen__decimo__tercero__ingresar.", ".$octubre__origen__decimo__tercero__ingresar.", ".$noviembre__origen__decimo__tercero__ingresar.", ".$diciembre__origen__decimo__tercero__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Décimo tercer sueldo  ======*/


		 		/*=====================================
		 		=            Décimo cuarto            =
		 		=====================================*/
		 		
		 		$origenDecimoCuarto=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar,$febrero__origen__decimo__cuarto__ingresar,$marzo__origen__decimo__cuarto__ingresar,$abril__origen__decimo__cuarto__ingresar,$mayo__origen__decimo__cuarto__ingresar,$junio__origen__decimo__cuarto__ingresar,$julio__origen__decimo__cuarto__ingresar,$agosto__origen__decimo__cuarto__ingresar,$septiembre__origen__decimo__cuarto__ingresar,$octubre__origen__decimo__cuarto__ingresar,$noviembre__origen__decimo__cuarto__ingresar,$diciembre__origen__decimo__cuarto__ingresar,$total__origen__decimo__cuarto__totales__ingresados]);

		 		$origenDecimoCuartoObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
		 		

				$queryOrigenDecimoCuarto="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuarto[0]',febrero='$origenDecimoCuarto[1]',marzo='$origenDecimoCuarto[2]',abril='$origenDecimoCuarto[3]',mayo='$origenDecimoCuarto[4]',junio='$origenDecimoCuarto[5]',julio='$origenDecimoCuarto[6]',agosto='$origenDecimoCuarto[7]',septiembre='$origenDecimoCuarto[8]',octubre='$origenDecimoCuarto[9]',noviembre='$origenDecimoCuarto[10]',diciembre='$origenDecimoCuarto[11]',totalTotales='$origenDecimoCuarto[12]',enero2='".$origenDecimoCuartoObtener[0][enero]."',febrero2='".$origenDecimoCuartoObtener[0][febrero]."',marzo2='".$origenDecimoCuartoObtener[0][marzo]."',abril2='".$origenDecimoCuartoObtener[0][abril]."',mayo2='".$origenDecimoCuartoObtener[0][mayo]."',junio2='".$origenDecimoCuartoObtener[0][junio]."',julio2='".$origenDecimoCuartoObtener[0][julio]."',agosto2='".$origenDecimoCuartoObtener[0][agosto]."',septiembre2='".$origenDecimoCuartoObtener[0][septiembre]."',octubre2='".$origenDecimoCuartoObtener[0][octubre]."',noviembre2='".$origenDecimoCuartoObtener[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtener[0][diciembre]."',total2='".$origenDecimoCuartoObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

				$resultadoOrigenDecimoCuarto= $conexionEstablecida->exec($queryOrigenDecimoCuarto);		 
		 		

				
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	
		 		

		 		/*=====  End of Décimo cuarto  ======*/


		 		/*==========================================
		 		=            Fondos de ereserva            =
		 		==========================================*/
		 		
		 		$origenFondosReserva=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar,$febrero__origen__fondos__de__reserva__ingresar,$marzo__origen__fondos__de__reserva__ingresar,$abril__origen__fondos__de__reserva__ingresar,$mayo__origen__fondos__de__reserva__ingresar,$junio__origen__fondos__de__reserva__ingresar,$julio__origen__fondos__de__reserva__ingresar,$agosto__origen__fondos__de__reserva__ingresar,$septiembre__origen__fondos__de__reserva__ingresar,$octubre__origen__fondos__de__reserva__ingresar,$noviembre__origen__fondos__de__reserva__ingresar,$diciembre__origen__fondos__de__reserva__ingresar,$total__origen__fondos__de__reserva__totales__ingresados]);

		 		$origenFondosReservaObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

		 		$queryOrigenFondosReserva="UPDATE poa_programacion_financiera SET enero='$origenFondosReserva[0]',febrero='$origenFondosReserva[1]',marzo='$origenFondosReserva[2]',abril='$origenFondosReserva[3]',mayo='$origenFondosReserva[4]',junio='$origenFondosReserva[5]',julio='$origenFondosReserva[6]',agosto='$origenFondosReserva[7]',septiembre='$origenFondosReserva[8]',octubre='$origenFondosReserva[9]',noviembre='$origenFondosReserva[10]',diciembre='$origenFondosReserva[11]',totalTotales='$origenFondosReserva[12]',enero2='".$origenFondosReservaObtener[0][enero]."',febrero2='".$origenFondosReservaObtener[0][febrero]."',marzo2='".$origenFondosReservaObtener[0][marzo]."',abril2='".$origenFondosReservaObtener[0][abril]."',mayo2='".$origenFondosReservaObtener[0][mayo]."',junio2='".$origenFondosReservaObtener[0][junio]."',julio2='".$origenFondosReservaObtener[0][julio]."',agosto2='".$origenFondosReservaObtener[0][agosto]."',septiembre2='".$origenFondosReservaObtener[0][septiembre]."',octubre2='".$origenFondosReservaObtener[0][octubre]."',noviembre2='".$origenFondosReservaObtener[0][noviembre]."',diciembre2='".$origenFondosReservaObtener[0][diciembre]."',total2='".$origenFondosReservaObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

				$resultadoFondosReserva= $conexionEstablecida->exec($queryOrigenFondosReserva);		 
		 		
				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

		 		/*=====  End of Fondos de ereserva  ======*/

		 		/*================================
		 		=            Salarios            =
		 		================================*/
		 		
		 		$origenSalarios=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar,$febrero__origen__salarios__ingresar,$marzo__origen__salarios__ingresar,$abril__origen__salarios__ingresar,$mayo__origen__salarios__ingresar,$junio__origen__salarios__ingresar,$julio__origen__salarios__ingresar,$agosto__origen__salarios__ingresar,$septiembre__origen__salarios__ingresar,$octubre__origen__salarios__ingresar,$noviembre__origen__salarios__ingresar,$diciembre__origen__salarios__ingresar,$total__origen__salarios__totales__ingresados]);


		 		$origenSalariosObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

		 		$queryOrigenSalarios="UPDATE poa_programacion_financiera SET enero='$origenSalarios[0]',febrero='$origenSalarios[1]',marzo='$origenSalarios[2]',abril='$origenSalarios[3]',mayo='$origenSalarios[4]',junio='$origenSalarios[5]',julio='$origenSalarios[6]',agosto='$origenSalarios[7]',septiembre='$origenSalarios[8]',octubre='$origenSalarios[9]',noviembre='$origenSalarios[10]',diciembre='$origenSalarios[11]',totalTotales='$origenSalarios[12]',enero2='".$origenSalariosObtener[0][enero]."',febrero2='".$origenSalariosObtener[0][febrero]."',marzo2='".$origenSalariosObtener[0][marzo]."',abril2='".$origenSalariosObtener[0][abril]."',mayo2='".$origenSalariosObtener[0][mayo]."',junio2='".$origenSalariosObtener[0][junio]."',julio2='".$origenSalariosObtener[0][julio]."',agosto2='".$origenSalariosObtener[0][agosto]."',septiembre2='".$origenSalariosObtener[0][septiembre]."',octubre2='".$origenSalariosObtener[0][octubre]."',noviembre2='".$origenSalariosObtener[0][noviembre]."',diciembre2='".$origenSalariosObtener[0][diciembre]."',total2='".$origenSalariosObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

		 		$resultadoSalarios= $conexionEstablecida->exec($queryOrigenSalarios);	

				$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar.", ".$febrero__origen__salarios__ingresar.", ".$marzo__origen__salarios__ingresar.", ".$abril__origen__salarios__ingresar.", ".$mayo__origen__salarios__ingresar.", ".$junio__origen__salarios__ingresar.", ".$julio__origen__salarios__ingresar.", ".$agosto__origen__salarios__ingresar.", ".$septiembre__origen__salarios__ingresar.", ".$octubre__origen__salarios__ingresar.", ".$noviembre__origen__salarios__ingresar.", ".$diciembre__origen__salarios__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','origen');";
							 			
				$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


		 		/*=====  End of Salarios  ======*/
		 		

				/*=====  End of Orígen  ======*/
		 			
		 		$origenInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

		 		if (!empty($origenInformacion[0][idProgramacionFinanciera])) {
		 		
		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='".$origenInformacion[0][idProgramacionFinanciera]."';",[$eneroDesvinculacion__sumando,$febreroDesvinculacion__sumando,$marzoDesvinculacion__sumando,$abrilDesvinculacion__sumando,$mayoDesvinculacion__sumando,$junioDesvinculacion__sumando,$julioDesvinculacion__sumando,$agostoDesvinculacion__sumando,$septiembreDesvinculacion__sumando,$octubreDesvinculacion__sumando,$noviembreDesvinculacion__sumando,$diciembreDesvinculacion__sumando,$totalDesvinculacion__sumar]);

		 		}else{

		 			$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '$eneroDesvinculacion__sumando', '$febreroDesvinculacion__sumando', '$marzoDesvinculacion__sumando', '$abrilDesvinculacion__sumando', '$mayoDesvinculacion__sumando', '$junioDesvinculacion__sumando', '$julioDesvinculacion__sumando', '$agostoDesvinculacion__sumando', '$septiembreDesvinculacion__sumando', '$octubreDesvinculacion__sumando', '$noviembreDesvinculacion__sumando', '$diciembreDesvinculacion__sumando', '$totalDesvinculacion__sumar', '$totalDesvinculacion__sumar', NULL, NULL, $idOrganismoSession, $desvinculacion__modificaciones, 4, NULL, '$fecha_actual', '$hora_actual', NULL, NULL, NULL, NULL, NULL, '$aniosPeriodos__ingesos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
		 			$resultado2= $conexionEstablecida->exec($query2);

		 			$origenInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='".$origenInformacion[0][idProgramacionFinanciera]."';",[$origenInformacion[0][enero],$origenInformacion[0][febrero],$origenInformacion[0][marzo],$origenInformacion[0][abril],$origenInformacion[0][mayo],$origenInformacion[0][junio],$origenInformacion[0][julio],$origenInformacion[0][agosto],$origenInformacion[0][septiembre],$origenInformacion[0][octubre],$origenInformacion[0][noviembre],$origenInformacion[0][diciembre],$origenInformacion[0][totalTotales]]);

		 		}

		 		$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

				$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='".$obtenerSalariosInformacion[0][idProgramacionFinanciera]."';";
							 			
				$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);

				/*=============================================
				=            Desvinculacion Orígen            =
				=============================================*/

				if ($desvinculacion__modificaciones==49) {
					$letrero__desvinculacion="desahucio";
				}else if($desvinculacion__modificaciones==156){
					$letrero__desvinculacion="despido";
				}else if($desvinculacion__modificaciones==94){
					$letrero__desvinculacion="renuncia";
				}else if($desvinculacion__modificaciones==50){
					$letrero__desvinculacion="compensaciÃ³n";
				}
				
				$destinoOrigenIgual= $objeto->actualizar__desvinculaciones__destino__sin($persona_sueldos_data,[$eneroDesvinculacion__sumando,$febreroDesvinculacion__sumando,$marzoDesvinculacion__sumando,$abrilDesvinculacion__sumando,$mayoDesvinculacion__sumando,$junioDesvinculacion__sumando,$julioDesvinculacion__sumando,$agostoDesvinculacion__sumando,$septiembreDesvinculacion__sumando,$octubreDesvinculacion__sumando,$noviembreDesvinculacion__sumando,$diciembreDesvinculacion__sumando],$obtenMaximo__origen[0][maximoObtencioOrigen],$letrero__desvinculacion);	
				
				/*=====  End of Desvinculacion Orígen  ======*/


		 			
		 	}else{



		 		if ($identificadorPaginaReal=="diferentes" && $actividadDestinoUsada=="desvinculacionOrigen") {


		 			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen, $febreroOrigen, $marzoOrigen, $abrilOrigen, $mayoOrigen, $junioOrigen, $julioOrigen, $agostoOrigen, $septiembreOrigen, $octubreOrigen, $noviembreOrigen, $diciembreOrigen, $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, '4', '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, 0, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','origenDesvinculacion__item__honorarios','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoVigente','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 			$resultado= $conexionEstablecida->exec($query);

		 			$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

			 		/*===============================
					=            Destino            =
					===============================*/
					
					$destinoOrigenIgual= $objeto->actualizar__desvinculaciones__destino($eventos_intervencion__seleccion,[$enero__destino__desahucio__ingresar,$febrero__destino__desahucio__ingresar,$marzo__destino__desahucio__ingresar,$abril__destino__desahucio__ingresar,$mayo__destino__desahucio__ingresar,$junio__destino__desahucio__ingresar,$julio__destino__desahucio__ingresar,$agosto__destino__desahucio__ingresar,$septiembre__destino__desahucio__ingresar,$octubre__destino__desahucio__ingresar,$noviembre__destino__desahucio__ingresar,$diciembre__destino__desahucio__ingresar],[$enero__destino__despido__intenpestivo__ingresar,$febrero__destino__despido__intenpestivo__ingresar,$marzo__destino__despido__intenpestivo__ingresar,$abril__destino__despido__intenpestivo__ingresar,$mayo__destino__despido__intenpestivo__ingresar,$junio__destino__despido__intenpestivo__ingresar,$julio__destino__despido__intenpestivo__ingresar,$agosto__destino__despido__intenpestivo__ingresar,$septiembre__destino__despido__intenpestivo__ingresar,$octubre__destino__despido__intenpestivo__ingresar,$noviembre__destino__despido__intenpestivo__ingresar,$diciembre__destino__despido__intenpestivo__ingresar],[$enero__destino__renunia__voluntaria__ingresar,$febrero__destino__renunia__voluntaria__ingresar,$marzo__destino__renunia__voluntaria__ingresar,$abril__destino__renunia__voluntaria__ingresar,$mayo__destino__renunia__voluntaria__ingresar,$junio__destino__renunia__voluntaria__ingresar,$julio__destino__renunia__voluntaria__ingresar,$agosto__destino__renunia__voluntaria__ingresar,$septiembre__destino__renunia__voluntaria__ingresar,$octubre__destino__renunia__voluntaria__ingresar,$noviembre__destino__renunia__voluntaria__ingresar,$diciembre__destino__renunia__voluntaria__ingresar],[$enero__destino__vacaciones__no__gozadas__ingresar,$febrero__destino__vacaciones__no__gozadas__ingresar,$marzo__destino__vacaciones__no__gozadas__ingresar,$abril__destino__vacaciones__no__gozadas__ingresar,$mayo__destino__vacaciones__no__gozadas__ingresar,$junio__destino__vacaciones__no__gozadas__ingresar,$julio__destino__vacaciones__no__gozadas__ingresar,$agosto__destino__vacaciones__no__gozadas__ingresar,$septiembre__destino__vacaciones__no__gozadas__ingresar,$octubre__destino__vacaciones__no__gozadas__ingresar,$noviembre__destino__vacaciones__no__gozadas__ingresar,$diciembre__destino__vacaciones__no__gozadas__ingresar],$obtenMaximo__origen[0][maximoObtencioOrigen]);		


					/*=====  End of Destino  ======*/


		 		}else if ($identificadorPaginaReal=="honorarios__item" && $actividadDestino=="desvinculacionOrigen") {

		 			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen, $febreroOrigen, $marzoOrigen, $abrilOrigen, $mayoOrigen, $junioOrigen, $julioOrigen, $agostoOrigen, $septiembreOrigen, $octubreOrigen, $noviembreOrigen, $diciembreOrigen, $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, '4', '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, 0, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','origenDesvinculacion__item__honorarios','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoVigente','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 			$resultado= $conexionEstablecida->exec($query);

		 			$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

			 		/*===============================
					=            Destino            =
					===============================*/
					
					$destinoOrigenIgual= $objeto->actualizar__desvinculaciones__destino($eventos_intervencion__seleccion,[$enero__destino__desahucio__ingresar,$febrero__destino__desahucio__ingresar,$marzo__destino__desahucio__ingresar,$abril__destino__desahucio__ingresar,$mayo__destino__desahucio__ingresar,$junio__destino__desahucio__ingresar,$julio__destino__desahucio__ingresar,$agosto__destino__desahucio__ingresar,$septiembre__destino__desahucio__ingresar,$octubre__destino__desahucio__ingresar,$noviembre__destino__desahucio__ingresar,$diciembre__destino__desahucio__ingresar],[$enero__destino__despido__intenpestivo__ingresar,$febrero__destino__despido__intenpestivo__ingresar,$marzo__destino__despido__intenpestivo__ingresar,$abril__destino__despido__intenpestivo__ingresar,$mayo__destino__despido__intenpestivo__ingresar,$junio__destino__despido__intenpestivo__ingresar,$julio__destino__despido__intenpestivo__ingresar,$agosto__destino__despido__intenpestivo__ingresar,$septiembre__destino__despido__intenpestivo__ingresar,$octubre__destino__despido__intenpestivo__ingresar,$noviembre__destino__despido__intenpestivo__ingresar,$diciembre__destino__despido__intenpestivo__ingresar],[$enero__destino__renunia__voluntaria__ingresar,$febrero__destino__renunia__voluntaria__ingresar,$marzo__destino__renunia__voluntaria__ingresar,$abril__destino__renunia__voluntaria__ingresar,$mayo__destino__renunia__voluntaria__ingresar,$junio__destino__renunia__voluntaria__ingresar,$julio__destino__renunia__voluntaria__ingresar,$agosto__destino__renunia__voluntaria__ingresar,$septiembre__destino__renunia__voluntaria__ingresar,$octubre__destino__renunia__voluntaria__ingresar,$noviembre__destino__renunia__voluntaria__ingresar,$diciembre__destino__renunia__voluntaria__ingresar],[$enero__destino__vacaciones__no__gozadas__ingresar,$febrero__destino__vacaciones__no__gozadas__ingresar,$marzo__destino__vacaciones__no__gozadas__ingresar,$abril__destino__vacaciones__no__gozadas__ingresar,$mayo__destino__vacaciones__no__gozadas__ingresar,$junio__destino__vacaciones__no__gozadas__ingresar,$julio__destino__vacaciones__no__gozadas__ingresar,$agosto__destino__vacaciones__no__gozadas__ingresar,$septiembre__destino__vacaciones__no__gozadas__ingresar,$octubre__destino__vacaciones__no__gozadas__ingresar,$noviembre__destino__vacaciones__no__gozadas__ingresar,$diciembre__destino__vacaciones__no__gozadas__ingresar],$obtenMaximo__origen[0][maximoObtencioOrigen]);		


					/*=====  End of Destino  ======*/

		 			
		 		}else if($identificadorPaginaReal=="origenDesvinculacion" && $actividadDestino!="desvinculacionOrigen"){

					if ($actividadDestino=="sueldosD"){

						$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `sueldoDestino`, `aportePatronalDestino`, `decimoTerceraDestino`, `decimoCuartaDestino`, `fondosReservaDestino`, `sueldoDestino__sumando`, `aportePatronalDestino__sumando`, `decimoTerceraDestino__sumando`, `decimoCuartaDestino__sumando`, `fondosReservaDestino__sumando`, `salarioOrigen`, `aportePatronalOrigen`, `decimoTerceroOrigen`, `decimoCuartoOrigen`, `fondosDeReservaOrigen`, `salarioOrigen__restando`, `aportePatronalOrigen__restando`, `decimoTerceroOrigen__restando`, `decimoCuartoOrigen__restando`, `fondosDeReservaOrigen__restando`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, 4, '$persona_sueldos_data__origen__desvinculacion', $persona_sueldos_data__origen__desvinculacion, $enero__origen__desahucio__ingresar, $febrero__origen__desahucio__ingresar, $marzo__origen__desahucio__ingresar, $abril__origen__desahucio__ingresar, $mayo__origen__desahucio__ingresar, $junio__origen__desahucio__ingresar, $julio__origen__desahucio__ingresar, $agosto__origen__desahucio__ingresar, $septiembre__origen__desahucio__ingresar, $octubre__origen__desahucio__ingresar, $noviembre__origen__desahucio__ingresar, $diciembre__origen__desahucio__ingresar, $totalOrigen, $enero__origen__desahucio__restante, $febrero__origen__desahucio__restante, $marzo__origen__desahucio__restante, $abril__origen__desahucio__restante, $mayo__origen__desahucio__restante, $junio__origen__desahucio__restante, $julio__origen__desahucio__restante, $agosto__origen__desahucio__restante, $septiembre__origen__desahucio__restante, $octubre__origen__desahucio__restante, $noviembre__origen__desahucio__restante, $diciembre__origen__desahucio__restante, '4', '$eventosDestino', $idFinancierioDestino, $eneroDestino__sueldos, $febreroDestino__sueldos, $marzoDestino__sueldos, $abrilDestino__sueldos, $mayoDestino__sueldos, $junioDestino__sueldos, $julioDestino__sueldos, $agostoDestino__sueldos, $septiembreDestino__sueldos, $octubreDestino__sueldos, $noviembreDestino__sueldos, $diciembreDestino__sueldos, $totalMesAsignados__destinos, $enero__origen__restante__destino, $febrero__origen__restante__destino, $marzo__origen__restante__destino, $abril__origen__restante__destino, $mayo__origen__restante__destino, $junio__origen__restante__destino, $julio__origen__restante__destino, $agosto__origen__restante__destino, $septiembre__origen__restante__destino, $octubre__origen__restante__destino, $noviembre__origen__restante__destino, $diciembre__origen__restante__destino, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','origenDesvinculacion__item','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','0','0','0','0','0','0','0','0','0','0','$totalOrigenInicial','$totalOrigenVigente','$sumaDestino1','$sumaDestino1Restante','$totalOrigen','$totalMesAsignados__destinos');";

					}else{

						$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, 4, '$persona_sueldos_data__origen__desvinculacion', $persona_sueldos_data__origen__desvinculacion, $enero__origen__desahucio__ingresar, $febrero__origen__desahucio__ingresar, $marzo__origen__desahucio__ingresar, $abril__origen__desahucio__ingresar, $mayo__origen__desahucio__ingresar, $junio__origen__desahucio__ingresar, $julio__origen__desahucio__ingresar, $agosto__origen__desahucio__ingresar, $septiembre__origen__desahucio__ingresar, $octubre__origen__desahucio__ingresar, $noviembre__origen__desahucio__ingresar, $diciembre__origen__desahucio__ingresar, $totalOrigen, $enero__origen__desahucio__restante, $febrero__origen__desahucio__restante, $marzo__origen__desahucio__restante, $abril__origen__desahucio__restante, $mayo__origen__desahucio__restante, $junio__origen__desahucio__restante, $julio__origen__desahucio__restante, $agosto__origen__desahucio__restante, $septiembre__origen__desahucio__restante, $octubre__origen__desahucio__restante, $noviembre__origen__desahucio__restante, $diciembre__origen__desahucio__restante, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, $totalDestino, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','origenDesvinculacion__item','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoVigente','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

					}

					$resultado= $conexionEstablecida->exec($query);

					$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

					/*==============================
					=            Orígen            =
					==============================*/
					
					$origenDestinoIgual= $objeto->actualizar__desvinculaciones__origen($persona_sueldos_data__origen__desvinculacion,[$enero__origen__desahucio__ingresar,$febrero__origen__desahucio__ingresar,$marzo__origen__desahucio__ingresar,$abril__origen__desahucio__ingresar,$mayo__origen__desahucio__ingresar,$junio__origen__desahucio__ingresar,$julio__origen__desahucio__ingresar,$agosto__origen__desahucio__ingresar,$septiembre__origen__desahucio__ingresar,$octubre__origen__desahucio__ingresar,$noviembre__origen__desahucio__ingresar,$diciembre__origen__desahucio__ingresar],[$enero__origen__despido__intenpestivo__ingresar,$febrero__origen__despido__intenpestivo__ingresar,$marzo__origen__despido__intenpestivo__ingresar,$abril__origen__despido__intenpestivo__ingresar,$mayo__origen__despido__intenpestivo__ingresar,$junio__origen__despido__intenpestivo__ingresar,$julio__origen__despido__intenpestivo__ingresar,$agosto__origen__despido__intenpestivo__ingresar,$septiembre__origen__despido__intenpestivo__ingresar,$octubre__origen__despido__intenpestivo__ingresar,$noviembre__origen__despido__intenpestivo__ingresar,$diciembre__origen__despido__intenpestivo__ingresar],[$enero__origen__renunia__voluntaria__ingresar,$febrero__origen__renunia__voluntaria__ingresar,$marzo__origen__renunia__voluntaria__ingresar,$abril__origen__renunia__voluntaria__ingresar,$mayo__origen__renunia__voluntaria__ingresar,$junio__origen__renunia__voluntaria__ingresar,$julio__origen__renunia__voluntaria__ingresar,$agosto__origen__renunia__voluntaria__ingresar,$septiembre__origen__renunia__voluntaria__ingresar,$octubre__origen__renunia__voluntaria__ingresar,$noviembre__origen__renunia__voluntaria__ingresar,$diciembre__origen__renunia__voluntaria__ingresar],[$enero__origen__vacaciones__no__gozadas__ingresar,$febrero__origen__vacaciones__no__gozadas__ingresar,$marzo__origen__vacaciones__no__gozadas__ingresar,$abril__origen__vacaciones__no__gozadas__ingresar,$mayo__origen__vacaciones__no__gozadas__ingresar,$junio__origen__vacaciones__no__gozadas__ingresar,$julio__origen__vacaciones__no__gozadas__ingresar,$agosto__origen__vacaciones__no__gozadas__ingresar,$septiembre__origen__vacaciones__no__gozadas__ingresar,$octubre__origen__vacaciones__no__gozadas__ingresar,$noviembre__origen__vacaciones__no__gozadas__ingresar,$diciembre__origen__vacaciones__no__gozadas__ingresar],$obtenMaximo__origen[0][maximoObtencioOrigen]);
					
					/*=====  End of Orígen  ======*/


					if ($actividadDestino=="sueldosD") {
						
				 		/*===============================
						=            Destino            =
						===============================*/
						
						$obtenerSalariosInformacionRestarDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$eventosDestino';",[$eneroDestino__sueldos,$febreroDestino__sueldos,$marzoDestino__sueldos,$abrilDestino__sueldos,$mayoDestino__sueldos,$junioDestino__sueldos,$julioDestino__sueldos,$agostoDestino__sueldos,$septiembreDestino__sueldos,$octubreDestino__sueldos,$noviembreDestino__sueldos,$diciembreDestino__sueldos,$totalMesAsignados__destinos]);

						$obtenerSalariosInformacionDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$eventosDestino';");


				 		$queryEjectuadoDestino="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestarDestino[0]',febrero='$obtenerSalariosInformacionRestarDestino[1]',marzo='$obtenerSalariosInformacionRestarDestino[2]',abril='$obtenerSalariosInformacionRestarDestino[3]',mayo='$obtenerSalariosInformacionRestarDestino[4]',junio='$obtenerSalariosInformacionRestarDestino[5]',julio='$obtenerSalariosInformacionRestarDestino[6]',agosto='$obtenerSalariosInformacionRestarDestino[7]',septiembre='$obtenerSalariosInformacionRestarDestino[8]',octubre='$obtenerSalariosInformacionRestarDestino[9]',noviembre='$obtenerSalariosInformacionRestarDestino[10]',diciembre='$obtenerSalariosInformacionRestarDestino[11]',total='$obtenerSalariosInformacionRestarDestino[12]',enero2='".$obtenerSalariosInformacionDestino[0][enero]."',febrero2='".$obtenerSalariosInformacionDestino[0][febrero]."',marzo2='".$obtenerSalariosInformacionDestino[0][marzo]."',abril2='".$obtenerSalariosInformacionDestino[0][abril]."',mayo2='".$obtenerSalariosInformacionDestino[0][mayo]."',junio2='".$obtenerSalariosInformacionDestino[0][junio]."',julio2='".$obtenerSalariosInformacionDestino[0][julio]."',agosto2='".$obtenerSalariosInformacionDestino[0][agosto]."',septiembre2='".$obtenerSalariosInformacionDestino[0][septiembre]."',octubre2='".$obtenerSalariosInformacionDestino[0][octubre]."',noviembre2='".$obtenerSalariosInformacionDestino[0][noviembre]."',diciembre2='".$obtenerSalariosInformacionDestino[0][diciembre]."',total2='".$obtenerSalariosInformacionDestino[0][total]."'  WHERE idSueldos='$eventosDestino';";
				 		$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);



				 		/*=======================================
				 		=            Aporte patronal            =
				 		=======================================*/
				 		
				 		$origenPatronalDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar__destino,$febrero__origen__aporte__patronal__ingresar__destino,$marzo__origen__aporte__patronal__ingresar__destino,$abril__origen__aporte__patronal__ingresar__destino,$mayo__origen__aporte__patronal__ingresar__destino,$junio__origen__aporte__patronal__ingresar__destino,$julio__origen__aporte__patronal__ingresar__destino,$agosto__origen__aporte__patronal__ingresar__destino,$septiembre__origen__aporte__patronal__ingresar__destino,$octubre__origen__aporte__patronal__ingresar__destino,$noviembre__origen__aporte__patronal__ingresar__destino,$diciembre__origen__aporte__patronal__ingresar__destino,$total__origen__patronal__totales__ingresados__destino]);

						$origenPatronalObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

						
						$queryOrigenPatronalDestino="UPDATE poa_programacion_financiera SET enero='$origenPatronalDestino[0]',febrero='$origenPatronalDestino[1]',marzo='$origenPatronalDestino[2]',abril='$origenPatronalDestino[3]',mayo='$origenPatronalDestino[4]',junio='$origenPatronalDestino[5]',julio='$origenPatronalDestino[6]',agosto='$origenPatronalDestino[7]',septiembre='$origenPatronalDestino[8]',octubre='$origenPatronalDestino[9]',noviembre='$origenPatronalDestino[10]',diciembre='$origenPatronalDestino[11]',totalTotales='$origenPatronalDestino[12]',enero2='".$origenPatronalObtenerDestino[0][enero]."',febrero2='".$origenPatronalObtenerDestino[0][febrero]."',marzo2='".$origenPatronalObtenerDestino[0][marzo]."',abril2='".$origenPatronalObtenerDestino[0][abril]."',mayo2='".$origenPatronalObtenerDestino[0][mayo]."',junio2='".$origenPatronalObtenerDestino[0][junio]."',julio2='".$origenPatronalObtenerDestino[0][julio]."',agosto2='".$origenPatronalObtenerDestino[0][agosto]."',septiembre2='".$origenPatronalObtenerDestino[0][septiembre]."',octubre2='".$origenPatronalObtenerDestino[0][octubre]."',noviembre2='".$origenPatronalObtenerDestino[0][noviembre]."',diciembre2='".$origenPatronalObtenerDestino[0][diciembre]."',total2='".$origenPatronalObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
									 			
						$resultadoOrigenPatronalDestino= $conexionEstablecida->exec($queryOrigenPatronalDestino);		 		
				 		
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar__destino.", ".$febrero__origen__aporte__patronal__ingresar__destino.", ".$marzo__origen__aporte__patronal__ingresar__destino.", ".$abril__origen__aporte__patronal__ingresar__destino.", ".$mayo__origen__aporte__patronal__ingresar__destino.", ".$junio__origen__aporte__patronal__ingresar__destino.", ".$julio__origen__aporte__patronal__ingresar__destino.", ".$agosto__origen__aporte__patronal__ingresar__destino.", ".$septiembre__origen__aporte__patronal__ingresar__destino.", ".$octubre__origen__aporte__patronal__ingresar__destino.", ".$noviembre__origen__aporte__patronal__ingresar__destino.", ".$diciembre__origen__aporte__patronal__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','destino');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		/*=====  End of Aporte patronal  ======*/

				 		
				 		/*============================================
				 		=            Décimo tercer sueldo            =
				 		============================================*/
				 		
				 		$origenDecimoTercerDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar__destino,$febrero__origen__decimo__tercero__ingresar__destino,$marzo__origen__decimo__tercero__ingresar__destino,$abril__origen__decimo__tercero__ingresar__destino,$mayo__origen__decimo__tercero__ingresar__destino,$junio__origen__decimo__tercero__ingresar__destino,$julio__origen__decimo__tercero__ingresar__destino,$agosto__origen__decimo__tercero__ingresar__destino,$septiembre__origen__decimo__tercero__ingresar__destino,$octubre__origen__decimo__tercero__ingresar__destino,$noviembre__origen__decimo__tercero__ingresar__destino,$diciembre__origen__decimo__tercero__ingresar__destino,$total__origen__decimo__tercero__totales__ingresados__destino]);

				 		$origenDecimoTercerObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

						$queryOrigenDecimoTercerDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercerDestino[0]',febrero='$origenDecimoTercerDestino[1]',marzo='$origenDecimoTercerDestino[2]',abril='$origenDecimoTercerDestino[3]',mayo='$origenDecimoTercerDestino[4]',junio='$origenDecimoTercerDestino[5]',julio='$origenDecimoTercerDestino[6]',agosto='$origenDecimoTercerDestino[7]',septiembre='$origenDecimoTercerDestino[8]',octubre='$origenDecimoTercerDestino[9]',noviembre='$origenDecimoTercerDestino[10]',diciembre='$origenDecimoTercerDestino[11]',totalTotales='$origenDecimoTercerDestino[12]',enero2='".$origenDecimoTercerObtenerDestino[0][enero]."',febrero2='".$origenDecimoTercerObtenerDestino[0][febrero]."',marzo2='".$origenDecimoTercerObtenerDestino[0][marzo]."',abril2='".$origenDecimoTercerObtenerDestino[0][abril]."',mayo2='".$origenDecimoTercerObtenerDestino[0][mayo]."',junio2='".$origenDecimoTercerObtenerDestino[0][junio]."',julio2='".$origenDecimoTercerObtenerDestino[0][julio]."',agosto2='".$origenDecimoTercerObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoTercerObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoTercerObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoTercerObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoTercerObtenerDestino[0][diciembre]."',total2='".$origenDecimoTercerObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

						$resultadoOrigenDecimoTercerDestino= $conexionEstablecida->exec($queryOrigenDecimoTercerDestino);		 

						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar__destino.", ".$febrero__origen__decimo__tercero__ingresar__destino.", ".$marzo__origen__decimo__tercero__ingresar__destino.", ".$abril__origen__decimo__tercero__ingresar__destino.", ".$mayo__origen__decimo__tercero__ingresar__destino.", ".$junio__origen__decimo__tercero__ingresar__destino.", ".$julio__origen__decimo__tercero__ingresar__destino.", ".$agosto__origen__decimo__tercero__ingresar__destino.", ".$septiembre__origen__decimo__tercero__ingresar__destino.", ".$octubre__origen__decimo__tercero__ingresar__destino.", ".$noviembre__origen__decimo__tercero__ingresar__destino.", ".$diciembre__origen__decimo__tercero__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','destino');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		
				 		/*=====  End of Décimo tercer sueldo  ======*/
				 		

				 		/*=====================================
				 		=            Décimo cuarto            =
				 		=====================================*/
				 		
				 		$origenDecimoCuartoDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar__destino,$febrero__origen__decimo__cuarto__ingresar__destino,$marzo__origen__decimo__cuarto__ingresar__destino,$abril__origen__decimo__cuarto__ingresar__destino,$mayo__origen__decimo__cuarto__ingresar__destino,$junio__origen__decimo__cuarto__ingresar__destino,$julio__origen__decimo__cuarto__ingresar__destino,$agosto__origen__decimo__cuarto__ingresar__destino,$septiembre__origen__decimo__cuarto__ingresar__destino,$octubre__origen__decimo__cuarto__ingresar__destino,$noviembre__origen__decimo__cuarto__ingresar__destino,$diciembre__origen__decimo__cuarto__ingresar__destino,$total__origen__decimo__cuarto__totales__ingresados__destino]);

				 		$origenDecimoCuartoObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
				 		

						$queryOrigenDecimoCuartoDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuartoDestino[0]',febrero='$origenDecimoCuartoDestino[1]',marzo='$origenDecimoCuartoDestino[2]',abril='$origenDecimoCuartoDestino[3]',mayo='$origenDecimoCuartoDestino[4]',junio='$origenDecimoCuartoDestino[5]',julio='$origenDecimoCuartoDestino[6]',agosto='$origenDecimoCuartoDestino[7]',septiembre='$origenDecimoCuartoDestino[8]',octubre='$origenDecimoCuartoDestino[9]',noviembre='$origenDecimoCuartoDestino[10]',diciembre='$origenDecimoCuartoDestino[11]',totalTotales='$origenDecimoCuartoDestino[12]',enero2='".$origenDecimoCuartoObtenerDestino[0][enero]."',febrero2='".$origenDecimoCuartoObtenerDestino[0][febrero]."',marzo2='".$origenDecimoCuartoObtenerDestino[0][marzo]."',abril2='".$origenDecimoCuartoObtenerDestino[0][abril]."',mayo2='".$origenDecimoCuartoObtenerDestino[0][mayo]."',junio2='".$origenDecimoCuartoObtenerDestino[0][junio]."',julio2='".$origenDecimoCuartoObtenerDestino[0][julio]."',agosto2='".$origenDecimoCuartoObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoCuartoObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoCuartoObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoCuartoObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtenerDestino[0][diciembre]."',total2='".$origenDecimoCuartoObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

						$resultadoOrigenDecimoCuartoDestino= $conexionEstablecida->exec($queryOrigenDecimoCuartoDestino);		 
				 		
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar__destino.", ".$febrero__origen__decimo__cuarto__ingresar__destino.", ".$marzo__origen__decimo__cuarto__ingresar__destino.", ".$abril__origen__decimo__cuarto__ingresar__destino.", ".$mayo__origen__decimo__cuarto__ingresar__destino.", ".$junio__origen__decimo__cuarto__ingresar__destino.", ".$julio__origen__decimo__cuarto__ingresar__destino.", ".$agosto__origen__decimo__cuarto__ingresar__destino.", ".$septiembre__origen__decimo__cuarto__ingresar__destino.", ".$octubre__origen__decimo__cuarto__ingresar__destino.", ".$noviembre__origen__decimo__cuarto__ingresar__destino.", ".$diciembre__origen__decimo__cuarto__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','destino');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	



				 		/*=====  End of Décimo cuarto  ======*/



				 		/*==========================================
				 		=            Fondos de ereserva            =
				 		==========================================*/
				 		
				 		$origenFondosReservaDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar__destino,$febrero__origen__fondos__de__reserva__ingresar__destino,$marzo__origen__fondos__de__reserva__ingresar__destino,$abril__origen__fondos__de__reserva__ingresar__destino,$mayo__origen__fondos__de__reserva__ingresar__destino,$junio__origen__fondos__de__reserva__ingresar__destino,$julio__origen__fondos__de__reserva__ingresar__destino,$agosto__origen__fondos__de__reserva__ingresar__destino,$septiembre__origen__fondos__de__reserva__ingresar__destino,$octubre__origen__fondos__de__reserva__ingresar__destino,$noviembre__origen__fondos__de__reserva__ingresar__destino,$diciembre__origen__fondos__de__reserva__ingresar__destino,$total__origen__fondos__de__reserva__totales__ingresados__destino]);

				 		$origenFondosReservaObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

				 		$queryOrigenFondosReservaDestino="UPDATE poa_programacion_financiera SET enero='$origenFondosReservaDestino[0]',febrero='$origenFondosReservaDestino[1]',marzo='$origenFondosReservaDestino[2]',abril='$origenFondosReservaDestino[3]',mayo='$origenFondosReservaDestino[4]',junio='$origenFondosReservaDestino[5]',julio='$origenFondosReservaDestino[6]',agosto='$origenFondosReservaDestino[7]',septiembre='$origenFondosReservaDestino[8]',octubre='$origenFondosReservaDestino[9]',noviembre='$origenFondosReservaDestino[10]',diciembre='$origenFondosReservaDestino[11]',totalTotales='$origenFondosReservaDestino[12]',enero2='".$origenFondosReservaObtenerDestino[0][enero]."',febrero2='".$origenFondosReservaObtenerDestino[0][febrero]."',marzo2='".$origenFondosReservaObtenerDestino[0][marzo]."',abril2='".$origenFondosReservaObtenerDestino[0][abril]."',mayo2='".$origenFondosReservaObtenerDestino[0][mayo]."',junio2='".$origenFondosReservaObtenerDestino[0][junio]."',julio2='".$origenFondosReservaObtenerDestino[0][julio]."',agosto2='".$origenFondosReservaObtenerDestino[0][agosto]."',septiembre2='".$origenFondosReservaObtenerDestino[0][septiembre]."',octubre2='".$origenFondosReservaObtenerDestino[0][octubre]."',noviembre2='".$origenFondosReservaObtenerDestino[0][noviembre]."',diciembre2='".$origenFondosReservaObtenerDestino[0][diciembre]."',total2='".$origenFondosReservaObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

						$resultadoFondosReservaDestino= $conexionEstablecida->exec($queryOrigenFondosReservaDestino);		 
				 		

						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__fondos__de__reserva__ingresar__destino.", ".$febrero__origen__fondos__de__reserva__ingresar__destino.", ".$marzo__origen__fondos__de__reserva__ingresar__destino.", ".$abril__origen__fondos__de__reserva__ingresar__destino.", ".$mayo__origen__fondos__de__reserva__ingresar__destino.", ".$junio__origen__fondos__de__reserva__ingresar__destino.", ".$julio__origen__fondos__de__reserva__ingresar__destino.", ".$agosto__origen__fondos__de__reserva__ingresar__destino.", ".$septiembre__origen__fondos__de__reserva__ingresar__destino.", ".$octubre__origen__fondos__de__reserva__ingresar__destino.", ".$noviembre__origen__fondos__de__reserva__ingresar__destino.", ".$diciembre__origen__fondos__de__reserva__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','destino');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		/*=====  End of Fondos de ereserva  ======*/


				 		
				 		/*================================
				 		=            Salarios            =
				 		================================*/
				 		
				 		$origenSalariosDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar__destino,$febrero__origen__salarios__ingresar__destino,$marzo__origen__salarios__ingresar__destino,$abril__origen__salarios__ingresar__destino,$mayo__origen__salarios__ingresar__destino,$junio__origen__salarios__ingresar__destino,$julio__origen__salarios__ingresar__destino,$agosto__origen__salarios__ingresar__destino,$septiembre__origen__salarios__ingresar__destino,$octubre__origen__salarios__ingresar__destino,$noviembre__origen__salarios__ingresar__destino,$diciembre__origen__salarios__ingresar__destino,$total__origen__salarios__totales__ingresados__destino]);


				 		$origenSalariosObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

				 		$queryOrigenSalariosDestino="UPDATE poa_programacion_financiera SET enero='$origenSalariosDestino[0]',febrero='$origenSalariosDestino[1]',marzo='$origenSalariosDestino[2]',abril='$origenSalariosDestino[3]',mayo='$origenSalariosDestino[4]',junio='$origenSalariosDestino[5]',julio='$origenSalariosDestino[6]',agosto='$origenSalariosDestino[7]',septiembre='$origenSalariosDestino[8]',octubre='$origenSalariosDestino[9]',noviembre='$origenSalariosDestino[10]',diciembre='$origenSalariosDestino[11]',totalTotales='$origenSalariosDestino[12]',enero2='".$origenSalariosObtenerDestino[0][enero]."',febrero2='".$origenSalariosObtenerDestino[0][febrero]."',marzo2='".$origenSalariosObtenerDestino[0][marzo]."',abril2='".$origenSalariosObtenerDestino[0][abril]."',mayo2='".$origenSalariosObtenerDestino[0][mayo]."',junio2='".$origenSalariosObtenerDestino[0][junio]."',julio2='".$origenSalariosObtenerDestino[0][julio]."',agosto2='".$origenSalariosObtenerDestino[0][agosto]."',septiembre2='".$origenSalariosObtenerDestino[0][septiembre]."',octubre2='".$origenSalariosObtenerDestino[0][octubre]."',noviembre2='".$origenSalariosObtenerDestino[0][noviembre]."',diciembre2='".$origenSalariosObtenerDestino[0][diciembre]."',total2='".$origenSalariosObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

				 		$resultadoSalariosDestino= $conexionEstablecida->exec($queryOrigenSalariosDestino);	


						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar__destino.", ".$febrero__origen__salarios__ingresar__destino.", ".$marzo__origen__salarios__ingresar__destino.", ".$abril__origen__salarios__ingresar__destino.", ".$mayo__origen__salarios__ingresar__destino.", ".$junio__origen__salarios__ingresar__destino.", ".$julio__origen__salarios__ingresar__destino.", ".$agosto__origen__salarios__ingresar__destino.", ".$septiembre__origen__salarios__ingresar__destino.", ".$octubre__origen__salarios__ingresar__destino.", ".$noviembre__origen__salarios__ingresar__destino.", ".$diciembre__origen__salarios__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','destino');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


				 		/*=====  End of Salarios  ======*/


						/*=====  End of Destino  ======*/						
						
					}


				}else if((intval($actividadDestino)==4 && $variableIdentificadorasHonoSueldos=="desvinculacionD")){

		 			$origenInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

		 			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen, $febreroOrigen, $marzoOrigen, $abrilOrigen, $mayoOrigen, $junioOrigen, $julioOrigen, $agostoOrigen, $septiembreOrigen, $octubreOrigen, $noviembreOrigen, $diciembreOrigen, $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, 4, '".$origenInformacion[0][idProgramacionFinanciera]."', '".$origenInformacion[0][idProgramacionFinanciera]."', $eneroDesvinculacion__sumando, $febreroDesvinculacion__sumando, $marzoDesvinculacion__sumando, $abrilDesvinculacion__sumando, $mayoDesvinculacion__sumando, $junioDesvinculacion__sumando, $julioDesvinculacion__sumando, $agostoDesvinculacion__sumando, $septiembreDesvinculacion__sumando, $octubreDesvinculacion__sumando, $noviembreDesvinculacion__sumando, $diciembreDesvinculacion__sumando, $totalDesvinculacion__sumar, $eneroDesvinculacion__sumando, $febreroDesvinculacion__sumando, $marzoDesvinculacion__sumando, $abrilDesvinculacion__sumando, $mayoDesvinculacion__sumando, $junioDesvinculacion__sumando, $julioDesvinculacion__sumando, $agostoDesvinculacion__sumando, $septiembreDesvinculacion__sumando, $octubreDesvinculacion__sumando, $noviembreDesvinculacion__sumando, $diciembreDesvinculacion__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','desvinculacion','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoInicial','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 			$resultado= $conexionEstablecida->exec($query);

		 			$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

		 			

			 		if (!empty($origenInformacion[0][idProgramacionFinanciera])) {
			 		
			 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='".$origenInformacion[0][idProgramacionFinanciera]."';",[$eneroDesvinculacion__sumando,$febreroDesvinculacion__sumando,$marzoDesvinculacion__sumando,$abrilDesvinculacion__sumando,$mayoDesvinculacion__sumando,$junioDesvinculacion__sumando,$julioDesvinculacion__sumando,$agostoDesvinculacion__sumando,$septiembreDesvinculacion__sumando,$octubreDesvinculacion__sumando,$noviembreDesvinculacion__sumando,$diciembreDesvinculacion__sumando,$totalDesvinculacion__sumar]);

			 		}else{

			 			$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '$eneroDesvinculacion__sumando', '$febreroDesvinculacion__sumando', '$marzoDesvinculacion__sumando', '$abrilDesvinculacion__sumando', '$mayoDesvinculacion__sumando', '$junioDesvinculacion__sumando', '$julioDesvinculacion__sumando', '$agostoDesvinculacion__sumando', '$septiembreDesvinculacion__sumando', '$octubreDesvinculacion__sumando', '$noviembreDesvinculacion__sumando', '$diciembreDesvinculacion__sumando', '$totalDesvinculacion__sumar', '$totalDesvinculacion__sumar', NULL, NULL, $idOrganismoSession, $desvinculacion__modificaciones, 4, NULL, '$fecha_actual', '$hora_actual', NULL, NULL, NULL, NULL, NULL, '$aniosPeriodos__ingesos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			 			$resultado2= $conexionEstablecida->exec($query2);

			 			$origenInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

			 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='".$origenInformacion[0][idProgramacionFinanciera]."';",[$origenInformacion[0][enero],$origenInformacion[0][febrero],$origenInformacion[0][marzo],$origenInformacion[0][abril],$origenInformacion[0][mayo],$origenInformacion[0][junio],$origenInformacion[0][julio],$origenInformacion[0][agosto],$origenInformacion[0][septiembre],$origenInformacion[0][octubre],$origenInformacion[0][noviembre],$origenInformacion[0][diciembre],$origenInformacion[0][totalTotales]]);

			 		}

			 		$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='$desvinculacion__modificaciones';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='".$obtenerSalariosInformacion[0][idProgramacionFinanciera]."';";
								 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


		 		}else if((intval($actividadDestino)==4 && $variableIdentificadorasHonoSueldos=="sueldosD") || ($variableIdentificadorasHonoSueldos=="sueldosD" && $identificadorPaginaReal=="diferentes")){

		 			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `sueldoDestino`, `aportePatronalDestino`, `decimoTerceraDestino`, `decimoCuartaDestino`, `fondosReservaDestino`, `sueldoDestino__sumando`, `aportePatronalDestino__sumando`, `decimoTerceraDestino__sumando`, `decimoCuartaDestino__sumando`, `fondosReservaDestino__sumando`, `salarioOrigen`, `aportePatronalOrigen`, `decimoTerceroOrigen`, `decimoCuartoOrigen`, `fondosDeReservaOrigen`, `salarioOrigen__restando`, `aportePatronalOrigen__restando`, `decimoTerceroOrigen__restando`, `decimoCuartoOrigen__restando`, `fondosDeReservaOrigen__restando`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$persona_sueldos_data', $persona_sueldos_data, $eneroOrigen,  $febreroOrigen,  $marzoOrigen,  $abrilOrigen,  $mayoOrigen,  $junioOrigen,  $julioOrigen,  $agostoOrigen,  $septiembreOrigen,  $octubreOrigen,  $noviembreOrigen,  $diciembreOrigen,  $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino__sueldos, $febreroDestino__sueldos, $marzoDestino__sueldos, $abrilDestino__sueldos, $mayoDestino__sueldos, $junioDestino__sueldos, $julioDestino__sueldos, $agostoDestino__sueldos, $septiembreDestino__sueldos, $octubreDestino__sueldos, $noviembreDestino__sueldos, $diciembreDestino__sueldos, $totalMesAsignados__destinos, $enero__origen__restante__destino, $febrero__origen__restante__destino, $marzo__origen__restante__destino, $abril__origen__restante__destino, $mayo__origen__restante__destino, $junio__origen__restante__destino, $julio__origen__restante__destino, $agosto__origen__restante__destino, $septiembre__origen__restante__destino, $octubre__origen__restante__destino, $noviembre__origen__restante__destino, $diciembre__origen__restante__destino, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','sueldos__item','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','$total__origen__salarios__totales__ingresados__destino','$total__origen__patronal__totales__ingresados__destino','$total__origen__decimo__tercero__totales__ingresados__destino','$total__origen__decimo__cuarto__totales__ingresados__destino','$total__origen__fondos__de__reserva__totales__ingresados__destino','0','0','0','0','0','0','0','0','0','0','$totalOrigenInicial','$totalOrigenVigente','$sumaDestino1','$sumaDestino1Restante','$totalOrigen','$totalMesAsignados__destinos');";

		 			$resultado= $conexionEstablecida->exec($query);

		 			$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");

			 		/*===============================
					=            Destino            =
					===============================*/
					
					$obtenerSalariosInformacionRestarDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$eventosDestino';",[$eneroDestino__sueldos,$febreroDestino__sueldos,$marzoDestino__sueldos,$abrilDestino__sueldos,$mayoDestino__sueldos,$junioDestino__sueldos,$julioDestino__sueldos,$agostoDestino__sueldos,$septiembreDestino__sueldos,$octubreDestino__sueldos,$noviembreDestino__sueldos,$diciembreDestino__sueldos,$totalMesAsignados__destinos]);

					$obtenerSalariosInformacionDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$eventosDestino';");


			 		$queryEjectuadoDestino="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestarDestino[0]',febrero='$obtenerSalariosInformacionRestarDestino[1]',marzo='$obtenerSalariosInformacionRestarDestino[2]',abril='$obtenerSalariosInformacionRestarDestino[3]',mayo='$obtenerSalariosInformacionRestarDestino[4]',junio='$obtenerSalariosInformacionRestarDestino[5]',julio='$obtenerSalariosInformacionRestarDestino[6]',agosto='$obtenerSalariosInformacionRestarDestino[7]',septiembre='$obtenerSalariosInformacionRestarDestino[8]',octubre='$obtenerSalariosInformacionRestarDestino[9]',noviembre='$obtenerSalariosInformacionRestarDestino[10]',diciembre='$obtenerSalariosInformacionRestarDestino[11]',total='$obtenerSalariosInformacionRestarDestino[12]',enero2='".$obtenerSalariosInformacionDestino[0][enero]."',febrero2='".$obtenerSalariosInformacionDestino[0][febrero]."',marzo2='".$obtenerSalariosInformacionDestino[0][marzo]."',abril2='".$obtenerSalariosInformacionDestino[0][abril]."',mayo2='".$obtenerSalariosInformacionDestino[0][mayo]."',junio2='".$obtenerSalariosInformacionDestino[0][junio]."',julio2='".$obtenerSalariosInformacionDestino[0][julio]."',agosto2='".$obtenerSalariosInformacionDestino[0][agosto]."',septiembre2='".$obtenerSalariosInformacionDestino[0][septiembre]."',octubre2='".$obtenerSalariosInformacionDestino[0][octubre]."',noviembre2='".$obtenerSalariosInformacionDestino[0][noviembre]."',diciembre2='".$obtenerSalariosInformacionDestino[0][diciembre]."',total2='".$obtenerSalariosInformacionDestino[0][total]."'  WHERE idSueldos='$eventosDestino';";
			 		$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);



			 		/*=======================================
			 		=            Aporte patronal            =
			 		=======================================*/
			 		
			 		$origenPatronalDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar__destino,$febrero__origen__aporte__patronal__ingresar__destino,$marzo__origen__aporte__patronal__ingresar__destino,$abril__origen__aporte__patronal__ingresar__destino,$mayo__origen__aporte__patronal__ingresar__destino,$junio__origen__aporte__patronal__ingresar__destino,$julio__origen__aporte__patronal__ingresar__destino,$agosto__origen__aporte__patronal__ingresar__destino,$septiembre__origen__aporte__patronal__ingresar__destino,$octubre__origen__aporte__patronal__ingresar__destino,$noviembre__origen__aporte__patronal__ingresar__destino,$diciembre__origen__aporte__patronal__ingresar__destino,$total__origen__patronal__totales__ingresados__destino]);

					$origenPatronalObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

					
					$queryOrigenPatronalDestino="UPDATE poa_programacion_financiera SET enero='$origenPatronalDestino[0]',febrero='$origenPatronalDestino[1]',marzo='$origenPatronalDestino[2]',abril='$origenPatronalDestino[3]',mayo='$origenPatronalDestino[4]',junio='$origenPatronalDestino[5]',julio='$origenPatronalDestino[6]',agosto='$origenPatronalDestino[7]',septiembre='$origenPatronalDestino[8]',octubre='$origenPatronalDestino[9]',noviembre='$origenPatronalDestino[10]',diciembre='$origenPatronalDestino[11]',totalTotales='$origenPatronalDestino[12]',enero2='".$origenPatronalObtenerDestino[0][enero]."',febrero2='".$origenPatronalObtenerDestino[0][febrero]."',marzo2='".$origenPatronalObtenerDestino[0][marzo]."',abril2='".$origenPatronalObtenerDestino[0][abril]."',mayo2='".$origenPatronalObtenerDestino[0][mayo]."',junio2='".$origenPatronalObtenerDestino[0][junio]."',julio2='".$origenPatronalObtenerDestino[0][julio]."',agosto2='".$origenPatronalObtenerDestino[0][agosto]."',septiembre2='".$origenPatronalObtenerDestino[0][septiembre]."',octubre2='".$origenPatronalObtenerDestino[0][octubre]."',noviembre2='".$origenPatronalObtenerDestino[0][noviembre]."',diciembre2='".$origenPatronalObtenerDestino[0][diciembre]."',total2='".$origenPatronalObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
								 			
					$resultadoOrigenPatronalDestino= $conexionEstablecida->exec($queryOrigenPatronalDestino);		 		
			 		
					$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar__destino.", ".$febrero__origen__aporte__patronal__ingresar__destino.", ".$marzo__origen__aporte__patronal__ingresar__destino.", ".$abril__origen__aporte__patronal__ingresar__destino.", ".$mayo__origen__aporte__patronal__ingresar__destino.", ".$junio__origen__aporte__patronal__ingresar__destino.", ".$julio__origen__aporte__patronal__ingresar__destino.", ".$agosto__origen__aporte__patronal__ingresar__destino.", ".$septiembre__origen__aporte__patronal__ingresar__destino.", ".$octubre__origen__aporte__patronal__ingresar__destino.", ".$noviembre__origen__aporte__patronal__ingresar__destino.", ".$diciembre__origen__aporte__patronal__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','destino');";
								 			
					$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

			 		/*=====  End of Aporte patronal  ======*/

			 		
			 		/*============================================
			 		=            Décimo tercer sueldo            =
			 		============================================*/
			 		
			 		$origenDecimoTercerDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar__destino,$febrero__origen__decimo__tercero__ingresar__destino,$marzo__origen__decimo__tercero__ingresar__destino,$abril__origen__decimo__tercero__ingresar__destino,$mayo__origen__decimo__tercero__ingresar__destino,$junio__origen__decimo__tercero__ingresar__destino,$julio__origen__decimo__tercero__ingresar__destino,$agosto__origen__decimo__tercero__ingresar__destino,$septiembre__origen__decimo__tercero__ingresar__destino,$octubre__origen__decimo__tercero__ingresar__destino,$noviembre__origen__decimo__tercero__ingresar__destino,$diciembre__origen__decimo__tercero__ingresar__destino,$total__origen__decimo__tercero__totales__ingresados__destino]);

			 		$origenDecimoTercerObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

					$queryOrigenDecimoTercerDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercerDestino[0]',febrero='$origenDecimoTercerDestino[1]',marzo='$origenDecimoTercerDestino[2]',abril='$origenDecimoTercerDestino[3]',mayo='$origenDecimoTercerDestino[4]',junio='$origenDecimoTercerDestino[5]',julio='$origenDecimoTercerDestino[6]',agosto='$origenDecimoTercerDestino[7]',septiembre='$origenDecimoTercerDestino[8]',octubre='$origenDecimoTercerDestino[9]',noviembre='$origenDecimoTercerDestino[10]',diciembre='$origenDecimoTercerDestino[11]',totalTotales='$origenDecimoTercerDestino[12]',enero2='".$origenDecimoTercerObtenerDestino[0][enero]."',febrero2='".$origenDecimoTercerObtenerDestino[0][febrero]."',marzo2='".$origenDecimoTercerObtenerDestino[0][marzo]."',abril2='".$origenDecimoTercerObtenerDestino[0][abril]."',mayo2='".$origenDecimoTercerObtenerDestino[0][mayo]."',junio2='".$origenDecimoTercerObtenerDestino[0][junio]."',julio2='".$origenDecimoTercerObtenerDestino[0][julio]."',agosto2='".$origenDecimoTercerObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoTercerObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoTercerObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoTercerObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoTercerObtenerDestino[0][diciembre]."',total2='".$origenDecimoTercerObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

					$resultadoOrigenDecimoTercerDestino= $conexionEstablecida->exec($queryOrigenDecimoTercerDestino);		 

					$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar__destino.", ".$febrero__origen__decimo__tercero__ingresar__destino.", ".$marzo__origen__decimo__tercero__ingresar__destino.", ".$abril__origen__decimo__tercero__ingresar__destino.", ".$mayo__origen__decimo__tercero__ingresar__destino.", ".$junio__origen__decimo__tercero__ingresar__destino.", ".$julio__origen__decimo__tercero__ingresar__destino.", ".$agosto__origen__decimo__tercero__ingresar__destino.", ".$septiembre__origen__decimo__tercero__ingresar__destino.", ".$octubre__origen__decimo__tercero__ingresar__destino.", ".$noviembre__origen__decimo__tercero__ingresar__destino.", ".$diciembre__origen__decimo__tercero__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','destino');";
								 			
					$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

			 		
			 		/*=====  End of Décimo tercer sueldo  ======*/
			 		

			 		/*=====================================
			 		=            Décimo cuarto            =
			 		=====================================*/
			 		
			 		$origenDecimoCuartoDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar__destino,$febrero__origen__decimo__cuarto__ingresar__destino,$marzo__origen__decimo__cuarto__ingresar__destino,$abril__origen__decimo__cuarto__ingresar__destino,$mayo__origen__decimo__cuarto__ingresar__destino,$junio__origen__decimo__cuarto__ingresar__destino,$julio__origen__decimo__cuarto__ingresar__destino,$agosto__origen__decimo__cuarto__ingresar__destino,$septiembre__origen__decimo__cuarto__ingresar__destino,$octubre__origen__decimo__cuarto__ingresar__destino,$noviembre__origen__decimo__cuarto__ingresar__destino,$diciembre__origen__decimo__cuarto__ingresar__destino,$total__origen__decimo__cuarto__totales__ingresados__destino]);

			 		$origenDecimoCuartoObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
			 		

					$queryOrigenDecimoCuartoDestino="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuartoDestino[0]',febrero='$origenDecimoCuartoDestino[1]',marzo='$origenDecimoCuartoDestino[2]',abril='$origenDecimoCuartoDestino[3]',mayo='$origenDecimoCuartoDestino[4]',junio='$origenDecimoCuartoDestino[5]',julio='$origenDecimoCuartoDestino[6]',agosto='$origenDecimoCuartoDestino[7]',septiembre='$origenDecimoCuartoDestino[8]',octubre='$origenDecimoCuartoDestino[9]',noviembre='$origenDecimoCuartoDestino[10]',diciembre='$origenDecimoCuartoDestino[11]',totalTotales='$origenDecimoCuartoDestino[12]',enero2='".$origenDecimoCuartoObtenerDestino[0][enero]."',febrero2='".$origenDecimoCuartoObtenerDestino[0][febrero]."',marzo2='".$origenDecimoCuartoObtenerDestino[0][marzo]."',abril2='".$origenDecimoCuartoObtenerDestino[0][abril]."',mayo2='".$origenDecimoCuartoObtenerDestino[0][mayo]."',junio2='".$origenDecimoCuartoObtenerDestino[0][junio]."',julio2='".$origenDecimoCuartoObtenerDestino[0][julio]."',agosto2='".$origenDecimoCuartoObtenerDestino[0][agosto]."',septiembre2='".$origenDecimoCuartoObtenerDestino[0][septiembre]."',octubre2='".$origenDecimoCuartoObtenerDestino[0][octubre]."',noviembre2='".$origenDecimoCuartoObtenerDestino[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtenerDestino[0][diciembre]."',total2='".$origenDecimoCuartoObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

					$resultadoOrigenDecimoCuartoDestino= $conexionEstablecida->exec($queryOrigenDecimoCuartoDestino);		 
			 		
					$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar__destino.", ".$febrero__origen__decimo__cuarto__ingresar__destino.", ".$marzo__origen__decimo__cuarto__ingresar__destino.", ".$abril__origen__decimo__cuarto__ingresar__destino.", ".$mayo__origen__decimo__cuarto__ingresar__destino.", ".$junio__origen__decimo__cuarto__ingresar__destino.", ".$julio__origen__decimo__cuarto__ingresar__destino.", ".$agosto__origen__decimo__cuarto__ingresar__destino.", ".$septiembre__origen__decimo__cuarto__ingresar__destino.", ".$octubre__origen__decimo__cuarto__ingresar__destino.", ".$noviembre__origen__decimo__cuarto__ingresar__destino.", ".$diciembre__origen__decimo__cuarto__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','destino');";
								 			
					$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	



			 		/*=====  End of Décimo cuarto  ======*/



			 		/*==========================================
			 		=            Fondos de ereserva            =
			 		==========================================*/
			 		
			 		$origenFondosReservaDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar__destino,$febrero__origen__fondos__de__reserva__ingresar__destino,$marzo__origen__fondos__de__reserva__ingresar__destino,$abril__origen__fondos__de__reserva__ingresar__destino,$mayo__origen__fondos__de__reserva__ingresar__destino,$junio__origen__fondos__de__reserva__ingresar__destino,$julio__origen__fondos__de__reserva__ingresar__destino,$agosto__origen__fondos__de__reserva__ingresar__destino,$septiembre__origen__fondos__de__reserva__ingresar__destino,$octubre__origen__fondos__de__reserva__ingresar__destino,$noviembre__origen__fondos__de__reserva__ingresar__destino,$diciembre__origen__fondos__de__reserva__ingresar__destino,$total__origen__fondos__de__reserva__totales__ingresados__destino]);

			 		$origenFondosReservaObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

			 		$queryOrigenFondosReservaDestino="UPDATE poa_programacion_financiera SET enero='$origenFondosReservaDestino[0]',febrero='$origenFondosReservaDestino[1]',marzo='$origenFondosReservaDestino[2]',abril='$origenFondosReservaDestino[3]',mayo='$origenFondosReservaDestino[4]',junio='$origenFondosReservaDestino[5]',julio='$origenFondosReservaDestino[6]',agosto='$origenFondosReservaDestino[7]',septiembre='$origenFondosReservaDestino[8]',octubre='$origenFondosReservaDestino[9]',noviembre='$origenFondosReservaDestino[10]',diciembre='$origenFondosReservaDestino[11]',totalTotales='$origenFondosReservaDestino[12]',enero2='".$origenFondosReservaObtenerDestino[0][enero]."',febrero2='".$origenFondosReservaObtenerDestino[0][febrero]."',marzo2='".$origenFondosReservaObtenerDestino[0][marzo]."',abril2='".$origenFondosReservaObtenerDestino[0][abril]."',mayo2='".$origenFondosReservaObtenerDestino[0][mayo]."',junio2='".$origenFondosReservaObtenerDestino[0][junio]."',julio2='".$origenFondosReservaObtenerDestino[0][julio]."',agosto2='".$origenFondosReservaObtenerDestino[0][agosto]."',septiembre2='".$origenFondosReservaObtenerDestino[0][septiembre]."',octubre2='".$origenFondosReservaObtenerDestino[0][octubre]."',noviembre2='".$origenFondosReservaObtenerDestino[0][noviembre]."',diciembre2='".$origenFondosReservaObtenerDestino[0][diciembre]."',total2='".$origenFondosReservaObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

					$resultadoFondosReservaDestino= $conexionEstablecida->exec($queryOrigenFondosReservaDestino);		 
			 		

					$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__fondos__de__reserva__ingresar__destino.", ".$febrero__origen__fondos__de__reserva__ingresar__destino.", ".$marzo__origen__fondos__de__reserva__ingresar__destino.", ".$abril__origen__fondos__de__reserva__ingresar__destino.", ".$mayo__origen__fondos__de__reserva__ingresar__destino.", ".$junio__origen__fondos__de__reserva__ingresar__destino.", ".$julio__origen__fondos__de__reserva__ingresar__destino.", ".$agosto__origen__fondos__de__reserva__ingresar__destino.", ".$septiembre__origen__fondos__de__reserva__ingresar__destino.", ".$octubre__origen__fondos__de__reserva__ingresar__destino.", ".$noviembre__origen__fondos__de__reserva__ingresar__destino.", ".$diciembre__origen__fondos__de__reserva__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','destino');";
								 			
					$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

			 		/*=====  End of Fondos de ereserva  ======*/


			 		
			 		/*================================
			 		=            Salarios            =
			 		================================*/
			 		
			 		$origenSalariosDestino=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar__destino,$febrero__origen__salarios__ingresar__destino,$marzo__origen__salarios__ingresar__destino,$abril__origen__salarios__ingresar__destino,$mayo__origen__salarios__ingresar__destino,$junio__origen__salarios__ingresar__destino,$julio__origen__salarios__ingresar__destino,$agosto__origen__salarios__ingresar__destino,$septiembre__origen__salarios__ingresar__destino,$octubre__origen__salarios__ingresar__destino,$noviembre__origen__salarios__ingresar__destino,$diciembre__origen__salarios__ingresar__destino,$total__origen__salarios__totales__ingresados__destino]);


			 		$origenSalariosObtenerDestino=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

			 		$queryOrigenSalariosDestino="UPDATE poa_programacion_financiera SET enero='$origenSalariosDestino[0]',febrero='$origenSalariosDestino[1]',marzo='$origenSalariosDestino[2]',abril='$origenSalariosDestino[3]',mayo='$origenSalariosDestino[4]',junio='$origenSalariosDestino[5]',julio='$origenSalariosDestino[6]',agosto='$origenSalariosDestino[7]',septiembre='$origenSalariosDestino[8]',octubre='$origenSalariosDestino[9]',noviembre='$origenSalariosDestino[10]',diciembre='$origenSalariosDestino[11]',totalTotales='$origenSalariosDestino[12]',enero2='".$origenSalariosObtenerDestino[0][enero]."',febrero2='".$origenSalariosObtenerDestino[0][febrero]."',marzo2='".$origenSalariosObtenerDestino[0][marzo]."',abril2='".$origenSalariosObtenerDestino[0][abril]."',mayo2='".$origenSalariosObtenerDestino[0][mayo]."',junio2='".$origenSalariosObtenerDestino[0][junio]."',julio2='".$origenSalariosObtenerDestino[0][julio]."',agosto2='".$origenSalariosObtenerDestino[0][agosto]."',septiembre2='".$origenSalariosObtenerDestino[0][septiembre]."',octubre2='".$origenSalariosObtenerDestino[0][octubre]."',noviembre2='".$origenSalariosObtenerDestino[0][noviembre]."',diciembre2='".$origenSalariosObtenerDestino[0][diciembre]."',total2='".$origenSalariosObtenerDestino[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

			 		$resultadoSalariosDestino= $conexionEstablecida->exec($queryOrigenSalariosDestino);	


					$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar__destino.", ".$febrero__origen__salarios__ingresar__destino.", ".$marzo__origen__salarios__ingresar__destino.", ".$abril__origen__salarios__ingresar__destino.", ".$mayo__origen__salarios__ingresar__destino.", ".$junio__origen__salarios__ingresar__destino.", ".$julio__origen__salarios__ingresar__destino.", ".$agosto__origen__salarios__ingresar__destino.", ".$septiembre__origen__salarios__ingresar__destino.", ".$octubre__origen__salarios__ingresar__destino.", ".$noviembre__origen__salarios__ingresar__destino.", ".$diciembre__origen__salarios__ingresar__destino.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','destino');";
								 			
					$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


			 		/*=====  End of Salarios  ======*/


					/*=====  End of Destino  ======*/



		 		}else if ($identificadorPaginaReal=="sueldos__item") {
		 			
					$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `sueldoDestino`, `aportePatronalDestino`, `decimoTerceraDestino`, `decimoCuartaDestino`, `fondosReservaDestino`, `sueldoDestino__sumando`, `aportePatronalDestino__sumando`, `decimoTerceraDestino__sumando`, `decimoCuartaDestino__sumando`, `fondosReservaDestino__sumando`, `salarioOrigen`, `aportePatronalOrigen`, `decimoTerceroOrigen`, `decimoCuartoOrigen`, `fondosDeReservaOrigen`, `salarioOrigen__restando`, `aportePatronalOrigen__restando`, `decimoTerceroOrigen__restando`, `decimoCuartoOrigen__restando`, `fondosDeReservaOrigen__restando`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$persona_sueldos_data', $persona_sueldos_data, $eneroOrigen__sueldos, $febreroOrigen__sueldos, $marzoOrigen__sueldos, $abrilOrigen__sueldos, $mayoOrigen__sueldos, $junioOrigen__sueldos, $julioOrigen__sueldos, $agostoOrigen__sueldos, $septiembreOrigen__sueldos, $octubreOrigen__sueldos, $noviembreOrigen__sueldos, $diciembreOrigen__sueldos, $totalOrigen, $enero__origen__restante, $febrero__origen__restante, $marzo__origen__restante, $abril__origen__restante, $mayo__origen__restante, $junio__origen__restante, $julio__origen__restante, $agosto__origen__restante, $septiembre__origen__restante, $octubre__origen__restante, $noviembre__origen__restante, $diciembre__origen__restante, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, $totalDestino, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','sueldos__item','0','0','0','0','0','0','0','0','0','0','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$total__origen__salarios__totales__ingresados','$total__origen__patronal__totales__ingresados','$total__origen__decimo__tercero__totales__ingresados','$total__origen__decimo__cuarto__totales__ingresados','$total__origen__fondos__de__reserva__totales__ingresados','$sumaOrigen1','$sumaOrigen1Restante','$totalDestinoInicial','$totalDestinoVigente','$totalOrigen','$totalMesAsignados__destinos');";

					$resultado= $conexionEstablecida->exec($query);

						$obtenMaximo__origen=$objeto->getObtenerInformacionGeneral("SELECT MAX(idOrigenDestino) AS maximoObtencioOrigen FROM poa_modificaciones_origen_destino;");


						/*==============================
						=            Orígen            =
						==============================*/

						
						$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';",[$eneroOrigen__sueldos,$febreroOrigen__sueldos,$marzoOrigen__sueldos,$abrilOrigen__sueldos,$mayoOrigen__sueldos,$junioOrigen__sueldos,$julioOrigen__sueldos,$agostoOrigen__sueldos,$septiembreOrigen__sueldos,$octubreOrigen__sueldos,$noviembreOrigen__sueldos,$diciembreOrigen__sueldos,$totalOrigen]);

				 		$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idSueldos='$persona_sueldos_data';");


				 		$queryEjectuado="UPDATE poa_sueldossalarios2022 SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idSueldos='$persona_sueldos_data';";
				 		$resultadoEjecutado= $conexionEstablecida->exec($queryEjectuado);


				 		/*=======================================
				 		=            Aporte patronal            =
				 		=======================================*/
				 		
				 		$origenPatronal=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';",[$enero__origen__aporte__patronal__ingresar,$febrero__origen__aporte__patronal__ingresar,$marzo__origen__aporte__patronal__ingresar,$abril__origen__aporte__patronal__ingresar,$mayo__origen__aporte__patronal__ingresar,$junio__origen__aporte__patronal__ingresar,$julio__origen__aporte__patronal__ingresar,$agosto__origen__aporte__patronal__ingresar,$septiembre__origen__aporte__patronal__ingresar,$octubre__origen__aporte__patronal__ingresar,$noviembre__origen__aporte__patronal__ingresar,$diciembre__origen__aporte__patronal__ingresar,$total__origen__patronal__totales__ingresados]);

						$origenPatronalObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';");

						
						$queryOrigenPatronal="UPDATE poa_programacion_financiera SET enero='$origenPatronal[0]',febrero='$origenPatronal[1]',marzo='$origenPatronal[2]',abril='$origenPatronal[3]',mayo='$origenPatronal[4]',junio='$origenPatronal[5]',julio='$origenPatronal[6]',agosto='$origenPatronal[7]',septiembre='$origenPatronal[8]',octubre='$origenPatronal[9]',noviembre='$origenPatronal[10]',diciembre='$origenPatronal[11]',totalTotales='$origenPatronal[12]',enero2='".$origenPatronalObtener[0][enero]."',febrero2='".$origenPatronalObtener[0][febrero]."',marzo2='".$origenPatronalObtener[0][marzo]."',abril2='".$origenPatronalObtener[0][abril]."',mayo2='".$origenPatronalObtener[0][mayo]."',junio2='".$origenPatronalObtener[0][junio]."',julio2='".$origenPatronalObtener[0][julio]."',agosto2='".$origenPatronalObtener[0][agosto]."',septiembre2='".$origenPatronalObtener[0][septiembre]."',octubre2='".$origenPatronalObtener[0][octubre]."',noviembre2='".$origenPatronalObtener[0][noviembre]."',diciembre2='".$origenPatronalObtener[0][diciembre]."',total2='".$origenPatronalObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='38';";
									 			
						$resultadoOrigenPatronal= $conexionEstablecida->exec($queryOrigenPatronal);		 		
				 		
						
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__aporte__patronal__ingresar.", ".$febrero__origen__aporte__patronal__ingresar.", ".$marzo__origen__aporte__patronal__ingresar.", ".$abril__origen__aporte__patronal__ingresar.", ".$mayo__origen__aporte__patronal__ingresar.", ".$junio__origen__aporte__patronal__ingresar.", ".$julio__origen__aporte__patronal__ingresar.", ".$agosto__origen__aporte__patronal__ingresar.", ".$septiembre__origen__aporte__patronal__ingresar.", ".$octubre__origen__aporte__patronal__ingresar.", ".$noviembre__origen__aporte__patronal__ingresar.", ".$diciembre__origen__aporte__patronal__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'aporte','origen');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		/*=====  End of Aporte patronal  ======*/

				 		
				 		/*============================================
				 		=            Décimo tercer sueldo            =
				 		============================================*/
				 		
				 		$origenDecimoTercer=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';",[$enero__origen__decimo__tercero__ingresar,$febrero__origen__decimo__tercero__ingresar,$marzo__origen__decimo__tercero__ingresar,$abril__origen__decimo__tercero__ingresar,$mayo__origen__decimo__tercero__ingresar,$junio__origen__decimo__tercero__ingresar,$julio__origen__decimo__tercero__ingresar,$agosto__origen__decimo__tercero__ingresar,$septiembre__origen__decimo__tercero__ingresar,$octubre__origen__decimo__tercero__ingresar,$noviembre__origen__decimo__tercero__ingresar,$diciembre__origen__decimo__tercero__ingresar,$total__origen__decimo__tercero__totales__ingresados]);

				 		$origenDecimoTercerObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';");

						$queryOrigenDecimoTercer="UPDATE poa_programacion_financiera SET enero='$origenDecimoTercer[0]',febrero='$origenDecimoTercer[1]',marzo='$origenDecimoTercer[2]',abril='$origenDecimoTercer[3]',mayo='$origenDecimoTercer[4]',junio='$origenDecimoTercer[5]',julio='$origenDecimoTercer[6]',agosto='$origenDecimoTercer[7]',septiembre='$origenDecimoTercer[8]',octubre='$origenDecimoTercer[9]',noviembre='$origenDecimoTercer[10]',diciembre='$origenDecimoTercer[11]',totalTotales='$origenDecimoTercer[12]',enero2='".$origenDecimoTercerObtener[0][enero]."',febrero2='".$origenDecimoTercerObtener[0][febrero]."',marzo2='".$origenDecimoTercerObtener[0][marzo]."',abril2='".$origenDecimoTercerObtener[0][abril]."',mayo2='".$origenDecimoTercerObtener[0][mayo]."',junio2='".$origenDecimoTercerObtener[0][junio]."',julio2='".$origenDecimoTercerObtener[0][julio]."',agosto2='".$origenDecimoTercerObtener[0][agosto]."',septiembre2='".$origenDecimoTercerObtener[0][septiembre]."',octubre2='".$origenDecimoTercerObtener[0][octubre]."',noviembre2='".$origenDecimoTercerObtener[0][noviembre]."',diciembre2='".$origenDecimoTercerObtener[0][diciembre]."',total2='".$origenDecimoTercerObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='53';";

						$resultadoOrigenDecimoTercer= $conexionEstablecida->exec($queryOrigenDecimoTercer);		 

				 		
						
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__tercero__ingresar.", ".$febrero__origen__decimo__tercero__ingresar.", ".$marzo__origen__decimo__tercero__ingresar.", ".$abril__origen__decimo__tercero__ingresar.", ".$mayo__origen__decimo__tercero__ingresar.", ".$junio__origen__decimo__tercero__ingresar.", ".$julio__origen__decimo__tercero__ingresar.", ".$agosto__origen__decimo__tercero__ingresar.", ".$septiembre__origen__decimo__tercero__ingresar.", ".$octubre__origen__decimo__tercero__ingresar.", ".$noviembre__origen__decimo__tercero__ingresar.", ".$diciembre__origen__decimo__tercero__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoTercer','origen');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		/*=====  End of Décimo tercer sueldo  ======*/


				 		/*=====================================
				 		=            Décimo cuarto            =
				 		=====================================*/
				 		
				 		$origenDecimoCuarto=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';",[$enero__origen__decimo__cuarto__ingresar,$febrero__origen__decimo__cuarto__ingresar,$marzo__origen__decimo__cuarto__ingresar,$abril__origen__decimo__cuarto__ingresar,$mayo__origen__decimo__cuarto__ingresar,$junio__origen__decimo__cuarto__ingresar,$julio__origen__decimo__cuarto__ingresar,$agosto__origen__decimo__cuarto__ingresar,$septiembre__origen__decimo__cuarto__ingresar,$octubre__origen__decimo__cuarto__ingresar,$noviembre__origen__decimo__cuarto__ingresar,$diciembre__origen__decimo__cuarto__ingresar,$total__origen__decimo__cuarto__totales__ingresados]);

				 		$origenDecimoCuartoObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';");
				 		

						$queryOrigenDecimoCuarto="UPDATE poa_programacion_financiera SET enero='$origenDecimoCuarto[0]',febrero='$origenDecimoCuarto[1]',marzo='$origenDecimoCuarto[2]',abril='$origenDecimoCuarto[3]',mayo='$origenDecimoCuarto[4]',junio='$origenDecimoCuarto[5]',julio='$origenDecimoCuarto[6]',agosto='$origenDecimoCuarto[7]',septiembre='$origenDecimoCuarto[8]',octubre='$origenDecimoCuarto[9]',noviembre='$origenDecimoCuarto[10]',diciembre='$origenDecimoCuarto[11]',totalTotales='$origenDecimoCuarto[12]',enero2='".$origenDecimoCuartoObtener[0][enero]."',febrero2='".$origenDecimoCuartoObtener[0][febrero]."',marzo2='".$origenDecimoCuartoObtener[0][marzo]."',abril2='".$origenDecimoCuartoObtener[0][abril]."',mayo2='".$origenDecimoCuartoObtener[0][mayo]."',junio2='".$origenDecimoCuartoObtener[0][junio]."',julio2='".$origenDecimoCuartoObtener[0][julio]."',agosto2='".$origenDecimoCuartoObtener[0][agosto]."',septiembre2='".$origenDecimoCuartoObtener[0][septiembre]."',octubre2='".$origenDecimoCuartoObtener[0][octubre]."',noviembre2='".$origenDecimoCuartoObtener[0][noviembre]."',diciembre2='".$origenDecimoCuartoObtener[0][diciembre]."',total2='".$origenDecimoCuartoObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='52';";

						$resultadoOrigenDecimoCuarto= $conexionEstablecida->exec($queryOrigenDecimoCuarto);		 
				 		

						
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'decimoCuarto','origen');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	
				 		

				 		/*=====  End of Décimo cuarto  ======*/


				 		/*==========================================
				 		=            Fondos de ereserva            =
				 		==========================================*/
				 		
				 		$origenFondosReserva=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';",[$enero__origen__fondos__de__reserva__ingresar,$febrero__origen__fondos__de__reserva__ingresar,$marzo__origen__fondos__de__reserva__ingresar,$abril__origen__fondos__de__reserva__ingresar,$mayo__origen__fondos__de__reserva__ingresar,$junio__origen__fondos__de__reserva__ingresar,$julio__origen__fondos__de__reserva__ingresar,$agosto__origen__fondos__de__reserva__ingresar,$septiembre__origen__fondos__de__reserva__ingresar,$octubre__origen__fondos__de__reserva__ingresar,$noviembre__origen__fondos__de__reserva__ingresar,$diciembre__origen__fondos__de__reserva__ingresar,$total__origen__fondos__de__reserva__totales__ingresados]);

				 		$origenFondosReservaObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';");

				 		$queryOrigenFondosReserva="UPDATE poa_programacion_financiera SET enero='$origenFondosReserva[0]',febrero='$origenFondosReserva[1]',marzo='$origenFondosReserva[2]',abril='$origenFondosReserva[3]',mayo='$origenFondosReserva[4]',junio='$origenFondosReserva[5]',julio='$origenFondosReserva[6]',agosto='$origenFondosReserva[7]',septiembre='$origenFondosReserva[8]',octubre='$origenFondosReserva[9]',noviembre='$origenFondosReserva[10]',diciembre='$origenFondosReserva[11]',totalTotales='$origenFondosReserva[12]',enero2='".$origenFondosReservaObtener[0][enero]."',febrero2='".$origenFondosReservaObtener[0][febrero]."',marzo2='".$origenFondosReservaObtener[0][marzo]."',abril2='".$origenFondosReservaObtener[0][abril]."',mayo2='".$origenFondosReservaObtener[0][mayo]."',junio2='".$origenFondosReservaObtener[0][junio]."',julio2='".$origenFondosReservaObtener[0][julio]."',agosto2='".$origenFondosReservaObtener[0][agosto]."',septiembre2='".$origenFondosReservaObtener[0][septiembre]."',octubre2='".$origenFondosReservaObtener[0][octubre]."',noviembre2='".$origenFondosReservaObtener[0][noviembre]."',diciembre2='".$origenFondosReservaObtener[0][diciembre]."',total2='".$origenFondosReservaObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='65';";

						$resultadoFondosReserva= $conexionEstablecida->exec($queryOrigenFondosReserva);		 
				 		
						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__decimo__cuarto__ingresar.", ".$febrero__origen__decimo__cuarto__ingresar.", ".$marzo__origen__decimo__cuarto__ingresar.", ".$abril__origen__decimo__cuarto__ingresar.", ".$mayo__origen__decimo__cuarto__ingresar.", ".$junio__origen__decimo__cuarto__ingresar.", ".$julio__origen__decimo__cuarto__ingresar.", ".$agosto__origen__decimo__cuarto__ingresar.", ".$septiembre__origen__decimo__cuarto__ingresar.", ".$octubre__origen__decimo__cuarto__ingresar.", ".$noviembre__origen__decimo__cuarto__ingresar.", ".$diciembre__origen__decimo__cuarto__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'fondosReserva','origen');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	

				 		/*=====  End of Fondos de ereserva  ======*/

				 		/*================================
				 		=            Salarios            =
				 		================================*/
				 		
				 		$origenSalarios=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';",[$enero__origen__salarios__ingresar,$febrero__origen__salarios__ingresar,$marzo__origen__salarios__ingresar,$abril__origen__salarios__ingresar,$mayo__origen__salarios__ingresar,$junio__origen__salarios__ingresar,$julio__origen__salarios__ingresar,$agosto__origen__salarios__ingresar,$septiembre__origen__salarios__ingresar,$octubre__origen__salarios__ingresar,$noviembre__origen__salarios__ingresar,$diciembre__origen__salarios__ingresar,$total__origen__salarios__totales__ingresados]);


				 		$origenSalariosObtener=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';");

				 		$queryOrigenSalarios="UPDATE poa_programacion_financiera SET enero='$origenSalarios[0]',febrero='$origenSalarios[1]',marzo='$origenSalarios[2]',abril='$origenSalarios[3]',mayo='$origenSalarios[4]',junio='$origenSalarios[5]',julio='$origenSalarios[6]',agosto='$origenSalarios[7]',septiembre='$origenSalarios[8]',octubre='$origenSalarios[9]',noviembre='$origenSalarios[10]',diciembre='$origenSalarios[11]',totalTotales='$origenSalarios[12]',enero2='".$origenSalariosObtener[0][enero]."',febrero2='".$origenSalariosObtener[0][febrero]."',marzo2='".$origenSalariosObtener[0][marzo]."',abril2='".$origenSalariosObtener[0][abril]."',mayo2='".$origenSalariosObtener[0][mayo]."',junio2='".$origenSalariosObtener[0][junio]."',julio2='".$origenSalariosObtener[0][julio]."',agosto2='".$origenSalariosObtener[0][agosto]."',septiembre2='".$origenSalariosObtener[0][septiembre]."',octubre2='".$origenSalariosObtener[0][octubre]."',noviembre2='".$origenSalariosObtener[0][noviembre]."',diciembre2='".$origenSalariosObtener[0][diciembre]."',total2='".$origenSalariosObtener[0][total]."' WHERE idOrganismo='".$idOrganismoSession."' AND perioIngreso='".$aniosPeriodos__ingesos."' AND idItem='97';";

				 		$resultadoSalarios= $conexionEstablecida->exec($queryOrigenSalarios);	

						$querEjecutarBonificaciones="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_bonificacion` (`idTramitesModificas`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `idOrigenDestino`, `tipo`, `estado`) VALUES (NULL, ".$enero__origen__salarios__ingresar.", ".$febrero__origen__salarios__ingresar.", ".$marzo__origen__salarios__ingresar.", ".$abril__origen__salarios__ingresar.", ".$mayo__origen__salarios__ingresar.", ".$junio__origen__salarios__ingresar.", ".$julio__origen__salarios__ingresar.", ".$agosto__origen__salarios__ingresar.", ".$septiembre__origen__salarios__ingresar.", ".$octubre__origen__salarios__ingresar.", ".$noviembre__origen__salarios__ingresar.", ".$diciembre__origen__salarios__ingresar.", ".$obtenMaximo__origen[0][maximoObtencioOrigen].",'salarios','origen');";
									 			
						$resultadoBonificaciones= $conexionEstablecida->exec($querEjecutarBonificaciones);	


		 					/*=====  End of Salarios  ======*/
						/*=====  End of Orígen  ======*/

		 		}else{


		 			if ($variableIdentificadorasHonoSueldos=="honorariosD") {


		 				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen, $febreroOrigen, $marzoOrigen, $abrilOrigen, $mayoOrigen, $junioOrigen, $julioOrigen, $agostoOrigen, $septiembreOrigen, $octubreOrigen, $noviembreOrigen, $diciembreOrigen, $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, $totalDestino, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','honorarios__item','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoVigente','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 				$resultado= $conexionEstablecida->exec($query);
		 				
		 			}else{


		 				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_origen_destino` (`idOrigenDestino`, `actividadOrigen`, `eventosOrigen`, `idFinancierioOrigen`, `eneroOrigen`, `febreroOrigen`, `marzoOrigen`, `abrilOrigen`, `mayoOrigen`, `junioOrigen`, `julioOrigen`, `agostoOrigen`, `septiembreOrigen`, `octubreOrigen`, `noviembreOrigen`, `diciembreOrigen`, `totalOrigen`, `eneroOrigen__restando`, `febreroOrigen__restando`, `marzoOrigen__restando`, `abrilOrigen__restando`, `mayoOrigen__restando`, `junioOrigen__restando`, `julioOrigen__restando`, `agostoOrigen__restando`, `septiembreOrigen__restando`, `octubreOrigen__restando`, `noviembreOrigen__restando`, `diciembreOrigen__restando`, `actividadDestino`, `eventosDestino`, `idFinancierioDestino`, `eneroDestino`, `febreroDestino`, `marzoDestino`, `abrilDestino`, `mayoDestino`, `junioDestino`, `julioDestino`, `agostoDestino`, `septiembreDestino`, `octubreDestino`, `noviembreDestino`, `diciembreDestino`, `totalDestino`, `eneroDestino__sumando`, `febreroDestino__sumando`, `marzoDestino__sumando`, `abrilDestino__sumando`, `mayoDestino__sumando`, `junioDestino__sumando`, `julioDestino__sumando`, `agostoDestino__sumando`, `septiembreDestino__sumando`, `octubreDestino__sumando`, `noviembreDestino__sumando`, `diciembreDestino__sumando`, `idOrganismo`, `periodoIngreso`, `fecha`, `documento`, `justificacion`, `tipoTramite`, `identificadorPaginaReal`, `totalOrigenInicial`, `totalOrigenVigente`, `totalDestinoInicial`, `totalDestinoVigente`, `totalPlanifiacionOrigen`, `totalPlanificacionDestino`) VALUES (NULL, $actividadOrigen, '$eventosOrigen', $idFinancierioOrigen, $eneroOrigen, $febreroOrigen, $marzoOrigen, $abrilOrigen, $mayoOrigen, $junioOrigen, $julioOrigen, $agostoOrigen, $septiembreOrigen, $octubreOrigen, $noviembreOrigen, $diciembreOrigen, $totalOrigen, $eneroOrigen__restando, $febreroOrigen__restando, $marzoOrigen__restando, $abrilOrigen__restando, $mayoOrigen__restando, $junioOrigen__restando, $julioOrigen__restando, $agostoOrigen__restando, $septiembreOrigen__restando, $octubreOrigen__restando, $noviembreOrigen__restando, $diciembreOrigen__restando, $actividadDestino, '$eventosDestino', $idFinancierioDestino, $eneroDestino, $febreroDestino, $marzoDestino, $abrilDestino, $mayoDestino, $junioDestino, $julioDestino, $agostoDestino, $septiembreDestino, $octubreDestino, $noviembreDestino, $diciembreDestino, $totalDestino, $eneroDestino__sumando, $febreroDestino__sumando, $marzoDestino__sumando, $abrilDestino__sumando, $mayoDestino__sumando, $junioDestino__sumando, $julioDestino__sumando, $agostoDestino__sumando, $septiembreDestino__sumando, $octubreDestino__sumando, $noviembreDestino__sumando, $diciembreDestino__sumando, $idOrganismoSession, $aniosPeriodos__ingesos, '$fecha_actual','$nombreDocumentos','$origen_justificacion','$tipoTramite','$identificadorPaginaReal','$totalOrigenInicial','$totalOrigenVigente','$totalDestinoInicial','$totalDestinoVigente','$sumadorPlanificacionOrigen','$sumadorPlanificacionDestino');";

		 				$resultado= $conexionEstablecida->exec($query);

		 			}


		 		}




		 		/*==============================
		 		=            Origen            =
		 		==============================*/
		 		

		 		if (($identificadorPaginaReal=="honorarios__item" && intval($actividadOrigen)==4) || ($identificadorPaginaReal=="honorarios" && intval($actividadOrigen)==4)) {


		 			$eneroRestarH=0;
		 			$febreroRestarH=0;
		 			$marzoRestarH=0;
		 			$abrilRestarH=0;
		 			$mayoRestarH=0;
		 			$junioRestarH=0;
		 			$julioRestarH=0;
		 			$agostoRestarH=0;
		 			$septiembreRestarH=0;
		 			$octubreRestarH=0;
		 			$noviembreRestarH=0;
		 			$diciembreRestarH=0;
		 			$totalRestarH=0;

		 			$eneroSumaH=0;
		 			$febreroSumaH=0;
		 			$marzoSumaH=0;
		 			$abrilSumaH=0;
		 			$mayoSumaH=0;
		 			$junioSumaH=0;
		 			$julioSumaH=0;
		 			$agostoSumaH=0;
		 			$septiembreSumaH=0;
		 			$octubreSumaH=0;
		 			$noviembreSumaH=0;
		 			$diciembreSumaH=0;
		 			$totalSumaH=0;

					$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_honorarios2022 WHERE idHonorarios='$eventosOrigen';",[$eneroOrigen,$febreroOrigen,$marzoOrigen,$abrilOrigen,$mayoOrigen,$junioOrigen,$julioOrigen,$agostoOrigen,$septiembreOrigen,$octubreOrigen,$noviembreOrigen,$diciembreOrigen,$totalOrigen]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_honorarios2022 WHERE idHonorarios='$eventosOrigen';");

 					$queryEjectuado="UPDATE poa_honorarios2022 SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idHonorarios='$eventosOrigen';";
		 			$resultadoEjecutado= $conexionEstablecida->exec($queryEjectuado);

		 			$obtenerFinancieroHonorarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idItem='71' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");


		 			$eneroRestarH=floatval($obtenerFinancieroHonorarios[0][enero]) - floatval($obtenerSalariosInformacion[0][enero]);
		 			$febreroRestarH=floatval($obtenerFinancieroHonorarios[0][febrero]) - floatval($obtenerSalariosInformacion[0][febrero]);
		 			$marzoRestarH=floatval($obtenerFinancieroHonorarios[0][marzo]) - floatval($obtenerSalariosInformacion[0][marzo]);
		 			$abrilRestarH=floatval($obtenerFinancieroHonorarios[0][abril]) - floatval($obtenerSalariosInformacion[0][abril]);
		 			$mayoRestarH=floatval($obtenerFinancieroHonorarios[0][mayo]) - floatval($obtenerSalariosInformacion[0][mayo]);
		 			$junioRestarH=floatval($obtenerFinancieroHonorarios[0][junio]) - floatval($obtenerSalariosInformacion[0][junio]);
		 			$julioRestarH=floatval($obtenerFinancieroHonorarios[0][julio]) - floatval($obtenerSalariosInformacion[0][julio]);
		 			$agostoRestarH=floatval($obtenerFinancieroHonorarios[0][agosto]) - floatval($obtenerSalariosInformacion[0][agosto]);
		 			$septiembreRestarH=floatval($obtenerFinancieroHonorarios[0][septiembre]) - floatval($obtenerSalariosInformacion[0][septiembre]);
		 			$octubreRestarH=floatval($obtenerFinancieroHonorarios[0][octubre]) - floatval($obtenerSalariosInformacion[0][octubre]);
		 			$noviembreRestarH=floatval($obtenerFinancieroHonorarios[0][noviembre]) - floatval($obtenerSalariosInformacion[0][noviembre]);
		 			$diciembreRestarH=floatval($obtenerFinancieroHonorarios[0][diciembre]) - floatval($obtenerSalariosInformacion[0][diciembre]);
		 			$totalRestarH=floatval($obtenerFinancieroHonorarios[0][totalTotales]) - floatval($obtenerSalariosInformacion[0][total]);



		 			$eneroSumaH=floatval($obtenerSalariosInformacionRestar[0]) - floatval($eneroRestarH);
		 			$febreroSumaH=floatval($obtenerSalariosInformacionRestar[1]) - floatval($febreroRestarH);
		 			$marzoSumaH=floatval($obtenerSalariosInformacionRestar[2]) - floatval($marzoRestarH);
		 			$abrilSumaH=floatval($obtenerSalariosInformacionRestar[3]) - floatval($abrilRestarH);
		 			$mayoSumaH=floatval($obtenerSalariosInformacionRestar[4]) - floatval($mayoRestarH);
		 			$junioSumaH=floatval($obtenerSalariosInformacionRestar[5]) - floatval($junioRestarH);
		 			$julioSumaH=floatval($obtenerSalariosInformacionRestar[6]) - floatval($julioRestarH);
		 			$agostoSumaH=floatval($obtenerSalariosInformacionRestar[7]) - floatval($agostoRestarH);
		 			$septiembreSumaH=floatval($obtenerSalariosInformacionRestar[8]) - floatval($septiembreRestarH);
		 			$octubreSumaH=floatval($obtenerSalariosInformacionRestar[9]) - floatval($octubreRestarH);
		 			$noviembreSumaH=floatval($obtenerSalariosInformacionRestar[10]) - floatval($noviembreRestarH);
		 			$diciembreSumaH=floatval($obtenerSalariosInformacionRestar[11]) - floatval($diciembreRestarH);
		 			$totalSumaH=floatval($obtenerSalariosInformacionRestar[12]) - floatval($totalRestarH);


		 			$queryEjectuadoDestino2="UPDATE poa_programacion_financiera SET enero='$eneroSumaH',febrero='$febreroSumaH',marzo='$marzoSumaH',abril='$abrilSumaH',mayo='$mayoSumaH',junio='$junioSumaH',julio='$julioSumaH',agosto='$agostoSumaH',septiembre='$septiembreSumaH',octubre='$octubreSumaH',noviembre='$noviembreSumaH',diciembre='$diciembreSumaH',totalTotales='$totalSumaH',enero2='".$obtenerFinancieroHonorarios[0][enero]."',febrero2='".$obtenerFinancieroHonorarios[0][febrero]."',marzo2='".$obtenerFinancieroHonorarios[0][marzo]."',abril2='".$obtenerFinancieroHonorarios[0][abril]."',mayo2='".$obtenerFinancieroHonorarios[0][mayo]."',junio2='".$obtenerFinancieroHonorarios[0][junio]."',julio2='".$obtenerFinancieroHonorarios[0][julio]."',agosto2='".$obtenerFinancieroHonorarios[0][agosto]."',septiembre2='".$obtenerFinancieroHonorarios[0][septiembre]."',octubre2='".$obtenerFinancieroHonorarios[0][octubre]."',noviembre2='".$obtenerFinancieroHonorarios[0][noviembre]."',diciembre2='".$obtenerFinancieroHonorarios[0][diciembre]."',total2='".$obtenerFinancieroHonorarios[0][totalTotales]."'  WHERE idProgramacionFinanciera='".$obtenerFinancieroHonorarios[0][idProgramacionFinanciera]."';";

					$resultadoEjecutadoDestino2= $conexionEstablecida->exec($queryEjectuadoDestino2);			 			


		 		}



		 		if (intval($actividadOrigen)==1) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';",[$eneroOrigen,$febreroOrigen,$marzoOrigen,$abrilOrigen,$mayoOrigen,$junioOrigen,$julioOrigen,$agostoOrigen,$septiembreOrigen,$octubreOrigen,$noviembreOrigen,$diciembreOrigen,$totalOrigen]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioOrigen';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);

		 		}


		 		if (intval($actividadOrigen)==2) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';",[$eneroOrigen,$febreroOrigen,$marzoOrigen,$abrilOrigen,$mayoOrigen,$junioOrigen,$julioOrigen,$agostoOrigen,$septiembreOrigen,$octubreOrigen,$noviembreOrigen,$diciembreOrigen,$totalOrigen]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioOrigen';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


					$queryEjectuadoDestino="UPDATE poa_mantenimiento SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioOrigen';";

					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


		 		}

		 		if (intval($actividadOrigen)==3 || intval($actividadOrigen)==5 || intval($actividadOrigen)==6 || intval($actividadOrigen)==7) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__origen("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';",[$eneroOrigen,$febreroOrigen,$marzoOrigen,$abrilOrigen,$mayoOrigen,$junioOrigen,$julioOrigen,$agostoOrigen,$septiembreOrigen,$octubreOrigen,$noviembreOrigen,$diciembreOrigen,$totalOrigen]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioOrigen';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioOrigen';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);

					$obtencionRestares=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalElem AS total FROM poa_actdeportivas WHERE nombreEvento='$eventosOrigen';");

					$eneroRestares=floatval($obtencionRestares[0][enero]) - $eneroOrigen;
					$febreroRestares=floatval($obtencionRestares[0][febrero]) - $febreroOrigen;
					$marzoRestares=floatval($obtencionRestares[0][marzo]) - $marzoOrigen;
					$abrilRestares=floatval($obtencionRestares[0][abril]) - $abrilOrigen;
					$mayoRestares=floatval($obtencionRestares[0][mayo]) - $mayoOrigen;
					$junioRestares=floatval($obtencionRestares[0][junio]) - $junioOrigen;
					$julioRestares=floatval($obtencionRestares[0][julio]) - $julioOrigen;
					$agostoRestares=floatval($obtencionRestares[0][agosto]) - $agostoOrigen;
					$septiembreRestares=floatval($obtencionRestares[0][septiembre]) - $septiembreOrigen;
					$octubreRestares=floatval($obtencionRestares[0][octubre]) - $octubreOrigen;
					$noviembreRestares=floatval($obtencionRestares[0][noviembre]) - $noviembreOrigen;
					$diciembreRestares=floatval($obtencionRestares[0][diciembre]) - $diciembreOrigen;
					$totalRestares=floatval($obtencionRestares[0][total]) - $totalOrigen;


					$queryEjectuadoDestino="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.enero='$eneroOrigen__restando',a.febrero='$febreroOrigen__restando',a.marzo='$abrilOrigen__restando',a.abril='$abrilOrigen__restando',a.mayo='$mayoOrigen__restando',a.junio='$junioOrigen__restando',a.julio='$julioOrigen__restando',a.agosto='$agostoOrigen__restando',a.septiembre='$septiembreOrigen__restando',a.octubre='$octubreOrigen__restando',a.noviembre='$noviembreOrigen__restando',a.diciembre='$diciembreOrigen__restando',a.totalElem='$totalOrigen__restando',a.enero2='$eneroOrigen__restando',a.febrero2='$febreroOrigen__restando',a.marzo2='$marzoOrigen__restando',a.abril2='$abrilOrigen__restando',a.mayo2='$mayoOrigen__restando',a.junio2='$junioOrigen__restando',a.julio2='$julioOrigen__restando',a.agosto2='$agostoOrigen__restando',a.septiembre2='$septiembreOrigen__restando',a.octubre2='$octubreOrigen__restando',a.noviembre2='$noviembreOrigen__restando',a.diciembre2='$diciembreOrigen__restando'  WHERE a.nombreEvento='$eventosOrigen' AND b.idProgramacionFinanciera='$idFinancierioOrigen';";


					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);
					// echo $queryEjectuadoDestino;


		 		}


		 		/*=====  End of Origen  ======*/
		 		

		 		/*===============================
		 		=            Destino            =
		 		===============================*/
		 		
		 		
		 		if ($variableIdentificadorasHonoSueldos=="honorariosD" || ($actividadDestino==4 && $identificadorPaginaReal=="honorarios")) {

		 			$eneroRestarH=0;
		 			$febreroRestarH=0;
		 			$marzoRestarH=0;
		 			$abrilRestarH=0;
		 			$mayoRestarH=0;
		 			$junioRestarH=0;
		 			$julioRestarH=0;
		 			$agostoRestarH=0;
		 			$septiembreRestarH=0;
		 			$octubreRestarH=0;
		 			$noviembreRestarH=0;
		 			$diciembreRestarH=0;
		 			$totalRestarH=0;

		 			$eneroSumaH=0;
		 			$febreroSumaH=0;
		 			$marzoSumaH=0;
		 			$abrilSumaH=0;
		 			$mayoSumaH=0;
		 			$junioSumaH=0;
		 			$julioSumaH=0;
		 			$agostoSumaH=0;
		 			$septiembreSumaH=0;
		 			$octubreSumaH=0;
		 			$noviembreSumaH=0;
		 			$diciembreSumaH=0;
		 			$totalSumaH=0;
		 			
		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_honorarios2022 WHERE idHonorarios='$eventosDestino';",[$eneroDestino,$febreroDestino,$marzoDestino,$abrilDestino,$mayoDestino,$junioDestino,$julioDestino,$agostoDestino,$septiembreDestino,$octubreDestino,$noviembreDestino,$diciembreDestino,$totalDestino]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_honorarios2022 WHERE idHonorarios='$eventosDestino';");

 					$queryEjectuado="UPDATE poa_honorarios2022 SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idHonorarios='$eventosDestino';";
		 			$resultadoEjecutado= $conexionEstablecida->exec($queryEjectuado);

		 			$obtenerFinancieroHonorarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idItem='71' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");


		 			$eneroRestarH=floatval($obtenerFinancieroHonorarios[0][enero]) - floatval($obtenerSalariosInformacion[0][enero]);
		 			$febreroRestarH=floatval($obtenerFinancieroHonorarios[0][febrero]) - floatval($obtenerSalariosInformacion[0][febrero]);
		 			$marzoRestarH=floatval($obtenerFinancieroHonorarios[0][marzo]) - floatval($obtenerSalariosInformacion[0][marzo]);
		 			$abrilRestarH=floatval($obtenerFinancieroHonorarios[0][abril]) - floatval($obtenerSalariosInformacion[0][abril]);
		 			$mayoRestarH=floatval($obtenerFinancieroHonorarios[0][mayo]) - floatval($obtenerSalariosInformacion[0][mayo]);
		 			$junioRestarH=floatval($obtenerFinancieroHonorarios[0][junio]) - floatval($obtenerSalariosInformacion[0][junio]);
		 			$julioRestarH=floatval($obtenerFinancieroHonorarios[0][julio]) - floatval($obtenerSalariosInformacion[0][julio]);
		 			$agostoRestarH=floatval($obtenerFinancieroHonorarios[0][agosto]) - floatval($obtenerSalariosInformacion[0][agosto]);
		 			$septiembreRestarH=floatval($obtenerFinancieroHonorarios[0][septiembre]) - floatval($obtenerSalariosInformacion[0][septiembre]);
		 			$octubreRestarH=floatval($obtenerFinancieroHonorarios[0][octubre]) - floatval($obtenerSalariosInformacion[0][octubre]);
		 			$noviembreRestarH=floatval($obtenerFinancieroHonorarios[0][noviembre]) - floatval($obtenerSalariosInformacion[0][noviembre]);
		 			$diciembreRestarH=floatval($obtenerFinancieroHonorarios[0][diciembre]) - floatval($obtenerSalariosInformacion[0][diciembre]);
		 			$totalRestarH=floatval($obtenerFinancieroHonorarios[0][totalTotales]) - floatval($obtenerSalariosInformacion[0][total]);



		 			$eneroSumaH=floatval($obtenerSalariosInformacionRestar[0]) + floatval($eneroRestarH);
		 			$febreroSumaH=floatval($obtenerSalariosInformacionRestar[1]) + floatval($febreroRestarH);
		 			$marzoSumaH=floatval($obtenerSalariosInformacionRestar[2]) + floatval($marzoRestarH);
		 			$abrilSumaH=floatval($obtenerSalariosInformacionRestar[3]) + floatval($abrilRestarH);
		 			$mayoSumaH=floatval($obtenerSalariosInformacionRestar[4]) + floatval($mayoRestarH);
		 			$junioSumaH=floatval($obtenerSalariosInformacionRestar[5]) + floatval($junioRestarH);
		 			$julioSumaH=floatval($obtenerSalariosInformacionRestar[6]) + floatval($julioRestarH);
		 			$agostoSumaH=floatval($obtenerSalariosInformacionRestar[7]) + floatval($agostoRestarH);
		 			$septiembreSumaH=floatval($obtenerSalariosInformacionRestar[8]) + floatval($septiembreRestarH);
		 			$octubreSumaH=floatval($obtenerSalariosInformacionRestar[9]) + floatval($octubreRestarH);
		 			$noviembreSumaH=floatval($obtenerSalariosInformacionRestar[10]) + floatval($noviembreRestarH);
		 			$diciembreSumaH=floatval($obtenerSalariosInformacionRestar[11]) + floatval($diciembreRestarH);
		 			$totalSumaH=floatval($obtenerSalariosInformacionRestar[12]) + floatval($totalRestarH);


		 			$queryEjectuadoDestino2="UPDATE poa_programacion_financiera SET enero='$eneroSumaH',febrero='$febreroSumaH',marzo='$marzoSumaH',abril='$abrilSumaH',mayo='$mayoSumaH',junio='$junioSumaH',julio='$julioSumaH',agosto='$agostoSumaH',septiembre='$septiembreSumaH',octubre='$octubreSumaH',noviembre='$noviembreSumaH',diciembre='$diciembreSumaH',totalTotales='$totalSumaH',enero2='".$obtenerFinancieroHonorarios[0][enero]."',febrero2='".$obtenerFinancieroHonorarios[0][febrero]."',marzo2='".$obtenerFinancieroHonorarios[0][marzo]."',abril2='".$obtenerFinancieroHonorarios[0][abril]."',mayo2='".$obtenerFinancieroHonorarios[0][mayo]."',junio2='".$obtenerFinancieroHonorarios[0][junio]."',julio2='".$obtenerFinancieroHonorarios[0][julio]."',agosto2='".$obtenerFinancieroHonorarios[0][agosto]."',septiembre2='".$obtenerFinancieroHonorarios[0][septiembre]."',octubre2='".$obtenerFinancieroHonorarios[0][octubre]."',noviembre2='".$obtenerFinancieroHonorarios[0][noviembre]."',diciembre2='".$obtenerFinancieroHonorarios[0][diciembre]."',total2='".$obtenerFinancieroHonorarios[0][totalTotales]."'  WHERE idProgramacionFinanciera='".$obtenerFinancieroHonorarios[0][idProgramacionFinanciera]."';";
							 			
					$resultadoEjecutadoDestino2= $conexionEstablecida->exec($queryEjectuadoDestino2);	
					


		 		}


		 		if (intval($actividadDestino)==1) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';",[$eneroDestino,$febreroDestino,$marzoDestino,$abrilDestino,$mayoDestino,$junioDestino,$julioDestino,$agostoDestino,$septiembreDestino,$octubreDestino,$noviembreDestino,$diciembreDestino,$totalDestino]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioDestino';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);

		 		}


		 		if (intval($actividadDestino)==2) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';",[$eneroDestino,$febreroDestino,$marzoDestino,$abrilDestino,$mayoDestino,$junioDestino,$julioDestino,$agostoDestino,$septiembreDestino,$octubreDestino,$noviembreDestino,$diciembreDestino,$totalDestino]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioDestino';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


					$queryEjectuadoDestino="UPDATE poa_mantenimiento SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',total='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioDestino';";

					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


		 		}
		 		
		 		if (intval($actividadDestino)==3 || intval($actividadDestino)==5 || intval($actividadDestino)==6 || intval($actividadDestino)==7) {

		 			$obtenerSalariosInformacionRestar=$objeto->getObtenerModificaciones__destino("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';",[$eneroDestino,$febreroDestino,$marzoDestino,$abrilDestino,$mayoDestino,$junioDestino,$julioDestino,$agostoDestino,$septiembreDestino,$octubreDestino,$noviembreDestino,$diciembreDestino,$totalDestino]);

		 			$obtenerSalariosInformacion=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales AS total FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idFinancierioDestino';");

					$queryEjectuadoDestino="UPDATE poa_programacion_financiera SET enero='$obtenerSalariosInformacionRestar[0]',febrero='$obtenerSalariosInformacionRestar[1]',marzo='$obtenerSalariosInformacionRestar[2]',abril='$obtenerSalariosInformacionRestar[3]',mayo='$obtenerSalariosInformacionRestar[4]',junio='$obtenerSalariosInformacionRestar[5]',julio='$obtenerSalariosInformacionRestar[6]',agosto='$obtenerSalariosInformacionRestar[7]',septiembre='$obtenerSalariosInformacionRestar[8]',octubre='$obtenerSalariosInformacionRestar[9]',noviembre='$obtenerSalariosInformacionRestar[10]',diciembre='$obtenerSalariosInformacionRestar[11]',totalTotales='$obtenerSalariosInformacionRestar[12]',enero2='".$obtenerSalariosInformacion[0][enero]."',febrero2='".$obtenerSalariosInformacion[0][febrero]."',marzo2='".$obtenerSalariosInformacion[0][marzo]."',abril2='".$obtenerSalariosInformacion[0][abril]."',mayo2='".$obtenerSalariosInformacion[0][mayo]."',junio2='".$obtenerSalariosInformacion[0][junio]."',julio2='".$obtenerSalariosInformacion[0][julio]."',agosto2='".$obtenerSalariosInformacion[0][agosto]."',septiembre2='".$obtenerSalariosInformacion[0][septiembre]."',octubre2='".$obtenerSalariosInformacion[0][octubre]."',noviembre2='".$obtenerSalariosInformacion[0][noviembre]."',diciembre2='".$obtenerSalariosInformacion[0][diciembre]."',total2='".$obtenerSalariosInformacion[0][total]."'  WHERE idProgramacionFinanciera='$idFinancierioDestino';";
							 			
					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);


					$queryEjectuadoDestino="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.enero='$eneroDestino__sumando',a.febrero='$febreroDestino__sumando',a.marzo='$marzoDestino__sumando',a.abril='$abrilDestino__sumando',a.mayo='$mayoDestino__sumando',a.junio='$junioDestino__sumando',a.julio='$julioDestino__sumando',a.agosto='$agostoDestino__sumando',a.septiembre='$septiembreDestino__sumando',a.octubre='$octubreDestino__sumando',a.noviembre='$noviembreDestino__sumando',a.diciembre='$diciembreDestino__sumando',a.totalElem='$totalDestino__sumando',a.enero2='$eneroDestino__sumando',a.febrero2='$febreroDestino__sumando',a.marzo2='$marzoDestino__sumando',a.abril2='$abrilDestino__sumando',a.mayo2='$mayoDestino__sumando',a.junio2='$junioDestino__sumando',a.julio2='$julioDestino__sumando',a.agosto2='$agostoDestino__sumando',a.septiembre2='$septiembreDestino__sumando',a.octubre2='$octubreDestino__sumando',a.noviembre2='$noviembreDestino__sumando',a.diciembre2='$diciembreDestino__sumando'  WHERE a.nombreEvento='$eventosDestino' AND b.idProgramacionFinanciera='$idFinancierioDestino';";


					$resultadoEjecutadoDestino= $conexionEstablecida->exec($queryEjectuadoDestino);
					// echo $queryEjectuadoDestino;



		 		}

		 		/*=====  End of Destino  ======*/

		 	}

		 	
			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;

		case "actualizaOpciones__m":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="UPDATE poa_mantenimiento SET $campo='$valor' WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
		 	$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			
			$jason['mensaje']=$mensaje;

		break;

		case "flujo__transferencias":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$queryElimina="DELETE FROM poa_flujo_transferencia WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
		 	$resultadoElimina= $conexionEstablecida->exec($queryElimina);

		 	$queryElimina2="DELETE FROM poa_flujo_transferencia_remanentes WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
		 	$resultadoElimina2= $conexionEstablecida->exec($queryElimina2);

		 	$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_flujo_transferencia` (`idFlujo`, `enero__transfer`, `febrero__transfer`, `marzo__transfer`, `abril__transfer`, `mayo__transfer`, `junio__transfer`, `julio__transfer`, `agosto__transfer`, `septiembre__transfer`, `octubre__transfer`, `noviembre__transfer`, `diciembre__transfer`, `total__transferidos__tra`, `monto__total__transfer__montoTrans__OD`, `enero__transfer__od`, `febrero__transfer__od`, `marzo__transfer__od`, `abril__transfer__od`, `mayo__transfer__od`, `junio__transfer__od`, `julio__transfer__od`, `agosto__transfer__od`, `septiembre__transfer__od`, `octubre__transfer__od`, `noviembre__transfer__od`, `diciembre__transfer__od`, `enero__transfer__od__organismo__cinco`, `febrero__transfer__od__organismo__cinco`, `marzo__transfer__od__organismo__cinco`, `abril__transfer__od__organismo__cinco`, `mayo__transfer__od__organismo__cinco`, `junio__transfer__od__organismo__cinco`, `julio__transfer__od__organismo__cinco`, `agosto__transfer__od__organismo__cinco`, `septiembre__transfer__od__organismo__cinco`, `octubre__transfer__od__organismo__cinco`, `noviembre__transfer__od__organismo__cinco`, `diciembre__transfer__od__organismo__cinco`, `cinco__total`, `idOrganismo`, `fecha`, `hora`, `perioIngreso`) VALUES (NULL, '$enero__transfer', '$febrero__transfer', '$marzo__transfer', '$abril__transfer', '$mayo__transfer', '$junio__transfer', '$julio__transfer', '$agosto__transfer', '$septiembre__transfer', '$octubre__transfer', '$noviembre__transfer', '$diciembre__transfer', '$total__transferidos__tra', '$monto__total__transfer__montoTrans__OD', '$enero__transfer__od', '$febrero__transfer__od', '$marzo__transfer__od', '$abril__transfer__od', '$mayo__transfer__od', '$junio__transfer__od', '$julio__transfer__od', '$agosto__transfer__od', '$septiembre__transfer__od', '$octubre__transfer__od', '$noviembre__transfer__od', '$diciembre__transfer__od', '$enero__transfer__od__organismo__cinco', '$febrero__transfer__od__organismo__cinco', '$marzo__transfer__od__organismo__cinco', '$abril__transfer__od__organismo__cinco', '$mayo__transfer__od__organismo__cinco', '$junio__transfer__od__organismo__cinco', '$julio__transfer__od__organismo__cinco', '$agosto__transfer__od__organismo__cinco', '$septiembre__transfer__od__organismo__cinco', '$octubre__transfer__od__organismo__cinco', '$noviembre__transfer__od__organismo__cinco', '$diciembre__transfer__od__organismo__cinco', '$cinco__total', '$idOrganismo', '$fecha_actual', '$hora_actual', '$aniosPeriodos__ingesos');";

		 	$resultado= $conexionEstablecida->exec($query);

		 	$maximo=$objeto->getObtenerInformacionGeneral("SELECT MAX(idFlujo) AS idFlujo FROM poa_flujo_transferencia;");	

		 	$maximoV=$maximo[0][idFlujo];

		 	$total__totales__t__remanentes = json_decode($total__totales__t__remanentes);
		 	$anios__transferencias__remanentes = json_decode($anios__transferencias__remanentes);
		 	$enero__remanentes = json_decode($enero__remanentes);
		 	$febrero__remanentes = json_decode($febrero__remanentes);
		 	$marzo__remanentes = json_decode($marzo__remanentes);
		 	$abril__remanentes = json_decode($abril__remanentes);
		 	$mayo__remanentes = json_decode($mayo__remanentes);
		 	$junio__remanentes = json_decode($junio__remanentes);
		 	$julio__remanentes = json_decode($julio__remanentes);
		 	$agosto__remanentes = json_decode($agosto__remanentes);
		 	$septiembre__remanentes = json_decode($septiembre__remanentes);
		 	$octubre__remanentes = json_decode($octubre__remanentes);
		 	$noviembre__remanentes = json_decode($noviembre__remanentes);
		 	$diciembre__remanentes = json_decode($diciembre__remanentes);

		 	foreach ($total__totales__t__remanentes as $clave => $valor) {

			 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_flujo_transferencia_remanentes` (`idFlujoRemanentes`, `idOrganismo`, `idFlujo`, `total__totales__t__remanentes`, `anios__transferencias__remanentes`, `enero__remanentes`, `febrero__remanentes`, `marzo__remanentes`, `abril__remanentes`, `mayo__remanentes`, `junio__remanentes`, `julio__remanentes`, `agosto__remanentes`, `septiembre__remanentes`, `octubre__remanentes`, `noviembre__remanentes`, `diciembre__remanentes`, `perioIngreso`) VALUES (NULL, '$idOrganismo', '$maximoV', '$total__totales__t__remanentes[$clave]', '$anios__transferencias__remanentes[$clave]', '$enero__remanentes[$clave]', '$febrero__remanentes[$clave]', '$marzo__remanentes[$clave]', '$abril__remanentes[$clave]', '$mayo__remanentes[$clave]', '$junio__remanentes[$clave]', '$julio__remanentes[$clave]', '$agosto__remanentes[$clave]', '$septiembre__remanentes[$clave]', '$octubre__remanentes[$clave]', '$noviembre__remanentes[$clave]', '$diciembre__remanentes[$clave]', '$aniosPeriodos__ingesos');";
			 	$resultado2= $conexionEstablecida->exec($query2);	



		 	}


			$mensaje=1;
			
			$jason['mensaje']=$mensaje;

		break;

		case "noCorrespondePoasIns":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	if ($fisicamente==6) {
		 		$query="UPDATE poa_preliminar_envio SET instalaciones='T',instalacionesE2='NC' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
		 	}else{
		 		$query="UPDATE poa_preliminar_envio SET instlaaciones2='T',instalacionesE='NC' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
		 	}

		 	$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			
			$jason['mensaje']=$mensaje;

		break;

		case "recomendacion__director__coordinaciones__terminadores__dos__aprobaciones":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


			if ($condicionante==1) {

				// $informacion__usuarios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A';");	

				// $variables=$informacion__usuarios[0][id_usuario];
				
		 		$query="UPDATE poa_preliminar_envio SET planificacion2='$coordinador__enlaces__enviadores' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

				$mensaje=2;

			}else{


				$direccionDocumentos=VARIABLE__BACKEND."aprobacion/";
				// $documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccionDocumentos,$fecha_actual."__".$idOrganismo.".pdf");

				$dire=$direccionDocumentos.$fecha_actual."__".$idOrganismo.".pdf";

				if(rename($_FILES["documentoFinal"]['tmp_name'],$dire)){

					// echo "si";

				}else{

					// echo "nopdf";

				}


				$fecha__quipux__segundos= strtotime($fecha__quipux);
				$quinceDias = $objeto->sumasdiasemana(date('Y-m-d',$fecha__quipux__segundos),15);

				$inserta=$objeto->getInsertaNormal('poa_documentofinal', array("`idFinal`, ","`documento`, ","`idOrganismo`, ","`fecha`, ","`numeroOficioNoti`, ","`numeroNotificacion`, ","`fecha_quipux`, ","`montoSinDescuentos`, ","`fecha_dias`, ","`perioIngreso`"),array("'$fecha_actual"."__"."$idOrganismo.pdf', ","'$idOrganismo', ","'$fecha_actual', ","'$numeroOficioNoti', ","'$numeroNotificacion', ","'$fecha__quipux', ","'$montoTechoSin', ","'$quinceDias', ","'$aniosPeriodos__ingesos'"));

				$valores=array("planificacion='T', planificacion2='T'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_preliminar_envio",$valores,"idOrganismo",$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);

				$mensaje=1;

			}

			
			$jason['mensaje']=$mensaje;

		break;

		case "recomendacion__director__coordinaciones__terminadores__dos":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	



			if ($asignando__estudios__atributos=="devolver") {
				
		 		$query="UPDATE poa_preliminar_envio SET planificacion2='$idEscogido' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

				$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

				$direccion1=VARIABLE__BACKEND."informesPlanificacion/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_preliminar_envio SET planificacion2='T',documentoPlanificacion='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendacion__director__coordinaciones__terminadores":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


			$informacion__usuarios=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,b.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idEscogido';");	

			$variable=$informacion__usuarios[0][id_rol];	



			if ($variable==3) {
				
		 		$query="UPDATE poa_preliminar_envio SET planificacion2=NULL,planificacion='$idEscogido' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

				$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

				$direccion1=VARIABLE__BACKEND."informesPlanificacion/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_preliminar_envio SET planificacion2='$idEscogido',documentoPlanificacion='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendacion__director__coordinaciones__dos":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


			$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

			$direccion1=VARIABLE__BACKEND."informesPlanificacion/";

			$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion1,$nombre__archivo);

			if ($asignando__estudios__atributos=="devolver") {
				
		 		$query="UPDATE poa_preliminar_envio SET planificacion='$idEscogido' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

		 		$query="UPDATE poa_preliminar_envio SET planificacion='S',planificacion2='$idEscogido',documentoPlanificacion='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendacion__director__coordinaciones":

			$informacion__usuarios=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,b.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idEscogido';");	

			$variable=$informacion__usuarios[0][id_usuario];	

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


			if ($informacion__usuarios[0][id_rol]==4) {
				
		 		$query="UPDATE poa_preliminar_envio SET financieroE='$variable', instalacionesE='$variable', instalacionesE2='$variable', subsecretariaE='$variable',planificacion=NULL WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

		 		$query="UPDATE poa_preliminar_envio SET planificacion='$idEscogido' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "honorarios__replicas__enviados":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$eliminar__querys="DELETE poa_programacion_financiera FROM poa_programacion_financiera JOIN poa_item ON poa_programacion_financiera.idItem = poa_item.idItem WHERE poa_item.itemPreesupuestario LIKE '530606' AND poa_programacion_financiera.idOrganismo='$idOrganismo' AND poa_programacion_financiera.perioIngreso='$anioActual__periodos';";
			$eliminar__querys__re= $conexionEstablecida->exec($eliminar__querys);	
				

		 	$eliminar__querys__2="DELETE FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$anioActual__periodos' AND modifica IS NULL;";
			$eliminar__querys__re__2= $conexionEstablecida->exec($eliminar__querys__2);	



	 		$query="SELECT ROUND(a.enero,2) AS enero,ROUND(a.febrero,2) AS febrero,ROUND(a.marzo,2) AS marzo,ROUND(a.abril,2) AS abril,ROUND(a.mayo,2) AS mayo,ROUND(a.junio,2) AS junio, ROUND(a.julio,2) AS julio,ROUND(a.agosto,2) AS agosto, ROUND(a.septiembre,2) AS septiembre,ROUND(a.octubre,2) AS octubre,ROUND(a.noviembre,2) AS noviembre,ROUND(a.diciembre,2) AS diciembre,ROUND(a.totalSumaItem,2) AS totalSumaItem,ROUND(a.totalTotales,2) AS totalTotales,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario LIKE '530606' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$periodoIngresos' GROUP BY b.idItem;";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$enero=$registro['enero'];
				$febrero=$registro['febrero'];
				$marzo=$registro['marzo'];
				$abril=$registro['abril'];
				$mayo=$registro['mayo'];
				$junio=$registro['junio'];
				$julio=$registro['julio'];
				$agosto=$registro['agosto'];
				$septiembre=$registro['septiembre'];
				$octubre=$registro['octubre'];
				$noviembre=$registro['noviembre'];
				$diciembre=$registro['diciembre'];
				$totalSumaItem=$registro['totalSumaItem'];
				$totalTotales=$registro['totalTotales'];
				$idItem=$registro['idItem'];

				
		 		$query__inserta="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`) VALUES (NULL, '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre', '$totalSumaItem', '$totalTotales', NULL, NULL,'$idOrganismo', '$idItem', '4', NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, '$anioActual__periodos');";
				$resultado__inserta= $conexionEstablecida->exec($query__inserta);	
				

			}


	 		$query__2="SELECT cedula,nombres,cargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,tipoCargo FROM  poa_honorarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$periodoIngresos' AND modifica IS NULL GROUP BY cedula;";
			$resultado__2 = $conexionEstablecida->query($query__2);

			while($registro__2 = $resultado__2->fetch()) {

				$cedula=$registro__2['cedula'];
				$nombres=$registro__2['nombres'];
				$cargo=$registro__2['cargo'];
				$honorarioMensual=$registro__2['honorarioMensual'];
				$enero=$registro__2['enero'];
				$febrero=$registro__2['febrero'];
				$marzo=$registro__2['marzo'];
				$abril=$registro__2['abril'];
				$mayo=$registro__2['mayo'];
				$junio=$registro__2['junio'];
				$julio=$registro__2['julio'];
				$agosto=$registro__2['agosto'];
				$septiembre=$registro__2['septiembre'];
				$octubre=$registro__2['octubre'];
				$noviembre=$registro__2['noviembre'];
				$diciembre=$registro__2['diciembre'];
				$total=$registro__2['total'];
				$tipoCargo=$registro__2['tipoCargo'];
				
		 		$query__inserta__2="INSERT INTO `ezonshar_mdepsaddb`.`poa_honorarios2022` (`idHonorarios`, `cedula`, `nombres`, `cargo`, `honorarioMensual`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `idActividad`, `modifica`, `perioIngreso`,`tipoCargo`) VALUES (NULL, '$cedula', '$nombres', '$cargo', '$honorarioMensual', '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre', '$total', '$idOrganismo', '$fecha_actual','4', NULL, '$anioActual__periodos','$tipoCargo');";
				$resultado__inserta__2= $conexionEstablecida->exec($query__inserta__2);	


			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "sueldos__replicas__enviados":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$eliminar__querys="DELETE poa_programacion_financiera FROM poa_programacion_financiera JOIN poa_item ON poa_programacion_financiera.idItem = poa_item.idItem WHERE poa_item.itemPreesupuestario LIKE '51%' AND poa_programacion_financiera.idOrganismo='$idOrganismo' AND poa_programacion_financiera.perioIngreso='$anioActual__periodos';";
			$eliminar__querys__re= $conexionEstablecida->exec($eliminar__querys);	
				

		 	$eliminar__querys__2="DELETE FROM poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$anioActual__periodos' AND modifica IS NULL;";
			$eliminar__querys__re__2= $conexionEstablecida->exec($eliminar__querys__2);	



	 		$query="SELECT ROUND(a.enero,2) AS enero,ROUND(a.febrero,2) AS febrero,ROUND(a.marzo,2) AS marzo,ROUND(a.abril,2) AS abril,ROUND(a.mayo,2) AS mayo,ROUND(a.junio,2) AS junio, ROUND(a.julio,2) AS julio,ROUND(a.agosto,2) AS agosto, ROUND(a.septiembre,2) AS septiembre,ROUND(a.octubre,2) AS octubre,ROUND(a.noviembre,2) AS noviembre,ROUND(a.diciembre,2) AS diciembre,ROUND(a.totalSumaItem,2) AS totalSumaItem,ROUND(a.totalTotales,2) AS totalTotales,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario LIKE '51%' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$periodoIngresos' GROUP BY b.idItem;";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$enero=$registro['enero'];
				$febrero=$registro['febrero'];
				$marzo=$registro['marzo'];
				$abril=$registro['abril'];
				$mayo=$registro['mayo'];
				$junio=$registro['junio'];
				$julio=$registro['julio'];
				$agosto=$registro['agosto'];
				$septiembre=$registro['septiembre'];
				$octubre=$registro['octubre'];
				$noviembre=$registro['noviembre'];
				$diciembre=$registro['diciembre'];
				$totalSumaItem=$registro['totalSumaItem'];
				$totalTotales=$registro['totalTotales'];
				$idItem=$registro['idItem'];

				
		 		$query__inserta="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`) VALUES (NULL, '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre', '$totalSumaItem', '$totalTotales', NULL, NULL,'$idOrganismo', '$idItem', '4', NULL, '$fecha_actual', NULL, NULL, NULL, NULL, NULL, NULL, '$anioActual__periodos');";
				$resultado__inserta= $conexionEstablecida->exec($query__inserta);	
				

			}


	 		$query__2="SELECT cedula,nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM  poa_sueldossalarios2022 WHERE idOrganismo='$idOrganismo' AND perioIngreso='$periodoIngresos' AND modifica IS NULL GROUP BY cedula;";
			$resultado__2 = $conexionEstablecida->query($query__2);

			while($registro__2 = $resultado__2->fetch()) {

				$cedula=$registro__2['cedula'];
				$nombres=$registro__2['nombres'];
				$cargo=$registro__2['cargo'];
				$tipoCargo=$registro__2['tipoCargo'];
				$tiempoTrabajo=$registro__2['tiempoTrabajo'];
				$sueldoSalario=$registro__2['sueldoSalario'];
				$aportePatronal=$registro__2['aportePatronal'];
				$decimoTercera=$registro__2['decimoTercera'];
				$mensualizaTercera=$registro__2['mensualizaTercera'];
				$decimoCuarta=$registro__2['decimoCuarta'];
				$menusalizaCuarta=$registro__2['menusalizaCuarta'];
				$fondosReserva=$registro__2['fondosReserva'];
				$enero=$registro__2['enero'];
				$febrero=$registro__2['febrero'];
				$marzo=$registro__2['marzo'];
				$abril=$registro__2['abril'];
				$mayo=$registro__2['mayo'];
				$junio=$registro__2['junio'];
				$julio=$registro__2['julio'];
				$agosto=$registro__2['agosto'];
				$septiembre=$registro__2['septiembre'];
				$octubre=$registro__2['octubre'];
				$noviembre=$registro__2['noviembre'];
				$diciembre=$registro__2['diciembre'];
				$total=$registro__2['total'];
				
		 		$query__inserta__2="INSERT INTO `ezonshar_mdepsaddb`.`poa_sueldossalarios2022` (`idSueldos`, `cedula`, `nombres`, `cargo`, `tipoCargo`, `tiempoTrabajo`, `sueldoSalario`, `aportePatronal`, `decimoTercera`, `mensualizaTercera`, `decimoCuarta`, `menusalizaCuarta`, `fondosReserva`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `idActividad`, `modifica`, `perioIngreso`) VALUES (NULL, '$cedula', '$nombres', '$cargo', '$tipoCargo', '$tiempoTrabajo', '$sueldoSalario', '$aportePatronal', '$decimoTercera', '$mensualizaTercera', '$decimoCuarta', '$menusalizaCuarta', '$fondosReserva', '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre', '$total', '$idOrganismo', '$fecha_actual','4', NULL, '$anioActual__periodos');";
				$resultado__inserta__2= $conexionEstablecida->exec($query__inserta__2);	
				

			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	

		case  "insertar__remanentes__organismos__Deportivos":

			$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

			$direccion1=VARIABLE__BACKEND."remanentes/estadosRemanentes/";

			$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion1,$nombre__archivo);

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	
	 		$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_remanentes_informacion_organismo` (`idInformacionGeneral`, `idOrganismo`, `archivo`, `inp1`, `saldo__cuenta31`, `monto__autogestion__cuentas`, `montoEje__remanentes`, `cuentasPagar__remanentes`, `remanentePoa__remanentes`, `anios__anteriores`, `remanentesPaid`, `monto__resumen`, `ejecutado__resumen`, `cuentas__pagar__resumen`, `remanentes__resumen`, `cuenta__31__resumen__2`, `cuentas__por__pagar__resumen__2`, `autogestion__resumen__2`, `paid__resumen__2`, `remanentes__anios__anteriores__resumen__2`, `remanentes__poa__resumen__2`, `asignaciones__futuras`, `remanentes__poa__resumen__futuro`, `pendientes__descontar__anios__anteriores`, `fecha`, `hora`, `ejecutado__primer`, `ejecutado__segundo`, `ejecutado__tercero`, `ejecutado__cuarto`, `monto__incrementosOriginal`, `perioIngreso`) VALUES (NULL, '$idOrganismo', '$nombre__archivo', '$inp1', '$saldo__cuenta31', '$monto__autogestion__cuentas', '$montoEje__remanentes', '$cuentasPagar__remanentes', '$remanentePoa__remanentes', '$anios__anteriores', '$remanentesPaid', '$monto__resumen', '$ejecutado__resumen', '$cuentas__pagar__resumen', '$remanentes__resumen', '$cuenta__31__resumen__2', '$cuentas__por__pagar__resumen__2', '$autogestion__resumen__2', '$paid__resumen__2', '$remanentes__anios__anteriores__resumen__2', '$remanentes__poa__resumen__2', '$asignaciones__futuras', '$remanentes__poa__resumen__futuro', '$pendientes__descontar__anios__anteriores', '$fecha_actual', '$hora_actual','$ejecutado__primer','$ejecutado__segundo','$ejecutado__tercero','$ejecutado__cuarto','$monto__incrementosOriginal','$aniosPeriodos__ingesos');";
			$resultado= $conexionEstablecida->exec($query);	


			$montosCuentasPagar__array = json_decode($montosCuentasPagar);
			$idProgramacionFinancieraCuentasPagar__array = json_decode($idProgramacionFinancieraCuentasPagar);

			$aniosAniosAnteriores__array = json_decode($aniosAniosAnteriores);
			$montosAniosAnteriores__array = json_decode($montosAniosAnteriores);

			$aniosPaid__array = json_decode($aniosPaid);
			$convenioPaid__array = json_decode($convenioPaid);
			$nombreProyectoPaid__array = json_decode($nombreProyectoPaid);
			$montoPaid__array = json_decode($montoPaid);

			$organismosRecibidos__max=$objeto->getObtenerInformacionGeneral("SELECT MAX(idInformacionGeneral) AS maximo FROM poa_remanentes_informacion_organismo;");
	 		$maximo=$organismosRecibidos__max[0][maximo];


	 		if (!empty($montosCuentasPagar__array)) {

	 			foreach ($montosCuentasPagar__array as $key => $value) {

	 				$inserta=$objeto->getInsertaNormal('poa_remanentes_cuentas_pagar', array("`idCuentasPorPagar`, ","`montosCuentasPagar`, ","`idProgramacionFinancieraCuentasPagar`, ","`idInformacionGeneral`, ","`perioIngreso`"),array("'$montosCuentasPagar__array[$key]', ","'$idProgramacionFinancieraCuentasPagar__array[$key]', ","'$maximo', ","'$aniosPeriodos__ingesos'"));	

	 			}

	 		}

	 		if (!empty($aniosAniosAnteriores__array)) {

	 			foreach ($aniosAniosAnteriores__array as $key => $value) {
	 			
	 				$inserta2=$objeto->getInsertaNormal('poa_remanentes_anios_anteriores', array("`idAniosAnteriores`, ","`aniosAniosAnteriores`, ","`montosAniosAnteriores`, ","`idInformacionGeneral`, ","`perioIngreso`"),array("'$aniosAniosAnteriores__array[$key]', ","'$montosAniosAnteriores__array[$key]', ","'$maximo', ","'$aniosPeriodos__ingesos'"));	

	 			}

	 		}
	 		
	 		if (!empty($aniosPaid__array)) {
	 			

	 			foreach ($aniosPaid__array as $key => $value) {
	 			
	 				$inserta3=$objeto->getInsertaNormal('poa_remanentes_paid', array("`idAniosPaid`, ","`aniosPaid`, ","`convenioPaid`, ","`nombreProyectoPaid`, ","`montoPaid`, ","`idInformacionGeneral`, ","`perioIngreso`"),array("'$aniosPaid__array[$key]', ","'$convenioPaid__array[$key]', ","'$nombreProyectoPaid__array[$key]', ","'$montoPaid__array[$key]', ","'$maximo', ","'$aniosPeriodos__ingesos'"));

	 			}

	 		}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "insertar__remanentes__administrador":


	 		$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

			$inserta=$objeto->getInsertaNormal('poa_remanentes_monto_asignacion', array("`idRemanentes`, ","`monto__incrementoRemantes`, ","`archivo__saldoEstados`, ","`monto__autogestion`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$monto__incrementoRemantes', ","'$nombre__archivo', ","'$monto__autogestion', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));	

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "insertar__tipo__de__contratacion":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$comparador__items=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_catalogo_contraloria WHERE idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos' AND idItemCatalogo='$idItemCatalogo' AND (idActividad='$idActividad' OR idActividad IS NULL AND idOrganismo='$idOrganismoPrincipal') AND idOrganismo='$idOrganismoPrincipal';");

			if(!empty($comparador__items[0][idOrganismo])){


				$query="UPDATE `poa`.`poa_catalogo_contraloria` SET `catalogo__elect` = '$catalogo__elect', `catalogo__subasta` = '$catalogo__subasta', `catalogo__infima` = '$catalogo__infima', `catalogo__menorCuantia` = '$catalogo__menorCuantia', `catalogo__cotizacion` = '$catalogo__cotizacion', `catalogo__licitacion` = '$catalogo__licitacion', `catalogo__menorCuantiaObras` = '$catalogo__menorCuantiaObras', `catalogo__cotizacionObras` = '$catalogo__cotizacionObras', `catalogo__licitacionObras` = '$catalogo__licitacionObras', `catalogo__precioObras` = '$catalogo__precioObras', `catalogo__contratacionDirecta` = '$catalogo__contratacionDirecta', `catalogo__contratacionListaCorta` = '$catalogo__contratacionListaCorta', `catalogo__contratacionConcursoPu` = '$catalogo__contratacionConcursoPu', `catalogo__elect__texto` = '$catalogo__elect__texto', `catalogo__subasta__texto` = '$catalogo__subasta__texto', `catalogo__infima__texto` = '$catalogo__infima__texto', `catalogo__menorCuantia__texto` = '$catalogo__menorCuantia__texto', `catalogo__cotizacion__texto` = '$catalogo__cotizacion__texto', `catalogo__licitacion__texto` = '$catalogo__licitacion__texto', `catalogo__menorCuantiaObras__texto` = '$catalogo__menorCuantiaObras__texto', `catalogo__cotizacionObras__texto` = '$catalogo__cotizacionObras__texto', `catalogo__licitacionObras__texto` = '$catalogo__licitacionObras__texto', `catalogo__precioObras__texto` = '$catalogo__precioObras__texto', `catalogo__contratacionDirecta__texto` = '$catalogo__contratacionDirecta__texto', `catalogo__contratacionListaCorta__texto` = '$catalogo__contratacionListaCorta__texto', `catalogo__contratacionConcursoPu__texto` = '$catalogo__contratacionConcursoPu__texto', `idOrganismo` = '$idOrganismoPrincipal', `idItemCatalogo` = '$idItemCatalogo', `perioIngreso` = '$aniosPeriodos__ingesos', `noAplica__3` = '$noAplica__3', `idActividad` = '$idActividad' WHERE `idOrganismo` = '$idOrganismoPrincipal' AND idItemCatalogo='$idItemCatalogo';";
				$resultado= $conexionEstablecida->exec($query);		


			}else{

				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_catalogo_contraloria` (`idCatalogo`, `catalogo__elect`, `catalogo__subasta`, `catalogo__infima`, `catalogo__menorCuantia`, `catalogo__cotizacion`, `catalogo__licitacion`, `catalogo__menorCuantiaObras`, `catalogo__cotizacionObras`, `catalogo__licitacionObras`, `catalogo__precioObras`, `catalogo__contratacionDirecta`, `catalogo__contratacionListaCorta`, `catalogo__contratacionConcursoPu`, `catalogo__elect__texto`, `catalogo__subasta__texto`, `catalogo__infima__texto`, `catalogo__menorCuantia__texto`, `catalogo__cotizacion__texto`, `catalogo__licitacion__texto`, `catalogo__menorCuantiaObras__texto`, `catalogo__cotizacionObras__texto`, `catalogo__licitacionObras__texto`, `catalogo__precioObras__texto`, `catalogo__contratacionDirecta__texto`, `catalogo__contratacionListaCorta__texto`, `catalogo__contratacionConcursoPu__texto`, `idOrganismo`, `idItemCatalogo`, `perioIngreso`, `noAplica__3`, `idActividad`) VALUES (NULL, '$catalogo__elect', '$catalogo__subasta', '$catalogo__infima', '$catalogo__menorCuantia', '$catalogo__cotizacion', '$catalogo__licitacion', '$catalogo__menorCuantiaObras', '$catalogo__cotizacionObras', '$catalogo__licitacionObras', '$catalogo__precioObras', '$catalogo__contratacionDirecta', '$catalogo__contratacionListaCorta', '$catalogo__contratacionConcursoPu', '$catalogo__elect__texto', '$catalogo__subasta__texto', '$catalogo__infima__texto', '$catalogo__menorCuantia__texto', '$catalogo__cotizacion__texto', '$catalogo__licitacion__texto', '$catalogo__menorCuantiaObras__texto', '$catalogo__cotizacionObras__texto', '$catalogo__licitacionObras__texto', '$catalogo__precioObras__texto', '$catalogo__contratacionDirecta__texto', '$catalogo__contratacionListaCorta__texto', '$catalogo__contratacionConcursoPu__texto', '$idOrganismoPrincipal', '$idItemCatalogo','$aniosPeriodos__ingesos','$noAplica__3','$idActividad');";
				$resultado= $conexionEstablecida->exec($query);		 		

			}

	 		

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "reasignacion__paid__users__recomendar__segundos__final__aprobacion__funcionarios__directores":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	
	 		$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='0',idUsuarioRP='9999999',documentoFinal='$documento' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'5', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	



		case  "reasignacion__paid__users__recomendar__segundos__final__aprobacion":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

	 				
			$direccion1=VARIABLE__BACKEND."paid/oficioAprobacion/";

			$documento=$objeto->getEnviarPdf($_FILES["resolucion__aprobacion"]['type'],$_FILES["resolucion__aprobacion"]['size'],$_FILES["resolucion__aprobacion"]['tmp_name'],$_FILES["resolucion__aprobacion"]['name'],$direccion1,$nombre__archivo);

	
	 		$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='0',idUsuarioRP='0',documentoFinal='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'3', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	


		case  "reasignacion__paid__users__recomendar__segundos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$usuariosResponsables=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$selectorUsuarios__asignar__contrarios';");
	 		$id_usuario__u=$usuariosResponsables[0][id_usuario];
	 		$id_rolUsuarios=$usuariosResponsables[0][id_rol];
	 		$fisicamenteEstructura__usuarios=$usuariosResponsables[0][fisicamenteEstructura];

	 		$observaciones=filter_var($observaciones__recomendaciones__recomiendas, FILTER_SANITIZE_MAGIC_QUOTES);

	 		$nombreDocumentos=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';");
	 		$nombreDocumentos__finales=$nombreDocumentos[0][documento];

	 		if (($idRolAd==2 || $idRolAd==3) && $fisicamenteE==18 && ($id_rolUsuarios==3 || $id_rolUsuarios==2)) {

	 			$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

		 		$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='0',idUsuarioRP='$selectorUsuarios__asignar__contrarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'2', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

	 		}else if (($idRolAd==2 || $idRolAd==3) && $fisicamenteE==15 && ($id_rolUsuarios!=3) ) {

				$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

				$query="UPDATE poa_paid_envioinicial SET idUsuarioR='$selectorUsuarios__asignar__contrarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
			   $resultado= $conexionEstablecida->exec($query);

			   $inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'2', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

			   $documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccion1,$nombreDocumentos__finales);

			}else if ($idRolAd==4 && $fisicamenteE==3 && $id_rolUsuarios==2) {

	 			$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

		 		$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='0',idUsuarioRP='$selectorUsuarios__asignar__contrarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'2', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

	 		}else if ($idRolAd==4 && $fisicamenteE==3 && $id_rolUsuarios==7) {

	 			$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

		 		$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='$selectorUsuarios__asignar__contrarios',idUsuarioRP=NULL WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'2', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

	 		}else if ($id_rolUsuarios==3) {

	 			$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

	 			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='$selectorUsuarios__asignar__contrarios',idUsuarioR=NULL WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'0', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));


	 		}else if($id_rolUsuarios==7 || $id_rolUsuarios==2){


		 		$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

				$documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccion1,$nombreDocumentos__finales);

	 			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='$selectorUsuarios__asignar__contrarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'1', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

	 		}else if($id_rolUsuarios==4 && $fisicamenteEstructura__usuarios==3){

	 			$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

	 			$documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccion1,$nombreDocumentos__finales);

	 			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='0',idUsuarioRP='$selectorUsuarios__asignar__contrarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
				$resultado= $conexionEstablecida->exec($query);

				$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'2', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

	 		}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	

		case  "reasignacion__paid__users__recomendar":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$usuariosResponsables=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuarioPrincipal';");
	 		$responsablesUsuarios=$usuariosResponsables[0][PersonaACargo];


	 		$envioInicialIdenti=$objeto->getObtenerInformacionGeneral("SELECT identificador FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo';");

			if($identificador == 0){

				$nombreProyecto='Desarrollo';
			}else if($identificador == 1){
				$nombreProyecto='AltoRendimiento';
			}else{
				$nombreProyecto='Infraestructura';
			}

	 		$direccion1=VARIABLE__BACKEND."paid/informesTecnicos/";

	 		$nombre__archivo=$nombreProyecto."__".$idOrganismo."__".$fecha_actual.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccion1,$nombre__archivo);


	 		$observaciones=filter_var($observaciones__recomendaciones__recomiendas, FILTER_SANITIZE_MAGIC_QUOTES);

			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='0',idUsuarioR='$responsablesUsuarios', documento='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador='$identificador';";
			$resultado= $conexionEstablecida->exec($query);

			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'$etapa', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

			if ($envioInicialIdenti[0][identificador]==0) {
				
				$inserta=$objeto->getInsertaNormal('poa_paid_comentarios_observaciones', array("`idComentarios`, ","`idOrganismo`, ","`opcion1`, ","`opcion2`, ","`opcion3`, ","`opcion4`, ","`opcion5`, ","`opcion6`, ","`opcion7`, ","`opcion8`, ","`opcion9`, ","`opcion10`, ","`comentario1`, ","`comentario2`, ","`comentario3`, ","`comentario4`, ","`comentario5`, ","`comentario6`, ","`comentario7`, ","`comentario8`, ","`comentario9`, ","`comentario10`, ","`fecha`, ","`idTipo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$puestos__alto', ","'$recursos__destinados__alto', ","'$campamento__alto', ","'$campamento__evaluaciones__alto', ","'$evaluaciones__campamento__alto', ","'$recursos__gastos__alto', ","'$deportiva__enmarcada__alto', ","'$cubrir__necesedidades__alto', ","'$planificacion__anual__alto', ","' ', ","'$puestos__alto__text', ","'$recursos__destinados__alto__text', ","'$campamento__alto__text', ","'$campamento__evaluaciones__alto__text', ","'$evaluaciones__campamento__alto__text', ","'$recursos__gastos__alto__text', ","'$deportiva__enmarcada__alto__text', ","'$cubrir__necesedidades__alto__text', ","'$planificacion__anual__alto__text', ","' ', ","'$fecha_actual', ","'0', ","'$aniosPeriodos__ingesos'"));

			}else if ($envioInicialIdenti[0][identificador]==1){

				$inserta=$objeto->getInsertaNormal('poa_paid_comentarios_observaciones', array("`idComentarios`, ","`idOrganismo`, ","`opcion1`, ","`opcion2`, ","`opcion3`, ","`opcion4`, ","`opcion5`, ","`opcion6`, ","`opcion7`, ","`opcion8`, ","`opcion9`, ","`opcion10`, ","`comentario1`, ","`comentario2`, ","`comentario3`, ","`comentario4`, ","`comentario5`, ","`comentario6`, ","`comentario7`, ","`comentario8`, ","`comentario9`, ","`comentario10`, ","`fecha`, ","`idTipo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$deportivas__desarrollo', ","'$campamento__desarrollo', ","'$procesos__desarrollo', ","'$gastos__evento__desarrollo', ","'$operativa__anual__desarrollo', ","'$recursos__desarrollo', ","'$anual__inversion__desarrollo', ","' ', ","' ', ","' ', ","'$deportivas__desarrollo__text', ","'$campamento__desarrollo__text', ","'$procesos__desarrollo__text', ","'$gastos__evento__desarrollo__text', ","'$operativa__anual__desarrollo__text', ","'$recursos__desarrollo__text', ","'$anual__inversion__desarrollo__text', ","' ', ","' ', ","' ', ","'$fecha_actual', ","'1', ","'$aniosPeriodos__ingesos'"));


			}else{

				$inserta=$objeto->getInsertaNormal('poa_paid_comentarios_observaciones', array("`idComentarios`, ","`idOrganismo`, ","`opcion1`, ","`opcion2`, ","`opcion3`, ","`opcion4`, ","`opcion5`, ","`opcion6`, ","`opcion7`, ","`opcion8`, ","`opcion9`, ","`opcion10`, ","`comentario1`, ","`comentario2`, ","`comentario3`, ","`comentario4`, ","`comentario5`, ","`comentario6`, ","`comentario7`, ","`comentario8`, ","`comentario9`, ","`comentario10`, ","`fecha`, ","`idTipo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$deportivas__desarrollo', ","'$campamento__desarrollo', ","'$procesos__desarrollo', ","'$gastos__evento__desarrollo', ","'$operativa__anual__desarrollo', ","'$recursos__desarrollo', ","'$anual__inversion__desarrollo', ","' ', ","' ', ","' ', ","'$deportivas__desarrollo__text', ","'$campamento__desarrollo__text', ","'$procesos__desarrollo__text', ","'$gastos__evento__desarrollo__text', ","'$operativa__anual__desarrollo__text', ","'$recursos__desarrollo__text', ","'$anual__inversion__desarrollo__text', ","' ', ","' ', ","' ', ","'$fecha_actual', ","'2', ","'$aniosPeriodos__ingesos'"));
	
	
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	

		case  "negacion__paid__director__organismos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$usuariosResponsables=$objeto->getObtenerInformacionGeneral("SELECT a.idUsuario FROM poa_paid_reasignacion_seguimiento AS a INNER JOIN th_usuario AS b ON a.idUsuario=b.id_usuario INNER JOIN th_usuario_roles AS c ON c.id_usuario=a.idUsuario WHERE idOrganismo='$idOrganismo' AND c.id_rol='3' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idAsignacion DESC LIMIT 1;");
	 		$responsablesUsuarios=$usuariosResponsables[0][idUsuario];



			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='$responsablesUsuarios',observado='1',estadoEditar='1' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);


			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'N/A', ","'$etapa', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;	



		case  "negacion__paid__analista":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$usuariosResponsables=$objeto->getObtenerInformacionGeneral("SELECT a1.id_usuario FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a1.fisicamenteEstructura='18' AND a2.id_rol='2' AND a1.estadoUsuario='A' ORDER BY a1.id_usuario DESC LIMIT 1;");
	 		$responsablesUsuarios=$usuariosResponsables[0][id_usuario];


	 		$envioInicialIdenti=$objeto->getObtenerInformacionGeneral("SELECT identificador FROM poa_paid_envioinicial WHERE idOrganismo='$idOrganismo';");


	 		$observaciones=filter_var($observaciones__recomendaciones__recomiendas__negacion, FILTER_SANITIZE_MAGIC_QUOTES);

			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='$responsablesUsuarios' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);


			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'$etapa', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));


			if ($envioInicialIdenti[0][identificador]==0) {
				
				$inserta=$objeto->getInsertaNormal('poa_paid_comentarios_observaciones', array("`idComentarios`, ","`idOrganismo`, ","`opcion1`, ","`opcion2`, ","`opcion3`, ","`opcion4`, ","`opcion5`, ","`opcion6`, ","`opcion7`, ","`opcion8`, ","`opcion9`, ","`opcion10`, ","`comentario1`, ","`comentario2`, ","`comentario3`, ","`comentario4`, ","`comentario5`, ","`comentario6`, ","`comentario7`, ","`comentario8`, ","`comentario9`, ","`comentario10`, ","`fecha`, ","`idTipo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$puestos__alto', ","'$recursos__destinados__alto', ","'$campamento__alto', ","'$campamento__evaluaciones__alto', ","'$evaluaciones__campamento__alto', ","'$recursos__gastos__alto', ","'$deportiva__enmarcada__alto', ","'$cubrir__necesedidades__alto', ","'$planificacion__anual__alto', ","' ', ","'$puestos__alto__text', ","'$recursos__destinados__alto__text', ","'$campamento__alto__text', ","'$campamento__evaluaciones__alto__text', ","'$evaluaciones__campamento__alto__text', ","'$recursos__gastos__alto__text', ","'$deportiva__enmarcada__alto__text', ","'$cubrir__necesedidades__alto__text', ","'$planificacion__anual__alto__text', ","' ', ","'$fecha_actual', ","'0', ","'$aniosPeriodos__ingesos'"));

			}else{

			$inserta=$objeto->getInsertaNormal('poa_paid_comentarios_observaciones', array("`idComentarios`, ","`idOrganismo`, ","`opcion1`, ","`opcion2`, ","`opcion3`, ","`opcion4`, ","`opcion5`, ","`opcion6`, ","`opcion7`, ","`opcion8`, ","`opcion9`, ","`opcion10`, ","`comentario1`, ","`comentario2`, ","`comentario3`, ","`comentario4`, ","`comentario5`, ","`comentario6`, ","`comentario7`, ","`comentario8`, ","`comentario9`, ","`comentario10`, ","`fecha`, ","`idTipo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$deportivas__desarrollo', ","'$campamento__desarrollo', ","'$procesos__desarrollo', ","'$gastos__evento__desarrollo', ","'$operativa__anual__desarrollo', ","'$recursos__desarrollo', ","'$anual__inversion__desarrollo', ","' ', ","' ', ","' ', ","'$deportivas__desarrollo__text', ","'$campamento__desarrollo__text', ","'$procesos__desarrollo__text', ","'$gastos__evento__desarrollo__text', ","'$operativa__anual__desarrollo__text', ","'$recursos__desarrollo__text', ","'$anual__inversion__desarrollo__text', ","' ', ","' ', ","' ', ","'$fecha_actual', ","'1', ","'$aniosPeriodos__ingesos'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;	


		case  "reasignacion__paid__users":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$observaciones=filter_var($observaciones, FILTER_SANITIZE_MAGIC_QUOTES);

			$query="UPDATE poa_paid_envioinicial SET idUsuarioS='$selectorUsuarios__asignar' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' and identificador ='$identificador';";
			$resultado= $conexionEstablecida->exec($query);

			$inserta=$objeto->getInsertaNormal('poa_paid_reasignacion_seguimiento', array("`idAsignacion`, ","`idUsuario`, ","`observacion`, ","`tipoEntrada`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$observaciones', ","'$etapa', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	

		case  "desactualizar__asignacion__paids":

			$array = json_decode($arrayEnvios);

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		foreach ($array as $value) {
	 			
				$query="UPDATE poa_paid_asignacion SET estado='I' WHERE idOrganismo='$value' AND valor__comparativo='$valorComparativo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

				$query2="UPDATE poa_paid_asignacion_dos SET estado='I' WHERE idOrganismo='$value' AND valor__comparativo='$valorComparativo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado2= $conexionEstablecida->exec($query2);

	 		}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;	

		case  "notificacionEnviada__paid__asignacion":
	
			$arrayAgrupados = json_decode($arrayAgrupados);
			$arrayAgrupados__attr = json_decode($arrayAgrupados__attr);	
			$arrayAgrupados__attr__componentes = json_decode($arrayAgrupados__attr__componentes);	
			


	 		$organismosRecibidos=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$idOrganismo';");
	 		$email=$organismosRecibidos[0][correo];
	 		$nombreOrganismo=$organismosRecibidos[0][nombreOrganismo];



	 		$inserta2=$objeto->getInsertaNormal('poa_paid_asignacion_dos', array("`idAsignacion`, ","`idOrganismo`, ","`monto`, ","`fecha`, ","`hora`, ","`estado`, ","`texto__documentos`, ","`valor__comparativo`, ","`perioIngreso`"),array("'$idOrganismo', ","'$techo__presupuestario', ","'$fecha_actual', ","'$hora_actual', ","'A', ","'$texto__documentos', ","'$valorComparativo', ","'$aniosPeriodos__ingesos'"));

	 		$organismosRecibidos__max=$objeto->getObtenerInformacionGeneral("SELECT MAX(idAsignacion) AS maximo FROM poa_paid_asignacion_dos;");
	 		$maximo=$organismosRecibidos__max[0][maximo];


	 		foreach ($arrayAgrupados__attr as $key => $value) {

	 			$inserta=$objeto->getInsertaNormal('poa_paid_asignacion', array("`idPaidInversion`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`estado`, ","`idUsuario`, ","`idRubros`, ","`montos`, ","`texto__documentos`, ","`valor__comparativo`, ","`idAsignacion`, ","`perioIngreso`, ","`idComponentes`"),array("'$fecha_actual', ","'$hora_actual', ","'$idOrganismo', ","'A', ","'$idUsuarioPrincipal', ","'$value', ","'$arrayAgrupados[$key]', ","'$texto__documentos', ","'$valorComparativo', ","'$maximo', ","'$aniosPeriodos__ingesos', ","'$arrayAgrupados__attr__componentes[$key]'"));

	 		}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		


			/*===========================================
			=            Enviador de correos            =
			===========================================*/


			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>Se asigno el presupuesto PAID al Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; con un monto de  '.$techo__presupuestario.'</body></html>';

			$emailArray = array($email);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			/*=====  End of Enviador de correos  ======*/

		break;

		case  "seguimiento__control__cambios":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="UPDATE poa_seguimiento_control_cambios SET estado='$radiosValues',horas='0' WHERE idSeguimientoCambio='$idSeguimientoCmabios' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;		

		case  "justificacion__seguimiento":

			$justificacion=filter_var($justificacion, FILTER_SANITIZE_MAGIC_QUOTES);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_control_cambios', array("`idSeguimientoCambio`, ","`justificacion`, ","`trimestre`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`estado`, ","`perioIngreso`"),array("'$justificacion', ","'$radio__control', ","'$fecha_actual', ","'$hora_actual', ","'$organismoIdPrin', ","'P', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;		


		case  "guarda__seguimientos__bloqueos__cierres__periodos":

			$array = json_decode($array);



			if ($identificador=="poa") {

				foreach ($array as $clave => $valor) {

					$conexionRecuperada= new conexion();
 					$conexionEstablecida=$conexionRecuperada->cConexion();
		

					$query="DELETE FROM poa_cierre_fiscal WHERE idOrganismo='$valor' AND periodo='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					if ($letrero=="bloquear") {

						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'si'"));

					}else{
						
						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'no'"));

					}
					
				}

			}else if($identificador=="transferencias"){

				foreach ($array as $clave => $valor) {


					$conexionRecuperada= new conexion();
 					$conexionEstablecida=$conexionRecuperada->cConexion();
		

					$query="DELETE FROM poa_cierre_fiscal_transferencia WHERE idOrganismo='$valor' AND periodo='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					if ($letrero=="bloquear") {

						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_transferencia', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'si'"));

					}else{
						
						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_transferencia', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'no'"));

					}
					
				}


			}else if($identificador=="modificaciones"){


				foreach ($array as $clave => $valor) {


					$conexionRecuperada= new conexion();
 					$conexionEstablecida=$conexionRecuperada->cConexion();
		

					$query="DELETE FROM poa_cierre_fiscal_paid_modificaciones WHERE idOrganismo='$valor' AND periodo='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					if ($letrero=="bloquear") {

						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_paid_modificaciones', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'si'"));

					}else{
						
						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_paid_modificaciones', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'no'"));

					}
					
				}


			}else{

				foreach ($array as $clave => $valor) {

					$conexionRecuperada= new conexion();
 					$conexionEstablecida=$conexionRecuperada->cConexion();
		

					$query="DELETE FROM poa_cierre_fiscal_paid WHERE idOrganismo='$valor' AND periodo='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					if ($letrero=="bloquear") {

						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_paid', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'si'"));

					}else{
						
						$inserta2=$objeto->getInsertaNormal('poa_cierre_fiscal_paid', array("`idCierreAnio`, ","`periodo`, ","`motivo`, ","`fecha`, ","`idOrganismo`, ","`estado`"),array("'$aniosPeriodos__ingesos', ","'$motivo', ","'$fecha_actual', ","'$valor', ","'no'"));

					}
					
				}


			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "guarda__seguimientos__bloqueos":

			$arrayD = json_decode($array);


			if ($identificador=="primerTrimestre") {
				$tabla="poa_seguimiento_bloqueo";
			}else if($identificador=="segundoTrimestre"){
				$tabla="poa_seguimiento_bloqueo_2";		
			}else if($identificador=="tercerTrimestre"){
				$tabla="poa_seguimiento_bloqueo_3";		
			}else if($identificador=="cuartoTrimestre"){
				$tabla="poa_seguimiento_bloqueo_4";		
			}

			foreach ($arrayD as $clave => $valor) {

				if ($letrero=="bloquear") {

					$inserta2=$objeto->getInsertaNormal("$tabla", array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$valor', ","'$fecha_actual', ","'$hora_actual', ","'si', ","'$aniosPeriodos__ingesos'"));
				}else{
					$inserta2=$objeto->getInsertaNormal("$tabla", array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$valor', ","'$fecha_actual', ","'$hora_actual', ","'no', ","'$aniosPeriodos__ingesos'"));
				}
				
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "seguimiento__bloqueos":

			if ($attr=="estado") {
				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_bloqueo', array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$dato', ","'$aniosPeriodos__ingesos'"));
			}else if ($attr=="estado2") {
				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_bloqueo_2', array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$dato', ","'$aniosPeriodos__ingesos'"));
			}else if ($attr=="estado3") {
				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_bloqueo_3', array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$dato', ","'$aniosPeriodos__ingesos'"));
			}else if ($attr=="estado4") {
				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_bloqueo_4', array("`idBloqueos__seguimientos`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`estado`, ","`perioIngreso`"),array("'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$dato', ","'$aniosPeriodos__ingesos'"));
			}

			


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura FROM th_usuario WHERE id_usuario='$selects__superiores';");
			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];



			if ($fisicamenteEstructura__recogido==6) {
			
		 		$query="UPDATE poa_trimestrales SET estadoIn='$selects__superiores',estadoInR=NULL WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);


			} else {
	 				
		 		$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores',estadoIR=NULL WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}


			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="UPDATE poa_trimestrales SET estado='$selects__superiores',estadoR=NULL WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__infras__59":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='15' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
	 		$idVarEnvios=$usuarioEnvios[0][id_usuario];


	 		$query="UPDATE poa_trimestrales SET estadoIR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
	 		$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idVarEnvios', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
	 			
	 			$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	 		}else{

	 			$usuarioEnvios=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='7' AND a.fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	 		}


	 		$idVarEnvios=$usuarioEnvios[0][id_usuario];


	 		if ($tipos__nomenclaturas=="ALTO RENDIMIENTO") {
	 			
	 			$query="UPDATE poa_trimestrales SET estadoAlR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoFR='$idVarEnvios' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}

	 		$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$idVarEnvios', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;



		case  "recomienda__recomendado__seguimientos__f__r":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

	 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];



	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoFR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";


	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios__i__nuevos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");
			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];

			$superior__inmediatos__45=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$selects__superiores__regresar';");
			$zonal__usuario=$superior__inmediatos__45[0][zonal];

			$nombre__archivo=$idOrganismo."__".$fecha_actual;

			$nuevo__usuario=$objeto->getObtenerInformacionGeneral("SELECT zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");

			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];

			if ($nuevo__usuario[0][zonal]>1 || $fisicamenteEstructura__reales==1) {

				if ($informe__recomendado__validador=="si") {
			
					$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);


			 		$query="UPDATE poa_trimestrales SET estadoIR='$selects__superiores__regresar' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

			 		$idDirector__Seguis=$selects__superiores__regresar;

			 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInfras`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reporte enviado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo'"));


		 		}

		 		if ($informe__recomendado__instalaciones__validador=="si") {

				
					$direccion1=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__instalaciones"]['type'],$_FILES["informe__recomendado__instalaciones"]['size'],$_FILES["informe__recomendado__instalaciones"]['tmp_name'],$_FILES["informe__recomendado__instalaciones"]['name'],$direccion1,$nombre__archivo);

			 		$query="UPDATE poa_trimestrales SET estadoInR='$selects__superiores__regresar' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

					$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

		 			$idDirector__Seguis=$director__seguimientos[0][id_usuario];

		 			if ($informe__recomendado__validador=="si") {


			 			$director__seguimientos__maximos=$objeto->getObtenerInformacionGeneral("SELECT MAX(idRecomendacionFuncionario) AS maximo FROM poa_seguimiento_recomienda_tecnicos;");

			 			$query25="UPDATE poa_seguimiento_recomienda_tecnicos SET documentoInstalaciones='$nombre__archivo' WHERE idRecomendacionFuncionario='".$director__seguimientos__maximos[0][maximo]."';";

		 				$resultado25= $conexionEstablecida->exec($query25);

	
		 			}else{

		 				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInstalaciones`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reporte enviado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo'"));

		 			}

		 		}

			}else if ($fisicamenteEstructura__recogido==6) {
			
				$direccion1=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_trimestrales SET estadoInR='$selects__superiores__regresar' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInstalaciones`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reporte enviado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo'"));

			} else {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_trimestrales SET estadoIR='$selects__superiores__regresar',estadoINR='$selects__superiores__regresar' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuarioPrincipal' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];

		 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`, ","`documentoInfras`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reporte enviado", ',"'$fisicamenteE', ","'INFRA', ","'$aniosPeriodos__ingesos', ","'$nombre__archivo'"));

			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios__organismos__definitivos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 				
			$direccion1=VARIABLE__BACKEND."seguimiento/informesSeguimientos/";

			$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

	 		$query="UPDATE poa_trimestrales SET estadoR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

	 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

	 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];



			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reporte enviado", ',"'$fisicamenteE', ","'SEGUIMIENTO', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;	
	 		

		break;



		case  "recomienda__recomendado__seguimientos__seguimientos__seguimientos__ver__infrass__envios":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");

			$zonal__personas__cargos=$superior__inmediatos[0][zonal];

			$coordinador__infras__secs=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.fisicamenteEstructura='1' AND b.id_rol='4' AND a.estadoUsuario='A';");

			$id__cor=$coordinador__infras__secs[0][id_usuario];

			$nombre__archivo=$idOrganismo."__".$fecha_actual."__".$periodo.".pdf";

			if ($evaluador__movimientos=="si") {

				$direccion1=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

				if ($zonal__personas__cargos>1) {
					
					$query="UPDATE poa_trimestrales SET estadoInR='$id__cor' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

				}else{

					$query="UPDATE poa_trimestrales SET estadoInR='T' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);

				}




		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


			} else {

				$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructurasDefinitivas/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

				if ($zonal__personas__cargos>1) {


			 		$query="UPDATE poa_trimestrales SET estadoIR='$id__cor' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);


				}else{

			 		$query="UPDATE poa_trimestrales SET estadoIR='T', estadoInR='T', documentoInstalaciones='$nombre__archivo' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);


				}

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


			}
			

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInfras`, ","`perioIngreso`"),array("'$idDirector__Seguis', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos__infrases__no__corresponde":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			if ($fisicamenteEstructura__reales==6) {
				
		 		$query="UPDATE poa_trimestrales SET estadoIn='T',estadoInR='N/A' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

		 		$resultado= $conexionEstablecida->exec($query);


			} else {
				
		 		$query="UPDATE poa_trimestrales SET estadoI='T',estadoIR='N/A' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

		 		$resultado= $conexionEstablecida->exec($query);


			}
			

	 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInfras`, ","`perioIngreso`"),array("'$idUsuarios', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'NC', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "recomienda__recomendado__seguimientos__infrases":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$nombre__archivo=$organismoOculto__modal."__".$idUsuarios."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo,fisicamenteEstructura FROM th_usuario WHERE id_usuario='$idUsuarios';");
			$nuevo__usuario=$objeto->getObtenerInformacionGeneral("SELECT zonal FROM th_usuario WHERE id_usuario='$idUsuario__ingresos';");

			$fisicamenteEstructura__recogido=$superior__inmediatos[0][fisicamenteEstructura];


			$super__var=$superior__inmediatos[0][PersonaACargo];

			if($nuevo__usuario[0][zonal]>1){

				if ($informe__recomendado__validador=="si") {
					

					$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

			 		$query="UPDATE poa_trimestrales SET estadoI='T',estadoIR='$super__var' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			 		$resultado= $conexionEstablecida->exec($query);


		 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInfras`, ","`perioIngreso`"),array("'$super__var', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));

				}
				

				if ($informe__recomendado__instalaciones__validador=="si") {

					$direccion1=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

					$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado__instalaciones"]['type'],$_FILES["informe__recomendado__instalaciones"]['size'],$_FILES["informe__recomendado__instalaciones"]['tmp_name'],$_FILES["informe__recomendado__instalaciones"]['name'],$direccion1,$nombre__archivo);

			 		$query="UPDATE poa_trimestrales SET estadoI='T',estadoIR='$super__var' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			 		$resultado= $conexionEstablecida->exec($query);

			 		if ($informe__recomendado__validador=="si") {

			 			$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT MAX(idRecomendacionFuncionario) AS maximo FROM poa_seguimiento_recomienda_tecnicos;");

			 			$query="UPDATE poa_seguimiento_recomienda_tecnicos SET documentoInstalaciones='$nombre__archivo' WHERE idRecomendacionFuncionario='".$director__seguimientos[0][maximo]."';";

		 				$resultado= $conexionEstablecida->exec($query);


			 		}else{

			 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInstalaciones`, ","`perioIngreso`"),array("'$super__var', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));

			 		}

				}


			}else if ($fisicamenteEstructura__recogido==6) {
				
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informesInstalaciones/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_trimestrales SET estadoIn='T',estadoInR='$super__var' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

		 		$resultado= $conexionEstablecida->exec($query);



	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInstalaciones`, ","`perioIngreso`"),array("'$super__var', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));

			} else {
				
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informesInfraestructuras/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombre__archivo);

		 		$query="UPDATE poa_trimestrales SET estadoI='T',estadoIR='$super__var' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

		 		$resultado= $conexionEstablecida->exec($query);


	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`documentoInfras`, ","`perioIngreso`"),array("'$super__var', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'INFRA', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));

			}
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;

		case  "recomienda__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		if ($idRol==4 || $idRol==2) {
	 				
				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["informe__recomendado"]['type'],$_FILES["informe__recomendado"]['size'],$_FILES["informe__recomendado"]['tmp_name'],$_FILES["informe__recomendado"]['name'],$direccion1,$nombreDocumento);

	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


	 		}else{

		 		$director__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='20' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1");

		 		$idDirector__Seguis=$director__seguimientos[0][id_usuario];


	 			$query="UPDATE poa_trimestrales SET estadoAlR='T' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`', '`perioIngreso`'),array("'$idDirector__Seguis', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));



	 		}
	 			
	 		
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		
	 		

		break;


		case  "regreso__recomendado__seguimientos__r__f":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();		

	 		if ($idRol==7) {
	 					
	 			$query="UPDATE poa_trimestrales SET estadoFR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoF='$selects__superiores',estadoFR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}


			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`', '`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

	 			
	 		$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "regreso__recomendado__seguimientos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();		

	 		if ($idRol==7) {
	 					
	 			$query="UPDATE poa_trimestrales SET estadoAlR='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}else{

	 			$query="UPDATE poa_trimestrales SET estadoAl='$selects__superiores',estadoAlR=NULL WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

	 		}
	 			
	 		$resultado= $conexionEstablecida->exec($query);


	 		$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`', '`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "recomendacion__tecnicos__aanalistas__seguimientos":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$nombre__archivo=$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUSeguimientos';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

			$direccion1=VARIABLE__BACKEND."seguimiento/informesSeguimientos/";

			$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);	
			
			$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico_seguimientos', array("`idSeguimientosRecomendadosTe`, ","`esigeftArrays`, ","`porcentajeEsigeftArrays`, ","`observaciones`, ","`recomendaciones`, ","`remanentes`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`documentos`, ","`perioIngreso`"),array("'$arrayEsigefts', ","'$arrayPorcenEsigefts', ","'$observaciones__seguimientos__cuadros__pdf', ","'$recomendaciones__seguimientos__cuadros__pdf', ","'$monto__transferido__rema', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$nombre__archivo', ","'$aniosPeriodos__ingesos'"));


			$query4="UPDATE poa_trimestrales SET estado='T',estadoR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			$resultado4= $conexionEstablecida->exec($query4);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ',"`tipoE`, ","`perioIngreso`"),array("'$super__var', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observaciones__seguimientos__cuadros__pdf', ",'"Recomendado", ',"'$fisicamenteE', ","'SEGUIMIENTO', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "recomendacion__tecnicos":

			$nombre__archivo=$idOrganismo."__".$idUSeguimientos."__".$fecha_actual."__".$periodo.".pdf";

			$superior__inmediatos=$objeto->getObtenerInformacionGeneral("SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUSeguimientos';");

			$super__var=$superior__inmediatos[0][PersonaACargo];

			if ($rotulo__recomendado=="alto__rendimientos") {

				$direccion1=VARIABLE__BACKEND."seguimiento/informes__altos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","'$cumplimientos__tabla__alto', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));

				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoAl='T',estadoAlR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);
		

			}else if($rotulo__recomendado=="formativo"){

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__formativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","'$beneficiarios__capa__de__eje__alto__meta', ","'$beneficiarios__even__prepa__de__eje__alto__meta', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","'$beneficiarios__capa__de__eje__alto__resultado', ","'$beneficiarios__even__prepa__de__eje__alto__resultado', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","'$porcentaje__c__beneficiarios__capa__de__e__alto', ","'$porcentaje__c__even__prepa__capa__de__e__alto', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$oro__alto', ","'$plata__alto', ","'$bronce__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","'$actas__tabla__alto', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoF='T',estadoFR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}else{

				$direccion1=VARIABLE__BACKEND."seguimiento/informe__recreativos/";

				$documento=$objeto->getEnviarPdf($_FILES["archivoSubido__seguimientos"]['type'],$_FILES["archivoSubido__seguimientos"]['size'],$_FILES["archivoSubido__seguimientos"]['tmp_name'],$_FILES["archivoSubido__seguimientos"]['name'],$direccion1,$nombre__archivo);

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_recomendado_tecnico', array("`idInformacionEnviada`, ","`trimestre`, ","`idOrganismo`, ","`numeroConvenio`, ","`administradorConvenio`, ","`documentoDesignacion`, ","`meta1`, ","`meta2`, ","`meta3`, ","`meta4`, ","`meta5`, ","`meta6`, ","`meta7`, ","`meta8`, ","`resultado1`, ","`resultado2`, ","`resultado3`, ","`resultado4`, ","`resultado5`, ","`resultado6`, ","`resultado7`, ","`resultado8`, ","`porcentaje1`, ","`porcentaje2`, ","`porcentaje3`, ","`porcentaje4`, ","`porcentaje5`, ","`porcentaje6`, ","`porcentaje7`, ","`porcentaje8`, ","`indicador`, ","`oro`, ","`plata`, ","`bronce`, ","`presenta1`, ","`presenta2`, ","`presenta3`, ","`presenta4`, ","`presenta5`, ","`presenta6`, ","`presenta7`, ","`presenta8`, ","`observacion`, ","`recomendacion`, ","`archivo`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`tipo`, ","`perioIngreso`"),array("'$periodo', ","'$idOrganismo', ","'$numeroConvenio__paid', ","'$administradorConvenio__paid', ","'$documentoAsignacionConvenio__paid', ","'$eventos__eje__alto', ","'$eventos__eje__alto__parti', ","'$implementacion__de__eje__alto__meta', ","'$beneficiarios__de__eje__alto__meta', ","'$preparacion__de__eje__alto__meta', ","' ', ","' ', ","'$metaProgramadaArray', ","'$meta__eje__alto', ","'$meta__eje__alto__parti', ","'$implementacion__de__eje__alto__resultado', ","'$beneficiarios__de__eje__alto__resultado', ","'$preparacion__de__eje__alto__resultado', ","' ', ","' ', ","'$metaResultadoArray', ","'$porcentaje__c__eje__alto', ","'$porcentaje__c__eje__alto__parti', ","'$porcentaje__c__implementacion__de__e__alto', ","'$porcentaje__c__beneficiarios__de__e__alto', ","'$porcentaje__c__preparacion__de__e__alto', ","' ', ","' ', ","'$porcentajeCumplimientoArray', ","'$indicadorArray', ","'$hombres__alto', ","'$mujeres__alto', ","'$personas__con__discapacidad__alto', ","'$reporte__tabla__alto', ","'$listados__tabla__alto', ","'$informe__tabla__alto', ","'$registro__tabla__alto', ","'$asistentes__tabla__alto', ","' ', ","' ', ","' ', ","'$observaciones__alto__seguis', ","'$recomendaciones__alto__seguis', ","'$nombre__archivo', ","'$idUSeguimientos', ","'$fecha_actual', ","'$hora_actual', ","'$rotulo__recomendado', ","'$aniosPeriodos__ingesos'"));


				$conexionRecuperada= new conexion();
	 			$conexionEstablecida=$conexionRecuperada->cConexion();		
	 			
	 			$query="UPDATE poa_trimestrales SET estadoF='T',estadoFR='$super__var' WHERE idOrganismo='$idOrganismo' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$super__var', ","'$idOrganismo', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observaciones__alto__seguis', ",'"Recomendado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas__in":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$idUsuario=$_SESSION["idUsuario"];

			$obtenerInformacion__usens=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario' AND a.fisicamenteEstructura='1' AND b.id_rol='4';");


			$data1=array();

			if (!empty($obtenerInformacion__usens[0][id_usuario])) {

				$arrayCadena = explode(",", $selects__superiores);


				foreach ($arrayCadena as $clave => $valor) {

					$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$valor';");

					if ($obtenerInformacion[0][zonal]>1) {
						array_push($data1,1);
					}


				}

				$booleano=false;

				foreach ($data1 as $value) {
					
					if ($value==1) {

						$booleano=true;
						
					}

				}


				if ($booleano==true && count($arrayCadena)>1) {
					
					$mensaje=8;
					$jason['mensaje']=$mensaje;		

				}else{

					foreach ($arrayCadena as $clave => $valor) {


						$obtenerInformacion=$objeto->getObtenerInformacionGeneral("SELECT fisicamenteEstructura,zonal FROM th_usuario WHERE id_usuario='$valor';");


						if ($obtenerInformacion[0][fisicamenteEstructura]==6) {

							$query="UPDATE poa_trimestrales SET estadoIn='$valor' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
							$resultado= $conexionEstablecida->exec($query);	
							

						}else{


							$query="UPDATE poa_trimestrales SET estadoI='$valor' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
							$resultado= $conexionEstablecida->exec($query);
							

						}


						$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$valor', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

					}

					$mensaje=1;

				}


			}else {


				if ($fisicamenteE==6) {

					$query="UPDATE poa_trimestrales SET estadoIn='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);	
					

				}else{


					$query="UPDATE poa_trimestrales SET estadoI='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
					$resultado= $conexionEstablecida->exec($query);
					

				}

				$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ', '`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));

							$mensaje=1;


			}
			


			$jason['mensaje']=$mensaje;		


		break;


		case  "informacion__analistas__reasignar__seguimientos__ac__fisicas":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoF='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));



			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__analistas__reasignar__seguimientos__altos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estadoAl='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";

			$resultado= $conexionEstablecida->exec($query);

			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "informacion__analistas__reasignar__seguimientos":


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_trimestrales SET estado='$selects__superiores' WHERE idOrganismo='$organismoOculto__modal' AND tipoTrimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);


			$inserta2=$objeto->getInsertaNormal('poa_seguimiento_recomienda_tecnicos', array("`idRecomendacionFuncionario`, ","`idFuncionario`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`trimestre`, ","`observacionesTecnicas`, ",'`tipo`, ','`fisicamente`, ','`perioIngreso`'),array("'$selects__superiores', ","'$organismoOculto__modal', ","'$fecha_actual', ","'$hora_actual', ","'$periodo', ","'$observacionesReasignaciones', ",'"Reasignado", ',"'$fisicamenteE', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "ingreso__modificaciones__2022":


			$inserta=$objeto->getInsertaNormal('poa_modificacion_2022', array("`idModificacion`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$idOrganismos', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "guardar__mes__organismo__sueldos":


			$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__".$mesPla.".pdf";

			$direccion1=VARIABLE__BACKEND."seguimiento/planilla/";
			$direccion2=VARIABLE__BACKEND."seguimiento/rol/";
			$direccion3=VARIABLE__BACKEND."seguimiento/comprobante/";


			$documento=$objeto->getEnviarPdf($_FILES["planilla__iess"]['type'],$_FILES["planilla__iess"]['size'],$_FILES["planilla__iess"]['tmp_name'],$_FILES["planilla__iess"]['name'],$direccion1,$nombre__archivo);
			$documento=$objeto->getEnviarPdf($_FILES["rol__de__pagos"]['type'],$_FILES["rol__de__pagos"]['size'],$_FILES["rol__de__pagos"]['tmp_name'],$_FILES["rol__de__pagos"]['name'],$direccion2,$nombre__archivo);
			$documento=$objeto->getEnviarPdf($_FILES["comprobante__pagos"]['type'],$_FILES["comprobante__pagos"]['size'],$_FILES["comprobante__pagos"]['tmp_name'],$_FILES["comprobante__pagos"]['name'],$direccion3,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento__comprobante', array("`idComprobante__general`, ","`idOrganismo`, ","`planilla`, ","`rol`, ","`comprobante`, ","`mes`, ","`fecha`, ","`hora`, ","`trimestre`, ","`perioIngreso`"),array("'$idOrganismo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$mesPla', ","'$fecha_actual', ","'$hora_actual', ","'$trimestre', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "informacion__fechas__modificaciones":


			$inserta=$objeto->getInsertaNormal('poa_modificacion__fechas', array("`idModificacionesFechas`, ","`fechaInicioM`, ","`fechaFinM`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`trimestre`, ","`perioIngreso`"),array("'$fechaI', ","'$fechaF', ","'$idUsuario', ","'$fecha_actual', ","'$hora_actual', ","'$trimestre', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "indicadores__modificas__exceles":


			$idActividad__array__codigo = json_decode($idActividad__array__codigo);
			$primer__trimestre__array = json_decode($primer__trimestre__array);
			$segundo__trimestre__array = json_decode($segundo__trimestre__array);
			$tercer__trimestre__array = json_decode($tercer__trimestre__array);
			$cuarto__trimestre__array = json_decode($cuarto__trimestre__array);
			$meta__trimestre__array = json_decode($meta__trimestre__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
		
 			$query="UPDATE poa_poainicial SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);


			for($i=0;$i<count($idActividad__array__codigo);$i++){

				$inserta=$objeto->getInsertaNormal('poa_poainicial', array("`idPoaEnviado`, ","`primertrimestre`, ","`segundotrimestre`, ","`tercertrimestre`, ","`cuartotrimestre`, ","`metaindicador`, ","`fecha`, ","`idActividad`, ","`idOrganismo`, ","`modifica`, ","`perioIngreso`, ","`semestre`"),array("'$primer__trimestre__array[$i]', ","'$segundo__trimestre__array[$i]', ","'$tercer__trimestre__array[$i]', ","'$cuarto__trimestre__array[$i]', ","'$meta__trimestre__array[$i]', ","'$fecha_actual', ","'$idActividad__array__codigo[$i]', ","'$idOrganismo', ","'A', ","'$aniosPeriodos__ingesos', ","'$semestreIndicadores'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "poa__suministros__guardados":

			$tipo__array = json_decode($tipo__array);
			$nombre__array = json_decode($nombre__array);
			$luz__array = json_decode($luz__array);
			$agua__array = json_decode($agua__array);


			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
		

			// $query="DELETE a.* FROM poa_suministros AS a INNER JOIN poa_suministrosn AS b ON a.idSuministros=b.idSumi WHERE b.idOrganismo='$idOrganismo' AND b.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			// $resultado= $conexionEstablecida->exec($query);

 		// 	$query="DELETE FROM poa_suministrosn WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			// $resultado= $conexionEstablecida->exec($query);

 			$query458="UPDATE poa_suministrosn SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado458= $conexionEstablecida->exec($query458);

			for($i=0;$i<count($tipo__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_suministrosn', array("`idSumi`, ","`tipo`, ","`nombreEscenario`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`perioIngreso`, ","`semestre`"),array("'$tipo__array[$i]', ","'$nombre__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A', ","'$aniosPeriodos__ingesos', ","'$semestreSuministros'"));


				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idSumi) AS maximo FROM poa_suministrosn;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`, ","`perioIngreso`"),array("'$luz__array[$i]', ","'$agua__array[$i]', ","'$maximo', ","'$aniosPeriodos__ingesos'"));

			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		


		break;

		case  "poa__general__guardados":

			$idActividad__array = json_decode($idActividad__array);
			$idItem__array = json_decode($idItem__array);

			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();
			// $elimina=$objeto->getElimina__indices('poa_programacion_financiera_dos','idOrganismo',$idOrganismo,"perioIngreso",$aniosPeriodos__ingesos);
 			$query458="UPDATE poa_programacion_financiera_dos SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado458= $conexionEstablecida->exec($query458);

			for($i=0;$i<count($idActividad__array);$i++){

				$enero__array[$i]=filter_var($enero__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$febrero__array[$i]=filter_var($febrero__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$marzo__array[$i]=filter_var($marzo__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$abril__array[$i]=filter_var($abril__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$mayo__array[$i]=filter_var($mayo__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$junio__array[$i]=filter_var($junio__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$julio__array[$i]=filter_var($julio__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$agosto__array[$i]=filter_var($agosto__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$septiembre__array[$i]=filter_var($septiembre__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$octubre__array[$i]=filter_var($octubre__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$noviembre__array[$i]=filter_var($noviembre__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$diciembre__array[$i]=filter_var($diciembre__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$total__array[$i]=filter_var($total__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera_dos', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`, ","`perioIngreso`, ","`semestre`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A', ","'$idItem__array[$i]', ","'$idActividad__array[$i]', ","'$aniosPeriodos__ingesos', ","'$semestrePoaGeneral'"));



			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		


		break;


		case  "deportivas__modificas__exceles":

			$codigo__financiero__array = json_decode($codigo__financiero__array);
			$tipo__financiamiento_array = json_decode($tipo__financiamiento_array);
			$evento__array = json_decode($evento__array);
			$deporte__array = json_decode($deporte__array);
			$provincia__array = json_decode($provincia__array);
			$pais__array = json_decode($pais__array);
			$alcance__array = json_decode($alcance__array);
			$fecha__inicio__array = json_decode($fecha__inicio__array);
			$fecha__fin__array = json_decode($fecha__fin__array);
			$genero__array = json_decode($genero__array);
			$categoria__array = json_decode($categoria__array);
			$numero__entrenadores__array = json_decode($numero__entrenadores__array);
			$numero__atletas__array = json_decode($numero__atletas__array);
			$total__array__beneficiarios = json_decode($total__array__beneficiarios);
			$beneficiarios__array = json_decode($beneficiarios__array);
			$beneficiarios2__array = json_decode($beneficiarios2__array);
			$justificacion__array = json_decode($justificacion__array);
			$cantidad__bienes__array = json_decode($cantidad__bienes__array);
			$detalle__adquisicion__array = json_decode($detalle__adquisicion__array);


			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();

 			$query2="UPDATE poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.modifica='I', b.modifica='I' WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A' AND a.idActividad='$idActividad__escogidas' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado2= $conexionEstablecida->exec($query2);

			for($i=0;$i<count($codigo__financiero__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`, ","`perioIngreso`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$codigo__financiero__array[$i]', ","'$idActividad__escogidas', ","'$aniosPeriodos__ingesos'"));

				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				$evento__array[$i]=filter_var($evento__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$tipo__financiamiento_array[$i]=filter_var($tipo__financiamiento_array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$deporte__array[$i]=filter_var($deporte__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$provincia__array[$i]=filter_var($provincia__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$justificacion__array[$i]=filter_var($justificacion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				$cantidad__bienes__array[$i]=filter_var($cantidad__bienes__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);


				$inserta2=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`fecha`, ","`modifica`, ","`detalleBien`, ","`perioIngreso`, ","`semestre`"),array("'$tipo__financiamiento_array[$i]', ","'$evento__array[$i]', ","'$deporte__array[$i]', ","'$provincia__array[$i]', ","'$pais__array[$i]', ","'$alcance__array[$i]', ","'$fecha__inicio__array[$i]', ","'$fecha__fin__array[$i]', ","'$genero__array[$i]', ","'$categoria__array[$i]', ","'$numero__entrenadores__array[$i]', ","'$numero__atletas__array[$i]', ","'$total__array__beneficiarios[$i]', ","'$beneficiarios__array[$i]', ","'$beneficiarios2__array[$i]', ","'$justificacion__array[$i]', ","'$cantidad__bienes__array[$i]', ","'$maximo', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$fecha_actual', ","'A', ","'$detalle__adquisicion__array[$i]', ","'$aniosPeriodos__ingesos', ","'$semestreActividad__de__actividades'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "administrativo__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$justificacion__array = json_decode($justificacion__array);
			$cantidad__array = json_decode($cantidad__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);
		
			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query2="UPDATE poa_programacion_financiera AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.modifica='I', b.modifica='I' WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos';";
 			$resultado2= $conexionEstablecida->exec($query2);

			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`, ","`perioIngreso`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$idActividad__array[$i]', ","'1', ","'$aniosPeriodos__ingesos'"));

				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				$justificacion__array[$i]=filter_var($justificacion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);

				$inserta2=$objeto->getInsertaNormal('poa_actividadesadministrativas', array("`idActividadAd`, ","`justificacionActividad`, ","`cantidadBien`, ","`idProgramacionFinanciera`, ","`fecha`, ","`modifica`, ","`perioIngreso`, ","`semestre`"),array("'$justificacion__array[$i]', ","'$cantidad__array[$i]', ","'$maximo', ","'$fecha_actual', ","'A', ","'$aniosPeriodos__ingesos', ","'$semestreAdministrativas'"));


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;



		case  "mantenimiento__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$nombreInfra__array = json_decode($nombreInfra__array);
			$provincia__codigo__array = json_decode($provincia__codigo__array);
			$direccion__array = json_decode($direccion__array);
			$estado__array = json_decode($estado__array);
			$tipoRecursos__array = json_decode($tipoRecursos__array);
			$tipoIntervencion__array = json_decode($tipoIntervencion__array);
			$detallarTipo__intervencion__array = json_decode($detallarTipo__intervencion__array);
			$tipoMantenimiento__array = json_decode($tipoMantenimiento__array);
			$materiales__servicios__array = json_decode($materiales__servicios__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);
			$ultimoFecha__servicios__array = json_decode($ultimoFecha__servicios__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();

 			$query2="UPDATE poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.modifica='I', b.modifica='I' WHERE a.idOrganismo='$idOrganismo' AND b.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos';";
 			$resultado2= $conexionEstablecida->exec($query2);


			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalTotales`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`idItem`, ","`idActividad`, ","`perioIngreso`"),array("'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'B', ","'$idActividad__array[$i]', ","'2', ","'$aniosPeriodos__ingesos'"));


				$maximoProgramacion__financiera=$objeto->getObtenerInformacionGeneral("SELECT MAX(idProgramacionFinanciera) AS maximo FROM poa_programacion_financiera;");

				$maximo=$maximoProgramacion__financiera[0][maximo];

				// $nombreInfra__array=filter_var($nombreInfra__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $direccion__array=filter_var($direccion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $estado__array=filter_var($estado__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $tipoRecursos__array=filter_var($tipoRecursos__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $tipoIntervencion__array=filter_var($tipoIntervencion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $detallarTipo__intervencion__array=filter_var($detallarTipo__intervencion__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $tipoMantenimiento__array=filter_var($tipoMantenimiento__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);
				// $materiales__servicios__array=filter_var($materiales__servicios__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);


				// $inserta2=$objeto->getInsertaNormal('poa_mantenimiento', array("`idMantenimiento`, ","`nombreInfras`, ","`provincia`, ","`direccionCompleta`, ","`estado`, ","`tipoRecursos`, ","`tipoIntervencion`, ","`detallarTipoIn`, ","`tipoMantenimiento`, ","`materialesServicios`, ","`idProgramacionFinanciera`, ","`fecha`, ","`modifica`, ","`perioIngreso`, ","`fechaUltimo`"),array("'$nombreInfra__array', ","'$provincia__codigo__array[$i]', ","'$direccion__array', ","'$estado__array', ","'$tipoRecursos__array', ","'$tipoIntervencion__array', ","'$detallarTipo__intervencion__array', ","'$tipoMantenimiento__array', ","'$materiales__servicios__array', ","'$maximo', ","'$fecha_actual', ","'A', ","'$aniosPeriodos__ingesos', ","'$ultimoFecha__servicios__array[$i]'"));


			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	
		 	
		 	$eliminar__querys="INSERT INTO `ezonshar_mdepsaddb`.`poa_mantenimiento` (`idMantenimiento`, `nombreInfras`, `provincia`, `direccionCompleta`, `estado`, `tipoRecursos`, `tipoIntervencion`, `detallarTipoIn`, `tipoMantenimiento`, `materialesServicios`, `fechaUltimo`, `idProgramacionFinanciera`, `fecha`, `modifica`, `perioIngreso`, `idOrganismo`, `semestre`) VALUES (NULL, '$nombreInfra__array[$i]', '$provincia__codigo__array[$i]', '$direccion__array[$i]', '$estado__array[$i]', '$tipoRecursos__array[$i]', '$tipoIntervencion__array[$i]', '$detallarTipo__intervencion__array[$i]', '$tipoMantenimiento__array[$i]', '$materiales__servicios__array[$i]', '$ultimoFecha__servicios__array[$i]', '$maximo', '$fecha_actual', 'A', '$aniosPeriodos__ingesos', '$idOrganismo', '$semestreMantenimiento');";


			$eliminar__querys__re= $conexionEstablecida->exec($eliminar__querys);	

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "honorarios__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$cedula__array = json_decode($cedula__array);
			$nombres__array = json_decode($nombres__array);
			$cargo__array = json_decode($cargo__array);
			$honorario__mensual = json_decode($honorario__mensual);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);
			$tipo__array = json_decode($tipo__array);

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="UPDATE poa_honorarios2022 SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);



			for($i=0;$i<count($idActividad__array);$i++){

				$inserta=$objeto->getInsertaNormal('poa_honorarios2022', array("`idHonorarios`, ","`idActividad`, ","`cedula`, ","`nombres`, ","`cargo`, ","`honorarioMensual`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`tipoCargo`, ","`perioIngreso`, ","`semestre`"),array("'$idActividad__array[$i]', ","'$cedula__array[$i]', ","'$nombres__array[$i]', ","'$cargo__array[$i]', ","'$honorario__mensual[$i]', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A', ","'$tipo__array[$i]', ","'$aniosPeriodos__ingesos', ","'$semestreHonorarios'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;



		case  "sueldo__salario__modificas__exceles":

			$idActividad__array = json_decode($idActividad__array);
			$cedula__array = json_decode($cedula__array);
			$cargo__array = json_decode($cargo__array);
			$nombres__array = json_decode($nombres__array);
			$tipoCargo__array = json_decode($tipoCargo__array);
			$tiempoTrabajo__array = json_decode($tiempoTrabajo__array);
			$sueldoSalario__array = json_decode($sueldoSalario__array);
			$aportePatronal__array = json_decode($aportePatronal__array);
			$decimoTercer__array = json_decode($decimoTercer__array);
			$mensualizaDecimoT__array = json_decode($mensualizaDecimoT__array);
			$decimoCuarto__array = json_decode($decimoCuarto__array);
			$mensualizaDecimoC__array = json_decode($mensualizaDecimoC__array);
			$fondosRe__array = json_decode($fondosRe__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);


			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="UPDATE poa_sueldossalarios2022 SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);



			for($i=0;$i<count($idActividad__array);$i++){

				$parametro1 = strtolower($tipoCargo__array[$i]);

				if (strpos($parametro1,'minis')!==false || strpos($parametro1,'mien')!==false) {
					$idaAcRe=1;
				}else{
					$idaAcRe=4;
				}

				$inserta=$objeto->getInsertaNormal('poa_sueldossalarios2022', array("`idSueldos`, ","`idActividad`, ","`cedula`, ","`cargo`, ","`nombres`, ","`tipoCargo`, ","`tiempoTrabajo`, ","`sueldoSalario`, ","`aportePatronal`, ","`decimoTercera`, ","`mensualizaTercera`, ","`decimoCuarta`, ","`menusalizaCuarta`, ","`fondosReserva`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`modifica`, ","`perioIngreso`, ","`semestre`"),array("'$idaAcRe', ","'$cedula__array[$i]', ","'$cargo__array[$i]', ","'$nombres__array[$i]', ","'$tipoCargo__array[$i]', ","'$tiempoTrabajo__array[$i]', ","'$sueldoSalario__array[$i]', ","'$aportePatronal__array[$i]', ","'$decimoTercer__array[$i]', ","'$mensualizaDecimoT__array[$i]', ","'$decimoCuarto__array[$i]', ","'$mensualizaDecimoC__array[$i]', ","'$fondosRe__array[$i]', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'$total__array[$i]', ","'$idOrganismo', ","'$fecha_actual', ","'A', ","'$aniosPeriodos__ingesos', ","'$semestreSueldosSalarios'"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "sueldo__salario__modificas__exceles__desvinculaciones":

			$idActividad__array = json_decode($idActividad__array);
			$cedula__array = json_decode($cedula__array);
			$cargo__array = json_decode($cargo__array);
			$nombres__array = json_decode($nombres__array);
			$tipoCargo__array = json_decode($tipoCargo__array);
			$compensacionDesaucio__array = json_decode($compensacionDesaucio__array);
			$despidoIntes__array = json_decode($despidoIntes__array);
			$enero__array = json_decode($enero__array);
			$febrero__array = json_decode($febrero__array);
			$marzo__array = json_decode($marzo__array);
			$abril__array = json_decode($abril__array);
			$mayo__array = json_decode($mayo__array);
			$junio__array = json_decode($junio__array);
			$julio__array = json_decode($julio__array);
			$agosto__array = json_decode($agosto__array);
			$septiembre__array = json_decode($septiembre__array);
			$octubre__array = json_decode($octubre__array);
			$noviembre__array = json_decode($noviembre__array);
			$diciembre__array = json_decode($diciembre__array);
			$total__array = json_decode($total__array);


			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


 			$query="UPDATE poa_desvinculacion SET modifica='I' WHERE idOrganismo='$idOrganismo' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			for($i=0;$i<count($idActividad__array);$i++){


				$parametro1 = strtolower($tipoCargo__array[$i]);

				$cedula__encubiertas=filter_var($cedula__array[$i], FILTER_SANITIZE_MAGIC_QUOTES);

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idSueldos,semestre FROM poa_sueldossalarios2022 WHERE cedula='$cedula__encubiertas' AND perioIngreso='$aniosPeriodos__ingesos';");

				$idSueldos=$indicadorInformacion[0][idSueldos];

	 			$queryDesvinculacion="INSERT INTO `ezonshar_mdepsaddb`.`poa_desvinculacion` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `estado`, `modifica`, `fecha`, `total`, `montoDesvinculacion`, `perioIngreso`, `semestre`) VALUES (NULL, $idSueldos, $idOrganismo, '$compensacionDesaucio__array[$i]', '$enero__array[$i]', '$febrero__array[$i]', '$marzo__array[$i]', '$abril__array[$i]', '$mayo__array[$i]', '$junio__array[$i]', '$julio__array[$i]', '$agosto__array[$i]', '$septiembre__array[$i]', '$octubre__array[$i]', '$noviembre__array[$i]', '$diciembre__array[$i]', 1, 'A', '$fecha_actual', '$total__array[$i]', '$despidoIntes__array[$i]', '$aniosPeriodos__ingesos', NULL);";
				$resultadoDesvinculacion= $conexionEstablecida->exec($queryDesvinculacion);

									
				// $inserta=$objeto->getInsertaNormal('poa_desvinculacion', array("`idDesvinculacion`, ","`idSueldos`, ","`idOrganismo`, ","`opcion`, ","`enero`, ","`febreo`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`estado`, ","`modifica`, ","`fecha`, ","`total`, ","`montoDesvinculacion`, ","`perioIngreso`, ","`semestre`"),array("'$idSueldos', ","'$idOrganismo', ","'$compensacionDesaucio__array[$i]', ","'$enero__array[$i]', ","'$febrero__array[$i]', ","'$marzo__array[$i]', ","'$abril__array[$i]', ","'$mayo__array[$i]', ","'$junio__array[$i]', ","'$julio__array[$i]', ","'$agosto__array[$i]', ","'$septiembre__array[$i]', ","'$octubre__array[$i]', ","'$noviembre__array[$i]', ","'$diciembre__array[$i]', ","'1', ","'A', ","'$fecha_actual', ","'$total__array[$i]', ","'$despidoIntes__array[$i]', ","'$aniosPeriodos__ingesos', ","'$semestreDesvinculaciones'"));


			}

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "guardar__modificas__principal__act":

			$arrayInformacion = json_decode($parametros);

			if (strpos($nombre__justificacion, "documento seleccionado") !== false) {

				$nombre="N/A";
					
			}else{

				$nombre=$fecha_actual."__".$hora_actual2."__".$arrayInformacion[0]."pdf";
				$direccion1=VARIABLE__BACKEND."modificacion/justifiacionActPrincipal/";
				$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre);
				
			}



			$inserta=$objeto->getInsertaNormal('poa_modificacion_organismo_actividades', array("`idModificacionOr`, ","`idOrganismo`, ","`actividadOrigen`, ","`idFinancieroOrigen`, ","`mesOrigen`, ","`montoAsignadoOrigen`, ","`disminucionOrigen`, ","`totalOrigen`, ","`actividadDestino`, ","`idFinancieroDestino`, ","`mesDestino`, ","`montoAsignadoDestino`, ","`aumentoDestino`, ","`totalDestino`, ","`fecha`, ","`hora`, ","`documentoJ`, ","`justificacion`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$actividad', ","'$item__modificaciones', ","'$mesesSeleccionables__destino', ","'$monto__seleccionados__destino', ","'$disminucion__seleccionados__destino', ","'$total__disminucion__destino', ","'$fecha_actual', ","'$hora_actual', ","'$nombre', ","'$justificacion', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;


		case  "guardar__modificas__director":

			$arrayInformacion = json_decode($parametros);

			$descripcion=filter_var($descripcion, FILTER_SANITIZE_MAGIC_QUOTES);

			$inserta=$objeto->getInsertaNormal('poa_modificacion_actividad_administra_origen', array("`idActividadModificacion`, ","`idActividadOrigen`, ","`idActividadDestino`, ","`idUsuario`, ","`idItem`, ","`fecha`, ","`hora`, ","`descripcion`, ","`estado`, ","`perioIngreso`"),array("'$origen', ","'$destino', ","'$arrayInformacion[0]', ","'$permitido', ","'$fecha_actual', ","'$hora_actual', ","'$descripcion', ","'A', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		case  "guardar__seguimiento__totales":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$organismoIdPrin';");

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_docuento_final WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDocumento_seguimiento DESC;");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDeclaracion DESC LIMIT 1;");

			$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_esigef WHERE idOrganismo='$organismoIdPrin';");

			if (!empty($indicadorInformacion4[0][idOrganismo])) {
				$varEsi="si";
			}else{
				$varEsi="no";
			}


			/*=============================
			=            Email            =
			=============================*/
			

			if($trimestreEvaluador=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluador=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluador=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluador=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}


			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Ministerio del Deporte, confirma que el día '.$fecha_actual.', a las '.$hora__dos.', fue recibida la información de seguimiento y evaluación al POA correspondiente a:<br><br><div style="font-weight;">Período:'.$variableTrimestral.' '.$aniosPeriodos__ingesos.'</div></body></html>';

			$emailArray = array($indicadorInformacion[0][correo]);

			$documentoE=$indicadorInformacion2[0][documento];

			$documentoE2=$indicadorInformacion3[0][documento];

			$correosEnviados=$objeto->getEnviarCorreo__atachmen($emailArray,$bodyMensaje,VARIABLE__BACKEND."final__seguimiento/$documentoE",VARIABLE__BACKEND."declaracionTerminos/$documentoE2");

			$inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`, ","`perioIngreso`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi', ","'$aniosPeriodos__ingesos'"));	


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$indicadorInformacionComparaciones=$objeto->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE idOrganismo='$organismoIdPrin' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestreEvaluador';");

			if (!empty($indicadorInformacionComparaciones[0][idSeguimientoCambio])) {

				$idSeguimientoCambioE=$indicadorInformacionComparaciones[0][idSeguimientoCambio];
				
	 			$query="UPDATE poa_seguimiento_control_cambios SET estado='T' WHERE idSeguimientoCambio='$idSeguimientoCambioE';";
				$resultado= $conexionEstablecida->exec($query);

			}
			
			
			/*=====  End of Email  ======*/	

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		/*****************************************  GUARDAR TIRMESTRES 2023  ******************************** */
		// case  "guardar__seguimiento__totales2023":

		// 	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$organismoIdPrin';");

		// 	$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_docuento_final WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDocumento_seguimiento DESC;");

		// 	$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDeclaracion DESC LIMIT 1;");

		// 	$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_esigef WHERE idOrganismo='$organismoIdPrin';");

		// 	if (!empty($indicadorInformacion4[0][idOrganismo])) {
		// 		$varEsi="si";
		// 	}else{
		// 		$varEsi="no";
		// 	}


		// 	/*=============================
		// 	=            Email            =
		// 	=============================*/
			

		// 	if($trimestreEvaluador=="primerTrimestre") {
		// 		$variableTrimestral="Primer Trimestre";
		// 	}else if($trimestreEvaluador=="segundoTrimestre"){
		// 		$variableTrimestral="Segundo Trimestre";
		// 	}else if($trimestreEvaluador=="tercerTrimestre"){
		// 		$variableTrimestral="Tercer Trimestre";
		// 	}else if($trimestreEvaluador=="cuartoTrimestre"){
		// 		$variableTrimestral="Cuarto Trimestre";
		// 	}


		// 	$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Ministerio del Deporte, confirma que el día '.$fecha_actual.', a las '.$hora__dos.', fue recibida la información de seguimiento y evaluación al POA correspondiente a:<br><br><div style="font-weight;">Período:'.$variableTrimestral.' '.$aniosPeriodos__ingesos.'</div></body></html>';

		// 	$emailArray = array($indicadorInformacion[0][correo]);

		// 	$documentoE=$indicadorInformacion2[0][documento];

		// 	$documentoE2=$indicadorInformacion3[0][documento];

		// 	$correosEnviados=$objeto->getEnviarCorreo__atachmen($emailArray,$bodyMensaje,"../../documentos/final__seguimiento/$documentoE","../../documentos/declaracionTerminos/$documentoE2");

		// 	$habilitarTrimestre=$objeto->getObtenerInformacionGeneral("SELECT estado FROM poa_seguimiento_control_cambios WHERE idOrganismo='$organismoIdPrin' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestreEvaluador';");
			
		// 	//$inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`, ","`perioIngreso`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi', ","'$aniosPeriodos__ingesos'"));	

		// 	if (empty($guardar__seguimiento__totales[0][estado])) {
		// 		// $inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`, ","`perioIngreso`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi', ","'$aniosPeriodos__ingesos'"));	
			
		// 		$conexionRecuperada= new conexion();
		// 		$conexionEstablecida=$conexionRecuperada->cConexion();			
	
		// 		$inserta="INSERT INTO `poa_trimestrales`(`tipoTrimestre`, `fecha`, `idOrganismo`, `esigeft`, `perioIngreso`) VALUES ('$trimestreEvaluador','$fecha_actual','$organismoIdPrin','$varEsi','$aniosPeriodos__ingesos');";
		
		// 		$resultado= $conexionEstablecida->exec($inserta);
			


		// 	}


		// 	$conexionRecuperada= new conexion();
	 	// 	$conexionEstablecida=$conexionRecuperada->cConexion();	


		// 	$indicadorInformacionComparaciones=$objeto->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE idOrganismo='$organismoIdPrin' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestreEvaluador';");

		// 	if (!empty($indicadorInformacionComparaciones[0][idSeguimientoCambio])) {

		// 		$idSeguimientoCambioE=$indicadorInformacionComparaciones[0][idSeguimientoCambio];
				
	 	// 		$query="UPDATE poa_seguimiento_control_cambios SET estado='T' WHERE idSeguimientoCambio='$idSeguimientoCambioE';";
		// 		$resultado= $conexionEstablecida->exec($query);

		// 	}

		
			
		// 	/*=====  End of Email  ======*/	

		// 	$mensaje=1;
		// 	$jason['mensaje']=$mensaje;		

		// break;

		case  "guardar__seguimiento__totales2023":

			// $parametro1="../../documentos/final__seguimiento/";
			// $parametro2="finalSeguiiento";	
			// $parametro3=$organismoIdPrin."__".$fecha_actual;


			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT correo,nombreOrganismo FROM poa_organismo WHERE idOrganismo='$organismoIdPrin';");

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_docuento_final WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDocumento_seguimiento DESC;");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT documento FROM poa_seguimiento_declaracion WHERE idOrganismo='$organismoIdPrin' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idDeclaracion DESC LIMIT 1;");

			$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_esigef WHERE idOrganismo='$organismoIdPrin';");

			if (!empty($indicadorInformacion4[0][idOrganismo])) {
				$varEsi="si";
			}else{
				$varEsi="no";
			}


			/*=============================
			=            Email            =
			=============================*/
			

			if($trimestreEvaluador=="primerTrimestre") {
				$variableTrimestral="Primer Trimestre";
			}else if($trimestreEvaluador=="segundoTrimestre"){
				$variableTrimestral="Segundo Trimestre";
			}else if($trimestreEvaluador=="tercerTrimestre"){
				$variableTrimestral="Tercer Trimestre";
			}else if($trimestreEvaluador=="cuartoTrimestre"){
				$variableTrimestral="Cuarto Trimestre";
			}


			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Ministerio del Deporte, confirma que el día '.$fecha_actual.', a las '.$hora__dos.', fue recibida la información de seguimiento y evaluación al POA correspondiente a:<br><br><div style="font-weight;">Período:'.$variableTrimestral.' '.$aniosPeriodos__ingesos.'</div></body></html>';

			$emailArray = array($indicadorInformacion[0][correo]);

			$documentoE=$indicadorInformacion2[0][documento];

			$documentoE2=$indicadorInformacion3[0][documento];

			$correosEnviados=$objeto->getEnviarCorreo__atachmen($emailArray,$bodyMensaje,"../../documentos/final__seguimiento/$documentoE","../../documentos/declaracionTerminos/$documentoE2");

			$habilitarTrimestre=$objeto->getObtenerInformacionGeneral("SELECT estado FROM poa_seguimiento_control_cambios WHERE idOrganismo='$organismoIdPrin' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestreEvaluador';");
			
			//$inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`, ","`perioIngreso`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi', ","'$aniosPeriodos__ingesos'"));	

			if (empty($habilitarTrimestre[0][estado])) {
				$inserta=$objeto->getInsertaNormal('poa_trimestrales', array("`idEnviadorTrimestres`, ","`tipoTrimestre`, ","`fecha`, ","`idOrganismo`, ","`esigeft`, ","`perioIngreso`"),array("'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$varEsi', ","'$aniosPeriodos__ingesos'"));	
			}


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$indicadorInformacionComparaciones=$objeto->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE idOrganismo='$organismoIdPrin' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestreEvaluador';");

			if (!empty($indicadorInformacionComparaciones[0][idSeguimientoCambio])) {

				$idSeguimientoCambioE=$indicadorInformacionComparaciones[0][idSeguimientoCambio];
				
	 			$query="UPDATE poa_seguimiento_control_cambios SET estado='T' WHERE idSeguimientoCambio='$idSeguimientoCambioE';";
				$resultado= $conexionEstablecida->exec($query);

			}
			
			
			/*=====  End of Email  ======*/	

			$mensaje=1;
			$jason['mensaje']=$mensaje;		

		break;

		/**************************************************************************************************** */

		case  "enviar__programaciones__seguimientos":

			$arrayInformacion = json_decode($parametros);


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$query="UPDATE poa_seguimiento_reporteria SET estado=NULL WHERE idItem='$arrayInformacion[5]' AND idActividad='$arrayInformacion[8]' AND idOrganismo='$arrayInformacion[1]' AND trimestre='$arrayInformacion[2]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$resultado= $conexionEstablecida->exec($query);	


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_reporteria', array("`idSeguimientoFinanciero`, ","`programado`, ","`porcentaje`, ","`idProgramacionFinanciera`, ","`idOrganismo`, ","`trimestre`, ","`fecha`, ","`idItem`, ","`planificado`, ","`ejecutado`, ","`idActividad`, ","`estado`, ","`perioIngreso`"),array("'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'A', ","'$aniosPeriodos__ingesos'"));			


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "guardar__seguimiento__estados":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT llamada FROM poa_segimiento_confirmado WHERE idOrganismo='$organismoIdPrin' AND trimestre='$trimestreEvaluador' AND perioIngreso='$aniosPeriodos__ingesos';");


			if (!empty($indicadorInformacion[0][llamada])) {
			
				if ($indicadorInformacion[0][llamada]=='si') {
					$valores=array("llamada='no'");
				}else{
					$valores=array("llamada='si'");
				}

				$actualiza=$objeto->getActualiza__confirmado__2("poa_segimiento_confirmado",$valores,"idOrganismo",$organismoIdPrin,"trimestre",$trimestreEvaluador,"perioIngreso",$aniosPeriodos__ingesos);


			}else{

				$inserta=$objeto->getInsertaNormal('poa_segimiento_confirmado', array("`idTipoLlamada`, ","`llamada`, ","`trimestre`, ","`fecha`, ","`idOrganismo`, ","`perioIngreso`"),array("'si', ","'$trimestreEvaluador', ","'$fecha_actual', ","'$organismoIdPrin', ","'$aniosPeriodos__ingesos'"));				

			}

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT llamada FROM poa_segimiento_confirmado WHERE idOrganismo='$organismoIdPrin' AND trimestre='$trimestreEvaluador' AND perioIngreso='$aniosPeriodos__ingesos';");


			$llamada=$indicadorInformacion2[0][llamada];
			$jason['llamada']=$llamada;

		break;


		case  "autogestion__guardados":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_montos_autogestion', array("`idMontosAutoGestion`, ","`detalleAu`, ","`montoAu`, ","`bienSer`, ","`detalleDos`, ","`trimestre`, ","`fecha`, ","`idOrganismo`, ","`perioIngreso`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$arrayInformacion[0]', ","'$aniosPeriodos__ingesos'"));	

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "autogestionDeportiva":


			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT idAutogestion,autogestion FROM poa_seguimiento_autogestion WHERE idOrganismo='$idOrganismos' AND trimestre='$trimestre' AND perioIngreso='$aniosPeriodos__ingesos';");
			$indicadorH=false;

			if (!empty($indicadorInformacion[0][idAutogestion])) {
			
				$indicadorH=true;

				$valores=array("autogestion='$autogestionSelect'");
				$actualiza=$objeto->getActualiza__confirmado__2("poa_seguimiento_autogestion",$valores,"idOrganismo",$idOrganismos,"trimestre",$trimestre,"perioIngreso",$aniosPeriodos__ingesos);

			}else{

				$inserta=$objeto->getInsertaNormal('poa_seguimiento_autogestion', array("`idAutogestion`, ","`autogestion`, ","`trimestre`, ","`fecha`, ","`hora`, ","`idOrganismo`, ","`perioIngreso`"),array("'$autogestionSelect', ","'$trimestre', ","'$fecha_actual', ","'$hora_actual', ","'$idOrganismos', ","'$aniosPeriodos__ingesos'"));				

			}

			$autogestionV =$indicadorInformacion[0][autogestion];

			$jason['indicadorH']=$indicadorH;
			$jason['autogestionV']=$autogestionV;


		break;

		case  "implementacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosInstalaciones/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_instalaciones', array("`idOtrosInstalaciones`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "implementacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasImplementacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_instalaciones', array("`idFacturaInstalaciones`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "implementacion__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_implementacion', array("`idImplementacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__recreativo__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_recreativo_tecnico', array("`idCompetenciaSeguimiento`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;		

		case  "recreativo__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosRecreativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo', array("`idOtrosRecreativo`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "recreativo__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasRecreativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_recreativo', array("`idFacturaRecreativo`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "recreativo__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_recreativos', array("`idRecreativos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "otros__recreativo__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otros__recreativos__tecnicos/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_recreativo_tecnicos', array("`idOtrosRT`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "otros__capacitacion__alto":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_alto/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_alto', array("`idOtrosCompetenciasAltos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__capacitacion__alto":

			// $inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto', array("`idCompetenciaAlto`, ","`idAdministrativo`, ","`trimestre`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`fechaInicioP`, ","`fechaInicioEjecutado`, ","`fechaFinP`, ","`fechaFinEjecutado`, ","`tipoEvento`, ","`eventoTareaE`, ","`nivel`, ","`total`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]'"));


			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_alto2', array("`idCompetenciaAltos`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4`, ","`perioIngreso`"),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;

		break;		



		case  "eventos__resultados":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_resultados_alto', array("`idResultados`, ","`idPda`, ","`trimestre`, ","`idOrganismo`, ","`deportes`, ","`modalidad`, ","`tipoPrueba`, ","`marcaAlcanzada`, ","`convocatoriaJuegos`, ","`genero`, ","`categoriaDeportiva`, ","`nombres`, ","`apellidos`, ","`provinciaRe`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompentencia_formativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia_formativos', array("`idOtrosCompetenciasTecnicas`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "guardar__capacitacion__formativos":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_competencia_formativo', array("`idCompetenciaFormativo`, ","`evento`, ","`predicionResultados`, ","`oro`, ","`plata`, ","`bronce`, ","`total`, ","`cuarOc`, ","`analisis`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`fecha1`, ","`fecha2`, ","`fecha3`, ","`fecha4`, ","`perioIngreso`"),array("'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[3]', ","'$arrayInformacion[16]', ","'$arrayInformacion[6]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$arrayInformacion[22]', ","'$arrayInformacion[23]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;		


		case  "competencias__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCompetencia/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_competencia', array("`idOtrosCompetencia`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "competencias__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCompetencias/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_competencia', array("`idFacturaCompetencia`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "competencias__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_competencias', array("`idCompetencias`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__capacitacion__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCpacitacion_tecnico/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion_tecnico', array("`idOtrosCapacitacionTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "guardar__capacitacion__tecnicos":

			$arrayInformacion = json_decode($parametros);

			if (empty($arrayInformacion[3])) {
				$arrayInformacion[3]='1990/09/18';
			}


			if (empty($arrayInformacion[4])) {
				$arrayInformacion[4]='1990/09/18';
			}

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_capacitacion_tecnico', array("`idCapacitacionTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`beneficiariosHombres`, ","`beneficiariosMujeres`, ","`totalT`, ","`nombreOrganismo`, ","`ruc`, ","`tipoOrganizacion`, ","`perioIngreso`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "capacitacion__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosCapacitacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_capacitacion', array("`idOtrosCapacitacion`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "capacitacion__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasCapacitacion/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_capacitacion', array("`idFacturaCapacitacion`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "capacitacion__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_capacitacion', array("`idCapacitacion`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`cantidadBienes`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "filaIndicadora__administra":

			$arrayInformacion = json_decode($parametros);

			if (empty($arrayInformacion[3])) {
				$arrayInformacion[3]='1990/09/18';
			}


			if (empty($arrayInformacion[4])) {
				$arrayInformacion[4]='1990/09/18';
			}

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_mantenimiento_tecnico', array("`idMantenimientoTec`, ","`planificadoInicial`, ","`ejecutadoInicial`, ","`planificadoFinal`, ","`ejectuadoFinal`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observacionesTecnicas`, ","`porcentaje`, ","`perioIngreso`"),array("'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[6]', ","'$arrayInformacion[0]', ","'$arrayInformacion[5]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "otros__mantenimientos__tecnicos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento__tecnicos/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento_tecnico', array("`idOtrosMantenimientoTecnico`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "mantenimiento__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_segimiento_mantenimiento', array("`idMantenimiento`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "mantenimiento__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosMantenimiento/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_mantenimiento', array("`idOtrosMantenimiento`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "mantenimiento__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasMantenimiento/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_mantenimiento', array("`idFacturaMantenimiento`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;


		case  "esigef":

			$inserta=$objeto->getInsertaNormal('poa_esigef', array("`idEsigef`, ","`idOrganismo`, ","`idUsuario`, ","`activo`, ","`fecha`, ","`perioIngreso`"),array("'$organismosSegumiento', ","'$idUsuarioC', ","'A', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "otros__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_administrativos', array("`idOtrosAdministrativos`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "facturas__administrativas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_administrativo', array("`idFacturaAdministrativos`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "administrativos__seguimientos":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";
			$direccion2=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

			if (isset($archivo1)) {

				$nombre__archivo1="no";

			}else{

				$nombre__archivo1=$fecha_actual."__".$arrayInformacion[3]."__".$hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);

			}

			if (isset($archivo2)) {
				
				$nombre__archivo2="no";

			}else{

				$nombre__archivo2=$fecha_actual."__".$arrayInformacion[3]."__".$hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["archivo2"]['type'],$_FILES["archivo2"]['size'],$_FILES["archivo2"]['tmp_name'],$_FILES["archivo2"]['name'],$direccion2,$nombre__archivo2);

			}



			$inserta=$objeto->getInsertaNormal('poa_seguimiento_administrativo', array("`idAdministrativoSegui`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`factura`, ","`otrosHabilitantes`, ","`mes`, ","`trimestre`, ","`idAdministrativo`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo1', ","'$nombre__archivo2', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;



		case  "honorarios__guardar__otros":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/otrosHonorarios/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_otros_honorarios', array("`idOtrosHonorarios`, ","`documento`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[3]', ","'$aniosPeriodos__ingesos'"));
			
			$mensaje=1;

			$jason['mensaje']=$mensaje;

			// $tipo = $_FILES['archivo1']['type']; 
			// $archivotmp = $_FILES['archivo1']['tmp_name'];
			// $destino="../../../repositorio";


			// ;
			// if (rename($archivotmp,"$destino/cesar.pdf")) {
			// 	echo "si";
			// }else{
			// 	echo "no";
			// }


		break;


		case  "honorarios__guardar__facturas":

			$arrayInformacion = json_decode($parametros);

			$direccion1=VARIABLE__BACKEND."seguimiento/facturasHonorarios/";

			$nombre__archivo1=$fecha_actual."__".$arrayInformacion[0]."__".$hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["archivo1"]['type'],$_FILES["archivo1"]['size'],$_FILES["archivo1"]['tmp_name'],$_FILES["archivo1"]['name'],$direccion1,$nombre__archivo1);


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_facturas_honorarios', array("`idFacturaHonorarios`, ","`documento`, ","`numeroFactura`, ","`fechaFactura`, ","`ruc`, ","`autorizacion`, ","`monto`, ","`fecha`, ","`mes`, ","`trimestre`, ","`idActividadAc`, ","`idOrganismo`, ","`perioIngreso`"),array("'$nombre__archivo1', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$fecha_actual', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[0]', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;

			$jason['mensaje']=$mensaje;


		break;

		case  "honorarios__guardar":

			$arrayInformacion = json_decode($parametros);

			$inserta=$objeto->getInsertaNormal('poa_seguimiento_honorarios', array("`idHonorariosSeguimientos`, ","`mensualProgramado`, ","`mensualEjecutado`, ","`mes`, ","`trimestre`, ","`idHonorarios`, ","`idOrganismo`, ","`fecha`, ","`hora`, ","`observaciones`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[7]', ","'$arrayInformacion[2]', ","'$fecha_actual', ","'$hora_actual', ","'$arrayInformacion[8]', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case  "editar__indicadores":

			$arrayInformacion = json_decode($parametros);

			if ($archivo2!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/facturas__administrativo/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores2=array("factura='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_administrativo",$valores2,"idAdministrativoSegui",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);

			}


			if ($archivo4!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/otrosHabilitantes__administrativo/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo3"]['type'],$_FILES["archivo3"]['size'],$_FILES["archivo3"]['tmp_name'],$_FILES["archivo3"]['name'],$direccion,$nombre__archivo);

				$valores2=array("otrosHabilitantes='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_administrativo",$valores2,"idAdministrativoSegui",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);
				
			}

			$valores=array("mensualEjecutado='$arrayInformacion[1]'");

			$actualiza=$objeto->getActualiza__confirmado("poa_seguimiento_administrativo",$valores,"idAdministrativoSegui",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;




		case  "editar__honorarios":

			$arrayInformacion = json_decode($parametros);

			if ($archivo2!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/facturas/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores2=array("facturas='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);

			}


			if ($archivo4!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/cheques/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo3"]['type'],$_FILES["archivo3"]['size'],$_FILES["archivo3"]['tmp_name'],$_FILES["archivo3"]['name'],$direccion,$nombre__archivo);

				$valores2=array("cheques='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);
				
			}

			if ($archivo6!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/ruc/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo5"]['type'],$_FILES["archivo5"]['size'],$_FILES["archivo5"]['tmp_name'],$_FILES["archivo5"]['name'],$direccion,$nombre__archivo);

				$valores2=array("ruc='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);
				
			}

			if ($archivo8!="no") {

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[0].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/otrosHabilitantes/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo7"]['type'],$_FILES["archivo7"]['size'],$_FILES["archivo7"]['tmp_name'],$_FILES["archivo7"]['name'],$direccion,$nombre__archivo);

				$valores2=array("otrosHabilitantes='$nombre__archivo'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_seguimiento_honorarios",$valores2,"idHonorariosSeguimientos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);
				
			}


			$valores=array("mensualEjectuado='$arrayInformacion[1]'");

			$actualiza=$objeto->getActualiza__confirmado("poa_seguimiento_honorarios",$valores,"idHonorariosSeguimientos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "editar__sueldos__salarios":

			$arrayInformacion = json_decode($parametros);

			$valores=array("sueldoSalarioEjecutado='$arrayInformacion[1]',aporteIessEjecutado='$arrayInformacion[2]',decimoTerceroEjecutado='$arrayInformacion[3]',decimoCuartoEjecutado='$arrayInformacion[4]',fondosReservasEjecutado='$arrayInformacion[5]'");

			$actualiza=$objeto->getActualiza__confirmado("poa_seguimiento_sueldos_salarios",$valores,"idSueldosSeguimeintos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "editar__sueldos__salarios__desvinculaciones":

			$arrayInformacion = json_decode($parametros);

			$valores=array("compensacionDeshaucioEjecutado='$arrayInformacion[1]',despidoIntepestivoEjecutado='$arrayInformacion[2]',renunciaVoluntariaEjecutado='$arrayInformacion[3]',vacionesEjecutado='$arrayInformacion[4]'");

			$actualiza=$objeto->getActualiza__confirmado("poa_seguimiento_sueldos_salarios",$valores,"idSueldosSeguimeintos",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "sueldos__salarios__seguimientos":

			$arrayInformacion = json_decode($parametros);

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[11]."__".$hora_actual2.".pdf";


			$inserta=$objeto->getInsertaNormal('poa_seguimiento_sueldos_salarios', array("`idSueldosSeguimeintos`, ","`sueldoSalarioPlanificado`, ","`sueldoSalarioEjecutado`, ","`aporteIessPlanificado`, ","`aporteIessEjecutado`, ","`decimoTerceroPlanificado`, ","`decimoTerceroEjecutado`, ","`decimoCuartoPlanificado`, ","`decimoCuartoEjecutado`, ","`fondosReservasPlanificado`, ","`fondosReservasEjecutado`, ","`idOrganismo`, ","`idSueldosSalarios`, ","`fecha`, ","`hora`, ","`planilla`, ","`comprobante`, ","`rol`, ","`mes`, ","`periodo`, ","`compensacionDeshaucioProgramado`, ","`despidoIntepestivoProgramado`, ","`reunciaVoluntariaProgramado`, ","`vacacionesProgramado`, ","`compensacionDeshaucioEjecutado`, ","`despidoIntepestivoEjecutado`, ","`renunciaVoluntariaEjecutado`, ","`vacionesEjecutado`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$arrayInformacion[5]', ","'$arrayInformacion[6]', ","'$arrayInformacion[7]', ","'$arrayInformacion[8]', ","'$arrayInformacion[9]', ","'$arrayInformacion[10]', ","'$arrayInformacion[11]', ","'$fecha_actual', ","'$hora_actual', ","'$nombre__archivo', ","'$nombre__archivo', ","'$nombre__archivo', ","'$arrayInformacion[12]', ","'$arrayInformacion[13]', ","'$arrayInformacion[14]', ","'$arrayInformacion[15]', ","'$arrayInformacion[16]', ","'$arrayInformacion[17]', ","'$arrayInformacion[18]', ","'$arrayInformacion[19]', ","'$arrayInformacion[20]', ","'$arrayInformacion[21]', ","'$aniosPeriodos__ingesos'"));


			if ($arrayInformacion[13]=="primerTrimestre") {

				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='primerTrimestre' AND mes='Enero' AND mes='Febrero' AND mes='Marzo';");

			}else if ($arrayInformacion[13]=="segundoTrimestre") {

				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='segundoTrimestre' AND mes='Abril' AND mes='Mayo' AND mes='Junio';");
		
				
			}if ($arrayInformacion[13]=="tercerTrimestre") {
				
				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='tercerTrimestre' AND mes='Julio' AND mes='Agosto' AND mes='Septiembre';");

			}if ($arrayInformacion[13]=="cuartoTrimestre") {
				
				$consultas=$objeto->getObtenerInformacionGeneral("SELECT idSueldosSeguimeintos FROM poa_seguimiento_sueldos_salarios WHERE idOrganismo='$arrayInformacion[9]' AND periodo='cuartoTrimestre' AND mes='Octubre' AND mes='Noviembre' AND mes='Diciembre';");			

			}

			if (empty($consultas[0][idSueldosSeguimeintos])) {
				$consultas="no";
			}else{
				$consultas="si";
			}

			
			$mensaje=1;

			$jason['mensaje']=$mensaje;
			$jason['consultas']=$consultas;


		break;

		case  "editar__indicadores":

			$arrayInformacion = json_decode($parametros);

			if($archivo2!="no"){

				$nombre__archivo=$fecha_actual."__".$arrayInformacion[3]."__".$arrayInformacion[2].".pdf";
				$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

				$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

				$valores=array("totalEjecutado='$arrayInformacion[1]', documento='$nombre__archivo'");

				$actualiza=$objeto->getActualiza__confirmado("poa_indicadores_seguimiento",$valores,"idModificaIndicadores",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			}else{

				$valores=array("totalEjecutado='$arrayInformacion[1]'");

				$actualiza=$objeto->getActualiza__confirmado("poa_indicadores_seguimiento",$valores,"idModificaIndicadores",$arrayInformacion[0],"perioIngreso",$aniosPeriodos__ingesos);


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "seguimiento__indicadores":

			$arrayInformacion = json_decode($prametros);

			$nombre__archivo=$fecha_actual."__".$arrayInformacion[2]."__".$arrayInformacion[3].".pdf";
			$direccion=VARIABLE__BACKEND."seguimiento/indicadoresDocumento/";

			$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccion,$nombre__archivo);

			$inserta=$objeto->getInsertaNormal('poa_indicadores_seguimiento', array("`idModificaIndicadores`, ","`totalProgramado`, ","`totalEjecutado`, ","`documento`, ","`idOrganismo`, ","`idActividad`, ","`trimestre`, ","`fecha`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$nombre__archivo', ","'$arrayInformacion[2]', ","'$arrayInformacion[3]', ","'$arrayInformacion[4]', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "matrices__guardas":

			$nombre__columnas = json_decode($nombre__columnas);
			$tipo__columna = json_decode($tipo__columna);

			$opciones__agregadas__enlzadas = json_decode($opciones__agregadas__enlzadas);
			$formulas__concatenadas = json_decode($formulas__concatenadas);

			$inserta=$objeto->getInsertaNormal('poa_paid_matriz', array("`idMatriz`, ","`idUsuario`, ","`proyectos__escogidos__activities`, ","`actividades__rubros`, ","`matriz__auxiliar`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$idUsuarioPrincipal', ","'$proyectos__escogidos__activities', ","'$actividades__rubros', ","'$matriz__auxiliar', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));

			$maximo=$objeto->getMaximoFuncion('idMatriz','poa_paid_matriz');


			for ($i=0; $i < count($tipo__columna); $i++) { 


				$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad', array("`idActividadMatriz`, ","`nombre__columnas`, ","`tipo__columna`, ","`idMatriz`, ","`fecha`, ","`hora`, ","`idUsuario`, ","`perioIngreso`"),array("'$nombre__columnas[$i]', ","'$tipo__columna[$i]', ","'$maximo', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal', ","'$aniosPeriodos__ingesos'"));

				$maximo2E=$objeto->getMaximoFuncion('idActividadMatriz','poa_paid_matriz_actividad');

				if ($tipo__columna[$i]=="selector") {
					
					for ($z=0; $z < count($opciones__agregadas__enlzadas); $z++) { 
						
						$arrayExplode=explode('___', $opciones__agregadas__enlzadas[$z]);

						if ($arrayExplode[1]==$i) {
							
							$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad_select', array("`idMatrizSelect`, ","`idActividadMatriz`, ","`opcion`, ","`fecha`, ","`hora`, ","`idUsuario`, ","`perioIngreso`"),array("'$maximo2E', ","'$arrayExplode[0]', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal', ","'$aniosPeriodos__ingesos'"));

						}

					}

				}


				if ($tipo__columna[$i]=="formula") {
					
					for ($z=0; $z < count($formulas__concatenadas); $z++) { 
						
						$arrayExplode=explode('___', $formulas__concatenadas[$z]);

						if ($arrayExplode[1]==$i) {
							
							$inserta2=$objeto->getInsertaNormal('poa_paid_matriz_actividad_formulas', array("`idMatrizFormula`, ","`idActividadMatriz`, ","`formula`, ","`fecha`, ","`hora`, ","`idUsuario`, ","`perioIngreso`"),array("'$maximo2E', ","'$formulas__concatenadas[0]', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal', ","'$aniosPeriodos__ingesos'"));

						}

					}

				}
					
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "proyecto__paid":

			$objetivo__especificos = json_decode($objetivo__especificos);
			$items__proyecto = json_decode($items__proyecto);
			$codigo__proyecto = json_decode($codigo__proyecto);
			$indicador__proyecto = json_decode($indicador__proyecto);

			$inserta=$objeto->getInsertaNormal('poa_paid_proyecto', array("`idProyectoPaid`, ","`programa__creado`, ","`proyecto__inversion`, ","`codigo__proyecto`, ","`fecha__inicioProyecto`, ","`fecha__finProyecto`, ","`area__responsable`, ","`lider__proyecto`, ","`cup__proyecto`, ","`objetivos__proyectos`, ","`general__proyecto`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`perioIngreso`"),array("'$progra__creado', ","'$proyecto__inversion', ","'$codigo__proyecto__solo', ","'$fecha__inicioProyecto', ","'$fecha__finProyecto', ","'$area__responsable', ","'$lider__proyecto', ","'$cup__proyecto', ","'$objetivos__proyectos', ","'$general__proyecto', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));

			$maximo=$objeto->getMaximoFuncion('idProyectoPaid','poa_paid_proyecto');

			$data1=array();

			array_push($data1, count($objetivo__especificos));

			array_push($data1, count($items__proyecto));
			array_push($data1, count($codigo__proyecto));
			array_push($data1, count($indicador__proyecto));


			for ($i=0; $i < max($data1); $i++) { 

				if (empty($objetivo__especificos[$i])) {
					$obEspecifico=NULL;
				}else{
					$obEspecifico=$objetivo__especificos[$i];
				}


				if (empty($items__proyecto[$i])) {
					$itemsPro=NULL;
				}else{
					$itemsPro=$items__proyecto[$i];
				}

				if (empty($codigo__proyecto[$i])) {
					$codigoProye=NULL;
				}else{
					$codigoProye=$codigo__proyecto[$i];
				}


				if (empty($indicador__proyecto[$i])) {
					$indicadorPro=NULL;
				}else{
					$indicadorPro=$indicador__proyecto[$i];
				}


				$inserta2=$objeto->getInsertaNormal('poa_paid_proyecto_enlace', array("`idElementosProyecto`, ","`objetivo__especificos`, ","`actividades__rubros`, ","`matriz__auxiliar`, ","`campo__columna`, ","`items__proyecto`, ","`codigo__proyecto`, ","`indicador__proyecto`, ","`idProyectoPaid`, ","`fecha`, ","`hora`, ","`idUsuario`, ","`perioIngreso`"),array("'$obEspecifico', ","NULL, ","NULL, ","NULL, ","'$itemsPro', ","'$codigoProye', ","'$indicadorPro', ","'$maximo', ","'$fecha_actual', ","'$hora_actual', ","'$idUsuarioPrincipal', ","'$aniosPeriodos__ingesos'"));
					
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "honorarios":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' AND perioIngreso='$aniosPeriodos__ingesos'  GROUP BY idOrganismo;");

			$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);	


			if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

				$mensaje=20;
					
			}else{

				$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='530606' AND a.idOrganismo='$idOrganismo' AND idActividad='4';");

				if (empty($honorarios[0][honorarios])) {
					
					$mensaje=105;

				}else{


						$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$mesesArray[0]);
						$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$mesesArray[1]);
						$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$mesesArray[2]);
						$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$mesesArray[3]);
						$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mesesArray[4]);
						$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$mesesArray[5]);
						$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$mesesArray[6]);
						$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$mesesArray[7]);
						$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$mesesArray[8]);
						$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$mesesArray[9]);
						$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$mesesArray[10]);
						$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$mesesArray[11]);
						$totalUnificado=floatval($mesesArray[12]) + floatval($honorarios[0][totalSumaItem]);



					$valoresHonorarios=array("enero='$sumarUniEnero', febrero='$sumarUniFebrero', marzo='$sumarUniMarzo', abril='$sumarUniAbril', mayo='$sumarUniMayo', junio='$sumarUniJunio', julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre', totalSumaItem='$totalUnificado', totalTotales='$totalUnificado'");
					$actualizaUnificados=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresHonorarios,"idProgramacionFinanciera",$honorarios[0][honorarios],"perioIngreso",$aniosPeriodos__ingesos);

		
					$inserta=$objeto->getInsertaNormal('poa_honorarios2022', array("`idHonorarios`, ","`cedula`, ","`nombres`, ","`cargo`, ","`tipoCargo`, ","`honorarioMensual`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`idActividad`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$mesesArray[0]', ", "'$mesesArray[1]', ", "'$mesesArray[2]', ", "'$mesesArray[3]', ", "'$mesesArray[4]', ", "'$mesesArray[5]', ", "'$mesesArray[6]', ", "'$mesesArray[7]', ", "'$mesesArray[8]', ", "'$mesesArray[9]', ", "'$mesesArray[10]', ", "'$mesesArray[11]', ", "'$mesesArray[12]', ", "'$idOrganismo', ", "'$fecha_actual', ", "'$idActividad', ","'$aniosPeriodos__ingesos'"));

					$mensaje=1;

				}

			}
			$jason['sumar']=$sumar;
			$jason['mensaje']=$mensaje;

		break;		

		case  "honorarios__modificaciones":

		
			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_honorarios2022` (`idHonorarios`, `cedula`, `nombres`, `cargo`, `honorarioMensual`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `tipoCargo`, `idActividad`, `modifica`, `perioIngreso`) VALUES (NULL, '$cedulaP0', '$apellidosNom0', '$cargo0', '$honorarioMensual0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', $idOrganismoSession, '$fecha_actual', '$tipoCargo0', '4', 'E', '$aniosPeriodos__ingesos');";
		 	$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	

		case  "sueldosSalarios":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$salariosUnificados=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS salariosUnificados, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510106' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS aportPatronal, a.enero AS eneroPa,a.febrero AS febreroP,a.marzo AS marzoP,a.abril AS abrilP,a.mayo AS mayoP,a.junio AS junioP,a.julio AS julioP,a.agosto AS agostoP,a.septiembre AS septiembreP,a.octubre AS octubreP,a.noviembre AS noviembreP,a.diciembre AS diciembreP,a.totalSumaItem AS totalSumaItemP,a.totalTotales AS totalTotalesP FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510601' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$fondoReserva=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS fondoReserva, a.enero AS eneroFondo,a.febrero AS febreroFondo,a.marzo AS marzoFondo,a.abril AS abrilFondo,a.mayo AS mayoFondo,a.junio AS junioFondo,a.julio AS julioFondo,a.agosto AS agostoFondo,a.septiembre AS septiembreFondo,a.octubre AS octubreFondo,a.noviembre AS noviembreFondo,a.diciembre AS diciembreFondo,a.totalSumaItem AS totalSumaItemFondo,a.totalTotales AS totalTotalesFondo FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510602' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$decimoTercera=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoTercero, a.enero AS eneroTercero,a.febrero AS febreroTercero,a.marzo AS marzoTercero,a.abril AS abrilTercero,a.mayo AS mayoTercero,a.junio AS junioTercero,a.julio AS julioTercero,a.agosto AS agostoTercero,a.septiembre AS septiembreTercero,a.octubre AS octubreTercero,a.noviembre AS noviembreTercero,a.diciembre AS diciembreTercero,a.totalSumaItem AS totalSumaItemTercero,a.totalTotales AS totalTotalesTercero FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.itemPreesupuestario='510203' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$decimoCuarta=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS decimoCuarta, a.enero AS eneroCuarta,a.febrero AS febreroCuarta,a.marzo AS marzoCuarta,a.abril AS abrilCuarta,a.mayo AS mayoCuarta,a.junio AS junioCuarta,a.julio AS julioCuarta,a.agosto AS agostoCuarta,a.septiembre AS septiembreCuarta,a.octubre AS octubreCuarta,a.noviembre AS noviembreCuarta,a.diciembre AS diciembreCuarta,a.totalSumaItem AS totalSumaItemCuarta,a.totalTotales AS totalTotalesCuarta FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE b.itemPreesupuestario='510204' AND a.idOrganismo='$idOrganismo' AND a.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$desaucioConsultas=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS desaucio, a.enero AS eneroDesaucio,a.febrero AS febreroDesaucio,a.marzo AS marzoDesaucio,a.abril AS abrilDesaucio,a.mayo AS mayoDesaucio,a.junio AS junioDesaucio,a.julio AS julioDesaucio,a.agosto AS agostoDesaucio,a.septiembre AS septiembreDesaucio,a.octubre AS octubreDesaucio,a.noviembre AS noviembreDesaucio,a.diciembre AS diciembreDesaucio,a.totalSumaItem AS totalSumaItemDesaucio,a.totalTotales AS totalTotalesDesaucio FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.idItem='49' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$despidoConsultas=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS desaucio, a.enero AS eneroDesaucio,a.febrero AS febreroDesaucio,a.marzo AS marzoDesaucio,a.abril AS abrilDesaucio,a.mayo AS mayoDesaucio,a.junio AS junioDesaucio,a.julio AS julioDesaucio,a.agosto AS agostoDesaucio,a.septiembre AS septiembreDesaucio,a.octubre AS octubreDesaucio,a.noviembre AS noviembreDesaucio,a.diciembre AS diciembreDesaucio,a.totalSumaItem AS totalSumaItemDesaucio,a.totalTotales AS totalTotalesDesaucio FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.idItem='156' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$despidoRenuncia=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS desaucio, a.enero AS eneroDesaucio,a.febrero AS febreroDesaucio,a.marzo AS marzoDesaucio,a.abril AS abrilDesaucio,a.mayo AS mayoDesaucio,a.junio AS junioDesaucio,a.julio AS julioDesaucio,a.agosto AS agostoDesaucio,a.septiembre AS septiembreDesaucio,a.octubre AS octubreDesaucio,a.noviembre AS noviembreDesaucio,a.diciembre AS diciembreDesaucio,a.totalSumaItem AS totalSumaItemDesaucio,a.totalTotales AS totalTotalesDesaucio FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.idItem='94' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$despidoCompensacion=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS desaucio, a.enero AS eneroDesaucio,a.febrero AS febreroDesaucio,a.marzo AS marzoDesaucio,a.abril AS abrilDesaucio,a.mayo AS mayoDesaucio,a.junio AS junioDesaucio,a.julio AS julioDesaucio,a.agosto AS agostoDesaucio,a.septiembre AS septiembreDesaucio,a.octubre AS octubreDesaucio,a.noviembre AS noviembreDesaucio,a.diciembre AS diciembreDesaucio,a.totalSumaItem AS totalSumaItemDesaucio,a.totalTotales AS totalTotalesDesaucio FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem  WHERE b.idItem='50' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos';");
			
			if (floatval($totalVacacionesNoG)>0 && empty($despidoCompensacion[0][desaucio])) {

				$mensaje=53;

			}else if (floatval($totalRenunciaVoluntaria)>0 && empty($despidoRenuncia[0][desaucio])) {

				$mensaje=52;

			}else if (floatval($totalDespidoIntepes)>0 && empty($despidoConsultas[0][desaucio])) {

				$mensaje=51;

			}else if (floatval($totalDesaucio)>0 && empty($desaucioConsultas[0][desaucio])) {

				$mensaje=50;

			}else if (empty($salariosUnificados[0][salariosUnificados]) || empty($aportePatronal[0][aportPatronal]) || empty($fondoReserva[0][fondoReserva]) || empty($decimoTercera[0][decimoTercero]) || empty($decimoCuarta[0][decimoCuarta])) {
				
				$mensaje=25;

			}else{

				/*===========================================
				=       Sumadores Salarios Unificados   =
				===========================================*/
				
				$sumarUniEnero=$objeto->mesesSumarS($salariosUnificados[0][enero],$valoresArray[5]);
				$sumarUniFebrero=$objeto->mesesSumarS($salariosUnificados[0][febrero],$valoresArray[5]);
				$sumarUniMarzo=$objeto->mesesSumarS($salariosUnificados[0][marzo],$valoresArray[5]);
				$sumarUniAbril=$objeto->mesesSumarS($salariosUnificados[0][abril],$valoresArray[5]);
				$sumarUniMayo=$objeto->mesesSumarS($salariosUnificados[0][mayo],$valoresArray[5]);
				$sumarUniJunio=$objeto->mesesSumarS($salariosUnificados[0][junio],$valoresArray[5]);
				$sumarUniJulio=$objeto->mesesSumarS($salariosUnificados[0][julio],$valoresArray[5]);
				$sumarUniAgosto=$objeto->mesesSumarS($salariosUnificados[0][agosto],$valoresArray[5]);
				$sumarUniSeptiembre=$objeto->mesesSumarS($salariosUnificados[0][septiembre],$valoresArray[5]);
				$sumarUniOctubre=$objeto->mesesSumarS($salariosUnificados[0][octubre],$valoresArray[5]);
				$sumarUniNoviembre=$objeto->mesesSumarS($salariosUnificados[0][noviembre],$valoresArray[5]);
				$sumarUniDiciembre=$objeto->mesesSumarS($salariosUnificados[0][diciembre],$valoresArray[5]);
				$totalUnificado=floatval($valoresArray[5] *12) + floatval($salariosUnificados[0][totalSumaItem]);

				/*=====  End of Sumadores Salarios Unificados ======*/

				/*=======================================
				=            Aporte patronal            =
				=======================================*/
				
				$sumarPatronal=$objeto->mesesSumarS($aportePatronal[0][eneroPa],$valoresArray[6]);
				$totalPatronal=$sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal + $sumarPatronal +  $aportePatronal[0][totalSumaItemP];			
				
				/*=====  End of Aporte patronal  ======*/
				

				/*========================================
				=            Fondo de reserva            =
				========================================*/
				
				$sumarReserva=$objeto->mesesSumarS($fondoReserva[0][eneroFondo],$valoresArray[11]);
				$totalReserva=$sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $sumarReserva + $fondoReserva[0][totalSumaItemFondo];		
				
				/*=====  End of Fondo de reserva  ======*/
				

				$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

				$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);	


				if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

					$mensaje=20;
					$jason['sumar']=$sumar;
					
				}else{

					$regimen=$objeto->getObtenerInformacionGeneral("SELECT regimen FROM poa_organismo WHERE idOrganismo='$idOrganismo';");


					$valoresUnificados=array("enero='$sumarUniEnero', febrero='$sumarUniFebrero', marzo='$sumarUniMarzo', abril='$sumarUniAbril', mayo='$sumarUniMayo', junio='$sumarUniJunio', julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre', totalSumaItem='$totalUnificado', totalTotales='$totalUnificado'");


					$actualizaUnificados=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresUnificados,"idProgramacionFinanciera",$salariosUnificados[0][salariosUnificados],"perioIngreso",$aniosPeriodos__ingesos);

					$aportePatronalDef=0;

					$aportePatronalDef=floatval($sumarPatronal) * 12;

					$valoresPatronal=array("enero='$sumarPatronal', febrero='$sumarPatronal', marzo='$sumarPatronal', abril='$sumarPatronal', mayo='$sumarPatronal', junio='$sumarPatronal', julio='$sumarPatronal',agosto='$sumarPatronal',septiembre='$sumarPatronal',octubre='$sumarPatronal',noviembre='$sumarPatronal',diciembre='$sumarPatronal', totalSumaItem='$aportePatronalDef', totalTotales='$aportePatronalDef'");
					$actualizaPatronal=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresPatronal,"idProgramacionFinanciera",$aportePatronal[0][aportPatronal],"perioIngreso",$aniosPeriodos__ingesos);

					$sumaReservasF=0;
				
					$sumaReservasF=floatval($sumarReserva) * 12;

					$valoresFondoR=array("enero='$sumarReserva', febrero='$sumarReserva', marzo='$sumarReserva', abril='$sumarReserva', mayo='$sumarReserva', junio='$sumarReserva', julio='$sumarReserva',agosto='$sumarReserva',septiembre='$sumarReserva',octubre='$sumarReserva',noviembre='$sumarReserva',diciembre='$sumarReserva', totalSumaItem='$sumaReservasF', totalTotales='$sumaReservasF'");
					$actualizaFondoR=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresFondoR,"idProgramacionFinanciera",$fondoReserva[0][fondoReserva],"perioIngreso",$aniosPeriodos__ingesos);

					$regimenInstanciado=$regimen[0][regimen];

					if ($valoresArray[10]=="no") {


						if ($regimenInstanciado=="Costa") {

							$resultantesCuartos=floatval($decimoCuarta[0][marzoCuarta]) + floatval($valoresArray[9]);

							$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);

							$valoresCuarta=array("marzo='$resultantesCuartos', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
							$actualizaCuarta=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta],"perioIngreso",$aniosPeriodos__ingesos);



						}else{

							$resultantesCuartos=floatval($decimoCuarta[0][agostoCuarta]) + floatval($valoresArray[9]);

							$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);

							$valoresCuarta=array("agosto='$resultantesCuartos', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
							$actualizaCuarta=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta],"perioIngreso",$aniosPeriodos__ingesos);


						}


					}else{

						$obtenerDecimoCuarto=floatval(425.00) / 12;

						$sumarUniEneroCuarto=$objeto->mesesSumarS($decimoCuarta[0][eneroCuarta],$obtenerDecimoCuarto);
						$sumarUniFebreroCuarto=$objeto->mesesSumarS($decimoCuarta[0][febreroCuarta],$obtenerDecimoCuarto);
						$sumarUniMarzoCuarto=$objeto->mesesSumarS($decimoCuarta[0][marzoCuarta],$obtenerDecimoCuarto);
						$sumarUniAbrilCuarto=$objeto->mesesSumarS($decimoCuarta[0][abrilCuarta],$obtenerDecimoCuarto);
						$sumarUniMayoCuarto=$objeto->mesesSumarS($decimoCuarta[0][mayoCuarta],$obtenerDecimoCuarto);
						$sumarUniJunioCuarto=$objeto->mesesSumarS($decimoCuarta[0][junioCuarta],$obtenerDecimoCuarto);
						$sumarUniJulioCuarto=$objeto->mesesSumarS($decimoCuarta[0][julioCuarta],$obtenerDecimoCuarto);
						$sumarUniAgostoCuarto=$objeto->mesesSumarS($decimoCuarta[0][agostoCuarta],$obtenerDecimoCuarto);
						$sumarUniSeptiembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][septiembreCuarta],$obtenerDecimoCuarto);
						$sumarUniOctubreCuarto=$objeto->mesesSumarS($decimoCuarta[0][octubreCuarta],$obtenerDecimoCuarto);
						$sumarUniNoviembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][noviembreCuarta],$obtenerDecimoCuarto);
						$sumarUniDiciembreCuarto=$objeto->mesesSumarS($decimoCuarta[0][diciembreCuarta],$obtenerDecimoCuarto);

						$totalDecimoCuarto= floatval($decimoCuarta[0][totalSumaItemCuarta]) + ($valoresArray[9]);


						$valoresCuarta=array("enero='$sumarUniEneroCuarto', febrero='$sumarUniFebreroCuarto', marzo='$sumarUniMarzoCuarto', abril='$sumarUniAbrilCuarto', mayo='$sumarUniMayoCuarto', junio='$sumarUniJunioCuarto', julio='$sumarUniJulioCuarto',agosto='$sumarUniAgostoCuarto',septiembre='$sumarUniSeptiembreCuarto',octubre='$sumarUniOctubreCuarto',noviembre='$sumarUniNoviembreCuarto',diciembre='$sumarUniDiciembreCuarto', totalSumaItem='$totalDecimoCuarto', totalTotales='$totalDecimoCuarto'");
						$actualizaCuarta=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresCuarta,"idProgramacionFinanciera",$decimoCuarta[0][decimoCuarta],"perioIngreso",$aniosPeriodos__ingesos);


					}


					if ($valoresArray[8]=="no") {


						$totalDecimoTercero=$decimoTercera[0][totalSumaItemTercero] + $valoresArray[7];

						$resultantesTerceros=floatval($decimoTercera[0][diciembreTercero]) + floatval($valoresArray[7]);

						$valoresTercero=array("diciembre='$resultantesTerceros', totalSumaItem='$totalDecimoTercero', totalTotales='$totalDecimoTercero'");
						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresTercero,"idProgramacionFinanciera",$decimoTercera[0][decimoTercero],"perioIngreso",$aniosPeriodos__ingesos);


					}else{

						$obtenerDecimoTercero=floatval($valoresArray[7]) / 12;


						$sumarUniEneroTercero=$objeto->mesesSumarS($decimoTercera[0][eneroTercero],$obtenerDecimoTercero);
						$sumarUniFebreroTercero=$objeto->mesesSumarS($decimoTercera[0][febreroTercero],$obtenerDecimoTercero);
						$sumarUniMarzoTercero=$objeto->mesesSumarS($decimoTercera[0][marzoTercero],$obtenerDecimoTercero);
						$sumarUniAbrilTercero=$objeto->mesesSumarS($decimoTercera[0][abrilTercero],$obtenerDecimoTercero);
						$sumarUniMayoTercero=$objeto->mesesSumarS($decimoTercera[0][mayoTercero],$obtenerDecimoTercero);
						$sumarUniJunioTercero=$objeto->mesesSumarS($decimoTercera[0][junioTercero],$obtenerDecimoTercero);
						$sumarUniJulioTercero=$objeto->mesesSumarS($decimoTercera[0][julioTercero],$obtenerDecimoTercero);
						$sumarUniAgostoTercero=$objeto->mesesSumarS($decimoTercera[0][agostoTercero],$obtenerDecimoTercero);
						$sumarUniSeptiembreTercero=$objeto->mesesSumarS($decimoTercera[0][septiembreTercero],$obtenerDecimoTercero);
						$sumarUniOctubreTercero=$objeto->mesesSumarS($decimoTercera[0][octubreTercero],$obtenerDecimoTercero);
						$sumarUniNoviembreTercero=$objeto->mesesSumarS($decimoTercera[0][noviembreTercero],$obtenerDecimoTercero);
						$sumarUniDiciembreTercero=$objeto->mesesSumarS($decimoTercera[0][diciembreTercero],$obtenerDecimoTercero);

						$totalDecimoTercero=$decimoTercera[0][totalSumaItemTercero] + $valoresArray[7];

						$valoresTercero=array("enero='$sumarUniEneroTercero', febrero='$sumarUniFebreroTercero', marzo='$sumarUniMarzoTercero', abril='$sumarUniAbrilTercero', mayo='$sumarUniMayoTercero', junio='$sumarUniJunioTercero', julio='$sumarUniJulioTercero',agosto='$sumarUniAgostoTercero',septiembre='$sumarUniSeptiembreTercero',octubre='$sumarUniOctubreTercero',noviembre='$sumarUniNoviembreTercero',diciembre='$sumarUniDiciembreTercero', totalSumaItem='$totalDecimoTercero', totalTotales='$totalDecimoTercero'");
						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresTercero,"idProgramacionFinanciera",$decimoTercera[0][decimoTercero],"perioIngreso",$aniosPeriodos__ingesos);


					}
					


					$inserta=$objeto->getInsertaNormal('poa_sueldossalarios2022', array("`idSueldos`, ","`cedula`, ","`nombres`, ","`cargo`, ","`tipoCargo`, ","`tiempoTrabajo`, ","`sueldoSalario`, ","`aportePatronal`, ","`decimoTercera`, ","`mensualizaTercera`, ","`decimoCuarta`, ","`menusalizaCuarta`, ","`fondosReserva`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`, ","`idOrganismo`, ","`fecha`, ","`idActividad`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$valoresArray[5]', ", "'$valoresArray[6]', ", "'$valoresArray[7]', ", "'$valoresArray[8]', ", "'$valoresArray[9]', ", "'$valoresArray[10]', ", "'$valoresArray[11]', ", "'$mesesArray[0]', ", "'$mesesArray[1]', ", "'$mesesArray[2]', ", "'$mesesArray[3]', ", "'$mesesArray[4]', ", "'$mesesArray[5]', ", "'$mesesArray[6]', ", "'$mesesArray[7]', ", "'$mesesArray[8]', ", "'$mesesArray[9]', ", "'$mesesArray[10]', ", "'$mesesArray[11]', ", "'$mesesArray[12]', ", "'$idOrganismo', ", "'$fecha_actual', ", "'$idActividad', ","'$aniosPeriodos__ingesos'"));

					$maximosSalarios=$objeto->getObtenerInformacionGeneral("SELECT MAX(idSueldos) AS maximoSueldosSalarios FROM poa_sueldossalarios2022;");

					$maxTo=$maximosSalarios[0][maximoSueldosSalarios];

					if (floatval($totalDesaucio)>0) {

			
						$sumarDesaucioEnero=$objeto->mesesSumarS($desaucioConsultas[0][eneroDesaucio],$eneroDesaucio);
						$sumarDesaucioFebrero=$objeto->mesesSumarS($desaucioConsultas[0][febreroDesaucio],$febreroDesaucio);
						$sumarDesaucioMarzo=$objeto->mesesSumarS($desaucioConsultas[0][marzoDesaucio],$marzoDesaucio);
						$sumarDesaucioAbril=$objeto->mesesSumarS($desaucioConsultas[0][abrilDesaucio],$abrilDesaucio);
						$sumarDesaucioMayo=$objeto->mesesSumarS($desaucioConsultas[0][mayoDesaucio],$mayoDesaucio);
						$sumarDesaucioJunio=$objeto->mesesSumarS($desaucioConsultas[0][junioDesaucio],$junioDesaucio);
						$sumarDesaucioJulio=$objeto->mesesSumarS($desaucioConsultas[0][julioDesaucio],$julioDesaucio);
						$sumarDesaucioAgosto=$objeto->mesesSumarS($desaucioConsultas[0][agostoDesaucio],$agostoDesaucio);
						$sumarDesaucioSeptiembre=$objeto->mesesSumarS($desaucioConsultas[0][septiembreDesaucio],$septiembreDesaucio);
						$sumarDesaucioOctubre=$objeto->mesesSumarS($desaucioConsultas[0][octubreDesaucio],$octubreDesaucio);
						$sumarDesaucioNoviembre=$objeto->mesesSumarS($desaucioConsultas[0][noviembreDesaucio],$noviembreDesaucio);
						$sumarDesaucioDiciembre=$objeto->mesesSumarS($desaucioConsultas[0][diciembreDesaucio],$diciembreDesaucio);

						$sumarTotalDesucio=$objeto->mesesSumarS($desaucioConsultas[0][totalTotalesDesaucio],$totalDesaucio);

						$valoresDesaucio=array("enero='$sumarDesaucioEnero', febrero='$sumarDesaucioFebrero', marzo='$sumarDesaucioMarzo', abril='$sumarDesaucioAbril', mayo='$sumarDesaucioMayo', junio='$sumarDesaucioJunio', julio='$sumarDesaucioJulio',agosto='$sumarDesaucioAgosto',septiembre='$sumarDesaucioSeptiembre',octubre='$sumarDesaucioOctubre',noviembre='$sumarDesaucioNoviembre',diciembre='$sumarDesaucioDiciembre', totalSumaItem='$sumarTotalDesucio', totalTotales='$sumarTotalDesucio'");

						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresDesaucio,"idProgramacionFinanciera",$desaucioConsultas[0][desaucio],"perioIngreso",$aniosPeriodos__ingesos);			

						$inserta=$objeto->getInsertaNormal('poa_desvinculacion', array("`idDesvinculacion`, ","`idSueldos`, ","`idOrganismo`, ","`opcion`, ","`enero`, ","`febreo`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`estado`, ","`perioIngreso`"),array("'$maxTo', ","'$idOrganismo', ","'desahucio', ","'$eneroDesaucio', ","'$febreroDesaucio', ", "'$marzoDesaucio', ", "'$abrilDesaucio', ", "'$mayoDesaucio', ", "'$junioDesaucio', ", "'$julioDesaucio', ", "'$agostoDesaucio', ", "'$septiembreDesaucio', ", "'$octubreDesaucio', ", "'$noviembreDesaucio', ", "'$diciembreDesaucio', ", "'1', ","'$aniosPeriodos__ingesos'"));



					}



					if (floatval($totalDespidoIntepes)>0) {

			
						$sumarDespidoIEnero=$objeto->mesesSumarS($despidoConsultas[0][eneroDespidoI],$eneroDespidoI);
						$sumarDespidoIFebrero=$objeto->mesesSumarS($despidoConsultas[0][febreroDespidoI],$febreroDespidoI);
						$sumarDespidoIMarzo=$objeto->mesesSumarS($despidoConsultas[0][marzoDespidoI],$marzoDespidoI);
						$sumarDespidoIAbril=$objeto->mesesSumarS($despidoConsultas[0][abrilDespidoI],$abrilDespidoI);
						$sumarDespidoIMayo=$objeto->mesesSumarS($despidoConsultas[0][mayoDespidoI],$mayoDespidoI);
						$sumarDespidoIJunio=$objeto->mesesSumarS($despidoConsultas[0][junioDespidoI],$junioDespidoI);
						$sumarDespidoIJulio=$objeto->mesesSumarS($despidoConsultas[0][julioDespidoI],$julioDespidoI);
						$sumarDespidoIAgosto=$objeto->mesesSumarS($despidoConsultas[0][agostoDespidoI],$agostoDespidoI);
						$sumarDespidoISeptiembre=$objeto->mesesSumarS($despidoConsultas[0][septiembreDespidoI],$septiembreDespidoI);
						$sumarDespidoIOctubre=$objeto->mesesSumarS($despidoConsultas[0][octubreDespidoI],$octubreDespidoI);
						$sumarDespidoINoviembre=$objeto->mesesSumarS($despidoConsultas[0][noviembreDespidoI],$noviembreDespidoI);
						$sumarDespidoIDiciembre=$objeto->mesesSumarS($despidoConsultas[0][diciembreDespidoI],$diciembreDespidoI);

						$sumarTotalDesucio=$objeto->mesesSumarS($despidoConsultas[0][totalTotalesDespidoI],$totalDespidoIntepes);

						$valoresDespidoI=array("enero='$sumarDespidoIEnero', febrero='$sumarDespidoIFebrero', marzo='$sumarDespidoIMarzo', abril='$sumarDespidoIAbril', mayo='$sumarDespidoIMayo', junio='$sumarDespidoIJunio', julio='$sumarDespidoIJulio',agosto='$sumarDespidoIAgosto',septiembre='$sumarDespidoISeptiembre',octubre='$sumarDespidoIOctubre',noviembre='$sumarDespidoINoviembre',diciembre='$sumarDespidoIDiciembre', totalSumaItem='$sumarTotalDesucio', totalTotales='$sumarTotalDesucio'");

						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresDespidoI,"idProgramacionFinanciera",$despidoConsultas[0][desaucio],"perioIngreso",$aniosPeriodos__ingesos);			

						$inserta=$objeto->getInsertaNormal('poa_desvinculacion', array("`idDesvinculacion`, ","`idSueldos`, ","`idOrganismo`, ","`opcion`, ","`enero`, ","`febreo`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`estado`, ","`perioIngreso`"),array("'$maxTo', ","'$idOrganismo', ","'despido', ","'$eneroDespidoI', ","'$febreroDespidoI', ", "'$marzoDespidoI', ", "'$abrilDespidoI', ", "'$mayoDespidoI', ", "'$junioDespidoI', ", "'$julioDespidoI', ", "'$agostoDespidoI', ", "'$septiembreDespidoI', ", "'$octubreDespidoI', ", "'$noviembreDespidoI', ", "'$diciembreDespidoI', ", "'1', ","'$aniosPeriodos__ingesos'"));



					}


					if (floatval($totalRenunciaVoluntaria)>0) {

			
						$sumarRenunciaVEnero=$objeto->mesesSumarS($despidoRenuncia[0][eneroRenunciaV],$eneroRenunciaV);
						$sumarRenunciaVFebrero=$objeto->mesesSumarS($despidoRenuncia[0][febreroRenunciaV],$febreroRenunciaV);
						$sumarRenunciaVMarzo=$objeto->mesesSumarS($despidoRenuncia[0][marzoRenunciaV],$marzoRenunciaV);
						$sumarRenunciaVAbril=$objeto->mesesSumarS($despidoRenuncia[0][abrilRenunciaV],$abrilRenunciaV);
						$sumarRenunciaVMayo=$objeto->mesesSumarS($despidoRenuncia[0][mayoRenunciaV],$mayoRenunciaV);
						$sumarRenunciaVJunio=$objeto->mesesSumarS($despidoRenuncia[0][junioRenunciaV],$junioRenunciaV);
						$sumarRenunciaVJulio=$objeto->mesesSumarS($despidoRenuncia[0][julioRenunciaV],$julioRenunciaV);
						$sumarRenunciaVAgosto=$objeto->mesesSumarS($despidoRenuncia[0][agostoRenunciaV],$agostoRenunciaV);
						$sumarRenunciaVSeptiembre=$objeto->mesesSumarS($despidoRenuncia[0][septiembreRenunciaV],$septiembreRenunciaV);
						$sumarRenunciaVOctubre=$objeto->mesesSumarS($despidoRenuncia[0][octubreRenunciaV],$octubreRenunciaV);
						$sumarRenunciaVNoviembre=$objeto->mesesSumarS($despidoRenuncia[0][noviembreRenunciaV],$noviembreRenunciaV);
						$sumarRenunciaVDiciembre=$objeto->mesesSumarS($despidoRenuncia[0][diciembreRenunciaV],$diciembreRenunciaV);

						$sumarTotalDesucio=$objeto->mesesSumarS($despidoRenuncia[0][totalTotalesRenunciaV],$totalRenunciaVoluntaria);

						$valoresRenunciaV=array("enero='$sumarRenunciaVEnero', febrero='$sumarRenunciaVFebrero', marzo='$sumarRenunciaVMarzo', abril='$sumarRenunciaVAbril', mayo='$sumarRenunciaVMayo', junio='$sumarRenunciaVJunio', julio='$sumarRenunciaVJulio',agosto='$sumarRenunciaVAgosto',septiembre='$sumarRenunciaVSeptiembre',octubre='$sumarRenunciaVOctubre',noviembre='$sumarRenunciaVNoviembre',diciembre='$sumarRenunciaVDiciembre', totalSumaItem='$sumarTotalDesucio', totalTotales='$sumarTotalDesucio'");

						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresRenunciaV,"idProgramacionFinanciera",$despidoRenuncia[0][desaucio],"perioIngreso",$aniosPeriodos__ingesos);			

						$inserta=$objeto->getInsertaNormal('poa_desvinculacion', array("`idDesvinculacion`, ","`idSueldos`, ","`idOrganismo`, ","`opcion`, ","`enero`, ","`febreo`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`estado`, ","`perioIngreso`"),array("'$maxTo', ","'$idOrganismo', ","'renuncia', ","'$eneroRenunciaV', ","'$febreroRenunciaV', ", "'$marzoRenunciaV', ", "'$abrilRenunciaV', ", "'$mayoRenunciaV', ", "'$junioRenunciaV', ", "'$julioRenunciaV', ", "'$agostoRenunciaV', ", "'$septiembreRenunciaV', ", "'$octubreRenunciaV', ", "'$noviembreRenunciaV', ", "'$diciembreRenunciaV', ", "'1', ","'$aniosPeriodos__ingesos'"));



					}


					if (floatval($totalVacacionesNoG)>0) {

			
						$sumarRenunciaVEnero=$objeto->mesesSumarS($despidoCompensacion[0][eneroRenunciaV],$eneroRenunciaV);
						$sumarRenunciaVFebrero=$objeto->mesesSumarS($despidoCompensacion[0][febreroRenunciaV],$febreroRenunciaV);
						$sumarRenunciaVMarzo=$objeto->mesesSumarS($despidoCompensacion[0][marzoRenunciaV],$marzoRenunciaV);
						$sumarRenunciaVAbril=$objeto->mesesSumarS($despidoCompensacion[0][abrilRenunciaV],$abrilRenunciaV);
						$sumarRenunciaVMayo=$objeto->mesesSumarS($despidoCompensacion[0][mayoRenunciaV],$mayoRenunciaV);
						$sumarRenunciaVJunio=$objeto->mesesSumarS($despidoCompensacion[0][junioRenunciaV],$junioRenunciaV);
						$sumarRenunciaVJulio=$objeto->mesesSumarS($despidoCompensacion[0][julioRenunciaV],$julioRenunciaV);
						$sumarRenunciaVAgosto=$objeto->mesesSumarS($despidoCompensacion[0][agostoRenunciaV],$agostoRenunciaV);
						$sumarRenunciaVSeptiembre=$objeto->mesesSumarS($despidoCompensacion[0][septiembreRenunciaV],$septiembreRenunciaV);
						$sumarRenunciaVOctubre=$objeto->mesesSumarS($despidoCompensacion[0][octubreRenunciaV],$octubreRenunciaV);
						$sumarRenunciaVNoviembre=$objeto->mesesSumarS($despidoCompensacion[0][noviembreRenunciaV],$noviembreRenunciaV);
						$sumarRenunciaVDiciembre=$objeto->mesesSumarS($despidoCompensacion[0][diciembreRenunciaV],$diciembreRenunciaV);

						$sumarTotalDesucio=$objeto->mesesSumarS($despidoCompensacion[0][totalTotalesRenunciaV],$totalVacacionesNoG);

						$valoresRenunciaV=array("enero='$sumarRenunciaVEnero', febrero='$sumarRenunciaVFebrero', marzo='$sumarRenunciaVMarzo', abril='$sumarRenunciaVAbril', mayo='$sumarRenunciaVMayo', junio='$sumarRenunciaVJunio', julio='$sumarRenunciaVJulio',agosto='$sumarRenunciaVAgosto',septiembre='$sumarRenunciaVSeptiembre',octubre='$sumarRenunciaVOctubre',noviembre='$sumarRenunciaVNoviembre',diciembre='$sumarRenunciaVDiciembre', totalSumaItem='$sumarTotalDesucio', totalTotales='$sumarTotalDesucio'");

						$actualizaTercero=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valoresRenunciaV,"idProgramacionFinanciera",$despidoCompensacion[0][desaucio],"perioIngreso",$aniosPeriodos__ingesos);			

						$inserta=$objeto->getInsertaNormal('poa_desvinculacion', array("`idDesvinculacion`, ","`idSueldos`, ","`idOrganismo`, ","`opcion`, ","`enero`, ","`febreo`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`estado`, ","`perioIngreso`"),array("'$maxTo', ","'$idOrganismo', ","'compensación', ","'$eneroRenunciaV', ","'$febreroRenunciaV', ", "'$marzoRenunciaV', ", "'$abrilRenunciaV', ", "'$mayoRenunciaV', ", "'$junioRenunciaV', ", "'$julioRenunciaV', ", "'$agostoRenunciaV', ", "'$septiembreRenunciaV', ", "'$octubreRenunciaV', ", "'$noviembreRenunciaV', ", "'$diciembreRenunciaV', ", "'1', ","'$aniosPeriodos__ingesos'"));



					}



					$mensaje=1;

					

					$jason['sumar']=$sumar;

				}


			}

			
			$jason['mensaje']=$mensaje;

		break;		


		case  "sueldosSalarios__modificaciones__modifica":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_sueldossalarios2022` (`idSueldos`, `cedula`, `nombres`, `cargo`, `tipoCargo`, `tiempoTrabajo`, `sueldoSalario`, `aportePatronal`, `decimoTercera`, `mensualizaTercera`, `decimoCuarta`, `menusalizaCuarta`, `fondosReserva`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `idActividad`, `modifica`, `perioIngreso`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '$cedulaP0', '$apellidosNom0', '$cargo0', '$tipoCargo0', '$tiempoMeses0', '$salariosMensualess0', '$aportePatronalMensualess0', '$decimoTercerMensualess0', '$mensualizaTercera0', '$decimoCuartoMensualess0', '$mensualizaCuarta0', '$fondosDeReservaMensualess0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', $idOrganismoSession, '$fecha_actual', 4, NULL, $aniosPeriodos__ingesos, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
		 	$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "regimen":

			$valores=array("regimen='$idValor'");
			$actualiza=$objeto->getActualiza("poa_organismo",$valores,"idOrganismo",$idOrganismo);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "suministrosAE":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);
			$suministrosArray = json_decode($suministrosArray);
			$valoresSArray = json_decode($valoresSArray);

			$inserta=$objeto->getInsertaNormal('poa_suministrosn', array("`idSumi`, ","`tipo`, ","`nombreEscenario`, ","`idOrganismo`, ","`fecha`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$idOrganismo', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$maximo=$objeto->getMaximoFuncion('idSumi','poa_suministrosn');

				for ($i=0; $i < count($suministrosArray); $i++) { 

					if ($suministrosArray[$i]=="energia") {

						$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`, ","`perioIngreso`"),array("'$valoresSArray[$i]', ","'N/A', ","'$maximo', ","'$aniosPeriodos__ingesos'"));

					}else{

						$inserta=$objeto->getInsertaNormal('poa_suministros', array("`idSuministros`, ","`luz`, ","`agua`, ","`idSumiN`, ","`perioIngreso`"),array("'N/A', ","'$valoresSArray[$i]', ","'$maximo', ","'$aniosPeriodos__ingesos'"));

					}
					
				}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "finalizar__mantenimientos__elegidos":

			$obtenerInformacion__mantenimientos=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento,a.idProgramacionFinanciera,a.nombreInfras,b.nombreProvincia,a.direccionCompleta,a.estado,a.tipoRecursos,a.tipoIntervencion,a.detallarTipoIn,a.tipoMantenimiento,a.materialesServicios,a.fechaUltimo,a.provincia FROM poa_mantenimiento AS a INNER JOIN in_md_provincias AS b ON a.provincia=b.idProvincia WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.idProgramacionFinanciera='0';");	

			$elimina=$objeto->getElimina('poa_mantenimiento','idMantenimiento',$obtenerInformacion__mantenimientos[0][idMantenimiento]);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "insertar__mantenimiento__unitarios":

				$obtenerInformacion__mantenimientos=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento,a.idProgramacionFinanciera,a.nombreInfras,b.nombreProvincia,a.direccionCompleta,a.estado,a.tipoRecursos,a.tipoIntervencion,a.detallarTipoIn,a.tipoMantenimiento,a.materialesServicios,a.fechaUltimo,a.provincia FROM poa_mantenimiento AS a INNER JOIN in_md_provincias AS b ON a.provincia=b.idProvincia WHERE a.idOrganismo='$idOrganismoPrincipal' AND a.idProgramacionFinanciera='0';");	

				$nombreInfras=$obtenerInformacion__mantenimientos[0][nombreInfras];
				$provincia=$obtenerInformacion__mantenimientos[0][provincia];
				$direccionCompleta=$obtenerInformacion__mantenimientos[0][direccionCompleta];
				$estado=$obtenerInformacion__mantenimientos[0][estado];
				$tipoRecursos=$obtenerInformacion__mantenimientos[0][tipoRecursos];
				$tipoIntervencion=$obtenerInformacion__mantenimientos[0][tipoIntervencion];
				$detallarTipoIn=$obtenerInformacion__mantenimientos[0][detallarTipoIn];
				$tipoMantenimiento=$obtenerInformacion__mantenimientos[0][tipoMantenimiento];
				$materialesServicios=$obtenerInformacion__mantenimientos[0][materialesServicios];
				$fechaUltimo=$obtenerInformacion__mantenimientos[0][fechaUltimo];


				$programadorFinancieros=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalTotales FROM poa_programacion_financiera WHERE idItem='$item' AND idActividad='2' AND idOrganismo='$idOrganismoPrincipal' AND perioIngreso='$aniosPeriodos__ingesos';");

				$enero_s=floatval($programadorFinancieros[0][enero]) + floatval($enero);
				$febrero_s=floatval($programadorFinancieros[0][febrero]) + floatval($febrero);
				$marzo_s=floatval($programadorFinancieros[0][marzo]) + floatval($marzo);
				$abril_s=floatval($programadorFinancieros[0][abril]) + floatval($abril);
				$mayo_s=floatval($programadorFinancieros[0][mayo]) + floatval($mayo);
				$junio_s=floatval($programadorFinancieros[0][junio]) + floatval($junio);
				$julio_s=floatval($programadorFinancieros[0][julio]) + floatval($julio);
				$agosto_s=floatval($programadorFinancieros[0][agosto]) + floatval($agosto);
				$septiembre_s=floatval($programadorFinancieros[0][septiembre]) + floatval($septiembre);
				$octubre_s=floatval($programadorFinancieros[0][octubre]) + floatval($octubre);
				$noviembre_s=floatval($programadorFinancieros[0][noviembre]) + floatval($noviembre);
				$diciembre_s=floatval($programadorFinancieros[0][diciembre]) + floatval($diciembre);

				$total__f=floatval($enero_s) + floatval($febrero_s) + floatval($marzo_s) + floatval($abril_s) + floatval($mayo_s) + floatval($junio_s) + floatval($julio_s) + floatval($agosto_s) + floatval($septiembre_s) + floatval($octubre_s) + floatval($noviembre_s) + floatval($diciembre_s);


				$valores=array("enero='$enero_s',febrero='$febrero_s',marzo='$marzo_s',abril='$abril_s',mayo='$mayo_s',junio='$junio_s',julio='$julio_s',agosto='$agosto_s',septiembre='$septiembre_s',octubre='$octubre_s',noviembre='$noviembre_s',diciembre='$diciembre_s',totalSumaItem='$total__f',totalTotales='$total__f'");
				$actualiza2=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$programadorFinancieros[0][idProgramacionFinanciera],"perioIngreso",$aniosPeriodos__ingesos);

				$idPro__mantenimientos=$programadorFinancieros[0][idProgramacionFinanciera];


				$conexionRecuperada= new conexion();
		 		$conexionEstablecida=$conexionRecuperada->cConexion();	


				$inserta=$objeto->getInsertaNormal('poa_mantenimiento', array("`idMantenimiento`, ","`nombreInfras`, ","`provincia`, ","`direccionCompleta`, ","`estado`, ","`tipoRecursos`, ","`tipoIntervencion`, ","`detallarTipoIn`, ","`tipoMantenimiento`, ","`materialesServicios`, ","`fechaUltimo`, ","`idProgramacionFinanciera`, ","`fecha`, ","`perioIngreso`, ","`idOrganismo`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`total`"),array("'$nombreInfras', ","'$provincia', ","'$direccionCompleta', ","'$estado', ", "'$tipoRecursos', ", "'$tipoIntervencion', ", "'$detallarTipoIn', ", "'$tipoMantenimiento', ", "'$materialesServicios', ", "'$fechaUltimo', ","'$idPro__mantenimientos', ","'$fecha_actual', ","'$aniosPeriodos__ingesos', ","'$idOrganismoPrincipal', ","$enero, ","$febrero, ","$marzo, ","$abril, ","$mayo, ","$junio, ","$julio, ","$agosto, ","$septiembre, ","$octubre, ","$noviembre, ","$diciembre, ","$totalSumaItem"));


				$mensaje=1;
				$jason['mensaje']=$mensaje;

		break;


		case  "mantenimientoAc":

			$inserta=$objeto->getInsertaNormal('poa_mantenimiento', array("`idMantenimiento`, ","`nombreInfras`, ","`provincia`, ","`direccionCompleta`, ","`estado`, ","`tipoRecursos`, ","`tipoIntervencion`, ","`detallarTipoIn`, ","`tipoMantenimiento`, ","`materialesServicios`, ","`fechaUltimo`, ","`idProgramacionFinanciera`, ","`fecha`, ","`perioIngreso`, ","`idOrganismo`"),array("'$nombreEscenario', ","'$provinciaE', ","'$direccionCompleta', ","'$estadoM', ", "'$tipoRecuersos', ", "'$tipoInversion', ", "'$tipoIntervencion', ", "'$tipoMantenimiento', ", "'$materialesServicios', ", "'$fecha__ultimo', ","'0', ","'$fecha_actual', ","'$aniosPeriodos__ingesos', ","'$idOrganismo'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "editar__eventos__inicial__tables__dos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$query="UPDATE poa_actdeportivas AS a LEFT JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.enero='$enero',a.febrero='$febrero', a.marzo='$marzo',a.abril='$abril',a.mayo='$mayo',a.junio='$junio',a.julio='$julio',a.agosto='$agosto',a.septiembre='$septiembre',a.octubre='$octubre',a.noviembre='$noviembre',a.diciembre='$diciembre',a.totalElem='$totalSumatoriasMontos__dos',b.enero='$enero',b.febrero='$febrero', b.marzo='$marzo',b.abril='$abril',b.mayo='$mayo',b.junio='$junio',b.julio='$julio',b.agosto='$agosto',b.septiembre='$septiembre',b.octubre='$octubre',b.noviembre='$noviembre',b.diciembre='$diciembre',b.totalSumaItem='$totalSumatoriasMontos__dos',b.totalTotales='$totalSumatoriasMontos__dos' WHERE a.nombreEvento='$proyectoHidden' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "editar__eventos__inicial__tables":

			
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$total=floatval($numero__entrenadores)+floatval($numero__atletas);
	
	 		$query="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET a.tipoFinanciamiento='$tipoFinanciamiento',a.nombreEvento='$proyecto', a.Deporte='$deporte',a.provincia='$provincia',a.ciudadPais='$pais',a.alcance='$alcanse',a.fechaInicio='$fecha__inicio',a.fechaFin='$fecha__fin',a.genero='$genero',a.categoria='$categoria',a.numeroEntreandores='$numero__entrenadores',a.numeroAtletas='$numero__atletas',a.total='$total',a.mBenefici='$mujeresBeneficiarios',a.hBenefici='$hombresBeneficiarios',a.justificacionAd='$justificacionAdquisBien',a.canitdarBie='$cantidadBienAquirir',a.detalleBien='$detalleOrganismoAdEC' WHERE a.idPda='$proyectoHidden';";
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "editar__eventos__inicial__tables__modificaciones":

			
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$consultaFinancieros=$objeto->getObtenerInformacionGeneral("SELECT a.tipoFinanciamiento,a.nombreEvento,a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem,a.idProgramacionFinanciera,a.fecha,a.modifica,a.perioIngreso,a.estadoP,a.idActividad FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.nombreEvento='$proyectoHidden' AND b.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

	 		$consultaFinancieros=$objeto->getObtenerInformacionGeneral("SELECT a.tipoFinanciamiento,a.nombreEvento,a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem,a.idProgramacionFinanciera,a.fecha,a.modifica,a.perioIngreso,a.estadoP,a.idActividad FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.nombreEvento='$proyectoHidden' AND b.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

	 		$consultaFinancieros__recuperares=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_modificaciones_actdeportivas__inicial WHERE idOrganismo='$idOrganismos' AND perioIngresoRectificas='$aniosPeriodos__ingesos';");



	 		if (empty($consultaFinancieros__recuperares[0][idOrganismo])) {
	 			

		 		$queryCuarto__replicas="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_actdeportivas__inicial` (`idPda`, `tipoFinanciamiento`, `nombreEvento`, `Deporte`, `provincia`, `ciudadPais`, `alcance`, `fechaInicio`, `fechaFin`, `genero`, `categoria`, `numeroEntreandores`, `numeroAtletas`, `total`, `mBenefici`, `hBenefici`, `justificacionAd`, `canitdarBie`, `idProgramacionFinanciera`, `fecha`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalElem`, `detalleBien`, `modifica`, `perioIngreso`, `idOrganismo`, `estadoP`, `idActividad`, `fechaRectificas`, `perioIngresoRectificas`) VALUES (null, '".$consultaFinancieros[0][tipoFinanciamiento]."', '".$consultaFinancieros[0][nombreEvento]."', '".$consultaFinancieros[0][Deporte]."', '".$consultaFinancieros[0][provincia]."', '".$consultaFinancieros[0][ciudadPais]."', '".$consultaFinancieros[0][alcance]."', '".$consultaFinancieros[0][fechaInicio]."', '".$consultaFinancieros[0][fechaFin]."', '".$consultaFinancieros[0][genero]."', '".$consultaFinancieros[0][categoria]."', '".$consultaFinancieros[0][numeroEntreandores]."', '".$consultaFinancieros[0][numeroAtletas]."', '".$consultaFinancieros[0][total]."', '".$consultaFinancieros[0][mBenefici]."', '".$consultaFinancieros[0][hBenefici]."', '".$consultaFinancieros[0][justificacionAd]."', '".$consultaFinancieros[0][canitdarBie]."', '".$consultaFinancieros[0][idProgramacionFinanciera]."', '".$consultaFinancieros[0][fecha]."', '".$consultaFinancieros[0][enero]."', '".$consultaFinancieros[0][febrero]."', '".$consultaFinancieros[0][marzo]."', '".$consultaFinancieros[0][abril]."', '".$consultaFinancieros[0][mayo]."', '".$consultaFinancieros[0][junio]."', '".$consultaFinancieros[0][julio]."', '".$consultaFinancieros[0][agosto]."', '".$consultaFinancieros[0][septiembre]."', '".$consultaFinancieros[0][octubre]."', '".$consultaFinancieros[0][noviembre]."', '".$consultaFinancieros[0][diciembre]."', '".$consultaFinancieros[0][totalElem]."', '".$consultaFinancieros[0][detalleBien]."', '".$consultaFinancieros[0][modifica]."', '".$consultaFinancieros[0][perioIngreso]."', '".$idOrganismos."', '".$consultaFinancieros[0][estadoP]."', '5','$fecha_actual','$aniosPeriodos__ingesos');";
				$resultadoCuarto__replicas= $conexionEstablecida->exec($queryCuarto__replicas);

	 		}

	
	 		$total=floatval($numero__entrenadores)+floatval($numero__atletas);
	
	 		$query="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET  a.Deporte='$deporte',a.provincia='$provincia',a.ciudadPais='$pais',a.alcance='$alcanse',a.fechaInicio='$fecha__inicio',a.fechaFin='$fecha__fin',a.genero='$genero',a.categoria='$categoria',a.numeroEntreandores='$numero__entrenadores',a.numeroAtletas='$numero__atletas',a.total='$total',a.mBenefici='$mujeresBeneficiarios',a.hBenefici='$hombresBeneficiarios' WHERE a.nombreEvento='$proyectoHidden' AND b.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

	 		$queryCuarto="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_actdeportivas` (`idPda`,`nombreEvento`, `Deporte`, `provincia`, `ciudadPais`, `alcance`, `fechaInicio`, `fechaFin`, `genero`, `categoria`, `numeroEntreandores`, `numeroAtletas`, `total`, `mBenefici`, `hBenefici`, `fecha`, `perioIngreso`, `idOrganismo`, `estadoP`) VALUES (NULL,'$proyecto','$deporte', '$provincia', '$pais', '$alcanse', '$fecha__inicio', '$fecha__fin', '$genero', '$categoria', '$numero__entrenadores', '$numero__atletas', '$total', '$mujeresBeneficiarios', '$hombresBeneficiarios', '$fecha_actual', '$aniosPeriodos__ingesos', '$idOrganismos', '$opcion__liberar__deportivas');";
			$resultadoCuarto= $conexionEstablecida->exec($queryCuarto);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "editar__eventos__inicial__tables__modificaciones__dos__modificaciones":

			$data1=array();
			
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$informacionAct=$objeto->getObtenerInformacionGeneral("SELECT nombreEvento FROM poa_actdeportivas WHERE idPda='$proyectoHidden';");

	 		$informacionAct__elementosEntregados=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE nombreEvento LIKE '%".$informacionAct[0][nombreEvento]."%';");

	 		foreach ($informacionAct__elementosEntregados as $clave => $valor) {
	 			array_push($data1,$valor["idPda"]);
	 		}

	 		foreach ($data1 as $claveN => $valorN) {
		 			
		 		$totalSumas=floatval($numero__entrenadores) + floatval($numero__atletas);

		 		$query="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera SET  a.nombreEvento='$proyecto',a.Deporte='$deporte',a.provincia='$provincia',a.ciudadPais='$pais',a.alcance='$alcanse',a.fechaInicio='$fecha__inicio',a.fechaFin='$fecha__fin',a.genero='$genero',a.categoria='$categoria',a.numeroEntreandores='$numero__entrenadores',a.numeroAtletas='$numero__atletas',a.total='$totalSumas',a.mBenefici='$mujeresBeneficiarios',a.hBenefici='$hombresBeneficiarios',a.detalleBien='$detalleOrganismoAdEC' WHERE a.idPda='$valorN' AND b.IdOrganismo='$idOrganismos';";
				$resultado= $conexionEstablecida->exec($query);

				$mensaje=1;
				$jason['mensaje']=$mensaje;

	 		}


		break;

		case "editar__eventos__inicial":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

	 		$total=floatval($numero__entrenadores)+floatval($numero__atletas);
	
	 		$query="UPDATE poa_actdeportivas SET tipoFinanciamiento='$tipoFinanciamiento',nombreEvento='$proyecto', Deporte='$deporte',provincia='$provincia',ciudadPais='$pais',alcance='$alcanse',fechaInicio='$fecha__inicio',fechaFin='$fecha__fin',genero='$genero',categoria='$categoria',numeroEntreandores='$numero__entrenadores',numeroAtletas='$numero__atletas',total='$total',mBenefici='$mujeresBeneficiarios',hBenefici='$hombresBeneficiarios',justificacionAd='$justificacionAdquisBien',canitdarBie='$cantidadBienAquirir' WHERE idOrganismo='$idOrganismos' AND estadoP='1' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "guardar__eventos__inicial":

			$total=intval($numero__entrenadores) + intval($numero__atletas);

			$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`fecha`, ","`idOrganismo`, ","`estadoP`, ","`perioIngreso`"),array("'$tipoFinanciamiento', ","'$proyecto', ","'$deporte', ","'$provincia', ", "'$pais', ", "'$alcanse', ", "'$fecha__inicio', ", "'$fecha__fin', ", "'$genero', ", "'$categoria', ", "'$numero__entrenadores', ", "'$numero__atletas', ", "'$total', ","'$mujeresBeneficiarios', ","'$hombresBeneficiarios', ","'$detalleOrganismoAd', ","'$justificacionAdquisBien', ","'$cantidadBienAquirir', ","'$fecha_actual', ","'$idOrganismos', ","'1', ","'$aniosPeriodos__ingesos'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "guardar__eventos__inicial__actualiza":

			$total=intval($numero__entrenadores) + intval($numero__atletas);

			$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`fecha`, ","`idOrganismo`, ","`estadoP`, ","`perioIngreso`, ","`modifica`, ","`idActividad`"),array("'$tipoFinanciamiento', ","'$proyecto', ","'$deporte', ","'$provincia', ", "'$pais', ", "'$alcanse', ", "'$fecha__inicio', ", "'$fecha__fin', ", "'$genero', ", "'$categoria', ", "'$numero__entrenadores', ", "'$numero__atletas', ", "'$total', ","'$mujeresBeneficiarios', ","'$hombresBeneficiarios', ","'$detalleOrganismoAd', ","'$justificacionAdquisBien', ","'$cantidadBienAquirir', ","'$fecha_actual', ","'$idOrganismos', ","'1', ","'$aniosPeriodos__ingesos', ","'E', ","'$idActividad'"));
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "guardar__eventos__inicial__montos__2":

			$arraySinArray = json_decode($arraySin);

			$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE a.nombreEvento='$evento' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");

			foreach ($arraySinArray as $valor) {
				
				$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$idActividad' AND a.idItem='$valor' AND a.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");


				$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$enero);
				$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$febrero);
				$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$marzo);
				$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$abril);
				$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mayo);
				$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$junio);
				$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$julio);
				$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$agosto);
				$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$septiembre);
				$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$octubre);
				$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$noviembre);
				$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$diciembre);

				$totalResult=floatval($enero) + floatval($febrero) + floatval($marzo) + floatval($abril) + floatval($mayo) + floatval($junio) + floatval($julio) + floatval($agosto) + floatval($septiembre) + floatval($octubre) + floatval($noviembre) + floatval($diciembre);

				$sumar=floatval($totalResult) + $honorarios[0][totalTotales];


				//if (floatval($totalResult)>floatval($honorarios[0][totalTotales]) && $tipoFinanciamiento!="autogestion") {

					//$mensaje=2;

					//$jason['sumar']=$sumar;

				//}else{

					$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`"),array("'".$envio__informaciones[0][tipoFinanciamiento]."', ","'".$envio__informaciones[0][nombreEvento]."', ","'".$envio__informaciones[0][Deporte]."', ","'".$envio__informaciones[0][provincia]."', ", "'".$envio__informaciones[0][ciudadPais]."', ", "'".$envio__informaciones[0][alcance]."', ", "'".$envio__informaciones[0][fechaInicio]."', ", "'".$envio__informaciones[0][fechaFin]."', ", "'".$envio__informaciones[0][genero]."', ", "'".$envio__informaciones[0][categoria]."', ", "'".$envio__informaciones[0][numeroEntreandores]."', ", "'".$envio__informaciones[0][numeroAtletas]."', ", "'".$envio__informaciones[0][total]."', ","'".$envio__informaciones[0][mBenefici]."', ","'".$envio__informaciones[0][hBenefici]."', ","'".$envio__informaciones[0][detalleBien]."', ","'".$envio__informaciones[0][justificacionAd]."', ","'".$envio__informaciones[0][canitdarBie]."', ","'".$honorarios[0][honorarios]."', ","'$fecha_actual', ","'$enero', ","'$febrero', ","'$marzo', ","'$abril', ","'$mayo', ","'$junio', ","'$julio', ","'$agosto', ","'$septiembre', ","'$octubre', ","'$noviembre', ","'$diciembre', ","'$totalResult', ","'$aniosPeriodos__ingesos'"));


					$mensaje=1;

				//}			


			}



			$jason['mensaje']=$mensaje;
			

		break;

		case "finalizar__act__deportivas":

			$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE a.idOrganismo='$idOrganismoPrincipal' AND estadoP='1' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");

			$nombreEvento=$envio__informaciones[0][nombreEvento];

			$elimina=$objeto->getElimina('poa_actdeportivas','idPda',$envio__informaciones[0][idPda]);	

			$mensaje=1;	

			$jason['mensaje']=$mensaje;	
			$jason['nombreEvento']=$nombreEvento;	


		break;

		case "guardar__eventos__inicial__montos__3":


				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE  a.idPda='$idPda' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");
				

				$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$idActividad'  AND a.idItem='$idItem' AND a.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");


				$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$enero);
				$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$febrero);
				$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$marzo);
				$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$abril);
				$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mayo);
				$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$junio);
				$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$julio);
				$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$agosto);
				$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$septiembre);
				$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$octubre);
				$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$noviembre);
				$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$diciembre);

				$totalResult=floatval($enero) + floatval($febrero) + floatval($marzo) + floatval($abril) + floatval($mayo) + floatval($junio) + floatval($julio) + floatval($agosto) + floatval($septiembre) + floatval($octubre) + floatval($noviembre) + floatval($diciembre);

				$sumar=floatval($totalResult) + $honorarios[0][totalTotales];

				$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`"),array("'".$envio__informaciones[0][tipoFinanciamiento]."', ","'".$envio__informaciones[0][nombreEvento]."', ","'".$envio__informaciones[0][Deporte]."', ","'".$envio__informaciones[0][provincia]."', ", "'".$envio__informaciones[0][ciudadPais]."', ", "'".$envio__informaciones[0][alcance]."', ", "'".$envio__informaciones[0][fechaInicio]."', ", "'".$envio__informaciones[0][fechaFin]."', ", "'".$envio__informaciones[0][genero]."', ", "'".$envio__informaciones[0][categoria]."', ", "'".$envio__informaciones[0][numeroEntreandores]."', ", "'".$envio__informaciones[0][numeroAtletas]."', ", "'".$envio__informaciones[0][total]."', ","'".$envio__informaciones[0][mBenefici]."', ","'".$envio__informaciones[0][hBenefici]."', ","'".$envio__informaciones[0][detalleBien]."', ","'".$envio__informaciones[0][justificacionAd]."', ","'".$envio__informaciones[0][canitdarBie]."', ","'".$honorarios[0][honorarios]."', ","'$fecha_actual', ","'$enero', ","'$febrero', ","'$marzo', ","'$abril', ","'$mayo', ","'$junio', ","'$julio', ","'$agosto', ","'$septiembre', ","'$octubre', ","'$noviembre', ","'$diciembre', ","'$totalResult', ","'$aniosPeriodos__ingesos'"));

					$programacionFinancieras=$honorarios[0][honorarios];

					$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$sumar',totalTotales='$sumar'");

					$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$programacionFinancieras);

				// $elimina=$objeto->getElimina('poa_actdeportivas','idPda',$envio__informaciones[0][idPda]);	

				$mensaje=1;				



			$jason['mensaje']=$mensaje;


		break;

		case "guardar__eventos__inicial__montos__3__modificaciones__1":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.idProgramacionFinanciera,a.idOrganismo,a.idActividad FROM poa_actdeportivas AS a WHERE  a.idPda='$idPda' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");
			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_actdeportivas` (`idPda`, `tipoFinanciamiento`, `nombreEvento`, `Deporte`, `provincia`, `ciudadPais`, `alcance`, `fechaInicio`, `fechaFin`, `genero`, `categoria`, `numeroEntreandores`, `numeroAtletas`, `total`, `mBenefici`, `hBenefici`, `justificacionAd`, `canitdarBie`, `idProgramacionFinanciera`, `fecha`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalElem`, `detalleBien`, `modifica`, `perioIngreso`, `idOrganismo`, `estadoP`, `idActividad`, `enero2`, `febrero2`, `marzo2`, `abril2`, `mayo2`, `junio2`, `julio2`, `agosto2`, `septiembre2`, `octubre2`, `noviembre2`, `diciembre2`, `total2`) VALUES (NULL, '".$envio__informaciones[0][tipoFinanciamiento]."', '".$envio__informaciones[0][nombreEvento]."', '".$envio__informaciones[0][Deporte]."', '".$envio__informaciones[0][provincia]."', '".$envio__informaciones[0][ciudadPais]."', '".$envio__informaciones[0][alcance]."', '".$envio__informaciones[0][fechaInicio]."', '".$envio__informaciones[0][fechaFin]."', '".$envio__informaciones[0][genero]."', '".$envio__informaciones[0][categoria]."', '".$envio__informaciones[0][numeroEntreandores]."', '".$envio__informaciones[0][numeroAtletas]."', '".$envio__informaciones[0][total]."', '".$envio__informaciones[0][mBenefici]."', '".$envio__informaciones[0][hBenefici]."', '".$envio__informaciones[0][justificacionAd]."', '".$envio__informaciones[0][canitdarBie]."', ".$idItem.", '$fecha_actual', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '".$envio__informaciones[0][detalleBien]."', NULL, $aniosPeriodos__ingesos, '".$idOrganismoSession."', NULL, '".$idActividad."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;	
			$jason['mensaje']=$mensaje;


		break;


		case "guardar__eventos__inicial__montos":

			$comparador__items=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_catalogo_contraloria WHERE idOrganismo='$idOrganismos' AND perioIngreso='$aniosPeriodos__ingesos' AND idItemCatalogo='$idItem';");


			if (empty($comparador__items[0][idOrganismo]) && $variable=="si") {
				
				$mensaje=2;					

			}else{

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE a.idOrganismo='$idOrganismos' AND estadoP='1' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");
				

				$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$idActividad'  AND a.idItem='$idItem' AND a.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");


				$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$enero);
				$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$febrero);
				$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$marzo);
				$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$abril);
				$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mayo);
				$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$junio);
				$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$julio);
				$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$agosto);
				$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$septiembre);
				$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$octubre);
				$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$noviembre);
				$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$diciembre);

				$totalResult=floatval($enero) + floatval($febrero) + floatval($marzo) + floatval($abril) + floatval($mayo) + floatval($junio) + floatval($julio) + floatval($agosto) + floatval($septiembre) + floatval($octubre) + floatval($noviembre) + floatval($diciembre);

				$sumar=floatval($totalResult) + $honorarios[0][totalTotales];

				$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`"),array("'".$envio__informaciones[0][tipoFinanciamiento]."', ","'".$envio__informaciones[0][nombreEvento]."', ","'".$envio__informaciones[0][Deporte]."', ","'".$envio__informaciones[0][provincia]."', ", "'".$envio__informaciones[0][ciudadPais]."', ", "'".$envio__informaciones[0][alcance]."', ", "'".$envio__informaciones[0][fechaInicio]."', ", "'".$envio__informaciones[0][fechaFin]."', ", "'".$envio__informaciones[0][genero]."', ", "'".$envio__informaciones[0][categoria]."', ", "'".$envio__informaciones[0][numeroEntreandores]."', ", "'".$envio__informaciones[0][numeroAtletas]."', ", "'".$envio__informaciones[0][total]."', ","'".$envio__informaciones[0][mBenefici]."', ","'".$envio__informaciones[0][hBenefici]."', ","'".$envio__informaciones[0][detalleBien]."', ","'".$envio__informaciones[0][justificacionAd]."', ","'".$envio__informaciones[0][canitdarBie]."', ","'".$honorarios[0][honorarios]."', ","'$fecha_actual', ","'$enero', ","'$febrero', ","'$marzo', ","'$abril', ","'$mayo', ","'$junio', ","'$julio', ","'$agosto', ","'$septiembre', ","'$octubre', ","'$noviembre', ","'$diciembre', ","'$totalResult', ","'$aniosPeriodos__ingesos'"));


				if ($tipoFinanciamiento!="autogestion") {

					$programacionFinancieras=$honorarios[0][honorarios];

					$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$sumar',totalTotales='$sumar'");

					$actualiza2=$objeto->getActualiza("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$programacionFinancieras);

				}

				//$elimina=$objeto->getElimina('poa_actdeportivas','idPda',$envio__informaciones[0][idPda]);	

				$mensaje=1;				

			}


			$jason['mensaje']=$mensaje;


		break;


		case "guardar__eventos__inicial__montos__3__modificaciones":


			$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE  a.idPda='$idPda' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");

			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$idActividad'  AND a.idItem='$idItem' AND a.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.modifica='E';");
				
			$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`, ","`modifica`"),array("'".$envio__informaciones[0][tipoFinanciamiento]."', ","'".$envio__informaciones[0][nombreEvento]."', ","'".$envio__informaciones[0][Deporte]."', ","'".$envio__informaciones[0][provincia]."', ", "'".$envio__informaciones[0][ciudadPais]."', ", "'".$envio__informaciones[0][alcance]."', ", "'".$envio__informaciones[0][fechaInicio]."', ", "'".$envio__informaciones[0][fechaFin]."', ", "'".$envio__informaciones[0][genero]."', ", "'".$envio__informaciones[0][categoria]."', ", "'".$envio__informaciones[0][numeroEntreandores]."', ", "'".$envio__informaciones[0][numeroAtletas]."', ", "'".$envio__informaciones[0][total]."', ","'".$envio__informaciones[0][mBenefici]."', ","'".$envio__informaciones[0][hBenefici]."', ","'".$envio__informaciones[0][detalleBien]."', ","'".$envio__informaciones[0][justificacionAd]."', ","'".$envio__informaciones[0][canitdarBie]."', ","'".$honorarios[0][honorarios]."', ","'$fecha_actual', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'$aniosPeriodos__ingesos', ","'E'"));

			$mensaje=1;				
			$jason['mensaje']=$mensaje;


		break;


		case "guardar__eventos__inicial__montos__modificaciones":


			$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idPda,a.tipoFinanciamiento,a.nombreEvento, a.Deporte,a.provincia,a.ciudadPais,a.alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien FROM poa_actdeportivas AS a WHERE a.idOrganismo='$idOrganismos' AND estadoP='1' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPda DESC LIMIT 1;");
			
			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$idActividad'  AND a.idItem='$idItem' AND a.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");




			$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`, ","`modifica`"),array("'".$envio__informaciones[0][tipoFinanciamiento]."', ","'".$envio__informaciones[0][nombreEvento]."', ","'".$envio__informaciones[0][Deporte]."', ","'".$envio__informaciones[0][provincia]."', ", "'".$envio__informaciones[0][ciudadPais]."', ", "'".$envio__informaciones[0][alcance]."', ", "'".$envio__informaciones[0][fechaInicio]."', ", "'".$envio__informaciones[0][fechaFin]."', ", "'".$envio__informaciones[0][genero]."', ", "'".$envio__informaciones[0][categoria]."', ", "'".$envio__informaciones[0][numeroEntreandores]."', ", "'".$envio__informaciones[0][numeroAtletas]."', ", "'".$envio__informaciones[0][total]."', ","'".$envio__informaciones[0][mBenefici]."', ","'".$envio__informaciones[0][hBenefici]."', ","'".$envio__informaciones[0][detalleBien]."', ","'".$envio__informaciones[0][justificacionAd]."', ","'".$envio__informaciones[0][canitdarBie]."', ","'".$honorarios[0][honorarios]."', ","'$fecha_actual', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'0', ","'$aniosPeriodos__ingesos', ","'E'"));


			$mensaje=1;				
			$jason['mensaje']=$mensaje;


		break;


		case  "actividadesDeportivades":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);


			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera AS honorarios, a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$idProgramacionFinanciera' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo';");

			$sumarUniEnero=$objeto->mesesSumarS($honorarios[0][enero],$mesesArray[0]);
			$sumarUniFebrero=$objeto->mesesSumarS($honorarios[0][febrero],$mesesArray[1]);
			$sumarUniMarzo=$objeto->mesesSumarS($honorarios[0][marzo],$mesesArray[2]);
			$sumarUniAbril=$objeto->mesesSumarS($honorarios[0][abril],$mesesArray[3]);
			$sumarUniMayo=$objeto->mesesSumarS($honorarios[0][mayo],$mesesArray[4]);
			$sumarUniJunio=$objeto->mesesSumarS($honorarios[0][junio],$mesesArray[5]);
			$sumarUniJulio=$objeto->mesesSumarS($honorarios[0][julio],$mesesArray[6]);
			$sumarUniAgosto=$objeto->mesesSumarS($honorarios[0][agosto],$mesesArray[7]);
			$sumarUniSeptiembre=$objeto->mesesSumarS($honorarios[0][septiembre],$mesesArray[8]);
			$sumarUniOctubre=$objeto->mesesSumarS($honorarios[0][octubre],$mesesArray[9]);
			$sumarUniNoviembre=$objeto->mesesSumarS($honorarios[0][noviembre],$mesesArray[10]);
			$sumarUniDiciembre=$objeto->mesesSumarS($honorarios[0][diciembre],$mesesArray[11]);
			$sumar=floatval($mesesArray[12]) + $honorarios[0][totalTotales];





			$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

			$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

			// $sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]),2);


			if (floatval($mesesArray[12])<=0) {

				$mensaje=21;

			}else if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion]) && $valoresArray[1]=="autogestion") {

				$mensaje=20;

			}else{

				$inserta=$objeto->getInsertaNormal('poa_actdeportivas', array("`idPda`, ","`tipoFinanciamiento`, ","`nombreEvento`, ","`Deporte`, ","`provincia`, ","`ciudadPais`, ","`alcance`, ","`fechaInicio`, ","`fechaFin`, ","`genero`, ","`categoria`, ","`numeroEntreandores`, ","`numeroAtletas`, ","`total`, ","`mBenefici`, ","`hBenefici`, ","`detalleBien`, ","`justificacionAd`, ","`canitdarBie`, ","`idProgramacionFinanciera`, ","`fecha`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalElem`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$valoresArray[2]', ","'$valoresArray[3]', ", "'$valoresArray[4]', ", "'$valoresArray[5]', ", "'$valoresArray[6]', ", "'$valoresArray[7]', ", "'$valoresArray[8]', ", "'$valoresArray[9]', ", "'$valoresArray[10]', ", "'$valoresArray[11]', ", "'$valoresArray[12]', ","'$valoresArray[13]', ","'$valoresArray[14]', ","'$valoresArray[15]', ","'$valoresArray[16]', ","'$valoresArray[17]', ","'$idProgramacionFinanciera', ","'$fecha_actual', ","'$mesesArray[0]', ","'$mesesArray[1]', ","'$mesesArray[2]', ","'$mesesArray[3]', ","'$mesesArray[4]', ","'$mesesArray[5]', ","'$mesesArray[6]', ","'$mesesArray[7]', ","'$mesesArray[8]', ","'$mesesArray[9]', ","'$mesesArray[10]', ","'$mesesArray[11]', ","'$mesesArray[12]', ","'$aniosPeriodos__ingesos'"));


				if ($valoresArray[1]!="autogestion") {

					$valores=array("enero='$sumarUniEnero',febrero='$sumarUniFebrero',marzo='$sumarUniMarzo',abril='$sumarUniAbril',mayo='$sumarUniMayo',junio='$sumarUniJunio',julio='$sumarUniJulio',agosto='$sumarUniAgosto',septiembre='$sumarUniSeptiembre',octubre='$sumarUniOctubre',noviembre='$sumarUniNoviembre',diciembre='$sumarUniDiciembre',totalSumaItem='$sumar',totalTotales='$sumar'");

					$actualiza2=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera,"perioIngreso",$aniosPeriodos__ingesos);

				}

				$mensaje=1;

			}			

			$jason['mensaje']=$mensaje;
			$jason['sumar']=$sumar;

		break;

		case  "actividadesAdministrativas":

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

			$comparador__items=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_catalogo_contraloria WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND idItemCatalogo='$idItem';");


			if (empty($comparador__items[0][idOrganismo])) {
				
				$mensaje=2;					

			}else{

				$inversionOrganismo=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$idOrganismo."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

				$inversionOrganismoAsignada=$objeto->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$idOrganismo."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");

				$restarAntiguo=$objeto->getObtenerInformacionGeneral("SELECT totalSumaItem AS sumaAntiguo FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idProgramacionFinanciera' AND perioIngreso='$aniosPeriodos__ingesos';");

				$sumar=round(floatval($inversionOrganismoAsignada[0][sumaItemTotal]) + floatval($mesesArray[12]) - floatval($restarAntiguo[0][sumaAntiguo]),2);


				if (floatval($mesesArray[12])<=0) {

					$mensaje=21;

				}else if (floatval($sumar)>floatval($inversionOrganismo[0][nombreInversion])) {

					$mensaje=20;

				}else{

					$valores=array("enero='$mesesArray[0]',febrero='$mesesArray[1]',marzo='$mesesArray[2]',abril='$mesesArray[3]',mayo='$mesesArray[4]',junio='$mesesArray[5]',julio='$mesesArray[6]',agosto='$mesesArray[7]',septiembre='$mesesArray[8]',octubre='$mesesArray[9]',noviembre='$mesesArray[10]',diciembre='$mesesArray[11]',totalSumaItem='$mesesArray[12]',totalTotales='$mesesArray[12]'");

					$actualiza2=$objeto->getActualiza__confirmado("poa_programacion_financiera",$valores,"idProgramacionFinanciera",$idProgramacionFinanciera,"perioIngreso",$aniosPeriodos__ingesos);

					$inserta=$objeto->getInsertaNormal('poa_actividadesadministrativas', array("`idActividadAd`, ","`justificacionActividad`, ","`cantidadBien`, ","`idProgramacionFinanciera`, ","`fecha`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$idProgramacionFinanciera', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

					$mensaje=1;

				}			

			}

			$jason['mensaje']=$mensaje;

			
			$jason['sumar']=$sumar;

		break;


		case  "actividadesAdministrativas__ediciones":


			$valoresArray = json_decode($valoresArray);

	
			$inserta=$objeto->getInsertaNormal('poa_actividadesadministrativas', array("`idActividadAd`, ","`justificacionActividad`, ","`cantidadBien`, ","`idProgramacionFinanciera`, ","`fecha`, ","`perioIngreso`"),array("'$valoresArray[0]', ","'$valoresArray[1]', ","'$idProgramacionFinanciera', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case  "actividadesAdministrativas__modificaciones__reales":


			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			$mesesArray = json_decode($mesesArray);
			$valoresArray = json_decode($valoresArray);

		 	$eliminar__querys__2="UPDATE poa_actividadesadministrativas SET justificacionActividad='$valoresArray[0]', cantidadBien='$valoresArray[1]' WHERE idProgramacionFinanciera='$idProgramacionFinanciera' AND perioIngreso='$aniosPeriodos__ingesos';";
			$eliminar__querys__re__2= $conexionEstablecida->exec($eliminar__querys__2);	


			$jason['mensaje']=$mensaje;


		break;

		case  "itemsCiudadanosPre":

			$sumar=0;

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalSumaItem`, ","`totalTotales`, ","`idOrganismo`, ","`idItem`, ","`idActividad`, " ,"`fecha`, ","`perioIngreso`"),array("'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'$idOrganismoPrincipal', ","'$arrayInformacion[0]', ","'$actividadEnvidada', ","'$fecha_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemsCiudadanosPre__modificaciones":

			$sumar=0;

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInsertaNormal('poa_programacion_financiera', array("`idProgramacionFinanciera`, ","`enero`, ","`febrero`, ","`marzo`, ","`abril`, ","`mayo`, ","`junio`, ","`julio`, ","`agosto`, ","`septiembre`, ","`octubre`, ","`noviembre`, ","`diciembre`, ","`totalSumaItem`, ","`totalTotales`, ","`idOrganismo`, ","`idItem`, ","`idActividad`, " ,"`fecha`, ","`perioIngreso`, ","`modifica`"),array("'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'0.00', ","'$idOrganismoPrincipal', ","'$arrayInformacion[0]', ","'$actividadEnvidada', ","'$fecha_actual', ","'$aniosPeriodos__ingesos', ","'E'"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "poaOrganismo":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_poainicial', array("`idPoaEnviado`, ","`primertrimestre`, ","`segundotrimestre`, ","`tercertrimestre`, ","`idOrganismo`, ","`fecha`, ","`idActividad`, ","`cuartotrimestre`, ","`metaindicador`, ","`perioIngreso`"),array(":idObjetivoEstrategico, ",":idObjetivo, ",":idPrograma, ",":idOrganismo, ",":fecha, ",":idActividad, ",":cuartotrimestre, ",":metaindicador, ",":aniosPeriodos__ingesos"),array("$arrayInformacion[2]","$arrayInformacion[3]","$arrayInformacion[4]","$arrayInformacion[0]","$fecha_actual","$arrayInformacion[1]","$arrayInformacion[5]","$arrayInformacion[6]","$aniosPeriodos__ingesos"),array(":idObjetivoEstrategico",":idObjetivo",":idPrograma",":idOrganismo",":fecha",":idActividad",":cuartotrimestre",":metaindicador",":aniosPeriodos__ingesos"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "poaOrganismo":

			$arrayInformacion = json_decode($arrayInformacion);


			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_poainicial_modificacion` (`idPoaEnviado`, `primertrimestre`, `segundotrimestre`, `tercertrimestre`, `idOrganismo`, `fecha`, `idActividad`, `cuartotrimestre`, `metaindicador`, `perioIngreso`, `documentoJustificacion`, `modifica`) VALUES (NULL, '$arrayInformacion[2]', '$arrayInformacion[3]', '$arrayInformacion[4]', '$arrayInformacion[0]', '$fecha_actual', '$arrayInformacion[1]', '$arrayInformacion[5]', '$arrayInformacion[6]', '$aniosPeriodos__ingesos', '$documentoJustificacion', 'E');";
			$resultado= $conexionEstablecida->exec($query);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "poaOrganismo__actualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			if ($evidenciaCargadas=="si") {
				
				$documentoJustificacion=$arrayInformacion[0]."__".$fecha_actual.".pdf";

				$direccion1=VARIABLE__BACKEND."modificacion/justificacionIndicadores/";

				$documento=$objeto->getEnviarPdf($_FILES["fileArchivoEvidencias"]['type'],$_FILES["fileArchivoEvidencias"]['size'],$_FILES["fileArchivoEvidencias"]['tmp_name'],$_FILES["fileArchivoEvidencias"]['name'],$direccion1,$documentoJustificacion);

				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_poainicial_modificacion` (`idPoaEnviado`, `primertrimestre`, `segundotrimestre`, `tercertrimestre`, `idOrganismo`, `fecha`, `idActividad`, `cuartotrimestre`, `metaindicador`, `perioIngreso`, `documentoJustificacion`, `modifica`) VALUES (NULL, '$arrayInformacion[2]', '$arrayInformacion[3]', '$arrayInformacion[4]', '$arrayInformacion[0]', '$fecha_actual', '$arrayInformacion[1]', '$arrayInformacion[5]', '$arrayInformacion[6]', '$aniosPeriodos__ingesos', '$documentoJustificacion', 'E');";
				$resultado= $conexionEstablecida->exec($query);


			}else{

				$query="UPDATE `poa`.`poa_poainicial` SET `primertrimestre` = '$arrayInformacion[2]', `segundotrimestre` = '$arrayInformacion[3]', `tercertrimestre` = '$arrayInformacion[4]', `cuartotrimestre` = '$arrayInformacion[5]', `metaindicador` = '$arrayInformacion[6]', `fecha` = '$fecha_actual', `idActividad` = '$arrayInformacion[1]', `idOrganismo` = '$arrayInformacion[0]', `modifica` = NULL, `perioIngreso` = '$aniosPeriodos__ingesos' WHERE `idOrganismo` = '$arrayInformacion[0]' AND perioIngreso='$aniosPeriodos__ingesos';";
				$resultado= $conexionEstablecida->exec($query);

			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case  "agregarItemsInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_item', array("`idItem`, ","`nombreItem`, ","`fecha`, ","`hora`, ","`itemPreesupuestario`, ","`perioIngreso`"),array(":nombreItem, ",":fecha, ",":hora, ",":itemPreesupuestario, ",":aniosPeriodos__ingesos"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","$arrayInformacion[1]","$aniosPeriodos__ingesos"),array(":nombreItem",":fecha",":hora",":itemPreesupuestario",":aniosPeriodos__ingesos"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "editarCorreoOrga":

			$arrayInformacion = json_decode($arrayInformacion);

			$idUsuario=$objeto->getBuscadorInicial("idUsuario","poa_organismo",'idOrganismo',$arrayInformacion[0]);
			

			$valores2=array("correo='$arrayInformacion[1]',correoResponsablePoa='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_organismo",$valores2,"idOrganismo",$arrayInformacion[0]);

			$valores2=array("email='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_usuario",$valores2,"idUsuario",$idUsuario);

			$valores3=array("idTipoOrganismo='$arrayInformacion[2]'");
			$actualiza3=$objeto->getActualiza("poa_competencia_organismo_competencia",$valores3,"idOrganismo",$arrayInformacion[0]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;	


		case  "itemsPrincipalActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("nombreItem='$arrayInformacion[1]',itemPreesupuestario='$arrayInformacion[2]'");
			$actualiza2=$objeto->getActualiza("poa_item",$valores2,"idItem",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "actividadesActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("idActividades='$inputActividades',nombreActividades='$input__1',idClasificacionGastos='$select__grupoG',idLineaPolitica='$select__indiCadores'");
			$actualiza2=$objeto->getActualiza("poa_actividades",$valores2,"idActividades",$arrayInformacion[4]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;		

		case  "grupoGastoActualiza":

			$valores2=array("nombreClasificacionGastos='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_clasificaciongastos",$valores2,"idClasificacionGastos",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		/*===========================================
		=            Paid administración            =
		===========================================*/



		case  "rubroActualiza__paid":

			$valores2=array("nombreRubros='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_rubros",$valores2,"idRubros",$enviado);
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;




		case  "indicadorActualiza__paid":

			$valores2=array("nombreIndicadores='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_indicadores",$valores2,"idIndicadores",$enviado);
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "tipoOrActualiza__paid":

			$valores2=array("nombreTipoOrganismo='$input__1',idArea='$input__2__tipoPaid',idAccion='$input__3__tipoPaid'");
			$actualiza2=$objeto->getActualiza("poa_paid_tipo_organismo",$valores2,"idTipoOrganismo",$idPaid);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "deporteActualiza__paid":

			$valores2=array("nombreDeporte='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_deporte",$valores2,"idDeporte",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "modalidadActualiza__paid":

			$valores2=array("nombreModalidad='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_modalidad",$valores2,"idModalidad",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "modalidadPrueba__paid":

			$valores2=array("nombrePrueba='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_prueba",$valores2,"idPrueba",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "categoria__paid":

			$valores2=array("nombreCategoria='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_categoria",$valores2,"idCategoria",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;



		case  "accionActualiza__paid":

			$valores2=array("accion='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_area_accion",$valores2,"idAreaAccion",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "encargadaActualiza__paid":

			$valores2=array("nombreArea='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_areaencargada",$valores2,"idAreaEncargada",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "estrategicoActualiza__paid":

			$valores2=array("nombreEstrategico='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_objetivos_estrategicos",$valores2,"idObjetivoEstrategico",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "itemActualiza__paid":

			$valores2=array("nombreItem='$input__1',itemPreesupuestario='$input__2Items__paid'");
			$actualiza2=$objeto->getActualiza("poa_paid_item",$valores2,"idItem",$idPaid);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "programaActualiza__paid":

			$valores2=array("nombrePrograma='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_paid_programa",$valores2,"idPrograma",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "componenteActualiza__paid":

			$valores2=array("nombreComponentes='$input__1',idIndicador='$input__2__tipoPaid'");
			$actualiza2=$objeto->getActualiza("poa_paid_componentes",$valores2,"idComponentes",$idComponente);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		/*=====  End of Paid administración  ======*/

		case  "lineaBaseActualiza":

			$valores2=array("nombreLinea='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_linea_base",$valores2,"idLineas",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "programaActualiza":

			$valores2=array("nombrePrograma='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_programa",$valores2,"idPrograma",$enviado);


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "indicadoresActualiza":

			$valores2=array("nombreIndicador='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_indicadores",$valores2,"idIndicadores",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportesActualiza":

			$valores2=array("nombreDeporte='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_deporte",$valores2,"idDeporte",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "alcanceActualiza":

			$valores2=array("nombreAlcanse='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_alcanse",$valores2,"idAlcanse",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "tipoFinanActualiza":

			$valores2=array("nombreTipo='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_tipo",$valores2,"idTipo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "cargosActualiza":

			$valores2=array("nombreCargo='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_cargo",$valores2,"idCargo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "objetivosActualiza":

			$arrayInformacion = json_decode($arrayInformacion);

			$valores2=array("nombreObjetivo='$arrayInformacion[1]'");
			$actualiza2=$objeto->getActualiza("poa_objetivos",$valores2,"idObjetivos",$arrayInformacion[0]);

			$valores3=array("idPrograma='$arrayInformacion[2]'");
			$actualiza3=$objeto->getActualiza("poa_objetivos_usuario",$valores3,"idObjetivos",$arrayInformacion[0]);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganismoActualiza":

			$valores2=array("nombreTipo='$input__1',idAreaAccion='$select__1',idObjetivos='$select__2',idAreaEncargada='$select__3'");
			$actualiza2=$objeto->getActualiza("poa_tipo_organismo",$valores2,"idTipoOrganismo",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "areaAccionActualiza":

			$valores2=array("accion='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_area_accion",$valores2,"idAreaAccion",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "areaEncargadaActualiza":

			$valores2=array("nombreArea='$input__1'");
			$actualiza2=$objeto->getActualiza("poa_areaEncargada",$valores2,"idAreaEncargada",$enviado);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		/*=============================================
		=            Inserta paid acciones            =
		=============================================*/
		
		case  "programaPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_programa', array("`idPrograma`, ","`nombrePrograma`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;
		
		
		
		case  "componentesPaid":

			$arrayInformacion = json_decode($arrayInformacion);

			$data1=array();

			foreach ($arrayInformacion as $clave => $valor) {
				if ($clave>1) {
					array_push($data1,$valor);
				}
			}			

			$inserta=$objeto->getInsertaNormal('poa_paid_componentes', array("`idComponentes`, ","`nombreComponentes`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`, ","`idIndicador`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos', ","'$arrayInformacion[1]'"));

			$obtenerInformacion__usens=$objeto->getObtenerInformacionGeneral("SELECT MAX(idComponentes) AS maximo FROM poa_paid_componentes;");

			$maximo=$obtenerInformacion__usens[0][maximo];

			foreach ($data1 as $value) {
				$inserta2=$objeto->getInsertaNormal('poa_paid_componentes_rubros', array("`idComponentesRubros`, ","`idComponente`, ","`idRubros`, ","`fecha`, ","`hora`"),array("'$maximo', ","'$value', ","'$fecha_actual', ","'$hora_actual'"));
			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_item', array("`idItem`, ","`nombreItem`, ","`itemPreesupuestario`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "estrategicoPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_objetivos_estrategicos', array("`idObjetivoEstrategico`, ","`nombreEstrategico`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaEncargadaPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_areaencargada', array("`idAreaEncargada`, ","`nombreArea`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaAccionPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_area_accion', array("`idAreaAccion`, ","`accion`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganiPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_tipo_organismo', array("`idTipoOrganismo`, ","`nombreTipoOrganismo`, ","`idArea`, ","`idAccion`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$arrayInformacion[1]', ","'$arrayInformacion[2]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "indicadorPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_indicadores', array("`idIndicadores`, ","`nombreIndicadores`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "rubrosPaid":

			$arrayCheckeds = json_decode($arrayCheckeds);
			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInsertaNormal('poa_paid_rubros', array("`idRubros`, ","`nombreRubros`, ","`idComponente`, ","`idIndicador`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","NULL, ","NULL, ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			$maximo=$objeto->getMaximoFuncion('idRubros','poa_paid_rubros');

			foreach ($arrayCheckeds as $value) {

				$inserta=$objeto->getInsertaNormal('poa_paid_rubros_items', array("`idRubrosItems`, ","`idRubros`, ","`idItem`, ","`perioIngreso`"),array("'$maximo', ","'$value', ","'$aniosPeriodos__ingesos'"));
				
			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "deportePaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_deporte', array("`idDeporte`, ","`nombreDeporte`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "modalidadPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_modalidad', array("`idModalidad`, ","`nombreModalidad`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "pruebaPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_prueba', array("`idPrueba`, ","`nombrePrueba`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "categoriaPaid":

			$arrayInformacion = json_decode($arrayInformacion);


			$inserta=$objeto->getInsertaNormal('poa_paid_categoria', array("`idCategoria`, ","`nombreCategoria`, ","`idUsuario`, ","`fecha`, ","`hora`, ","`identificador`, ","`perioIngreso`"),array("'$arrayInformacion[0]', ","'$idUsuarioPrincipal', ","'$fecha_actual', ","'$hora_actual', ","'$identificador', ","'$aniosPeriodos__ingesos'"));

			
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "itemRubrosPaid":

			$arrayInformacion = json_decode($arrayInformacion);

	
			$inserta=$objeto->getInsertaNormal('poa_paid_rubros_items', array("`idRubrosItems`, ","`idRubros`, ","`idItem`, ","`perioIngreso`"),array("'$idUsados__items', ","'$arrayInformacion[0]', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "componentesRubrosPaid":

			$arrayInformacion = json_decode($arrayInformacion);

	
			$inserta=$objeto->getInsertaNormal('poa_paid_componentes_rubros', array("`idComponentesRubros`, ","`idComponente`, ","`idRubros`, ","`fecha`, ","`hora`, ","`periodo`"),array("'$idUsados__items', ","'$arrayInformacion[0]', ","'$fecha_actual', ","'$hora_actual', ","'$aniosPeriodos__ingesos'"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		/*=====  End of Inserta paid acciones  ======*/
		

		case  "lineaPolitica":

			$inserta=$objeto->getInserta('poa_linea_base', array("`idLineas`, ","`nombreLinea`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idLineas','poa_linea_base');

			$inserta2=$objeto->getInserta('poa_linea_base_usuario',array("`idLineaBaseUsuario`, ","`idUsuario`, ","`idLineaBase`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "programaInserta":

			$inserta=$objeto->getInserta('poa_programa', array("`idPrograma`, ","`nombrePrograma`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idPrograma','poa_programa');

			$inserta2=$objeto->getInserta('poa_programa_usuario',array("`idProgramaUsuarion`, ","`idUsuario`, ","`idPrograma`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "indicadoresInserta":

			$inserta=$objeto->getInserta('poa_indicadores', array("`idIndicadores`, ","`nombreIndicador`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idIndicadores','poa_indicadores');

			$inserta2=$objeto->getInserta('poa_indicadores_usuario',array("`idIndicadorUsuario`, ","`idUsuario`, ","`idIndicador`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "deportesInserta":

			$inserta=$objeto->getInserta('poa_deporte', array("`idDeporte`, ","`nombreDeporte`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idDeporte','poa_deporte');

			$inserta2=$objeto->getInserta('poa_deporte_usuario',array("`idDeporteUsuario`, ","`idUsuario`, ","`idDeporte`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "alcanseInserta":

			$inserta=$objeto->getInserta('poa_alcanse', array("`idAlcanse`, ","`nombreAlcanse`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idAlcanse','poa_alcanse');

			$inserta2=$objeto->getInserta('poa_alcanse_usuario',array("`idAlcanseUsuario`, ","`idUsuario`, ","`idAlcanse`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "financiamientoInserta":

			$inserta=$objeto->getInserta('poa_tipo', array("`idTipo`, ","`nombreTipo`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idTipo','poa_tipo');

			$inserta2=$objeto->getInserta('poa_tipo_usuario',array("`idTipoUsuario`, ","`idUsuario`, ","`idTipo`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "cargoInserta":

			$inserta=$objeto->getInserta('poa_cargo', array("`idCargo`, ","`nombreCargo`, ","`fecha`, ","`hora`, ","`usado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$agregado","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idCargo','poa_cargo');

			$inserta2=$objeto->getInserta('poa_cargo_usuario',array("`idCargoUsuario`, ","`idUsuario`, ","`idCargo`"),array(":idUsuario, ",":idLineaBase"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idLineaBase"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "objetivoInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_objetivos', array("`idObjetivos`, ","`nombreObjetivo`, ","`fecha`, ","`hora`, ","`estado`"),array(":nombreLinea, ",":fecha, ",":hora, ",":estado"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","A"),array(":nombreLinea",":fecha",":hora",":estado"));

			$maximo=$objeto->getMaximoFuncion('idObjetivos','poa_objetivos');

			$inserta2=$objeto->getInserta('poa_objetivos_usuario',array("`idObjetivosUsuario`, ","`idUsuario`, ","`idObjetivos`, ","`idPrograma`"),array(":idUsuario, ",":idLineaBase, ",":argumento"),array("$idUsuarioPrincipal","$maximo","$arrayInformacion[1]"),array(":idUsuario",":idLineaBase",":argumento"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		

		case  "actividadInserta":

			$arrayCheckeds = json_decode($arrayCheckeds);

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_actividades', array("`idActividades`, ","`nombreActividades`, ","`fecha`, ","`hora`, ","`idClasificacionGastos`, ","`idLineaPolitica`"),array(":nombreActividades, ",":fecha, ",":hora, ",":idClasificacionGastos, ",":idLineaPolitica"),array("$arrayInformacion[0]","$fecha_actual","$hora_actual","$arrayInformacion[1]","$arrayInformacion[2]"),array(":nombreActividades",":fecha",":hora",":idClasificacionGastos",":idLineaPolitica"));

			$maximo=$objeto->getMaximoFuncion('idActividades','poa_actividades');

			$inserta2=$objeto->getInserta('poa_actividades_usuario',array("`idActividadesUsuario`, ","`idUsuario`, ","`idActividades`"),array(":idUsuario, ",":idActividades"),array("$idUsuarioPrincipal","$maximo"),array(":idUsuario",":idActividades"));

			for ($i=0; $i < count($arrayCheckeds); $i++) { 

				$inserta3=$objeto->getInserta('poa_item_actividad',array("`idActividadItem`, ","`idActividad`, ","`idItem`, ","`fecha`, ","`hora`"),array(":idActividad, ",":idItem, ",":fecha, ",":hora"),array("$maximo","$arrayCheckeds[$i]","$fecha_actual","$hora_actual"),array(":idActividad",":idItem",":fecha",":hora"));

			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "tipoOrganismoInserta":

			$arrayInformacion = json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_tipo_organismo', array("`idTipoOrganismo`, ","`nombreTipo`, ","`estado`, ","`idAreaAccion`, ","`idObjetivos`, ","`idAreaEncargada`"),array(":nombreTipo, ",":estado, ",":idAreaAccion, ",":idObjetivos, ",":idAreaEncargada"),array("$arrayInformacion[0]","A","$arrayInformacion[1]","$arrayInformacion[2]","$arrayInformacion[3]"),array(":nombreTipo",":estado",":idAreaAccion",":idObjetivos",":idAreaEncargada"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaAccionInserta":

			$inserta=$objeto->getInserta('poa_area_accion', array("`idAreaAccion`, ","`accion`, ","`estado`"),array(":accion, ",":estado"),array("$agregado","A"),array(":accion",":estado"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "areaEncargadaInserta":

			$inserta=$objeto->getInserta('poa_areaEncargada', array("`idAreaEncargada`, ","`nombreArea`, ","`estado`"),array(":accion, ",":estado"),array("$agregado","A"),array(":accion",":estado"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "grupoGastoInserta":

			$inserta=$objeto->getInserta('poa_clasificaciongastos', array("`idClasificacionGastos`, ","`nombreClasificacionGastos`, ","`estado`, ","`fecha`, ","`hora`"),array(":nombreClasificacionGastos, ",":estado, ",":fecha, ",":hora"),array("$agregado","A","$fecha_actual","$hora_actual"),array(":nombreClasificacionGastos",":estado",":fecha",":hora"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "itemActividadInserta":

			$arrayInformacion=json_decode($arrayInformacion);

			$inserta=$objeto->getInserta('poa_item_actividad', array("`idActividadItem`, ","`idActividad`, ","`idItem`, ","`fecha`, ","`hora`"),array(":idActividad, ",":idItem, ",":fecha, ",":hora"),array("$elemento__escondidoI","$arrayInformacion[0]","$fecha_actual","$hora_actual"),array(":idActividad",":idItem",":fecha",":hora"));


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case  "enviarDesicion":

			$tabla=$tabla;
			$campos=json_decode($campos);
			$parametros=json_decode($parametros);
			$valores=json_decode($valores);
			$parametrosEnvio =json_decode($parametrosEnvio);
			$inserta=$objeto->getInserta($tabla,$campos,$parametros,$valores,$parametrosEnvio);

			$tablaBusqueda="poa_organismo";

			$campoBuscado="correo";

			$valorBuscado="$enviado";

			$buscador=$objeto->getBuscadorInicial($campoBuscado,$tablaBusqueda,'idOrganismo',$valorBuscado);


			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; fue puesto en observación para la aprobación de usuario. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "aprobarSolicitudUsuario":

			$valores=array("activado='D'");
			$actualiza=$objeto->getActualiza__confirmado("poa_organismo",$valores,"idOrganismo",$enviado,"perioIngreso",$aniosPeriodos__ingesos);


			$valores2=array("estado='S'");
			$actualiza2=$objeto->getActualiza__confirmado("poa_observaciones",$valores2,"idOrganismo",$enviado,"perioIngreso",$aniosPeriodos__ingesos);


			$tablaBusqueda="poa_organismo";

			$campoBuscado="correo";

			$valorBuscado="$enviado";

			$buscador=$objeto->getBuscadorInicial($campoBuscado,$tablaBusqueda,'idOrganismo',$valorBuscado);

			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; fue aprobado el usuario, debe esperar de asignación de presupuesto para poder continuar. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case  "aprobacionUsuarioR":


			$valores2=array("estado='C'");
			$actualiza2=$objeto->getActualiza__confirmado("poa_observaciones",$valores2,"idOrganismo",$idOrganismoPrincipal,"perioIngreso",$aniosPeriodos__ingesos);


			/*=============================
			=            Email            =
			=============================*/
			
			$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'<span style="font-weight:bold;">COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATEGICA,</span><br><br>El Organismo Deportivo <span style="font-weight:bold;">'.$nombrePrincipalU.'</span>&nbsp; envió las rectificaciones de aprobación de usuario. Esperar respuesta del ministerio del deporte.</body></html>';

			$emailArray = array($emailPrincipal);
				
			$correosEnviados=$objeto->getEnviarCorreo($emailArray,$bodyMensaje);
			
			
			/*=====  End of Email  ======*/
			

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		//*************************************************** GUARDADO SUELDOS SALARIOS TOTALES **************************************//
		case  "sueldos__salarios__seguimientos_totales":

			$arrayInformacion = json_decode($parametro2);

			
			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="INSERT INTO `poa_seguimiento_sueldos_salarios_total_observaciones`(`sueldoProgramado1`, `aporteProgramado1`, `decimoTercerProgramado1`, `decimoCuartoProgramado1`, `fondosReservaProgramado1`, `compensacionDeshaucioProgramado1`, `despidoIntepestivoProgramado1`, `reunciaVoluntariaProgramado1`, `compesacionDesaucioProgramado1`, `Observaciones_sueldos`, `Observaciones_aporteiess`, `Observaciones_decimoTercero`, `Observaciones_decimoCuarto`, `Observaciones_fondosReserva`, `Observaciones_compensacionDeshaucio`, `Observaciones_despidoInteespestivo`, `Observaciones_renunciaVol`, `Observaciones_compensacionVacaciones`, `idSueldos`, `perioIngreso`, `idOrganismo`) VALUES ('$arrayInformacion[0]','$arrayInformacion[1]','$arrayInformacion[2]','$arrayInformacion[3]','$arrayInformacion[4]','$arrayInformacion[5]','$arrayInformacion[6]','$arrayInformacion[7]','$arrayInformacion[8]','$arrayInformacion[9]','$arrayInformacion[10]','$arrayInformacion[11]','$arrayInformacion[12]','$arrayInformacion[13]','$arrayInformacion[14]','$arrayInformacion[15]','$arrayInformacion[16]','$arrayInformacion[17]','$arrayInformacion[18]','$aniosPeriodos__ingesos','$idOrganismoSession');";
		 	$resultado= $conexionEstablecida->exec($query); 	


			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		//*************************************************** DECLARACION DE RECURSOS PUBLICOS **************************************//
		case  "guardar_declaracion_recusos":
			$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
			$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_recursos_publicos/";
			$documento=$objeto->getEnviarPdf($_FILES["declaracion_rp"]['type'],$_FILES["declaracion_rp"]['size'],$_FILES["declaracion_rp"]['tmp_name'],$_FILES["declaracion_rp"]['name'],$direccion1,$nombre__archivo);
		

			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();			
		
				$query="INSERT INTO `poa_seguimiento_declaracion`(`documento`, `idOrganismo`, `fecha`, `trimestre`, `perioIngreso`, `hora`) VALUES ('$nombre__archivo','$idOrganismo','$fecha_actual','$trimestre','$aniosPeriodos__ingesos','$hora_actual')";		
			
			$resultado= $conexionEstablecida->exec($query);
		
		
			 $mensaje=1;
			 $jason['mensaje']=$mensaje;	
		break;

		//*************************************************** DECLARACION DE CONTRATACION PUBLICA **************************************//
		case  "guardar_contratacion__publica":
			$nombre__archivo=$fecha_actual."__".$idOrganismo."__".$hora_actual2."__.pdf";
			$direccion1=VARIABLE__BACKEND."seguimiento/declaracion_contratacion_publica/";
			$documento=$objeto->getEnviarPdf($_FILES["declaracion_cp"]['type'],$_FILES["declaracion_cp"]['size'],$_FILES["declaracion_cp"]['tmp_name'],$_FILES["declaracion_cp"]['name'],$direccion1,$nombre__archivo);
			
			$conexionRecuperada= new conexion();
			$conexionEstablecida=$conexionRecuperada->cConexion();	
				
				$query="INSERT INTO `poa_seguimiento_declaracion_contratacion_publica`(`documento`, `fecha`, `hora`, `trimestre`, `IdOrganismo`, `perioIngreso`) VALUES ('$nombre__archivo','$fecha_actual','$hora_actual','$trimestre','$idOrganismo','$aniosPeriodos__ingesos')";
			
				$resultado= $conexionEstablecida->exec($query);

			 $mensaje=1;
			 $jason['mensaje']=$mensaje;	
		break;


	}

	echo json_encode($jason);





