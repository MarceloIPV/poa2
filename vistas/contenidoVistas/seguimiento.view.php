<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<?php $anioActual = date('Y');?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $idOrganismo__v= $informacionObjeto[0][idOrganismo];?>

<?php $idOrganismos__ejecutados=$informacionObjeto[0][idOrganismo];?>

<!--=====================================
=            Bloqueos juegos            =
======================================-->

<?php $bloqueosSeguimientoI=$objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo AS a1 WHERE a1.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;");?>

<?php $bloqueosSeguimientoII=$objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_2 AS a1 WHERE a1.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;");?>


<?php $bloqueosSeguimientoIII=$objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_3 AS a1 WHERE a1.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;");?>


<?php $bloqueosSeguimientoIV=$objetoInformacion->getObtenerInformacionGeneral("SELECT a1.estado FROM poa_seguimiento_bloqueo_4 AS a1 WHERE a1.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY idBloqueos__seguimientos DESC LIMIT 1;");?>


<!--====  End of Bloqueos juegos  ====-->

<!--========================================
=            Control de cambios            =
=========================================-->

<?php $controlCambiosI=$objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='primerTrimestre' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;");?>

<?php $controlCambiosII=$objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='segundoTrimestre' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;");?>

<?php $controlCambiosIII=$objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='tercerTrimestre' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;");?>

<?php $controlCambiosIV=$objetoInformacion->getObtenerInformacionGeneral("SELECT idSeguimientoCambio FROM poa_seguimiento_control_cambios WHERE estado='A' AND trimestre='cuartoTrimestre' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientoCambio DESC LIMIT 1;");?>

<!--====  End of Control de cambios  ====-->



<?php $tipo__deOrganismos=$objetoInformacion->getObtenerInformacionGeneral("SELECT d.nombreTipo FROM poa_organismo AS a INNER JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='$idOrganismos__ejecutados' AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%');");?>

<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_sueldossalarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $actividadesSeleccionadas__honorarios=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_honorarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $tipoTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT tipoTrimestre FROM poa_trimestrales WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos'  ORDER BY idEnviadorTrimestres DESC;");?>

<?php $actividadesSeleccionadas__actividadesAdmi=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $actividadesSeleccionadas__mantenimientoAdmin=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idMantenimiento DESC;");?>

<?php $capacitacion__3=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='3' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $competencia__5=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='5' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $recreativas__6=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='6' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $recreativas__7=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='7' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"ETAPA DE SEGUIMIENTO");?>

	<form class="content__configuraciones row d d-flex flex-column align-items-center mt-4 formulario__seguimiento">

		<select id="tipo__cambiosSeguimientos" class="mt-4 ancho__total__input__selects select-css-decorator">

			<option value="">--Seleccione el tipo de seguimiento--</option>

			<option value="1">Plan Operativo Anual (POA)</option>

			<option value="2">Plan Anual de Inversión Deportiva (PAID)</option>

		</select>

	</form>


	<div class="contenidos__formularios__enviados">


		<input type="hidden" id="contadorIndicador" name="contadorIndicador" value="0">
		<input type="hidden" id="contadorIndicador2" name="contadorIndicador2" value="0">

		<input type="hidden" id="valorAsignado__meses" name="valorAsignado__meses" />

		<?php if (($tipoTrimestre[0][tipoTrimestre]=="cuartoTrimestre" || empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado]=="si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado]=="no") || !empty($controlCambiosI[0][idSeguimientoCambio])){ ?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="primerTrimestre"/>

			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center mt-4">
					
				PRIMER TRIMESTRE

				&nbsp;&nbsp;

				<a class="btn btn-warning" id="finalizarSeguimiento">Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>

			</div>

		<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="primerTrimestre" || ($bloqueosSeguimientoI[0][estado]=="si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado]=="no")  && $tipoTrimestre[0][tipoTrimestre]!="segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado])  || !empty($controlCambiosII[0][idSeguimientoCambio])){ ?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="segundoTrimestre"/>
				

			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4">
					
				SEGUNDO TRIMESTRE

				&nbsp;&nbsp;

				<a class="btn btn-warning" id="finalizarSeguimiento">Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>

			</div>


		<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="segundoTrimestre" || ($bloqueosSeguimientoII[0][estado]=="si") || !empty($bloqueosSeguimientoIII[0][estado])) || !empty($controlCambiosIII[0][idSeguimientoCambio])){?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="tercerTrimestre"/>
			
			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4">
					
				TERCER TRIMESTRE

				&nbsp;&nbsp;

				<a class="btn btn-warning" id="finalizarSeguimiento">Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>

			</div>

		<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado]=="si") || !empty($bloqueosSeguimientoIV[0][estado]))){?>

			<input type="hidden" id="trimestreEvaluador" name="trimestreEvaluador" value="cuartoTrimestre"/>
				
			<div class="col col-12 textos__titulos__2d text-center d d-flex justify-content-center  mt-4">
					
				CUARTO TRIMESTRE

				&nbsp;&nbsp;

				<a class="btn btn-warning" id="finalizarSeguimiento">Reporte de monto programado&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>

			</div>

		<?php } ?>			

		<div class="contenedor__seguiiento__con">

			<section class="row mt-4">

				<form class="col col-12 text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post">

					<input type="hidden" name="idOrganismo" value="<?=$idOrganismo__v?>" />

					<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__seguimiento__final" />
				
					<?php if (($tipoTrimestre[0][tipoTrimestre]=="cuartoTrimestre" || empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado]=="si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado]=="no") || !empty($controlCambiosI[0][idSeguimientoCambio])){ ?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="primerTrimestre" || ($bloqueosSeguimientoI[0][estado]=="si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado]=="no")  && $tipoTrimestre[0][tipoTrimestre]!="segundoTrimestre" || !empty($bloqueosSeguimientoII[0][estado]) || !empty($controlCambiosII[0][idSeguimientoCambio])){ ?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="segundoTrimestre" || ($bloqueosSeguimientoII[0][estado]=="si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado]=="no") && $tipoTrimestre[0][tipoTrimestre]!="tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio])){?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado]=="si") || !empty($bloqueosSeguimientoIV[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado]=="no") && $tipoTrimestre[0][tipoTrimestre]!="cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])){?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre"/>

					<?php } ?>	
					
					<button class="btn btn-info"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;&nbsp;GENERAR PDF</button>

				</form>

			</section>

			<section class="row mt-4">
				
				<a class="col col-5 enlaces__definidos__letras text-right" href="documentos/documentosMinisterio/acuerdos__seguimiento.pdf" target="_blank">Declaración del correcto uso de los recursos públicos</a>

				<input type="hidden" id="organismo__usados" name="organismo__usados" value="<?=$idOrganismo__v?>" />

				<input type="checkbox" id="declaracionUso__seguimientos" class="checkeds col-5" />

				<form class="col col-12 enviador__seguiiento__refs text-center mt-4" action="modelosBd/pdf/pdf.modelo.php" method="post">

					<input type="hidden" id="idOrganismo" name="idOrganismo" value="<?=$idOrganismo__v?>" />

					<input type="hidden" id="tipoPdf" name="tipoPdf" value="documento__seguimiento__final" />

					<?php if (($tipoTrimestre[0][tipoTrimestre]=="cuartoTrimestre" || empty($tipoTrimestre[0][tipoTrimestre]) || ($bloqueosSeguimientoIV[0][estado]=="si") || !empty($controlCambiosI[0][idSeguimientoCambio])) && (empty($bloqueosSeguimientoI[0][estado]) || $bloqueosSeguimientoI[0][estado]=="no") || !empty($controlCambiosI[0][idSeguimientoCambio])){ ?>


						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="primerTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="primerTrimestre" || ($bloqueosSeguimientoI[0][estado]=="si") || !empty($bloqueosSeguimientoII[0][estado])) && (empty($bloqueosSeguimientoII[0][estado]) || $bloqueosSeguimientoII[0][estado]=="no")  && $tipoTrimestre[0][tipoTrimestre]!="segundoTrimestre" || !empty($bloqueosSeguimientoII[0][idSeguimientoCambio]) || !empty($controlCambiosII[0][idSeguimientoCambio])){ ?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="segundoTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="segundoTrimestre" || ($bloqueosSeguimientoII[0][estado]=="si") || !empty($bloqueosSeguimientoIII[0][estado])) && (empty($bloqueosSeguimientoIII[0][estado]) || $bloqueosSeguimientoIII[0][estado]=="no") && $tipoTrimestre[0][tipoTrimestre]!="tercerTrimestre" || !empty($controlCambiosIII[0][idSeguimientoCambio]) || !empty($controlCambiosII[0][idSeguimientoCambio])){?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="tercerTrimestre"/>

					<?php }else if(($tipoTrimestre[0][tipoTrimestre]=="tercerTrimestre" || ($bloqueosSeguimientoIII[0][estado]=="si") || !empty($bloqueosSeguimientoIV[0][estado])) && (empty($bloqueosSeguimientoIV[0][estado]) || $bloqueosSeguimientoIV[0][estado]=="no") && $tipoTrimestre[0][tipoTrimestre]!="cuartoTrimestre" || !empty($controlCambiosIV[0][idSeguimientoCambio])){?>

						<input type="hidden" id="trimestreEvaluadorDos" name="trimestreEvaluadorDos" value="cuartoTrimestre"/>

					<?php } ?>	
					
					<button class="btn btn-primary" id="enviarFinal__ref"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Enviar</button>

				</form>

			</section>

			<section class="content row d d-flex justify-content-left align-items-center mt-4 scrollme">

				<table class="tabla__finales__seguimiento">

					<thead class="actividades__finales__seguis">
						
						<tr>

							<th>
								ACTIVIDAD
							</th>

							<th>
								ÍTEM
							</th>

							<th class="primer__trimestre__columna">
								I TRIMESTRE
							</th>

							<th class="segundo__trimestre__columna">
								II TRIMESTRE
							</th>

							<th class="tercero__trimestre__columna">
								III TRIMESTRE
							</th>

							<th class="cuarto__trimestre__columna">
								IV TRIMESTRE
							</th>

						</tr>

					</thead>

					<tbody class="informacion__fin__registradas"></tbody>

				</table>

			</section>

		</div>

		<div class="contenedor__seguimiento__sin">

			<section class="content row d d-flex justify-content-left align-items-center mt-4">

				<?=$componentes->getLinksConfiguracion__parametros(["autogestionSM"],["Autogestión"],"idAutogestionS",["autogestionME"],'idAutogestionME');?>

				<?=$componentes->getLinksConfiguracion__parametros__ver(["indicadoresM"],["Indicadores"],"idIndicadores",["indicadoresME"],'idIndicadoresME');?>

				<?php if (!empty($actividadesSeleccionadas[0][idOrganismo])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["sueldosSM"],["Sueldos y salarios - Actividad presupuestaria"],"idSueldosS",["sueldosME"],'idSueldosME');?>
					
				<?php endif ?>


				<?php if (!empty($actividadesSeleccionadas__honorarios[0][idOrganismo])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["honorariosSM"],["Honorarios"],"idHonorariosS",["honorariosME"],'idhonorariosME');?>
					
				<?php endif ?>

				<?php if (!empty($actividadesSeleccionadas__actividadesAdmi[0][idActividadAd])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["administrativoSM"],["Actividades administrativas - Actividad presupuestaria"],"idAdministrativoS",["administrativoME"],'idAdministrativoME');?>
					
				<?php endif ?>


				<?php if (!empty($actividadesSeleccionadas__mantenimientoAdmin[0][idMantenimiento])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["mantenimientoSM"],["Actividades de mantenimiento - Actividad presupuestaria"],"idMantenimientoS",["mantenimientoME"],'idMantenimientoME');?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["mantenimientoTecnicoSM"],["Actividad de mantenimiento de escenarios deportivos - Actividad técnico"],"idMantenimientoTecnicoS",["mantenimientoTecnicoME"],'idMantenimientoTecnicoME');?>

				<?php endif ?>

				<?php if (!empty($capacitacion__3[0][idPda])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["capacitacionSM"],["Actividad de capacitación - Actividad presupuestaria"],"idCapacitacionS",["cpacitacionME"],'idCapacitacionME');?>
					
					<?=$componentes->getLinksConfiguracion__parametros__ver(["capacitacionTécnicoSM"],["Actividad de capacitación Técnico"],"idCapacitacionTecnicoS",["cpacitacionTecnicoME"],'idCapacitacionTecnicoME');?>

				<?php endif ?>

				<?php if (!empty($competencia__5[0][idPda])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["competenciaSM"],["Actividad de competencia - Actividad presupuestaria"],"idCompetenciaS",["competenciaME"],'idCompetenciaME');?>

					<?php if (!empty($tipo__deOrganismos[0][nombreTipo])): ?>

						<?=$componentes->getLinksConfiguracion__parametros__ver(["competencia__formativaSM"],["Actividad de competencia Formativa - Actividad técnica"],"idCompetencia__FormativaS",["competencia__formativaME"],'idCompetencia__formativaME');?>
						
					<?php else: ?>

						<?=$componentes->getLinksConfiguracion__parametros__ver(["competencia__altoRenSM"],["Actividad de competencia Rendimiento - Actividad técnica"],"idCompetencia__altoRenS",["competencia__altoRenME"],'idCompetencia__altoRenME');?>
						
					<?php endif ?>

					
				<?php endif ?>

				<?php if (!empty($recreativas__6[0][idPda])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["RecreativaSM"],["Actividad recreativa - Actividad presupuestaria"],"idRecreativaS",["RecreativaME"],'idRecreativaME');?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["RecreativaTecnicoSM"],["Actividad recreativa técnico - Actividad técnica"],"idRecreativaTecnicoS",["RecreativaTecnicoME"],'idRecreativaTecnicoME');?>

				<?php endif ?>



				<?php if (!empty($recreativas__7[0][idPda])): ?>

					<?=$componentes->getLinksConfiguracion__parametros__ver(["implementacionSM"],["Actividad de Implementación deportiva - Actividad presupuestaria"],"idImplementacionS",["implementacionME"],'idImplementacionME');?>

				<?php endif ?>


			</section>

		</div>

	</div>

</div>

<!--=============================
=            Modales           =
==============================-->

<?=$componentesTablas->getModalConfiguracion__modificacion("indicadoresM","Sección de indicadores","lineaPoliticaContent");?>

<?=$componentesTablas->getModalConfiguracion__modificacion__sueldos__salarios("sueldosSM","Sección de sueldos y salarios","sueldos__salarios__content");?>

<?=$componentesTablas->getModalConfiguracion__modificacion__honorarios("honorariosSM","Sección de Honorarios","honorarios__content");?>

<?=$componentesTablas->getModalConfiguracion__administrativos("administrativoSM","Sección de administrativo","administrativo__content");?>

<?=$componentesTablas->getModalConfiguracion__mantenimiento("mantenimientoSM","Sección de Mantenimiento","mantenimiento__content");?>

<?=$componentesTablas->getModalConfiguracion__mantenimiento__tecnico("mantenimientoTecnicoSM","Sección de Mantenimiento Técnico","mantenimiento__tecnico__content");?>

<?=$componentesTablas->getModalConfiguracion__capacitacion("capacitacionSM","Sección de actividad de capacitación","mantenimiento__capacitacion__content");?>

<?=$componentesTablas->getModalConfiguracion__capacitacion__tecnico("capacitacionTécnicoSM","Sección de actividad de capacitación Técnica","mantenimiento__capacitacion__tecnica__content");?>

<?=$componentesTablas->getModalConfiguracion__competencia("competenciaSM","Sección de competencia","mantenimiento__competencia__content");?>

<?=$componentesTablas->getModalConfiguracion__competencia__tecnica__formativa("competencia__formativaSM","Sección de competencia formativa","mantenimiento__competencia__formativa__content");?>

<?=$componentesTablas->getModalConfiguracion__competencia__tecnica__altoRendimiento("competencia__altoRenSM","Sección de competencia alto rendimiento","mantenimiento__competencia__alto__content");?>

<?=$componentesTablas->getModalConfiguracion__recreativo("RecreativaSM","Sección de recreativo","recreativo__content");?>

<?=$componentesTablas->getModalConfiguracion__recreativo__tecnico("RecreativaTecnicoSM","Sección de recreativo técnico","recreativo__tecnico__content");?>

<?=$componentesTablas->getModalConfiguracion__implementacion("implementacionSM","Sección de Implementación deportiva","implementacion__content");?>

<?=$componentesTablas->getModalConfiguracion__autoegestion("autogestionSM","Autogestión","autogestion__content");?>


<!--====  End of Modales  ====-->

<!--=========================
=            Ver            =
==========================-->

<?=$componentesTablas->get__modal__edicion__parametros("indicadoresME","Sección de indicadores (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__indicadores'>Exportar a excel</a></div><br><table id='indicadores__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Código<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre<br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Total<br>programado</center></th><th style='vertical-align:middle;'><center>Total<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Documento<br>sustento</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos'></tbody></table><table id='indicadores__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Código<br>actividad</center></th><th style='vertical-align:middle;'><center>Nombre<br>actividad</center></th><th style='vertical-align:middle;'><center>Indicador</center></th><th><center>Total<br>programado</center></th><th style='vertical-align:middle;'><center>Total<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__indicadores__seguimientos__2'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("sueldosME","Sección de sueldos y salarios (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__sueldos'>Exportar a excel</a></div><br><table id='sueldos__salarios__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th style='vertical-align:middle;'><center>Tipo cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Sueldo<br>programado</center></th><th><center>Sueldo<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Aporte<br>programado</center></th><th style='vertical-align:middle;'><center>Aporte<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Décimo tercer<br>programado</center></th><th><center>Décimo tercer<br>ejecutado</center></th><th><center>Décimo cuarto<br>programado</center></th><th><center>Décimo cuarto <br>ejecutado</center></th><th><center>Fondos reserva<br>programado</center></th><th><center>Fondos reserva<br>ejecutado</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__sueldos__slaraios__seguimientos'></tbody></table><br><table id='sueldos__salarios__seguimientos__desvinculaciones'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th style='vertical-align:middle;'><center>Tipo cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Deshacuio<br>programado</center></th><th><center>Deshacuio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Despido<br>programado</center></th><th style='vertical-align:middle;'><center>Despido<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Renuncia<br>programado</center></th><th><center>Renuncia<br>ejecutado</center></th><th><center>Vacaciones<br>programado</center></th><th><center>Vacaciones<br>ejecutado</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__sueldos__slaraios__seguimientos__desvinculaciones'></tbody></table><br><table id='sueldos__salarios__seguimientos__2' style='display:none;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th style='vertical-align:middle;'><center>Tipo cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Sueldo<br>programado</center></th><th><center>Sueldo<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Aporte<br>programado</center></th><th style='vertical-align:middle;'><center>Aporte<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Décimo tercer<br>programado</center></th><th><center>Décimo tercer<br>ejecutado</center></th><th><center>Décimo cuarto<br>programado</center></th><th><center>Décimo cuarto <br>ejecutado</center></th><th><center>Fondos reserva<br>programado</center></th><th><center>Fondos reserva<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__sueldos__slaraios__seguimientos__2'></tbody></table><table id='comprobantes__sueldos__salarios'><thead><tr><th style='vertical-align:middle;'><center>Planilla</center></th><th style='vertical-align:middle;'><center>Rol</center></th><th style='vertical-align:middle;'><center>Comprobante</center></th><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Periodo</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__sueldos__edis__com'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("honorariosME","Sección de honorarios (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__honorarios'>Exportar a excel</a></div><br><table id='honorarios__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th><center>Cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Honorario<br>programado</center></th><th><center>Honorario<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Acciones</center></th></tr></thead><tbody class='cuerpo__honorarios__seguimientos'></tbody></table><table id='honorarios__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Cédula</center></th><th><center>Cargo</center></th><th style='vertical-align:middle;'><center>Nombre</center></th><th style='vertical-align:middle;'><center>Honorario<br>programado</center></th><th><center>Honorario<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__honorarios__seguimientos__2'></tbody></table><table id='honorarios__facturas__edicion'><thead><tr><th><center>Nombres</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__honorarios'></tbody></table><table id='otros__honorarios__edicion'><thead><tr><th><center>Nombres</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__honorarios'></tbody></table>");?>

<?=$componentesTablas->get__modal__edicion__parametros("administrativoME","Sección administrativa (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__administrativas'>Exportar a excel</a></div><br><table id='administrativos__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__administrativo__seguimientos'></tbody></table><table id='administrativos__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__administrativo__seguimientos__2'></tbody></table><table id='administrativos__editares'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__administrativos'></tbody></table><table id='otros__editas__administativos'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__administrativos'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("mantenimientoME","Sección de mantenimiento (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__mantenimiento'>Exportar a excel</a></div><br><table id='administrativos__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__seguimientos'></tbody></table><table id='mantenimientos__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Provincia</center></th><th style='vertical-align:middle;'><center>Dirección</center></th><th style='vertical-align:middle;'><center>Estado</center></th><th style='vertical-align:middle;'><center>Tipo mantenimiento</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__seguimientos__2'></tbody></table><table class='tabla__mantenimiento__principal'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__mantenimiento'></tbody></table><table class='tabla__mantenimiento__otros__principales'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__mantenimiento'></tbody></table>");?>

<?=$componentesTablas->get__modal__edicion__parametros("mantenimientoTecnicoME","Sección de mantenimiento técnico (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__mantenimiento__tecnico'>Exportar a excel</a></div><br><table id='tecnico__mantenimientos'><thead><tr><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>% avance</th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__mantenimiento__tecnicos'></tbody></table><table id='tecnico__mantenimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Infraestructura</center></th><th style='vertical-align:middle;'><center>Provincia</center></th><th style='vertical-align:middle;'><center>Dirección</center></th><th style='vertical-align:middle;'><center>Estado</center></th><th style='vertical-align:middle;'><center>Tipo mantenimiento</center></th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>% avance</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__mantenimiento__tecnicos__2'></tbody></table><table class='mantenimiento__items__evolutivos__tecnicos'><thead><tr><th style='display:none!important;'><center>Código Ítem</center></th><th style='display:none!important;'><center>Nombre Ítem</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__mantenimiento__tecnicos'></tbody></table>");?>

<?=$componentesTablas->get__modal__edicion__parametros("cpacitacionME","Sección de capacitación (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__capacitacion'>Exportar a excel</a></div><br><table id='capacitacion__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__capacitacion__vs'></tbody></table><table id='capacitacion__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__capacitacion__vs__2'></tbody></table><table id='capacitacion__factureros__v'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__implementacion'></tbody></table><table id='capacitacion__otros__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__implementacion'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("cpacitacionTecnicoME","Sección de capacitación (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__capacitacion__tecnico'>Exportar a excel</a></div><br><table id='tecnico__capacitacion'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__capacitacion'></tbody></table><table id='tecnico__capacitacion__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__capacitacion__2'></tbody></table><table class='tabla__capacitacion__tecnicos'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__capacitacion__tecnicos'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("competenciaME","Sección de competencia (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__competencia'>Exportar a excel</a></div><br><table id='competencias__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Evento</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__competencia__administrativos'></tbody></table><table id='competencias__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Evento</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th></tr></thead><tbody class='cuerpo__competencia__administrativos__2'></tbody></table><table id='facturas__seguimientos__competencias__u'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__administrativos'></tbody></table><table id='otros__competencias__us'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__competencia'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("competencia__formativaME","Sección de formativo (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__competenciaF'>Exportar a excel</a></div><br><table id='tecnico__formativos'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th><center>Observaciones</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__formativos'></tbody></table><table id='tecnico__formativos__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th><center>Observaciones</center></th></tr></thead><tbody class='cuerpo__formativos__2'></tbody></table><table class='formativo__otros__tecnicos'><thead><tr><th style='display:none!important;'><center>Código Ítem</center></th><th style='display:none!important;'><center>Nombre Ítem</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='formativo__otros__tecnicos__cuerpo'></tbody></table>");?>

<?=$componentesTablas->get__modal__edicion__parametros("competencia__altoRenME","Sección de alto rendimiento (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__altoRer'>Exportar a excel</a></div><br><table id='tecnico__formativos'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Evento tarea<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Predicción<br>de resultados</center></th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__altos'></tbody></table><table id='tecnico__formativos__altos__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Evento tarea<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Predicción<br>de resultados</center></th><th style='vertical-align:middle;'><center>Oro</center></th><th style='vertical-align:middle;'><center>Plata<br>hombres</center></th><th><center>Bronce</center></th><th>Total<br>medallas</th><th>4to<br>al 8vo</th><th>Ánalisis<br>técnico<br>de la participación</th><th><center>Beneficiarios<br>mujeres</center></th><th>Beneficiarios<br>hombres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__altos__2'></tbody></table><table class='alto__otros__tecnicos'><thead><tr><th style='display:none!important;'><center>Código Ítem</center></th><th style='display:none!important;'><center>Nombre Ítem</center></th><th><center>Documento</center></th><th style='display:none!important;'><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='alto__otros__tecnicos__cuerpo'></tbody></table>");?>



<?=$componentesTablas->get__modal__edicion__parametros("RecreativaME","Sección de recreativo (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__recreativo'>Exportar a excel</a></div><br><table id='recreativo__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__recreativo__segumientos'></tbody></table><table id='recreativo__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th></tr></thead><tbody class='cuerpo__recreativo__segumientos__2'></tbody></table><table class='tabla__recreativas__ocultas__factureros'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__recreativos'></tbody></table><table class='tabla__recreativas__ocultas'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__recreativos'></tbody></table>");?>



<?=$componentesTablas->get__modal__edicion__parametros("RecreativaTecnicoME","Sección de reación (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__recreativo__tecnicos'>Exportar a excel</a></div><br><table id='tecnico__recracion'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th><center>Beneficiarios<br>hombres</center></th><th>Beneficiarios<br>mujeres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__recreacion'></tbody></table><table id='tecnico__recracion__2' style='display:none!important;'><thead><tr><th>Evento</th><th style='vertical-align:middle;'><center>Fecha<br>inicio</center></th><th style='vertical-align:middle;'><center>Fecha inicio<br>ejecutado</center></th><th style='vertical-align:middle;'><center>Fecha fin</center></th><th style='vertical-align:middle;'><center>Fecha fin<br>ejecutado</center></th><th><center>Beneficiarios<br>hombres</center></th><th>Beneficiarios<br>mujeres</th><th><center>Total<br>beneficiarios</center></th><th>Tipo<br>organizacion</th><th><center>Trimestre</center></th></tr></thead><tbody class='cuerpo__recreacion__2'></tbody></table><table class='recreativo__otros__tecnicos__si'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='recreativo__otros__tecnicos__cuerpo'></tbody></table>");?>


<?=$componentesTablas->get__modal__edicion__parametros("implementacionME","Sección de implementación (Ver)","<div class='col col-12'><a class='btn btn-primary' id='exportar__implementacion'>Exportar a excel</a></div><br><table id='implementacion__seguimientos'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th><th style='vertical-align:middle;'><center>Acciones</center></th></tr></thead><tbody class='cuerpo__competencia__implementaciones'></tbody></table><table id='implementacion__seguimientos__2' style='display:none!important;'><thead><tr><th style='vertical-align:middle;'><center>Mes</center></th><th style='vertical-align:middle;'><center>Código</center></th><th style='vertical-align:middle;'><center>Ítem</center></th><th style='vertical-align:middle;'><center>Monto<br>programado</center></th><th><center>Monto<br>ejecutado</center></th><th><center>Observaciones</center></th><th><center>Cantidad</center></th></tr></thead><tbody class='cuerpo__competencia__implementaciones__2'></tbody></table><table id='factureros__implementarciones__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Número de factura</center></th><th><center>Fecha<br>factura</center></th><th><center>Ruc</center></th><th><center>Autorización</center></th><th><center>Monto</center></th><th><center>Mes</center></th><th>Trimestre</th><th><center>Acciones</center></th></tr></thead><tbody class='factureros__implementacion'></tbody></table><table id='otros__implementaciones__ver'><thead><tr><th><center>Código Ítem</center></th><th><center>Nombre Ítem</center></th><th><center>Documento</center></th><th><center>Mes</center></th><th><center>Trimestre</center></th><th><center>Acciones</center></th></tr></thead><tbody class='otros__implementacion'></tbody></table>");?>



<!--====  End of Ver  ====-->
