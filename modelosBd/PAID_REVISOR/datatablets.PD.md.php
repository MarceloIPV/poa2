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


		case "paidJuegosNacionales":

			$query="SELECT nombres,sede,instituciones, fechaInicio, fechFin, deportes, categoria, mujeres, hombres, entrenadores, valorTotal, observaciones, idEncuentroActivo FROM poa_paid_encuentroactivo where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "organismoSubses__paid":

			if ($datos[2]=="24" && $datos[1]=="7") {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE identificador='0' AND (idUsuarioS='$datos[0]' OR idUsuarioS IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else if ($datos[2]=="26" && $datos[1]=="7") {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE identificador='1' AND (idUsuarioS='$datos[0]' OR idUsuarioS IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else if ($datos[2]=="1" && $datos[1]=="4") {

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE identificador='2' AND (idUsuarioS='$datos[0]' OR idUsuarioS IS NULL) AND a.perioIngreso='$aniosPeriodos__ingesos';";

			}else{

				$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo,a.identificador,(SELECT ROUND(a1.monto,2) FROM poa_paid_asignacion_dos as a1 WHERE a1.idOrganismo=a.idOrganismo AND a1.estado='A' ORDER BY a1.idAsignacion DESC LIMIT 1) AS montoA FROM poa_paid_envioinicial AS a WHERE idUsuarioS='$datos[0]' AND a.observado IS NULL AND a.perioIngreso='$aniosPeriodos__ingesos';";


			}


			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "organismoSubses__paid__recomiendas":

			$query="SELECT (SELECT a1.ruc FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS ruc,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreOrganismo,(SELECT a1.correo FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS correo,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a1.telefonoOficina FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS telefonoOficina,(SELECT a2.nombreTipo FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 WHERE a1.idTipoOrganismo=a2.idTipoOrganismo LIMIT 1) AS nombreTipo,(SELECT a1.nombreResponsablePoa FROM poa_organismo AS a1 WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreResponsablePoa,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo LIMIT 1) AS nombreProvincia,a.fecha,a.idOrganismo, a.documento,a.identificador FROM poa_paid_envioinicial AS a WHERE idUsuarioR='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";


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
	

		case "paidGeneral__revisor":

			$query="SELECT b.nombreComponentes,d.nombreIndicadores,c.nombreRubros,f.itemPreesupuestario , f.nombreItem,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre,e.totalSumaItem FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes  INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador  INNER JOIN poa_paid_programacion_financiera as e on e.idRubro = c.idRubros and a.idOrganismo = e.idOrganismo and a.perioIngreso = e.perioIngreso  INNER JOIN poa_paid_item as f on e.idItemSelector=f.idItem INNER JOIN poa_paid_catalogo_contraloria as g on g.idItem = f.idItem  WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "paidIndicadores__revisor":

			$query="select b.nombreIndicadores, a.primertrimestre,a.segundotrimestre,a.tercertrimestre,a.cuartotrimestre,a.metaindicador from poa_paid_indicadores_organismos as a INNER JOIN poa_paid_indicadores as b on a.idIndicador=b.idIndicadores where a.idOrganismo='$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	


		case "paidEncuentroAc__revisor":

			$query="SELECT nombres,sede,instituciones, fechaInicio, fechFin, deportes, categoria, mujeres, hombres, entrenadores, valorTotal, observaciones, idEncuentroActivo FROM poa_paid_encuentroactivo where idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidEventos__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.idEventos) AS numero, a.deporte, a.modalidad, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_atletas, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_atletas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_entrenadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_entrenadores, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.categoria, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS categoria, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.pais, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS pais, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.sede, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS sede, a.tipo_evento, a.fecha_inicio, a. Fecha_Fin, a.num_entrenador_ofi, a.num_atletas, a.num_dias, a.num_pax, a.alojamiento, a.alimentacion, a.hidratacion, a.transporte_aereo, transporte_terrestre, a.bono_deportivo_interal, a.inscripcion, a.visa, a.fondo_emergencia, a.especificos_deporte, a.valorTotal, a.Observaciones,c.nombreComponentes,d.nombreRubros FROM poa_paid_eventos AS a INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos'";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidNecesidadesGenerales__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.idNecesidadesGenerales ) AS numero, a.deporte, a.modalidad,a.sector,a.articulo,a.cantidad,a.valorUnitario,a.valorTotal, c.nombreComponentes,d.nombreRubros from poa_paid_necesidades_generales as a INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$datos[0]'  AND a.perioIngreso='$aniosPeriodos__ingesos' 			";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidIndividuales__revisor":

			$query="SELECT a.modalidad, a.nombres, a.apellidos, a.articulo, a.cantidad, a.valorUnitario, a.valorTotal, a.sector,c.nombreComponentes,d.nombreRubros FROM poa_paid_necesidades_individuales as a INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo = '$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos' ";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidInterdiciplinarios__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.idIterdisciplinario ) AS numero, a.cedula, a.modalidad, a.sexo, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellidos, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellidos, a.fechaInicio, a.fechaFin, a.valor, a.numeroMeses, a.valorTotal, a.sector ,c.nombreComponentes,d.nombreRubros  FROM poa_paid_interdisciplinario AS a INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' 
			";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;	

		case "paidEncuentroMedallas__revisor":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMedallas) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.deporte,a.cantidadMedallasOro,a.cantidadMedallasPlata,a.cantidadMedallasBronce,a.totalMedallas,a.valorUnitario,a.valorTotal,c.nombreComponentes,d.nombreRubros from poa_paid_medallas_convencional as  a INNER JOIN poa_paid_item as b on a.item = b.idItem INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos'";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;


		case "paidEncuentroPasajesAereos__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_pasajes_aereos ) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte, a.pasajes, a.n_deportistas, a.n_entrenadores, a.tota_personas, a.n_dias, a.valorTotal, c.nombreComponentes,d.nombreRubros FROM poa_paid_pasajes_aereos AS a INNER JOIN poa_paid_item AS b ON a.id_item = b.idItem INNER JOIN poa_paid_componentes as c on a.id_componente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.id_rubro=d.idRubros WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.identificador = '1' ;";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroTransporte__revisor":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idTransporte) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Provincia,a.Deporte,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal, c.nombreComponentes,d.nombreRubros from poa_paid_transporte as  a INNER JOIN poa_paid_item as b on a.item = b.idItem   INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' ";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroSeguros__revisor":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idSeguro) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Provincia,a.Deporte,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal,  c.nombreComponentes,d.nombreRubros from poa_paid_seguros as  a INNER JOIN poa_paid_item as b on a.item = b.idItem INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' ";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroUniformes__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_uniformes_adaptado) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte, a.delegaciones,a.p_apoyo, a.v_unitario, a.valorTotal,a.tipo, c.nombreComponentes,d.nombreRubros FROM poa_paid_uniformes_adaptado AS a INNER JOIN poa_paid_item AS b ON a.id_item = b.idItem INNER JOIN poa_paid_componentes as c on a.id_componente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.id_rubro=d.idRubros  WHERE a.idOrganismo = '$datos[0]' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador = '1' ";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroBonoDeportivo__revisor":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idBonoDeportivo) AS numero, b.itemPreesupuestario,b.nombreItem,a.Deporte,a.nroDias,a.totalPersonas,a.valorBonoDiario,a.valorTotal,c.nombreComponentes,d.nombreRubros from poa_paid_bono_deportivo as  a INNER JOIN poa_paid_item as b on a.IdItem = b.idItem INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' 			";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroPersonalTecnico__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_personal_tecnico_convensional ) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte,a.jueces, a.nro_dias_jueces, a.comisionados, a.nro_dias_comisionados, a.p_apoyo, a.nro_dias_p_apoyo, a.valor_jueces, a.valor_comisionados, a.valor_p_apoyo, a.valorTotal,  c.nombreComponentes,d.nombreRubros FROM poa_paid_personal_tecnico_convensional AS  a INNER JOIN poa_paid_item AS b ON a.id_item	 = b.idItem INNER JOIN poa_paid_componentes as c on a.id_componente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.id_rubro=d.idRubros   WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.identificador = '1'";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;


		case "paidEncuentroMatricesAux__revisor":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.cantidad,a.valorUnitario,a.valorTotal,a.nombreMatriz,c.nombreComponentes,d.nombreRubros from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem  INNER JOIN poa_paid_componentes as c on a.idComponente=c.idComponentes INNER JOIN poa_paid_rubros as d on a.idRubro=d.idRubros where a.idOrganismo='$datos[0]' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' 			";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;

		case "paidEncuentroHospAli__revisor":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero,  CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem1, CONCAT_WS(' ',d.itemPreesupuestario,d.nombreItem) AS nombreItem2,a.provincia, a.nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.nombreMatriz, e.nombreComponentes,f.nombreRubros  FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem INNER JOIN poa_paid_item AS d ON d.idItem=a.id_item2 INNER JOIN poa_paid_componentes as e on a.id_componente=e.idComponentes INNER JOIN poa_paid_rubros as f on a.id_rubro=f.idRubros  WHERE a.idOrganismo = '$datos[0]' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1'";

			$dataTablets=$objeto->getDatatablets($query);
			echo json_encode($dataTablets);

		break;


		case "anexosInfraestructura":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento, tipo FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$datos[2]' AND idComponente='$datos[1]' AND idRubro='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='Obra';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "anexosInfraestructuraFiscalizacion":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento, tipo FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$datos[2]' AND idComponente='$datos[1]' AND idRubro='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='Fiscalizacion';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "beneficiarioDirectoInfraestructura":

			$query="SELECT rangoDesde, rangoHasta, masculino, femenino, mestizo, montubio,indigena, blanco, afro, totalBeneficiarios, tipo FROM poa_paid_beneficiarios_infraestructura WHERE idOrganismo='$datos[2]' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "beneficiarioAdaptadoInfraestructura":

			$query="SELECT rangoDesde, rangoHasta, masculino, femenino, mestizo, montubio,indigena, blanco, afro, visual, auditivo, multisensorial, intelectual, fisica, psiquica, totalBeneficiarios, tipo FROM poa_paid_beneficiariosAdaptado_infraestructura WHERE idOrganismo='$datos[2]' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		
		



		


		





    }

