<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__recorridos__tablas" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTON</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>TRIMESTRE</center></th>
					<th><center>FECHA ENVÍO<br>OD</center></th>
					<th><center>TIPO</center></th>
					<th><center>RECORRIDO</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__reporterias__recorridos("reasignarSeguimientos__recorridos","SECCIÓN DE RECORRIDOS","principal__recorridos__bodys");?>

<!--====  End of Modales  ====-->
