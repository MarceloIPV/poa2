<?php

	class componentesTablas__dos{

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



							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones'>

								No corresponde

							</div>		


							<div class='fila__regresar__a__informe__recomendacion col col-8 oculto__file__recomendaciones text-left d d-flex justify-content-right'>

								<a class='btn btn-danger' id='no__correspondeA'>No corresponde</a>

							</div>



							<div class='fila__regresar__a__informe__recomendacion col col-4 oculto__file__recomendaciones'>

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



	}