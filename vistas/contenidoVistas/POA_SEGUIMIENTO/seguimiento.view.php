<?php $objetoInformacion = new usuarioAcciones(); 
$componentesPaid= new componentesPaid();?>

<?php $componentes = new componentes(); ?>

<?php $componentesTablas = new componentesTablas(); ?>

<?php $anioActual = date('Y'); ?>

<?php session_start(); ?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>

<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $idOrganismo__v = $informacionObjeto[0][idOrganismo]; ?>

<?php $idOrganismos__ejecutados = $informacionObjeto[0][idOrganismo]; ?>

<!--=====================================
=            Bloqueos juegos            =
======================================-->

<?php $bloqueosSeguimientoI = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo AS a1 WHERE a1.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;"); ?>

<?php $bloqueosSeguimientoII = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_2 AS a1 WHERE a1.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;"); ?>


<?php $bloqueosSeguimientoIII = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_3 AS a1 WHERE a1.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;"); ?>


<?php $bloqueosSeguimientoIV = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_4 AS a1 WHERE a1.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;"); ?>


<!--====  End of Bloqueos juegos  ====-->

<!--========================================
=            Control de cambios            =
=========================================-->

<?php $controlCambiosI = $objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='primerTrimestre' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;"); ?>

<?php $controlCambiosII = $objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='segundoTrimestre' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;"); ?>

<?php $controlCambiosIII = $objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='tercerTrimestre' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;"); ?>

<?php $controlCambiosIV = $objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='cuartoTrimestre' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;"); ?>

<!--====  End of Control de cambios  ====-->



<?php $tipo__deOrganismos = $objetoInformacion->getObtenerInformacionGeneral("SELECT d.nombreTipo FROM poa_organismo AS a INNER JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismos__ejecutados' AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%');"); ?>

<?php $actividadesSeleccionadas = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_sueldossalarios2022 AS a WHERE a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $actividadesSeleccionadas__honorarios = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_honorarios2022 AS a WHERE a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $tipoTrimestre = $objetoInformacion->getObtenerInformacionGeneral("SELECT tipoTrimestre FROM poa_trimestrales WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos'  ORDER BY idEnviadorTrimestres DESC;"); ?>

<?php $actividadesSeleccionadas__actividadesAdmi = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>


<?php $actividadesSeleccionadas__mantenimientoAdmin = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idMantenimiento DESC;"); ?>

<?php $capacitacion__3 = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='3' AND b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $competencia__5 = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='5' AND b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>


<?php $recreativas__6 = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='6' AND b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>


<?php $recreativas__7 = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='7' AND b.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos';"); ?>

<div class="content-wrapper d d-flex flex-column align-items-center" >



	<div class="contenidos__formularios__enviados2023">


		<input type="hidden" id="contadorIndicador" name="contadorIndicador" value="0">
		<input type="hidden" id="contadorIndicador2" name="contadorIndicador2" value="0">

		<input type="hidden" id="datosHonorarios" name="contadorIndicador2" >

		<input type="hidden" class="input-circulo" readonly style="width: 30px; height: 30px; border-radius: 50%; border: none;padding: 10px;text-align: center; background:red">

		<input type="hidden" id="valorAsignado__meses" name="valorAsignado__meses" />


				<?php  
				// echo "<br>EL EL PUEBA POA";
				// 	  echo ("<br>--tipoTrimestre:".$tipoTrimestre[0][tipoTrimestre]) ;
				// 	  echo ("<br>--bloqueosSeguimientoIV:".$bloqueosSeguimientoIV[0][estado]) ;
				// 	  echo ("<br>--controlCambiosI:".$controlCambiosI[0][idSeguimientoCambio]) ;
				// 	  echo ("<br>--bloqueosSeguimientoI:".$bloqueosSeguimientoI[0][estado]) ;
				// 	  echo ("<br>--controlCambiosI:".$controlCambiosI[0][idSeguimientoCambio]) ;
				?>
				<?php  
					//   echo ("<br>--tipoTrimestre:".$tipoTrimestre[0][tipoTrimestre]) ;
					//   echo ("<br>--bloqueosSeguimientoI:".$bloqueosSeguimientoI[0][estado]) ;
					//   echo ("<br>--bloqueosSeguimientoI:".$bloqueosSeguimientoII[0][estado]) ;
					//   echo ("<br>--bloqueosSeguimientoII:".$bloqueosSeguimientoII[0][estado]) ;
					//   echo ("<br>--controlCambiosII:".$controlCambiosII[0][idSeguimientoCambio]) ;
					//   echo ("<br>--controlCambiosIII:".$controlCambiosIII[0][idSeguimientoCambio]) ;
					//   echo ("<br>--controlCambiosIV:".$controlCambiosIV[0][idSeguimientoCambio]) ;
				?>


	

	<?php if ($tipoTrimestre[0][tipoTrimestre] == "cuartoTrimestre" && empty($controlCambiosI[0][idSeguimientoCambio]) && empty($controlCambiosII[0][idSeguimientoCambio]) && empty($controlCambiosIII[0][idSeguimientoCambio]) && empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>
			<div >
			<center><img src="././images/paidpoa.PNG" width="100px"></center>
				</div>
				<br><br><br>
			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center mt-4" style='padding-right:9%;'> 
		
				<h1><bold>USTED HA CERRADO CON ÉXITO EL PERÍODO FISCAL <?php echo $aniosPeriodos__ingesos?></bold></h1>
				</div>

			<?php }else {?>

				<?php if (
			(empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) 
			&& (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])
		) 
		{ ?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="primerTrimestre" />

			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center mt-4" style='padding-right:9%;'>
			
				PRIMER TRIMESTRE 

				<!-- <a class="btn btn-warning" id="finalizarSeguimiento">Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a> -->

			</div>

			<?php } else if (
				($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) 
				&& (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  
				&& $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" 
				|| !empty($bloqueosSeguimientoII[0][estado])  
				|| !empty($controlCambiosII[0][idSeguimientoCambio])
			) 
			
			{ ?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="segundoTrimestre" />
			

			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4" style='padding-right:9%;'>

			
				SEGUNDO TRIMESTRE

				

			</div>
	

			<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) || !empty($controlCambiosIII[0][idSeguimientoCambio])) { ?>

				<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="tercerTrimestre" />

				<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4" style='padding-right:11%;'>

					TERCER TRIMESTRE

			</div>

			<?php } else if ($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][estado] )|| !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="cuartoTrimestre" />

			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4" style='padding-right:9%;'>

				CUARTO TRIMESTRE

			</div>

			<?php } ?>

		<div class="contenedor__seguiiento__sin">
			
		</div>

		<div class="contenedor__seguimiento__sin">

			<section class="content row d d-flex justify-content-left align-items-center mt-4">

				<?= $componentes->getLinksConfiguracion__parametros(["autogestionSM2023"], ["Autogestión"], "idAutogestionS", ["autogestionME"], 'idAutogestionME'); ?>

				<?php if (!empty($actividadesSeleccionadas__actividadesAdmi[0][idActividadAd])) : ?>
					<?= $componentes->getLinksConfiguracion__parametros__ver(["indicadoresM2023"], ["Indicadores"], "idIndicadores2023", ["indicadoresME"], 'idIndicadoresME2023'); ?>
				<?php else: ?>
					<?= $componentes->getLinksConfiguracion__parametros__ver(["indicadoresM_estadoCuenta2023"], ["Indicadores"], "idIndicadores_estadoCuenta2023", ["indicadoresMEindicadoresM_estadoCuenta"], 'idIndicadoresME_estado_cuenta2023'); ?>
				<?php endif ?>
				

				<?php if (!empty($actividadesSeleccionadas__actividadesAdmi[0][idActividadAd])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["administrativoSM2023"], ["001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria"], "idAdministrativoS2023", ["administrativoME"], 'idAdministrativoME2023'); ?>

				<?php endif ?>


				<?php if (!empty($actividadesSeleccionadas__mantenimientoAdmin[0][idMantenimiento])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["mantenimientoSM2023"], ["002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria"], "idMantenimientoS2023", ["mantenimientoME"], 'idMantenimientoME2023'); ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["mantenimientoTecnicoSM2023"], ["002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica"], "idMantenimientoTecnicoS2023", ["mantenimientoTecnicoME"], 'idMantenimientoTecnicoME2023'); ?>

				<?php endif ?>

				<?php if (!empty($capacitacion__3[0][idPda])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["capacitacionSM2023"], ["003 - Capacitación deportiva o de recreación - Ejecución presupuestaria"], "idCapacitacionS2023", ["cpacitacionME"], 'idCapacitacionME2023'); ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["capacitacionTécnicoSM2023"], ["003 - Capacitación deportiva o de recreación - Información técnica"], "idCapacitacionTecnicoS2023", ["cpacitacionTecnicoME"], 'idCapacitacionTecnicoME2023'); ?>

				<?php endif ?>

				<?php if (!empty($actividadesSeleccionadas[0][idOrganismo])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["sueldosSM2023"], ["004 - Operación deportiva - Sueldos y salarios"], "idSueldosS2023", ["sueldosME"], 'idSueldosME2023'); ?>

				<?php endif ?>


				<?php if (!empty($actividadesSeleccionadas__honorarios[0][idOrganismo])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["honorariosSM2023"], ["004 - Operación deportiva - Honorarios"], "idHonorariosS2023", ["honorariosME"], 'idhonorariosME2023'); ?>

				<?php endif ?>

				<?php if (!empty($competencia__5[0][idPda])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["competenciaSM2023"], ["005 - Eventos de preparación y competencia - Ejecución presupuestaria"], "idCompetenciaS2023", ["competenciaME"], 'idCompetenciaME2023'); ?>


					<?php if (!empty($tipo__deOrganismos[0][nombreTipo])) : ?>

						<?= $componentes->getLinksConfiguracion__parametros__ver(["competencia__formativaSM2023"], ["005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica"], "idCompetencia__FormativaS2023", ["competencia__formativaME"], 'idCompetencia__formativaME2023'); ?>

					<?php else : ?>

						<?= $componentes->getLinksConfiguracion__parametros__ver(["competencia__altoRenSM2023"], ["005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica"], "idCompetencia__altoRenS2023", ["competencia__altoRenME"], 'idCompetencia__altoRenME2023'); ?>

					<?php endif ?>


				<?php endif ?>

				<?php if (!empty($recreativas__6[0][idPda])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["RecreativaSM2023"], ["006 - Actividades recreativas - Ejecución presupuestaria"], "idRecreativaS2023", ["RecreativaME"], 'idRecreativaME2023'); ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["RecreativaTecnicoSM2023"], ["006 - Actividades recreativas - Información técnica"], "idRecreativaTecnicoS2023", ["RecreativaTecnicoME"], 'idRecreativaTecnicoME2023'); ?>

				<?php endif ?>



				<?php if (!empty($recreativas__7[0][idPda])) : ?>

					<?= $componentes->getLinksConfiguracion__parametros__ver(["implementacionSM2023"], ["007 - Implementación deportiva  - Ejecución presupuestaria e Información Técnica"], "idImplementacionS2023", ["implementacionME"], 'idImplementacionME2023'); ?>

				<?php endif ?>

				<section class="row mt-4">

					<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post">

						<input type="hidden" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

						<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__seguimiento__final2" />
					

						<?php if ((empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  && $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre" />

						<?php } ?>
			
						<button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;RESUMEN EJECUCIÓN</button>

					</form>

				</section>

				<section class="row mt-4">

					<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post">

						<input type="hidden" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

						<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__contratcion__publica__od" />
					

						<?php if ((empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  && $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre" />

						<?php } ?>
			
						<button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;Resumen Contratación Pública</button>

					</form>

				</section>

				<section class="row mt-4">

				<!--*************************************** Decalracion de recursos publicos ******************************** -->
					<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post">

						<input type="hidden" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

						<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__declaracion__seguimientos2023" />
						
						

						<?php if ((empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  && $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre" />

						<?php } ?>
						
						
						<div class="row">
							<div class="col-md-4 text-left">
								<div class="col-md-12">
									<label>Declaración del correcto uso de los recursos públicos</label>
								</div>
								<div class="col-md-12 ">
								<button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;GENERAR PDF</button>
								</div>
							</div>
								<div class="col-md-3 text-left">
									<div class="col-md-12">
										<label></label>
									</div>
								<div class="col-md-12 mt-2">
									<input type="file" accept="application/pdf" class="ancho__total__input obligatorios_declaracion_rp" id="declaracion_rp" accept="application/pdf"/> 
								</div>
							</div>
							<div class="col-md-2">
								<div class="col-md-12">
									<label></label>
								</div>
								<div class="col-md-12 text-center">
									<a class="btn btn-primary text-center " id="guardar_declaracion_rp"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

					</form>

				<!--*************************************** Decalracion de contratacion publica ******************************** documento__declaracion__contratacion_publica-->
					<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"> 

						<input type="hidden" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

						<input type="hidden" id="tipoPdf" name="tipoPdf" value="contratacion_publica" />
						

						<?php if ((empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  && $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre" />

						<?php } ?>
						
						
						<div class="row">
							<div class="col-md-4 text-left">
								<div class="col-md-12">
									<label>Declaración de responsabilidad de procedimientos de contratación pública</label>
								</div>
								<div class="col-md-12 ">
								<button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;GENERAR PDF</button>
								</div>
							</div>
								<div class="col-md-3 text-left">
									<div class="col-md-12">
										<label></label>
									</div>
								<div class="col-md-12 mt-2">
									<input type="file" accept="application/pdf" class="ancho__total__input obligatorios_declaracion_cp" id="declaracion_cp" accept="application/pdf"/> 
								</div>
							</div>
							<div class="col-md-2">
								<div class="col-md-12">
									<label></label>
								</div>
								<div class="col-md-12 text-center">
									<a class="btn btn-primary text-center" id="guardar_declaracion_cp"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

					</form>
				<!-- <form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"> -->

					<!-- <input type="hidden" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

					<input type="hidden" id="tipoPdf" name="tipoPdf" value="declaracionTerminos" />

					<div class="row">
						
					</div>
			
					<br><br>
					<div class="row">
						
					</div> -->



					<input type="hidden" id="organismo__usados" name="organismo__usados" value="<?= $idOrganismo__v ?>" />
					<!-- <div style="padding-bottom: 4%; padding-top: 2%;">	 -->
						<!-- <center><input type="checkbox" id="declaracionUso__seguimientos" class="checkeds col-5" /></center> -->
					<!-- </div> -->
					 <form class="col col-12 enviador__seguiiento__refs1 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post"> 

						<input type="hidden" id="idOrganismo" name="idOrganismo" value="<?= $idOrganismo__v ?>" />

						<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__seguimiento__final2" />
						<input type="hidden" id="btnEnviar" name="btnEnviar" value="1"/>

						<?php if ((empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado] == "si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado] == "no") || !empty($controlCambiosI[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "primerTrimestre" || ($bloqueosSeguimientoI[0][estado] == "si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado] == "no")  && $tipoTrimestre[0][tipoTrimestre] != "segundoTrimestre" || !empty($bloqueosSeguimientoII[0][idSeguimientoCambio]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "segundoTrimestre" || ($bloqueosSeguimientoII[0][estado] == "si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio]) || !empty($controlCambiosII[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre" />

						<?php } else if (($tipoTrimestre[0][tipoTrimestre] == "tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado] == "si") || !empty($bloqueosSeguimientoIV[0][estado])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado] == "no") && $tipoTrimestre[0][tipoTrimestre] != "cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])) { ?>

							<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre" />

						<?php } ?>
						<div class="col col-12 text-center mt-4" style="padding-bottom: 2%;">	
							<button class="btn btn-primary" id="enviarFinal__ref2023"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Enviar</button>
						</div>
				    </form> 
					
				</section>

			</section>

		</div>

	</div>


</div>

<?php } ?>

<!--=============================
=            Modales           =
==============================-->

<?= $componentesTablas->getModalConfiguracion__modificacion2023("indicadoresM2023", "Indicadores", "lineaPoliticaContent", "segui_indicadores"); ?>

<?= $componentesTablas->getModalConfiguracion__modificacion__sueldos__salarios2023("sueldosSM2023", "004 - Operación deportiva - Sueldos y salarios", "sueldos__salarios__content","dt_sueldos_salarios_EP","div_sueldos_salarios","buscador"); ?>

<?= $componentesTablas->getModalConfiguracion__modificacion__honorarios2023("honorariosSM2023", "004 - Operación deportiva - Honorarios", "honorarios__content", "dt_segui_honorarios"); ?>

<?= $componentesTablas->getModalConfiguracion__administrativos2023("administrativoSM2023", "001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria", "administrativo__content", "dt_segui_administrativo_AP2023"); ?>

<?= $componentesTablas->getModalConfiguracion__mantenimiento2023("mantenimientoSM2023", "002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria", "mantenimiento__content", "dt_segui_mantenimiento_EP"); ?>

<?= $componentesTablas->getModalConfiguracion__mantenimiento__tecnico2023("mantenimientoTecnicoSM2023", "002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica", "mantenimiento__tecnico__content","dt_segui_mantenimiento_escenarios_IT" ); ?>

<?= $componentesTablas->getModalConfiguracion__capacitacion2023("capacitacionSM2023", "003 - Capacitación deportiva o de recreación - Ejecución presupuestaria", "mantenimiento__capacitacion__content","dt_segui_capacitacion_deportiva_recreacion1"); ?>

<?= $componentesTablas->getModalConfiguracion__capacitacion__tecnico2023("capacitacionTécnicoSM2023", "003 - Capacitación deportiva o de recreación - Información técnica", "mantenimiento__capacitacion__tecnica__content" ,"dt_segui_capacitacion_deportiva_recreacion"); ?>

<?= $componentesTablas->getModalConfiguracion__competencia2023("competenciaSM2023", "005 - Eventos de preparación y competencia - Ejecución presupuestaria", "mantenimiento__competencia__content","dt_segui_eventos_prepa_competencia"); ?>

<?= $componentesTablas->getModalConfiguracion__competencia__tecnica__formativa2023("competencia__formativaSM2023", "005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica", "mantenimiento__competencia__formativa__content","dt_segui_deporte_formativo"); ?>

<?= $componentesTablas->getModalConfiguracion__competencia__tecnica__altoRendimiento2023("competencia__altoRenSM2023", "005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica", "mantenimiento__competencia__alto__content","dt_segui_alto_rendimiento"); ?>

<?= $componentesTablas->getModalConfiguracion__recreativo2023("RecreativaSM2023", "006 - Actividades recreativas - Ejecución presupuestaria", "recreativo__content","dt_segui_acti_recreaticas1"); ?>

<?= $componentesTablas->getModalConfiguracion__recreativo__tecnico2023("RecreativaTecnicoSM2023", "006 - Actividades recreativas - Información técnica", "recreativo__tecnico__content","dt_segui_acti_recreaticas2"); ?>

<?= $componentesTablas->getModalConfiguracion__implementacion2023("implementacionSM2023", "007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica", "implementacion__content","dt_segui_implementacion_deportiva"); ?>

<?= $componentesTablas->getModalConfiguracion__autoegestion2023("autogestionSM2023", "Autogestión", "autogestion__content"); ?>

<?= $componentesTablas->getModalConfiguracion__modificacion1("indicadoresM_estadoCuenta2023", "Indicadores", "lineaPoliticaContent", "dt_segui_indicadores"); ?>

<?= $componentesPaid->get__contraloria_items__paid("contrataciones__itemsSeguimiento", "formContratacionPublica", "Contratación Pública", "divContratacionPublicaSeguimiento", "cerrarBtnContratacionPublica", "inputIdItem"); ?>

<?= $componentesPaid->get__contraloria_No_items__paid("contrataciones__NoitemsSeguimiento", "formContratacionPublica", "Sin Contratación Pública", "divNoContratacionPublicaSeguimiento", "cerrarBtnNoContratacionPublica", "inputIdItem"); ?>



<!--====  End of Modales  ====-->




<!--=========================
=            Ver            =
==========================-->

<?= $componentesTablas->get__modal__edicion__parametros("indicadoresME", "Indicadores (Ver)", "<div class='col col-12'><a class='btn btn-primary' id='exportar__indicadores'>Exportar a excel</a></div><br><input type='text' id='searchInput_indicador' value='' placeholder='Buscar por Nombre de actividad' class='form-control' style='width:25%'>&nbsp<a class='btn btn-primary' id='buscar__indicador'  style='width:15%'>Buscar</a><table id='indicadores__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Codigo<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre de <br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Meta<br>programada</center></th><th style='vertical-align:middle;'><center>Meta<br>alcanzada</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos'></tbody></table><table id='indicadores__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Codigo<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre<br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Total<br>programado</center></th><th style='vertical-align:middle;'><center>Total<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos__2'></tbody></table>"); ?>



<?= $componentesTablas->get__modal__edicion__parametros("sueldosME", "004 - Operación deportiva - Sueldos y salarios (Ver)", "<div class='col col-12'><a class='btn btn-primary' id='exportar__sueldos'>Exportar a excel</a></div><br><input type='text' id='searchInput' value='' placeholder='Buscar por el Nombre' class='form-control' style='width:25%'>&nbsp<a class='btn btn-primary' id='buscar__sueldos'  style='width:15%'>Buscar</a><table id='sueldos__salarios__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th style='vertical-align:middle;'><center>Tipo cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Sueldo<br>programado</center></th><th><center>Sueldo<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Aporte<br>programado</center></th><th style='vertical-align:middle;'><center>Aporte<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Décimo tercer<br>programado</center></th><th><center>Décimo tercer<br>ejecutado</center></th><th><center>Décimo cuarto<br>programado</center></th><th><center>Décimo cuarto <br>ejecutado</center></th><th><center>Fondos reserva<br>programado</center></th><th><center>Fondos reserva<br>ejecutado</center></th><th><center>Compensación Deshaucio Programado</center></th><th><center>Compensación Deshaucio Ejecutado</center></th><th><center>Despido Intepestivo Programado</center></th><th><center>Despido Intepestivo Ejecutado</center></th><th><center>Renuncia Voluntaria Programado</center></th><th><center>Renuncia Voluntaria Ejecutado</center></th><th><center>Vacaciones Programado</center></th><th><center>Vacaciones Ejecutado</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__sueldos__slaraios__seguimientos'></tbody></table><table id='sueldos__salarios__seguimientos__2' style='display:none;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th style='vertical-align:middle;'><center>Tipo cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Sueldo<br>programado</center></th><th><center>Sueldo<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Aporte<br>programado</center></th><th style='vertical-align:middle;'><center>Aporte<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Décimo tercer<br>programado</center></th><th><center>Décimo tercer<br>ejecutado</center></th><th><center>Décimo cuarto<br>programado</center></th><th><center>Décimo cuarto <br>ejecutado</center></th><th><center>Fondos reserva<br>programado</center></th><th><center>Fondos reserva<br>ejecutado</center></th><th><center>Compensación Deshaucio Programado</center></th><th><center>Compensación Deshaucio Ejecutado</center></th><th><center>Despido Intepestivo Programado</center></th><th><center>Despido Intepestivo Ejecutado</center></th><th><center>Renuncia Voluntaria Programado</center></th><th><center>Renuncia Voluntaria Ejecutado</center></th><th><center>Vacaciones Programado</center></th><th><center>Vacaciones Ejecutado</center></th><th><center>Acciones</center></th></tr><tbody class='cuerpo__sueldos__slaraios__seguimientos__2'></tbody></table><table id='comprobantes__sueldos__salarios'><thead><tr><th style='vertical-align:middle;'><center>Planilla</center></th><th style='vertical-align:middle;'><center>Rol</center></th><th style='vertical-align:middle;'><center>Comprobante</center></th><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Periodo</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__sueldos__edis__com'></tbody></table>"); ?>



<?= $componentesTablas->get__modal__edicion__parametros("honorariosME", "004 - Operación deportiva - Honorarios (Ver)", "<table id='honorarios__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th><center>Cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Honorario<br>programado</center></th><th><center>Honorario<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Facturas</center></th><th><center>Documentos</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__honorarios__seguimientos'></tbody></table><table id='honorarios__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th><center>Cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Honorario<br>programado</center></th><th><center>Honorario<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__honorarios__seguimientos__2'></tbody></table><table id='honorarios__facturas__edicion'><thead><tr><th><center>Nombres</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__honorarios'></tbody></table><table id='otros__honorarios__edicion'><thead><tr><th><center>Nombres</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__honorarios'></tbody></table>"); ?>

<?= $componentesTablas->get__modal__edicion__parametros("administrativoME", "001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria (Ver)", "<table id='administrativos__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th style='vertical-align:middle;'><center>Facturas</center></th><th style='vertical-align:middle;'><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__administrativo__seguimientos'></tbody></table><table id='administrativos__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__administrativo__seguimientos__2'></tbody></table><table id='administrativos__editares'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__administrativos'></tbody></table><table id='otros__editas__administativos'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__administrativos'></tbody></table><table id='estado_de_ceunta_EP'><thead><tr><th><center>Fecha</center></th><th><center>Trimestre</center></th><th><center>Documento</center></th><th><center>Acciones</center></th></tr></thead><tbody class='carga_datos_estado_cuenta_EP'></tbody></table>"); ?>


<?= $componentesTablas->get__modal__edicion__parametros("mantenimientoME", "002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria (Ver)", "<table id='administrativos__seguimientosMantenimiento'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Registra Contratación</center></th><th><center>Justificación</center></th><th style='vertical-align:middle;'><center>Facturas</center></th><th style='vertical-align:middle;'><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__seguimientos'></tbody></table><table id='mantenimientos__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Provincia</center></th><th style='vertical-align:middle;'><center>Dirección</center></th><th style='vertical-align:middle;'><center>Estado</center></th><th style='vertical-align:middle;'><center>Tipo mantenimiento</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__seguimientos__2'></tbody></table><table class='tabla__mantenimiento__principal'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__mantenimiento'></tbody></table><table class='tabla__mantenimiento__otros__principales'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__mantenimiento'></tbody></table>"); ?>

<?= $componentesTablas->get__modal__edicion__parametros("mantenimientoTecnicoME", "002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica (Ver)", "<table id='tecnico__mantenimientos'><thead><tr><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>% avance</th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__tecnicos'></tbody></table><table id='tecnico__mantenimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Provincia</center></th><th style='vertical-align:middle;'><center>Dirección</center></th><th style='vertical-align:middle;'><center>Estado</center></th><th style='vertical-align:middle;'><center>Tipo mantenimiento</center></th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>% avance</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__mantenimiento__tecnicos__2'></tbody></table><table class='mantenimiento__items__evolutivos__tecnicos'><thead><tr><th ><center>Infraestructura</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__mantenimiento__tecnicos'></tbody></table>"); ?>

<?= $componentesTablas->get__modal__edicion__parametros("cpacitacionME", "003 - Capacitación deportiva o de recreación - Ejecución presupuestaria (Ver)", "<table id='capacitacion__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad Bienes</center></th><th><center>Registra Contratación</center></th><th><center>Justificación</center></th><th><center>Facturas</center></th><th><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__capacitacion__vs'></tbody></table><table id='capacitacion__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__capacitacion__vs__2'></tbody></table><table id='capacitacion__factureros__v'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__implementacion'></tbody></table><table id='capacitacion__otros__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__implementacion'></tbody></table>"); ?>


<?= $componentesTablas->get__modal__edicion__parametros("cpacitacionTecnicoME", "003 - Capacitación deportiva o de recreación - Información técnica (Ver)", "<table id='capacitacion__seguimientos__tecnico'id='tecnico__capacitacion'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>Tipo<br>organizacion</th><th><center>Ruc</center></th><th><center>Nombre Organización</center></th><th><center>Observaciones</center></th><th><center>Beneficiarios Hombres</center></th><th><center>Beneficiarios Mujeres</center></th><th><center>Total B.</center></th><th><center>Capacitadores</center></th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__capacitacion'></tbody></table><table id='tecnico__capacitacion__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__capacitacion__2'></tbody></table><table class='tabla__capacitacion__tecnicos'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__capacitacion__tecnicos'></tbody></table>"); ?>


<?= $componentesTablas->get__modal__edicion__parametros("competenciaME", "005 - Eventos de preparación y competencia - Ejecución presupuestaria (Ver)", "<table id='competencias__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Evento</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th><th><center>Registra Contratación</center></th><th><center>Justificación</center></th><th><center>Facturas</center></th><th><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__competencia__administrativos'></tbody></table><table id='competencias__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Evento</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th></tr></thead><tbody class='cuerpo__competencia__administrativos__2'></tbody></table><table id='facturas__seguimientos__competencias__u'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__administrativos'></tbody></table><table id='otros__competencias__us'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__competencia'></tbody></table>"); ?>


<?= $componentesTablas->get__modal__edicion__parametros("competencia__formativaME", "005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica (Ver)", "<table id='tecnico__formativos'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres<br>Menores 18 años</center></th><th>Beneficiarios<br>hombres<br>Menores 18 años</th><th><center>Total<br>beneficiarios<br>Menores 18 años</center></th><th><center>Beneficiarios<br>mujeres<br>Mayores 18 años</center></th><th>Beneficiarios<br>hombres<br>Mayores 18 años</th><th><center>Total<br>beneficiarios<br>Mayores 18 años</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th><center>Observaciones</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__formativos'></tbody></table><table id='tecnico__formativos__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__formativos__2'></tbody></table><table class='formativo__otros__tecnicos'><thead><tr><th><center>Evento</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='formativo__otros__tecnicos__cuerpo'></tbody></table>"); ?>

<?= $componentesTablas->get__modal__edicion__parametros("competencia__altoRenME", "005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica (Ver)", "<table id='tecnico__altos'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Observaciones</center></th><th><center>Fecha Planificada Inicial</center></th><th><center>Fecha Ejecutada Inicial</center></th><th><center>Fecha Planificada Final</center></th><th><center>Fecha Ejecutada Final</center></th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__altos'></tbody></table><table id='tecnico__formativos__altos__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Evento tarea<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Predicción<br>de resultados</center></th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__altos__2'></tbody></table><table class='alto__otros__tecnicos'><thead><tr><th style='display:none!important;'><center>Código Ítem</center></th><th ><center>Evento</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='alto__otros__tecnicos__cuerpo'></tbody></table>"); ?>



<?= $componentesTablas->get__modal__edicion__parametros("RecreativaME", "006 - Actividades recreativas - Ejecución presupuestaria (Ver)", "<table id='recreativo__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad Bienes</center></th><th><center>Registra Contratación</center></th><th><center>Justificación</center></th><th><center>Facturas</center></th><th><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__recreativo__segumientos'></tbody></table><table id='recreativo__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__recreativo__segumientos__2'></tbody></table><table class='tabla__recreativas__ocultas__factureros' style='display:none!important;'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__recreativos'></tbody></table><table style='display:none!important;' class='tabla__recreativas__ocultas'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__recreativos'></tbody></table>"); ?>



<?= $componentesTablas->get__modal__edicion__parametros("RecreativaTecnicoME", "006 - Actividades recreativas - Información técnica (Ver)", "<table id='tecnico__recracion'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th><center>Beneficiarios<br>hombres 5-17 Años</center></th><th>Beneficiarios<br>mujeres 5-17 Años</th><th><center>Total<br>beneficiarios 5-17 Años</center></th><th><center>Beneficiarios<br>hombres 18-69 Años</center></th><th>Beneficiarios<br>mujeres 18-69 Años</th><th><center>Total<br>beneficiarios 18-69 Años</center></th><th>Tipo<br>organizacion</th><th>Ruc</th><th>Nombre Organismo</th><th><center>Observaciones</center></th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__recreacion'></tbody></table><table id='tecnico__recracion__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th><center>Beneficiarios<br>hombres</center></th><th>Beneficiarios<br>mujeres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__recreacion__2'></tbody></table><table class='recreativo__otros__tecnicos__si'><thead><tr><th><center>Evento</center></th><th><center>Documento</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='recreativo__otros__tecnicos__cuerpo'></tbody></table>"); ?>


<?= $componentesTablas->get__modal__edicion__parametros("implementacionME", "007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica (Ver)", "<table id='implementacion__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th><th><center>Registra Contratación</center></th><th><center>Justificación</center></th><th><center>Facturas</center></th><th><center>Documentos</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__competencia__implementaciones'></tbody></table><table id='implementacion__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th>    </tr></thead><tbody class='cuerpo__competencia__implementaciones__2'></tbody></table><table id='factureros__implementarciones__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__implementacion'></tbody></table><table id='otros__implementaciones__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__implementacion'></tbody></table>"); ?>

<?= $componentesTablas->get__modal__edicion__parametros("indicadoresMEindicadoresM_estadoCuenta", "Indicadores (Ver)", "<div class='col col-12'><a class='btn btn-primary' id='exportar__indicadores2'>Exportar a excel</a></div><br><input type='text' id='searchInput_indicador_estado_cuenta' value='' placeholder='Buscar por Nombre de actividad' class='form-control' style='width:25%'>&nbsp<a class='btn btn-primary' id='buscar__indicador_estado_cuenta'  style='width:15%'>Buscar</a><table id='indicadores__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Codigo<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre de <br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Meta<br>programada</center></th><th style='vertical-align:middle;'><center>Meta<br>alcanzada</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos_estado_cuenta'></tbody></table><table id='indicadores__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Codigo<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre<br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Total<br>programado</center></th><th style='vertical-align:middle;'><center>Total<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos__2'></tbody></table></table><table id='indicadores__seguimientos__2__estado_cuenta'><thead><tr><th><center>Fecha</center></th><th><center>Trimestre</center></th><th><center>Documento</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos__2__estado__cuenta'></tbody></table>"); ?>



<!--====  End of Ver  ====-->


<?= $componentesTablas->getModalVacioXl("modalFacturasDocumentos", "formContratacionPublica", "idTituloModalDocumentos", "divDocumentos", "cerrarBtnContratacionPublica", "inputIdItem"); ?>

<?= $componentesTablas->getModalVacioXl("contratcionActividades", "formPreviewBancos", "idTituloModalContratacion", "divcontratcionActividades", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>


   
<!--====  End of Modales  ====-->