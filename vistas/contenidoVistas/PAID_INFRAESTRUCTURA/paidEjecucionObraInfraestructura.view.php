
<?php $componentes= new componentes();
$componentesPaid= new componentesPaid();
$componentesTablas = new componentesTablas(); 


session_start();


$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];

$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);


$objeto= new usuarioAcciones();?>




<div class="content-wrapper">



	<section class="content row d d-flex justify-content-center">

    <input type="hidden" id="identificador" name="identificador" value="2">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

		
		<h3 id='tituloComponenteJN' align='center'></h3>
		
		<h3 id='tituloJN' align='center'></h3> 

		

		<div class="row">

			<div class="container-fluid pt-2 px-2">
                <div class="row g-2">
					<div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Rubro:</h4>
                            <div class="ms-3">
                                <h4 id='MontoJN' class="mb-0"></h4>
                            </div>
                        </div>
                    </div>
					

                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Planificado:</h4>
                            <div class="ms-3">
                                <h4 id='MontoAsignadoInfraestructura' class="mb-0 restar__montos"></h4>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Planificar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarInfraestructura'  class="mb-0"></h4>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>



			<div class="col-md-12">
				<div class="row">
					<div class="col-md-10">

			
						
					</div>
					<div class="col-md-2">
						<button id="btnNuevoInformeObraInfra" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoMedallasJN"> Nuevo  <i class="fal fa-plus-circle"></i> </button>
					</div>
				</div>
			</div>

			

			<table id="paidInformeObraInfraestructura">

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Monto</center></th>
						<th COLSPAN=1><center>Documento</center></th>
						<th COLSPAN=1><center>Anexos</center></th>
						<th COLSPAN=1><center>Beneficiarios Directos</center></th>
						<th COLSPAN=1><center>Beneficiarios Adaptado</center></th>
						<th COLSPAN=1><center>Eliminar</center></th>
						
					</tr>
				</thead>
				<tbody></tbody>
				
			</table>

		</div>

	</section>

</div>

<?= $componentesTablas->getModalVacioXl("modalDocumentosAnexosInfraestructura", "formContratacionPublica", "tituloModalDocumentosInfraestructura", "divDocumentosInfraestructura", "cerrarBtnContratacionPublica", "inputIdItem"); ?>


<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoMedallasJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-xl">
		

            <form class='modal-content formularioConfiguracion formularioInformeObraInfra' action='modelosBd/pdf/pdf.modelo.paid.php' method='post' needs-validation" novalidate>

						<input type='hidden' name='beneficiariosDirectos' id='beneficiariosDirectos'/>
						<input type='hidden' name='beneficiariosAdaptado' id='beneficiariosAdaptado'/>
						<input type='hidden' name='beneficiariosIndirectos' id='beneficiariosIndirectos'/>

						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__informe__obra__infraestructura__2023' />
						

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos  row'> 
								<span name="tituloInforme">
									INFORME JUSTICATIVO DEL REQUERIMIENTO PARA OPTIMIZACIÓN DE INFRAESTRUCTURA DEPORTIVA 
								</span>
							</div>


							<div class='col col-2 text-left'>

								<image src='images/titulo__principis__ministerios.png'/>

							</div>

					        <div class='col col-1'>

                                <button type='button' id='btnCerrarNuevoDesarrolloJN' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='fas fa-times-circle' style='font-size:18px!important; color:blue!important;'></i></button>

					        </div>

						</div>

						<div class='modal-body row $parametro3'>

							
							<div class='row '>


									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-12 row'>

											<div class='col col-12 text-left textos__titulos'>

												1. DATOS GENERALES DEL OBJETO DEL FINANCIAMENTO

											</div>

                                            <div class='col col-6 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;1.1 NOMBRE DEL OBJETO DE FINANCIAMIENTO:

											</div>


                                            <div class='col col-6 mt-2'><textarea class="form-control" id="objetoFinanciamiento" name="objetoFinanciamiento" placeholder="El nombre del objeto de financiamiento deberá ser igual al que consta en los estudios y diseños definitivos" style="width:100%;" required></textarea></div>

                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;1.2 INFORMACIÓN GENERAL DE LA ORGANIZACIÓN DEPORTIVA/ ENTIDAD EJECUTORA:

											</div>

                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;1.2.1 Datos de la organización deportiva

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

                                                &nbsp;&nbsp;NÚMERO Y FECHA DE ACUERDO MINISTERIAL:

											</div>

											<div class='acuerdo__ministerial__organizacion__deportivas col col-6 mt-2'></div>

											<input type='hidden' id='acuerdo__ministerial__organizacion__deportivas' name='acuerdo__ministerial__organizacion__deportivas' />

                                            
										</div>

									</div>

                                    <div class='col col-12 row d-flex mt-4'>
                                        <div class='col col-7 row'>
										    <div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;1.2.2 DATOS DEL REPRESENTANTE LEGAL ORGANIZACIÓN DEPORTIVA.

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

											<div class='col col-6 mt-2'><input class="form-control" type="tel" name="telCelInfra" id="telCelInfra"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="xxx-xxx-xxxx" required ></div>

											

                                            <div class='col col-6 mt-2' style='font-weight:bold;'>

                                                &nbsp;&nbsp;TELÉFONO CONVENCIONAL:

											</div>

											<div class='col col-6 mt-2'><input class="form-control" type="tel" name="telConInfra" id="telConInfra"  maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="xxx-xxx-xxx" required title="Por favor Introduzca Un Teléfono"></div>
                                        </div>

										

									</div>


                                    <div class='col col-12 row d-flex mt-4'>
                                        <div class='col col-7 row'>
                                            <div class='col col-12 mt-2 textos__titulos' style='font-weight:bold;'>

                                            &nbsp;1.3 PROPUESTA DE FINANCIAMIENTO E INVERSIÓN

                                            </div>
                                        </div>

										<table style='margin-top:.5em!important; width:80%!important; border-collapse: collapse; margin-top:.5em!important;' border='1'>

												<tr >

													<th >

														<center>DETALLE</center>

													</th>

                                                    <th >

														<center>VALOR</center>

													</th>
								
												</tr>

												<tr>


													<th>

														<center>OBRA</center>

													</th>

													<td>
														<center>
														<input type='text' id='valorObra' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' value='0'  name='valorObra' required/>
														</center>
													</td>

													
												</tr>

													
												<tr>
												
													<th>

														<center>FISCALIZACIÓN (Si aplica)</center>

													</th>

													
													<td>
														<center>
														<input type='text' id='valorFiscalizacion' class='form-control solo__numero cambio__de__numero__f sumar_obra_fiscalizacion' value='0' name='valorFiscalizacion' required />
														</center>
													</td>

													
												</tr>

                                                <tr>
												
													<th>

														<center>TOTAL</center>

													</th>

													
													<td>
														<center>
														<input type='text' id='totalValores' value='0' readonly class='form-control solo__numero cambio__de__numero__f' name='totalValores' />
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

                                        <div class='col col-1' style='font-weight:bold;'>

                                            Fecha Inicio:

                                        </div>

                                        <div class='col col-2' >

                                        <input id="fechaInicioInfra" name="fechaInicioInfra" class="form-control" type="date" required/>

										
                                        </div>

                                        <div class='col col-1' style='font-weight:bold;'>

                                            Fecha de Término:

                                        </div>

                                        <div class='col col-2'>

                                        <input id="fechaFinInfra" name="fechaFinInfra" class="form-control" type="date" required/>

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
														<select id="idSelectpais"  name="selector__paises" class="form-control ancho__totalText campos__obligatorios selector__paises" required></select>
														</center>
													</td>

													
												</tr>

													
												<tr>
												
													<th>

														<center>PROVINCIA</center>

													</th>

													
													<td>
														<center>
														<select id="idSelectprovincia" name="provincia__Datos" class=" form-control ancho__totalText campos__obligatorios" required></select>
														</center>
													</td>

													
												</tr>

                                                <tr>
												
													<th>

														<center>CANTÓN</center>

													</th>

													
													<td>
														<center>
														<select id="idSelectCanton" name="canton__Datos" class="form-control ancho__totalText campos__obligatorios" required>
															<option selected>----Seleccione Opción----</option>
														</select>
														</center>
													</td>

													
												</tr>

												<tr>
												
												<th>

													<center>PARROQUIA / COMUNIDAD</center>

												</th>

												
												<td>
													<center>
													<select id="idSelectParroquia" name="parroquia__Datos" class="form-control ancho__totalText campos__obligatorios" required>
														<option selected>----Seleccione Opción----</option>
													</select>
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

											<tr>
												
												<th>

													<center>UBICACIÓN GEOGRÁFICA</center>

												</th>

												
												<td>
													<center>
													<input type='text' id='ubicacionGeografica'  class='form-control ancho__totalText' name='ubicacionGeografica' required/>
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


                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="analisisSituacion" id="analisisSituacion" placeholder="Descripción de la realidad existente, problemas o necesidades de su población o grupo objetivo (deportistas, estudiantes, comunidad)." style="width:100%;" required></textarea></div>

                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.2 ANTECEDENTES

											</div>

											<div class=' col col-6 mt-2'><textarea class="form-control" name="antecedentes" id="antecedentes" placeholder="Aspectos y circunstancias que motivan la identificación y preparación del objeto de financiamiento. Puede contener información referente a indicadores cualitativos y cuantitativos que apoyen su comprensión. En el caso de aprobación del PAID 2023 se detallará el Acuerdo 0456 mediante el cual el Ministerio del Deporte regula el ciclo de planificación de las Organizaciones Deportivas." style="width:100%;" required></textarea></div>

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.3 ARTICULACIÓN NORMATIVA

											</div>

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.4 JUSTIFICACIÓN

											</div>

											<div class=' col col-6 mt-2'><textarea class="form-control" name="justificacion" id="justificacion" placeholder="Justificativos para la obtención del financiamiento considerando lo siguiente: En qué medida la ejecución del objeto de financiamiento contribuirá a solucionar las necesidades identificadas en el área o zona de acción del objeto de financiamiento." style="width:100%;" required></textarea></div>

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.5 OBJETIVO GENERAL Y OBJETIVOS ESPECÍFICOS

											</div>


                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;2.5.1 Objetivo general o propósito

											</div>


											<div class=' col col-6 mt-2'><textarea class="form-control" name="objetivoGeneral" id="objetivoGeneral" placeholder="Es el enunciado de lo que se considera posible alcanzar, respecto al problema o situación negativa. Es importante tener un solo objetivo general para evitar desviaciones o mal entendidos en el desarrollo del objeto de financiamiento, a su vez se debe relacionar con el incremento del capital social." style="width:100%;" required></textarea></div>

											 <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;2.5.2 Objetivos Específicos

											</div>


											<div class=' col col-6 mt-2'><textarea name="objetivosEspecificos" id="objetivosEspecificos" style="width:100%;" placeholder="Es la desagregación del objetivo general. Corresponde a objetivos más puntuales que contribuyen a lograr el objetivo general del objeto de financiamiento. Estos objetivos deben ser medibles, apropiados, temporales y realistas" class="form-control" required></textarea></div>


											 <div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.6 META DEL OBJETO DE FINANCIAMIENTO

											</div>

											<div class=' col col-6 mt-2'><textarea name="metaObjeto" id="metaObjeto" style="width:100%;" class="form-control" placeholder="Define el resultado final esperado. Las metas deben ser alcanzables, cuantificables, realistas cronológicamente limitadas y reflejar los compromisos adquiridos" required></textarea></div>


											<div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;2.7	IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA

											</div>

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;2.7.1 Beneficiarios Directos

											</div>

											<div class=' col col-6 mt-2' style="text-align: justify;">Son las personas que se benefician directamente de la ejecución del objeto de financiamiento. Ejemplo: deportistas, estudiantes, ciudadanía en general en el rango de edad de 5 a 69 años</div>

										</div>

									</div>

									

									<div class='col col-12 row d-flex mt-4'>
                                        
										<table>

											<thead>

												<tr>

													<th colspan='13'>

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

														<center>BENEFICIARIOS</center>

														</th>

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
														<center>DIRECTOS</center>
													</th>

												</tr>

											</thead>

											<tbody class='cuerpo__indicadores__altos'>
											</tbody>

										</table>
									</div>	

									<div class='col col-4'>

										Click si pertenece a Deporte Adaptado y/o Paralímpico

									</div>

									<div class='col col-1' >

										<input type='checkbox' id='registroDeporteAdaptadoPaid' name='registroDeporteAdaptadoPaid'  class='checkeds' />

									</div>

									<div class='col col-12 row divTablaAdaptado' style="display: none; margin-top:1em;" >
                                        
										<table>

											<thead>

												<tr>

													<th colspan='16'>

														<center><a class='btn btn-warning' id='agregar__beneficiariosAdaptado'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

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

														<th colspan='6' style='background-color: #7d818c;'>

														<center>TIPO DISCAPACIDAD</center>

														</th>

														<th colspan='1' >

															<center>BENEFICIARIOS </center>

														</th>

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

													

													<th style='background-color: #7d818c;'>
														<center>VISUAL</center>
													</th>


													<th style='background-color: #7d818c;'>
														<center>AUDITIVA</center>
													</th>

													<th style='background-color: #7d818c;'>
														<center>MULTISENSORIAL</center>
													</th>


													<th style='background-color: #7d818c;'>
														<center>INTELECTUAL</center>
													</th>

													<th style='background-color: #7d818c;'>
														<center>FÍSICA</center>
													</th>


													<th style='background-color: #7d818c;'>
														<center>PSIQUICA</center>
													</th>

													<th>
														<center>DIRECTOS</center>
													</th>

												</tr>

											</thead>

											<tbody class='cuerpo__beneficiarios__adaptado'>
											</tbody>

										</table>
									</div>	

									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-12 row'>

											<div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;2.7.2 Beneficiarios Indirectos

											</div>

											<div class=' col col-6 mt-2' style="text-align: justify;">Son aquellas personas que se benefician de forma indirecta con el desarrollo del objeto de financiamiento. Ejemplo: delegados y/o población que se ubican en zonas de influencia del objeto de financiamiento</div>

										</div>

									</div>

									<div class='col col-12 row' style="margin-top:1em;" >
                                        
										<table>

											<thead>

												<tr>

													<th colspan='3'>

														<center><a class='btn btn-warning' id='agregar__beneficiariosIndirectos'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

													</th>

												</tr>

												<tr>

														<th  >

															<center>BENEFICIARIOS INDIRECTOS</center>

														</th>

														<th >

															<center>TOTAL</center>

														</th>

														<th >

															<center>JUSTIFICACIÓN CUANTITATIVA</center>

														</th>

												</tr>

											</thead>

											<tbody class='cuerpo__beneficiarios__indirectos'>
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

                                                &nbsp;&nbsp;3.1.1 Situación Legal del Predio 

											</div>


											<div class=' col col-6 mt-2'><textarea name="situacionLegal" id="situacionLegal" style="width:100%;" placeholder="Aquí detallará la situación legal vigente del predio, por ejemplo: El presente objeto de financiamiento se ejecutará en el gimnasio del Coliseo Santa Catalina de Guambo, cuyo predio se encuentra en propiedad de la Federación Deportiva de Guambo sobre la cual no pesa gravamen alguno." class="form-control" required ></textarea></div>

											 <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;&nbsp;3.1.2 Aprobación Municipal de planos y permiso de construcción 

											</div>


											<div class=' col col-6 mt-2'><textarea name="aprobacionMunicipal" id="aprobacionMunicipal" style="width:100%;" placeholder="Deberán ser presentados los planos que correspondan debidamente aprobados y el permiso de construcción otorgado por la autoridad municipal donde se ejecutará el objeto de financiamiento, a fin de cumplir con las regulaciones correspondientes y evitar suspensión de obra por falta de ellos" class="form-control"></textarea></div>


											 <div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;3.2 DISEÑOS DEFINITIVOS

											</div>

										</div>

									</div>


									<div class='col col-12 row' style="margin-top:1em;" >
                                        
										<table>

											<thead>

												<tr>

													<th colspan='3'>

														<center><a class='btn btn-warning' id='agregar__beneficiariosIndirectos'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;AGREGAR</a></center>

													</th>

												</tr>

												<tr>

														<th  >

															<center>Documento</center>

														</th>

														<th >

															<center>CARGA</center>

														</th>

														<th >

															<center>GUARDAR</center>

														</th>

												</tr>

											</thead>

											<tbody>
												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.1	PLANOS CON FIRMAS DE RESPONSABILIDAD DE PROFESIONALES.</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="planosInput" name="planosInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarPlanos" name="guardarPlanos" nombre="planos"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.2	ESPECIFICACIONES TÉCNICAS</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="especificacionTecnicaInput" name="especificacionTecnicaInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarEspecificacionTecnica" name="guardarEspecificacionTecnica" nombre="especificacionTecnica"  class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.3	PRESUPUESTO REFERENCIAL</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="presupuestoReferencialInput" name="presupuestoReferencialInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarPresupuestoReferencial" name="guardarPresupuestoReferencial" nombre="PresupuestoReferencial"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.4	ANÁLISIS DE PRECIOS UNITARIOS</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="analisisPreciosInput" name="analisisPreciosInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarAnalisisPrecios" name="guardarAnalisisPrecios"  nombre="analisisPrecios"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.5	CRONOGRAMA VALORADO DE EJECUCIÓN </span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="cronogramaValoradoInput" name="cronogramaValoradoInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarCronogramaValorado" name="guardarCronogramaValorado" nombre="cronogrmaValorado"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td style="justify-content:center;">
														<center>
															<span style="color:blue">3.2.6 CÁLCULOS DE VOLÚMENES DE OBRA</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-6 text-center">
															<input type="file" accept="application/pdf" id="calculoVolumenesInput" name="calculoVolumenesInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarCalculoVolumenes" name="guardarCalculoVolumenes"  nombre="CalculoVolumenes" class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

											
											</tbody>

										</table>
									</div>	

									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-12 row'>


                                            <div class='col col-12 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;3.3 PROPUESTA DE USO DE IMAGEN CORPORATIVA

											</div>


                                            <div class=' col col-6 mt-2'><textarea id="propuestaImagenCorporativa" name="propuestaImagenCorporativa" placeholder="En esta sección indicar cómo será difundida la imagen institucional del Ministerio, las dimensiones del logotipo, su ubicación en la obra o instalaciones donde se implantará el objeto de financiamiento, esta propuesta." style="width:100%;" class="form-control" required></textarea></div>

                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;Nombre Profesional Técnico Responsable

											</div>

											<div class=' col col-6 mt-2'><input type="text" style="width:100%;" id="nombreProfesionalTecnico" name="nombreProfesionalTecnico" class="form-control" required></div>

											

										</div>

									</div>

									<div class=' col col-2 mt-4 text-center '>

										<button type='submit' class='btn btn-warning'><i class='fa fa-file-pdf-o' aria-hidden='true'></i>&nbsp;&nbsp;Generar pdf</button>

									</div>

									<div class=' col col-2 mt-4 text-center textos__titulos '>

										Subir reporte generado en pdf

									</div>

									<div class=' col col-4 mt-4 text-center '>

										<input type='file' accept='application/pdf' id='archivoSubido__InfraObra' name='archivoSubido__seguimientos'>

									</div>

									<div class=' col col-4 mt-4 text-center'>

										<a class='btn btn-primary' id='guardarArchivo__InfraObra'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;GUARDAR</a>

									</div>

							</div>

						</div>

					</form>


	</div>

</div>

<script>
	var anoIngreso = <?php echo $json_variable; ?>;

    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
	$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));

	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js",function(){

		AsignarIdRubroJN("obtener_idRubro_JN",$("#identificador").val());  

	});	


	$.getScript("layout/scripts/js/PAID_INFRAESTRUCTURA/datatables.js",function(){

        datatabletsPaidInfraestructuraVacio($("#paidInformeObraInfraestructura"),"paidInformeObraInfraestructura","s",objetosPaidInfraestructura2023([1,2,3,4,5],["enlace","boton","boton","boton","boton"],[1,"<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='anexosObraInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-folder'></i></a><center>","<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='beneficiariosDirectosObraInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-users'></i></a><center>","<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='beneficiariosObraAdaptadoInfra estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-user-friends'></i></a><center>","<center><a class='eliminarInformeObraInfra estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>"],[$("#filesFrontend").val()+"paid/informes__infraestructura/"],[1]),[$("#JuegosNacionalesIDRUBRO").val(),$("#JuegosNacionalesIDCOMPONENTE").val()],"");

		
	});

	


	$( document ).ready(function() {
		$.getScript("layout/scripts/js/PAID_INFRAESTRUCTURA/selector.js",function(){

			AsignarMontoPAIDInfraestructura("obtener_valor_total_paid_infraestructura");
		});
	});

</script>


