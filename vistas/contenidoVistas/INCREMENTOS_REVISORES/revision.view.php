<?php $componentes= new componentes();?>

<?php $componentes__indicadores= new componentes__incrementos__v1();?>

<?php 
	session_start(); 
	$selector_anios = $_SESSION["selectorAniosA"]
?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES DECREMENTOS");?>

		<div class="row">

		<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="decrementoRevision" />

		<table id="asignarPresupuestoMo__revisor__v__1" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo Organismo</center></th>
					<th><center>Representante</center></th>
					<th><center>Trámite</center></th>
					<th><center>Fecha Envio</center></th>
					<th><center>Monto</center></th>
					<th><center>Techo actualizado</center></th>
					<th><center>Revisar</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>
	

</div>


<!--=============================
=            Modales            =
==============================-->



<?= $componentes__indicadores->get__modal__plantilla__inicios__incrementos("modalAprobarD",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>

<?= $componentes__indicadores->valores_Poa_Incrementos_Contenedor("modalValoresPoa",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>

<?= $componentes__indicadores->valores_Poa_Incrementos_Contenedor("modalValoresPoaIncremento",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>

<?=$componentes->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>


<?= $componentes__indicadores->modal_valores_Incremento("modalMatrizIncremento")?>

<?=$componentes__indicadores->modal_Observaciones_OD("modalObservacionesTra",3);?>

<!--====  End of Modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.5"></script>
