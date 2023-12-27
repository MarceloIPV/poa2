<?php $componentes= new componentes();?>

<?php $componentes__indicadores = new componentes__incrementos__v1(); ?>

<?php 
	session_start(); 
	$selector_anios = $_SESSION["selectorAniosA"]
?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES INCREMENTOS PARA SUBIR RESOLUCIÓN");?>

		<div class="row">

		<br>

		<table id="incrementos_Subir_Resolucion_Pla" class="col col-12 cell-border">

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
					<th><center>Aprobar</center></th>
					
				</tr>

			</thead>

		</table>

		</div>

	</section>
	
</div>
<!--=============================
=            Modales            =
==============================-->

<?= $componentes__indicadores->modal_Planificacion_Resolucion("modalSubidaResolucionI",3,"INCREMENTO A LA PLANIFICACIÓN OPERATIVA ANUAL POA <br> ORGANIZACIONES DEPORTIVAS ".$selector_anios)?>



<?=$componentes->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>


<!--====  End of Modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.6"></script>