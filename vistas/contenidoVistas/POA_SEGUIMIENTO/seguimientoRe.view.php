<?php $objetoInformacion= new usuarioAcciones();?>
<?php $componentes= new componentes();?>
<?php $componentesTablas= new componentesTablas();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anio__actual = date('Y');//$anio__actual = date('Y');?>

<?php $anioActual = date('Y');//$anioActual = date('Y');?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>


<?php $tipo__deOrganismos=$objetoInformacion->getObtenerInformacionGeneral("SELECT d.nombreTipo FROM poa_organismo AS a INNER JOIN poa_competencia_organismo_competencia AS b ON a.idOrganismo=b.idOrganismo INNER JOIN poa_tipo_organismo AS d ON d.idTipoOrganismo=b.idTipoOrganismo WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND (d.nombreTipo LIKE '%cantonales%' OR d.nombreTipo LIKE '%comunitarias%'  OR d.nombreTipo LIKE '%deportivas provinciales%' OR d.nombreTipo LIKE '%barriales y parroquiales%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones provinciales de ligas%' OR d.nombreTipo LIKE '%Federaciones deportivas provinciales de r%' OR d.nombreTipo LIKE '%Nacional de Ligas Deportivas%' OR d.nombreTipo LIKE '%Nacional del Ecuador%' OR d.nombreTipo LIKE '%de Deporte Universitario%' OR d.nombreTipo LIKE '%Estudiantil%' OR d.nombreTipo LIKE '%Rurales%');");?>

<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_sueldossalarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='".$aniosPeriodos__ingesos."';");?>


<?php $actividadesSeleccionadas__honorarios=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idOrganismo FROM poa_honorarios2022 AS a WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='".$aniosPeriodos__ingesos."';");?>

<?php $tipoTrimestre=$objetoInformacion->getObtenerInformacionGeneral("SELECT tipoTrimestre FROM poa_trimestrales WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND YEAR(fecha)='$anioActual' ORDER BY idEnviadorTrimestres DESC;");?>

<?php $actividadesSeleccionadas__actividadesAdmi=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idActividadAd FROM poa_actividadesadministrativas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $actividadesSeleccionadas__mantenimientoAdmin=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idMantenimiento FROM poa_mantenimiento AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' GROUP BY a.idProgramacionFinanciera ORDER BY a.idMantenimiento DESC;");?>

<?php $capacitacion__3=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='3' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $competencia__5=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='5' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $recreativas__6=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='6' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $recreativas__7=$objetoInformacion->getObtenerInformacionGeneral("SELECT a.idPda FROM poa_actdeportivas AS a INNER JOIN poa_programacion_financiera AS b ON a.idProgramacionFinanciera=b.idProgramacionFinanciera WHERE b.idActividad='7' AND b.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos';");?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	
	<?=$componentes->getComponentes(1,"REPORTERÍA DE SEGUIMIENTO PARA EL AÑO $aniosPeriodos__ingesos");?>

	<section class="content__configuraciones row d d-flex justify-content-center">


		<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__se"],["Declaración del correcto uso de los recursos públicos"],'documentacionGenerada__in');?>
		
		<?=$componentes->getLinksConfiguracion__parametros(["modal_documentacionGenerada__cp"],["Declaración de responsabilidad de procedimientos de contratación pública"],'btn_documentacion__Generada__cp');?>


		<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__finales__se"],["Reporte trimestral"],'documentacionGenerada__in__final');?>

		<?=$componentes->getLinksConfiguracion__parametros(["autogestion__se"],["Autogestión"],'autogestionPoas__in');?>

		<?=$componentes->getLinksConfiguracion__parametros(["indicadores__se"],["Indicadores"],'indicadores__in');?>

		
		<?php if (!empty($actividadesSeleccionadas__actividadesAdmi[0][idActividadAd])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["administrativo__se"],["001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria"],'administrativo__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas__mantenimientoAdmin[0][idMantenimiento])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["mantenimiento__se"],["002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria"],'mantenimiento__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["mantenimientoTec__se"],["002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica"],'mantenimientoTec__in');?>

		<?php endif ?>

		<?php if (!empty($capacitacion__3[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["capacitacion__se"],["003 - Capacitación deportiva o de recreación - Ejecución presupuestaria"],'capacitacion__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["capacitacionTec__se"],["003 - Capacitación deportiva o de recreación - Información técnica"],'capacitacionTec__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas[0][idOrganismo])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["sueldos__se"],["004 - Operación deportiva - Sueldos y salarios"],'sueldos__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas__honorarios[0][idOrganismo])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["honorarios__se"],["004 - Operación deportiva - Honorarios"],'honorarios__in');?>

		<?php endif ?>

		<?php if (!empty($competencia__5[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["competencia__se"],["005 - Eventos de preparación y competencia - Ejecución presupuestaria"],'competencia__in');?>

			<?php if (!empty($tipo__deOrganismos[0][nombreTipo])): ?>

				<?=$componentes->getLinksConfiguracion__parametros(["competenciaForma__se"],["005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica"],'competenciaFormativa__in');?>

			<?php else: ?>

				<?=$componentes->getLinksConfiguracion__parametros(["competenciaAlto__se"],["005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica"],'competenciaAlto__in');?>

			<?php endif ?>

		<?php endif ?>

		<?php if (!empty($recreativas__6[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["recreativo__se"],["006 - Actividades recreativas - Ejecución presupuestaria"],'recreativo__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["recreativoTec__se"],["006 - Actividades recreativas - Información técnica"],'recreativoTec__in');?>

		<?php endif ?>

		<?php if (!empty($recreativas__7[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["implementacion__se"],["007 - implementación deportiva  - Ejecución presupuestaria e Información Técnica"],'implementacion__in');?>

		<?php endif ?>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("documentacionGenerada__finales__se","Reporte trimestral","seguimiento__documentacionGenerada__2",["Fecha de envío", "Trimestre", "Documento"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("documentacionGenerada__se","Declaración del correcto uso de los recursos públicos","seguimiento__documentacionGenerada",["Fecha de envío","Trimestre","Declaración del uso de los recursos"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("autogestion__se","Autogestión","seguimiento__autogestiones",["Detalle autogestión","Monto autogestión","Detalle de reinversión en el reporte educación física y/o recreación","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("modal_documentacionGenerada__cp","Declaración de responsabilidad de procedimientos de contratación pública","dt_seguimiento__documentacionGenerada_cp",["Fecha de envío", "Trimestre", "Declaración de contratación pública"]);?>


<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("indicadores__se","Indicadores","seguimiento__indicadores",["Actividad","Total programado","Total ejecutado","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("sueldos__se","004 - Operación deportiva - Sueldos y salarios","seguimiento__sueldos__salarios",["Áctividad","Cédula","Nombre","Cargo","Tipo cargo","Sueldo planificado","Sueldo ejecutado","Aporte Iess planificado","Aporte Iess ejectuado","Décimo tercero planificado","Décimo tercero ejecutado","Décimo cuarto planificado","Décimo cuarto ejecutado","Fondos de reserva planificado","Fondos de reserva ejecutado","Deshaucio Programado","Deshaucio Ejecutado","Despido Intempestivo Programado","Despido Intempestivo Ejecutado","Renuncia Voluntaria Programado","Renuncia Voluntaria Ejecutado","Vacaciones Programado","Vacaciones Ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("honorarios__se","004 - Operación deportiva - Honorarios","seguimiento__honorarios",["Áctividad","Cédula","Nombres","Cargo","Tipo cargo","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("administrativo__se","001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria","seguimiento__administrativas",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("mantenimiento__se","002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria","seguimiento__mantenimientos",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificacion","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("mantenimientoTec__se","002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica","seguimiento__mantenimientosTec",["Código","Ítem","Planificado inicial","Ejecutado inicial","Planificado final","Ejecutado final","Observaciones","Porcentaje","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("capacitacion__se","003 - Capacitación deportiva o de recreación - Ejecución presupuestaria","seguimiento__capacitacion",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratacion","Justificación" ,"Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("capacitacionTec__se","003 - Capacitación deportiva o de recreación - Información técnica","seguimiento__capacitacionTecni",["Código","Ítem","Planificación inicial","Ejecución inicial","Planificación final","Ejecución final","Observaciones Técnicas","Porcentaje","Beneficiarios Hombres","Beneficiarios mujeres","Total","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competencia__se","005 - Eventos de preparación y competencia - Ejecución presupuestaria","seguimiento__competencia",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competenciaForma__se","005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica","seguimiento__competenciaFor",["Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha Planificado Inicial","Fecha Ejecutado Inicial","Fecha Planificado Final","Fecha Ejecutado Final","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("competenciaAlto__se","005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica","seguimiento__competenciaAlto",["Código","Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("recreativo__se","006 - Actividades recreativas - Ejecución presupuestaria","seguimiento__recreativo",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("recreativoTec__se","006 - Actividades recreativas - Información técnica","seguimiento__recreativoTec",["Código","Ítem","Observaciones","Porcentaje","Beneficiarios hombres","Beneficiarios mujeres","Total","Fecha inicio planificacdo","Fecha inicio ejecutado","Fecha fin planificado","Fecha fin ejecutado","Tipo evento","Evento tarea","Nivel","Total","Tipo organización","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos2("implementacion__se","007 - Implementación deportiva  - Ejecución presupuestaria e Información Técnica","seguimiento__implementacion",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Registra Contratación","Justificación","Año"]);?>


<!--====  End of Modalesd  ====-->


