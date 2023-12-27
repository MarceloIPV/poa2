<?php $componentes= new componentes();?>

<?php $anio__actual = date('Y');;?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"REPORTERÍA DE MATRICES INGRESADAS PARA EL AÑO $anio__actual");?>

	<section class="content__configuraciones row d d-flex justify-content-center">

		<?=$componentes->getLinksConfiguracion__parametros(["poa__indi"],["Poa"],'poaIn');?>

		<?=$componentes->getLinksConfiguracion__parametros(["poa_indicadores"],["Indicadores"],'poaIndica');?>

		<?=$componentes->getLinksConfiguracion__parametros(["sueldosSalarios"],["Sueldos y salarios"],'sueldos');?>

		<?=$componentes->getLinksConfiguracion__parametros(["desvinculacionesModal"],["Desvinculaciones"],'desvincula');?>

		<?=$componentes->getLinksConfiguracion__parametros(["honorarios__ll"],["Honorarios"],'honorarios');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadesDeportivas"],["Actividad 3 (Actividades deportivas)"],'actividades');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadesDeportivas__4"],["Actividad 4 (Actividades deportivas)"],'actividades__4');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadesDeportivas__5"],["Actividad 5 (Actividades deportivas)"],'actividades__5');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadesDeportivas__6"],["Actividad 6 (Actividades deportivas)"],'actividades__6');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadesDeportivas__7"],["Actividad 7 (Actividades deportivas)"],'actividades__7');?>

		<?=$componentes->getLinksConfiguracion__parametros(["actividadAdministrativa"],["Actividad administrativa"],'administrativo');?>

		<?=$componentes->getLinksConfiguracion__parametros(["mantenimiento__ll"],["Mantenimiento"],'mantenimiento');?>

		<?=$componentes->getLinksConfiguracion__parametros(["suministros__ll"],["Suministros"],'suministros');?>

		<?=$componentes->getComponentes(1,"DOCUMENTOS ANEXOS");?>

		<?=$componentes->getLinksConfiguracion__parametros(["poa__visor__seguimiento"],["Información anexa de seguimiento"],'poa__seguimiento__anexos');?>

		<?=$componentes->getLinksConfiguracion__parametros(["poa__visor__modificaciones"],["Información anexa de modificaciones"],'poa__modificaciones__anexos');?>


	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentes->getModalConfiguracion__reporteria__organismos("poa__indi","POA","poa__inicial__poa",["Actividad","Ítem","Código Ítem","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("poa_indicadores","INDICADORES","poa__indicadores__poa",["Actividad","Primer trimestre","Segundo trimestre","Tercer trimestre","Cuarto trimestre","Meta indicador"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("sueldosSalarios","SUELDOS Y SALARIOS","reporteria__sueldosySalarios",["Actividad","Cédula","Cargo","Nombres","Tipo cargo","Tiempo Trabajo<br>en meses","Sueldo salario","Aporte patronal","Decimo tercer<br>Sueldo","Mensualiza<br>décimo tercer sueldo","Décimo cuarto<br>sueldo","Mensualiza<br>décimo cuarto sueldo","Fondos de reserva"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("desvinculacionesModal","DESVINCULACIONES","reporteria__desvinculaciones",["Desvinculación","Cédula","Nombres","Cargo","Tipo cargo"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("honorarios__ll","HONORARIOS","reporteria__honorarios",["Actividad","Cédula","Nombres","Cargo","Tipo cargo","Honorario mensual"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadesDeportivas","Actividades deportivas","reporteria__actividades",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadesDeportivas__4","Actividades deportivas","reporteria__actividades__4",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadesDeportivas__5","Actividades deportivas","reporteria__actividades__5",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadesDeportivas__6","Actividades deportivas","reporteria__actividades__6",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadesDeportivas__7","Actividades deportivas","reporteria__actividades__7",["ÍTEM","Tipo financiamiento","Evento","Deporte","Provincia","País","Alcance","Fecha<br>inicio","Fecha<br>fin","Genero","Categoria","Número entrenadores","Número atletas","Total","Beneficiarios","Beneficiaros2","Justificación","Cantidad Bienes","Detalle adquisición"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos("actividadAdministrativa","Actividades administrativas","reporteria__administrativas",["ÍTEM","Justificación","Cantidad"]);?>

<?=$componentes->getModalConfiguracion__reporteria__organismos("mantenimiento__ll","Mantenimiento","reporteria__mantenimiento",["ÍTEM","Nombre infraestructura","Provincia","Dirección","Estado","Tipo recursos","Tipo intervención","Detallar tipo intervención","Tipo Mantenimiento","Materiales servicios"]);?>


<?=$componentes->getModalConfiguracion__reporteria__organismos("suministros__ll","Suministros","reporteria__suministros",["Tipo","Nombre Escenario","Energía","Agua"]);?>


<!--====  End of Modalesd  ====-->


<div class="modal fade" id="poa__visor__modificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" style="width: 85%;">

		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Información anexa de modificaciones</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">

				<div style="width:100%;">

					<table id="documentos__seguimiento__2022__od__modificaciones">

					<thead>

						<tr>

							<th><center>MES</center></th>
							<th><center>DOCUMENTO</center></th>
							<th><center>DOCUMENTO</center></th>
				
						</tr>

					</thead>

					</table>

				</div>

				       
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>

		</div>

	</div>

</div>

<div class="modal fade" id="poa__visor__seguimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" style="width: 85%;">

		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Información anexa de seguimiento</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">

				<div style="width:100%;">

					<table id="documentos__seguimiento__2022__od__seguimiento">

					<thead>

						<tr>

							<th><center>TRIMESTRE</center></th>
							<th><center>TIPO DOCUMENTO</center></th>
							<th><center>DOCUMENTO</center></th>
				
						</tr>

					</thead>

					</table>

				</div>

				       
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
	datatablets__funcio__repor__12($("#poa__seguimiento__anexos"),$("#documentos__seguimiento__2022__od__seguimiento"),"documentos__seguimiento__2022__od__organismo","seguimiento");
	datatablets__funcio__repor__12__modificacion($("#poa__modificaciones__anexos"),$("#documentos__seguimiento__2022__od__modificaciones"),"documentos__modificacion__2022__od__organismo","modificacion");
</script>