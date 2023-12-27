
<?php session_start(); ?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>

<?php $objetoInformacion= new usuarioAcciones();?>
<?php $componentes= new componentes();?>
<?php $componentesTablas= new componentesTablas();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anio__actual = date('Y');//$anio__actual = date('Y');?>

<?php $anioActual = date('Y');//$anioActual = date('Y');?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>



<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">


	<div class="col col-12 text-center mt-2 titulo__enfasis">

							REPORTERÍA ANUAL <?php echo $aniosPeriodos__ingesos?>

	</div>

	<input type="hidden" id="idOrganismoReporteriaAnual" >


		<div class=" mt-4">

			<table id="seguimiento__reporteria__anualRE2023" class="col col-12 cell-border">

				<thead>

					<tr>
						<th><center>Jurisdicción</center></th>
						<th><center>RUC</center></th>
						<th><center>Organización Deportiva</center></th>
						<th><center>Tipo Organismo</center></th>
						<th><center>Provincia</center></th>
						<th><center>Cantón</center></th>
						<th><center>Correo</center></th>
						<th><center>Año</center></th>
						<th><center>Reporte</center></th>
						

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>



<!--=============================
=            Modal           =
==============================-->

<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalReporteriaAnual' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-xl">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id='    '>Reportería Anual<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarReporteriaAnualRevisor' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id=' ' class='modal-body row'>

							<?=$componentes->getComponentes(1,"REPORTERÍA DE SEGUIMIENTO PARA EL AÑO $aniosPeriodos__ingesos");?>

							<div class='col col-12 text-center mt-2 titulo__enfasis'>

							<span id="nombreOrganismo"></span>

							</div>

							<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__seRevisor"],["Declaración del correcto uso de los recursos públicos"],'documentacionGenerada__in');?>
			
							<?=$componentes->getLinksConfiguracion__parametros(["modal_documentacionGenerada__cpRevisor"],["Declaración de responsabilidad de procedimientos de contratación pública"],'btn_documentacion__Generada__cp');?>


							<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__finales__seRevisor"],["Reporte trimestral"],'documentacionGenerada__in__final');?>

							<?=$componentes->getLinksConfiguracion__parametros(["autogestion__seRevisor"],["Autogestión"],'autogestionPoas__in');?>

							<?=$componentes->getLinksConfiguracion__parametros(["indicadores__seRevisor"],["Indicadores"],'indicadores__in');?>

							<div id="administrativo" style="display: none">

								<?=$componentes->getLinksConfiguracion__parametros(["administrativo__seRevisor"],["001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria"],'administrativo__in');?>

							</div>

							<div id="mantenimiento" style="display: none">

								<?=$componentes->getLinksConfiguracion__parametros(["mantenimiento__seRevisor"],["002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria"],'mantenimiento__in');?>

								<?=$componentes->getLinksConfiguracion__parametros(["mantenimientoTec__seRevisor"],["002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica"],'mantenimientoTec__in');?>

						
							</div>

							<div id="capacitacion" style="display: none">

								<?=$componentes->getLinksConfiguracion__parametros(["capacitacion__seRevisor"],["003 - Capacitación deportiva o de recreación - Ejecución presupuestaria"],'capacitacion__in');?>

								<?=$componentes->getLinksConfiguracion__parametros(["capacitacionTec__seRevisor"],["003 - Capacitación deportiva o de recreación - Información técnica"],'capacitacionTec__in');?>

							</div>

							<div id="sueldos" style="display: none">
							<?=$componentes->getLinksConfiguracion__parametros(["sueldos__seRevisor"],["004 - Operación deportiva - Sueldos y salarios"],'sueldos__in');?>

							</div>

							<div id="honorarios" style="display: none">				
								<?=$componentes->getLinksConfiguracion__parametros(["honorarios__seRevisor"],["004 - Operación deportiva - Honorarios"],'honorarios__in');?>

							</div>

							<div id="competencia" style="display: none">

							<?=$componentes->getLinksConfiguracion__parametros(["competencia__seRevisor"],["005 - Eventos de preparación y competencia - Ejecución presupuestaria"],'competencia__in');?>

								<div id="formativo" style="display: none">

									<?=$componentes->getLinksConfiguracion__parametros(["competenciaForma__seRevisor"],["005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica"],'competenciaFormativa__in');?>

								</div >

								<div id="altoRen" style="display: none">

									<?=$componentes->getLinksConfiguracion__parametros(["competenciaAlto__seRevisor"],["005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica"],'competenciaAlto__in');?>

								</div>

							</div>

							<div id="recreacion" style="display: none">
								<?=$componentes->getLinksConfiguracion__parametros(["recreativo__seRevisor"],["006 - Actividades recreativas - Ejecución presupuestaria"],'recreativo__in');?>

								<?=$componentes->getLinksConfiguracion__parametros(["recreativoTec__seRevisor"],["006 - Actividades recreativas - Información técnica"],'recreativoTec__in');?>

							</div>

							<div  id="implementacion" style="display: none">

							<?=$componentes->getLinksConfiguracion__parametros(["implementacion__seRevisor"],["007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica"],'implementacion__in');?>

							</div>

								
						</div>
						
			</form>

	</div>

</div>


<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("documentacionGenerada__finales__seRevisor","Reporte trimestral","seguimiento__reporte__trimestralRevisor",["Fecha de envío", "Trimestre", "Documento"],"btnCerrarReporteTrimestral");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("documentacionGenerada__seRevisor","Declaración del correcto uso de los recursos públicos","seguimiento__UsoCorrectoRecursosRevisor",["Fecha de envío","Trimestre","Declaración del uso de los recursos"],"btnCerrarUsoRecursosPublicos");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("autogestion__seRevisor","Autogestión","seguimiento__autogestionesRevisor",["Detalle autogestión","Monto autogestión","Detalle de reinversión en el reporte educación física y/o recreación","Trimestre","Año"],"btnCerrarAutogestiones");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("modal_documentacionGenerada__cpRevisor","Declaración de responsabilidad de procedimientos de contratación pública","dt_seguimiento__documentacionGenerada_cp_Revisor",["Fecha de envío", "Trimestre", "Declaración de contratación pública"],"btnCerrarCP");?>


<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("indicadores__seRevisor","Indicadores","seguimiento__indicadoresRevisor",["Actividad","Total programado","Total ejecutado","Trimestre","Año"],"btnCerrarIndicadores");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("sueldos__seRevisor","004 - Operación deportiva - Sueldos y salarios","seguimiento__sueldos__salariosRevisor",["Áctividad","Cédula","Nombre","Cargo","Tipo cargo","Sueldo planificado","Sueldo ejecutado","Aporte Iess planificado","Aporte Iess ejectuado","Décimo tercero planificado","Décimo tercero ejecutado","Décimo cuarto planificado","Décimo cuarto ejecutado","Fondos de reserva planificado","Fondos de reserva ejecutado","Deshaucio Planificado","Deshaucio Ejecutado","Despido Intempestivo Planificado","Despido Intempestivo Ejecutado","Renuncia Voluntaria Planificado","Renuncia Voluntaria Ejecutado","Vacaciones Planificado","Vacaciones Ejecutado","Mes","Trimestre","Año"],"btnCerrarSueldoSalarios");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("honorarios__seRevisor","004 - Operación deportiva - Honorarios","seguimiento__honorariosRevisor",["Áctividad","Cédula","Nombres","Cargo","Tipo cargo","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"],"btnCerrarHonorarios");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("administrativo__seRevisor","001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria","seguimiento__administrativasRevisor",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"],"btnCerrarAdministrativo");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("mantenimiento__seRevisor","002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria","seguimiento__mantenimientosPresRevisor",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificacion","Año"],"btnCerrarMantenimientoPresRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("mantenimientoTec__seRevisor","002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica","seguimiento__mantenimientosTecRevisor",["Código","Ítem","Planificado inicial","Ejecutado inicial","Planificado final","Ejecutado final","Observaciones","Porcentaje","Trimestre","Año"],"btnCerrarMantenimientoTecRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("capacitacion__seRevisor","003 - Capacitación deportiva o de recreación - Ejecución presupuestaria","seguimiento__capacitacionPresRevisor",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratacion","Justificación" ,"Año"],"btnCerrarcapacitacionPresRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("capacitacionTec__seRevisor","003 - Capacitación deportiva o de recreación - Información técnica","seguimiento__capacitacionTecniRevisor",["Código","Ítem","Planificación inicial","Ejecución inicial","Planificación final","Ejecución final","Observaciones Técnicas","Porcentaje","Beneficiarios Hombres","Beneficiarios mujeres","Total","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"],"btnCerrarcapacitacionTecRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("competencia__seRevisor","005 - Eventos de preparación y competencia - Ejecución presupuestaria","seguimiento__competenciaPresRevisor",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"],"btnCerrarCompetenciaPresRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("competenciaForma__seRevisor","005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica","seguimiento__competenciaForRevisor",["Código","Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"],"btnCerrarCompetenciaForRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("competenciaAlto__seRevisor","005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica","seguimiento__competenciaAltoRevisor",["Código","Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"],"btnCerrarCompetenciaAltRevisor");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("recreativo__seRevisor","006 - Actividades recreativas - Ejecución presupuestaria","seguimiento__recreativoRevisorPres",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"],"btnCerrarRecreativoPres");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("recreativoTec__seRevisor","006 - Actividades recreativas - Información técnica","seguimiento__recreativoTecRevisor",["Código","Ítem","Observaciones","Porcentaje","Beneficiarios hombres","Beneficiarios mujeres","Total","Fecha inicio planificacdo","Fecha inicio ejecutado","Fecha fin planificado","Fecha fin ejecutado","Tipo evento","Evento tarea","Nivel","Total","Tipo organización","Nombre organismo","Trimestre","Año"],"btnCerrarRecreativoTec");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos3("implementacion__seRevisor","007 - Implementación deportiva  - Ejecución presupuestaria e Información Técnica","seguimiento__implementacionRevisor",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"],"btnCerrarImplementacionRevisor");?>


<!--====  End of Modalesd  ====-->


<script>


$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

	datatabletsSeguimientoRevisorVacio($("#seguimiento__reporteria__anualRE2023"),"seguimiento__reporteria__anualRE2023","Reportes y Anexos",objetosSeguimiento2023([8],["boton"],["<center><button class='seguimientos__reporteria__anual estilo__botonDatatablets btn btn-info pointer__botones' data-bs-toggle='modal' data-bs-target='#modalReporteriaAnual'><i class='fas fa-user-edit'></i></button><center>"],[false],[false],6),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reporte__seguimientos__anual__revisor"]);

});

</script>