<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__contratacion__recomendados" class="col col-12 cell-border">

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
					<th><center>TIPO DE<br>ORGANIZACIÓN</center></th> 
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__Contratacion_Publica__recomendados("reasignarSeguimientos__altosRecomendados","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__altos__recomendados");?>

<!--====  End of Modales  ====-->


<script>

	$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__contratacion__recomendados"),"seguimiento__tablas__contratacion__recomendados","s",objetos([6,7,8,9,10],["texto","texto","texto","texto","boton"],[9,7,10,11,"<center><button class='reasignarTramites__seguimientosAltos__recomendados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altosRecomendados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__contratacion_publica__unidos__altos__recomendados"]);


	});
	
</script>