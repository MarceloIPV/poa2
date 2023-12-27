
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


			<div class="col-md-12">
				<div class="row">
					<div class="col-md-10">

			
						
					</div>
					<div class="col-md-2">
						<button id="btnNuevoInformeObraInfra" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoInformeFiscalizacion"> Nuevo  <i class="fal fa-plus-circle"></i> </button>
					</div>
				</div>
			</div>

			

			<table id="paidInformeFiscalizacionInfraestructura">

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Número</center></th>
						<th COLSPAN=1><center>Documento</center></th>
						<th COLSPAN=1><center>Anexos</center></th>
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
<div  class='modal fade modal__ItemsGrup' id='modalNuevoInformeFiscalizacion' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-xl">
		

            <form class='modal-content formularioConfiguracion formularioInformeObraInfra' action='modelosBd/pdf/pdf.modelo.paid.php' method='post' needs-validation" novalidate>


						<input type='hidden' id='tipoPdf' name='tipoPdf' value='pdf__informe__fiscalizacion__infraestructura__2023' />
						

						<div class='modal-header row d d-flex align-items-center' style='background:white!important;'>

							<div class='col col-2 text-right'>

								<image src='images/titulo__ministerio__deporte.png'/>

							</div>
							

							<div class='col col-7 text-center textos__titulos  row'> 
								<span name="tituloInforme">
                                Informe de justificación del requerimiento para optimización de infraestructura deportiva FISCALIZACIÓN

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

											

                                            <div class='col col-6 text-right textos__titulos' style='font-weight:bold;'>
                                               
                                                ORGANISMO DEPORTIVO:

											</div>

											<div class='nombre__organizacion__deportivas col col-6 ' style='font-weight:bold;'></div>

											<input type='hidden' id='nombre__organizacion__deportivas' name='nombre__organizacion__deportivas' />


                                            <div class='col col-4 mt-2 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;Nombre de la Intervención:

											</div>


                                            <div class='col col-8 mt-2'><textarea class="form-control" id="nombreIntervencion" name="nombreIntervencion" placeholder="detallar el nombre de la intervención que requiere de Fiscalización" style="width:100%;" required></textarea></div>

                                           

                                        </div>
									</div>

                                    <div class='col col-12 row d-flex mt-4'>

										<div class='col col-12 row'>

											<div class='col col-6 text-center textos__titulos'>

                                                •	Propiedad del Escenario deportivo

											</div>

                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="propiedadEscenario" id="propiedadEscenario" placeholder="(Nombre del propietario, en caso de administración como un tercero, detallar el propietario desglosando que lo administra el Organismo respectivo" style="width:100%;" required></textarea></div>

                                            <div class='col col-6 text-center textos__titulos'>

                                                •	Tipo de gasto

											</div>

                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="tipoGasto" id="tipoGasto" style="width:100%;" placeholder="(gastos por Fiscalización para optimización de infraestructura deportiva)." required></textarea></div>

                                            <div class='col col-6 text-center textos__titulos'>

                                                •	Justificación

											</div>

                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="justificacion" id="justificacion" placeholder="(por qué se requiere la fiscalización, perfil técnico requerido)." style="width:100%;" required></textarea></div>

                                            <div class='col col-6 text-center textos__titulos'>

                                                •	Productos

											</div>

                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="productos" id="productos" style="width:100%;" placeholder="(productos esperados de la Fiscalización)." required></textarea></div>


                                            <div class='col col-6 text-center textos__titulos'>

                                                •	Número de beneficiarios 

											</div>

                                            <div class=' col col-6 mt-2'><textarea class="form-control" name="numeroBeneficiarios" id="numeroBeneficiarios" placeholder="(productos esperados de la Fiscalización)." style="width:100%;" required></textarea></div>
										</div>

									</div>


                                   
                                    <input type='hidden' id='presidente__organizacion__deportivas' name='presidente__organizacion__deportivas' />

											

									<div class='col col-12 row' style="margin-top:1em;" >
                                        
										<table>

											<thead>

												<tr>

														<th  >

															<center><a class="btn btn-primary" href="documentos/paid/anexosInfraestructura/Anexo1.xls" role="button">Anexo Informe Justificativo</a></center>

														</th>

														<th >

															<center><a class="btn btn-primary" href="documentos/paid/anexosInfraestructura/Anexo2.xlsx" role="button">Anexo 2 Informe Justificativo</a></center>

														</th>

														<th >

															<center><a class="btn btn-primary" href="documentos/paid/anexosInfraestructura/4.Declaracion_de_autorizacion_para_la_realizacion_de_la_intervencion_y_compromiso_de_recepcion_(entidad admisnistradora).docx" role="button">Anexo Declaración Autorización</a></center>

														</th>

														<th >

															<center><a class="btn btn-primary" href="documentos/paid/anexosInfraestructura/3.Declaracion_de_revision_y_validacion_de_etudios_definitivos_(entidad ejecutora).docx" role="button">Anexo Declaración Revisión</a></center>

														</th>

														

												</tr>

												<tr>

														<th  colspan="2">

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
                                                    
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">PRESUPUESTO </span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="presupuestoFiscalizacionInput" name="presupuestoFiscalizacionInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarpresupuestoFiscalizacion" name="guardarpresupuestoFiscalizacion" nombre="certificadoNoDisponerTecnicos"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>
												<tr>
                                                    
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">CERTIFICADO DE NO DISPONER TÉCNICOS AFINES </span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="certificadoNoTecnicosInput" name="certificadoNoTecnicosInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarcertificadoNoTecnicos" name="guardarcertificadoNoTecnicos" nombre="certificadoNoDisponerTecnicos"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td  colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">DECLARACIÓN DE REVISIÓN Y VALIDACIÓN DE ESTUDIOS DEFINITIVOS</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="declaracionRevisionValidacionInput" name="declaracionRevisionValidacionInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardardeclaracionRevisionValidacion" name="guardardeclaracionRevisionValidacion" nombre="declaracionRevisionValidacionEstudios"  class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">DECLARACIÓN DE AUTORIZACIÓN PARA LA REALIZACIÓN DE LA INTERVENCIÓN Y COMPROMISO DE RECEPCIÓN</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="declaracionAutorizacionIntervencionInput" name="declaracionAutorizacionIntervencionInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardardeclaracionAutorizacionIntervencion" name="guardardeclaracionAutorizacionIntervencion" nombre="declaracionAutorizacionIntervencion"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">ESTUDIO DE MERCADO</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="estudioMercadoInput" name="estudioMercadoInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarestudioMercado" name="guardarestudioMercado"  nombre="estudioMercado"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">COPIA CERTIFICADA DEL PREDIO </span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="copiaPredioInput" name="copiaPredioInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarcopiaPredio" name="guardarcopiaPredio" nombre="copiaPredio"  class="editar__ides"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

												<tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">ACUERDO MINISTERIAL CON EL CUAL SE APROBÓ Y REFORMO EL ESTADO</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="acuerdoMinisterialInput" name="acuerdoMinisterialInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardaracuerdoMinisterial" name="guardaracuerdoMinisterial"  nombre="acuerdoMinisterial" class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

                                                <tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">REGISTRO DE DIRECTORIO DE LA OD</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="registroDirectorioInput" name="registroDirectorioInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardaregistroDirectorio" name="guardaregistroDirectorio"  nombre="registroDirectorio" class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

                                                <tr>
													<td colspan="2" style="justify-content:center;">
														<center>
															<span style="color:blue">RESOLUCIONES DE INTERVENCIONES DE OD</span>
														</center>
														
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-12 text-center">
															<input type="file" accept="application/pdf" id="resolucionIntervencionInput" name="resolucionIntervencionInput" class="ancho__total__input text-center form-control" required/>
															</div>
														</center>
													</td>
													<td style="justify-content:center;">
														<center>
															<div class="col col-3 text-center">
																<nav class="btn-pluss-wrapper otrosHabilitantes'+contado2+'"><div href="#" class="btn-pluss"><ul><li><a style="cursor:pointer;" id="guardarresolucionIntervencion" name="guardarresolucionIntervencion"  nombre="resolucionIntervencion" class="editar__ides" ><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li></ul></div></nav>
															</div>
														</center>
													</td>
												</tr>

											
											</tbody>

										</table>
									</div>	

									<div class='col col-12 row d-flex mt-4'>

										<div class='col col-12 row'>


                                            <div class='col col-12 text-left textos__titulos' style='font-weight:bold;'>

                                                &nbsp;Responsable de la elaboración del PAID - OD

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

										<input type='file' accept='application/pdf' id='archivoSubido__InfraFiscalizacion' name='archivoSubido__InfraFiscalizacion'>

									</div>

									<div class=' col col-4 mt-4 text-center'>

										<a class='btn btn-primary' id='guardarArchivo__InfraFiscalizacion'><i class='fa fa-floppy-o' aria-hidden='true'></i>&nbsp;&nbsp;GUARDAR</a>

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

        datatabletsPaidInfraestructuraVacio($("#paidInformeFiscalizacionInfraestructura"),"paidInformeFiscalizacionInfraestructura","s",objetosPaidInfraestructura2023([1,2,3],["enlace","boton","boton"],[1,"<center><a data-bs-toggle='modal' data-bs-target='#modalDocumentosAnexosInfraestructura' class='anexosObraInfraFiscalizacion estilo__botonDatatablets btn btn-warning pointer__botones'><i class='fas fa-folder'></i></a><center>","<center><a class='eliminarInformeObraInfra estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>"],[$("#filesFrontend").val()+"paid/informes__infraestructura/"],[1]),[$("#JuegosNacionalesIDRUBRO").val(),$("#JuegosNacionalesIDCOMPONENTE").val()],"");

		
	});

	

</script>


