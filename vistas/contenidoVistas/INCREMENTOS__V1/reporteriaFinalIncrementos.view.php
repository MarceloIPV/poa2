
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

</div>

<!--=============================
=            Modales            =
==============================-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos__v1/datatablets.js"></script>


<!--====  End of Modales  ====-->

<script type="text/javascript">
datatablets__funcio__repor__incrementos__v__2__aprobados($("#asignarPresupuestoMo__revisor__v__1__aprobados"),"asignarPresupuestoMo__revisor__v__1__aprobados","seguimiento");
</script>


