	<?php 	
	$mes= $_POST["mes"];
	$idSueldos= $_POST["idSueldos"];  
	extract($_POST);
	require_once "../../config/config2.php";

	$objeto= new usuarioAcciones();

	$indicadorInformacion=$objeto->getObtenerInformacionGeneral("SELECT a.cedula,a.cargo,a.tipoCargo,a.tiempoTrabajo,a.sueldoSalario,a.aportePatronal,a.decimoTercera,a.mensualizaTercera,a.decimoCuarta,a.menusalizaCuarta,a.fondosReserva,a.enero,a.febrero,a.marzo,a.abril,a.mayo,a.junio,a.julio,a.agosto,a.septiembre,a.octubre,a.noviembre,a.diciembre,a.total FROM poa_sueldossalarios2022 AS a WHERE a.idSueldos=$idSueldos;");

	$jason['indicadorInformacion']=$indicadorInformacion;
	
	foreach ($indicadorInformacion as $row)
	{
		$sueldo= $row["sueldoSalario"];
		$aportePatronal= $row["aportePatronal"];

		$decimoTerceraTotal= $row["decimoTercera"];
		$mensualizaTercera= $row["mensualizaTercera"];

		if ($mensualizaTercera == 'si') {
			$decimoTercera= number_format(($decimoTerceraTotal/12), 2);
		}else if ($mensualizaTercera == 'no'){
			$decimoTercera= 0;
			$status='readonly';
			
		}

		$decimoCuartaTotal= $row["decimoCuarta"];
		$menusalizaCuarta= $row["menusalizaCuarta"];
		if ($menusalizaCuarta == 'si') {
			$decimoCuarta=  number_format(($decimoCuartaTotal/12), 2);
		}else if ($menusalizaCuarta == 'no'){
			$decimoCuarta= 0;
			$status='readonly';
		}

		

		$fondosReserva= $row["fondosReserva"];
		

		$total=$aportePatronal+$decimoTercera+$sueldo+$decimoCuarta+$fondosReserva;


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

									<div class='col col-6 enlaces__definidos__letras'>														
									</div>

									<div class='col col-6'>
										<h5  style='text-align:center' class='enlaces__definidos__letras'>Origen</h5>	
									</div>

									<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
										Sueldo 
									</div>

									<div class='col col-6'>

										<input class='ancho__total__input obligatorios__2 form-control' value='<?php echo $sueldo; ?>' id="sueldo" readonly/>
									</div></p>

									<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
										Aporte patronal 
									</div>	

									<div class='col col-6'>
										<input id='aporte__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control' onclick='valor3()' value='<?php echo $aportePatronal; ?>' readonly/>
									</div></p>



									<?php

									if ($mensualizaTercera == 'si') {
										?>


										<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
											Décimo tercero 
										</div>

										<div class='col col-6'>
											<input id='decimo__tercero__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control' value='<?php echo $decimoTercera; ?>' readonly/>
										</div></p>
										<?php
									}else{
										?>
										<input type="hidden" id='decimo__tercero__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control' value='<?php echo $decimoTercera; ?>' />

										<?php
									}
									?>


									<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
										Fondos de reserva 
									</div>

									<div class='col col-6'>
										<input id='fondos__de__reserva__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control'  value='<?php echo $fondosReserva; ?>' readonly/>
									</div></p>


									<?php 

									if ($menusalizaCuarta == 'si') {
										?>

										<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
											Décimo cuarto 
										</div>

										<div class='col col-6'>
											<input id='decimo__cuarto__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control'  value='<?php echo $decimoCuarta; ?>' readonly/>
										</div></p>

										<?php
									}else{
										?>
										<input type="hidden" id='decimo__cuarto__total__origen__disminucion' class='ancho__total__input obligatorios__2 form-control' value='<?php echo $decimoCuarta; ?>' />

										<?php
									}
									?>



									<div class='col col-6 enlaces__definidos__letras' style='text-align:right'>
										Total 
									</div>

									<div class='col col-6'>
										<input id='total__origen' class='ancho__total__input obligatorios__2 form-control'   value='<?php echo $total; ?>' readonly/>
									</div></p>


								</div>
							</div>
							<?php 

						}         
						?>
						<div class='col-3'>	
							<div class='row'>							
								<h5  style='text-align:center' class='enlaces__definidos__letras'>Disminuye</h5>
								<div class='col col-12'>
									<input id='sueldo__salario__disminucion' onclick="obtener_valor_disminuir(),enviar_item('510106')"  oninput="myFunction(),valor1()" class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f ' value='0' onfocus="" onkeypress="myFunction()" pattern="[0-9]+"/>
								</div></p>

								<div class='col col-12'>
									<input id='aporte__origen__disminucion' onclick="obtener_valor_disminuir(),enviar_item('510601')" oninput="myFunction(),valor2()" class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f ' value='0'/>
								</div></p>


								<?php

								if ($mensualizaTercera == 'si') {
									?>


									<div class='col col-12'>
										<input id='decimo__tercero__disminucion'  onclick="obtener_valor_disminuir(),enviar_item('510203')" oninput="myFunction(),valor3()" value='0'/>
									</div></p>

									<?php
								}else{
									?>
									<input type="hidden" id='decimo__tercero__disminucion'  onclick="obtener_valor_disminuir(),enviar_item('510510203106')"  oninput="myFunction(),valor3()" value='0'/>
									<?php
								}
								?>




								<div class='col col-12'>
									<input id='fondos__de__reserva__disminucion' onclick="obtener_valor_disminuir(),enviar_item('510602')" oninput="myFunction(),valor4()" class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f ' value='0'/>
								</div></p>



								<?php 

								if ($menusalizaCuarta == 'si') {
									?>

									<div class='col col-12'>
										<input id='decimo__cuarto__disminucion'onclick="obtener_valor_disminuir(),enviar_item('510204')" oninput="myFunction(),valor5()" class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f  ' value='0'/>
									</div></p>

									
									<?php
								}else{
									?>
									<input type="hidden" oninput="myFunction(),valor5()" id='decimo__cuarto__disminucion'onclick="obtener_valor_disminuir(),enviar_item('510204')"  class='ancho__total__input obligatorios__2 solo__numero__montos cambio__de__numero__f  ' value='0'/>
									<?php
								}
								?>



								<div class='col col-12'>
									
									<p id="demo"></p> 
								</div>
							</div>

						</div>
						<div class='col col-12'>
							<div class='row'>
								<div class='col col-3 enlaces__definidos__letras' style='text-align:right'>
									Justificación 
								</div>
								<div class='col col-7 '>
									<input id='origen_justificacion' class='ancho__total__input obligatorios__2'  placeholder='S/N'/>
								</div></p>

								<center>
									<center  data-bs-dismiss='modal' >
										<button class="btn btn-success" onclick="modificaciones_valores_disminuye_nuevo('<?php  echo $mes;?>','<?php  echo $idSueldos;?>')" data-dismiss="modal">Continuar</button>
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
