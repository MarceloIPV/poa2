<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="contenedor__tabla__total">

		<table id="seguimiento__PlazosTablaTrimestres" class="col col-12 cell-border">

			<thead>

				<tr>
					<th rowspan="2" style="vertical-align: middle!important;"><center>Jurisdicción</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>RUC</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PROVINCIA</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>CANTÓN</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PARROQUIA</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE I</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE II</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE III</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE IV</center></th>

				</tr>

				<tr>

					<th rowspan="1" colspan="1"><center>PLAZOS</center></th>

					<th rowspan="1" colspan="1" style="height: 130px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><input type="date" id="fecha1erTrimestre" class="form-control" style="font-size:12px; width: 100%; padding-top:1em;padding-bottom: .5em;"></li>
							                <li><button class="btn btn-warning" trimestre='primerTrimestre' id="guardarFecha1erTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Guardar</button></li>
							                
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>
	

					<th rowspan="1" colspan="1"><center>PLAZOS</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><input type="date" id="fecha2doTrimestre" class="form-control" style="font-size:12px; width: 100%; padding-top:1em;padding-bottom: .5em;"></li>
							                <li><button class="btn btn-warning" trimestre='segundoTrimestre' id="guardarFecha2doTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Guardar</button></li>
							               
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>


					<th rowspan="1" colspan="1"><center>PLAZOS</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><input type="date" id="fecha3erTrimestre" class="form-control" style="font-size:12px; width: 100%; padding-top:1em;padding-bottom: .5em;"></li>
							                <li><button class="btn btn-warning" trimestre='tercerTrimestre' id="guardarFecha3erTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Guardar</button></li>
							                
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>

					<th rowspan="1" colspan="1"><center>PLAZOS</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
											<li><input type="date" id="fecha4toTrimestre" class="form-control" style="font-size:12px; width: 100%; padding-top:1em;padding-bottom: .5em;"></li>
							                <li><button class="btn btn-warning" trimestre='cuartoTrimestre' id="guardarFecha4toTrimestre" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">Guardar</button></li>
							               
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>

				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


<!-- Small modal -->
<div class='modal fade modal__ItemsGrup' id='modalSubirPlazosInicial' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Subir Archivo Plazos</h5>
				<button type="button" id="btnCerrarSubirPlazos" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
			</div>

			<div class="modal-body">
				<input type="hidden" id="idOrganismo">
				<input type="hidden" id='trimestre'>
				<input type="date" id='fechaModificacion' hidden>
			

				<div style="margin: 2% 10%;">
					<div class="row " >
						<div class="col col-6 " >
							<p class="fw-normal fs-4 text-black" >Modificación realizada por:</p>
						</div>
						<div class="col col-6">
							<select class="form-select form-select-sm align-middle" id="selectorPlazosPersonal">
								<option >seleccione una opción</option>
								<option value="incidencia">Incidencia</option>
								<option value="prorroga">Prórroga</option>
							</select>
						</div>
					</div>
				</div>

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

					<a id='guardarPlazosPersonal' type='button' class='btn btn-primary  left__margen' >Subir</a>

					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>

			</div>
		</div>
	</div>

</div>



<script>
$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
  datatabletsSeguimientoRevisorVacio($("#seguimiento__PlazosTablaTrimestres"),"seguimiento__PlazosTablaTrimestres","Reporte de Bloqueos",objetosSeguimiento2023([6,7,8,9,10,11,12,13],["texto__fecha__selector","guardar_plazos_personal","texto__fecha__selector","guardar_plazos_personal","texto__fecha__selector","guardar_plazos_personal","texto__fecha__selector","guardar_plazos_personal"],[6,7,8,9,10],[false],[false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);

  
});


</script>