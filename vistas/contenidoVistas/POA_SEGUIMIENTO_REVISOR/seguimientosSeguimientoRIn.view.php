<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__seguimientos__recomendados__instalaciones" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>SEMESTRE</center></th>
					<th><center>ESIGEF</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__instalaciones__2023("reasignarSeguimientos__SeguimientosRecomendados__instaslaciones","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__seguimientos__recomendados__instalaciones");?>

<!--====  End of Modales  ====-->
<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__seguimientos__recomendados__instalaciones"),"seguimiento__tablas__seguimientos__recomendados__instalaciones","s",objetos([3,4,5],["texto","texto","boton"],[11,10,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados__instalaciones2023 estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__SeguimientosRecomendados__instaslaciones'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__instalaciones2023"]);

		
	});

</script>



