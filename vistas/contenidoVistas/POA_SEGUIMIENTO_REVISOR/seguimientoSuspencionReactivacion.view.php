<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-7'>

			
						
					</div>
					<div class='col-md-3'>
						<button id='envioCorreoNotificacionOD' type='button' class='btn btn-warning rounded-pill form-control'>Envio Correo Proximidad</button>
					</div>
					<div class='col-md-2'>
						<button id='actualizarBaseSuspension' type='button' class='btn btn-success rounded-pill form-control'> Actualizar Suspensiones</button>
					</div>
				</div>
		</div>

		<table id="reactivaciones_suspenciones_plazos" class="col col-12 cell-border">

			<thead>

				<tr>
					<th rowspan="2"><center>Jurisdicción</center></th>
					<th rowspan="2"><center>RUC</center></th>
					<th rowspan="2"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>TIPO DE ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>PROVINCIA</center></th>
					<th rowspan="2"><center>CORREO</center></th>
					<th rowspan="2"><center>AÑO APROBACIÓN <br>POA</center></th>
					<th rowspan="1" colspan="28"><center>TRIMESTRE</center></th>

				</tr>

				<tr>

					<th><center>I</center></th>
					<th><center>FECHA ENVIO</center></th>
					<th><center>ESTADO PLAZO</center></th>
					<th><center>FECHA PLAZO</center></th>
					<th><center>DOCUMENTO PLAZO</center></th>
					<th><center>ESTADO TRANSFERENCIA</center></th>
					<th style="height: 100px;">
						<center>
							<nav id="colorNav" >
								<ul>
									<li class="green" style="position: relative; top: -1em!important;">
										<a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><button class="btn btn-warning" estado='SUSPENSION' trimestre='primerTrimestre' id="guardarSuspencion1erTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Suspensión</button></li>
											<li><button class="btn btn-success" estado='AJUSTE' trimestre='primerTrimestre' id="guardarAjuste1erTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%;  padding-top:1em;padding-bottom: .5em;">Ajuste</button></li>
											<li><button class="btn btn-info" estado='REACTIVACION' trimestre='primerTrimestre' id="guardarReactivacion1erTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Reactivación</button></li>
											
										</ul>
									</li>
								</ul>
							</nav>							
						</center>
					</th>

					<th style="background-color: #B03A2E;"><center>II</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA ENVIO</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: #B03A2E;" style="height: 100px;">
						<center>
							<nav id="colorNav" >
								<ul>
									<li class="green" style="position: relative; top: -1em!important;">
										<a href="#" class="fa fa-windows"  style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><button class="btn btn-warning" estado='SUSPENSION' trimestre='segundoTrimestre' id="guardarSuspencion2doTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Suspensión</button></li>
											<li><button class="btn btn-success" estado='AJUSTE' trimestre='segundoTrimestre' id="guardarAjuste2doTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Ajuste</button></li>
											<li><button class="btn btn-info" estado='REACTIVACION' trimestre='segundoTrimestre' id="guardarReactivacion2doTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Reactivación</button></li>
											
										</ul>
									</li>
								</ul>
							</nav>							
						</center>
					</th>

					<th style="background-color: #1D8348;"><center>IIII</center></th>
					<th style="background-color: #1D8348;"><center>FECHA ENVIO</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: #1D8348;" style="height: 100px;">
						<center>
							<nav id="colorNav" >
								<ul>
									<li class="green" style="position: relative; top: -1em!important;">
										<a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><button class="btn btn-warning" estado='SUSPENSION' trimestre='tercerTrimestre' id="guardarSuspencion3erTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Suspensión</button></li>
											<li><button class="btn btn-success" estado='AJUSTE' trimestre='tercerTrimestre' id="guardarAjuste3erTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Ajuste</button></li>
											<li><button class="btn btn-info" estado='REACTIVACION' trimestre='tercerTrimestre' id="guardarReactivacion3erTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Reactivación</button></li>
											
										</ul>
									</li>
								</ul>
							</nav>							
						</center>
					</th>

					<th style="background-color: goldenrod;"><center>IV</center></th>
					<th style="background-color: goldenrod;"><center>FECHA ENVIO</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>FECHA PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO TRANSFERENCIA</center></th>
					<th style="background-color: goldenrod;" style="background-color: goldenrod;" style="height: 100px;">
						<center>
							<nav id="colorNav" >
								<ul>
									<li class="green" style="position: relative; top: -1em!important;">
										<a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><button class="btn btn-warning" estado='SUSPENSION' trimestre='cuartoTrimestre' id="guardarSuspencion4toTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Suspensión</button></li>
											<li><button class="btn btn-success" estado='AJUSTE' trimestre='cuartoTrimestre' id="guardarAjuste4toTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Ajuste</button></li>
											<li><button class="btn btn-info" estado='REACTIVACION' trimestre='cuartoTrimestre' id="guardarReactivacion4toTrimestre" data-bs-toggle='modal' data-bs-target='#modalSubirEstadoPlazos' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Reactivación</button></li>
											
										</ul>
									</li>
								</ul>
							</nav>							
						</center>
					</th>
					<th hidden></th>


				</tr>

			</thead>

		</table>

	</section>

</div>


<!-- Small modal -->
<div class='modal fade modal__ItemsGrup' id='modalSubirEstadoPlazos' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Subir Archivo Plazos</h5>
				<button type="button" id="btnCerrarSubirPlazos" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
			</div>

			<div class="modal-body">

				<input type="hidden" id='trimestre'>
				<input type="hidden" id='estado'>
				
				<div class="cardSubirArchivo">
					<h3>Subir Archivo PDF</h3>
					<div id="drop_boxSubirArchivoTransferenciasCSV" class="drop_box drop_boxSubirArchivoTransferenciasCSV">
						<header>
					<h4>Seleccionar Un Archivo</h4>
					</header>
					<p>Tipo de Archivo: PDF </p>
						<input type="file" hidden accept=".pdf" id="archivoPlazosPersonal">
						<h3 id="plazosTexto"></h3>
						<p id="previewTransferenciaCSV"  data-bs-toggle="modal" data-bs-target="#previewTransferencias" type="button" class="btn btn-primary" style="color:white ;display: none;" >PREVIEW</p>
						<button class="btn" id="seleccionarArchivoPlazosPersonal">Elegir Archivo</button>
					</div>
				
				</div>
				
				
			</div>

			<div class="modal-footer">


				<div class='col col-12 d d-flex justify-content-center flex-wrap'>

					<a id='guardarPlazosEstadosDocumentos' type='button' class='btn btn-primary  left__margen' >Subir</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>

<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
  datatabletsSeguimientoRevisorVacio($("#reactivaciones_suspenciones_plazos"),"reactivaciones_suspenciones_plazos","Reporte de Bloqueos",objetosSeguimiento2023([7,14,21,28,11,18,25,32,12,19,26,33,13,20,27,34,35],["enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","estado_plazo_suspenciones","estado_plazo_suspenciones","estado_plazo_suspenciones","estado_plazo_suspenciones","chekeds__2__plazos","chekeds__2__plazos","chekeds__2__plazos","chekeds__2__plazos"],[7,14,21,28,8,15,22,29],[7,14,21,28,10,17,24,31],[$("#filesFrontend").val()+'seguimiento/documentos_plazos/',]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);


});



</script>