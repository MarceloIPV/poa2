<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	$corPlanificas=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$corInsta=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorPlanificacion=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$planificacion=$corPlanificas[0][id_usuario];
	$instalaciones=$corInsta[0][id_usuario];
	$directorVariables=$directorPlanificacion[0][id_usuario];

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];

    switch ($tipo) {


		case "seguimiento__documentacionGenerada":

			// $query="SELECT a.fecha AS fecha,REPLACE(a.tipoTrimestre,'Trimestre','') AS trimestre,(SELECT a1.documento FROM poa_seguimiento_declaracion AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre ORDER BY a1.idDeclaracion DESC LIMIT 1) AS documento,(SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2  FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres DESC;";

			$query="SELECT (SELECT d1.fecha FROM poa_seguimiento_declaracion AS d1 WHERE d1.idOrganismo=a.idOrganismo ORDER BY d1.idDeclaracion DESC LIMIT 1) AS fecha, REPLACE(a.tipoTrimestre,'Trimestre','') AS trimestre,(SELECT a1.documento FROM poa_seguimiento_declaracion AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre and a1.perioIngreso=a.perioIngreso ORDER BY a1.idDeclaracion DESC LIMIT 1) AS documento,(SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo and a1.perioIngreso=a.perioIngreso ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2  FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres ASC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		
	

//************************************* reporte final seguimiento ****************************//
case "seguimiento__documentacionGenerada__2":

	// $query="SELECT a.trimestre, a.fecha, a.documento FROM poa_seguimiento_docuento_final AS a WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY trimestre ORDER BY trimestre ASC ;";

	$query="SELECT (SELECT d1.fecha FROM poa_seguimiento_docuento_final AS d1 WHERE d1.idOrganismo=a.idOrganismo ORDER BY d1.idDocumento_seguimiento DESC LIMIT 1) AS fecha, REPLACE(a.tipoTrimestre,'Trimestre','') AS trimestre, (SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documentoSIF, (SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2SIF  FROM poa_trimestrales AS a INNER JOIN poa_seguimiento_docuento_final AS b ON a.idOrganismo = b.idOrganismo WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres ASC;";
	

	$dataTablets=$objeto->getDatatablets2($query);

	echo json_encode($dataTablets);


break;	



		case "seguimiento__autogestiones":

			$query="SELECT detalleAu,ROUND(montoAu,2) AS monto,detalleDos,REPLACE(trimestre,'Trimestre',' ') AS periodo,perioIngreso AS anio FROM poa_segimiento_montos_autogestion WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__administrativas":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,e.registra_Contratacion,e.justificacion,a.perioIngreso AS anio FROM poa_seguimiento_administrativo AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem inner join poa_registro_contratacion as e on a.trimestre = e.trimestre and a.idOrganismo = e.idOrganismo and d.idItem = e.idItemCatalogo WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__indicadores":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadNombres,a.totalProgramado,a.totalEjecutado,REPLACE(a.trimestre,'Trimestre',' ') AS periodo,a.perioIngreso AS fecha FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__recreativo":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre, e.registra_Contratacion,e.justificacion,a.perioIngreso AS anio FROM poa_segimiento_recreativos AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;
		case "seguimiento__recreativoTec":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.fechaInicioP,a.fechaInicioEjecutado,a.fechaFinP,a.fechaFinEjecutado,a.tipoEvento,a.eventoTareaE,a.nivel,a.total,a.tipoOrganizacion,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_recreativo_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__sueldos__salarios":

			$query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_sueldossalarios2022 AS a1 INNER JOIN poa_actividades AS b1 ON a1.idActividad=b1.idActividades WHERE a1.idSueldos=a.idSueldosSalarios) AS actividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,b.cargo,b.tipoCargo ,a.sueldoSalarioPlanificado,a.sueldoSalarioEjecutado,a.aporteIessPlanificado,a.aporteIessEjecutado,a.decimoTerceroPlanificado,a.decimoTerceroEjecutado,a.decimoCuartoPlanificado,a.decimoCuartoEjecutado,a.fondosReservasPlanificado,a.fondosReservasEjecutado,a.compensacionDeshaucioProgramado,a.compensacionDeshaucioEjecutado,a.despidoIntepestivoProgramado,a.despidoIntepestivoEjecutado,a.reunciaVoluntariaProgramado,a.renunciaVoluntariaEjecutado,a.vacacionesProgramado,a.vacionesEjecutado ,a.mes,REPLACE(a.periodo,'Trimestre',' ') AS periodo,a.perioIngreso AS anio FROM poa_seguimiento_sueldos_salarios AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldosSalarios=b.idSueldos WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__honorarios":

			$query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_honorarios2022 AS a1 INNER JOIN poa_actividades AS b1 ON a1.idActividad=b1.idActividades WHERE a1.idHonorarios=a.idHonorarios) AS actividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,b.cargo,b.tipoCargo,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS fechaPro FROM poa_seguimiento_honorarios AS a INNER JOIN poa_honorarios2022 AS b ON a.idHonorarios=b.idHonorarios WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		
		case "seguimiento__mantenimientos":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,e.registra_Contratacion,e.justificacion,a.perioIngreso AS anio FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;
		
		case "seguimiento__mantenimientosTec":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_mantenimiento_tecnico AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		

		case "seguimiento__competencia":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre, e.registra_Contratacion,e.justificacion,a.perioIngreso AS anio FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		

		case "seguimiento__competenciaFor":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_competencia_formativo AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_actdeportivas AS e ON a.idAdministrativo=e.idPda  WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		

		case "seguimiento__implementacion":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre, e.registra_Contratacion,e.justificacion,a.perioIngreso AS anio FROM poa_segimiento_implementacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__competenciaAlto":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_competencia_alto2 AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacionTecni":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_capacitacion_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacion":

			$query="SELECT d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre, e.registra_Contratacion,e.justificacion, a.perioIngreso AS anio FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__reportes__anexosOD":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS rucOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,CONCAT_WS('------',IF(a.tipoTrimestre='primerTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='primerTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='primerTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosPrimerTrimestre,CONCAT_WS('------',IF(a.tipoTrimestre='segundoTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='segundoTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='segundoTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosSegundoTrimestre,CONCAT_WS('------',IF(a.tipoTrimestre='tercerTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='tercerTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='tercerTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosTercerTrimestre,CONCAT_WS('------',IF(a.tipoTrimestre='cuartoTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='cuartoTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='cuartoTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosCuartoTrimestre,(SELECT IF(a3.accion='Deporte','FORMATIVO',IF(a3.accion='RecreaciÃ³n','RECREACION','ALTO RENDIMIENTO')) FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo LIMIT 1) AS tiposFormativos,a.idOrganismo,YEAR(a.fecha) AS anio FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismoSession' AND  a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;	
		
		
	case "seguimiento__autogestiones__2":

			if($datos==1){

				 $trimestre="primerTrimestre";

			}else if($datos==2){

				 $trimestre="segundoTrimestre";

			}else if($datos==3){

				 $trimestre="tercerTrimestre";

			}else if($datos==4){

				 $trimestre="cuartoTrimestre";

			}


		  $query="SELECT detalleAu,ROUND(montoAu,2) AS monto,detalleDos,REPLACE(trimestre,'Trimestre',' ') AS periodo,perioIngreso AS anio FROM poa_segimiento_montos_autogestion WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestre' ORDER BY YEAR(fecha) DESC;";

		  $dataTablets=$objeto->getDatatablets($query);

		  echo json_encode($dataTablets);

	break;


	case "seguimiento__mantenimientosTec__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_mantenimiento_tecnico AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND YEAR(a.fecha)='$aniosPeriodos__ingesos' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";


		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

		case "seguimiento__capacitacionTecni__2":

			if($datos==1){

				 $trimestre="primerTrimestre";

			}else if($datos==2){

				 $trimestre="segundoTrimestre";

			}else if($datos==3){

				 $trimestre="tercerTrimestre";

			}else if($datos==4){

				 $trimestre="cuartoTrimestre";

			}			

		  $query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_capacitacion_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		  $dataTablets=$objeto->getDatatablets($query);

		  echo json_encode($dataTablets);

	  break;

	case "seguimiento__competenciaFor__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,b.nombreEvento AS evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_competencia_formativo AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

		case "seguimiento__competenciaAlto__2":


				if($datos==1){

					$trimestre="primerTrimestre";

				}else if($datos==2){

					$trimestre="segundoTrimestre";

				}else if($datos==3){

					$trimestre="tercerTrimestre";

				}else if($datos==4){

					$trimestre="cuartoTrimestre";

				}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_competencia_alto2 AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__recreativoTec__2":

				if($datos==1){

					$trimestre="primerTrimestre";

				}else if($datos==2){

					$trimestre="segundoTrimestre";

				}else if($datos==3){

					$trimestre="tercerTrimestre";

				}else if($datos==4){

					$trimestre="cuartoTrimestre";

				}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.fechaInicioP,a.fechaInicioEjecutado,a.fechaFinP,a.fechaFinEjecutado,a.tipoEvento,a.eventoTareaE,a.nivel,a.total,a.tipoOrganizacion,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_recreativo_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__indicadores__2":

				if($datos==1){

					$trimestre="primerTrimestre";

				}else if($datos==2){

					$trimestre="segundoTrimestre";

				}else if($datos==3){

					$trimestre="tercerTrimestre";

				}else if($datos==4){

					$trimestre="cuartoTrimestre";

				}


			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadNombres,a.totalProgramado,a.totalEjecutado,REPLACE(a.trimestre,'Trimestre',' ') AS periodo,a.perioIngreso AS fecha,a.documento FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

	case "seguimiento__sueldos__salarios__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}


		$query="SELECT b.idActividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.sueldoSalarioPlanificado,a.sueldoSalarioEjecutado,a.aporteIessPlanificado,a.aporteIessEjecutado,a.decimoTerceroPlanificado,a.decimoTerceroEjecutado,a.decimoCuartoPlanificado,a.decimoCuartoEjecutado,a.fondosReservasPlanificado,a.fondosReservasEjecutado,a.mes,REPLACE(a.periodo,'Trimestre',' ') AS periodo,a.perioIngreso AS anio  FROM poa_seguimiento_sueldos_salarios AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldosSalarios=b.idSueldos WHERE a.idOrganismo='$idOrganismoSession' AND a.periodo='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;


		case "seguimiento__honorarios__2":

				if($datos==1){

					$trimestre="primerTrimestre";

				}else if($datos==2){

					$trimestre="segundoTrimestre";

				}else if($datos==3){

					$trimestre="tercerTrimestre";

				}else if($datos==4){

					$trimestre="cuartoTrimestre";

				}

			$query="SELECT b.idActividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS fechaPro FROM poa_seguimiento_honorarios AS a INNER JOIN poa_honorarios2022 AS b ON a.idHonorarios=b.idHonorarios WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

	case "seguimiento__administrativas__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_seguimiento_administrativo AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "seguimiento__mantenimientos__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}


		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND YEAR(a.fecha)='$aniosPeriodos__ingesos' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "seguimiento__capacitacion__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}


		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "seguimiento__competencia__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "seguimiento__recreativo__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_segimiento_recreativos AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "seguimiento__implementacion__2":

			if($datos==1){

				$trimestre="primerTrimestre";

			}else if($datos==2){

				$trimestre="segundoTrimestre";

			}else if($datos==3){

				$trimestre="tercerTrimestre";

			}else if($datos==4){

				$trimestre="cuartoTrimestre";

			}

		$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,a.perioIngreso AS anio FROM poa_segimiento_implementacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;

	case "mostrar_datos_jurisdiccion2":

			
		$query="SELECT b.ruc, b.nombreOrganismo, c.nombreProvincia, d.nombreCanton, a.nombreZonal, a.idZonalEquipo FROM poa_organismo_zonal AS a INNER JOIN poa_organismo AS b ON a.idOrganismo = b.idOrganismo INNER JOIN in_md_provincias AS c ON b.idProvincia = c.idProvincia INNER JOIN in_md_canton AS d ON b.idCanton = d.idCanton";

		$dataTablets=$objeto->getDatatablets($query);

		echo json_encode($dataTablets);

	break;


	//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< MOSTRAR JURISDICCION >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
	case "mostrar_datos_jurisdiccion":
		$query="SELECT b.ruc, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, c.nombreProvincia, d.nombreCanton, a.nombreZonal, a.idZonalEquipo FROM poa_organismo_zonal AS a INNER JOIN poa_organismo AS b ON a.idOrganismo = b.idOrganismo INNER JOIN in_md_provincias AS c ON b.idProvincia = c.idProvincia INNER JOIN in_md_canton AS d ON b.idCanton = d.idCanton";

		$dataTablets=$objeto->getDatatablets2($query);
		echo json_encode($dataTablets);
	break;

	//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CONSULTA SI EXISTEDATOS JURISDICCION >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
	case "consulta_existe_datos_jurisdiccion":
		$query="SELECT * FROM poa_organismo_zonal AS a WHERE IdOrganismo = '$idOrganismoSession'";

		$dataTablets=$objeto->getDatatablets2($query);
		echo json_encode($dataTablets);
	break;

	//************************************* decalaracion de contratacion publica ****************************//
	case "dt_seguimiento__documentacionGenerada_cp":


		// $query="SELECT a.fecha AS fechaCP, REPLACE(a.tipoTrimestre,'Trimestre','') AS trimestreCP, (SELECT a1.documento FROM poa_seguimiento_declaracion_contratacion_publica AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre ORDER BY a1.id_declaracion_contratacion_publica DESC LIMIT 1) AS documentoCP,(SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2CP FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres DESC;";

		$query="SELECT (SELECT d1.fecha FROM poa_seguimiento_declaracion_contratacion_publica AS d1 WHERE d1.idOrganismo=a.idOrganismo ORDER BY d1.id_declaracion_contratacion_publica DESC LIMIT 1) AS fechaCP, REPLACE(a.tipoTrimestre,'Trimestre','') AS trimestreCP, (SELECT a1.documento FROM poa_seguimiento_declaracion_contratacion_publica AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre ORDER BY a1.id_declaracion_contratacion_publica DESC LIMIT 1) AS documentoCP,(SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2CP FROM poa_trimestrales AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres ASC;";


		$dataTablets=$objeto->getDatatablets2($query);

		echo json_encode($dataTablets);
	break;


    }

