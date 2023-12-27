<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<input type="hidden" id="idOrganismo">
		<input type="hidden" id="periodo">

		<table id="seguimiento__recorridos__tablas2023" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>JURISDICCION</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTON</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE REPORTADO</center></th>
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

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__reporterias__recorridos2023("reasignarSeguimientos__recorridos","SECCIÓN DE RECORRIDOS","principal__recorridos__bodys");?>

<!--====  End of Modales  ====-->


<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__recorridos__tablas2023"),"seguimiento__recorridos__tablas2023","s",objetos([9],["boton"],["<center><button class='reasignar__seguimientos__recorridos__boton estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__recorridos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__recorridos2023"]);
	
	});

</script>