	<?php 	
	$mes= $_POST["mes"];
	$idHonorarios= $_POST["idHonorarios"];  
	extract($_POST);
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$sql="SELECT $mes as mes FROM poa_honorarios2022 WHERE idHonorarios=$idHonorarios  ;";

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);

	$jason['indicadorInformacion']=$indicadorInformacion;
	
	foreach ($indicadorInformacion as $row){
		$sueldo= $row["mes"];
	}
	
	?>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class='modal-header row'>

					<div class='col col-11 text-center'>
						<h5 class='modal-title titulo__modalItems'>Sección disminuye valores orígen - <?php echo $mes; ?></h5>
					</div>
					<div class='col-md-1'>
						<button type='button' class='btn-close cerrar__modalRegistros cerrar__seguimientos' data-dismiss="modal"  aria-label='Close'>
							<i class='far fa-times-circle'></i>
						</button>
					</div>

				</div>

				<div class='col-md-12'>	<br/>
					<div class='row'>

						<div class='col-7'>
							<div class='row'>

								<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
									
								</div>

								<div class='col col-3 enlaces__definidos__letras' style='text-align:right'>

									Valor 

								</div>
								<div class='col col-3 enlaces__definidos__letras' style='text-align:right'>
									Disminuye
									
								</div></p>

							</div>
							</div>
							<div class='col-7'>
								<div class='row'>

									<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
										Sueldo 
									</div>

									<div class='col col-3'>

										<input class='ancho__total__input obligatorios__2 form-control' value='<?php echo $sueldo; ?>' id="sueldo_anterior" readonly/>

									</div>
									<div class='col col-3'>

										<input  class='ancho__total__input obligatorios__2 form-control' value='0' id="sueldo_nuevo" />
									</div></p>

								</div>
							</div>



							<div class='col col-12'>
								<div class='row'>
									<div class='col col-3 enlaces__definidos__letras' style='text-align:right'>
										Justificación 
									</div>
									<div class='col col-7 '>
										<input id='justificacion' class='ancho__total__input obligatorios__2'  placeholder='S/N'/>
									</div></p>

									<center>
										<center  data-bs-dismiss='modal' >
											<button  class="btn btn-success" onclick="modificaciones_valores_disminuye_honorarios('<?php  echo $mes;?>','<?php  echo $idHonorarios;?>')">Guardar</button>
										</center>
									</center>
								</p>
							</div>

						</div>
					</div>


				</div>
				<div></div>
			</div>
		</div>
