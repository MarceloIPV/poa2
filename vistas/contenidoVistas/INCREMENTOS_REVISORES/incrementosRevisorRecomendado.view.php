<?php $componentes= new componentes();?>

<?php $componentes__indicadores = new componentes__incrementos__v1(); ?>

<?php 
	session_start(); 
	$selector_anios = $_SESSION["selectorAniosA"]
?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES RECOMENDADOS INCREMENTOS");?>

		<div class="row">

		<br>

		<table id="recomendacion__Incremento__Revisores" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>Organismo deportivo</center></th>
					<th><center>Email</center> </center></th>
					<th><center>Teléfonos</center></th>
					<th><center>Tipo Organismo</center></th>
                    <th><center>Representante</center></th>
					<th><center>Fecha Envío POA Incremento</center></th>
					<th><center>Provincia</center></th>
					<th><center>Reasignar</center></th>
					<th><center>Estado</center></th>

				</tr>

			</thead>

		</table>

		</div>

		<input type="hidden" name="identificadorPaginaRevisor" id="identificadorPaginaRevisor" value="Recomendado">
	</section>
	
</div>

<?= 
$componentes__indicadores->get__modal__plantilla__inicios__incrementos("modalAreasTecnicas",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>

<?= $componentes__indicadores->valores_Poa_Incrementos_Contenedor("modalValoresPoa",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios); ?>

<?= $componentes__indicadores->valores_Poa_Incrementos_Contenedor("modalValoresPoaIncremento",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>

<?=$componentes__indicadores->getModalMatricesPoa("modalVisualizaMatrices","formVisualizaM");?>

<?=$componentes__indicadores->modal_Observaciones_OD("modalObservacionesTra",3);?>

<?= $componentes__indicadores->modal_valores_Incremento("modalMatrizIncremento")?>

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.4"></script>
