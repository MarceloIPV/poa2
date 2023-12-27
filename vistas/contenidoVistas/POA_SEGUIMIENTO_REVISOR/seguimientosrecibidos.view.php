<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas2023" class="col col-12 cell-border">

			<thead>

				<tr>

					
					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>TIPO DE<br>ORGANIZACIÓN</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE REPORTADO</center></th>
					<th><center>FECHA ENVÍO<br>DE INFORMACIÓN</center></th>
					<th><center>E-SIGEF2</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos2023("reasignarSeguimientos","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes");?>

<!--====  End of Modales  ====-->



<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas2023"),"seguimiento__tablas2023","Tabla Seguimiento",objetos([3,4,5,6,7,8,9,10],["texto","texto","texto","texto","texto","texto","texto","boton"],[21,3,4,5,20,7,18,"<center><button class='reasignarTramites__seguimientos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__unido2023"]);

	});

	
</script>