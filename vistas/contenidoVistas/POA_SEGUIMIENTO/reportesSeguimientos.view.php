<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php $componentes = new componentes(); ?>

<?php $anioActual = date('Y'); ?>


<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $idOrganismo = $informacionObjeto[0][idOrganismo]; ?>


<?php session_start(); ?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>

<?php

$tipoOrganismosCa = $objetoInformacion->getObtenerInformacionGeneral("SELECT a3.accion AS tipoOrganismos__2 FROM poa_competencia_organismo_competencia AS a1 INNER JOIN poa_tipo_organismo AS a2 ON a1.idTipoOrganismo=a2.idTipoOrganismo INNER JOIN poa_area_accion AS a3 ON a3.idAreaAccion=a2.idAreaAccion WHERE a1.idOrganismo='$idOrganismo';");

if ($tipoOrganismosCa[0][tipoOrganismos__2] == "Educación Física") {
	$rotulos = "formativo";
} else if ($tipoOrganismosCa[0][tipoOrganismos__2] == "Recreación") {
	$rotulos = "recreativo";
} else {
	$rotulos = "alto__rendimientos";
}

if ($rotulos == "formativo") {
	$ruta = "documentos/seguimiento/informe__formativos/";
} else if ($rotulos == "recreativo") {
	$ruta = "documentos/seguimiento/informe__recreativos/";
} else {
	$ruta = "documentos/seguimiento/informes__altos/";
}

?>

<!--======================================
=            Primer trimestre            =
=======================================-->

<?php $reporteSeguimientosI = $objetoInformacion->getObtenerInformacionGeneral("SELECT documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='primerTrimestre' AND  perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;"); ?>

<?php $reporteInfraestructurasI = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='primerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;"); ?>

<?php $reporteTecnicosI = $objetoInformacion->getObtenerInformacionGeneral("SELECT archivo FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='primerTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='$rotulos' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idInformacionEnviada DESC LIMIT 1;"); ?>

<!--====  End of Primer trimestre  ====-->

<!--=======================================
=            Segundo trimestre            =
========================================-->

<?php $reporteSeguimientosII = $objetoInformacion->getObtenerInformacionGeneral("SELECT documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='segundoTrimestre' AND  perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;"); ?>

<?php $reporteInfraestructurasII = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='segundoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;"); ?>

<?php $reporteTecnicosII = $objetoInformacion->getObtenerInformacionGeneral("SELECT archivo FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='segundoTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='$rotulos' ORDER BY idInformacionEnviada DESC LIMIT 1;"); ?>

<!--====  End of Segundo trimestre  ====-->

<!--======================================
=            Tercer trimestre            =
=======================================-->

<?php $reporteSeguimientosIII = $objetoInformacion->getObtenerInformacionGeneral("SELECT documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='tercerTrimestre' AND  perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;"); ?>

<?php $reporteInfraestructurasIII = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='tercerTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;"); ?>

<?php $reporteTecnicosIII = $objetoInformacion->getObtenerInformacionGeneral("SELECT archivo FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='tercerTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='$rotulos' ORDER BY idInformacionEnviada DESC LIMIT 1;"); ?>

<!--====  End of Tercer trimestre  ====-->

<!--======================================
=            Cuarto trimestre            =
=======================================-->


<?php $reporteSeguimientosIV = $objetoInformacion->getObtenerInformacionGeneral("SELECT documentos FROM poa_seguimiento_recomendado_tecnico_seguimientos WHERE trimestre='cuartoTrimestre' AND  perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' ORDER BY idSeguimientosRecomendadosTe DESC LIMIT 1;"); ?>

<?php $reporteInfraestructurasIV = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.documentoInfras FROM poa_seguimiento_recomienda_tecnicos AS a WHERE a.trimestre='cuartoTrimestre' AND a.perioIngreso='$aniosPeriodos__ingesos' AND a.idOrganismo='$idOrganismo' AND a.tipoE='INFRA' ORDER BY a.idRecomendacionFuncionario DESC LIMIT 1;"); ?>

<?php $reporteTecnicosIV = $objetoInformacion->getObtenerInformacionGeneral("SELECT archivo FROM poa_seguimiento_recomendado_tecnico WHERE trimestre='cuartoTrimestre' AND perioIngreso='$aniosPeriodos__ingesos' AND idOrganismo='$idOrganismo' AND tipo='$rotulos' ORDER BY idInformacionEnviada DESC LIMIT 1;"); ?>

<!--====  End of Cuarto trimestre  ====-->



<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?= $componentes->getComponentes(1, "REPORTES DE SEGUIMIENTO"); ?>

		<div class="season_tabs">

			<div class="season_tab">

				<input type="radio" id="tab-1" name="tab-group-1" checked>

				<label for="tab-1" style="font-size: 2rem; text-align: center;">Primer Semestre</label>

				<div class="season_content row">

					<?php if (!empty($reporteTecnicosI[0][archivo])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="<?= $ruta . $reporteTecnicosI[0][archivo] ?>" target="_blank">

									<div class="enfacis__letras__reportes">Reporte técnico</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>
					<?php if (!empty($reporteTecnicosII[0][archivo])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="<?= $ruta . $reporteTecnicosII[0][archivo] ?>" target="_blank">

									<div class="enfacis__letras__reportes">Reporte técnico</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>

					<?php if (!empty($reporteInfraestructurasI[0][documentoInfras])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="documentos/seguimiento/informesInfraestructuras/<?= $reporteInfraestructurasI[0][documentoInfras] ?>" target='_blank'>

									<div class="enfacis__letras__reportes">Reporte Infraestructura y /o mantenimiento</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>
					<?php if (!empty($reporteInfraestructurasII[0][documentoInfras])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="documentos/seguimiento/informesInfraestructuras/<?= $reporteInfraestructurasII[0][documentoInfras] ?>" target='_blank'>

									<div class="enfacis__letras__reportes">Reporte Infraestructura y /o mantenimiento</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>

					<?php if (!empty($reporteSeguimientosI[0][documentos])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="documentos/seguimiento/informesSeguimientos/<?= $reporteSeguimientosI[0][documentos] ?>" target="_blank">

									<div class="enfacis__letras__reportes">Reporte presupuestario</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>
					<?php if (!empty($reporteSeguimientosII[0][documentos])) : ?>

						<div class="col col-4 row">

							<div class="col col-12 vertical__elementos">

								<a class="text-center" href="documentos/seguimiento/informesSeguimientos/<?= $reporteSeguimientosII[0][documentos] ?>" target="_blank">

									<div class="enfacis__letras__reportes">Reporte presupuestario</div>

									<i class="fa fa-file-pdf-o mt-2" aria-hidden="true" style="font-size: 105px!important;"></i>

								</a>

							</div>

						</div>

					<?php endif ?>

				</div>

			</div>


		</div>

	</section>

</div>