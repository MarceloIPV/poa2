
<?php $componentes= new componentes();?>

<div class="content-wrapper">

	<?=$componentes->getComponentes(1,"Modificaciones");?>

	<input type="text" id="financiero__recogidos" name="financiero__recogidos" value="si" />
	<input type="hidden" id="valor__recogidos" name="valor__recogidos" />
	<input type="text" id="cogido__letras" name="cogido__letras" />

	<div class="row mt-4">

		<div class="col col-1">

			Elegir actividad

		</div>

		<div class="col col-4">

			<select class="ancho__total__input__selects" id="actividadesMo" name="actividadesMo"></select>

		</div>

		<div class="col col-2">

			Elegir Items a modificar

		</div>

		<div class="col col-4" id="itemsMo" name="itemsMo" class="row"></div>

		<div class="col col-1">

			<button class="btn btn-warning text-center" id="generarTablas__items">Generar</button>

		</div>

	</div>

	<!--===========================
	=            Excel            =
	============================-->
	
	<div id="excel__modificaciones" class="hot ocultos__origenesD"></div>

	<!--====  End of Excel  ====-->

	<!--============================
	=            excel             =
	=============================-->
	
	<div class="row mt-4">

		<table class="col col-12">

			<thead>

				<tr>

					<th colspan="6">

						Orígen

					</th>


					<th colspan="5">

						Destino

					</th>

				</tr>

				<tr>

					<th>

						Programación Financiera

					</th>

					<th>
						Ítem origen
					</th>


					<th>
						Mes origen
					</th>

					<th>
						Valor Inicial
					</th>

					<th>
						Valor Final
					</th>


					<th>
						Crear destino
					</th>


					<th>

						Programación Financiera

					</th>

					<th>
						Ítem destino
					</th>


					<th>
						Mes destino
					</th>

					<th>
						Valor Inicial
					</th>

					<th>
						Valor Final
					</th>


				</tr>

			</thead>

			<tbody class="body__tablas__anexos"></tbody>

		</table>

	</div>
	
	<!--====  End of excel   ====-->

	<div class="row">

		<div id="hot-controls-custom" class="d d-flex col col-12"></div>

	</div>

	<div id="hot"></div>

	<div id="hot2"></div>
	
</div>
