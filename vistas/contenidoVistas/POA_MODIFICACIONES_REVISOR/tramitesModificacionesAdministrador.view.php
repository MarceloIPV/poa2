
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"REPORTERÍA MODIFICACIONES");?>

		<div class="row">

		<table id="reporteriaDefinitiva__c__modificaciones__administrador" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>Organismo deportivo</center></th>
					<th><center>Tipo<br>de organismo</center></th>
					<th><center>Provincia</center></th>
					<th><center>Mes</center></th>
					<th><center>Mátriz Origen destino</center></th>
					<th><center>Eliminar</center></th>
				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

