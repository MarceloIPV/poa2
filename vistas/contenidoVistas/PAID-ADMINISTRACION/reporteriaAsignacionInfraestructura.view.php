<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Asignación de presupuesto para el proyecto Optimización de Infraestructura Deportiva a Nivel Nacional");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="2">



			<div class='col col-12 d d-flex justify-content-center mt-4'>

				<button class="btn btn-primary" id="volverGenerar__paidAsignacion"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;&nbsp;Volver a generar asigación</button>

			</div>

			<table id="asignarPresupuesto__paid__reporterias" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>PRESUPUESTO</center></th>
						<th><center>FECHA DE NOTIFICACIÓN TECHO</center></th>
						<th><center>DOCUMENTO<br>DE ASIGNACIÓN</center></th>
						<th><center>VOLVER A ASIGNAR TECHO</center></th>
						
						
						
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

