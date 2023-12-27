<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idUsuario=$_SESSION["idUsuario"];

	$objeto= new usuarioAcciones();

	$informacion=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_organismo WHERE idUsuario='$idUsuario';");

	switch ($identificador) {


		case "reasignacionModificaciones__recomendaciones__planificacion__general__organismo":


			$query="SELECT (SELECT COUNT(idModificacionDerfinitiva)  FROM poa_modificaciones_envio_inicial AS a1 WHERE a1.idOrganismo='".$informacion[0][idOrganismo]."' AND a1.periodoIngreso='".$aniosPeriodos__ingesos."' GROUP BY a1.idModificacionDerfinitiva) AS contador,a.fecha,b.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS organismo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreTipo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreTipo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia LIMIT 1) AS nombreProvincia,a.idModificacionDerfinitiva,a.idOrganismo FROM poa_modificaciones_envio_inicial AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE a.idOrganismo='".$informacion[0][idOrganismo]."' AND a.periodoIngreso='".$aniosPeriodos__ingesos."' ORDER BY a.idOrganismo;";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;		

	}


