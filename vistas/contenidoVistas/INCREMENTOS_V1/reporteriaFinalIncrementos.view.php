
<?php $componentes= new componentes();?>

<?php $componentes__indicadores= new componentes__incrementos__v1();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES DE INCREMENTOS Y DECREMENTOS");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

		<table id="asignarPresupuestoMo__revisor__v__1__aprobados" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Provincia</center></th>
					<th><center>Trámite</center></th>
					<th><center>Documento</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"REPORTES NOTIFICACIÓN");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="incremento" />

		<table id="notificacionIncrementoDecremento__v1__" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Fecha de Envío</center></th>
					<th><center>Hora</center></th>
					<th><center>Estado</center></th>
					<th><center>Documento</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>
</div>

<!--=============================
=            Modales            =
==============================-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos__v1/datatablets.js?v=1.0.0"></script>


<!--====  End of Modales  ====-->

<script type="text/javascript">
datatablets__funcio__repor__incrementos__v__2__aprobados($("#asignarPresupuestoMo__revisor__v__1__aprobados"),"asignarPresupuestoMo__revisor__v__1__aprobados","seguimiento");

datatablets__notifica__incrementos__v__1($("#notificacionIncrementoDecremento__v1__"),"notificacionIncrementoDecremento__v1__","seguimiento");

</script>


