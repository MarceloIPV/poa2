<?php $componentes= new componentes();?>

<?php $componentesPaid= new componentesPaid();?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Asignación de presupuesto para el proyecto fortalecimiento del deporte de alto rendimiento del Ecuador");?>

		<div class="row">

			<input type="hidden" id="valorComparativo" name="valorComparativo" value="0">




			<table  class="col col-12 cell-border">

				<thead>

					<tr>
						<th><center>RUC</center></th>
						<th><center>ORGANISMO DEPORTIVO</center></th>
						<th><center>PRESUPUESTO</center></th>
						<th><center>FECHA DE NOTIFICACIÓN TECHO</center></th>
						<th><center>DOCUMENTO<br>DE ASIGNACIÓN</center></th>
						<th><center>EVENTOS DE PREPARACION Y COMPETICION</center></th>
						<th><center>EQUIPO INTERDISCIPLINARIO</center></th>
						<th><center>NECESIDADES INDIVIDUALES</center></th>
						<th><center>NECESIDADES GENERALES</center></th>
						<th><center>PAID GENERAL</center></th>						
					</tr>

					<tbody>
				<tr>
					<?php 
$objeto= new usuarioAcciones();


$sql001="SELECT a.ruc,
REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombreOrganismo,
ROUND(b.monto,2) AS techo,b.fecha,a.idOrganismo,b.texto__documentos AS documento 
FROM poa_organismo AS a INNER JOIN poa_paid_asignacion_dos AS b ON a.idOrganismo=b.idOrganismo WHERE b.valor__comparativo='0' AND b.estado='A'";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql001);

$jason['indicadorInformacion']=$indicadorInformacion;

					foreach ($indicadorInformacion as $row)
					{
						$prt0 = $row['idEventos'];
						$prt1 = $row['ruc'];
						$prt2 = $row['nombreOrganismo'];				
						$prt3 = $row['techo'];
						$prt4 = $row['fecha'];
						$prt5 = $row['documento'];
						$prt6 = $row['idOrganismo'];
						/*$prt7 = $row['fechaFin'];
						$prt8 = $row['sede'];
						$prt9 = $row['numeroOficina'];
						$prt10 = $row['numeroAtletas'];
						$prt11 = $row['numeroDias'];
						$prt12 = $row['numeroPax'];
						$prt13 = $row['valorTotal'];
						$prt14 = $row['Observaciones'];
*/
						?>

						<td>
							<center>
								<label><?php echo $prt1; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt2; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt3; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt4; ?></label>								
							</center>
						</td>
						<td>
							<center>
						       	<a href="documentos/paid/asignacion/<?php echo $prt5; ?>" target="_blank"><?php echo $prt5; ?></a>						
							</center>
						</td>
						<td>
							<center>
							<button type="button" class="btn btn-primary" onclick="verRubro1(<?php echo $prt6; ?>)" data-toggle="modal" data-target="#rubro1">VER </button>						
							</center>
						</td>
						<td>
							<center>
							<button type="button" class="btn btn-primary" onclick="verRubro2(<?php echo $prt6; ?>)" data-toggle="modal" data-target="#rubro2">VER </button>						
							</center>
						</td>
						<td>
							<center>
							<button type="button" class="btn btn-primary" onclick="verRubro3(<?php echo $prt6; ?>)" data-toggle="modal" data-target="#rubro3">VER </button>						
							</center>
						</td>
						<td>
							<center>
							<button type="button" class="btn btn-primary" onclick="verRubro4(<?php echo $prt6; ?>)" data-toggle="modal" data-target="#rubro4">VER </button>						
							</center>
						</td>
						<td>
							<center>
							<button type="button" class="btn btn-primary" onclick="verPAIDG(<?php echo $prt6; ?>)" data-toggle="modal" data-target="#rubroPAIDG">VER </button>						
							</center>
						</td>
						<!--	<td>
							<center>
								<label><?php echo $prt7; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt8; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt9; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt10; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt11; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt12; ?></label>								
							</center>
						</td>
						<td>
							<center>
								<label><?php echo $prt13; ?></label>								
							</center>
						</td>
						
						<td>
							<center>
								<label><?php echo $prt14; ?></label>								
							</center>
						</td>
					
						<td>
							<center>
								<button class='estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target=".bd-eventosEditaModal-modal-lg" onclick="rubroseditareventos01(<?php echo $prt0; ?>)"><i class='fas fa-user-edit'></i></button>	
								<button class='eliminarIndicadores estilo__botonDatatablets btn btn-danger pointer__botones'  onclick="rubroseliminareventos(<?php echo $prt0; ?>)"><i class='fas fa-trash'></i>
								</button>							
							</center>
						</td>

					-->

					</tr>
				<?php 	} ?>
			</tbody>








<!--

					<tr>
						<td>
							<LABEL>0291501850001</LABEL>
						</td>
						<td>
							<LABEL>FEDERACION DEPORTIVA PROVINCIAL DE BOLIVAR</LABEL>
						</td>
						<td>
							<LABEL>1000</LABEL>
						</td>
						<td>
							<LABEL>13/12/2022</LABEL>
						</td>
						<td>
							<LABEL>13/12/2022</LABEL>
						</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						VER
						</button>
						</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							VER
							</button>
						</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							VER
							</button>
						</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						VER
						</button>
						</td>

						<td>
							<button type="button" class="btn btn-default form-control" data-toggle="modal" data-target=".bd-example-modal-xl">PAID </button>

						</td>
						</tr>


				</thead>
					-->


			</table>

		</div>

	</section>

</div>
<div id="data2"></div>



<!--

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

			
					<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">

						<table id="paidRubrosGeneral" >

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

	<div class="modal-footer">
					</div>
				</div>

				<div id="data"></div>
				<div id="ms"></div>
			</div>
		</div>
	</div>
</div>

					-->