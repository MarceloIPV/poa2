
<div class="modal fade" id="rubro1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width:70%!important;">		
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EVENTOS DE PREPARACION Y COMPETICION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">
       <table id="paidRubrosEventos" >
				<thead>
					<tr align="center">
						<th COLSPAN=1><center>A.D</center></th>
						<th COLSPAN=1><center>Deporte</center></th>
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Nombre del evento</center></th>	
						<th COLSPAN=1><center>Prueba</center></th>
						<th COLSPAN=1><center>Categoria</center></th>
						<th COLSPAN=1><center>Fecha Inicio</center></th>
						<th COLSPAN=1><center>Fecha Fin</center></th>
						<th COLSPAN=1><center>Sede  Ciudad  Pais</center></th>
						<th COLSPAN=1><center>No. ATL.</center></th>
						<th COLSPAN=1><center>No. Ent. Ofic.</center></th>
						<th COLSPAN=1><center>No. DIAS</center></th>
						<th COLSPAN=1><center>No. PAX</center></th>
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>Observaciones</center></th>
					</TR>
				</thead>
                <tbody>
				<tr>
					<?php 
                    
$id =$_POST["id"];
                        require_once "../../config/config2.php";
                        $objeto= new usuarioAcciones();
                        $sql001="SELECT * from poa_paid_eventos where idOrganismo='$id'";
                   
                        $indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql001);
                        $jason['indicadorInformacion']=$indicadorInformacion;

					foreach ($indicadorInformacion as $row)
					{
						$prt0 = $row[""];
						$prt1 = $row['actividadDeportiva'];
						$prt2 = $row['deporte'];				
						$prt3 = $row['modalidad'];
						$prt4 = $row['nombreEvento'];
						$prt5 = $row['prueba'];
						$prt6 = $row['categoria'];
						$prt7 = $row['fechaInicio'];
						$prt8 = $row['fechaFin'];
						$prt9 = $row['sede'];
						$prt10 = $row['numeroOficina'];
						$prt11 = $row['numeroAtletas'];                        
						$prt12 = $row['numeroDias'];
						$prt13 = $row['numeroPax'];
						$prt14 = $row['valorTotal'];
						$prt15 = $row['Observaciones'];
                        
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
                            <label><?php echo $prt5; ?></label>						
							</center>
						</td>
						<td>
							<center>
							<label><?php echo $prt6; ?></label>						
							</center>
						</td>
							<td>
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
								<label><?php echo $prt15; ?></label>								
							</center>
						</td>
					

					

					</tr>
				<?php 	} ?>
			</tbody>




			</table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>