<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anioActual = '2022';?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $informacionSeleccionada__remanentes=$objetoInformacion->getObtenerInformacionGeneral("SELECT idRemanentes,monto__incrementoRemantes,archivo__saldoEstados,monto__autogestion FROM poa_remanentes_monto_asignacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."'  ORDER BY idRemanentes DESC LIMIT 1;");?>

<?php $inversionRealizadaOrganismo__deportivo=$objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalTotales) AS sumaTotales FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' GROUP BY idOrganismo;");?>


<?php $inversionRealizadaOrganismo__deportivo__dos=$objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalTotales) AS sumaTotales FROM poa_programacion_financiera_dos WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' GROUP BY idOrganismo;");?>

<?php $primerTrimestre__sumas=$objetoInformacion->getObtenerInformacionGeneral("SELECT IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='primerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) AS ejecutado FROM poa_seguimiento_reporteria AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.fecha)='$anioActual' GROUP BY a.idOrganismo;");?>

<?php $segundoTrimestre__sumas=$objetoInformacion->getObtenerInformacionGeneral("SELECT IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='segundoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) AS ejecutado FROM poa_seguimiento_reporteria AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.fecha)='$anioActual' GROUP BY a.idOrganismo;");?>


<?php $tercerTrimestre__sumas=$objetoInformacion->getObtenerInformacionGeneral("SELECT IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='tercerTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) AS ejecutado FROM poa_seguimiento_reporteria AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.fecha)='$anioActual' GROUP BY a.idOrganismo");?>


<?php $cuartoTrimestre__sumas=$objetoInformacion->getObtenerInformacionGeneral("SELECT IFNULL((SELECT ROUND(IFNULL(SUM(a1.sueldoSalarioEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.aporteIessEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoTerceroEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.decimoCuartoEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.fondosReservasEjecutado),0),2) FROM poa_seguimiento_sueldos_salarios AS a1 INNER JOIN poa_sueldossalarios2022 AS b ON a1.idSueldosSalarios=b.idSueldos WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.periodo='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(IFNULL(SUM(a1.mensualEjecutado),0),2) FROM poa_seguimiento_honorarios AS a1 INNER JOIN poa_honorarios2022 AS b ON a1.idHonorarios=b.idHonorarios WHERE a1.idOrganismo=a.idOrganismo AND b.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY b.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_seguimiento_administrativo AS a1 INNER JOIN poa_actividadesadministrativas AS b ON a1.idAdministrativo=b.idActividadAd INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_mantenimiento AS a1 INNER JOIN poa_mantenimiento AS b ON a1.idAdministrativo=b.idMantenimiento INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_competencias AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_capacitacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_recreativos AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) + IFNULL((SELECT ROUND(SUM(a1.mensualEjecutado),2) FROM poa_segimiento_implementacion AS a1 INNER JOIN poa_actdeportivas AS b ON a1.idAdministrativo=b.idPda INNER JOIN poa_programacion_financiera AS c ON b.idProgramacionFinanciera=c.idProgramacionFinanciera INNER JOIN poa_item AS d ON d.idItem=c.idItem WHERE a1.idOrganismo=a.idOrganismo AND c.idActividad=a.idActividad AND a1.trimestre='cuartoTrimestre' AND YEAR(a1.fecha)='$anioActual' GROUP BY c.idActividad),0) AS ejecutado FROM poa_seguimiento_reporteria AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(a.fecha)='$anioActual' GROUP BY a.idOrganismo");?>


    <form id="formulario__remanentes" class="content-wrapper d d-flex flex-column align-items-center"  action='modelosBd/pdf/pdf.modelo.php' method='post'>

    	<input type='hidden' class='tipoPdf' id='tipoPdf' name='tipoPdf' value='remanentes__organismos'/>

    	<input type='hidden' class='tipoPdf' id='idOrganismo' name='idOrganismo' value='<?=$informacionObjeto[0][idOrganismo]?>'/>

        <div class="Opcion">
            <p>Transferencias al OD (valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución)</p>
            <br>
            <input id="inp1" type="text" class="numeros__mayor__cero"  name="inp1" value="<?=$informacionSeleccionada__remanentes[0][monto__incrementoRemantes]?>" readonly="">
        </div>

        </br>

        <div class="Opcion">

        	<p style="background: #121B69;">

        		Saldo Estado de Cuenta al 31 de  Diciembre

        	</p>


			<input type="file" id="examinar__documen_to" name="examinar__documen_to" accept="application/pdf"/>


        </div>


        </br>

        <div class="Opcion">

        	<p style="background: #121B69;">

        		Saldo Estado de Cuenta al 31 de  Diciembre

        	</p>


			<input type="text" id="saldo__cuenta31" name="saldo__cuenta31" class="ancho__total__input solo__numero__montos cambio__de__numero__f numeros__mayor__cero"  style="color:black!important;" value="0" />


        </div>


        </br>

         <div class="Opcion">

        	<p>

        		Monto de autogestión que se registra en el estado de cuenta

        	</p>

			<input type="text" id="monto__autogestion__cuentas" name="monto__autogestion__cuentas" class="ancho__total__input solo__numero__montos cambio__de__numero__f numeros__mayor__cero" style="color:black!important;" value="0" />

        </div>

        </br>

        <div class="Opcion__doces">

        	REMANENTE POA

        </div>

        <br>

         <div class="Opcion">

        	<p>

        		MONTO POA (Aprobado inicial + Incrementos)

        	</p>

        	<?php if (!empty($inversionRealizadaOrganismo__deportivo__dos[0][sumaTotales])): ?>

        		<input type="text" id="monto__incrementosOriginal" name="monto__incrementosOriginal" class="ancho__total__input solo__numero__montos cambio__de__numero__f numeros__mayor__cero" style="color:black!important;" value="<?=ROUND($inversionRealizadaOrganismo__deportivo__dos[0][sumaTotales],2)?>" readonly=""/>

        		
        	<?php else: ?>
        		
        		<input type="text" id="monto__incrementosOriginal" name="monto__incrementosOriginal" class="ancho__total__input solo__numero__montos cambio__de__numero__f numeros__mayor__cero" style="color:black!important;" value="<?=ROUND($inversionRealizadaOrganismo__deportivo[0][sumaTotales],2)?>" readonly=""/>


        	<?php endif ?>

			
        </div>

        <br>

        <div class="Opcion">
            <p>MONTO EJECUTADO</p>
            </br>
            <input type="text" id="montoEje__remanentes" class="numeros__mayor__cero" name="montoEje__remanentes" value="<?php echo floatval($primerTrimestre__sumas[0][ejecutado]) + floatval($segundoTrimestre__sumas[0][ejecutado]) + floatval($tercerTrimestre__sumas[0][ejecutado]) + floatval($cuartoTrimestre__sumas[0][ejecutado]);?>" readonly>
            </br>
            <a id="mas">
                <i class="fas fa-plus enlaces__blancos"></i>
            </a>
            <a id="menos">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
            
        </div>
        <div id="monto">
            <table class="table table-hover">
                <thead>
                    <th class="bg-warning">Trimestre</th>
                    <th class="bg-warning">Monto</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Primer trimestre</td>
                        <td style="display: flex;">
                           $ <input type="text" id="ejecutado__primer" name="ejecutado__primer" class="nuevos__enlazados__realizados solo__numero__montos cambio__de__numero__f sumar__clases__remanentes" value="<?= round(floatval($primerTrimestre__sumas[0][ejecutado]),2)?>" readonly="" style="border:none!important;"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Segundo trimestre</td>
                        <td style="display: flex;">
                           $ <input type="text" id="ejecutado__segundo" name="ejecutado__segundo" class="nuevos__enlazados__realizados solo__numero__montos cambio__de__numero__f sumar__clases__remanentes" value="<?= round(floatval($segundoTrimestre__sumas[0][ejecutado]),2)?>" readonly="" style="border:none!important;"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Tercer trimestre</td>
                        <td style="display: flex;">
                           $ <input type="text" id="ejecutado__tercero" name="ejecutado__tercero" class="nuevos__enlazados__realizados solo__numero__montos cambio__de__numero__f sumar__clases__remanentes" value="<?= round(floatval($tercerTrimestre__sumas[0][ejecutado]),2)?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Cuarto trimestre</td>
                        <td style="display: flex;">
                           $ <input type="text" id="ejecutado__cuarto" name="ejecutado__cuarto" class="nuevos__enlazados__realizados solo__numero__montos cambio__de__numero__f sumar__clases__remanentes" value="<?= round(floatval($cuartoTrimestre__sumas[0][ejecutado]),2)?>"/> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        </br>

        <div class="Opcion">
            <p>CUENTAS POR PAGAR</p>
            </br>
            <input type="text" id="cuentasPagar__remanentes" class="numeros__mayor__cero" name="cuentasPagar__remanentes" value="0" readonly>
            </br>
            <a id="mas2">
                <i class="fas fa-plus enlaces__blancos"></i>
            </a>
            <a id="menos2">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
        </div>

        <div id="cuentas" class="row">

            <table class="table table-hover">

                <thead>
                     <tr>
                        <td colspan="2">
                            <select id="actividades__seleccionadas" name="actividades__seleccionadas" class="ancho__total__input__selects"></select>
                        </td>
                        <td>
                            <select id="items__seleccionados" name="items__seleccionados" class="ancho__total__input__selects"></select>
                        </td>
                        <td>
                            <a id="agregar__nuevosAc" name="agregar__nuevosAc" class="btn btn-primary">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-warning" align="center">Actividad (de acuerdo al POA aprobado)</th>
                        <th class="bg-warning" align="center">Item (Autocompleta con la elección del item)</th>
                        <th class="bg-warning" align="center">Descripción del Ítem</th>
                        <th class="bg-warning" align="center">Monto asignado</th>
                        <th class="bg-warning" align="center">Monto</th>
                        <th class="bg-warning" align="center">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="body__remanentes__pagar"></tbody>

            </table>

        </div>

        </br>
        <div class="Opcion">
            <p>REMANENTE POA <?= $anioActual ?></p>
            </br>
            <input type="text" id="remanentePoa__remanentes" class="numeros__mayor__cero" name="remanentePoa__remanentes" value="0,00" readonly>
        </div>
        
        </br>

        <div class="Opcion">
            <p>REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR</p>
            </br>
            <input type="text" id="anios__anteriores" name="añosAnteriores" value="0" readonly>
            </br>
            <a id="mas3">
                <i class="fas fa-plus enlaces__blancos" ></i>
            </a>
            <a id="menos3">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
        </div>
        <div id="añosAnteriores">
            <table class="table table-hover">
                <thead>

                	<tr>
                        <td align="center" colspan="3">
                            <a id="agregar__anios__anteriores__agregados" name="agregar__anios__anteriores__agregados" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
	                    <th class="bg-warning" align="center">Año</th>
	                    <th class="bg-warning" align="center">Monto</th>
	                    <th class="bg-warning" align="center">Agregar/Eliminar</th>
                	</tr>
                </thead>
                <tbody class="agregar__anios__anteriores">

                </tbody>
            </table>
        </div>

         </br>

        <div class="Opcion__doces">

        	REMANENTE PAID

        </div>

         </br>

        <div class="Opcion">
            <p>MONTO REMANENTE PAID</p>
            </br>
            <input type="text" id="remanentesPaid" name="remanentesPaid"  clas="numeros__mayor__cero" value="0" readonly="">
            </br>
            <a id="mas2Paid">
                <i class="fas fa-plus enlaces__blancos"></i>
            </a>
            <a id="menos2Paid">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
        </div>

        <div id="cuentasPaid">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <td align="center" colspan="5" align="center">
                            <a id="agregar__anios__anteriores__agregados__paids" name="agregar__anios__anteriores__agregados__paids" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </td>
            
                    </tr>       

                    <tr>
                        <th class="bg-warning" align="center">Año</th>
                        <th class="bg-warning" align="center">Instrumento de Asignación (Convenio / Acuerdo /  Proyecto u otros)</th>
                        <th class="bg-warning" align="center">Nombre del Proyecto</th>
                        <th class="bg-warning" align="center">Valor</th>
                        <th class="bg-warning" align="center">Agregar/Eliminar</th>
                    </tr>
                </thead>
                <tbody class="body__remanentes__paid">
         	


                </tbody>

            </table>

        </div> 


        <div class="Opcion__doces">

        	RESUMEN

        </div>

        <div class="Opcion">
            <p>RESUMEN</p>
            </br>
            <a id="mas3PaidResumen">
                <i class="fas fa-plus enlaces__blancos"></i>
            </a>
            <a id="menos3PaidResumen">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
        </div>

        <div id="cuentasResumen">

        	<div class="d d-flex">

	            <table class="table table-hover" style="width: 50%;">

	                <thead>   

	                    <tr>
	                        <th class="bg-warning" align="center" colspan="2">VERIFICACIÓN UNO</th>
	                    </tr>
	                </thead>

	                <tbody>
	         	
	                	<tr>

	                		<td>

	                			Transferencias al OD (valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución)

	                		</td>
	                		<td>

	                			<input id="monto__resumen" class="ancho__total__input" type="text" style="border:none;"  name="monto__resumen" value="<?=$informacionSeleccionada__remanentes[0][monto__incrementoRemantes]?>" readonly="">

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Monto ejecutado

	                		</td>
	                		<td>

	                			<input type="text" id="ejecutado__resumen" class="ancho__total__input"  style="border:none;"  name="ejecutado__resumen" value="<?php echo floatval($primerTrimestre__sumas[0][ejecutado]) + floatval($segundoTrimestre__sumas[0][ejecutado]) + floatval($tercerTrimestre__sumas[0][ejecutado]) + floatval($cuartoTrimestre__sumas[0][ejecutado]);?>" readonly="" >

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			<input type="text" id="cuentas__pagar__resumen" class="ancho__total__input"  style="border:none;"  name="cuentas__pagar__resumen" readonly="" value="0">

	                		</td>

	                	</tr>


	                	<tr>

	                		<td>

	                			Remanente POA <?=$anioActual?> 	

	                		</td>
	                		<td>

	                			<input type="text" id="remanentes__resumen" class="ancho__total__input"  style="border:none;"  name="remanentes__resumen" readonly="">

	                		</td>

	                	</tr>

	                </tbody>

	            </table>

	            <table class="table table-hover" style="width: 50%;">

	                <thead>   

	                    <tr>
	                        <th class="bg-warning" align="center" colspan="2">VERIFICACIÓN DOS</th>
	                    </tr>
	                </thead>

	                <tbody>
	         	
	                	<tr>

	                		<td>

	                			Estado de Cuenta al 31 de  Diciembre

	                		</td>
	                		<td>

	                			<input type="text"  id="cuenta__31__resumen__2" class="ancho__total__input" style="border:none;"  name="cuenta__31__resumen__2" value="0"  readonly="">

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Cuentas por pagar

	                		</td>
	                		<td>

	                			<input type="text" id="cuentas__por__pagar__resumen__2" class="ancho__total__input"  style="border:none;" value="0"  name="cuentas__por__pagar__resumen__2"  readonly="" >

	                		</td>

	                	</tr>


	                	<tr>

	                		<td>

	                			Autogestión

	                		</td>
	                		<td>

	                			<input type="text" id="autogestion__resumen__2" class="ancho__total__input"  style="border:none;" value="0"  name="autogestion__resumen__2"  readonly="" >

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			PAID 

	                		</td>
	                		<td>

	                			<input type="text" id="paid__resumen__2" class="ancho__total__input"  style="border:none;"  name="paid__resumen__2" readonly="" value="0">

	                		</td>

	                	</tr>


	                	<tr>

	                		<td>

	                			Remanante años anteriores del POA

	                		</td>
	                		<td>

	                			<input type="text" id="remanentes__anios__anteriores__resumen__2" class="ancho__total__input"  style="border:none;"  name="remanentes__anios__anteriores__resumen__2" readonly="" value="0">

	                		</td>

	                	</tr>

	                	<tr>

	                		<td>

	                			Remanente POA <?=$anioActual?> 

	                		</td>
	                		<td>

	                			<input type="text" id="remanentes__poa__resumen__2" class="ancho__total__input"  style="border:none;"  name="remanentes__poa__resumen__2" readonly="" value="0">

	                		</td>

	                	</tr>


	                </tbody>

	            </table>

            </div>

        </div> 

        <div class="Opcion__doces">

        	MONTO A DESCONTAR ASIGNACIONES FUTURA

        </div>

        <div class="Opcion">
            <p>MONTO A DESCONTAR ASIGNACIONES FUTURAS</p>
            </br>
            	<input type="text" id="asignaciones__futuras" name="asignaciones__futuras" value="0" readonly="">
            </br>
            <a id="mas3PaidFuturas">
                <i class="fas fa-plus enlaces__blancos"></i>
            </a>
            <a id="menos3PaidFuturas">
                <i class="fas fa-minus enlaces__blancos"></i>
            </a>
        </div>

        <div id="cuentasFuturas">

            <table class="table table-hover">

                <tbody>

         		    <tr>

	                	<td>

	                		REMANENTE POA <?=$anioActual?> 

	                	</td>
	                	<td>

	                		<input type="text" id="remanentes__poa__resumen__futuro" class="ancho__total__input"  style="border:none;"  name="remanentes__poa__resumen__futuro" readonly="" value="0">

	                	</td>

	            	</tr>

         		    <tr>

	                	<td>

	                		REMANENTES POA AÑOS ANTERIORES PENDIENTES DE DESCONTAR

	                	</td>
	                	<td>

	                		<input type="text" id="pendientes__descontar__anios__anteriores" class="ancho__total__input"  style="border:none;"  name="pendientes__descontar__anios__anteriores" readonly="" value="0">

	                	</td>

	            	</tr>


                </tbody>

            </table>

        </div> 

        <div style="width: 100%" class="text-center d dflex">
        	
        	 <button type="submit" class="btn btn-warning" id="generadorPdfRemanentes">
        		Generar pdf
        	 </button>

        	<a type="submit" class="btn btn-primary" id="guardarInformacion__remanentes">
        		Guardar
        	 </a>

        </div>

    </form>
