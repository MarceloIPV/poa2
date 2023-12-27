<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anioActual = date('Y');?>

<?php $componentesTablas = new componentesTablas(); ?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<?php $informacionSeleccionada=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividades,nombreActividades FROM poa_actividades;");?>

<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad LIMIT 1;");?>

<?php $inversionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");?>

<?php $inversionOrganismoQueda=$objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");?>

<?php $inversionRestante=$objetoInformacion->getRestar($inversionOrganismo[0][nombreInversion],$inversionOrganismoQueda[0][sumaItemTotal]);?>


<?php $poaPreEn=$objetoInformacion->getObtenerInformacionGeneral("SELECT activo FROM poa_preliminar_envio WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND activo='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $observacionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $estadoFinal=$objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $incremento__decrementos=$objetoInformacion->getObtenerInformacionGeneral("SELECT incrementoDecremento FROM poa_inversion_usuario WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' AND (incrementoDecremento='incremento' OR incrementoDecremento='decremento') LIMIT 1;");?>

<?php $incremento__decrementos__final=$objetoInformacion->getObtenerInformacionGeneral("SELECT idIncrementos FROM poa_incrementos_ingreso WHERE idUsuario='1' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $incremento__decrementos__final__estados=$objetoInformacion->getObtenerInformacionGeneral("SELECT idIncrementos FROM poa_incrementos_ingreso WHERE estado='E' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>


<?php $incremento__decrementos__final__estados__observacion=$objetoInformacion->getObtenerInformacionGeneral("SELECT comentario FROM poa_incrementos_ingreso WHERE estado='O' AND idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $componentes= new componentes();?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<form class="content__configuraciones row d d-flex flex-column align-items-center mt-4 formulario__preliminarEnvio">

		<input type="hidden" id="actividad__determinantes" name="actividad__determinantes">

		<input type="hidden" id="planificados__ocultos" name="planificados__ocultos">

		<input type="hidden" id="actividadGeneral__id" name="actividadGeneral__id" />

		<input type="hidden" id="estadoFinal" name="estadoFinal" value="<?=$estadoFinal[0][idOrganismo]?>">

		<input type="hidden" id="poaActividad" name="poaActividad" value="<?=$actividadesSeleccionadas[0][idActividad]?>">

		<input type="hidden" id="observacionOr" name="observacionOr" value="<?=$observacionOrganismo[0][estado]?>">

		<input type="hidden" id="envioPreliminar" name="envioPreliminar" value="<?=$poaPreEn[0][activo]?>">

		<input type="hidden" id="montoAsginadoFe" name="montoAsginadoFe" value="<?=number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '')?>">

		<input type="hidden" id="montoDisponible" name="montoDisponible" value="<?=number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '')?>">

		<div class="text-center col col-12 titulo__enfasis uppercase__texto texto__titulo-hoja">

			Seleccionar el tipo de planificación

		</div>

		<select id="tipoAsignacionRecursos" class="mt-4 ancho__total__input__selects select-css-decorator">

			<option value="">--Seleccione el tipo de planificación--</option>

			<option value="1">Quiero registrar el Plan Operativo Anual (POA)</option>

			<option value="2">Quiero registrar el Plan Anual de Inversión Deportiva (PAID)</option>

		</select>

		<!--==================================
		=            Sección poas            =
		===================================-->

		<input type='hidden' id='despejar__montoP' name='despejar__montoP' value='<?=$inversionRestante?>'>

		<?php if (!empty($incremento__decrementos__final__estados[0][idIncrementos])): ?>
			
			<div class="card">

			  <div class="card-header">
			    Ustéd ya envió la notificación de su <?=$incremento__decrementos[0][incrementoDecremento]?>, esperar respuesta
			  </div>

			</div>
			
		<?php endif ?>

		<?php if (!empty($incremento__decrementos__final__estados__observacion[0][comentario])): ?>
				
			<div class="card">

			  <div class="card-header">
			    Observación: <?=$incremento__decrementos__final__estados__observacion[0][comentario]?>
			  </div>

			</div>

		<?php endif ?>


		<?php if ((!empty($incremento__decrementos[0][incrementoDecremento]) && empty($incremento__decrementos__final__estados[0][idIncrementos])) || !empty($incremento__decrementos__final__estados__observacion[0][comentario])): ?>

			<div class="card">

			  <div class="card-header">
			    Ustéd podrá enviar su <?=$incremento__decrementos[0][incrementoDecremento]?>, unicamente cuando su valor por asignar este en cero
			  </div>

			</div>
			
		<?php endif ?>

		<?php if ((!empty($incremento__decrementos[0][incrementoDecremento]) && floatval($inversionRestante)==0 && empty($incremento__decrementos__final__estados[0][idIncrementos])) || !empty($incremento__decrementos__final__estados__observacion[0][comentario])): ?>

			<input type="hidden" id="variableTipo" name="variableTipo" value="<?=$incremento__decrementos[0][incrementoDecremento]?>" />

			<a class="btn btn-primary text-uppercase" id="enviarInformacion__incredecre" name="enviarInformacion__incredecre">
				Enviar <?=$incremento__decrementos[0][incrementoDecremento]?>
			</a>			
			
		<?php endif ?>


		<?php if (empty($estadoFinal[0][idOrganismo]) || (!empty($incremento__decrementos[0][incrementoDecremento]) && empty($incremento__decrementos__final[0][idIncrementos]) && empty($incremento__decrementos__final__estados[0][idIncrementos])) || !empty($incremento__decrementos__final__estados__observacion[0][comentario]) || $informacionObjeto[0][idOrganismo]==1238 || $informacionObjeto[0][idOrganismo]==1659 || $informacionObjeto[0][idOrganismo]==1535 || $informacionObjeto[0][idOrganismo]==1134 || $informacionObjeto[0][idOrganismo]==1373 || $informacionObjeto[0][idOrganismo]==1619 || $informacionObjeto[0][idOrganismo]==1164 || $informacionObjeto[0][idOrganismo]==1435): ?>
			
			<?=$componentes->getContenidoActividadesPoa("tablaPoaInicial","<tr><th colspan='6' class='uppercase__texto monto__especial__titulo'><center>Monto: ".number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '')."</center></th></th></tr><tr class='monto__despejarEnvio'><th colspan='3' class='uppercase__texto'><center>Monto por asignar: ".number_format((float)$inversionRestante, 2, '.', '')."</center></th><th colspan='3' class='uppercase__texto'><center>Monto asignado: ".number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '')."</center></th></tr><tr><th><center>Código actividad</center></th><th style='width:15%!important;'><center>Nombre actividad</center></th><th style='width:20%!important;'><center>Indicador</center></th><th style='width:5%!important;'><center>Planificación de indicadores</center></th><th class='columna__item' style='width:5%!important;'><center>Planificar Items</center></th><th class='columna__matricez'><center>Mátricez<br>(Seleccionar la mátriz para INGRESAR / EDITAR información)</center></th></tr>","body__actividadesEs");?>	


		<?php else: ?>

			<?=$componentes->getContenidoActividadesPoa("tablaPoaInicial","<tr><th colspan='6' class='uppercase__texto monto__especial__titulo'><center>Monto: ".number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '')."</center></th></th></tr><tr class='monto__despejarEnvio'><th colspan='3' class='uppercase__texto'><center>Monto por asignar: ".number_format((float)$inversionRestante, 2, '.', '')."</center></th><th colspan='3' class='uppercase__texto'><center>Monto asignado: ".number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '')."</center></th></tr>","body__actividadesEs44");?>	
			


		<?php endif ?>
		
		<!--====  End of Sección poas  ====-->

	</form>

</div>

<!--=====================================
=            Sección modales            =
======================================-->

<?php foreach ($informacionSeleccionada as $clave => $valor): ?>

	<?php foreach ($valor as $clave2 => $valor2): ?>

		<?=$componentes->getModalAtributos("modalActividad".$valor2,"formModalActividades".$valor2,$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"insertar".$informacionSeleccionada[$clave]['idActividades'],["PLANIFICACIÓN DE INDICADORES","I Trimestre","II Trimestre","III Trimestre","IV Trimestre","Meta Anual del indicador"],["planificacionIndicadores","primerTrimestre".$valor2,"segundoTrimestre".$valor2,"tercerTrimestre".$valor2,"cuartoTrimestre".$valor2,"metaAnualIndicador".$valor2,"botonItems".$valor2],["textos","input","input","input","input","input","boton"],["textos","numero","numero","numero","numero","disabled","boton"],"<i class='fas fa-save'></i>&nbsp;&nbsp;GUARDAR");?>


		<?=$componentes->getModalConfiguracionItemsPoa("modalActividadItem".$valor2,"Items de ".$informacionSeleccionada[$clave]['nombreActividades'],"itemsContents".$valor2,"agregarItems".$valor2,"verItemsActividades".$valor2,"tablaItemsAc".$valor2,["Código","Item","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total","Eliminar","Editar"],"contenedorItemsAc","contenedorItemsC".$valor2);?>

	<?php endforeach ?>

	<?=$componentes->getModalMatricez("modalMatriz".$informacionSeleccionada[$clave]['idActividades'],"formMatriz".$informacionSeleccionada[$clave]['idActividades'],$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"tablaHead".$informacionSeleccionada[$clave]['idActividades'],"cuerpoMatriz".$informacionSeleccionada[$clave]['idActividades']);?>

	<?= $componentesTablas->getModalVacioXl("subirArchivoExcelPOA", "formPreviewBancos", "idTituloModalContratacion", "divcontratcionActividades", "cerrarBtnContratacionPublicaAdministracion", "inputIdItem"); ?>




	
<?php endforeach ?>

<?=$componentes->get__contraloria__variables("contrataciones__variables");?>

<?=$componentes->get__contraloria__variables__2("contrataciones__variables__2");?>

<?=$componentes->get__contraloria__variables__3("contrataciones__variables__3");?>

<?=$componentes->getModalMeses("editarMesesItems","formMesesNece","Organismo",["input__1","select__tipoOrga"],["Correo","Tipo de organismo"],"editarOrganismoC");?>

<?=$componentes->get__eventos__ingresados__totales("modal__editarEventos");?>

<?=$componentes->get__editar__eventos__modales__totales("modalEventos__editados");?>

<?=$componentes->get__editar__eventos__modales__totales__montos("modalEventos__editados__3");?>

<?=$componentes->get__editar__eventos__modales__totales__montos__items__relacionados("modalEventos__editados__2");?>

<?=$componentes->get__desvinculaciones__compensacion("compensacionDModal");?>

<?=$componentes->get__desvinculaciones__despidoIntes("despidoInte");?>

<?=$componentes->get__desvinculaciones__renuncia__volun("reunciaVolunta");?>

<?=$componentes->get__desvinculaciones__vacacionesNoGozadas("vacacionesNoGozadas");?>

<?=$componentes->get__desvinculaciones__compensacion__editas("compensacionDModalEditar");?>



<!--====  End of Sección modales  ====-->



<script type="text/javascript">

$(document).ready(function () {
	
var insertar__valdiaciones__incre__decre=function(boton){

$(boton).click(function (e){

	e.preventDefault();	

	$(boton).hide();

	var confirm= alertify.confirm('¿Está seguro de guardar la información ingresada?','¿Está seguro de guardar la información ingresada?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	confirm.set({transition:'slide'});    

	confirm.set('onok', function(){ //callbak al pulsar botón positivo

		var paqueteDeDatos = new FormData();
		
		let variableTipo=$("#variableTipo").val();

		paqueteDeDatos.append('tipo',"envioOrganismoDeportivo");
		paqueteDeDatos.append('tipoTramite',variableTipo);

		$.ajax({

			type:"POST",
			url:"modelosBd/incrementosDecrementos/inserta.md.php",
			contentType: false,
			data:paqueteDeDatos,
			processData: false,
			cache: false,  
			success:function(response){

				let elementos=JSON.parse(response);
				let mensaje=elementos['mensaje'];

				if (mensaje==1) {

					alertify.set("notifier","position", "top-center");
				 	alertify.notify("Registro realizado correctamente", "success", 5, function(){});

			        window.setTimeout(function(){ 
				    	window.location ="planificacion";
				    } ,5000); 

				}


		    },
		    error:function(){
		    	
		    } 

		});

	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Acción cancelada", "error", 1, function(){}); 
		$(boton).show();
	}); 

});

}

insertar__valdiaciones__incre__decre($("#enviarInformacion__incredecre"));

});

</script>