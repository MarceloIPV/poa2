<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<input type="hidden" id="idOrganismo">
		<input type="hidden" id="periodo">

		<div class='col' style='z-index: 1;'>
			<center> <h5 class='modal-title'style="color: black;" id='    '>Resumen Transferencias</h5></center>
		</div>


		<div class="mb-3 row">
			<br>
          <label for="html5-week-input" class="col-md-1 col-form-label">Fecha Inicial:</label>
          <div class="col-md-5">
		  <input type="date" class="form-control" name="selectMesInicio" id="selectMesInicio">
          </div>
		  <br>
        </div>

		<div class="mb-3 row">
          <label for="html5-week-input" class="col-md-1 col-form-label">Fecha Final:</label>
          <div class="col-md-5">
		  <input type="date" class="form-control" name="selectMesFin" id="selectMesFin">
          </div>
        </div>
		
		<table id="tablaResumenTransferencias" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>AÑO</center></th>
					<th><center>ENTIDAD</center></th>
					<th><center>NOMBRE ENTIDAD</center></th>
					<th><center>Nro. CUR</center></th>
					<th><center>ESTADO</center></th>
					<th><center>RUC</center></th>
					<th><center>BENEFICIARIO</center></th>
					<th><center>DESCRIPCIÓN</center></th>
					<th><center>MONTO</center></th>
					<th><center>FECHA DE PAGO</center></th>
					<th><center>NÚMERO DE CUENTA MONETARIA DESTINO</center></th>
					<th><center>FECHA DE CONFIRMACIÓN</center></th>
					<th><center>NOMBRE ENTIDAD BANCARIA</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>



<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
    datatabletsSeguimientoRevisorVacio2($("#tablaResumenTransferencias"),"tablaResumenTransferencias","Reporte de Transferencias","",[ $("#idUsuarioC").val()],false);

    

});



   
</script>