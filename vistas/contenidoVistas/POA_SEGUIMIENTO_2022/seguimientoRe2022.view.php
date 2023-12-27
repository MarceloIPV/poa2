<?php $objetoInformacion= new usuarioAcciones();?>
<?php $componentes= new componentes();?>
<?php $componentesTablas= new componentesTablas__dos();?>

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

	<?=$componentes->getComponentes(1,"REPORTERÍA DE SEGUIMIENTO PARA EL AÑO $anio__actual");?>

	<section class="content__configuraciones row d d-flex justify-content-center">

		<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__se"],["Declaración del correcto uso de los recursos"],'documentacionGenerada__in');?>

		<?=$componentes->getLinksConfiguracion__parametros(["documentacionGenerada__finales__se"],["Reporte trimestral"],'documentacionGenerada__in__final');?>

		<?=$componentes->getLinksConfiguracion__parametros(["autogestion__se"],["Autogestión"],'autogestionPoas__in');?>

		<?=$componentes->getLinksConfiguracion__parametros(["indicadores__se"],["Indicadores"],'indicadores__in');?>

		<?php if (!empty($actividadesSeleccionadas[0][idOrganismo])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["sueldos__se"],["Sueldos y salarios"],'sueldos__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas__honorarios[0][idOrganismo])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["honorarios__se"],["Honorarios"],'honorarios__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas__actividadesAdmi[0][idActividadAd])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["administrativo__se"],["Actividades administrativas"],'administrativo__in');?>

		<?php endif ?>

		<?php if (!empty($actividadesSeleccionadas__mantenimientoAdmin[0][idMantenimiento])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["mantenimiento__se"],["Mantenimiento"],'mantenimiento__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["mantenimientoTec__se"],["Mantenimiento Técnico"],'mantenimientoTec__in');?>

		<?php endif ?>

		<?php if (!empty($capacitacion__3[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["capacitacion__se"],["Capacitacion"],'capacitacion__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["capacitacionTec__se"],["Capacitacion Técnico"],'capacitacionTec__in');?>

		<?php endif ?>

		<?php if (!empty($competencia__5[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["competencia__se"],["Competencia"],'competencia__in');?>

			<?php if (!empty($tipo__deOrganismos[0][nombreTipo])): ?>

				<?=$componentes->getLinksConfiguracion__parametros(["competenciaForma__se"],["Competencia Formativa"],'competenciaFormativa__in');?>

			<?php else: ?>

				<?=$componentes->getLinksConfiguracion__parametros(["competenciaAlto__se"],["Competencia Alto rendimiento"],'competenciaAlto__in');?>

			<?php endif ?>

		<?php endif ?>

		<?php if (!empty($recreativas__6[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["recreativo__se"],["Recreativo"],'recreativo__in');?>

			<?=$componentes->getLinksConfiguracion__parametros(["recreativoTec__se"],["Recreativo Técnico"],'recreativoTec__in');?>

		<?php endif ?>

		<?php if (!empty($recreativas__7[0][idPda])): ?>

			<?=$componentes->getLinksConfiguracion__parametros(["implementacion__se"],["Implementación"],'implementacion__in');?>

		<?php endif ?>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->
<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("documentacionGenerada__finales__se","Reporte trimestral","seguimiento__documentacionGenerada__2",["Fecha","Documento"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("documentacionGenerada__se","Declaración del uso de los recursos","seguimiento__documentacionGenerada",["Año","Trimestre","Declaración del uso de los recursos"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("autogestion__se","Autogestión","seguimiento__autogestiones",["Detalle autogestión","Monto autogestión","Detalle de reinversión en el reporte educación física y/o recreación","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("indicadores__se","Indicadores","seguimiento__indicadores",["Actividad","Total programado","Total ejecutado","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("sueldos__se","Sueldos salarios","seguimiento__sueldos__salarios",["Áctividad","Cédula","Nombre","Cargo","Tipo cargo","Sueldo planificado","Sueldo ejecutado","Aporte Iess planificado","Aporte Iess ejectuado","Décimo tercero planificado","Décimo tercero ejecutado","Décimo cuarto planificado","Décimo cuarto ejecutado","Fondos de reserva planificado","Fondos de reserva ejecutado","Compensación Desahucio planificado","Compensación Desahucio ejecutado","Despido Intempestivo planificado","Despido Intempestivo Ejecutado","Renuncia voluntaria planificada","Renuncia voluntaria ejecutado","Vaciones Programado","Vacaciones Ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("honorarios__se","Honorarios","seguimiento__honorarios",["Áctividad","Cédula","Nombres","Cargo","Tipo cargo","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("administrativo__se","Actividades administrativas","seguimiento__administrativas",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("mantenimiento__se","Mantenimiento","seguimiento__mantenimientos",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("mantenimientoTec__se","Mantenimiento Técnico","seguimiento__mantenimientosTec",["Código","Ítem","Planificado inicial","Ejecutado inicial","Planificado final","Ejecutado final","Observaciones","Porcentaje","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("capacitacion__se","Capacitación","seguimiento__capacitacion",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("capacitacionTec__se","Capacitación Técnica","seguimiento__capacitacionTecni",["Código","Ítem","Planificación inicial","Ejecución inicial","Planificación final","Ejecución final","Observaciones Técnicas","Porcentaje","Beneficiarios Hombres","Beneficiarios mujeres","Total","Tipo organización","Ruc","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competencia__se","Competencia","seguimiento__competencia",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competenciaForma__se","Competencia Formativo","seguimiento__competenciaFor",["Código","Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("competenciaAlto__se","Competencia Alto","seguimiento__competenciaAlto",["Código","Ítem","Evento","Oro","Plata","Bronce","Total","C/O","Analisis","Observaciones Técnicas","Porcentaje","Benefeiciarios hombres","Beneficiarios mujeres","Total beneficiarios","Tipo organización","Ruc","Nombre organismo","Fecha","Fecha","Fecha","Fecha 4","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("recreativo__se","Recreativo","seguimiento__recreativo",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("recreativoTec__se","Recreativo Técnico","seguimiento__recreativoTec",["Código","Ítem","Observaciones","Porcentaje","Beneficiarios hombres","Beneficiarios mujeres","Total","Fecha inicio planificacdo","Fecha inicio ejecutado","Fecha fin planificado","Fecha fin ejecutado","Tipo evento","Evento tarea","Nivel","Total","Tipo organización","Nombre organismo","Trimestre","Año"]);?>

<?=$componentesTablas->getModalConfiguracion__reporteria__organismos__seguimientos("implementacion__se","Implementación","seguimiento__implementacion",["Código","Ítem","Mensual programado","Mensual ejecutado","Mes","Trimestre","Año"]);?>

<!--====  End of Modalesd  ====-->


