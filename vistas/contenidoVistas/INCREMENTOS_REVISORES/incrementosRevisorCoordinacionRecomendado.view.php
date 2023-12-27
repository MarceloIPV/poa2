<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"TRÁMITES INCREMENTOS RECOMENDADOS");?>

		<div class="row">

		<br>

		<table id="reasignacionIncrementos__recomendaciones__subsess" class="col col-12 cell-border">

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

	</section>

</div>