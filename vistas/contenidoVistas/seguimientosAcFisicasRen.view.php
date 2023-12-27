<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

	<div class="input-group mb-3 ">
		
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon3">Ingrese Número de Página</span>
			</div>
			<div class="col-md-5">
			<input type="text" class="form-control" id="buscarPaginasFormativo" aria-describedby="basic-addon3">
			</div>
			
		
	</div>

		<table id="seguimiento__tablas__acFisica__rendimientos" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>TRIMESTRE</center></th>
					<th><center>FECHA ENVÍO<br>SEGUIMIENTO</center></th>
					<th><center>DIRECCIÓN</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__actividad__fisica("reasignarSeguimientos__actividad__fisica","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__actividad__fisica");?>

<!--====  End of Modales  ====-->
