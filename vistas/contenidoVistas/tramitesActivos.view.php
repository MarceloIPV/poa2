
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"REPORTERÍA");?>

		<div class="row">

		<table id="organismosActivosPre" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>POA EN REVISIÓN</center></th>
					<th><center>POAS RE</center></th>
					<th><center>TELÉFONOS</center></th>
					<th><center>TIPO ORGANISMO</center></th>
					<th><center>FECHA<br>ENVÍO POA</center></th>


				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>



