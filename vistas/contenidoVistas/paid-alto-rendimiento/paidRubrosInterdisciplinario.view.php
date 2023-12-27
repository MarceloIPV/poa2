<?php $componentes = new componentes();
$idOrganismoSession = $_SESSION["idOrganismoSession"];
$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];
echo $aniosPeriodos__ingesos;
$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);
$objeto = new usuarioAcciones(); ?>

<input type="hidden" id="idRubroInterdisciplinario" name="idRubroInterdisciplinario">
<input type="hidden" id="ïdentificador" name="ïdentificador" value="0">
<input type="hidden" id="identificador" name="identificador" value="0">
<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">



		<input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
		<input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">



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
								<h4 class="mb-0 restaDeMontosInter" id="MontoAsignadoInterdisciplinario"></h4>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Asignar:</h4>
							<div class="ms-3">
								<h4 class="mb-0" id="montoPorAsignarInterdisciplinario"></h4>
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
						<button type="button" id="InterBtnNuevo" class="btn btn-success rounded-pill form-control" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo <i class="fal fa-plus-circle"></i></button>
					</div>
				</div>
			</div>

			<table id="paidRubrosInterdisciplinario" style="width:100%">

				<thead align="center">

					<tr >
						
						<th COLSPAN=1>
							<center>Nro.</center>
						</th>
						<th COLSPAN=1>
							<center>Cédula</center>
						</th>
						<th COLSPAN=1>
							<center>Modalidad</center>
						</th>
						<th COLSPAN=1>
							<center>Sexo</center>
						</th>
						<th COLSPAN=1>
							<center>Cargo o función</center>
						</th>
						<th COLSPAN=1>
							<center>Nombres</center>
						</th>
						<th COLSPAN=1>
							<center>Apellidos</center>
						</th>
						<th COLSPAN=1>
							<center>Fecha Inicio </center>
						</th>
						<th COLSPAN=1>
							<center>Fecha Fin</center>
						</th>
						<th COLSPAN=1>
							<center>Valor mes acordado. ATL.</center>
						</th>
						<th COLSPAN=1>
							<center>No. Meses</center>
						</th>
						<th COLSPAN=1>
							<center>Valor Total</center>
						</th>
						<th COLSPAN=1>
							<center>Sector</center>
						</th>					
					</tr>
				</thead>

			</table>


			

		</div>

	</section>

</div>



<!-- Small modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop='static' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo rubro</h5>
					<button type="button" class="close" id="btnCerrarModalInter" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Cedúla</label>
								</div>
								<div class="col-md-12">
									<input type="input" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="cedula" placeholder="Cédula sin guión" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Modalidad</label>
								</div>
								<div class="col-md-12">
									<select class="form-select" id="idSelectModalidadInter" aria-label="Default select example">
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="col-md-12">
									<label>Sexo</label>
								</div>
								<div class="col-md-12">
									<select name="select" id="sexo" class="form-select">
										<option value="0" selected>--Seleccione Una Opción--</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Cargo o función</label>
								</div>
								<div class="col-md-12">
									<select name="select" id="cargo" class="form-select">
										<option value="0" selected>--Seleccione Una Opción--</option>
										<option value="Entrenador">Entrenador</option>
										<option value="Asistente Técnico">Asistente Técnico</option>
										<option value="Preparador Físico">Preparador Físico</option>
										<option value="Otros Profesionales">Otros Profesionales</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="col-md-12">
									<label>Nombres</label>
								</div>
								<div class="col-md-12">
									<input type="input" placeholder="Nombres" id="nombres" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Apellidos</label>
								</div>
								<div class="col-md-12">
									<input type="input" placeholder="Apellidos" id="apellidos" class="form-control">
								</div>
							</div>

							<div class="col-md-6">
								<div class="col-md-12">
									<label>Fecha Inicio Contratación</label>
								</div>
								<div class="col-md-12">
									<input type="date" id="fechaInicio" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>Fecha Fin Contratación</label>
								</div>
								<div class="col-md-12">
									<input type="date" id="fechaFin" class="form-control">
								</div>
							</div>



							<div class="col-md-6">
								<div class="col-md-12">
									<label>Valor/mes acordado incluido IVA</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" id="valorMes" class="form-control sumador__valor_mes_num_mes" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<label>N° Meses</label>
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="00" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="meses" class="form-control sumador__valor_mes_num_mes">
								</div>
							</div>


							<div class="col-md-6">
								<div class="col-md-12">
									<label>Valor Total</label>
									<input type="text" id="valorTotal" class="form-control" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<label>Sector</label>
								<select name="select" id="sector" class="form-select">
									<option value="0" selected>--Seleccione Una Opción--</option>
									<option value="Convencional">Convencional</option>
									<option value="Discapacidad">Discapacidad</option>
								</select>
							</div>
						</div>
					</div>

					<div class="modal-footer d d-flex justify-content-center row">
						<div class='col col-12 d d-flex justify-content-center flex-wrap'>
							<button type="button" id="idBtnGuardarInterdisciplinario" class="btn btn-primary">Guardar</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
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

			sumaRestaMontosRubrosAR("obtener_suma_valorTotal_Interdisciplinario", "#MontoAsignadoInterdisciplinario", ".restaDeMontosInter", "#montoPorAsignarInterdisciplinario");

		});
		$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/datatables.js", function() {

			datatabletsAR($("#paidRubrosInterdisciplinario"), "paidRubrosInterdisciplinario");
		});
	</script>