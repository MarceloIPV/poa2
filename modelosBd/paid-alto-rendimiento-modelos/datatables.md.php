<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	$corPlanificas=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$corInsta=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	$directorPlanificacion=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

	// $planificacion=$corPlanificas[0][id_usuario];
	// $instalaciones=$corInsta[0][id_usuario];
	// $directorVariables=$directorPlanificacion[0][id_usuario];

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];

    switch ($identificador) {


		case "paidRubrosEventos":


			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.idEventos) AS numero, a.deporte, a.modalidad, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_atletas, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_atletas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_entrenadores, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_entrenadores, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.categoria, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS categoria, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.pais, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS pais, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.sede, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS sede, a.tipo_evento, a.fecha_inicio, a. Fecha_Fin, a.num_entrenador_ofi, a.num_atletas, a.num_dias, a.num_pax, a.alojamiento, a.alimentacion, a.hidratacion, a.transporte_aereo, transporte_terrestre, a.bono_deportivo_interal, a.inscripcion, a.visa, a.fondo_emergencia, a.especificos_deporte, a.valorTotal, a.Observaciones, a.idEventos FROM poa_paid_eventos AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idComponente = '$idComponente' AND a.idRubro = '$idRubro'";


			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	
		
		case "paidNecesidadesIndividuales1":

			$query="SELECT modalidad, nombres, apellidos, articulo, cantidad, valorUnitario, valorTotal, sector, idNecesidadesIndividuales FROM poa_paid_necesidades_individuales where idOrganismo = '$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idrubro='$idRubro' and idcomponente='$idComponente'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	


		case "paidRubrosInterdisciplinario":

			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.idIterdisciplinario ) AS numero, a.cedula, a.modalidad, a.sexo, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellidos, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS apellidos, a.fechaInicio, a.fechaFin, a.valor, a.numeroMeses, a.valorTotal, a.sector, a.idIterdisciplinario  FROM poa_paid_interdisciplinario AS a WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idComponente = '$idComponente' AND a.idRubro = '$idRubro'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "paidReporteGeneralAR":

			$query="SELECT b.nombreComponentes,d.nombreIndicadores,c.nombreRubros,f.itemPreesupuestario , f.nombreItem,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre,e.totalSumaItem FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes  INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador  INNER JOIN poa_paid_programacion_financiera as e on e.idRubro = c.idRubros and a.idOrganismo = e.idOrganismo and a.perioIngreso = e.perioIngreso  INNER JOIN poa_paid_item as f on e.idItemSelector=f.idItem INNER JOIN poa_paid_catalogo_contraloria as g on g.idItem = f.idItem  WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.valor__comparativo='0'  ";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	

		case "paidNecesidadesGenerales_":

			$query="SELECT deporte, modalidad,sector,articulo,cantidad,valorUnitario,valorTotal,idNecesidadesGenerales from poa_paid_necesidades_generales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idrubro='$idRubro' and idcomponente='$idComponente' ";
			
			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;	
		
        
    }



?>