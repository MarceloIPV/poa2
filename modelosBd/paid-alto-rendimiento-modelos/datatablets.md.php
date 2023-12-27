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

    switch ($identificador) {


		case "sueldos__salarios__realizados__desvinculaciones":

			$query="SELECT b.cedula,b.nombres,b.tipoCargo,a.enero,a.febreo,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.noviembre,a.diciembre,a.total FROM poa_desvinculacion AS a INNER JOIN poa_sueldossalarios2022 AS b ON a.idSueldos=b.idSueldos WHERE a.idOrganismo='$datos[0]' AND a.perioIngreso='$aniosPeriodos__ingesos';";

			$dataTablets=$objeto->getDatatablets($query);

			echo json_encode($dataTablets);

		break;

		case "tablaRubros1":

			$query="SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros,a.idRubros,(SELECT a1.nombreComponentes FROM poa_paid_componentes AS a1 WHERE a1.idComponentes=a.idComponente LIMIT 1) AS nombreComponentes,(SELECT a1.nombreIndicadores FROM poa_paid_indicadores AS a1 WHERE a1.idIndicadores=a.idIndicador LIMIT 1) AS nombreIndicador,a.idComponente,a.idIndicador,(SELECT a1.idPaidInversion FROM poa_paid_asignacion AS a1 WHERE a1.idRubros=a.idRubros AND a1.estado='A' ORDER BY a1.idPaidInversion LIMIT 1) AS rubrosComparadores FROM poa_paid_rubros AS a WHERE a.identificador='$datos[1]';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;		



        
    }



?>