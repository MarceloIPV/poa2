<?php

	class componentes__incrementos__v1{

		public function getModalAtributosPdfs($parametro1,$parametro2,$signo,$parametro3,$parametro4){

			$modal="

				<div class='modal fade' id='$parametro1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog' style='width:60%;'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLabel'>$parametro2 <span id='titulo__od__organismos' style='text-transform:uppercase;'></span></h5>
				      </div>
					  <form action='modelosBd/pdf/pdfIncrementosD.modelo.php' method='post'>
				      <div class='modal-body'  style='width:100%;' >
						
					    <div class='row'>

							<div class='col-md-6' >
								<div style='display:flex; justify-content:center; width:100%; height: 30px;font-size: 1.03em;'>
									<div>Poa Aprobado</div>
								</div>
								<br>
								<div style='display:flex; justify-content:center; width:100%; height: 25px;font-size: 1.03em;'>
									<div>Ingresar el $parametro3</div>
								</div>
								<br>
								<div style='display:flex; justify-content:center; width:100%; height: 30px; font-size: 1.20em; font-weight: bold;'>
									<div>Poa Aprobado $signo $parametro3</div>
								</div>
								
							</div>
							<div class='col-md-6'>
							<div style='display:flex; justify-content:center; width:100%;'>
								<input type='text' readonly id='montoTotal__Modificacion__incrementos' name='montoTotal__Modificacion__incrementos' class=' solo__numero__montos cambio__de__numero__f'/>
							</div>
							<br>
							<div style='display:flex; justify-content:center; width:100%;'>
									
								<input type='text' id='montoIngresadoModificacion__incrementos' name='montoIngresadoModificacion__incrementos' class='solo__numero__montos campos__obligatorios' value='0'/>

							</div>
							<br>
							<div style='display:flex; justify-content:center; width:100%;font-size: 1.20em; font-weight: bold;'>
								
								<input type='text' readonly id='total__Incrementos' name='total__Incrementos' class=' solo__numero__montos cambio__de__numero__f' value='0'/> 

								<input type='hidden'  id='total__Incrementos_M_' name='total__Incrementos_M_' value='0'/> 
							</div>
								
						</div>

							
							<input type='hidden' id='btnEnviarNotificacion' name='btnEnviarNotificacion' value='1'/>

							<input type='hidden' id='idUsuarioEn' name='idUsuarioEn' value='$parametro4'/>

					      	<input type='hidden' id='idOrganismo__m' name='idOrganismo__m'/>

							<input type='hidden' id='tipoInforme' name='tipoInforme' value='$parametro3' />

							<input type='hidden' id='tipoPdf' name='tipoPdf' value='informeNotificacion__Incrementos__Decrementos' />
							
				      </div>
					  <br>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-primary' id='ingrementarValoGuardar'>Guardar</button>
				      </div>
					  </form>
				    </div>
				  </div>
				</div>

			";

			return $modal;

		} 

		public function getModalAtributosPdfs__aprobar($parametro1){

			$modal="
			
			<div class='modal fade' id='$parametro1' tabindex='-1' role='dialog' aria-labelledby='miModalLabel' aria-hidden='true'>
			<div class='modal-dialog' role='document' style='min-width:80%!important;'>
			  <div class='modal-content'>
				<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'><span id='titulo__od__organismos' style='text-transform:uppercase;'></span></h5>
				  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				  </button>
				</div>
				<div class='modal-body'>
				  
					<input type='hidden' id='idOrganismo__m__n' name='idOrganismo__m__n' />

					<input type='hidden' id='tipo__organismos__m__n' name='tipo__organismos__m__n' />

				 	<input type='hidden' id='idIncrementos' name='idIncrementos' />

					 <input type='hidden' id='tipoTramite_' name='tipoTramite_' />					

					<div class='row'>
					  <div class='col-md-6 text-center'>
						<h3 class='text-center' style='font-weight: bold;'>POA Aprobado</h3>
						<button class='btn btn-secondary' id='verPoaAprobado__'>Ver</button>
						<div class='contenedor__bodyCMatriz row'></div>
						

					  </div>
					  <div class='col-md-6 text-center'>
						<h3 class='text-center' style='font-weight: bold;' id='tramiteOd' name='tramiteOd'/></h3>
						<button class='btn btn-info' id='verPoaAprobadoIncrementos__'>Ver</button>
						<div class='contenedor__bodyCMatriz2 row'></div>
						

						 <div style='font-weight:bold!important;'>Ver Tramites Incrementos</div>&nbsp;&nbsp;&nbsp;

						 <button class='btn btn-primary' data-toggle='modal' data-target='#modalverTramites' id='ver__TramitesIncrementos_G'>Ver</button>
					  </div>

					  <div class='col-md-12 text-center' style='justify-content:center;'>
					  		<div style='font-weight:bold!important;'>Subir resolución</div>&nbsp;&nbsp;&nbsp;
					  		<input type='file' id='resolucionSubidas' name='resolucionSubidas' />

					  		<br>

					  		<div style='font-weight:bold!important;'>Fecha de resolución</div>&nbsp;&nbsp;&nbsp;
					  		<input type='date' id='resolucionSubidas__fecha' name='resolucionSubidas__fecha' /></div>
					  </div>
					  
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' id='guardarResolucion__incrementos'>Guardar</button>
				</div>
			  </div>
			</div>
		  </div>
		  ";

			return $modal;
		} 

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

		public function getModalEnvioOD($parametro1,$parametro2,$parametro3){

			$modal="

				<div class='modal fade' id='$parametro1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog' style='width:60%;'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLabel'>$parametro2 $parametro3 <br><span id='titulo__od__organismos__' style='text-transform:uppercase;'></span></h5>
				      </div>
					 
				      	<div class='modal-body'  style='width:100%;' >
						
							<div class='row'>

								<div class='col-md-6' >
									<div style='display:flex; justify-content:center; width:100%; height: 30px;font-size: 1.03em;'>
										<input type='file' id='fileSubidaNotifica' name='fileSubidaNotifica'/>
									</div>
									
								</div>
								
									
							</div>

					      	<input type='hidden' id='idOrganismo__m__' name='idOrganismo__m__'/>

							<input type='hidden' id='tipoTramite' name='tipoTramite' value='$parametro3' />

							<input type='hidden' id='montoIngresadoModificacion__incrementos_N' name='montoIngresadoModificacion__incrementos_N' value='0'/>

							<input type='hidden'  id='total__Incrementos_M_N' name='total__Incrementos_M_N' value='0'/>
							
				      	</div>
					  <br>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-primary' id='envioIncrementoNotificacion'>Guardar</button>
				      </div>
					  
				    </div>
				  </div>
				</div>

			";

			return $modal;
			

		}

		public function getContenidoActividadesPoaIncrementos($parametro1,$parametro2,$parametro3){
			
			return "
				<table id='$parametro1' class='col col-12 mt-4 cell-border table'>

					<thead class='thead-dark'>

						$parametro2

					</thead>

					<tbody class='$parametro3'></tbody>
					

				</table>
			";


		}

		public function getModalMatricez__Incrementos($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>$parametro3</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row'>

							<div class='overflow__c__2 row'></div>

							<div class='overflow_c eliminar__en__etapas__b'>

								<table class='col col-12 mt-4 cell-border table table-striped tabla__matricesJ'>

									<thead class='$parametro4'>

										<tr></tr>

									</thead>

									<tbody class='$parametro5'></tbody>

									<tbody class='sueldos__salarios__editados'></tbody>

									<tbody class='mantenimientos__necesarios__1'></tbody>

									<tbody class='mantenimientos__necesarios'></tbody>

									<tbody class='mantenimientos__necesarios__2'></tbody>

								</table>

								<div class='encontrar__tablas'></div>

							</div>


						</div>

						<div class='modal-footer d d-flex justify-content-center row' style='display:flex;'>

							<form class='actividades__administrativas__contenedor' id='formulario__eventos__informacion'  method='post'>

								<table class='unico__tablas_r no__visualizacion__primaria' style='border:none!important;'>
									<tr><td align='center'><center><a style='background:#0A5B95; color:white; padding-top:.5em; padding-bottom:.5em; padding-left:1em;padding-right:1em; border-radius:4px; font-size:12px!important;' data-bs-toggle='modal' data-bs-target='#modal__editarEventos'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;EVENTOS INGRESADOS</a></center></td></tr>
								</table>

							</form>

						</div>						

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalMeses_Tramites($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){
			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:$parametro5%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title'> $parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close close' data-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						<table id='$parametro3' >

							<thead>

								<tr>

						";


				foreach ($parametro4 as $clave => $valor) {

							$modal.="<th><center>$valor</center></th>";
					
				}

				
					$modal.="

								</tr>

							</thead>

						</table>

						</div>


					</div>

					</form>

				</div>

			</div>

			";

			return $modal;
		}

		public function getModal_Tramites_Ad($parametro1,$parametro2){
			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important; height: 1200px!important;'>

					<form class='modal-content formularioConfiguracion' style='height: 600px!important;'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title'> $parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close close' data-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;height: 500px!important;'>

						<table id='ver__Tramites__incrementos__v2_L'>

						<thead>

							<tr>
	
								<th>
									<center>Actividad</center>
								</th>
								<th>
									<center>Evento</center>
								</th>
								<th>
									<center>Infraestructura</center>
								</th>
								<th>
									<center>Item</center>
								</th>
								<th>
									<center>Trámite</center>
								</th>
								<th>
									<center>Justificación</center>
								</th>
								<th>
									<center>Documento</center>
								</th>
								<th>
									<center>Estado</center>
								</th>
								<th>
									<center>Valores</center>
								</th>
								<th>
									<center>Aprobar</center>
								</th>
								<th>
									<center>Observación</center>
								</th>
								
							</tr>
	
							</thead>

						</table>

						</div>


					</div>

					</form>

				</div>

			</div>

			";

			return $modal;
		}


		public function getModalAtributosAprobacion($parametro1){

			$modal="

				<div class='modal fade' id='$parametro1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog' style='min-width:100%!important;'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLabel'>$parametro2 <span id='titulo__od__organismos' style='text-transform:uppercase;'></span></h5>
				      </div>

				      <div class='modal-body row' style='width:100%;display:flex; justify-content:center; align-items:center;'>
					  
					  	<div class='col-md-6' style='width:100%;display:flex; flex-direction:column; justify-content:center; align-items:center;'><div class='contenedor__bodyCMatriz row'></div></div>

						<div class='col-md-6' style='width:100%;display:flex; flex-direction:column; justify-content:center; align-items:center;'><div class='contenedor__bodyCMatriz2 row'></div></div>
					 
					 
					  </div>

				      <div class='modal-body' style='width:100%;' >

					      <div style='display:flex; justify-content:center; flex-direction:column; width:100%;'>


					      	<input type='hidden' id='idOrganismo__m__n' name='idOrganismo__m__n' />

					      	<input type='hidden' id='tipo__organismos__m__n' name='tipo__organismos__m__n' />

					      	<input type='hidden' id='idIncrementos' name='idIncrementos' />

							<div style='font-weight:bold!important;'>Ver Tramites Incrementos</div>&nbsp;&nbsp;&nbsp;
							<button class='btn btn-primary' data-toggle='modal' data-target='#modalverTramites' id='ver__TramitesIncrementos_G'>Ver</button>

					      	<div style='font-weight:bold!important;'>Subir resolución</div>&nbsp;&nbsp;&nbsp;
					      	<input type='file' id='resolucionSubidas' name='resolucionSubidas'/>

					      	<br>

					      	<div style='font-weight:bold!important;'>Fecha de resolución</div>&nbsp;&nbsp;&nbsp;
					      	<input type='date' id='resolucionSubidas__fecha' name='resolucionSubidas__fecha' />


					      </div>
		
				      </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-primary' id='guardarResolucion__incrementos'>Guardar</button>
				      </div>
				    </div>
				  </div>
				</div>

			";

			return $modal;

		} 

		public function get__eventos__ingresados__incrementos($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Eventos ingresados</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<div class='overflow_c' style='width:100%!important;'>

								<table id='tabla__eventos__ingresados' style='width:100%!important;'>

									<thead>

										<tr>

											<th align='center' style='width:50%!important;'>Evento</th>
											<th align='center' style='width:50%!important;'>Información básica</th>
											<th align='center' style='width:50%!important;'>Items relacionados</th>
	
										</tr>

									</thead>

								</table>

							</div>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}

		//Modal para eventos 
		public function crear__Eventos__Incrementos($parametro1){


			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:90%!important;'>

					<form class='modal-content'>

						<div class='modal-header row'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title'>Eventos ingresados</h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros modales__reload' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					        </div>

						</div>

						<div class='modal-body row d d-flex justify-content-center'>

							<table class=''><tr><td colspan='4' style='color: rgb(10, 91, 149); font-weight:bold; font-size:12px!important;'><center>INFORMACIÓN GENERAL DEL EVENTO</center></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Evento</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  proyecto' name='proyecto' id='proyecto'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Tipo de financiamiento</td><td><select class='ancho__total__input obligatorio__evento__escenciales  tipoFinanciamiento' name='tipoFinanciamiento' id='tipoFinanciamiento'><option value=''>--Escoger tipo de financiamiento--</option><option value='corriente'>Corriente</option><option value='autogestion'>Autogestión</option></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Deporte</td><td><select class='ancho__total__input obligatorio__evento__escenciales  deporte' name='deporte' id='deporte'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Provincia</td><td><select  class='ancho__total__input obligatorio__evento__escenciales  provinciaE' name='provincia' id='provincia'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>País</td><td><select class='ancho__total__input obligatorio__evento__escenciales  ciudadPais' name='pais' id='pais'></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Alcance</td><td><select class='ancho__total__input obligatorio__evento__escenciales  alcanceE' name='alcanse' id='alcanse'></select></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Inicio</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__inicio' name='fecha__inicio' id='fecha__inicio'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Fecha Fin</td><td><input type='date' class='ancho__total__input obligatorio__evento__escenciales  fecha__fin' name='fecha__fin' id='fecha__fin'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Género</td><td><select class='ancho__total__input obligatorio__evento__escenciales  genero' name='genero' id='genero'><option value=''>--Escoger gégnero--</option><option value='masculino'>Masculino</option><option value='femenino'>Femenino</option><option value='ambas'>ambas</option></select></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Categoría</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  categoria' name='categoria' id='categoria'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de entrenadores</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__entrenadores' name='numero__entrenadores' id='numero__entrenadores' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Número de atletas</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  entre__sumas solo__numeros numero__atletas' name='numero__atletas' id='numero__atletas' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Total</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros total' name='total' id='total' value='0' disabled=''/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Mujeres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros mujeresBeneficiarios' name='mujeresBeneficiarios' id='mujeresBeneficiarios' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Hombres (Beneficiarios)</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros hombresBeneficiarios' name='hombresBeneficiarios' id='hombresBeneficiarios' value='0'/></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Cantidad del bien o servicio a adquirir</td><td><input type='text' class='ancho__total__input obligatorio__evento__escenciales  solo__numeros cantidadBienAquirir' name='cantidadBienAquirir' id='cantidadBienAquirir' value='0'/></td></tr><tr><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Detalle lo que el organismo va a adquirir</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  detalleOrganismoAd' name='detalleOrganismoAd' id='detalleOrganismoAd'></textarea></td><td style='text-align:right; vertical-align:middle; font-size:12px!important; color:#5A5A5A;'>Justificación de la adquisición del bien o servicio</td><td><textarea  class='ancho__total__input obligatorio__evento__escenciales  justificacionAdquisBien' name='justificacionAdquisBien' id='justificacionAdquisBien'></textarea></td></tr></table>

						</div>
				
					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function generacionCertificado_no_Recurso(){
			$modal="
				<form action='modelosBd/pdf/pdfIncrementosD.modelo.php' method='post'>
				<div class='modal-body'  style='width:100%;' >
						
					<input type='hidden' id='tipoPdf' name='tipoPdf' value='Certificado__No__Recurso'/>
	
					
					
				</div>
				<br>
				<div class='modal-footer'>
				<button type='button' class='btn btn-primary' id='ingrementarValoGuardar'>Guardar</button>
				</div>
				</form>
				
				";
	
				return $modal;
		}

		public function get__modal__plantilla__inicios__incrementos($parametro1,$parametro3,$titulo){

			$modal="

			<div class='modal fade' id='$parametro1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static' data-keyboard='false'>

				<div class='modal-dialog'  role='document'  style='max-width:90%!important;'>

					<form class='modal-content formulario__Analistas__Incrementos' action='modelosBd/pdf/pdfIncrementosD.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-1'>

							</div>

							<div class='col col-6 text-center titulos_modal' style='font-weight: bold!important;font-size: 1.3em!important;'>

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1 text-right'>

					          <span class='button pointer__botones modales__reload' data-bs-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								 <span class='siglas__dinamicas' style='font-weight:bold;'>$titulo</span>

							</div>

							

						</div>

						<div class='modal-body row $parametro3'>

						<div class='col col-12 text-center contenedorPoa' style='color:black;padding-top:1.5em;padding-bottom:1.5em;font-weight:bold;'>

							<button class='btn btn-primary poaAprobadoAbrir' data-toggle='modal' data-target='#modalValoresPoa'>Poa Aprobado</button>

						</div>

						<div class='col col-12 tex-center'><center><input type='checkbox' id='verTablaIncrementos' name='verTablaIncrementos'/>Ver Tramites Incrementos</center></div>

						<div class='col col-12 tex-center' id='contenedorTablaTramitesIncrementos'><table id='tramites_Incrementos_Analistas' class='col col-12' style='width: 100%;'><thead><tr><th align='center' rowspan='2'>Actividad</th><th align='center' rowspan='2'>Evento</th><th align='center' rowspan='2'>Infraestructura</th><th align='center' rowspan='2'>Item</th><th align='center' rowspan='2'>Trámite</th><th align='center' rowspan='2'>Meses de Cambio</th><th align='center' rowspan='2'>Monto<br>Incremento<br>por<br>Actividad</th><th align='center' rowspan='2'>Justificacion</th><th align='center' rowspan='2'>Documento</th><th align='center' colspan='2' rowspan='1'>POA</th></tr><tr><th align='center'>Aprobado</th><th align='center'>Incrementos</th></tr></thead></table></div>

						<div class='row justify-content-center' id='contenedorReasignaciones'></div>

					
						<div class='col col-12 contenedorArchivos'></div>

						<div class='row' id='contenedorCalificacion'>
							
							<input type='hidden' id='tipoPdf2' name='tipoPdf2'/>

							<input type='hidden' id='registro' name='registro' value='1'/>
					
							<input type='hidden' id='idOrganismo__m2' name='idOrganismo__m2'/>

							<input type='hidden' id='fisicamenteEn' name='fisicamenteEn'/>

							<input type='hidden' id='idUsuario' name='idUsuario'/>

							<input type='hidden' id='idRol' name='idRol'/>

							<input type='hidden' id='informeVTipo' name='informeVTipo'/>
						
						</div>
						
						<br>

						<div class='d-flex justify-content-center align-items-center'>

							<a class='btn btn-info ocultos_incrementos' id='calificarInforme'><i class='fa fa-file-signature' aria-hidden='true'></i>&nbsp;&nbsp; Calificar</a>

						</div>


						<div class='col col-12 text-center ocultos_incrementosOb mt-2'>

							<p style='font-size:1.2em!important;'>Se generará Informe de <strong><span id='tipoInformeArea'></span></strong></p>

						</div>

						

						<div class='col col-2 ocultos_incrementosO' style='font-weight:bold;'>

                  			Observaciones Adicionales:

                		</div>
    
						<div class='col col-10 ocultos_incrementosO'>
		
							<textarea id='observacionesFuncionario' name='observacionesFuncionario' class='ancho__total__textareas form-control'></textarea>
		
						</div>

						<div class='d-flex justify-content-center align-items-center'>

							<a class='btn btn-warning ocultos_incrementosO' id='enviarObservaciones'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Enviar Observaciones</a>

						</div>

						<div class='col col-2 ocultos_incrementosOb' style='font-weight:bold;'>

                  			Observaciones Adicionales:

                		</div>
    
						<div class='col col-10 ocultos_incrementosOb'>
		
							<textarea id='observacionesReasignaciones' name='observacionesReasignaciones' class='ancho__total__textareas form-control' ></textarea>
		
						</div>

						<div class='col col-2 ocultos_incrementosOb' style='font-weight:bold;'>

                  			Conclusiones:

                		</div>
    
						<div class='col col-10 ocultos_incrementosOb' id='contenedorConclusiones'>
			
							<textarea id='conclusionesReasignaciones' name='conclusionesReasignaciones' class='ancho__total__textareas form-control' required></textarea>
			
						</div>

						<br>

						<div class='ocultos_incrementosOb'>
							<div class='col col-12 text-center'><a class='btn btn-warning' id='verReportes' href='seguimientoRe' target='_blank'><i class='fa fa-file-signature' aria-hidden='true'></i>&nbsp;&nbsp; Reportes-Seguimiento</a></div>
						</div>

						<div class='ocultos_incrementosOb'>
							<div class='col col-12' style='font-size:1em!important;font-weight: bold;'>Cumplimiento de Requisitos:</div>
							<div class='row align-items-center' id='contenedorRequisitos'>
								
							</div>
						</div>

						<div class='col col-6 d-flex justify-content-center align-items-center'>
							<button class='btn btn-warning ocultos_incrementosOb' id='enviarObservaciones' type='submit'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar Pdf</button>
						</div>

						<div class='col col-3 d-flex justify-content-end align-items-center'>
							<label style='font-weight:bold' class='ocultos_incrementosOb' id='labelInforme'>Subir Informe Firmado:</label>
						</div>
						<div class='col col-3 d-flex justify-content-center align-items-center'>

								<input type='file' id='informeAnalista' name='informeAnalista' class='ocultos_incrementosOb verificaPdf'/>

						</div>


						<div class='d-flex justify-content-center align-items-center'>

								<a class='btn btn-success ocultos_incrementosOb' id='enviarInformeAnalistas'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Enviar Informe</a>

						</div>

						<div class='d-flex justify-content-center align-items-center contenedorSelectorObservacion' style='display:none;'></div>

						<div class='d-flex justify-content-center align-items-center contenedorObservaDirector'>


						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	

		public function valores_Poa_Incrementos_Contenedor($parametro1,$parametro3,$titulo){

			$modal="

			<div class='modal fade' id='$parametro1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static' data-keyboard='false'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-1'>

							</div>

							<div class='col col-6 text-center titulos_modal' style='font-weight: bold!important;font-size: 1.3em!important;'>

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1 text-right'>

								<button type='button' class='close modales__reload' data-dismiss='modal' aria-label='Close'>
									<i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i>
						  		</button>


					        </div>
							
						</div>

						<div class='modal-body row $parametro3'>
							<div class='col col-12 contenedor__poaMatrizA'>
							
							</div>
						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalMatricesPoa($parametro1,$parametro2){

			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content $parametro2'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

					        <div class='col col-11 text-center'>

					          <h5 class='modal-title titulo__mS'></h5>

					        </div>

					        <div class='col col-1'>

					          <button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></button>

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

		public function modal_Planificacion_Resolucion($parametro1,$parametro3,$titulo){

			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:80%!important;'>

					<form class='modal-content'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-1'>

							</div>

							<div class='col col-6 text-center titulos_modal' style='font-weight: bold!important;font-size: 1.3em!important;'>

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1 text-right'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								 <span class='siglas__dinamicas' style='font-weight:bold;'>$titulo</span>

							</div>
							
						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-12 text-center' >
								<a class='btn btn-primary botonVerInformes'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;Ver Informes</a>
							</div>

							<div class='col col-12 contenedorArchivos elementosCreados__I'>

							</div>

							<div class='row justify-content-md-center mt-2'>
								
								<div class='fila__incrementos__regresar col col-md-3' style='font-weight:bold;'>

									Regresar a

								</div>

								<div class='fila__incrementos__regresar col col-md-auto'>

									<select class='ancho__total__input__selects' id='selects__superiores__regresar'></select>

								</div>

								<div class='fila__incrementos__regresar col col-md-3 text-center'>

									<a class='btn btn-warning' id='regresarIncremento__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

								</div>
							</div>


							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-2' style='font-weight:bold;'>

									Ingresar número de Resolución

								</div>

								<div class='fila__incrementos__devolver col col-6'>

									<input type='text' class='form-control' name='resolucionIncrementoP' id='resolucionIncrementoP'/>

								</div>

							</div>


							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-2' style='font-weight:bold;'>

									Techo actualizado notificado sin incluir descuentos

								</div>

								<div class='fila__incrementos__devolver col col-6'>

									<input type='text' class='form-control solo__numero cambio__de__numero__f' name='valorTechoIncremento' id='valorTechoIncremento'/>

								</div>
							
							</div>
							

							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-4' style='font-weight:bold;'>

									Fecha de Aprobación de la Resolución POA-INCREMENTOS (Fecha del 	quipux de la resolución)

								</div>

								<div class='fila__incrementos__devolver col col-4'>

									<input type='date' class='form-control' name='fechaIncrementoQuipux' id='fechaIncrementoQuipux'/>

								</div>
							
							</div>
							

							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-4' style='font-weight:bold;'>

									Subir documento

								</div>

								<div class='fila__incrementos__devolver col col-4'>

									<input type='file' class='form-control' name='archivoResolucionP' id='archivoResolucionP' />

								</div>
							
							</div>


							<div class='row justify-content-md-center mt-4'>

								<div class='fila__incrementos__devolver col col-4 text-center'>

									<a class='btn btn-primary botonAprobarIn'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;Aprobar</a>

								</div>

								<div class='fila__incrementos__devolver col col-4 text-center'>

									<a class='btn btn-danger botonNegarIn'><i class='fa fa-times-circle' aria-hidden='true' style='font-size:18px!important;'></i>&nbsp;&nbsp;Negar</a>

								</div>
							
							</div>
							

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function modal_Instalaciones_Deportivas($parametro1,$parametro2){
			$modal="
			<div  class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

			<div class='modal-dialog modal-xl'>
				
		
					<form class='modal-content formularioConfiguracion formularioInformeObraInfra' action='modelosBd/pdf/pdfIncrementosD.modelo.php' method='post' needs-validation' novalidate>
		
								<input type='hidden' name='beneficiariosDirectos' id='beneficiariosDirectos'/>
								<input type='hidden' name='beneficiariosAdaptado' id='beneficiariosAdaptado'/>
								<input type='hidden' name='beneficiariosIndirectos' id='beneficiariosIndirectos'/>
		
								<input type='hidden' id='tipoPdf' name='tipoPdf' value='Informe__instalaciones__Incremento' />
								
								<input type='hidden' id='idOrganismo__m' name='idOrganismo__m'/>
								
		
								<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>
		
									<div class='col col-2 text-right'>
		
										<image src='images/titulo__ministerio__deporte.png'/>
		
									</div>
									
		
									<div class='col col-7 text-center textos__titulos  row'> 
										<span name='tituloInforme'>
											INFORME JUSTIFICATIVO DE INSTALACIONES DEPORTIVAS 
										</span>
									</div>
		
		
									<div class='col col-2 text-left'>
		
										<image src='images/titulo__principis__ministerios.png'/>
		
									</div>
		
									<div class='col col-1 text-right'>

									<span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>
	  
								  </div>
		
								</div>
		
								<div class='modal-body row $parametro2'>
		
									
									<div class='row '>
		
		
											<div class='col col-12 row d-flex mt-4'>
		
												<div class='col col-12 row'>
		
													<div class='col col-12 text-left textos__titulos'>
		
														1. DATOS GENERALES DEL OBJETO DEL FINANCIAMENTO
		
													</div>
		
													<div class='col col-6 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;1.1 NOMBRE DEL OBJETO DE FINANCIAMIENTO:
		
													</div>
		
		
													<div class='col col-6 mt-2'><textarea class='form-control' id='objetoFinanciamiento' name='objetoFinanciamiento' style='width:100%;' required></textarea></div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;1.2 INFORMACIÓN GENERAL DEL ORGANISMO DEPORTIVO/ ENTIDAD BENEFICIARIA:
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;1.2.1 Datos del organismo deportivo/entidad solicitante:
		
													</div>
		
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;NOMBRE DE LA ORGANIZACIÓN:
		
													</div>
		
													<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />
		
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;RUC DE LA ORGANIZACIÓN:
		
													</div>
		
													<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;NÚMERO Y FECHA DE ACUERDO MINISTERIAL/ O DELEGACIÓN/ O NOMBRAMIENTO DEL CARGO/ETC:
		
													</div>
		
													<div class='acuerdo__ministerial__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='acuerdo__ministerial__organizacion__deportivas' name='acuerdo__ministerial__organizacion__deportivas' />
		
													
												</div>
		
											</div>
		
											<div class='col col-12 row d-flex mt-4'>
												<div class='col col-7 row'>
													<div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;1.2.2 DATOS DEL REPRESENTANTE LEGAL DE LA ENTIDAD SOLICITANTE.
		
													</div>
		
													
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;NOMBRES Y APELLIDOS:
		
													</div>
		
													<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;DIRECCIÓN COMPLETA:
		
													</div>
		
													<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:
		
													</div>
		
													<div class='correo__organizacion__deportivas col col-6 mt-2'></div>
		
													<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;TELÉFONO CELULAR:
		
													</div>
		
													<div class='col col-6 mt-2'><input class='form-control' type='tel' name='telCelInfra' id='telCelInfra'  maxlength='10' oninput='this.value = this.value.replace(/[^0-9]/g, '')' placeholder='xxx-xxx-xxxx' required ></div>
		
													
		
													<div class='col col-6 mt-2' style='font-weight:bold;'>
		
														&nbsp;&nbsp;TELÉFONO CONVENCIONAL:
		
													</div>
		
													<div class='col col-6 mt-2'><input class='form-control' type='tel' name='telConInfra' id='telConInfra'  maxlength='9' oninput='this.value = this.value.replace(/[^0-9]/g, '')' placeholder='xxx-xxx-xxx' required title='Por favor Introduzca Un Teléfono'></div>
												</div>
		
												
		
											</div>
		
		
											<div class='col col-12 row d-flex mt-4'>
												<div class='col col-7 row'>
													<div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>
		
													&nbsp;1.3 PROPUESTA DE FINANCIAMIENTO E INVERSIÓN
		
													</div>
												</div>
		
												<br>

												<p style='font-weight:bold;!important;margin-top:.5em!important;'>Especificar el desglose de la inversión total del objeto de financiamiento en dólares americano</p>

												<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>
		
														<tr >
		
															<th >
		
																<center>INSTITUCIÓN</center>
		
															</th>
		
															<th >
		
																<center>APORTE USD $</center>
		
															</th>
										

															<th>
		
																<center>PORCENTAJE %</center>
		
															</th>
														</tr>
		
														<tr>
		
		
															<td>
																<center>
																<p style='font-weight:bold;!important;'>Ministerio del Deporte</p>
																</center>
															</td>


															<td>
																<center>
																<input type='text' id='ministerioAporte' name='ministerioAporte' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='valorFiscalizacion' required />
																</center>
															</td>


															<td>
																<center>
																<input type='text' id='ministerioPorcentaje' name='ministerioPorcentaje' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='valorFiscalizacion' required />
																</center>
															</td>
		
															
														</tr>
		
															
														<tr>
														
															<td>
																<center>
																<p style='font-weight:bold;!important;'>Ministerio del Deporte 5x1000 Contraloría General del Estado</p>
																</center>
															</td>
		
															
															<td>
																<center>
																<input type='text' id='contraloria' name='contraloria' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='valorFiscalizacion' required />
																</center>
															</td>

															<td>
																<center>
																<input type='text' id='contraloriaPorcentaje' name='contraloriaPorcentaje' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='valorFiscalizacion' required />
																</center>
															</td>
		
															
														</tr>
		
														<tr>
														
															<td>
		
																<center>
																	<p style='font-weight:bold;!important;'>Autogestion Organismo Deportivo</p>
																</center>
		
															</td>
		
															
															<td>
																<center>
																<input type='text' id='autogestion' name='autogestion' readonly class='form-control solo__numero cambio__de__numero__f' name='totalValores' />
																</center>
															</td>
															
														</tr>
		
												</table>
		
													
											</div>	
		
											<div class='col col-12 row'>
												
												<div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>
		
												&nbsp;1.4 FECHA DE EJECUCIÓN 
		
												</div>
		
												<br>
		
												<div class='col col-3' style='font-weight:bold;'>
		
													Fecha Inicio:
		
												</div>
		
												<div class='col col-3' >
		
												<input id='fechaInicioInfra' name='fechaInicioInfra' class='form-control' type='date' required/>
		
												
												</div>
		
												<div class='col col-3' style='font-weight:bold;'>
		
													Fecha de Término:
		
												</div>
		
												<div class='col col-3'>
		
												<input id='fechaFinInfra' name='fechaFinInfra' class='form-control' type='date' required/>
		
												</div>
		
											</div>
		
											<div class='col col-12 row d-flex mt-4'>
												<div class='col col-7 row'>
													<div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>
		
													&nbsp;1.5 COBERTURA Y LOCALIZACIÓN
		
													</div>
												</div>
		
												<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>
		
														
														<tr>
		
		
															<th>
		
																<center>PAÍS</center>
		
															</th>
		
															<td>
																<center>
																<select id='selector__paises'  name='selector__paises' class='form-control ancho__totalText campos__obligatorios selector__paises' required></select>
																</center>
															</td>
		
															
														</tr>
		
															
														<tr>
														
															<th>
		
																<center>PROVINCIA</center>
		
															</th>
		
															
															<td>
																<center>
																<select id='provincia__Datos' name='provincia__Datos' class=' form-control ancho__totalText campos__obligatorios' required></select>
																</center>
															</td>
		
															
														</tr>
		
														<tr>
														
															<th>
		
																<center>CANTÓN</center>
		
															</th>
		
															
															<td>
																<center>
																<select id='canton__Datos' name='canton__Datos' class='form-control ancho__totalText campos__obligatorios' required></select>
																</center>
															</td>
		
															
														</tr>
		
														<tr>
														
														<th>
		
															<center>PARROQUIA / COMUNIDAD</center>
		
														</th>
		
														
														<td>
															<center>
															<select id='parroquia__Datos' name='parroquia__Datos' class='form-control ancho__totalText campos__obligatorios' required></select>
															</center>
														</td>
		
														
													</tr>
		
													<tr>
														
														<th>
		
															<center>UBICACIÓN ESPECÍFICA (Nombre del coliseo, estadio, otros, si aplica)</center>
		
														</th>
		
														
														<td>
															<center>
															<input  type='text' id='ubicacionEspecifica'  class='form-control ancho__totalText' name='ubicacionEspecifica' required/>
															</center>
														</td>
		
														
													</tr>
		
													
		
												</table>
		
													
											</div>	
		
											<div class='col col-12 row d-flex mt-4'>
		
												<div class='col col-12 row'>
		
													<div class='col col-12 text-left textos__titulos'>
		
														2. CARACTERIZACIÓN DEL OBJETO DE FINANCIAMIENTO
		
													</div>
		
													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.1 ANÁLISIS DE LA SITUACIÓN ACTUAL (DIAGNÓSTICO)
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea class='form-control' name='analisisSituacion' id='analisisSituacion' style='width:100%;' required></textarea></div>
		
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.2 ARTICULACIÓN NORMATIVA
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.3 JUSTIFICACIÓN
		
													</div>
		
													<div class=' col col-6 mt-2'><textarea class='form-control' name='justificacion' id='justificacion' style='width:100%;' required></textarea></div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.4 OBJETIVO GENERAL Y OBJETIVOS ESPECÍFICOS
		
													</div>
		
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;2.4.1 Objetivo general o propósito
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea class='form-control' name='objetivoGeneral' id='objetivoGeneral' style='width:100%;' required></textarea></div>
		
													 <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;2.4.2 Objetivos Específicos
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='objetivosEspecificos' id='objetivosEspecificos' style='width:100%;' class='form-control' required></textarea></div>
		
		
													 <div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.5 META DEL OBJETO DE FINANCIAMIENTO
		
													</div>
		
													<div class=' col col-6 mt-2'><textarea name='metaObjeto' id='metaObjeto' style='width:100%;' class='form-control' required></textarea></div>
		
											<div class='col col-12 row d-flex mt-4'>
												
												<table>
		
													<thead>
		
														<tr>
		
															<th colspan='13'>
		
																<center>Matriz de Destino(RECURSOS)</center>
		
															</th>
		
														</tr>
		
														<tr>
		
																<th colspan='1' >
		
																	<center>N°</center>
		
																</th>
		
																<th colspan='3'>
		
																<center>Programa</center>
		
																</th>
		
																<th colspan='3'>
		
																<center>Nombre de la Actividad</center>
		
																</th>
		
																<th colspan='1'>
		
																<center>Código<br>Ítem<br>Presupuestrario</center>
		
																</th>
																<th colspan='3'>
		
																<center>Nombre<br>Del<br>Ítem<br>Presupuestario</center>
		
																</th>

																<th colspan='1'>
		
																<center>Programación<br>Financiera</center>
		
																</th>

																<th colspan='1'>
		
																<center>Total<br>Programado</center>
		
																</th>
		
														</tr>
			
													</thead>
		
													<tbody class='cuerpo__tabla__Instalaciones'>
													</tbody>

													<tfoot >
    													<tr>
      														<th colspan='12' align='center'>TOTAL INCREMENTO SIN INCLUIR EL 5X1000</td>
      														<th colspan='1' align='center' class='pie__tabla__Instalaciones'></td>
    													</tr>
  													</tfoot>
		
												</table>
											</div>	

											<div class='col col-12 row d-flex mt-4'>
												
												<table style='width:100%!important;'>
		
													<thead>
		
														<tr>
		
															<th colspan='8'>
		
																<center>Matriz de Destino Indicadores</center>
		
															</th>
		
														</tr>
		
														<tr>
		
																<th>
		
																	<center>N°</center>
		
																</th>
		
																<th>
																<center>Programa</center>
		
																</th>
		
																<th>
		
																<center>Nombre de la Actividad</center>
		
																</th>
		
																<th>
		
																<center>Indicador</center>
		
																</th>
																<th>
		
																<center>Programación<br>Mensual<br>Metas</center>
		
																</th>

																<th>
		
																<center>Meta Anual <br>del Indicador</center>
		
																</th>

																<th colspan='2'>
		
																<center>Benficiarios</center>
		
																</th>
		
														</tr>

														<tr>
															<th colspan='6'></th>
															<th colspan='1'>
																<center>Masculino</center>
															</th>
															<th colspan='1'>
																<center>Femenino</center>
															</th>
														</tr>
		
													</thead>
		
													<tbody class='cuerpo__Instalaciones__Indicadores'>
													</tbody>

												</table>
											</div>	
		
													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;2.6	IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;2.6.1 Beneficiarios Directos
		
													</div>
		
													<div class=' col col-12 mt-2' style='text-align: justify;'>Son las personas que se benefician directamente de la ejecución del objeto de financiamiento. Ejemplo: deportistas, estudiantes.</div>
		
												</div>
		
											</div>
		
											<table class='' id='tablaNombresBeneficiarios'>
    
												<thead>

													<tr>
														<th colspan='5' align='center'>
															<button type='button' class='btn btn-warning' id='agregarNombreBeneficiarios' >Agregar</button>
														</th>
													</tr>
										
													<tr>
														<th
														style='width:25%!important'><center>Apellidos y Nombres</center></th>
														<th  style='width:20%!important'><center>N°. Cédula de ciudadanía/pasaporte</center></th>
														<th style='width:25%!important'><center>Cargo</center></th>
														<th style='width:25%!important'><center>Tipo Cargo</center></th>
														<th style='width:5%!important'><center></center></th>
														
										
													</tr>
										
												</thead>
    
												<tbody>
												</tbody>
    
            								</table>
		
											<div class='col col-12 row d-flex mt-4'>
												
												<table id='tablaRangosBeneficiarios'>
		
													<thead>
		
														<tr>
		
															<th colspan='14'>
		
																<center><a class='btn btn-warning' id='agregar__beneficiarios'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>
		
															</th>
		
														</tr>
		
														<tr>
		
																<th colspan='2' style='background-color: #7d818c;'>
		
																<center>RANGO</center>
		
																</th>
		
																<th colspan='2' style='background-color: #85AFA1;'>
		
																<center>SEXO</center>
		
																</th>
		
																<th colspan='5' style='background-color: #8D85AF;'>
		
																<center>ETNIA</center>
		
																</th>
																<th colspan='1'>
		
																<center>TOTAL</center>
		
																</th>
																<th style='width:5%!important'><center></center></th>
		
														</tr>
		
		
														<tr>
			
															<th style='background-color: #7d818c;'>
																<center>DESDE</center>
															</th>
		
		
															<th style='background-color: #7d818c;'>
																<center>HASTA</center>
															</th>
		
		
															<th style='background-color: #85AFA1;'>
																<center>MASCULINO</center>
															</th>
		
															<th style='background-color: #85AFA1;'>
																<center>FEMENINO</center>
															</th>
		
															<th style='background-color: #8D85AF;'>
																<center>MESTIZO</center>
															</th>
		
															<th style='background-color: #8D85AF;'>
																<center>MONTUBIO</center>
															</th>
		
															<th style='background-color: #8D85AF;'>
																<center>INDIGENA</center>
															</th>
		
															<th style='background-color: #8D85AF;'>
																<center>BLANCO</center>
															</th>
		
															<th style='background-color: #8D85AF;'>
																<center>AFRO</center>
															</th>
		
															<th>
																<center>BENEFICIARIOS</center>
															</th>
															<th style='width:5%!important'><center></center></th>
		
														</tr>
		
													</thead>
		
													<tbody>
													</tbody>
		
												</table>
											</div>	
		
											<div class='col col-12 row d-flex mt-4'>
		
												<div class='col col-12 row'>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;2.6.2 Beneficiarios Indirectos
		
													</div>
		
													<div class=' col col-12 mt-2' style='text-align: justify;'>Son aquellas personas que se benefician de forma indirecta con el desarrollo del objeto de financiamiento. Ejemplo: delegados y/o población que se ubican en zonas de influencia del objeto de financiamiento</div>
		
												</div>
		
											</div>
		
											<div class='col col-12 row' style='margin-top:1em;' >
												
												<table id='tablaBeneficiariosIndirectos'>
		
													<thead>
		
														<tr>
		
															<th colspan='4'>
		
																<center><a class='btn btn-warning' id='agregar__beneficiariosIndirectos'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>
		
															</th>
		
														</tr>
		
														<tr>
		
																<th>
		
																	<center>BENEFICIARIOS INDIRECTOS</center>
		
																</th>
		
																<th >
		
																	<center>TOTAL</center>
		
																</th>
		
																<th >
		
																	<center>JUSTIFICACIÓN CUANTITATIVA</center>
		
																</th>

																<th style='width:5%!important'><center></center></th>
		
														</tr>
		
													</thead>
		
													<tbody>
													</tbody>
		
												</table>
											</div>	
		
											<div class='col col-12 row d-flex mt-4'>
		
												<div class='col col-12 row'>
		
													<div class='col col-12 text-left textos__titulos'>
		
														3. OBJETO DE FINANCIAMIENTO
													</div>
		
													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.1 ASPECTO JURÍDICO 
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.1.1 Escenario deportivo (Nombre del escenario deportivo que realizará la intervención) 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='nombreInfra' id='nombreInfra' style='width:100%;' class='form-control' required ></textarea></div>
		
													 <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.1.2 Situación Legal del escenario deportivo (Requisito Obligatorio) 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='situacionLegal' id='situacionLegal' style='width:100%;' class='form-control'></textarea></div>


													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.1.3 Aprobación Municipal de planos y permiso de construcción (Requisito Condicionado) 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='aprobacionMunicipal' id='aprobacionMunicipal' style='width:100%;' class='form-control'></textarea></div>
		
		
													 <div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.2 ESPECIFICACIONES TECNICAS
		
													</div>


													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.2.1 Tipo de gasto: Seleccionar el tipo de gasto:
		
													</div>
		
		
													<select name='selectTipoGasto' id='selectTipoGasto' class='form-control col col-6 mt-2'>
                          								<option value=''>--Seleccione--</option>
                          								<option value='mantenimiento'>Gasto por mantenimiento</option>
                          								<option value='rehabilitacion'>Gasto de rehabilitación</option>
                          								
                        							</select>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.2.2 Tipo de Intervención del gasto: 
		
													</div>

													<div class=' col col-6 mt-2'><textarea name='tipoIntervencion' id='tipoIntervencion' style='width:100%;' class='form-control'></textarea></div>
	
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.2.3 Planos y anexos gráficos: (debidamente suscritos por el profesional en la rama, aplica para rehabilitación únicamente) 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='planoAnexo' id='planoAnexo' style='width:100%;' class='form-control'></textarea></div>


													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.2.4 Contemplar parámetros de accesibilidad: 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='parametrosAccesibilidad' id='parametrosAccesibilidad' style='width:100%;' class='form-control'></textarea></div>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.2.5 Registro fotográfico de la intervención a subsanar:
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='registroFotografico' id='registroFotografico' style='width:100%;' class='form-control'></textarea></div>


													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.3 PRESUPUESTO REFERENCIAL
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;3.3.1 Por rehabilitación 
		
													</div>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;- Análisis de precios unitarios para rehabilitación, readecuación: (debe de contemplar los gastos directos e indirectos) 
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea name='preciosUnitarios' id='preciosUnitarios' style='width:100%;' class='form-control'></textarea></div>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;- Presupuesto: (valor referencial) 
		
													</div>
		
		
													<input type='text' class='form-control solo__numero cambio__de__numero__f col col-6 mt-2' name='presupuestoReferencial' id='presupuestoReferencial'>


													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp;- Cálculos de Volúmenes de Obra 
		
													</div>
		
		
													<input type='text' class='form-control solo__numero cambio__de__numero__f col col-6 mt-2' name='volumenesObra' id='volumenesObra'>

													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.3.2 POR MANTENIMIENTO
		
													</div>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;&nbsp; Estudio de mercado para mantenimiento: (acorde a los bienes y/o servicios detallar el cuadro comparativo de mínimo 2 cotizaciones y respaldar con las 2 cotizaciones): 
		
													</div>
		
												</div>
		
											</div>
		
		
											<div class='col col-12 row' style='margin-top:1em;' >
												
												<table>
		
													<thead>
		
														<tr>
		
																<th  >
		
																	<center>Intervención a realizar</center>
		
																</th>
		
																<th >
		
																	<center>Materiales o Servicios a requerir para el mantenimiento</center>
		
																</th>
		
																<th >
		
																	<center>Código Ítem</center>
		
																</th>

																<th >
		
																	<center>Nombre del ítem</center>
		
																</th>

																<th >
		
																	<center>Monto Proveedor 1</center>
		
																</th>

																<th >
		
																	<center>Monto Proveedor 2</center>
		
																</th>
		
														</tr>
		
													</thead>
		
													<tbody class='body_EstudioMercado'>
													</tbody>

													<tfood>
														<tr>
															<th colspan='4'>
																TOTAL
															</th>
															<th align='center'>
																<input type='text' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='totalProveedor1' id='totalProveedor1'/>
															</th>
															<th align='center'>
																<input type='text' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' name='totalProveedor2' id='totalProveedor2'/>
															</th>
														</tr>
													</tfood>
		
												</table>
											</div>	

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
												&nbsp;&nbsp;Nota: Si el Organismo deportivo va a realizar un servicio las cotizaciones o proformas deben estar enmarcadas en un servicio, usando el ítem adecuado. Si el Organismo deportivo va a realizar la compra de materiales, las cotizaciones o proformas deben estar enmarcada en materiales. 
		
											</div>
											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
												&nbsp;&nbsp;Nota: El detalle de la intervención a realizar debe estar en coherencia con lo declarado 3.2.2. 
		
											</div>

											<div class='col col-12 row d-flex mt-4'>
		
												<div class='col col-12 row'>
		
		
													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.4 PROPUESTA DE USO DE IMAGEN CORPORATIVA
		
													</div>

													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;Ejemplo: La imagen institucional de la secretaria de Deporte será difundida mediante un letrero en el ingreso del escenario deportivo con medidas de 1.22 m x 2.44 m.
		
													</div>
		
		
													<div class=' col col-6 mt-2'><textarea id='propuestaImagenCorporativa' name='propuestaImagenCorporativa' style='width:100%;' class='form-control' required></textarea></div>


													<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp;3.5 MANTENIMIENTO PREVENTIVO VALORADO
		
													</div>
		
													<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
														&nbsp; La descripción del punto es la forma precautelar que la inversión realizada continue con acciones de mantenimiento preventivos en el escenario a intervenir, siendo necesario detallar las actividades su periodicidad y el costo que esto representa, tanto en horas hombre o costos adicionales.
		
													</div>
													
												</div>
		
											</div>

											<div class='col col-12 row' style='margin-top:1em;'>
												
												<table id='tablaMantenimiento'>
		
													<thead>
		
														<tr>
		
															<th colspan='3'>
		
																<center><a class='btn btn-warning' id='agregarMantenimiento'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>
		
															</th>
		
														</tr>
		
														<tr>
		
																<th>
		
																	<center>ACTIVIDAD</center>
		
																</th>
		
																<th>
		
																	<center>PERIODICIDAD</center>
		
																</th>
		
																<th>
		
																	<center>COSTO</center>
		
																</th>
		
														</tr>

														<tr>
															<td align='center'>Describir las acciones a realizar para conservar el escenario que fue intervenido</td>
															<td align='center'>Detallar la periodicidad (anual, semestral, anual) del mantenimiento a la intervención</td>
															<td align='center'>Detallar el recurso económico; las horas hombre</td>
														</tr>
		
													</thead>
		
													<tbody class='body_Mantenimiento_Preventivo'>
													</tbody>
		
												</table>
											</div>

											<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>
		
												&nbsp;4. ANEXOS
		
											</div>

											<div class='col col-12 row' style='margin-top:1em;'>
												
												<table>
		
													<thead>
		
														<tr>
		
																<th  >
		
																	<center>Documento</center>
		
																</th>
		
																<th >
		
																	<center>CARGA</center>
		
																</th>
		
														</tr>
		
													</thead>
		
													<tbody>
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'>	Copia de la escritura pública del predio</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='escrituraP' name='escrituraP' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>

														</tr>
		
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'>	Copia del comodato perpetuo</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='comodato' name='comodato' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>
														</tr>
		
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'>	Copia de contrato de arrendamiento</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='arrendamiento' name='arrendamiento' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>
														</tr>
		
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'>	Estudio de mercado para mantenimiento con respaldo de Tres cotizaciones</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='estudioMercado' name='estudioMercado' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>
															
														</tr>
		
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'>	Registro fotográfico de la intervención a subsanar</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='registroFoto' name='registroFoto' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>

														</tr>
		
														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'> Matriz de destino incrementos de recursos Organismos Deportivos</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='matrizDestinoIn' name='matrizDestinoIn' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>

														</tr>

														<tr>
															<td style='justify-content:center;'>
																<center>
																	<span style='color:blue'> Hoja auxiliar de mantenimiento.</span>
																</center>
																
															</td>
															<td style='justify-content:center;'>
																<center>
																	<div class='col col-6 text-center'>
																	<input type='file' accept='application/pdf' id='auxiliarMantenimiento' name='auxiliarMantenimiento' class='ancho__total__input text-center form-control' required/>
																	</div>
																</center>
															</td>

														</tr>
		
													
													</tbody>
		
												</table>
											</div>	
		
											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>
		
												&nbsp;Nombre Profesional Técnico Responsable
		
											</div>
		
											<div class=' col col-6 mt-2'><input type='text' style='width:100%;' id='nombreProfesionalTecnico' name='nombreProfesionalTecnico' class='form-control' required></div>
		
		
											<div class=' col col-6 mt-4 text-center'>
		
												<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>
		
											</div>
		
											<div class=' col col-4 mt-4 text-center textos__titulos '>
		
												Subir reporte generado en pdf
		
											</div>
		
											<div class=' col col-4 mt-4 text-center '>
		
												<input type='file' accept='application/pdf' id='archivoProyectoInstalaciones' name='archivoProyectoInstalaciones'>
		
											</div>
		
											<div class=' col col-4 mt-4 text-center'>
		
												<a class='btn btn-primary' id='guardarArchivo__Instalaciones'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;GUARDAR</a>
		
											</div>
		
									</div>
		
								</div>
		
							</form>
		
		
			</div>
		
			</div>
			";

			return $modal;
		}

		public function modal_Observaciones_OD($parametro1,$parametro3){

			$modal="

			<div class='modal modal__ItemsGrup fade' id='$parametro1' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog'  style='min-width:80%!important;'>

					<form class='modal-content'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-1'>

							</div>

							<div class='col col-6 text-center titulos_modal' style='font-weight: bold!important;font-size: 1.3em!important;'>

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1 text-right'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								 <span class='siglas__dinamicas' style='font-weight:bold;'>Observaciones</span>

							</div>
							
						</div>

						<input type='hidden' id='tipoTramiteObservacion' name='tipoTramiteObservacion'/>

						<div class='modal-body row $parametro3'>

							<div class='row justify-content-md-center mt-2'>
								<div class='col col-2' style='font-weight:bold;'>

									Observaciones Adicionales

								</div>

								<div class='col col-10' >

									<textarea id='observacionesTramite' name='observacionesTramite' class='ancho__total__textareas form-control'></textarea>

								</div>
							</div>
						
							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-4' style='font-weight:bold;'>

									Fecha Limite de Subsanación de Observaciones

								</div>

								<div class='fila__incrementos__devolver col col-4'>

									<input type='date' class='form-control' name='fechaLimiteIncremento' id='fechaLimiteIncremento'/>

								</div>
							
							</div>
							

							<div class='row justify-content-md-center mt-4'>
								<div class='fila__incrementos__devolver col col-4' style='font-weight:bold;'>

									Subir documento de Observaciones

								</div>

								<div class='fila__incrementos__devolver col col-4'>

									<input type='file' class='form-control verificaPdf' name='archivoResolucionP' id='archivoResolucionP' />

								</div>
							
							</div>


							<div class='row justify-content-md-center mt-4'>

								<div class='fila__incrementos__devolver col col-12 text-center'>

									<a class='btn btn-primary botonEnviarObservacionOd'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;Enviar</a>

								</div>
							
							</div>
							

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function modal_valores_Incremento($parametro1){

			$modal="<div class='modal fade' id='$parametro1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static' data-keyboard='false'>

			<div class='modal-dialog' style='min-width:80%!important;'>

				<form class='modal-content'>

					<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

						<div class='col col-11 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

							 <span class='tituloModal_' style='font-weight:bold;'></span>

						</div>

						<div class='col col-1'>
  							<button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
   								 <i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i>
 							 </button>
						</div>

						
					</div>


					<div class='modal-body row body_matrices_incrementos'></div>

				</form>

			</div>

			</div>
	
 			 </div>";

			return $modal;

		}
	}


	