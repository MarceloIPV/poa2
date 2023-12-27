<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"POAS APROBADOS");?>

		<div class="row">

		<table id="observciones__enviados" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>ASIGNAR</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<?=$componentes->getModalMatricezObserva("modalMatrizCoordinadores","formCoorV","guardaEnvio_coors","Enviar");?>