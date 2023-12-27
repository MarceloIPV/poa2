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

		case "recreativos__seguimiento__tablas":

			$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRecreativos,a.mes,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.mensualProgramado,SUM(a.mensualEjecutado) AS mensualEjecutado,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento,e.registra_Contratacion,e.justificacion   FROM poa_segimiento_recreativos AS a   INNER JOIN poa_actdeportivas AS b ON a.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON c.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem  INNER JOIN poa_registro_contratacion as e on e.trimestre = a.trimestre and e.idItemCatalogo=c.idItem  WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos'  GROUP BY b.nombreEvento,a.mes,b.idPda ORDER BY d.nombreItem,a.mes,a.idRecreativos DESC;");


			$indicadorInformacion2=$objeto->getObtenerInformacionGeneral("SELECT a.idFacturaRecreativo,a.documento,a.numeroFactura,a.fechaFactura,a.ruc,a.autorizacion,monto,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc) AS itemPreesupuestario FROM poa_seguimiento_facturas_recreativo AS a WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$indicadorInformacion3=$objeto->getObtenerInformacionGeneral("SELECT a.idOtrosRecreativo,a.documento,a.mes,a.trimestre,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc)  AS nombreItem,(SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a3.itemPreesupuestario, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM poa_actdeportivas AS a1 INNER JOIN poa_programacion_financiera AS a2 ON a2.idProgramacionFinanciera=a1.idProgramacionFinanciera INNER JOIN poa_item AS a3 ON a3.idItem=a2.idItem WHERE a1.idPda=a.idActividadAc) AS itemPreesupuestario FROM poa_seguimiento_otros_recreativo AS a WHERE a.idOrganismo='$idOrganismos' AND a.trimestre='$trimestres' AND a.perioIngreso='$aniosPeriodos__ingesos';");

			$jason['indicadorInformacion']=$indicadorInformacion;
			$jason['indicadorInformacion2']=$indicadorInformacion2;
			$jason['indicadorInformacion3']=$indicadorInformacion3;

		break;	

	

		//************************************  tabla Contratación Publica Revisor **************************************** */
		case "selectorTablaContratacionPublica":

			if($semestre=="I SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='primerTrimestre' or a.trimestre='segundoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");

			}else if($semestre == "II SEMESTRE"){

				$indicadorInformacion=$objeto->getObtenerInformacionGeneral("Select a.idActividad, b.itemPreesupuestario, b.nombreItem,c.totalSumaItem as planificado, a.*  from poa_catalogo_contraloria_seguimiento as a INNER JOIN poa_item as b on b.idItem = a.idItemCatalogo INNER JOIN poa_programacion_financiera AS c on  a.perioIngreso=c.perioIngreso and a.idOrganismo = c.idOrganismo and a.idItemCatalogo=c.idItem and a.idActividad=c.idActividad  WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' and (a.trimestre='tercerTrimestre' or a.trimestre='cuartoTrimestre') GROUP BY a.idItemCatalogo  ORDER BY a.idActividad;");
			}

			

			$jason['indicadorInformacion']=$indicadorInformacion;
		

		break;

		

    }
    echo json_encode($jason);






