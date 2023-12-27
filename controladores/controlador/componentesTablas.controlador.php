<?php

	class componentesTablas{

		public function remanentes__administrador($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion'>


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' class='col col-12' id='organismoIdPrin__realizados' name='organismoIdPrin__realizados'/>

							<div class='col col-8' style='font-weight:bold;'>
								Transferencias al OD ( valor asignado al organismo deportivo mas el valor de incremento + remanente descontado en el ejercicio fiscal en ejecución )
							</div>

							<input type='text' class='col col-4 solo__numero__montos cambio__de__numero__f obligatorios__elementos' id='monto__incrementoRemantes' name='monto__incrementoRemantes' value='0'/>

							<div class='col col-8' style='font-weight:bold; display:none;'>
								Saldo Estado de Cuenta al 31 de  Diciembre
							</div>

							<input type='file' style='display:none;' class='col col-4 obligatorios__elementos' id='archivo__saldoEstados' name='archivo__saldoEstados'/>

							<div class='col col-8' style='font-weight:bold; display:none;'>
								Monto de autogestión que se registra en el estado de cuenta
							</div>

							<input type='text' style='display:none;' class='col col-4 solo__numero__montos cambio__de__numero__f obligatorios__elementos' id='monto__autogestion' name='monto__autogestion' value='0'/>

							<div class='col col-12 text-center'>

								<a class='btn btn-primary' id='enviarRemanentes__administrador' name='enviarRemanentes__administrador'>Enviar</a>

							</div>

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function remanentes__administrador2023($parametro1){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion'>


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulos__remanentes row' style='padding-left:18%'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>
							<center><div class='col col-12' style='font-weight:bold;'>
								<h6 style='font-weight:bold;'>Monto Asignado al OD. (valor transferido al OD incluido incrementos + remanente descontado en el ejercicio fiscal en ejecución)</h6>
							</div></center>

							<input type='hidden' class='col col-12' id='organismoIdPrin__realizados' name='organismoIdPrin__realizados'/>

							<div class='col col-6' style='font-weight:bold;'>
								Transferencias realizadas:
							</div>
							<input type='text' class='col col-6 solo__numero__montos cambio__de__numero__f obligatorios__elementos' id='monto__incrementoRemantes' name='monto__incrementoRemantes' value='0'/>

							<div class='col col-6' style='font-weight:bold;'>
								Remanentes Descontados:
							</div>
							<input type='text' class='col col-6 solo__numero__montos cambio__de__numero__f obligatorios__elementos' id='monto__descuentoRemantes' name='monto__descuentoRemantes' value='0'/>


							<div class='col col-8' style='font-weight:bold; display:none;'>
								Saldo Estado de Cuenta al 31 de  Diciembre
							</div>

							<input type='file' style='display:none;' class='col col-4 obligatorios__elementos' id='archivo__saldoEstados' name='archivo__saldoEstados'/>

							<div class='col col-8' style='font-weight:bold; display:none;'>
								Monto de autogestión que se registra en el estado de cuenta
							</div>

							<input type='text' style='display:none;' class='col col-4 solo__numero__montos cambio__de__numero__f obligatorios__elementos' id='monto__autogestion' name='monto__autogestion' value='0'/>

							<div class='col col-12 text-center'>

								<a class='btn btn-primary' id='enviarRemanentes__administrador2023' name='enviarRemanentes__administrador2023'>Enviar</a>

							</div>

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}


		public function get__modal__plantilla__inicios__se__2guimientos__se__2guimientos__d__recomendados__reporterias__recorridos__reportesAnexos__se__2s($parametro1,$parametro2,$parametro3){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' name='idOrganismo' id='idOrganismo'/>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='documento__seguimiento__final' />
						
						<input type='hidden' id='trimestreEvaluadorDos' name='trimestreEvaluadorDos'/>

						<button class='btn btn-info'><i class='fa fa-cloud' aria-hidden='true'></i>&nbsp;&nbsp;GENERAR PDF</button>


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-12 texto__evidenciales titulo__enfasis text-center' style='text-transform:uppercase!important;'></div>

							<div class='autogestion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#autogestion__se__2' id='autogestionPoas__in__2'>Autogestión</a>

									</div>

								</div>

							</div>

							<div class='indicadores__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#indicadores__se__2' id='indicadores__in__2'>Indicadores</a>

									</div>

								</div>

							</div>

							<div class='sueldos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#sueldos__se__2' id='sueldos__in__2'>Sueldos y salarios</a>

									</div>

								</div>

							</div>

							<div class='honorarios__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#honorarios__se__2' id='honorarios__in__2'>Honorarios</a>

									</div>

								</div>

							</div>

							<div class='administrativos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#administrativo__se__2' id='administrativo__in__2'>Actividades administrativas</a>

									</div>

								</div>

							</div>

							<div class='mantenimiento__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimiento__se__2' id='mantenimiento__in__2'>Mantenimiento</a>

									</div>

								</div>

							</div>

							<div class='mantenimientoTEC__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimientoTec__se__2' id='mantenimientoTec__in__2'>Mantenimiento Técnico</a>

									</div>

								</div>

							</div>

							<div class='capacitacion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacion__se__2' id='capacitacion__in__2'>Capacitacion</a>

									</div>

								</div>

							</div>

							<div class='capacitacionTecnicos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacionTec__se__2' id='capacitacionTec__in__2'>Capacitacion Técnico</a>

									</div>

								</div>

							</div>

							<div class='competencias__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competencia__se__2' id='competencia__in__2'>Competencia</a>

									</div>

								</div>

							</div>

							<div class='competenciasForma__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaForma__se__2' id='competenciaFormativa__in__2'>Competencia Formativa</a>

									</div>

								</div>

							</div>

							<div class='competenciasAlto__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaAlto__se__2' id='competenciaAlto__in__2'>Competencia Alto rendimiento</a>

									</div>

								</div>

							</div>

							<div class='recreativo__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativo__se__2' id='recreativo__in__2'>Recreativo</a>

									</div>

								</div>

							</div>

							<div class='recreativoTecnicos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativoTec__se__2' id='recreativoTec__in__2'>Recreativo Técnico</a>

									</div>

								</div>

							</div>

							<div class='implementacion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#implementacion__se__2' id='implementacion__in__2'>Implementación</a>

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__modal__plantilla__inicios__se__2guimientos__se__2guimientos__d__recomendados__reporterias__recorridos__reportesAnexos__se__2s__2023($parametro1,$parametro2,$parametro3){

			$componentes= new componentes();


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' name='idOrganismo' id='idOrganismo'/>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='documento__seguimiento__final' />
						
						<input type='hidden' id='trimestreEvaluadorDos' name='trimestreEvaluadorDos'/>

						

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>

							<div class='col col-12 texto__evidenciales titulo__enfasis text-center' style='text-transform:uppercase!important;'></div>

							<div class='autogestion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#autogestion__se__2__2023' id='autogestionPoas__in__2'>Autogestión</a>

									</div>

								</div>

							</div>

							<div class='indicadores__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#indicadores__se__2__2023' id='indicadores__in__2'>Indicadores</a>

									</div>

								</div>

							</div>

							<div class='administrativos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#administrativo__se__2__2023' id='administrativo__in__2'>001 - Operación y funcionamiento de organizaciones deportivas y escenarios deportivos - Ejecución Presupuestaria</a>

									</div>

								</div>

							</div>

							<div class='mantenimiento__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimiento__se__2__2023' id='mantenimiento__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Ejecución presupuestaria</a>

									</div>

								</div>

							</div>

							<div class='mantenimientoTEC__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#mantenimientoTec__se__2__2023' id='mantenimientoTec__in__2'>002 - Mantenimiento de escenarios e infraestructura deportiva - Información técnica</a>

									</div>

								</div>

							</div>

							<div class='capacitacion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacion__se__2__2023' id='capacitacion__in__2'>003 - Capacitación deportiva o de recreación - Ejecución presupuestaria</a>

									</div>

								</div>

							</div>

							<div class='capacitacionTecnicos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#capacitacionTec__se__2__2023' id='capacitacionTec__in__2'>003 - Capacitación deportiva o de recreación - Información técnica</a>

									</div>

								</div>

							</div>

							<div class='sueldos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#sueldos__se__2__2023' id='sueldos__in__2'>004 - Operación deportiva - Sueldos y salarios</a>

									</div>

								</div>

							</div>

							<div class='honorarios__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#honorarios__se__2__2023' id='honorarios__in__2'>004 - Operación deportiva - Honorarios</a>

									</div>

								</div>

							</div>

							<div class='competencias__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competencia__se__2__2023' id='competencia__in__2'>005 - Eventos de preparación y competencia - Ejecución presupuestaria</a>

									</div>

								</div>

							</div>

							<div class='competenciasForma__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaForma__se__2__2023' id='competenciaFormativa__in__2'>005 - Eventos de preparación y competencia - Deporte Formativo - Información técnica</a>

									</div>

								</div>

							</div>

							<div class='competenciasAlto__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#competenciaAlto__se__2__2023' id='competenciaAlto__in__2'>005 - Eventos de preparación y competencia - Alto Rendimiento - Información técnica</a>

									</div>

								</div>

							</div>

							<div class='recreativo__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativo__se__2__2023' id='recreativo__in__2'>006 - Actividades recreativas - Ejecución presupuestaria</a>

									</div>

								</div>

							</div>

							<div class='recreativoTecnicos__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#recreativoTec__se__2__2023' id='recreativoTec__in__2'>006 - Actividades recreativas - Información técnica</a>

									</div>

								</div>

							</div>

							<div class='implementacion__verificables'>

								<div class='row d d-flex flex-column justify-content-center card mt-4'>

									<div class='card-body row'>

										<a class='card-title text-center titulo__enfasis pointer__botones' data-bs-toggle='modal' data-bs-target='#implementacion__se__2__2023' id='implementacion__in__2'>007 - Implementación deportiva  - Ejecución presupuestaria e Información Técnica</a>

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}



		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__reporterias__recorridos($parametro1,$parametro2,$parametro3){


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion'>


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

					<div class='modal-body row $parametro3'>

						<table>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>

					</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalConfiguracion__reporteria__organismos__seguimientos($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>

					    <div class='col col-11 text-center'>

					    	<h5 class='modal-title $parametro2'></h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						<div class='col col-12 contenedor__sueldos__salarios'></div>

						<table class='$parametro3'>

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


		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__instalaciones__2($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombre__archivo' name='nombre__archivo' />
							<input type='hidden' id='evaluador__movimientos' name='evaluador__movimientos' />

							<div class='col col-4  mt-4 insfraestructuras__re'>

								Informe de recomendación Infraestructura

							</div>

							<div class='col col-8 d d-flex justify-content-center d d-flex justify-content-center insfraestructuras__re'>

								<a id='documentos__tecnicos__t__infras' class='btn btn-warning' target='_blank'></a>

							</div>

							<div class='col col-4  mt-4 instalaciones__re'>

								Informe de recomendación Instalaciones

							</div>

							<div class='col col-8 d d-flex justify-content-center d d-flex justify-content-center instalaciones__re'>

								<a id='documentos__tecnicos__t__infras__instalaciones' class='btn btn-primary' target='_blank'></a>

							</div>



							<div class='fila__regresar__a col col-2 recomendar__ins__ins' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='fila__regresar__a col col-6 recomendar__ins__ins'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>

							</div>

							<div class='fila__regresar__a col col-2 recomendar__ins__ins'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='fila__regresar__a col col-2 recomendar__ins__ins'>

								<a class='btn btn-warning' id='recomienda__coordinai__directores'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Recomendar</a>

							</div>


							<div class='col col-12 textos__titulos mt-4 recomendar__final__ins acciones__recomendaciones__finales'>

								ACCIONES DE RECOMENDACIÓN

							</div>

							<div class='col col-4 oculto__subsess__deseados recomendar__final__ins acciones__recomendaciones__finales' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados recomendar__final__ins acciones__recomendaciones__finales'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-4 mt-2 recomendar__final__ins acciones__recomendaciones__finales'>

								<a class='btn btn-success' id='enviar__orgnaismosDeportivos__infraestructuras'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;ENVIAR</a>

							</div>

							<div class='col col-2 eliminados__al__de' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8 eliminados__al__de'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

							</div>

							<div class='col col-2 eliminados__al__de'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s__infraestructuras'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>


							<div class='col col-2 observacionesReasignaciones eliminados__al__de' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones eliminados__al__de'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>							

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}			


		public function get__modal__plantilla__inicios__seguimientos__actividad__fisica__ins($parametro1,$parametro2,$parametro3){

			session_start();

			$idUsuario=$_SESSION["idUsuario"];

			$conexionRecuperada= new conexion();
		 	$conexionEstablecida=$conexionRecuperada->cConexion();	

		 	$query="SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario' AND a.fisicamenteEstructura='1' AND b.id_rol='4'; ";
			$resultado = $conexionEstablecida->query($query);


			while($registro = $resultado->fetch()) {

				$id_usuarioUsuarios=$registro['id_usuario'];

			}

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />
						<input type='hidden' id='tipoAct' name='tipoAct' />


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones' style='color:black!important; background:black!important;' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-8'>";
							if (empty($id_usuarioUsuarios)) {
								$modal.=	"<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>";
							} else {
								$modal.=	"<select class='ancho__total__input__selects selects__superiores superior__sin' multiple='multiple' style='height:80px!important;' id='selects__superiores'></select>";
							}
							

			$modal.=	"</div>


							<div class='fila__reasignar col col-2 reasignar__solo text-center'>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__actividad__fisicas__in'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-8'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__actividad__fisicas__in'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>



							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones no__correspondientes'>

								No corresponde

							</div>		


							<div class='fila__regresar__a__informe__recomendacion col col-8 oculto__file__recomendaciones no__correspondientes text-left d d-flex justify-content-right'>

								<a class='btn btn-danger' id='no__correspondeA'>No corresponde</a>

							</div>

							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones'>

								Subir informe de recomendación infraestructura

							</div>		

							<div class='fila__regresar__a__informe__recomendacion col col-8 oculto__file__recomendaciones'>

								<input type='file' id='informe__recomendado' accept='application/pdf'/>

							</div>					


							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones instalaciones__revertivos'>

								Subir informe de recomendación Instalaciones

							</div>		

							<div class='fila__regresar__a__informe__recomendacion col col-8 oculto__file__recomendaciones instalaciones__revertivos'>

								<input type='file' id='informe__recomendado__instalaciones' accept='application/pdf'/>

							</div>					


							<div class='fila__regresar__a__informe__recomendacion col col-12 oculto__file__recomendaciones'>

								<a class='btn btn-primary' id='recomendar__infraes'>Recomendar</a>

							</div>


							<div class='row'>

								<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

									Observaciones

								</div>

								<div class='col col-10 observacionesReasignaciones'>

									<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />

							<div class='col col-12 textos__titulos mt-4'>

								DOCUMENTOS DE RECOMENDACIÓN

							</div>

							<div class='col col-4 oculto__subsess__deseados d d-flex justify-content-center'>

								<a id='informe__recomendados' class='btn btn-info' target='_blank'>Informe recomendado</a>

							</div>

							<div class='col col-4 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__t' class='boton__pdfs__tecnicas btn btn-success's target='_blank'>Informe técnico</a>

							</div>


							<div class='col col-4 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__i' class='boton__pdfs__infraestructuras btn btn-warning' target='_blank'>Informe infraestructuras</a>

							</div>

							<div class='col col-12 textos__titulos mt-4'>

								ACCIONES DE RECOMENDACIÓN

							</div>

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-8 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-4 mt-2' style='font-weight:bold;'>

								Enviar al organismo deportivo

							</div>

							<div class='col col-6 mt-2 clases__puedes__recomendares' style='font-weight:bold; color:#4a148c;'>


							</div>


							<div class='col col-2 mt-2'>

								<a class='btn btn-success' id='enviar__orgnaismosDeportivos'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;ENVIAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='fila__reasignar col col-6 d d-flex justify-content-center' style='font-weight:bold;'>

								<a class='btn btn-warning boton__pdfs__tecnicas' id='regresar__areas__tecnicas__seguimientos' target='_blank'>REGRESAR AL ÁREA TÉCNICA</a>

							</div>


							<div class='fila__reasignar col col-6 d d-flex justify-content-center' style='font-weight:bold;'>

								<a class='btn btn-info boton__pdfs__infraestructuras' id='regresar__areas__tecnicas__seguimientos__infraens__2' target='_blank'>REGRESAR AL ÁREA DE INFRAESTRUCTURA</a>

							</div>
							
							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos__fisicicos__f__r__recomendados($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />

							<div class='col col-4'>

								<a id='informe__recomendados' target='_blank'>Descargar Informe recomendado</a>

							</div>

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-2 mt-2' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='col col-8 mt-2'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar oculto__subsess__deseados' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar oculto__subsess__deseados' id='selects__superiores__regresar__coors__acFisicas'>
								</select>

								<div class='direccion__seguimientos__ocultos'>Dirección de seguimiento</div>

							</div>

							<div class='col col-2 mt-2'>

								<a class='btn btn-warning' id='recomendar__altosRe__recomendados__f__r'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>


							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos__alto__recomendados($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />


							<div class='col col-4'>

								<a id='informe__recomendados' target='_blank'>Descargar Informe recomendado</a>

							</div>

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-2 mt-2' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='col col-8 mt-2'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

								<div class='direccion__seguimientos__ocultos'>Dirección de seguimiento</div>

							</div>

							<div class='col col-2 mt-2'>

								<a class='btn btn-warning' id='recomendar__altosRe__recomendados'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos__actividad__fisica($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos__act__deportivas'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />
						<input type='hidden' id='tipoAct' name='tipoAct' />


						<input type='hidden' id='indicadorArray' name='indicadorArray' />
						<input type='hidden' id='metaProgramadaArray' name='metaProgramadaArray' />
						<input type='hidden' id='metaResultadoArray' name='metaResultadoArray' />
						<input type='hidden' id='porcentajeCumplimientoArray' name='porcentajeCumplimientoArray' />


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#1b5e20; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - ORGANIZACIONES DEPORTIVAS - <span class='siglas__dinamicas' style='font-weight:bold;'></span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'></span>-<span class='numerico__dinamicas'></span>)

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-4'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>


							<div class='fila__reasignar col col-2 reasignar__solo text-center'>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__actividad__fisicas'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-4'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors__acFisicas'>
								</select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__actividad__fisicas'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>


							<div class='col col-3'>

								Click para ver reporte

							</div>

							<div class='col col-1'>

								<input type='checkbox' id='seguimiento__tables' class='checkeds' />

							</div>



							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>


							<div class='row oculto__informacion'>

								<input type='hidden' id='organismoOculto__modal' />

									<div class='col col-2 textos__titulos'>

										I PERÍODO EVALUADO

									</div>

									<div class='col col-1' style='font-weight:bold;'>

										AÑO 

									</div>

									<div class='col col-4 text-left periodo__evaluados__anuales'></div>
									<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />

									<div class='col col-1' style='font-weight:bold;'>

										SEMESTRE 

									</div>

									<div class='col col-4 text-left trimestre__evaluados__al'></div>
									<input type='hidden' id='trimestre__evaluados__al' name='trimestre__evaluados__al' />


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-7 row'>

											<div class='col col-12 text-left textos__titulos'>

												II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

											</div>

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												NOMBRE DE LA ORGANIZACIÓN:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												RUC DE LA ORGANIZACIÓN:

											</div>

											<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PRESIDENTE O REPRESENTANTE LEGAL:

											</div>

											<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

											</div>

											<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												DIRECCIÓN COMPLETA:

											</div>

											<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


										</div>

										<div class='col col-5 row'>

											<div class='col col-12 text-left textos__titulos'>

												III. UBICACIÓN GEOGRÁFICA

											</div>


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PROVINCIA:

											</div>

											<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CANTÓN:

											</div>

											<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PARROQUIA:

											</div>

											<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												BARRIO:

											</div>

											<div class='barrio__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

										</div>

									</div>

									<div class='textos__titulos ocultos__paid__documentos' style='display:none!important;'>

										IV. DATOS GENERALES DEL CONVENIO

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold; display:none!important;'>

										NÚMERO DE CONVENIO:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold;display:none!important;'>

										ADMINISTRADOR DEL CONVENIO:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold; display:none!important;'>

										DOCUMENTO DE DESIGNACIÓN:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-12 textos__titulos'>

										 IV. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

									</div>

									<div class='col col-12' style='font-weight:bold;'>

										IV.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

									</div>


									<div class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__asignado__pais__altos' name='presupuesto__asignado__pais__altos' />

									<div class='col col-4' style='font-weight:bold;'>

										MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE (USD):

									</div>


									<div class='col col-8 presupuesto__autogestion__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__autogestion__asignado__pais__altos' name='presupuesto__autogestion__asignado__pais__altos' />



									<div class='col col-12 textos__titulos'>

										IV.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

									</div>

									<div class='col col-12 text-center' style='font-weight:bold!important;'>

										AVANCE DE METAS

									</div>

									<table class='mt-4 col col-12'>

										<thead>

											<tr>

												<th>
													<center>ACTIVIDADES</center>
												</th>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PROGRAMADA</center>
												</th>

												<th>
													<center>RESULTADO ALCANZADO</center>
												</th>

												<th>
													<center>% DE CUMPLIMIENTO</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos'></tbody>

										<tfoot class='footer__altos__indicadores'></tfoot>

									</table>

									<div class='col col-12 textos__titulos'>

										IV.III. OTROS ASPECTOS TÉCNICOS

									</div>


									<table class='tabla__recreativo__1'>

										<thead>

											<tr>

												<th colspan='4'>

													<center><a class='btn btn-warning' id='agregar__indicadoresOtros'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

												</th>

											</tr>

											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PROGRAMADA</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__indicadores__altos'>

											<tr>

												<td>Número de eventos ejecutados al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto' name='eventos__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='meta__eje__alto' name='meta__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e'></div>
														<input type='text' id='porcentaje__c__eje__alto' name='porcentaje__c__eje__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Número de eventos en los que participa al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto__parti' name='eventos__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='meta__eje__alto__parti' name='meta__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e__parti'></div>
														<input type='text' id='porcentaje__c__eje__alto__parti' name='porcentaje__c__eje__alto__parti' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Cantidad de implementación deportiva al I trimestre:</td>
												<td><input type='text' id='implementacion__de__eje__alto__meta' name='implementacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='implementacion__de__eje__alto__resultado' name='implementacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__implementacion__de__e'></div>
														<input type='text' id='porcentaje__c__implementacion__de__e__alto' name='porcentaje__c__implementacion__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de capacitaciones deportivas:</td>
												<td><input type='text' id='beneficiarios__de__eje__alto__meta' name='beneficiarios__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='beneficiarios__de__eje__alto__resultado' name='beneficiarios__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__beneficiarios__de__e'></div>
														<input type='text' id='porcentaje__c__beneficiarios__de__e__alto' name='porcentaje__c__beneficiarios__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de eventos de recreación:</td>
												<td><input type='text' id='preparacion__de__eje__alto__meta' name='preparacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='preparacion__de__eje__alto__resultado' name='preparacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__preparacion__de__e'></div>
														<input type='text' id='porcentaje__c__preparacion__de__e__alto' name='porcentaje__c__preparacion__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>

										</tbody>

									</table>

									<table class='tabla__formativo__1'>

										<thead>

											<tr>

												<th colspan='4'>

													<center><a class='btn btn-warning' id='agregar__indicadoresOtros__formativos'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

												</th>

											</tr>


											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PROGRAMADA</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__indicadores__altos'>

											<tr>

												<td>Número de eventos ejecutados al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto' name='eventos__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f eventos__eje__alto' value='0'/></td>
												<td><input type='text' id='meta__eje__alto' name='meta__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f meta__eje__alto' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e'></div>
														<input type='text' id='porcentaje__c__eje__alto' name='porcentaje__c__eje__alto' class='ancho__total__input solo__numero__montos porcentaje__c__eje__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Número de eventos en los que participa al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto__parti' name='eventos__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f eventos__eje__alto__parti' value='0'/></td>
												<td><input type='text' id='meta__eje__alto__parti' name='meta__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f meta__eje__alto__parti' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e__parti'></div>
														<input type='text' id='porcentaje__c__eje__alto__parti' name='porcentaje__c__eje__alto__parti' class='ancho__total__input solo__numero__montos porcentaje__c__eje__alto__parti' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Número de beneficiarios atendidos en las actividades del fomento deportivo:</td>
												<td><input type='text' id='implementacion__de__eje__alto__meta' name='implementacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f implementacion__de__eje__alto__meta' value='0'/></td>
												<td><input type='text' id='implementacion__de__eje__alto__resultado' name='implementacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f implementacion__de__eje__alto__resultado' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__implementacion__de__e'></div>
														<input type='text' id='porcentaje__c__implementacion__de__e__alto' name='porcentaje__c__implementacion__de__e__alto' class='ancho__total__input solo__numero__montos porcentaje__c__implementacion__de__e__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de actividades del fomento deportivo a las que se destina el recurso de operación deportiva:</td>
												<td><input type='text' id='beneficiarios__de__eje__alto__meta' name='beneficiarios__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__de__eje__alto__meta' value='0'/></td>
												<td><input type='text' id='beneficiarios__de__eje__alto__resultado' name='beneficiarios__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__de__eje__alto__resultado' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__beneficiarios__de__e'></div>
														<input type='text' id='porcentaje__c__beneficiarios__de__e__alto' name='porcentaje__c__beneficiarios__de__e__alto' class='ancho__total__input solo__numero__montos porcentaje__c__beneficiarios__de__e__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Cantidad de implementación deportiva al I trimestre:</td>
												<td><input type='text' id='preparacion__de__eje__alto__meta' name='preparacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f preparacion__de__eje__alto__meta' value='0'/></td>
												<td><input type='text' id='preparacion__de__eje__alto__resultado' name='preparacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f preparacion__de__eje__alto__resultado' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__preparacion__de__e'></div>
														<input type='text' id='porcentaje__c__preparacion__de__e__alto' name='porcentaje__c__preparacion__de__e__alto' class='ancho__total__input solo__numero__montos porcentaje__c__preparacion__de__e__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de capacitaciones deportivas:</td>
												<td><input type='text' id='beneficiarios__capa__de__eje__alto__meta' name='beneficiarios__capa__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__capa__de__eje__alto__meta' value='0'/></td>
												<td><input type='text' id='beneficiarios__capa__de__eje__alto__resultado' name='beneficiarios__capa__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__capa__de__eje__alto__resultado' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__beneficiarios__capa__de__e'></div>
														<input type='text' id='porcentaje__c__beneficiarios__capa__de__e__alto' name='porcentaje__c__beneficiarios__capa__de__e__alto' class='ancho__total__input solo__numero__montos porcentaje__c__beneficiarios__capa__de__e__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de eventos de preparación y competencias:</td>
												<td><input type='text' id='beneficiarios__even__prepa__de__eje__alto__meta' name='beneficiarios__even__prepa__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__even__prepa__de__eje__alto__meta' value='0'/></td>
												<td><input type='text' id='beneficiarios__even__prepa__de__eje__alto__resultado' name='beneficiarios__even__prepa__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f beneficiarios__even__prepa__de__eje__alto__resultado' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__beneficiarios__even__prepa__de__e'></div>
														<input type='text' id='porcentaje__c__even__prepa__capa__de__e__alto' name='porcentaje__c__even__prepa__capa__de__e__alto' class='ancho__total__input solo__numero__montos porcentaje__c__even__prepa__capa__de__e__alto' readonly='' value='0'/>
													</div>
												</td>

											</tr>


										</tbody>

									</table>


									<div class='col col-12 mt-2 foramtivo__enlaces__medalleros' style='font-weight:bold;'>

										NÚMERO DE MEDALLAS ALCANZAS AL SEMESTRE:

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										Oro

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										<input type='text' id='oro__alto' name='oro__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										Plata

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										<input type='text' id='plata__alto' name='plata__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										Bronce

									</div>

									<div class='col col-2 foramtivo__enlaces__medalleros'>

										<input type='text' id='bronce__alto' name='bronce__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>									



									<div class='col col-12 mt-2 recreativo__enlaces__medalleros' style='font-weight:bold;'>

										NÚMERO DE BENEFICIARIOS :

									</div>

									<div class='col col-2 recreativo__enlaces__medalleros'>

										HOMBRES

									</div>

									<div class='col col-2 recreativo__enlaces__medalleros'>

										<input type='text' id='hombres__alto' name='hombres__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2 recreativo__enlaces__medalleros'>

										MUJERES

									</div>

									<div class='col col-2 recreativo__enlaces__medalleros'>

										<input type='text' id='mujeres__alto' name='mujeres__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div  style='display:none!important;'>

										PERSONAS CON DISCAPACIDAD

									</div>

									<div class='col col-2 recreativo__enlaces__medalleros' style='display:none!important;'>

										<input type='text' id='personas__con__discapacidad__alto' name='personas__con__discapacidad__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>									



									<div class='col col-12 mt-2' style='font-weight:bold;'>

										PRESENTAN INFORMACIÓN:

									</div>


									<table class='col col-12 mt-2 tabla__formativo__1'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
													Reporte de resultados deportivo obtenidos en los eventos en los que participaron:
												</td>

												<td>
													<select id='reporte__tabla__alto' name='reporte__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico: 
												</td>

												<td>
													<select id='listados__tabla__alto' name='listados__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


											<tr>

												<td>
													Registro fotográfico:
												</td>

												<td>
													<select id='informe__tabla__alto' name='informe__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Listado de asistentes de capacitaciones:
												</td>

												<td>
													<select id='registro__tabla__alto' name='registro__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Actas de entrega recepción de la implementación deportiva adquirida:
												</td>

												<td>
													<select id='asistentes__tabla__alto' name='asistentes__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


											<tr>

												<td>
													Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
												</td>

												<td>
													<select id='actas__tabla__alto' name='actas__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


										</tbody>

									</table>

									<table class='col col-12 mt-2 tabla__recreativo__1'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
													Listados de participantes en eventos recreativos:
												</td>

												<td>
													<select id='reporte__tabla__alto' name='reporte__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Registro fotográfico: 
												</td>

												<td>
													<select id='listados__tabla__alto' name='listados__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


											<tr>

												<td>
													Listado de asistentes de capacitaciones:
												</td>

												<td>
													<select id='informe__tabla__alto' name='informe__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Actas de entrega recepción de la implementación deportiva adquirida:
												</td>

												<td>
													<select id='registro__tabla__alto' name='registro__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
												</td>

												<td>
													<select id='asistentes__tabla__alto' name='asistentes__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


										</tbody>

									</table>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguis' name='observaciones__alto__seguis'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguis' name='recomendaciones__alto__seguis'></textarea>

									<div class='col col-12 d d-flex justify-content-center'>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='hidden' id='rotulo__recomendado' name='rotulo__recomendado'>

										<a class='btn btn-primary' id='recomendarAltos' name='recomendarAltos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

									</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		

		public function get__modal__plantilla__inicios__seguimientos__alto($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos__altos'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />

						<input type='hidden' id='indicadorArray' name='indicadorArray' />
						<input type='hidden' id='metaProgramadaArray' name='metaProgramadaArray' />
						<input type='hidden' id='metaResultadoArray' name='metaResultadoArray' />
						<input type='hidden' id='porcentajeCumplimientoArray' name='porcentajeCumplimientoArray' />

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#1b5e20; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - ORGANIZACIONES DEPORTIVAS - <span class='siglas__dinamicas' style='font-weight:bold;'></span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'></span>-<span class='numerico__dinamicas'></span>)

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-4'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>


							<div class='fila__reasignar col col-2 reasignar__solo text-center'>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__alto__rendimiento'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-4'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__alto__rendimiento'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>


							<div class='col col-3'>

								Click para ver reporte

							</div>

							<div class='col col-1'>

								<input type='checkbox' id='seguimiento__tables' class='checkeds' />

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

							<div class='row oculto__informacion'>

								<input type='hidden' id='organismoOculto__modal' />

									<div class='col col-2 textos__titulos'>

										I PERÍODO EVALUADO

									</div>

									<div class='col col-1' style='font-weight:bold;'>

										AÑO 

									</div>

									<div class='col col-4 text-left periodo__evaluados__anuales'></div>
									<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />

									<div class='col col-1' style='font-weight:bold;'>

										SEMESTRE 

									</div>

									<div class='col col-4 text-left trimestre__evaluados__al'></div>
									<input type='hidden' id='trimestre__evaluados__al' name='trimestre__evaluados__al' />


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-7 row'>

											<div class='col col-12 text-left textos__titulos'>

												II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

											</div>

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												NOMBRE DE LA ORGANIZACIÓN:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												RUC DE LA ORGANIZACIÓN:

											</div>

											<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PRESIDENTE O REPRESENTANTE LEGAL:

											</div>

											<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

											</div>

											<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												DIRECCIÓN COMPLETA:

											</div>

											<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


										</div>

										<div class='col col-5 row'>

											<div class='col col-12 text-left textos__titulos'>

												III. UBICACIÓN GEOGRÁFICA

											</div>


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PROVINCIA:

											</div>

											<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CANTÓN:

											</div>

											<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PARROQUIA:

											</div>

											<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												BARRIO:

											</div>

											<div class='barrio__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

										</div>

									</div>

									<div class='textos__titulos' style='display:none!important;'>

										IV. DATOS GENERALES DEL CONVENIO

									</div>

									<div style='font-weight:bold; display:none!important;'>

										NÚMERO DE CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

									</div>

									<div style='font-weight:bold;display:none!important;'>

										ADMINISTRADOR DEL CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-4' style='font-weight:bold;display:none!important;'>

										DOCUMENTO DE DESIGNACIÓN:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-12 textos__titulos'>

										 IV. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

									</div>

									<div class='col col-12' style='font-weight:bold;'>

										IV.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

									</div>


									<div class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__asignado__pais__altos' name='presupuesto__asignado__pais__altos' />


									<div class='col col-12 textos__titulos'>

										IV.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

									</div>

									<div class='col col-12 text-center' style='font-weight:bold!important;'>

										AVANCE DE METAS

									</div>

									<table class='mt-4 col col-12'>

										<thead>

											<tr>

												<th>
													<center>ACTIVIDADES</center>
												</th>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PROGRAMADA</center>
												</th>

												<th>
													<center>RESULTADO ALCANZADO</center>
												</th>

												<th>
													<center>% DE CUMPLIMIENTO</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos'></tbody>

										<tfoot class='footer__altos__indicadores'></tfoot>

									</table>

									<div class='col col-12 textos__titulos'>

										IV.III. OTROS ASPECTOS TÉCNICOS

									</div>

									<table>

										<thead>

											<tr>

												<th colspan='4'>

													<center><a class='btn btn-warning' id='agregar__indicadoresOtros'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

												</th>

											</tr>

											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PROGRAMADA</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__indicadores__altos'>

											<tr>

												<td>Número de eventos ejecutados al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto' name='eventos__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='meta__eje__alto' name='meta__eje__alto' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e'></div>
														<input type='text' id='porcentaje__c__eje__alto' name='porcentaje__c__eje__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Número de eventos en los que participa al trimestre:</td>
												<td><input type='text' id='eventos__eje__alto__parti' name='eventos__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='meta__eje__alto__parti' name='meta__eje__alto__parti' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__eventos__e__parti'></div>
														<input type='text' id='porcentaje__c__eje__alto__parti' name='porcentaje__c__eje__alto__parti' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>

											<tr>

												<td>Cantidad de implementación deportiva al <div class='implementacionNombreTrimestre'></div></td>
												<input type='hidden' id='implementacionNombreTrimestre' name='implementacionNombreTrimestre'/>

												<td><input type='text' id='implementacion__de__eje__alto__meta' name='implementacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='implementacion__de__eje__alto__resultado' name='implementacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__implementacion__de__e'></div>
														<input type='text' id='porcentaje__c__implementacion__de__e__alto' name='porcentaje__c__implementacion__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de capacitaciones deportivas:</td>
												<td><input type='text' id='beneficiarios__de__eje__alto__meta' name='beneficiarios__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='beneficiarios__de__eje__alto__resultado' name='beneficiarios__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__beneficiarios__de__e'></div>
														<input type='text' id='porcentaje__c__beneficiarios__de__e__alto' name='porcentaje__c__beneficiarios__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>


											<tr>

												<td>Número de beneficiarios de eventos de preparación y competencias:</td>
												<td><input type='text' id='preparacion__de__eje__alto__meta' name='preparacion__de__eje__alto__meta' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td><input type='text' id='preparacion__de__eje__alto__resultado' name='preparacion__de__eje__alto__resultado' class='ancho__total__input solo__numero__montos cambio__de__numero__f' value='0'/></td>
												<td>
													<div style='display:flex;'>
														<div class='porcentaje__preparacion__de__e'></div>
														<input type='text' id='porcentaje__c__preparacion__de__e__alto' name='porcentaje__c__preparacion__de__e__alto' class='ancho__total__input solo__numero__montos' readonly='' value='0'/>
													</div>
												</td>

											</tr>



										</tbody>

									</table>


									<div class='col col-12 mt-2' style='font-weight:bold;'>

										NÚMERO DE MEDALLAS ALCANZAS AL SEMESTRE:

									</div>

									<div class='col col-2'>

										Oro

									</div>

									<div class='col col-2'>

										<input type='text' id='oro__alto' name='oro__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2'>

										Plata

									</div>

									<div class='col col-2'>

										<input type='text' id='plata__alto' name='plata__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2'>

										Bronce

									</div>

									<div class='col col-2'>

										<input type='text' id='bronce__alto' name='bronce__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>									


									<div class='col col-12 mt-2' style='font-weight:bold;'>

										PRESENTAN INFORMACIÓN:

									</div>


									<table class='col col-12 mt-2'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
													Reporte de resultados deportivo obtenidos en los eventos en los que participaron:
												</td>

												<td>
													<select id='reporte__tabla__alto' name='reporte__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico:
												</td>

												<td>
													<select id='listados__tabla__alto' name='listados__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


											<tr>

												<td>
													Informe médico y disciplinario de atletas:
												</td>

												<td>
													<select id='informe__tabla__alto' name='informe__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Registro fotográfico:
												</td>

												<td>
													<select id='registro__tabla__alto' name='registro__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Listado de asistentes de capacitaciones:
												</td>

												<td>
													<select id='asistentes__tabla__alto' name='asistentes__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>


											<tr>

												<td>
													Actas de entrega recepción de la implementación deportiva adquirida:
												</td>

												<td>
													<select id='actas__tabla__alto' name='actas__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

											<tr>

												<td>
													Cumplimientos de los procesos de contratación del equipo técnico contratado en el trimestre:
												</td>

												<td>
													<select id='cumplimientos__tabla__alto' name='cumplimientos__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='si'>Si</option>
														<option value='no'>No</option>
													</select>
												</td>

											</tr>

										</tbody>

									</table>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguis' name='observaciones__alto__seguis'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguis' name='recomendaciones__alto__seguis'></textarea>


									<div class='col col-12 d d-flex justify-content-center'>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>									

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

									</div>

									<input type='hidden' id='rotulo__recomendado' name='rotulo__recomendado' value='alto__rendimientos'/>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<a class='btn btn-primary' id='recomendarAltos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

									</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:95%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='arrayPorcen' name='arrayPorcen' />

						<input type='hidden' id='arrayPorcen__inicializados' name='arrayPorcen__inicializados' />

						<input type='hidden' id='arrayPorcenEsigefts__programados' name='arrayPorcenEsigefts__programados' />
						

						<input type='hidden' id='arrayEsigefts' name='arrayEsigefts' />
						<input type='hidden' id='arrayPorcenEsigefts' name='arrayPorcenEsigefts' />

						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />

						<input type='hidden' id='tipos__nomenclaturas' name='tipos__nomenclaturas' />

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos'>

								COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA<br>
								DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA - <span class='siglas__dinamicas' style='font-weight:bold;'></span> ( RSEP-<span class='siglas__dinamicas' style='font-weight:bold;'></span>-<span class='numerico__dinamicas'></span>)

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

							<div class='col col-12 text-center con__sin__e' style='color:black;padding-top:1.5em;padding-bottom:1.5em;font-weight:bold;'>


							</div>

						</div>

						<div class='modal-body row $parametro3'>

						<div class='fila__reasignar col col-2' style='font-weight:bold;'>

							Reasignar a

						</div>

						<div class='fila__reasignar col col-4'>

							<select class='ancho__total__input__selects' id='selects__superiores'></select>

						</div>

						<div class='fila__reasignar col col-2'>

							<a class='btn btn-primary' id='reasignarSeguimientos__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

						</div>


						<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

							Regresar a

						</div>

						<div class='fila__regresar__a col col-4'>

							<select class='ancho__total__input__selects' id='selects__superiores__regresar'></select>

						</div>

						<div class='fila__regresar__a col col-2'>

							<a class='btn btn-warning' id='regresarSeguimientos__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

						</div>


						<div class='col col-3'>

							Click para ver reporte

						</div>

						<div class='col col-1'>

							<input type='checkbox' id='seguimiento__tables' class='checkeds' />

						</div>


						<div class='col col-12 elemento__refutables__corregidos text-center' style='font-weight:bold;'>


						</div>

						<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

							Observaciones

						</div>

						<div class='col col-10 observacionesReasignaciones'>

							<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

						</div>


						<div class='row oculto__informacion'>

						<input type='hidden' id='organismoOculto__modal' />

							<div class='col col-2 textos__titulos'>

								I PERÍODO EVALUADO

							</div>

							<div class='col col-1' style='font-weight:bold;'>

								AÑO 

							</div>

							<div class='col col-9 text-left periodo__evaluados__anuales'></div>
							<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />


							<div class='col col-12 row d-flex mt-4'>

								<div class='col col-7 row'>

									<div class='col col-12 text-left textos__titulos'>

										II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

									</div>

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										NOMBRE DE LA ORGANIZACIÓN:

									</div>

									<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										RUC DE LA ORGANIZACIÓN:

									</div>

									<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PRESIDENTE O REPRESENTANTE LEGAL:

									</div>

									<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

									</div>

									<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										DIRECCIÓN COMPLETA:

									</div>

									<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


								</div>

								<div class='col col-5 row'>

									<div class='col col-12 text-left textos__titulos'>

										III. UBICACIÓN GEOGRÁFICA

									</div>


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PROVINCIA:

									</div>

									<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										CANTÓN:

									</div>

									<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PARROQUIA:

									</div>

									<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										BARRIO:

									</div>

									<div class='barrio__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

								</div>

							</div>

							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								IV. ALINEACIÓN A LA PLANIFICACIÓN 

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								ÁREA DE ACCIÓN:

							</div>

							<div class='area__de__accion__llamados col col-1'></div>

							<input type='hidden' id='area__de__accion__llamados' name='area__de__accion__llamados' />

							<div class='col col-4' style='font-weight:bold;'>

								OBJETIVO ESTRATÉGICO INSTITUCIONAL:

							</div>

							<div class='objetivo__institucional__estrategicos col col-5 text-left'></div>

							<input type='hidden' id='objetivo__institucional__estrategicos' name='objetivo__institucional__estrategicos' />

							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								V. SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

							</div>


							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								V.I PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

							</div>

							
							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='presupuesto__segun__poas' name='presupuesto__segun__poas' style='border:none!important;' readonly='' />	

							</div>

							
							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								PERÍODO EVALUADO:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='periodo__evaluado' name='periodo__evaluado' style='border:none!important;' readonly='' />

							</div>

							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								MONTO TRANSFERIDO + REMANENTE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='monto__transferido__rema' name='monto__transferido__rema' class='solo__numero__montos' style='width:85%!important;' placeholder='Ingrese remanente'/>

							</div>

							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='monto__reportado__tri' name='monto__reportado__tri' style='border:none!important;' readonly='' />

							</div>


							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								MONTO PROGRAMADO A EJECUTAR AL SEMESTRE (USD):

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='monto__ejecutado__trimestre' name='monto__ejecutado__trimestre' />

							</div>


							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								% DE AVANCE AL SEMESTRE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='avance__trimestre__porcentaje' name='avance__trimestre__porcentaje' />

							</div>

							<div class='col col-6 row d-flex mt-4 text-left' style='font-weight:bold;'>

								% EJECUCIÓN ESPERADA EN RELACIÓN AL MONTO TOTAL:

							</div>

							<div class='col col-6 row d-flex mt-4 text-left' style='font-weight:bold;'>

								% EJECUCIÓN OBTENIDO EN RELACIÓN AL MONTO TOTAL:

							</div>

							<div class='col col-6 row'>

								<div class='col col-8' style='font-weight:bold; display:none!important'>

									I SEMESTRE:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='primer__esperado' name='primer__esperado' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>

								<div class='col col-8' style='font-weight:bold;'>

									I SEMESTRE:

								</div>

								<div class='col col-4'>

									<input type='text' id='segundo__esperado' name='segundo__esperado' />

								</div>


								<div style='display:none!important;'>

									III SEMESTRE:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='tercero__esperado' name='tercero__esperado' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>


								<div class='col col-8' style='font-weight:bold;'>

									II SEMESTRE

								</div>

								<div class='col col-4'>

									<input type='text' id='cuarto__esperado' name='cuarto__esperado' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>


							</div>

							<div class='col col-6 row'>

								<div style='font-weight:bold; display:none!important;'>

									I SEMESTRE:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='primer__ejecucion' name='primer__ejecucion' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>

								<div class='col col-8 ejecutados__al__segundo' style='font-weight:bold;'>

									I SEMESTRE:

								</div>

								<div class='col col-4 ejecutados__al__segundo'>

									<input type='text' id='segundo__ejecucion' name='segundo__ejecucion' class='ancho__total__input' />

								</div>


								<div class='col col-8 ejecutados__al__tercero' style='font-weight:bold;'>

									III SEMESTRE:

								</div>

								<div class='col col-4 ejecutados__al__tercero'>

									<input type='text' id='tercero__ejecucion' name='tercero__ejecucion' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>


								<div class='col col-8 ejecutados__al__cuarto' style='font-weight:bold;'>

									II SEMESTRE:

								</div>

								<div class='col col-4 ejecutados__al__cuarto'>

									<input type='text' id='cuarto__ejecucion' name='cuarto__ejecucion' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>

							</div>



							<div class='col col-12 row d-flex mt-4' style='font-weight:bold;'>

								V.II. RESUMEN DE EJECUCIÓN PRESUPUESTARIA DEL POA

							</div>

							<table class='col col-12'>

								<thead>

									<tr>

										<th><center>ACTIVIDADES</center></th>
										<th style='display:none!important;'><center>MONTO PLANIFICADO POA</center></th>
										<th><center>MONTO PROGRAMADO A<br>EJECUTAR AL<br>SEMESTRE</center></th>
										<th><center>MONTO DE EJECUCIÓN<br>REPORTADO AL<br>SEMESTRE</center></th>
										<th><center>% DE AVANCE<br>AL SEMESTRE</center></th>
										<th class='oculto__sin__esiguefts'><center>MONTO DE<br>EJECUCIÓN EN<br>e-SIGEF2</center></th>
										<th class='oculto__sin__esiguefts'><center>% DE AVANCE<br>AL SEMESTRE<br>EN e-SIGEF2</center></th>

									</tr>

								</thead>

								<tbody class='cuerpo__matricez__seguimientos'></tbody>

								<tfoot class='footer__matricez__seguimientos'></tfoot>

							</table>

							<div class='fila__regresar__a col col-2 mt-2'>

								Observaciones:

							</div>

							<div class='fila__regresar__a col col-10 mt-2'>

								<textarea id='observaciones__seguimientos__cuadros__pdf' name='observaciones__seguimientos__cuadros__pdf' class='ancho__total__textareas'></textarea>

							</div>


							<div class='fila__regresar__a col col-2 mt-2'>

								Recomendaciones:

							</div>

							<div class='fila__regresar__a col col-10 mt-2'>

								<textarea id='recomendaciones__seguimientos__cuadros__pdf' name='recomendaciones__seguimientos__cuadros__pdf' class='ancho__total__textareas'></textarea>

							</div>

							<div class='col col-12 d d-flex justify-content-center'>

								<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

							</div>


							<div class='fila__regresar__a col col-2 mt-4 text-center'>

								<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

							</div>

							<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos'>

								Subir reporte generado en pdf

							</div>

							<div class='fila__regresar__a col col-4 mt-4 text-center'>

								<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

							</div>

							<div class='fila__regresar__a col col-4 mt-4 text-center'>

								<a class='btn btn-primary' id='recomendar__seguimientos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__edicion__parametros($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:98%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							$parametro3

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		

		public function getModalConfiguracion__modificacion($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<table>

									<thead>

										<tr>

											<th>Código</th>
											<th>Actividad</th>
											<th>Indicadores</th>
											<th>Escoger</th>

										</tr>

									</thead>

									<tbody class='body__indicadores__tablas'>



									</tbody>

								</table>

							</section>

							<section class='row'>

								<div class='col col-12 text-center textos__titulos oculto__trimestrales mt-2'>EJECUCIÓN TRIMESTRAL DE METAS POR INDICADOR</div>


								<div class='oculto__trimestrales mt-2'>

									<table>

										<thead>

											<tr>

												<th colspan='1' style='vertical-align:middle;'>Código<br>actividad</th>
												<th colspan='1' style='vertical-align:middle;'>Nombre<br>actividad</th>		
												<th colspan='1' style='vertical-align:middle;'>Indicador</th>

												<th colspan='1' style='vertical-align:middle;'>Total<br>programado</th>
												<th colspan='1' style='vertical-align:middle;'>Total<br>ejecutado</th>
												<th colspan='1' style='vertical-align:middle;'>Documento<br>sustento</th>
												<th colspan='1' style='vertical-align:middle;'>Guardar</th>

											</tr>

										</thead>

										<tbody class='contenedor__trimestres'></tbody>

									</table>

								<div>

							</section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__modificacion__sueldos__salarios($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='text-center textos__titulos col col-12 mt-2'>
									DOCUMENTOS ORGANISMO DEPORTIVO
								</div>


								<div class='col col-3 mt-2' style='font-weight:bold;'>

									Rol de Pago

								</div>

								<div class='col col-3 mt-2'>

									<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='rol__pago__iess' accept='application/pdf'/> 

								</div>


								<div class='col col-3 mt-2' style='font-weight:bold;'>

									Planilla del IESS

								</div>

								<div class='col col-3 mt-2'>

									<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='planilla__iess' accept='application/pdf'/> 

								</div>


								<div class='col col-3 mt-2' style='font-weight:bold;'>

									Comprobante de Pago emitido por el IESS

								</div>

								<div class='col col-3 mt-2'>

									<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='comprobante__pago' accept='application/pdf'/> 

								</div>

								<div class='col col-3 mt-2'>

									<select id='mesPlanificaciones' name='mesPlanificaciones' class='ancho__total__input obligatorios__suel__meses'>

										<option value='0'>--Seleeccione un mes</option>
										<option value='Enero'>Enero</option>
										<option value='Febrero'>Febrero</option>
										<option value='Marzo'>Marzo</option>
										<option value='Abril'>Abril</option>
										<option value='Mayo'>Mayo</option>
										<option value='Junio'>Junio</option>
										<option value='Julio'>Julio</option>
										<option value='Agosto'>Agosto</option>
										<option value='Septiembre'>Septiembre</option>
										<option value='Octubre'>Octubre</option>
										<option value='Noviembre'>Noviembre</option>
										<option value='Diciembre'>Diciembre</option>

									</select>

								</div>

								<div class='col col-3 d d-flex justify-content-center text-center mt-2'>

									<a class='btn btn-primary' id='guardarMes__sueld'><i class='fa fa-floppy-o' aria-hidden='true'></i></a>

								</div>

							</section>

							<section class='row mt-4'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>No.</th>
												<th>Apellidos<br>y Nombres</th>
												<th>No. Cédula<br>de ciudadanía<br> / pasaporte</th>
												<th>Cargo</th>
												<th>Tipo<br>de cargo</th>
												<th>Tiempo<br>de trabajo<br>(en meses)</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__sueldos__salarios__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__modificacion__honorarios($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>No.</th>
												<th>Apellidos<br>y Nombres</th>
												<th>No. Cédula<br>de ciudadanía<br> / pasaporte</th>
												<th>Cargo</th>
												<th>Honorario mensual<br>(incluido el iva)</th>
												<th>Tipo<br>cargo</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__honorarios__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__honorarios'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__administrativos($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Justificación<br>de la adquisición<br>del bien o servicio</th>
												<th>Cantidad<br>del bien o<br>servicio a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__adminsitrativas__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__administrativas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}


		public function getModalConfiguracion__mantenimiento($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Nombre de la infraestructura<br>o escenario deportivo</th>
												<th>Tipo de intervención</th>
												<th>Detallar el tipo<br> de intervención que se<br>ha planificado realizar</th>
												<th>Tipo<br>de Mantenimiento</th>
												<th>Materiales o<br>Servicios a requerir<br>para el mantenimiento</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__mantenimiento__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__mantenimientos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__mantenimiento__tecnico($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Nombre de la infraestructura<br>o escenario deportivo</th>
												<th>Provincia</th>
												<th>Dirección completa</th>
												<th>Estado</th>
												<th>Tipo de<br>recursos con<br>los que se<br>construyó</th>
												<th>Tipo<br>de<br>intervención</th>
												<th>Detallar el<br>tipo de intervención<br>que se ha planificado<br>realizar</th>
												<th>Tipo<br>de Mantenimiento</th>
												<th>Materiales<br>o Servicios<br>a requerir para<br>el mantenimiento</th>
												<th>Fecha de<br>último mantenimiento realizado</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__mantenimiento__tecnicos__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__mantenimientos__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__capacitacion($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__capacitacion__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__capacitacion__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__capacitacion__tecnico($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Nombre<br>del evento</th>
												<th>Deporte</th>
												<th>Provincia</th>
												<th>Sede ciudad<br>país</th>
												<th>Género</th>
												<th>Categoría</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__capacitacion__tecnica__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__capacitacion__tecnicos__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia__tecnica__formativa($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Nombre<br>del evento</th>
												<th>Deporte</th>
												<th>Provincia</th>
												<th>Sede ciudad<br>país</th>
												<th>Género</th>
												<th>Categoría</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__formativa__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia__formativas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia__tecnica__altoRendimiento($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Deporte</th>
												<th>Tipo<br>de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Sede ciudad<br>país</th>
												<th>Alcance</th>
												<th>Género</th>
												<th>Categoría<br>del<br>plan de<br>alto rendimiento</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__alto__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia__alto'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}


		public function getModalConfiguracion__recreativo($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__recreativo__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__recreativo'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}



		public function getModalConfiguracion__recreativo__tecnico($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Deporte</th>
												<th>Tipo<br>de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Sede ciudad<br>país</th>
												<th>Alcance</th>
												<th>Género</th>
												<th>Categoría<br>del<br>plan de<br>alto rendimiento</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__recreativo__tecnico__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__tecnico__recreativo'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}


		public function getModalConfiguracion__implementacion($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__implementacion__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__implementacion'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__autoegestion($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='col col-8 text-center' style='font-weight:bold;'>

									¿Posee autogestión?

								</div>

								<div class='col col-4 text-left'>

									<select id='autogestionSelect' class='ancho__total__input'>

										<option value='0'>--Seleccione--</option>
										<option value='si'>Si</option>
										<option value='no'>No</option>

									</select>

								</div>

							</section>

							<section class='contenedor__tabla__autogestion row' style='display:none!important;'>


							</section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}


		public function getModalVacioXl($parametro1, $parametro2, $parametro3, $parametro4, $parametro6)
		{

			$modal = "

			<div  class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true' data-backdrop='static' data-keyboard='false' >

				<div class='modal-dialog modal-xl'>

					<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

							<div class='col' style='z-index: 1;'>

							<h5 class='modal-title' id='$parametro3'>$parametro3</h5>

							</div>

							<div class='col col-1' style='z-index: 2;'>

							<button type='button' id='$parametro6' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

							</div>

						</div>
						

						<div id='$parametro4' class='modal-body row'>

					
						</div>

						

					</form>

				</div>

			</div>
			";

			return $modal;
		}

		public function getModalConfiguracion__modificacion1($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar '>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='row'>							
							<div class='col-md-3'>
								<div class='col-md-12'>								
									<label>Estado de cuenta</label>
								</div>
								<div class='col-md-12 mt-2'>
									<input type='file' accept='application/pdf' class='ancho__total__input obligatorios_estado_cuenta_indicadores' id='estado_cuenta_indicadores' accept='application/pdf'/> 
								</div>
							</div>
							<div class='col-md-1'>
								<div class='col-md-12 text-center'>								
									<label>Guardar</label>
								</div>
								<div class='col-md-12 text-center'>
									<a class='btn btn-primary text-center' id='guardar_estado_cuenta_indicadores'><i class='fa fa-floppy-o' aria-hidden='true'></i></a>
								</div>
							</div>
						</div>

						<div class='modal-body row'>

							<section class='row'>
								
							
							<table >
							

									<thead>

										<tr>

											<th>Código</th>
											<th>Actividad</th>
											<th>Indicadores</th>
											<th>Meta Programada</th>
											<th>Meta Alcanzada</th>
											<th>Guardar</th>

										</tr>

									</thead>

									<tbody class='body__indicadores__tablas1'>



									</tbody>

								</table>

							</section>

							<section class='row'>

								<div class='col col-12 text-center textos__titulos oculto__trimestrales mt-2'>EJECUCIÓN TRIMESTRAL DE METAS POR INDICADOR</div>


								<div class='oculto__trimestrales mt-2'>

									<table>

										<thead>

											<tr>

												<th colspan='1' style='vertical-align:middle;'>Código<br>actividad</th>
												<th colspan='1' style='vertical-align:middle;'>Nombre de<br>actividad</th>		
												<th colspan='1' style='vertical-align:middle;'>Indicador</th>

												<th colspan='1' style='vertical-align:middle;'>Meta<br>programada</th>
												<th colspan='1' style='vertical-align:middle;'>Meta<br>alcanzada</th>
												<th colspan='1' style='vertical-align:middle;'>Documento de<br>sustento</th>
												<th colspan='1' style='vertical-align:middle;'>Guardar</th>

											</tr>

										</thead>

										<tbody class='contenedor__trimestres1'></tbody>

									</table>

								<div>

							</section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia__tecnica__formativa2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Evento</th>
												<th>Deporte</th>
												<th>Provincia</th>
												<th>Sede ciudad<br>país</th>
												<th>Género</th>
												<th>Categoría</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Fecha Inicio</th>
												<th>Fecha Fin</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__formativa__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia__formativas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__reporteria__organismos__seguimientos2($parametro1,$parametro2,$parametro3,$parametro4){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>
						
					    <div class='col col-11 text-center'>
						

					    	<h5 class='modal-title $parametro2'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						

						<table id='$parametro3'>

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

						<div class='col col-12 contenedor__sueldos__salarios'></div>

						</div>


					</div>

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function getModalConfiguracion__administrativos2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar '>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						

						<div class='modal-body row'>

							<section class='row'>
								

								<div class='row'>
									<div class='col-md-3'>
										<div class='col-md-12'>								
											<label>Estado de cuenta</label>
										</div>
										<div class='col-md-12 mt-2'>
											<input type='file' accept='application/pdf' class='ancho__total__input obligatorios_estado_cuenta' id='estado_cuenta' accept='application/pdf'/> 
										</div>
									</div>
									<div class='col-md-1'>
										<div class='col-md-12 text-center'>								
											<label>Guardar</label>
										</div>
										<div class='col-md-12 text-center'>
											<a class='btn btn-primary text-center' id='guardar_estado_cuenta'><i class='fa fa-floppy-o' aria-hidden='true'></i></a>
										</div>
									</div>

									<div class='text-right col col-8 mt-8'>
										<div class='col-md-12 end-0'>
											<a class='btn btn-primary' id='contratcionActividadAdministrativo' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
										</div>
									
									</div>

									
								</div>



								

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Justificación<br>de la adquisición<br>del bien o servicio</th>
												<th>Cantidad<br>del bien o<br>servicio a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__adminsitrativas__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__administrativas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__modificacion2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar '>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<table id=$parametro4>

									<thead>

										<tr>

											<th>Código</th>
											<th>Actividad</th>
											<th>Indicadores</th>
											<th>Meta Programada</th>
											<th>Meta Alcanzada</th>
											<th>Guardar</th>

										</tr>

									</thead>

									<tbody class='body__indicadores__tablas'>



									</tbody>

								</table>

							</section>

							<section class='row'>

								<div class='col col-12 text-center textos__titulos oculto__trimestrales mt-2'>EJECUCIÓN TRIMESTRAL DE METAS POR INDICADOR</div>


								<div class='oculto__trimestrales mt-2'>

									<table>

										<thead>

											<tr>

												<th colspan='1' style='vertical-align:middle;'>Código<br>actividad</th>
												<th colspan='1' style='vertical-align:middle;'>Nombre de<br>actividad</th>		
												<th colspan='1' style='vertical-align:middle;'>Indicador</th>

												<th colspan='1' style='vertical-align:middle;'>Meta<br>programada</th>
												<th colspan='1' style='vertical-align:middle;'>Meta<br>alcanzada</th>
												<th colspan='1' style='vertical-align:middle;'>Documento de<br>sustento</th>
												<th colspan='1' style='vertical-align:middle;'>Guardar</th>

											</tr>

										</thead>

										<tbody class='contenedor__trimestres'></tbody>

									</table>

								<div>

							</section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__modificacion__sueldos__salarios2023($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar '>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='text-center textos__titulos col col-12 mt-2'>
									DOCUMENTOS ORGANISMO DEPORTIVO
								</div>

								<div class='row'>
									<div class='col-md-4'>
										<div class='col-md-12'>								
											<label>Rol de Pago</label>
										</div>
										<div class='col-md-12 mt-2'>
											<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='rol__pago__iess' accept='application/pdf'/> 
										</div>
									</div>

									<div class='col-md-4'>
										<div class='col-md-12'>
											<label>Planilla del IESS</label>
										</div>
										<div class='col-md-12 mt-2'>
											<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='planilla__iess' accept='application/pdf'/> 
										</div>
									</div>							
								</div>

								<div class='row'>
									<div class='col-md-4'>
										<div class='col-md-12'>
											<label>Comprobante de Pago emitido por el IESS</label>
										</div>
										<div class='col-md-12 mt-2'>
											<input type='file' accept='application/pdf' class='ancho__total__input obligatorios__suel__meses' id='comprobante__pago' accept='application/pdf'/> 
										</div>
									</div>

									<div class='col-md-4'> 
										<div class='col-md-12'>
											<label>Seleccione el mes</label>
										</div>
										<div class='col-md-12 mt-2'>
											<select id='mesPlanificaciones' name='mesPlanificaciones' class='ancho__total__input obligatorios__suel__meses'>
												<option value='0'>--Seleeccione un mes</option>
												<option value='Enero'>Enero</option>
												<option value='Febrero'>Febrero</option>
												<option value='Marzo'>Marzo</option>
												<option value='Abril'>Abril</option>
												<option value='Mayo'>Mayo</option>
												<option value='Junio'>Junio</option>
												<option value='Julio'>Julio</option>
												<option value='Agosto'>Agosto</option>
												<option value='Septiembre'>Septiembre</option>
												<option value='Octubre'>Octubre</option>
												<option value='Noviembre'>Noviembre</option>
												<option value='Diciembre'>Diciembre</option>
											</select>
										</div>
									</div>

									<div class='col-md-4'>
										<div class='col-md-4'>
											<label>Guardar</label>
										</div>
									<div class='col-md-3 d d-flex text-center mt-2'>
										<a class='btn btn-primary' id='guardarMes__sueld'><i class='fa fa-floppy-o' aria-hidden='true'></i></a>
									</div>
								</div>
							</section>

							<section class='row mt-4'>

								<div class='table-wrapper' id='$parametro5'>
								<input type='hidden' id='$parametro6' placeholder='Buscar...'>
								<style>
								/* Estilos para fijar los encabezados */
								table {
									width: 100%;
									border-collapse: collapse;
								}

								th {
									position: sticky;
									top: 0;
									
								}
								</style>
									<table id='$parametro4'>

										<thead>

											<tr>

												<th>No.</th>
												<th>Apellidos<br>y Nombres</th>
												<th>No. Cédula<br>de ciudadanía<br> / pasaporte</th>
												<th>Cargo</th>
												<th>Tipo<br>de cargo</th>
												<th>Tiempo<br>de trabajo<br>(en meses)</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__sueldos__salarios__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__modificacion__honorarios2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar '>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>No.</th>
												<th>Actividad</th>
												<th>Apellidos<br>y Nombres</th>
												<th>No. Cédula<br>de ciudadanía<br> / pasaporte</th>
												<th>Cargo</th>
												<th>Honorario mensual<br>(incluido el iva)</th>
												<th>Tipo<br>cargo</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__honorarios__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__honorarios'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__mantenimiento2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='text-right col col-12 mt-12'>
									<div class='col-md-12 end-0'>
										<a class='btn btn-primary' id='contratcionActividadesMantenimiento' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
									</div>
											
								</div>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Nombre de la infraestructura<br>o escenario deportivo</th>
												<th>Tipo de intervención</th>
												<th>Detallar el tipo<br> de intervención que se<br>ha planificado realizar</th>
												<th>Tipo<br>de Mantenimiento</th>
												<th>Materiales o<br>Servicios a requerir<br>para el mantenimiento</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__mantenimiento__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__mantenimientos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__mantenimiento__tecnico2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Nombre de la infraestructura<br>o escenario deportivo</th>
												<th>Provincia</th>
												<th>Dirección completa</th>
												<th>Estado</th>
												<th>Tipo de<br>recursos con<br>los que se<br>construyó</th>
												<th>Tipo<br>de<br>intervención</th>
												<th>Detallar el<br>tipo de intervención<br>que se ha planificado<br>realizar</th>
												<th>Tipo<br>de Mantenimiento</th>
												<th>Materiales<br>o Servicios<br>a requerir para<br>el mantenimiento</th>
												<th>Fecha de<br>último mantenimiento realizado</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__mantenimiento__tecnicos__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__mantenimientos__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__capacitacion2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

						

							<section class='row'>

								<div class='text-right col col-12 mt-12'>
									<div class='col-md-12 end-0'>
										<a class='btn btn-primary' id='contratcionActividadesCapacitacion' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
									</div>
											
								</div>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__capacitacion__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__capacitacion__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__capacitacion__tecnico2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Nombre<br>del evento</th>
												<th>Deporte</th>
												<th>Provincia</th>
												<th>Sede ciudad<br>país</th>
												<th>Género</th>
												<th>Categoría</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__capacitacion__tecnica__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__capacitacion__tecnicos__tecnicos'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='text-right col col-12 mt-12'>
									<div class='col-md-12 end-0'>
										<a class='btn btn-primary' id='contratcionActividadesCompetencia' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
									</div>
											
								</div>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__competencia__tecnica__altoRendimiento2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Deporte</th>
												<th>Tipo<br>de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Sede ciudad<br>país</th>
												<th>Alcance</th>
												<th>Género</th>
												<th>Categoría<br>del<br>plan de<br>alto rendimiento</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Fecha<br>Inicio</th>
												<th>Fecha<br>Fin</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__competencia__alto__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__competencia__alto'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__recreativo2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>


						<div class='modal-body row'>

							<section class='row'>

								<div class='text-right col col-12 mt-12'>
									<div class='col-md-12 end-0'>
										<a class='btn btn-primary' id='contratcionActividadesRecreativo' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
									</div>
											
								</div>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__recreativo__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__recreativo'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__recreativo__tecnico2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Deporte</th>
												<th>Tipo<br>de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Sede ciudad<br>país</th>
												<th>Alcance</th>
												<th>Género</th>
												<th>Categoría<br>del<br>plan de<br>alto rendimiento</th>
												<th>No. entrenadores<br>oficiales</th>
												<th>No. atletas</th>
												<th>Total<br>de atletas</th>
												<th>Mújeres<br>beneficiarios</th>
												<th>Hombres<br>beneficiarios</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__recreativo__tecnico__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__tecnico__recreativo'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__implementacion2023($parametro1,$parametro2,$parametro3,$parametro4){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>


						<div class='modal-body row'>

							<section class='row'>

								<div class='text-right col col-12 mt-12'>
									<div class='col-md-12 end-0'>
										<a class='btn btn-primary' id='contratcionActividadesImplementacion' data-bs-toggle='modal' data-bs-target='#contratcionActividades'>Editar Contratación Pública</a>
									</div>
											
								</div>

								<div class='table-wrapper'>

									<table id='$parametro4'>

										<thead>

											<tr>

												<th>Código Ítem</th>
												<th>Ítem</th>
												<th>Tipo de<br>financiamiento</th>
												<th>Nombre<br>del evento</th>
												<th>Detalle lo que<br>el organismo<br>va a adquirir</th>
												<th>Justificación<br>de la adquisición<br>del bien<br>o servicio</th>
												<th>Cantidad del<br>bien o servicio<br>a adquirir</th>
												<th>Escoger</th>

											</tr>

										</thead>

										<tbody class='body__implementacion__tablas'>

											
										</tbody>

									</table>

								</div>

							</section>

							<section class='contenedor__pestanas__implementacion'></section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__autoegestion2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog modal-xl'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4'>

						<div class='modal-header row $parametro3'>

						    <div class='col col-11 text-center'>

						    	<h5 class='modal-title'>$parametro2</h5>

						    </div>

						    <div class='col col-1'>

						    	<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

						    </div>

						</div>

						<div class='modal-body row'>

							<section class='row'>

								<div class='col col-8 text-center' style='font-weight:bold;'>

									¿Posee autogestión?

								</div>

								<div class='col col-4 text-left'>

									<select id='autogestionSelect' class='ancho__total__input'>

										<option value='0'>--Seleccione--</option>
										<option value='si'>Si</option>
										<option value='no'>No</option>

									</select>

								</div>

							</section>

							<section class='contenedor__tabla__autogestion row' style='display:none!important;'>


							</section>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function getModalConfiguracion__reporteria__organismos__seguimientos3($parametro1,$parametro2,$parametro3,$parametro4,$parametro5){


			$modal="

			<div class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true'>

				<div class='modal-dialog' style='min-width:100%!important;'>

					<form class='modal-content formularioConfiguracion'>

					<div class='modal-header row'>
						
					    <div class='col col-11 text-center'>
						

					    	<h5 class='modal-title $parametro2'>$parametro2</h5>

					    </div>

					    <div class='col col-1'>

					    	<button type='button' id='$parametro5' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

					    </div>

					</div>

					<div class='modal-body row'>

						<div style='width:100%;'>

						<div class='col col-12 contenedor__sueldos__salarios'></div>

						<table id='$parametro3'>

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


		public function getModalVacio($parametro1, $parametro2, $parametro3, $parametro4, $parametro6)
		{

			$modal = "

			<div  class='modal fade modal__ItemsGrup' id='$parametro1' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog modal-lg'>

					<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

							<div class='col' style='z-index: 1;'>

							<h5 class='modal-title' id='$parametro3'>$parametro3</h5>

							</div>

							<div class='col col-1' style='z-index: 2;'>

							<button type='button' id='$parametro6' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>

							</div>

						</div>
						

						<div id='$parametro4' class='modal-body row'>

					
						</div>

						

					</form>

				</div>

			</div>
			";

			return $modal;
		}


		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__reporterias__recorridos2023($parametro1,$parametro2,$parametro3){


			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formularioConfiguracion'>


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span id='cerrarRecorridoSeguimeintoModal' class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>


						</div>

					<div class='modal-body row $parametro3'>

					<input type='hidden' name='tabChange' id='tabChange'/>

					


					<ul class='nav nav-underline' id='myTab' role='tablist'>
					<li class='nav-item'><a class='nav-link active' id='general-tab' data-bs-toggle='tab' href='#tab-General' role='tab' aria-controls='tab-General' aria-selected='true' area='general'>General</a></li>
					<li class='nav-item'><a class='nav-link' id='seguimiento-tab' data-bs-toggle='tab' href='#tab-Seguimiento' role='tab' aria-controls='tab-Seguimiento' aria-selected='false' area='seguimiento'>Seguimiento</a></li>
					<li class='nav-item'><a class='nav-link' id='adFin-tab' data-bs-toggle='tab' href='#tab-adFin' role='tab' aria-controls='tab-adFin' aria-selected='false'area='adFin'>Administrativa Financiera</a></li>
					<li class='nav-item'><a class='nav-link' id='actFis-tab' data-bs-toggle='tab' href='#tab-actFis' role='tab' aria-controls='tab-actFis' aria-selected='true' area='actFis'>Actividad Física</a></li>
					<li class='nav-item'><a class='nav-link' id='altoRen-tab' data-bs-toggle='tab' href='#tab-altoRen' role='tab' aria-controls='tab-altoRen' aria-selected='false' area='altoRen'>Alto Rendimiento</a></li>
					<li class='nav-item'><a class='nav-link' id='infra-tab' data-bs-toggle='tab' href='#tab-infra' role='tab' aria-controls='tab-infra' aria-selected='false'area='infra'>Administración e Infraestructura</a></li>
					</ul>
					
					<div class='tab-content mt-3' id='myTabContent' style='border: 1px solid gray;'>

					<div class='tab-pane fade show active' id='tab-General' role='tabpanel' aria-labelledby='general-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido General
						</div>

						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					<div class='tab-pane fade' id='tab-Seguimiento' role='tabpanel' aria-labelledby='seguimiento-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido Dirección de Seguimiento de Planes, Programas y Proyectos
						</div>
						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					<div class='tab-pane fade' id='tab-adFin' role='tabpanel' aria-labelledby='adFin-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido Coordinación General Administrativa Financiera
						</div>
						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					<div class='tab-pane fade' id='tab-actFis' role='tabpanel' aria-labelledby='actFis-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido Subsecretaría de Desarrollo de la Actividad Física
						</div>
						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					<div class='tab-pane fade' id='tab-altoRen' role='tabpanel' aria-labelledby='altoRen-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido Subsecretaría de Deporte de Alto Rendimiento
						</div>
						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					<div class='tab-pane fade' id='tab-infra' role='tabpanel' aria-labelledby='infra-tab'>
						<div class='col col-12 text-center mt-2 titulo__enfasis'>
							Recorrido Coordinación de Administración e Infraestructura Deportiva
						</div>
						<table style='margin-top:.5em!important; width:100%!important;'>

							<thead>

								<tr>

									<th colspan='5'>

										<center>RECORRIDO</center>

									</th>

								</tr>

								<tr>

									<th>FECHA</th>
									<th>ESTADO</th>
									<th>ÁREA</th>
									<th>USUARIO ACTUAL</th>
									<th>OBSERVACIONES</th>

								</tr>

							</thead>

							<tbody class='cuerpo__contenedor__recorridos'></tbody>

						</table>
					</div>

					
					</div>
					
					</div>

					

					</form>

				</div>

			</div>

			";

			return $modal;


		}

		public function get__modal__plantilla__inicios__seguimientos__Contratacion_Publica($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos__Financiero'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />

						<input type='hidden' id='indicadorArray' name='indicadorArray' />
						<input type='hidden' id='metaProgramadaArray' name='metaProgramadaArray' />
						<input type='hidden' id='metaResultadoArray' name='metaResultadoArray' />
						<input type='hidden' id='porcentajeCumplimientoArray' name='porcentajeCumplimientoArray' />
						<input type='hidden' id='areaAccion' name='areaAccion' />
						<input type='hidden' id='objetivoS' name='objetivoS' />

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#1b5e20; color:white;padding-top:1.5em;padding-bottom:1.5em;'>
								<div class='checkActividades'>
								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSET - <span class='siglas__dinamicas'  style='font-weight:bold;'></span> - <span class='numerico__dinamicas'></span>
								
								</div>
								<div class='checkContratacion'>
								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSEPC - <span class='siglas__dinamicas'  style='font-weight:bold;'></span> - <span class='numerico__dinamicas'></span>
								
								</div>
								
								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>
								<input type='hidden' id='tipoInforme' name='tipoInforme'/>

							</div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-4'>

								<select class='ancho__total__input__selects selects__superiores1 superior__sin' id='selects__superiores1'></select>
								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>


							<div class='fila__reasignar col col-2 '>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__contratacionPublica'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-4'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__contratacionPublica'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>


							<div class='col col-3'>

								Reporte Técnico Actividad 001 
								<br>
								<br>
								Reporte de Procedimientos de Contratación

							</div>

							<div class='col col-1'>

								<input type='checkbox' id='seguimiento__tables' class='checkeds' />
								<br>
								<br>
								<input type='checkbox' id='seguimiento__tables_Contratacion_Publica' class='checkeds' />

							</div>


							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

							<div class='row oculto__informacion'>

								<input type='hidden' id='organismoOculto__modal' />

									<div class='col col-2 textos__titulos'>

										I EJERCICIO FISCAL

									</div>

									<div class='col col-1' style='font-weight:bold;'>

										AÑO 

									</div>

									<div class='col col-4 text-left periodo__evaluados__anuales1'></div>
									<input type='hidden' id='periodo__evaluados__anuales1' name='periodo__evaluados__anuales1' />

									
									<input type='hidden' id='trimestre__evaluados__al' name='trimestre__evaluados__al' />


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-7 row'>

											<div class='col col-12 text-left textos__titulos'>

												II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

											</div>

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												NOMBRE DE LA ORGANIZACIÓN:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												RUC DE LA ORGANIZACIÓN:

											</div>

											<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PRESIDENTE O REPRESENTANTE LEGAL:

											</div>

											<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

											</div>

											<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												DIRECCIÓN COMPLETA:

											</div>

											<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


										</div>

										<div class='col col-5 row'>

											<div class='col col-12 text-left textos__titulos'>

												III. UBICACIÓN GEOGRÁFICA

											</div>


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PROVINCIA:

											</div>

											<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CANTÓN:

											</div>

											<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PARROQUIA:

											</div>

											<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />


											<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

										</div>

									</div>

									<div class='textos__titulos' style='display:none!important;'>

										IV. DATOS GENERALES DEL CONVENIO

									</div>

									<div style='font-weight:bold; display:none!important;'>

										NÚMERO DE CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

									</div>

									<div style='font-weight:bold;display:none!important;'>

										ADMINISTRADOR DEL CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-4' style='font-weight:bold;display:none!important;'>

										DOCUMENTO DE DESIGNACIÓN:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-12 textos__titulos'>

										IV. ALINEACIÓN A LA PLANIFICACIÓN

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										ÁREA DE ACCIÓN:

									</div>


									<div class='col col-8 areaAccion' style='font-weight:bold;'></div>

									<div class='col col-4' style='font-weight:bold;'>

										OBJETIVO ESTRATÉGICO INSTITUCIONAL:

									</div>


									<div class='col col-8 objetivoS' style='font-weight:bold;'></div>

									<div class='col col-12 textos__titulos'>

										 V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

									</div>

									<div class='col col-12' style='font-weight:bold;'>

										V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										PERÍODO EVALUADO:

									</div>


									<div class='col col-8 periodo__evaluado' style='font-weight:bold;'></div>

									<input type='hidden' id='periodo__evaluado' name='periodo__evaluado' />


									<div class='col col-4' style='font-weight:bold;'>

										PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

									</div>


									<div class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__asignado__pais__altos' name='presupuesto__asignado__pais__altos' />


									<div class='col col-12 textos__titulos'>

										V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

									</div>

									<div class='col col-12 text-center' style='font-weight:bold!important;'>

										AVANCE DE METAS

									</div>

									<table class='mt-4 col col-12'>

										<thead>

											<tr>

												<th>
													<center>ACTIVIDADES</center>
												</th>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>

												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>

												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos'></tbody>

										<tfoot class='footer__altos__indicadores'></tfoot>

									</table>

									<div class='row g-2'>
										
											<div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div>
													
											100% - 85%;

											<div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
											
											84,99% - 70%;

											<div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
											
											69,99% - 0%
									
                					</div>

									<div class='oculto_directivos'>
									
									<div class='col col-12 textos__titulos' style='margin:1em 0;'>

										V.III. VERIFICACIÓN DE INFORMACIÓN: ACTIVIDAD 001

									</div>

									<div class='col col-12 mt-2' style='font-weight:bold;'>

										Pago Servicios Básicos:

									</div>


									<table class='col col-12 mt-2'>

										<thead>

											<tr>

												<th>

													<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

												</th>


												<th>

													<center>ÍTEMS</center>

												</th>

												<th>

													<center>ESTADO</center>

												</th>

												<th>

													<center>Nro. FACTURA / CUR</center>

												</th>

												<th>

													<center>MONTO OBSERVADO</center>

												</th>

												<th>

													<center>DETALLE DE OBSERVACIONES</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
												Pago de agua potable
												</td>


												<td>
												530101
												</td>

												<td>
													<select id='reporteaguapotable' name='reporteaguapotable' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Cumple'>Cumple</option>
														<option value='No Cumple'>No Cumple</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
														
													</select>
												</td>
		
												<td>
												<input type='text' id='aguapotableFactura' name='aguapotableFactura' class='ancho__total__input' value=' '/>
												</td>

												<td>
												<input type='text' id='aguapotableValor' name='aguapotableValor' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

												</td>

												<td>
												<input type='text' id='aguapotableObservacion' name='aguapotableObservacion' class='ancho__total__input' value=' '/>
												</td>

												

											</tr>

											<tr>

												<td>
												Agua de riego
												</td>


												<td>
												530102
												</td>

												<td>
													<select id='reporteAguaRiego' name='reporteAguaRiego' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Cumple'>Cumple</option>
														<option value='No Cumple'>No Cumple</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>
		
												<td>
												<input type='text' id='aguaRiegoFactura' name='aguaRiegoFactura' class='ancho__total__input' value=' '/>
												</td>

												<td>
												<input type='text' id='aguaRiegoValor' name='aguaRiegoValor' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

												</td>

												<td>
												<input type='text' id='aguaRiegoObservacion' name='aguaRiegoObservacion' class='ancho__total__input' value=' '/>
												</td>

												

											</tr>



											<tr>

												<td>
												Pago de energía eléctrica 
												</td>


												<td>
												530104
												</td>

												<td>
													<select id='reporteEnergiaElec' name='reporteEnergiaElec' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Cumple'>Cumple</option>
														<option value='No Cumple'>No Cumple</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>
		
												<td>
												<input type='text' id='energiaElecFactura' name='energiaElecFactura' class='ancho__total__input' value=' '/>
												</td>

												<td>
												<input type='text' id='energiaElecValor' name='energiaElecValor' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

												</td>

												<td>
												<input type='text' id='energiaElecObservacion' name='energiaElecObservacion' class='ancho__total__input' value=' '/>
												</td>

												

											</tr>

											

											<tr>

												<td>
												Telefonía fija 
												</td>


												<td>
												530105
												</td>

												<td>
													<select id='reporteTelefonia' name='reporteTelefonia' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Cumple'>Cumple</option>
														<option value='No Cumple'>No Cumple</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>
		
												<td>
												<input type='text' id='telefoniaFactura' name='telefoniaFactura' class='ancho__total__input' value=' '/>
												</td>

												<td>
												<input type='text' id='telefoniaValor' name='telefoniaValor' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

												</td>

												<td>
												<input type='text' id='telefoniaObservacion' name='telefoniaObservacion' class='ancho__total__input' value=' '/>
												</td>

												

											</tr>

										</tbody>

									</table>

									<div class='col col-12 mt-2' style='font-weight:bold;'>

										Otros Pagos:

									</div>


									<table class='col col-12 cell-border'>

											<thead>

												<tr>

													<th>

														<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

													</th>


													<th>

														<center>ÍTEMS</center>

													</th>

													<th>

														<center>ESTADO</center>

													</th>

													<th>

														<center>Nro. FACTURA / CUR</center>

													</th>

													<th>

														<center>MONTO OBSERVADO</center>

													</th>

													<th>

														<center>DETALLE DE OBSERVACIONES</center>

													</th>

												</tr>

											</thead>

											<tbody id='pagosSinContratacionPublica'>

											</tbody>

									</table>

									<div class='col col-12 mt-2' style='font-weight:bold;'>

										ADQUISICIÓN DE BIENES Y/O CONTRATACIÓN DE SERVICIO:

									</div>


									<table class='col col-12 cell-border'>

											<thead>

												<tr>

													<th>

														<center>DESCRIPCIÓN JUSTIFICACIÓN / TAREA</center>

													</th>


													<th>

														<center>ÍTEMS</center>

													</th>

													<th>

														<center>ESTADO</center>

													</th>

													<th>

														<center>Nro. FACTURA / CUR</center>

													</th>

													<th>

														<center>MONTO OBSERVADO</center>

													</th>

													<th>

														<center>DETALLE DE OBSERVACIONES</center>

													</th>

												</tr>

											</thead>

											<tbody id='pagosConContratacionPublica'>

											</tbody>

									</table>

									</div>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguis' name='observaciones__alto__seguis'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguis' name='recomendaciones__alto__seguis'></textarea>


									<div class='col col-12 d d-flex justify-content-center '>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>									

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos oculto_directivos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos oculto_directivos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos oculto_directivos'>

										<input type='file' accept='application/pdf' id='archivoSubido__actividad1' name='archivoSubido__actividad1'>

									</div>


							</div>

						

							<div class='row oculto__informacion_Contratacion_Publica'>

								<input type='hidden' id='organismoOculto__modal' />

								<div class='col col-2 textos__titulos'>

									I EJERCICIO FISCAL

								</div>

								<div class='col col-1' style='font-weight:bold;'>

									AÑO 

								</div>

								<div class='col col-4 text-left periodo__evaluados__anuales1'></div>
								<input type='hidden' id='periodo__evaluados__anualesContratacion1' name='periodo__evaluados__anualesContratacion1' />

								
								<input type='hidden' id='trimestre__evaluados__alContratacion' name='trimestre__evaluados__alContratacion' />


								<div class='col col-12 row d-flex mt-4'>

									<div class='col col-7 row'>

										<div class='col col-12 text-left textos__titulos'>

											II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

										</div>

										<div class='col col-6 mt-2' style='font-weight:bold;'>

											NOMBRE DE LA ORGANIZACIÓN:

										</div>

										<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='nombre__organizacion__deportivasContratacion' name='nombre__organizacion__deportivasContratacion' />


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											RUC DE LA ORGANIZACIÓN:

										</div>

										<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='ruc__organizacion__deportivasContratacion' name='ruc__organizacion__deportivasContratacion' />

										<div class='col col-6 mt-2' style='font-weight:bold;'>

											PRESIDENTE O REPRESENTANTE LEGAL:

										</div>

										<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

										</div>

										<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='correo__organizacion__deportivasContratacion' name='correo__organizacion__deportivasContratacion' />


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											DIRECCIÓN COMPLETA:

										</div>

										<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='direccion__organizacion__deportivasContratacion' name='direccion__organizacion__deportivasContratacion' />


									</div>

									<div class='col col-5 row'>

										<div class='col col-12 text-left textos__titulos'>

											III. UBICACIÓN GEOGRÁFICA

										</div>


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											PROVINCIA:

										</div>

										<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='provincia__organizacion__deportivasContratacion' name='provincia__organizacion__deportivasContratacion' />


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											CANTÓN:

										</div>

										<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='canton__organizacion__deportivasContratacion' name='canton__organizacion__deportivasContratacion' />


										<div class='col col-6 mt-2' style='font-weight:bold;'>

											PARROQUIA:

										</div>

										<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

										<input type='hidden' id='parroquia__organizacion__deportivasContratacion' name='parroquia__organizacion__deportivasContratacion' />


										<input type='hidden' id='barrio__organizacion__deportivasContratacion' name='barrio__organizacion__deportivasContratacion' />

									</div>

								</div>

								<div class='textos__titulos' style='display:none!important;'>

									IV. DATOS GENERALES DEL CONVENIO

								</div>

								<div style='font-weight:bold; display:none!important;'>

									NÚMERO DE CONVENIO:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

								</div>

								<div style='font-weight:bold;display:none!important;'>

									ADMINISTRADOR DEL CONVENIO:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

								</div>

								<div class='col col-4' style='font-weight:bold;display:none!important;'>

									DOCUMENTO DE DESIGNACIÓN:

								</div>

								<div style='display:none!important;'>

									<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

								</div>

								<div class='col col-12 textos__titulos'>

										IV. ALINEACIÓN A LA PLANIFICACIÓN

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										ÁREA DE ACCIÓN:

									</div>


									<div class='col col-8 areaAccion' style='font-weight:bold;'></div>

									<div class='col col-4' style='font-weight:bold;'>

										OBJETIVO ESTRATÉGICO INSTITUCIONAL:

									</div>


									<div class='col col-8 objetivoS' style='font-weight:bold;'></div>

								<div class='col col-12 textos__titulos'>

									V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

								</div>

								<div class='col col-12' style='font-weight:bold;'>

									V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

								</div>

								<div class='col col-4' style='font-weight:bold;'>

									PERÍODO EVALUADO:

								</div>

								<div  class='col col-8 periodo__evaluadoContratacion' style='font-weight:bold;'></div>

								<input type='hidden' id='periodo__evaluadoContratacion' name='periodo__evaluadoContratacion' />


								<div class='col col-4' style='font-weight:bold;'>

									PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

								</div>

								<div  class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

								<input type='hidden' id='presupuesto__asignado__pais__altosContratacion' name='presupuesto__asignado__pais__altosContratacion' />

								<div class='oculto_directivos'>
								
									<div class='col col-12 ' style='overflow:auto;scrollbar-base-color:gold;'>

										<table class='col col-12 cell-border'>

											<thead>

												<tr>

													<th colspan='4' style='background-color: #878783;'>

														<center>PLANIFICADO</center>

													</th>

													<th colspan='6' style='background-color: #7d818c;'>

														<center>EJECUTADO</center>

													</th>

													<th colspan='4' style='background-color: #95877e;'>

														<center>VERIFICACIÓN DE LA APLICACIÓN DE PROCEDIMIENTOS DE CONTRATACIÓN PÚBLICA</center>

													</th>

												</tr>

												<tr>

													<th style='background-color: #878783;'>
														<center>CÓDIGO ACTIVIDAD</center>
													</th>

													<th style='background-color: #878783;'>
														<center>ÍTEM</center>
													</th>

													<th style='background-color: #878783;'>
														<center>DESCRIPCIÓN DEL ÍTEM</center>
													</th>

													

													<th style='background-color: #878783;'>
														<center>MONTO PLANIFICADO</center>
													</th>

													

													<th style='background-color: #7d818c;'>
														<center>TIPO DE CONTRATACIÓN</center>
													</th>
													<th style='background-color: #7d818c;'>
													<center>OBJETO DE LA CONTRATACIÓN</center>
													</th>
													<th style='background-color: #7d818c;'>
														<center>MONTO DE LA CONTRATACIÓN </center>
													</th>

													<th style='background-color: #7d818c;'>
														<center>PROVEEDOR </center>
													</th>

													<th style='background-color: #7d818c;'>
														<center>RUC</center>
													</th>

													<th style='background-color: #7d818c;'>
														<center>LINK DE LA PUBLICACIÓN EN EL PORTAL DE COMPRAS PÚBLICAS</center>
													</th>

													<th style='background-color: #95877e;'>
														<center>CUMPLE LOS MONTOS VIGENTES DE CONTRATACIÓN PUBLICA</center>
													</th>

													<th style='background-color: #95877e;'>
														<center>EVIDENCIA DE RECURRENCIA DE ÍNFIMAS CUANTÍAS CON UNA MISMA NATURALEZA DEL GASTO</center>
													</th>

													<th style='background-color: #95877e;'>
														<center> PROCEDIMIENTOS DE CONTRATACIÓN VERIFICADOS</center>
													</th>

													<th style='background-color: #95877e;'>
														<center> OBSERVACIONES</center>
													</th>

												</tr>

											</thead>

											<tbody id='tablaCalificacionContratacionPublica'>

											</tbody>

										</table>
									</div>

								</div>
									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguisContratacion' name='observaciones__alto__seguisContratacion'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguisContratacion' name='recomendaciones__alto__seguisContratacion'></textarea>


									<div class='col col-12 d d-flex justify-content-center'>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>									

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos oculto_directivos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos oculto_directivos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos oculto_directivos'>

										<input type='file' accept='application/pdf' id='archivoSubido__ContratacionPublica' name='archivoSubido__ContratacionPublica'>

									</div>

									<input type='hidden' id='rotulo__recomendado' name='rotulo__recomendado' value='contratacionPublica'/>

									<div class=' col col-12     oculto_directivos' style='display: flex; justify-content: center; align-items: center;'>

									<a class='btn btn-primary' id='recomendarcontratacionPublica' centre><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

									</div>
							</div>


							

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}

		public function get__modal__plantilla__inicios__seguimientos__Contratacion_Publica__recomendados($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento_Contratacion' name='nombreDocumento_Contratacion' />
							<input type='hidden' id='nombreDocumento_actividad1' name='nombreDocumento_actividad1' />


							<div class='col col-3'>

								<a id='informe__recomendados' target='_blank'>Descargar Informe recomendado Actividad 1</a>

							</div>

							<div class='col col-3'>

								<a id='informe__recomendadosContratacion' target='_blank'>Descargar Informe recomendado Contratación Pública</a>

							</div>

							<div class='col col-6 oculto__subsess__deseados' style='font-weight:bold!important;'>
								<div class='row'>
									<div class='col col-6'>
									Subir archivo firmado Actividad 1
									</div>
									<div class='col col-6'>
									<input type='file' accept='application/pdf' id='informe__recomendado_actividad1' name='informe__recomendado_actividad1' class='ancho__total__input'/>
									</div>
									<div class='w-100'></div>
									<div class='col col-6'>
									Subir archivo firmado Contratación Pública
									</div>
									<div class='col col-6'>
										<input type='file' accept='application/pdf' id='informe__recomendado_contratacion' name='informe__recomendado_contratacion' class='ancho__total__input'/>
									</div>
								</div>
							</div>

							

							<div class='col col-2 mt-2' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='col col-8 mt-2'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

								<div class='direccion__seguimientos__ocultos'>Dirección de Seguimiento, Planes, Programas y Proyectos</div>

								<div class='ocultosZonalesCoordinadorRecomendar' style='display: none;'>Recomendar Presupuestarios Zonales</div>

							</div>

							<div class='col col-2 mt-2'>

								<a class='btn btn-warning' id='recomendar__Contratacion__recomendados'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								
								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>
								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

								

								
							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendadosContratacion'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	

		public function get__modal__plantilla__inicios__seguimientos__actividad__fisica2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos__act__deportivas2023'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />
						<input type='hidden' id='tipoAct' name='tipoAct' />


						<input type='hidden' id='indicadorArray' name='indicadorArray' />
						<input type='hidden' id='metaProgramadaArray' name='metaProgramadaArray' />
						<input type='hidden' id='metaResultadoArray' name='metaResultadoArray' />
						<input type='hidden' id='porcentajeCumplimientoArray' name='porcentajeCumplimientoArray' />
						<input type='hidden' id='areaAccion' name='areaAccion' />
						<input type='hidden' id='objetivoS' name='objetivoS' />

					


						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#1b5e20; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA -  RSET - <span class='siglas__dinamicas' style='font-weight:bold;'></span> - <span class='numerico__dinamicas'></span>

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-4'>

								<select class='ancho__total__input__selects selects__superiores1 superior__sin' id='selects__superiores1'></select>

								<select class='ancho__total__input__selects selects__superiores1 superior__con' id='selects__superiores__subsess'></select>

							</div>


							<div class='fila__reasignar col col-2 reasignar__solo text-center'>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__actividad__fisicas2023'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-4'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors__acFisicas'>
								</select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__actividad__fisicas2023'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>


							<div class='col col-3'>

								Click para ver reporte

							</div>

							<div class='col col-1'>

								<input type='checkbox' id='seguimiento__tables' class='checkeds' />

							</div>



							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>


							<div class='row oculto__informacion'>

								<input type='hidden' id='organismoOculto__modal' />

									<div class='col col-2 textos__titulos'>

										I EJERCICIO FISCAL

									</div>

									<div class='col col-1' style='font-weight:bold;'>

										AÑO 

									</div>

									<div class='col col-4 text-left periodo__evaluados__anuales'></div>
									<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />

									
									<input type='hidden' id='trimestre__evaluados__al' name='trimestre__evaluados__al' />


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-7 row'>

											<div class='col col-12 text-left textos__titulos'>

												II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

											</div>

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												NOMBRE DE LA ORGANIZACIÓN:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												RUC DE LA ORGANIZACIÓN:

											</div>

											<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PRESIDENTE O REPRESENTANTE LEGAL:

											</div>

											<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

											</div>

											<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												DIRECCIÓN:

											</div>

											<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


										</div>

										<div class='col col-5 row'>

											<div class='col col-12 text-left textos__titulos'>

												III. UBICACIÓN GEOGRÁFICA

											</div>


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PROVINCIA:

											</div>

											<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CANTÓN:

											</div>

											<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PARROQUIA:

											</div>

											<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />

											<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

										</div>

									</div>

									<div class='textos__titulos ocultos__paid__documentos' style='display:none!important;'>

										IV. DATOS GENERALES DEL CONVENIO

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold; display:none!important;'>

										NÚMERO DE CONVENIO:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold;display:none!important;'>

										ADMINISTRADOR DEL CONVENIO:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='ocultos__paid__documentos' style='font-weight:bold; display:none!important;'>

										DOCUMENTO DE DESIGNACIÓN:

									</div>

									<div class='ocultos__paid__documentos' style='display:none!important;'>

										<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-12 textos__titulos'>

										 IV. ALINEACIÓN A LA PLANIFICACIÓN

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										ÁREA DE ACCIÓN:

									</div>


									<div class='col col-8 areaAccion' style='font-weight:bold;'></div>

									<div class='col col-4' style='font-weight:bold;'>

										OBJETIVO ESTRATÉGICO INSTITUCIONAL:

									</div>


									<div class='col col-8 objetivoS' style='font-weight:bold;'></div>


									<div class='col col-12 textos__titulos'>

										 V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

									</div>

									<div class='col col-12' style='font-weight:bold;'>

										V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										PERÍODO EVALUADO:

									</div>


									<div class='col col-8 periodo__evaluado' style='font-weight:bold;'></div>

									<input type='hidden' id='periodo__evaluado' name='periodo__evaluado' />


									<div class='col col-4' style='font-weight:bold;'>

										PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

									</div>


									<div class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__asignado__pais__altos' name='presupuesto__asignado__pais__altos' />

									

									<div class='col col-12 textos__titulos'>

										V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

									</div>

								

									<div class='col col-12 text-center' style='font-weight:bold!important;'>

										AVANCE DE METAS

									</div>

									<table class='mt-4 col col-12'>

										<thead>

											<tr>

												<th>
													<center>ACTIVIDADES</center>
												</th>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>

												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>

												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos'></tbody>

										<tfoot class='footer__altos__indicadores'></tfoot>

									</table>

									<div class='row g-2'>
										
											<div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div>
													
											100% - 85%;

											<div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
											
											84,99% - 70%;

											<div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
											
											69,99% - 0%
									
									</div>

									<div class='col col-12 textos__titulos'>

										V.III. OTROS ASPECTOS TÉCNICOS

									</div>


									<table class='tabla__recreativo__1'>

										<thead>

											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__recreativo__1'>

											

										</tbody>

									</table>

									<table class='tabla__formativo__1'>

										<thead>

											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__formativo__1'>

										</tbody>

									</table>

									<div class='row g-2'>
										
										<div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div>
												
										100% - 85%;

										<div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
										
										84,99% - 70%;

										<div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
										
										69,99% - 0%
							
									</div>

									

									<div class='col col-6 '>

									NÚMERO DE CAPACITADORES:

									</div>

									<div class='col col-6'>

										<input type='text' id='numeroCapacitadores' name='numeroCapacitadores' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-6' >

										MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE (USD):

									</div>


									<div class='col col-6 presupuesto__autogestion__asignado__pais__altos' ></div>

									<input type='hidden' id='presupuesto__autogestion__asignado__pais__altos' name='presupuesto__autogestion__asignado__pais__altos' />


									<div class='col col-6 '>

									% de Autogestión en relación al presupuesto POA asignado::

									</div>

									<div class='col col-6 porcentajeAutogestion'></div>

									<input type='hidden' readonly id='porcentajeAutogestion' name='porcentajeAutogestion' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									

									<div class='col col-12 foramtivo__enlaces__medalleros'>

										<table style='margin-top:.5em!important; width:100%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

											<tbody>

												<tr >

													<th colspan='4'>

														<center>NÚMERO DE MEDALLAS ALCANZAS AL SEMESTRE:</center>

													</th>
								
												</tr>

												<tr>

													<td>

														<center>ORO</center>

													</td>


													<td>

													<input type='text' id='oro__alto' name='oro__alto' class='ancho__total__input solo__numero cambio__de__numero__f'/>


													</td>

													

												</tr>

												<tr>

													<td>

														<center>PLATA</center>

													</td>


													<td>

													<input type='text' id='plata__alto' name='plata__alto' class='ancho__total__input solo__numero cambio__de__numero__f'/>


													</td>

													

												</tr>

												<tr>

													<td>

														<center>BRONCE</center>

													</td>


													<td>

													<input type='text' id='bronce__alto' name='bronce__alto' class='ancho__total__input solo__numero cambio__de__numero__f' />


													</td>

													

												</tr>

											</tbody>


										</table>

										
									</div>	
									
									<div class='col col-12 foramtivo__enlaces__medalleros'>

										<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

											<thead>

												<tr >

													<th colspan='4'>

														<center>NÚMERO DE BENEFICIARIOS</center>

													</th>
								
												</tr>

												<tr>

													<th>

														<center>GRUPOS ETARIOS</center>

													</th>


													<th>

														<center>HOMBRES</center>

													</th>

													<th>

														<center>MUJERES</center>

													</th>

													<th>

														<center>TOTAL</center>

													</th>

												</tr>

											</thead>

											<tbody>

													<tr>

														<td>De 5 a 17 años atendidos</td>
													
												
														<td>

														<input type='text' id='hombresB' class='solo__numero cambio__de__numero__f' name='hombresB' />
													

														</td>

														<td>

														<input type='text' id='mujeresB' class='solo__numero cambio__de__numero__f' name='mujeresB' />
														
														</td>

														<td>

														<input type='text' id='totalB' class='solo__numero cambio__de__numero__f' name='totalB' />
														


														</td>

													</tr>

													<tr>
														<td>De 18 a 69 años atendidos</td>

														<td>

														<input type='text' id='hombresB18' class='solo__numero cambio__de__numero__f' name='hombresB18' />
														
														</td>

														<td>

														<input type='text' id='mujeresB18' class='solo__numero cambio__de__numero__f' name='mujeresB18' />
														

														</td>

														<td>

														<input type='text' id='totalB18' class='solo__numero cambio__de__numero__f' name='totalB18' />


														</td>

													</tr>


											</tbody>


										</table>

										
									</div>	



									<div class='col col-12 recreativo__enlaces__medalleros'>

										<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

											<thead>

												<tr >

													<th colspan='4'>

														<center>NÚMERO DE BENEFICIARIOS</center>

													</th>
								
												</tr>

												<tr>

													<th>

														<center>GRUPOS ETARIOS</center>

													</th>


													<th>

														<center>HOMBRES</center>

													</th>

													<th>

														<center>MUJERES</center>

													</th>

													<th>

														<center>TOTAL</center>

													</th>

												</tr>

											</thead>

											<tbody>

													<tr>

														<td>De 5 a 17 años atendidos</td>
													
												
														<td>

														<input type='text' id='hombresB' class='solo__numero cambio__de__numero__f' name='hombresB' />
													

														</td>

														<td>

														<input type='text' id='mujeresB' class='solo__numero cambio__de__numero__f' name='mujeresB' />
														
														</td>

														<td>

														<input type='text' id='totalB' class='solo__numero cambio__de__numero__f' name='totalB' />
														


														</td>

													</tr>

													<tr>
														<td>De 18 a 69 años atendidos</td>

														<td>

														<input type='text' id='hombresB18' class='solo__numero cambio__de__numero__f' name='hombresB18' />
														
														</td>

														<td>

														<input type='text' id='mujeresB18' class='solo__numero cambio__de__numero__f' name='mujeresB18' />
														

														</td>

														<td>

														<input type='text' id='totalB18' class='solo__numero cambio__de__numero__f' name='totalB18' />


														</td>

													</tr>


											</tbody>


										</table>

										
									</div>		



									<div class='col col-12 mt-2' style='font-weight:bold;'>

										PRESENTAN INFORMACIÓN:

									</div>


									<table class='col col-12 mt-2 tabla__formativo__1'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

												<th>

													<center>OBSERVACIONES</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
												Listado de asistentes de capacitaciones:
												</td>

												<td>
													<select id='listAsistCapForm__tabla__alto' name='listAsistCapForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>


												<td>
													<textarea id='listAsistCapForm__observaciones__alto' name='listAsistCapForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Fotocopias de certificados de capacitaciones:
												</td>

												<td>
													<select id='fotCertifCapForm__tabla__alto' name='fotCertifCapForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='fotCertifCapForm__observaciones__alto' name='fotCertifCapForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


											<tr>

												<td>
													Registro fotográfico de capacitaciones:
												</td>

												<td>
													<select id='regFotCapaFrom__tabla__alto' name='regFotCapaFrom__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='regFotCapaFrom__observaciones__alto' name='regFotCapaFrom__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
													Hojas de vida de profesionales:
												</td>

												<td>
													<select id='cvForm__tabla__alto' name='cvForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='cvForm__observaciones__alto' name='cvForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
													Contrato de profesionales:
												</td>

												<td>
													<select id='contratosForm__tabla__alto' name='contratosForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='contratosForm__observaciones__alto' name='contratosForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


											<tr>

												<td>
													Registro fotográfico de los eventos deportivos:
												</td>

												<td>
													<select id='registroFotEventoForm__tabla__alto' name='registroFotEventoForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='registroFotEventoForm__observaciones__alto' name='registroFotEventoForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Listados de asistencia de atletas suscrito por entrenador o coordinador técnico: 
												</td>

												<td>
													<select id='listadoAsistenciaAtl__tabla__alto' name='listadoAsistenciaAtl__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='listadoAsistenciaAtl__observaciones__alto' name='listadoAsistenciaAtl__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Orden de compra o de servicio de implementación deportiva:
												</td>

												<td>
													<select id='ordenCompraForm__tabla__alto' name='ordenCompraForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='ordenCompraForm__observaciones__alto' name='ordenCompraForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Actas de entrega recepción de la implementación deportiva adquirida:
												</td>

												<td>
													<select id='actasForm__tabla__alto' name='actasForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='actasForm__observaciones__alto' name='actasForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Factura de implementación deportiva:
												</td>

												<td>
													<select id='facturaForm__tabla__alto' name='facturaForm__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='facturaForm__observaciones__alto' name='facturaForm__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


										</tbody>

									</table>

									<table class='col col-12 mt-2 tabla__recreativo__1'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

												<th>

													<center>OBSERVACIONES</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
													Listado de asistentes de capacitaciones:
												</td>

												<td>
													<select id='listAsisCapRec__tabla__alto' name='listAsisCapRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='listAsisCapRec__observaciones__alto' name='listAsisCapRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
													Fotocopias de certificados de capacitaciones:
												</td>

												<td>
													<select id='fotCertCapRec__tabla__alto' name='fotCertCapRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='fotCertCapRec__observaciones__alto' name='fotCertCapRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


											<tr>

												<td>
													Registro fotográfico de capacitaciones:
												</td>

												<td>
													<select id='regFotCapRec__tabla__alto' name='regFotCapRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='regFotCapRec__observaciones__alto' name='regFotCapRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
													Hojas de vida de profesionales:
												</td>

												<td>
													<select id='cvRec__tabla__alto' name='cvRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='cvRec__observaciones__alto' name='cvRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
													Contrato de profesionales:
												</td>

												<td>
													<select id='contratoRec__tabla__alto' name='contratoRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='contratoRec__observaciones__alto' name='contratoRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Registro fotográfico de los eventos recreativos:
												</td>

												<td>
													<select id='regFotEvenRec__tabla__alto' name='regFotEvenRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='regFotEvenRec__observaciones__alto' name='regFotEvenRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Listado de participantes de eventos recreativos:
												</td>

												<td>
													<select id='listPartEven__tabla__alto' name='listPartEven__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='listPartEven__observaciones__alto' name='listPartEven__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Orden de compra o de servicio de implementación deportiva:
												</td>

												<td>
													<select id='ordCompRec__tabla__alto' name='ordCompRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='ordCompRec__observaciones__alto' name='ordCompRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Actas de entrega recepción de la implementación deportiva adquirida:
												</td>

												<td>
													<select id='actEntregaRec__tabla__alto' name='actEntregaRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='actEntregaRec__observaciones__alto' name='actEntregaRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											

											<tr>

												<td>
												Factura de implementación deportiva:
												</td>

												<td>
													<select id='facturaRec__tabla__alto' name='facturaRec__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='facturaRec__observaciones__alto' name='facturaRec__observaciones__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

										</tbody>

									</table>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguis' name='observaciones__alto__seguis'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguis' name='recomendaciones__alto__seguis'></textarea>

									<div class='col col-12 d d-flex justify-content-center'>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='hidden' id='rotulo__recomendado' name='rotulo__recomendado'>

										<a class='btn btn-primary' id='recomendarAltos' name='recomendarAltos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

									</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		

		public function get__modal__plantilla__inicios__seguimientos__actividad__fisica__ins2023($parametro1,$parametro2,$parametro3){

			session_start();

			$idUsuario=$_SESSION["idUsuario"];
		
			$conexionRecuperada= new conexion();
			 $conexionEstablecida=$conexionRecuperada->cConexion();	
		
			 $query="SELECT a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE a.id_usuario='$idUsuario' AND a.fisicamenteEstructura='1' AND b.id_rol='4'; ";
			$resultado = $conexionEstablecida->query($query);
		
		
			while($registro = $resultado->fetch()) {
		
				$id_usuarioUsuarios=$registro['id_usuario'];
		
			}
		
			$modal="
		
			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>
		
				<div class='modal-dialog' style='min-width:95%!important;'>
		
					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>
		
						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />
						<input type='hidden' id='tipoAct' name='tipoAct' />
		
		
						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>
		
							<div class='col col-2 text-right'>
		
								<image src='images/titulo__ministerio__deporte.png'/>
		
							</div>
							
		
							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>
		
							<center>COORDINACION DE ADMINISTRACION E INFRAESTRUCTURA DEPORTIVA</center>
		
							</div>
		
		
							<div class='col col-2 text-left'>
		
								<image src='images/titulo__principis__ministerios.png'/>
		
							</div>
		
							<div class='col col-1'>
		
							  <span class='button pointer__botones modales__reload' style='color:black!important; background:black!important;' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle'></i></span>
		
							</div>
		
		
						</div>

						<div class='modal-body row $parametro3'>
		
							<div class='fila__reasignar col col-2' style='font-weight:bold;'>
		
								Reasignar a
		
							</div>
		
							<div class='fila__reasignar col col-8'>";
								if (empty($id_usuarioUsuarios)) {
									$modal.=	"<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>";
								} else {
									$modal.=	"<select class='ancho__total__input__selects selects__superiores superior__sin' multiple='multiple' style='height:80px!important;' id='selects__superiores'></select>";
								}
							
		
				$modal.=	"</div>
		
		
							<div class='fila__reasignar col col-2 reasignar__solo text-center'>
		
								<a class='btn btn-primary' id='reasignarSeguimientos__a__actividad__fisicas__in2023'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>
		
							</div>
		
		
							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>
		
								Regresar a
		
							</div>
		
							<div class='fila__regresar__a col col-8'>
		
								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
		
							</div>
		
							<div class='fila__regresar__a col col-2'>
		
								<a class='btn btn-warning' id='regresarSeguimientos__a__actividad__fisicas__in'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>
		
							</div>
		
		
		
							<div 		
		
							<div class='fila__regresar__a__informe__recomendacion col col-4 mt-4 oculto__file__recomendaciones'>
		
								Subir informe de recomendación
		
							</div>		
		
							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones'>
		
								<input type='file' id='informe__recomendado' accept='application/pdf'/>
		
							</div>					
		
							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones'>
		
								<a class='btn btn-primary' id='recomendar__infraes'>Recomendar</a>
		
							</div>
		
							<div class='row'>
		
								<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>
		
									Observaciones
		
								</div>
		
								<div class='col col-10 observacionesReasignaciones'>
		
									<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>
		
								</div>
		
							</div>
		
						</div>
		
						<div class='modal-body row indicadores__seguimiento__infra'>
							<div class='col col-4  mt-4 insfraestructuras__re'>
								POA Y Auxiliares
							</div>
							
							<div class='col col-8 d d-flex justify-content-center d d-flex justify-content-center insfraestructuras__re'>
								<a id='poaInfraSeguimiento' idOrganismo='' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#reasignarTra' >Visualizar</a>
							</div>
						</div>
						
		
		
						<div class='modal-body row indicadores__seguimiento__infra'>

								<div class='col col-12 textos__titulos' style='margin:1em 0;'>

										Indicadores Reportados:

								</div>

								<table>

									<thead>


										<tr>

											<th>
												<center>INDICADOR</center>
											</th>

											<th>
												<center>META PLANIFICADA AL SEMESTRE (A)</center>
											</th>


											<th>
												<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
											</th>


											<th>
												<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
											</th>

										</tr>

									</thead>

									<tbody class='cuerpo__items__indicadores__infraestructura'>

										


									</tbody>

								</table>
		
						
						</div>
		
		
						<div class='modal-body row indicadores__seguimiento__infra'>													
		
						
		
								<table id='infraestructura__intervenciones'>
									<thead>
											<tr>												
											<th><center>NOMBRE DE INFRAESTRUCTURA</center></th>
											<th><center>TIPO INTERVENCIÓN</center></th>
											<th><center>FECHA EJECUTADO</center></th>
											<th><center>MONTO EJECUTADO</center></th>
											<th><center>INFORME EJECUCION DE REHABILITACIÓN Y-O MANTENIMIENTOS PLANIFICADOS</center></th>
											<th><center>RESPALDOS DEL INFORME</center></th>
											<th><center>OTROS DOCUMENTOS</center></th>
											<th><center>REPORTE SEMESTRAL</center></th>
											<th><center>GUARDAR</center></th>
											</tr>
									</thead>
								</table>
						</div>
		
		
		
						
		
					</form>
		
				</div>
		
			</div>
			";
		
			return $modal;

		}	

		public function get__modal__plantilla__inicios__seguimientos__alto2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos__altos__2023'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />

						<input type='hidden' id='indicadorArray' name='indicadorArray' />
						<input type='hidden' id='metaProgramadaArray' name='metaProgramadaArray' />
						<input type='hidden' id='metaResultadoArray' name='metaResultadoArray' />
						<input type='hidden' id='porcentajeCumplimientoArray' name='porcentajeCumplimientoArray' />
						<input type='hidden' id='objetivoS' name='objetivoS' />
						<input type='hidden' id='areaAccion' name='areaAccion' />
						
						
						

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#1b5e20; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN TÉCNICA - RSET - <span class='siglas__dinamicas' style='font-weight:bold;'></span> - <span class='numerico__dinamicas'></span>

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

						</div>

						<div class='modal-body row $parametro3'>

							<div class='fila__reasignar col col-2' style='font-weight:bold;'>

								Reasignar a

							</div>

							<div class='fila__reasignar col col-4'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>


							<div class='fila__reasignar col col-2 reasignar__solo text-center'>

								<a class='btn btn-primary' id='reasignarSeguimientos__a__alto__rendimiento'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

							</div>


							<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

								Regresar a

							</div>

							<div class='fila__regresar__a col col-4'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

							</div>

							<div class='fila__regresar__a col col-2'>

								<a class='btn btn-warning' id='regresarSeguimientos__a__alto__rendimiento'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

							</div>


							<div class='col col-3'>

								Click para ver reporte

							</div>

							<div class='col col-1'>

								<input type='checkbox' id='seguimiento__tables' class='checkeds' />

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

							<div class='row oculto__informacion'>

								<input type='hidden' id='organismoOculto__modal' />

									<div class='col col-2 textos__titulos'>

										I EJERCICIO FISCAL

									</div>

									<div class='col col-1' style='font-weight:bold;'>

										AÑO 

									</div>

									<div class='col col-4 text-left periodo__evaluados__anuales'></div>
									<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />

									
									<input type='hidden' id='trimestre__evaluados__al' name='trimestre__evaluados__al' />


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-7 row'>

											<div class='col col-12 text-left textos__titulos'>

												II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

											</div>

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												NOMBRE DE LA ORGANIZACIÓN:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												RUC DE LA ORGANIZACIÓN:

											</div>

											<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PRESIDENTE O REPRESENTANTE LEGAL:

											</div>

											<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

											</div>

											<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												DIRECCIÓN COMPLETA:

											</div>

											<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


										</div>

										<div class='col col-5 row'>

											<div class='col col-12 text-left textos__titulos'>

												III. UBICACIÓN GEOGRÁFICA

											</div>


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PROVINCIA:

											</div>

											<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												CANTÓN:

											</div>

											<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


											<div class='col col-6 mt-2' style='font-weight:bold;'>

												PARROQUIA:

											</div>

											<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />


											<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

										</div>

									</div>

									<div class='textos__titulos' style='display:none!important;'>

										IV. DATOS GENERALES DEL CONVENIO

									</div>

									<div style='font-weight:bold; display:none!important;'>

										NÚMERO DE CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='numeroConvenio__paid' name='numeroConvenio__paid' class='ancho__total__input solo__numero__montos'/>

									</div>

									<div style='font-weight:bold;display:none!important;'>

										ADMINISTRADOR DEL CONVENIO:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='administradorConvenio__paid' name='administradorConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-4' style='font-weight:bold;display:none!important;'>

										DOCUMENTO DE DESIGNACIÓN:

									</div>

									<div style='display:none!important;'>

										<input type='text' id='documentoAsignacionConvenio__paid' name='documentoAsignacionConvenio__paid' class='ancho__total__input'/>

									</div>

									<div class='col col-12 textos__titulos'>

										 IV. ALINEACIÓN A LA PLANIFICACIÓN

									</div>

									<div class='col col-4' style='font-weight:bold;'>

										ÁREA DE ACCIÓN:

									</div>


									<div class='col col-8 areaAccion' ></div>

									<div class='col col-4' style='font-weight:bold;'>

										OBJETIVO ESTRATÉGICO INSTITUCIONAL:

									</div>


									<div class='col col-8 objetivoS' ></div>



									<div class='col col-12 textos__titulos'>

										 V. SEGUIMIENTO Y EVALUACIÓN TÉCNICA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

									</div>

									<div class='col col-12' style='font-weight:bold;'>

										V.I. PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

									</div>


									<div class='col col-4' style='font-weight:bold;'>

										PERÍODO EVALUADO:

									</div>


									<div class='col col-8 periodo__evaluado' style='font-weight:bold;'></div>

									<input type='hidden' id='periodo__evaluado' name='periodo__evaluado' />


									<div class='col col-4' style='font-weight:bold;'>

										PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

									</div>


									<div class='col col-8 presupuesto__asignado__pais__altos' style='font-weight:bold;'></div>

									<input type='hidden' id='presupuesto__asignado__pais__altos' name='presupuesto__asignado__pais__altos' />


									<div class='col col-12 textos__titulos'>

										V.II. RESUMEN DE CUMPLIMIENTO TÉCNICO DEL POA

									</div>

									<div class='col col-12 text-center' style='font-weight:bold!important;'>

										AVANCE DE METAS

									</div>

									<table class='mt-4 col col-12'>

										<thead>

											<tr>

												<th>
													<center>ACTIVIDADES</center>
												</th>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>

												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>

												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos'></tbody>

										<tfoot class='footer__altos__indicadores'> </tfoot>

									</table>

									  
									<div class='row g-2'>
										
											<div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div>
													
											100% - 85%;

											<div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
											
											84,99% - 70%;

											<div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
											
											69,99% - 0%
									
                					</div>
									
									

									<div class='col col-12 textos__titulos' style='margin:1em 0;'>

										V.III. OTROS ASPECTOS TÉCNICOS

									</div>

									<table>

										<thead>


											<tr>

												<th>
													<center>INDICADOR</center>
												</th>

												<th>
													<center>META PLANIFICADA AL SEMESTRE (A)</center>
												</th>


												<th>
													<center>RESULTADO ALCANZADO AL SEMESTRE (B)</center>
												</th>


												<th>
													<center>% DE CUMPLIMIENTO AL SEMESTRE (B/A)</center>
												</th>

											</tr>

										</thead>

										<tbody class='cuerpo__items__alto__rendimientos__indicadores'>

											


										</tbody>

									</table>

									<div class='row g-2' style='margin: 1rem 0'>
										
											<div style='border-radius: 50%!important; margin:0 1em; background:green; height:15px!important; width:15px!important;'></div>
													
											100% - 85%;

											<div style='border-radius: 50%!important; margin:0 1em; background:gold; height:15px!important; width:15px!important;'></div>
											
											84,99% - 70%;

											<div style='border-radius: 50%!important; margin:0 1em; background:red; height:15px!important; width:15px!important;'></div>
											
											69,99% - 0%
									
                					</div>

									<div class='col col-4' style='font-weight:bold; margin:1em 0;'>

										NÚMERO DE CAPACITADORES:

									</div>


									<div class='col col-6'>

										<input type='text' id='capacitadores' name='capacitadores' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>
									</div>

									<div class='col col-4' style='font-weight:bold;'>

										MONTO DE AUTOGESTIÓN REPORTADO AL SEMESTRE(USD):

									</div>


									<div class='col col-8 autogestion' style='font-weight:bold;'></div>

									<input type='hidden' id='autogestion' name='autogestion' />

									<div class='col col-4' style='font-weight:bold;'>

										% DE AUTOGESTIÓN EN RELACIÓN AL PRESUPUESTO POA ASIGNADO:

									</div>

									<div class='col col-8 porcentajeAutogestion' style='font-weight:bold;'></div>

									<input type='hidden' id='porcentajeAutogestion' name='porcentajeAutogestion' />


									<div class='col col-12 mt-2' style='font-weight:bold;'>

										NÚMERO DE MEDALLAS ALCANZAS AL SEMESTRE:

									</div>

									<div class='col col-2'>

										Oro

									</div>

									<div class='col col-2'>

										<input type='text' readonly id='oro__alto' name='oro__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2'>

										Plata

									</div>

									<div class='col col-2'>

										<input type='text' readonly id='plata__alto' name='plata__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>

									<div class='col col-2'>

										Bronce

									</div>

									<div class='col col-2'>

										<input type='text' readonly id='bronce__alto' name='bronce__alto' class='ancho__total__input solo__numero cambio__de__numero__f' value='0'/>

									</div>	
									
									<div class='col col-12 '>

										<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

											

												<tr >

													<th colspan='2'>

														<center>NÚMERO DE  BENEFICIARIOS DE EVENTOS</center>

													</th>
								
												</tr>

												<tr>


													<th>

														<center>HOMBRES</center>

													</th>

													<td>
														<center>
														<input type='text' id='hombresB' class='solo__numero cambio__de__numero__f' name='hombresB' />
														</center>
													</td>

													
												</tr>

													
												<tr>
												
													<th>

														<center>MUJERES</center>

													</th>

													
													<td>
														<center>
														<input type='text' id='mujeresB' class='solo__numero cambio__de__numero__f' name='mujeresB' />
														</center>
													</td>

													
												</tr>

													


											


										</table>

										
									</div>	

									<input type='hidden' id='totalBeneficiarios' class='solo__numero cambio__de__numero__f' name='totalBeneficiarios' />

									<div class='col col-12 textos__titulos'>

									V.IV. VERIFICACIÓN DE PRESENTACIÓN DE INFORMACIÓN:

									</div>

									<table class='col col-12 mt-2'>

										<thead>

											<tr>

												<th>

													<center>DETALLE</center>

												</th>


												<th>

													<center>CUMPLE</center>

												</th>

												<th>

													<center>OBSERVACIONES</center>

												</th>

											</tr>

										</thead>

										<tbody>

											<tr>

												<td>
												Listado de asistentes de capacitaciones:	
												</td>

												<td>
													<select id='lisAsisCap__tabla__alto' name='lisAsisCap__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='lisAsisCap__observ__alto' name='lisAsisCap__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Fotocopias de certificados de capacitaciones:	
												</td>

												<td>
													<select id='fotCerCap__tabla__alto' name='fotCerCap__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='fotCerCap__observ__alto' name='fotCerCap__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


											<tr>

												<td>
												Registro fotográfico de capacitaciones:	
												</td>

												<td>
													<select id='regFotCap__tabla__alto' name='regFotCap__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='regFotCap__observ__alto' name='regFotCap__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Hojas de vida de profesionales:	
												</td>

												<td>
													<select id='cvProf__tabla__alto' name='cvProf__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='cvProf__observ__alto' name='cvProf__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Contrato de profesionales:
												</td>

												<td>
													<select id='contProf__tabla__alto' name='contProf__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='contProf__observ__alto' name='contProf__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>


											<tr>

												<td>
												Listados de asistencia de atletas suscrito por los entrenadores o coordinador técnico: 	
												</td>

												<td>
													<select id='listAsisAtlSusEnt__tabla__alto' name='listAsisAtlSusEnt__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='listAsisAtlSusEnt__observ__alto' name='listAsisAtlSusEnt__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Informe médico y disciplinario de atletas:	
												</td>

												<td>
													<select id='infMedico__tabla__alto' name='infMedico__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='infMedico__observ__alto' name='infMedico__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Registro fotográfico de los eventos deportivos:	
												</td>

												<td>
													<select id='regFotEvenDep__tabla__alto' name='regFotEvenDep__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='regFotEvenDep__observ__alto' name='regFotEvenDep__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Reporte de resultados deportivo obtenidos en los eventos en los que participaron:	
												</td>

												<td>
													<select id='repResDepObt__tabla__alto' name='repResDepObt__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='repResDepObt__observ__alto' name='repResDepObt__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Orden de compra o de servicio de implementación deportiva:		
												</td>

												<td>
													<select id='ordCompImpl__tabla__alto' name='ordCompImpl__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='ordCompImpl__observ__alto' name='ordCompImpl__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Actas de entrega recepción de la implementación deportiva adquirida:	
												</td>

												<td>
													<select id='actEntRecImp__tabla__alto' name='actEntRecImp__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='actEntRecImp__observ__alto' name='actEntRecImp__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

											<tr>

												<td>
												Factura de implementación deportiva:		
												</td>

												<td>
													<select id='factImpDep__tabla__alto' name='factImpDep__tabla__alto' class='ancho__total__input__selects'>
														<option value='0'>--Seleccione--</option>
														<option value='Si'>Si</option>
														<option value='No'>No</option>
														<option value='Parcialmente'>Parcialmente</option>
														<option value='N/A'>N/A</option>
													</select>
												</td>

												<td>
													<textarea id='factImpDep__observ__alto' name='factImpDep__observ__alto' class='ancho__total__input__selects'>
													</textarea>
												</td>

											</tr>

										</tbody>

									</table>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Observaciones:
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='observaciones__alto__seguis' name='observaciones__alto__seguis'></textarea>

									<div class='col col-12 mt-2 ocultos__en__altos' style='font-weight:bold!important;'>
										Recomendaciones: 
									</div>

									<textarea class='col col-12 ocultos__en__altos ancho__total__textareas' id='recomendaciones__alto__seguis' name='recomendaciones__alto__seguis'></textarea>


									<div class='col col-12 d d-flex justify-content-center'>

										<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

									</div>									

									<div class='fila__regresar__a col col-2 mt-4 text-center ocultos__en__altos'>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos ocultos__en__altos'>

										Subir reporte generado en pdf

									</div>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

									</div>

									<input type='hidden' id='rotulo__recomendado' name='rotulo__recomendado' value='alto__rendimientos'/>

									<div class='fila__regresar__a col col-4 mt-4 text-center ocultos__en__altos'>

										<a class='btn btn-primary' id='recomendarAltos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

									</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}


		public function get__modal__plantilla__inicios__seguimientos__alto__recomendados2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />


							<div class='col col-4'>

								<a id='informe__recomendados' target='_blank'>Descargar Informe recomendado</a>

							</div>

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-2 mt-2' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='col col-8 mt-2'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

								<div class='direccion__seguimientos__ocultos'>Dirección de Seguimiento, Planes, Programas y Proyectos</div>

							</div>

							<div class='col col-2 mt-2'>

								<a class='btn btn-warning' id='recomendar__altosRe__recomendados2023'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	

		public function get__modal__plantilla__inicios__seguimientos2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:95%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__seguimientos2023'/>

						<input type='hidden' id='idOrganismo' name='idOrganismo' />
						<input type='hidden' id='periodo' name='periodo' />
						<input type='hidden' id='arrayPorcen' name='arrayPorcen' />

						<input type='hidden' id='arrayPorcen__inicializados' name='arrayPorcen__inicializados' />

						<input type='hidden' id='arrayPorcenEsigefts__programados' name='arrayPorcenEsigefts__programados' />
						

						<input type='hidden' id='arrayEsigefts' name='arrayEsigefts' />
						<input type='hidden' id='arrayPorcenEsigefts' name='arrayPorcenEsigefts' />

						<input type='hidden' id='idUSeguimientos' name='idUSeguimientos' />

						<input type='hidden' id='tipos__nomenclaturas' name='tipos__nomenclaturas' />

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos'>

								COORDINACIÓN GENERAL DE PLANIFICACIÓN Y GESTIÓN ESTRATÉGICA<br>
								DIRECCIÓN DE SEGUIMIENTO DE PLANES, PROGRAMAS Y PROYECTOS

							</div>



							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

							<div class='col col-12 text-center' style='background:#0d47a1; color:white;padding-top:1.5em;padding-bottom:1.5em;'>

								REPORTE DE SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA - RSEP - DSPPP - <span class='siglas__dinamicas' style='font-weight:bold;'></span> - <span class='numerico__dinamicas'></span>

								<input type='hidden' id='siglas__dinamicas__inputs' name='siglas__dinamicas__inputs'/>
								<input type='hidden' id='numerico__dinamicas__inputs' name='numerico__dinamicas__inputs'/>

							</div>

							<div class='col col-12 text-center con__sin__e' style='color:black;padding-top:1.5em;padding-bottom:1.5em;font-weight:bold;'>


							</div>

						</div>

						<div class='modal-body row $parametro3'>

						<div class='fila__reasignar col col-2' style='font-weight:bold;'>

							Reasignar a

						</div>

						<div class='fila__reasignar col col-4'>

							<select class='ancho__total__input__selects' id='selects__superiores'></select>

						</div>

						<div class='fila__reasignar col col-2'>

							<a class='btn btn-primary' id='reasignarSeguimientos__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Reasignar</a>

						</div>


						<div class='fila__regresar__a col col-2' style='font-weight:bold;'>

							Regresar a

						</div>

						<div class='fila__regresar__a col col-4'>

							<select class='ancho__total__input__selects' id='selects__superiores__regresar'></select>

						</div>

						<div class='fila__regresar__a col col-2'>

							<a class='btn btn-warning' id='regresarSeguimientos__a'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;Regresar</a>

						</div>


						<div class='col col-3'>

							Click para ver reporte

						</div>

						<div class='col col-1'>

							<input type='checkbox' id='seguimiento__tables' class='checkeds' />

						</div>


						<div class='col col-12 elemento__refutables__corregidos text-center' style='font-weight:bold;'>


						</div>

						<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

							Observaciones

						</div>

						<div class='col col-10 observacionesReasignaciones'>

							<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

						</div>


						<div class='row oculto__informacion'>

						<input type='hidden' id='organismoOculto__modal' />

							<div class='col col-2 textos__titulos'>

								I PERÍODO EVALUADO

							</div>

							<div class='col col-1' style='font-weight:bold;'>

								AÑO 

							</div>

							<div class='col col-9 text-left periodo__evaluados__anuales'></div>
							<input type='hidden' id='periodo__evaluados__anuales' name='periodo__evaluados__anuales' />


							<div class='col col-12 row d-flex mt-4'>

								<div class='col col-7 row'>

									<div class='col col-12 text-left textos__titulos'>

										II. DATOS GENERALES DE LA ORGANIZACIÓN DEPORTIVA

									</div>

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										NOMBRE DE LA ORGANIZACIÓN:

									</div>

									<div class='nombre__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										RUC DE LA ORGANIZACIÓN:

									</div>

									<div class='ruc__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='ruc__organizacion__deportivas' name='ruc__organizacion__deportivas' />

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PRESIDENTE O REPRESENTANTE LEGAL:

									</div>

									<div class='presidente__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										CORREO ELECTRÓNICO DE LA ORGANIZACIÓN:

									</div>

									<div class='correo__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='correo__organizacion__deportivas' name='correo__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										DIRECCIÓN COMPLETA:

									</div>

									<div class='direccion__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='direccion__organizacion__deportivas' name='direccion__organizacion__deportivas' />


								</div>

								<div class='col col-5 row'>

									<div class='col col-12 text-left textos__titulos'>

										III. UBICACIÓN GEOGRÁFICA

									</div>


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PROVINCIA:

									</div>

									<div class='provincia__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='provincia__organizacion__deportivas' name='provincia__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										CANTÓN:

									</div>

									<div class='canton__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='canton__organizacion__deportivas' name='canton__organizacion__deportivas' />


									<div class='col col-6 mt-2' style='font-weight:bold;'>

										PARROQUIA:

									</div>

									<div class='parroquia__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='parroquia__organizacion__deportivas' name='parroquia__organizacion__deportivas' />

									<div class='col col-6 mt-2' style='font-weight:bold;'>

										BARRIO:

									</div>

									<div class='barrio__organizacion__deportivas col col-6 mt-2'></div>

									<input type='hidden' id='barrio__organizacion__deportivas' name='barrio__organizacion__deportivas' />

								</div>

							</div>

							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								IV. ALINEACIÓN A LA PLANIFICACIÓN 

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								ÁREA DE ACCIÓN:

							</div>

							<div class='area__de__accion__llamados col col-1'></div>

							<input type='hidden' id='area__de__accion__llamados' name='area__de__accion__llamados' />

							<div class='col col-4' style='font-weight:bold;'>

								OBJETIVO ESTRATÉGICO INSTITUCIONAL:

							</div>

							<div class='objetivo__institucional__estrategicos col col-5 text-left'></div>

							<input type='hidden' id='objetivo__institucional__estrategicos' name='objetivo__institucional__estrategicos' />

							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								V. SEGUIMIENTO Y EVALUACIÓN PRESUPUESTARIA DE LA PLANIFICACIÓN OPERATIVA ANUAL (POA)

							</div>


							<div class='col col-12 row d-flex mt-4 textos__titulos'>

								V.I PRESUPUESTO DE LA PLANIFICACIÓN OPERATIVA ANUAL

							</div>

							
							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								PRESUPUESTO ANUAL ASIGNADO SEGÚN POA (USD):

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='presupuesto__segun__poas' name='presupuesto__segun__poas' style='border:none!important;' readonly='' />	

							</div>

							
							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								PERÍODO EVALUADO:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='periodo__evaluado' name='periodo__evaluado' style='border:none!important;' readonly='' />

							</div>

							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								MONTO TRANSFERIDO + REMANENTE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='monto__transferido__rema' name='monto__transferido__rema' class='solo__numero__montos' style='width:85%!important;' placeholder='Ingrese remanente'/>

							</div>

							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<input type='text' id='monto__reportado__tri' name='monto__reportado__tri' style='border:none!important;' readonly='' />

							</div>


							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								PRESUPUESTO PLANIFICADO A EJECUTARSE AL SEMESTRE (USD):

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<div class='col col-6 ' >

									<input type='text' readonly id='monto__ejecutado__trimestre' name='monto__ejecutado__trimestre' />

								</div>
								
							</div>


							<div class='col col-4 row d-flex mt-4' style='font-weight:bold;'>

								% DE AVANCE AL SEMESTRE:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<div class='col col-6 ' >

									<input type='text' readonly id='avance__trimestre__porcentaje' name='avance__trimestre__porcentaje' />

								</div>
								
							</div>

							<div class='col col-4 row d-flex mt-4 text-left' style='font-weight:bold;'>

								% de ejecución esperada al semestre en relación al presupuesto anual:

							</div>

							<div class='col col-2 row d-flex mt-4'>

								<div class='col col-6 segundo__esperado__div' >

									<input type='text' readonly id='segundo__esperado' name='segundo__esperado' />

								</div>


								<div class='col col-6 cuarto__esperado__div' >

									<input type='text' readonly id='cuarto__esperado' name='cuarto__esperado' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>


							</div>

							<div class='col col-4 row d-flex mt-4 text-left' style='font-weight:bold;'>

								% de ejecución obtenida al semestre en relación al presupuesto anual:

							</div>

						

							<div class='col col-2 row d-flex mt-4'>

								<div class='col col-6 ejecutados__al__segundo'>

									<input type='text' readonly id='segundo__ejecucion' name='segundo__ejecucion' class='ancho__total__input' />

								</div>

								<div class='col col-6 ejecutados__al__cuarto'>

									<input type='text' readonly id='cuarto__ejecucion' name='cuarto__ejecucion' readonly='' class='ancho__total__input' style='border:none!important'/>

								</div>

							</div>



							<div class='col col-12 row d-flex mt-4' style='font-weight:bold;'>

								V.II. RESUMEN DE EJECUCIÓN PRESUPUESTARIA DEL POA

							</div>

							<table class='col col-12'>

								<thead>

									<tr>

										<th><center>ACTIVIDADES</center></th>
										<th style='display:none!important;'><center>MONTO PLANIFICADO POA</center></th>
										<th><center>MONTO PLANIFICADO AL SEMESTRE (A)</center></th>
										<th><center>MONTO DE EJECUCIÓN REPORTADO AL SEMESTRE (B)</center></th>
										<th><center>% DE AVANCE<br>AL SEMESTRE (B/A)</center></th>
										<th class='oculto__sin__esiguefts'><center>MONTO DE<br>EJECUCIÓN EN<br>e-SIGEF2 (C)</center></th>
										<th class='oculto__sin__esiguefts'><center>% DE AVANCE<br>AL SEMESTRE<br>EN e-SIGEF2 (C/A)</center></th>

									</tr>

								</thead>

								<tbody class='cuerpo__matricez__seguimientos'></tbody>

								<tfoot class='footer__matricez__seguimientos'></tfoot>

							</table>

							<div class='fila__regresar__a col col-2 mt-2'>

								Observaciones:

							</div>

							<div class='fila__regresar__a col col-10 mt-2'>

								<textarea id='observaciones__seguimientos__cuadros__pdf' name='observaciones__seguimientos__cuadros__pdf' class='ancho__total__textareas'></textarea>

							</div>


							<div class='fila__regresar__a col col-2 mt-2'>

								Recomendaciones:

							</div>

							<div class='fila__regresar__a col col-10 mt-2'>

								<textarea id='recomendaciones__seguimientos__cuadros__pdf' name='recomendaciones__seguimientos__cuadros__pdf' class='ancho__total__textareas'></textarea>

							</div>

							<div class='col col-12 d d-flex justify-content-center'>

								<a target='_blank' class='btn btn-primary' href='reporteAnexosSe'>REPORTES Y ANEXOS</a>

							</div>


							<div class='fila__regresar__a col col-2 mt-4 text-center'>

								<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

							</div>

							<div class='fila__regresar__a col col-2 mt-4 text-center textos__titulos'>

								Subir reporte generado en pdf

							</div>

							<div class='fila__regresar__a col col-4 mt-4 text-center'>

								<input type='file' accept='application/pdf' id='archivoSubido__seguimientos' name='archivoSubido__seguimientos'>

							</div>

							<div class='fila__regresar__a col col-4 mt-4 text-center'>

								<a class='btn btn-primary' id='recomendar__seguimientos'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	




		//******************************  DSPPP RECOMENDADOS  *********************************** */
		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />

							<div class='col col-12 mt-4'>

									<h4 class='faltantes_documentos_financieros'><center> Faltan informes Administrativos</center></h4>
									<h4 class='faltantes_documentos_tecnicos'><center> Faltan informes TECNICOS</center></h4>
									<h4 class='faltantes_documentos_infraestructura'><center> Faltan informes INFRAESTRUCTURA</center></h4>
							</div>

							<div class='col col-12 textos__titulos mt-4'>

								DOCUMENTOS DE RECOMENDACIÓN 

							</div>

							<div class='col col-2 oculto__subsess__deseados d d-flex justify-content-center'>

								<a id='informe__recomendados' class='btn btn-info' target='_blank'>INFORME PRESUPUESTARIO RECOMENDADO</a>

							</div>

							<div class='col col-2 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__t' class='boton__pdfs__tecnicas btn btn-success's target='_blank'>Informe técnico</a>

							</div>


							<div class='col col-2 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__i' class='boton__pdfs__infraestructuras btn btn-warning' target='_blank'>Informe infraestructuras</a>

							</div>


							<div class='col col-2 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__actividad1_financiero' class='boton__pdfs__financiero btn btn-primary' target='_blank' >Informe Actividad 1</a>

							</div>

							<div class='col col-2 d d-flex justify-content-center d d-flex justify-content-center'>

								<a id='documentos__tecnicos__contratacion_financiero' class='boton__pdfs__financiero btn btn-primary' target='_blank' >Informe Contratación Pública</a>

							</div>
							

							<div class='col col-12 textos__titulos mt-4'>

								ACCIONES DE RECOMENDACIÓN

							</div>

						

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-8 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-4 mt-2' style='font-weight:bold;'>

								Enviar al organismo deportivo

							</div>

							<div class='col col-6 mt-2 clases__puedes__recomendares' style='font-weight:bold; color:#4a148c;'>


							</div>


							<div class='col col-2 mt-2'>

								<a class='btn btn-success' id='enviar__orgnaismosDeportivos'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;ENVIAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='fila__reasignar col col-4 d d-flex justify-content-center' style='font-weight:bold;'>

								<a class='btn btn-warning boton__pdfs__tecnicas' id='regresar__areas__tecnicas__seguimientos2023' target='_blank'>REGRESAR AL ÁREA TÉCNICA</a>

							</div>


							<div class='fila__reasignar col col-4 d d-flex justify-content-center' style='font-weight:bold;'>

								<a class='btn btn-info boton__pdfs__infraestructuras' id='regresar__areas__tecnicas__seguimientos__infraens__2023' target='_blank'>REGRESAR AL ÁREA DE INFRAESTRUCTURA</a>

							</div>

							<div class='fila__reasignar col col-4 d d-flex justify-content-center' style='font-weight:bold;'>

								<a class='btn btn-success boton__pdfs__financiero' id='regresar__areas__tecnicas__seguimientos__financiero__2023' target='_blank'>REGRESAR AL ÁREA FINANCIERA</a>

							</div>
							
							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}		


		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__zonales2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

			<div class='modal-dialog' style='min-width:75%!important;'>

				<form class='modal-content formularioConfiguracion'>


					<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

						<div class='col col-2 text-right'>

							<image src='images/titulo__ministerio__deporte.png'/>

						</div>
						

						<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



						</div>


						<div class='col col-2 text-left'>

							<image src='images/titulo__principis__ministerios.png'/>

						</div>

						<div class='col col-1'>

						  <span id='cerrarRecorridoSeguimeintoModal' class='button pointer__botones' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

						</div>


					</div>

				<div class='modal-body row $parametro3'>

				<input type='hidden' name='tabChange' id='tabChange'/>

				


				<ul class='nav nav-underline' id='myTab' role='tablist'>
				<li class='nav-item'><a class='nav-link active' id='general-tab' data-bs-toggle='tab' href='#tab-General' role='tab' aria-controls='tab-General' aria-selected='true' area='general'>Presupuestario</a></li>

				<li class='nav-item'><a class='nav-link' id='seguimiento-tab' data-bs-toggle='tab' href='#tab-Seguimiento' role='tab' aria-controls='tab-Seguimiento' aria-selected='false' area='seguimiento'>Infraestructura</a></li>

				<li class='nav-item'><a class='nav-link' id='adFin-tab' data-bs-toggle='tab' href='#tab-adFin' role='tab' aria-controls='tab-adFin' aria-selected='false'area='adFin'>Técnico</a></li>

				<li class='nav-item'><a class='nav-link' id='infra-tab' data-bs-toggle='tab' href='#tab-infra' role='tab' aria-controls='tab-infra' aria-selected='false'area='infra'>Contratación Pública</a></li>
				</ul>
				
				<div class='tab-content mt-3' id='myTabContent' style='border: 1px solid gray;'>

					<div class='tab-pane fade show active col col-12' id='tab-General' role='tabpanel' aria-labelledby='general-tab'>
					<input type='text' id='organismoOculto__modal' name='organismoOculto__modal' />
					<input type='text' id='periodo' name='periodo' />
					<input type='text' id='nombreDocumento' name='nombreDocumento' />

					<div class='col col-12 textos__titulos mt-4'>

						DOCUMENTOS DE RECOMENDACIÓN 

					</div>

					<div class='col col-4 oculto__subsess__deseados d d-flex justify-content-center'>

						<a id='informe__recomendados' class='btn btn-info' target='_blank'>INFORME PRESUPUESTARIO RECOMENDADO</a>

					</div>

					<div class='col col-4 d d-flex justify-content-center d d-flex justify-content-center'>

						<a id='documentos__tecnicos__t' class='boton__pdfs__tecnicas btn btn-success's target='_blank'>Informe técnico</a>

					</div>


					<div class='col col-4 d d-flex justify-content-center d d-flex justify-content-center'>

						<a id='documentos__tecnicos__i' class='boton__pdfs__infraestructuras btn btn-warning' target='_blank'>Informe infraestructuras</a>

					</div>

					<div class='col col-12 textos__titulos mt-4'>

						ACCIONES DE RECOMENDACIÓN

					</div>

					<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

						Subir archivo firmado

					</div>

					<div class='col col-8 oculto__subsess__deseados'>

						<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

					</div>

					<div class='col col-4 mt-2' style='font-weight:bold;'>

						Enviar al organismo deportivo

					</div>

					<div class='col col-6 mt-2 clases__puedes__recomendares' style='font-weight:bold; color:#4a148c;'>


					</div>


					<div class='col col-2 mt-2'>

						<a class='btn btn-success' id='enviar__orgnaismosDeportivos'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;ENVIAR</a>

					</div>

					<div class='col col-2' style='font-weight:bold;'>

						Devolver a

					</div>

					<div class='col col-8'>

						<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

					</div>

					<div class='col col-2'>

						<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

					</div>

					<div class='fila__reasignar col col-6 d d-flex justify-content-center' style='font-weight:bold;'>

						<a class='btn btn-warning boton__pdfs__tecnicas' id='regresar__areas__tecnicas__seguimientos' target='_blank'>REGRESAR AL ÁREA TÉCNICA</a>

					</div>


					<div class='fila__reasignar col col-6 d d-flex justify-content-center' style='font-weight:bold;'>

						<a class='btn btn-info boton__pdfs__infraestructuras' id='regresar__areas__tecnicas__seguimientos__infraens__2' target='_blank'>REGRESAR AL ÁREA DE INFRAESTRUCTURA</a>

					</div>
				
					<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

						Observaciones

					</div>

					<div class='col col-10 observacionesReasignaciones'>

						<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

					</div>
				</div>

				<div class='tab-pane fade' id='tab-Seguimiento' role='tabpanel' aria-labelledby='seguimiento-tab'>
					<div class='col col-12 text-center mt-2 titulo__enfasis'>
						Recorrido Dirección de Seguimiento de Planes, Programas y Proyectos
					</div>
					<table style='margin-top:.5em!important; width:100%!important;'>

						<thead>

							<tr>

								<th colspan='5'>

									<center>RECORRIDO</center>

								</th>

							</tr>

							<tr>

								<th>FECHA</th>
								<th>ESTADO</th>
								<th>ÁREA</th>
								<th>USUARIO ACTUAL</th>
								<th>OBSERVACIONES</th>

							</tr>

						</thead>

						<tbody class='cuerpo__contenedor__recorridos'></tbody>

					</table>
				</div>

				<div class='tab-pane fade' id='tab-adFin' role='tabpanel' aria-labelledby='adFin-tab'>
					<div class='col col-12 text-center mt-2 titulo__enfasis'>
						Recorrido Coordinación General Administrativa Financiera
					</div>
					<table style='margin-top:.5em!important; width:100%!important;'>

						<thead>

							<tr>

								<th colspan='5'>

									<center>RECORRIDO</center>

								</th>

							</tr>

							<tr>

								<th>FECHA</th>
								<th>ESTADO</th>
								<th>ÁREA</th>
								<th>USUARIO ACTUAL</th>
								<th>OBSERVACIONES</th>

							</tr>

						</thead>

						<tbody class='cuerpo__contenedor__recorridos'></tbody>

					</table>
				</div>

				<div class='tab-pane fade' id='tab-actFis' role='tabpanel' aria-labelledby='actFis-tab'>
					<div class='col col-12 text-center mt-2 titulo__enfasis'>
						Recorrido Subsecretaría de Desarrollo de la Actividad Física
					</div>
					<table style='margin-top:.5em!important; width:100%!important;'>

						<thead>

							<tr>

								<th colspan='5'>

									<center>RECORRIDO</center>

								</th>

							</tr>

							<tr>

								<th>FECHA</th>
								<th>ESTADO</th>
								<th>ÁREA</th>
								<th>USUARIO ACTUAL</th>
								<th>OBSERVACIONES</th>

							</tr>

						</thead>

						<tbody class='cuerpo__contenedor__recorridos'></tbody>

					</table>
				</div>

				<div class='tab-pane fade' id='tab-altoRen' role='tabpanel' aria-labelledby='altoRen-tab'>
					<div class='col col-12 text-center mt-2 titulo__enfasis'>
						Recorrido Subsecretaría de Deporte de Alto Rendimiento
					</div>
					<table style='margin-top:.5em!important; width:100%!important;'>

						<thead>

							<tr>

								<th colspan='5'>

									<center>RECORRIDO</center>

								</th>

							</tr>

							<tr>

								<th>FECHA</th>
								<th>ESTADO</th>
								<th>ÁREA</th>
								<th>USUARIO ACTUAL</th>
								<th>OBSERVACIONES</th>

							</tr>

						</thead>

						<tbody class='cuerpo__contenedor__recorridos'></tbody>

					</table>
				</div>

				<div class='tab-pane fade' id='tab-infra' role='tabpanel' aria-labelledby='infra-tab'>
					<div class='col col-12 text-center mt-2 titulo__enfasis'>
						Recorrido Coordinación de Administración e Infraestructura Deportiva
					</div>
					<table style='margin-top:.5em!important; width:100%!important;'>

						<thead>

							<tr>

								<th colspan='5'>

									<center>RECORRIDO</center>

								</th>

							</tr>

							<tr>

								<th>FECHA</th>
								<th>ESTADO</th>
								<th>ÁREA</th>
								<th>USUARIO ACTUAL</th>
								<th>OBSERVACIONES</th>

							</tr>

						</thead>

						<tbody class='cuerpo__contenedor__recorridos'></tbody>

					</table>
				</div>

				
				</div>
				
				</div>

				

				</form>

			</div>

		</div>
			";

			return $modal;

		}	

			

		public function get__modal__plantilla__inicios__seguimientos__fisicicos__f__r__recomendados2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombreDocumento' name='nombreDocumento' />
							<input type='hidden' id='tipo' name='nombreDocumento' />


							<div class='col col-4'>

								<a id='informe__recomendados' target='_blank'>Descargar Informe recomendado</a>

							</div>

							<div class='col col-4 oculto__subsess__deseados' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-2 mt-2' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='col col-8 mt-2'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>
								<select class='ancho__total__input__selects regresar__superior__con selects__superiores__regresar' id='selects__superiores__regresar__coors'>
								</select>

								<div class='direccion__seguimientos__ocultos'>Dirección de Seguimiento, Planes, Programas y Proyectos</div>

								<div class='ocultosZonalesCoordinadorRecomendar' style='display: none;'>Recomendar Presupuestarios Zonales</div>

							</div>

							<div class='col col-2 mt-2'>

								<a class='btn btn-warning' id='recomendar__form__recomendados2023'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;RECOMENDAR</a>

							</div>

							<div class='col col-2' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

								<select class='ancho__total__input__selects selects__superiores superior__con' id='selects__superiores__subsess'></select>

							</div>

							<div class='col col-2'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>

							<div class='col col-2 observacionesReasignaciones' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	

		
		public function get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados__instalaciones__2023($parametro1,$parametro2,$parametro3){

			$modal="

			<div class='modal fade modal__ItemsGrup hide' id='$parametro1'  data-backdrop='static' data-keyboard='false' tabindex='-1'>

				<div class='modal-dialog' style='min-width:75%!important;'>

					<form class='modal-content formulario__intervencion__eliminar $parametro4' method='post' action='modelosBd/pdf/pdf.modelo.php' method='post'>

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos titulo__alto__rendimientos row'>



							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

					          <span class='button pointer__botones modales__reload' data-dismiss='modal' aria-label='Close' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></span>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							<input type='hidden' id='organismoOculto__modal' name='organismoOculto__modal' />
							<input type='hidden' id='periodo' name='periodo' />
							<input type='hidden' id='nombre__archivo' name='nombre__archivo' />
							<input type='hidden' id='evaluador__movimientos' name='evaluador__movimientos' />

							<div class='col col-4  mt-4 insfraestructuras__re'>

								Informe de recomendación Infraestructura

							</div>

							<div class='col col-8 d d-flex justify-content-center d d-flex justify-content-center insfraestructuras__re'>

								<a id='documentos__tecnicos__t__infras' class='btn btn-warning' target='_blank'></a>

							</div>

							<div class='col col-4  mt-4 instalaciones__re'>

								Informe de recomendación Instalaciones

							</div>

							<div class='col col-8 d d-flex justify-content-center d d-flex justify-content-center instalaciones__re'>

								<a id='documentos__tecnicos__t__infras__instalaciones' class='btn btn-primary' target='_blank'></a>

							</div>



							<div class='fila__regresar__a col col-2 recomendar__ins__ins' style='font-weight:bold;'>

								Recomendar a

							</div>

							<div class='fila__regresar__a col col-6 recomendar__ins__ins'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar'></select>

								
								

							</div>

							<div class='fila__regresar__a col col-2 recomendar__ins__ins'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='fila__regresar__a col col-2 recomendar__ins__ins'>

								<a class='btn btn-warning' id='recomienda__coordinai__directores'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Recomendar</a>

							</div>


							<div class=' col col-4 recomendar__ins__coordinador' style='font-weight:bold; display: none;'>

								Recomendar a

							</div>

							<div class=' col col-8 recomendar__ins__coordinador' style='display: none;'>

								<select class='ancho__total__input__selects regresar__superior__prin selects__superiores__regresar' id='selects__superiores__regresar1'></select>

								<div class='ocultosZonalesCoordinadorRecomendar' style='display: none;'>Recomendar Presupuestarios Zonales</div>

							</div>

							<div class='col col-4 recomendar__ins__coordinador' style='font-weight:bold!important; display: none;'>

								<div class=' documento__infra__coordinador'>
								Subir archivo Informe de recomendación Infraestructura
								</div>
								<div class=' documento__insta__coordinador'>
								Subir archivo Informe de recomendación Instalaciones
								</div>
								
							</div>

							<div class=' col col-4 recomendar__ins__coordinador' style='display: none;'>
								<div class=' documento__infra__coordinador'>
									<input type='file' accept='application/pdf' id='informe__recomendado__infra' name='informe__recomendado' class='ancho__total__input'/>
								</div>
								<div class=' documento__insta__coordinador'>
									<input type='file' accept='application/pdf' id='informe__recomendado__instalaciones' name='informe__recomendado' class='ancho__total__input'/>
								</div>
							</div>

							<div class='col col-4 recomendar__ins__coordinador' style='display: none;'>

								<a class='btn btn-warning' id='recomienda__coordinai__directores__2023'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;Recomendar</a>

							</div>


							<div class='col col-12 textos__titulos mt-4 recomendar__final__ins acciones__recomendaciones__finales'>

								ACCIONES DE RECOMENDACIÓN

							</div>

							<div class='col col-4 oculto__subsess__deseados recomendar__final__ins acciones__recomendaciones__finales' style='font-weight:bold!important;'>

								Subir archivo firmado

							</div>

							<div class='col col-4 oculto__subsess__deseados recomendar__final__ins acciones__recomendaciones__finales'>

								<input type='file' accept='application/pdf' id='informe__recomendado' name='informe__recomendado' class='ancho__total__input'/>

							</div>

							<div class='col col-4 mt-2 recomendar__final__ins acciones__recomendaciones__finales'>

								<a class='btn btn-success' id='enviar__orgnaismosDeportivos__infraestructuras'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;ENVIAR</a>

							</div>


							<div class='col col-2 eliminados__al__coordinador' style='font-weight:bold; display: none;'>

								Devolver a

							</div>

							<div class='col col-6 eliminados__al__coordinador' style='display: none;'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores1'></select>

							</div>

							<div class='col col-4 eliminados__al__coordinador' style='display: none;'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s__infraestructurasCoor'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>
								
								

							</div>

							<div class='col col-2 eliminados__al__de' style='font-weight:bold;'>

								Devolver a

							</div>

							<div class='col col-8 eliminados__al__de'>

								<select class='ancho__total__input__selects selects__superiores superior__sin' id='selects__superiores'></select>

							</div>

							<div class='col col-2 eliminados__al__de'>

								<a class='btn btn-danger' id='devolver__altosReComendados__f__r__s__infraestructuras'><i class='fa fa-share' aria-hidden='true'></i>&nbsp;&nbsp;DEVOLVER</a>

							</div>


							<div class='col col-2 observacionesReasignaciones eliminados__al__de' style='font-weight:bold;'>

								Observaciones

							</div>

							<div class='col col-10 observacionesReasignaciones eliminados__al__de'>

								<textarea id='observacionesReasignaciones' class='ancho__total__textareas'></textarea>

							</div>							

						</div>

					</form>

				</div>

			</div>
			";

			return $modal;

		}	


	}