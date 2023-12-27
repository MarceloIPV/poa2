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


	

		case "paidInformeObraInfraestructura":

			$query="SELECT valorTotal, documento,idOrganismo,idRubro,idComponente, idinformesInfraestructura FROM poa_paid_informes_infraestructura WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]' and tipo ='obra';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidInformeFiscalizacionInfraestructura":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento,idOrganismo, idinformesInfraestructura FROM poa_paid_informes_infraestructura WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]' and tipo ='fiscalizacion';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;


		case "paidEjecucionObraInfraestructura__revisor":

			$query="SELECT valorTotal, documento,idOrganismo,idRubro,idComponente, idinformesInfraestructura FROM poa_paid_informes_infraestructura WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='obra';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "paidFiscalizacionInfraestructura__revisor":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento,idOrganismo,idRubro,idComponente FROM poa_paid_informes_infraestructura WHERE idOrganismo='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='fiscalizacion';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;


		case "anexosInfraestructura":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento, tipo FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$idOrganismoSession' AND idComponente='$datos[1]' AND idRubro='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='Obra';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "anexosInfraestructuraFiscalizacion":

			$query="SELECT ROW_NUMBER() OVER() AS num_row,documento, tipo FROM poa_paid_documentos_infraestructura WHERE idOrganismo='$idOrganismoSession' AND idComponente='$datos[1]' AND idRubro='$datos[0]' AND perioIngreso='$aniosPeriodos__ingesos' and tipo ='Fiscalizacion';";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "beneficiarioDirectoInfraestructura":

			$query="SELECT rangoDesde, rangoHasta, masculino, femenino, mestizo, montubio,indigena, blanco, afro, totalBeneficiarios, tipo FROM poa_paid_beneficiarios_infraestructura WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		case "beneficiarioAdaptadoInfraestructura":

			$query="SELECT rangoDesde, rangoHasta, masculino, femenino, mestizo, montubio,indigena, blanco, afro, visual, auditivo, multisensorial, intelectual, fisica, psiquica, totalBeneficiarios, tipo FROM poa_paid_beneficiariosAdaptado_infraestructura WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND idComponente='$datos[1]' AND idRubro='$datos[0]'";

			$dataTablets=$objeto->getDatatablets2($query);

			echo json_encode($dataTablets);

		break;

		

	

}

