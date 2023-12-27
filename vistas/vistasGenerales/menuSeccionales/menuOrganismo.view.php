<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php

session_start();

$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];

?>




<?php $anioActual = date('Y'); ?>

<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $observaciones = $objetoInformacion->getObservacionesAprobacionUsuarios($informacionObjeto[0][idOrganismo]); ?>

<?php $observacionOrganismo = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $estadoFinal = $objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND  perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $estadoPAID = $objetoInformacion->getObtenerInformacionGeneral("SELECT COUNT(*) as existe,valor__comparativo FROM poa_paid_asignacion_dos where idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' and estado='A' and perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $ObtenernombreComponetesPAIDDesarrollo = $objetoInformacion->getObtenerInformacionGeneral("select b.idComponentes, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes,a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='1' and a.estado='A' GROUP BY b.nombreComponentes;"); ?>

<?php $ObtenernombreComponetesPAIDAR = $objetoInformacion->getObtenerInformacionGeneral("select b.idComponentes,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes, a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='0' and a.estado='A' GROUP BY b.nombreComponentes;"); ?>

<?php $ObtenernombreComponetesPAIDInfraestructura = $objetoInformacion->getObtenerInformacionGeneral("select b.idComponentes, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.nombreComponentes, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreComponentes,a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='2' and a.estado='A' GROUP BY b.nombreComponentes;"); ?>


<?php $estadoPAIDTipo = $objetoInformacion->getObtenerInformacionGeneral("SELECT valor__comparativo FROM poa_paid_asignacion_dos where idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' and estado='A' and perioIngreso='$aniosPeriodos__ingesos'"); ?>

<?php $informacionSeleccionada__remanentes = $objetoInformacion->getObtenerInformacionGeneral("SELECT idRemanentes,monto__incrementoRemantes,archivo__saldoEstados,monto__autogestion FROM poa_remanentes_monto_asignacion WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' ORDER BY idRemanentes DESC LIMIT 1;"); ?>

<?php $informacionSeleccionada__remanentes__seleccionables = $objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_remanentes_informacion_organismo WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $cierres__anios = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_cierre_fiscal WHERE periodo='$aniosPeriodos__ingesos' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='si';"); ?>

<?php $cierres__anios__trasnferencia = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_cierre_fiscal_transferencia WHERE periodo='$aniosPeriodos__ingesos' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='si';"); ?>

<?php $cierres__anios__modificaciones = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_cierre_fiscal_paid_modificaciones WHERE periodo='$aniosPeriodos__ingesos' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='si';"); ?>


<?php $cierres__anios__paid = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_cierre_fiscal_paid WHERE periodo='$aniosPeriodos__ingesos' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='si';"); ?>

<?php $envio__inicial__preliminal = $objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_preliminar_envio WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "';"); ?>

<?php
$idOrganismoSession = $informacionObjeto[0][idOrganismo];
$nombreOD = $informacionObjeto[0][nombreOrganismo];
$_SESSION["idOrganismoSession"] = $idOrganismoSession;
$_SESSION["nombreOD"] = $nombreOD;
$seleccionPoaPaid = $_SESSION["seleccionPaidPoa"];
?>

<?php $EstadoIncremento = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.incrementoDecremento  FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE  a1.incrementoDecremento IN ('decremento', 'incremento') AND a1.idOrganismo='$idOrganismoSession' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a2.idInversion DESC LIMIT 1;
"); ?>

<?php $estadoReporteEnvioIncre = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.fecha,a.hora,IF(a.estado = 'E', 'Recibido', 'Eliminado') AS estado,a.tramite,a.documento  FROM poa_incrementos_notificacion AS a INNER JOIN poa_organismo AS b ON a.idOrganismo = b.idOrganismo WHERE a.perioIngreso='$aniosPeriodos__ingesos' AND b.idOrganismo ='$idOrganismoSession';"); ?>

<?php
$perfilObservador = $_SESSION["perfilObservador"];
?>

<?php $cuartoTrimestreCerrado = $objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_trimestrales WHERE tipoTrimestre='cuartoTrimestre' AND idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<input type="hidden" id="fechaPrincipalJ" name="fechaPrincipalJ" />

<input type="hidden" id="organismoIdPrin" name="organismoIdPrin" value="<?= $informacionObjeto[0][idOrganismo] ?>">

<li class="nav-item">

	<a href="datosGenerales" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'datosGenerales'); ?>">

		<p>Datos generales</p>

	</a>

</li>

<?php if ($seleccionPoaPaid == 1) : ?>

	<?php if (empty($perfilObservador)) { ?>

		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("planificacion", "ventanaObservaciones", "reporteriaOrganismos", "replicarInformacion", "flujoTransferencias")); ?>">

			<a href="#" class="nav-link">
				<i class="fa fa-hand-holding-usd"></i>
				&nbsp;
				<p>
					POA
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<?php if (empty($cierres__anios[0][estado])) : ?>

					<?php if ($informacionObjeto[0][activado] == "A" && !empty($informacionObjeto[0][periodo]) && $informacionObjeto[0][periodo] != null  && !empty($informacionObjeto[0][idInversion])) : ?>

						<li class="nav-item">

							<a href="planificacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'planificacion'); ?>">
								<i class="fa fa-file-invoice-dollar"></i>
								&nbsp;
								<p>Registro de presupuesto</p>

							</a>

						</li>

					<?php endif ?>

					<?php if (!empty($observacionOrganismo[0][estado]) && $observacionOrganismo[0][estado] != null && $observacionOrganismo[0][estado] == "A") : ?>

						<li class="nav-item">

							<a href="ventanaObservaciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'ventanaObservaciones'); ?>">
								<i class="fa fa-eye"></i>
								&nbsp;
								<p>Ventana de observaciones</p>

							</a>

						</li>

					<?php endif ?>

					<?php if (empty($estadoFinal[0][idOrganismo])) : ?>


						<li class="nav-item">

							<a href="replicarInformacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'replicarInformacion'); ?>">
								<i class="fa fa-copy"></i>
								&nbsp;
								<p>Copia catalogo año anterior</p>

							</a>

						</li>

					<?php endif ?>


				<?php endif ?>

				<li class="nav-item">

					<a href="reporteriaOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaOrganismos'); ?>">
						<i class="fa fa-file-alt"></i>
						&nbsp;
						<p>Reportería</p>

					</a>

				</li>

			</ul>

		</li>


		<?php if (!empty($EstadoIncremento[0][incrementoDecremento]) && !empty($estadoReporteEnvioIncre)) : ?>



			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("reporteriaFinalIncrementos")); ?>">

				<a href="#" class="nav-link">
					<i class="fa fa-dollar-sign"></i>
					&nbsp;
					<p>
						<?= $EstadoIncremento[0][incrementoDecremento] ?>
						<i class="fa fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="reporteriaIncreDecreOrganismo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaIncreDecreOrganismo'); ?>">
							<i class="fa fa-file-alt"></i>
							&nbsp;
							<p>Reportería</p>
						</a>

					</li>

					<?php if ($EstadoIncremento[0][incrementoDecremento] == "incremento") : ?>
						<li class="nav-item">

							<a href="modificarInformacionIncremento" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificarInformacionIncremento'); ?>">
								<i class="fa fa-tasks"></i>
								&nbsp;
								<p>Modificar Información</p>
							</a>

						</li>

						<li class="nav-item">

							<a href="crearInformacionIncremento" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'crearInformacionIncremento'); ?>">
								<i class="fa fa-file-signature"></i>
								&nbsp;
								<p>Crear</p>
							</a>

						</li>

					<?php endif ?>

					<li class="nav-item">

						<a href="incrementosOrganismo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosOrganismo'); ?>">
							<i class="fa fa-hand-holding-usd"></i>
							&nbsp;
							<p>Asignar Montos</p>
						</a>

					</li>
				</ul>

			</li>

		<?php endif ?>

		<?php if (empty($EstadoIncremento[0][incrementoDecremento])) : ?>

			<?php if (!empty($estadoFinal[0][idOrganismo]) && $estadoFinal[0][idOrganismo] != null && !empty($informacionObjeto[0][idInversion])) : ?>

				<?php if (empty($cierres__anios__trasnferencia[0][estado])) : ?>

					<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("registroTrasnferencia")); ?>">

						<a href="#" class="nav-link">
							<i class="fa fa-exchange-alt"></i>
							&nbsp;
							<p>
								TRANSFERENCIA
								<i class="fas fa-angle-left right"></i>
								<span class="badge badge-info right"></span>
							</p>
						</a>

						<ul class="nav nav-treeview">

							<li class="nav-item">

								<a href="registroTrasnferencia" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'registroTrasnferencia'); ?>">
									<i class="fa fa-edit"></i>
									&nbsp;
									<p>Registro de transferencia</p>

								</a>

							</li>

						</ul>


					</li>


				<?php endif ?>

				<?php if ($aniosPeriodos__ingesos == 2022 || ($aniosPeriodos__ingesos == 2023 && ($idOrganismoSession == '1586' ||  $idOrganismoSession == '1421' ||  $idOrganismoSession == '1166' ||  $idOrganismoSession == '1440' ||  $idOrganismoSession == '1428' ||  $idOrganismoSession == '1057' ||  $idOrganismoSession == '1635' ||  $idOrganismoSession == '1407' ||  $idOrganismoSession == '1360' ||  $idOrganismoSession == '1641' ||  $idOrganismoSession == '1194' ||  $idOrganismoSession == '1486' ||  $idOrganismoSession == '1225' ||  $idOrganismoSession == '1379' ||  $idOrganismoSession == '1317' ||  $idOrganismoSession == '1473'  ||  $idOrganismoSession == '1146' ||  $idOrganismoSession == '1619' ||  $idOrganismoSession == '1062' ||  $idOrganismoSession == '1173' ||  $idOrganismoSession == '1246' ||  $idOrganismoSession == '1393' ||  $idOrganismoSession == '1385' ||  $idOrganismoSession == '1093' ||  $idOrganismoSession == '1106' ||  $idOrganismoSession == '1188' ||  $idOrganismoSession == '1158' ||  $idOrganismoSession == '1368' ||  $idOrganismoSession == '1071' ||  $idOrganismoSession == '1084' ||  $idOrganismoSession == '1148' ||  $idOrganismoSession == '1137' ||  $idOrganismoSession == '1053' ||  $idOrganismoSession == '1367' ||  $idOrganismoSession == '1147' ||  $idOrganismoSession == '1111' ||  $idOrganismoSession == '1344' ||  $idOrganismoSession == '1069' ||  $idOrganismoSession == '1079' ||  $idOrganismoSession == '1169' ||  $idOrganismoSession == '1372' ||  $idOrganismoSession == '1588' ||  $idOrganismoSession == '1622' ||  $idOrganismoSession == '1559' ||  $idOrganismoSession == '1536' ||  $idOrganismoSession == '1322' ||  $idOrganismoSession == '1627' ||  $idOrganismoSession == '1446' ||  $idOrganismoSession == '1410' ||  $idOrganismoSession == '1475' ||  $idOrganismoSession == '1458' ||  $idOrganismoSession == '1577' ||  $idOrganismoSession == '1523' ||  $idOrganismoSession == '1438' ||  $idOrganismoSession == '1255' ||  $idOrganismoSession == '1082' ||  $idOrganismoSession == '1542' ||  $idOrganismoSession == '1319' ||  $idOrganismoSession == '1725' ||  $idOrganismoSession == '1195' ||  $idOrganismoSession == '1226' ||  $idOrganismoSession == '1196' ||  $idOrganismoSession == '1595' ||  $idOrganismoSession == '1192' ||  $idOrganismoSession == '1384' ||  $idOrganismoSession == '1268' ||  $idOrganismoSession == '1278' ||  $idOrganismoSession == '1396' ||  $idOrganismoSession == '1422' ||  $idOrganismoSession == '1174' ||  $idOrganismoSession == '1503' ||  $idOrganismoSession == '1240' ||  $idOrganismoSession == '1221' ||  $idOrganismoSession == '1073' ||  $idOrganismoSession == '1662' ||  $idOrganismoSession == '1235' ||  $idOrganismoSession == '1296' ||  $idOrganismoSession == '1280' ||  $idOrganismoSession == '1274' ||  $idOrganismoSession == '1250' ||  $idOrganismoSession == '1293' ||  $idOrganismoSession == '1684' ||  $idOrganismoSession == '1247' ||  $idOrganismoSession == '1213' ||  $idOrganismoSession == '1324' ||  $idOrganismoSession == '1655' ||  $idOrganismoSession == '1241' ||  $idOrganismoSession == '1314' ||  $idOrganismoSession == '1335' ||  $idOrganismoSession == '1294' ||  $idOrganismoSession == '1217' ||  $idOrganismoSession == '1181' ||  $idOrganismoSession == '1321' ||  $idOrganismoSession == '1355' ||  $idOrganismoSession == '1386' ||  $idOrganismoSession == '1233' ||  $idOrganismoSession == '1556' ||  $idOrganismoSession == '1412' ||  $idOrganismoSession == '1331' ||  $idOrganismoSession == '1320' ||  $idOrganismoSession == '1354' ||  $idOrganismoSession == '1680' ||  $idOrganismoSession == '1343' ||  $idOrganismoSession == '1569' ||  $idOrganismoSession == '1433' ||  $idOrganismoSession == '1301' ||  $idOrganismoSession == '1573' ||  $idOrganismoSession == '1399' ||  $idOrganismoSession == '1351' ||  $idOrganismoSession == '1427' ||  $idOrganismoSession == '1480' ||  $idOrganismoSession == '1562' ||  $idOrganismoSession == '1471' ||  $idOrganismoSession == '1459' ||  $idOrganismoSession == '1347' ||  $idOrganismoSession == '1403' ||  $idOrganismoSession == '1424'))) : ?>


					<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimiento", "seguimientoRe", "seguimientoControlC", "reportesSeguimientos", "reporteAnexosOD")); ?>">

						<a href="#" class="nav-link">
							<i class="fa fa-search"></i>
							&nbsp;
							<p>
								SEGUIMIENTO Y EVALUACIÓN
								<i class="fas fa-angle-left right"></i>
								<span class="badge badge-info right"></span>
							</p>
						</a>

						<ul class="nav nav-treeview">

							<?php if (empty($cierres__anios__paid[0][estado]) && empty($cuartoTrimestreCerrado[0][idOrganismo])) : ?>

								<li class="nav-item">

									<a href="seguimiento" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimiento'); ?>">
										<i class="fa fa-clipboard-list"></i>
										&nbsp;
										<p>Registro de Información</p>

									</a>

								</li>

							<?php endif ?>


							<?php if (empty($cierres__anios__paid[0][estado])) : ?>


								<li class="nav-item">

									<a href="seguimientoControlC" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoControlC'); ?>">
										<i class="fa fa-sync"></i>
										&nbsp;
										<p>Control de Cambios</p>

									</a>

								</li>

							<?php endif ?>

							<li class="nav-item">


								<a href="reportesSeguimientos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reportesSeguimientos'); ?>">
									<i class="fa fa-chart-line"></i>
									&nbsp;
									<p>Reporte de seguimiento</p>

								</a>

							</li>

							<li class="nav-item">

								<a href="seguimientoRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRe'); ?>">
									<i class="fa fa-file-alt"></i>
									&nbsp
									<p>Reportería</p>

								</a>

							</li>

							<?php if (intval($_SESSION["selectorAniosA"]) >= 2023) : ?>

								<li class="nav-item">


									<a href="reporteAnexosOD" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosOD'); ?>">
										<i class="fas fa-file-invoice" style="color: #cbcdd9;"></i>
										&nbsp
										<p>Reporte y anexos</p>
									</a>

								</li>

							<?php endif ?>

						</ul>

					</li>

				<?php endif ?>

				<?php if ($_SESSION["password"] == "7\F;ofMK)5/cG1s~") : ?>

					<?php if ($aniosPeriodos__ingesos == 2022 || $aniosPeriodos__ingesos == 2023) : ?>


						<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("modificacionesOrganismo", "infraestructuraOrganismo", "modificacionesMontos", "modificacionesSueldosSalarios", "modificacionesInformes", "modificacionesCuadroAvances", "dashboard", "modificacionesDesvinculacion", "modificaciones2022", "modificarInformacion", "crearInformacion", "estadoTramitesModificaciones")); ?>">

							<a href="#" class="nav-link">
								<p>
									MODIFICACIONES
									<i class="fas fa-angle-left right"></i>
									<span class="badge badge-info right"></span>
								</p>
							</a>

							<ul class="nav nav-treeview">

								<li class="nav-item">

									<a href="modificaciones2022" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificaciones2022'); ?>">

										<i class="fa fa-pencil-alt"></i>
										&nbsp;
										<p>Modificaciones <?= $aniosPeriodos__ingesos ?></p>

									</a>

								</li>

							</ul>

						</li>


						<?php if (!empty($informacionSeleccionada__remanentes[0][idRemanentes]) && !empty($informacionObjeto[0][idInversion])) : ?>

							<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("remanentes", "reportesRemanentes", "resumenRemanente")); ?>">

								<a href="#" class="nav-link">
									<i class="fa fa-coins"></i>
									&nbsp;
									<p>
										REMANENTE
										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-info right"></span>
									</p>
								</a>

								<ul class="nav nav-treeview">

									<?php if (empty($informacionSeleccionada__remanentes__seleccionables[0][idOrganismo])) : ?>


										<li class="nav-item">

											<a href="remanentes" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'remanentes'); ?>">
												<i class="fa fa-clipboard-list"></i>
												&nbsp;
												<p>Registro remanentes</p>

											</a>

										</li>

									<?php endif ?>


									<li class="nav-item">


										<a href="resumenRemanente" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenRemanente'); ?>">
											<i class="fa fa-list-alt"></i>
											&nbsp;
											<p>Resumen remanente</p>

										</a>

									</li>

								</ul>



							</li>

						<?php endif ?>

					<?php else : ?>



						<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("modificacionesOrganismo", "infraestructuraOrganismo", "modificacionesMontos", "modificacionesSueldosSalarios", "modificacionesInformes", "modificacionesCuadroAvances", "dashboard", "modificacionesDesvinculacion", "modificaciones2022", "modificarInformacion", "crearInformacion", "estadoTramitesModificaciones", "reporteriaModi")); ?>">

							<a href="#" class="nav-link">
								<p>
									<i class="fa fa-chart-line"></i>
									&nbsp;
									MODIFICACIONES
									<i class="fas fa-angle-left right"></i>
									<span class="badge badge-info right"></span>
								</p>
							</a>

							<ul class="nav nav-treeview">

								<?php if (empty($cierres__anios__modificaciones[0][estado])) : ?>


									<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("modificarInformacion", "crearInformacion", "modificacionesOrganismo", "reportesSeguimientos")); ?>">

										<a href="#" class="nav-link">
											<p>
												<i class="fa fa-chart-line"></i>
												&nbsp;
												Act. 01, 02, 03, 05, 06 y 07
												<i class="fas fa-angle-left right"></i>
												<span class="badge badge-info right"></span>
											</p>
										</a>

										<ul class="nav nav-treeview">

											<?php if (empty($cierres__anios__paid[0][estado]) && empty($cuartoTrimestreCerrado[0][idOrganismo])) : ?>

												<li class="nav-item">

													<a href="modificarInformacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificarInformacion'); ?>">
														<p>Modificar Información</p>
													</a>

												</li>

											<?php endif ?>


											<?php if (empty($cierres__anios__paid[0][estado])) : ?>


												<li class="nav-item">

													<a href="crearInformacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'crearInformacion'); ?>">
														<p>Crear </p>
													</a>

												</li>

											<?php endif ?>

											<li class="nav-item">

												<a href="modificacionesOrganismo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesOrganismo'); ?>">
													<p>Asignar Montos</p>
												</a>

											</li>

										</ul>

									</li>

									<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("modificacionesMontos", "modificacionesSueldosSalarios", "modificacionesDesvinculacion")); ?>">

										<a href="#" class="nav-link">
											<p>
												<i class="fa fa-chart-line"></i>
												&nbsp;
												Honarios, Sueldos y Salarios
												<i class="fas fa-angle-left right"></i>
												<span class="badge badge-info right"></span>
											</p>
										</a>

										<ul class="nav nav-treeview">

											<li class="nav-item">

												<a href="modificacionesMontos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesMontos'); ?>">
													<p>Honorarios Act. 04</p>
												</a>

											</li>


											<li class="nav-item">

												<a href="modificacionesSueldosSalarios" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesSueldosSalarios'); ?>">
													<p>Sueldos y Salarios Act. 04</p>
												</a>

											</li>


											<li class="nav-item">

												<a href="modificacionesDesvinculacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesDesvinculacion'); ?>">
													<p>Desvinculación</p>
												</a>

											</li>

										</ul>

									</li>

								<?php endif ?>

								<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("estadoTramitesModificaciones", "dashboard", "reporteriaModi")); ?>">

									<a href="#" class="nav-link">
										<p>
											Reporte
											<i class="fas fa-angle-left right"></i>
											<span class="badge badge-info right"></span>
										</p>
									</a>

									<ul class="nav nav-treeview">

										<li class="nav-item">

											<a href="estadoTramitesModificaciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'estadoTramitesModificaciones'); ?>">

												<p>Trámites generados</p>

											</a>

										</li>

										<li class="nav-item">

											<a href="reporteriaModi" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaModi'); ?>">

												<p>Reportería</p>

											</a>

										</li>

									</ul>

								</li>

							</ul>

						</li>


					<?php endif ?>

				<?php endif ?>

			<?php endif ?>

		<?php endif ?>

	<?php } else { ?>
		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("planificacion", "ventanaObservaciones", "reporteriaOrganismos", "replicarInformacion", "flujoTransferencias")); ?>">

			<a href="#" class="nav-link">
				<i class="fa fa-hand-holding-usd"></i>
				&nbsp;
				<p>
					POA
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<?php if (empty($cierres__anios[0][estado])) : ?>

					<?php if ($informacionObjeto[0][activado] == "A" && !empty($informacionObjeto[0][periodo]) && $informacionObjeto[0][periodo] != null  && !empty($informacionObjeto[0][idInversion])) : ?>

						<li class="nav-item">

							<a href="planificacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'planificacion'); ?>">
								<i class="fa fa-file-invoice-dollar"></i>
								&nbsp;
								<p>Registro de presupuesto</p>

							</a>

						</li>

					<?php endif ?>

					<?php if (!empty($observacionOrganismo[0][estado]) && $observacionOrganismo[0][estado] != null && $observacionOrganismo[0][estado] == "A") : ?>

						<li class="nav-item">

							<a href="ventanaObservaciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'ventanaObservaciones'); ?>">
								<i class="fa fa-eye"></i>
								&nbsp;
								<p>Ventana de observaciones</p>

							</a>

						</li>

					<?php endif ?>

					<?php if (empty($estadoFinal[0][idOrganismo])) : ?>


						<li class="nav-item">

							<a href="replicarInformacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'replicarInformacion'); ?>">
								<i class="fa fa-copy"></i>
								&nbsp;
								<p>Copia catalogo año anterior</p>

							</a>

						</li>

					<?php endif ?>


				<?php endif ?>

				<li class="nav-item">

					<a href="reporteriaOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaOrganismos'); ?>">
						<i class="fa fa-file-alt"></i>
						&nbsp;
						<p>Reportería</p>

					</a>

				</li>

			</ul>



		</li>
	<?php } ?>

<?php endif ?>



<?php if ($estadoPAID[0][existe] > 0) : ?>

	<?php if ($seleccionPoaPaid == 2) : ?>

		<?php if ($estadoPAIDTipo[0][valor__comparativo] == 0) : ?>

			<li class="nav-item">

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("planificacion", "ventanaObservaciones", "reporteriaOrganismos", 'generalDeporteAR', 'paidRubrosEventos', 'paidRubrosInterdisciplinario', 'paidRubrosNecesidadesIndividuales', 'paidRubrosNecesidadesGenerales')); ?>">

				<a href="#" class="nav-link">
					<i class="fa fa-running"></i>
					&nbsp;
					<p>
						Fortalecimiento del deporte de alto rendimiento del ecuador
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="generalDeporteAR" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'generalDeporteAR'); ?>">
							<i class="fa fa-globe"></i>
							&nbsp;
							<p>General</p>

						</a>

					</li>

					<?php for ($t = 0; $t < count($ObtenernombreComponetesPAIDAR); $t++) { ?>

						<?php if ($ObtenernombreComponetesPAIDAR[$t][montos] > 0) { ?>


							<li class="nav-item  <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array('paidRubrosEventos', 'paidRubrosInterdisciplinario', 'paidRubrosNecesidadesIndividuales', 'paidRubrosNecesidadesGenerales')); ?>">


								<?php $componentePAID = $ObtenernombreComponetesPAIDAR[$t][nombreComponentes]; ?>

								<?php $IDcomponentePAID = $ObtenernombreComponetesPAIDAR[$t][idComponentes]; ?>


								<a href="#" class="nav-link">
									<i class="fa fa-user"></i>
									&nbsp;
									<p class="nombrerubroPaidDesarrollo1" nombre="<?php echo "$componentePAID"; ?>" idRubro="<?php echo "$IDcomponentePAID"; ?>"> <?php echo "$componentePAID"; ?>


										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-info right"></span>
									</p>
								</a>

								<ul class="nav nav-treeview">


									<?php $ObtenerNombreRubrosPAID = $objetoInformacion->getObtenerInformacionGeneral("select c.idRubros, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros, a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='0' and a.estado='A'  AND b.idComponentes='" . $IDcomponentePAID . "' ;"); ?>


									<?php for ($i = 0; $i < count($ObtenerNombreRubrosPAID); $i++) { ?>

										<?php $cadena = str_replace(' ', '', $ObtenerNombreRubrosPAID[$i][nombreRubros]); ?>

										<?php $rubroPAID = $ObtenerNombreRubrosPAID[$i][nombreRubros]; ?>
										<?php $IDrubroPAID = $ObtenerNombreRubrosPAID[$i][idRubros]; ?>



										<?php if (strpos(strtolower($rubroPAID), "eventos") !== false && $ObtenerNombreRubrosPAID[$i][montos] > 0) { ?>
											<li class="nav-item paid">

												<a href="paidRubrosEventos" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidRubrosEventos'); ?>">
													<i class="far fa-calendar"></i>
													&nbsp;
													<p class="nombrerubroPaidAR"> <?php echo "$rubroPAID"; ?></p>

												</a>

											</li>

										<?php } else if (strpos(strtolower($rubroPAID), "interdisciplinario") !== false  && $ObtenerNombreRubrosPAID[$i][montos] > 0) { ?>

											<li class="nav-item paid">

												<a href="paidRubrosInterdisciplinario" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidRubrosInterdisciplinario'); ?>">
													<i class="fa fa-sitemap"></i>
													&nbsp;
													<p class="nombrerubroPaidAR"> <?php echo "$rubroPAID"; ?></p>

												</a>

											</li>

										<?php } else if (strpos(strtolower($rubroPAID), "individuales") !== false  && $ObtenerNombreRubrosPAID[$i][montos] > 0) { ?>

											<li class="nav-item paid">

												<a href="paidRubrosNecesidadesIndividuales" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidRubrosNecesidadesIndividuales'); ?>">
													<i class="fa fa-user"></i>
													&nbsp;
													<p class="nombrerubroPaidAR"> <?php echo "$rubroPAID"; ?></p>

												</a>

											</li>

										<?php } else if (strpos(strtolower($rubroPAID), "generales") !== false && $ObtenerNombreRubrosPAID[$i][montos] > 0) { ?>

											<li class="nav-item paid">

												<a href="paidRubrosNecesidadesGenerales" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidRubrosNecesidadesGenerales'); ?>">
													<i class="fa fa-users"></i>
													&nbsp;
													<p class="nombrerubroPaidAR"> <?php echo "$rubroPAID"; ?></p>

												</a>

											</li>

										<?php } ?>


									<?php } ?>

								</ul>
							</li>
						<?php } ?>
					<?php } ?>

				</ul>

			</li>

			</li>

		<?php endif ?>

		<?php if ($estadoPAIDTipo[0][valor__comparativo] == 1) : ?>

			<li class="nav-item">



			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("planificacion", "ventanaObservaciones", "reporteriaOrganismos", 'generalDeporteEA', 'paidRubrosEncuentroActivo', 'paidMedallasEncuentroActivo', 'paidMatrizGeneralEncuentroActivo', 'paidSeleccionJuegosNacionales', 'paidPersonaTecnicoConvencional', 'paidBonoDeportivo', 'paidUniformesAdaptado', 'paidSeguros', 'paidTransporte', 'paidPasajesAereos', 'paidEventosDesarrollo')); ?>">


				<a href="#" class="nav-link">
					<i class="fa fa-futbol"></i>
					&nbsp;
					<p>Encuentro activo del deporte para el desarrollo
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="generalDeporteEA" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'generalDeporteEA'); ?>">
							<i class="fa fa-globe"></i>
							&nbsp;
							<p>General</p>

						</a>

					</li>


					<?php for ($j = 0; $j < count($ObtenernombreComponetesPAIDDesarrollo); $j++) { ?>

						<?php if ($ObtenernombreComponetesPAIDDesarrollo[$j][montos] > 0) { ?>

							<li class="nav-item  <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array('paidSeleccionJuegosNacionales', 'paidMedallasEncuentroActivo', 'paidMatrizGeneralEncuentroActivo', 'paidSeleccionJuegosNacionales', 'paidPersonaTecnicoConvencional', 'paidBonoDeportivo', 'paidUniformesAdaptado', 'paidSeguros', 'paidTransporte', 'paidPasajesAereos', 'paidEventosDesarrollo')); ?>">


								<?php $componentePAID = $ObtenernombreComponetesPAIDDesarrollo[$j][nombreComponentes]; ?>

								<?php $IDcomponentePAID = $ObtenernombreComponetesPAIDDesarrollo[$j][idComponentes]; ?>


								<a href="#" class="nav-link">
									<i class="fa fa-money"></i>
									&nbsp;
									<p nombre="<?php echo "$componentePAID"; ?>"> <?php echo "$componentePAID"; ?>

										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-info right"></span>
									</p>
								</a>

								<ul class="nav nav-treeview">


									<?php $ObtenerNombreRubrosPAID = $objetoInformacion->getObtenerInformacionGeneral("select c.idRubros, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros, a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='1' and a.estado='A'  AND b.idcomponentes='" . $IDcomponentePAID . "' ;"); ?>

									<?php for ($i = 0; $i < count($ObtenerNombreRubrosPAID); $i++) { ?>


										<?php $cadena = str_replace(' ', '', $ObtenerNombreRubrosPAID[$i][nombreRubros]); ?>


										<?php if ($ObtenerNombreRubrosPAID[$i][montos] > 0) {  ?>
											<li class="nav-item  <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array('paidSeleccionJuegosNacionales', 'paidMedallasEncuentroActivo', 'paidMatrizGeneralEncuentroActivo', 'paidSeleccionJuegosNacionales', 'paidPersonaTecnicoConvencional', 'paidBonoDeportivo', 'paidUniformesAdaptado', 'paidSeguros', 'paidTransporte', 'paidPasajesAereos', 'paidEventosDesarrollo')); ?>">


												<?php $rubroPAID = $ObtenerNombreRubrosPAID[$i][nombreRubros]; ?>
												<?php $IDrubroPAID = $ObtenerNombreRubrosPAID[$i][idRubros]; ?>

												<a href="#" class="nav-link">
													<i class="fa fa-money"></i>
													&nbsp;
													<p> <?php echo "$rubroPAID"; ?>

														<i class="fas fa-angle-left right"></i>
														<span class="badge badge-info right"></span>
													</p>
												</a>

												<ul class="nav nav-treeview">

													<li class="nav-item paid">

														<a href="paidEventosDesarrollo" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidEventosDesarrollo'); ?>">
															<i class="fa fa-volleyball-ball"></i>
															&nbsp;
															<p Style="margin-left:20px">Eventos</p>

														</a>


													</li>

													<li class="nav-item paid">

														<a href="paidSeleccionJuegosNacionales" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidSeleccionJuegosNacionales'); ?>">
															<i class="fa fa-volleyball-ball"></i>
															&nbsp;
															<p Style="margin-left:20px">Hospedaje/AlimentaciónHidratación</p>

														</a>


													</li>

													<li class="nav-item paid">

														<a href="paidMedallasEncuentroActivo" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidMedallasEncuentroActivo'); ?>">
															<i class="fa fa-medal"></i>
															&nbsp;
															<p class="nombrerubroPaidDesarrollo" Style="margin-left:20px" nombrerubropaid="<?php echo "$rubroPAID"; ?>">Medallas</p>

														</a>

													</li>

													<li class="nav-item paid">

														<a href="paidMatrizGeneralEncuentroActivo" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidMatrizGeneralEncuentroActivo'); ?>">
															<i class="fa fa-file-signature"></i>
															&nbsp;
															<p Style="margin-left:20px">Matrices Auxiliares</p>

														</a>

													</li>

													<li class="nav-item paid">

														<a href="paidPersonaTecnicoConvencional" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidPersonaTecnicoConvencional'); ?>">
															<i class="fa fa-user-tie"></i>
															&nbsp;
															<p Style="margin-left:20px">Personal Técnico</p>

														</a>

													</li>

													<li class="nav-item paid">

														<a href="paidBonoDeportivo" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidBonoDeportivo'); ?>">
															<i class="fa fa-money-check-alt"></i>
															&nbsp;
															<p Style="margin-left:20px">Bono Deportivo </p>


														</a>

													</li>

													<li class="nav-item paid">

														<a href="paidUniformesAdaptado" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidUniformesAdaptado'); ?>">
															<i class="fa fa-tshirt"></i>
															&nbsp;
															<p Style="margin-left:20px">Uniformes</p>

														</a>


													</li>

													<li class="nav-item paid">

														<a href="paidSeguros" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidSeguros'); ?>">
															<i class="fa fa-shield-alt"></i>
															&nbsp;
															<p Style="margin-left:20px">Seguros</p>

														</a>


													</li>

													<li class="nav-item paid">

														<a href="paidTransporte" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidTransporte'); ?>">
															<i class="fa fa-shuttle-van"></i>
															&nbsp;
															<p Style="margin-left:20px">Transporte</p>

														</a>


													</li>
													<li class="nav-item paid">

														<a href="paidPasajesAereos" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidPasajesAereos'); ?>">
															<i class="fas fa-plane" style="color: #C2C7D0;"></i>
															&nbsp;
															<p Style="margin-left:20px">Pasajes Aereos</p>

														</a>


													</li>






												</ul>


											</li>
										<?php  } ?>

									<?php } ?>
								</ul>
							</li>
						<?php } ?>
					<?php } ?>





				</ul>



			</li>


			</li>

		<?php endif ?>

		<?php if ($estadoPAIDTipo[1][valor__comparativo] == 2 || $estadoPAIDTipo[0][valor__comparativo] == 2) : ?>

			<li class="nav-item">

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("planificacion", "ventanaObservaciones", "reporteriaOrganismos", 'generalDeporteInfra', 'paidRubrosEncuentroActivo', 'paidEjecucionObraInfraestructura', 'paidFiscalizacionInfraestructura')); ?>">


				<a href="#" class="nav-link">
					<i class="fas fa-gopuram" style="color: #cbcdd9;"></i>
					&nbsp;
					<p>Optimización de Infraestructura Deportiva a Nivel Nacional
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="generalDeporteInfra" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'generalDeporteInfra'); ?>">
							<i class="fa fa-globe"></i>
							&nbsp;
							<p>General</p>

						</a>

					</li>


					<?php for ($j = 0; $j < count($ObtenernombreComponetesPAIDInfraestructura); $j++) { ?>

						<?php if ($ObtenernombreComponetesPAIDInfraestructura[$j][montos] > 0) { ?>

							<li class="nav-item  <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array('paidEjecucionObraInfraestructura', 'paidFiscalizacionInfraestructura')); ?>">


								<?php $componentePAID = $ObtenernombreComponetesPAIDInfraestructura[$j][nombreComponentes]; ?>

								<?php $IDcomponentePAID = $ObtenernombreComponetesPAIDInfraestructura[$j][idComponentes]; ?>


								<a href="#" class="nav-link">
									<i class="fas fa-wrench" style="color: #cbcdd9;"></i>
									&nbsp;
									<p nombre="<?php echo "$componentePAID"; ?>"> <?php echo "$componentePAID"; ?>

										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-info right"></span>
									</p>
								</a>

								<ul class="nav nav-treeview">


									<?php $ObtenerNombreRubrosPAIDInfraestructura = $objetoInformacion->getObtenerInformacionGeneral("select c.idRubros, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombreRubros, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreRubros, a.montos FROM poa_paid_asignacion AS a INNER JOIN poa_paid_componentes AS b ON a.idComponentes=b.idComponentes INNER JOIN poa_paid_rubros AS c ON c.idRubros=a.idRubros where a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "'  and a.perioIngreso='$aniosPeriodos__ingesos' and a.valor__comparativo='2' and a.estado='A'  AND b.idcomponentes='" . $IDcomponentePAID . "' ;"); ?>

									<?php for ($i = 0; $i < count($ObtenerNombreRubrosPAIDInfraestructura); $i++) { ?>


										<?php $cadena = str_replace(' ', '', $ObtenerNombreRubrosPAIDInfraestructura[$i][nombreRubros]); ?>


										<?php if ($ObtenerNombreRubrosPAIDInfraestructura[$i][montos] > 0) {  ?>
											<li class="nav-item  <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array('paidSeleccionJuegosNacionales', 'paidEjecucionObraInfraestructura', 'paidFiscalizacionInfraestructura')); ?>">


												<?php $rubroPAID = $ObtenerNombreRubrosPAIDInfraestructura[$i][nombreRubros]; ?>
												<?php $IDrubroPAID = $ObtenerNombreRubrosPAIDInfraestructura[$i][idRubros]; ?>

												<a href="#" class="nav-link">
													<i class="fas fa-ring" style="color: #cbcdd9;"></i>
													&nbsp;
													<p> <?php echo "$rubroPAID"; ?>

														<i class="fas fa-angle-left right"></i>
														<span class="badge badge-info right"></span>
													</p>
												</a>

												<ul class="nav nav-treeview">

													<li class="nav-item paid">

														<a href="paidEjecucionObraInfraestructura" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidEjecucionObraInfraestructura'); ?>">

															&nbsp;
															<i class="fas fa-hard-hat" style="color: #cbcdd9;"></i>
															<p Style="margin-left:20px">Ejecución de Obra</p>

														</a>


													</li>

													<li class="nav-item paid">

														<a href="paidFiscalizacionInfraestructura" idcomponentepaid="<?php echo "$IDcomponentePAID"; ?>" idrubropaid="<?php echo "$IDrubroPAID"; ?>" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidFiscalizacionInfraestructura'); ?>">

															&nbsp;
															<i class="fas fa-briefcase" style="color: #cbcdd9;"></i>
															<p Style="margin-left:20px">Fiscalización</p>

														</a>


													</li>

												</ul>


											</li>
										<?php  } ?>

									<?php } ?>
								</ul>
							</li>
						<?php } ?>
					<?php } ?>





				</ul>



			</li>


			</li>

		<?php endif ?>

	<?php endif ?>

<?php endif ?>