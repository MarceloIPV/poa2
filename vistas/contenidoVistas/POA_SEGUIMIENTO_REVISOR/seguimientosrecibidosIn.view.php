<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="seguimiento__tablas__acFisica__rendimientos__ins" class="col col-12 cell-border">

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

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__actividad__fisica__ins2023("reasignarSeguimientos__actividad__fisica__ins","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__actividad__fisica__ins");?>

<?= $componentesTablas->getModalVacioXl("reasignarTra", "formPreviewBancos", "idTituloModalPOAInfra", "divPOAInfra", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>

<?= $componentesTablas->getModalVacioXl("doc_informe_ejecucion", "formPreviewBancos", "idTituloModalInformeEjecucion", "divInformeEjecucion", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>

<?= $componentesTablas->getModalVacioXl("doc_res_infor", "formPreviewBancos", "idTituloModalRespaldoInforme", "divRespaldoInforme", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>

<?= $componentesTablas->getModalVacioXl("doc_Otros", "formPreviewBancos", "idTituloModalOtrosDoc", "divOtrosDoc", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>

<?=$componentes->getModalConfiguracion__reporteria__organismos2023("poa__indi","POA","poa__inicial__poa__seguimiento__infra",["Actividad","Ítem","Código Ítem","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos2023("mantenimiento__ll","Mantenimiento","reporteria__mantenimiento__seguimiento__infra",["ÍTEM","Nombre infraestructura","Provincia","Dirección","Estado","Tipo recursos","Tipo intervención","Detallar tipo intervención","Tipo Mantenimiento","Materiales servicios"]);?>



<!--====  End of Modales  ====-->

<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__acFisica__rendimientos__ins"),"seguimiento__tablas__acFisica__rendimientos__ins","s",objetos([6,8,9],["texto","texto","boton"],[20,18,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados__insta estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__actividad__fisica__ins'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe__ins"]);
		  
	 
	});

</script>