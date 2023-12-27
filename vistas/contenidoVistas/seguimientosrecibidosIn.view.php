<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__acFisica__rendimientos__ins" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>TRIMESTRE</center></th>
					<th><center>FECHA ENVÍO<br>SEGUIMIENTO</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__actividad__fisica__ins("reasignarSeguimientos__actividad__fisica__ins","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__actividad__fisica__ins");?>

<!--====  End of Modales  ====-->
