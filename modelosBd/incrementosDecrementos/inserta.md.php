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

		

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

	if(isset($_SESSION["idUsuario"])){
		$idFuncionario=$_SESSION["idUsuario"];
	}

	
	$objeto= new usuarioAcciones();

	function numeroEnLetras($numero) {
		$formatter = new \NumberFormatter('es', \NumberFormatter::SPELLOUT);
		return $formatter->format($numero);
	}

	function fechaObservacionDias($fechaSync)
	{
		$fechaFin = clone $fechaSync;
		$fechaFin->add(new DateInterval('P5D'));

		$fechaFinObservacion = $fechaFin->format('Y-m-d');

		return $fechaFinObservacion;
	};

	// function valoresTotalesMeses($idOrganismo,$idProgramacion,$periodo){
	// 	$objeto= new usuarioAcciones();

	// 	$valoresMeses=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_programacion_financiera_incremento WHERE IdOrganismo='$idOrganismo' AND perioIngreso='$periodo' AND idProgramacionFinanciera='$idProgramacion';");

	// 	$valoresMesesIncremento=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_incrementos_tramites WHERE IdOrganismo='$idOrganismo' AND perioIngreso='$periodo' AND idItemProF='$idProgramacion';");

	// 	$total=0;

	// 	$sumaValorEnero = round(floatval($valoresMeses[0][enero]) + floatval($valoresMesesIncremento[0][enero]),2);

	// 	$sumaValorFebrero = round(floatval($valoresMeses[0][febrero]) + floatval($valoresMesesIncremento[0][febrero]),2);

	// 	$sumaValorMarzo = round(floatval($valoresMeses[0][marzo]) + floatval($valoresMesesIncremento[0][marzo]),2);

	// 	$sumaValorAbril = round(floatval($valoresMeses[0][abril]) + floatval($valoresMesesIncremento[0][abril]),2);

	// 	$sumaValorMayo = round(floatval($valoresMeses[0][mayo]) + floatval($valoresMesesIncremento[0][mayo]),2);

	// 	$sumaValorJunio = round(floatval($valoresMeses[0][junio]) + floatval($valoresMesesIncremento[0][junio]),2);

	// 	$sumaValorJulio = round(floatval($valoresMeses[0][julio]) + floatval($valoresMesesIncremento[0][julio]),2);

	// 	$sumaValorAgosto = round(floatval($valoresMeses[0][agosto]) + floatval($valoresMesesIncremento[0][agosto]),2);

	// 	$sumaValorSeptiembre = round(floatval($valoresMeses[0][septiembre]) + floatval($valoresMesesIncremento[0][septiembre]),2);

	// 	$sumaValorOctubre = round(floatval($valoresMeses[0][octubre]) + floatval($valoresMesesIncremento[0][octubre]),2);

	// 	$sumaValorNoviembre = round(floatval($valoresMeses[0][noviembre]) + floatval($valoresMesesIncremento[0][noviembre]),2);

	// 	$sumaValorDiciembre = round(floatval($valoresMeses[0][diciembre]) + floatval($valoresMesesIncremento[0][diciembre]),2);

	// 	$total = floatval($sumaValorEnero) + floatval($sumaValorFebrero) + floatval($sumaValorMarzo) + floatval($sumaValorAbril) + floatval($sumaValorMayo) + floatval($sumaValorJunio) + floatval($sumaValorJulio) + floatval($sumaValorAgosto) + floatval($sumaValorSeptiembre) + floatval($sumaValorOctubre) + floatval($sumaValorNoviembre) + floatval($sumaValorDiciembre);

	// 	$valorMeses = array($sumaValorEnero,$sumaValorFebrero,$sumaValorMarzo,$sumaValorAbril,$sumaValorMayo,$sumaValorJunio,$sumaValorJulio,$sumaValorAgosto,$sumaValorSeptiembre,$sumaValorOctubre,$sumaValorNoviembre,$sumaValorDiciembre,round(floatval($total),2));

	// 	return $valorMeses;
	// }

	switch ($tipo) {

		case "incrementos__guardar":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$query="UPDATE poa_inversion AS a INNER JOIN poa_inversion_usuario AS b ON a.idInversion=b.idInversion SET a.estado='I' WHERE b.idOrganismo='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$resultado3= $conexionEstablecida->exec($query);

			$idUsuario__sesion=$_SESSION["idUsuario"];


			$objeto->insertSingleRow('poa_inversion',['nombreInversion','inversionQueda','ejercicioFiscal','estado','fecha','hora','montoAjustado','perioIngreso','totalInversion'],array(':nombreInversion' => $montoTotalIncremento,':inversionQueda' => $montoTotalIncremento,':ejercicioFiscal' => $aniosPeriodos__ingesos."-01-01",':estado' => 'A',':fecha' => $fecha_actual,':hora' => $hora_actual,':montoAjustado' => $montoTotalIncremento,':perioIngreso' => $aniosPeriodos__ingesos,':totalInversion' => $montoIngresadoModificacion__incrementos));


			$maximoE=$objeto->getObtenerInformacionGeneral("SELECT MAX(idInversion) AS maximo FROM poa_inversion;");

			$objeto->insertSingleRow('poa_inversion_usuario',['idUsuario','idInversion','idOrganismo','perioIngreso','incrementoDecremento'],array(':idUsuario' => $idUsuario__sesion,':idInversion' => $maximoE[0][maximo],':idOrganismo' => $idOrganismo,':perioIngreso' => $aniosPeriodos__ingesos,':incrementoDecremento' => "incremento"));
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case "decrementos__guardar":

			$idUsuario__sesion=$_SESSION["idUsuario"];

			$objeto->insertSingleRow('poa_inversion',['nombreInversion','inversionQueda','ejercicioFiscal','estado','fecha','hora','montoAjustado','perioIngreso','totalInversion'],array(':nombreInversion' => $montoTotalIncremento,':inversionQueda' => $montoTotalIncremento,':ejercicioFiscal' => $aniosPeriodos__ingesos."-01-01",':estado' => 'A',':fecha' => $fecha_actual,':hora' => $hora_actual,':montoAjustado' => $montoTotalIncremento,':perioIngreso' => $aniosPeriodos__ingesos,':totalInversion' => $montoIngresadoModificacion__incrementos));


			$maximoE=$objeto->getObtenerInformacionGeneral("SELECT MAX(idInversion) AS maximo FROM poa_inversion;");

			$objeto->insertSingleRow('poa_inversion_usuario',['idUsuario','idInversion','idOrganismo','perioIngreso','incrementoDecremento'],array(':idUsuario' => $idUsuario__sesion,':idInversion' => $maximoE[0][maximo],':idOrganismo' => $idOrganismo,':perioIngreso' => $aniosPeriodos__ingesos,':incrementoDecremento' => "decremento"));

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case "envioOrganismoDeportivo":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			// $compartativos=$objeto->getObtenerInformacionGeneral("SELECT idIncrementos FROM poa_incrementos_ingreso WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

			// if (empty($compartativos[0][idIncrementos])) {
				
			// 	$directorPlani=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

			// 	$objeto->insertSingleRow('poa_incrementos_ingreso',['idUsuario','idOrganismo','fecha','hora','comentario','perioIngreso','estado','tramite'],array(':idUsuario' => $directorPlani[0][id_usuario],':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual,':hora' => $hora_actual,':comentario' => null,':perioIngreso' => $aniosPeriodos__ingesos,':estado' => 'E',':tramite' => $tipoTramite));

				
				
				
			// }

			if($tipoTramite == "incremento"){


				$objeto->insertSingleRow('poa_incrementos_preliminar_envio',['idOrganismo','activo','fecha','hora','planificacion','planificacion2','infraestructura','infraestructura2','subsecretariaAlto','subsecretariaAlto2','subsecretariaActividad','subsecretariaActividad2','financiero','financiero2','planificacionF','perioIngreso','planificacionF2','documentoAlto','documentoDesarrollo','documentoInstalaciones','documentoAdministrativo','documentoPlanificacion','documentoInfraestructura','instalaciones','instalaciones2'],array(':idOrganismo' => $idOrganismoSession,':activo' => 'A',':fecha' => $fecha_actual,':hora' => $hora_actual,':planificacion' => null,':planificacion2' => null,':infraestructura' => '0',':infraestructura2' => null,':subsecretariaAlto' => null,':subsecretariaAlto2' => null,':subsecretariaActividad' => null,':subsecretariaActividad2' => null,':financiero' => '0',':financiero2' => null,':planificacionF' => null,':perioIngreso' => $aniosPeriodos__ingesos,':planificacionF2' => null,':documentoAlto' => null,':documentoDesarrollo' => null,':documentoInstalaciones' => null,':documentoAdministrativo' => null,':documentoPlanificacion' => null,':documentoInfraestructura' => null,':instalaciones' => null,':instalaciones2' => null));

				$maximoPreeliminar = $objeto->getObtenerInformacionGeneral("SELECT MAX(idPoaIncremento) AS maximo FROM poa_incrementos_preliminar_envio;");

				$conexionRecuperada= new conexion();
		 		$conexionEstablecida=$conexionRecuperada->cConexion();	

				$query1="UPDATE poa_incrementos_tramites SET estado='E',idPoaIncremento='".$maximoPreeliminar[0][maximo]."' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession' AND estado='G';";

				$resultado3= $conexionEstablecida->exec($query1);

			}else if($tipoTramite == "decremento"){

				$directorPlani=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

				$objeto->insertSingleRow('poa_incrementos_ingreso',['idUsuario','idOrganismo','fecha','hora','comentario','perioIngreso','estado','tramite'],array(':idUsuario' => $directorPlani[0][id_usuario],':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual,':hora' => $hora_actual,':comentario' => null,':perioIngreso' => $aniosPeriodos__ingesos,':estado' => 'E',':tramite' => $tipoTramite));

				$conexionRecuperada= new conexion();
		 		$conexionEstablecida=$conexionRecuperada->cConexion();	
				
				$query4="UPDATE poa_incrementos_tramites SET estado='E' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession';";

				$resultado3= $conexionEstablecida->exec($query4);
			}


			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case "observar__incrementos__decrementos":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


			$query="UPDATE poa_incrementos_ingreso SET estado='O',comentario='$comentario' WHERE idIncrementos='$idIncrementos';";
			$resultado= $conexionEstablecida->exec($query);

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;


		case "incrementos__guardar__resolucion":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$nombre__archivo=$idOrganismo."__".$fecha_actual.".pdf";

			$direccion1=VARIABLE__BACKEND ."incrementosDecrementos/resolucionDirectorPlanificacion/";

			$inversionUsuario__max=$objeto->getObtenerInformacionGeneral("SELECT idInversionUsuario FROM poa_inversion_usuario WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idInversionUsuario DESC LIMIT 1;");


			$documento=$objeto->getEnviarPdf($_FILES["documentoFinal"]['type'],$_FILES["documentoFinal"]['size'],$_FILES["documentoFinal"]['tmp_name'],$_FILES["documentoFinal"]['name'],$direccion1,$nombre__archivo);

			$objeto->insertSingleRow('poa_incrementos_ingreso_final',['idOrganismo','perioIngreso','fecha','hora','tipoTramite','idPreliminar','techoActual','documento','numeroResolucion'],array(':idOrganismo' => $idOrganismo,':perioIngreso' => $aniosPeriodos__ingesos,':fecha' => $fechaResolucion,':hora' => $hora_actual,':tipoTramite' => $tipoTramite,':idPreliminar' => $idPreeliminar,':techoActual' => $valorTecho,':documento' => $nombre__archivo,':numeroResolucion' => $resolucion));


			// $query="DELETE FROM poa_incrementos_ingreso  WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			// $resultado= $conexionEstablecida->exec($query);

			// $query2="DELETE FROM poa_programacion_financiera_incremento WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			// $resultado= $conexionEstablecida->exec($query2);

			$query2="UPDATE poa_incrementos_preliminar_envio SET planificacionF='T',planificacionF2='T',activo='I' WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND activo='A';";
			$resultado2= $conexionEstablecida->exec($query2);

			$query3="UPDATE poa_inversion_usuario SET incrementoDecremento=NULL WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado2= $conexionEstablecida->exec($query3);

			$Inversion=$objeto->getObtenerInformacionGeneral("SELECT a2.idInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo='$idOrganismo' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a2.idInversion DESC LIMIT 1;");

			$query5="UPDATE poa_inversion SET totalInversion=NULL WHERE idInversion='".$Inversion[0][idInversion]."' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado3= $conexionEstablecida->exec($query5);

			$query4="UPDATE poa_incrementos_notificacion SET estado='T' WHERE idOrganismo='$idOrganismo' AND tramite='$tipoTramite' AND perioIngreso='$aniosPeriodos__ingesos';";
			$resultado3= $conexionEstablecida->exec($query4);

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		break;

		case "incrementos__guardar__notificacion":
			
			$montoNotificaLetras = numeroEnLetras($montoIncremento);
			
			if($tipoTramite == "Incremento"){
				$tipoTramite2 = "incremento";
			}else if($tipoTramite == "Decremento"){
				$tipoTramite2 = "decremento";
			}
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			 $query="INSERT INTO poa_incrementos_programacion_financiera (idProgramacionFinanciera, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, totalSumaItem, totalTotales, quedaActividadFinanciera, quedaItemFinanciero, idOrganismo, idItem, idActividad, idProgramatica, fecha, hora, calificacion, observaciones, estadoTransaccional, stringObservacionCeroArray, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,fechaTramite,tipoTramite,estado)
			 SELECT idProgramacionFinanciera, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, totalSumaItem, totalTotales, quedaActividadFinanciera, quedaItemFinanciero, idOrganismo, idItem, idActividad, idProgramatica, fecha, hora, calificacion, observaciones, estadoTransaccional, stringObservacionCeroArray, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,'$fecha_actual','$tipoTramite2','A' FROM poa_programacion_financiera WHERE perioIngreso='$aniosPeriodos__ingesos' AND  idOrganismo='$idOrganismo';";
 
			 $resultado= $conexionEstablecida->exec($query);


			 $query2="INSERT INTO poa_incrementos_administrativas (idActividadAd, justificacionActividad, cantidadBien, idProgramacionFinanciera, fecha, modifica, perioIngreso, fechaTramite,tipoTramite,estado)
			 SELECT a.idActividadAd,a.justificacionActividad,a.cantidadBien,a.idProgramacionFinanciera,a.fecha,a.modifica,a.perioIngreso,'$fecha_actual','$tipoTramite2','A' FROM poa_actividadesadministrativas AS a INNER JOIN poa_incrementos_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='1' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera;";

			$resultado= $conexionEstablecida->exec($query2);

			$query3="INSERT INTO poa_incrementos_mantenimiento (idMantenimiento, nombreInfras, provincia, direccionCompleta, estado, tipoRecursos, tipoIntervencion, detallarTipoIn, tipoMantenimiento, materialesServicios, fechaUltimo, idProgramacionFinanciera, fecha, modifica, perioIngreso, idOrganismo, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, enero2, febrero2, marzo2, abril2, mayo2, junio2,julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,fechaTramite,tipoTramite,estadoT)
			SELECT zL.idMantenimiento, zL.nombreInfras, zL.provincia, zL.direccionCompleta, zL.estado, zL.tipoRecursos, zL.tipoIntervencion, zL.detallarTipoIn, zL.tipoMantenimiento, zL.materialesServicios, zL.fechaUltimo, zL.idProgramacionFinanciera, zL.fecha, zL.modifica, zL.perioIngreso, zL.idOrganismo, zL.enero, zL.febrero, zL.marzo, zL.abril, zL.mayo, zL.junio, zL.julio, zL.agosto, zL.septiembre, zL.octubre, zL.noviembre, zL.diciembre, zL.total, zL.enero2, zL.febrero2, zL.marzo2, zL.abril2, zL.mayo2, zL.junio2,zL.julio2, zL.agosto2, zL.septiembre2, zL.octubre2, zL.noviembre2, zL.diciembre2, zL.total2,'$fecha_actual','$tipoTramite2','A' FROM poa_programacion_financiera AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY zL.idProgramacionFinanciera ORDER BY zL.idMantenimiento;";

			$resultado= $conexionEstablecida->exec($query3);


			for($i = 1; $i < 8; $i++){
				$query4="INSERT INTO poa_incrementos_actdeportivas (idPda, tipoFinanciamiento, nombreEvento, Deporte, provincia, ciudadPais, alcance, fechaInicio, fechaFin, genero, categoria, numeroEntreandores, numeroAtletas, total, mBenefici, hBenefici, justificacionAd, canitdarBie, idProgramacionFinanciera, fecha, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, totalElem, detalleBien, modifica, perioIngreso, idOrganismo, estadoP, idActividad, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,fechaTramite,tipoTramite,estado)
				SELECT a.idPda, a.tipoFinanciamiento, a.nombreEvento, a.Deporte, a.provincia, a.ciudadPais, a.alcance, a.fechaInicio, a.fechaFin, a.genero, a.categoria, a.numeroEntreandores, a.numeroAtletas, a.total, a.mBenefici, a.hBenefici, a.justificacionAd, a.canitdarBie, a.idProgramacionFinanciera, a.fecha, a.enero, a.febrero, a.marzo, a.abril, a.mayo, a.junio, a.julio, a.agosto, a.septiembre, a.octubre, a.noviembre, a.diciembre, a.totalElem, a.detalleBien, a.modifica, a.perioIngreso, a.idOrganismo, a.estadoP, a.idActividad, a.enero2, a.febrero2, a.marzo2, a.abril2, a.mayo2, a.junio2, a.julio2, a.agosto2, a.septiembre2, a.octubre2, a.noviembre2, a.diciembre2, a.total2,'$fecha_actual','$tipoTramite2','A' FROM poa_programacion_financiera AS b INNER JOIN poa_actdeportivas AS a  ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$idOrganismo' AND b.idActividad='$i' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idItem;";

				$resultado= $conexionEstablecida->exec($query4);
			}

			$direccion = VARIABLE__BACKEND . "incrementosDecrementos/notificacion".$tipoTramite."/";

			$nombre__archivo = $idOrganismo . "__" . "Notificacion" . $tipoTramite . "__" . $fecha_actual . "__" . $hora_actual2.".pdf";

			$documento=$objeto->getEnviarPdf($_FILES["documentoNotifica"]['type'],$_FILES["documentoNotifica"]['size'],$_FILES["documentoNotifica"]['tmp_name'],$_FILES["documentoNotifica"]['name'],$direccion,$nombre__archivo);

			$directorPlani=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

			$inserta=$objeto->insertSingleRow('poa_incrementos_notificacion',['idUsuario','idOrganismo','fecha','hora','perioIngreso','estado','tramite','valorIncremento','valorTechoA','documento'],array(':idUsuario' => $directorPlani[0][id_usuario],':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':perioIngreso' => $aniosPeriodos__ingesos,':estado' => 'E',':tramite' => $tipoTramite,':valorIncremento' => $montoIncremento,':valorTechoA' => $montoNuevoTecho,':documento' => $nombre__archivo));


			// $informacionCompleto = $objeto->getInformacionCompletaOrganismoDeportivoConsu($idOrganismo);

			// if($tipoTramite=="Incremento"){

			// 	$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'Por parte del Ministerio del Deporte:<br><br><br>Me permito notificar el incremento a la asignación presupuestaria correspondiente al gasto corriente, para el presente ejercicio fiscal, por el monto de $'.$montoIncremento .' ('.$montoNotificaLetras .'), sin incluir el valor del cinco por mil.<br><br><br> Finalmente, se solicita continuar con el proceso de ingreso de información en el aplicativo conforme las directrices y lineamientos vigentes y a su vez se le recomienda revisar la nueva pestaña del aplicativo con el nombre del tramite para este caso '. $tipoTramite.' donde encontrará el apartado reportería, donde podra visualizar el documento correspondiente a esta notificación.<br><br><br>Con sentimientos de distinguida consideración <br><br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

			// 	// $emailArray = array($informacionCompleto[0][correo]);
			// 	$emailArray = array("brandonfer99@gmail.com");
					
			// 	$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Notificación de Incremento correspondiente al POA $aniosPeriodos__ingesos");

			// }else if($tipoTramite=="Decremento"){

			// 	$bodyMensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POA Notificación</title><style type="text/css">body {background:#EEE; padding:30px; font-size:16px;}'.'</style>'.'</head>'.'Por parte del Ministerio del Deporte:<br><br><br>Me permito notificar el decremento a la asignación presupuestaria correspondiente al gasto corriente, para el presente ejercicio fiscal, por el monto de $'.$montoIncremento .' ('.$montoNotificaLetras .'), sin incluir el valor del cinco por mil.<br><br><br> Finalmente, se solicita continuar con el proceso de ingreso de información en el aplicativo conforme las directrices y lineamientos vigentes y a su vez se le recomienda revisar la nueva pestaña del aplicativo con el nombre del tramite para este caso '. $tipoTramite.' donde encontrará el apartado reportería, donde podra visualizar el documento correspondiente a esta notificación.<br><br><br>Con sentimientos de distinguida consideración <br><br><br>Atentamente,<br><br><span style="font-weight:bold;">DIRECCIÓN DE PLANIFICACIÓN E INVERSIÓN</span><br><span style="font-weight:bold;">MINISTERIO DEL DEPORTE</span></body></html>';
				

			// 	// $emailArray = array($informacionCompleto[0][correo]);
			// 	$emailArray = array("brandonfer99@gmail.com");
					
			// 	$correosEnviados=$objeto->getEnviarCorreoDosParametros2023($emailArray,$bodyMensaje,"Notificación de Decremento correspondiente al POA $aniosPeriodos__ingesos");
			// }

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "incrementos_guardar_tramite":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$valoresMeses = array();


			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$direccion = VARIABLE__BACKEND . "incrementosDecrementos/anexos/";

			if(($_FILES["documento"]['tmp_name'] == "") || ($_FILES["documento"]['tmp_name'] == " ") || ($_FILES["documento"]['tmp_name'] == null)){
				$nombre__archivo = "";
			}else{
				$nombre__archivo = $idOrganismo . "__" . "Anexo" . $tramite . "__" . $fecha_actual . "__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);
			}

			$inserta=$objeto->insertSingleRow('poa_incrementos_tramites',['idActividad','nombreEvento','nombreInfra','idItemProF','idItemPresupuestario','idOrganismo','fecha','justificacion','documento','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','estado','tramite','perioIngreso','totalIncrementoEje','idPoaIncremento','eneroP','febreroP','marzoP','abrilP','mayoP','junioP','julioP','agostoP','septiembreP','octubreP','noviembreP','diciembreP','totalP','eneroR','febreroR','marzoR','abrilR','mayoR','junioR','julioR','agostoR','septiembreR','octubreR','noviembreR','diciembreR','totalR'],array(':idActividad' => $idActividad,':nombreEvento' => $valorEventoNormal,':nombreInfra' => $nombreInfra,':idItemProF' => $idItemProF,':idItemPresupuestario' => $idItemPresupuestario,':idOrganismo' => $idOrganismoSession,':fecha' => $fecha_actual,':justificacion' => $justificacion,':documento' => $nombre__archivo,':enero' => $enero,':febrero' => $febrero,':marzo' => $marzo,':abril' => $abril,':mayo' => $mayo,':junio' => $junio,':julio' => $julio,':agosto' => $agosto,':septiembre' => $septiembre,':octubre' => $octubre,':noviembre' => $noviembre,':diciembre' => $diciembre,':estado' => 'G',':tramite' => $tramite,':perioIngreso' => $aniosPeriodos__ingesos,':totalIncrementoEje' => $totalEjecutado,':idPoaIncremento' => null,':eneroP' => $eneroP,':febreroP' => $febreroP,':marzoP' => $marzoP,':abrilP' => $abrilP,':mayoP' => $mayoP,':junioP' => $junioP,':julioP' => $julioP,':agostoP' => $agostoP,':septiembreP' => $septiembreP,':octubreP' => $octubreP,':noviembreP' => $noviembreP,':diciembreP' => $diciembreP,':totalP' => $totalP,':eneroR' => $eneroR,':febreroR' => $febreroR,':marzoR' => $marzoR,':abrilR' => $abrilR,':mayoR' => $mayoR,':junioR' => $junioR,':julioR' => $julioR,':agostoR' => $agostoR,':septiembreR' => $septiembreR,':octubreR' => $octubreR,':noviembreR' => $noviembreR,':diciembreR' => $diciembreR,':totalR' => $totalR));


			$maximoTramite = $objeto->getObtenerInformacionGeneral("SELECT MAX(idTramiteIncremento) AS maximo from poa_incrementos_tramites
			");

			if(intval($idActividad) == 1){


				if($tramite == "incremento"){
					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

				}else{
					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__destino($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);
				}
				

				// $mesesAdministrativos ="UPDATE poa_programacion_financiera SET enero='$eneroR',febrero='$febreroR',marzo='$marzoR',abril='$abrilR',mayo='$mayoR',junio='$junioR',julio='$julioR',agosto='$agostoR',septiembre='$septiembreR',octubre='$octubreR',noviembre='$noviembreR',diciembre='$diciembreR',totalSumaItem='$totalR',totalTotales='$totalR' WHERE idProgramacionFinanciera='$idItemProF' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession' AND idActividad='$idActividad';";

				// $resultadoP= $conexionEstablecida->exec($mesesAdministrativos);

			}
			else if(intval($idActividad) == 2){
				
				if($tramite == "incremento"){
					$obtencionRetorno=$objeto->actualizarProgramacion__matenimiento__modificaciones__origen($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

				}else{
					$obtencionRetorno=$objeto->actualizarProgramacion__matenimiento__modificaciones__destino($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__destino($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);
				}

				

				// $mesesMantenimiento = $objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_mantenimiento WHERE idProgramacionFinanciera='$idItemProF' AND perioIngreso='$aniosPeriodos__ingesos' AND nombreInfras='$nombreInfra';");

				// $eneroM = $mesesMantenimiento[0][enero];
				// $febreroM = $mesesMantenimiento[0][febrero];
				// $marzoM = $mesesMantenimiento[0][marzo];
				// $abrilM = $mesesMantenimiento[0][abril];
				// $mayoM = $mesesMantenimiento[0][mayo];
				// $junioM = $mesesMantenimiento[0][junio];
				// $julioM = $mesesMantenimiento[0][julio];
				// $agostoM = $mesesMantenimiento[0][agosto];
				// $septiembreM = $mesesMantenimiento[0][septiembre];
				// $octubreM = $mesesMantenimiento[0][octubre];
				// $noviembreM = $mesesMantenimiento[0][noviembre];
				// $diciembreM = $mesesMantenimiento[0][diciembre];

				// $totalM = floatval($eneroM) + floatval($febreroM) + floatval($marzoM) + floatval($abrilM) + floatval($mayoM) + floatval($junioM) + floatval($julioM) + floatval($agostoM) + floatval($septiembreM) + floatval($octubreM) + floatval($noviembreM) + floatval($diciembreM);

				// $mesesProgramacion = $objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idItemProF' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

				// $eneroPro = $mesesProgramacion[0][enero];
				// $febreroPro = $mesesProgramacion[0][febrero];
				// $marzoPro = $mesesProgramacion[0][marzo];
				// $abrilPro = $mesesProgramacion[0][abril];
				// $mayoPro = $mesesProgramacion[0][mayo];
				// $junioPro = $mesesProgramacion[0][junio];
				// $julioPro = $mesesProgramacion[0][julio];
				// $agostoPro = $mesesProgramacion[0][agosto];
				// $septiembrePro = $mesesProgramacion[0][septiembre];
				// $octubrePro = $mesesProgramacion[0][octubre];
				// $noviembrePro = $mesesProgramacion[0][noviembre];
				// $diciembrePro = $mesesProgramacion[0][diciembre];

				// $totalPro = floatval($eneroPro) + floatval($febreroPro) + floatval($marzoPro) + floatval($abrilPro) + floatval($mayoPro) + floatval($junioPro) + floatval($julioPro) + floatval($agostoPro) + floatval($septiembrePro) + floatval($octubrePro) + floatval($noviembrePro) + floatval($diciembrePro);

				// $restaMesEnero=floatval($eneroPro)-floatval($eneroM);
				// $restaMesFebrero=floatval($febreroPro)-floatval($febreroM);
				// $restaMesMarzo=floatval($marzoPro)-floatval($marzoM);
				// $restaMesAbril=floatval($abrilPro)-floatval($abrilM);
				// $restaMesMayo=floatval($mayoPro)-floatval($mayoM);
				// $restaMesJunio=floatval($junioPro)-floatval($junioM);
				// $restaMesJulio=floatval($julioPro)-floatval($julioM);
				// $restaMesAgosto=floatval($agostoPro)-floatval($agostoM);
				// $restaMesSeptiembre=floatval($septiembrePro)-floatval($septiembreM);
				// $restaMesOctubre=floatval($octubrePro)-floatval($octubreM);
				// $restaMesNoviembre=floatval($noviembrePro)-floatval($noviembreM);
				// $restaMesDiciembre=floatval($diciembrePro)-floatval($diciembreM);

				// $restaTotal=floatval($totalPro)-floatval($totalM);

				// $totalIncremento = floatval($restaTotal)+ floatval($totalR);

				// $incrementoEnero = floatval($restaMesEnero) + floatval($eneroR);
				// $incrementoFebrero = floatval($restaMesFebrero) + floatval($febreroR);
				// $incrementoMarzo = floatval($restaMesMarzo) + floatval($marzoR);
				// $incrementoAbril = floatval($restaMesAbril) + floatval($abrilR);
				// $incrementoMayo = floatval($restaMesMayo) + floatval($mayoR);
				// $incrementoJunio = floatval($restaMesJunio) + floatval($junioR);
				// $incrementoJulio = floatval($restaMesJulio) + floatval($julioR);
				// $incrementoAgosto = floatval($restaMesAgosto) + floatval($agostoR);
				// $incrementoSeptiembre = floatval($restaMesSeptiembre) + floatval($septiembreR);
				// $incrementoOctubre = floatval($restaMesOctubre) + floatval($octubreR);
				// $incrementoNoviembre = floatval($restaMesNoviembre) + floatval($noviembreR);
				// $incrementoDiciembre = floatval($restaMesDiciembre) + floatval($diciembreR);

				// $programacionUpdate="UPDATE poa_programacion_financiera SET enero='$incrementoEnero',febrero='$incrementoFebrero',marzo='$incrementoMarzo',abril='$incrementoAbril',mayo='$incrementoMayo',junio='$incrementoJunio',julio='$incrementoJulio',agosto='$incrementoAgosto',septiembre='$incrementoSeptiembre',octubre='$incrementoOctubre',noviembre='$incrementoNoviembre',diciembre='$incrementoDiciembre',totalSumaItem='$totalIncremento',totalTotales='$totalIncremento' WHERE idProgramacionFinanciera='$idItemProF' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession';";

				// $resultadoP= $conexionEstablecida->exec($programacionUpdate);

				//Verificacion de Modificacion
				// $valorModificacion = $objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_mantenimiento WHERE idProgramacionFinanciera='$idItemProF' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");
				// if(){

				// }
				// $mantenimientoUpdate="UPDATE poa_mantenimiento AS zL INNER JOIN poa_programacion_financiera AS b ON zL.idProgramacionFinanciera = b.idProgramacionFinanciera
				// INNER JOIN poa_item AS c ON c.idItem = b.idItem SET zL.enero = '$eneroR', zL.febrero = '$febreroR', zL.marzo = '$marzoR',zL.abril = '$abrilR', zL.mayo = '$mayoR', zL.junio = '$junioR',zL.julio = '$julioR', zL.agosto = '$agostoR', zL.septiembre = '$septiembreR',zL.octubre = '$octubreR', zL.noviembre ='$noviembreR', zL.diciembre = '$diciembreR',zL.total = '$totalR' WHERE b.idOrganismo = '$idOrganismoSession' AND b.idActividad = '2' AND b.perioIngreso = '$aniosPeriodos__ingesos' AND zL.idProgramacionFinanciera = '$idItemProF' AND zL.nombreInfras = '$nombreInfra';";

				// $resultado3= $conexionEstablecida->exec($mantenimientoUpdate);

			}else if($idActividad == 4){

				$inserta=$objeto->insertSingleRow('poa_incrementos_bonificaciones',['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','idTramiteIncremento','tipoBonificacion','estado'],array(':enero' => $eneroI,':febrero' => $febreroI,':marzo' => $marzoI,':abril' => $abrilI,':mayo' => $mayoI,':junio' => $junioI,':julio' => $julioI,':agosto' => $agostoI,':septiembre' => $septiembreI,':octubre' => $octubreI,':noviembre' => $noviembreI,':diciembre' => $diciembreI,':idTramiteIncremento' => $maximoTramite[0][maximo],':tipoBonificacion' => $tipoP,':estado' => 'A'));

			}else if(($idActividad == 3) || ($idActividad == 5) || ($idActividad == 6) || ($idActividad == 7)){

				if($tramite == "incremento"){
					$obtencionRetorno=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__origen($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

				}else{
					$obtencionRetorno=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__destino($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);

					$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__destino($idItemProF,[$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre]);
				}

				// $mesesActividades = $objeto->getObtenerInformacionGeneral("SELECT a.enero, a.febrero, a.marzo, a.abril, a.mayo, a.junio, a.julio, a.agosto, a.septiembre, a.octubre, a.noviembre, a.diciembre FROM poa_programacion_financiera AS b INNER JOIN poa_actdeportivas AS a  ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$idOrganismoSession' AND b.idActividad='$idActividad' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idProgramacionFinanciera='$idItemProF' AND a.nombreEvento = '$nombreEvento' ORDER BY b.idItem;");

				// $eneroA = $mesesActividades[0][enero];
				// $febreroA = $mesesActividades[0][febrero];
				// $marzoA = $mesesActividades[0][marzo];
				// $abrilA = $mesesActividades[0][abril];
				// $mayoA = $mesesActividades[0][mayo];
				// $junioA = $mesesActividades[0][junio];
				// $julioA = $mesesActividades[0][julio];
				// $agostoA = $mesesActividades[0][agosto];
				// $septiembreA = $mesesActividades[0][septiembre];
				// $octubreA = $mesesActividades[0][octubre];
				// $noviembreA = $mesesActividades[0][noviembre];
				// $diciembreA = $mesesActividades[0][diciembre];

				// $totalA = floatval($eneroA) + floatval($febreroA) + floatval($marzoA) + floatval($abrilA) + floatval($mayoA) + floatval($junioA) + floatval($julioA) + floatval($agostoA) + floatval($septiembreA) + floatval($octubreA) + floatval($noviembreA) + floatval($diciembreA);

				// $mesesProgramacion = $objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idItemProF' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

				// $eneroPro = $mesesProgramacion[0][enero];
				// $febreroPro = $mesesProgramacion[0][febrero];
				// $marzoPro = $mesesProgramacion[0][marzo];
				// $abrilPro = $mesesProgramacion[0][abril];
				// $mayoPro = $mesesProgramacion[0][mayo];
				// $junioPro = $mesesProgramacion[0][junio];
				// $julioPro = $mesesProgramacion[0][julio];
				// $agostoPro = $mesesProgramacion[0][agosto];
				// $septiembrePro = $mesesProgramacion[0][septiembre];
				// $octubrePro = $mesesProgramacion[0][octubre];
				// $noviembrePro = $mesesProgramacion[0][noviembre];
				// $diciembrePro = $mesesProgramacion[0][diciembre];

				// $totalPro = floatval($eneroPro) + floatval($febreroPro) + floatval($marzoPro) + floatval($abrilPro) + floatval($mayoPro) + floatval($junioPro) + floatval($julioPro) + floatval($agostoPro) + floatval($septiembrePro) + floatval($octubrePro) + floatval($noviembrePro) + floatval($diciembrePro);

				// $restaMesEnero=floatval($eneroPro)-floatval($eneroA);
				// $restaMesFebrero=floatval($febreroPro)-floatval($febreroA);
				// $restaMesMarzo=floatval($marzoPro)-floatval($marzoA);
				// $restaMesAbril=floatval($abrilPro)-floatval($abrilA);
				// $restaMesMayo=floatval($mayoPro)-floatval($mayoA);
				// $restaMesJunio=floatval($junioPro)-floatval($junioA);
				// $restaMesJulio=floatval($julioPro)-floatval($julioA);
				// $restaMesAgosto=floatval($agostoPro)-floatval($agostoA);
				// $restaMesSeptiembre=floatval($septiembrePro)-floatval($septiembreA);
				// $restaMesOctubre=floatval($octubrePro)-floatval($octubreA);
				// $restaMesNoviembre=floatval($noviembrePro)-floatval($noviembreA);
				// $restaMesDiciembre=floatval($diciembrePro)-floatval($diciembreA);

				// $restaTotal=floatval($totalPro)-floatval($totalA);

				// $totalIncremento = floatval($restaTotal)+ floatval($totalR);

				// $incrementoEnero = floatval($restaMesEnero) + floatval($eneroR);
				// $incrementoFebrero = floatval($restaMesFebrero) + floatval($febreroR);
				// $incrementoMarzo = floatval($restaMesMarzo) + floatval($marzoR);
				// $incrementoAbril = floatval($restaMesAbril) + floatval($abrilR);
				// $incrementoMayo = floatval($restaMesMayo) + floatval($mayoR);
				// $incrementoJunio = floatval($restaMesJunio) + floatval($junioR);
				// $incrementoJulio = floatval($restaMesJulio) + floatval($julioR);
				// $incrementoAgosto = floatval($restaMesAgosto) + floatval($agostoR);
				// $incrementoSeptiembre = floatval($restaMesSeptiembre) + floatval($septiembreR);
				// $incrementoOctubre = floatval($restaMesOctubre) + floatval($octubreR);
				// $incrementoNoviembre = floatval($restaMesNoviembre) + floatval($noviembreR);
				// $incrementoDiciembre = floatval($restaMesDiciembre) + floatval($diciembreR);


				// $query3="UPDATE poa_programacion_financiera SET enero='$incrementoEnero',febrero='$incrementoFebrero',marzo='$incrementoMarzo',abril='$incrementoAbril',mayo='$incrementoMayo',junio='$incrementoJunio',julio='$incrementoJulio',agosto='$incrementoAgosto',septiembre='$incrementoSeptiembre',octubre='$incrementoOctubre',noviembre='$incrementoNoviembre',diciembre='$incrementoDiciembre',totalSumaItem='$totalIncremento',totalTotales='$totalIncremento' WHERE idProgramacionFinanciera='$idItemProF' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismoSession' AND idActividad='$idActividad';";

				// $resultado3= $conexionEstablecida->exec($query3);

				// $updateActividadesD="UPDATE poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera = b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem = b.idItem SET a.enero = '$eneroR', a.febrero = '$febreroR', a.marzo = '$marzoR', a.abril = '$abrilR', a.mayo = '$mayoR', a.junio = '$junioR',a.julio = '$julioR', a.agosto = '$agostoR', a.septiembre = '$septiembreR', a.octubre = '$octubreR', a.noviembre = '$noviembreR',a.diciembre = '$diciembreR', a.totalElem = '$totalR' WHERE b.idOrganismo = '$idOrganismoSession' AND b.idActividad = '$idActividad' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.nombreEvento = '$nombreEvento' AND a.idProgramacionFinanciera='$idItemProF';";
	
				// $resultadoUpdate= $conexionEstablecida->exec($updateActividadesD);

			}
			
			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;

		case "observar__incrementos_tramite":

			// $fechaFinObservacion = fechaObservacionDias($fecha_actual);

			$fechaActualizada = new DateTime();

			$fechaFinObservacion = fechaObservacionDias($fechaActualizada);

			$inserta=$objeto->insertSingleRow('poa_incrementos_observaciones',['observacion','fechaEnvioObservacion','fechaFinObservacion','idTramite','perioIngreso'],array(':observacion' => $observacion,':fechaEnvioObservacion' => $fecha_actual,':fechaFinObservacion' => $fechaFinObservacion,':idTramite' => $idTramite,':perioIngreso' => $aniosPeriodos__ingesos));

			$mensaje=1;
			$jason['mensaje']=$mensaje;
			
		break;

		case "guardarInformeAnalistas":

			$informacion__usuarios=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,a.fisicamenteEstructura,a.PersonaACargo FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idFuncionario';");	

				$usuarioRol=$informacion__usuarios[0][id_rol];

				$fisicamenteUs=$informacion__usuarios[0][fisicamenteEstructura];

				$personaCargo=$informacion__usuarios[0][PersonaACargo];

				if($fisicamenteUs == 5 || $fisicamenteUs == 2){
					$tipoFisicamente = "financiero";
				}else if($fisicamenteUs == 6 || $fisicamenteUs == 15 || $fisicamenteUs == 1){
					$tipoFisicamente = "infraestructura";
				}else if($fisicamenteUs == 12 || $fisicamenteUs == 14 || $fisicamenteUs == 24){
					$tipoFisicamente = "altoRendimiento";
				}else if($fisicamenteUs == 13 || $fisicamenteUs == 19 || $fisicamenteUs == 26){
					$tipoFisicamente = "desarrollo";
				}else if($fisicamenteUs == 18 || $fisicamenteUs == 3){
					$tipoFisicamente = "planificacion";
				}

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();

			

			if($identificador == "desarrollo"){

				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/desarrollo/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "d__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);


				if($usuarioRol == 4 || $usuarioRol == 7){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoDesarrollo FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoDesarrollo] != null && $valorDocumento[0][documentoDesarrollo] != ""){
						unlink($direccion.$valorDocumento[0][documentoDesarrollo]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoDesarrollo='$nombre__archivo',subsecretariaActividad2='T',planificacion='99' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoDesarrollo FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoDesarrollo] != null && $valorDocumento[0][documentoDesarrollo] != ""){
						unlink($direccion.$valorDocumento[0][documentoDesarrollo]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoDesarrollo='$nombre__archivo',subsecretariaActividad2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query1="UPDATE poa_incrementos_preliminar_envio SET documentoDesarrollo='$nombre__archivo',subsecretariaActividad='T',subsecretariaActividad2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
					$resultado3= $conexionEstablecida->exec($query1);
	
					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
					$mensaje=1;
					$jason['mensaje']=$mensaje;
				}

				

			}else if($identificador == "altoRendimiento"){
				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/altoRendimiento/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "sa__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);

				if($usuarioRol == 4 || $usuarioRol == 7){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoAlto FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoAlto] != null && $valorDocumento[0][documentoAlto] != ""){
						unlink($direccion.$valorDocumento[0][documentoAlto]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoAlto='$nombre__archivo',subsecretariaAlto2='T',planificacion='99' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoAlto FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoAlto] != null && $valorDocumento[0][documentoAlto] != ""){
						unlink($direccion.$valorDocumento[0][documentoAlto]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoAlto='$nombre__archivo',subsecretariaAlto2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query3="UPDATE poa_incrementos_preliminar_envio SET documentoAlto='$nombre__archivo',subsecretariaAlto='T',subsecretariaAlto2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";

					$resultado3= $conexionEstablecida->exec($query3);

					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));

					$mensaje=1;
					$jason['mensaje']=$mensaje;
				}

				

			}else if($identificador == "planificacion"){
				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/planificacion/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "p__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);

				if($usuarioRol == 4){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoPlanificacion FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoPlanificacion] != null && $valorDocumento[0][documentoPlanificacion] != ""){
						unlink($direccion.$valorDocumento[0][documentoPlanificacion]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoPlanificacion='$nombre__archivo',planificacion2='T',planificacionF='154' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoPlanificacion FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoPlanificacion] != null && $valorDocumento[0][documentoPlanificacion] != ""){
						unlink($direccion.$valorDocumento[0][documentoPlanificacion]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoPlanificacion='$nombre__archivo',planificacion2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query3="UPDATE poa_incrementos_preliminar_envio SET documentoPlanificacion='$nombre__archivo',planificacion='T',planificacion2='$personaCargo',observacionesPlanificacion='$estadoObservacion' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";

					$resultado3= $conexionEstablecida->exec($query3);

					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));

					$mensaje=1;
					$jason['mensaje']=$mensaje;
				}

				
			}else if($identificador == "administrativo"){
				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/administrativo/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "ad__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);


				// $query3="UPDATE poa_incrementos_preliminar_envio SET documentoAdministrativo='$nombre__archivo',financiero='T',financiero2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";

				// 	$resultado3= $conexionEstablecida->exec($query3);

				// 	$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));

				// $mensaje=1;
				// $jason['mensaje']=$mensaje;


				if($usuarioRol == 4){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoAdministrativo FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoAdministrativo] != null && $valorDocumento[0][documentoAdministrativo] != ""){
						unlink($direccion.$valorDocumento[0][documentoAdministrativo]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoAdministrativo='$nombre__archivo',financiero2='T',planificacion='99' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoAdministrativo FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoAdministrativo] != null && $valorDocumento[0][documentoAdministrativo] != ""){
						unlink($direccion.$valorDocumento[0][documentoAdministrativo]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoAdministrativo='$nombre__archivo',financiero2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query1="UPDATE poa_incrementos_preliminar_envio SET documentoAdministrativo='$nombre__archivo',financiero='T',financiero2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
					$resultado3= $conexionEstablecida->exec($query1);
	
					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
					$mensaje=1;
					$jason['mensaje']=$mensaje;
				}
			}else if($identificador == "infraestructura"){
				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/infraestructura/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "inf__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);


				if($usuarioRol == 4){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoInfraestructura FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoInfraestructura] != null && $valorDocumento[0][documentoInfraestructura] != ""){
						unlink($direccion.$valorDocumento[0][documentoInfraestructura]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoInfraestructura='$nombre__archivo',infraestructura2='T',planificacion='99' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoInfraestructura FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoInfraestructura] != null && $valorDocumento[0][documentoInfraestructura] != ""){
						unlink($direccion.$valorDocumento[0][documentoInfraestructura]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoInfraestructura='$nombre__archivo',infraestructura2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query3="UPDATE poa_incrementos_preliminar_envio SET documentoInfraestructura='$nombre__archivo',infraestructura='T',infraestructura2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";

					$resultado3= $conexionEstablecida->exec($query3);

					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));

				$mensaje=1;
				$jason['mensaje']=$mensaje;
				}

				
			}else if($identificador == "instalaciones"){
				$direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/instalaciones/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "ins__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);


				if($usuarioRol == 4){

					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoInstalaciones FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoInstalaciones] != null && $valorDocumento[0][documentoInstalaciones] != ""){
						unlink($direccion.$valorDocumento[0][documentoInstalaciones]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoInstalaciones='$nombre__archivo',instalaciones='T',planificacion='99' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
				}else if($usuarioRol == 2){
	
					$valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoInstalaciones FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");
	
					if($valorDocumento[0][documentoInstalaciones] != null && $valorDocumento[0][documentoInstalaciones] != ""){
						unlink($direccion.$valorDocumento[0][documentoInstalaciones]);
	
						$query1="UPDATE poa_incrementos_preliminar_envio SET documentoInstalaciones='$nombre__archivo',instalaciones2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";
	
						$resultado3= $conexionEstablecida->exec($query1);
	
						$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));
	
						$mensaje=1;
						$jason['mensaje']=$mensaje;
					}
	
								
	
				}else{
	
					$query3="UPDATE poa_incrementos_preliminar_envio SET documentoInstalaciones='$nombre__archivo',instalaciones='T',instalaciones2='$personaCargo' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';";

					$resultado3= $conexionEstablecida->exec($query3);

					$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUs,':perioIngreso' => $aniosPeriodos__ingesos));

				$mensaje=1;
				$jason['mensaje']=$mensaje;
				}

				
			}
				

			
			
		break;

		case "reasignar__Coordinadores__Directores":
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();

			 $informacion__usuarios__envio=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario';");

			 $informacion__usuarios__sesion=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idFuncionario';");	

			 $usuarioRolEnvio=$informacion__usuarios__envio[0][id_rol];
			 $usuarioRolSesion=$informacion__usuarios__sesion[0][id_rol];

			 $fisicamenteUsEnvio=$informacion__usuarios__envio[0][fisicamenteEstructura];
			 $fisicamenteUsSesion=$informacion__usuarios__sesion[0][fisicamenteEstructura];

			 if($fisicamenteUsEnvio == 5 || $fisicamenteUsEnvio == 2){
				 $tipoFisicamente = "financiero";
			 }else if($fisicamenteUsEnvio == 6 || $fisicamenteUsEnvio == 15 || $fisicamenteUs == 1){
				 $tipoFisicamente = "infraestructura";
			 }else if($fisicamenteUsEnvio == 12 || $fisicamenteUsEnvio == 14 || $fisicamenteUs == 24){
				 $tipoFisicamente = "altoRendimiento";
			 }else if($fisicamenteUsEnvio == 13 || $fisicamenteUsEnvio == 19 || $fisicamenteUsEnvio == 26){
				 $tipoFisicamente = "desarrollo";
			 }else if($fisicamenteUsEnvio == 18 || $fisicamenteUsEnvio == 3){
				 $tipoFisicamente = "planificacion";
			 }else if($fisicamenteUsEnvio == 6 || $fisicamenteUsEnvio == 1){
				 $tipoFisicamente = "instalaciones";
			 }

			if($identificador == "financiero"){

				$query1="UPDATE poa_incrementos_preliminar_envio SET financiero='$idUsuario',financiero2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
								
				$resultado= $conexionEstablecida->exec($query1);

			}else if($identificador == "planificacion"){
				$query1="UPDATE poa_incrementos_preliminar_envio SET planificacion='$idUsuario',planificacion2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
									
				$resultado= $conexionEstablecida->exec($query1);

			}else if($identificador == "infraestructura"){
				$query1="UPDATE poa_incrementos_preliminar_envio SET infraestructura='$idUsuario',infraestructura2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
									
				$resultado= $conexionEstablecida->exec($query1);

			}else if($identificador == "instalaciones"){
				$query1="UPDATE poa_incrementos_preliminar_envio SET instalaciones='$idUsuario',instalaciones2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
								
				$resultado= $conexionEstablecida->exec($query1);

			}else if($identificador == "desarrollo"){

				$query1="UPDATE poa_incrementos_preliminar_envio SET subsecretariaActividad='$idUsuario',subsecretariaActividad2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
								
				$resultado= $conexionEstablecida->exec($query1);

			}else if($identificador == "altoRendimiento"){
				$query1="UPDATE poa_incrementos_preliminar_envio SET subsecretariaAlto='$idUsuario',subsecretariaAlto2=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";
								
				$resultado= $conexionEstablecida->exec($query1);
			}

			$inserta=$objeto->insertSingleRow('poa_incrementos_recomienda_tecnicos',['idFuncionario','idOrganismo','fecha','hora','tipoE','observacionesTecnicas','tipo','fisicamente','perioIngreso','idFuncionario2','fisicamente2'],array(':idFuncionario' => $idFuncionario,':idOrganismo' => $idOrganismo,':fecha' => $fecha_actual,':hora' => $hora_actual,':tipoE' => $tipoFisicamente,':observacionesTecnicas' => $observacionesT,':tipo' => $tipoObservacion,':fisicamente' => $fisicamenteUsSesion,':perioIngreso' => $aniosPeriodos__ingesos,':idFuncionario2' => $idUsuario,':fisicamente2' => $fisicamenteUsEnvio));

			$mensaje=1;
			$jason['mensaje']=$mensaje;
			
		break;

		case "valorVariableSesion":
			session_start();
			$_SESSION["idOrganismoSession"] = $idOrganismo;

			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;

		case "guardarObservacionPlanificacion":

			$direccion = VARIABLE__BACKEND . "incrementosDecrementos/observacion/";

				$nombre__archivo = $fecha_actual."__".$idOrganismo. "ob__" . $hora_actual2.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["documento"]['type'],$_FILES["documento"]['size'],$_FILES["documento"]['tmp_name'],$_FILES["documento"]['name'],$direccion,$nombre__archivo);

				$inserta=$objeto->insertSingleRow('poa_incrementos_observaciones',['observacion','fechaEnvioObservacion','fechaFinObservacion','idTramite','perioIngreso','documentoObservacion','estado'],array(':observacion' => $observacionA,':fechaEnvioObservacion' => $fecha_actual,':fechaFinObservacion' => $fechaFin,':idTramite' => $idTramite,':perioIngreso' => $aniosPeriodos__ingesos,':documentoObservacion' => $nombre__archivo,':estado' => 'A'));

				$mensaje=1;
				$jason['mensaje']=$mensaje;

		break;

		case "reasignarIncrementoAreasSinObservaciones":
			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();

			 
			 $direccion = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/altoRendimiento/";
			 $direccion2 = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/desarrollo/";
			 $direccion3 = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/instalaciones/";
			 $direccion4 = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/administrativo/";
			 $direccion5 = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/planificacion/";
			 $direccion6 = VARIABLE__BACKEND . "incrementosDecrementos/informeViabilidad/infraestructura/";
			 
			 

			 $valorDocumento = $objeto->getObtenerInformacionGeneral("SELECT documentoAlto,documentoDesarrollo,documentoInstalaciones,documentoAdministrativo,documentoPlanificacion,documentoInfraestructura FROM  poa_incrementos_preliminar_envio WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento';");

			 $documentoAlto = $valorDocumento[0][documentoAlto];
			 $documentoDesarrollo = $valorDocumento[0][documentoDesarrollo];
			 $documentoInstalaciones = $valorDocumento[0][documentoInstalaciones];
			 $documentoAdministrativo = $valorDocumento[0][documentoAdministrativo];
			 $documentoPlanificacion = $valorDocumento[0][documentoPlanificacion];
			 $documentoInfraestructura = $valorDocumento[0][documentoInfraestructura];

			 $arrayDoc = array($documentoAlto,$documentoDesarrollo,$documentoInstalaciones,$documentoAdministrativo,$documentoPlanificacion,$documentoInfraestructura);

			 $arrayDireccion = array($direccion,$direccion2,$direccion3,$direccion4,$direccion5,$direccion6);

			 
			 for($i = 0; $i <= 5; $i++){
				if($arrayDoc[$i] != null && $arrayDoc[$i] != ""){
					unlink($arrayDireccion[$i].$arrayDoc[$i]);
				}
			 }
			
			 $query1="UPDATE poa_incrementos_preliminar_envio SET planificacion=null,planificacion2=null,infraestructura='0',infraestructura2=null,subsecretariaAlto=null,subsecretariaAlto2=null,subsecretariaActividad=null,subsecretariaActividad2=null,financiero='0',financiero2=null,planificacionF=null,planificacionF2=null,
			 documentoAlto=null,documentoDesarrollo=null,documentoInstalaciones=null,documentoAdministrativo=null,documentoPlanificacion=null,
			 documentoInfraestructura=null,instalaciones=null,instalaciones2=null,observacionesPlanificacion=null WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND idPoaIncremento='$idPoaIncremento' AND activo='A';";

			 $resultado1= $conexionEstablecida->exec($query1);

			 $query2="UPDATE poa_incrementos_observaciones SET estado='I' WHERE perioIngreso='$aniosPeriodos__ingesos' AND idTramite='$idPoaIncremento' AND estado='S';";

			 $resultado1= $conexionEstablecida->exec($query2);

			 $mensaje=1;
			 $jason['mensaje']=$mensaje;

		break;

		case "actualizarEstadoObservacionOrganismo":

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();
			
			 $query1="UPDATE poa_incrementos_observaciones AS a INNER JOIN poa_incrementos_preliminar_envio AS b ON a.idTramite=b.idPoaIncremento SET a.estado='S',a.fechaEnvioOrganismo='$fecha_actual' WHERE b.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.estado='A';";

			 $resultado1= $conexionEstablecida->exec($query1);

			 $mensaje=1;
			 $jason['mensaje']=$mensaje;

		break;

		case "rechazarIncrementoOrganismo":

			$conexionRecuperada= new conexion();
	 		$conexionEstablecida=$conexionRecuperada->cConexion();	

			$elementos=$objeto->getObtenerInformacionGeneral("SELECT idInversionUsuario,idInversion FROM poa_inversion_usuario WHERE idOrganismo='$idOrganismo' AND incrementoDecremento='$tipoTramite' AND perioIngreso='$aniosPeriodos__ingesos';");

			foreach ($elementos as $valor) {

			 	$query="DELETE FROM poa_inversion_usuario WHERE idInversionUsuario='".$valor['idInversionUsuario']."';";
			 	$resultado= $conexionEstablecida->exec($query);


			 	$query2="DELETE FROM poa_inversion WHERE idInversion='".$valor['idInversion']."';";
			 	$resultado2= $conexionEstablecida->exec($query2);

			}

			//Nota: Aqui recordar que se va a recibir el id de la tabla preeliminar envio esto para luego unicamente trabajar con estados
			
			$query3="DELETE a,b FROM poa_incrementos_tramites AS a INNER JOIN poa_incrementos_preliminar_envio AS b ON a.idPoaIncremento = b.idPoaIncremento AND a.idOrganismo = b.idOrganismo WHERE  b.idOrganismo='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos' AND a.estado='E' AND b.idPoaIncremento='$idPoaIncremento';";

			$resultado= $conexionEstablecida->exec($query3);


			$mensaje=1;
			 $jason['mensaje']=$mensaje;

		break;

		case "guardarInformacionProyectoInstalaciones":

			$inserta=$objeto->insertSingleRow('poa_incrementos_observaciones',['observacion','fechaEnvioObservacion','fechaFinObservacion','idTramite','perioIngreso','documentoObservacion','estado'],array(':observacion' => $observacionA,':fechaEnvioObservacion' => $fecha_actual,':fechaFinObservacion' => $fechaFin,':idTramite' => $idTramite,':perioIngreso' => $aniosPeriodos__ingesos,':documentoObservacion' => $nombre__archivo,':estado' => 'A'));

			$mensaje=1;
			$jason['mensaje']=$mensaje;
		break;
	}

	echo json_encode($jason);