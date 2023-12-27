<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Reportería Planificación Anual Intervención Deportiva");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="2">


			<table id="paidReporteriaTransferencias" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>UBICACIÓN</center></th>
						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>PROVINCIA</center></th>
						<th><center>CANTÓN</center></th>
						<th><center>PARROQUIA</center></th>
						<th><center>ANALISTA</center></th>
						<th><center>FECHA DE ENVÍO SOLICITUD</center></th>
						<th><center>ESTADO</center></th>
						<th><center>OBSERVACIÓN</center></th>
						
						
						
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>



<script>


	$.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/datatables.js",function(){

	datatabletsPaidTransferenciasVacio($("#paidReporteriaTransferencias"),"paidReporteriaTransferencias","Reporteria Recibidos","",[$("#JuegosNacionalesIDRUBRO").val(),$("#valorComparativo").val()],["funcion__datatabletsReasignarTra__finanPAID2023"]);
	});

</script>

