<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"POAS APROBADOS");?>

		<div class="row">

		<table id="paid__poas__asignaciones" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO</center></th>
					<th><center>MONTO</center></th>
					<th><center>DOCUMENTO</center></th>
					<th><center>PROYECTO</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>