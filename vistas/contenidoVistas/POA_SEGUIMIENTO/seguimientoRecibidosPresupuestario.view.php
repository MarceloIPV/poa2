<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">


		<table id="seguimiento__tablas" class="col col-12 cell-border">
		
		<!-- <table id="seguimiento__tablas__recibidos__presupuestario" class="col col-12 cell-border"> -->


			<thead>

				<tr>

					
					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE</center></th>
					<th><center>FECHA ENVÍO<br>SEGUIMIENTO</center></th>
					<th><center>E-SIGEF2</center></th>
					<th><center>TIPO</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos("reasignarSeguimientos","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes");?>

<!--====  End of Modales  ====-->

<!-- <table id="seguimiento__tablas__acFisica__rendimientos" class="col col-12 cell-border"> -->
		<!-- <table id="seguimiento__tablas__recibidos__presupuestario" class="col col-12 cell-border"> -->
<script>



	//$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		// datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__programacion__financiera"),"seguimiento__tablas__programacion__financiera","s",objetos([9],["boton"],["<center><button class='reasignarTramites__seguimientosAltos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__altos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__contratacion_publica__unidos__altos"]);
		
		//reasignarSeguimientos__altos


		// datatablets($("#seguimiento__tablas__recibidos__presupuestario"),"seguimiento__tablas__recibidos__presupuestario",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([5,7,8],["texto","texto","boton"],[19,20,"<center><button class='reasignarTramites__seguimientosActividad estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__actividad__fisica'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos__actividad__fisica"],[false],[false],false);

		// datatablets($("#seguimiento__tablas"),"seguimiento__tablas",[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],objetos([6,8,9,10],["texto","texto","texto","boton"],[20,18,21,"<center><button class='reasignarTramites__seguimientos estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),1,["funcion__reasignar__seguimientos__unidos"],[false],[false],false);

		// datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__recibidos__presupuestario"),"seguimiento__tablas__recibidos__presupuestario", "Archivo", objetos([10],["boton"],["<center><button class='reasignarTramites__seguimientos__Preupuestario__recib estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__presupuestario__recibidos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]), [$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimiento__presupuestario_recibidosd"]);

	//	datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__recibidos__presupuestario"),"seguimiento__tablas__recibidos__presupuestario", "Archivo", objetos([10],["boton"],["<center><button class='reasignarTramites__seguimientos__Preupuestario__recib estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__presupuestario__recibidos'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]), [$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimiento__presupuestario_recibidos"]);
	
//	});

</script>    