<?php
	
	extract($_POST);
	require_once "../../config/config2.php";
	$objeto= new usuarioAcciones();
	
	session_start();
		$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
		if (isset($_SESSION["idOrganismoSession"])) {

			$idOrganismoSession=$_SESSION["idOrganismoSession"];

		}
		

    switch ($tipo) {

		case "recreativos__seguimiento__tablas":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRecreativos,a.mes,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.mensualProgramado,SUM(a.mensualEjecutado) AS mensualEjecutado,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,e.registra_Contratacion,e.justificacion   FROM poa_segimiento_recreativos AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem  INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem  WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY b.nombreEvento,a.mes,b.idPda ORDER BY d.nombreItem,a.mes,a.idRecreativos DESC;");


			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaRecreativo,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc) AS itemPreesupuestario FROM poa_seguimiento_facturas_recreativo AS a WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosRecreativo,a.documento,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc) AS itemPreesupuestario FROM poa_seguimiento_otros_recreativo AS a WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;
			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;	

		case "enviar__infor__data__seguimientos__infraestructura":

			if ($periodo=="primerTrimestre") {
				$constula="a.trimestre='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula="(a.trimestre='segundoTrimestre' OR a.trimestre='primerTrimestre')";
			}else if($periodo=="tercerTrimestre"){
				$constula="(a.trimestre='tercerTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula="(a.trimestre='cuartoTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre' OR a.trimestre='tercerTrimestre')";
			}	

			$indicadorInformacion1=$objeto->getObtenerInformacionGeneral("SELECT totalProgramado,totalEjecutado FROM poa_indicadores_seguimiento WHERE trimestre='primerTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismos';");
		

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT totalProgramado,totalEjecutado FROM poa_indicadores_seguimiento WHERE trimestre='segundoTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismos';");


			$indicadores__mantenimiento__monto=$objeto->getObtenerInformacionGeneral("SELECT d.nombreactividades, e.nombreIndicador,   sum(mensualProgramado), sum(mensualEjecutado) FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_actividades AS d ON c.idActividad = d.idActividades INNER JOIN poa_indicadores AS e ON d.idLineaPolitica=e.idIndicadores where a.idOrganismo='$idOrganismos' AND $constula  AND a.perioIngreso='$aniosPeriodos__ingesos' ");

			$indicadores__infraestructura_existe=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismos' AND $constula AND a.perioIngreso='$aniosPeriodos__ingesos' and idActividad='2';");

			//$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT totalProgramado,totalEjecutado FROM poa_indicadores_seguimiento WHERE trimestre='tercerTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismos';");

			//$indicadorInformacion4=$objeto->getObtenerInformacionGeneral("SELECT totalProgramado,totalEjecutado FROM poa_indicadores_seguimiento WHERE trimestre='cuartoTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismos';");

			$jason['indicadorInformacion1']=$indicadorInformacion1;
			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;
			$jason['indicadorInformacion4']=$indicadorInformacion4;
			$jason['indicadores__mantenimiento__monto']=$indicadores__mantenimiento__monto;
			$jason['indicadores__infraestructura_existe']=$indicadores__infraestructura_existe;
			

		break;	

		case "mostrar__infraestructura_indicadores":

			//$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInfras,b.tipoIntervencion,a.fecha,a.mensualEjecutado FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE c.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento, b.nombreInfras,b.tipoIntervencion,a.fecha,a.mensualEjecutado,d.documento FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo WHERE c.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.mensualEjecutado;");	

			
			$jason['indicadorInformacion']=$indicadorInformacion;

	

		break;	

		case "mostrar__infraestructura_documentos":

			$getDocumentosinforme_ejecucion=$objeto->getObtenerInformacionGeneral("select documento, trimestre  from poa_seguimiento_otros_mantenimiento_tecnico where idOrganismo='$idOrganismos' and perioIngreso='$aniosPeriodos__ingesos' and documento like '%INFORME EJECUCION%'");

			$getDocumentosRespaldo_Informe=$objeto->getObtenerInformacionGeneral("select documento, trimestre  from poa_seguimiento_otros_mantenimiento_tecnico where idOrganismo='$idOrganismos' and perioIngreso='$aniosPeriodos__ingesos' and documento like '%Respaldos%'");

			$getDocumentosOtros=$objeto->getObtenerInformacionGeneral("select documento, trimestre  from poa_seguimiento_otros_mantenimiento_tecnico where idOrganismo='$idOrganismos' and perioIngreso='$aniosPeriodos__ingesos' and documento like '%otros%'");

			$jason['getDocumentosinforme_ejecucion']=$getDocumentosinforme_ejecucion;
			$jason['getDocumentosRespaldo_Informe']=$getDocumentosRespaldo_Informe;
			$jason['getDocumentosOtros']=$getDocumentosOtros;

		break;	

		// case "mostrar__infraestructura_indicadores_admin":

		// 	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento, b.nombreInfras,b.tipoIntervencion,a.fecha,a.mensualEjecutado,d.documento,e.idMantenimiento AS idMantenimientoAdmin, e.detalle FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_seguimiento_otros_mantenimiento AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_seguimiento_reporte_infraestructura AS e ON e.idMantenimiento=a.idMantenimiento WHERE c.idOrganismo='$idOrganismos' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.mensualEjecutado;");	

			
		// 	$jason['indicadorInformacion']=$indicadorInformacion;

		// break;	

		case "enviar__infor__data__seguimientos__recorridos":

			if($area == "general"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}else if($area == "seguimiento"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' and (a1.descripcionFisicamenteEstructura like '%seguimiento%') AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}else if($area == "adFin"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' and (a1.descripcionFisicamenteEstructura like '%administrativa%' or a1.descripcionFisicamenteEstructura like '%financiera%') AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}else if($area == "actFis"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' and (a1.descripcionFisicamenteEstructura like '%fisica%' or a1.descripcionFisicamenteEstructura like '%recre%') AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}else if($area == "altoRen"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' and (a1.descripcionFisicamenteEstructura like '%alto%' or a1.descripcionFisicamenteEstructura like '%discapacidad%') AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}else if($area == "infra"){

				$envio__informaciones=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo, b.fecha,b.tipo,(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=b.fisicamente) AS estructura, (SELECT a1.usuario FROM th_usuario AS a1 WHERE a1.id_usuario=b.idFuncionario) AS usuarioActual,b.observacionesTecnicas FROM poa_organismo AS a INNER JOIN poa_seguimiento_recomienda_tecnicos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN th_fisicamenteestructura AS a1 on a1.id_FisicamenteEstructura=b.fisicamente WHERE a.idOrganismo='$idOrganismo' AND b.trimestre='$periodo' and (a1.descripcionFisicamenteEstructura like '%administracion%'  or a1.descripcionFisicamenteEstructura like '%infra%') AND b.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.fecha DESC;");
				
			}

			

			$jason['envio__informaciones']=$envio__informaciones;

		break; 

		//************************************  Infraestrucctura RECOMENDADOS  **************************************** */
		case "enviar__infor__data__seguimientos":


			$inversionPoas=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

			$poa__invers=$inversionPoas[0][nombreInversion];

			if ($periodo=="primerTrimestre") {
				$primero="enero";
				$segundo="febrero";
				$tercero="marzo";
			}else if($periodo=="segundoTrimestre"){
				$primero="abril";
				$segundo="mayo";
				$tercero="junio";
			}else if($periodo=="tercerTrimestre"){
				$primero="julio";
				$segundo="agosto";
				$tercero="septiembre";
			}else if($periodo=="cuartoTrimestre"){
				$primero="octubre";
				$segundo="noviembre";
				$tercero="diciembre";
			}

			if ($periodo=="primerTrimestre" OR $periodo=="segundoTrimestre") {
				$sumaSemestrales="SUM(a1.enero)+SUM(a1.febrero)+SUM(a1.marzo)+SUM(a1.abril)+SUM(a1.mayo)+SUM(a1.junio)";
			}else if($periodo=="tercerTrimestre" OR $periodo=="cuartoTrimestre"){
				$sumaSemestrales="SUM(a1.julio)+SUM(a1.agosto)+SUM(a1.septiembre)+SUM(a1.octubre)+SUM(a1.noviembre)+SUM(a1.diciembre)";
			}

			
			if ($periodo=="primerTrimestre") {
				$constula="a.trimestre='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula="(a.trimestre='segundoTrimestre' OR a.trimestre='primerTrimestre')";
			}else if($periodo=="tercerTrimestre"){
				$constula="(a.trimestre='tercerTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula="(a.trimestre='cuartoTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre' OR a.trimestre='tercerTrimestre')";
			}			


			if ($periodo=="primerTrimestre") {
				$constula2__3="a1.trimestre='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula2__3="(a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre')";
			}else if($periodo=="tercerTrimestre"){
				$constula2__3="(a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula2__3="(a1.trimestre='cuartoTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='tercerTrimestre')";
			}			

			if ($periodo=="primerTrimestre") {
				$constula2__3__periodo="a1.periodo='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula2__3__periodo="(a1.periodo='segundoTrimestre' OR a1.periodo='primerTrimestre')";
			}else if($periodo__periodo=="tercerTrimestre"){
				$constula2__3__periodo="(a1.periodo='tercerTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula2__3__periodo="(a1.periodo='cuartoTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre' OR a1.periodo='tercerTrimestre')";
			}			


			$primer__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasP,SUM(a.ejecutado) AS ejecutadoSumasP FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='primerTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");

			$segundo__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasS,SUM(a.ejecutado) AS ejecutadoSumasS FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='segundoTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");

			$tercer__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasT,SUM(a.ejecutado) AS ejecutadoSumasT FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='tercerTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");

			$cuarto__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasC,SUM(a.ejecutado) AS ejecutadoSumasC FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='cuartoTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");


			$medallas__altos__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.oro) AS oro,SUM(a.plata) AS plata,SUM(a.bronce) AS bronce,SUM(a.total) AS total FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");
			$sumas__altos__capacitadores=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.capacitadores) AS capacitadores FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");
			$sumas__altos__beneficiarios=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS totalBeneficiarios FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");

			$sumas__programados=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,IFNULL((SELECT a1.idSeguimientoFinanciero FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3 LIMIT 1),0) AS idSeguimientoFinanciero,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS actividades,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad)) AS sumaPlanificacion,                                                                                    IF( (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND a1.perioIngreso=a.perioIngreso AND $constula2__3) IS NULL OR (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)=0,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad)),(SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)) AS programado,                                a.idActividad,IFNULL((SELECT ROUND(SUM(a1.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3),0) AS planificado ,IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;");
			

			$sumas__programados__denitivos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT SUM(a1.programado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programado,(SELECT a1.planificado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS planificado,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idActividad;");

			$variable__1__suma__programados=$sumas__programados__denitivos[0][programado];
			$variable__1__suma__ejecutado=$sumas__programados__denitivos[0][ejecutado];
			$variable__1__suma__planificado=$sumas__programados__denitivos[0][planificado];
			

			$indicadores__altos=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismo' AND $constula AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadores__infraestructura_existe=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a WHERE a.idOrganismo='$idOrganismo' AND $constula AND a.perioIngreso='$aniosPeriodos__ingesos' and idActividad='2';");

			$indicadores__act3_7_for_recreativo_alto=$objeto->getObtenerInformacionGeneral("select (select coalesce(SUM(totalT)+SUM(totalT18),0) FROM poa_seguimiento_recreativo_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad6Registrado , (select coalesce(SUM(cantidadBienes),0) FROM poa_segimiento_capacitacion AS a1  WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad3Registrado, (select coalesce(SUM(total),0)  FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso='$aniosPeriodos__ingesos' and c.idOrganismo='$idOrganismo' AND c.idActividad = '3') as actividad3, (select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '7') as actividad7,(select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '6') as actividad6,  coalesce(SUM(a.cantidadBienes),0) actividad7Registrado  FROM poa_segimiento_implementacion AS a  WHERE a.idOrganismo='$idOrganismo' AND $constula  AND a.perioIngreso='$aniosPeriodos__ingesos'   GROUP BY a.idOrganismo;");


			$autogestion__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.montoAu) AS montoAutogestionables FROM poa_segimiento_montos_autogestion AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY idOrganismo;");

			$envio__tecnicos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$documentos__tecnicos=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='alto__rendimientos' ORDER BY idInformacionEnviada DESC LIMIT 1;");

			$documentos__tecnicos_actividad1=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='Actividad1' ORDER BY idInformacionEnviada DESC LIMIT 1;");
			
			$documentos__tecnicos_Contratacion=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='contratacionPublica' ORDER BY idInformacionEnviada DESC LIMIT 1;");

			$documentos__tecnico__2__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT documentos,observaciones,recomendaciones FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;");

			$envio__tecnicos__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='SEGUIMIENTO' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$envio__tecnicos__seguimientos__infraestructuras=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora,a.documentoInfras,a.documentoInstalaciones FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' and  (a.fisicamente = '15' OR a.fisicamente = '27' OR a.fisicamente = '28' OR a.fisicamente = '29' OR a.fisicamente = '30' OR a.fisicamente = '31' OR a.fisicamente = '32' OR a.fisicamente = '33') ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$envio__tecnicos__seguimientos__instalaciones=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora,a.documentoInfras,a.documentoInstalaciones FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' and  (a.fisicamente = '6' OR a.fisicamente = '27' OR a.fisicamente = '28' OR a.fisicamente = '29' OR a.fisicamente = '30' OR a.fisicamente = '31' OR a.fisicamente = '32' OR a.fisicamente = '33') ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$nuevo__infras__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_segimiento_mantenimiento AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' ORDER BY a.idMantenimiento DESC LIMIT 1;");


			$trimestrales__i__enviados=$objeto->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.tipoTrimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND estadoIR='T' ORDER BY a.idEnviadorTrimestres DESC LIMIT 1;");

			$trimestrales__financiero__enviados=$objeto->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.tipoTrimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND financieroR='0' ORDER BY a.idEnviadorTrimestres DESC LIMIT 1;");

			if (!empty($nuevo__infras__seguimientos[0][idMantenimiento])) {
				$var_n_se_in=1;
			}else{
				$var_n_se_in=0;
			}

			if (!empty($trimestrales__i__enviados[0][idEnviadorTrimestres])) {
				$var_n_se_in__45=1;
			}else{
				$var_n_se_in__45=0;
			}

			if (!empty($trimestrales__financiero__enviados[0][idEnviadorTrimestres])) {
				$var_n_se_financiero=1;
			}else{
				$var_n_se_financiero=0;
			}


			if (!empty($idUsuarioC)) {
				
				$envio__tecnicos__zonales=$objeto->getObtenerInformacionGeneral("SELECT zonal FROM th_usuario WHERE id_usuario='$idUsuarioC';");

				$zonal__eu=$envio__tecnicos__zonales[0][zonal];
				$jason['zonal__eu']=$zonal__eu;

			}


			$autogestionesV=$autogestion__formativos[0][montoAutogestionables];


			if ($tipo__dos=="FORMATIVO") {

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='formativo' ORDER BY idInformacionEnviada DESC LIMIT 1;");

				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoFR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

				$medallas__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.oro) AS oro,SUM(a.plata) AS plata,SUM(a.bronce) AS bronce,SUM(a.total) AS total FROM poa_seguimiento_competencia_formativo AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");

				$benficiarios__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS total, SUM(a.beneficiariosHombres18) AS hombres18,SUM(a.beneficiariosMujeres18) AS mujeres18,SUM(a.totalT18) AS total18 FROM poa_seguimiento_competencia_formativo AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");


			}else if ($tipo__dos=="RECREACIÓN" || $tipo__dos=="RECREACION") {

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND  tipo='recreativo' ORDER BY idInformacionEnviada DESC LIMIT 1;");


				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoFR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

				$benficiarios__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS total, SUM(a.beneficiariosHombres18) AS hombres18,SUM(a.beneficiariosMujeres18) AS mujeres18,SUM(a.totalT18) AS total18 FROM poa_seguimiento_competencia_formativo AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");

			}else{

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND  tipo='alto__rendimientos' ORDER BY idInformacionEnviada DESC LIMIT 1;");


				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoAlR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

			}

			$trimestrales__inrA=$objeto->getObtenerInformacionGeneral("SELECT estadoIR,estadoInR,estadoI,estadoIn FROM poa_trimestrales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo';");

			$estadoIR__estados=$trimestrales__inrA[0][estadoIR];
			$estadoINR__estados=$trimestrales__inrA[0][estadoInR];
			$estadoI__estados=$trimestrales__inrA[0][estadoI];
			$estadoIN__estados=$trimestrales__inrA[0][estadoIn];

			$jason['estadoIR__estados']=$estadoIR__estados;
			$jason['estadoINR__estados']=$estadoINR__estados;
			$jason['estadoI__estados']=$estadoI__estados;
			$jason['estadoIN__estados']=$estadoIN__estados;

			if (empty($primer__sumas[0][programadosSumasP])) {
				$primer__sumas__p=0;
			}else{
				$primer__sumas__p=$primer__sumas[0][programadosSumasP];
			}

			if (empty($primer__sumas[0][ejecutadoSumasP])) {
				$primer__sumas__e=0;
			}else{
				$primer__sumas__e=$primer__sumas[0][ejecutadoSumasP];
			}

			if (empty($segundo__sumas[0][programadosSumasS])) {
				$segundo__sumas__p=0;
			}else{
				$segundo__sumas__p=$segundo__sumas[0][programadosSumasS];
			}

						
			if (empty($segundo__sumas[0][ejecutadoSumasS])) {
				$segundo__sumas__e=0;
			}else{
				$segundo__sumas__e=$segundo__sumas[0][ejecutadoSumasS];
			}

			if (empty($tercer__sumas[0][programadosSumasT])) {
				$tercero__sumas__p=0;
			}else{
				$tercero__sumas__p=$tercer__sumas[0][programadosSumasT];
			}
			
			if (empty($tercer__sumas[0][ejecutadoSumasT])) {
				$tercero__sumas__e=0;
			}else{
				$tercero__sumas__e=$tercer__sumas[0][ejecutadoSumasT];
			}
			
			if (empty($cuarto__sumas[0][programadosSumasC])) {
				$cuarto__sumas__p=0;
			}else{
				$cuarto__sumas__p=$cuarto__sumas[0][programadosSumasC];
			}

			
			if (empty($cuarto__sumas[0][ejecutadoSumasC])) {
				$cuarto__sumas__e=0;
			}else{
				$cuarto__sumas__e=$cuarto__sumas[0][ejecutadoSumasC];
			}

			if(empty($autogestionesV)){

				$autogestionesV=0;

			}
			$jason['variable__1__suma__ejecutado']=$variable__1__suma__ejecutado;
			$jason['variable__1__suma__planificado']=$variable__1__suma__planificado;

			$jason['variable__1__suma__programados']=$variable__1__suma__programados;

			$jason['var_n_se_in__45']=$var_n_se_in__45;

			$jason['var_n_se_in']=$var_n_se_in;

			$jason['var_n_se_financiero']=$var_n_se_financiero;

			$jason['envio__tecnicos__seguimientos__infraestructuras']=$envio__tecnicos__seguimientos__infraestructuras;

			$jason['envio__tecnicos__seguimientos__instalaciones']=$envio__tecnicos__seguimientos__instalaciones;
			

			$jason['envio__tecnicos__seguimientos']=$envio__tecnicos__seguimientos;

			$jason['documentos__tecnico__2__seguimientos']=$documentos__tecnico__2__seguimientos;

			$jason['medallas__altos__formativos']=$medallas__altos__formativos;

			$jason['medallas__altos__sumas']=$medallas__altos__sumas;
			$jason['capacitadores__altos__sumas']=$sumas__altos__capacitadores;
			$jason['sumas__altos__beneficiarios']=$sumas__altos__beneficiarios;
			$jason['benficiarios__altos__formativos']=$benficiarios__altos__formativos;

			$jason['CONSULTA']=$constula;

			$jason['idOrg']=$idOrganismo;

			$jason['tipo']=$tipo__dos;

			$jason['aniosPeriodos__ingesos']=$aniosPeriodos__ingesos;

			$jason['indicadores__act3_7_for_recreativo_alto']=$indicadores__act3_7_for_recreativo_alto;
			
			$jason['indicadores__infraestructura_existe']=$indicadores__infraestructura_existe;
			
			$jason['varaible__culminados']=$varaible__culminados;

			$jason['documentos__tecnicos__2']=$documentos__tecnicos__2;

			$jason['documentos__tecnicos']=$documentos__tecnicos;

			$jason['documentos__tecnicos_actividad1']=$documentos__tecnicos_actividad1;
			$jason['documentos__tecnicos_Contratacion']=$documentos__tecnicos_Contratacion;

			
			$jason['envio__tecnicos']=$envio__tecnicos;

			$jason['autogestionesV']=$autogestionesV;

			$jason['indicadores__altos']=$indicadores__altos;

			$jason['primer__sumas__p']=$primer__sumas__p;
			$jason['primer__sumas__e']=$primer__sumas__e;
			$jason['segundo__sumas__p']=$segundo__sumas__p;
			$jason['segundo__sumas__e']=$segundo__sumas__e;
			$jason['tercero__sumas__p']=$tercero__sumas__p;
			$jason['tercero__sumas__e']=$tercero__sumas__e;
			$jason['cuarto__sumas__p']=$cuarto__sumas__p;
			$jason['cuarto__sumas__e']=$cuarto__sumas__e;

			$jason['poa__invers']=$poa__invers;
			$jason['sumas__programados']=$sumas__programados;

		break;

		case "enviar__infor__data__seguimientos2":


			$inversionPoas=$objeto->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");

			$poa__invers=$inversionPoas[0][nombreInversion];

			if ($periodo=="primerTrimestre") {
				$primero="enero";
				$segundo="febrero";
				$tercero="marzo";
			}else if($periodo=="segundoTrimestre"){
				$primero="abril";
				$segundo="mayo";
				$tercero="junio";
			}else if($periodo=="tercerTrimestre"){
				$primero="julio";
				$segundo="agosto";
				$tercero="septiembre";
			}else if($periodo=="cuartoTrimestre"){
				$primero="octubre";
				$segundo="noviembre";
				$tercero="diciembre";
			}

			if ($periodo=="primerTrimestre" OR $periodo=="segundoTrimestre") {
				$sumaSemestrales="SUM(a1.enero)+SUM(a1.febrero)+SUM(a1.marzo)+SUM(a1.abril)+SUM(a1.mayo)+SUM(a1.junio)";
			}else if($periodo=="tercerTrimestre" OR $periodo=="cuartoTrimestre"){
				$sumaSemestrales="SUM(a1.julio)+SUM(a1.agosto)+SUM(a1.septiembre)+SUM(a1.octubre)+SUM(a1.noviembre)+SUM(a1.diciembre)";
			}


			if ($periodo=="primerTrimestre") {
				$constula="a.trimestre='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula="(a.trimestre='segundoTrimestre' OR a.trimestre='primerTrimestre')";
			}else if($periodo=="tercerTrimestre"){
				$constula="(a.trimestre='tercerTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula="(a.trimestre='cuartoTrimestre' OR a.trimestre='primerTrimestre' OR a.trimestre='segundoTrimestre' OR a.trimestre='tercerTrimestre')";
			}			


			if ($periodo=="primerTrimestre") {
				$constula2__3="a1.trimestre='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula2__3="(a1.trimestre='segundoTrimestre' OR a1.trimestre='primerTrimestre')";
			}else if($periodo=="tercerTrimestre"){
				$constula2__3="(a1.trimestre='tercerTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula2__3="(a1.trimestre='cuartoTrimestre' OR a1.trimestre='primerTrimestre' OR a1.trimestre='segundoTrimestre' OR a1.trimestre='tercerTrimestre')";
			}			

			if ($periodo=="primerTrimestre") {
				$constula2__3__periodo="a1.periodo='primerTrimestre'";
			}else if($periodo=="segundoTrimestre"){
				$constula2__3__periodo="(a1.periodo='segundoTrimestre' OR a1.periodo='primerTrimestre')";
			}else if($periodo__periodo=="tercerTrimestre"){
				$constula2__3__periodo="(a1.periodo='tercerTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre')";
			}else if($periodo=="cuartoTrimestre"){
				$constula2__3__periodo="(a1.periodo='cuartoTrimestre' OR a1.periodo='primerTrimestre' OR a1.periodo='segundoTrimestre' OR a1.periodo='tercerTrimestre')";
			}			

			
			
			$primer__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasP,SUM(a.ejecutado) AS ejecutadoSumasP FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='primerTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");
			
			$segundo__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasS,SUM(a.ejecutado) AS ejecutadoSumasS FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='segundoTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");

			$tercer__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasT,SUM(a.ejecutado) AS ejecutadoSumasT FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='tercerTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");
			
			$cuarto__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.programado) AS programadosSumasC,SUM(a.ejecutado) AS ejecutadoSumasC FROM poa_seguimiento_reporteria AS a INNER JOIN poa_programacion_financiera AS b ON a.idOrganismo=b.idOrganismo WHERE a.trimestre='cuartoTrimestre' AND a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;");

			
			$medallas__altos__sumas=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.oro) AS oro,SUM(a.plata) AS plata,SUM(a.bronce) AS bronce,SUM(a.total) AS total FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");
			
			$sumas__altos__capacitadores=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.capacitadores) AS capacitadores FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");
		
			$sumas__altos__beneficiarios=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS totalBeneficiarios FROM poa_seguimiento_competencia_alto2 AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");
			
			$sumas__programados=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,IFNULL((SELECT a1.idSeguimientoFinanciero FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3 LIMIT 1),0) AS idSeguimientoFinanciero,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad LIMIT 1) AS actividades,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a.idActividad=a1.idActividad GROUP BY a1.idActividad)) AS sumaPlanificacion,                                                                                    IF( (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND a1.perioIngreso=a.perioIngreso AND $constula2__3) IS NULL OR (SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)=0,IF((SELECT a1.idOrganismo FROM poa_programacion_financiera_dos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad) IS NOT NULL,(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad),(SELECT ROUND($sumaSemestrales,2) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad=a1.idActividad AND a1.perioIngreso=a.perioIngreso GROUP BY a1.idActividad)),(SELECT ROUND(SUM(a1.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND a1.estado='A' AND $constula2__3)) AS programado,                                a.idActividad,IFNULL((SELECT ROUND(SUM(a1.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idActividad=a.idActividad AND a1.idOrganismo=a.idOrganismo AND a1.estado='A' AND $constula2__3),0) AS planificado ,IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso=a.perioIngreso AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3__periodo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND $constula2__3 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.perioIngreso=a.perioIngreso GROUP BY c.idActividad),0) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idActividad;");
			
			$indicadores__act3_7_for_recreativo_alto=$objeto->getObtenerInformacionGeneral("select (select coalesce(SUM(totalT)+SUM(totalT18),0) FROM poa_seguimiento_recreativo_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad6Registrado , (select coalesce(SUM(cantidadBienes),0) FROM poa_segimiento_capacitacion AS a1  WHERE a1.idOrganismo=a.idOrganismo      AND a1.perioIngreso=a.perioIngreso) as actividad3Registrado, (select coalesce(SUM(total),0)  FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso='$aniosPeriodos__ingesos' and c.idOrganismo='$idOrganismo' AND c.idActividad = '3') as actividad3, (select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '7') as actividad7,(select coalesce(SUM(b.canitdarBie),0) FROM poa_actdeportivas AS b INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE  b.perioIngreso=a.perioIngreso and c.idOrganismo=a.idOrganismo AND c.idActividad = '6') as actividad6,  coalesce(SUM(a.cantidadBienes),0) actividad7Registrado  FROM poa_segimiento_implementacion AS a  WHERE a.idOrganismo='$idOrganismo' AND $constula  AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;");

			$sumas__programados__denitivos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT SUM(a1.programado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS programado,(SELECT a1.planificado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS planificado,(SELECT a1.ejecutado FROM poa_seguimiento_reporteria AS a1 WHERE a1.idProgramacionFinanciera=a.idProgramacionFinanciera AND $constula2__3 ORDER BY a1.idSeguimientoFinanciero DESC LIMIT 1) AS ejecutado FROM poa_programacion_financiera AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idActividad;");

			$variable__1__suma__programados=$sumas__programados__denitivos[0][programado];
			$variable__1__suma__ejecutado=$sumas__programados__denitivos[0][ejecutado];
			$variable__1__suma__planificado=$sumas__programados__denitivos[0][planificado];
			

			$indicadores__altos=$objeto->getObtenerInformacionGeneral("SELECT a.idActividad,  (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores ON a1.idActividades=a.idActividad  WHERE a.idOrganismo='$idOrganismo' AND $constula AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a2.nombreIndicador ORDER BY a.idActividad; ");
			
			$indicadores__administrativos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 WHERE a1.idActividades=a.idActividad) AS nombreActividades,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreIndicador, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores WHERE a1.idActividades=a.idActividad) AS nombreIndicador,a.totalProgramado,a.totalEjecutado FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS a1 INNER JOIN poa_indicadores AS a2 ON a1.idLineaPolitica=a2.idIndicadores ON a1.idActividades=a.idActividad  WHERE a.idOrganismo='$idOrganismo' AND $constula AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idActividad='1' GROUP BY a2.nombreIndicador ORDER BY a.idActividad;");

			$autogestion__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.montoAu) AS montoAutogestionables FROM poa_segimiento_montos_autogestion AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY idOrganismo;");

			$envio__tecnicos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$documentos__tecnicos=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='alto__rendimientos' ORDER BY idInformacionEnviada DESC LIMIT 1;");

			$documentos__tecnico__2__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT documentos,observaciones,recomendaciones FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;");

			$envio__tecnicos__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='SEGUIMIENTO' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$envio__tecnicos__seguimientos__infraestructuras=$objeto->getObtenerInformacionGeneral("SELECT (SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1  WHERE a.idFuncionario=a1.id_usuario) AS nombreCompleto,a.fecha,a.hora,a.documentoInfras,a.documentoInstalaciones FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;");

			$nuevo__infras__seguimientos=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_segimiento_mantenimiento AS a WHERE a.trimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' ORDER BY a.idMantenimiento DESC LIMIT 1;");


			$trimestrales__i__enviados=$objeto->getObtenerInformacionGeneral("SELECT a.idEnviadorTrimestres FROM poa_trimestrales AS a WHERE a.tipoTrimestre='$periodo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND estadoIR='T' ORDER BY a.idEnviadorTrimestres DESC LIMIT 1;");

			if (!empty($nuevo__infras__seguimientos[0][idMantenimiento])) {
				$var_n_se_in=1;
			}else{
				$var_n_se_in=0;
			}

			if (!empty($trimestrales__i__enviados[0][idEnviadorTrimestres])) {
				$var_n_se_in__45=1;
			}else{
				$var_n_se_in__45=0;
			}


			if (!empty($idUsuarioC)) {
				
				$envio__tecnicos__zonales=$objeto->getObtenerInformacionGeneral("SELECT zonal FROM th_usuario WHERE id_usuario='$idUsuarioC';");

				$zonal__eu=$envio__tecnicos__zonales[0][zonal];
				$jason['zonal__eu']=$zonal__eu;

			}


			$autogestionesV=$autogestion__formativos[0][montoAutogestionables];


			if ($tipo__dos=="FORMATIVO") {

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='formativo' ORDER BY idInformacionEnviada DESC LIMIT 1;");

				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoFR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

				$medallas__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.oro) AS oro,SUM(a.plata) AS plata,SUM(a.bronce) AS bronce,SUM(a.total) AS total FROM poa_seguimiento_competencia_formativo AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");

				$benficiarios__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS total, SUM(a.beneficiariosHombres18) AS hombres18,SUM(a.beneficiariosMujeres18) AS mujeres18,SUM(a.totalT18) AS total18 FROM poa_seguimiento_competencia_formativo AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");


			}else if ($tipo__dos=="RECREACIÓN") {

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND  tipo='recreativo' ORDER BY idInformacionEnviada DESC LIMIT 1;");


				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoFR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

				$benficiarios__altos__formativos=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.beneficiariosHombres) AS hombres,SUM(a.beneficiariosMujeres) AS mujeres,SUM(a.totalT) AS total, SUM(a.beneficiariosHombres18) AS hombres18,SUM(a.beneficiariosMujeres18) AS mujeres18,SUM(a.totalT18) AS total18 FROM poa_seguimiento_recreativo_tecnico AS a WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND $constula GROUP BY a.idOrganismo;");

			}else{

				$documentos__tecnicos__2=$objeto->getObtenerInformacionGeneral("SELECT archivo,observacion,recomendacion FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='$periodo' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND  tipo='alto__rendimientos' ORDER BY idInformacionEnviada DESC LIMIT 1;");


				$trimestrales__culminados=$objeto->getObtenerInformacionGeneral("SELECT idEnviadorTrimestres FROM poa_trimestrales WHERE perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo' AND idOrganismo='$idOrganismo' AND estadoAlR='T';");

				$varaible__culminados=$trimestrales__culminados[0][idEnviadorTrimestres];

			}

			$trimestrales__inrA=$objeto->getObtenerInformacionGeneral("SELECT estadoIR,estadoInR FROM poa_trimestrales WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' AND tipoTrimestre='$periodo';");

			$estadoIR__estados=$trimestrales__inrA[0][estadoIR];
			$estadoINR__estados=$trimestrales__inrA[0][estadoInR];

			$jason['estadoIR__estados']=$estadoIR__estados;
			$jason['estadoINR__estados']=$estadoINR__estados;

			if (empty($primer__sumas[0][programadosSumasP])) {
				$primer__sumas__p=0;
			}else{
				$primer__sumas__p=$primer__sumas[0][programadosSumasP];
			}

			if (empty($primer__sumas[0][ejecutadoSumasP])) {
				$primer__sumas__e=0;
			}else{
				$primer__sumas__e=$primer__sumas[0][ejecutadoSumasP];
			}

			if (empty($segundo__sumas[0][programadosSumasS])) {
				$segundo__sumas__p=0;
			}else{
				$segundo__sumas__p=$segundo__sumas[0][programadosSumasS];
			}

						
			if (empty($segundo__sumas[0][ejecutadoSumasS])) {
				$segundo__sumas__e=0;
			}else{
				$segundo__sumas__e=$segundo__sumas[0][ejecutadoSumasS];
			}

			if (empty($tercer__sumas[0][programadosSumasT])) {
				$tercero__sumas__p=0;
			}else{
				$tercero__sumas__p=$tercer__sumas[0][programadosSumasT];
			}
			
			if (empty($tercer__sumas[0][ejecutadoSumasT])) {
				$tercero__sumas__e=0;
			}else{
				$tercero__sumas__e=$tercer__sumas[0][ejecutadoSumasT];
			}
			
			if (empty($cuarto__sumas[0][programadosSumasC])) {
				$cuarto__sumas__p=0;
			}else{
				$cuarto__sumas__p=$cuarto__sumas[0][programadosSumasC];
			}

			
			if (empty($cuarto__sumas[0][ejecutadoSumasC])) {
				$cuarto__sumas__e=0;
			}else{
				$cuarto__sumas__e=$cuarto__sumas[0][ejecutadoSumasC];
			}

			if(empty($autogestionesV)){

				$autogestionesV=0;

			}
			$jason['variable__1__suma__ejecutado']=$variable__1__suma__ejecutado;
			$jason['variable__1__suma__planificado']=$variable__1__suma__planificado;

			$jason['variable__1__suma__programados']=$variable__1__suma__programados;

			$jason['var_n_se_in__45']=$var_n_se_in__45;

			$jason['var_n_se_in']=$var_n_se_in;

			$jason['envio__tecnicos__seguimientos__infraestructuras']=$envio__tecnicos__seguimientos__infraestructuras;

			$jason['envio__tecnicos__seguimientos']=$envio__tecnicos__seguimientos;

			$jason['documentos__tecnico__2__seguimientos']=$documentos__tecnico__2__seguimientos;

			$jason['medallas__altos__formativos']=$medallas__altos__formativos;

			$jason['medallas__altos__sumas']=$medallas__altos__sumas;
			$jason['capacitadores__altos__sumas']=$sumas__altos__capacitadores;
			$jason['sumas__altos__beneficiarios']=$sumas__altos__beneficiarios;
			$jason['benficiarios__altos__formativos']=$benficiarios__altos__formativos;

			$jason['CONSULTA']=$constula;

			$jason['idOrg']=$idOrganismo;

			$jason['tipo']=$tipo__dos;

			$jason['aniosPeriodos__ingesos']=$aniosPeriodos__ingesos;

			$jason['indicadores__administrativos']=$indicadores__administrativos;

			$jason['indicadores__act3_7_for_recreativo_alto']=$indicadores__act3_7_for_recreativo_alto;
			
			
			

			$jason['varaible__culminados']=$varaible__culminados;

			$jason['documentos__tecnicos__2']=$documentos__tecnicos__2;

			$jason['documentos__tecnicos']=$documentos__tecnicos;

			$jason['envio__tecnicos']=$envio__tecnicos;

			$jason['autogestionesV']=$autogestionesV;

			$jason['indicadores__altos']=$indicadores__altos;

			$jason['primer__sumas__p']=$primer__sumas__p;
			$jason['primer__sumas__e']=$primer__sumas__e;
			$jason['segundo__sumas__p']=$segundo__sumas__p;
			$jason['segundo__sumas__e']=$segundo__sumas__e;
			$jason['tercero__sumas__p']=$tercero__sumas__p;
			$jason['tercero__sumas__e']=$tercero__sumas__e;
			$jason['cuarto__sumas__p']=$cuarto__sumas__p;
			$jason['cuarto__sumas__e']=$cuarto__sumas__e;

			$jason['poa__invers']=$poa__invers;
			$jason['sumas__programados']=$sumas__programados; 

		break;


		//************************************  tabla Contratación Publica Revisor **************************************** */
		case "selectorTablaContratacionPublica":

			if($semestre=="I SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='primerTrimestre' or a.trimestre='segundoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");

			}else if($semestre == "II SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='tercerTrimestre' or a.trimestre='cuartoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");
			}

			

			$jason['indicadorInformacion']=$indicadorInformacion;
		

		break;

		//************************************  tabla Actividad 1 Revisor **************************************** */
		case "selectorTablapagosSinContratacionPublica":

			if($semestre=="I SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'no' and (trimestre='primerTrimestre' or trimestre='segundoTrimestre') and idActividad='1' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and a.idOrganismo='$idOrganismo' and a.perioIngreso='$anioEvaluadorr'");

			}else if($semestre == "II SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'no' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and (trimestre='tercerTrimestre' or trimestre='cuartoTrimestre') and idActividad='1' and a.idOrganismo='$idOrganismo' and a.perioIngreso='$anioEvaluadorr'");
			}

			

			$jason['indicadorInformacion']=$indicadorInformacion;
		

		break;

		case "selectorTablapagosConContratacionPublica":

			if($semestre=="I SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'si' and (trimestre='primerTrimestre' or trimestre='segundoTrimestre') and idActividad='1' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and a.idOrganismo='$idOrganismo' and a.perioIngreso='$anioEvaluadorr'");

			}else if($semestre == "II SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("select b.itemPreesupuestario, b.nombreItem, a.registra_Contratacion from poa_registro_contratacion as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo where a.registra_Contratacion = 'si' and (trimestre='tercerTrimestre' or trimestre='cuartoTrimestre') and idActividad='1' AND (b.itemPreesupuestario!='530101' AND b.itemPreesupuestario!='530102' AND b.itemPreesupuestario!='530104' AND b.itemPreesupuestario!='530105') and a.idOrganismo='$idOrganismo' and a.perioIngreso='$anioEvaluadorr'");
			}

			

			$jason['indicadorInformacion']=$indicadorInformacion;
		

		break;

		//******************************************************************* **************************************** */

		case  "actividadesPoa__seguimiento__reporteria__anual_revisor":

			$idOrganismoSession=$idOrganismo;

			$administrativo=$objeto->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$mantenimiento=$objeto->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idMantenimiento DESC;");

			$capacitacion=$objeto->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='3' AND b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$sueldos=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_sueldossalarios2022 AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$honorarios=$objeto->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_honorarios2022 AS a WHERE a.idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

			$competencia=$objeto->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='5' AND b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$formativo=$objeto->getObtenerInformacionGeneral("SELECT d.nombreTipo FROM poa_organismo AS a INNER JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismoSession' AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%');");

			$recreativo=$objeto->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='6' AND b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$implementacion=$objeto->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='7' AND b.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			

	
			$jason['administrativo']=$administrativo;
			$jason['mantenimiento']=$mantenimiento;
			$jason['capacitacion']=$capacitacion;
			$jason['sueldos']=$sueldos;
			$jason['honorarios']=$honorarios;
			$jason['competencia']=$competencia;
			$jason['formativo']=$formativo;
			$jason['recreativo']=$recreativo;
			$jason['implementacion']=$implementacion;


		break;

		//*****************************************facturas documentos administrativo presupuestario REPORTE Y ANEXOS ************************************************************** */
		case "administrativo__seguimientos__tablas__2":

	

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaAdministrativos, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_administrativo AS a INNER JOIN poa_actividadesadministrativas as b on a.idActividadAc = b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosAdministrativos, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_administrativos AS a INNER JOIN poa_actividadesadministrativas as b on a.idActividadAc = b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		//*****************************************facturas documentos mantenimiento presupuestario REPORTE Y ANEXOS ************************************************************** */
		case "mantenimiento__seguimientos__tablas__2":

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaMantenimiento, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_mantenimiento AS a INNER JOIN poa_mantenimiento as b on a.idActividadAc = b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosMantenimiento, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_mantenimiento AS a INNER JOIN poa_mantenimiento as b on a.idActividadAc = b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

	//*****************************************facturas documentos capacitacion presupuestario REPORTE Y ANEXOS ************************************************************** */
		case "capacitacion__seguimiento__tablas__ms__2":


			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaCapacitacion, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_capacitacion AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem  WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosCapacitacion, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_capacitacion AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		//*****************************************facturas documentos honrarios REPORTE Y ANEXOS ************************************************************** */
		case "honorarios__seguimientos__tablas__2":

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaHonorarios, b.cedula, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_honorarios AS a INNER JOIN poa_honorarios2022 as b on a.idActividadAc = b.idHonorarios  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.trimestre='$trimestres';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosHonorarios, b.cedula, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombres,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_honorarios AS a INNER JOIN poa_honorarios2022 as b on a.idActividadAc = b.idHonorarios WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		//*****************************************facturas documentos implementación presupuestario REPORTE Y ANEXOS ************************************************************** */
		case "competencia__implementacion__tablas__2":

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaInstalaciones, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_instalaciones AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosInstalaciones, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_instalaciones AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem  WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		//*****************************************facturas documentos recreativo presupuestario REPORTE Y ANEXOS ************************************************************** */
		case "recreativos__seguimiento__tablas__2":

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaRecreativo, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_recreativo AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosRecreativo, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_recreativo AS a INNER JOIN poa_actdeportivas as b on a.idActividadAc = b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;	

		case "competencias__competencias__implementacion__tablas__2":

			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaCompetencia, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre FROM poa_seguimiento_facturas_competencia AS a INNER JOIN poa_actdeportivas as b on b.idPda=a.idActividadAc INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosCompetencia, d.itemPreesupuestario, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreItem,a.documento,a.mes,a.trimestre FROM poa_seguimiento_otros_competencia AS a INNER JOIN poa_actdeportivas as b on b.idPda=a.idActividadAc INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem  WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		
		
		//*****************************************Documentos COMPETENECIA ALTO RENDIMIENTO TECNICO ************************************************************** */


		case "competencias__competencias__altos__altos__implementacion__tablas__2":

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosCompetenciasAltos,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a.documento,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS itemPreesupuestario FROM poa_seguimiento_otros_competencia_alto AS a INNER JOIN poa_actdeportivas AS b ON a.idActividadAc=b.idPda WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;


		//*********************************************** Documentos 6 RECREATIVO INFORMACION TECNICA***************************************** //


		case "recreacion__seguimiento__documentos__tecnicos":

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosRT,a.documento,a.mes,a.trimestre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreEvento,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS itemPreesupuestario FROM poa_seguimiento_otros_recreativo_tecnicos AS a  INNER JOIN poa_actdeportivas AS b ON a.idActividadAc=b.idPda WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;

		//*********************************************** Documentos ACTIVIDAD 5 competencia formativo INFORMACION TECNICA***************************************** //

		case "competencias__competencias__altos__altos__implementacion__tablas__2__formativos":

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosCompetenciasTecnicas,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') as nombreEvento,a.documento,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS itemPreesupuestario FROM poa_seguimiento_otros_competencia_formativos AS a INNER JOIN poa_actdeportivas AS e ON a.idActividadAc=e.idPda WHERE a.idOrganismo='$idOrganismo' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");


			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;



		//******************************* selector SUSPENSIONES POP UP OD ********************************//


		case  "seguimiento__pop_up_suspensiones":

			$select_ifExist=$objeto->getObtenerInformacionGeneral("SELECT idPlazos_estado__seguimientos FROM poa_seguimiento_plazos_estado_transferencia WHERE idOrganismo = '$idOrganismoSession' AND (estadoTrimestre1 = 'SUSPENSION' OR estadoTrimestre2 = 'SUSPENSION' OR estadoTrimestre3 = 'SUSPENSION' OR estadoTrimestre4 = 'SUSPENSION' OR estadoTrimestre1 = 'SUSPENDIDO' OR estadoTrimestre2 = 'SUSPENDIDO' OR estadoTrimestre3 = 'SUSPENDIDO' OR estadoTrimestre4 = 'SUSPENDIDO')  AND perioIngreso='$aniosPeriodos__ingesos';");

			

		
			if (!empty($select_ifExist[0][idPlazos_estado__seguimientos])) {
					
				$mensaje=1;

			}else{

				$mensaje=0;
				
			}
			
			
			
			$jason['mensaje']=$mensaje;

		break;

		

    }
    echo json_encode($jason);






