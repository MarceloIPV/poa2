
<?php $componentes= new componentes();
$componentesPaid= new componentesPaid();

session_start();


$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];

$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);


$objeto= new usuarioAcciones();?>

<input type="hidden" style="width:10%" id="JuegosNacionalesIDComponentes" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDRubro" name="JuegosNacionales">
<input type="hidden" id="identificador" name="identificador" value="1">


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

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
                                <h4 id='MontoAsignadoJN' class="mb-0 restar__montos"></h4>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Planificar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarJN'  class="mb-0"></h4>
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
						<button id="btnNuevoEventoJN" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoEventoJN"> Nuevo  <i class="fal fa-plus-circle"></i> </button>
					</div>
				</div>
			</div>

			

			<table id="paidEventosDesarrollo">

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Nro</center></th>
                        <th COLSPAN=1><center>Nombre</center></th>
						<th COLSPAN=1><center>Sede</center></th>
						<th COLSPAN=1><center>SubSede</center></th>
						<th COLSPAN=1><center>Participantes</center></th>
						<th COLSPAN=1><center>Obj. General</center></th>	
						<th COLSPAN=1><center>Obj. Específicos</center></th>
						<th COLSPAN=1><center>Meta</center></th>
                        <th COLSPAN=1><center>Deporte</center></th>
                        <th COLSPAN=1><center>Modalidad</center></th>
                        <th COLSPAN=1><center>Fecha Inicio</center></th>
                        <th COLSPAN=1><center>Fecha Fin</center></th>
						
					</tr>
				</thead>
				<tbody></tbody>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoEventoJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-lg">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id='    '>Asignar<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarNuevoEventoDesarrollo' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id=' ' class='modal-body row'>
								<div class="row"> 
                                    <div class="col-sm-12">
                                        
                                        <label>Nombre del Evento</label>

										<input id='nombreEventoDesarrollo' type='text' required class='form-control' value=''>  
                                    
                                    </div>
							
                                    
								</div>

                                <div class="row"> 
                                 
                                    <div class="col-sm-4">
                                        
                                        <label>Sede</label>
                                        
                                        <input id='nombreSede' type='text' required class='form-control' value=''> 
                                    
                                    </div>

									<div class="col-sm-4">
                                        
                                        <label>SubSede</label>
                                        
                                        <input id='nombreSubsede' type='text' required class='form-control' value=''> 
                                    
                                    </div>
								
									<div class="col-sm-4">
                                       
                                            <label>Participantes</label>
                                             <input id="nroParticipantes" type="text" class="form-control solo__numero__montos multiplicar_valor_Bono" value="0"> 
										
                                    </div>
                                    
                                </div>

								<div class="row">
                                    <div class="col-sm-12">
											<label>Objetivo General</label>
                                            
											<textarea id='obj_General' class="form-control" style='width: 100%;'></textarea>
                                    </div>
                                </div>

								<div class="row">
                                    <div class="col-sm-12">
											<label>Objetivos Específicos</label>
                                            
											<textarea id='obj_Especificos' class="form-control" style='width: 100%;'></textarea>
										
                                    </div>
                                </div>

								<div class="row">
                                    <div class="col-sm-12">
											<label>Meta</label>
                                            
											<textarea id='meta' class="form-control" style='width: 100%;'></textarea>
										
                                    </div>
                                </div>

								
								<div class="row">
									<div class="col-md-6">
										<label>Deporte</label>
									
										<select class="form-select" id="idSelectDeporteEventos" aria-label="Default select example">

										</select>
									</div>
									<div class="col-md-6">
										<label>Modalidad</label>
									
										<select class="form-select" id="idSelectModalidadEventos" aria-label="Default select example">

										</select>
									</div>
                                </div>

								<div class="row">
									<div class="col-md-6">
										<label>Fecha Inicio</label>
									
										<input type="date" id="fechaInicioEvento" class="form-control">
									</div>
								
									<div class="col-md-6">
										<label>Fecha Fin</label>
									
										<input type="date" id="fechaFinEvento" class="form-control">
									</div>
                                </div>


								

						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap' >

								<a id='guardarEventoDesarrollo' type='button' class='btn btn-primary  '  data-bs-dismiss='modal'>Guardar</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

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

	AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

	});	


	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js",function(){

		datatabletsDesarollo($("#paidEventosDesarrollo"), "paidEventosDesarrollo");

	});	

</script>


