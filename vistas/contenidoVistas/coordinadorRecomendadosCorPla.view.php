<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"POAS");?>

		<input type="hidden" id="asignando__estudios" name="asignando__estudios" />

		<div class="row">

		<table id="aprobadosTecnicos__enviados__3" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>APROBAR</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<?=$componentes->getModalMatricezObserva("modalMatrizCoordinadores","formCoorV","guardaEnvio_coors","Enviar");?>

<?=$componentes->getModalMatricezObserva2("modalVisualizaMatrices","formVisualizaM");?>