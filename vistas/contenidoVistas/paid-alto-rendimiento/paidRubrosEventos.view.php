<?php $componentes = new componentes();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];
echo "ID ANIOS de los eventos";
echo $aniosPeriodos__ingesos;
$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);
$objeto = new usuarioAcciones(); ?>


<input type="hidden" id="ïdentificador" name="ïdentificador" value="0">
<input type="hidden" id="identificador" name="identificador" value="0">

<div class="content-wrapper">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
	<input  type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

	<section class="content row d d-flex justify-content-center">
		<h3 id='tituloComponenteAR' align='center'></h3>
		<h3 id='tituloRubroAR' align='center'></h3>
		<div class="row">
			<div class="container-fluid pt-2 px-2">
				<div class="row g-2">
					<div class="col-sm-4">
						<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Rubro:</h4>
							<div class="ms-3">
								<h4 id='MontoAR' class="mb-0"></h4>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Planificado:</h4>
							<div class="ms-3">
								<h4 class="mb-0 restaDeMontos" id="MontoAsignadoEventos"></h4>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Asignar:</h4>
							<div class="ms-3">
								<h4 class="mb-0" id="montoPorAsignarEventos"></h4>
							</div>
						</div>
					</div>


				</div>

			</div>
		</div>

		<div class="row">

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-10">

					</div>
					<div class="col-md-2">
						<button type="button" id="btnNuevo" class="btn btn-success rounded-pill form-control" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo <i class="fal fa-plus-circle"></i></button>


					</div>
				</div>
			</div>

			<table id="paidRubrosEventos" style="width:100%">

				<thead>

					<tr align="center">
						<th COLSPAN=1>
							<center>Nro</center>
						</th>
						<th COLSPAN=1>
							<center>Deporte</center>
						</th>
						<th COLSPAN=1>
							<center>Modalidad o Discapacidad</center>
						</th>
						<th COLSPAN=1>
							<center>Nombre del evento</center>
						</th>
						<th COLSPAN=1>
							<center>Nombres y Apellidos Atletas</center>
						</th>
						<th COLSPAN=1>
							<center>Nombres y Apellidos Ent. Ofi.</center>
						</th>
						<th COLSPAN=1>
							<center>Categoría</center>
						</th>
						<th COLSPAN=1>
							<center>País</center>
						</th>
						<th COLSPAN=1>
							<center>Sede</center>
						</th>
						<th COLSPAN=1>
							<center>Tipo de Evento </center>
						</th>
						<th COLSPAN=1>
							<center>Fecha Inicio</center>
						</th>
						<th COLSPAN=1>
							<center>Fecha Fin</center>
						</th>
						<th COLSPAN=1>
							<center>No. Ent. Ofic.</center>
						</th>
						<th COLSPAN=1>
							<center>No. ATL.</center>
						</th>
						<th COLSPAN=1>
							<center>No. DIAS</center>
						</th>
						<th COLSPAN=1>
							<center>No. PAX</center>
						</th>
						<th COLSPAN=1>
							<center>alojamiento</center>
						</th>
						<th COLSPAN=1>
							<center>Alimentación</center>
						</th>
						<th COLSPAN=1>
							<center>Hidratación</center>
						</th>
						<th COLSPAN=1>
							<center>Tranporte Aereo</center>
						</th>
						<th COLSPAN=1>
							<center>Transporte Terrestre</center>
						</th>
						<th COLSPAN=1>
							<center>Bono Deportivo</center>
						</th>
						<th COLSPAN=1>
							<center>Inscripción</center>
						</th>
						<th COLSPAN=1>
							<center>Visa</center>
						</th>
						<th COLSPAN=1>
							<center>Fondo Emergencia</center>
						</th>
						<th COLSPAN=1>
							<center>Específicos Deporte</center>
						</th>
						<th COLSPAN=1>
							<center>Valor Total</center>
						</th>
						<th COLSPAN=1>
							<center>Observaciones</center>
						</th>
					</TR>
				</thead>

			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop='static' data-keyboard='false' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">EVENTOS DE PREPARACIÓN Y COMPETENCIA</h5>
					<button type="button" class="close" id="btnCerrarModalEventos" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Deporte</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelectDeporte" aria-label="Default select example">
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Modalidad</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelectModalidad" aria-label="Default select example">
									</select>
								</div>
							</div>

							<br><br>

							<div class="col-md-12">
								<div class="col-md-3">
									<label>Nombre del evento</label>
								</div>
								<div class="col-md-12">
									<input type="input" placeholder="Nombre del evento" id="idNombres" class="form-control">
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-12">
									<label>Nombres y Apellidos Deportistas</label>
								</div>
								<div class="col-md-12">
									<textarea id='idNombresAtletas' placeholder="Nombre de Deportistas" class="form-control" style='width: 100%;'></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-12">
									<label>Nombres y Apellidos Entrenadores Oficiales</label>
								</div>
								<div class="col-md-12">
									<textarea id='idNombresEntOfi' placeholder="Nombre de Entrenadores Oficiales" class="form-control" style='width: 100%;'></textarea>
								</div>
							</div>

							<br><br>

							<div class="col-md-3">
								<div class="col-md-6">
									<label>Categoria</label>
								</div>
								<div class="col-md-12"><select class="form-select" id="idSelectCategoria" aria-label="Default select example">

									</select>
								</div>
							</div>

							<br><br>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Pais</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelectpais" aria-label="Default select example">

									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Ciudad</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelectCiudad" aria-label="Default select example">
										<option value="0" selected>--Seleccione Un País--</option>
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Tipo de Evento</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelecttipoEvento" aria-label="Default select example">
										<option value="0" selected>--Seleccione Una Opción--</option>
										<option value="NAC">NAC</option>
										<option value="INT">INT</option>
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Fecha Inicio</label>
								</div>
								<div class="col-md-12">
									<input type="date" id="fechaInicio" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Fecha Fin</label>
								</div>
								<div class="col-md-12">
									<input type="date" id="fechaFin" class="form-control">
								</div>
							</div>

							<br><br>


							<div class="col-md-3">
								<div class="col-md-12">
									<label>No. ENT. OFIC.</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="oficina" oninput="eventosDias()" class="form-control solo__numero__montos sumador__num_ent_num_atle">
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>No. Atl.</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="atletas" oninput="eventosNumeroAtletas()" class="form-control solo__numero__montos sumador__num_ent_num_atle">
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>No. Días.</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" id="dias" class="form-control" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>No. Pax.</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" id="pax" class="form-control" readonly="">
								</div>
							</div>



							<div class="col-md-3">
								<div class="col-md-12">
									<label>Alojamiento</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" id="idAlojamiento" placeholder="0.00" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Alimentación</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idAlimentacion" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Hidratación</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idHidratacion" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Transporte Aereo</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idTransporteAereo" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Transporte Terrestre</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idTranporteTerrestre" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Bono Deportivo Internal</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idBonoDeportivo" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Inscripción</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idInscripcion" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Visa</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idVisa" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="col-md-12">
									<label>Fondo Emergencia</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idfondoEmergencia" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<label>Específicos Deporte</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="idEspecificosDeporte" class="form-control solo__numero__montos sumador__num_items">
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="col-md-12">
									<label>Valor Total</label>
								</div>
								<div class="col-md-12">
									<div class='input-group mb-3'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>$</span>
										</div>
										<input type="text" placeholder="0.00" id="valorTotal" readonly class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="col-md-12">
									<label>Observaciones</label>
								</div>
								<div class="col-md-12">
									<textarea placeholder="Observaciones" id="Observaciones" class="form-control"></textarea>
									&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer d d-flex justify-content-center row">
						<div class='col col-12 d d-flex justify-content-center flex-wrap'>
							<button type="button" id="idBtnGuardarEventos" class="btn btn-primary">Guardar</button>
							<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="data"></div>
	</div>

	<script>
		$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function() {

			mostrar_titulo_monto_rubros_principal("mostrar_titulo_nece_individuales_general", $("#ïdentificador").val());

		});
		$("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
		$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));
		var anoIngreso = <?php echo $json_variable; ?>;


		$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function() {

			sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Eventos", "#MontoAsignadoEventos", ".restaDeMontos", "#montoPorAsignarEventos");

		});

		$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/datatables.js", function() {

			datatabletsAR($("#paidRubrosEventos"), "paidRubrosEventos");

		});
	</script>