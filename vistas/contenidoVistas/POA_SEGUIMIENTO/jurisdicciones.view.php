<?php $objetoInformacion = new usuarioAcciones(); ?>

<?php $componentes = new componentes(); ?>

<?php $componentesTablas = new componentesTablas(); ?>


<!-- <div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="contenedor__tabla__total">

		<table id="mostrado_jurisdicion_zonales" class="col col-12 cell-border">

			<thead>

				<tr>

					<th rowspan="2" style="vertical-align: middle!important;"><center>RUC</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>ORGANISMO DEPORTIVO DAVID PACA</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PROVINCIA</center></th>
					<th rowspan="1" colspan="2"><center>SELECCIONAR JURISDICCIÓN</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>GUARDAR</center></th>

				</tr>
	

					<th rowspan="1" colspan="1"><center>JURISDICCIÓN</center></th>

					<th rowspan="1" colspan="1" style="height: 200px;">

						<center> -->
<!-- <nav id="colorNav" style="position: relative; top: -5em!important;">
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-6">
										<label>Selecionar Jurisdicción</label>
									</div>
									<div class="col-md-12">
										<select class="form-select" id="idSelectDeportePTC" aria-label="Default select example">
											<option id="seleccionarTodos__2__segundasos" value="seleccionarTodos__2__segundasos">Seleccionar todo</option>
											<option value="2">Planta Central</option>
											<option value="3">Zonal1</option>
											<option value="3">Zonal2</option>
											<option value="3">Zonal3</option>
											<option value="3">Zonal4</option>
											<option value="3">Zonal6</option>
											<option value="3">Zonal7</option>
											<option value="3">Zonal8</option>
										</select>
									</div>
								</div>
							</div>
						</nav> -->

<!-- <nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__2__segundasos" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__2__periodos__cierres" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">CERRAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__2__periodos__cierres" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">ABRIR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							 -->

<!-- <nav id="colorNav" style="position: relative; top: -10em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding-left: 2.5em; padding-right: 2.5em; padding-top: .5em; padding-bottom: .5em;"><div style="position: relative;left: -7px; font-size:15px; font-weight:  bold; color: white; width: 100%;">Seleccionar Jurisdicción</div></a>
										<ul class="vertice__seguimiento__top">
										<li><button class="btn btn-warning" id="seleccionarTodos__2__segundasos" style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">PLANTA CENTRAL</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL1</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL2</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL3</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL4</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL6</button></li>
							                <li><button class="btn btn-success obligatorios_seleccionar_zonal" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL7</button></li>
							                 <li><button class="btn btn-success seleccionarTodos__enviar__2__periodos__cierres" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL8</button></li> 
							                <li><button class="btn btn-info obligatorios_seleccionar_zonal" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:.2em;padding-bottom: .5em;">ZONAL8</button></li>
							                
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

</div> -->




<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="row">
			<!-- 
		<table id="mostrado_jurisdicion_zonales" class="col col-12 cell-border">

			<thead>

				<tr>

					<th><center>RUC</center></th>
					<th><center>ORGANISMO DEPORTIVO</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>SELECCIONAR JURISDICCIÓN</center></th>

				</tr>		
				

			</thead>

		</table>

		</div> -->



			



			<table id="mostrar_datos_jurisdiccion">

			<thead>
				<tr align="center">
					<th ><center>RUC</center></th>
					<th ><center>NOMBRE ORGANISMOS</center></th>
					<th ><center>PROVINCIA</center></th>
					<th ><center>CANTÓN</center></th>
					<th ><center>jURISDICCIÓN</center></th>		
				</tr>
			</thead>
			<tbody></tbody>

		</table>




	</section>

</div>


<script>
	$.getScript("layout/scripts/js/POA_SEGUIMIENTO_JS/datatables2.js", function() {


		datatablesSeguimientoZonales($("#mostrar_datos_jurisdiccion"), "mostrar_datos_jurisdiccion");


	});
</script>