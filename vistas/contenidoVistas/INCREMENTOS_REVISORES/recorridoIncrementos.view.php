<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"RECORRIDO INCREMENTOS");?>

		<div class="row">

		<table id="recorridoIncrementos__tramites" class="col col-12 cell-border">

			<thead>

				<tr>

					<th rowspan="2"><center>Tipo<br>de organismo</center></th>
					<th rowspan="2"><center>Provincia</center></th>
					<th rowspan="2"><center>Organismo deportivo</center></th>
					<th colspan="1" rowspan="1"><center>Coordinación<br>de financiero</center></th>
					<th colspan="2" rowspan="1"><center>Coordinación<br>de instalaciones deportivas</center></th>
					<th colspan="2" rowspan="1"><center>Subsecretaría</center></th>

				</tr>

				<tr>

					<th><center>Administrativo</center></th>
					<th><center>Infraestructura</center></th>
					<th><center>Instalaciones</center></th>
					<th><center>Subsecretaría<br>alto rendimiento</center></th>
					<th><center>Subsecretaría<br>actividad física</center></th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.3"></script>