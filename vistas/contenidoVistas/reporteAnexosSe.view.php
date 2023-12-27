<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="col col-4 mt-2" style="font-weight: bold;">

			Elegir año

		</div>

		<div class="col col-8 mt-2">

			<select id="selector__anios__se" class="ancho__total__input__selects">
				
				<option value="0">--Elegir año--</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
				<option value="2027">2027</option>
				<option value="2028">2028</option>
				<option value="2029">2029</option>
				<option value="2030">2030</option>
				<option value="2031">2031</option>
				<option value="2032">2032</option>
				<option value="2033">2033</option>
				<option value="2034">2034</option>
				<option value="2035">2035</option>
				<option value="2036">2036</option>
				<option value="2037">2037</option>
				<option value="2038">2038</option>
				<option value="2039">2039</option>
				<option value="2040">2040</option>

			</select>

		</div>

		<div class="tabla__ocultas__anexos__seguimientos mt-4">

			<table id="seguimiento__reportes__anexos" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>I TRIMESTRE</center></th>
						<th><center>REPORTES EMITIDOS</center></th>
						<th><center>II TRIMESTRE</center></th>
						<th><center>REPORTES EMITIDOS</center></th>
						<th><center>III TRIMESTRE</center></th>
						<th><center>REPORES EMITIDOS</center></th>
						<th><center>IV TRIMESTRE</center></th>
						<th><center>REPORES EMITIDOS</center></th>
						<th><center>AÑO</center></th>

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->get__modal__plantilla__inicios__se__2guimientos__se__2guimientos__d__recomendados__reporterias__recorridos__reportesAnexos__se__2s("reasignarSeguimientos__recorridos__anexosRes","SECCIÓN DE REPORTES ANEXOS","principal__recorridos__bodys__reportesAnexos__Res");?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("autogestion__se__2","Autogestión","seguimiento__autogestiones__2",["Detalle autogestión","Monto autogestión","Detalle de reinversión en el reporte educación física y/o recreación","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("indicadores__se__2","Indicadores","seguimiento__indicadores__2",["Actividad","Total programado","Total ejecutado","Trimestre","Año","Documento"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("sueldos__se__2","Sueldos salarios","seguimiento__sueldos__salarios__2",['Actividad',"Cédula","Nombre","Sueldo planificado","Sueldo ejecutado","Aporte Iess planificado","Aporte Iess ejectuado","Décimo tercero planificado","Décimo tercero ejecutado","Décimo cuarto planificado","Décimo cuarto ejecutado","Fondos de reserva planificado","Fondos de reserva ejecutado","Compensación Desahucio planificado","Compensación Desahucio ejecutado","Despido Intempestivo planificado","Despido Intempestivo Ejecutado","Renuncia voluntaria planificada","Renuncia voluntaria ejecutado","Vaciones Programado","Vacaciones Ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("honorarios__se__2","Honorarios","seguimiento__honorarios__2",["Actividad","Cédula","Nombres","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("administrativo__se__2","Actividades administrativas","seguimiento__administrativas__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("mantenimiento__se__2","Mantenimiento","seguimiento__mantenimientos__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("mantenimientoTec__se__2","Mantenimiento Técnico","seguimiento__mantenimientosTec__2",["Ítem","Planificado inicial","Ejecutado inicial","Planificado final","Ejecutado final","Observaciones","Porcentaje","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("capacitacion__se__2","Capacitación","seguimiento__capacitacion__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("capacitacionTec__se__2","Capacitación Técnica","seguimiento__capacitacionTecni__2",["Ítem","Planificación inicial","Ejecución inicial","Planificación final","Ejecución final","Observaciones Técnicas","Porcentaje","Beneficiarios Hombres","Beneficiarios mujeres","Total","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competencia__se__2","Competencia","seguimiento__competencia__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competenciaForma__se__2","Competencia Formativo","seguimiento__competenciaFor__2",["Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competenciaAlto__se__2","Competencia Alto","seguimiento__competenciaAlto__2",["Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("recreativo__se__2","Recreativo","seguimiento__recreativo__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("recreativoTec__se__2","Recreativo Técnico","seguimiento__recreativoTec__2",["Ítem","Observaciones","Porcentaje","Beneficiarios hombres","Beneficiarios mujeres","Total","Fecha inicio planificacdo","Fecha inicio ejecutado","Fecha fin planificado","Fecha fin ejecutado","Tipo evento","Evento tarea","Nivel","Total","Tipo organización","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("implementacion__se__2","Implementación","seguimiento__implementacion__2",["Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>


<!--====  End of Modales  ====-->
