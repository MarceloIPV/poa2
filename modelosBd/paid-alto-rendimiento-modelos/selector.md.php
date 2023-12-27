<?php
	
	extract($_POST);
	require_once "../../config/config2.php";
	$objeto= new usuarioAcciones();
	
	session_start();
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
    $idOrganismoSession=$_SESSION["idOrganismoSession"];
	
    switch ($tipo) {

		case "paid_general":
            $informacion=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes,d.nombreIndicadores,d.idIndicadores,a.idComponentes,
			REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros,a.idAsignacion,a.montos FROM poa_paid_asignacion AS a 
			INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes 
			INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador 
			WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.valor__comparativo='$identificador' 
			GROUP BY a.idComponentes;");
            $jason['informacion']=$informacion;
		break;
    
		case "obtener__rubros__inversion":
            $informacion=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros, a.montos,a.idAsignacion,a.idComponentes,a.idRubros FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros AS b 
			ON a.idRubros=b.idRubros 
			WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes' 
			AND a.idAsignacion='$idAsignacion' AND a.valor__comparativo='$identificador';");
            $jason['informacion']=$informacion;
		break;
        
		case "obtener__rubros__items__inversion":
            $informacion=$objeto->getObtenerInformacionGeneral("SELECT c.nombreItem,c.idItem,c.itemPreesupuestario,a.idAsignacion,a.idComponentes,a.idRubros FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros_items AS b ON b.idRubros=a.idRubros INNER JOIN poa_paid_item AS c ON c.idItem=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes' AND a.idAsignacion='$idAsignacion' AND a.valor__comparativo='$identificador' AND a.idRubros='$idRubros';");
            $jason['informacion']=$informacion;
		break;
		case "obtener__rubros__items__detalle":			
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera, a.enero, a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre, a.totalSumaItem, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem, c.idItem  from poa_paid_programacion_financiera as a INNER JOIN poa_paid_item AS c ON c.idItem=a.idItemSelector where  a.idOrganismo='$idOrganismoSession' and a.idRubro='$idRubros' and a.idComponente='$idComponentes' and a.identificador='$identificador' and a.idAsignacion='$idAsignacion' and a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idItem ORDER BY a.idProgramacionFinanciera DESC;");
			$jason['informacion']=$informacion;
		break;
		case "obtener_indicadores_inversion":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT idPaidIndicador, primertrimestre,segundotrimestre,tercertrimestre,cuartotrimestre,metaindicador  from poa_paid_indicadores_organismos where idOrganismo = '$idOrganismoSession' and idIndicador = '$idIndicadores' and idComponente='$idComponentes' and identificador = '$identificador' and perioIngreso = '$aniosPeriodos__ingesos'; ");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_montos_paid":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT monto from poa_paid_asignacion_dos where idOrganismo='$idOrganismoSession' and valor__comparativo ='$identificador' and estado='A' and perioIngreso='$aniosPeriodos__ingesos';");
			$jason['informacion']=$informacion;
		  break;

//*************************** EVENTOS *******************************//
		  case "obtener_datos_deporte":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreDeporte, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreDeporte FROM poa_deporte");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_datos_modalidad":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad WHERE identificador = '$identificador' AND perioIngreso = '$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_datos_prueba":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_prueba WHERE identificador = '$identificador' AND perioIngreso = '$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_datos_categoria":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_categoria WHERE identificador = '$identificador' AND perioIngreso = '$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_datos_pais":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT id, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(paisnombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS paisnombre FROM poa_pais ORDER BY paisnombre ASC");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_datos_ciudad":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.ubicacionpaisid, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.estadonombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS estadonombre, b.id  FROM poa_ciudad AS a 
			INNER JOIN poa_pais AS b
			WHERE a.ubicacionpaisid = b.id AND a.ubicacionpaisid = '$id' ORDER BY a.estadonombre ASC");
			$jason['informacion']=$informacion;
		  break;
		  case "mostrar_titulo_eventos_general":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.montos, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros AS a INNER JOIN poa_paid_asignacion AS b
			WHERE a.idRubros=b.idRubros AND b.estado = 'A' AND a.identificador='$identificador' AND b.idOrganismo = '$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_suma_valorTotal_Eventos":
		  $informacion=$objeto->getObtenerInformacionGeneral("SELECT sum(a.valorTotal) as valorAsignado, b.montos FROM poa_paid_eventos as a INNER JOIN poa_paid_asignacion AS b WHERE a.idRubro= b.idRubros and a.idComponente=b.idComponentes and a.idOrganismo=b.idOrganismo and  a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idRubro='$idRubro' and a.idComponente='$idComponente'");
		  $jason['informacion']=$informacion;
		  break;


//*************************** INTERDICIPLINARIO *******************************//

			case "obtener_datos_modalidad_inter":
				$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad WHERE identificador = '$identificador' AND perioIngreso = '$aniosPeriodos__ingesos'");
				$jason['informacion']=$informacion;
			break;
			case "mostrar_titulo_interdisciplinario_general":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.montos, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros AS a INNER JOIN poa_paid_asignacion AS b
			WHERE a.idRubros=b.idRubros AND b.estado = 'A' AND a.identificador='$identificador' AND b.idOrganismo = '$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
			break;
			case "obtener_suma_valorTotal_Interdisciplinario":
				$informacion=$objeto->getObtenerInformacionGeneral("SELECT sum(a.valorTotal) as valorAsignado, b.montos FROM poa_paid_interdisciplinario as a INNER JOIN poa_paid_asignacion AS b WHERE a.idRubro= b.idRubros and a.idComponente=b.idComponentes and a.idOrganismo=b.idOrganismo and  a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idRubro='$idRubro' and a.idComponente='$idComponente'");
				$jason['informacion']=$informacion;
			break;


//*************************** Necesidades Individuales *******************************//
		  case "mostrar_titulo_nece_individuales_general":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.montos,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros AS a INNER JOIN poa_paid_asignacion AS b INNER JOIN poa_paid_componentes as c on b.idComponentes = c.idComponentes WHERE a.idRubros=b.idRubros AND b.estado = 'A' AND a.identificador='$identificador' AND b.idOrganismo = '$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idRubros='$idRubro' and c.idComponentes='$idComponente';");
			$jason['informacion']=$informacion;
		  break;
		  
		  case "cargar_selector_modalidad_nece_individuales":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad where identificador='$identificador' and perioIngreso='$aniosPeriodos__ingesos';");
			$jason['informacion']=$informacion;
		  break;
		  case "obtener_suma_valorTotal_nece_Individuales":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT sum(a.valorTotal) as valorAsignado, b.montos FROM poa_paid_necesidades_individuales as a INNER JOIN poa_paid_asignacion AS b WHERE a.idRubro= b.idRubros and a.idComponente=b.idComponentes and a.idOrganismo=b.idOrganismo and  a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idRubro='$idRubro' and a.idComponente='$idComponente'");
			$jason['informacion']=$informacion;
		break;


//*************************** Necesidades Generales *******************************//
		  case "mostrar_titulo_nece_generales_general":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.montos, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros FROM poa_paid_rubros AS a INNER JOIN poa_paid_asignacion AS b
			WHERE a.idRubros=b.idRubros AND b.estado = 'A' AND a.identificador='$identificador' AND b.idOrganismo = '$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos'");
			$jason['informacion']=$informacion;
		  break;

		  case "cargar_selector_modalidad_nece_generales":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT * FROM poa_paid_modalidad where identificador='$identificador' and perioIngreso='$aniosPeriodos__ingesos';");
			$jason['informacion']=$informacion;
		  break;

		  case "obtener_suma_valorTotal_nece_generales":
			$informacion=$objeto->getObtenerInformacionGeneral("SELECT sum(a.valorTotal) as valorAsignado, b.montos FROM poa_paid_necesidades_generales as a INNER JOIN poa_paid_asignacion AS b WHERE a.idRubro= b.idRubros and a.idComponente=b.idComponentes and a.idOrganismo=b.idOrganismo and  a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' and a.idRubro='$idRubro' and a.idComponente='$idComponente'");
			$jason['informacion']=$informacion;
		break;



		  case "obtener_contratacion_Publica_AR":
			$informacion=$objeto->getObtenerInformacionGeneral("select * from poa_paid_catalogo_contraloria where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponentes' and idRubros='$idRubros' and idAsignacion='$idAsignacion' and identificador='$identificador' and idItem='$idItem'");
			$jason['informacion']=$informacion;
		  break;

		  case "listar_Deportes":
			$informacion=$objeto->getObtenerInformacionGeneral("select nombre_deporte from deportes");
			$jason['informacion']=$informacion;
		  break;


		  case "Obtener_Valores_Asignados_General_AR":

			$informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as TotalPlanificado, b.monto
			FROM (
				  
			  SELECT valorTotal FROM poa_paid_necesidades_generales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' 
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_necesidades_individuales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_interdisciplinario where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_eventos where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  
			  
			  
			) as CombinedTable INNER JOIN poa_paid_asignacion_dos AS b WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos' and b.estado='A' and b.valor__comparativo='$identificador' ");

			$jason['informacion']=$informacion;
		  break;


		  

		  case "obtener_valor_total_matrices_rubro_AR":

			$informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as TotalPlanificado, b.montos
			FROM (
				  
			  SELECT valorTotal FROM poa_paid_necesidades_generales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponente' and idRubro='$idRubro'
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_necesidades_individuales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'   and idComponente='$idComponente' and idRubro='$idRubro'
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_interdisciplinario where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and idComponente='$idComponente' and idRubro='$idRubro'
			  
					  UNION ALL
			  SELECT valorTotal FROM poa_paid_eventos where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and idComponente='$idComponente' and idRubro='$idRubro'
			  
			  
			) as CombinedTable INNER JOIN poa_paid_asignacion AS b WHERE b.idOrganismo='$idOrganismoSession' and b.estado='A' AND b.perioIngreso='$aniosPeriodos__ingesos' and idComponentes='$idComponente' and idRubros='$idRubro' ");

			$jason['informacion']=$informacion;
		  break;


    }

    echo json_encode($jason);

