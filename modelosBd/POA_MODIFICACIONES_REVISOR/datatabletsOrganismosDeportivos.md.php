<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	session_start();

	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	$idOrganismoSession=$_SESSION["idOrganismoSession"];

	switch ($identificador) {

		case "reasignacionModificaciones__recomendaciones__planificacion__aprobaciones__globales__doces__organismos":

			$query="SELECT CONCAT_WS(' / ',b.ruc,a.semestre) AS ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS organismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=b.idProvincia LIMIT 1) AS nombreProvincia,a.idModificacionDerfinitiva,a.idOrganismo,a.documentoAlto,a.documentoDesarrollo,a.documentoAdministrativo,a.documentoPlanificacion,a.documentoInfraestructura,a.documentoQuipu,a.idModificacionDerfinitiva,a.fecha FROM poa_modificaciones_envio_inicial AS a INNER JOIN poa_organismo AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_competencia_organismo_competencia AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=c.idTipoOrganismo WHERE a.periodoIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.estado='T';";
		
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;		


	}


