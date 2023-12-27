<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<?php session_start(); ?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

	<div class="col col-12 text-center mt-2 titulo__enfasis">

							Reportes y Anexos <?php echo $aniosPeriodos__ingesos?>

							<input type="hidden" name="" id="idOrganismo">
							<input type="hidden" name="" id="trimestreN">

	</div>

		<div class=" mt-4">

			<table id="seguimiento__reportes__anexosOD2023" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>JURISDICCIÓN</center></th>
						<th><center>RUC</center></th>
						<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
						<th><center>I TRIMESTRE</center></th>
						<!-- <th><center>II TRIMESTRE reporte</center></th> -->
						<th><center>II TRIMESTRE</center></th>
						<!-- <th><center>REPORTES EMITIDOS</center></th> -->
						<th><center>III TRIMESTRE</center></th>
						<!-- <th><center>REPORES EMITIDOS</center></th> -->
						<th><center>IV TRIMESTRE</center></th>						
						<!-- <th><center>REPORTES SEMESTRALES EMITIDOS</center></th> -->
						<th><center>REPORTES SEMESTRALES EMITIDOS</center></th>

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__se__2guimientos__se__2guimientos__d__recomendados__reporterias__recorridos__reportesAnexos__se__2s__2023("reasignarSeguimientos__recorridos__anexosRes","SECCIÓN DE REPORTES ANEXOS","principal__recorridos__bodys__reportesAnexos__Res");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("autogestion__se__2__2023","Autogestión","seguimiento__autogestiones__2",["Detalle autogestión","Monto autogestión","Detalle de reinversión en el reporte educación física y/o recreación","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("indicadores__se__2__2023","Indicadores","seguimiento__indicadores__2",["Actividad","Trimestre","Año","Total programado","Total ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("administrativo__se__2__2023","001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria","seguimiento__administrativas__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("mantenimiento__se__2__2023","002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria","seguimiento__mantenimientos__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("mantenimientoTec__se__2__2023","002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica","seguimiento__mantenimientosTec__2",["Ítem","Planificado inicial","Ejecutado inicial","Planificado final","Ejecutado final","Observaciones","Porcentaje","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("capacitacion__se__2__2023","003 - Capacitación deportiva o de recreación - Ejecución presupuestaria","seguimiento__capacitacion__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("capacitacionTec__se__2__2023","003 - Capacitación deportiva o de recreación - Información técnica","seguimiento__capacitacionTecni__2",["Ítem","Planificación inicial","Ejecución inicial","Planificación final","Ejecución final","Observaciones Técnicas","Porcentaje","Beneficiarios Hombres","Beneficiarios mujeres","Total","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("sueldos__se__2__2023","004 - Operación deportiva - Sueldos y salarios","seguimiento__sueldos__salarios__2",['Actividad',"Cédula","Nombre","Sueldo planificado","Sueldo ejecutado","Aporte Iess planificado","Aporte Iess ejectuado","Décimo tercero planificado","Décimo tercero ejecutado","Décimo cuarto planificado","Décimo cuarto ejecutado","Fondos de Reserva Planificado","Fondos de Reserva Ejecutado","Deshaucio Planificado","Deshaucio Ejecutado","Despido Intempestivo Planificado","Despido Intempestivo Ejecutado","Renuncia Voluntaria Planificado","Renuncia Voluntaria Ejecutado","Vacaciones Planificado","Vacaciones Ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("honorarios__se__2__2023","004 - Operación deportiva - Honorarios","seguimiento__honorarios__2",["Actividad","Cédula","Nombres","Mes","Trimestre","Año","Mensual programado","Mensual ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competencia__se__2__2023","005 - Eventos de preparación y competencia - Ejecución presupuestaria","seguimiento__competencia__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competenciaForma__se__2__2023","005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica","seguimiento__competenciaFor__2",["Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competenciaAlto__se__2__2023","005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica","seguimiento__competenciaAlto__2",["Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("recreativo__se__2__2023","006 - Actividades recreativas - Ejecución presupuestaria","seguimiento__recreativo__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("recreativoTec__se__2__2023","006 - Actividades recreativas - Información técnica","seguimiento__recreativoTec__2",["Ítem","Evento","Observaciones","Beneficiarios hombres 5-17 Años","Beneficiarios Mujeres 5-17 Años","Total 5-17 Años","Beneficiarios hombres 18-69 Años","Beneficiarios Mujeres 18-69 Años","Total 18-69 Años","Fecha inicio planificacdo","Fecha inicio ejecutado","Fecha fin planificado","Fecha fin ejecutado","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("implementacion__se__2__2023","007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica","seguimiento__implementacion__2",["Año","Trimestre","Mes","Código del Item","Ítem","Monto Programado","Monto ejecutado"]);?>

<!--====  End of Modales  ====-->
<script>


$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

	//datatabletsSeguimientoRevisorVacio($("#seguimiento__reportes__anexos2023"),"seguimiento__reportes__anexos2023","Reportes y Anexos",objetos([3,4,5,6,7,8,9,10,11],["boton","texto__separadores__2","boton","texto__separadores__2","boton","texto__separadores__2","boton","texto__separadores__2","texto"],["<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='1' data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",3,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='2'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",4,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='3'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",5,"<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='4'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",6,9],[false],[false],7),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__recorridos__anexos__reportes2023"]);

	datatabletsSeguimientoRevisorVacio($("#seguimiento__reportes__anexosOD2023"),"seguimiento__reportes__anexosOD2023","Reportes y Anexos",objetosSeguimiento2023([3,4,5,6,7],["boton","boton","boton","boton","texto__separadores__2informesSeguimientos"],["<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='1' data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>","<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='2'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>","<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-info pointer__botones' idTrimestres='3'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>","<center><button class='reasignar__seguimientos__recorridos__boton__anexos__reportes estilo__botonDatatablets btn btn-warning pointer__botones' idTrimestres='4'  data-toggle='modal' data-target='#reasignarSeguimientos__recorridos__anexosRes'><i class='fas fa-user-edit'></i></button><center>",4],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__recorridos__anexos__reportes2023"]);


});

</script>