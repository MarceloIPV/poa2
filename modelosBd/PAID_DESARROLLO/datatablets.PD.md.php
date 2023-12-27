<?php
	
	extract($_POST);

	require_once "../../config/config2.php";
	
	$objeto= new usuarioAcciones();
	$anioA = date('Y');
	$anio = date('Y');

	global $idcomponentePAID;

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

		case "paidReporteGeneralDesarrollo":

			$query="SELECT b.nombreComponentes,d.nombreIndicadores,c.nombreRubros,f.itemPreesupuestario , f.nombreItem,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre,e.totalSumaItem FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes  INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador  INNER JOIN poa_paid_programacion_financiera as e on e.idRubro = c.idRubros and a.idOrganismo = e.idOrganismo and a.perioIngreso = e.perioIngreso  INNER JOIN poa_paid_item as f on e.idItemSelector=f.idItem INNER JOIN poa_paid_catalogo_contraloria as g on g.idItem = f.idItem   WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.valor__comparativo='1'  ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "paidReporteGeneralInfra":

			$query="SELECT b.nombreComponentes,d.nombreIndicadores,c.nombreRubros,f.itemPreesupuestario , f.nombreItem,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre,e.totalSumaItem FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes  INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador  INNER JOIN poa_paid_programacion_financiera as e on e.idRubro = c.idRubros and a.idOrganismo = e.idOrganismo and a.perioIngreso = e.perioIngreso  INNER JOIN poa_paid_item as f on e.idItemSelector=f.idItem INNER JOIN poa_paid_catalogo_contraloria as g on g.idItem = f.idItem   WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.valor__comparativo='2'  ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		

		case "paidMedallasJuegosNacionales":


			$query="select ROW_NUMBER() OVER(ORDER BY idMedallas) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,deporte,cantidadMedallasOro,cantidadMedallasPlata,cantidadMedallasBronce,totalMedallas,valorUnitario,valorTotal,idEvento,idMedallas from poa_paid_medallas_convencional as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
	
		case "paidAdecentameintoJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Adecentamiento' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "paidBienesJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Bienes' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "paidMedicinasJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Medicinas' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "paidAlqEquiposJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Alquiler de Equipos' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "paidComEquiposJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Compra de Equipos' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;


		case "paidLogEventosJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Logística Evento' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "paidPublicidadJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Publicidad' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

		case "paidAcreditacionesJN":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idMatriz) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.descripcion,a.cantidad,a.valorUnitario,a.valorTotal,idEvento,a.idMatriz from poa_paid_matrices_juegos_nacionales as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.nombreMatriz='Acreditaciones' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;

//************** Items Hosp Alim Hid**************//
		case "paidHospAlimDI":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem1, CONCAT_WS(' ',d.itemPreesupuestario,d.nombreItem) AS nombreItem2, a.provincia, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem INNER JOIN poa_paid_item AS d ON d.idItem=a.id_item2 WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deporte Individual' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//************** Items Hosp Alim DC**************//
		case "paidHospAlimDC":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero,  CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem1, CONCAT_WS(' ',d.itemPreesupuestario,d.nombreItem) AS nombreItem2, a.nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem INNER JOIN poa_paid_item AS d ON d.idItem=a.id_item2 WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deporte en Conjunto' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';
			";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//************** Items Hosp Alim JA**************//
		case "paidDeporteDelegacionHospAlimJA":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero,  CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem1, CONCAT_WS(' ',d.itemPreesupuestario,d.nombreItem) AS nombreItem2, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_deporte, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem INNER JOIN poa_paid_item AS d ON d.idItem=a.id_item2 WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deporte-Delegacion-Hosp-Alim-JA' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID'";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//************** Items Hidr JA**************//
		case "paidDeporteDelegacionHidrJA":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',b.itemPreesupuestario,b.nombreItem) AS nombreItem1, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre_deporte, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS b ON b.idItem=a.id_item1 WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deporte-Delegacion-Hidratacion-JA' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Hidr DI >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidHidratacionDI":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem, a.provincia, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem WHERE  a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deportes Individual' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Hidr DC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidHidratacionDC":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem, a.nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem WHERE  a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deportes en Conjunto' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< PTC >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case "paidJuegosNacionalesPTC":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_personal_tecnico_convensional ) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte,a.jueces, a.nro_dias_jueces, a.comisionados, a.nro_dias_comisionados, a.p_apoyo, a.nro_dias_p_apoyo, a.valor_jueces, a.valor_comisionados, a.valor_p_apoyo, a.valorTotal,a.idEvento, a.id_personal_tecnico_convensional FROM poa_paid_personal_tecnico_convensional AS  a INNER JOIN poa_paid_item AS b ON a.id_item	 = b.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.identificador = '1' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< UNIFORMES >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case "paidUniformes":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_uniformes_adaptado) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte, a.delegaciones, a.v_unitario, a.valorTotal,a.idEvento, a.id_uniformes_adaptado FROM poa_paid_uniformes_adaptado AS a INNER JOIN poa_paid_item AS b ON a.id_item = b.idItem WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador = '1' AND a.tipo = 'Uniformes' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< INDUMENTARIA P APOYO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
		case "paidIndumentariaPApoyo":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_uniformes_adaptado) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte, a.p_apoyo, a.v_unitario, a.valorTotal,a.idEvento, a.id_uniformes_adaptado FROM poa_paid_uniformes_adaptado AS a INNER JOIN poa_paid_item AS b ON a.id_item = b.idItem WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador = '1' AND a.tipo = 'Indumentaria Personal Apoyo' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";

			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

//--------------------------------------Bono Deportivo----------------------------------------------
		case "paidBonoDeportivoJuegosNacionales":

			$query="select ROW_NUMBER() OVER(ORDER BY a.idBonoDeportivo) AS numero, b.itemPreesupuestario,b.nombreItem,a.Deporte,a.nroDias,a.totalPersonas,a.valorBonoDiario,a.valorTotal,a.idEvento,a.idBonoDeportivo from poa_paid_bono_deportivo as  a INNER JOIN poa_paid_item as b on a.IdItem = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);

		break;
//************** Items Hosp Alim Hid JA**************//
		case "paidHospAlimJA":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem1, CONCAT_WS(' ',d.itemPreesupuestario,d.nombreItem) AS nombreItem2, a.nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem INNER JOIN poa_paid_item AS d ON d.idItem=a.id_item2 WHERE a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deporte-Delegacion' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Hidr JA>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidHidratacionJA":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY a.nombreMatriz) AS numero, CONCAT_WS(' ',c.itemPreesupuestario,c.nombreItem) AS nombreItem, a.nombre_deporte, a.nro_cupos, a.hosp_alim_hidr, a.dias, a.valor_total,a.idEvento, id_juegos_nacionales_hosp_alim_hidr FROM poa_paid_juegos_nacionales_hosp_alim_hidr AS a INNER JOIN poa_paid_item AS c ON  a.id_item1 = c.idItem WHERE  a.idOrganismo = '$idOrganismoSession' AND a.perioIngreso = '$aniosPeriodos__ingesos' AND a.identificador= '1' AND a.nombreMatriz='Deportes-Delegacion' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Seguro>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidSeguroDeporte":
			$query="select ROW_NUMBER() OVER(ORDER BY a.idSeguro) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Deporte,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal,a.idEvento, a.idSeguro from poa_paid_seguros as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.Deporte <> 'null' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID'; ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

		case "paidSeguroProvincia":
			$query="select ROW_NUMBER() OVER(ORDER BY a.idSeguro) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Provincia,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal,a.idEvento, a.idSeguro from poa_paid_seguros as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.Provincia <> 'null' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID'; ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Transporte >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidTransporteDeporte":
			$query="select ROW_NUMBER() OVER(ORDER BY a.idTransporte) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Deporte,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal,a.idEvento, a.idTransporte from poa_paid_transporte as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.Deporte <> 'null' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID'; ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

		case "paidTransporteProvincia":
			$query="select ROW_NUMBER() OVER(ORDER BY a.idTransporte) AS numero, b.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.Provincia,a.cantidad,a.nroCupos,a.valorUnitario,a.valorTotal,a.idEvento, a.idTransporte from poa_paid_transporte as  a INNER JOIN poa_paid_item as b on a.item = b.idItem where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.identificador='1' and a.Provincia <> 'null' and a.idcomponente='$idcomponentePAID' and a.idrubro='$idrubroPAID'; ";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
		
		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< PASAJES AEREOS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.//
		case "paidPasajesAereos":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY id_pasajes_aereos ) AS numero, CONCAT_WS(' ',b.itemPreesupuestario, b.nombreItem) AS nombreItem, a.deporte, a.pasajes, a.n_deportistas, a.n_entrenadores, a.tota_personas, a.n_dias, a.valorTotal,a.idEvento, a.id_pasajes_aereos FROM poa_paid_pasajes_aereos AS a INNER JOIN poa_paid_item AS b ON a.id_item = b.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.identificador = '1' AND a.id_componente = '$idcomponentePAID' AND a.id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;
	
		case "paidEventosDesarrollo":
			$query="SELECT ROW_NUMBER() OVER(ORDER BY idEvento ) AS numero,  nombre, sede, subsede, participantes, obj_general, obj_especificos, meta,deporte,modalidad,fecha_inicio,fecha_fin, idEvento FROM poa_paid_eventos_desarrollo where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND  id_componente = '$idcomponentePAID' AND id_rubro = '$idrubroPAID';";
			$dataTablets=$objeto->getDatatablets2($query);
			echo json_encode($dataTablets);
		break;

    }

