
<div class="modal fade" id="rubroPAIDG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width:70%!important;">		
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PAID GENERAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="col-md-12" class="col col-12 cell-border"  style="overflow: scroll;">
       <table id="paidRubrosEventos" >
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
				</TR>
				</thead>
                <tbody>
				<tr>
					<?php 
                    
$id =$_POST["id"];
                        require_once "../../config/config2.php";
                       
		$objeto2= new usuarioAcciones();
		$indicadorInformacion2=$objeto2->getObtenerInformacionGeneral("SELECT nombrePrograma,nombreComponentes,nombreRubros,e.itemPreesupuestario,e.nombreItem,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,valorTotal,idPaid
		FROM poa_paid_general as a,poa_paid_programa as b ,poa_paid_componentes as c, poa_paid_rubros as d, poa_item as e
		where a.idPrograma=b.idPrograma 
		and a.idComponente=c.idComponentes 
		and a.idRubros=d.idRubros 
		and a.idItem=e.idItem 
		and idOrganismo=$id");
		$jason['indicadorInformacion']=$indicadorInformacion2;
	
		


		foreach ($indicadorInformacion2 as $row)
		{
			$prt = $row['idPaid'];
			$prt0 = $row['nombrePrograma'];
			$prt1 = $row['nombreComponentes'];
			$prt2 = $row['nombreRubros'];				
			$prt3 = $row['itemPreesupuestario'];		
			$prt17 = $row['nombreItem'];
			$prt4 = $row['enero'];
			$prt5 = $row['febrero'];
			$prt6 = $row['marzo'];
			$prt7 = $row['abril'];
			$prt8 = $row['mayo'];
			$prt9 = $row['junio'];
			$prt10 = $row['julio'];
			$prt11 = $row['agosto'];
			$prt12 = $row['septiembre'];
			$prt13 = $row['octubre'];
			$prt14 = $row['noviembre'];
			$prt15 = $row['diciembre'];
			$prt16 = $row['valorTotal'];


			?>
			<td>
				<center>
					<label><?php echo $prt0; ?></label>								
				</center>
			</td>
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
					<label><?php echo $prt17; ?></label>								
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
			<td>
				<center>
					<label><?php echo $prt16; ?></label>	
												
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