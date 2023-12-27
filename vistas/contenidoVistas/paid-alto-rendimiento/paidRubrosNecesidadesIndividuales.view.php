
<?php $componentes= new componentes();
	$idOrganismoSession = $_SESSION["idOrganismoSession"];
	$objeto= new usuarioAcciones();?>


<input type="hidden" id="idRubroNeceIndividuales" name="idRubroNeceIndividuales">
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
                                <h4 id='MontoAsignadoNecesidadesIndividuales' class="mb-0 restaDeMontosNecesidadesInd"></h4>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h4 class="mb-0">Monto Por Asignar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarNecesidadesIndividuales' class="mb-0 "></h4>
                            </div>
                        </div>
                    </div>
                  
               
            	</div>
			</div>

		</div>

		<div class="row">


			


			<div class="col-md-12">
				<div class="row">
					<div class="col-md-10">
						
					</div>
					<div class="col-md-2">

						<button id="btnNuevoNecesidadesIndividuales" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoNecesidadesIndividuales"> Nuevo  <i class="fal fa-plus-circle"></i> </button>


					</div>
				</div>
			</div>


			
			<table id="paidNecesidadesIndividuales1"  style="width:100%">

				<thead align="center" >

					<tr >
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Nombres</center></th>
						<th COLSPAN=1><center>Apellidos</center></th>
						<th COLSPAN=1><center>Articulo</center></th>
						<th COLSPAN=1><center>Cantidad</center></th>
						<th COLSPAN=1><center> Valor / Unidad US</center></th>	
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>sector</center></th>
					
						
					</TR>
				</thead>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoNecesidadesIndividuales' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

	<div class="modal-dialog modal-lg">
		
			<form class='modal-content' id='$parametro2'>

						<div class='modal-header row'>

					        <div class='col' style='z-index: 1;'>
					          <h5 class='modal-title' id=''>Asignar<br><span class='asignado__titulos'></span></h5>
					        </div>

					        <div class='col col-1' style='z-index: 2;'>
							<button type='button' id='btnCerrarNuevoNecesidadesIndividuales' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
					        </div>

						</div>

						<div id='' class='modal-body row'>

								<div class="row">
									<div class="col-sm-6">
											
											<label>Modalidad</label>
											<select id="modalidaSelectordNecesidadesIndividuales"  class="form-control" >
												
											</select>
										
									</div>
									<div class="col-sm-6">
                                        
											<label>Articulo</label>
                                             <input id="articuloNecesidadesIndividuales" type="text" required class="form-control " > 
										
                                    </div>
                                    
                                </div>

								
                                <div class="row">
									<div class="col-sm-6">
											<label>Nombres</label>
                                             <input id="nombresNecesidadesIndividuales" type="text" required class="form-control"> 
                                    </div>
									<div class="col-sm-6">
											<label>Apellidos</label>
                                             <input id="apellidosNecesidadesIndividuales" type="text" required class="form-control"> 
                                    </div>
                                </div>

							


								<div class="row">
									<div class="col-sm-6">
                                       
											<label>Cantidad</label>
											<input id="cantidadNecesidadesIndividuales" type="text" required class="form-control solo__numero__montos sumador__montosNecesidadesIndividuales" value="0"> 
                                   
                                    </div>
                                    <div class="col-sm-6">
                                       
											<label>Valor Individual</label>
                                            <input id="valorIndNecesidadesIndividuales" type="text" required class="form-control solo__numero__montos sumador__montosNecesidadesIndividuales" value="0"> 
                                   
                                    </div>
                                </div>

								<div class="row">
									
                                    <div class="col-sm-6">
											<label>Valor Total</label>
                                            <input id="valorTotalNecesidadesIndividuales" readonly type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>

									<div class="col-sm-6">
											
											<label>Sector</label>
											<select id="sectorSelectorNecesidadesIndividuales"  class="form-control" >
												<option value="0" selected>--Seleccione Un Sector--</option>
												<option value="Convencional" >Convencional</option>
												<option value="Discapacidad">Discapacidad</option>
											</select>
										
									</div>
                                </div>

						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap'>

								<a id='guardarNecesidadesIndividuales' type='button' class='btn btn-primary  left__margen ' >Guardar</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>
			</form>

	</div>

</div>

<script>

$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

	mostrar_titulo_monto_rubros_principal("mostrar_titulo_nece_individuales_general", $("#ïdentificador").val());
   
});

      

$("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
$("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));




$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/selector.js", function () {

	sumaRestaMontosRubrosAR("obtener_suma_valorTotal_nece_Individuales","#MontoAsignadoNecesidadesIndividuales",".restaDeMontosNecesidadesInd","#MontoPorAsignarNecesidadesIndividuales");
	
});
   


$.getScript("layout/scripts/js/paid-alto-rendimiento-desarrollo/datatables.js", function () {

datatabletsAR($("#paidNecesidadesIndividuales1"), "paidNecesidadesIndividuales1");

});

</script>




