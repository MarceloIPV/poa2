<?php
	
	extract($_POST);
	require_once "../../config/config2.php";
	$objeto= new usuarioAcciones();
	
	session_start();
	  $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
    $idOrganismoSession=$_SESSION["idOrganismoSession"];

    switch ($tipo) {

		case "paid_general":
            $informacion=$objeto->getObtenerInformacionGeneral("SELECT b.nombreComponentes,d.nombreIndicadores,d.idIndicadores,a.idComponentes,c.nombreRubros,a.idAsignacion,a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros INNER JOIN poa_paid_indicadores AS d ON d.idIndicadores=b.idIndicador WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.valor__comparativo='$identificador' GROUP BY a.idComponentes;");
            $jason['informacion']=$informacion;
		break;

    case "obtener_rubros_inversion":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros,a.montos,a.idAsignacion,a.idComponentes,a.idRubros FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros AS b ON a.idRubros=b.idRubros WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes' AND a.idAsignacion='$idAsignacion' AND a.valor__comparativo='$identificador';");
      $jason['informacion']=$informacion;
		break;
    
    case "obtener__rubros__items__inversion":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,c.idItem,a.idAsignacion,a.idComponentes,a.idRubros, c.itemPreesupuestario FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros_items AS b ON b.idRubros=a.idRubros INNER JOIN poa_paid_item AS c ON c.idItem=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes' AND a.idAsignacion='$idAsignacion' AND a.valor__comparativo='$identificador' AND a.idRubros='$idRubros' AND NOT EXISTS (SELECT z.idItemSelector FROM poa_paid_programacion_financiera AS z WHERE z.idItemSelector=c.idItem);");
      $jason['informacion']=$informacion;
    break;

    case "obtener__rubros__items__detalle":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera, a.enero, a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre, a.totalSumaItem, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem, c.idItem from poa_paid_programacion_financiera as a INNER JOIN poa_paid_item AS c ON c.idItem=a.idItemSelector where  a.idOrganismo='$idOrganismoSession' and a.idRubro='$idRubros' and a.idComponente='$idComponentes' and a.identificador='$identificador' and a.idAsignacion='$idAsignacion' and a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY c.idItem ORDER BY a.idProgramacionFinanciera DESC;");
      $jason['informacion']=$informacion;
    break;

    case "obtener_indicadores_inversion":
      $informacion=$objeto->getObtenerInformacionGeneral("select idPaidIndicador, primertrimestre,segundotrimestre,tercertrimestre,cuartotrimestre,metaindicador  from poa_paid_indicadores_organismos where idOrganismo = '$idOrganismoSession' and idIndicador = '$idIndicadores' and idComponente='$idComponentes' and identificador = '$identificador' and perioIngreso = '$aniosPeriodos__ingesos'; ");
      $jason['informacion']=$informacion;
    break;

    case "obtener_montos_paid":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT monto from poa_paid_asignacion_dos where idOrganismo='$idOrganismoSession' and valor__comparativo ='$identificador' and estado='A' and perioIngreso='$aniosPeriodos__ingesos';");
      $jason['informacion']=$informacion;
    break;


    case "obtener_nombre_categorias":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT idCategoria, nombreCategoria FROM poa_paid_categoria where identificador='$identificador' and perioIngreso='$aniosPeriodos__ingesos';");
      $jason['informacion']=$informacion;
    break;


    case "obtener_idRubro_JN":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.nombreRubros, a.montos ,c.nombreComponentes, a.idComponentes  from poa_paid_asignacion as a INNER JOIN poa_paid_rubros as b on a.idRubros=b.idRubros INNER JOIN poa_paid_componentes as c on a.idComponentes = c.idComponentes where a.estado='A' and a.valor__comparativo = '$identificador' and idOrganismo ='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos' and a.idComponentes ='$idComponente' and a.idRubros ='$idRubro';");
      $jason['informacion']=$informacion;
    break;


    case "obtener_idRubro_PTC":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT a.idRubros, b.nombreRubros, a.montos from poa_paid_asignacion as a INNER JOIN poa_paid_rubros as b WHERE a.idRubros=b.idRubros and a.estado='A' and a.valor__comparativo = '$identificador' and idOrganismo ='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos'");
      $jason['informacion']=$informacion;
    break;

    ///// Sumas

    case "obtener_suma_valorTotal_JuegosNacionales":
      $informacion=$objeto->getObtenerInformacionGeneral("select SUM(valorTotal) as valorAsignado from poa_paid_encuentroactivo where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos';");
      $jason['informacion']=$informacion;
    break;

    /////

    case "obtener_contratacion_Publica_desarrollo":
      $informacion=$objeto->getObtenerInformacionGeneral("select * from poa_paid_catalogo_contraloria where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and idComponente='$idComponentes' and idRubros='$idRubros' and idAsignacion='$idAsignacion' and identificador='$identificador' and idItem='$idItem'");
      $jason['informacion']=$informacion;
    break;


    case "listar_Deportes":
      $informacion=$objeto->getObtenerInformacionGeneral("select nombre_deporte from deportes");
      $jason['informacion']=$informacion;
    break;
//********************************** Lista Deportes en Conjunto ***********************************//
    case "listar_Deportes_HAHDC":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT codigo_deporte, nombre_deporte FROM deportes WHERE codigo_deporte = 4 OR codigo_deporte = 5 OR codigo_deporte = 9;");
      $jason['informacion']=$informacion;
    break;
//********************************** Lista Deportes PTC ***********************************//
    case "listar_Deportes_PTC":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT ROW_NUMBER() OVER(ORDER BY nombre_deporte) as total, nombre_deporte FROM deportes ORDER BY nombre_deporte;");
      $jason['informacion']=$informacion;
    break;

    case "obtener_items":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,c.idItem,a.idAsignacion,a.idComponentes,a.idRubros, c.itemPreesupuestario FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros_items AS b ON b.idRubros=a.idRubros INNER JOIN poa_paid_item AS c ON c.idItem=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes'AND a.valor__comparativo='$identificador' AND a.idRubros='$idRubros' ");
      $jason['informacion']=$informacion;
    break;

    //****************************** HOSP ALIM HIDR ***************************//
    case "obtener_items_Hosp_Alim":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,c.idItem,a.idAsignacion,a.idComponentes,a.idRubros, c.itemPreesupuestario FROM poa_paid_asignacion AS a INNER JOIN poa_paid_rubros_items AS b ON b.idRubros=a.idRubros INNER JOIN poa_paid_item AS c ON c.idItem=b.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.idComponentes='$idComponentes' AND a.idAsignacion='$idAsignacion' AND a.valor__comparativo='$identificador' AND a.idRubros='$idRubros' ");
      $jason['informacion']=$informacion;
    break;
    case "obtener_deporte_Hosp_Alim":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT idProvincia, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombreProvincia, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreProvincia FROM in_md_provincias WHERE idProvincia != 25 ORDER BY nombreProvincia ASC;");
      $jason['informacion']=$informacion;
    break;


    //------------------------------Valores Medallas--------------------
    case "obtener_valores_medallas":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(cantidadMedallasOro) as totalOro, SUM(cantidadMedallasPlata) as totalPlata, SUM(cantidadMedallasBronce) as totalBronce, SUM(valorTotal) as valorTotal from poa_paid_medallas_convencional where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and identificador = '1' and idComponente='$idComponente' and idRubro='$idRubro';  ");
      $jason['informacion']=$informacion;
    break;


     //------------------------------Valores Bonos Deportivo--------------------
     case "obtener_valores_bono_deportivo":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(totalPersonas) as totalPersonas, SUM(valorTotal) as TotalInvertido from poa_paid_bono_deportivo where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and identificador = '1'and idComponente='$idComponente' and idRubro='$idRubro'; ");
      $jason['informacion']=$informacion;
    break;

    //------------------------------Valores Matrices Auxiliares--------------------
    case "obtener_valores_matrices_auxiliares":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(valorTotal) as TotalInvertido from poa_paid_matrices_juegos_nacionales where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and identificador = '1' and idComponente='$idComponente' and idRubro='$idRubro'; ");
      $jason['informacion']=$informacion;
    break;

    //------------------------------ NUm total de cupos HOS ALIM DI--------------------
    case "obtener_num_total_cupos_HADI":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(nro_cupos) as num_cupos_HADI FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

    //------------------------------ total HOS ALIM DI--------------------
    case "Total_HOSP_ALIM_DI":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(valor_total) as valorTotalHADI FROM poa_paid_juegos_nacionales_hosp_alim_hidr WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

    //------------------------------ total jueces PTC--------------------
    case "obtener_total_jueces_PTC":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(jueces) as totalJueces FROM poa_paid_personal_tecnico_convensional WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

    //------------------------------ total jueces PTC--------------------
    case "obtener_valor_total_PTC":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(valorTotal) as total_PTC FROM poa_paid_personal_tecnico_convensional WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------Valores Seguros--------------------
     case "obtener_valores_seguro":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(valorTotal) as TotalInvertido from poa_paid_seguros where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and identificador = '1' and idComponente='$idComponente' and idRubro='$idRubro';  ");
      $jason['informacion']=$informacion;
    break;

    //------------------------------Valores Transporte--------------------
    case "obtener_valores_transporte":
      $informacion=$objeto->getObtenerInformacionGeneral( "SELECT SUM(valorTotal) as TotalInvertido from poa_paid_transporte where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and identificador = '1' and idComponente='$idComponente' and idRubro='$idRubro'; ");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ total Uniformes Delegaciones --------------------
    case "obtener_valor_total_uniformes_delegaciones":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(delegaciones) as total_delegaciones FROM poa_paid_uniformes_adaptado WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND tipo = 'Uniformes' AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ total Uniformes --------------------
    case "obtener_valor_total_uniformes":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as valorTotal FROM poa_paid_uniformes_adaptado WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND tipo = 'Uniformes' AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Num total P Apoyo --------------------
    case "obtener_num_total_PApoyo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(p_apoyo) as numPApoyo FROM poa_paid_uniformes_adaptado WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND tipo = 'Indumentaria Personal Apoyo' AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Valor total P Apoyo --------------------
    case "obtener_valor_total_PApoyo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as valorTotal FROM poa_paid_uniformes_adaptado WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND tipo = 'Indumentaria Personal Apoyo' AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Valor num deportistas pasajes aereos --------------------
    case "obtener_num_deportistas_pasaje_aereo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(n_deportistas) as numDeportistas FROM poa_paid_pasajes_aereos WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Valor num deportistas pasajes aereos --------------------
    case "obtener_num_entrenadores_pasaje_aereo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(n_entrenadores) as numEntrenadores FROM poa_paid_pasajes_aereos WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Valor num Total personas pasajes aereos --------------------
    case "obtener_num_total_personas_pasaje_aereo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(tota_personas) as numPersoans FROM poa_paid_pasajes_aereos WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

     //------------------------------ Valor Total pasajes aereos --------------------
    case "obtener_valor_total_pasaje_aereo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as valorTotal FROM poa_paid_pasajes_aereos WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND identificador = 1 AND id_componente = '$idComponente' AND id_rubro = '$idRubro';");
      $jason['informacion']=$informacion;
    break;

    //------------------------------ Valor Total MATRICES CONJUNTAS PAID --------------------
    case "obtener_valor_total_matrices_desarrollo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT SUM(valorTotal) as TotalPlanificado, b.montos 
      FROM (
        SELECT valorTotal FROM poa_paid_medallas_convencional where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idRubro='$idRubro' and idComponente='$idComponente'
        UNION ALL
        SELECT valorTotal FROM poa_paid_matrices_juegos_nacionales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idRubro='$idRubro' and idComponente='$idComponente'
        UNION ALL
        SELECT valorTotal FROM poa_paid_seguros where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idRubro='$idRubro' and idComponente='$idComponente'
        UNION ALL
        SELECT valorTotal FROM poa_paid_transporte where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idRubro='$idRubro' and idComponente='$idComponente'
        UNION ALL
        SELECT valorTotal FROM poa_paid_bono_deportivo where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and idRubro='$idRubro' and idComponente='$idComponente'

        UNION ALL
	      SELECT valorTotal FROM poa_paid_personal_tecnico_convensional where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and id_rubro='$idRubro' and id_componente='$idComponente'

        UNION ALL
        SELECT valor_total FROM poa_paid_juegos_nacionales_hosp_alim_hidr where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and id_rubro='$idRubro' and id_componente='$idComponente'

        UNION ALL
        SELECT valorTotal FROM poa_paid_pasajes_aereos where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and id_rubro='$idRubro' and id_componente='$idComponente'

        UNION ALL
        SELECT valorTotal FROM poa_paid_uniformes_adaptado where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and id_rubro='$idRubro' and id_componente='$idComponente'

      ) as CombinedTable INNER JOIN poa_paid_asignacion AS b WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos' and b.estado='A' and b.idRubros='$idRubro' and b.idComponentes='$idComponente' ");

      $jason['informacion']=$informacion;
    break;

    //------------------------------ Valor Total MATRICES CONJUNTAS PAID --------------------
    case "obtener_valor_total_general_desarrollo":
      $informacion=$objeto->getObtenerInformacionGeneral(" SELECT SUM(valorTotal) as TotalPlanificado, b.monto
      FROM (
        SELECT valorTotal FROM poa_paid_medallas_convencional where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' and identificador='$identificador'
        UNION ALL
        SELECT valorTotal FROM poa_paid_matrices_juegos_nacionales where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'
        UNION ALL
        SELECT valorTotal FROM poa_paid_seguros where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'
        UNION ALL
        SELECT valorTotal FROM poa_paid_transporte where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'
        UNION ALL
        SELECT valorTotal FROM poa_paid_bono_deportivo where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'

        UNION ALL
	      SELECT valorTotal FROM poa_paid_personal_tecnico_convensional where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'

        UNION ALL
        SELECT valor_Total FROM poa_paid_juegos_nacionales_hosp_alim_hidr where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'   and identificador='$identificador'

        UNION ALL
        SELECT valorTotal FROM poa_paid_pasajes_aereos where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'  and identificador='$identificador'

        UNION ALL
        SELECT valorTotal FROM poa_paid_uniformes_adaptado where idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos'   and identificador='$identificador'

      ) as CombinedTable INNER JOIN poa_paid_asignacion_dos AS b WHERE b.idOrganismo='$idOrganismoSession' AND b.perioIngreso='$aniosPeriodos__ingesos' and b.estado='A' and b.valor__comparativo='$identificador'");

      $jason['informacion']=$informacion;
    break;
    //------------------------------ selector Evento --------------------
    case "listar_evento_desarrollo":
      $informacion=$objeto->getObtenerInformacionGeneral("SELECT idEvento, nombre from poa_paid_eventos_desarrollo WHERE idOrganismo = '$idOrganismoSession' AND perioIngreso = '$aniosPeriodos__ingesos' AND id_componente = '$idComponentes' AND id_rubro = '$idRubros';");
      $jason['informacion']=$informacion;
    break;

    


   



    }
    echo json_encode($jason);






