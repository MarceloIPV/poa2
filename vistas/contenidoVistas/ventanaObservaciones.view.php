<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $aprobacionUsuario=$objetoInformacion->getObservacionesAprobacionUsuarios($informacionObjeto[0][idOrganismo]);?>

<?php $componentes= new componentes();?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>


<?php $generalObservaciones=$objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $subsecretariaActividad=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='subFisica' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $subsecretariaAltoRen=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='altoRendi' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $corAdministrativo=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='administrativo' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $corTalentoHumano=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='talentoHumano' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $corInstalaciones=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='zonalE' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $corFinancieros=$objetoInformacion->getObtenerInformacionGeneral("SELECT estadoObservacion FROM poa_concluciones WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND tipoObservacion='zonalFinan' AND estadoObservacion='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $actividad3=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND idActividad='3' AND perioIngreso='$aniosPeriodos__ingesos';");?>
<?php $actividad4=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND idActividad='4' AND perioIngreso='$aniosPeriodos__ingesos';");?>
<?php $actividad5=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND idActividad='5' AND perioIngreso='$aniosPeriodos__ingesos';");?>
<?php $actividad6=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND idActividad='6' AND perioIngreso='$aniosPeriodos__ingesos';");?>
<?php $actividad7=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND idActividad='7' AND perioIngreso='$aniosPeriodos__ingesos';");?>


<input type="hidden" id="actividad3" name="actividad3" value="<?=$actividad3[0][idActividad]?>"/>
<input type="hidden" id="actividad4" name="actividad4" value="<?=$actividad4[0][idActividad]?>"/>
<input type="hidden" id="actividad5" name="actividad5" value="<?=$actividad5[0][idActividad]?>"/>
<input type="hidden" id="actividad6" name="actividad6" value="<?=$actividad6[0][idActividad]?>"/>
<input type="hidden" id="actividad7" name="actividad7" value="<?=$actividad7[0][idActividad]?>"/>


<input type="hidden" id="elementoOrganismo" name="elementoOrganismo" value="<?=$informacionObjeto[0][idOrganismo]?>"/>

<div class="content-wrapper d d-flex flex-column align-items-center">

<form id="observacionesForm" class="seccion__observaciones row d d-flex justify-content-center">

<?php if ($generalObservaciones[0][estado]=="A"): ?>

	<?php if ($subsecretariaActividad[0][estadoObservacion]=="A"): ?>

		<?=$componentes->getLinksConfiguracion__activado(["observaActividadFisica"],["Observaciones relacionadas a la subsecretaría de actividad física"],["fisicaAbrir"]);?>
		
	<?php endif ?>

	<?php if ($subsecretariaAltoRen[0][estadoObservacion]=="A"): ?>

		<?=$componentes->getLinksConfiguracion__activado(["observaAlto"],["Observaciones relacionadas a la subsecretaría de alto rendimiento"],["altoAbir"]);?>

	<?php endif ?>	

	
	<?php if ($corAdministrativo[0][estadoObservacion]=="A"): ?>

		<?=$componentes->getLinksConfiguracion__activado(["observaAdministrativo"],["Observaciones relacionadas a dirección administrativa"],["administrativoAbir"]);?>

	<?php endif ?>	

	<?php if ($corTalentoHumano[0][estadoObservacion]=="A"): ?>

		<?=$componentes->getLinksConfiguracion__activado(["observaHumano"],["Observaciones relacionadas a dirección de talento humano"],["talentoHumanoAbir"]);?>
		

	<?php endif ?>		

	<?php if ($corInstalaciones[0][estadoObservacion]=="A"): ?>
	
		<?=$componentes->getLinksConfiguracion__activado(["observaInfra"],["Observaciones relacionadas a la coordinaciòn de instalaciones deportivas"],["infraestructuraAbir"]);?>

	<?php endif ?>	

	<?php if ($corFinancieros[0][estadoObservacion]=="A"): ?>
	
		<?=$componentes->getLinksConfiguracion__activado(["observaPura__zonal"],["Observaciones relacionadas a la parte financiera de la coordinación zonal"],["zonalPuraAbir"]);?>

	<?php endif ?>	


<?php endif ?>

</form>

</div>

<?=$componentes->getModalMatricezObserva2__indice("observaActividadFisica","Observaciones relacionadas a la subsecretaría de actividad física");?>

<?=$componentes->getModalMatricezObserva2__indice("observaAlto","Observaciones relacionadas a la subsecretaría de alto rendimiento");?>

<?=$componentes->getModalMatricezObserva2__indice("observaAdministrativo","Observaciones relacionadas a la subsecretaría de actividad física");?>

<?=$componentes->getModalMatricezObserva2__indice("observaHumano","Observaciones relacionadas a dirección de talento humano");?>

<?=$componentes->getModalMatricezObserva2__indice("observaInfra","Observaciones relacionadas a dirección de infraestructura");?>

<?=$componentes->getModalMatricezObserva2__indice("observaInsta","Observaciones relacionadas a dirección de instalaciones deportivas");?>

<?=$componentes->getModalMatricezObserva2__indice("observaPura__zonal","Observaciones relacionadas a la parte financiera de la coordinación zonal");?>