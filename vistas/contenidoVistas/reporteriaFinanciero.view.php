
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRAZABILIDAD FINANCIERA");?>

		<div class="row">

			<table id="asignaciones__realizadas__finan__trazabilidad" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>PROVINCIA</center></th>
						<th><center>CANTÓN</center></th>
						<th><center>PARROQUIA</center></th>
						<th><center>ANALISTA</center></th>
						<th><center>FECHA DE ENVÍO SOLICITUD</center></th>
						<th><center>ESTADO</center></th>
						<th><center>OBSERVACIÓN</center></th>
	
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>


<?=$componentes->get__modal__terminaFinanciero("terminarFinanciero","form__terminaFinanciero","enviarTerminaFinanciero","Enviar");?>
