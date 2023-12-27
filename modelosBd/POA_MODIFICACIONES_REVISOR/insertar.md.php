<?php
	
	extract($_POST);

	require_once "../../config/config2.php";

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

	/*=====  End of Parametros Iniciales  ======*/
	
	session_start();

		
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idUsuario__ingresos=$_SESSION["idUsuario"];
	$idRol=$_SESSION["idRol"];

	if (isset($_SESSION["fisicamenteEstructura"])) {
		$fisicamenteEstructura__reales=$_SESSION["fisicamenteEstructura"];
	}
	
	$objeto= new usuarioAcciones();


	function getObtenerInformacion__inicial__actividades__deportivas($idPda,$fecha,$idActividad){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT tipoFinanciamiento,nombreEvento,Deporte,provincia,ciudadPais,alcance,fechaInicio,fechaFin,genero,categoria,numeroEntreandores,numeroAtletas,total,mBenefici,hBenefici,justificacionAd,canitdarBie,idProgramacionFinanciera,fecha,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalElem,detalleBien,modifica,perioIngreso,idOrganismo,estadoP,idActividad FROM poa_actdeportivas WHERE idPda='$idPda';");

		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_actdeportivas` (`idPda`, `tipoFinanciamiento`, `nombreEvento`, `Deporte`, `provincia`, `ciudadPais`, `alcance`, `fechaInicio`, `fechaFin`, `genero`, `categoria`, `numeroEntreandores`, `numeroAtletas`, `total`, `mBenefici`, `hBenefici`, `justificacionAd`, `canitdarBie`, `idProgramacionFinanciera`, `fecha`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalElem`, `detalleBien`, `modifica`, `perioIngreso`, `idOrganismo`, `estadoP`, `idActividad`) VALUES (NULL, '".$informacionActualizas__origen[0][tipoFinanciamiento]."', '".$informacionActualizas__origen[0][nombreEvento]."', '".$informacionActualizas__origen[0][Deporte]."', '".$informacionActualizas__origen[0][provincia]."', '".$informacionActualizas__origen[0][ciudadPais]."', '".$informacionActualizas__origen[0][alcance]."', '".$informacionActualizas__origen[0][fechaInicio]."', '".$informacionActualizas__origen[0][fechaFin]."', '".$informacionActualizas__origen[0][genero]."', '".$informacionActualizas__origen[0][categoria]."', '".$informacionActualizas__origen[0][numeroEntreandores]."', '".$informacionActualizas__origen[0][numeroAtletas]."', '".$informacionActualizas__origen[0][total]."', '".$informacionActualizas__origen[0][mBenefici]."', '".$informacionActualizas__origen[0][hBenefici]."', '".$informacionActualizas__origen[0][justificacionAd]."', '".$informacionActualizas__origen[0][canitdarBie]."', ".$informacionActualizas__origen[0][idProgramacionFinanciera].", '".$fecha."', '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][totalElem]."', '".$informacionActualizas__origen[0][detalleBien]."', 'I', $aniosPeriodos__ingesos, NULL, NULL, $idActividad);";
		$resultado2= $conexionEstablecida->exec($query2);

		return $query2;

	}

	function getObtenerInformacion__inicial__mantenimiento($idPda,$fecha,$idActividad){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT nombreInfras,provincia,direccionCompleta,estado,tipoRecursos,tipoIntervencion,detallarTipoIn,tipoMantenimiento,materialesServicios,fechaUltimo,idProgramacionFinanciera,fecha,modifica,perioIngreso,idOrganismo,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_mantenimiento WHERE idProgramacionFinanciera='idPda' AND perioIngreso='$aniosPeriodos__ingesos';");

		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_mantenimiento` (`idMantenimiento`, `nombreInfras`, `provincia`, `direccionCompleta`, `estado`, `tipoRecursos`, `tipoIntervencion`, `detallarTipoIn`, `tipoMantenimiento`, `materialesServicios`, `fechaUltimo`, `idProgramacionFinanciera`, `fecha`, `modifica`, `perioIngreso`, `idOrganismo`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`) VALUES (NULL, '".$informacionActualizas__origen[0][nombreInfras]."', ".$informacionActualizas__origen[0][provincia].", '".$informacionActualizas__origen[0][direccionCompleta]."', '".$informacionActualizas__origen[0][estado]."', '".$informacionActualizas__origen[0][tipoRecursos]."', '".$informacionActualizas__origen[0][tipoIntervencion]."', '".$informacionActualizas__origen[0][detallarTipoIn]."', '".$informacionActualizas__origen[0][tipoMantenimiento]."', '".$informacionActualizas__origen[0][materialesServicios]."', '".$informacionActualizas__origen[0][fechaUltimo]."', ".$informacionActualizas__origen[0][idProgramacionFinanciera].", '$fecha', 'I', $aniosPeriodos__ingesos, ".$informacionActualizas__origen[0][idOrganismo].", '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][total]."');";
		$resultado2= $conexionEstablecida->exec($query2);

		return $query2;

	}

	function getObtenerInformacion__inicial__actividades__administrativas($idPda,$fecha,$idActividad){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales,quedaActividadFinanciera,quedaItemFinanciero,idOrganismo,idItem,idActividad,idProgramatica,fecha,hora,calificacion,observaciones,estadoTransaccional,stringObservacionCeroArray,modifica,perioIngreso FROM poa_programacion_financiera WHERE idProgramacionFinanciera='$idPda';");

		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`) VALUES (NULL, '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][totalSumaItem]."', '".$informacionActualizas__origen[0][totalTotales]."', NULL, NULL, ".$informacionActualizas__origen[0][idOrganismo].", ".$informacionActualizas__origen[0][idItem].", ".$informacionActualizas__origen[0][idActividad].", NULL, '$fecha', NULL, NULL, NULL, NULL, NULL, NULL, $aniosPeriodos__ingesos);";
		$resultado2= $conexionEstablecida->exec($query2);


		$informacionActualizas__origen__admin=$objeto->getObtenerInformacionGeneral("SELECT justificacionActividad,cantidadBien,idProgramacionFinanciera,fecha,modifica,perioIngreso FROM poa_actividadesadministrativas WHERE idProgramacionFinanciera='$idPda';");

		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_actividadesadministrativas` (`idActividadAd`, `justificacionActividad`, `cantidadBien`, `idProgramacionFinanciera`, `fecha`, `modifica`, `perioIngreso`) VALUES (NULL, '".$informacionActualizas__origen__admin[0][justificacionActividad]."', '".$informacionActualizas__origen__admin[0][cantidadBien]."', ".$informacionActualizas__origen__admin[0][idProgramacionFinanciera].", '$fecha', 'I', $aniosPeriodos__ingesos);";
		$resultado3= $conexionEstablecida->exec($query3);


		return $query2."__".$query3;

	}



	function getObtenerInformacion__inicial__honorarios($idPda,$fecha,$idActividad){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT cedula,nombres,cargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,tipoCargo,idActividad,modifica,perioIngreso FROM poa_honorarios2022 WHERE idHonorarios='$idPda';");

		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_honorarios2022` (`idHonorarios`, `cedula`, `nombres`, `cargo`, `honorarioMensual`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `tipoCargo`, `idActividad`, `modifica`, `perioIngreso`) VALUES (NULL, '".$informacionActualizas__origen[0][cedula]."', '".$informacionActualizas__origen[0][nombres]."', '".$informacionActualizas__origen[0][cargo]."', '".$informacionActualizas__origen[0][honorarioMensual]."', '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][total]."', ".$informacionActualizas__origen[0][idOrganismo].", '$fecha', '".$informacionActualizas__origen[0][tipoCargo]."', 4, 'I', $aniosPeriodos__ingesos);";

		if (!empty($informacionActualizas__origen[0][cedula])) {
			$resultado2= $conexionEstablecida->exec($query2);
		}

		return $query2;

	}

	function getObtenerInformacion__inicial__sueldos($idPda,$fecha,$idActividad){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT cedula,nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,idOrganismo,fecha,idActividad,modifica,perioIngreso FROM poa_sueldossalarios2022 WHERE idSueldos='$idPda';");


		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_sueldossalarios2022` (`idSueldos`, `cedula`, `nombres`, `cargo`, `tipoCargo`, `tiempoTrabajo`, `sueldoSalario`, `aportePatronal`, `decimoTercera`, `mensualizaTercera`, `decimoCuarta`, `menusalizaCuarta`, `fondosReserva`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `idOrganismo`, `fecha`, `idActividad`, `modifica`, `perioIngreso`) VALUES (NULL, '".$informacionActualizas__origen[0][cedula]."', '".$informacionActualizas__origen[0][nombres]."', '".$informacionActualizas__origen[0][cargo]."', '".$informacionActualizas__origen[0][tipoCargo]."', '".$informacionActualizas__origen[0][tiempoTrabajo]."', '".$informacionActualizas__origen[0][sueldoSalario]."', '".$informacionActualizas__origen[0][aportePatronal]."', '".$informacionActualizas__origen[0][decimoTercera]."', '".$informacionActualizas__origen[0][mensualizaTercera]."', '".$informacionActualizas__origen[0][decimoCuarta]."', '".$informacionActualizas__origen[0][menusalizaCuarta]."', '".$informacionActualizas__origen[0][fondosReserva]."', '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][total]."', ".$informacionActualizas__origen[0][idOrganismo].", '$fecha', 4, 'I', $aniosPeriodos__ingesos);";
		
		if (!empty($informacionActualizas__origen[0][cedula])) {
			$resultado2= $conexionEstablecida->exec($query2);
		}


		return $query2;

	}



	function getObtenerInformacion__inicial__financiero__desvinculaciones($idPda,$fecha,$idActividad,$idOrganismo){

		$objeto= new usuarioAcciones();

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales,quedaActividadFinanciera,quedaItemFinanciero,idOrganismo,idItem,idActividad,idProgramatica,fecha,hora,calificacion,observaciones,estadoTransaccional,stringObservacionCeroArray,modifica,perioIngreso FROM poa_programacion_financiera WHERE idItem='$idPda' AND idOrganismo='$idOrganismo' AND modifica IS NULL LIMIT 1;");

		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_programacion_financiera` (`idProgramacionFinanciera`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `totalSumaItem`, `totalTotales`, `quedaActividadFinanciera`, `quedaItemFinanciero`, `idOrganismo`, `idItem`, `idActividad`, `idProgramatica`, `fecha`, `hora`, `calificacion`, `observaciones`, `estadoTransaccional`, `stringObservacionCeroArray`, `modifica`, `perioIngreso`) VALUES (NULL, '".$informacionActualizas__origen[0][enero]."', '".$informacionActualizas__origen[0][febrero]."', '".$informacionActualizas__origen[0][marzo]."', '".$informacionActualizas__origen[0][abril]."', '".$informacionActualizas__origen[0][mayo]."', '".$informacionActualizas__origen[0][junio]."', '".$informacionActualizas__origen[0][julio]."', '".$informacionActualizas__origen[0][agosto]."', '".$informacionActualizas__origen[0][septiembre]."', '".$informacionActualizas__origen[0][octubre]."', '".$informacionActualizas__origen[0][noviembre]."', '".$informacionActualizas__origen[0][diciembre]."', '".$informacionActualizas__origen[0][totalSumaItem]."', '".$informacionActualizas__origen[0][totalTotales]."', NULL, NULL, ".$informacionActualizas__origen[0][idOrganismo].", ".$informacionActualizas__origen[0][idItem].", ".$informacionActualizas__origen[0][idActividad].", NULL, '$fecha', NULL, NULL, NULL, NULL, NULL, NULL, $aniosPeriodos__ingesos);";
		$resultado2= $conexionEstablecida->exec($query2);


		return $query2;

	}


	function getObtenerMeses__definidos__origen($identificador,$mes,$idPda,$tabla,$campo){

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$objeto= new usuarioAcciones();
		$restador=0;

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT $mes FROM $tabla WHERE $campo='$idPda';");
		$restador=$informacionActualizas__origen[0][$mes] - $identificador;

		$query2="UPDATE $tabla SET $mes='$restador' WHERE $campo='$idPda';";
		$resultado2= $conexionEstablecida->exec($query2);

		return $restador;

	}


	function getObtenerMeses__definidos__destino($identificador,$mes,$idPda,$tabla,$campo){

		$conexionRecuperada= new conexion();
		$conexionEstablecida=$conexionRecuperada->cConexion();	

		$objeto= new usuarioAcciones();
		$restador=0;

		$informacionActualizas__origen=$objeto->getObtenerInformacionGeneral("SELECT $mes FROM $tabla WHERE $campo='$idPda';");
		$restador=$informacionActualizas__origen[0][$mes] + $identificador;

		$query2="UPDATE $tabla SET $mes='$restador' WHERE $campo='$idPda';";
		$resultado2= $conexionEstablecida->exec($query2);

		return $restador;

	}


	switch ($tipo) {


		case "elimina__mes__modificaciones":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	/*===============================
		 	=            	Orígen            =
		 	===============================*/
		 	
		 	$informacionOrigen=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadOrigen,eventosOrigen,idFinancierioOrigen,eneroOrigen,febreroOrigen,marzoOrigen,abrilOrigen,mayoOrigen,junioOrigen,julioOrigen,agostoOrigen,septiembreOrigen,octubreOrigen,noviembreOrigen,diciembreOrigen,totalOrigen,eneroOrigen__restando,febreroOrigen__restando,marzoOrigen__restando,abrilOrigen__restando,mayoOrigen__restando,junioOrigen__restando,julioOrigen__restando,agostoOrigen__restando,septiembreOrigen__restando,octubreOrigen__restando,noviembreOrigen__restando,diciembreOrigen__restando,salarioOrigen,aportePatronalOrigen,decimoTerceroOrigen,decimoCuartoOrigen,fondosDeReservaOrigen,identificadorPaginaReal,idOrganismo FROM poa_modificaciones_origen_destino WHERE idOrigenDestino='$idEnvio';");

			if ($informacionOrigen[0][actividadOrigen]=="1") {
				
				$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			}else if($informacionOrigen[0][actividadOrigen]=="2"){

				$obtencionRetorno__mantenimiento=$objeto->actualizarProgramacion__matenimiento__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

				$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			}else if($informacionOrigen[0][actividadOrigen]=="3" || $informacionOrigen[0][actividadOrigen]=="5" || $informacionOrigen[0][actividadOrigen]=="6" || $informacionOrigen[0][actividadOrigen]=="7" && ($informacionOrigen[0][actividadOrigen]=="4" && $informacionOrigen[0][identificadorPaginaReal]=="diferentes")){

				$obtencionRetorno__actividadesDeportivas=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

				$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacionOrigen[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

			}else if($informacionOrigen[0][actividadOrigen]=="4" && ($informacionOrigen[0][identificadorPaginaReal]=="honorarios" || $informacionOrigen[0][identificadorPaginaReal]=="honorarios__item")){

				$obtencionRetorno__honorarios=$objeto->actualizarProgramacion__actividades__deportivas__honorarios__origen($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

				$informacioOrigen__llamada=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera AS idFinancierioOrigen  FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='71' AND perioIngreso='$aniosPeriodos__ingesos';");
				
				$obtencionRetorno=$objeto->actualizarProgramacion__financiera__modificaciones__origen($informacioOrigen__llamada[0][idFinancierioOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);


			}else if($informacionOrigen[0][actividadOrigen]=="4" && ($informacionOrigen[0][identificadorPaginaReal]=="sueldos" || $informacionOrigen[0][identificadorPaginaReal]=="sueldos__item" || $informacionOrigen[0][identificadorPaginaReal]=="desvinculacion")){

				$obtencionRetorno__sueldos=$objeto->actualizarProgramacion__actividades__deportivas__sueldos__origen($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

				/*======================================
				=            Bonificaciones            =
				======================================*/

				/*=======================================
				=            Aporte patronal            =
				=======================================*/
				
				$origen__aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='38' AND perioIngreso='$aniosPeriodos__ingesos';");
				$origen__aportePatronal__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='aporte' AND estado='origen';");
								
				
				$obtencionRetornoAporte=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__aportePatronal[0][idProgramacionFinanciera],[$origen__aportePatronal__2[0][enero],$origen__aportePatronal__2[0][febrero],$origen__aportePatronal__2[0][marzo],$origen__aportePatronal__2[0][abril],$origen__aportePatronal__2[0][mayo],$origen__aportePatronal__2[0][junio],$origen__aportePatronal__2[0][julio],$origen__aportePatronal__2[0][agosto],$origen__aportePatronal__2[0][septiembre],$origen__aportePatronal__2[0][octubre],$origen__aportePatronal__2[0][noviembre],$origen__aportePatronal__2[0][diciembre]]);
				
				/*=====  End of Aporte patronal  ======*/
				
				/*============================================
				=            Décimo tercer sueldo            =
				============================================*/
								
				$origen__tercer=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='53' AND perioIngreso='$aniosPeriodos__ingesos';");
				$origen__tercer__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='decimoTercer' AND estado='origen';");


				$obtencionRetornoTercero=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__tercer[0][idProgramacionFinanciera],[$origen__tercer__2[0][enero],$origen__tercer__2[0][febrero],$origen__tercer__2[0][marzo],$origen__tercer__2[0][abril],$origen__tercer__2[0][mayo],$origen__tercer__2[0][junio],$origen__tercer__2[0][julio],$origen__tercer__2[0][agosto],$origen__tercer__2[0][septiembre],$origen__tercer__2[0][octubre],$origen__tercer__2[0][noviembre],$origen__tercer__2[0][diciembre]]);

				
				/*=====  End of Décimo tercer sueldo  ======*/
				

				/*=====================================
				=            Décimo cuarto            =
				=====================================*/
				
				$origen__cuarto=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='52' AND perioIngreso='$aniosPeriodos__ingesos';");
				$origen__cuarto__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='decimoCuarto' AND estado='origen';");	


				$obtencionRetornoCuarto=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__cuarto[0][idProgramacionFinanciera],[$origen__cuarto__2[0][enero],$origen__cuarto__2[0][febrero],$origen__cuarto__2[0][marzo],$origen__cuarto__2[0][abril],$origen__cuarto__2[0][mayo],$origen__cuarto__2[0][junio],$origen__cuarto__2[0][julio],$origen__cuarto__2[0][agosto],$origen__cuarto__2[0][septiembre],$origen__cuarto__2[0][octubre],$origen__cuarto__2[0][noviembre],$origen__cuarto__2[0][diciembre]]);			
				
				/*=====  End of Décimo cuarto  ======*/
				

				/*=========================================
				=            Fondos de reserva            =
				=========================================*/
				
								
				$origen__fondos=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='65' AND perioIngreso='$aniosPeriodos__ingesos';");
				$origen__fondos__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");

				$obtencionRetornoFondos=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__fondos[0][idProgramacionFinanciera],[$origen__fondos__2[0][enero],$origen__fondos__2[0][febrero],$origen__fondos__2[0][marzo],$origen__fondos__2[0][abril],$origen__fondos__2[0][mayo],$origen__fondos__2[0][junio],$origen__fondos__2[0][julio],$origen__fondos__2[0][agosto],$origen__fondos__2[0][septiembre],$origen__fondos__2[0][octubre],$origen__fondos__2[0][noviembre],$origen__fondos__2[0][diciembre]]);		

				
				/*=====  End of Fondos de reserva  ======*/
				
				
				/*================================
				=            Salarios            =
				================================*/
				
				$origen__salarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='97' AND perioIngreso='$aniosPeriodos__ingesos';");
				$origen__salarios__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacionOrigen[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");


				$obtencionRetornoSalarios=$objeto->actualizarProgramacion__financiera__modificaciones__origen($origen__salarios[0][idProgramacionFinanciera],[$origen__salarios__2[0][enero],$origen__salarios__2[0][febrero],$origen__salarios__2[0][marzo],$origen__salarios__2[0][abril],$origen__salarios__2[0][mayo],$origen__salarios__2[0][junio],$origen__salarios__2[0][julio],$origen__salarios__2[0][agosto],$origen__salarios__2[0][septiembre],$origen__salarios__2[0][octubre],$origen__salarios__2[0][noviembre],$origen__salarios__2[0][diciembre]]);		

				
				/*=====  End of Salarios  ======*/
				

				/*=====  End of Bonificaciones  ======*/


			}

		 	
		 	/*=====  End of 	Orígen  ======*/

			/*===============================
			=            Destino            =
			===============================*/

			
			$informacioDestino=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadDestino,eventosDestino,idFinancierioDestino,eneroDestino,febreroDestino,marzoDestino,abrilDestino,mayoDestino,junioDestino,julioDestino,agostoDestino,septiembreDestino,octubreDestino,noviembreDestino,diciembreDestino,totalDestino,eneroDestino__sumando,febreroDestino__sumando,marzoDestino__sumando,abrilDestino__sumando,mayoDestino__sumando,junioDestino__sumando,julioDestino__sumando,agostoDestino__sumando,septiembreDestino__sumando,octubreDestino__sumando,noviembreDestino__sumando,diciembreDestino__sumando,sueldoDestino,aportePatronalDestino,decimoTerceraDestino,decimoCuartaDestino,fondosReservaDestino,identificadorPaginaReal,idOrganismo FROM poa_modificaciones_origen_destino WHERE idOrigenDestino='$idEnvio';");


			if ($informacioDestino[0][actividadDestino]=="1") {
				
				$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			}else if($informacioDestino[0][actividadDestino]=="2"){

				$obtencionRetorno__mantenimiento__destino=$objeto->actualizarProgramacion__matenimiento__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

				$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			}else if($informacioDestino[0][actividadDestino]=="3" || $informacioDestino[0][actividadDestino]=="5" || $informacioDestino[0][actividadDestino]=="6" || $informacioDestino[0][actividadDestino]=="7" && ($informacioDestino[0][actividadDestino]=="4" && $informacioDestino[0][identificadorPaginaReal]=="diferentes")){

				$obtencionRetorno__actividadesDeportivas__destino=$objeto->actualizarProgramacion__actividades__deportivas__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

				$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

			}else if($informacioDestino[0][actividadDestino]=="4" && ($informacioDestino[0][identificadorPaginaReal]=="honorarios" || $informacioDestino[0][identificadorPaginaReal]=="honorarios__item")){

				$obtencionRetorno__honorarios__destino=$objeto->actualizarProgramacion__actividades__deportivas__honorarios__destino($informacioDestino[0][eventosDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);

				$informacioDestino__llamada=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera AS idFinancierioDestino  FROM poa_programacion_financiera WHERE idOrganismo='".$informacionOrigen[0][idOrganismo]."' AND idItem='71' AND perioIngreso='$aniosPeriodos__ingesos';");

				$obtencionRetorno__destino=$objeto->actualizarProgramacion__financiera__modificaciones__destino($informacioDestino__llamada[0][idFinancierioDestino],[$informacioDestino[0][eneroDestino],$informacioDestino[0][febreroDestino],$informacioDestino[0][marzoDestino],$informacioDestino[0][abrilDestino],$informacioDestino[0][mayoDestino],$informacioDestino[0][junioDestino],$informacioDestino[0][julioDestino],$informacioDestino[0][agostoDestino],$informacioDestino[0][septiembreDestino],$informacioDestino[0][octubreDestino],$informacioDestino[0][noviembreDestino],$informacioDestino[0][diciembreDestino]]);
				

			}else if($informacioDestino[0][actividadDestino]=="4" && ($informacioDestino[0][identificadorPaginaReal]=="sueldos" || $informacioDestino[0][identificadorPaginaReal]=="sueldos__item" || $informacioDestino[0][identificadorPaginaReal]=="desvinculacion")){


				$obtencionRetorno__sueldos=$objeto->actualizarProgramacion__actividades__deportivas__sueldos__destino($informacionOrigen[0][eventosOrigen],[$informacionOrigen[0][eneroOrigen],$informacionOrigen[0][febreroOrigen],$informacionOrigen[0][marzoOrigen],$informacionOrigen[0][abrilOrigen],$informacionOrigen[0][mayoOrigen],$informacionOrigen[0][junioOrigen],$informacionOrigen[0][julioOrigen],$informacionOrigen[0][agostoOrigen],$informacionOrigen[0][septiembreOrigen],$informacionOrigen[0][octubreOrigen],$informacionOrigen[0][noviembreOrigen],$informacionOrigen[0][diciembreOrigen]]);

				/*======================================
				=            Bonificaciones            =
				======================================*/

				/*=======================================
				=            Aporte patronal            =
				=======================================*/
				
				$destino__aportePatronal=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='38' AND perioIngreso='$aniosPeriodos__ingesos';");
				$destino__aportePatronal__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='aporte' AND estado='origen';");
								
				
				$obtencionRetornoAporte=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__aportePatronal[0][idProgramacionFinanciera],[$destino__aportePatronal__2[0][enero],$destino__aportePatronal__2[0][febrero],$destino__aportePatronal__2[0][marzo],$destino__aportePatronal__2[0][abril],$destino__aportePatronal__2[0][mayo],$destino__aportePatronal__2[0][junio],$destino__aportePatronal__2[0][julio],$destino__aportePatronal__2[0][agosto],$destino__aportePatronal__2[0][septiembre],$destino__aportePatronal__2[0][octubre],$destino__aportePatronal__2[0][noviembre],$destino__aportePatronal__2[0][diciembre]]);
				
				/*=====  End of Aporte patronal  ======*/
				
				/*============================================
				=            Décimo tercer sueldo            =
				============================================*/
								
				$destino__tercer=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='53' AND perioIngreso='$aniosPeriodos__ingesos';");
				$destino__tercer__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='decimoTercer' AND estado='origen';");


				$obtencionRetornoTercero=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__tercer[0][idProgramacionFinanciera],[$destino__tercer__2[0][enero],$destino__tercer__2[0][febrero],$destino__tercer__2[0][marzo],$destino__tercer__2[0][abril],$destino__tercer__2[0][mayo],$destino__tercer__2[0][junio],$destino__tercer__2[0][julio],$destino__tercer__2[0][agosto],$destino__tercer__2[0][septiembre],$destino__tercer__2[0][octubre],$destino__tercer__2[0][noviembre],$destino__tercer__2[0][diciembre]]);

				
				/*=====  End of Décimo tercer sueldo  ======*/
				

				/*=====================================
				=            Décimo cuarto            =
				=====================================*/
				
				$destino__cuarto=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='52' AND perioIngreso='$aniosPeriodos__ingesos';");
				$destino__cuarto__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='decimoCuarto' AND estado='origen';");	


				$obtencionRetornoCuarto=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__cuarto[0][idProgramacionFinanciera],[$destino__cuarto__2[0][enero],$destino__cuarto__2[0][febrero],$destino__cuarto__2[0][marzo],$destino__cuarto__2[0][abril],$destino__cuarto__2[0][mayo],$destino__cuarto__2[0][junio],$destino__cuarto__2[0][julio],$destino__cuarto__2[0][agosto],$destino__cuarto__2[0][septiembre],$destino__cuarto__2[0][octubre],$destino__cuarto__2[0][noviembre],$destino__cuarto__2[0][diciembre]]);			
				
				/*=====  End of Décimo cuarto  ======*/
				

				/*=========================================
				=            Fondos de reserva            =
				=========================================*/
				
								
				$destino__fondos=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='65' AND perioIngreso='$aniosPeriodos__ingesos';");
				$destino__fondos__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");

				$obtencionRetornoFondos=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__fondos[0][idProgramacionFinanciera],[$destino__fondos__2[0][enero],$destino__fondos__2[0][febrero],$destino__fondos__2[0][marzo],$destino__fondos__2[0][abril],$destino__fondos__2[0][mayo],$destino__fondos__2[0][junio],$destino__fondos__2[0][julio],$destino__fondos__2[0][agosto],$destino__fondos__2[0][septiembre],$destino__fondos__2[0][octubre],$destino__fondos__2[0][noviembre],$destino__fondos__2[0][diciembre]]);		

				
				/*=====  End of Fondos de reserva  ======*/
				
				
				/*================================
				=            Salarios            =
				================================*/
				
				$destino__salarios=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_programacion_financiera WHERE idOrganismo='".$informacioDestino[0][idOrganismo]."' AND idItem='97' AND perioIngreso='$aniosPeriodos__ingesos';");
				$destino__salarios__2=$objeto->getObtenerInformacionGeneral("SELECT enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre FROM poa_modificacion_bonificacion WHERE idOrigenDestino='".$informacioDestino[0][idOrigenDestino]."' AND tipo='fondosReserva' AND estado='origen';");


				$obtencionRetornoSalarios=$objeto->actualizarProgramacion__financiera__modificaciones__destino($destino__salarios[0][idProgramacionFinanciera],[$destino__salarios__2[0][enero],$destino__salarios__2[0][febrero],$destino__salarios__2[0][marzo],$destino__salarios__2[0][abril],$destino__salarios__2[0][mayo],$destino__salarios__2[0][junio],$destino__salarios__2[0][julio],$destino__salarios__2[0][agosto],$destino__salarios__2[0][septiembre],$destino__salarios__2[0][octubre],$destino__salarios__2[0][noviembre],$destino__salarios__2[0][diciembre]]);		

				
				/*=====  End of Salarios  ======*/
				

				/*=====  End of Bonificaciones  ======*/

			}			

			/*=====  End of Destino  ======*/
					 	

		 	$query="DELETE FROM poa_modificaciones_envio_inicial WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva';";
			$resultado= $conexionEstablecida->exec($query);


		 	$query2="DELETE FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva';";
			$resultado2= $conexionEstablecida->exec($query2);


		 	$jason['mensaje']=1;

		break;	

		case "actualiza__mes__modificaciones":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="UPDATE poa_modificaciones_envio_inicial SET mesEscodigo='$valorActualizacion' WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva';";
			$resultado= $conexionEstablecida->exec($query);


		 	$jason['dataBloqueos']=$dataBloqueos;

		break;		

		case "guardar__geral__dir__planificacion":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


		 	$queryAdministrativos="INSERT INTO poa_modificacion_actividadesadministrativas (justificacionActividad, cantidadBien,idProgramacionFinanciera,fecha,modifica,perioIngreso,trimestre,mes,semestre,idModificacionDerfinitiva)SELECT a.justificacionActividad, a.cantidadBien,a.idProgramacionFinanciera,a.fecha,a.modifica,a.perioIngreso,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismo__t' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos';";
			$resultadoAdministrativos= $conexionEstablecida->exec($queryAdministrativos);

			$queryMantenimiento="INSERT INTO poa_modificacion_mantenimiento (nombreInfras, provincia, direccionCompleta, estado, tipoRecursos, tipoIntervencion, detallarTipoIn, tipoMantenimiento, materialesServicios, fechaUltimo, idProgramacionFinanciera, fecha, modifica, perioIngreso, idOrganismo, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2, trimestre,mes,semestre,idModificacionDerfinitiva)SELECT a.nombreInfras, a.provincia, a.direccionCompleta, a.estado, a.tipoRecursos, a.tipoIntervencion, a.detallarTipoIn, a.tipoMantenimiento, a.materialesServicios, a.fechaUltimo, a.idProgramacionFinanciera, a.fecha, a.modifica, a.perioIngreso, a.idOrganismo, a.enero, a.febrero, a.marzo, a.abril, a.mayo, a.junio, a.julio, a.agosto, a.septiembre, a.octubre, a.noviembre, a.diciembre, a.total, a.enero2, a.febrero2, a.marzo2, a.abril2, a.mayo2, a.junio2, a.julio2, a.agosto2, a.septiembre2, a.octubre2, a.noviembre2, a.diciembre2, a.total2,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismo__t' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos';";
			$resultadoMantenimiento= $conexionEstablecida->exec($queryMantenimiento);		


			$queryActividadesDeportivas="INSERT INTO poa_modificacion_actdeportivas (tipoFinanciamiento, nombreEvento, Deporte, provincia, ciudadPais, alcance, fechaInicio, fechaFin, genero, categoria, numeroEntreandores, numeroAtletas, total, mBenefici, hBenefici, justificacionAd, canitdarBie, idProgramacionFinanciera, fecha, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, totalElem, detalleBien, modifica, perioIngreso, idOrganismo, estadoP, idActividad, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2, trimestre, mes,semestre,idModificacionDerfinitiva)SELECT a.tipoFinanciamiento, a.nombreEvento, a.Deporte, a.provincia, a.ciudadPais, a.alcance, a.fechaInicio, a.fechaFin, a.genero, a.categoria, a.numeroEntreandores, a.numeroAtletas, a.total, a.mBenefici, a.hBenefici, a.justificacionAd, a.canitdarBie, a.idProgramacionFinanciera, a.fecha, a.enero, a.febrero, a.marzo, a.abril, a.mayo, a.junio, a.julio, a.agosto, a.septiembre, a.octubre, a.noviembre, a.diciembre, a.totalElem, a.detalleBien, a.modifica, a.perioIngreso, a.idOrganismo, a.estadoP, a.idActividad, a.enero2, a.febrero2, a.marzo2, a.abril2, a.mayo2, a.junio2, a.julio2, a.agosto2, a.septiembre2, a.octubre2, a.noviembre2, a.diciembre2, a.total2,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismo__t' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos';";
			$resultadoActividadesDeportivas= $conexionEstablecida->exec($queryActividadesDeportivas);		


			$querySueldosSalarios="INSERT INTO poa_modificacion_sueldossalarios2022 (cedula, nombres, cargo, tipoCargo, tiempoTrabajo, sueldoSalario, aportePatronal, decimoTercera, mensualizaTercera, decimoCuarta, menusalizaCuarta, fondosReserva, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, idOrganismo, fecha, idActividad, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2, trimestre, mes, semestre,idModificacionDerfinitiva)SELECT cedula, nombres, cargo, tipoCargo, tiempoTrabajo, sueldoSalario, aportePatronal, decimoTercera, mensualizaTercera, decimoCuarta, menusalizaCuarta, fondosReserva, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, idOrganismo, fecha, idActividad, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_sueldossalarios2022 WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo__t';";
			$resultadoSueldosSalarios= $conexionEstablecida->exec($querySueldosSalarios);		


			$queryHonorarios="INSERT INTO poa_modificacion_honorarios2022 (cedula, nombres, cargo, honorarioMensual, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, idOrganismo, fecha, tipoCargo, idActividad, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2, trimestre, mes,semestre,idModificacionDerfinitiva)SELECT cedula, nombres, cargo, honorarioMensual, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, total, idOrganismo, fecha, tipoCargo, idActividad, modifica, perioIngreso, enero2, febrero2, marzo2, abril2, mayo2, junio2, julio2, agosto2, septiembre2, octubre2, noviembre2, diciembre2, total2,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_honorarios2022 WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo__t';";
			$resultadoHonorarios= $conexionEstablecida->exec($queryHonorarios);		


			$queryFinanciero="INSERT INTO poa_modificacion_programacion_financiera (enero, febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales,quedaActividadFinanciera,quedaItemFinanciero,idOrganismo,idItem,idActividad,idProgramatica,fecha,hora,calificacion,observaciones,estadoTransaccional,stringObservacionCeroArray,modifica,perioIngreso,enero2,febrero2,marzo2,abril2,mayo2,junio2,julio2,agosto2,septiembre2,octubre2,noviembre2,diciembre2,total2,trimestre,mes,semestre,idModificacionDerfinitiva)SELECT enero, febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,totalSumaItem,totalTotales,quedaActividadFinanciera,quedaItemFinanciero,idOrganismo,idItem,idActividad,idProgramatica,fecha,hora,calificacion,observaciones,estadoTransaccional,stringObservacionCeroArray,modifica,perioIngreso,enero2,febrero2,marzo2,abril2,mayo2,junio2,julio2,agosto2,septiembre2,octubre2,noviembre2,diciembre2,total2,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_programacion_financiera WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo__t';";
			$resultadoFinanciero= $conexionEstablecida->exec($queryFinanciero);	


			$queryIndicadores="INSERT INTO poa_modificacion_poainicial (primertrimestre, segundotrimestre, tercertrimestre, cuartotrimestre, metaindicador, fecha, idActividad, idOrganismo, modifica, perioIngreso, trimestre, mes, semestre,idModificacionDerfinitiva)SELECT primertrimestre, segundotrimestre, tercertrimestre, cuartotrimestre, metaindicador, fecha, idActividad, idOrganismo, modifica, perioIngreso,IF(UPPER(MONTHNAME(CURDATE()))='JULY' OR UPPER(MONTHNAME(CURDATE()))='AUGUST' OR UPPER(MONTHNAME(CURDATE()))='SEPTEMBER','tercerTrimestre',IF(UPPER(MONTHNAME(CURDATE()))='OCTOBER' OR UPPER(MONTHNAME(CURDATE()))='NOVEMBER' OR UPPER(MONTHNAME(CURDATE()))='DECEMBER','cuartoTrimestre',NULL)),UPPER(MONTHNAME(CURDATE())),CONCAT_WS(' ','segundoSemestre'),CONCAT_WS(' ',$idModificacionDerfinitiva__t) FROM poa_poainicial WHERE perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo__t';";
			$resultadoIndicadores= $conexionEstablecida->exec($queryIndicadores);	


		 	$query2="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPlaR='3',idUsuario='1',idUsuarioInfra='1',idInstalaciones='1',idUsuarioFinan='1',idUsuarioR='1',idUsuarioInfraR='1',idInstalacionesR='1',idUsuarioFinanR='1',idUsuarioPla='1',estado='T' WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva__t';";
			$resultado2= $conexionEstablecida->exec($query2);


		 	$query3="UPDATE poa_modificaciones_origen_destino SET estado='T' WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva__t';";
			$resultado3= $conexionEstablecida->exec($query3);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "eliminar__archivos__n":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	unlink('../../documentos/modificacion/informe/'.$ubicacion.'/'.$nombreDocumento);


			$query="UPDATE poa_modificaciones_envio_inicial SET $campoDocumento=NULL WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva__t';";
			$resultado= $conexionEstablecida->exec($query);	

			$mensaje=1;
			$jason['nombreDocumentos']=$nombreDocumentos;
			$jason['mensaje']=$mensaje;

		break;


		case "archivos__unitarios":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$direccionDocumentos="../../documentos/modificacion/informe/".$ubicacion."/";
		 	$nombreDocumentos=$idModificacionDerfinitiva__t."__".$idOrganismo__t."__".$fecha_actual.".pdf";


			$documento=$objeto->getEnviarPdf($_FILES["archivo"]['type'],$_FILES["archivo"]['size'],$_FILES["archivo"]['tmp_name'],$_FILES["archivo"]['name'],$direccionDocumentos,$nombreDocumentos);

			$query="UPDATE poa_modificaciones_envio_inicial SET $campoDocumento='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idModificacionDerfinitiva__t';";
			$resultado= $conexionEstablecida->exec($query);	

			$mensaje=1;
			$jason['nombreDocumentos']=$nombreDocumentos;
			$jason['mensaje']=$mensaje;

		break;


		case "bloqueos__actividades":

			$data1=array();
			$dataBloqueos=array();

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT idActividadDestino  FROM  poa_item_actividad_bloqueo WHERE idActividadOrigen='$idActividadOrigenes'  GROUP BY idActividadDestino;");

		 	foreach ($informacion as $value) {
		 		array_push($data1, $value["idActividadDestino"]);
		 	}

		 	foreach ($data1 AS $value2) {

		 		$informacionBloqueo=$objeto->getObtenerInformacionGeneral("SELECT COUNT(b.idActividad) AS contadorBloqueos FROM poa_item AS a INNER JOIN poa_item_actividad AS b ON a.idItem=b.idItem INNER JOIN poa_item_actividad_bloqueo AS t ON t.idActividadItem=b.idActividadItem WHERE b.idActividad='$value2' GROUP BY b.idActividad ORDER BY a.idItem;");

		 		$informacionActividades=$objeto->getObtenerInformacionGeneral("SELECT COUNT(idActividadItem) AS contadorActividades FROM poa_item_actividad WHERE idActividad='$value2' GROUP BY idActividad;");

				if(intval($informacionBloqueo[0][contadorBloqueos])==intval($informacionActividades[0][contadorActividades])){
					array_push($dataBloqueos, $value2);
				}

		 	}

			$jason['dataBloqueos']=$dataBloqueos;

		break;

		case "modificacion__informacion__administracion":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	if ($tipo__bloqueo__modificaciones=="actividad") {
		 		
		 		$query="SELECT idActividadItem,idItem FROM poa_item_actividad WHERE idActividad='$actividad__destino__modificaciones';";
				$resultado = $conexionEstablecida->query($query);


				while($registro = $resultado->fetch()) {

					$idActividadItem=$registro['idActividadItem'];
					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {
						$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'actividad', ".$registro['idItem'].",  ".$registro['idItem'].");";
						$resultado2= $conexionEstablecida->exec($query2);	
					}

	

				}

		 		$query3="SELECT idActividadItem,idItem FROM poa_item_actividad WHERE idActividad='$actividad__origen__modificaciones';";
				$resultado3 = $conexionEstablecida->query($query3);


				while($registro3 = $resultado3->fetch()) {

					$idActividadItem=$registro3['idActividadItem'];

					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {
						$query4="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'actividad', ".$registro3['idItem'].", ".$registro3['idItem'].");";
						$resultado4= $conexionEstablecida->exec($query4);
					}
		

				}

		 	}else if($tipo__bloqueo__modificaciones=="actividadItem"){
						 		
		 		$query="SELECT idActividadItem,idItem FROM poa_item_actividad WHERE idActividad='$actividad__destino__modificaciones' AND idItem='$item__destino__modificaciones';";
				$resultado = $conexionEstablecida->query($query);


				while($registro = $resultado->fetch()) {

					$idActividadItem=$registro['idActividadItem'];

					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {

						$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'itemActividad', ".$registro['idItem'].", '$item__destino__modificaciones');";
						$resultado2= $conexionEstablecida->exec($query2);

					}		

				}			

		 		$query3="SELECT idActividadItem,idItem FROM poa_item_actividad WHERE idActividad='$actividad__origen__modificaciones';";
				$resultado3 = $conexionEstablecida->query($query3);


				while($registro3 = $resultado3->fetch()) {

					$idActividadItem=$registro3['idActividadItem'];

					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {

						$query4="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'itemActividad', ".$registro3['idItem'].", '$item__destino__modificaciones');";
						$resultado4= $conexionEstablecida->exec($query4);	

					}	

				}	

		 	}else{

		 		$query="SELECT idActividadItem FROM poa_item_actividad WHERE idActividad='$actividad__destino__modificaciones' AND idItem='$item__destino__modificaciones';";
				$resultado = $conexionEstablecida->query($query);


				while($registro = $resultado->fetch()) {

					$idActividadItem=$registro['idActividadItem'];

					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {

						$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'item', '$item__origen__modificaciones', '$item__destino__modificaciones');";
						$resultado2= $conexionEstablecida->exec($query2);	

					}

				}				


		 		$query3="SELECT idActividadItem FROM poa_item_actividad WHERE idActividad='$actividad__origen__modificaciones' AND idItem='$item__origen__modificaciones';";
				$resultado3 = $conexionEstablecida->query($query3);


				while($registro3 = $resultado3->fetch()) {

					$idActividadItem=$registro3['idActividadItem'];

					$informacion__bloqueos=$objeto->getObtenerInformacionGeneral("SELECT idBloqueo FROM poa_item_actividad_bloqueo WHERE idActividadItem='$idActividadItem';");

					if (empty($informacion__bloqueos[0][idBloqueo])) {

						$query4="INSERT INTO `ezonshar_mdepsaddb`.`poa_item_actividad_bloqueo` (`idBloqueo`, `idActividadItem`, `idActividadOrigen`, `idActividadDestino`, `bloqueo`, `idItemOrigen`, `idItemDestino`) VALUES (NULL, $idActividadItem, $actividad__origen__modificaciones, $actividad__destino__modificaciones, 'item', '$item__origen__modificaciones', '$item__destino__modificaciones');";
						$resultado4= $conexionEstablecida->exec($query4);	

					}

				}	

		 	}

 			 
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "actividades__configuracion__administrador":

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT b.idActividadItem,a.idItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.itemPreesupuestario,t.idBloqueo,(SELECT CONCAT_WS(' ',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE t.idActividadOrigen=a1.idActividades) AS actividadOrigen,(SELECT CONCAT_WS(' ',a1.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','activacion_cuentas_mesñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_actividades AS a1 WHERE t.idActividadDestino=a1.idActividades) AS actividadDestino,(SELECT CONCAT_WS(' ',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE t.idItemOrigen=a1.idItem) AS nombreItemOrigen,(SELECT CONCAT_WS(' ',a1.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_item AS a1 WHERE t.idItemDestino=a1.idItem) AS nombreItemDestino FROM poa_item AS a INNER JOIN poa_item_actividad AS b ON a.idItem=b.idItem INNER JOIN poa_item_actividad_bloqueo AS t ON t.idActividadItem=b.idActividadItem WHERE b.idActividad='$idActividad' ORDER BY idItem;");


			$jason['informacion']=$informacion;

		break;

		case "recomendar__modificaciones__planifiacion__analistas__quipux":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario__ingresos';");
		 	$informaCion__real=$informacion[0][id_usuario];


		 	if (!empty($selector__lineas)) {
		 		
				$query2="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPlaR='$informaCion__real' WHERE idModificacionDerfinitiva='$idTramite';";
			 	$resultado2= $conexionEstablecida->exec($query2);

		 	}else{

		 		$direccionDocumentos="../../documentos/modificacion/informe/notificaciones/";
		 		$nombreDocumentos=$fecha_actual."__".$idOrganismo.".pdf";
				$documento=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar"]['type'],$_FILES["pdfGeneradoCargar"]['size'],$_FILES["pdfGeneradoCargar"]['tmp_name'],$_FILES["pdfGeneradoCargar"]['name'],$direccionDocumentos,$nombreDocumentos);

		 		$query2="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPlaR='3',documentoQuipu='$nombreDocumentos',numeroQuipux='$numeroNotificacion',fechaQuipux='$fechanumeroNotificacion' WHERE idModificacionDerfinitiva='$idTramite';";
			 	$resultado2= $conexionEstablecida->exec($query2);

	 			$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'NOTIFICACION', '$fecha_actual', '$hora_actual','$idTramite');";
		 		$resultado3= $conexionEstablecida->exec($query3);

		 		$query4="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $idUsuario__ingresos, $idUsuario__ingresos, 'Quipux', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
				$resultado4= $conexionEstablecida->exec($query4);


		 	}
		 
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "no__corresponde__tramites":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	if ($idRol==15) {
		 		
				$query2="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='2',idUsuarioInfraR='2' WHERE idModificacionDerfinitiva='$idTramite';";
			 	$resultado2= $conexionEstablecida->exec($query2);

		 	}else{

		 		$query2="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='2',idInstalacionesR='2' WHERE idModificacionDerfinitiva='$idTramite';";
			 	$resultado2= $conexionEstablecida->exec($query2);

		 	}
		 
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendar__modificaciones__planifiacion__analistas":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a.PersonaACargo=a1.id_usuario) AS id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$idUsuario__ingresos';");
		 	$informaCion__real=$informacion[0][id_usuario];

		 	$informacion__selector=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE a.id_usuario='$selector__lineas';");
		 	$idRol__selector=$informacion__selector[0][id_rol];

		 	if (!empty($selector__lineas) && $idRol==4) {
		 		
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPlaR='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'regresarP', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";

		 	}else if (!empty($selector__lineas) && $idRol!=4 && $idRol!=2 || $idRol__selector==3) {
		 		
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPla='$selector__lineas',idUsuarioPlaR=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'AsignarP', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";

		 	}else if($idRol==4){

		 		$direccionDocumentos="../../documentos/modificacion/informe/planificacion/";
				$nombreDocumentos=$fecha_actual."__".$idOrganismo.".pdf";
				$documento=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar"]['type'],$_FILES["pdfGeneradoCargar"]['size'],$_FILES["pdfGeneradoCargar"]['tmp_name'],$_FILES["pdfGeneradoCargar"]['name'],$direccionDocumentos,$nombreDocumentos);

		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPla='1',idUsuarioPlaR='1',documentoPlanificacion='$nombreDocumentos',estado='T' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $informaCion__real, $idUsuario__ingresos, 'TerminarP', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
		 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'PLANIFICACION', '$fecha_actual', '$hora_actual','$idTramite');";
		 		$resultado3= $conexionEstablecida->exec($query3);

		 		$query4="UPDATE poa_modificaciones_origen_destino SET estado='T' WHERE idModificacionDerfinitiva='$idTramite';";
		 		$resultado4= $conexionEstablecida->exec($query4);

		 	}else{

		 		$direccionDocumentos="../../documentos/modificacion/informe/planificacion/";
				$nombreDocumentos=$fecha_actual."__".$idOrganismo.".pdf";
				$documento=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar"]['type'],$_FILES["pdfGeneradoCargar"]['size'],$_FILES["pdfGeneradoCargar"]['tmp_name'],$_FILES["pdfGeneradoCargar"]['name'],$direccionDocumentos,$nombreDocumentos);

		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPla='1',idUsuarioPlaR='$informaCion__real',documentoPlanificacion='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $informaCion__real, $idUsuario__ingresos, 'AsignarP', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
		 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'PLANIFICACION', '$fecha_actual', '$hora_actual','$idTramite');";
		 		$resultado3= $conexionEstablecida->exec($query3);

		 		$informacionActualizas=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadOrigen,idFinancierioOrigen,eneroOrigen,febreroOrigen,marzoOrigen,abrilOrigen,mayoOrigen,junioOrigen,julioOrigen,agostoOrigen,septiembreOrigen,noviembreOrigen,diciembreOrigen,totalOrigen,eneroOrigen__restando,febreroOrigen__restando,marzoOrigen__restando,abrilOrigen__restando,mayoOrigen__restando,junioOrigen__restando,julioOrigen__restando,agostoOrigen__restando,septiembreOrigen__restando,octubreOrigen__restando,noviembreOrigen__restando,diciembreOrigen__restando,actividadDestino,eventosDestino,idFinancierioDestino,eneroDestino,febreroDestino,marzoDestino,abrilDestino,mayoDestino,junioDestino,julioDestino,agostoDestino,septiembreDestino,octubreDestino,noviembreDestino,diciembreDestino,totalDestino,eneroDestino__sumando,febreroDestino__sumando,marzoDestino__sumando,abrilDestino__sumando,mayoDestino__sumando,junioDestino__sumando,julioDestino__sumando,agostoDestino__sumando,septiembreDestino__sumando,octubreDestino__sumando,diciembreDestino__sumando,sueldoDestino,aportePatronalDestino,decimoTerceraDestino,decimoCuartaDestino,fondosReservaDestino,sueldoDestino__sumando,aportePatronalDestino__sumando,decimoTerceraDestino__sumando,decimoCuartaDestino__sumando,fondosReservaDestino__sumando,salarioOrigen,aportePatronalOrigen,decimoTerceroOrigen,decimoCuartoOrigen,fondosDeReservaOrigen,salarioOrigen__restando,aportePatronalOrigen__restando,decimoTerceroOrigen__restando,decimoCuartoOrigen__restando,fondosDeReservaOrigen__restando,calificacion,identificadorPaginaReal,tipoTramite FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite';");

		 		$contadorX=0;

				// foreach ($informacionActualizas as $valor) {

				// 	if ($valor["calificacion"]=="VALIDADO") {
				// 		$query10="UPDATE poa_modificaciones_origen_destino SET validado='1',aprobado='1' WHERE idOrigenDestino='".$valor['idOrigenDestino']."';";
				// 		$resultado10= $conexionEstablecida->exec($query10);
				// 	}else{
				//  		$query10="UPDATE poa_modificaciones_origen_destino SET validado='0',aprobado='0' WHERE idOrigenDestino='".$valor['idOrigenDestino']."';";
				// 		$resultado10= $conexionEstablecida->exec($query10);

				// 	}

				// 	$sumadorDeOrigenes=0;
				// 	$sumadorDestinos=0;

				// 	$informacionActualizas__1__identificador=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");
				// 	$informacionActualizas__1__identificador__2=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");


			 // 		if ((($valor['actividadOrigen']!=4 && $valor['actividadDestino']!=4 ) || !empty($informacionActualizas__1__identificador[0][idPda]) || !empty($informacionActualizas__1__identificador__2[0][idPda])) && ($valor["tipoTramite"]==3 || $valor["tipoTramite"]==3) && $valor["calificacion"]=="VALIDADO") {


			 // 			/*==============================
			 // 			=            Orígen            =
			 // 			==============================*/
		 	// 			if (($valor['actividadOrigen']==3 || $valor['actividadOrigen']==4 || $valor['actividadOrigen']==5 || $valor['actividadOrigen']==6 || $valor['actividadOrigen']==7) && ($fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==26)) {
			 				
			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");

				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");


				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_actdeportivas SET totalElem='$sumadorDeOrigenes' WHERE idPda='".$informacionActualizas__1[0][idPda]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);




			 // 			}else if($valor['actividadOrigen']==2  && $fisicamenteEstructura__reales==1){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idMantenimiento FROM poa_mantenimiento WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");



				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_mantenimiento SET total='$sumadorDeOrigenes' WHERE idMantenimiento='".$informacionActualizas__1[0][idMantenimiento]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadOrigen']==1  && $fisicamenteEstructura__reales==2){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_actividadesadministrativas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");


				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_programacion_financiera SET totalTotales='$sumadorDeOrigenes',totalSumaItem='$sumadorDeOrigenes' WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);

			 // 			}			 			
			 // 			/*=====  End of Orígen  ======*/
			 			
			 // 			/*===============================
			 // 			=            Destino            =
			 // 			===============================*/
			 			
			 // 			if (($valor['actividadDestino']==3 || $valor['actividadDestino']==4 || $valor['actividadDestino']==5 || $valor['actividadDestino']==6 || $valor['actividadDestino']==7) && ($fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==26)) {
			 				
			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");


				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_actdeportivas SET totalElem='$sumadorDeOrigenes' WHERE idPda='".$informacionActualizas__1[0][idPda]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadDestino']==2  && $fisicamenteEstructura__reales==1){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idMantenimiento FROM poa_mantenimiento WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");



				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");


				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_mantenimiento SET total='$sumadorDeOrigenes' WHERE idMantenimiento='".$informacionActualizas__1[0][idMantenimiento]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadDestino']==1  && $fisicamenteEstructura__reales==2){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idActividadAd FROM poa_actividadesadministrativas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");


				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);



				// 			$query2="UPDATE poa_programacion_financiera SET totalTotales='$sumadorDeOrigenes',totalSumaItem='$sumadorDeOrigenes' WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);

			 // 			}	
			 			
			 // 			/*=====  End of Destino  ======*/


			 			
			 // 		}else if(($valor['identificadorPaginaReal']=="honorarios" || $valor['identificadorPaginaReal']=="honorarios__item") && ($valor["tipoTramite"]==3 || $valor["tipoTramite"]==3) && $valor["calificacion"]=="VALIDADO"){			 			

			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios FROM poa_honorarios2022 WHERE idHonorarios='".$valor['idFinancierioOrigen']."';");

				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");

				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_honorarios2022 SET total='$sumadorDeOrigenes' WHERE idHonorarios='".$informacionActualizas__1[0][idHonorarios]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);

				// 		$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios FROM poa_honorarios2022 WHERE idHonorarios='".$valor['idFinancierioDestino']."';");


				// 		$eneroResultadoDos=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$febreroResultadoDos=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$marzoResultadoDos=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$abrilResultadoDos=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$mayoResultadoDos=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$junioResultadoDos=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$julioResultadoDos=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$agostoResultadoDos=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$septiembreResultadoDos=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$octubreResultadoDos=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$noviembreResultadoDos=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$diciembreResultadoDos=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");

				// 		$sumadorDestinos=floatval($eneroResultadoDos) + floatval($febreroResultadoDos) + floatval($marzoResultadoDos) + floatval($abrilResultadoDos) + floatval($mayoResultadoDos) + floatval($junioResultadoDos) + floatval($julioResultadoDos) + floatval($agostoResultadoDos) + floatval($septiembreResultadoDos) + floatval($octubreResultadoDos) + floatval($noviembreResultadoDos) + floatval($diciembreResultadoDos);


				// 		$query20="UPDATE poa_honorarios2022 SET total='$sumadorDestinos' WHERE idHonorarios='".$informacionActualizas__2[0][idHonorarios]."';";
				// 		$resultado20= $conexionEstablecida->exec($query20);


			 // 		}else if(($valor['identificadorPaginaReal']=="sueldos" || $valor['identificadorPaginaReal']=="sueldos__item") && ($valor["tipoTramite"]==3 || $valor["tipoTramite"]==3) && $valor["calificacion"]=="VALIDADO"){			 			


			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioOrigen']."';");


				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");


				// 		$sueldoSalarioResultado=getObtenerMeses__definidos__origen($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado=getObtenerMeses__definidos__origen($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado=getObtenerMeses__definidos__origen($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado=getObtenerMeses__definidos__origen($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado=getObtenerMeses__definidos__origen($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");


				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_sueldossalarios2022 SET total='$sumadorDeOrigenes' WHERE idSueldos='".$informacionActualizas__1[0][idSueldos]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);

				// 		$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioDestino']."';");


				// 		$eneroResultadoDos=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultadoDos=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultadoDos=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultadoDos=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultadoDos=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultadoDos=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultadoDos=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultadoDos=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultadoDos=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultadoDos=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultadoDos=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultadoDos=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");



				// 		$sueldoSalarioResultado__2=getObtenerMeses__definidos__destino($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado__2=getObtenerMeses__definidos__destino($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado__2=getObtenerMeses__definidos__destino($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado__2=getObtenerMeses__definidos__destino($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado__2=getObtenerMeses__definidos__destino($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");

				// 		$sumadorDestinos=floatval($eneroResultadoDos) + floatval($febreroResultadoDos) + floatval($marzoResultadoDos) + floatval($abrilResultadoDos) + floatval($mayoResultadoDos) + floatval($junioResultadoDos) + floatval($julioResultadoDos) + floatval($agostoResultadoDos) + floatval($septiembreResultadoDos) + floatval($octubreResultadoDos) + floatval($noviembreResultadoDos) + floatval($diciembreResultadoDos);


				// 		$query20="UPDATE poa_sueldossalarios2022 SET total='$sumadorDestinos' WHERE idSueldos='".$informacionActualizas__2[0][idSueldos]."';";
				// 		$resultado20= $conexionEstablecida->exec($query20);

						
			 // 		}else if($valor['identificadorPaginaReal']=="desvinculacion" && $valor["calificacion"]=="VALIDADO"){	

			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioOrigen']."';");


				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");

				// 		$sueldoSalarioResultado=getObtenerMeses__definidos__origen($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado=getObtenerMeses__definidos__origen($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado=getObtenerMeses__definidos__origen($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado=getObtenerMeses__definidos__origen($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado=getObtenerMeses__definidos__origen($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");



				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_sueldossalarios2022 SET total='$sumadorDeOrigenes' WHERE idSueldos='".$informacionActualizas__1[0][idSueldos]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);



			 // 			$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE idItem='".$valor['idFinancierioDestino']."';");

			 // 			$variableRetornos="";

			 // 			if ($informacionActualizas__2[0][idItem]==156) {
			 // 				$variableRetornos="despido";
			 // 			}else if ($informacionActualizas__2[0][idItem]==49) {
			 // 				$variableRetornos="desahucio";
			 // 			}else if ($informacionActualizas__2[0][idItem]==94) {
			 // 				$variableRetornos="renuncia";
			 // 			}else if ($informacionActualizas__2[0][idItem]==50) {
			 // 				$variableRetornos="compensación";
			 // 			}

			 // 			$sumadorDespidos=0;

			 // 			$sumadorDespidos=floatval($valor['eneroDestino']) + floatval($valor['febreroDestino']) + floatval($valor['marzoDestino']) + floatval($valor['abrilDestino']) + floatval($valor['mayoDestino']) + floatval($valor['junioDestino']) + floatval($valor['julioDestino']) + floatval($valor['agostoDestino']) + floatval($valor['septiembreDestino']) + floatval($valor['octubreDestino']) + floatval($valor['noviembreDestino']) + floatval($valor['diciembreDestino']);


				// 	 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_desvinculacion_inicio` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `estado`, `perioIngreso`) VALUES (NULL, ".$informacionActualizas__1[0][idSueldos].", $idOrganismo, '$variableRetornos', ".$valor['eneroDestino'].", ".$valor['febreroDestino'].", ".$valor['marzoDestino'].", ".$valor['abrilDestino'].", ".$valor['mayoDestino'].", ".$valor['junioDestino'].",".$valor['julioDestino'].", ".$valor['agostoDestino'].", ".$valor['septiembreDestino'].", ".$valor['octubreDestino'].",".$valor['noviembreDestino'].",".$valor['diciembreDestino'].", $sumadorDespidos, 1, $aniosPeriodos__ingesos);";
				// 	 	$resultado2= $conexionEstablecida->exec($query2);


			 // 		}
			 		

				// }
		 		

		 	}

		 	$resultado= $conexionEstablecida->exec($query);
		 	$resultado2= $conexionEstablecida->exec($query2);
		 	
		 
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendar__modificaciones__planifiacion":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario,b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$selector__lineas';");
		 	$id_usuario__rescatado=$informacion[0][id_usuario];
		 	$id_rol__rescatado=$informacion[0][id_rol];
		 	$fisicamenteEstructura__rescatado=$informacion[0][fisicamenteEstructura];

		 	$informacion__2=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario,CONCAT_WS(' ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombre,c.descripcionZonal FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_zonal AS c ON c.id_Zonal=a.zonal WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");
		 	$id_usuario__rescatado__2=$informacion__2[0][id_usuario];

		 	if ($id_rol__rescatado==2) {
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioR='1',idUsuarioInfraR='1',idInstalacionesR='1',idUsuarioFinanR='1',idUsuarioPla='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 	}else if($id_rol__rescatado==4){
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioR='$selector__lineas',idUsuarioInfraR='$selector__lineas',idInstalacionesR='$selector__lineas',idUsuarioFinanR='$selector__lineas',idUsuarioPla=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 	}else if($id_rol__rescatado==3){
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioPla='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 	}
		 	$resultado= $conexionEstablecida->exec($query);

			$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'AsignarP', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
		 	$resultado2= $conexionEstablecida->exec($query2);
		 
			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

		case "recomendar__modificaciones":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	


		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario,a.fisicamenteEstructura,b.id_rol FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$selector__lineas';");

		 	$fisicamenteEstructura__rescatado=$informacion[0][fisicamenteEstructura];
		 	$id_rol__rescatado=$informacion[0][id_rol];

		 	if ($id_rol__rescatado==3) {

			 	if ($fisicamenteEstructura__rescatado==6 || $fisicamenteEstructura__rescatado==15) {

				 	if ($fisicamenteEstructura__rescatado==15) {
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='$selector__lineas',idUsuarioInfraR=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 	}else{
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='$selector__lineas',idInstalacionesR=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 	}
				 	$resultado= $conexionEstablecida->exec($query);


			 	}else if($fisicamenteEstructura__rescatado==5){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioFinan='$selector__lineas',idUsuarioFinanR=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 	}else if($fisicamenteEstructura__rescatado==12 || $fisicamenteEstructura__rescatado==24 || $fisicamenteEstructura__rescatado==26 || $fisicamenteEstructura__rescatado==13 || $fisicamenteEstructura__rescatado==19 || $fisicamenteEstructura__rescatado==25 || $fisicamenteEstructura__rescatado==14){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuario='$selector__lineas',idUsuarioR=NULL WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 	}
			 	

			 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'Recomendar', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
			 	$resultado2= $conexionEstablecida->exec($query2);


		 	}else{


				if ($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==14  || $fisicamenteEstructura__reales==24) {
					$direccionDocumentos="../../documentos/modificacion/informe/altoRendimiento/";
				}else if ($fisicamenteEstructura__reales==13 || $fisicamenteEstructura__reales==26 || $fisicamenteEstructura__reales==19) {
					$direccionDocumentos="../../documentos/modificacion/informe/desarrollo/";
				}else if ($fisicamenteEstructura__reales==6) {
					$direccionDocumentos="../../documentos/modificacion/informe/instalaciones/";
				}else if ($fisicamenteEstructura__reales==18 || $fisicamenteEstructura__reales==3) {
					$direccionDocumentos="../../documentos/modificacion/informe/planificacion/";
				}else if ($fisicamenteEstructura__reales==5 || $fisicamenteEstructura__reales==2) {
					$direccionDocumentos="../../documentos/modificacion/informe/administrativo/";
				}else if($fisicamenteEstructura__reales==15 || $fisicamenteEstructura__reales==1){
					$direccionDocumentos="../../documentos/modificacion/informe/infraestructura/";
				}

				$nombreDocumentos=$fecha_actual."__".$idOrganismo.".pdf";
				$nombreDocumentosInfraestructura=$fecha_actual."__".$idOrganismo.".pdf";
				$nombreDocumentosInstalaciones=$fecha_actual."__".$idOrganismo.".pdf";

				if ($fisicamenteEstructura__reales==1 && $noCorresponde__infra__var==1) {
					
				}else{
					$documento=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar"]['type'],$_FILES["pdfGeneradoCargar"]['size'],$_FILES["pdfGeneradoCargar"]['tmp_name'],$_FILES["pdfGeneradoCargar"]['name'],$direccionDocumentos,$nombreDocumentos);
				}


			 	if ($fisicamenteEstructura__rescatado==6 || $fisicamenteEstructura__rescatado==15 || $fisicamenteEstructura__rescatado==1 || $fisicamenteEstructura__reales==1) {

			 		if($fisicamenteEstructura__reales==1){

			 			$direccionDocumentos23="../../documentos/modificacion/informe/instalaciones/"; 

			 			$nombreDocumentos23=$fecha_actual."__".$idOrganismo.".pdf";

			 			if ($fisicamenteEstructura__reales==1 && $noCorresponde__instalaciones__var==0) {

			 				$documento23=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar2"]['type'],$_FILES["pdfGeneradoCargar2"]['size'],$_FILES["pdfGeneradoCargar2"]['tmp_name'],$_FILES["pdfGeneradoCargar2"]['name'],$direccionDocumentos23,$nombreDocumentos23);

			 			}

			 			if ($noCorresponde__infra__var=="1" || $noCorresponde__infra__var==1) {
			 				$nombreDocumentosInfraestructura=" ";
			 			}
			 			
			 			if ($noCorresponde__instalaciones__var=="1" || $noCorresponde__instalaciones__var==1) {
			 				$nombreDocumentosInstalaciones=" ";
			 			}


			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfraR='$selector__lineas',idInstalacionesR='$selector__lineas',documentoInfraestructura='$nombreDocumentosInfraestructura',documentoInstalaciones='$nombreDocumentosInstalaciones' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";



				 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'INFRA/INSTA', '$fecha_actual', '$hora_actual','$idTramite');";

			 		}else if ($fisicamenteEstructura__rescatado==15 || ($fisicamenteEstructura__rescatado==1 && $fisicamenteEstructura__reales==15)) {
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfraR='$selector__lineas',documentoInfraestructura='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'INFRAESTRUCTURA', '$fecha_actual', '$hora_actual','$idTramite');";
				 	}else{
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idInstalacionesR='$selector__lineas',documentoInstalaciones='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'INSTALACIONES', '$fecha_actual', '$hora_actual','$idTramite');";
				 	}
				 	$resultado3= $conexionEstablecida->exec($query3);
				 	$resultado= $conexionEstablecida->exec($query);



			 	}else if($fisicamenteEstructura__rescatado==5 || $fisicamenteEstructura__reales==2 || $fisicamenteEstructura__rescatado==2){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioFinanR='$selector__lineas',documentoAdministrativo='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'ADMINISTRATIVO', '$fecha_actual', '$hora_actual','$idTramite');";
			 		$resultado3= $conexionEstablecida->exec($query3);

			 	}else if($fisicamenteEstructura__rescatado==12 || $fisicamenteEstructura__rescatado==24 || $fisicamenteEstructura__rescatado==26 || $fisicamenteEstructura__rescatado==13 || $fisicamenteEstructura__rescatado==19 || $fisicamenteEstructura__rescatado==25 || $fisicamenteEstructura__reales==26 || $fisicamenteEstructura__reales==25  || $fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==14){

			 		if ($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==24  || $fisicamenteEstructura__reales==14) {

			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioR='$selector__lineas',documentoAlto='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 			$resultado= $conexionEstablecida->exec($query);

		 				$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'ALTO', '$fecha_actual', '$hora_actual','$idTramite');";
			 			$resultado3= $conexionEstablecida->exec($query3);


			 		}else{

			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioR='$selector__lineas',documentoDesarrollo='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 			$resultado= $conexionEstablecida->exec($query);

			 			$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'DESARROLLO', '$fecha_actual', '$hora_actual','$idTramite');";
			 			$resultado3= $conexionEstablecida->exec($query3);

			 		}


			 	}
			 	

			 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'Recomendar', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
			 	$resultado2= $conexionEstablecida->exec($query2);

		 	}

			$mensaje=1;
			$jason['mensaje']=$mensaje;


		 	// if ($informacion[0][id_rol]==4 && $informacion[0][fisicamenteEstructura]==3) {


			 // 	$queryParticionistas="UPDATE poa_modificaciones_envio_inicial SET estado='T' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 // 	$resultadoParticionistas= $conexionEstablecida->exec($queryParticionistas);
		 		
		 	// 	$informacionActualizas=$objeto->getObtenerInformacionGeneral("SELECT idOrigenDestino,actividadOrigen,idFinancierioOrigen,eneroOrigen,febreroOrigen,marzoOrigen,abrilOrigen,mayoOrigen,junioOrigen,julioOrigen,agostoOrigen,septiembreOrigen,noviembreOrigen,diciembreOrigen,totalOrigen,eneroOrigen__restando,febreroOrigen__restando,marzoOrigen__restando,abrilOrigen__restando,mayoOrigen__restando,junioOrigen__restando,julioOrigen__restando,agostoOrigen__restando,septiembreOrigen__restando,octubreOrigen__restando,noviembreOrigen__restando,diciembreOrigen__restando,actividadDestino,eventosDestino,idFinancierioDestino,eneroDestino,febreroDestino,marzoDestino,abrilDestino,mayoDestino,junioDestino,julioDestino,agostoDestino,septiembreDestino,octubreDestino,noviembreDestino,diciembreDestino,totalDestino,eneroDestino__sumando,febreroDestino__sumando,marzoDestino__sumando,abrilDestino__sumando,mayoDestino__sumando,junioDestino__sumando,julioDestino__sumando,agostoDestino__sumando,septiembreDestino__sumando,octubreDestino__sumando,diciembreDestino__sumando,sueldoDestino,aportePatronalDestino,decimoTerceraDestino,decimoCuartaDestino,fondosReservaDestino,sueldoDestino__sumando,aportePatronalDestino__sumando,decimoTerceraDestino__sumando,decimoCuartaDestino__sumando,fondosReservaDestino__sumando,salarioOrigen,aportePatronalOrigen,decimoTerceroOrigen,decimoCuartoOrigen,fondosDeReservaOrigen,salarioOrigen__restando,aportePatronalOrigen__restando,decimoTerceroOrigen__restando,decimoCuartoOrigen__restando,fondosDeReservaOrigen__restando,calificacion,identificadorPaginaReal,tipoTramite,fecha FROM poa_modificaciones_origen_destino WHERE idModificacionDerfinitiva='$idTramite';");

		 	// 	$contadorX=0;

				// foreach ($informacionActualizas as $valor) {

				// 	if ($valor["calificacion"]=="VALIDADO") {
				// 		$query10="UPDATE poa_modificaciones_origen_destino SET validado='1' WHERE idOrigenDestino='".$valor['idOrigenDestino']."';";
				// 		$resultado10= $conexionEstablecida->exec($query10);
				// 	}else{
				//  		$query10="UPDATE poa_modificaciones_origen_destino SET validado='0' WHERE idOrigenDestino='".$valor['idOrigenDestino']."';";
				// 		$resultado10= $conexionEstablecida->exec($query10);

				// 	}

				// 	$sumadorDeOrigenes=0;
				// 	$sumadorDestinos=0;

				// 	$informacionActualizas__1__identificador=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");
				// 	$informacionActualizas__1__identificador__2=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");


			 // 		if ((($valor['actividadOrigen']!=4 && $valor['actividadDestino']!=4 ) || !empty($informacionActualizas__1__identificador[0][idPda]) || !empty($informacionActualizas__1__identificador__2[0][idPda])) && ($valor["tipoTramite"]==1 || $valor["tipoTramite"]==2) && $valor["calificacion"]=="VALIDADO") {


			 // 			/*==============================
			 // 			=            Orígen            =
			 // 			==============================*/
		 	// 			if (($valor['actividadOrigen']==3 || $valor['actividadOrigen']==4 || $valor['actividadOrigen']==5 || $valor['actividadOrigen']==6 || $valor['actividadOrigen']==7) && ($fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==26)) {
			 				
			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");

			 // 				$realizadorActualizadores=getObtenerInformacion__inicial__actividades__deportivas($informacionActualizas__1[0][idPda],$valor["fecha"],$valor['actividadOrigen']);

				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");


				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_actdeportivas SET totalElem='$sumadorDeOrigenes' WHERE idPda='".$informacionActualizas__1[0][idPda]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);




			 // 			}else if($valor['actividadOrigen']==2  && $fisicamenteEstructura__reales==1){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idMantenimiento FROM poa_mantenimiento WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");

			 // 				$realizadorActualizadores=getObtenerInformacion__inicial__mantenimiento($informacionActualizas__1[0][idMantenimiento],$valor["fecha"],$valor['actividadOrigen']);


				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_mantenimiento SET total='$sumadorDeOrigenes' WHERE idMantenimiento='".$informacionActualizas__1[0][idMantenimiento]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadOrigen']==1  && $fisicamenteEstructura__reales==2){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_actividadesadministrativas WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';");


			 // 				$realizadorActualizadores=getObtenerInformacion__inicial__actividades__administrativas($informacionActualizas__1[0][idProgramacionFinanciera],$valor["fecha"],$valor['actividadOrigen']);


				// 			$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_programacion_financiera SET totalTotales='$sumadorDeOrigenes',totalSumaItem='$sumadorDeOrigenes' WHERE idProgramacionFinanciera='".$valor['idFinancierioOrigen']."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);

			 // 			}			 			
			 // 			/*=====  End of Orígen  ======*/
			 			
			 // 			/*===============================
			 // 			=            Destino            =
			 // 			===============================*/
			 			
			 // 			if (($valor['actividadDestino']==3 || $valor['actividadDestino']==4 || $valor['actividadDestino']==5 || $valor['actividadDestino']==6 || $valor['actividadDestino']==7) && ($fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==26)) {
			 				
			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idPda FROM poa_actdeportivas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");

			 // 				$realizadorActualizadores__destino=getObtenerInformacion__inicial__actividades__deportivas($informacionActualizas__1[0][idPda],$valor["fecha"],$valor['actividadDestino']);


				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idPda],"poa_actdeportivas","idPda");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_actdeportivas SET totalElem='$sumadorDeOrigenes' WHERE idPda='".$informacionActualizas__1[0][idPda]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadDestino']==2  && $fisicamenteEstructura__reales==1){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idMantenimiento FROM poa_mantenimiento WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");

			 // 				$realizadorActualizadores__2=getObtenerInformacion__inicial__mantenimiento($informacionActualizas__1[0][idMantenimiento],$valor["fecha"],$valor['actividadDestino']);


				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idMantenimiento],"poa_mantenimiento","idMantenimiento");


				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 			$query2="UPDATE poa_mantenimiento SET total='$sumadorDeOrigenes' WHERE idMantenimiento='".$informacionActualizas__1[0][idMantenimiento]."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);


			 // 			}else if($valor['actividadDestino']==1  && $fisicamenteEstructura__reales==2){

			 // 				$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idProgramacionFinanciera FROM poa_actividadesadministrativas WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';");

			 // 				$realizadorActualizadores__2=getObtenerInformacion__inicial__actividades__administrativas($informacionActualizas__1[0][idProgramacionFinanciera],$valor["fecha"],$valor['actividadDestino']);

				// 			$eneroResultado=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$febreroResultado=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$marzoResultado=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$abrilResultado=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$mayoResultado=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$junioResultado=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$julioResultado=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$agostoResultado=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$septiembreResultado=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$octubreResultado=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$noviembreResultado=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");
				// 			$diciembreResultado=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__1[0][idProgramacionFinanciera],"poa_programacion_financiera","idProgramacionFinanciera");

				// 			$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);



				// 			$query2="UPDATE poa_programacion_financiera SET totalTotales='$sumadorDeOrigenes',totalSumaItem='$sumadorDeOrigenes' WHERE idProgramacionFinanciera='".$valor['idFinancierioDestino']."';";
				// 			$resultado2= $conexionEstablecida->exec($query2);

			 // 			}	
			 			
			 // 			/*=====  End of Destino  ======*/


			 			
			 // 		}else if(($valor['identificadorPaginaReal']=="honorarios" || $valor['identificadorPaginaReal']=="honorarios__item") && ($valor["tipoTramite"]==1 || $valor["tipoTramite"]==2) && $valor["calificacion"]=="VALIDADO"){			 			

			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios FROM poa_honorarios2022 WHERE idHonorarios='".$valor['idFinancierioOrigen']."';");

			 // 			$realizadorActualizadores=getObtenerInformacion__inicial__honorarios($informacionActualizas__1[0][idHonorarios],$valor["fecha"],$valor['actividadOrigen']);


				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idHonorarios],"poa_honorarios2022","idHonorarios");

				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_honorarios2022 SET total='$sumadorDeOrigenes' WHERE idHonorarios='".$informacionActualizas__1[0][idHonorarios]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);

				// 		$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idHonorarios FROM poa_honorarios2022 WHERE idHonorarios='".$valor['idFinancierioDestino']."';");

				// 		$realizadorActualizadores__destino=getObtenerInformacion__inicial__honorarios($informacionActualizas__2[0][idHonorarios],$valor["fecha"],$valor['actividadDestino']);


				// 		$eneroResultadoDos=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$febreroResultadoDos=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$marzoResultadoDos=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$abrilResultadoDos=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$mayoResultadoDos=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$junioResultadoDos=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$julioResultadoDos=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$agostoResultadoDos=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$septiembreResultadoDos=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$octubreResultadoDos=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$noviembreResultadoDos=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");
				// 		$diciembreResultadoDos=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__2[0][idHonorarios],"poa_honorarios2022","idHonorarios");

				// 		$sumadorDestinos=floatval($eneroResultadoDos) + floatval($febreroResultadoDos) + floatval($marzoResultadoDos) + floatval($abrilResultadoDos) + floatval($mayoResultadoDos) + floatval($junioResultadoDos) + floatval($julioResultadoDos) + floatval($agostoResultadoDos) + floatval($septiembreResultadoDos) + floatval($octubreResultadoDos) + floatval($noviembreResultadoDos) + floatval($diciembreResultadoDos);


				// 		$query20="UPDATE poa_honorarios2022 SET total='$sumadorDestinos' WHERE idHonorarios='".$informacionActualizas__2[0][idHonorarios]."';";
				// 		$resultado20= $conexionEstablecida->exec($query20);


			 // 		}else if(($valor['identificadorPaginaReal']=="sueldos" || $valor['identificadorPaginaReal']=="sueldos__item") && ($valor["tipoTramite"]==1 || $valor["tipoTramite"]==2) && $valor["calificacion"]=="VALIDADO"){			 			


			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioOrigen']."';");

			 // 			$realizadorActualizadores=getObtenerInformacion__inicial__sueldos($informacionActualizas__1[0][idSueldos],$valor["fecha"],$valor['actividadOrigen']);


				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");


				// 		$sueldoSalarioResultado=getObtenerMeses__definidos__origen($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado=getObtenerMeses__definidos__origen($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado=getObtenerMeses__definidos__origen($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado=getObtenerMeses__definidos__origen($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado=getObtenerMeses__definidos__origen($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");


				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_sueldossalarios2022 SET total='$sumadorDeOrigenes' WHERE idSueldos='".$informacionActualizas__1[0][idSueldos]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);

				// 		$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioDestino']."';");

				// 		$realizadorActualizadores__destino=getObtenerInformacion__inicial__sueldos($informacionActualizas__2[0][idSueldos],$valor["fecha"],$valor['actividadDestino']);


				// 		$eneroResultadoDos=getObtenerMeses__definidos__destino($valor['eneroDestino'],'enero',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultadoDos=getObtenerMeses__definidos__destino($valor['febreroDestino'],'febrero',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultadoDos=getObtenerMeses__definidos__destino($valor['marzoDestino'],'marzo',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultadoDos=getObtenerMeses__definidos__destino($valor['abrilDestino'],'abril',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultadoDos=getObtenerMeses__definidos__destino($valor['mayoDestino'],'mayo',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultadoDos=getObtenerMeses__definidos__destino($valor['junioDestino'],'junio',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultadoDos=getObtenerMeses__definidos__destino($valor['julioDestino'],'julio',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultadoDos=getObtenerMeses__definidos__destino($valor['agostoDestino'],'agosto',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultadoDos=getObtenerMeses__definidos__destino($valor['septiembreDestino'],'septiembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultadoDos=getObtenerMeses__definidos__destino($valor['octubreDestino'],'octubre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultadoDos=getObtenerMeses__definidos__destino($valor['noviembreDestino'],'noviembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultadoDos=getObtenerMeses__definidos__destino($valor['diciembreDestino'],'diciembre',$informacionActualizas__2[0][idSueldos],"poa_sueldossalarios2022","idSueldos");



				// 		$sueldoSalarioResultado__2=getObtenerMeses__definidos__destino($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado__2=getObtenerMeses__definidos__destino($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado__2=getObtenerMeses__definidos__destino($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado__2=getObtenerMeses__definidos__destino($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado__2=getObtenerMeses__definidos__destino($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");

				// 		$sumadorDestinos=floatval($eneroResultadoDos) + floatval($febreroResultadoDos) + floatval($marzoResultadoDos) + floatval($abrilResultadoDos) + floatval($mayoResultadoDos) + floatval($junioResultadoDos) + floatval($julioResultadoDos) + floatval($agostoResultadoDos) + floatval($septiembreResultadoDos) + floatval($octubreResultadoDos) + floatval($noviembreResultadoDos) + floatval($diciembreResultadoDos);


				// 		$query20="UPDATE poa_sueldossalarios2022 SET total='$sumadorDestinos' WHERE idSueldos='".$informacionActualizas__2[0][idSueldos]."';";
				// 		$resultado20= $conexionEstablecida->exec($query20);

						
			 // 		}else if($valor['identificadorPaginaReal']=="desvinculacion" && $valor["calificacion"]=="VALIDADO"){	

			 // 			$informacionActualizas__1=$objeto->getObtenerInformacionGeneral("SELECT idSueldos FROM poa_sueldossalarios2022 WHERE idSueldos='".$valor['idFinancierioOrigen']."';");

			 // 			$realizadorActualizadores=getObtenerInformacion__inicial__sueldos($informacionActualizas__1[0][idSueldos],$valor["fecha"],$valor['actividadOrigen']);


				// 		$eneroResultado=getObtenerMeses__definidos__origen($valor['eneroOrigen'],'enero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$febreroResultado=getObtenerMeses__definidos__origen($valor['febreroOrigen'],'febrero',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$marzoResultado=getObtenerMeses__definidos__origen($valor['marzoOrigen'],'marzo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$abrilResultado=getObtenerMeses__definidos__origen($valor['abrilOrigen'],'abril',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$mayoResultado=getObtenerMeses__definidos__origen($valor['mayoOrigen'],'mayo',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$junioResultado=getObtenerMeses__definidos__origen($valor['junioOrigen'],'junio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$julioResultado=getObtenerMeses__definidos__origen($valor['julioOrigen'],'julio',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$agostoResultado=getObtenerMeses__definidos__origen($valor['agostoOrigen'],'agosto',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$septiembreResultado=getObtenerMeses__definidos__origen($valor['septiembreOrigen'],'septiembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$octubreResultado=getObtenerMeses__definidos__origen($valor['octubreOrigen'],'octubre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$noviembreResultado=getObtenerMeses__definidos__origen($valor['noviembreOrigen'],'noviembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$diciembreResultado=getObtenerMeses__definidos__origen($valor['diciembreOrigen'],'diciembre',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");

				// 		$sueldoSalarioResultado=getObtenerMeses__definidos__origen($valor['salarioOrigen'],'sueldoSalario',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$aportePatronalResultado=getObtenerMeses__definidos__origen($valor['aportePatronalOrigen'],'aportePatronal',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoTerceroResultado=getObtenerMeses__definidos__origen($valor['decimoTerceroOrigen'],'decimoTercera',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$decimoCuartoResultado=getObtenerMeses__definidos__origen($valor['decimoCuartoOrigen'],'decimoCuarta',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");
				// 		$fondosReservaResultado=getObtenerMeses__definidos__origen($valor['fondosDeReservaOrigen'],'fondosReserva',$informacionActualizas__1[0][idSueldos],"poa_sueldossalarios2022","idSueldos");



				// 		$sumadorDeOrigenes=floatval($eneroResultado) + floatval($febreroResultado) + floatval($marzoResultado) + floatval($abrilResultado) + floatval($mayoResultado) + floatval($junioResultado) + floatval($julioResultado) + floatval($agostoResultado) + floatval($septiembreResultado) + floatval($octubreResultado) + floatval($noviembreResultado) + floatval($diciembreResultado);


				// 		$query2="UPDATE poa_sueldossalarios2022 SET total='$sumadorDeOrigenes' WHERE idSueldos='".$informacionActualizas__1[0][idSueldos]."';";
				// 		$resultado2= $conexionEstablecida->exec($query2);



			 // 			$informacionActualizas__2=$objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_item WHERE idItem='".$valor['idFinancierioDestino']."';");

			 // 			$realizadorActualizadores__2=getObtenerInformacion__inicial__financiero__desvinculaciones($valor['idFinancierioDestino'],$valor["fecha"],$valor['actividadDestino'],$idOrganismo);


			 // 			$variableRetornos="";

			 // 			if ($informacionActualizas__2[0][idItem]==156) {
			 // 				$variableRetornos="despido";
			 // 			}else if ($informacionActualizas__2[0][idItem]==49) {
			 // 				$variableRetornos="desahucio";
			 // 			}else if ($informacionActualizas__2[0][idItem]==94) {
			 // 				$variableRetornos="renuncia";
			 // 			}else if ($informacionActualizas__2[0][idItem]==50) {
			 // 				$variableRetornos="compensación";
			 // 			}

			 // 			$sumadorDespidos=0;

			 // 			$sumadorDespidos=floatval($valor['eneroDestino']) + floatval($valor['febreroDestino']) + floatval($valor['marzoDestino']) + floatval($valor['abrilDestino']) + floatval($valor['mayoDestino']) + floatval($valor['junioDestino']) + floatval($valor['julioDestino']) + floatval($valor['agostoDestino']) + floatval($valor['septiembreDestino']) + floatval($valor['octubreDestino']) + floatval($valor['noviembreDestino']) + floatval($valor['diciembreDestino']);


				// 	 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificacion_desvinculacion_inicio` (`idDesvinculacion`, `idSueldos`, `idOrganismo`, `opcion`, `enero`, `febreo`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `total`, `estado`, `perioIngreso`) VALUES (NULL, ".$informacionActualizas__1[0][idSueldos].", $idOrganismo, '$variableRetornos', ".$valor['eneroDestino'].", ".$valor['febreroDestino'].", ".$valor['marzoDestino'].", ".$valor['abrilDestino'].", ".$valor['mayoDestino'].", ".$valor['junioDestino'].",".$valor['julioDestino'].", ".$valor['agostoDestino'].", ".$valor['septiembreDestino'].", ".$valor['octubreDestino'].",".$valor['noviembreDestino'].",".$valor['diciembreDestino'].", $sumadorDespidos, 1, $aniosPeriodos__ingesos);";
				// 	 	$resultado2= $conexionEstablecida->exec($query2);


			 // 		}
			 		

				// }

		 	// }

		break;

		case "recomendar__modificaciones__analistas":

			if (!empty($selector__lineas)) {
				
				$conexionRecuperada= new conexion();
			 	$conexionEstablecida=$conexionRecuperada->cConexion();	
			 		

			 	if ($fisicamenteEstructura__reales==6 || $fisicamenteEstructura__reales==15) {

				 	if ($fisicamenteEstructura__reales==15) {
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 	}else{
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 	}
				 	$resultado= $conexionEstablecida->exec($query);


			 	}else if($fisicamenteEstructura__reales==5){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioFinan='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 	}else if($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==26 || $fisicamenteEstructura__reales==13 || $fisicamenteEstructura__reales==19 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==14){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuario='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 	}
			 	

			 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'Recomendar', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
			 	$resultado2= $conexionEstablecida->exec($query2);


			}else{

				$arrayValores=json_decode($arrayValores);
				$arrayId=json_decode($arrayId);
				$arrayValoresO=json_decode($arrayValoresO);

				if ($tipoDocumento__D=="alto") {
					$direccionDocumentos="../../documentos/modificacion/informe/altoRendimiento/";
				}else if ($tipoDocumento__D=="formativo") {
					$direccionDocumentos="../../documentos/modificacion/informe/desarrollo/";
				}else if ($tipoDocumento__D=="infraestructura") {
					$direccionDocumentos="../../documentos/modificacion/informe/infraestructura/";
				}else if ($tipoDocumento__D=="planificacion") {
					$direccionDocumentos="../../documentos/modificacion/informe/planificacion/";
				}else if ($tipoDocumento__D=="administrativo") {
					$direccionDocumentos="../../documentos/modificacion/informe/administrativo/";
				}else{
					$direccionDocumentos="../../documentos/modificacion/informe/instalaciones/";
				}

			 	$nombreDocumentos=$fecha_actual."__".$idOrganismo.".pdf";

				$documento=$objeto->getEnviarPdf($_FILES["pdfGeneradoCargar"]['type'],$_FILES["pdfGeneradoCargar"]['size'],$_FILES["pdfGeneradoCargar"]['tmp_name'],$_FILES["pdfGeneradoCargar"]['name'],$direccionDocumentos,$nombreDocumentos);


				$conexionRecuperada= new conexion();
			 	$conexionEstablecida=$conexionRecuperada->cConexion();	

			 	foreach ($arrayId as $key => $value) {
			 		
			 		$queryT="UPDATE poa_modificaciones_origen_destino SET calificacion='$arrayValores[$key]',observaciones='$arrayValoresO[$key]' WHERE idOrigenDestino='$value';";
			 		$resultadoT= $conexionEstablecida->exec($queryT);

			 	}

			 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT (SELECT a1.id_usuario FROM th_usuario AS a1 WHERE a1.id_usuario=a.PersonaACargo) AS id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario__ingresos';");

			 	$id_usuario__rescatado=$informacion[0][id_usuario];

			 	if ($fisicamenteEstructura__reales==6 || $fisicamenteEstructura__reales==15) {

				 	if ($fisicamenteEstructura__reales==15) {
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='1',idUsuarioInfraR='$id_usuario__rescatado',documentoInfraestructura='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'INFRAESTRUCTURA', '$fecha_actual', '$hora_actual','$idTramite');";
				 	}else{
				 		$query="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='1',idInstalacionesR='$id_usuario__rescatado',documentoInstalaciones='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'INSTALACIONES', '$fecha_actual', '$hora_actual','$idTramite');";
				 	}


				 	$resultado3= $conexionEstablecida->exec($query3);
				 	$resultado= $conexionEstablecida->exec($query);


			 	}else if($fisicamenteEstructura__reales==5){

			 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioFinan='1',idUsuarioFinanR='$id_usuario__rescatado',documentoAdministrativo='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		$resultado= $conexionEstablecida->exec($query);

			 		$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'ADMINISTRATIVO', '$fecha_actual', '$hora_actual','$idTramite');";
			 		$resultado3= $conexionEstablecida->exec($query3);

			 	}else if($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==24  || $fisicamenteEstructura__reales==14 || $fisicamenteEstructura__reales==26 || $fisicamenteEstructura__reales==13 || $fisicamenteEstructura__reales==19 || $fisicamenteEstructura__reales==25){

			 		if ($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==24  || $fisicamenteEstructura__reales==14 ) {
			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuario='1',idUsuarioR='$id_usuario__rescatado',documentoAlto='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 			$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'ALTO', '$fecha_actual', '$hora_actual','$idTramite');";
			 			$resultado3= $conexionEstablecida->exec($query3);
			 		}else{
			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuario='1',idUsuarioR='$id_usuario__rescatado',documentoDesarrollo='$nombreDocumentos' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 			$query3="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_documento_lineas` (`idDocumentosM`, `documento`, `idOrganismo`, `tipo`, `fecha`, `hora`, `idModificacionDerfinitiva`) VALUES (NULL, '$nombreDocumentos', $idOrganismo, 'DESARROLLO', '$fecha_actual', '$hora_actual','$idTramite');";
			 			$resultado3= $conexionEstablecida->exec($query3);
			 		}

			 		$resultado= $conexionEstablecida->exec($query);

			 	}
			 	

			 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $id_usuario__rescatado, $idUsuario__ingresos, 'Recomendar', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
			 	$resultado2= $conexionEstablecida->exec($query2);


			}

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;


		case "reasignar__modificaciones":

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$informacion=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$selector__lineas';");
		 	$rol__seleccionado=$informacion[0][id_rol];
		 	$fisicamente__seleccionado=$informacion[0][fisicamenteEstructura];

		 	if (($idRol==4 || $idRol==2) && ($fisicamenteEstructura__reales==1 || $fisicamenteEstructura__reales==6 || $fisicamenteEstructura__reales==15)) {

		 		if ($rol__seleccionado==4 && $fisicamente__seleccionado==1) {
		 			$selector__lineas=0;
		 		}

		 		if ($idRol==4 && $fisicamenteEstructura__reales==1) {
		 			
			 		$array = explode(",", $selector);
			 		foreach ($array as $key => $value) {

			 			$informacion=$objeto->getObtenerInformacionGeneral("SELECT b.id_rol,a.fisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$value';");
		 				$fisicamente__seleccionado__array=$informacion[0][fisicamenteEstructura];
			 			
			 			if ($fisicamente__seleccionado__array==15) {
				 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='$value' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		}else{
				 			$query="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='$value' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
				 		}

				 		$resultado= $conexionEstablecida->exec($query);

			 		}

		 		}else{

			 		if ($fisicamenteEstructura__reales==15) {
			 			$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioInfra='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		}else{
			 			$query="UPDATE poa_modificaciones_envio_inicial SET idInstalaciones='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
			 		}
			 		$resultado= $conexionEstablecida->exec($query);

		 		}


		 	}else if(($idRol==4 || $idRol==2) && ($fisicamenteEstructura__reales==2 || $fisicamenteEstructura__reales==5)){
		 		if ($rol__seleccionado==4 && $fisicamente__seleccionado==2) {
		 			$selector__lineas=0;
		 		}
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuarioFinan='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$resultado= $conexionEstablecida->exec($query);
		 	}else if(($idRol==7 || $idRol==2) && ($fisicamenteEstructura__reales==12 || $fisicamenteEstructura__reales==24 || $fisicamenteEstructura__reales==26 || $fisicamenteEstructura__reales==13 || $fisicamenteEstructura__reales==19 || $fisicamenteEstructura__reales==25 || $fisicamenteEstructura__reales==14)){
		 		if (($rol__seleccionado==7 && $fisicamente__seleccionado==24) || ($rol__seleccionado==7 && $fisicamente__seleccionado==26)) {
		 			$selector__lineas=0;
		 		}
		 		$query="UPDATE poa_modificaciones_envio_inicial SET idUsuario='$selector__lineas' WHERE idModificacionDerfinitiva='$idTramite' AND idOrganismo='$idOrganismo';";
		 		$resultado= $conexionEstablecida->exec($query);
		 	}
		 	

		 	$query2="INSERT INTO `ezonshar_mdepsaddb`.`poa_modificaciones_envio_analistas` (`idTramitesModificaciones`, `idUsuario`, `idUsuarioEnvia`, `tipo`, `fecha`, `hora`, `idOrganismo`, `idTramite`, `periodoIngreso`) VALUES (NULL, $selector__lineas, $idUsuario__ingresos, 'Asignar', '$fecha_actual', '$hora_actual', '$idOrganismo', '$idTramite', '$aniosPeriodos__ingesos');";
		 	$resultado2= $conexionEstablecida->exec($query2);

			$mensaje=1;
			$jason['mensaje']=$mensaje;

		break;

	}

	echo json_encode($jason);





