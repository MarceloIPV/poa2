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


	

		case "paidReporteriaRecibidosTransferencias":

			$query="SELECT w.nombreZonal, a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,ROUND(b.monto,2) AS techo,b.fecha, c.fecha, b.texto__documentos AS documento,  IF(DATEDIFF (c.fecha, b.fecha) <=15 ,'Presenta en tiempo establecido','No Presenta en tiempo establecido') AS estado ,a.idOrganismo  FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_paid_envioinicial as c ON b.idOrganismo=c.idOrganismo and c.identificador=b.valor__comparativo INNER JOIN poa_organismo_zonal as w on w.idOrganismo = a.idOrganismo WHERE b.valor__comparativo='$datos[1]' AND b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidReporteriaRecibidosAsignacionesTransferencias":

			$query="SELECT w.nombreZonal, a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,a.telefonoOficina,a.correoResponsablePoa,ROUND(b.monto,2) AS techo,b.fecha, c.fecha, b.texto__documentos AS documento,  IF(DATEDIFF (c.fecha, b.fecha) <=15 ,'Presenta en tiempo establecido','No Presenta en tiempo establecido') AS estado ,a.idOrganismo  FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_paid_envioinicial as c ON b.idOrganismo=c.idOrganismo and c.identificador=b.valor__comparativo INNER JOIN poa_organismo_zonal as w on w.idOrganismo = a.idOrganismo WHERE b.valor__comparativo='$datos[1]' AND b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidRechazadosDirFinanTransferencias":

			$query="SELECT w.nombreZonal, a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,ROUND(b.monto,2) AS techo,b.fecha, c.fecha, b.texto__documentos AS documento,  IF(DATEDIFF (c.fecha, b.fecha) <=15 ,'Presenta en tiempo establecido','No Presenta en tiempo establecido') AS estado ,a.idOrganismo  FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_paid_envioinicial as c ON b.idOrganismo=c.idOrganismo and c.identificador=b.valor__comparativo INNER JOIN poa_organismo_zonal as w on w.idOrganismo = a.idOrganismo WHERE b.valor__comparativo='$datos[1]' AND b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidAprobadosFinancieroTransferencias":

			$query="SELECT w.nombreZonal, a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,ROUND(b.monto,2) AS techo,b.fecha, c.fecha, b.texto__documentos AS documento,  IF(DATEDIFF (c.fecha, b.fecha) <=15 ,'Presenta en tiempo establecido','No Presenta en tiempo establecido') AS estado ,a.idOrganismo  FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_paid_envioinicial as c ON b.idOrganismo=c.idOrganismo and c.identificador=b.valor__comparativo INNER JOIN poa_organismo_zonal as w on w.idOrganismo = a.idOrganismo WHERE b.valor__comparativo='$datos[1]' AND b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidReporteriaTransferencias":

			$query="SELECT w.nombreZonal, a.ruc,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,(SELECT a2.nombreProvincia FROM poa_organismo AS a1 INNER JOIN in_md_provincias AS a2 ON a1.idProvincia=a2.idProvincia WHERE a1.idOrganismo=a.idOrganismo) AS provincia,(SELECT a2.nombreCanton FROM poa_organismo AS a1 INNER JOIN in_md_canton AS a2 ON a1.idCanton=a2.idCanton WHERE a1.idOrganismo=a.idOrganismo) AS nombreCanton, (SELECT a2.nombreParroquia FROM poa_organismo AS a1 INNER JOIN in_md_parroquia AS a2 ON a1.idParroquia=a2.idParroquia WHERE a1.idOrganismo=a.idOrganismo) AS parroquia,c.fecha, b.fecha ,  IF(DATEDIFF (c.fecha, b.fecha) <=15 ,'Presenta en tiempo establecido','No Presenta en tiempo establecido') AS estado ,a.idOrganismo  FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_paid_envioinicial as c ON b.idOrganismo=c.idOrganismo and c.identificador=b.valor__comparativo INNER JOIN poa_organismo_zonal as w on w.idOrganismo = a.idOrganismo  WHERE  b.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "anexosInfraestructura":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento, tipo FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$idOrganismoSession' AND idComponente='$datos[1]' AND idRubro='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='Obra';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

				

	

}

