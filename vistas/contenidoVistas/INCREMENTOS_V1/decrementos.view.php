<?php $componentes = new componentes(); ?>

<?php $componentes__indicadores = new componentes__incrementos__v1(); ?>

<?php $idUsuarioEn = $_SESSION["idUsuario"]; ?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?= $componentes->getComponentes(1, "ASIGNACIÓN DE PRESUPUESTO"); ?>

		<div class="row">

			<input type='hidden' id="identificador__pagina" name="identificador__pagina" value="decremento" />

			<table id="asignarPresupuestoMo__incrementos__v__1" class="col col-12 cell-border">

				<thead>

					<tr>

						<th>
							<center>RUC</center>
						</th>
						<th>
							<center>Organismo deportivo</center>
						</th>
						<th>
							<center>Tipo Organismo</center>
						</th>
						<th>
							<center>Email</center>
						</th>
						<th>
							<center>Provincia</center>
						</th>
						<th>
							<center>Teléfonos</center>
						</th>
						<th>
							<center>Monto</center>
						</th>
						<th>
							<center>Decrementar</center>
						</th>
						<th>
							<center>Estado</center>
						</th>
						<th>
							<center>Eliminar</center>
						</th>

					</tr>

				</thead>

			</table>

		</div>

	</section>

</div>

<!--=============================
=            Modales            =
==============================-->

<?= $componentes__indicadores->getModalAtributosPdfs("modalAsignarPre", "Incremento del presupuesto", "-", "decremento", $idUsuarioEn); ?>


<!--====  End of Modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos__v1/datatablets.js?v=1.0.1"></script>
<script type="text/javascript">
	restarDecrementos($(".montoIncrementos"), $(".montoTotalIncrementoTecho"), $("#total__Incrementos_M_"));
</script>
<script type="text/javascript">
	datatablets__funcio__repor__incrementos__v__1($("#asignarPresupuestoMo__incrementos__v__1"), "asignarPresupuestoMo__decrementos__v__1", "seguimiento");


	var guardar__incrementos = function(boton, tipo, array) {

		$(boton).click(function(e) {

			var paqueteDeDatos = new FormData();

			let idOrganismo = $(array[0]).val();
			let montoIngresadoModificacion__incrementos = $(array[1]).val();
			let montoTotalIncremento = $(array[2]).val();
			let montoPoaAprobado = $(array[3]).val();


			if (parseFloat(montoPoaAprobado) < parseFloat(montoTotalIncremento) || parseFloat(montoPoaAprobado) === parseFloat(montoTotalIncremento) || parseFloat(montoTotalIncremento) === 0) {
				alertify.set("notifier", "position", "top-center");
				alertify.notify("El monto Total debe ser menor al Poa Aprobado y distinto de cero", "error", 5, function() {});

			} else {

				alertify.confirm("¿Está seguro de realizar el envío?", function(result) {
					if (result) {
						$(boton).attr("type", "submit");
						$(boton).click();
						$(boton).hide();

						paqueteDeDatos.append('tipo', tipo);
						paqueteDeDatos.append('idOrganismo', idOrganismo);
						paqueteDeDatos.append('montoIngresadoModificacion__incrementos', montoIngresadoModificacion__incrementos);
						paqueteDeDatos.append('montoTotalIncremento', montoTotalIncremento);


						$.ajax({

							type: "POST",
							url: "modelosBd/incrementosDecrementos/inserta.md.php",
							contentType: false,
							data: paqueteDeDatos,
							processData: false,
							cache: false,
							success: function(response) {

								let elementos = JSON.parse(response);
								let mensaje = elementos['mensaje'];

								if (mensaje == 1) {

									alertify.set("notifier", "position", "top-center");
									alertify.notify("Registro realizado correctamente", "success", 5, function() {});

									window.setTimeout(function() {
										window.location = "decrementos";
									}, 3000);

								}


							},
							error: function() {

							}

						});




					} else {

						alertify.set("notifier", "position", "top-center");
						alertify.notify("Acccion Cancelada", "error", 3, function() {});
					}
				});


			}



		});

	}

	guardar__incrementos($("#ingrementarValoGuardar"), "decrementos__guardar", [$("#idOrganismo__m"), $("#montoIngresadoModificacion__incrementos"), $("#total__Incrementos_M_"), $("#montoTotal__Modificacion__incrementos")]);
</script>