<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php $informacionObjeto = $objetoInformacion->getInformacionGeneral(); ?>

<?php $informacionFuncionario = $objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]); ?>

<input type="hidden" id="fechaPrincipalJ" name="fechaPrincipalJ" />

<input type="hidden" id="idUsuarioC" name="idUsuarioC" value="<?= $informacionObjeto[0] ?>" />

<input type="hidden" id="idRolAd" name="idRolAd" value="<?= $informacionObjeto[1] ?>" />

<input type="hidden" id="fisicamenteE" name="fisicamenteE" value="<?= $informacionFuncionario[0][fisicamenteEstructura] ?>" />

<input type="hidden" id="emailZonales" name="emailZonales" value="<?= $informacionFuncionario[0][email] ?>" />

<input type="hidden" id="zonalC" name="zonalC" value="<?= $informacionFuncionario[0][zonal] ?>" />

<?php
$perfilObservador = $_SESSION["perfilObservador"];
?>

<?php if(empty($perfilObservador)){?>
	
<?php if ($informacionFuncionario[0][fisicamenteEstructura] == "27" || $informacionFuncionario[0][fisicamenteEstructura] == "28" || $informacionFuncionario[0][fisicamenteEstructura] == "29" || $informacionFuncionario[0][fisicamenteEstructura] == "30" || $informacionFuncionario[0][fisicamenteEstructura] == "31" || $informacionFuncionario[0][fisicamenteEstructura] == "32" || $informacionFuncionario[0][fisicamenteEstructura] == "33") : ?>

	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("subsecretario", "recomendadoZonalesSubses", "subecretariaFinanciero", "recomendadoZonalesF", "subsecretarioCoordina", "recomendadosSV", "reporteriaFinal", "asignacionPoasRelativos", "organismosRegistrados", "poaResolucionFinal", "poasGlobalesRecibidos")); ?>">

		<a href="#" class="nav-link">
			<p>
				POA APROBACIÓN
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("subsecretario", "recomendadoZonalesSubses")); ?>">

				<a href="#" class="nav-link">
					<p>
						Poas<br>(Coordinación de infraestructura)
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="subsecretario" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'subsecretario'); ?>">

							<p>Poas enviados</p>

						</a>

					</li>

					<?php if ($informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

							<a href="recomendadoZonalesSubses" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomendadoZonalesSubses'); ?>">

								<p>Poas Recomendados</p>

							</a>

						</li>

					<?php endif ?>

				</ul>

			</li>

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("subecretariaFinanciero", "recomendadoZonalesF")); ?>">

				<a href="#" class="nav-link">
					<p>
						Poas<br>(Coordinación financiera)
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="subecretariaFinanciero" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'subecretariaFinanciero'); ?>">

							<p>Poas enviados</p>

						</a>

					</li>

					<?php if ($informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

							<a href="recomendadoZonalesF" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomendadoZonalesF'); ?>">

								<p>Poas Recomendados</p>

							</a>

						</li>

					<?php endif ?>

				</ul>

			</li>

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("subsecretarioCoordina", "recomendadosSV")); ?>">

				<a href="#" class="nav-link">
					<p>
						Poas<br>(Subsecretaría)
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="subsecretarioCoordina" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'subsecretarioCoordina'); ?>">

							<p>Poas enviados</p>

						</a>

					</li>

					<?php if ($informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

							<a href="recomendadosSV" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomendadosSV'); ?>">

								<p>Poas Recomendados</p>

							</a>

						</li>

					<?php endif ?>


				</ul>

			</li>

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("reporteriaFinal", "asignacionPoasRelativos", "organismosRegistrados", "poaResolucionFinal", "poasGlobalesRecibidos")); ?>">

				<a href="#" class="nav-link">
					<p>
						REPORTERÍA
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<?php if ($informacionFuncionario[0][fisicamenteEstructura] != 9 && $informacionFuncionario[0][fisicamenteEstructura] != 23) : ?>

						<li class="nav-item">

							<a href="reporteriaFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinal'); ?>">

								<p>Trámites POA</p>

							</a>
						</li>
				</ul>

			</li>

			
		</ul>

	</li>
<?php endif ?>



	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimientosAltosRen", "seguimientosAcFisicasRen", "seguimientosAltosRecomen", "seguimientosAcFisicasRecomen", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoReporOrganismos", "documentosSustentacion", "seguimientosrecibidosIn", "seguimientosSeguimientoRIn","seguimientoSuspencionRe")); ?>">

		<a href="#" class="nav-link">
			<p>
				SEGUIMIENTO
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>


				<li class="nav-item">

					<a href="segumientosProgramacionRen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'segumientosProgramacionRen', 'seguimientoRecorrido', "seguimientoEjecucion", "reporteAnexosSe", "resumenTransferencias"); ?>">
						<p>Recibidos (Contratación Pública)</p>
					</a>

				</li>

				<?php if ($informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientosFinancieroRecomen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosFinancieroRecomen'); ?>">
							<p>Recomendados (Contratación Pública)</p>
						</a>

					</li>

				<?php endif ?>


			<?php endif ?>

			

			<li class="nav-item">

				<a href="seguimientosAcFisicasRen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAcFisicasRen'); ?>">
					<p>Recibidos (Formativo y Recreativo)</p>
				</a>

			</li>

			<?php if ($informacionObjeto[1] == 7 || $informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="seguimientosAcFisicasRecomen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAcFisicasRecomen'); ?>">
						<p>Recomendados (Formativo y Recreativo)</p>
					</a>

				</li>

			<?php endif ?>

			<li class="nav-item">

				<a href="seguimientosrecibidosIn" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosrecibidosIn'); ?>">
					<p>Recibidos (Infraestructura)</p>
				</a>

			</li>


			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="seguimientosSeguimientoRIn" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosSeguimientoRIn'); ?>">
						<p>Recomendados (Infraestructura)</p>
					</a>

				</li>

			<?php endif ?>

			<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>
			
				<li class="nav-item">

					<a href="seguimientosrecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosrecibidos'); ?>">
						<p>Recibidos (Presupuestario)</p>
					</a>

				</li>


				<?php if ($informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientosSeguimientoR" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosSeguimientoR'); ?>">
							<p>Recomendados (Presupuestario)</p>
						</a>

					</li>

				<?php endif ?>

				<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>


					<?php if ($informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

						<a href="seguimientoSuspencionRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoSuspencionRe'); ?>">
							<p>Suspensiones</p>
						</a>

						</li>

					<?php endif ?>


				<?php endif ?>



				

			<?php endif ?>


			<li class="nav-item">

				<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
					<p>Recorrido</p>
				</a>

			</li>

			<li class="nav-item">

				<a href="reporteAnualSeRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnualSeRe'); ?>">
					<p>Reportería Anual</p>
				</a>

			</li>

			<li class="nav-item">

				<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
					<p>Reporte y anexos</p>
				</a>

			</li>

			<li class="nav-item">

				<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
					<p>Ejecución</p>
				</a>

			</li>

			<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>
			
				<?php if ($informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientoControlAdmin" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoControlAdmin'); ?>">
							<p>Control de cambios</p>
						</a>

					</li>

				<?php endif ?>
			<?php endif ?>

			<?php if (intval($_SESSION["selectorAniosA"])==2022): ?>
				<li class="nav-item">

					<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
						<p>Organismos deportivos</p>
					</a>

				</li>
			<?php endif ?>

			<li class="nav-item">

				<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
					<p>Declaración del correcto uso de recurso</p>
				</a>

			</li>

			<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

				<li class="nav-item">

					<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
						<p>Estado Envío Información Trimestral</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="seguimientoReporContratacionPublica" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporContratacionPublica'); ?>">
						<p>Declaración de Contratación Pública</p>
					</a>

				</li>


				<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

				</li>
			<?php endif ?>

		</ul>

	</li>

<li class="nav-item">

<a href="poasAprobadosf" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'poasAprobadosf');?>">

	<p>Recibidos Financiero</p>

</a>

</li>

	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("modificacionesRevisorInfra", "modificacionesRevisorInfraRecomendados", "modificacionesRevisorSubsecretaria", "modificacionesRevisorSubsecretariaRecomendados")); ?>">

		<a href="#" class="nav-link">
			<p>
				MODIFICACIONES
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<li class="nav-item">

				<a href="modificacionesRevisorSubsecretaria" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisorSubsecretaria'); ?>">
					<p>Recibidos (Formativo y Recreativo)</p>
				</a>

			</li>

			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="modificacionesRevisorSubsecretariaRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisorSubsecretariaRecomendados'); ?>">
						<p>Recomendados (Formativo y Recreativo)</p>
					</a>

				</li>

			<?php endif ?>

			<li class="nav-item">

				<a href="modificacionesRevisorInfra" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisorInfra'); ?>">
					<p>Recibidos (Infraestructura)</p>
				</a>

			</li>


			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="modificacionesRevisorInfraRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisorInfraRecomendados'); ?>">
						<p>Recomendados (Infraestructura)</p>
					</a>

				</li>

			<?php endif ?>

			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("incrementosRevisorCoordinacion","incrementosRevisorCoordinacionRecomendado","incrementosRevisorInfra","incrementosRevisorInfraRecomendado")); ?>">

			<a href="#" class="nav-link">
				<i class="fa fa-dollar-sign"></i>
				&nbsp;
				<p>
					Incrementos
					<i class="fa fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">


			<li class="nav-item">

				<a href="incrementosRevisorCoordinacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisorCoordinacion'); ?>">
					<i class="fa fa-clipboard"></i>
					&nbsp;
					<p>Recibidos (Formativo y Recreativo)</p>
				</a>

			</li>


			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="incrementosRevisorCoordinacionRecomendado" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisorCoordinacionRecomendado'); ?>">
						<i class="fa fa-file-signature"></i>
						&nbsp;
						<p>Recomendados (Formativo y Recreativo)</p>
					</a>

				</li>

			<?php endif ?>

			<li class="nav-item">

				<a href="incrementosRevisorInfra" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisorInfra'); ?>">
					<i class="fa fa-clipboard"></i>
					&nbsp;
					<p>Recibidos (Infraestructura)</p>
				</a>

			</li>


			<?php if ($informacionObjeto[1] == 4) : ?>

				<li class="nav-item">

					<a href="incrementosRevisorInfraRecomendado" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisorInfraRecomendado'); ?>">
						<i class="fa fa-file-signature"></i>
						&nbsp;
						<p>Recomendados (Infraestructura)</p>
					</a>

				</li>

			<?php endif ?>

			</ul>

		</li>
	

		</ul>

	</li>


<?php else : ?>

	<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 2 && $informacionObjeto[1]==4): ?>
		
	<li class="nav-item <?=$objetoInformacion->getUrlDinamicaUna('poa2/',$_SERVER['REQUEST_URI'],array("bloqueadorFinancieros"));?>">

		<a href="#" class="nav-link">
			<i class="fa fa-calendar"></i>
			&nbsp;
			<p>
				CIERRE DEL AÑO FISCAL
				<i class="fa fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">
				
			<li class="nav-item">

				<a href="bloqueadorFinancieros" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'bloqueadorFinancieros');?>">
					<i class="fa fa-calendar"></i>
					&nbsp;
					<p>CIERRE DE AÑO</p>

				</a>

			</li> 

		</ul>

	</li>

	<?php endif ?>


	<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 15 || $informacionFuncionario[0][fisicamenteEstructura] == 1 || $informacionFuncionario[0][fisicamenteEstructura] == 6) : ?>

		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimientosrecibidosIn", "seguimientosSeguimientoRIn", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoEjecucion", "seguimientoReporOrganismos", "documentosSustentacion", "seguimientosSeguimientoRInnstalacionesC")); ?>">

			<a href="#" class="nav-link">
				<p>
					SEGUIMIENTO
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="seguimientosrecibidosIn" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosrecibidosIn'); ?>">
						<p>Recibidos</p>
					</a>

				</li>

				<?php if ($informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientosSeguimientoRIn" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosSeguimientoRIn'); ?>">
							<p>Recomendados</p>
						</a>

					</li>

				<?php endif ?>

				<li class="nav-item">

					<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
						<p>Recorrido</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
						<p>Reporte y anexos</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
						<p>Ejecución</p>
					</a>

				</li>

				<?php if (intval($_SESSION["selectorAniosA"])==2022): ?>
					<li class="nav-item">

					<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Organismos deportivos</p>
						</a>


					</li>
				<?php endif ?>

				<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Estado Envío Información Trimestral</p>
						</a>

					</li>


					<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

					</li>

				<?php endif ?>

			

				<li class="nav-item">

					<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
						<p>Declaración del correcto uso de recurso</p>
					</a>

				</li>

			</ul>

		</li>

	<?php endif ?>


	<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 20) : ?>

		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("asignacionPoasRelativos", "organismosRegistrados", "poaResolucionFinal", "poasGlobalesRecibidos")); ?>">

			<a href="#" class="nav-link">
				<p>
					POA
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<?php if ($informacionFuncionario[0][fisicamenteEstructura] != 9 && $informacionFuncionario[0][fisicamenteEstructura] != 23) : ?>

					<li class="nav-item">

						<!-- <a href="reporteriaFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinal'); ?>">

							<p>Trámites POA</p>

						</a> -->

					</li>

				<?php endif ?>





				<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 9) : ?>

					<li class="nav-item">

						<a href="asignacionPoasRelativos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'asignacionPoasRelativos'); ?>">

							<p>Organismos intervenidos</p>

						</a>

					</li>



					<li class="nav-item">

						<a href="organismosRegistrados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'organismosRegistrados'); ?>">

							<p>Organismos registrados</p>

						</a>

					</li>

				<?php endif ?>

				<!-- <?php if ($informacionFuncionario[0][fisicamenteEstructura] != "27" && $informacionFuncionario[0][fisicamenteEstructura] != "28" && $informacionFuncionario[0][fisicamenteEstructura] != "29" && $informacionFuncionario[0][fisicamenteEstructura] != "30" &&  $informacionFuncionario[0][fisicamenteEstructura] != "31" && $informacionFuncionario[0][fisicamenteEstructura] != "32" &&  $informacionFuncionario[0][fisicamenteEstructura] != "33") : ?>


					<li class="nav-item">

						<a href="poaResolucionFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poaResolucionFinal'); ?>">

							<p>Poas gestionados DAVID PACA</p>

						</a>

					</li>

				<?php endif ?> -->

				<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 20 || $informacionFuncionario[0][fisicamenteEstructura] == 16) : ?>

					<li class="nav-item">

						<a href="poasGlobalesRecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasGlobalesRecibidos'); ?>">

							<p>POA Aprobado Inicial</p>

						</a>

					</li>

				<?php endif ?>

				<?php if ($informacionFuncionario[0][fisicamenteEstructura] != "27" && $informacionFuncionario[0][fisicamenteEstructura] != "28" && $informacionFuncionario[0][fisicamenteEstructura] != "29" && $informacionFuncionario[0][fisicamenteEstructura] != "30" &&  $informacionFuncionario[0][fisicamenteEstructura] != "31" && $informacionFuncionario[0][fisicamenteEstructura] != "32" &&  $informacionFuncionario[0][fisicamenteEstructura] != "33") : ?>


					<li class="nav-item">

						<a href="poaResolucionFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poaResolucionFinal'); ?>">

							<p>POA Modificado a Junio</p>

						</a>

					</li>

				<?php endif ?>

				<!-- <?php if ($informacionFuncionario[0][fisicamenteEstructura] == 20 || $informacionFuncionario[0][fisicamenteEstructura] == 16) : ?>

					<li class="nav-item">

						<a href="poasGlobalesRecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasGlobalesRecibidos'); ?>">

							<p>Poas enviados</p>

						</a>

					</li>

				<?php endif ?> -->


			</ul>

		</li>
		
		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimientosrecibidos", "seguimientosSeguimientoR", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoBloqueo", "seguimientoControlAdmin", "seguimientoReporOrganismos", "documentosSustentacion", "remananentesRepors", "bloqueador2","seguimientoAnexos","seguimientoResumenSuspenciones","seguimientoSuspencionReactivacion")); ?>">

			<a href="#" class="nav-link">
				<p>
					SEGUIMIENTO
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="seguimientoAnexos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoAnexos'); ?>">
						<p>Documentos 2022</p>
					</a>

				</li>


				<li class="nav-item">

					<a href="seguimientosrecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosrecibidos'); ?>">
						<p>Recibidos</p>
					</a>

				</li>

				<?php if ($informacionObjeto[1] == 2) : ?>

					<li class="nav-item">

						<a href="seguimientosSeguimientoR" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosSeguimientoR'); ?>">
							<p>Recomendados</p>
						</a>

					</li>

				<?php endif ?>

				<li class="nav-item">

					<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
						<p>Recorrido</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
						<p>Reporte y anexos</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
						<p>Ejecución</p>
					</a>

				</li>

				<?php if ($informacionObjeto[1] == 2) : ?>

					<li class="nav-item">

						<a href="bloqueador2" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'bloqueador2'); ?>">
							<p>Cierre año fiscal</p>
						</a>

					</li>

					


					<li class="nav-item">

						<a href="seguimientoControlAdmin" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoControlAdmin'); ?>">
							<p>Control de cambios</p>
						</a>

					</li>

				<?php endif ?>

				

				<?php if (intval($_SESSION["selectorAniosA"])==2022): ?>

					<li class="nav-item">

						<a href="seguimientoBloqueo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoBloqueo'); ?>">
							<p>Bloqueos</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Organismos deportivos</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
							<p>Declaración del correcto uso de recurso</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="remananentesRepors" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'remananentesRepors'); ?>">
							<p>Remanentes</p>
						</a>

					</li>

					

				<?php endif ?>


				<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

					<li class="nav-item">

						<a href="reporteAnualSeRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnualSeRe'); ?>">
							<p>Reportería Anual</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Estado Envío Información Trimestral</p>
						</a>

					</li>


					<li class="nav-item">

						<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
							<p>Declaración del correcto uso de recurso</p>
						</a>

					</li>

					<?php if ($informacionObjeto[1] == 2) : ?>
						<li class="nav-item">
							<a href="seguimientoSuspencionReactivacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoSuspencionReactivacion'); ?>">
								<p>Suspensiones y Reactivación de Transferencias</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="seguimientoResumenSuspenciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoResumenSuspenciones'); ?>">
								<p>Resumen Suspensiones</p>
							</a>
						</li>


					<?php endif ?>
					
					<li class="nav-item">

						<a href="seguimientoReporContratacionPublica" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporContratacionPublica'); ?>">
							<p>Declaración de Contratación Pública</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

					</li>

				<?php endif ?>




				



			</ul>

		</li>


		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("registroRemanentesA", "reporteRemanentesA")); ?>">

			<a href="#" class="nav-link">
				<p>
					REMANENTES
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			


			<ul class="nav nav-treeview">

				

				<?php if (intval($_SESSION["selectorAniosA"])>=2023){ ?>

					<li class="nav-item">

						<a href="registroRemanentesA" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'registroRemanentesA'); ?>">
							<p>Monto Asignado POA</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="remananentesRepors" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'remananentesRepors'); ?>">
							<p>Reporte Remanentes</p>
						</a>

					</li>

				<?php } else { ?>

					<li class="nav-item">

					<a href="registroRemanentesA" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'registroRemanentesA'); ?>">
						<p>Registro Remanentes</p>
					</a>

					</li>

				<?php }  ?>

			</ul>

		</li>

	<?php endif ?>

	<?php

	session_start();
	$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];

	?>

	<?php if ($informacionFuncionario[0][fisicamenteEstructura] != 9 && $informacionFuncionario[0][fisicamenteEstructura] != 23 && $informacionFuncionario[0][fisicamenteEstructura] != 20) : ?>

		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("subsecretario", "poasRecomendados", "recomiendaInfra", "generalContratacion")); ?>">

			<a href="#" class="nav-link">
				<p>
					POA
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="subsecretario" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'subsecretario'); ?>">

						<p>Recibidos</p>

					</a>

				</li>

				<?php if ($aniosPeriodos__ingesos >= 2023) : ?>

					<li class="nav-item">

						<a href="generalContratacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'generalContratacion'); ?>">

							<p>Contratación</p>

						</a>

					</li>

				<?php endif ?>

				<?php if ($informacionObjeto[1] == 4 && $informacionFuncionario[0][fisicamenteEstructura] == 1) : ?>


					<li class="nav-item">

						<a href="recomiendaInfra" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomiendaInfra'); ?>">

							<p>Recomendados</p>

						</a>

					</li>

				<?php else : ?>

					<li class="nav-item">

						<a href="poasRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasRecomendados'); ?>">

							<p>Recomendados</p>

						</a>

					</li>

				<?php endif ?>

			</ul>


		</li>



		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("paidEnviados", "paidRecomendados", "reporteriaPaidF")); ?>">

			<a href="#" class="nav-link">
				<p>
					PAID
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="reporteriaPaidF" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaPaidF'); ?>">

						<p>Reportería</p>

					</a>

				</li>

				<li class="nav-item">

					<a href="paidEnviados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidEnviados'); ?>">

						<p>Recibidos</p>

					</a>

				</li>

				<?php if ($informacionObjeto[1] != 3) : ?>

					<li class="nav-item">

						<a href="paidRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'paidRecomendados'); ?>">

							<p>Recomendados</p>

						</a>

					</li>

				<?php endif ?>

			</ul>

		</li>

	<?php endif ?>



	<?php if (($informacionObjeto[1] == 2 || $informacionObjeto[1] == 3) && $informacionFuncionario[0][fisicamenteEstructura] == 23 || ($informacionFuncionario[0][fisicamenteEstructura] == 12 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 14 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 13 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 19 && $informacionObjeto[1] == 2)) : ?>


		<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 23) : ?>

			<li class="nav-item">

				<a href="poasAprobadosf" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasAprobadosf'); ?>">

					<p>Recibidos</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="rechazados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'rechazados'); ?>">

					<p>Rechazados</p>

				</a>

			</li>

		<?php endif ?>

		<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 23 || ($informacionFuncionario[0][fisicamenteEstructura] == 12 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 14 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 13 && $informacionObjeto[1] == 2) || ($informacionFuncionario[0][fisicamenteEstructura] == 19 && $informacionObjeto[1] == 2)) : ?>

			<li class="nav-item">

				<a href="aprobadosFinan" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'aprobadosFinan'); ?>">

					<p>Aprobados Financiero</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="reporteriaFinanciero" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinanciero'); ?>">

					<p>Trazabilidad financiera</p>

				</a>

			</li>

		<?php endif ?>

		<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 23 && $informacionObjeto[1] == 2) : ?>

			<li class="nav-item">

				<a href="suspencionAsignacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'suspencionAsignacion'); ?>">

					<p>Suspención de asignación</p>

				</a>

			</li>


			<li class="nav-item">

				<a href="soliTrans" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'soliTrans'); ?>">

					<p>Solicitudes de transferencia</p>

				</a>

			</li>

		<?php endif ?>

		<?php if ($informacionObjeto[1] == 2 && $informacionFuncionario[0][fisicamenteEstructura] == 23) : ?>

			<li class="nav-item">

				<a href="asignacionPoasRelativos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'asignacionPoasRelativos'); ?>">

					<p>Organismos intervenidos</p>

				</a>

			</li>


		<?php endif ?>

	<?php endif ?>


	<?php if ($informacionObjeto[1] == 4 && $informacionFuncionario[0][fisicamenteEstructura] == 2) : ?>


		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("recomiendaAdministrativo", "recomiendaTalentoHumano")); ?>">

			<a href="#" class="nav-link">
				<p>
					Poas Recomendados
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="recomiendaAdministrativo" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomiendaAdministrativo'); ?>">

						<p>Poas Recomendados<br>administrativo</p>

					</a>

				</li>

				<li class="nav-item">

					<a href="recomiendaTalentoHumano" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recomiendaTalentoHumano'); ?>">

						<p>Poas Recomendados<br>talento humano</p>

					</a>

				</li>

			</ul>

		</li>




	<?php endif ?>


	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("esigef", "jurisdicciones","seguimientoPlazos")); ?>">

		<a href="#" class="nav-link">
			<p>
				CONFIGURACIONES
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<li class="nav-item">

				<a href="esigef" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'esigef'); ?>">

					<p>Esigef</p>

				</a>

			</li>

			<li class="nav-item">
				<a href="jurisdicciones" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'jurisdicciones'); ?>">
					<p>Jurisdicción</p>
				</a>
			</li>

			<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

				<li class="nav-item">

					<a href="seguimientoPlazos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoPlazos'); ?>">
						<p>Plazos</p>
					</a>


				</li>

			<?php endif ?>

		</ul>

	</li>


	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("reporteriaFinal", "asignacionPoasRelativos", "organismosRegistrados", "poaResolucionFinal", "poasGlobalesRecibidos")); ?>">

		<a href="#" class="nav-link">
			<p>
				REPORTERÍA
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<?php if ($informacionFuncionario[0][fisicamenteEstructura] != 9 && $informacionFuncionario[0][fisicamenteEstructura] != 23) : ?>

				<li class="nav-item">

					<a href="reporteriaFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinal'); ?>">

						<p>Trámites POA</p>

					</a>

				</li>

			<?php endif ?>





		<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 9) : ?>

			<li class="nav-item">

				<a href="asignacionPoasRelativos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'asignacionPoasRelativos'); ?>">

					<p>Organismos intervenidos</p>

				</a>

			</li>



			<li class="nav-item">

				<a href="organismosRegistrados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'organismosRegistrados'); ?>">

					<p>Organismos registrados</p>

				</a>

			</li>

		<?php endif ?>

		<?php if ($informacionFuncionario[0][fisicamenteEstructura] != "27" && $informacionFuncionario[0][fisicamenteEstructura] != "28" && $informacionFuncionario[0][fisicamenteEstructura] != "29" && $informacionFuncionario[0][fisicamenteEstructura] != "30" &&  $informacionFuncionario[0][fisicamenteEstructura] != "31" && $informacionFuncionario[0][fisicamenteEstructura] != "32" &&  $informacionFuncionario[0][fisicamenteEstructura] != "33") : ?>


			<li class="nav-item">

				<a href="poaResolucionFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poaResolucionFinal'); ?>">

					<p>Poas gestionados</p>

				</a>

			</li>

		<?php endif ?>

		<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 20 || $informacionFuncionario[0][fisicamenteEstructura] == 16) : ?>

			<li class="nav-item">

				<a href="poasGlobalesRecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasGlobalesRecibidos'); ?>">

					<p>Poas enviados</p>

				</a>

			</li>

		<?php endif ?>

		</ul>

	</li>
	
	<?php endif ?>


	<li class="nav-item">

		<a href="reporteriaFinanciero" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinanciero'); ?>">

			<p>Trazabilidad financiera (Reportería de trámites)</p>

		</a>

	</li>

	<?php if ($informacionFuncionario[0][zonal]==1): ?>
		

	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("directorMd", "directorMd2", "modificacionesRevisor", "modificacionesRevisorRecomendados","reporteriaModificacionesA")); ?>">

		<a href="#" class="nav-link">
			<p>
				Modificaciones
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<li class="nav-item">

				<a href="modificacionesRevisor" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisor'); ?>">

					<p>Trámites recibidos</p>

				</a>

			</li>

			<?php if ($informacionObjeto[1] != 3) : ?>

				<li class="nav-item">

					<a href="modificacionesRevisorRecomendados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'modificacionesRevisorRecomendados'); ?>">

						<p>Trámites Recomendados</p>

					</a>

				</li>

			<?php endif ?>

			
		<li class="nav-item">

			<a href="reporteriaModificacionesA" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/',$_SERVER['REQUEST_URI'],'reporteriaModificacionesA');?>">

				<p>Reportería</p>

			</a>

		</li>

		</ul>

		<ul class="nav nav-treeview">
		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("incrementos","decrementos","reporteriaFinalIncrementos","revision")); ?>">

			<a href="#" class="nav-link">
				<i class="fa fa-dollar-sign"></i>
				&nbsp;
				<p>
					Incrementos
					<i class="fa fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">


				<li class="nav-item">

					<a href="incrementosRevisor" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisor'); ?>">
						<i class="fa fa-tasks"></i>
						&nbsp;
						<p>Tramites Incrementos</p>
            
            		</a>

				</li>

				<?php if ($informacionObjeto[1] != 3) : ?>

					<li class="nav-item">

						<a href="incrementosRevisorRecomendado" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'incrementosRevisorRecomendado'); ?>">
							<i class="fa fa-tasks"></i>
							&nbsp;
							<p>Tramites Incrementos Recomendados</p>
				
						</a>

					</li>

				<?php endif ?>

				<li class="nav-item">

					<a href="recorridoIncrementos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'recorridoIncrementos'); ?>">
						<i class="fa fa-tasks"></i>
						&nbsp;
						<p>Recorrido</p>
            
            		</a>

				</li>

			</ul>

		</li>

	</ul>

	</li>
		
	<?php endif ?>


	<?php if (($informacionFuncionario[0][fisicamenteEstructura] == 2 || $informacionFuncionario[0][fisicamenteEstructura] == 23 || $informacionFuncionario[0][fisicamenteEstructura] == 5) && (intval($_SESSION["selectorAniosA"])>=2023)) : ?>


			<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("segumientosProgramacionRen", "seguimientosFinancieroRecomen", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoReporOrganismos", "documentosSustentacion","transferencias","resumenTransferencias","seguimientoSuspencionRe")); ?>">

				<a href="#" class="nav-link">
					<p>
						SEGUIMIENTO
						<i class="fas fa-angle-left right"></i>
						<span class="badge badge-info right"></span>
					</p>
				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="segumientosProgramacionRen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'segumientosProgramacionRen', 'seguimientoRecorrido', "seguimientoEjecucion", "reporteAnexosSe", "transferencias","resumenTransferencias"); ?>">
							<p>Recibidos</p>
						</a>

					</li>



					<?php if ($informacionObjeto[1] == 7 || $informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

							<a href="seguimientosFinancieroRecomen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosFinancieroRecomen'); ?>">
								<p>Recomendados</p>
							</a>

						</li>

					<?php endif ?>

					<li class="nav-item">

						<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
							<p>Recorrido</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
							<p>Reporte y anexos</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
							<p>Ejecución</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Estado Envío Información Trimestral</p>
						</a>

					</li>

					<li class="nav-item">

						<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
							<p>Declaración del correcto uso de recurso</p>
						</a>

					</li>

					<?php if ($informacionObjeto[1] == 7 || $informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

						<li class="nav-item">

						<a href="transferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'transferencias'); ?>">
							<p>Transferencias</p>
						</a>

						</li>

						<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Resumen de Transferencias</p>
						</a>

						</li>

						<li class="nav-item">

						<a href="seguimientoSuspencionRe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoSuspencionRe'); ?>">
							<p>Suspensiones</p>
						</a>

						</li>

					<?php endif ?>

					<?php if ($informacionObjeto[1] == 3) : ?>

						<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

						</li>

					<?php endif ?>

					


				</ul>

			</li>



	<?php endif ?>

	

	<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 12 || $informacionFuncionario[0][fisicamenteEstructura] == 24 || $informacionFuncionario[0][fisicamenteEstructura] == 14) : ?>


		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimientosAltosRen", "seguimientosAltosRecomen", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoReporOrganismos", "documentosSustentacion")); ?>">

			<a href="#" class="nav-link">
				<p>
					SEGUIMIENTO
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="seguimientosAltosRen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAltosRen', 'seguimientoRecorrido', "seguimientoEjecucion", "reporteAnexosSe"); ?>">
						<p>Recibidos</p>
					</a>

				</li>



				<?php if ($informacionObjeto[1] == 7 || $informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientosAltosRecomen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAltosRecomen'); ?>">
							<p>Recomendados</p>
						</a>

					</li>

				<?php endif ?>

				<li class="nav-item">

					<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
						<p>Recorrido</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
						<p>Reporte y anexos</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
						<p>Ejecución</p>
					</a>

				</li>

				

				<?php if (intval($_SESSION["selectorAniosA"])==2022): ?>

					<li class="nav-item">

					<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
						<p>Organismos deportivos</p>
					</a>

					</li>

				<?php endif ?>

				<li class="nav-item">

					<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
						<p>Declaración del correcto uso de recurso</p>
					</a>

				</li>


				<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Estado Envío Información Trimestral</p>
						</a>

					</li>


					<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

					</li>

				<?php endif ?>

			</ul>

		</li>

	<?php endif ?>


	<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 13 || $informacionFuncionario[0][fisicamenteEstructura] == 26 || $informacionFuncionario[0][fisicamenteEstructura] == 19) : ?>


		<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("seguimientosAcFisicasRen", "seguimientosAcFisicasRecomen", "seguimientoRecorrido", "reporteAnexosSe", "seguimientoEjecucion", "seguimientoReporOrganismos", "documentosSustentacion")); ?>">

			<a href="#" class="nav-link">
				<p>
					SEGUIMIENTO
					<i class="fas fa-angle-left right"></i>
					<span class="badge badge-info right"></span>
				</p>
			</a>

			<ul class="nav nav-treeview">

				<li class="nav-item">

					<a href="seguimientosAcFisicasRen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAcFisicasRen', 'seguimientoRecorrido'); ?>">
						<p>Recibidos</p>
					</a>

				</li>


				<?php if ($informacionObjeto[1] == 7 || $informacionObjeto[1] == 2 || $informacionObjeto[1] == 4) : ?>

					<li class="nav-item">

						<a href="seguimientosAcFisicasRecomen" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientosAcFisicasRecomen'); ?>">
							<p>Recomendados</p>
						</a>

					</li>

				<?php endif ?>


				<li class="nav-item">

					<a href="seguimientoRecorrido" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoRecorrido'); ?>">
						<p>Recorrido</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="reporteAnexosSe" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteAnexosSe'); ?>">
						<p>Reporte y anexos</p>
					</a>

				</li>

				<li class="nav-item">

					<a href="seguimientoEjecucion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoEjecucion'); ?>">
						<p>Ejecución</p>
					</a>

				</li>

				<?php if (intval($_SESSION["selectorAniosA"])==2022): ?>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Organismos deportivos</p>
						</a>

					</li>

				<?php endif ?>

				

				<li class="nav-item">

					<a href="documentosSustentacion" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'documentosSustentacion'); ?>">
						<p>Declaración del correcto uso de recurso</p>
					</a>

				</li>

				<?php if (intval($_SESSION["selectorAniosA"])>=2023): ?>

					<li class="nav-item">

						<a href="seguimientoReporOrganismos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'seguimientoReporOrganismos'); ?>">
							<p>Estado Envío Información Trimestral</p>
						</a>

					</li>


					<li class="nav-item">

						<a href="resumenTransferencias" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'resumenTransferencias'); ?>">
							<p>Consulta de Transferencias</p>
						</a>

					</li>

				<?php endif ?>

			</ul>

		</li>

	<?php endif ?>

<?php } else{ ?>
	
	<li class="nav-item <?= $objetoInformacion->getUrlDinamicaUna('poa2/', $_SERVER['REQUEST_URI'], array("reporteriaFinal", "asignacionPoasRelativos", "organismosRegistrados", "poaResolucionFinal", "poasGlobalesRecibidos")); ?>">

		<a href="#" class="nav-link">
			<p>
				REPORTERÍA
				<i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right"></span>
			</p>
		</a>

		<ul class="nav nav-treeview">

			<?php if ($informacionFuncionario[0][fisicamenteEstructura] != 9 && $informacionFuncionario[0][fisicamenteEstructura] != 23) : ?>

				<li class="nav-item">

					<a href="reporteriaFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'reporteriaFinal'); ?>">

						<p>Trámites POA</p>

					</a>

				</li>

			<?php endif ?>





			<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 9) : ?>

				<li class="nav-item">

					<a href="asignacionPoasRelativos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'asignacionPoasRelativos'); ?>">

						<p>Organismos intervenidos</p>

					</a>

				</li>



				<li class="nav-item">

					<a href="organismosRegistrados" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'organismosRegistrados'); ?>">

						<p>Organismos registrados</p>

					</a>

				</li>

			<?php endif ?>

			<?php if ($informacionFuncionario[0][fisicamenteEstructura] != "27" && $informacionFuncionario[0][fisicamenteEstructura] != "28" && $informacionFuncionario[0][fisicamenteEstructura] != "29" && $informacionFuncionario[0][fisicamenteEstructura] != "30" &&  $informacionFuncionario[0][fisicamenteEstructura] != "31" && $informacionFuncionario[0][fisicamenteEstructura] != "32" &&  $informacionFuncionario[0][fisicamenteEstructura] != "33") : ?>


				<li class="nav-item">

					<a href="poaResolucionFinal" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poaResolucionFinal'); ?>">

						<p>Poas gestionados</p>

					</a>

				</li>

			<?php endif ?>

			<?php if ($informacionFuncionario[0][fisicamenteEstructura] == 20 || $informacionFuncionario[0][fisicamenteEstructura] == 16) : ?>

				<li class="nav-item">

					<a href="poasGlobalesRecibidos" class="nav-link <?= $objetoInformacion->getUrlDinamica('poa2/', $_SERVER['REQUEST_URI'], 'poasGlobalesRecibidos'); ?>">

						<p>Poas enviados</p>

					</a>

				</li>

			<?php endif ?>

		</ul>

	</li>
<?php } ?>