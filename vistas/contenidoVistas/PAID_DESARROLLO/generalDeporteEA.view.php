<?php $componentes = new componentes();

$componentesPaid = new componentesPaid();

session_start();

$tipoProyecto = 1;

$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];

?>

<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>


<?php $idOrganismoSession = $informacionObjeto[0][idOrganismo]; ?>

<input type="hidden" id="ïdentificador" name="ïdentificador" value="1">
<input type="hidden" id="identificador" name="identificador" value="1">
<input type="hidden" id="montoAsignadoDesarrollo" class="restar__montos" name="identificador" value="0">
<input type="hidden" id="montoPorAsignarDesarrollo" name="identificador" value="0">



<div class="content-wrapper d  flex-column align-items-center">

	<div class="d-grid gap-2 col-3 mx-auto">
		<button id="verReportePaidGeneral" type="button" class="btn btn-info" style=" margin-top: 10px;" align="center">Ver Reporte</button>
		<button id="cerrarReportePaidGeneral" type="button" class="btn btn-info" style="margin-top: 10px;" align="center">Cerrar Reporte</button>

	</div>

	<div id="divPAIDGeneralDesarrollo">
		<?= $componentes->getContenidoActividadesPAID(
			"tablaPAIDGeneralDesarrollo",
			"

			<tr>
				<th colspan='5' class='uppercase__texto monto__especial__titulo'>
				<center id='montoPaidGeneralDesarrollo'></center>
				</th>
			</tr>

			<tr class='monto__despejarEnvio'>
				<th colspan='2' class='uppercase__texto'>
				<center id='montoAsignadoPaidGeneralDesarrollo'></center>
				</th>
				<th colspan='3' class='uppercase__texto'>
				<center id='montoPorAsignarPaidGeneralDesarrollo'></center>
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
			</tr> ",
			" "
		);

		?>

	</div>


	<div id="divReportePAIDGeneralDesarrollo">

		<table id="paidReporteGeneralDesarrollo">

			<thead>
				<tr align="center">
					<th COLSPAN=1>
						<center>Componente</center>
					</th>
					<th COLSPAN=1>
						<center>Indicador</center>
					</th>
					<th COLSPAN=1>
						<center>Rubro</center>
					</th>
					<th COLSPAN=1>
						<center>Id Item Presupuestario</center>
					</th>
					<th COLSPAN=1>
						<center>Nombre Item</center>
					</th>
					<th COLSPAN=1>
						<center>Enero</center>
					</th>
					<th COLSPAN=1>
						<center>Febrero</center>
					</th>
					<th COLSPAN=1>
						<center>Marzo</center>
					</th>
					<th COLSPAN=1>
						<center>Abril</center>
					</th>
					<th COLSPAN=1>
						<center>Mayo</center>
					</th>
					<th COLSPAN=1>
						<center>Junio</center>
					</th>
					<th COLSPAN=1>
						<center>Julio</center>
					</th>
					<th COLSPAN=1>
						<center>Agosto</center>
					</th>
					<th COLSPAN=1>
						<center>Septiembre</center>
					</th>
					<th COLSPAN=1>
						<center>Octubre</center>
					</th>
					<th COLSPAN=1>
						<center>Noviembre</center>
					</th>
					<th COLSPAN=1>
						<center>Diciembre</center>
					</th>
					<th COLSPAN=1>
						<center>Total</center>
					</th>
				</tr>
			</thead>
			<tbody></tbody>

		</table>


		<div class="btn-box">
			<button id="btnEnviarPAIDdesarrollo" type="submit" class="">Enviar PAID</button>
		</div>

	</div>

</div>




<?= $componentesPaid->getModalIndicadorPaid("modalActividadDesarrollo", "formModalActividades", "PLANIFICACIÓN DE INDICADORES", "tablaIndicadoresPaidDesarrollo", "guardarIndicadoresDesarrollo", "btnCerrarIndicadoresDesarrollo"); ?>

<?= $componentesPaid->getModalGeneralRubroPaid("RubrosCargadosDesarrollo", "Rubros", "itmDesarrollo", "rubroslistaDesarrollo"); ?>

<?= $componentesPaid->getModalGeneralPaid("itemsCargadosDesarrollo", "RubrosTituloDesarrollo", "itemsModalContentAc", "agregarItemsRubrosDesarrollo", "DivSelectorItemsRubrosDesarrollo", "verItemsRubrosDesarrollo", "DivTablaItemsRubrosDesarrollo", "CerrarSelectorItemDesarrollo", "SelectorItemRubroDesarrollo", "guardarItemRubroDesarrollo", "TablaItemsRubrosDesarrollo"); ?>

<?= $componentesPaid->get__contraloria_items__paid("contrataciones__itemsPaid", "formContratacionPublica", "Contratación Pública", "divContratacionPublica", "cerrarBtnContratacionPublica", "inputIdItem"); ?>


<!-- Small modal -->
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
	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js", function() {

		 CargarMontoAsignado_Paid_Desarrollo('obtener_montos_paid',$("#identificador").val());

		

		AsignarMontoPlanificadosGENERALTOTALDesarrollo("obtener_valor_total_general_desarrollo",$("#montoPaidGeneralDesarrollo").attr("valor"), $("#identificador").val(),"montoAsignadoPaidGeneralDesarrollo","montoPorAsignarPaidGeneralDesarrollo");  

	});
	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js", function() {

		datatabletsDesarollo($("#paidReporteGeneralDesarrollo"), "paidReporteGeneralDesarrollo");


	});
</script>