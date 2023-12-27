<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__alto__rendimientos" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE<br>REPORTADO</center></th>
					<th><center>FECHA ENVÍO<br>DE INFORMACIÓN</center></th>
					<th><center>E-SIGEF2</center></th>
					<!-- <th><center>TIPO DE<br>ORGANIZACIÓN</center></th> -->
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__alto2023("reasignarSeguimientos__altos","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__altos");?>

<!--====  End of Modales  ====-->


<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__alto__rendimientos"),"seguimiento__tablas__alto__rendimientos","s",objetos([6,8,9],["texto","texto","boton"],[19,18,"<center><button class='reasignarTramites__seguimientosAltos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__unidos__altos2023"]);
	
	
	});

</script>