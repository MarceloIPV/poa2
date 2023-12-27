

<?php $componentes= new componentes();
$componentesPaid= new componentesPaid();

session_start();


$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];

$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);


$objeto= new usuarioAcciones();?>

<input type="hidden" style="width:10%" id="JuegosNacionalesIDRubro" name="JuegosNacionales">
<input type="hidden" id="identificador" name="identificador" value="1">


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<h1 id='tituloJN' align='center'></h1> 

		<h2 id="MontoJN"   align='center'></h2>

		<div class="row">

			<div class="container-fluid pt-2 px-2">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h2 class="mb-0">Monto Planificado:</h2>
                            <div class="ms-3">
                                <h1 id='MontoAsignadoJN' class="mb-0 restar__montos"></h1>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-sm-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
							<h2 class="mb-0">Monto Por Planificar:</h2>
                            <div class="ms-3">
                                <h1 id='MontoPorAsignarJN'  class="mb-0">$-</h1>
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
						<button id="btnNuevoDesarrolloJN" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoJN"> Nuevo  <i class="fal fa-plus-circle"></i> </button>


					</div>
				</div>
			</div>

			

			<table id="paidJuegosNacionales" >

				<thead>
					<tr align="center">
						<th COLSPAN=1><center>Nombre del evento</center></th>
						<th COLSPAN=1><center>Sede Satélite o subsede</center></th>
						<th COLSPAN=1><center>Nro. OD o instituciones participantes</center></th>
						<th COLSPAN=1><center>Fecha inicio</center></th>	
						<th COLSPAN=1><center>Fecha fin</center></th>
						<th COLSPAN=1><center>Nro. Deportes</center></th>
						<th COLSPAN=1><center>Categoría</center></th>
						<th COLSPAN=1 style='width:5%!important;'><center>Nro. Deportistas Mujeres</center></th>
						<th COLSPAN=1 style='width:5%!important;'><center>Nro. Deportistas Hombres</center></th>
						<th COLSPAN=1 style="width:10px!important;"><center>Nro. De Entrenadores.</center></th>
						<th COLSPAN=1><center>Total Participantes</center></th>
						<th COLSPAN=1><center>Observaciones</center></th>
					
					</tr>
				</thead>
				<tbody></tbody>
				
			</table>

		</div>

	</section>

</div>



<!-- Small modal -->
<div  class='modal fade modal__ItemsGrup' id='modalNuevoJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

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
									<div class="col-sm-12">
										<label>Nombre del evento</label>
										<input id="nomEvento" type="text" name="username"  required class="form-control "> 
									</div>
								</div>

                                <div class="row">
									<div class="col-sm-6">
											<label>Sede Satélite o subsede</label>
                                             <input id="sede" type="text" required class="form-control"> 
                                    </div>
                                    <div class="col-sm-6">
											<label>Nro. OD o instituciones participantes</label>
                                            <input id="istParticipante" type="text" required class="form-control solo__numero__montos" value="0"> 
                                    </div>
                                </div>

								<div class="row">
									<div class="col-sm-6">
                                       
											<label>Fecha Inicio</label>
											<input type="date" id="fechaInicioJN" class="form-control" > 
										
                                    </div>
                                    <div class="col-sm-6">
                                       
											<label>Fecha Finalización</label>
                                            <input type="date" id="fechaFinJN" class="form-control" >
										
                                    </div>
                                </div>

								<div class="row">
									<div class="col-sm-6">
                                        
											<label>Nro. Deportes</label>
                                             <input id="nDeporte" type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>
                                    <div class="col-sm-6">
                                       
											<label>Categoría</label>
                                            <select id="categoriaDesarrolloJN"  class="form-control" >
												
											</select>
										
                                    </div>
                                </div>

								<div class="row">
									<div class="col-sm-4">
                                       
											<label>No. Deportistas Mujeres</label>
                                             <input id="nDMujeres" type="text" required class="form-control solo__numero__montos " value="0"> 
										
                                    </div>
                                    <div class="col-sm-4">
                                        
											<label>No. Deportistas Hombres</label>
                                            <input id="nDVarones" type="text" required class="form-control solo__numero__montos " value="0"> 
										
                                    </div>
									<div class="col-sm-4">
                                        
											<label>No. De Entrenadores</label>
                                             <input id="nEntrenadores" type="text" required class="form-control solo__numero__montos " value="0"> 
										
                                    </div>
                                </div>

								<div class="row">
									
                                    <div class="col-sm-6">
											<label>Valor Total</label>
                                            <input id="valorTotal" type="text" required class="form-control solo__numero__montos" value="0"> 
										
                                    </div>
                                </div>

								<div class="row"> 
									<div class="col-sm-12">
										<label>Observaciones</label>
										<textarea id="observaciones" style="width: 100%;" id="bio" name="user_bio"></textarea>	
									</div>
								</div>



						</div>
						

						<div class='modal-footer d d-flex justify-content-center row'>

							<div class='col col-12 d d-flex justify-content-center flex-wrap' >

								<a id='guardarEventosNacionales' type='button' class='btn btn-primary  '  data-bs-dismiss='modal'>Guardar</a>

								&nbsp;&nbsp;&nbsp;&nbsp;

							</div>

							<div class='col col-1 reload__Enviosrealizados text-center'></div>

						</div>
			</form>

	</div>

</div>

<script>
	 var anoIngreso = <?php echo $json_variable; ?>;


			
		

</script>


