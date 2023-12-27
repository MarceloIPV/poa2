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

	switch ($identificador) {

		case "tabla__modificacionesMinimas":

			$query="SELECT a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte LIMIT 1) AS deporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia LIMIT 1) AS provincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais LIMIT 1) AS nombrePais, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance LIMIT 1) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.estadoP,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.fecha FROM poa_modificaciones_actdeportivas AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		

		case "sueldos__salarios__realizados__desvinculaciones":

			$query="SELECT b.cedula,b.nombres,b.tipoCargo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.opcion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS opcion,a.enero,a.febreo,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,(a.enero + a.febreo + a.marzo + a.abril + a.mayo + a.junio + a.julio + a.agosto  + a.septiembre + a.octubre + a.noviembre + a.diciembre) AS sumaTotal FROM poa_desvinculacion AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldos=b.idSueldos WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "sueldos__salarios__realizados__desvinculaciones__M__2023":

			$query="SELECT b.cedula,b.nombres,b.tipoCargo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.opcion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS opcion,a.enero,a.febreo,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,(a.enero + a.febreo + a.marzo + a.abril + a.mayo + a.junio + a.julio + a.agosto  + a.septiembre + a.octubre + a.noviembre + a.diciembre) AS sumaTotal FROM poa_desvinculacion AS a INNER JOIN poa_modificacion_sueldossalarios2022 AS b ON a.idSueldos=b.idSueldos WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.idModificacionDerfinitiva='$datos[2]';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "sueldos__salarios__realizados":
			
			$query="SELECT cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND idActividad='$datos[1]' AND modifica IS NULL AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY cedula ORDER BY idSueldos;";

			$dataTablets=$objeto->getDatatablets($query);
			
			echo json_encode($dataTablets);

		break;


		case "sueldos__salarios__realizados__M__2023":
			
			$query="SELECT cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_modificacion_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND idActividad='$datos[1]' AND modifica IS NULL AND perioIngreso='$aniosPeriodos__ingesos' AND idModificacionDerfinitiva='$datos[2]'  GROUP BY cedula ORDER BY idSueldos;";
			$dataTablets=$objeto->getDatatablets($query);
			
			echo json_encode($dataTablets);

		break;

		case "mantenimiento__tables__realziad":

			$elementoSelec=$objeto->getObtenerInformacionGeneral("SELECT a.enero FROM poa_mantenimiento AS a WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.enero IS NOT NULL LIMIT 1;");

			$nuevo=$elementoSelec[0][enero];


			if (is_null($elementoSelec[0][enero])) {
				
				$query="SELECT CONCAT_WS(' ',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE zL.provincia=a1.idProvincia LIMIT 1) AS nombreProvincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  AS direccionCompleta,zL.estado  AS estado,zL.tipoRecursos AS tipoRecursos,zL.tipoIntervencion AS tipoIntervencion,zL.detallarTipoIn AS detallarTipoIn,zL.tipoMantenimiento AS tipoMantenimiento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.materialesServicios, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS materialesServicios,zL.fechaUltimo AS fechaUltimo,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.totalTotales FROM poa_programacion_financiera AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND zL.modifica IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY zL.idMantenimiento;";

			}else{

				$query="SELECT CONCAT_WS(' ',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE zL.provincia=a1.idProvincia LIMIT 1) AS nombreProvincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  AS direccionCompleta,zL.estado  AS estado,zL.tipoRecursos AS tipoRecursos,zL.tipoIntervencion AS tipoIntervencion,zL.detallarTipoIn AS detallarTipoIn,zL.tipoMantenimiento AS tipoMantenimiento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.materialesServicios, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS materialesServicios,zL.fechaUltimo AS fechaUltimo, zL.enero AS enero,zL.febrero AS febrero,zL.marzo AS marzo,zL.abril AS abril,zL.mayo AS mayo,zL.junio AS junio,zL.julio AS julio,zL.agosto AS agosto,zL.septiembre AS septiembre,zL.octubre AS octubre,zL.noviembre AS noviembre,zL.diciembre  AS diciembre,zL.total AS totalTotales FROM poa_programacion_financiera AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND zL.modifica IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY zL.idMantenimiento;";

			}

			

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "mantenimiento__tables__realziad__M__2023":


			$query="SELECT CONCAT_WS(' ',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE zL.provincia=a1.idProvincia LIMIT 1) AS nombreProvincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  AS direccionCompleta,zL.estado  AS estado,zL.tipoRecursos AS tipoRecursos,zL.tipoIntervencion AS tipoIntervencion,zL.detallarTipoIn AS detallarTipoIn,zL.tipoMantenimiento AS tipoMantenimiento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(zL.materialesServicios, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS materialesServicios,zL.fechaUltimo AS fechaUltimo, zL.enero AS enero,zL.febrero AS febrero,zL.marzo AS marzo,zL.abril AS abril,zL.mayo AS mayo,zL.junio AS junio,zL.julio AS julio,zL.agosto AS agosto,zL.septiembre AS septiembre,zL.octubre AS octubre,zL.noviembre AS noviembre,zL.diciembre  AS diciembre,zL.total AS totalTotales FROM poa_modificacion_programacion_financiera AS b INNER JOIN poa_item AS c ON c.idItem=b.idItem INNER JOIN poa_modificacion_mantenimiento AS zL ON zL.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND b.perioIngreso='$aniosPeriodos__ingesos' AND zL.idModificacionDerfinitiva='$datos[2]'  ORDER BY zL.idMantenimiento;";


			

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tabla__sueldos__salarios__tablas":

			$query="SELECT cedula,nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY cedula;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaResumenRemanente__2":

			$query="SELECT (SELECT a1.Ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT a1.nombreOrganismo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS organismodeportivo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS email,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS telefonos,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a2.idTipoOrganismo=a1.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS competenciaOrganismo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS representante,a.fecha,a.monto__resumen ,a.remanentePoa__remanentes ,IFNULL((SELECT GROUP_CONCAT(CONCAT_WS(': ',a1.aniosAniosAnteriores,a1.montosAniosAnteriores) SEPARATOR ';') FROM poa_remanentes_anios_anteriores AS a1 WHERE a1.idInformacionGeneral=a.idInformacionGeneral),0) AS anios__anteriores,a.asignaciones__futuras,(SELECT a1.documento FROM poa_remanentes_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idDocumentoRe DESC LIMIT 1) AS documento,a.archivo AS documento2 FROM poa_remanentes_informacion_organismo AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idInformacionGeneral DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaResumenRemanente":

			$query="SELECT (SELECT a1.Ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT a1.nombreOrganismo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS organismodeportivo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS email,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS telefonos,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a2.idTipoOrganismo=a1.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo) AS competenciaOrganismo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS representante,a.fecha,a.monto__resumen ,a.remanentePoa__remanentes ,IFNULL((SELECT GROUP_CONCAT(CONCAT_WS(': ',a1.aniosAniosAnteriores,a1.montosAniosAnteriores) SEPARATOR ';') FROM poa_remanentes_anios_anteriores AS a1 WHERE a1.idInformacionGeneral=a.idInformacionGeneral),0) AS anios__anteriores,a.asignaciones__futuras,(SELECT a1.documento FROM poa_remanentes_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idDocumentoRe DESC LIMIT 1) AS documento FROM poa_remanentes_informacion_organismo AS a WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idInformacionGeneral;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tabla__eventos__ingresados":

			if ($datos[0]==1127) {
				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a1.*,a2.*,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.justificacionAd, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionAd,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.detalleBien, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detalleBien,a1.idProgramacionFinanciera FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a2.idOrganismo='$datos[0]' AND a2.perioIngreso='$aniosPeriodos__ingesos' AND a2.idActividad='$datos[1]' AND a1.nombreEvento!=''   GROUP BY a1.nombreEvento;";
			}else{
				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a1.*,a2.*,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.justificacionAd, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionAd,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.detalleBien, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detalleBien,a1.idProgramacionFinanciera FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a2.idOrganismo='$datos[0]' AND a2.perioIngreso='$aniosPeriodos__ingesos' AND a2.idActividad='$datos[1]' AND a1.nombreEvento!=''  GROUP BY a1.nombreEvento;";
			}

			


			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;	


		case "tabla__eventos__ingresados__modificar":

			if ($datos[0]==1127) {
				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a1.*,a2.* FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a2.idOrganismo='$datos[0]' AND a2.perioIngreso='$aniosPeriodos__ingesos' AND a2.idActividad='$datos[1]' AND a1.modifica='E';";
			}else{
				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,a1.*,a2.* FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a2.idOrganismo='$datos[0]' AND a2.perioIngreso='$aniosPeriodos__ingesos' AND a2.idActividad='$datos[1]' AND a1.modifica='E' GROUP BY a1.nombreEvento;";
			}


			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;			

		case "organismoSubses__paid__recomiendas__final__reporteria":

			if ($datos[0]==12 || $datos[0]==24) {
				
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento,a.identificador FROM poa_paid_envioinicial AS a WHERE identificador='0' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else if($datos[0]==26 || $datos[0]==19 || $datos[0]==19){

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento,a.identificador FROM poa_paid_envioinicial AS a WHERE identificador='1' AND a.perioIngreso='$aniosPeriodos__ingesos';";				


			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento,a.identificador FROM poa_paid_envioinicial AS a WHERE (identificador='0' OR identificador='1') AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}
			

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	


		case "paidIndicadores__revisor":

			$query="SELECT (SELECT a1.nombrePrograma FROM poa_paid_programa AS a1 WHERE a1.idPrograma=a.idPrograma) AS nombrePrograma, (SELECT a1.nombreIndicadores FROM poa_paid_indicadores AS a1 WHERE a1.idIndicadores=a.idIndicadores) AS nombreIndicadores, (SELECT a1.nombreComponentes FROM poa_paid_componentes AS a1 WHERE a1.idComponentes=a.idComponente LIMIT 1) AS componentes,a.beneficiario,ROUND (a.enero, 2) AS enero,ROUND (a.febrero, 2) AS febrero,ROUND (a.marzo, 2) AS marzo,ROUND (a.abril, 2) AS abril,ROUND (a.mayo, 2) AS mayo,ROUND (a.junio, 2) AS junio,ROUND (a.julio, 2) AS julio,ROUND (a.agosto, 2) AS agosto,ROUND (a.septiembre, 2) AS septiembre,ROUND (a.octubre, 2) AS octubre,ROUND (a.noviembre, 2) AS noviembre,ROUND (a.diciembre, 2) AS diciembre,ROUND (a.valorTotal, 2) AS valorTotal FROM poa_paid_general_indicadores AS a WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	


		case "paidEncuentroAc__revisor":

			$query="SELECT nombres,sede,instituciones,fechaInicio,fechFin,deportes,categoria,mujeres,hombres,entrenadores,valorTotal,observaciones FROM poa_paid_encuentroactivo WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidNecesidadesGenerales__revisor":

			$query="SELECT modalidad,articulo,cantidad,valorUnitario,valorTotal,sector FROM poa_paid_necesidades_generales WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidIndividuales__revisor":

			$query="SELECT modalidad,nombres,apellidos,articulo,cantidad,valorUnitario,valorTotal,sector FROM poa_paid_necesidades_individuales WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidInterdiciplinarios__revisor":

			$query="SELECT cedula,modalidad,sexo,cargo,nombres,apellidos,fechaInicio,fechaFin,valor,numeroMeses,valorTotal,sector FROM poa_paid_interdisciplinario WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidEventos__revisor":

			$query="SELECT actividadDeportiva,deporte,modalidad,nombreEvento,prueba,categoria,fechaInicio,fechaFin,sede,numeroOficina,numeroAtletas,numeroDias,numeroPax,valorTotal,Observaciones FROM poa_paid_eventos WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidGeneral__revisor":

			$query="SELECT (SELECT a1.nombrePrograma FROM poa_paid_programa AS a1 WHERE a1.idPrograma=a.idPrograma ORDER BY a1.idPrograma DESC LIMIT 1) AS programa,if(a.idProyecto=0,'Fortalecimiento del deporte del alto rendimiento del Ecuador','Encuentro activo del deporte para el desarrollo') AS proyecto,(SELECT a1.nombreComponentes FROM poa_paid_componentes AS a1 WHERE a1.idComponentes=a.idComponente LIMIT 1) AS componentes,(SELECT a2.nombreRubros FROM poa_paid_asignacion AS a1 INNER JOIN poa_paid_rubros AS a2 ON a2.idRubros=a1.idRubros WHERE a1.idPaidInversion=a.idRubros ORDER BY a1.idPaidInversion DESC LIMIT 1) AS nombreRubros,(SELECT ROUND (a1.montos, 2) FROM poa_paid_asignacion AS a1 INNER JOIN poa_paid_rubros AS a2 ON a2.idRubros=a1.idRubros WHERE a1.idPaidInversion=a.idRubros ORDER BY a1.idPaidInversion DESC LIMIT 1) AS montoAsignadoRubro,(SELECT a1.nombreItem FROM poa_item AS a1 WHERE a1.idItem=a.idItem) AS nombreItem,ROUND (a.enero, 2) AS enero,ROUND (a.febrero, 2) AS febrero,ROUND (a.marzo, 2) AS marzo,ROUND (a.abril, 2) AS abril,ROUND (a.mayo, 2) AS mayo,ROUND (a.junio, 2) AS junio,ROUND (a.julio, 2) AS julio,ROUND (a.agosto, 2) AS agosto,ROUND (a.septiembre, 2) AS septiembre,ROUND (a.octubre, 2) AS octubre,ROUND (a.noviembre, 2) AS noviembre,ROUND (a.diciembre, 2) AS diciembre,ROUND (a.valorTotal, 2) AS valorTotal FROM poa_paid_general AS a WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "organismoSubses__paid__recomiendas__paid__planificacion__aprobados":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,a.fecha,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.documentoFinal AS documento FROM poa_paid_envioinicial AS a WHERE idUsuarioRP='0' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "organismoSubses__paid__negados__paid__planificacion":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento FROM poa_paid_envioinicial AS a WHERE idUsuarioS='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	



		case "organismoSubses__paid__recomiendas__paid__planificacion__recomendacion__analistas":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento FROM poa_paid_envioinicial AS a WHERE idUsuarioRP='9999999' AND a.perioIngreso='$aniosPeriodos__ingesos';";


			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "organismoSubses__paid__recomiendas__paid__planificacion":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento FROM poa_paid_envioinicial AS a WHERE idUsuarioRP='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	


		case "organismoSubses__paid__recomiendas":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento,a.identificador FROM poa_paid_envioinicial AS a WHERE idUsuarioR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";


			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "organismoSubses__paid":

			if ($datos[2]=="24" && $datos[1]=="7") {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE identificador='0' AND (idUsuarioS='$datos[0]' OR idUsuarioS IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else if ($datos[2]=="26" && $datos[1]=="7") {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE identificador='1' AND (idUsuarioS='$datos[0]' OR idUsuarioS IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE idUsuarioS='$datos[0]' AND a.observado IS NULL AND a.perioIngreso='$aniosPeriodos__ingesos';";


			}


			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "asignarPresupuesto__paid__reporterias":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,ROUND(b.monto,2) AS techo,b.fecha,a.idOrganismo,b.texto__documentos AS documento FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo WHERE b.valor__comparativo='$datos[3]' AND b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "asignarPresupuesto__paid":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.correo,(SELECT telefono FROM poa_usuario AS a1 WHERE a1.idUsuario=a.idUsuario LIMIT 1) AS telefonoOficina,IF(c.nombreTipo IS NULL, 'r. Asociaciones Metropolitanas de Ligas Parroquiales Rurales',c.nombreTipo) AS tipoOrganismo,a.idOrganismo,c.idTipoOrganismo,(SELECT UPPER(a1.nombreProvincia) FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS provincia,a.cedulaResponsable,a.nombreResponsablePoa FROM poa_organismo AS a LEFT JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_tipo_organismo AS c ON c.idTipoOrganismo=b.idTipoOrganismo WHERE NOT EXISTS (SELECT t2.idOrganismo FROM poa_paid_asignacion t2 WHERE t2.idOrganismo = a.idOrganismo AND t2.estado='A' AND t2.valor__comparativo='$datos[3]') GROUP BY a.idOrganismo ORDER BY a.nombreOrganismo;";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "tablaCategoria":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreCategoria, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreCategoria,idCategoria FROM poa_paid_categoria WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaPrueba":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombrePrueba, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombrePrueba,idPrueba FROM poa_paid_prueba WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaModalidad":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreModalidad, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreModalidad,idModalidad FROM poa_paid_modalidad WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tabladeporte__paid":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreDeporte, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreDeporte,idDeporte FROM poa_deporte WHERE identificador='$datos[1]' OR identificador IS NULL;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaItemsRubros":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.idRubrosItems FROM poa_paid_rubros_items AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros WHERE c.identificador='$datos[1]' and a.idRubros='$datos[0]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaItemsRubrosContentPrincipal":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros,a.idComponentesRubros FROM poa_paid_componentes_rubros AS a INNER JOIN poa_paid_rubros AS b ON a.idRubros=b.idRubros WHERE a.idComponente='$datos[0]' AND b.identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaRubros":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros,a.idRubros,(SELECT a1.nombreComponentes FROM poa_paid_componentes AS a1 WHERE a1.idComponentes=a.idComponente LIMIT 1) AS nombreComponentes,(SELECT a1.nombreIndicadores FROM poa_paid_indicadores AS a1 WHERE a1.idIndicadores=a.idIndicador LIMIT 1) AS nombreIndicador,a.idComponente,a.idIndicador,(SELECT a1.idPaidInversion FROM poa_paid_asignacion AS a1 WHERE a1.idRubros=a.idRubros AND a1.estado='A' ORDER BY a1.idPaidInversion LIMIT 1) AS rubrosComparadores FROM poa_paid_rubros AS a WHERE a.identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaIndicadores__paid":

			$query="SELECT  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreIndicadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS indicador,idIndicadores FROM poa_paid_indicadores WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		



		case "tablaTipoOrganizacion":

			
			$query="SELECT a.nombreTipoOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_paid_areaencargada AS a1 WHERE a1.idAreaEncargada=a.idArea LIMIT 1) AS areaEncargada,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_paid_area_accion AS a1 WHERE a1.idAreaAccion=a.idAccion LIMIT 1) AS nombreAccion,a.idArea,a.idAccion,a.idTipoOrganismo FROM poa_paid_tipo_organismo AS a WHERE a.identificador='$datos[1]' OR a.identificador IS NULL;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "tablaAccion":

			$query="SELECT  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS accion,idAreaAccion FROM poa_paid_area_accion WHERE identificador='$datos[1]' OR identificador IS NULL;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaEncargada":

			$query="SELECT  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreArea, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreArea,idAreaEncargada FROM poa_paid_areaencargada WHERE identificador='$datos[1]' OR identificador IS NULL;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaEstrategicos":

			$query="SELECT  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreEstrategico, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEstrategico,idObjetivoEstrategico FROM poa_paid_objetivos_estrategicos WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaItem__paid":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,itemPreesupuestario,idItem FROM poa_paid_item WHERE identificador='$datos[1]' OR identificador IS NULL ORDER BY idItem DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaComponente":

			$query="SELECT a.nombreComponentes,a.idComponentes AS idComponente,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreIndicadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreIndicador,a.idComponentes,a.idIndicador FROM poa_paid_componentes AS a INNER JOIN poa_paid_indicadores AS b ON a.idIndicador=b.idIndicadores WHERE a.identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaProgramas":

			$query="SELECT nombrePrograma,idPrograma FROM poa_paid_programa WHERE identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "documentos__verificasDocumentacion":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,YEAR(a.fecha) AS anio,REPLACE(a.trimestre,'Trimestre','') AS trimestre,a.documento,a.trimestre AS trimestreEnviado,a.fecha,a.idOrganismo,a.idDeclaracion,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.correo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS emailOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreResponsablePoa, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreResponsablePoa FROM poa_seguimiento_declaracion AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		

		case "organismos__totalesVerificas":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.perioIngreso AS anio,(SELECT if(a1.idEnviadorTrimestres IS NOT NULL,'CUMPLE','NO CUMPLE') FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.tipoTrimestre='primerTrimestre' AND a1.perioIngreso=a.perioIngreso ORDER BY a1.idEnviadorTrimestres DESC LIMIT 1) AS trimestre1,(SELECT if(a1.idEnviadorTrimestres IS NOT NULL,'CUMPLE','NO CUMPLE') FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.tipoTrimestre='segundoTrimestre' AND a1.perioIngreso=a.perioIngreso ORDER BY a1.idEnviadorTrimestres DESC LIMIT 1) AS segundo2,(SELECT if(a1.idEnviadorTrimestres IS NOT NULL,'CUMPLE','NO CUMPLE') FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.tipoTrimestre='tercerTrimestre' AND a1.perioIngreso=a.perioIngreso ORDER BY a1.idEnviadorTrimestres DESC LIMIT 1) AS tercer3,(SELECT if(a1.idEnviadorTrimestres IS NOT NULL,'CUMPLE','NO CUMPLE') FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.tipoTrimestre='cuartoTrimestre' AND a1.perioIngreso=a.perioIngreso ORDER BY a1.idEnviadorTrimestres DESC LIMIT 1) AS cuarto4 FROM poa_documentofinal AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idOrganismo ASC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		

		case "seguimiento__controles__sujetados":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS rucOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,a.fecha,a.trimestre,a.justificacion,a.idOrganismo,a.idSeguimientoCambio FROM poa_seguimiento_control_cambios AS a WHERE a.estado='P' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__bloqueosTablaTrimestres":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.idOrganismo,(SELECT a1.estado FROM poa_seguimiento_bloqueo AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idBloqueos__seguimientos DESC LIMIT 1) AS estado,(SELECT a1.estado FROM poa_seguimiento_bloqueo_2 AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idBloqueos__seguimientos DESC LIMIT 1) AS estado2,(SELECT a1.estado FROM poa_seguimiento_bloqueo_3 AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idBloqueos__seguimientos DESC LIMIT 1) AS estado3,(SELECT a1.estado FROM poa_seguimiento_bloqueo_4 AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idBloqueos__seguimientos DESC LIMIT 1) AS estado4 FROM poa_organismo AS a;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		

		case "seguimiento__bloqueosTablaTrimestres__2__paid":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.idOrganismo,(SELECT a1.estado FROM poa_cierre_fiscal AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estado,(SELECT a1.estado FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estado2,(SELECT a1.motivo FROM poa_cierre_fiscal AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo,(SELECT a1.motivo FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo2 FROM poa_organismo AS a;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__bloqueosTablaTrimestres__2__financieros":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.idOrganismo,(SELECT a1.estado FROM poa_cierre_fiscal_transferencia AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estad3,(SELECT a1.motivo FROM poa_cierre_fiscal_transferencia AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo3,(SELECT a1.estado FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estado2,(SELECT a1.motivo FROM poa_cierre_fiscal AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo,(SELECT a1.motivo FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo2,(SELECT a1.estado FROM poa_cierre_fiscal_paid_modificaciones AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo ORDER BY a1.idCierreAnio DESC LIMIT 1) AS estad4,(SELECT a1.motivo FROM poa_cierre_fiscal_paid_modificaciones AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo ORDER BY a1.idCierreAnio DESC LIMIT 1) AS motivo4 FROM poa_organismo AS a;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;	

		case "seguimiento__bloqueosTablaTrimestres__2":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.idOrganismo,(SELECT a1.estado FROM poa_cierre_fiscal AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estado,(SELECT a1.estado FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS estado2,(SELECT a1.motivo FROM poa_cierre_fiscal AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo,(SELECT a1.motivo FROM poa_cierre_fiscal_paid AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo) AS motivo2,(SELECT a1.estado FROM poa_cierre_fiscal_paid_modificaciones AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo ORDER BY a1.idCierreAnio DESC LIMIT 1) AS estad4,(SELECT a1.motivo FROM poa_cierre_fiscal_paid_modificaciones AS a1 WHERE a1.periodo='$aniosPeriodos__ingesos' AND a.idOrganismo=a1.idOrganismo ORDER BY a1.idCierreAnio DESC LIMIT 1) AS motivo4 FROM poa_organismo AS a;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__documentacionGenerada__2":

			$query="SELECT fecha,documento FROM poa_seguimiento_docuento_final WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__documentacionGenerada":

			$query="SELECT a.perioIngreso AS anio,REPLACE(a.tipoTrimestre,'Trimestre',''),(SELECT a1.documento FROM poa_seguimiento_declaracion AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre=a.tipoTrimestre ORDER BY a1.idDeclaracion DESC LIMIT 1) AS documento,(SELECT a1.documento FROM poa_seguimiento_docuento_final AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idDocumento_seguimiento DESC LIMIT 1) AS documento2  FROM poa_trimestrales AS a WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre ORDER BY a.idEnviadorTrimestres DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__reportes__anexos__ejecuiones":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS rucOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a3.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS nombreTipo,REPLACE(a.trimestre,'Trimestre',''),YEAR(a.fecha) AS anio,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a1 WHERE a1.idItem=a.idItem) AS nombreItem1,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado1,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado1,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado1,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 100,0) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='1' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje1,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a2 WHERE a2.idItem=a.idItem) AS nombreItem2,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),2) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado2,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),2) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado2,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),2) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado2,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 200,0) FROM poa_seguimiento_reporteria AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a.idActividad='2' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje2,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a3 WHERE a3.idItem=a.idItem) AS nombreItem3,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),3) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado3,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),3) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado3,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),3) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado3,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 300,0) FROM poa_seguimiento_reporteria AS a3 WHERE a3.idOrganismo=a.idOrganismo AND a.idActividad='3' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje3,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a4.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#049;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a4 WHERE a4.idItem=a.idItem) AS nombreItem4,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),4) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado4,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),4) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado4,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),4) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado4,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 400,0) FROM poa_seguimiento_reporteria AS a4 WHERE a4.idOrganismo=a.idOrganismo AND a.idActividad='4' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje4,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a5.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#059;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a5 WHERE a5.idItem=a.idItem) AS nombreItem5,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),5) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado5,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),5) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado5,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),5) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado5,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 500,0) FROM poa_seguimiento_reporteria AS a5 WHERE a5.idOrganismo=a.idOrganismo AND a.idActividad='5' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje5,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a6.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#069;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a6 WHERE a6.idItem=a.idItem) AS nombreItem6,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),6) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado6,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),6) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado6,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),6) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado6,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 600,0) FROM poa_seguimiento_reporteria AS a6 WHERE a6.idOrganismo=a.idOrganismo AND a.idActividad='6' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje6,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_item AS a1 WHERE a1.idItem=a.idItem) AS nombreItem7,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.planificado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS planificado7,IF((SELECT SUM(a.programado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.programado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS programado7,IF((SELECT SUM(a.ejecutado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND(SUM(a.ejecutado),2) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS ejecutado7,IF((SELECT SUM(a.planificado) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)) IS NOT NULL,(SELECT ROUND((SUM(a.ejecutado) / SUM(a.programado)) * 100,0) FROM poa_seguimiento_reporteria AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a.idActividad='7' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha)),0) AS porcentaje7 FROM poa_seguimiento_reporteria AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.trimestre,a.idItem,YEAR(a.fecha) ORDER BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__reportes__anexos":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS rucOrganismo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,CONCAT_WS('------',IF(a.tipoTrimestre='primerTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='primerTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='primerTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='primerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosPrimerTrimestre,CONCAT_WS('------',IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='segundoTrimestre' AND a1.estado='T' LIMIT 1) IS NOT NULL,(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE (a1.estadoAl='T' OR a1.estadoF='T') AND  a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='segundoTrimestre'  LIMIT 1) IS NOT NULL,(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE (a1.estadoI='T' OR a1.estadoIR='T') AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='segundoTrimestre'  LIMIT 1) IS NOT NULL,(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosSegundoTrimestre,CONCAT_WS('------',IF(a.tipoTrimestre='tercerTrimestre' AND a.estado='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='tercerTrimestre' AND (a.estadoAl='T' OR a.estadoF='T') AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='segundoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF(a.tipoTrimestre='tercerTrimestre' AND a.estadoI='T' AND a.perioIngreso='$aniosPeriodos__ingesos',(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='tercerTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosTercerTrimestre,CONCAT_WS('------',IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='cuartoTrimestre' AND a1.estado='T' LIMIT 1) IS NOT NULL,(SELECT a1.documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idSeguimientosRecomendadosTe DESC LIMIT 1),'N/A'),IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE (a1.estadoAl='T' OR a1.estadoF='T') AND  a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='cuartoTrimestre'  LIMIT 1) IS NOT NULL,(SELECT a1.archivo FROM poa_seguimiento_recomendado_tecnico AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a1.idInformacionEnviada DESC LIMIT 1),'N/A'),IF((SELECT a1.idEnviadorTrimestres FROM poa_trimestrales AS a1 WHERE (a1.estadoI='T' OR a1.estadoIR='T') AND a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoTrimestre='cuartoTrimestre'  LIMIT 1) IS NOT NULL,(SELECT a1.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.trimestre='cuartoTrimestre' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.tipoE='INFRA' ORDER BY a1.idRecomendacionFuncionario DESC LIMIT 1),'N/A')) AS documentosCuartoTrimestre,(SELECT IF(a3.accion='Deporte','FORMATIVO',IF(a3.accion='RecreaciÃ³n','RECREACION','ALTO RENDIMIENTO')) FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo LIMIT 1) AS tiposFormativos,a.idOrganismo,YEAR(a.fecha) AS anio FROM poa_trimestrales AS a WHERE a.perioIngreso='$datos[3]'  GROUP BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__recorridos__tablas":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS rucOrganismos,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismos,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,REPLACE(a.tipoTrimestre,'Trimestre','') AS tipoTrimestress,a.fecha,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a3.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS nombreTipo,a.idOrganismo,a.tipoTrimestre FROM poa_trimestrales AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;		


		case "seguimiento__tablas__seguimientos__recomendados__instalaciones__reales":

			$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE a.estadoInR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			
			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;


		case "seguimiento__tablas__seguimientos__recomendados__instalaciones":

			if ($datos[1]==4) {

				$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE (a.estadoIR='$datos[0]' OR a.estadoIR='N/A' OR a.estadoInR='$datos[0]' OR a.estadoInR='N/A' AND a.perioIngreso='$aniosPeriodos__ingesos') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre,a.idOrganismo;";

			}else if($datos[1]==2 && $datos[2]==6){

				$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE a.estadoInR='$datos[0]';";

			}else{

				$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE a.estadoIR='$datos[0]';";

			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;

		case "seguimiento__tablas__seguimientos__recomendados":

			$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE a.estadoR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre,a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;

		case "seguimiento__tablas__fisica__rendimientos__recomendados":

			$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,if(e.idAreaAccion=13,'RECREACION','FORMATIVO') AS rotuloRecreativos,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS e ON e.idAreaAccion=d.idAreaAccion WHERE a.estadoFR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo,a.tipoTrimestre;";


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;
		

		case "seguimiento__tablas__alto__rendimientos__recomendados":

			$query="SELECT b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.tipoTrimestre,a.idOrganismo,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT FROM poa_trimestrales AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.estadoAlR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;


		case "seguimiento__tablas__acFisica__rendimientos__ins":

			if ($datos[1]==4 && $datos[2]==1) {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo) IS NOT NULL,'SI','NO')) AS esigeft,IF(zL.accion='RecreaciÃ³n','RECREACIÓN','FORMATIVO') AS tipoAccion,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS zL ON zL.idAreaAccion=d.idAreaAccion INNER JOIN poa_segimiento_mantenimiento AS cL ON cL.idOrganismo=a.idOrganismo WHERE (a.estadoI IS NULL OR a.estadoI='$datos[0]') AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.tipoTrimestre='segundoTrimestre' OR a.tipoTrimestre='cuartoTrimestre') GROUP BY a.tipoTrimestre,cL.idOrganismo ORDER BY a.idEnviadorTrimestres;";

			}else if($datos[2]==6){

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo) IS NOT NULL,'SI','NO')) AS esigeft,IF(zL.accion='RecreaciÃ³n','RECREACIÓN','FORMATIVO') AS tipoAccion,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS zL ON zL.idAreaAccion=d.idAreaAccion INNER JOIN poa_segimiento_mantenimiento AS cL ON cL.idOrganismo=a.idOrganismo WHERE a.estadoIn='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.tipoTrimestre='segundoTrimestre' OR a.tipoTrimestre='cuartoTrimestre') GROUP BY a.tipoTrimestre,cL.idOrganismo ORDER BY a.idEnviadorTrimestres;";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo) IS NOT NULL,'SI','NO')) AS esigeft,IF(zL.accion='RecreaciÃ³n','RECREACIÓN','FORMATIVO') AS tipoAccion,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS zL ON zL.idAreaAccion=d.idAreaAccion INNER JOIN poa_segimiento_mantenimiento AS cL ON cL.idOrganismo=a.idOrganismo WHERE a.estadoI='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.tipoTrimestre='segundoTrimestre' OR a.tipoTrimestre='cuartoTrimestre') GROUP BY a.tipoTrimestre,cL.idOrganismo ORDER BY a.idEnviadorTrimestres;";
				
			}
			

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;




		case "seguimiento__tablas__acFisica__rendimientos":

			if ($datos[1]==7 && $datos[2]==26) {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,'SI','NO')) AS esigeft,IF(zL.accion='RecreaciÃ³n','RECREACIÓN','FORMATIVO') AS tipoAccion,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS zL ON zL.idAreaAccion=d.idAreaAccion WHERE NOT EXISTS (SELECT idOrganismo FROM poa_seguimiento_control_cambios t2 WHERE t2.idOrganismo = a.idOrganismo AND t2.trimestre=a.tipoTrimestre)  AND (a.estadoF IS NULL OR a.estadoF='$datos[0]') AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%') AND a.tipoTrimestre!='primerTrimestre' AND a.tipoTrimestre!='tercerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo, a.tipoTrimestre ORDER BY a.idEnviadorTrimestres;";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,'SI','NO')) AS esigeft,IF(zL.accion='RecreaciÃ³n','RECREACIÓN','FORMATIVO') AS tipoAccion,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_area_accion AS zL ON zL.idAreaAccion=d.idAreaAccion WHERE a.estadoF='$datos[0]' AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%') AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo, a.tipoTrimestre ORDER BY a.idEnviadorTrimestres;";

			}
			
			


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "seguimiento__tablas__alto__rendimientos":

			if ($datos[1]==7 && $datos[2]==24) {
			
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo  LIMIT 1) IS NOT NULL,'SI','NO')) AS esigeft,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo,a.perioIngreso FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo  WHERE (a.estadoAl IS NULL OR a.estadoAl='$datos[0]') AND (d.nombreTipo LIKE '%ecuatorianas por%' OR d.nombreTipo LIKE '%pico Ecuatoriano%'  OR d.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR d.nombreTipo LIKE '%Militar Ecuatoriana%' OR d.nombreTipo LIKE '%Policial Ecuatoriana%') AND a.tipoTrimestre!='primerTrimestre' AND a.tipoTrimestre!='tercerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.tipoTrimestre,a.idOrganismo ORDER BY a.idEnviadorTrimestres;";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo LIMIT 1),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.presidente, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,'SI','NO')) AS esigeft,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo,a.perioIngreso FROM poa_trimestrales AS a INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo  WHERE a.estadoAl='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos'  ORDER BY a.idEnviadorTrimestres;";


			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;

		case "seguimiento__tablas__remanentes":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT a1.nombreOrganismo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.idOrganismo FROM poa_organismo AS a WHERE NOT EXISTS(SELECT t.idRemanentes FROM poa_remanentes_monto_asignacion AS t WHERE t.idOrganismo=a.idOrganismo) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);


		break;

		case "seguimiento__tablas":


			if ($datos[1]==2 && $datos[2]==20) {
			
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo) IS NOT NULL,'SI','NO')) AS esigeft,(SELECT if(a3.idAreaAccion=9 OR a3.idAreaAccion=14,'ALTO RENDIMIENTO',if(a3.idAreaAccion=13,'RECREACION','FORMATIVO')) FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccionTipos ,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo  WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccionTipos2  FROM poa_trimestrales AS a WHERE (a.estado IS NULL OR a.estado='$datos[0]') AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.tipoTrimestre='segundoTrimestre' OR a.tipoTrimestre='cuartoTrimestre') GROUP BY a.tipoTrimestre,a.idOrganismo  ORDER BY a.idEnviadorTrimestres;";

			}else if($datos[1]==3 && $datos[2]==20){

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')  FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,(SELECT UPPER(a2.nombreProvincia) FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS nombreProvincia,(SELECT UPPER(a2.nombreCanton) FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton,(SELECT UPPER(a2.nombreParroquia) FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS nombreParroquia,a.tipoTrimestre,a.fecha,a.idEnviadorTrimestres,IF((SELECT COUNT(idEnviadorTrimestres) FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo) IS NOT NULL,(SELECT COUNT(idEnviadorTrimestres) + 1 FROM poa_trimestrales AS a1 WHERE a1.estado='A' AND a.idOrganismo=a1.idOrganismo GROUP BY a.idOrganismo),'1') AS contadorTr,YEAR(a.fecha) AS aniosEvaluados,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM poa_organismo AS a1 INNER JOIN poa_usuario AS a2 ON a1.idUsuario=a2.idUsuario WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS presidente,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS emailOrganismos,(SELECT UPPER(a1.direccion) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS direccion, (SELECT UPPER(a1.barrioPoa) FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS barrioPoa,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.accion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccion,(SELECT UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreObjetivo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'))  FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_objetivos AS a3 ON a3.idObjetivos=a2.idObjetivos WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS objetivosS,a.idOrganismo,IF(a.esigeft IS NOT NULL,a.esigeft,IF((SELECT a.idOrganismo FROM poa_esigef AS a1 WHERE a1.idOrganismo=a.idOrganismo) IS NOT NULL,'SI','NO')) AS esigeft,(SELECT if(a3.idAreaAccion=9 OR a3.idAreaAccion=14,'ALTO RENDIMIENTO',if(a3.idAreaAccion=13,'RECREACION','FORMATIVO')) FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccionTipos ,REPLACE(a.tipoTrimestre,'Trimestre',' ') AS trimestreT,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo  WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS areaAccionTipos2  FROM poa_trimestrales AS a WHERE a.estado='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.tipoTrimestre='segundoTrimestre' OR a.tipoTrimestre='cuartoTrimestre') GROUP BY a.tipoTrimestre,a.idOrganismo ORDER BY a.idEnviadorTrimestres;";

			}


			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;
		

		case "tabla__fechas__modificaciones":

			$query="SELECT a.fechaInicioM, a.fechaFinM,(SELECT GROUP_CONCAT(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.idUsuario) AS nombres,a.fecha,a.hora FROM poa_modificacion__fechas AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;



		case "esigef":

			$query="SELECT b.ruc,b.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS provincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=b.idCanton) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=b.idParroquia) AS parroquia, a.idEsigef FROM poa_esigef AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;

		case "paid__poas__asignaciones":

			$query="SELECT b.ruc,b.nombreOrganismo,a.monto,a.archivo AS documento ,(SELECT a1.programa__creado FROM poa_paid_proyecto AS a1 WHERE a1.idProyectoPaid=a.idProyecto) AS proyecto FROM poa_paid_proyecto_organismo AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;

		case "reporteriaDefinitiva__c":

			// $query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2  ON a1.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS nombreTipo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL AND (SELECT a6.idProgramacionFinanciera FROM poa_actividadesadministrativas AS a5 INNER JOIN poa_programacion_financiera AS a6 ON a5.idProgramacionFinanciera=a6.idProgramacionFinanciera WHERE a6.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL OR (a.financieroE!='T' AND a.financieroE IS NOT NULL AND (SELECT a6.idProgramacionFinanciera FROM poa_actividadesadministrativas AS a5 INNER JOIN poa_programacion_financiera AS a6 ON a5.idProgramacionFinanciera=a6.idProgramacionFinanciera WHERE a6.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL),if(a.financieroE IS NOT NULL AND a.financieroE!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financieroE),IF(a.financieroE='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.financiero IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financiero),IF(a.financiero IS NULL AND a.financiero2 IS NULL,'BANDEJA RECIBIDOS COORDINADOR','NO CORRESPONDE')))),'NO CORRESPONDE') AS administrativo,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL AND ((SELECT a1.idSueldos FROM poa_sueldossalarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL OR (SELECT a1.idHonorarios FROM poa_honorarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL OR (a.financiero2 IS NOT NULL AND (SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL)),if(a.financieroE2 IS NOT NULL AND a.financieroE2!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financieroE2),IF(a.financieroE2='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.financiero2 IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financiero2),IF(a.financiero IS NULL AND a.financiero2 IS NULL,'BANDEJA RECIBIDOS COORDINADOR','NO CORRESPONDE')))),'NO CORRESPONDE') AS talentoHumano,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' LIMIT 1) IS NOT NULL AND (SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_mantenimiento AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,if(a.instalaciones='$instalaciones' AND a.instalacionesE2='$planificacion','NO CORRESPONDE',if(a.instalaciones='$instalaciones' AND a.instalacionesE2='$directorVariables','NO CORRESPONDE',if(a.instalacionesE IS NOT NULL AND a.instalacionesE!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalacionesE),IF(a.instalacionesE='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.instalaciones IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalaciones),IF(a.instalaciones IS NULL AND a.instlaaciones2 IS NULL,'BANDEJA RECIBIDOS COORDINADOR','NO CORRESPONDE')))))),'NO CORRESPONDE') AS instalacionesDeportivas,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' LIMIT 1) IS NOT NULL AND (SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_mantenimiento AS a2 ON a1.idProgramacionFinanciera=a2.idProgramacionFinanciera WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,if(a.instlaaciones2='$instalaciones' AND a.instalacionesE='$planificacion','NO CORRESPONDE',if(a.instlaaciones2='$instalaciones' AND a.instalacionesE='$directorVariables','NO CORRESPONDE',if(a.instalacionesE2 IS NOT NULL AND a.instalacionesE2!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalacionesE2),IF(a.instalacionesE2='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.instlaaciones2 IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instlaaciones2),IF(a.instalaciones IS NULL AND a.instlaaciones2 IS NULL,'BANDEJA RECIBIDOS COORDINADOR','NO CORRESPONDE')))))),'NO CORRESPONDE') AS infraestructura,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_competencia_organismo_competencia AS a2 ON a1.idOrganismo=a2.idOrganismo INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo AND (a1.idActividad='3' OR a1.idActividad='4'OR a1.idActividad='5'OR a1.idActividad='6' OR a1.idActividad='7') AND (a3.nombreTipo LIKE '%ecuatorianas por%' OR a3.nombreTipo LIKE '%pico Ecuatoriano%'  OR a3.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR a3.nombreTipo LIKE '%Militar Ecuatoriana%' OR a3.nombreTipo LIKE '%Policial Ecuatoriana%')  LIMIT 1) IS NOT NULL,if(a.subsecretariaE IS NOT NULL AND a.subsecretariaE!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretariaE),IF(a.subsecretariaE='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.subsecretaria IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretaria),'BANDEJA RECIBIDOS SUBSECRETARIO'))),'NO CORRESPONDE') AS subsecetariaAlto,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_competencia_organismo_competencia AS a2 ON a1.idOrganismo=a2.idOrganismo INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo AND (a1.idActividad='3' OR a1.idActividad='4'OR a1.idActividad='5'OR a1.idActividad='6' OR a1.idActividad='7') AND (a3.nombreTipo LIKE '%cantonales%' OR a3.nombreTipo LIKE '%comunitarias%'  OR a3.nombreTipo LIKE '%deportivas provinciales%' OR a3.nombreTipo LIKE '%barriales y parroquiales%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR a3.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR a3.nombreTipo LIKE '%Nacional del Ecuador%' OR a3.nombreTipo LIKE '%de Deporte Universitario%' OR a3.nombreTipo LIKE '%Estudiantil%' OR a3.nombreTipo LIKE '%Rurales%' OR a3.nombreTipo LIKE '%Ligas deportivas barriales,%' OR a3.nombreTipo LIKE '%Federaciones cantonales de ligas deportivas barriales y parroquiales%')  LIMIT 1) IS NOT NULL,if(a.subsecretariaE IS NOT NULL AND a.subsecretariaE!='T',(SELECT CONCAT_WS(' ','BANDEJA RECOMENDADO:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretariaE),IF(a.subsecretariaE='T',IF(a.planificacion='T','GESTIONADO',(SELECT CONCAT_WS(' ',y2.nombre,y2.apellido) FROM th_usuario AS y2 WHERE y2.id_usuario=a.planificacion)),IF(a.subsecretaria IS NOT NULL,(SELECT CONCAT_WS(' ','BANDEJA RECIBIDOS:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretaria),'BANDEJA RECIBIDOS SUBSECRETARIO'))),'NO CORRESPONDE') AS subsecretariaActividad FROM poa_preliminar_envio AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos';";

		$query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2  ON a1.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idCompetenciaOrganismo DESC LIMIT 1) AS nombreTipo,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' AND a1.perioIngreso='$aniosPeriodos__ingesos'  LIMIT 1) IS NOT NULL,IF(a.financiero IS NOT NULL,IF(a.financiero='T',IF(a.financieroE='T',IF(a.planificacion='S' OR a.planificacion='T',IF(a.planificacion2='T',IF(a.planificacion='T','FINALIZADO',(SELECT CONCAT_WS(' ','PARA GESTIONAR:',a1.nombre,a1.apellido) FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a2.id_rol='2' AND a1.fisicamenteEstructura='18' AND a1.estadoUsuario='A' LIMIT 1)),(SELECT CONCAT_WS(' ','Recomendado: ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion)),(SELECT CONCAT_WS(' ','Recomendado:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financieroE)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.financiero)),'BANDEJA COORDINADOR'),'NO CORRESPONDE') AS administrativo,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idActividad='2' LIMIT 1)  IS NOT NULL,IF(a.instlaaciones2 IS NOT NULL,IF(a.instlaaciones2='T',IF(a.instalacionesE2='T' OR a.instalacionesE2='N/A',IF(a.planificacion='S' OR a.planificacion='T',IF(a.planificacion2='T',IF(a.planificacion='T','FINALIZADO',(SELECT CONCAT_WS(' ','PARA GESTIONAR:',a1.nombre,a1.apellido) FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a2.id_rol='2' AND a1.fisicamenteEstructura='18' AND a1.estadoUsuario='A' LIMIT 1)),(SELECT CONCAT_WS(' ','Recomendado: ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion)),(SELECT CONCAT_WS(' ','Recomendado:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalacionesE2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instlaaciones2)),'BANDEJA COORDINADOR'),'NO CORRESPONDE') AS instalacionesDeportiva,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idActividad='2' LIMIT 1)  IS NOT NULL,IF(a.instalaciones IS NOT NULL,IF(a.instalaciones='T',IF(a.instalacionesE='T' OR a.instalacionesE='N/A',IF(a.planificacion='S' OR a.planificacion='T',IF(a.planificacion2='T',IF(a.planificacion='T','FINALIZADO',(SELECT CONCAT_WS(' ','PARA GESTIONAR:',a1.nombre,a1.apellido) FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a2.id_rol='2' AND a1.fisicamenteEstructura='18' AND a1.estadoUsuario='A' LIMIT 1)),(SELECT CONCAT_WS(' ','Recomendado: ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion)),(SELECT CONCAT_WS(' ','Recomendado:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalacionesE)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.instalaciones)),'BANDEJA COORDINADOR'),'NO CORRESPONDE') AS infraestructura,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_competencia_organismo_competencia AS a2 ON a2.idOrganismo=a1.idOrganismo INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idActividad>2 AND a1.perioIngreso='$aniosPeriodos__ingesos' AND (a3.nombreTipo LIKE '%ecuatorianas por%' OR a3.nombreTipo LIKE '%pico Ecuatoriano%'  OR a3.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR a3.nombreTipo LIKE '%Militar Ecuatoriana%' OR a3.nombreTipo LIKE '%Policial Ecuatoriana%' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo LIMIT 1)  IS NOT NULL,IF(a.subsecretaria IS NOT NULL,IF(a.subsecretaria='T',IF(a.subsecretariaE='T' OR a.subsecretariaE='N/A',IF(a.planificacion='S' OR a.planificacion='T',IF(a.planificacion2='T',IF(a.planificacion='T','FINALIZADO',(SELECT CONCAT_WS(' ','PARA GESTIONAR:',a1.nombre,a1.apellido) FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a2.id_rol='2' AND a1.fisicamenteEstructura='18' AND a1.estadoUsuario='A' LIMIT 1)),(SELECT CONCAT_WS(' ','Recomendado: ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion)),(SELECT CONCAT_WS(' ','Recomendado:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretariaE)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretaria)),'BANDEJA SUBSECRETARIO'),'NO CORRESPONDE') AS subsecetariaAlto,IF((SELECT a1.idProgramacionFinanciera FROM poa_programacion_financiera AS a1 INNER JOIN poa_competencia_organismo_competencia AS a2 ON a2.idOrganismo=a1.idOrganismo INNER JOIN poa_tipo_organismo AS a3 ON a3.idTipoOrganismo=a2.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idActividad>2 AND (a3.nombreTipo LIKE '%cantonales%' OR a3.nombreTipo LIKE '%comunitarias%'  OR a3.nombreTipo LIKE '%deportivas provinciales%' OR a3.nombreTipo LIKE '%barriales y parroquiales%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR a3.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR a3.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR a3.nombreTipo LIKE '%Nacional del Ecuador%' OR a3.nombreTipo LIKE '%de Deporte Universitario%' OR a3.nombreTipo LIKE '%Estudiantil%' OR a3.nombreTipo LIKE '%Rurales%' OR a3.nombreTipo LIKE '%Ligas deportivas barriales,%' OR a3.nombreTipo LIKE '%Federaciones cantonales de ligas deportivas barriales y parroquiales%' AND a1.perioIngreso='$aniosPeriodos__ingesos') AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo LIMIT 1)  IS NOT NULL,IF(a.subsecretaria IS NOT NULL,IF(a.subsecretaria='T',IF(a.subsecretariaE='T' OR a.subsecretariaE='N/A',IF(a.planificacion='S' OR a.planificacion='T',IF(a.planificacion2='T',IF(a.planificacion='T','FINALIZADO',(SELECT CONCAT_WS(' ','PARA GESTIONAR:',a1.nombre,a1.apellido) FROM th_usuario AS a1 INNER JOIN th_usuario_roles AS a2 ON a1.id_usuario=a2.id_usuario WHERE a2.id_rol='2' AND a1.fisicamenteEstructura='18' AND a1.estadoUsuario='A' LIMIT 1)),(SELECT CONCAT_WS(' ','Recomendado: ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion2)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.planificacion)),(SELECT CONCAT_WS(' ','Recomendado:',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretariaE)),(SELECT CONCAT_WS(' ',a1.nombre,a1.apellido) FROM th_usuario AS a1 WHERE a1.id_usuario=a.subsecretaria)),'BANDEJA SUBSECRETARIO'),'NO CORRESPONDE') AS subsecretariaActividad  FROM poa_preliminar_envio AS a WHERE a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;


		case "organismosRegistrados_i":

			$query="SELECT a.ruc,a.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.idCanton) AS nombreCanton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.idParroquia LIMIT 1) AS nombreParroquia,if((SELECT b.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS b ON a1.idInversion=b.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,IF((SELECT a1.idFinal FROM poa_documentofinal AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL,'Trámite gestionado','Asignación presupuestada realizada'),'Presupuesto no asignado') AS estado FROM poa_organismo	AS a;";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;


		case "reporteria__suministros":

			$query="SELECT a.tipo,a.nombreEscenario,GROUP_CONCAT(b.luz SEPARATOR '---') AS energia,GROUP_CONCAT(b.agua SEPARATOR '---') AS agua,a.idSumi FROM poa_suministrosn AS a INNER JOIN poa_suministros AS b ON a.idSumi=b.idSumiN WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idSumi;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "reporteria__mantenimiento":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idOrganismo ORDER BY a.idMantenimiento DESC;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {
				$query="SELECT CONCAT_WS('-',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS direccionCompleta,a.estado,a.tipoRecursos,a.tipoIntervencion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.detallarTipoIn, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detallarTipoIn,a.tipoMantenimiento,a.materialesServicios,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.total FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idMantenimiento DESC;";

			}else{
				$query="SELECT CONCAT_WS('-',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.direccionCompleta, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS direccionCompleta,a.estado,a.tipoRecursos,a.tipoIntervencion,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.detallarTipoIn, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detallarTipoIn,a.tipoMantenimiento,a.materialesServicios,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.total FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idMantenimiento DESC;";

			}

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;



		case "reporteria__administrativas":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idOrganismo ORDER BY a.idActividadAd DESC;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {
				$query="SELECT CONCAT_WS('-',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.justificacionActividad, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionActividad,a.cantidadBien,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.totalTotales FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idActividadAd DESC;";

			}else{
				$query="SELECT CONCAT_WS('-',c.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) AS nombreItem,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.justificacionActividad, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionActividad,a.cantidadBien,b.enero,b.febrero,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.totalTotales FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idActividadAd DESC;";

			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "reporteria__actividades":


			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='3' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='3' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			}else{

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='3' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			}


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "reporteria__actividades__4":


			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='4' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='4' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			}else{

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='4' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";
				
			}


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;


		case "reporteria__actividades__5":


			// $comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='5' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;");
			// $idOrganismo=$comparativos[0][idOrganismo];

			// if (empty($idOrganismo)) {

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='5' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			// }else{

			// 	$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='5' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";
				
			// }


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "reporteria__actividades__6":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='6' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='6' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			}else{

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='6' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";
				
			}


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "reporteria__actividades__7":


			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT b.idOrganismo FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='7' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='7' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			}else{

				$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='7' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";
				
			}


			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__sueldos__salarios__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}


			$query="SELECT b.idActividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.sueldoSalarioPlanificado,a.sueldoSalarioEjecutado,a.aporteIessPlanificado,a.aporteIessEjecutado,a.decimoTerceroPlanificado,a.decimoTerceroEjecutado,a.decimoCuartoPlanificado,a.decimoCuartoEjecutado,a.fondosReservasPlanificado,a.fondosReservasEjecutado,a.compensacionDeshaucioProgramado,a.compensacionDeshaucioEjecutado,a.despidoIntepestivoProgramado,a.despidoIntepestivoEjecutado,a.reunciaVoluntariaProgramado,a.renunciaVoluntariaEjecutado,a.vacacionesProgramado,a.vacionesEjecutado,a.mes,REPLACE(a.periodo,'Trimestre',' ') AS periodo,YEAR(a.fecha) AS anio  FROM poa_seguimiento_sueldos_salarios AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldosSalarios=b.idSueldos WHERE a.idOrganismo='$datos[0]' AND a.periodo='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__sueldos__salarios":

			$query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_sueldossalarios2022 AS a1 INNER JOIN poa_actividades AS b1 ON a1.idActividad=b1.idActividades WHERE a1.idSueldos=a.idSueldosSalarios) AS actividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,b.cargo,b.tipoCargo ,a.sueldoSalarioPlanificado,a.sueldoSalarioEjecutado,a.aporteIessPlanificado,a.aporteIessEjecutado,a.decimoTerceroPlanificado,a.decimoTerceroEjecutado,a.decimoCuartoPlanificado,a.decimoCuartoEjecutado,a.fondosReservasPlanificado,a.fondosReservasEjecutado,a.compensacionDeshaucioProgramado,a.compensacionDeshaucioEjecutado,a.despidoIntepestivoProgramado,a.despidoIntepestivoEjecutado,a.reunciaVoluntariaProgramado,a.renunciaVoluntariaEjecutado,a.vacacionesProgramado,a.vacionesEjecutado,a.mes,REPLACE(a.periodo,'Trimestre',' ') AS periodo,YEAR(a.fecha) AS anio FROM poa_seguimiento_sueldos_salarios AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldosSalarios=b.idSueldos WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__honorarios__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT b.idActividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS fechaPro FROM poa_seguimiento_honorarios AS a INNER JOIN poa_honorarios2022 AS b ON a.idHonorarios=b.idHonorarios WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__honorarios":

			$query="SELECT (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_honorarios2022 AS a1 INNER JOIN poa_actividades AS b1 ON a1.idActividad=b1.idActividades WHERE a1.idHonorarios=a.idHonorarios) AS actividad,b.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,b.cargo,b.tipoCargo,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS fechaPro FROM poa_seguimiento_honorarios AS a INNER JOIN poa_honorarios2022 AS b ON a.idHonorarios=b.idHonorarios WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;


		case "reporteria__honorarios":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_honorarios2022 WHERE idOrganismo='$datos[0]' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo ORDER BY idHonorarios;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {
				$query="SELECT CONCAT_WS(' ','Actividad',idActividad) AS idActividad,cedula,nombres,cargo,tipoCargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,honorarioMensual,tipoCargo FROM poa_honorarios2022 WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idHonorarios;";

			}else{
				$query="SELECT CONCAT_WS(' ','Actividad',idActividad) AS idActividad,cedula,nombres,cargo,tipoCargo,honorarioMensual,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total,honorarioMensual,tipoCargo FROM poa_honorarios2022 WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' AND modifica='A' ORDER BY idHonorarios;";

			}

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__mantenimientosTec":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_mantenimiento_tecnico AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__mantenimientosTec__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_mantenimiento_tecnico AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND YEAR(a.fecha)='$datos[2]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";


			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "seguimiento__administrativas__2":

	  		if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_administrativo AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__administrativas":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_administrativo AS a INNER JOIN poa_actividadesadministrativas AS b ON a.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__competenciaAlto":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_competencia_alto2 AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__competenciaAlto__2":


		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_competencia_alto2 AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__competenciaFor__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_competencia_formativo AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__competenciaFor":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.evento,a.oro,a.plata,a.bronce,a.total,a.cuarOc,a.analisis,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,a.fecha1,a.fecha2,a.fecha3,a.fecha4,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_competencia_formativo AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__recreativoTec__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.fechaInicioP,a.fechaInicioEjecutado,a.fechaFinP,a.fechaFinEjecutado,a.tipoEvento,a.eventoTareaE,a.nivel,a.total,a.tipoOrganizacion,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_recreativo_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__recreativoTec":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.fechaInicioP,a.fechaInicioEjecutado,a.fechaFinP,a.fechaFinEjecutado,a.tipoEvento,a.eventoTareaE,a.nivel,a.total,a.tipoOrganizacion,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_recreativo_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__implementacion__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_implementacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__implementacion":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_implementacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__recreativo__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_recreativos AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__recreativo":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_recreativos AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__competencia__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__competencia":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_competencias AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacion__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}


			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacion":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_capacitacion AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacionTecni__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}			

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_capacitacion_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__capacitacionTecni":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.planificadoInicial,a.ejecutadoInicial,a.planificadoFinal,a.ejectuadoFinal,a.observacionesTecnicas,a.porcentaje,a.beneficiariosHombres,a.beneficiariosMujeres,a.totalT,a.tipoOrganizacion,a.ruc,a.nombreOrganismo,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_seguimiento_capacitacion_tecnico AS a INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__mantenimientos__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}


			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND YEAR(a.fecha)='$datos[2]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__mantenimientos":

			$query="SELECT d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.mensualProgramado,a.mensualEjecutado,a.mes,REPLACE(a.trimestre,'Trimestre',' ') AS trimestre,YEAR(a.fecha) AS anio FROM poa_segimiento_mantenimiento AS a INNER JOIN poa_mantenimiento AS b ON a.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__autogestiones__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}


			$query="SELECT detalleAu,ROUND(montoAu,2) AS monto,detalleDos,REPLACE(trimestre,'Trimestre',' ') AS periodo,YEAR(fecha) AS anio FROM poa_segimiento_montos_autogestion WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' AND trimestre='$trimestre' ORDER BY YEAR(fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__autogestiones":

			$query="SELECT detalleAu,ROUND(montoAu,2) AS monto,detalleDos,REPLACE(trimestre,'Trimestre',' ') AS periodo,YEAR(fecha) AS anio FROM poa_segimiento_montos_autogestion WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "seguimiento__indicadores__2":

		  	if($datos[1]==1){

		  		 $trimestre="primerTrimestre";

		  	}else if($datos[1]==2){

		  		 $trimestre="segundoTrimestre";

		  	}else if($datos[1]==3){

		  		 $trimestre="tercerTrimestre";

		  	}else if($datos[1]==4){

		  		 $trimestre="cuartoTrimestre";

		  	}


			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadNombres,a.totalProgramado,a.totalEjecutado,REPLACE(a.trimestre,'Trimestre',' ') AS periodo,YEAR(a.fecha) AS fecha,a.documento FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$datos[0]' AND a.trimestre='$trimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "seguimiento__indicadores":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS actividadNombres,a.totalProgramado,a.totalEjecutado,REPLACE(a.trimestre,'Trimestre',' ') AS periodo,YEAR(a.fecha) AS fecha FROM poa_indicadores_seguimiento AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY YEAR(a.fecha) DESC;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "poa__inicial__poa":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_programacion_financiera_dos WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {
				$query="SELECT b.nombreActividades,c.nombreItem,c.itemPreesupuestario, a.enero,a.febrero,a.marzo,a.abril, a.mayo,a.junio,a.julio, a.agosto, a.septiembre, a.octubre,a.noviembre,a.diciembre, a.totalTotales FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_item AS c ON c.idItem=a.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";
			}else{

				$query="SELECT b.nombreActividades,c.nombreItem,c.itemPreesupuestario, a.enero,a.febrero,a.marzo,a.abril, a.mayo,a.junio,a.julio, a.agosto, a.septiembre, a.octubre,a.noviembre,a.diciembre, a.totalTotales FROM poa_programacion_financiera_dos AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_item AS c ON c.idItem=a.idItem WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "poa__indicadores__poa":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT metaindicador FROM poa_poainicial WHERE idOrganismo='$datos[0]' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			$idOrganismo=$comparativos[0][idOrganismo];


			if (empty($idOrganismo)) {

				$query="(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='1' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.metaindicador>0 ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='3' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='4' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='5' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='6' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='7' AND a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1);";
			
			}else{

				$query="(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='1' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.metaindicador>0 ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='2' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='3' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='4' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='5' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='6' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1) UNION (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreActividades,a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador FROM poa_poainicial AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades WHERE a.idActividad='7' AND a.idOrganismo='$datos[0]' AND a.modifica='A' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idPoaEnviado DESC LIMIT 1);";



			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;


		case "reporteria__sueldosySalarios":

			$comparativos=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo ORDER BY idActividad;");
			$idOrganismo=$comparativos[0][idOrganismo];

			if (empty($idOrganismo)) {
				$query="SELECT CONCAT_WS(' ','Actividad',idActividad) AS idActividad,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY cedula  ORDER BY idActividad;";
			}else{
				$query="SELECT CONCAT_WS(' ','Actividad',idActividad) AS idActividad,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,cargo,tipoCargo,tiempoTrabajo,sueldoSalario,aportePatronal,decimoTercera,mensualizaTercera,decimoCuarta,menusalizaCuarta,fondosReserva,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total FROM poa_sueldossalarios2022 WHERE idOrganismo='$datos[0]' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY cedula ORDER BY idActividad;";
			}

			

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "reporteria__desvinculaciones":

			// $comparativos=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_desvinculacion WHERE idOrganismo='$datos[0]' AND modifica='A' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");
			// $idOrganismo=$comparativos[0][idOrganismo];

			// if (empty($idOrganismo)) {
				$query="SELECT IF(b.opcion='compensaciÃ³n','Compensación por Vacaciones no Gozadas por Cesación de Funciones',if(b.opcion='desahucio','Compensación por Desahucio',IF(b.opcion='despido','Despido Intempestivo','Por Renuncia Voluntaria'))) AS opcion,a.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.cargo,a.tipoCargo,b.enero,b.febreo,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.total FROM poa_sueldossalarios2022 AS a INNER JOIN poa_desvinculacion AS b ON a.idSueldos=b.idSueldos WHERE b.idOrganismo='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.cedula;";
			// }else{
			// 	$query="SELECT a.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,a.cargo,a.tipoCargo,b.enero,b.febreo,b.marzo,b.abril,b.mayo,b.junio,b.julio,b.agosto,b.septiembre,b.octubre,b.noviembre,b.diciembre,b.total FROM poa_sueldossalarios2022 AS a INNER JOIN poa_desvinculacion AS b ON a.idSueldos=b.idSueldos WHERE b.idOrganismo='$datos[0]' AND a.modifica='A' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.cedula;";
			// }


			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "intervencionesAsuntos":

			$query="SELECT b.ruc,b.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS provincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=b.idCanton) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=b.idParroquia) AS parroquia, a.cedulaInterventor,a.nombreInterventor,a.fechaInicioIntervencion,a.fechaFinalIntervencion,a.idInterventor FROM poa_interventores AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "poasGestionados__finan__rechado":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,a.fecha_dias,IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Notificado por no presentación de requisitos') AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE YEAR(a.fecha_quipux)='$anioA' AND (c.idUsuario='$datos[0]' OR c.idUsuario IS NULL AND now()<=a.fecha_dias)  AND c.rechazo='r' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "poasGestionados__finan":

			if ($datos[2]==2 && $datos[1]==23) {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,a.fecha_dias,IF(c.rechazo='p',CONCAT_WS(' ','Rectificado el ',c.fechaCorreccion),IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Presenta en tiempo establecido')) AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final,c.rechazo FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE (c.idUsuario='$datos[0]' OR c.idUsuario IS NULL AND c.rechazo IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos' AND c.perioIngreso='$aniosPeriodos__ingesos' AND c.rechazo IS NULL  GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			}else if($datos[2]==3){

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,a.fecha_dias,IF(c.rechazo='p',CONCAT_WS(' ','Rectificado el ',c.fechaCorreccion),IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Presenta en tiempo establecido')) AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final,c.rechazo FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE  (c.idUsuario='$datos[0]' AND c.rechazo!='r' AND c.rechazo!='T' OR c.rechazo IS NULL AND c.idUsuario='$datos[0]') OR (c.rechazo='p' AND c.idUsuario='$datos[0]' AND now()<=a.fecha_dias) AND a.perioIngreso='$aniosPeriodos__ingesos' AND c.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,a.fecha_dias,IF(c.rechazo='p',CONCAT_WS(' ','Rectificado el ',c.fechaCorreccion),IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Presenta en tiempo establecido')) AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final,c.rechazo FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE c.idUsuario='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND c.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "poasGestionados__finan__suspencion":

				
			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,a.fecha_dias,IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Notificado por no presentación de requisitos') AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE YEAR(a.fecha_quipux)='$anioA' AND (now()>=a.fecha_dias OR a.fecha_dias IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "poasGestionados__finan__aprobado__dos":

			$usuarioFisicamente=$objeto->getObtenerInformacionGeneral("SELECT a.fisicamenteEstructura,a.zonal FROM th_usuario AS a  WHERE a.id_usuario='$datos[0]';");

			$zonal=$usuarioFisicamente[0][zonal];
			$fisicamente=$usuarioFisicamente[0][fisicamenteEstructura];

			if ($zonal>1) {
				
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,c.fechaFuncionario_calific,a.fecha_dias,IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Notificado por no presentación de requisitos') AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo INNER JOIN th_usuario AS d ON d.id_usuario=c.idUsuario WHERE c.rechazo='T' AND d.zonal='$zonal' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			}else{

				if($fisicamente=="12"){

					$consultados="(c.rechazo='T')";

				}else if($fisicamente=="14"){

					$consultados="(c.rechazo='T')";

				}else if($fisicamente=="13"){

					$consultados="(c.rechazo='T')";

				}else if($fisicamente=="19"){

					$consultados="(c.rechazo='T')";

				}else{

					$consultados="(c.rechazo='T')";

				}


				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo AND a2.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) AS nombreInversion,a.fecha_quipux,c.fechaFuncionario_calific,a.fecha_dias,IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Notificado por no presentación de requisitos') AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS e ON e.idTipoOrganismo=d.idTipoOrganismo WHERE c.rechazo='T' AND $consultados AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";



			}

			

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "poasGestionados__finan__aprobado":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreInversion,a.fecha_quipux,c.fechaFuncionario_calific,a.fecha_dias,IF(now()<=a.fecha_dias,'Presenta en tiempo establecido','Notificado por no presentación de requisitos') AS estado,(SELECT a1.nombreZonal FROM poa_organismo_zonal AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS zonal,a.idOrganismo,(SELECT a1.idFinancieroD FROM poa_financiero_documentos AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS final FROM poa_documentofinal AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_financiero_documentos AS c ON c.idOrganismo=a.idOrganismo WHERE c.rechazo='T' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY a.idFinal;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "asignaciones__realizadas__finan__trazabilidad":
				
			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT a1.nombreProvincia FROM in_md_provincias AS a1 INNER JOIN poa_organismo AS a2 ON a2.idProvincia=a1.idProvincia WHERE a2.idOrganismo=a.idOrganismo) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 INNER JOIN poa_organismo AS a2 ON a2.idCanton=a1.idCanton WHERE a2.idOrganismo=a.idOrganismo) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 INNER JOIN poa_organismo AS a2 ON a2.idParroquia=a1.idParroquia WHERE a2.idOrganismo=a.idOrganismo) AS parroquia,(SELECT CONCAT_WS(' ', REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.idUsuario) AS funcionario,a.fechaDirector_envia,IF(a.rechazo='T','Aprobado','En estado de aprobación') AS estado,(SELECT CONCAT_WS('; ',a2.observa__polizaOriginal,a2.observa__caucionOrginal,a2.observa__copiaCertificadoBancario,a2.observa__copia_adminFinanciero,a2.observa__copiaRegistroD)  FROM poa_documentos_calificados AS a2 WHERE a2.idOrganismo=a.idOrganismo AND a2.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a2.idDocumentos DESC LIMIT 1) AS observa__polizaOriginal,a.idOrganismo FROM poa_financiero_documentos AS a INNER JOIN poa_documentofinal AS a2 ON a2.idOrganismo=a.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a2.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idFinancieroD DESC;";


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "asignaciones__realizadas__finan":
				
			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT a1.nombreProvincia FROM in_md_provincias AS a1 INNER JOIN poa_organismo AS a2 ON a2.idProvincia=a1.idProvincia WHERE a2.idOrganismo=a.idOrganismo) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 INNER JOIN poa_organismo AS a2 ON a2.idCanton=a1.idCanton WHERE a2.idOrganismo=a.idOrganismo) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 INNER JOIN poa_organismo AS a2 ON a2.idParroquia=a1.idParroquia WHERE a2.idOrganismo=a.idOrganismo) AS parroquia,(SELECT CONCAT_WS(' ', REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó')) FROM th_usuario AS a1 WHERE a1.id_usuario=a.idUsuario) AS funcionario,a.fechaDirector_envia,(SELECT a1.fecha_quipux FROM poa_documentofinal AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idFinal LIMIT 1) AS fechaQuipux,(SELECT a1.fecha_dias FROM poa_documentofinal AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idFinal LIMIT 1) AS fecha_dias,a.idOrganismo,x.documentoQuipux,x.fecha AS fecha__quipuxEnvio FROM poa_financiero_documentos AS a INNER JOIN poa_quipuxdocumento AS x ON a.idOrganismo=x.idOrganismo WHERE a.rechazo='F' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY x.idQuipux DESC;";


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "poasGestionados":

			$query="SELECT b.ruc,b.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS provincia,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=b.idCanton) AS canton,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=b.idParroquia) AS parroquia,a.numeroOficioNoti,a.documento,a.fecha_quipux,a.montoSinDescuentos,a.idOrganismo FROM poa_documentofinal AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;



		case "valores__adicionalesAct":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(z.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,a.nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte) AS nombreDeporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS nombreProvincia,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS paisNombre, (SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,a.justificacionAd,a.canitdarBie,a.detalleBien,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS z ON z.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idActividad;";

			// $query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte LIMIT 1) AS Deporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.paisnombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS ciudadPais,IF((SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) IS NULL, 'INT',(SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance)) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.detalleBien, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detalleBien,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.justificacionAd, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionAd,a.canitdarBie,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_programacion_financiera AS b LEFT JOIN poa_actdeportivas AS a  ON a.idProgramacionFinanciera=b.idProgramacionFinanciera LEFT JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY b.idItem ORDER BY b.idItem;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "valores__adicionalesAct__m__2023":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.tipoFinanciamiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,(SELECT a1.nombreDeporte FROM poa_deporte AS a1 WHERE a1.idDeporte=a.Deporte LIMIT 1) AS Deporte,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.paisnombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_pais AS a1 WHERE a1.id=a.ciudadPais) AS ciudadPais,IF((SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance) IS NULL, 'INT',(SELECT a1.nombreAlcanse FROM poa_alcanse AS a1 WHERE a1.idAlcanse=a.alcance)) AS alcance,a.fechaInicio,a.fechaFin,a.genero,a.categoria,a.numeroEntreandores,a.numeroAtletas,a.total,a.mBenefici,a.hBenefici,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.detalleBien, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS detalleBien,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.justificacionAd, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS justificacionAd,a.canitdarBie,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalElem FROM poa_modificacion_programacion_financiera AS b LEFT JOIN poa_modificacion_actdeportivas AS a  ON a.idProgramacionFinanciera=b.idProgramacionFinanciera LEFT JOIN poa_item AS c ON c.idItem=b.idItem WHERE b.idOrganismo='$datos[0]' AND b.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idModificacionDerfinitiva='$datos[2]' GROUP BY b.idItem ORDER BY b.idItem;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas16":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAcModificaInsertas15":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas14":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAcModificaInsertas13":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas12":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas11":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAcModificaInsertas10":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas9":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas8":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas7":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAcModificaInsertas6":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAcModificaInsertas5":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAcModificaInsertas4":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas3":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos' ;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAcModificaInsertas2":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos' ;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAcModificaInsertas1":


			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";



			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAc16":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAc15":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc14":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAc13":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc12":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc11":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAc10":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc9":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc8":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc7":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAc6":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAc5":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAc4":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc3":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;



		case "tablaItemsAc2":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaItemsAc1":


			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";



			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAc1":


			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera,a.idItem FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";



			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "tablaItemsAnidados":

			$query="SELECT b.itemPreesupuestario,b.nombreItem,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.totalSumaItem,a.idProgramacionFinanciera FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE idOrganismo='$datos[0]' AND a.idActividad='$datos[1]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "aprobacionUsuarios":

			$query="SELECT b.ruc,b.nombreOrganismo,b.correo,b.telefonoOficina,CONCAT_WS(' ',a.nombre,a.apellido) AS nomprePresidente,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia) AS nombreProvincia,b.correo,b.telefonoOficina,(SELECT a2.nombreCanton FROM in_md_canton AS a2 WHERE a2.idCanton=b.idCanton) AS nombreCanton,(SELECT a3.nombreParroquia FROM in_md_parroquia AS a3 WHERE a3.idParroquia=b.idParroquia) AS nombreParroquia,b.correo,b.direccion,b.referenciaDireccion,b.idProvincia,b.idCanton,b.idParroquia,b.barrioPoa,c.numeroDeAcuerdo,c.documento,c.fecha AS fechaAcuerdo,b.idOrganismo,a.cedula, a.sexo AS sexoPresidente,a.fechaNacimiento AS fechaPresidente,a.email AS emailPresidente,a.telefono AS celularPresidente,b.cedulaResponsable,b.nombreResponsablePoa,b.correoResponsablePoa,a.idUsuario,d.nombreDocumentoDeAprobacion,b.activado,b.idOrganismo,(SELECT a1.observacion FROM poa_observaciones AS a1 WHERE a1.idOrganismo=b.idOrganismo AND a1.tipoObservacion='aprobacionUsuario' ORDER BY a1.idObservaciones DESC LIMIT 1) AS observacionAprobacion, (SELECT a1.estado FROM poa_observaciones AS a1 WHERE a1.idOrganismo=b.idOrganismo AND a1.tipoObservacion='aprobacionUsuario' ORDER BY a1.idObservaciones DESC LIMIT 1) AS estadoAprobacion FROM poa_usuario AS a INNER JOIN poa_organismo AS b ON a.idUsuario=b.idUsuario INNER JOIN poa_organismo_acuerdo_ministerial AS c ON c.idOrganismo=b.idOrganismo LEFT JOIN poa_organismo_documento_aprobacion AS d ON d.idOrganismo=b.idOrganismo WHERE b.activado='I';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaLineaP":

			$query="SELECT nombreLinea,idLineas FROM poa_linea_base WHERE estado='A' AND nombreLinea!='' ORDER BY idLineas ASC;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaPrograma":

			$query="SELECT nombrePrograma,idPrograma FROM poa_programa WHERE estado='A' AND nombrePrograma!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaIndicadores":

			$query="SELECT nombreIndicador,idIndicadores FROM poa_indicadores WHERE estado='A' AND nombreIndicador!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaDeportes":

			$query="SELECT nombreDeporte,idDeporte FROM poa_deporte WHERE estado='A' AND nombreDeporte!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaAlcance":

			$query="SELECT nombreAlcanse,idAlcanse FROM poa_alcanse WHERE estado='A' AND nombreAlcanse!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaFinanciamiento":

			$query="SELECT nombreTipo,idTipo FROM poa_tipo WHERE estado='A' AND nombreTipo!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;


		case "tablaCargo":

			$query="SELECT nombreCargo,idCargo FROM poa_cargo WHERE nombreCargo!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;				

		case "tablaObjetivo":

			$query="SELECT a.nombreObjetivo,a.idObjetivos,c.nombrePrograma,c.idPrograma FROM poa_objetivos AS a INNER JOIN poa_objetivos_usuario AS b ON a.idObjetivos=b.idObjetivos LEFT JOIN poa_programa AS c ON c.idPrograma=b.idPrograma WHERE a.nombreObjetivo!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaTipoOrganismo":

			$query="SELECT a.nombreTipo,a.idTipoOrganismo,b.accion,c.nombreObjetivo,d.nombreArea,a.idAreaAccion,a.idObjetivos,a.idAreaEncargada FROM poa_tipo_organismo AS a INNER JOIN poa_area_accion AS b ON a.idAreaAccion=b.idAreaAccion INNER JOIN poa_objetivos AS c ON c.idObjetivos=a.idObjetivos INNER JOIN poa_areaencargada AS d ON a.idAreaEncargada=d.idAreaEncargada WHERE a.nombreTipo!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaAreaAccion":

			$query="SELECT accion,idAreaAccion FROM poa_area_accion WHERE estado='A' AND accion!='';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaAreaEncargada":

			$query="SELECT nombreArea,idAreaEncargada FROM poa_areaencargada WHERE estado='A';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		

		case "asignarPresupuestoMo":

			switch ($datos[1]) {

				case 1:
						
					$variableZonal="PLANTA CENTRAL";

				break;


				case 2:
						
					$variableZonal="ZONAL 1";

				break;

				case 3:
						
					$variableZonal="ZONAL 2";

				break;

				case 4:
						
					$variableZonal="ZONAL 3";

				break;

				case 5:
						
					$variableZonal="ZONAL 4";

				break;


				case 7:
						
					$variableZonal="ZONAL 6";

				break;

				case 8:					
					$variableZonal="ZONAL 7";
				break;


				case 9:	
					$variableZonal="ZONAL 8";
				break;


			}		

			if ($datos[2]==1) {
				$query="SELECT a.ruc,a.nombreOrganismo,a.correo,(SELECT telefono FROM poa_usuario AS a1 WHERE a1.idUsuario=a.idUsuario LIMIT 1) AS telefonoOficina,a.idOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a2.idInversion DESC LIMIT 1) AS nombreInversion, (SELECT a2.idInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a2.idInversion DESC LIMIT 1) AS idInversion FROM poa_organismo AS a  WHERE a.activado='A' AND (a.periodo IS NOT NULL OR a.periodo='I') GROUP BY a.idOrganismo;";
			}else{

				$query="SELECT a.ruc,a.nombreOrganismo,a.correo,(SELECT telefono FROM poa_usuario AS a1 WHERE a1.idUsuario=a.idUsuario LIMIT 1) AS telefonoOficina,a.idOrganismo,(SELECT a2.nombreInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a2.idInversion DESC LIMIT 1) AS nombreInversion, (SELECT a2.idInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo=a.idOrganismo ORDER BY a2.idInversion DESC LIMIT 1) AS idInversion FROM poa_organismo AS a  WHERE a.activado='A' AND (a.periodo IS NOT NULL OR a.periodo='I') GROUP BY a.idOrganismo;";

			}

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;			

		case "asignarPresupuesto":

			switch ($datos[1]) {

				case 1:
						
					$variableZonal="PLANTA CENTRAL";

				break;


				case 2:
						
					$variableZonal="ZONAL 1";

				break;

				case 3:
						
					$variableZonal="ZONAL 2";

				break;

				case 4:
						
					$variableZonal="ZONAL 3";

				break;

				case 5:
						
					$variableZonal="ZONAL 4";

				break;


				case 7:
						
					$variableZonal="ZONAL 6";

				break;

				case 8:					
					$variableZonal="ZONAL 7";
				break;


				case 9:	
					$variableZonal="ZONAL 8";
				break;


			}		

			if ($datos[2]==1) {
				$query="SELECT a.ruc,a.nombreOrganismo,a.correo,(SELECT telefono FROM poa_usuario AS a1 WHERE a1.idUsuario=a.idUsuario LIMIT 1) AS telefonoOficina,IF(c.nombreTipo IS NULL, 'r. Asociaciones Metropolitanas de Ligas Parroquiales Rurales',c.nombreTipo) AS tipoOrganismo,a.idOrganismo,c.idTipoOrganismo,(SELECT UPPER(a1.nombreProvincia) FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS provincia,a.cedulaResponsable,a.nombreResponsablePoa FROM poa_organismo AS a LEFT JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_tipo_organismo AS c ON c.idTipoOrganismo=b.idTipoOrganismo WHERE a.activado='A' AND (a.periodo IS NULL OR a.periodo='I') GROUP BY a.idOrganismo;";
			}else{

				$query="SELECT a.ruc,a.nombreOrganismo,a.correo,(SELECT telefono FROM poa_usuario AS a1 WHERE a1.idUsuario=a.idUsuario LIMIT 1) AS telefonoOficina,IF(c.nombreTipo IS NULL, 'r. Asociaciones Metropolitanas de Ligas Parroquiales Rurales',c.nombreTipo) AS tipoOrganismo,a.idOrganismo,c.idTipoOrganismo,(SELECT UPPER(a1.nombreProvincia) FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS provincia,a.cedulaResponsable,a.nombreResponsablePoa FROM poa_organismo AS a LEFT JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_tipo_organismo AS c ON c.idTipoOrganismo=b.idTipoOrganismo WHERE a.activado='A' AND (a.periodo IS NULL OR a.periodo='I') GROUP BY a.idOrganismo;";

			}

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;	


		case "organismoSubsesReInsta":

			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.instalaciones='T' AND b.instalacionesE='".$datos[0]."';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "organismosActivosPre":

			$query="SELECT a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,CONCAT_WS(';;;;',if(financiero IS NOT NULL AND financiero!='T',(SELECT CONCAT_WS(' ','Administrativo: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.financiero),' '),if(financiero2 IS NOT NULL AND financiero2!='T',(SELECT CONCAT_WS(' ','Talento humano: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.financiero2),' '),if(instalaciones IS NOT NULL AND instalaciones!='T',(SELECT CONCAT_WS(' ','Instalaciones: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.instalaciones),' '),if(instlaaciones2 IS NOT NULL AND instlaaciones2!='T',(SELECT CONCAT_WS(' ','Infraestructura: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.instlaaciones2),' '),if(subsecretaria IS NOT NULL AND subsecretaria!='T',(SELECT CONCAT_WS(' ','Subsecretaría: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.subsecretaria),' ')) AS custodioUno,CONCAT_WS(';;;;',if(financieroE IS NOT NULL AND financiero='T',(SELECT CONCAT_WS(' ','Administrativo: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.financieroE),' '),if(financieroE2 IS NOT NULL AND financiero2='T',(SELECT CONCAT_WS(' ','Talento humano: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.financieroE2),' '),if(instalacionesE IS NOT NULL AND instalaciones='T',(SELECT CONCAT_WS(' ','Instalaciones: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.instalacionesE),' '),if(instalacionesE2 IS NOT NULL AND instlaaciones2='T',(SELECT CONCAT_WS(' ','Infraestructura: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.instalacionesE2),' '),if(subsecretariaE IS NOT NULL AND subsecretaria='T',(SELECT CONCAT_WS(' ','Subsecretaría: ',REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') ) FROM th_usuario AS a1 WHERE a1.id_usuario=b.subsecretariaE),' ')) AS custodioDos, a.telefonoOficina,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo, b.fecha FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE (b.financiero IS NOT NULL OR b.financiero2 IS NOT NULL OR b.instalaciones IS NOT NULL OR b.instlaaciones2 IS NOT NULL OR b.subsecretaria IS NOT NULL) AND b.subsecretaria!='sF' AND b.subsecretaria!='sA' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "organismoSubsesReInfra":

			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, IF((SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND (a1.documento LIKE '%i__27__3.pdf%' OR a1.documento LIKE '%i__28__3.pdf%' OR a1.documento LIKE '%i__29__3.pdf%' OR a1.documento LIKE '%i__30__3.pdf%' OR a1.documento LIKE '%i__31__3.pdf%' OR a1.documento LIKE '%i__32__3.pdf%' OR a1.documento LIKE '%i__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) IS NOT NULL,(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND (a1.documento LIKE '%i__27__3.pdf%' OR a1.documento LIKE '%i__28__3.pdf%' OR a1.documento LIKE '%i__29__3.pdf%' OR a1.documento LIKE '%i__30__3.pdf%' OR a1.documento LIKE '%i__31__3.pdf%' OR a1.documento LIKE '%i__32__3.pdf%' OR a1.documento LIKE '%i__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1),(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1)) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE (b.instalacionesE2='".$datos[0]."' OR b.instalacionesE2='NC' OR b.instalacionesE='".$datos[0]."' OR b.instalacionesE='NC' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "organismoSubsesReAdminis":

			if ($datos[2]=="5") {
				$buscador="5__2";
			}else{
				$buscador="7__2";
			}


			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%__5__2.pdf%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.financiero='T' AND b.financieroE='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "organismoSubsesReTalentoHu":

			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND (a1.documento LIKE '%__7__2.pdf%' OR a1.documento LIKE '%__27__4.pdf%' OR a1.documento LIKE '%__28__4.pdf%' OR a1.documento LIKE '%__29__4.pdf%' OR a1.documento LIKE '%__30__4.pdf%' OR a1.documento LIKE '%__31__4.pdf%' OR a1.documento LIKE '%__32__4.pdf%' OR a1.documento LIKE '%__33__4.pdf%') ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.financiero2='T' AND b.financieroE2='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "organismoSubsesRe":

			if ($datos[2]=="24" && $datos[1]=="7") {

				$buscador="14__2";
				$buscador2="12__2";

				

				// $query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' OR  a1.documento LIKE '%$buscador2%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='".$datos[0]."';";

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo  ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";



			}else if($datos[2]=="26" && $datos[1]=="7"){


				$buscador="13__2";
				$buscador2="19__2";

				/*===============================
				=            Zonales            =
				===============================*/
				
				$buscador3="27__4";
				$buscador4="28__4";
				$buscador5="29__4";
				$buscador6="30__4";
				$buscador7="31__4";
				$buscador8="32__4";
				$buscador9="33__4";

				
				/*=====  End of Zonales  ======*/


				// $query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' OR a1.documento LIKE '%$buscador2%' OR a1.documento LIKE '%$buscador3%' OR a1.documento LIKE '%$buscador4%' OR a1.documento LIKE '%$buscador5%' OR a1.documento LIKE '%$buscador6%' OR a1.documento LIKE '%$buscador7%' OR a1.documento LIKE '%$buscador8%' OR a1.documento LIKE '%$buscador9%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='".$datos[0]."';";

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo  AND a1.documento NOT LIKE '%__7__2.pdf' AND a1.documento NOT LIKE '%__5__2.pdf' AND a1.documento NOT LIKE '%__5__3.pdf'  AND a1.documento NOT LIKE '%__7__3.pdf' AND a1.documento NOT LIKE '%__2___7__4.pdf' AND a1.documento NOT LIKE '%__5__4.pdf' AND a1.documento NOT LIKE '%__6__4.pdf' AND a1.documento NOT LIKE '%__15__4.pdf' AND a1.documento NOT LIKE '%__6__2.pdf' AND a1.documento NOT LIKE '%__15__2.pdf' AND a1.documento NOT LIKE '%__6__3.pdf' AND a1.documento NOT LIKE '%__15__3.pdf' AND a1.idOrganismo=a.idOrganismo  ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			}else if($datos[2]=="2" && $datos[1]=="4"){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.financiero='T' AND b.financieroE='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if($datos[2]=="1" && $datos[1]=="4"){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE (b.instalaciones='T' OR b.instlaaciones2='T' AND b.perioIngreso='$aniosPeriodos__ingesos') AND (b.instalacionesE='".$datos[0]."' OR b.instalacionesE2='".$datos[0]."'  AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="12" || $datos[2]=="13" || $datos[2]=="14" || $datos[2]=="19" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13")) {

				if ($datos[2]=="13") {
					$buscador="13__3";
				}else if($datos[2]=="14"){
					$buscador="14__3";
				}else if($datos[2]=="19"){
					$buscador="19__3";
				}else if($datos[2]=="12"){
					$buscador="12__3";
				}

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='".$datos[0]."' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="6" || $datos[2]=="15")) {

				if ($datos[2]=="6") {
					$buscador="6__3";
				}else{
					$buscador="15__3";
				}


				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE (b.instalaciones='T' OR b.instlaaciones2='T') AND (b.instalacionesE='".$datos[0]."' OR b.instalacionesE2='".$datos[0]."') AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if (($datos[1]=="2" || $datos[1]=="3") && $datos[2]=="5") {

				if ($datos[2]=="5") {
					$buscador="5__3";
				}else{
					$buscador="7__3";
				}

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo INNER JOIN poa_programacion_financiera AS z2 ON z2.idOrganismo=a.idOrganismo INNER JOIN poa_actividadesadministrativas AS z3 ON z3.idProgramacionFinanciera=z2.idProgramacionFinanciera WHERE (b.financiero='T' OR b.financiero2='T') AND (b.financieroE='".$datos[0]."' OR b.financieroE2='".$datos[0]."') AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if (($datos[1]=="2" || $datos[1]=="3") && $datos[2]=="7") {

				if ($datos[2]=="5") {
					$buscador="5__3";
				}else{
					$buscador="7__3";
				}

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo, (SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo  WHERE (b.financiero='T' OR b.financiero2='T') AND (b.financieroE='".$datos[0]."' OR b.financieroE2='".$datos[0]."') AND (EXISTS (SELECT NULL FROM poa_sueldossalarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo) OR EXISTS (SELECT NULL FROM poa_honorarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo)) AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		


		case "organismoGeneralEn":

			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' WHERE b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		


		case "organismoGeneralEn__modificaciones":

			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones FROM poa_organismo AS a LEFT JOIN poa_modificacion_2022 AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo LEFT JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' INNER JOIN poa_documentofinal AS jL ON jL.idOrganismo=a.idOrganismo AND jL.perioIngreso='$aniosPeriodos__ingesos' WHERE a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		


		case "organismoSubsesCoordinasFinan":

			// if(($datos[2]=="27" || $datos[2]=="28" || $datos[2]=="29" || $datos[2]=="30" || $datos[2]=="31" || $datos[2]=="32" || $datos[2]=="33") && ($datos[1]=="4" || $datos[1]=="3")){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalFinan',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos'  LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos' WHERE  (b.financiero='$datos[0]' OR b.financiero2='$datos[0]') AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			// }

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		


		case "organismoSubsesCoordinasFinanRe":

			$buscador=$datos[2]."__3";


			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,IF((SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' AND (a1.documento LIKE '%f__27__3.pdf%' OR a1.documento LIKE '%f__28__3.pdf%' OR a1.documento LIKE '%f__29__3.pdf%' OR a1.documento LIKE '%f__30__3.pdf%' OR a1.documento LIKE '%f__31__3.pdf%' OR a1.documento LIKE '%f__32__3.pdf%' OR a1.documento LIKE '%f__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) IS NOT NULL,(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' AND (a1.documento LIKE '%f__27__3.pdf%' OR a1.documento LIKE '%f__28__3.pdf%' OR a1.documento LIKE '%f__29__3.pdf%' OR a1.documento LIKE '%f__30__3.pdf%' OR a1.documento LIKE '%f__31__3.pdf%' OR a1.documento LIKE '%f__32__3.pdf%' OR a1.documento LIKE '%f__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1),(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1)) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE  b.financieroE='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos';";


			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;	


		case "organismoSubsesRecomen":

			$buscador=$datos[2]."__3";


			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,IF((SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND (a1.documento LIKE '%i__27__3.pdf%' OR a1.documento LIKE '%i__28__3.pdf%' OR a1.documento LIKE '%i__29__3.pdf%' OR a1.documento LIKE '%i__30__3.pdf%' OR a1.documento LIKE '%i__31__3.pdf%' OR a1.documento LIKE '%i__32__3.pdf%' OR a1.documento LIKE '%i__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) IS NOT NULL,(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND (a1.documento LIKE '%i__27__3.pdf%' OR a1.documento LIKE '%i__28__3.pdf%' OR a1.documento LIKE '%i__29__3.pdf%' OR a1.documento LIKE '%i__30__3.pdf%' OR a1.documento LIKE '%i__31__3.pdf%' OR a1.documento LIKE '%i__32__3.pdf%' OR a1.documento LIKE '%i__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1),(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1)) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE  (b.instalacionesE2='$datos[0]' OR b.instalacionesE='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos';";


			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;	


		case "organismoSubsesCoordinas":

			// if(($datos[2]=="27" || $datos[2]=="28" || $datos[2]=="29" || $datos[2]=="30" || $datos[2]=="31" || $datos[2]=="32" || $datos[2]=="33") && ($datos[1]=="4" || $datos[1]=="3")){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones, IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalFinan',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos' WHERE b.subsecretaria='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			// }
			
			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		

		case "observciones__enviados":
				
			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS parroquia,a.idOrganismo  FROM poa_preliminar_envio AS a INNER JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo WHERE zL.idUsuario='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

			
			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	



		case "aprobadosTecnicos__enviados__3":

			if ($aniosPeriodos__ingesos=="2022") {
				
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS parroquia,a.idOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,a.documentoPlanificacion FROM poa_preliminar_envio AS a INNER JOIN poa_poainicial AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos'  WHERE a.planificacion='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY b.idActividad ASC;";

			}else{


				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS parroquia,a.idOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,a.documentoPlanificacion FROM poa_preliminar_envio AS a INNER JOIN poa_poainicial AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos'  WHERE a.planificacion2='T' AND a.planificacion='S' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY b.idActividad ASC;";

			}


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "aprobadosTecnicos__enviados__2":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS parroquia,a.idOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,a.documentoPlanificacion FROM poa_preliminar_envio AS a INNER JOIN poa_poainicial AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos'  WHERE a.planificacion2='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY b.idActividad ASC;";
			
			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	


		case "aprobadosTecnicos__enviados":

			if ($datos[2]==4) {
				
				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS parroquia,a.idOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,a.subsecretariaE FROM poa_preliminar_envio AS a INNER JOIN poa_poainicial AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos'  WHERE (a.subsecretariaE='$datos[0]' OR a.instalacionesE2='$datos[0]'  OR a.financieroE='$datos[0]') AND a.perioIngreso='$aniosPeriodos__ingesos' AND NOT EXISTS (SELECT t.idOrganismo FROM poa_documentofinal AS t WHERE t.idOrganismo=a.idOrganismo AND t.perioIngreso='$aniosPeriodos__ingesos') GROUP BY a.idOrganismo ORDER BY b.idActividad ASC;";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo, (SELECT b1.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS b1 ON a1.idProvincia=b1.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS provincia, (SELECT b1.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS b1 ON a1.idCanton=b1.idCanton WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS canton, (SELECT b1.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS b1 ON a1.idParroquia=b1.idParroquia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS parroquia,a.idOrganismo, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b1.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS b1 ON a1.idTipoOrganismo=b1.idTipoOrganismo WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS tipoOrganismo ,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones FROM poa_preliminar_envio AS a INNER JOIN poa_poainicial AS b ON a.idOrganismo=b.idOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' WHERE a.planificacion='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo ORDER BY b.idActividad ASC;";



			}

			
			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "organismoSubsesCoordinasReco":

				$buscador=$datos[2]."__3";


			$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,IF((SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' AND (a1.documento LIKE '%s__27__3.pdf%' OR a1.documento LIKE '%s__28__3.pdf%' OR a1.documento LIKE '%s__29__3.pdf%' OR a1.documento LIKE '%s__30__3.pdf%' OR a1.documento LIKE '%s__31__3.pdf%' OR a1.documento LIKE '%s__32__3.pdf%' OR a1.documento LIKE '%s__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1) IS NOT NULL,(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' AND (a1.documento LIKE '%s__27__3.pdf%' OR a1.documento LIKE '%s__28__3.pdf%' OR a1.documento LIKE '%s__29__3.pdf%' OR a1.documento LIKE '%s__30__3.pdf%' OR a1.documento LIKE '%s__31__3.pdf%' OR a1.documento LIKE '%s__32__3.pdf%' OR a1.documento LIKE '%s__33__3.pdf%') AND a1.idOrganismo=a.idOrganismo ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1),(SELECT a1.documento FROM poa_concluciones AS a1 WHERE a1.perioIngreso='$aniosPeriodos__ingesos' AND a1.idOrganismo=a.idOrganismo AND a1.documento LIKE '%$buscador%' ORDER BY a1.idObservacionesTecnicas DESC LIMIT 1)) AS documentoAs FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE b.subsecretaria='T' AND b.subsecretariaE='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		



		case "organismoSubses":

			if ($datos[2]=="24" && $datos[1]=="7") {

					$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='altoRendi',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (d.nombreTipo LIKE '%ecuatorianas por%' OR d.nombreTipo LIKE '%pico Ecuatoriano%'  OR d.nombreTipo LIKE '%Federaciones Ecuatorianas de Deporte Adaptado%' OR d.nombreTipo LIKE '%Militar Ecuatoriana%' OR d.nombreTipo LIKE '%Policial Ecuatoriana%' OR b.subsecretaria='sA' AND b.perioIngreso='$aniosPeriodos__ingesos') AND (b.subsecretaria IS NULL OR b.subsecretaria='sA' OR b.subsecretaria='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if($datos[2]=="26" && $datos[1]=="7"){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='subFisica',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%' OR b.subsecretaria='sF') AND (b.subsecretaria IS NULL OR b.subsecretaria='sF' OR b.subsecretaria='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;";

			}else if($datos[2]=="2" && $datos[1]=="4"){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='administrativo',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo  AND zL.perioIngreso='$aniosPeriodos__ingesos' WHERE (SELECT a1.idActividad FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' LIMIT 1) IS NOT NULL AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a1.idOrganismo) IS NOT NULL AND (b.financieroE2 IS NULL AND b.financieroE IS NULL AND b.financiero2 IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos') AND (b.financiero IS NULL OR b.financiero='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;";


			}else if($datos[2]=="1" && $datos[1]=="4"){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalE',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (SELECT a1.idActividad FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) IS NOT NULL AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a1.idOrganismo) IS NOT NULL AND (SELECT a1.idActividad FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) IS NOT NULL AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a1.idOrganismo AND b.perioIngreso='$aniosPeriodos__ingesos') IS NOT NULL AND (b.instalacionesE2 IS NULL AND b.instalacionesE IS NULL AND b.instalaciones IS NULL AND b.instlaaciones2 IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos') OR (b.instalaciones='$datos[0]' AND b.instlaaciones2='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos' AND (SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo=a.idOrganismo AND b.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) IS NOT NULL AND b.perioIngreso='$aniosPeriodos__ingesos') OR (b.instalaciones IS NULL AND b.instlaaciones2='$datos[0]' AND (SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo=a.idOrganismo LIMIT 1) IS NOT NULL AND b.perioIngreso='$aniosPeriodos__ingesos') OR (b.instalaciones='$datos[0]' AND b.instlaaciones2 IS NULL AND b.perioIngreso='$aniosPeriodos__ingesos') OR (b.instalaciones IS NOT NULL AND b.instlaaciones2='$datos[0]' AND instalacionesE!='$planificacion' AND instalacionesE!='$directorVariables' AND (SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo=a.idOrganismo AND b.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) IS NOT NULL AND planificacion!='$directorVariables' AND b.perioIngreso='$aniosPeriodos__ingesos') OR (b.instalaciones='$datos[0]' AND b.instlaaciones2 IS NOT NULL  AND instalacionesE2!='$planificacion' AND instalacionesE2!='$directorVariables' AND (SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo=a.idOrganismo AND b.perioIngreso='$aniosPeriodos__ingesos' LIMIT 1) IS NOT NULL AND planificacion!='$directorVariables' AND b.perioIngreso='$aniosPeriodos__ingesos') AND b.perioIngreso='$aniosPeriodos__ingesos'   GROUP BY a.idOrganismo;";


			}else if(($datos[2]=="27" || $datos[2]=="28" || $datos[2]=="29" || $datos[2]=="30" || $datos[2]=="31" || $datos[2]=="32" || $datos[2]=="33") && ($datos[1]=="4" || $datos[1]=="3")){

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalE',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (SELECT a1.idActividad FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='2' LIMIT 1) IS NOT NULL AND b.instlaaciones2='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;";

			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="12" || $datos[2]=="13" || $datos[2]=="14" || $datos[2]=="19" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13" || $datos[2]=="13"  || $datos[2]=="24" || $datos[2]=="26")) {

				$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='subFisica',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos' WHERE b.subsecretaria='$datos[0]' AND b.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY a.idOrganismo;";


			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="6" || $datos[2]=="15"  || $datos[2]=="1")) {

				if ($datos[1]=="2") {
					
					$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalE',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (b.instalaciones='$datos[0]' OR b.instlaaciones2='$datos[0]') AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo GROUP BY a1.idOrganismo) IS NOT NULL AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

				}else{

					if ($datos[2]=="6") {
						
						$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalE',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (b.instalaciones='$datos[0]' OR b.instlaaciones2='$datos[0]') AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo GROUP BY a1.idOrganismo) IS NOT NULL AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

					}else{

						$query="SELECT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,GROUP_CONCAT(z.nombreAnexo SEPARATOR '_________') AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='zonalE',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos'  WHERE (b.instalaciones='$datos[0]' OR b.instlaaciones2='$datos[0]') AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo GROUP BY a1.idOrganismo) IS NOT NULL AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";

					}

				}

				


			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="23" || $datos[2]=="5" || $datos[2]=="2")) {

				$query="SELECT DISTINCT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,z.nombreAnexo AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='administrativo',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos' INNER JOIN poa_programacion_financiera AS z2 ON z2.idOrganismo=a.idOrganismo INNER JOIN poa_actividadesadministrativas AS z3 ON z3.idProgramacionFinanciera=z2.idProgramacionFinanciera  WHERE (b.financiero='$datos[0]') AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' GROUP BY a1.idOrganismo) IS NOT NULL AND (b.financieroE IS NULL) AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}else if (($datos[1]=="2" || $datos[1]=="3") && ($datos[2]=="23" || $datos[2]=="7" || $datos[2]=="2")) {

				$query="SELECT DISTINCT a.ruc,  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo, a.correo, a.telefonoOficina,d.nombreTipo, a.nombreResponsablePoa, b.fecha, a.idOrganismo, d.idTipoOrganismo,z.nombreAnexo AS separaciones,IF(zL.idOrganismo IS NOT NULL AND zL.tipoObservacion='administrativo',IF(zL.estado='A','OBSERVADO','RECTIFICADO'),'ENVIADO') AS estado,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.idProvincia) AS nombreProvincia FROM poa_organismo AS a INNER JOIN poa_preliminar_envio AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo LEFT JOIN poa_anexos2022 AS z ON z.idOrganismo=a.idOrganismo AND z.perioIngreso='$aniosPeriodos__ingesos' LEFT JOIN poa_conclusion_observacion AS zL ON zL.idOrganismo=a.idOrganismo AND zL.perioIngreso='$aniosPeriodos__ingesos' WHERE (b.financiero2='$datos[0]') AND (SELECT if(SUM(a1.totalSumaItem)>0,1,null) FROM poa_programacion_financiera AS a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.idActividad='1' GROUP BY a1.idOrganismo) IS NOT NULL AND (EXISTS (SELECT NULL FROM poa_sueldossalarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo) OR EXISTS (SELECT NULL FROM poa_honorarios2022 AS a1 WHERE a1.idOrganismo=a.idOrganismo)) AND b.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idOrganismo;";


			}

			$dataTablets=$objeto->getDatatablets2($query);


			echo json_encode($dataTablets);

		break;		


		case "usuariosAplicativo":

			$query="SELECT UPPER(CONCAT_WS(' ',a.nombre,a.apellido)) AS nombreCompletoU,c.nombreRol AS nombreRolUs,a.idUsuario,a.cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS apellido,a.sexo,a.fechaNacimiento,a.usuario,a.email,a.telefono,a.estado,b.fechaIngreso,c.nombreRol,c.idRol,a.estado AS estadosPerfilesDados,a.usuario,a.`password` AS contrasena,d.nombreDireccion,a.zonal,e.nombreDireccion,e.idDireccion FROM poa_usuario AS a INNER JOIN poa_usuariorol AS b ON a.idUsuario=b.idUsuario INNER JOIN poa_roles as c ON c.idRol=b.idRol LEFT JOIN poa_direccion_pertenece_usuario AS d ON d.idDireccion=a.idDireccion LEFT JOIN poa_direccion_pertenece_usuario AS e ON e.idDireccion=a.idDireccion;";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaGrupoGasto":

			$query="SELECT nombreClasificacionGastos,idClasificacionGastos FROM poa_clasificaciongastos;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaItems":

			$query="SELECT a.nombreItem,a.idItem,a.estado,a.subdividePima,a.subdivideGastos,a.subdivideDeclaracion,b.campoCero,b.idLuzAguaSeleccionada,a.itemPreesupuestario FROM poa_item AS a LEFT JOIN poa_item_luzagua_seleccionadas AS b ON a.idItem=b.idItem;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		

		case "tablaActividades":

			$query="SELECT a.idActividades AS idActividadSecond,a.nombreActividades,a.idActividades,b.idActividadItem,a.idClasificacionGastos,(SELECT a1.nombreIndicador FROM poa_indicadores AS a1 WHERE a1.idIndicadores=a.idLineaPolitica) AS indicador, (SELECT a1.idIndicadores FROM poa_indicadores AS a1 WHERE a1.idIndicadores=a.idLineaPolitica) AS indicadorId,(SELECT a2.nombreClasificacionGastos FROM poa_clasificaciongastos AS a2 WHERE a2.idClasificacionGastos=a.idClasificacionGastos) AS nomClasi FROM poa_actividades AS a LEFT JOIN poa_item_actividad AS b ON a.idActividades=b.idActividad LEFT JOIN poa_item AS c ON c.idItem=b.idItem GROUP BY a.idActividades;";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;		


		case "tablaItemsAc":

			$query="SELECT b.nombreItem,a.idActividadItem FROM poa_item_actividad AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idActividad='$datos[0]';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;	

			

		/**ruboros */

		case "paidRubrosEventos":

			$query="SELECT actividadDeportiva,deporte,modalidad,nombreEvento,prueba,categoria,fechaInicio,fechaFin,sede,numeroOficina,numeroAtletas,numeroDias,numeroPax,valorTotal,Observaciones,idEventos FROM poa_paid_eventos where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		
		case "paidRubrosNecesidadesGenerales":

			$query="SELECT  modalidad, articulo, cantidad,valorUnitario,valorTotal,sector from poa_paid_necesidades_generales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		

		case "paidRubrosNecesidadesIndividuales":

			$query="SELECT  modalidad,nombres,apellidos articulo, cantidad,valorUnitario,valorTotal,sector from poa_paid_necesidades_individuales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		

		
		case "paidRubrosInterdisciplinario":

			$query="SELECT cedula,modalidad,sexo,cargo,nombres,apellidos,fechaInicio,fechaFin,valor,numeroMeses,valorTotal,sector from poa_paid_interdisciplinario where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;




		
		case "paidEncuentroActivo":

			$query="SELECT nombres,sede,instituciones, fechaInicio, fechFin, deportes, categoria, mujeres, hombres, entrenadores, valorTotal, observaciones, idOrganismo FROM poa_paid_encuentroactivo where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

/**/

	}


