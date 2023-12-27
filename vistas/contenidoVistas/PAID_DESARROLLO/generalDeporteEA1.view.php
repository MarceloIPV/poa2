
<?php $componentes= new componentes();

session_start();

$tipoProyecto=1;

$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
?>

<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>


<?php $idOrganismoSession=$informacionObjeto[0][idOrganismo];?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO");?>

		<div class="row">
			<table id="" class="col col-12 cell-border">
				<thead>
					<tr>
						<TH COLSPAN=4></TH>
						<TH COLSPAN=2>Rubros</TH>
					</tr>
					
					<tr align="center">
						<th COLSPAN=1><center>Fecha de envió notificación</center></th>
						<th COLSPAN=1><center>Techo Presupuestario</center></th>
						<th COLSPAN=1><center>PAID General / Indicadores</center></th>	
						<th COLSPAN=1><center>Juegos Nacionales</center></th>
						<th COLSPAN=1><center>Estado</center></th>
						<th COLSPAN=1><center>Acciones</center></th>
					</TR>
				</thead>
				<tbody>
					<tr align="center">						
						<?php 
							$objeto1= new usuarioAcciones();
							$sql="SELECT * FROM poa_paid_asignacion_dos where idOrganismo='$idOrganismoSession' and estado='A' and perioIngreso='$aniosPeriodos__ingesos';";
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral($sql);
							$jason['indicadorInformacion']=$indicadorInformacion1;
							
							foreach ($indicadorInformacion1 as $row1)
							{
								$valora= $row1["monto"];
								$envio= $row1["fecha"];
								$valor=number_format($valora);
								
							echo  "<td> ".$envio."</td>";

							echo  "<td> $".$valor."</td>";
							
							}
							
							?>		

						<td>
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_paid_envioinicial where idOrganismo='$idOrganismoSession' and perioIngreso='$aniosPeriodos__ingesos' and estado='A' and estadoEditar=1 ;");
							$jason['indicadorInformacion']=$indicadorInformacion1;

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["num"];
								if($valor == 0){
									echo '<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-example-modal-xl">PAID </button>
									<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-exampleI-modal-xl">INDICADORES </button>';											
								}else{
									echo '<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-exampleVer-modal-xl">PAID </button>
									<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-exampleIver-modal-xl">INDICADORES </button>';
								}
							}	
							?>
						</td>


						<td> 
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT sum(valorTotal) as valor FROM poa_paid_encuentroactivo where idOrganismo='$idOrganismoSession';");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							echo("<label><center> $");

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["valor"];
								echo $valor;
							}
							echo("</center></label>");
							?>

						</td>


						<td> 
							<button type="button" class="btn btn-default form-control" data-toggle="modal" onclick="rubrosEAobservador()" data-target=".bd-exampleOb-modal-xl">Observado </button>
						</td>
					
						<td>
							<?php 
							$objeto1= new usuarioAcciones();
							$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT count(*) as num FROM poa_paid_envioinicial where idOrganismo='$idOrganismoSession' and year(fecha)= year(now()) and estado='A' and estadoEditar=1 ;");
							$jason['indicadorInformacion']=$indicadorInformacion1;
							

							foreach ($indicadorInformacion1 as $row1)
							{
								$valor= $row1["num"];
								if($valor == 0){
									echo '	<button type="button" onclick="rubrosEAEnvio()" class="btn btn-success" >Enviar</button>';											
								}else{
									echo "<label>PAID ENVIADO</label>";
								}
								
							}

							


							?>
							
						</td>
				</td>
				</tr>
			</tbody>

		</table>

	</div>

</section>

</div>





<!-- Small modal -->
<div class="modal fade bd-example-modal-xl " role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="min-width:70%!important;">		
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">					
					<div class="row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Programa</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_programa where identificador=$tipoProyecto;");
									$jason['indicadorInformacion']=$indicadorInformacion1;

									echo '<select class="form-select" id="programapg" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombrePrograma"];
										$id= $row1["idPrograma"];
										echo "<option value='".$id."'>".$nombre."</option>";
									}
									echo "	</select>";
									?>
								</div>
							</div>
						</div>
							<!--
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Proyecto</center></label>
										<select name="select" id="" class="form-control">
											<option value="0">Fortalecimiento del deporte de alto rendimiento del ecuador</option>
										</select>
									</div>
								</div>
							</div>

						-->
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Componentes</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_componentes where identificador=$tipoProyecto;");
									$jason['indicadorInformacion']=$indicadorInformacion1;

									echo '<select class="form-select" id="componentespg" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombreComponentes"];
										$id= $row1["idComponentes"];
										echo "<option value='".$id."'>".$nombre."</option>";
									}
									echo "	</select>";
									?>
								</div>
							</div>
						</div>

							<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Rubros</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT nombreRubros,a.idRubros, montos from poa_paid_asignacion as a,poa_paid_rubros as b where a.idOrganismo='$idOrganismoSession' and a.perioIngreso='$aniosPeriodos__ingesos';");
									$jason['indicadorInformacion']=$indicadorInformacion1;



									echo '<select class="form-select" id="rubrospg" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombreRubros"];
										$id= $row1["idRubros"];										
										$montos= $row1["montos"];

										$sql2="SELECT ($montos - sum(valorTotal)) as vt FROM poa_paid_general where  idRubros=$id and idOrganismo='$idOrganismoSession';";
										$objeto2= new usuarioAcciones();
										$indicadorInformacion2=$objeto2->getObtenerInformacionGeneral($sql2);
										echo $sql2;
										$jason['indicadorInformacion']=$indicadorInformacion2;
										foreach ($indicadorInformacion2 as $row2)
										{
											$vt= $row2["vt"];

											if (strlen($vt) == 0) {
											 $vt=$montos;
											}


										}

										if ($vt == 0) {
											
										}else{
												echo "<option value='".$id."' onclick='rubrosItemsCragar(".$id.",".$montos."),valorFalta(".$id.",".$montos.")'>".$nombre." -  $".$vt."</option>";

										}

										
									}




									echo "	</select>";
									?>
								</div>
							</div>
						</div>



						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">

									<label ><center>Código Ítem Presupuestario</center></label>
									<div id="rubrosItems"></div>
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="row">
								<div class="col-md-12">

									<label ><center>Valor asignado</center></label>
									<input  class="form-control" type="text" id="valorAsignado" readonly="" value="<?=$valora?>">
								</div>
							</div>
						</div>

						<div class="col-md-2">
							<div class="row">
								<div class="col-md-12">

									<label ><center>Valor Sobrante</center></label>
									<input  class="form-control" type="text" id="valorFalta" readonly="" value="0">
								</div>
							</div>
						</div>
						<p>



						</div>
					</div>
					<div class="col-md-12 ">
						<div class="row">
							<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>ENE</center></th>
										<th COLSPAN=1><center>FEB</center></th>
										<th COLSPAN=1><center>MAR</center></th>	
										<th COLSPAN=1><center>ABR</center></th>
										<th COLSPAN=1><center>MAY</center></th>
										<th COLSPAN=1><center>JUN</center></th>	
										<th COLSPAN=1><center>JUL</center></th>								
									</TR>
								</thead>
								<tbody>
									<tr>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="eneropg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="febreropg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="marzopg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="abrilpg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="mayopg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="juniopg" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgTotal()" type="number" id="juliopg" value="0"></td>

									</tr>

								</tbody>

							</table>


							<table id="" class="col col-12 cell-border " > 

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>AGO</center></th>
										<th COLSPAN=1><center>SEP</center></th>
										<th COLSPAN=1><center>OCT</center></th>
										<th COLSPAN=1><center>NOV</center></th>	
										<th COLSPAN=1><center>DIC</center></th>
										<th COLSPAN=1><center>Total Programado</center></th>										
										<th COLSPAN=1><center>Acción</center></th>
									</TR>
								</thead>
								<tbody>
									<tr>

										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="agostopg" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="septiembrepg" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="octubrepg" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="noviembrepg" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgTotal()" type="number" id="diciembrepg" value="0"></td>
										<td><input class="form-control solo__numero__montos" type="number" id="totalProgramado" readonly value="0"> </td>

									</td>
									<td><button class="form-control btn btn-success" onclick="guardarNuevoPaidGeneralEA()">Guardar</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>

				<div class="modal-footer">
					<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">

						<table id="paidRubrosGeneralEA" >

							<thead>
								<tr align="center">
									<th COLSPAN=1><center>Programa</center></th>
									<th COLSPAN=1><center>Componentes</center></th>
									<th COLSPAN=1><center>Rubros</center></th>
									<th COLSPAN=1><center>Item Preesupuestario</center></th>	
									<th COLSPAN=1><center>Item</center></th>
									<th COLSPAN=1><center>ENE</center></th>
									<th COLSPAN=1><center>FEB</center></th>
									<th COLSPAN=1><center>MAR</center></th>	
									<th COLSPAN=1><center>ABR</center></th>
									<th COLSPAN=1><center>MAY</center></th>
									<th COLSPAN=1><center>JUN</center></th>	
									<th COLSPAN=1><center>JUL</center></th>
									<th COLSPAN=1><center>AGO</center></th>
									<th COLSPAN=1><center>SEP</center></th>
									<th COLSPAN=1><center>OCT</center></th>
									<th COLSPAN=1><center>NOV</center></th>	
									<th COLSPAN=1><center>DIC</center></th>
									<th COLSPAN=1><center>Total Programado</center></th>	
									<th COLSPAN=1><center>Editar</center></th>		
									<th COLSPAN=1><center>Eliminar</center></th>	
								</TR>
							</thead>
						</table>


					</div>
				</div>

				<div id="data"></div>
				<div id="ms"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-exampleI-modal-xl " role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="min-width:70%!important;">		
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">PAID INDICADORES</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">					
					<div class="row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Programa</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_programa where identificador=$tipoProyecto;");
									$jason['indicadorInformacion']=$indicadorInformacion1;

									echo '<select class="form-select" id="programapgi" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombrePrograma"];
										$id= $row1["idPrograma"];
										echo "<option value='".$id."'>".$nombre."</option>";
									}
									echo "	</select>";
									?>
								</div>
							</div>
						</div>
							
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Componentes</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_paid_componentes where identificador=$tipoProyecto;");
									$jason['indicadorInformacion']=$indicadorInformacion1;

									echo '<select class="form-select" id="componentespgi" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombreComponentes"];
										$id= $row1["idComponentes"];
										echo "<option value='".$id."'>".$nombre."</option>";
									}
									echo "	</select>";
									?>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<label ><center>Indicador</center></label>
									<?php 
									$objeto1= new usuarioAcciones();
									$indicadorInformacion1=$objeto1->getObtenerInformacionGeneral("select * from poa_paid_indicadores where identificador=$tipoProyecto;");
									$jason['indicadorInformacion']=$indicadorInformacion1;

									echo '<select class="form-select" id="indicadorpgi" aria-label="Default select example">';
									echo "	<option selected>Seleccione</option>";									
									foreach ($indicadorInformacion1 as $row1)
									{
										$nombre= $row1["nombreIndicadores"];
										$id= $row1["idIndicadores"];
										echo "<option value='".$id."' >".$nombre."</option>";
									}
									echo "	</select>";
									?>
								</div>
							</div>
						</div>

						<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<label ><center>Beneficio</center></label>
										<select name="select" id="beneficiopg1" class="form-control">
											<option value="">Selecciones</option>
											<option value="Femenino">Femenino</option>
											<option value="Masculino">Masculino</option>
										</select>
									</div>
								</div>
							</div>

						<p>


						</div>
					</div>
					<div class="col-md-12 ">
						<div class="row">
							<table id="" class="col col-12 cell-border " >

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>ENE</center></th>
										<th COLSPAN=1><center>FEB</center></th>
										<th COLSPAN=1><center>MAR</center></th>	
										<th COLSPAN=1><center>ABR</center></th>
										<th COLSPAN=1><center>MAY</center></th>
										<th COLSPAN=1><center>JUN</center></th>	
										<th COLSPAN=1><center>JUL</center></th>								
									</TR>
								</thead>
								<tbody>
									<tr>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="eneropgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="febreropgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="marzopgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="abrilpgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="mayopgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="juniopgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" oninput="rubrospgiTotal()" type="number" id="juliopgi" value="0"></td>

									</tr>

								</tbody>

							</table>


							<table id="" class="col col-12 cell-border " > 

								<thead>
									<tr align="center">
										<th COLSPAN=1><center>AGO</center></th>
										<th COLSPAN=1><center>SEP</center></th>
										<th COLSPAN=1><center>OCT</center></th>
										<th COLSPAN=1><center>NOV</center></th>	
										<th COLSPAN=1><center>DIC</center></th>
										<th COLSPAN=1><center>Total Programado</center></th>										
										<th COLSPAN=1><center>Acción</center></th>
									</TR>
								</thead>
								<tbody>
									<tr>

										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="agostopgi" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="septiembrepgi" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="octubrepgi" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="noviembrepgi" value="0"></td>
										<td><input class="form-control solo__numero__montos"  oninput="rubrospgiTotal()" type="number" id="diciembrepgi" value="0"></td>
										<td><input class="form-control solo__numero__montos" type="number" id="totalProgramadoi" readonly value="0"> </td>

									</td>
									<td><button class="form-control btn btn-success" onclick="guardarNuevoPaidIndicadoresEA()">Guardar</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>

				<div class="modal-footer">
					<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">

						<table id="paidRubrosIndicadoresEA" >

							<thead>
								<tr align="center">
									<th COLSPAN=1><center>Programa</center></th>
									<th COLSPAN=1><center>Componentes</center></th>
									<th COLSPAN=1><center>Indicador</center></th>
									<th COLSPAN=1><center>ENE</center></th>
									<th COLSPAN=1><center>FEB</center></th>
									<th COLSPAN=1><center>MAR</center></th>	
									<th COLSPAN=1><center>ABR</center></th>
									<th COLSPAN=1><center>MAY</center></th>
									<th COLSPAN=1><center>JUN</center></th>	
									<th COLSPAN=1><center>JUL</center></th>
									<th COLSPAN=1><center>AGO</center></th>
									<th COLSPAN=1><center>SEP</center></th>
									<th COLSPAN=1><center>OCT</center></th>
									<th COLSPAN=1><center>NOV</center></th>	
									<th COLSPAN=1><center>DIC</center></th>
									<th COLSPAN=1><center>Total Programado</center></th>
									<th COLSPAN=1><center>Beneficiario</center></th>	
									<th COLSPAN=1><center>Editar</center></th>		
									<th COLSPAN=1><center>Eliminar</center></th>	
								</TR>
							</thead>
						</table>


					</div>
				</div>

				<div id="data1"></div>
				<div id="ms1"></div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bd-exampleOb-modal-xl " role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="min-width:70%!important;">		
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">					
					<div class="row">
						<table >

						   			<thead>

						   				<tr>

						   					<th style='width:19px!important;'>
						   						<center>
						   							N-
						   						</center>
						   					</th>

						   					<th>
						   						<center>
						   							Condición
						   						</center>
						   					</th>


						   					<th>
						   						<center>
						   							Cumple (Si/No/N-A)
						   						</center>
						   					</th>


						   					<th>
						   						<center>
						   							Obsservaciones para la organización deportiva
						   						</center>
						   					</th>

						   				</tr>

						   			</thead>

						   			<tbody>

						   				<tr>

						   					<td>
						   						<center>
						   							1
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						Registra en las actividades deportivas correspondientes a la actividad concentrado, campamento, base de entrenamiento, evaluaciones y campeonato acorde a la prioridad de la disciplina deportiva.
						   					</td>

				   							<td class='observacion__1'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__1'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							2
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						Registra sus actividades en base a los requerimientos para la ejecución de los eventos deportivos.
						   					</td>

				   							<td class='observacion__2'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__2'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							3
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						Establece sus actividades en base a lo necesario para generar procesos formativos. 
						   					</td>

				   							<td class='observacion__3'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__3'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							4
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						Utiliza recursos para cubrir gastos en evento de preparación y competencias autorizados en el 'ENCUENTRO ACTIVO DEL DEPORTE PARA EL DESARROLLO ' como: pasajes, alimentación, hospedaje, hidratación, seguro, medicinas, atención médica, movilización interna y al exterior de la delegación, Bono deportivo, hidratación, visa,  y otros que permita la normativa vigente.
						   					</td>

				   							<td class='observacion__4'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__4'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							5
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						La planificación operativa anual del organismo deportivo se encuentra enmarcada en lo establecido en la normativa vigente.
						   					</td>

				   							<td class='observacion__5'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__5'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							6
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						Utiliza recursos para cubrir gastos en necesidades generales e individuales, y registra el detalle de cantidades, artículos requeridos de cada implemento y equipo deportivo. 
						   					</td>

				   							<td class='observacion__6'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__6'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>

						   				<tr>

						   					<td>
						   						<center>
						   							7
						   						</center>
						   					</td>

						   					<td style='text-align:justify!important;'>
						   						La Planificación Anual de Inversión Deportiva de la Organización Deportiva se encuentra enmarcada en lo establecido en la normativa legal vigente.
						   					</td>

				   							<td class='observacion__7'>
						   						<center>
													
						   						</center>
						   					</td>


						   					<td class='comentario__7'>
						   						<center>
						   							
						   						</center>
						   					</td>


						   				</tr>


						   			</tbody>
						   		</table>
					
					</div>

				</div>

			

				<div id="data"></div>
				<div id="ms"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-exampleVer-modal-xl " role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="min-width:70%!important;">		
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				

				<div class="modal-footer">
					<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">

						<table id="paidRubrosGeneralEAver" >

							<thead>
								<tr align="center">
									<th COLSPAN=1><center>Programa</center></th>
									<th COLSPAN=1><center>Componentes</center></th>
									<th COLSPAN=1><center>Rubros</center></th>
									<th COLSPAN=1><center>Item Preesupuestario</center></th>	
									<th COLSPAN=1><center>Item</center></th>
									<th COLSPAN=1><center>ENE</center></th>
									<th COLSPAN=1><center>FEB</center></th>
									<th COLSPAN=1><center>MAR</center></th>	
									<th COLSPAN=1><center>ABR</center></th>
									<th COLSPAN=1><center>MAY</center></th>
									<th COLSPAN=1><center>JUN</center></th>	
									<th COLSPAN=1><center>JUL</center></th>
									<th COLSPAN=1><center>AGO</center></th>
									<th COLSPAN=1><center>SEP</center></th>
									<th COLSPAN=1><center>OCT</center></th>
									<th COLSPAN=1><center>NOV</center></th>	
									<th COLSPAN=1><center>DIC</center></th>
									<th COLSPAN=1><center>Total Programado</center></th>	
									<th COLSPAN=1><center>Editar</center></th>		
									<th COLSPAN=1><center>Eliminar</center></th>	
								</TR>
							</thead>
						</table>


					</div>
				</div>

				<div id="data"></div>
				<div id="ms"></div>
			</div>
		</div>
	</div>
</div>