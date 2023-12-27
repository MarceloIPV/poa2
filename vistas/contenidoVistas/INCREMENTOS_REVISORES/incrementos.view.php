<?php $componentes = new componentes(); ?>

<?php $componentes__indicadores = new componentes__incrementos__v1(); ?>

<?php $idUsuarioEn = $_SESSION["idUsuario"]; ?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?= $componentes->getComponentes(1, "ASIGNACIÓN DE INCREMENTO"); ?>

		<div class="row">

			<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

			<table id="asignarPresupuestoMo__incrementos__v__1" class="col col-12 cell-border">

				<thead>

					<tr>

						<th>
							<center>RUC</center>
						</th>
						<th>
							<center>Organismo deportivo</center>
						</th>
						<th>
							<center>Tipo Organismo</center>
						</th>
						<th>
							<center>Email</center>
						</th>
						<th>
							<center>Provincia</center>
						</th>
						<th>
							<center>Teléfonos</center>
						</th>
						<th>
							<center>Cédula<br>Representante<br>Legal</center>
						</th>
						<th>
							<center>Nombre<br>Representante<br>Legal</center>
						</th>
						<th>
							<center>Monto POA</center>
						</th>
						<th>
							<center>Monto Incremento</center>
						</th>
						<th>
							<center>Acción</center>
						</th>
						<th>
							<center>Trámite</center>
						</th>
						<th>
							<center>Envio</center>
						</th>
						<th>
							<center>Eliminar</center>
						</th>

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->


<?= $componentes__indicadores->getModalEnvioOD("modalEnvioOD", "Envio Notificación", "Incremento"); ?>

<?= $componentes__indicadores->getModalAtributosPdfs("modalAsignarPre", "Incremento del presupuesto", "+", "incremento", $idUsuarioEn); ?>

<!--====  End of Modales  ====-->

<script type="text/javascript">
	sumarIncrementos($("#montoIngresadoModificacion__incrementos"), $("#montoTotal__Modificacion__incrementos"), $("#total__Incrementos"), $("#total__Incrementos_M_"));
</script>

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.2"></script>