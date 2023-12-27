<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<table id="resumen_revisores_ajuste_planificacion_plazos" class="col col-12 cell-border">

			<thead>

				<tr>
					<th rowspan="2"><center>Jurisdicción</center></th>
					<th rowspan="2"><center>RUC</center></th>
					<th rowspan="2"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>TIPO DE ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2"><center>PROVINCIA</center></th>
					<th rowspan="2"><center>CORREO</center></th>
					<th rowspan="2"><center>AÑO APROBACIÓN <br>POA</center></th>
					<th rowspan="1" colspan="36"><center>TRIMESTRE</center></th>
					

				</tr>

				<tr>

					<th><center>I</center></th>
					<th><center>FECHA</center></th>
					<th><center>ESTADO PLAZO</center></th>
					<th><center>FECHA PLAZO</center></th>
					<th><center>DOCUMENTO PLAZO</center></th>
					<th><center>ESTADO AJUSTE</center></th>
					<th><center>FECHA AJUSTE</center></th>
					<th><center>DOCUMENTO AJUSTE</center></th>
					<th><center>ACCION</center></th>
					

					<th style="background-color: #B03A2E;"><center>II</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #B03A2E;"><center>ESTADO AJUSTE</center></th>
					<th style="background-color: #B03A2E;"><center>FECHA AJUSTE</center></th>
					<th style="background-color: #B03A2E;"><center>DOCUMENTO AJUSTE</center></th>
					<th style="background-color: #B03A2E;"><center>ACCION</center></th>

					<th style="background-color: #1D8348;"><center>IIII</center></th>
					<th style="background-color: #1D8348;"><center>FECHA</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>FECHA PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: #1D8348;"><center>ESTADO AJUSTE</center></th>
					<th style="background-color: #1D8348;"><center>FECHA AJUSTE</center></th>
					<th style="background-color: #1D8348;"><center>DOCUMENTO AJUSTE</center></th>
					<th style="background-color: #1D8348;"><center>ACCION</center></th>

					<th style="background-color: goldenrod;"><center>IV</center></th>
					<th style="background-color: goldenrod;"><center>FECHA</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>FECHA PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>DOCUMENTO PLAZO</center></th>
					<th style="background-color: goldenrod;"><center>ESTADO AJUSTE</center></th>
					<th style="background-color: goldenrod;"><center>FECHA AJUSTE</center></th>
					<th style="background-color: goldenrod;"><center>DOCUMENTO AJUSTE</center></th>
					<th style="background-color: goldenrod;"><center>ACCION</center></th>
					

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
				<input type="hidden" id='idOrganismo'>
				
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
				
					<a id='guardarPlazosEstadosPlanificacion' type='button' class='btn btn-primary  left__margen' >Subir</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>



<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
  datatabletsSeguimientoRevisorVacio($("#resumen_revisores_ajuste_planificacion_plazos"),"resumen_revisores_ajuste_planificacion_plazos","Reporte de Bloqueos",objetosSeguimiento2023([7,16,25,34,11,20,29,38,14,23,32,41,15,24,33,42],["enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__definidos__2","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","enlaces__documentos__simples","boton_plazos_ajuste","boton_plazos_ajuste","boton_plazos_ajuste","boton_plazos_ajuste"],[7,14,21,28,43,12,21,30,39],[7,14,21,28,10,17,24,31],[$("#filesFrontend").val()+'seguimiento/documentos_plazos/',]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);


});



</script>