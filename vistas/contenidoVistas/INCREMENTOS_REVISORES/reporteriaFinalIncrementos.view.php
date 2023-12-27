
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
					<th><center>Fecha de Resolución</center></th>
					<th><center>Trámite</center></th>
					<th><center>Techo Actualizado</center></th>
					<th><center>Número Resolución</center></th>
					<th><center>Resolución</center></th>

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
					<th><center>Tipo Trámite</center></th>
					<th><center>Monto</center></th>
					<th><center>Techo Actualizado</center></th>
					<th><center>Notificación</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>
</div>

<!--=============================
=            Modales            =
==============================-->


<!--====  End of Modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.1"></script>


