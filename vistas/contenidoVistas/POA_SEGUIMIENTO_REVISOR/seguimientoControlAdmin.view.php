<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__controles__sujetados2023" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>FECHA</center></th>
					<th><center>TRIMESTRE</center></th>
					<th><center>JUSTIFICACIÓN</center></th>
					<th><center>APROBAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>



<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__controles__sujetados2023"),"seguimiento__controles__sujetados2023","s",objetos([5],["radioSelectes__2"],[5],[false],[false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__control__de__cambios2023"]);



	
	});

</script>


