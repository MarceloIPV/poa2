<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__programacion__financiera" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE REPORTADO</center></th>
					<th><center>FECHA ENVÍO<br>INFORMACIÓN</center></th>
					<th><center>E-SIGEF 2</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__Contratacion_Publica("reasignarSeguimientos__altos","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__altos");?>

<!--====  End of Modales  ====-->




<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__programacion__financiera"),"seguimiento__tablas__programacion__financiera","s",objetos([9,6],["boton","texto"],["<center><button class='reasignarTramites__seguimientosAltos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altos'><i class='fas fa-user-edit'></i></button><center>",20],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__contratacion_publica__unidos__altos"]);
	
	});

</script>