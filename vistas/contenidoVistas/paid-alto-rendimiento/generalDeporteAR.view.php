
<?php $componentes= new componentes();

$componentesPaid= new componentesPaid();

session_start();

$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>


<?php //$idOrganismoSession=$informacionObjeto[0][idOrganismo];?>

<input type="hidden" id="ïdentificador" name="ïdentificador" value="0">
<input type="hidden" id="identificador" name="identificador" value="0">

<input type="hidden" id="montoGeneralEventosAR" name="montoGeneralEventosAR" value="">
<input type="hidden" id="montoAsignadoGeneralEventosAr" class="restaDeMontosEventos sumador__valor_rubros_monto_asignado" name="montoAsignadoGeneralEventosAr" value="">
<input type="hidden" id="montoPorAsignarGeneralEventosAR" class="sumador__valor_rubros_monto_por_asignar" name="montoPorAsignarGeneralEventosAR" value="">

<input type="hidden" id="montoGeneralInterdisciplinarioAR" name="montoGeneralInterdisciplinarioAR" value="">
<input type="hidden" id="montoAsignadoGeneralInterdisciplinarioAr" class="restaDeMontosInter sumador__valor_rubros_monto_asignado" name="montoAsignadoGeneralInterdisciplinarioAr" value="">
<input type="hidden" id="montoPorAsignarGeneralInterdisciplinarioAR" class="sumador__valor_rubros_monto_por_asignar" name="montoPorAsignarGeneralInterdisciplinarioAR" value="">

<input type="hidden" id="montoGeneralNeceIndividialesAR" name="montoGeneralInterdisciplinarioAR" value="">
<input type="hidden" id="montoAsignadoGeneralNeceIndividialesAr" class="restaDeMontosNecesidadesInd sumador__valor_rubros_monto_asignado" name="montoAsignadoGeneralNeceIndividialesAr" value="">
<input type="hidden" id="montoPorAsignarGeneralNeceIndividialesAR" class="sumador__valor_rubros_monto_por_asignar" name="montoPorAsignarGeneralNeceIndividialesAR" value="">

<input type="hidden" id="montoGeneralNeceGeneralesAR" name="montoGeneralNeceGeneralesAR" value="">
<input type="hidden" id="montoAsignadoGeneralNeceGeneralesAR" class="restaDeMontosNecesidadesGen sumador__valor_rubros_monto_asignado" name="montoAsignadoGeneralNeceGeneralessAr" value="">
<input type="hidden" id="montoPorAsignarGeneralNeceGeneralesAR" class="sumador__valor_rubros_monto_por_asignar" name="montoPorAsignarGeneralNeceGeneralessAR" value="">





<div  class="content-wrapper d  flex-column align-items-center">

	<div class="d-grid gap-2 col-3 mx-auto">
		<button id="verReportePaidGeneralAR" type="button" class="btn btn-info" style=" margin-top: 10px;" align="center">Ver Reporte</button>
		<button id="cerrarReportePaidGeneralAR" type="button" class="btn btn-info" style="margin-top: 10px;" align="center" >Cerrar Reporte</button>
	</div>
	
	<div id="divPAIDGeneralAR">

		<?=$componentes->getContenidoActividadesPAID("tablaPAIDGeneral","

		<tr>
			<th colspan='5' class='uppercase_texto montoespecial_titulo'>
				<center id='montoPaidGneral'></center>
			</th>
		</tr>

		<tr class='monto__despejarEnvio'>
			<th colspan='2' class='uppercase__texto'>
			<center id='montos_asignados_rubros'></center>
			</th>
			<th colspan='3' class='uppercase__texto'>
			<center id='montos_por_asignar_rubros'></center>
			</th>
		</tr>
		
		<tr>
			<th style='width:10%!important;'>
			<center>Nro.</center>
			</th>
			<th style='width:20%!important;'>
			<center>Componente</center>
			</th>

			<th style='width:20%!important;'>
			<center>Indicador</center>

			</th>
			<th style='width:10%!important;'>
			<center>Planificar Indicador</center>
			</th>
			<th style='width:15%!important;'>
			<center>Rubros</center>
			</th>
		</tr> "
		
		,"

		");
		
		?>		
	
	</div>


	<div id="divReportePAIDGeneralAR">

				<table id="paidReporteGeneralAR" >

					<thead>
						<tr align="center">
							<th COLSPAN=1><center>Componente</center></th>
							<th COLSPAN=1><center>Indicador</center></th>
							<th COLSPAN=1><center>Rubro</center></th>
							<th COLSPAN=1><center>Id Item Presupuestario</center></th>	
							<th COLSPAN=1><center>Nombre Item</center></th>
							<th COLSPAN=1><center>Enero</center></th>
							<th COLSPAN=1><center>Febrero</center></th>
							<th COLSPAN=1><center>Marzo</center></th>
							<th COLSPAN=1><center>Abril</center></th>
							<th COLSPAN=1><center>Mayo</center></th>
							<th COLSPAN=1><center>Junio</center></th>
							<th COLSPAN=1><center>Julio</center></th>
							<th COLSPAN=1><center>Agosto</center></th>
							<th COLSPAN=1><center>Septiembre</center></th>
							<th COLSPAN=1><center>Octubre</center></th>
							<th COLSPAN=1><center>Noviembre</center></th>
							<th COLSPAN=1><center>Diciembre</center></th>
							<th COLSPAN=1><center>Total</center></th>
						</tr>
					</thead>
					<tbody></tbody>
					
				</table>

				<div class="btn-box">
              	<button id="btnEnviarPAIDAR"type="submit" class="">Enviar PAID</button>
            	</div>

	</div>

</div>


<?=$componentesPaid->getModalIndicadorPaid("modalActividad","formModalActividades","PLANIFICACIÓN DE INDICADORES", "tablaIndicadoresPaid" , "guardarIndicadores","btnCerrarIndicadores");?>


<?=$componentesPaid->getModalGeneralRubroPaid("itemsCargados1","Rubros","itm","rubroslistaD");?>

<?=$componentesPaid->getModalGeneralPaid("itemsCargados","RubrosTítulo","itemsModalContentAc","agregarItemsRubros","DivSelectorItemsRubros","verItemsRubros","DivTablaItemsRubros","CerrarSelectorItem","SelectorItemRubro","guardarItemRubro","TablaItemsRubros");?>


<?=$componentesPaid->get__contraloria_items__paid("contrataciones__itemsPaidAR","formContratacionPublicaAR","Contratación Pública","divContratacionPublicaAR","cerrarBtnContratacionPublicaAR","inputIdItemAR");?>



<div class='modal fade modal__ItemsGrup' id='modalDatosInconclusos' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Error</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<p class="modalAviso">Tiene aun Montos por Asignar.</p>
				<p class="modalAviso">Asegúrese en asignar todo el monto disponible a los rubros en las matrices.</p>
			</div>

			<div class="modal-footer">


				<div class='col col-12 d d-flex justify-content-center flex-wrap'>

					<a id='' type='button' class='btn btn-primary  left__margen' data-bs-dismiss="modal">Aceptar</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>

<script>

	$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

		CargarMontoAsignado_Paid('obtener_montos_paid',$("#identificador").val());
   

		AsignarMontoPlanificadosGENERALTOTALAR("Obtener_Valores_Asignados_General_AR",$("#identificador").val(), "montos_asignados_rubros","montos_por_asignar_rubros");

	});


	
	$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/datatables.js", function () {

		datatabletsNormalAR($("#paidReporteGeneralAR"), "paidReporteGeneralAR");

	});
	
</script>

