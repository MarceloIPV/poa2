<?php

	class componentes__modificaciones{


		public function componentes__modificaciones__2022($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:90%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>


						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}




		public function getModalConfiguracion__fechas($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:90%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-3'>

								Escoja fecha inicial de modificación

							</div>

							<div class='col col-2'>

								<input type='date' class='obligatorios__fechas__m ancho__total__input' id='fecha__inicial__modificacion'/>

							</div>


							<div class='col col-3'>

								Escoja fecha final de modificación

							</div>

							<div class='col col-2'>

								<input type='date' class='obligatorios__fechas__m ancho__total__input' id='fecha__final__modificacion'/>

							</div>

							<div class='col col-2'>

								<a class='btn btn-primary' id='guardar__fechas__modificaciones'>
									<i class='fa fa-floppy-o' aria-hidden='true'></i>
								</a>

							</div>

							<div class='col col-12'>

								<table id='tabla__fechas__modificaciones'>

									<thead>


										<tr>

											<th vertical__aign><center>Fecha<br>inicial</center></th>
											<th vertical__aign><center>Fecha<br>final</center></th>
											<th vertical__aign><center>Funcionario</center></th>
											<th vertical__aign><center>Fecha<br>ingreso<br>información</center></th>
											<th vertical__aign><center>Hora<br>ingreso<br>información</center></th>

										</tr>

									</thead>


								</table>


							</div>


						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}



		public function getModalConfiguracion($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:90%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>


						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}


		public function getModalConfiguracion__restriccion__items($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:90%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<table>

								<thead>

									<tr>

										<th class='vertical__aign'>Ítem</th>
										<th class='vertical__aign'>Descripción</th>
										<th class='vertical__aign'>Funcionario<br>ingreso<br>información</th>
										<th class='vertical__aign'>Fecha</th>
										<th class='vertical__aign'>Hora</th>
										<th class='vertical__aign'>Eliminar</th>

									</tr>

								</thead>

								<tbody class='filas__restricciones__modificaciones'></tbody>

							</table>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}		

		public function getModalModificacion($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:95%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<section class='content row mt-4'>

								<table class='col col-12 table__bordes__ejecutados'>
									
									<thead>
										
										<tr>

											<th colspan='6'><center>ORÍGEN</center></th>

										</tr>

										<tr class='fila__color'>

											<th class='vertical__aign'><center>Actividad</center></th>
											<th class='vertical__aign'><center>Ítem</center></th>
											<th class='vertical__aign'><center>Código<br>Ítem<br>presupuestario</center></th>
											<th class='vertical__aign'><center>Mes</center></th>
											<th class='vertical__aign'><center>Monto</center></th>
											<th class='vertical__aign'><center>Disminución</center></th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td>
												<select id='actividad__modificaciones' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<select id='item__modificaciones' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<input id='codigo__presupuestarios' class='ancho__total__input obligatorios' readonly=''/>
											</td>

											<td>
												<select id='mesesSeleccionables' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<input id='monto__seleccionados' class='ancho__total__input obligatorios' readonly=''/>
											</td>

											<td>
												<input id='disminucion__seleccionados' class='ancho__total__input obligatorios' value='0' />
											</td>

										</tr>

									</tbody>

									<tfoot>

										<tr class='fila__color'>

											<th colspan='5'>
												Total mes
											</th>

											<td>
												<input id='total__disminucion__origen' class='ancho__total__input obligatorios' value='0' readonly=''/>
											</td>

										</tr>

									</tfoot>

								</table>

								<table class='col col-12 table__bordes__ejecutados mt-4 tabla__destino__necesaria'>
									
									<thead>
										
										<tr>

											<th colspan='6'><center>DESTINO</center></th>

										</tr>

										<tr class='fila__color'>

											<th class='vertical__aign'><center>Actividad</center></th>
											<th class='vertical__aign'><center>Ítem</center></th>
											<th class='vertical__aign'><center>Código<br>Ítem<br>presupuestario</center></th>
											<th class='vertical__aign'><center>Mes</center></th>
											<th class='vertical__aign'><center>Monto</center></th>
											<th class='vertical__aign'><center>Incremento</center></th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td>
												<select id='actividad__modificaciones__destino' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<select id='item__modificaciones__destino' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<input id='codigo__presupuestarios__destino' class='ancho__total__input obligatorios' readonly='' />
											</td>


											<td>
												<select id='mesesSeleccionables__destino' class='ancho__total__input obligatorios'></select>
											</td>

											<td>
												<input id='monto__seleccionados__destino' class='ancho__total__input obligatorios' readonly=''/>
											</td>

											<td>
												<input id='disminucion__seleccionados__destino' class='ancho__total__input obligatorios'  value='0' readonly=''/>
											</td>

										</tr>

									</tbody>

									<tfoot>

										<tr class='fila__color'>

											<th colspan='5'>
												Total mes
											</th>

											<td colspan='1'>
												<input id='total__disminucion__destino' class='ancho__total__input obligatorios' value='0' readonly=''/>
											</td>

										</tr>

									</tfoot>

								</table>

								<table class='col col-12 table__bordes__ejecutados mt-4 tabla__destino__necesaria'>

									<thead>

										<tr>

											<th colspan='6'>

												<center>JUSTIFICACIÓN</center>

											</th>

										</tr>

										<tr>

											<td colspan='2' class='textos__titulos'>
												Justificación
											</td>

											<td colspan='4'>
												<textarea id='justificacion__modificaciones' class='ancho__total__input obligatorios'></textarea>
											</td>

										</tr>

										<tr>

											<td colspan='2' class='textos__titulos'>
												Pdf de justificacion
											</td>

											<td colspan='1'>
																					
									            <div class='container-input d d-flex align-items-center col col-6 col-md-7 row'>

									              <input type='file' class='inputfile inputfile-5' id='documentoJustificacion' name='documentoJustificacion' accept='application/pdf'/>

									              <label for='documentoJustificacion' class='col col-6 col-md-4'>

									                <figure>

									                  <svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'>

									                    <path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path>

									                  </svg>

									                </figure>

									              </label>

									              <span class='iborrainputfile nombre__justificacion col col-6 col-md-8'>Ningún documento seleccionado</span>

									             </div>

											</td>

											<td colspan='3'>

												<div class='contenedor__pdf__llegados'></div>

											</td>

										</tr>

									</thead>

								</table>

								<table class='col col-12 table__bordes__ejecutados mt-4 tabla__destino__necesaria'>

									<thead>

										<tr>

											<td colspan='2'>

												<center>
													<a id='guardarModificacion__act' class='btn btn-primary mt-4'>Guardar&nbsp;&nbsp;<i class='fa fa-floppy-o' aria-hidden='true'></i></a>
												</center>

											</td>

										</tr>

									</thead>

								</table>

							</section>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}

		public function getModalModificacion__ingreso__valores__sueldos__origen__meses($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-lg'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-3 enlaces__definidos__letras'>
								Enero Disminuye
							</div>

							<div class='col col-3'>
								<input id='enero__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Enero total orígen
							</div>


							<div class='col col-3'>
								<input id='enero__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Febrero Disminuye
							</div>

							<div class='col col-3'>
								<input id='febrero__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Febrero total orígen
							</div>


							<div class='col col-3'>
								<input id='febrero__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Marzo Disminuye
							</div>

							<div class='col col-3'>
								<input id='marzo__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Marzo total orígen
							</div>


							<div class='col col-3'>
								<input id='marzo__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>



							<div class='col col-3 enlaces__definidos__letras'>
								Abril Disminuye
							</div>

							<div class='col col-3'>
								<input id='abril__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Abril total orígen
							</div>


							<div class='col col-3'>
								<input id='abril__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Mayo Disminuye
							</div>

							<div class='col col-3'>
								<input id='mayo__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Mayo total orígen
							</div>


							<div class='col col-3'>
								<input id='mayo__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Junio Disminuye
							</div>

							<div class='col col-3'>
								<input id='junio__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Junio total orígen
							</div>


							<div class='col col-3'>
								<input id='junio__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Julio Disminuye
							</div>

							<div class='col col-3'>
								<input id='julio__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Julio total orígen
							</div>


							<div class='col col-3'>
								<input id='julio__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Agosto Disminuye
							</div>

							<div class='col col-3'>
								<input id='agosto__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Agosto total orígen
							</div>


							<div class='col col-3'>
								<input id='agosto__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Septiembre Disminuye
							</div>

							<div class='col col-3'>
								<input id='septiembre__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Septiembre total orígen
							</div>


							<div class='col col-3'>
								<input id='septiembre__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Octubre Disminuye
							</div>

							<div class='col col-3'>
								<input id='octubre__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Octubre total orígen
							</div>

							<div class='col col-3'>
								<input id='octubre__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Noviembre Disminuye
							</div>

							<div class='col col-3'>
								<input id='noviembre__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Noviembre total orígen
							</div>


							<div class='col col-3'>
								<input id='noviembre__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>



							<div class='col col-3 enlaces__definidos__letras'>
								Diciembre Disminuye
							</div>

							<div class='col col-3'>
								<input id='diciembre__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Diciembre total orígen
							</div>


							<div class='col col-3'>
								<input id='diciembre__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}



		public function getModalModificacion__ingreso__valores__sueldos__origen($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-lg'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-3 enlaces__definidos__letras'>
								Sueldo salario Disminuye
							</div>

							<div class='col col-3'>
								<input id='sueldo__salario__mensual__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Sueldo salario total orígen
							</div>


							<div class='col col-3'>
								<input id='sueldo__salario__total__mensual__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Aporte patronal Disminuye
							</div>

							<div class='col col-3'>
								<input id='aporte__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Aporte patronal total orígen
							</div>


							<div class='col col-3'>
								<input id='aporte__total__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Décimo tercero Disminuye
							</div>

							<div class='col col-3'>
								<input id='decimo__tercero__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Décimo tercero total orígen
							</div>


							<div class='col col-3'>
								<input id='decimo__tercero__total__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Décimo cuarto Disminuye
							</div>

							<div class='col col-3'>
								<input id='decimo__cuarto__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Décimo cuarto total orígen
							</div>


							<div class='col col-3'>
								<input id='decimo__cuarto__total__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


							<div class='col col-3 enlaces__definidos__letras'>
								Fondos de reserva Disminuye
							</div>

							<div class='col col-3'>
								<input id='fondos__de__reserva__origen__disminucion' class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f' value='0'/>
							</div>

							<div class='col col-3 enlaces__definidos__letras'>
								Fondos de reserva total orígen
							</div>


							<div class='col col-3'>
								<input id='fondos__de__reserva__total__origen__disminucion' class='ancho__total__input obligatorios__2' readonly='' value='0'/>
							</div>


						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}


		public function getModalModificacion__sueldos($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:95%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<section class='content row mt-4 borde__separacion__mo' style='padding:.5em;'>

								<div class='col col-12 text-center textos__titulos__2d'>ORÍGEN</div>

								<table class='col col-12 table__bordes__ejecutados'>

									<thead>

										<tr>

											<th class='vertical__aign'><center>Apellidos y nombres</center></th>
											<th class='vertical__aign'><center>Nro.cédula<br>de ciudadanía/<br>pasaporte</center></th>
											<th class='vertical__aign'><center>Cargo</center></th>
											<th class='vertical__aign'><center>Tipo<br>de cargo</center></th>
											<th class='vertical__aign'><center>Tiempo<br>de trabajo<br>en<br>meses</center></th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td>
												<select id='empleado__origen' class='ancho__total__input obligatorios__2'></select>
											</td>

											<td>
												<input id='cedula__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>


											<td>
												<input id='cargo__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>


											<td>
												<input id='tipo__cargo__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>

											<td>
												<input id='tiempo__trabajo__meses__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>

										</tr>

									</tbody>

								</table>

								<table class='col col-12 table__bordes__ejecutados'>

									<thead>

										<tr>

											<th class='vertical__aign'><center>Sueldo<br>salario<br>mensual</center></th>
											<th class='vertical__aign'><center>Aporte<br>patronal<br>iess<br>mensual</center></th>
											<th class='vertical__aign'><center>Décimo tercera<br>remuneración</center></th>
											<th class='vertical__aign'><center>Mensualización<br>décimo tercera<br>remuneración</center></th>
											<th class='vertical__aign'><center>Décimo cuarta<br>remuneración</center></th>
											<th class='vertical__aign'><center>Mensualización<br>décimo cuarta<br>remuneración</center></th>
											<th class='vertical__aign'><center>Fondos<br>de reserva</center></th>
											<th class='vertical__aign'><center>Disminuir</center></th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td>
												<input id='sueldo__salario__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>										

											<td>
												<input id='aporte__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>

											<td>
												<input id='decimo__tercero__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>


											<td>
												<input id='mensualiza__tercero__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>


											<td>
												<input id='decimo__cuarto__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>

											<td>
												<input id='mensualiza__cuarto__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>

											<td>
												<input id='fondos__de__reserva__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>


											<td>
												<center>
													<a class='btn btn-info titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#modalModificarSueldos' id='modificar__iniciales__sueldos__salarios'>Disminuir</a>
												</center>
											</td>


										</tr>

									</tbody>

								</table>

								<table class='col col-12 table__bordes__ejecutados'>

									<thead>

										<tr>

											<th class='vertical__aign'><center>Enero</center></th>
											<th class='vertical__aign'><center>Febrero</center></th>
											<th class='vertical__aign'><center>Marzo</center></th>
											<th class='vertical__aign'><center>Abril</center></th>
											<th class='vertical__aign'><center>Mayo</center></th>
											<th class='vertical__aign'><center>Junio</center></th>
											<th class='vertical__aign'><center>Julio</center></th>
											<th class='vertical__aign'><center>Agosto</center></th>
											<th class='vertical__aign'><center>Septiembre</center></th>
											<th class='vertical__aign'><center>Octubre</center></th>
											<th class='vertical__aign'><center>Noviembre</center></th>
											<th class='vertical__aign'><center>Diciembre</center></th>
											<th class='vertical__aign'><center>Disminuir</center></th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td>
												<input id='enero__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>										

											<td>
												<input id='febrero__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>		

											<td>
												<input id='marzo__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='abril__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='mayo__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='junio__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='julio__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='agosto__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='septiembre__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	


											<td>
												<input id='octubre__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	


											<td>
												<input id='noviembre__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>	

											<td>
												<input id='diciembre__origen' class='ancho__total__input obligatorios__2' readonly=''/>
											</td>												

											<td>
												<center>
													<a class='btn btn-info titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#modalModificarSueldos__meses' id='modificar__iniciales__sueldos__salarios__meses'>Disminuir</a>
												</center>
											</td>


										</tr>

									</tbody>

								</table>



							</section>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}



		public function getModalModificacion__editas($parametro1,$parametro2,$parametro3){

			$modal= "
			
				<div class='modal fade' id='$parametro1' aria-hidden='true'>

					<div class='modal-dialog modal-xl' style='min-width:95%!important;'>

						<form class='modal-content formularioConfiguracion'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__modalItems'>$parametro2</h5>

					        </div>

					        <div class='col col-1'>

								<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
								
					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<section class='content row mt-4'>

								<table class='col col-12 table__bordes__ejecutados'>
									
									<thead>
										
										<tr>

											<th colspan='7' class='vertical__aign'><center>ORÍGEN</center></th>
											<th colspan='7' class='vertical__aign'><center>DESTINO</center></th>
											<th rowspan='2' class='vertical__aign'><center>ACCIONES</center></th>

										</tr>

										<tr>

											<th class='vertical__aign'><center>Actividad</center></th>
											<th class='vertical__aign'><center>Ítem</center></th>
											<th class='vertical__aign'><center>Código<br>Ítem<br>presupuestario</center></th>
											<th class='vertical__aign'><center>Mes</center></th>
											<th class='vertical__aign'><center>Monto</center></th>
											<th class='vertical__aign'><center>Disminución</center></th>
											<th class='vertical__aign'><center>Total Ítem</center></th>

											<th class='vertical__aign'><center>Actividad</center></th>
											<th class='vertical__aign'><center>Ítem</center></th>
											<th class='vertical__aign'><center>Código<br>Ítem<br>presupuestario</center></th>
											<th class='vertical__aign'><center>Mes</center></th>
											<th class='vertical__aign'><center>Monto</center></th>
											<th class='vertical__aign'><center>Incremento</center></th>
											<th class='vertical__aign'><center>Total Ítem</center></th>

										</tr>

									</thead>

									<tbody class='ediciones__modificaciones'></tbody>

								</table>


							</section>

						</div>

					</form>

				</div>

			</div>";

			return $modal;


		}


	}