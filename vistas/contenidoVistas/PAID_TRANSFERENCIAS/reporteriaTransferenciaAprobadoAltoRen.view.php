<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Aprobados Proyecto Fortalecimiento del Deporte de Alto Rendimiento del Ecuador");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="0">


			<table id="paidAprobadosFinancieroTransferencias" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>UBICACIÓN</center></th>
						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>ASIGNACIÓN PRESUPUESTARIA</center></th>
						<th><center>Fecha de Aprobación de la Resolución PAID (Fecha del quipux de la resolución)</center></th>
						<th><center>Fecha de Aprobación</center></th>
						
						
						
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>



<script>


	$.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/datatables.js",function(){

	datatabletsPaidTransferenciasVacio($("#paidAprobadosFinancieroTransferencias"),"paidAprobadosFinancieroTransferencias","Reporteria Recibidos","",[$("#JuegosNacionalesIDRUBRO").val(),$("#valorComparativo").val()],["funcion__datatabletsReasignarTra__finanPAID2023"]);
	});

</script>