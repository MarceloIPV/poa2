<?php

	class componentesModificacionRevisor{

		public function getModalMatricezObserva2($parametro1,$parametro2){

			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatrizDefi'>

							


						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function getModalAtributosPdfs__aprobar($parametro1){

			$modal="
			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close reload__ModalesA' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row contenedor__bodyCMatriz'>

							<input type='hidden' id='idOrganismo__m__n' name='idOrganismo__m__n' />

					      	<input type='hidden' id='idIncrementos' name='idIncrementos' />


						</div>

					</form>

				</div>

			</div>

			";

			return $modal;

		} 


		public function recomendacion__aprobacion__global($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>
	

						<div class='modal-body row'>

							<input type='hidden' id='idOrganismo__t' name='idOrganismo__t'/>
							<input type='hidden' id='idModificacionDerfinitiva__t' name='idModificacionDerfinitiva__t'/>

							<div class='col col-6 fw-bold'>
								SUBSECRETARIA DE DEPORTE DE ALTO RENDIMIENTO
							</div>

							<div class='col col-2 fw-bold'>
								Corresponde
							</div>

							<div class='col col-4 fw-bold'>
								<select id='correspondeAlto' name='correspondeAlto' style='whidth:100%!important;'>
									
									<option value='no'>No</option>
									<option value='si'>Si</option>
								</select>
							</div>

							<div class='col col-6 fw-bold alto__contenedor__visual'>
								<input type='file' id='documentoAltoRendimiento' name='documentoAltoRendimiento' accept='.pdf'/>
							</div>

							<div class='guardado__altoRendimiento col-4 alto__contenedor__visual'></div>

							<div class='col col-2 fw-bold alto__contenedor__visual'>
								<a class='btn btn-secondary' id='guardarDocu__altoRendimiento' name='guardarDocu__altoRendimiento'>
									Guardar Archivo
								</a>
							</div>


							<div class='col col-6 fw-bold'>
								SUBSECRETARIA DE DESARROLLO DE LA ACTIVIDAD FÍSICA
							</div>


							<div class='col col-2 fw-bold'>
								Corresponde
							</div>

							<div class='col col-4 fw-bold'>
								<select id='correspondeDesarrollo' name='correspondeDesarrollo' style='whidth:100%!important;'>
									
									<option value='no'>No</option>
									<option value='si'>Si</option>
								</select>
							</div>


							<div class='col col-6 fw-bold desarrollo__contenedor__visual'>
								<input type='file' id='documentoSubsecretariaFisica' name='documentoSubsecretariaFisica' accept='.pdf'/>
							</div>

							<div class='guardado__subsecretariFisica col col-4 desarrollo__contenedor__visual'></div>

							<div class='col col-2 fw-bold desarrollo__contenedor__visual'>
								<a class='btn btn-secondary' id='guardarDocu__subsecretariaFisica' name='guardarDocu__subsecretariaFisica'>
									Guardar Archivo
								</a>
							</div>


							<div class='col col-6 fw-bold'>
								COORDINACION DE ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA
							</div>


							<div class='col col-2 fw-bold'>
								Corresponde
							</div>

							<div class='col col-4 fw-bold'>
								<select id='correspondeInstalaciones' name='correspondeInstalaciones' style='whidth:100%!important;'>
									
									<option value='no'>No</option>
									<option value='si'>Si</option>
								</select>
							</div>


							<div class='col col-6 fw-bold instalaciones__contenedor__visual'>
								<input type='file' id='documentoInfraestructura' name='documentoInfraestructura' accept='.pdf'/>
							</div>

							<div class='guardado__infraestructura col col-4 instalaciones__contenedor__visual'></div>

							<div class='col col-2 fw-bold instalaciones__contenedor__visual'>
								<a class='btn btn-secondary' id='guardarDocu__infraestructura' name='guardarDocu__infraestructura'>
									Guardar Archivo
								</a>
							</div>


							<div class='col col-6 fw-bold'>
								COORDINACION GENERAL ADMINISTRATIVA FINANCIERA
							</div>

							<div class='col col-2 fw-bold'>
								Corresponde
							</div>

							<div class='col col-4 fw-bold'>
								<select id='correspondeAdministrativo' name='correspondeAdministrativo' style='whidth:100%!important;'>
									
									<option value='no'>No</option>
									<option value='si'>Si</option>
								</select>
							</div>


							<div class='col col-6 fw-bold administrativo__contenedor__visual'>
								<input type='file' id='documentoAdministrativoFinanciero' name='documentoAdministrativoFinanciero' accept='.pdf'/>
							</div>

							<div class='guardado__administrativoFinanciero col col-4 administrativo__contenedor__visual'></div>

							<div class='col col-2 fw-bold administrativo__contenedor__visual'>
								<a class='btn btn-secondary' id='guardarDocu__administrativoFinanciero' name='guardarDocu__administrativoFinanciero'>
									Guardar Archivo
								</a>
							</div>


							<div class='col col-6 fw-bold'>
								COORDINACION GENERAL DE PLANIFICACION Y GESTION ESTRATEGICA
							</div>



							<div class='col col-2 fw-bold'>
								Corresponde
							</div>

							<div class='col col-4 fw-bold'>
								<select id='correspondePlanificacion' name='correspondePlanificacion' style='whidth:100%!important;'>
									
									<option value='no'>No</option>
									<option value='si'>Si</option>
								</select>
							</div>


							<div class='col col-6 fw-bold planificacion__contenedor__visual'>
								<input type='file' id='documentoPlanificacion' name='documentoPlanificacion' accept='.pdf'/>
							</div>

							<div class='guardado__planificacion col col-4 planificacion__contenedor__visual'></div>

							<div class='col col-2 fw-bold planificacion__contenedor__visual'>
								<a class='btn btn-secondary' id='guardarDocu__planificacion' name='guardarDocu__planificacion'>
									Guardar Archivo
								</a>
							</div>



							<div class='col col-12 fw-bold'>
								RESOLUCIÓN / OFICIO DE APROBACIÓN
							</div>

							<div class='col col-6 fw-bold'>
								<input type='file' id='documentoNotificacion' name='documentoNotificacion' accept='.pdf'/>
							</div>


							<input type='hidden' id='codigo__notificacion' name='codigo__notificacion'/>

							<div class='guardado__notificacion col col-4'></div>

							<div class='col col-2 fw-bold'>
								<a class='btn btn-secondary' id='guardarDocu__notificacion' name='guardarDocu__notificacion'>
									Guardar Archivo
								</a>
							</div>

						</div>
					

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='guardarTotal__aprobadoModificaciones' name='guardarTotal__aprobadoModificaciones'>
									GUARDAR 
								</a>
							</div>

						</div>

					</form>

				</div>

			</div>


			";

			return $modal;


		}



		public function modal__bonificaciones__meses__sueldos($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade' id='$parametro1'>

				<div class='modal-dialog' style='min-width:28%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row'>

							<div id='tabla__0' name='tabla__0'>

									<table>
										
										<thead>

											<tr>
												
												<th><center>MES</center></th>
												<th class='nombre__1'><center>SUELDOS</center></th>
												<th class='nombre__2'><center>APORTE PATRONAL</center></th>
												<th class='nombre__3'><center>DÉCIMO TERCER SUELDO</center></th>
												<th class='nombre__4'><center>DÉCIMO CUARTO SUELDO</center></th>
												<th class='oculto__en__des' class='nombre__5'><center>FONDOS DE RESERVA</center></th>

											</tr>


										</thead>

										<tbody>

											<tr>

												<td style='font-weight:bold;'>Enero</td>
												<td id='eneroSueldos__b'></td>
												<td id='eneroAporte__b'></td>
												<td id='eneroTercero__b'></td>
												<td id='eneroCuarto__b'></td>
												<td id='eneroFondosReserva__b' class='oculto__en__des'></td>

											</tr>

											<tr>

												<td style='font-weight:bold;'>Febrero</td>
												<td id='febreroSueldos__b'></td>
												<td id='febreroAporte__b'></td>
												<td id='febreroTercero__b'></td>
												<td id='febreroCuarto__b'></td>
												<td id='febreroFondosReserva__b' class='oculto__en__des'></td>

											</tr>

											<tr>

												<td style='font-weight:bold;'>Marzo</td>
												<td id='marzoSueldos__b'></td>
												<td id='marzoAporte__b'></td>
												<td id='marzoTercero__b'></td>
												<td id='marzoCuarto__b'></td>
												<td id='marzoFondosReserva__b' class='oculto__en__des'></td>

											</tr>

											<tr>

												<td style='font-weight:bold;'>Abril</td>
												<td id='abrilSueldos__b'></td>
												<td id='abrilAporte__b'></td>
												<td id='abrilTercero__b'></td>
												<td id='abrilCuarto__b'></td>
												<td id='abrilFondosReserva__b' class='oculto__en__des'></td>

											</tr>

											<tr>

												<td style='font-weight:bold;'>Mayo</td>
												<td id='mayoSueldos__b'></td>
												<td id='mayoAporte__b'></td>
												<td id='mayoTercero__b'></td>
												<td id='mayoCuarto__b'></td>
												<td id='mayoFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Junio</td>
												<td id='junioSueldos__b'></td>
												<td id='junioAporte__b'></td>
												<td id='junioTercero__b'></td>
												<td id='junioCuarto__b'></td>
												<td id='junioFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Julio</td>
												<td id='julioSueldos__b'></td>
												<td id='julioAporte__b'></td>
												<td id='julioTercero__b'></td>
												<td id='julioCuarto__b'></td>
												<td id='julioFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Agosto</td>
												<td id='agostoSueldos__b'></td>
												<td id='agostoAporte__b'></td>
												<td id='agostoTercero__b'></td>
												<td id='agostoCuarto__b'></td>
												<td id='agostoFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Septiembre</td>
												<td id='septiembreSueldos__b'></td>
												<td id='septiembreAporte__b'></td>
												<td id='septiembreTercero__b'></td>
												<td id='septiembreCuarto__b'></td>
												<td id='septiembreFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Octubre</td>
												<td id='octubreSueldos__b'></td>
												<td id='octubreAporte__b'></td>
												<td id='octubreTercero__b'></td>
												<td id='octubreCuarto__b'></td>
												<td id='octubreFondosReserva__b' class='oculto__en__des'></td>

											</tr>


											<tr>

												<td style='font-weight:bold;'>Noviembre</td>
												<td id='noviembreSueldos__b'></td>
												<td id='noviembreAporte__b'></td>
												<td id='noviembreTercero__b'></td>
												<td id='noviembreCuarto__b'></td>
												<td id='noviembreFondosReserva__b' class='oculto__en__des'></td>

											</tr>

											<tr>

												<td style='font-weight:bold;'>Diciembre</td>
												<td id='diciembreSueldos__b'></td>
												<td id='diciembreAporte__b'></td>
												<td id='diciembreTercero__b'></td>
												<td id='diciembreCuarto__b'></td>
												<td id='diciembreFondosReserva__b' class='oculto__en__des'></td>

											</tr>

										</tbody>
										
									</table>

							</div>


						</div>

					</form>

				</div>

			</div>



			";

			return $modal;


		}


		public function modal__total__modificaciones($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						


						<div class='modal-body row modal__modificaciones__revisor'>

							<div id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>


						</div>

					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}

		public function matricez__origen__destino__inicial($parametro1){
 
			$modal="

			<div class='modal' id='$parametro1'  data-backdrop='static'>

				<div class='modal-dialog' style='min-width:98%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center texto__titulos__mátriz' style='display:flex; align-items:center; flex-direction:column;'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>					

						<div class='modal-body body__origen__destino__inicial row'></div>	

					</form>

				</div>

			</div>

			";

			return $modal;


		}



		public function recomendacion__modificacion__planificacion__recomendacion__quipux($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						

						<div class='modal-body row modal__modificaciones__revisor selector__relativo__reasignar__modificaciones'>

							<select class='selector__modificacion__lineas col col-12 ancho__total__input__selects' id='selector__lineas' name='selector__lineas'></select>	
						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-8' style='font-weight:bold;'>Visualizar información</div>

							<div class='col col-4 checkeds'><input type='checkbox' id='visualizar__informacionModificaciones' name='visualizar__informacionModificaciones'/></div>

							<div class='no__visible__modificaciones' id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>		

						</div>

						<div class='modal-body row'>

							<div class='col col-4'>Documento planificación</div>
							<div class='col col-8'><a target='_blank' id='documentoPlanificacion' name='documentoPlanificacion'>Descargar</a></div>

						</div>

	

						<div class='modal-body row'>

							<div class='col col-8 mt-4' style='font-weight:bold;'>Cargar Notificacion</div>

							<div class='col col-4 mt-4'>

								<input type='file' id='pdfGeneradoCargar' name='pdfGeneradoCargar'/>

							</div>

							<div class='col col-8 mt-4' style='font-weight:bold;'>Número de Notificación</div>


							<div class='col col-4 mt-4'>

								<input type='text' id='numeroNotificacion' name='numeroNotificacion' style='width:100%!important;'/>

							</div>

							<div class='col col-8 mt-4' style='font-weight:bold;'>Fecha</div>


							<div class='col col-4 mt-4'>

								<input type='date' id='fechanumeroNotificacion' name='fechanumeroNotificacion' style='width:100%!important;'/>

							</div>


						</div>
					

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarRecomendacionConQuipux' name='enviarRecomendacionConQuipux'>
									FINALIZAR
								</a>
							</div>

						</div>

					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}


		public function recomendacion__modificacion__planificacion__recomendacion($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						

						<div class='modal-body row modal__modificaciones__revisor selector__relativo__reasignar__modificaciones'>

							<select class='selector__modificacion__lineas col col-12 ancho__total__input__selects' id='selector__lineas' name='selector__lineas'></select>	
						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-8' style='font-weight:bold;'>Visualizar información</div>

							<div class='col col-4 checkeds'><input type='checkbox' id='visualizar__informacionModificaciones' name='visualizar__informacionModificaciones'/></div>

								<div class='no__visible__modificaciones' id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>			

						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-4'>Documento planificación</div>
							<div class='col col-8'><a target='_blank' id='documentoPlanificacion' name='documentoPlanificacion'>Descargar</a></div>

						</div>

						<div class='modal__modificaciones__revisor__enviar__planifiacion'>

							<div class='modal-body row'>

								<div class='col col-8 mt-4' style='font-weight:bold;'>Cargar PDF</div>

								<div class='col col-4 mt-4'>

									<input type='file' id='pdfGeneradoCargar' name='pdfGeneradoCargar'/>

								</div>

							</div>

						</div>								

						<div class='modal__modificaciones__revisor__enviar__planifiacion'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesArecomiendaPLanificacionRecomienda' name='enviarModificacionesArecomiendaPLanificacionRecomienda'>
									Enviar
								</a>
							</div>

						</div>

						</div>


					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}

		public function recomendacion__modificacion__planificacion($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'  action='modelosBd/pdf/pdf.modelo.php'  method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						

						<div class='modal-body row modal__modificaciones__revisor'>

							<select class='selector__modificacion__lineas col col-12 ancho__total__input__selects' id='selector__lineas' name='selector__lineas'></select>	
						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-8' style='font-weight:bold;'>Visualizar información</div>

							<div class='col col-4 checkeds'><input type='checkbox' id='visualizar__informacionModificaciones' name='visualizar__informacionModificaciones'/></div>

							<div class='no__visible__modificaciones' id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>				

						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-2 ver__subsecretaria__modificaciones'>Documento subsecretaría</div>
							<div class='col col-1 ver__subsecretaria__modificaciones'><a target='_blank' id='documentoSubsecretaria' name='documentoSubsecretaria'>Descargar</a></div>

							<div class='col col-2 ver__administrativo__modificaciones'>Documento administrativo</div>
							<div class='col col-1 ver__administrativo__modificaciones'><a target='_blank' id='documentoAdministrativo' name='documentoAdministrativo'>Descargar</a></div>							

							<div class='col col-2 ver__instalaciones__modificaciones'>Documento instalaciones</div>
							<div class='col col-1 ver__instalaciones__modificaciones'><a target='_blank' id='documentoInstalaciones' name='documentoInstalaciones'>Descargar</a></div>	


							<div class='col col-2 ver__infraestructura__modificaciones'>Documento infraestructura</div>
							<div class='col col-1 ver__infraestructura__modificaciones'><a target='_blank' id='documentoInfraestructura' name='documentoInfraestructura'>Descargar</a></div>	

						</div>

						<div class='ocultos__generar__pdf__planifiacion__modificaciones'>

						<div class='modal-body row'>

							<table class='col col-12'>

								<thead>

									<tr>

										<th align='center'>Actividad</th>
										<th align='center'>Monto modificado</th>
										<th align='center'>Estado modificado</th>
										<th align='center'>Comentario</th>

									</tr>

								</thead>

								<tbody class='contenedor__matriz__analista'></tbody>

							</table>

						</div>

						</div>

						<div class='ocultos__generar__pdf__planifiacion__modificaciones'>

							<div class='modal-body row'>

								<div class='col col-8' style='font-weight:bold;'>Generar pdf</div>

								<div class='col col-4 row'>

									<div class='col col-12'>

										<input type='hidden' id='tipoPdf' name='tipoPdf' value='panel__documentos__modificacion'/>
										<input type='hidden' id='tipoDocumento__D' name='tipoDocumento__D'/>
				
										<button type='submit' class='btn btn-primary' id='generarPdf' name='generarPdf'>Generar pdf</button>

									</div>

								</div>

								<div class='col col-8 mt-4' style='font-weight:bold;'>Cargar PDF</div>

								<div class='col col-4 mt-4'>

									<input type='file' id='pdfGeneradoCargar' name='pdfGeneradoCargar'/>

								</div>

							</div>

						</div>		

						<div class='modal__modificaciones__revisor__enviar__planifiacion'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesPlanificacionC' name='enviarModificacionesPlanificacionC'>
									Enviar
								</a>
							</div>

						</div>

						</div>

						<div class='modal__modificaciones__analistas__enviar__planifiacion'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesArecomiendaPLanificacionRecomienda' name='enviarModificacionesArecomiendaPLanificacionRecomienda'>
									Enviar
								</a>
							</div>

						</div>

						</div>

					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}

		public function asignacion__modificacion($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'  action='modelosBd/pdf/pdf.modelo.php'  method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						

						<div class='modal-body row modal__modificaciones__revisor'>

							<select class='selector__modificacion__lineas col col-12 ancho__total__input__selects' id='selector__lineas' name='selector__lineas'></select>	
						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-8 nombre__visualizador' style='font-weight:bold;'>Visualizar información</div>

							<div class='col col-4 checkeds'><input type='checkbox' id='visualizar__informacionModificaciones' name='visualizar__informacionModificaciones'/></div>

							<div class='no__visible__modificaciones' id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>

						</div>

						<div class='modal__body__alto__rendimiento__desarrollo__conclusiones'>

						<div class='modal-body row'>

							<table class='col col-12' style='width:100%!important;' border='1'>

								<tr>

									<td style='width:5%!important'>
										CONCLUSIONES:  
									</td>


									<td>
										<textarea id='conclusiones__desarrollo' name='conclusiones__desarrollo' style='width:100%;'></textarea>
									</td>

								</tr>

							</table>


							<table class='col col-12' style='width:100%!important;' border='1'>

								<tr>

									<td style='width:5%!important'>
										RECOMENDACIONES:  
									</td>


									<td>
										<textarea id='recomendaciones__desarrollo' name='recomendaciones__desarrollo' style='width:100%;'></textarea>
									</td>

								</tr>

							</table>

						</div>

						</div>

						<div class='modal__body__alto__rendimiento'>

						<div class='modal-body row'>


							<div class='col col-12' style='font-weight:bold;'>

								Datos de resolución 

							</div>

							<div class='col col-2'>

								Número de resolución 

							</div>

							<div class='col col-2'>

								<input type='text' id='resolucion__numero' name='resolucion__numero' style='width:100%; height:35px;'/>

							</div>

							<div class='col col-2'>

								Mes 

							</div>


							<div class='col col-2'>

								<input type='text' id='mes__resolucion' name='mes__resolucion' style='width:100%; height:35px;'/>

							</div>


							<div class='col col-2'>

								 Día

							</div>


							<div class='col col-2'>

								<input type='text' id='dia__resolucion' name='dia__resolucion' style='width:100%; height:35px;' class='solo__numero'/>
								
							</div>

							<div class='col col-12' style='font-weight:bold;'>

								Datos de Memorando (Mediante Memorando Nro. MD-DDPD-2023-0094-MEM de 05 de abril de 2023, se designó al Mgs. Rafael Salas, funcionario de la Dirección de para Personas con Discapacidad, como responsable de la Federación Ecuatoriana de Deportes para Personas con Discapacidad XXXXX/Comité Paralímpico Ecuatoriano)

							</div>

							<div class='col col-2'>

								Número de Memorando 

							</div>

							<div class='col col-2'>

								<input type='text' id='memorando__numero' name='memorando__numero' style='width:100%; height:35px;'/>

							</div>

							<div class='col col-2'>

								Mes 

							</div>


							<div class='col col-2'>

								<input type='text' id='mes__memorandum' name='mes__memorandum' style='width:100%; height:35px;'/>

							</div>


							<div class='col col-2'>

								 Día

							</div>


							<div class='col col-2'>

								<input type='text' id='dia__memorandum' name='dia__memorandum' style='width:100%; height:35px;' class='solo__numero'/>

							</div>


							<div class='col col-12' style='font-weight:bold;'>

								Datos de Memorando (Mediante memorando MD-DDCAR-2023-XXXX-MEM, de fecha xxxx de XXXX de 2023, el Director de Deporte Convencional para el Alto Rendimiento, informó a los funcionarios de las Direcciones de Deporte Convencional para el Alto Rendimiento y Dirección de Deporte para Personas con Discapacidad, la solicitud de validación y de registros emitidos por los Organismos Deportivos para modificación del POA.)

							</div>

							<div class='col col-2'>

								Número de Memorando 

							</div>

							<div class='col col-2'>

								<input type='text' id='memorando__numero__2' name='memorando__numero__2' style='width:100%; height:35px;'/>

							</div>

							<div class='col col-2'>

								Mes 

							</div>


							<div class='col col-2'>

								<input type='text' id='mes__memorandum__2' name='mes__memorandum__2' style='width:100%; height:35px;'/>

							</div>


							<div class='col col-2'>

								 Día

							</div>


							<div class='col col-2'>

								<input type='text' id='dia__memorandum__2' name='dia__memorandum__2' style='width:100%; height:35px;' class='solo__numero'/>

							</div>

							<div class='col col-12' style='font-weight:bold;'>

								JUSTIFICACIÓN TÉCNICA DE LA/LAS MODIFICACIÓN :

							</div>

							<div class='col col-12'>

								<textarea type='text' id='justificacionTecnicaModificacione' name='justificacionTecnicaModificacione' style='width:100%; height:55px;'></textarea>

							</div>


							<table class='col col-12' style='width:100%!important;' border='1'>

								<thead>

									<tr>

										<th align='center'>
											No
										</th>


										<th align='center'>
											CONDICIÓN
										</th>


										<th align='center'>
											CUMPLE 
										</th>

										<th align='center'>
											OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
										</th>

									</tr>

								</thead>

								<tbody>

									<tr>

										<td style='width:5%!important'>
											1
										</td>

										<td>
											O.D realiza modificación Caso 1.
											Modificación a la programación de las fechas en las cuales se planificó la ejecución de una actividad o componente; 
										</td>

										<td>
											<select id='select__alto__0' name='select__alto__0'>	
												<option value='cumple'>Cumple</option>
												<option value='noCumple'>No Cumple</option>
											</select>
										</td>

										<td>
											<textarea id='text__alto__0' name='text__alto__0' style='width:100%;' ></textarea>
										</td>

									</tr>


									<tr>

										<td style='width:5%!important'>
											2
										</td>


										<td>
											O.D realiza modificación Caso 2.
											Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado de las actividades 
											-Registro y validación
										</td>

										<td>
											<select id='select__alto__1' name='select__alto__1'>	
												<option value='cumple'>Cumple</option>
												<option value='noCumple'>No Cumple</option>
											</select>
										</td>

										<td>
											<textarea id='text__alto__1' name='text__alto__1' style='width:100%;' ></textarea>
										</td>

									</tr>

									<tr>

										<td style='width:5%!important'>
											3
										</td>


										<td>
											O.D realiza modificación Caso 3
											Modificación de valores asignados entre actividades,
											siempre que no se sobrepase el techo presupuestario asignado a la -Aprobación
										</td>

										<td>
											<select id='select__alto__2' name='select__alto__2'>	
												<option value='cumple'>Cumple</option>
												<option value='noCumple'>No Cumple</option>
											</select>
										</td>

										<td>
											<textarea id='text__alto__2' name='text__alto__2' style='width:100%;'></textarea>
										</td>

									</tr>

									<tr>

										<td style='width:5%!important'>
											4
										</td>


										<td>
											Presenta el Informe justificativo del gasto de los ítems de actividad 
										</td>


										<td>
											<select id='select__alto__3' name='select__alto__3'>	
												<option value='cumple'>Cumple</option>
												<option value='noCumple'>No Cumple</option>
											</select>
										</td>

										<td>
											<textarea id='text__alto__3' name='text__alto__3' style='width:100%;'></textarea>
										</td>

									</tr>

								</tbody>

							</table>

							<table class='col col-12' style='width:100%!important;' border='1'>

								<tr>

									<td style='width:5%!important'>
										OBSERVACIONES ADICIONALES:  
									</td>


									<td>
										<textarea id='observaciones__altos' name='observaciones__altos' style='width:100%;'></textarea>
									</td>

								</tr>

							</table>

						</div>

						</div>

						<div class='modal__modificaciones__revisor__enviar'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesC' name='enviarModificacionesC'>
									Enviar
								</a>
							</div>

						</div>

						</div>

						<div class='tabla__instalaciones__calificacion'>

							<div class='modal-body row'>

								<div class='col col-8'>En caso que el trámite no corresponda a la dirección favor dar click en no corresponde</div>
								<div class='col col-4'>
									<button class='btn btn-primary' id='noCorresponde' name='noCorresponde'>No corresponde</button>
								</div>

							</div>

						</div>

						<div class='tabla__administrativo__calificacion'>

							<div class='modal-body row'>

								<table class='col col-12' style='width:100%!important;' border='1'>

									<thead>

										<tr>

											<th align='center'>
												No
											</th>


											<th align='center'>
												CONDICIÓN
											</th>


											<th align='center'>
												CUMPLE 
											</th>

											<th align='center'>
												OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
											</th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td style='width:5%!important'>
												1
											</td>


											<td>
												Registra movimientos correspondientes a la actividad 001
											</td>


											<td>
												<select id='select__administrativo__0' name='select__administrativo__0'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__0' name='text__administrativo__0' style='width:100%;' ></textarea>
											</td>

										</tr>


										<tr>

											<td style='width:5%!important'>
												2
											</td>


											<td>
												Registra movimientos correspondientes al Caso 1 de modificaciones y cumple los lineamientos 
											</td>


											<td>
												<select id='select__administrativo__1' name='select__administrativo__1'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__1' name='text__administrativo__1' style='width:100%;' ></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												3
											</td>


											<td>
												Registra movimientos correspondientes al Caso 2 de modificaciones (sin inclusión de nuevos ítems y/o tareas) y cumple los lineamientos.
											</td>


											<td>
												<select id='select__administrativo__2' name='select__administrativo__2'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__2' name='text__administrativo__2' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												4
											</td>


											<td>
												Registra movimientos correspondientes al Caso 2 de modificaciones (con inclusión de nuevos ítems y/o tareas justificadamente) y cumple los lineamientos.
											</td>


											<td>
												<select id='select__administrativo__3' name='select__administrativo__3'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__3' name='text__administrativo__3' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												5
											</td>


											<td>
												Justifica movimientos para trasladar recursos sobrantes de otras actividades hacia la actividad 001  (caso 3) y cumple los lineamientos.
											</td>


											<td>
												<select id='select__administrativo__4' name='select__administrativo__4'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__4' name='text__administrativo__4' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												6
											</td>


											<td>
												Actualizada información de suministros de servicios básicos que cuentan con informe aprobado de la Coordinación General de Planificación y Gestión Estratégica.
											</td>


											<td>
												<select id='select__administrativo__5' name='select__administrativo__5'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__5' name='text__administrativo__5' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												7
											</td>


											<td>
												No registra modificaciones para adquisición para bienes de larga duración con fines administrativos. 
											</td>


											<td>
												<select id='select__administrativo__6' name='select__administrativo__6'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
												</select>
											</td>

											<td>
												<textarea id='text__administrativo__6' name='text__administrativo__6' style='width:100%;'></textarea>
											</td>

										</tr>

									</tbody>

								</table>

								<table class='col col-12' style='width:100%!important;' border='1'>

									<tr>

										<td style='width:10%!important;'>

											OBSERVACIONES ADICIONALES: 

										</td>

										<td style='width:10%!important;'>

											<textarea style='width:100%;' id='observaciones__administrativo__0' name='observaciones__administrativo__0'></textarea>

										</td>


									</tr>

								</table>

							</div>

						</div>

						<div class='tabla__instalaciones__calificacion'>

							<div class='modal-body row'>

								<div class='col col-12' style='width:100%!important; font-weight:bold;' border='1'>

									Antecedentes

								</div>

								<div class='col col-12' style='width:100%!important; font-weight:bold;' border='1'>

									<textarea style='width:100%; height:60px;' id='nombreAntecedentes__te' name='nombreAntecedentes__te'>Mediante Resolución Nro.  de  de  de , el Ministerio del Deporte emitió comunicó a , que la Planificación Operativa Anual  del gasto corriente ha sido aprobado una vez que cumplió con los lineamientos definidos para la presentación de la Planificación Operativa Anual  de las Organizaciones Deportivas. </textarea>

								</div>

								<div class='col col-12' style='width:100%!important; font-weight:bold;' border='1'>

									CONCLUSIÓN

								</div>

								<div class='col col-12' style='width:100%!important; font-weight:bold;' border='1'>

									<textarea style='width:100%; height:60px;' id='cumple__NoCumpleInfras' name='cumple__NoCumpleInfras'>De la verificación realizada a la documentación e información presentada por el organismo deportivo se verifica que CUMPLE/NO CUMPLE con los requisitos establecidos en los lineamientos correspondientes y por tanto se sugiere continuar con el trámite correspondiente desde la Dirección de Planificación.</textarea>

								</div>



								<table class='col col-12' style='width:100%!important;' border='1'>

									<thead>

										<tr>

											<th align='center'>
												No
											</th>


											<th align='center'>
												CONDICIÓN
											</th>


											<th align='center'>
												CUMPLE 
											</th>

											<th align='center'>
												OBSERVACIONES PARA LA ORGANIZACIÓN DEPORTIVA  
											</th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td style='width:5%!important'>
												1
											</td>


											<td>
												Modificación de valores asignados entre ítems presupuestarios correspondientes a una misma actividad, siempre que no sobrepase el monto total asignado de la actividad 002  -Registro y validación 
											</td>


											<td>
												<select id='select__infra__0' name='select__infra__0'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__0' name='text__infra__0' style='width:100%;' ></textarea>
											</td>

										</tr>


										<tr>

											<td style='width:5%!important'>
												2
											</td>


											<td>
												Modificación de valores asignados entre actividades, siempre que no se sobrepase el techo presupuestario asignado a la --Aprobación  
											</td>


											<td>
												<select id='select__infra__1' name='select__infra__1'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__1' name='text__infra__1' style='width:100%;' ></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												3
											</td>


											<td>
												Modificaciones que incrementen el monto total aprobado de la actividad 002:  Modificación entre actividades o, - Requerimiento adicional de recursos. 
											</td>


											<td>
												<select id='select__infra__2' name='select__infra__2'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__2' name='text__infra__2' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												4
											</td>


											<td>
												La planificación del indicador tiene coherencia con el nombre del indicador de la actividad 002 y se encuentra redactado con número entero. 
											</td>


											<td>
												<select id='select__infra__3' name='select__infra__3'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__3' name='text__infra__3' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												5
											</td>


											<td>
												Planifican únicamente intervenciones de rehabilitación, y/o mantenimiento en aquellos escenarios deportivos que sean propiedad de la organización deportiva. Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad, etc.). 
											</td>


											<td>
												<select id='select__infra__4' name='select__infra__4'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__4' name='text__infra__4' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												6
											</td>


											<td>
												Dentro de la planificación, destinan recursos para gastos de rehabilitación, y/o mantenimiento de los escenarios deportivos que son propiedad del Ministerio del Deporte, precautelando su correcto uso y funcionamiento. Anexo: Documentación de la legalidad del predio (escritura, certificado de propiedad etc.). 
											</td>


											<td>
												<select id='select__infra__5' name='select__infra__5'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__5' name='text__infra__5' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												7.1
											</td>


											<td>
												Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivo respecto a Rehabilitación incluye: 

												-Análisis de precios unitarios 

												-Presupuesto 
												-Planos y anexos gráficos (debidamente suscritos por el profesional en la rama 

												-Cronograma valorado. 

												-Especificaciones técnicas. 

												-Registro fotográfico de la intervención a subsanar. 
												-Contemplar parámetros de accesibilidad universal; según corresponda al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema eléctrico-electrónico). 

												 

												Para estudios y/o fiscalización: Certificado de no contar con técnicos afines a la contratación Justificación técnica indicando perfil profesional y experiencia requerida para la contratación; alcance de los trabajos, presupuesto estimado (Estudio de mercado), plazo. 
											</td>


											<td>
												<select id='select__infra__6' name='select__infra__6'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__6' name='text__infra__6' style='width:100%;'></textarea>
											</td>

										</tr>

										<tr>

											<td style='width:5%!important'>
												7.2
											</td>


											<td>
												Presenta el Informe justificativo del gasto para la contratación o adquisición de bienes o servicios en escenarios deportivos respecto Mantenimiento incluye: 

												-Cuadro comparativo como estudio de mercado con análisis de precios unitarios respaldado por 2 cotizaciones 
												-Registro fotográfico de la intervención a subsanar 
												-Documentación de la legalidad del predio;  

												 

												Todo lo anterior, según corresponda, al tipo de intervención aprobada en los lineamientos (fachadas exteriores, interiores, cubierta, pisos interiores, pisos exteriores, piscinas, instalaciones hidrosanitarias de las edificaciones deportivas, sistema mecánico, sistema eléctrico-electrónico)
											</td>


											<td>
												<select id='select__infra__7' name='select__infra__7'>	
													<option value='cumple'>Cumple</option>
													<option value='noCumple'>No Cumple</option>
													<option value='No aplica'>No Aplica</option>
												</select>
											</td>

											<td>
												<textarea id='text__infra__7' name='text__infra__7' style='width:100%;'></textarea>
											</td>

										</tr>


									</tbody>

								</table>

								<table class='col col-12' style='width:100%!important;' border='1'>

									<tr>

										<td style='width:10%!important;'>

											OBSERVACIONES ADICIONALES: 

										</td>

										<td style='width:10%!important;'>

											<textarea style='width:100%;' id='observaciones__0' name='observaciones__0'></textarea>

										</td>


									</tr>

								</table>

							</div>

						</div>

						<div class='modal__modificaciones__analistas__enviar'>

							<div class='modal-body row'>

								<div class='col col-8' style='font-weight:bold;'>Generar pdf</div>

								<div class='col col-4 row'>

									<div class='col col-12'>

										<input type='hidden' id='tipoPdf' name='tipoPdf' value='panel__documentos__modificacion'/>
										<input type='hidden' id='tipoDocumento__D' name='tipoDocumento__D'/>
										<input type='hidden' id='idUsuarioEn' name='idUsuarioEn'/>
				
										<button type='submit' class='btn btn-primary' id='generarPdf' name='generarPdf'>Generar pdf</button>

									</div>

								</div>

								<div class='col col-8 mt-4' style='font-weight:bold;'>Cargar PDF</div>

								<div class='col col-4 mt-4'>

									<input type='file' id='pdfGeneradoCargar' name='pdfGeneradoCargar'/>

								</div>

							</div>

						</div>						

						<div class='modal__modificaciones__analistas__enviar'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesArecomienda' name='enviarModificacionesArecomienda'>
									Enviar
								</a>
							</div>

						</div>

						</div>

					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}

		public function recomendacion__modificacion($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content formularioConfiguracion' id='formularioConfiguracion'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'></div>

							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>


						<div class='modal-body row modal__modificaciones__revisor'>

							<input type='hidden' id='idTramite' name='idTramite' />
							<input type='hidden' id='idOrganismo' name='idOrganismo' />

						</div>						

						<div class='modal-body row modal__modificaciones__revisor'>

							<select class='selector__modificacion__lineas col col-12 ancho__total__input__selects' id='selector__lineas' name='selector__lineas'></select>	
						</div>

						<div class='modal-body row modal__modificaciones__revisor'>

							<div class='col col-8' style='font-weight:bold;'>Visualizar información</div>

							<div class='col col-4 checkeds'><input type='checkbox' id='visualizar__informacionModificaciones' name='visualizar__informacionModificaciones'/></div>

							<div class='no__visible__modificaciones' id='tabla__0' name='tabla__0'>

									<table id='tabla__0__modificaciones__editar' name='tabla__0__modificaciones__editar'>
										
										<thead>

											<tr>
											
												<th class='bg-warning' rowspan='2'>N°</th>
												<th class='bg-warning' colspan='8' align='center'><center>ORÍGEN</center></th>
												<th colspan='8'><center>DESTINO</center></th>
												<th class='bg-warning' rowspan='2'>Visualizar</th>
												<th class='bg-warning' rowspan='2'>Estado</th>

											</tr>

											<tr>
											
												<th class='bg-warning' align='center'>Nombre Actividad</th>
												<th class='bg-warning'>Evento, Tarea o Intervencion o personal</th>
												<th class='bg-warning'>Infraestructura Deportiva</th>
												<th class='bg-warning'>Código</th>
												<th class='bg-warning'>Ítem</th>
												<th class='bg-warning'>Mes Programado</th>
												<th class='bg-warning'>Monto / Disminución</th>
												<th class='bg-warning'>Total Disminución</th>
												<th>Nombre Actividad</th>
												<th>Evento, Tarea o Intervencion o personal</th>
												<th>Infraestructura Deportiva</th>
												<th>Código</th>
												<th>Ítem</th>
												<th>Mes Programado</th>
												<th>Monto / Incremento</th>
												<th>Total Incremento</th>

											</tr>

										</thead>
										
									</table>

							</div>


						</div>

						<div class='modal-body row'>

							<input type='hidden' id='noCorresponde__infra__var' name='noCorresponde__infra__var' value='0'/>

							<div class='texto__no__corespponde__infra' style='font-weight:bold;'></div>

						</div>

						<div class='bloque__1__inicial'>

						<div class='modal-body row'>

							<div class='col col-8 nombre__infraestructura' style='font-weight:bold;'>Descargar pdf</div>

							<div class='col col-4 row'>

								<a target='_blank' id='descargarInformeM' name='descargarInformeM'>Descargar informe</a>

							</div>

							<div class='col col-8 mt-4 cargar__infraestructura' style='font-weight:bold;'>Cargar PDF</div>

							<div class='col col-4 mt-4'>

								<input type='file' id='pdfGeneradoCargar' name='pdfGeneradoCargar'/>

							</div>

						</div>

						</div>

						<div class='modal-body row'>

							<input type='hidden' id='noCorresponde__instalaciones__var' name='noCorresponde__instalaciones__var' value='0'/>

							<div class='texto__no__corespponde__instalaciones' style='font-weight:bold;'></div>

						</div>

						<div class='oculto__solo__instalaciones__modificaciones'>

						<div class='modal-body row'>

							<div class='col col-8' style='font-weight:bold;'>Descargar pdf instalaciones</div>

							<div class='col col-4 row'>

								<a target='_blank' id='descargarInformeM2' name='descargarInformeM2'>Descargar informe</a>

							</div>

							<div class='col col-8 mt-4' style='font-weight:bold;'>Cargar PDF instalaciones</div>

							<div class='col col-4 mt-4'>

								<input type='file' id='pdfGeneradoCargar2' name='pdfGeneradoCargar2'/>

							</div>

						</div>

						</div>

						<div class='modal__modificaciones__revisor__enviar__recomendaciones'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesCRecomienda' name='enviarModificacionesCRecomienda'>
									Enviar
								</a>
							</div>

						</div>

						</div>

						<div class='modal__modificaciones__analistas__enviar__recomendados'>

						<div class='modal-body row'>

							<div class='col col-12 d d-flex justify-content-center'>
								<a class='btn btn-primary' id='enviarModificacionesCRecomiendaCoordinaciones' name='enviarModificacionesCRecomiendaCoordinaciones'>
									Enviar
								</a>
							</div>

						</div>

						</div>

					</form>

				</div>

			</div>

			<style>
				.no__visible__modificaciones{
				     overflow:scroll!important;
				     width:100!important;
				}
				.no__visible__modificaciones table {
				    width:90%!important;
				}				
			</style>

			";

			return $modal;


		}


	}