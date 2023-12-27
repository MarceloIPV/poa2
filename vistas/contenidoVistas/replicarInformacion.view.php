<?php $componentes= new componentes();?>

<?php session_start();?>
<?php $aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];?>

<div class="content-wrapper">

	<input type="hidden" id="anioActual__periodos" name="anioActual__periodos"  value="<?=$aniosPeriodos__ingesos?>"/>

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"COPIA CATALOGO AÑO ANTERIOR");?>

		<div class="row">

			<table  class="col col-12 cell-border">

				<thead>

					<tr>

						<th><center>MÁTRIZ</center></th>
						<th><center>PERIODO</center></th>
						<th><center>REPLICAR</center></th>

					</tr>

				</thead>

				<tbody>
					
					<tr>

						<td><center>Sueldos y Salarios</center></td>
						<td>
							<select class="ancho__total__input__selects" id="periodo__sueldosR" name="periodo__sueldosR">
								<option value="0">--Seleccione un período--</option>
							</select>
						</td>
						<td>
							<center>
								<button class="btn btn-warning" id="replicar__salarios" name="replicar__salarios">
									<i class="fa fa-reply-all" aria-hidden="true"></i>
								</button>
							</center>
						</td>

					</tr>

					
					<tr>

						<td><center>Honorarios</center></td>
						<td>
							<select class="ancho__total__input__selects" id="periodo__honorarios" name="periodo__honorarios">
								<option value="0">--Seleccione un período--</option>
							</select>
						</td>
						<td>
							<center>
								<button class="btn btn-warning" id="replicar__honorariosR" name="replicar__honorariosR">
									<i class="fa fa-reply-all" aria-hidden="true"></i>
								</button>
							</center>
						</td>

					</tr>

				</tbody>

			</table>

		</div>

	</section>

</div>