
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

			<div class="container-fluid pt-2 px-2">
                <div class="row g-2">


				<div class="col-sm-6">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-users" style="color: #1d1273;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Personas  <font id="TotalPersonasBonoDeporteJN"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>
              
				<div class="col-sm-6">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Invertido <font id="TotalInvertidoBonoDeporteJN"></font></font></font></p>
                    		</div>
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
						<button id="btnNuevoBonoDeportivoJN" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoBonoDeportivoJN"> Nuevo  <i class="fal fa-plus-circle"></i> </button>
					</div>
				</div>
			</div>

			

			<table id="paidBonoDeportivoJuegosNacionales">

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Nro</center></th>
						<th COLSPAN=1><center>Item</center></th>
						<th COLSPAN=1><center>Nombre Item</center></th>
						<th COLSPAN=1><center>Deportes</center></th>
						<th COLSPAN=1><center>Nro. Días</center></th>	
						<th COLSPAN=1><center>Total Personas Por Deporte</center></th>
						<th COLSPAN=1><center>Valor del Bono Diario (2% RMU)</center></th>
						<th COLSPAN=1 style='width:5%!important;'><center>Valor Total</center></th>
						<th COLSPAN=1 style='width:5%!important;'><center>Evento</center></th>
					</tr>
				</thead>
				<tbody></tbody>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoBonoDeportivoJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-lg">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id='    '>Asignar<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarNuevoBonoDeportivoJN' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id=' ' class='modal-body row'>
								<div class="row"> 
                                    <div class="col-sm-12">
                                        
                                        <label>Item</label>

										<input id='itemBonoDeportivoJN' type='text' readonly required class='form-control' value='(530310) - Bono deportivo a deportistas, entrenadores y delegados' idItem='182'>  
                                    
                                    </div>
							
                                    
								</div>

                                <div class="row"> 
                                 
                                    <div class="col-sm-8">
                                        
                                        <label>Deporte</label>
                                        
                                        <select id="DeporteBonoDeportivoJN"  class="form-control" >
                                            
                                        </select>
                                    
                                    </div>
								</div>

                                

								<div class="row">
									<div class="col-sm-4">
                                       
                                            <label>Nro. Días</label>
                                             <input id="nroDiasBonoDeportivo" type="text" required class="form-control solo__numero__montos multiplicar_valor_Bono" value="0"> 
										
                                    </div>
                                    <div class="col-sm-4">
            
											<label>Total Personal Deporte</label>
                                             <input id="totalPersonalDeporteBonoDeportivo" type="text" required class="form-control solo__numero__montos multiplicar_valor_Bono" value="0"> 
										
                                    </div>
                                    <div class="col-sm-4">
            
                                            <label>Valor Bono Diario (2% DE LA RMU)</label>
                                             <input id="valorBonoDiarioBonoDeportivo" readonly type="text" required class="form-control solo__numero__montos multiplicar_valor_Bono" value="9"> 
										
                                    </div>
                                </div>

								<div class="row">
                                    <div class="col-sm-6">
											<label>Valor Total</label>
                                            <input id="valorTotalBonoDeportivo" readonly type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>
                                </div>

								<div class="row"> 
                                 
                                    <div class="col-sm-8">
                                        
                                        <label>Evento</label>
                                        
                                        <select id="eventoBonoDeportivoJN"  class="form-control" >
                                            
                                        </select>
                                    
                                    </div>
								</div>

						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap' >

								<a id='guardarBonoDeportivoJN' type='button' class='btn btn-primary  '  data-bs-dismiss='modal'>Guardar</a>

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

		datatabletsDesarollo($("#paidBonoDeportivoJuegosNacionales"), "paidBonoDeportivoJuegosNacionales");

	});	

</script>


