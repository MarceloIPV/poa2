<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>




<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="d-grid gap-2 col-3 mx-auto">
			<button id="verReporteTransferencias" type="button" class="btn btn-info" style=" margin-top: 10px;" align="center">Ver Reporte</button>
			<button id="cerrarReporteTransferencias" type="button" class="btn btn-info" style="margin-top: 10px;" align="center">Subir Archivos</button>

		</div>

		<div class="row" style="padding-right: 70px;" id="divSubirTransferencias">
			<!-- Widget Type 1-->
			<div class=" col-lg-6 ">
				<div class="card">
					<div class="card-body">
						<div >
							<div>
								<center>
									<h4 class="fw-bold fs-2 text-blue" style="font-weight: bold;">TRANSFERENCIAS</h4>
								</center>
							</div>
							<div class="flex-shrink-0 ms-3">
								<center>
									<i class="fas fa-random fa-10x"></i>
								</center>
							</div>
						</div>
					</div>
					<div class="card-footer py-3 bg-red-light">
						<a href="" class="ui-btn" data-bs-toggle="modal" data-bs-target="#modalSubirTransferencias">
							<div class="row align-items-center text-blue">
								<div class="col-12">
									<p class="mb-0" ><center class="fs-5" style="font-weight: bold;" >Subir Archivos</center></p>
								</div>
								
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /Widget Type 1-->
			<!-- Widget Type 1-->
			<div class=" col-lg-6 ">
				<div class="card ">
					<div class="card-body">
						<div >
							<div>
								<center>
									<h4 class="fw-bold fs-2 text-blue" style="font-weight: bold;">BANCOS</h4>
								</center>
							</div>
							<div class="flex-shrink-0 ms-3">
								<center>
									<i class="fas fa-university fa-10x"></i>
								</center>
							</div>
						</div>
					</div>
					<div class="card-footer py-3 bg-blue-light">
						<a href="" class="ui-btn" data-bs-toggle="modal" data-bs-target="#modalSubirBancos">
							<div class="row align-items-center text-blue">
								<div class="col-12">
									<p class="mb-0"><center class="fs-5" style="font-weight: bold;">Subir Archivos</center></p>
								</div>
								
							</div>
						</a>
					</div>
				</div>
			</div>

		</div>


		<div  id="divReporteTransferencias">

			<div class="d-grid gap-2 col-3 mx-auto">
				<button id="verTablaTransferencias" type="button" class="btn btn-info" style=" margin-top: 10px;" align="center">Tabla Bancos</button>
				<button id="verTablaBancos" type="button" class="btn btn-info" style="margin-top: 10px;" align="center">Tabla Transferencias</button>

			</div>

			<!-- Widget Type 1-->
			<div  id="divTablaTransferencias">
					<div class='col' style='z-index: 1;'>
						<center> <h5 class='modal-title'style="color: black;" id='    '>Tabla Transferencias</h5></center>
					</div>
					<table id="tabla_transferencias" >

						<thead>

							<tr>
							<th><center>AÑO</center></th>
							<th><center>RUC</center></th>
							<th><center>Nro. CUR</center></th>
							<th><center>ENTIDAD</center></th>
							<th><center>NOMBRE ENTIDAD</center></th>
							<th><center>ESTADO PAGO</center></th>
							<th><center>BENEFICIARIO</center></th>
							<th><center>DESCRIPCIÓN</center></th>
							<th><center>MONTO</center></th>
							<th><center>FECHA PAGO</center></th>

							</tr>

						</thead>

					</table>
				
			</div>
			
			<div  id="divTablaBancos">
				<div class='col' style='z-index: 1;'>
					          <center><h5 class='modal-title' style="color: black;" id='    '>Tabla Bancos</h5></center>
				</div>
				
				<table id="tabla_bancos" class="col col-12 cell-border">

					<thead>

						<tr>
							<th><center>RUC</center></th>
							<th><center>BENEFICIARIO</center></th>
							<th><center>Nro. CUR</center></th>
							<th><center>ENTIDAD</center></th>
							<th><center>CUENTA DESTINO</center></th>
							<th><center>INSTITUCIÓN BANCARIA</center></th>
							<th><center>FECHA CONFIRMACIÓN</center></th>
							

						</tr>

					</thead>

				</table>
			</div>

	</section>

</div>






<!-- Small modal -->
<div class='modal fade modal__ItemsGrup' id='modalSubirTransferencias' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Subir Transferencias</h5>
				<button type="button" id="btnCerrarSubirTransferencias" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
			</div>

			<div class="modal-body">
				
				<div class="cardSubirArchivo">
					<h3>Subir Archivo CSV</h3>
					<div id="drop_boxSubirArchivoTransferenciasCSV" class="drop_box drop_boxSubirArchivoTransferenciasCSV">
						<header>
					<h4>Seleccionar Un Archivo</h4>
					</header>
					<p>Tipo de Archivo: CSV </p>
						<input type="file" hidden accept=".csv" id="archivoTransferenciaCSV">
						<h3 id="satCSV"></h3>
						<p id="previewTransferenciaCSV"  data-bs-toggle="modal" data-bs-target="#previewTransferencias" type="button" class="btn btn-primary" style="color:white ;display: none;" >PREVIEW</p>
						<button class="btn" id="seleccionarArchivoTransferencia">Elegir Archivo</button>
					</div>
				
				</div>
				
				
			</div>

			<div class="modal-footer">


				<div class='col col-12 d d-flex justify-content-center flex-wrap'>

					<a id='guardarTransferencias' type='button' class='btn btn-primary  left__margen' >Subir</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>

<!-- Small modal -->
<div class='modal fade modal__ItemsGrup' id='modalSubirBancos' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Subir Bancos</h5>
				<button type="button" id="btnCerrarSubirBancos" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
			</div>

			<div class="modal-body">
				
				<div class="cardSubirArchivo">
					<h3>Subir Archivo CSV</h3>
					<div id="drop_boxSubirArchivoBancosCSV" class="drop_box drop_boxSubirArchivoBancosCSV">
						<header>
					<h4>Seleccionar Un Archivo</h4>
					</header>
					<p>Tipo de Archivo: CSV </p>
						<input type="file" hidden accept=".csv" id="archivoBancoCSV">
						<h3 id="sabCSV"></h3>
						<p id="previewBancosCSV" data-bs-toggle="modal" data-bs-target="#previewBancos" type="button" class="btn btn-primary" style="color:white ;display: none;" >PREVIEW</p>
						<button class="btn" id="seleccionarArchivoBancos">Elegir Archivo</button>
					</div>
				
				</div>
				
				
			</div>

			<div class="modal-footer">


				<div class='col col-12 d d-flex justify-content-center flex-wrap'>

					<a type='button' id="guardarBancos" class='btn btn-primary dsad left__margen' >Subir</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>

<!--=============================
=            Modales            =
==============================-->

<?= $componentesTablas->getModalVacio("previewTransferencias","formPreviewTransferencias","Preview Transferencias","divPreviewTransferencias","btncerrarPreviewTransferencias"); ?>
<?= $componentesTablas->getModalVacio("previewBancos","formPreviewBancos","Preview Bancos","divPreviewBancos","btncerrarPreviewBancos"); ?>

<!--====  End of Modales  ====-->


<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		 datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__remanentes"),"seguimiento__tablas__remanentes","s",objetos([6],["boton"],["<center><button class='remantes__asignados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarRemanentes__asignados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__remanentes__asignados"]);
	});



	
</script>
