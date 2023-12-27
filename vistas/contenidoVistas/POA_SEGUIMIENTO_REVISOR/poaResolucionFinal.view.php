<?php $componentes= new componentes();?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentesTablas= new componentesTablas();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionGeneral();?>

<?php $informacionFuncionario=$objetoInformacion->getInformacionGeneralFun($informacionObjeto[0]);?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"POAS GESTIONADOS");?>

		<div class="row">

		<table id="poasGestionados" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>NÚMERO DE<br>RESOLUCIÓN</center></th>
					<th><center>RESOLUCIÓN</center></th>
					<th><center>FECHA TRAMITADO</center></th>
					<th><center>TECHO NOTIFICADO (SIN DESCUENTOS)</center></th>

					<?php if ($informacionFuncionario[0][fisicamenteEstructura]=="18" && $informacionObjeto[1]=="2"): ?>

						<th>
							<center>Editar</center>
							<input type="hidden" id="usuarioP" name="usuarioP" value="si">
						</th>

					<?php else: ?>

						<input type="hidden" id="usuarioP" name="usuarioP" value="no">
						
					<?php endif ?>

					<th><center>VER</center></th>

					
				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


<?=$componentes->getModal__inforDefinitivas("editarInfor__gestionados","EDITAR INFORMACIÓN","editarInfor","form__editarInfors");?>

<?=$componentes->getModalMatricezObserva__terminar("verPoaGe","formPoaVer");?>



<!--=============================
=            Modales            =
==============================-->
<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento_mocdal_principal("verPoaGe","SECCIÓN DE REPORTES ANEXOS","recorridos__bodys__reportes__poa",false);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("poa__indi","POA","poa__inicial__poa",["Actividad","Ítem","Código Ítem","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("poa_indicadores","INDICADORES","poa__indicadores__poa",["Actividad","Primer trimestre","Segundo trimestre","Tercer trimestre","Cuarto trimestre","Meta indicador"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("sueldosSalarios","SUELDOS Y SALARIOS","reporteria__sueldosySalarios",["Actividad","Cédula","Cargo","Nombres","Tipo cargo","Tiempo Trabajo<br>en meses","Sueldo salario","Aporte patronal","Decimo tercer<br>Sueldo","Mensualiza<br>décimo tercer sueldo","Décimo cuarto<br>sueldo","Mensualiza<br>décimo cuarto sueldo","Fondos de reserva"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("honorarios__ll","HONORARIOS","reporteria__honorarios",["Actividad","Cédula","Nombres","Cargo","Tipo cargo","Honorario mensual"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadesDeportivas","Actividades deportivas","reporteria__actividades",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadesDeportivas__4","Actividades deportivas","reporteria__actividades__4",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadesDeportivas__5","Actividades deportivas","reporteria__actividades__5",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadesDeportivas__6","Actividades deportivas","reporteria__actividades__6",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadesDeportivas__7","Actividades deportivas","reporteria__actividades__7",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("actividadAdministrativa","Actividades administrativas","reporteria__administrativas",["ÍTEM","Justificación","Cantidad"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("mantenimiento__ll","Mantenimiento","reporteria__mantenimiento",["ÍTEM","Nombre infraestructura","Provincia","Dirección","Estado","Tipo recursos","Tipo intervención","Detallar tipo intervención","Tipo Mantenimiento","Materiales servicios"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos_seguimiento("suministros__ll","Suministros","reporteria__suministros",["Tipo","Nombre Escenario","Energía","Agua"]);?>

<!--====  End of Modalesd  ====-->



<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){


    if ($("#usuarioP").val()=="si") {
		datatabletsSeguimientoRevisorVacio($("#poasGestionados"),"poasGestionados",false,objetos([6,9,10],["enlace","boton","boton"],['documento',"<center><button class='editarGestionados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#editarInfor__gestionados'><i class='fas fa-user-edit'></i></button><center>","<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false,false],["documento",false,false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcionEditar__gestionados","funcionEditar__gestionados_s"]);
	}else{
		datatabletsSeguimientoRevisorVacio($("#poasGestionados"),"poasGestionados",false,objetos([6,9],["enlace","boton"],['documento',"<center><button class='generarVerG btn btn-warning pointer__botones' data-toggle='modal' data-target='#verPoaGe'><i class='fas icono__boton fa-eye'></i></button><center>"],["documentos/aprobacion/",false],["documento",false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcionEditar__gestionados_s"]);
	}
});



   
</script>