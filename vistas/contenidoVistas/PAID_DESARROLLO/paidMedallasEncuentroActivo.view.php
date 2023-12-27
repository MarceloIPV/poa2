
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


				<div class="col-sm-3">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-medal" style="color: #D5B038;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Medallas de Oro <font id="TotalMedallasOro"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>
                <div class="col-sm-3">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-medal" style="color: #797979;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Medallas de Plata <font id="TotalMedallasPlata"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>
				<div class="col-sm-3">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-medal" style="color: #A97142;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Medallas de Bronce <font id="TotalMedallasBronce"></font></font></font></p>
                    		</div>
                    	</div>
                	</div>
				</div>
				<div class="col-sm-3">
					<div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    	<div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                    		<div class="ms-3">
                        	<p class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total Invertido <font id="TotalMedallas"></font></font></font></p>
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
						<button id="btnNuevoMedallasJN" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoMedallasJN"> Nuevo  <i class="fal fa-plus-circle"></i> </button>
					</div>
				</div>
			</div>

			

			<table id="paidMedallasJuegosNacionales">

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Nro</center></th>
						<th COLSPAN=1><center>Item</center></th>
						<th COLSPAN=1><center>Nombre Item</center></th>
						<th COLSPAN=1><center>Deportes</center></th>
						<th COLSPAN=1><center>Cantidad Medallas de Oro</center></th>	
						<th COLSPAN=1><center>Cantidad Medallas de Plata</center></th>
						<th COLSPAN=1><center>Cantidad Medallas de Bronce</center></th>
						<th COLSPAN=1><center>Total Medallas</center></th>
						<th COLSPAN=1 style='width:5%!important;'><center>Valor Unitario</center></th>
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
<div  class='modal fade modal__ItemsGrup' id='modalNuevoMedallasJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-lg">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id='    '>Asignar<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarNuevoDesarrolloJN' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id=' ' class='modal-body row'>
								<div class="row"> 
                                    <div class="col-sm-6">
                                        
                                        <label>Item</label>

										<input id='itemMedallaJN' type='text' readonly required class='form-control' value='(530822) - Condecoraciones' idItem='235'>  
                                    
                                    </div>
							
                                    <div class="col-sm-6">
                                        
                                        <label>Deporte</label>
                                        
                                        <select id="DeporteMedallaJN"  class="form-control" >
                                            
                                        </select>
                                    
                                    </div>
								</div>

								<div class="row">
									<div class="col-sm-4">
                                       
                                            <label>Cant. Medallas Oro</label>
                                             <input id="cantMedallasOro" type="text" required class="form-control solo__numero__montos sumador__medallas" value="0"> 
										
                                    </div>
                                    <div class="col-sm-4">
            
											<label>Cant. Medallas Plata</label>
                                             <input id="cantMedallasPlata" type="text" required class="form-control solo__numero__montos sumador__medallas" value="0"> 
										
                                    </div>
                                    <div class="col-sm-4">
            
                                            <label>Cant. Medallas Bronce</label>
                                             <input id="cantMedallasBronce" type="text" required class="form-control solo__numero__montos sumador__medallas" value="0"> 
										
                                    </div>
                                </div>

								<div class="row">
									<div class="col-sm-6">
                                        
											<label>Total Medallas</label>
                                             <input id="cantMedallasTotal" readonly type="text" required class="form-control solo__numero__montos multiplicar__valor" value="0"> 
										
                                    </div>
                                    <div class="col-sm-6">
                                       
                                            <label>Valor Unitario</label>
                                             <input id="valorUnitarioMedallas" type="text" required class="form-control solo__numero__montos multiplicar__valor" value="0"> 
										
                                    </div>
                                </div>

								<div class="row">
                                    <div class="col-sm-6">
											<label>Valor Total</label>
                                            <input id="valorTotalMedallas" readonly type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>
                                </div>

								<div class="row"> 
                                 
                                    <div class="col-sm-8">
                                        
                                        <label>Evento</label>
                                        
                                        <select id="eventoMedallasJN"  class="form-control" >
                                            
                                        </select>
                                    
                                    </div>
								</div>

						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap' >

								<a id='guardarMedallasJN' type='button' class='btn btn-primary  '  data-bs-dismiss='modal'>Guardar</a>

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

		AsignarMontoMedallasJN("obtener_valores_medallas");
	});	

	

	$.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js",function(){

		datatabletsDesarollo($("#paidMedallasJuegosNacionales"), "paidMedallasJuegosNacionales");

	});	

</script>


