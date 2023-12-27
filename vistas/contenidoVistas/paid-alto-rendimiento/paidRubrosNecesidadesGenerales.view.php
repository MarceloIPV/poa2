
<?php $componentes= new componentes();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();?>


<input type="hidden" id="idRubroNeceGenerales" name="idRubroNeceGenerales">
<input type="hidden" id="ïdentificador" name="ïdentificador" value="0">
<input type="hidden" id="identificador" name="identificador" value="0">


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

	<input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
	<input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

		<h3 id='tituloComponenteAR' align='center'></h3>
		
		<h3 id='tituloRubroAR' align='center'></h3> 


		

		<div class="row">

			<div class="container-fluid pt-2 px-2">
                <div class="row g-2">
					<div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Rubro:</h4>
                            <div class="ms-3">
                                <h4 id='MontoAR' class="mb-0"></h4>
                            </div>
                        </div>
                    </div>

				
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Planificado:</h4>
                            <div class="ms-3">
                                <h4 id='MontoAsignadoNecesidadesGenerales' class="mb-0 restaDeMontosNecesidadesGenerales"></h4>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Planificar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarNecesidadesGenerales' class="mb-0 "></h4>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>

		</div>

			<div class="row">
				

				<div class="row">
					<div class="col-md-10">
						
					</div>
					<div class="col-md-2">

						<button id="btnNuevoNecesidadesGenerales" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoNecesidadesGenerales"> Nuevo  <i class="fal fa-plus-circle"></i> </button>

					</div>
				</div>

			

			<table id="paidNecesidadesGenerales_" style="width:100%">

				<thead align="center">

					<tr>
						<th COLSPAN=1><center>Deporte</center></th>
						<th COLSPAN=1><center>Disciplina</center></th>
						<th COLSPAN=1><center>Tipo Necesidad</center></th>
						<th COLSPAN=1><center>Articulo</center></th>
						<th COLSPAN=1><center>Cantidad</center></th>
						<th COLSPAN=1><center> Valor / Unidad US</center></th>	
						<th COLSPAN=1><center>Valor Total</center></th>
						


					</TR>
				</thead>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoNecesidadesGenerales' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-lg">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id=''>Asignar<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarNuevoNecesidadesGenerales' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id='' class='modal-body row'>

								<div class="row">
									<div class="col-sm-6">
											
											<label>Deporte</label>
											<select id="deporteSelectordNecesidadesGenerales"  class="form-control" >
												
											</select>
										
									</div>

									<div class="col-sm-6">
											
											<label>Disciplina/Discapacidad</label>
											<select id="modalidaSelectordNecesidadesGenerales"  class="form-control" >
												
											</select>
										
									</div>
									
									
                                    
                                </div>

								
								<div class="row">
									<div class="col-sm-6">
											
											<label>Tipo Necesidad</label>
											<select id="sectorSelectorNecesidadesGenerales"  class="form-control" >
												<option value="0" selected>--Seleccione Una Opción--</option>
												<option value="Convencional" >General</option>
												<option value="Discapacidad">Discapacidad</option>
											</select>
										
									</div>
									
                                    
                                </div>

								<div class="row">
									<div class="col-sm-12">
											
											<label>Articulo</label>
											
											<textarea id='articuloNecesidadesGenerales' style='width: 100%;' ></textarea>
										
									</div>
                                </div>

								<div class="row">
									<div class="col-sm-6">
                                       
											<label>Cantidad</label>
											<input id="cantidadNecesidadesGenerales" type="text" required class="form-control solo__numero__montos sumador__montosNecesidadesGenerales" value="0"> 
                                   
                                    </div>
                                    <div class="col-sm-6">
                                       
											<label>Valor Individual</label>
                                            <input id="valorIndNecesidadesGenerales" type="text" required class="form-control solo__numero__montos sumador__montosNecesidadesGenerales" value="0"> 
                                   
                                    </div>
                                </div>

								<div class="row">
									
                                    <div class="col-sm-6">
											<label>Valor Total</label>
                                            <input id="valorTotalNecesidadesGenerales" readonly type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>

									
                                </div>

						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<a id='guardarNecesidadesGenerales' type='button' class='btn btn-primary  left__margen ' >Guardar</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>
			</form>

	</div>

</div>

<script>

	

$("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));
   
$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

mostrar_titulo_monto_rubros_principal("mostrar_titulo_nece_individuales_general", $("#ïdentificador").val());



});

$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

	sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_generales","#MontoAsignadoNecesidadesGenerales",".restaDeMontosNecesidadesGenerales","#MontoPorAsignarNecesidadesGenerales");

});


$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/datatables.js", function () {

datatabletsAR($("#paidNecesidadesGenerales_"), "paidNecesidadesGenerales_");

});

</script>