<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__remanentes2023" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->remanentes__administrador2023("reasignarRemanentes__asignados");?>

<!--====  End of Modales  ====-->

<script>


	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__remanentes2023"),"seguimiento__tablas__remanentes2023","Remanentes",objetos([6],["boton"],["<center><button class='remantes__asignados2023 estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarRemanentes__asignados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__remanentes__asignados2023"]);

		
	
	});

</script>
