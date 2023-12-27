<?php

extract($_POST);

require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

session_start();
$idOrganismo= $_SESSION["idOrganismoSession"];
$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
$anioA = date('Y');

$corPlanificas=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

$corInsta=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='4' AND a.fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

$directorPlanificacion=$objeto->getObtenerInformacionGeneral("SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol='2' AND a.fisicamenteEstructura='18' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;");

$planificacion=$corPlanificas[0][id_usuario];
$instalaciones=$corInsta[0][id_usuario];
$directorVariables=$directorPlanificacion[0][id_usuario];

switch ($identificador) {

	case "paidRubrosGeneral":

	$query="SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,idPaid
	FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
	where a.idPrograma=b.idPrograma 
	and a.idComponente=c.idComponentes 
	and a.idRubros=d.idRubros 
	and a.idItem=e.idItem 
	and idOrganismo='$idOrganismo'
	and a.estado= 0 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	


	case "paidRubrosIndicadores":

	$query="SELECT nombrePrograma,nombreComponentes,nombreIndicadores,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,beneficiario,idPaidIndicador
	FROM poa_paid_general_indicadores as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_indicadores as d
	where a.idPrograma=b.idPrograma 
	and a.idIndicadores=d.idIndicadores     
	and a.idComponente=c.idComponentes 
	and idOrganismo='$idOrganismo'
    and estado= 0 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	


	case "paidRubrosGeneralEA":

	$query="SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,idPaid
	FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
	where a.idPrograma=b.idPrograma 
	and a.idComponente=c.idComponentes 
	and a.idRubros=d.idRubros 
	and a.idItem=e.idItem 
	and idOrganismo='$idOrganismo'
	and a.estado= 1 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	


	case "paidRubrosIndicadoresEA":

	$query="SELECT nombrePrograma,nombreComponentes,nombreIndicadores,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,beneficiario,idPaidIndicador
	FROM poa_paid_general_indicadores as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_indicadores as d
	where a.idPrograma=b.idPrograma 
	and a.idIndicadores=d.idIndicadores     
	and a.idComponente=c.idComponentes 
	and idOrganismo='$idOrganismo'
    and estado= 1 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	


case "paidRubrosGeneralPGVEA":

	$query="SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal
	FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
	where a.idPrograma=b.idPrograma 
	and a.idComponente=c.idComponentes 
	and a.idRubros=d.idRubros 
	and a.idItem=e.idItem 
	and idOrganismo='$idOrganismo'
	and a.estado= 1 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	
	
	case "paidRubrosIndicadoresPGIEA":

	$query="SELECT nombrePrograma,nombreComponentes,nombreIndicadores,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,beneficiario
	FROM poa_paid_general_indicadores as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_indicadores as d
	where a.idPrograma=b.idPrograma 
	and a.idIndicadores=d.idIndicadores     
	and a.idComponente=c.idComponentes 
	and idOrganismo='$idOrganismo'
    and estado= 1 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	







case "paidRubrosGeneralPGVAR":

	$query="SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal
	FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
	where a.idPrograma=b.idPrograma 
	and a.idComponente=c.idComponentes 
	and a.idRubros=d.idRubros 
	and a.idItem=e.idItem 
	and idOrganismo='$idOrganismo'
	and a.estado= 0 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	
	
	case "paidRubrosIndicadoresPGIAR":

	$query="SELECT nombrePrograma,nombreComponentes,nombreIndicadores,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,beneficiario
	FROM poa_paid_general_indicadores as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_indicadores as d
	where a.idPrograma=b.idPrograma 
	and a.idIndicadores=d.idIndicadores     
	and a.idComponente=c.idComponentes 
	and idOrganismo='$idOrganismo'
    and estado= 0 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	



		case "paidRubrosGeneralEAver":

	$query="SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,idPaid
	FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
	where a.idPrograma=b.idPrograma 
	and a.idComponente=c.idComponentes 
	and a.idRubros=d.idRubros 
	and a.idItem=e.idItem 
	and idOrganismo='$idOrganismo'
	and a.estado= 1 AND a.perioIngreso='$aniosPeriodos__ingesos';";

	$dataTablets=$objeto->getDatatablets($query);
	echo json_encode($dataTablets);

	break;	

}


