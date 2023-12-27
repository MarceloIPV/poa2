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

		case "obtenerInformacionODPAIDInfraestructura":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') nombreOrganismo, a.ruc, b.numeroDeAcuerdo, a.fechaDeAcuerdoMinisterial, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreResponsablePoa, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') presidente, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.direccion, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') direccion, a.correo FROM poa_organismo AS a INNER JOIN poa_organismo_acuerdo_ministerial as b ON a.idOrganismo = b.idOrganismo where a.idOrganismo = '$idOrganismoSession';");

			$jason['indicadorInformacion']=$indicadorInformacion;
			

		break;	

		 //------------------------------ Valor Total MATRICES CONJUNTAS PAID --------------------
		 case "obtener_valor_total_paid_infraestructura":
			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.valorTotal) as TotalPlanificado, b.montos FROM poa_paid_informes_infraestructura as a INNER JOIN poa_paid_asignacion AS b ON  b.idOrganismo=a.idOrganismo AND b.perioIngreso=a.perioIngreso and b.estado='A' and b.idRubros=a.idRubro and b.idComponentes=a.idComponente  WHERE a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos'  and a.idRubro='$idRubro' and a.idComponente='$idComponente';");
	  
			$jason['indicadorInformacion']=$indicadorInformacion;
		  break;

		   //------------------------------ Valor Total MATRICES CONJUNTAS PAID --------------------
		 case "obtener_valor_total_paid_infraestructura_general":
			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(a.valorTotal) as TotalPlanificado, b.montos FROM poa_paid_informes_infraestructura as a INNER JOIN poa_paid_asignacion AS b ON  b.idOrganismo=a.idOrganismo AND b.perioIngreso=a.perioIngreso and b.estado='A' and b.idRubros=a.idRubro and b.idComponentes=a.idComponente  WHERE a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos';");
	  
			$jason['indicadorInformacion']=$indicadorInformacion;
		  break;

	


		

    }
    echo json_encode($jason);






