<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anioActual = date('Y');?>

<?php $aniosPeriodos__ingesos=$objetoInformacion->get__obtener__Selector__anios();?>

<?php $informacionSeleccionada=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividades,nombreActividades FROM poa_actividades;");?>

<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad LIMIT 1;");?>

<?php $inversionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");?>

<?php $inversionOrganismoQueda=$objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");?>

<?php $inversionRestante=$objetoInformacion->getRestar($inversionOrganismo[0][nombreInversion],$inversionOrganismoQueda[0][sumaItemTotal]);?>


<?php $poaPreEn=$objetoInformacion->getObtenerInformacionGeneral("SELECT activo FROM poa_preliminar_envio WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND activo='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $observacionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $estadoFinal=$objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>


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


		<!--==================================
		=            Sección poas            =
		===================================-->

		<input type='hidden' id='despejar__montoP' name='despejar__montoP' value='<?=$inversionRestante?>'>

		<?=$componentes->getContenidoActividadesPoa("tablaPoaInicial","<tr><th><center>Código actividad</center></th><th style='width:15%!important;'><center>Nombre actividad</center></th><th style='width:20%!important;'><center>Indicador</center></th><th class='columna__matricez'><center>Mátricez<br>(Seleccionar la mátriz para INGRESAR / EDITAR información)</center></th></tr>","body__actividades__modificaciones__editar");?>	

		<br>

		
		<!--====  End of Sección poas  ====-->

	</form>

<!-- 	<div style="width:100%!important;" class="d d-flex justify-content-center">
			
		<table id='tabla__modificacionesMinimas' style="width: 50%;">

			<thead>

				<tr>

					<th align='center'>
						EVENTO
					</th>
					<th align='center'>
						DEPORTE
					</th>
					<th align='center'>
						PROVINCIA
					</th>
					<th align='center'>
						PAÍS
					</th>
					<th align='center'>
						ALCANCE
					</th>
					<th align='center'>
						FECHA INICIO
					</th>
					<th align='center'>
						FECHA FÍN
					</th>
					<th align='center'>
						GÉNERO
					</th>
					<th align='center'>
						CATEGORÍA
					</th>
					<th align='center'>
						¿AUMENTÓ EL PRESUPUESTO?	
					</th>										
					<th align='center'>
						NÚMERO DE ENTRENADORES
					</th>
					<th align='center'>
						NÚMERO DE ATLETAS
					</th>
					<th align='center'>
						TOTAL
					</th>
					<th align='center'>
						BENEFICIARIOS (MUJERES)
					</th>
					<th align='center'>
						BENEFICIARIOS (HOMBRES)
					</th>
					<th align='center'>
						FECHA DE MODIFICACIÓN
					</th>

				</tr>

			</thead>

		</table>

	</div> -->



</div>

<!--=====================================
=            Sección modales            =
======================================-->
<?php foreach ($informacionSeleccionada as $clave => $valor): ?>

	<?php foreach ($valor as $clave2 => $valor2): ?>

		<?=$componentes->getModalAtributos__modificaciones("modalActividad".$valor2,"formModalActividades".$valor2,$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"insertar".$informacionSeleccionada[$clave]['idActividades'],["PLANIFICACIÓN DE INDICADORES","I Trimestre","II Trimestre","III Trimestre","IV Trimestre","Meta Anual del indicador"],["planificacionIndicadores","primerTrimestre".$valor2,"segundoTrimestre".$valor2,"tercerTrimestre".$valor2,"cuartoTrimestre".$valor2,"metaAnualIndicador".$valor2],["textos","input","input","input","input","input"],["textos","numero","numero","numero","numero","disabled"],"<i class='fas fa-save'></i>&nbsp;&nbsp;GUARDAR");?>


		<?=$componentes->getModalConfiguracionItemsPoa("modalActividadItem".$valor2,"Items de ".$informacionSeleccionada[$clave]['nombreActividades'],"itemsContents".$valor2,"agregarItems".$valor2,"verItemsActividades".$valor2,"tablaItemsAc".$valor2,["Código","Item","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total","Eliminar","Editar"],"contenedorItemsAc","contenedorItemsC".$valor2);?>

	<?php endforeach ?>

	<?=$componentes->getModalMatricez__modificacion("modalMatriz".$informacionSeleccionada[$clave]['idActividades'],"formMatriz".$informacionSeleccionada[$clave]['idActividades'],$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"tablaHead".$informacionSeleccionada[$clave]['idActividades'],"cuerpoMatriz".$informacionSeleccionada[$clave]['idActividades']);?>

	


	
<?php endforeach ?>

<?=$componentes->get__contraloria__variables("contrataciones__variables");?>

<?=$componentes->get__contraloria__variables__2("contrataciones__variables__2");?>

<?=$componentes->get__contraloria__variables__3("contrataciones__variables__3");?>

<?=$componentes->getModalMeses("editarMesesItems","formMesesNece","Organismo",["input__1","select__tipoOrga"],["Correo","Tipo de organismo"],"editarOrganismoC");?>

<?=$componentes->get__eventos__ingresados__totales__modificacion("modal__editarEventos");?>

<?=$componentes->get__editar__eventos__modales__totales__modificaciones__dos("modalEventos__editados");?>

<?=$componentes->get__editar__eventos__modales__totales__montos("modalEventos__editados__3");?>

<?=$componentes->get__editar__eventos__modales__totales__montos__items__relacionados__modificaciones("modalEventos__editados__2");?>

<?=$componentes->get__desvinculaciones__compensacion("compensacionDModal");?>

<?=$componentes->get__desvinculaciones__despidoIntes("despidoInte");?>

<?=$componentes->get__desvinculaciones__renuncia__volun("reunciaVolunta");?>

<?=$componentes->get__desvinculaciones__vacacionesNoGozadas("vacacionesNoGozadas");?>

<?=$componentes->get__desvinculaciones__compensacion__editas("compensacionDModalEditar");?>



<!--====  End of Sección modales  ====-->


<script type="text/javascript" src="layout/scripts/js/modificacion/modificacionEdicion.js?v=1.0.7"></script>
<script type="text/javascript">
$.getScript("layout/scripts/js/ajax/datatablet.js",function(){
	datatablets($("#tabla__modificacionesMinimas"),"tabla__modificacionesMinimas",false,false,false,false,false,false,false);
});
</script>