
<div class="modal fade" id="rubro2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width:70%!important;">		
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EQUIPO INTERDISCIPLINARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">
       <table id="paidRubrosEventos" >
				<thead>
				<tr align="center">
						<th COLSPAN=1><center>Cédula</center></th>
						<th COLSPAN=1><center>Modalidad</center></th>
						<th COLSPAN=1><center>Sexo</center></th>	
						<th COLSPAN=1><center>Cargo o función</center></th>
						<th COLSPAN=1><center>Nombres</center></th>
						<th COLSPAN=1><center>Apellidos</center></th>
						<th COLSPAN=1><center>Fecha Inicio </center></th>
						<th COLSPAN=1><center>Fecha Fin</center></th>
						<th COLSPAN=1><center>Valor mes acordado. ATL.</center></th>
						<th COLSPAN=1><center>No. Meses</center></th>
						<th COLSPAN=1><center>Valor Total</center></th>
						<th COLSPAN=1><center>Sector</center></th>
					</TR>
				</thead>
                <tbody>
				<tr>
					<?php 
                    
$id =$_POST["id"];
                        require_once "../../config/config2.php";
                        $objeto= new usuarioAcciones();
                        $sql001="SELECT * FROM poa_paid_interdisciplinario where idOrganismo='$id'";
                   
                        $indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql001);
                        $jason['indicadorInformacion']=$indicadorInformacion;

					foreach ($indicadorInformacion as $row)
					{
						$prt0 = $row[""];
						$prt1 = $row['cedula'];
						$prt2 = $row['modalidad'];	
						$prt3 = $row['sexo'];
						$prt4 = $row['cargo'];
						$prt5 = $row['nombres'];
						$prt6 = $row['apellidos'];
						$prt7 = $row['fechaInicio'];
						$prt8 = $row['fechaFin'];
						$prt9 = $row['valor'];
						$prt10 = $row['numeroMeses'];
						$prt11 = $row['valorTotal'];
						$prt12 = $row['sector'];
                        
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
								<label><?php echo $prt11; ?></label>								
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