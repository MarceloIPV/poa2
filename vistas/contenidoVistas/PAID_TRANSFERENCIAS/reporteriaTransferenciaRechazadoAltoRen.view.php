<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Rechazado Proyecto Fortalecimiento del Deporte de Alto Rendimiento del Ecuador");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="0">


			<table id="paidRechazadosDirFinanTransferencias" class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>UBICACIÓN</center></th>
						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>Techo Notificado(Sin descuentos)</center></th>
						<th><center>Fecha de Aprobación de la Resolución PAID (Fecha del quipux de la resolución)</center></th>
						<th><center>Fecha Límite 15 Días Término</center></th>
						<th><center>DOCUMENTO<br>DE ASIGNACIÓN</center></th>
						<th><center>ESTADO</center></th>
						<th><center>OBSERVACIONES</center></th>
						
						
						
					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<?=$componentesPaid->getModalMatricezObservaTransferenciasPaid("reasignarTra","formAsignarTraS","enviarTramite__Financiero__rechazosPAID","Enviar");?>



<script>


	$.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/datatables.js",function(){

	datatabletsPaidTransferenciasVacio($("#paidRechazadosDirFinanTransferencias"),"paidRechazadosDirFinanTransferencias","Reporteria Recibidos",objetosPaidTransferencias2023([6,8],["enlace","boton"],[6,"<center><a data-bs-toggle='modal' data-bs-target='#reasignarTra' class='reasignarTramitesPAIDTransferencias estilo__botonDatatablets btn btn-info pointer__botones'><i class='fas fa-user-edit'></i></a><center>"],[$("#filesFrontend").val()+"paid/informes__infraestructura/"],[1]),[$("#JuegosNacionalesIDRUBRO").val(),$("#valorComparativo").val()],["funcion__datatabletsReasignarTra__finan__rechazasPAID2023"]);
	});

</script>

