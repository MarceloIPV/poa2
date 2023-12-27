<?php

    extract($_POST);


    define('CONTROLADOR7', '../../conexion/');
    
    require_once CONTROLADOR7 . 'conexion.php';
    
    require_once "../../config/config2.php";


    date_default_timezone_set("America/Guayaquil");

        $anio = date('Y');

        //$anio='2022';

        $fecha_actual = date('Y-m-d');

        $hora_actual = date('H:i:s');

        /*=====  End of Parametros Iniciales  ======*/

        session_start();

        $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];


        $objeto = new usuarioAcciones();

        $conexionRecuperada = new conexion();
        $conexionEstablecida = $conexionRecuperada->cConexion();

        $idOrganismoSession = $_SESSION["idOrganismoSession"];

    switch($indicador)
    {
        case 1:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.idActividades,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreActividades, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS  nombreActividades FROM poa_poainicial AS z INNER JOIN poa_programacion_financiera AS a ON a.idActividad=z.idActividad  INNER JOIN poa_actividades AS b ON z.idActividad=b.idActividades  WHERE z.idOrganismo='$idOrganismoSession' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (a.modifica IS NULL OR a.modifica='A' OR a.modifica='E' AND z.idOrganismo='$idOrganismoSession' AND z.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos')  GROUP BY z.idActividad;");
    
			$jason['informacionSeleccionada']=$resultado;

        break;
        
        case 2:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,d.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(d.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem,a.modifica FROM poa_programacion_financiera AS a INNER JOIN poa_actividades AS b ON a.idActividad=b.idActividades INNER JOIN poa_documentofinal AS c ON c.idOrganismo=a.idOrganismo INNER JOIN poa_item AS d ON d.idItem=a.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' GROUP BY d.nombreItem;");


            $jason['informacionSeleccionada']=$resultado;
        break;

        case 3:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.itemPreesupuestario FROM poa_programacion_financiera AS a INNER JOIN poa_item AS b ON a.idItem=b.idItem WHERE a.idProgramacionFinanciera='$idItem' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND a.idOrganismo='$idOrganismoSession' LIMIT 1;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 4:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.idPda,b.nombreEvento AS nombreEvento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreEvento2  FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL OR b.modifica='E' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession') AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession'  group by b.nombreEvento asc;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 5:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.idPda,b.nombreEvento AS nombreEvento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreEvento, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'ÁƒÂ³','ó'),'ÁƒÂ¡','á'),'ÁƒÂ­','í') AS nombreEvento2  FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera 
			WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL OR b.modifica='E' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession') AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession'  group by b.nombreEvento asc;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 6:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.idMantenimiento,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreInfras, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreInfras, nombreInfras AS infrasNormal FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND (b.modifica='A' OR b.modifica IS NULL  AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos') AND a.idActividad='$idActividad' and a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' group by nombreInfras asc;");

            $jason['informacionSeleccionada']=$resultado;

        break;

        case 7:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,e.itemPreesupuestario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_actividades AS c ON a.idActividad=c.idActividades INNER JOIN poa_documentofinal AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_item AS e ON e.idItem=a.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND b.nombreEvento='$evento' GROUP BY a.idItem;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 8:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreItem, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_item AS c ON c.idItem=a.idItem INNER JOIN poa_actividades AS d ON d.idActividades=a.idActividad INNER JOIN poa_item_actividad AS l ON (l.idItem=c.idItem AND l.idActividad=d.idActividades) WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND b.nombreInfras='$evento' GROUP BY a.idItem;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 9:

            if ($idActividad==2) {

                $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_mantenimiento AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idProgramacionFinanciera='$idProgramacion' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND b.nombreInfras='$nombreInfra'  LIMIT 1;");

            }else if($idActividad=="sueldosH"){
                $resultado= $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_honorarios2022 AS b ON a.idOrganismo=b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession'  AND a.idProgramacionFinanciera='$idProgramacion' LIMIT 1;");

            }else if($idActividad==3 || $idActividad==5 || $idActividad==6 || $idActividad==7){

                $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE a.idProgramacionFinanciera='$idProgramacion' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad' AND b.nombreEvento='$nombreEvento' LIMIT 1;");

            }else{

                $resultado = $objeto->getObtenerInformacionGeneral("SELECT a.enero AS '0',a.febrero AS '1',a.marzo AS '2',a.abril AS '3',a.mayo AS '4',a.junio AS '5',a.julio AS '6',a.agosto AS '7',a.septiembre AS '8',a.octubre AS '9',a.noviembre AS '10',a.diciembre AS '11' FROM poa_programacion_financiera AS a WHERE a.idProgramacionFinanciera='$idProgramacion' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idActividad='$idActividad'  LIMIT 1;");
                
            }

            // $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero  AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_actividades AS c ON a.idActividad=c.idActividades INNER JOIN poa_documentofinal AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_item AS e ON e.idItem=a.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.idProgramacionFinanciera='$idProgramacion'  GROUP BY a.idItem;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 10:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero  AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_actividades AS c ON a.idActividad=c.idActividades INNER JOIN poa_documentofinal AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_item AS e ON e.idItem=a.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.idProgramacionFinanciera='$idProgramacion'  GROUP BY a.idItem;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 11:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT b.enero AS '0',b.febrero  AS '1',b.marzo AS '2',b.abril AS '3',b.mayo AS '4',b.junio AS '5',b.julio AS '6',b.agosto AS '7',b.septiembre AS '8',b.octubre AS '9',b.noviembre AS '10',b.diciembre AS '11' FROM poa_programacion_financiera AS a INNER JOIN poa_actdeportivas AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera INNER JOIN poa_actividades AS c ON a.idActividad=c.idActividades INNER JOIN poa_documentofinal AS d ON d.idOrganismo=a.idOrganismo INNER JOIN poa_item AS e ON e.idItem=a.idItem WHERE a.idOrganismo='$idOrganismoSession' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.idProgramacionFinanciera='$idProgramacion'  GROUP BY a.idItem;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 12:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idItem FROM poa_programacion_financiera WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' AND idActividad='$idActividad';");

            $jason['informacionSeleccionada']=$resultado;
        break;
        case 13:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idSueldos,nombres FROM poa_sueldossalarios2022 WHERE IdOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

            $jason['informacionSeleccionada']=$resultado;
        break;
        case 14:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idSueldos AS idHonorarios,cedula,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombres, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombres,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(cargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS cargo,total,idOrganismo,fecha,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(tipoCargo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS tipoCargo,idActividad,modifica,perioIngreso,tiempoTrabajo,mensualizaTercera,menusalizaCuarta AS mensualizaCuarta,sueldoSalario,aportePatronal,decimoTercera,decimoCuarta,fondosReserva,(SELECT a1.regimen FROM poa_organismo AS a1 WHERE a1.idOrganismo=poa_sueldossalarios2022.idOrganismo LIMIT 1) AS regimen FROM poa_sueldossalarios2022 WHERE idSueldos='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY nombres;");

            $resultado2 = $objeto->getObtenerInformacionGeneral("SELECT enero AS '0',febrero AS '1',marzo AS '2',abril AS '3',mayo AS '4',junio AS '5',julio AS '6',agosto AS '7',septiembre AS '8',octubre AS '9',noviembre AS '10',diciembre AS '11' FROM poa_sueldossalarios2022 WHERE idSueldos='$idSueldos' AND perioIngreso='$aniosPeriodos__ingesos';");

            $jason['informacionSeleccionada']=$resultado;
            $jason['meses']=$resultado2;
        break;

        case 15:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idHonorarios,nombres FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' ;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 15:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idHonorarios,nombres FROM poa_honorarios2022 WHERE idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos' ;");

            $jason['informacionSeleccionada']=$resultado;
        break;
        case 16:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT a.idProgramacionFinanciera,c.nombreItem FROM poa_programacion_financiera AS a INNER JOIN poa_honorarios2022 AS b ON a.idOrganismo=b.idOrganismo AND a.idActividad=b.idActividad INNER JOIN poa_item AS c On a.idItem=c.idItem WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismoSession' AND b.idHonorarios='$idHonorarios' AND a.idActividad='$idActividad' GROUP BY b.idHonorarios;");

            $jason['informacionSeleccionada']=$resultado;
        break;

        case 17:
            $resultado = $objeto->getObtenerInformacionGeneral("SELECT idActividad,idItemProF AS idItem,totalIncrementoEje AS totalI,nombreEvento,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,justificacion FROM poa_incrementos_tramites WHERE idTramiteIncremento ='$idTramite' AND idOrganismo='$idOrganismoSession' AND perioIngreso='$aniosPeriodos__ingesos';");

            $jason['informacionSeleccionada']=$resultado;
        break;

    }
            
    echo json_encode($jason);


	
