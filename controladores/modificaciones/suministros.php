
<?php 

$idUsuario= $_POST["idUsuario"];

$tipo= $_POST["tipo"];
$tipoServicio= $_POST["tipoServicio"];


require_once "../../config/config2.php";

$objeto= new usuarioAcciones();

$sql="SELECT * FROM poa_organismo where idUsuario=$idUsuario  ;";
$indicadorInformacion=$objeto->getObtenerInformacionGeneral($sql);
$jason['indicadorInformacion']=$indicadorInformacion;
foreach ($indicadorInformacion as $row){
	$idOrganismo= $row["idOrganismo"];
	$_SESSION["idOrganismo"]=$idOrganismo;
}

?>


<div class="col-md-12" >
	<h5 style="text-align: center"><?php echo $tipo;  ?></h5>
		<?php 

			if ($tipoServicio == 1) {
	# code...

				
						echo "<button type='button' onclick='nuevo_suministro($idUsuario,1)' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'>Nuevo</button>";
			
			}

		if ($tipoServicio == 2) {
	# code...

				
						echo "<button type='button' onclick='nuevo_suministro($idUsuario,2)' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'>Nuevo</button>";
			
			}
			?>
	<table >
		<thead>
			<tr>
				<th >Nombre</th>
				<th>Suministros</th>
			</tr>
		</thead>
		<tbody>

			<?php 

			if ($tipoServicio == 1) {
	# code...

				$sql2="SELECT * FROM poa_suministros,poa_suministrosn where idSumiN=idSumi and idOrganismo=$idOrganismo group by agua";
				$indicadorInformacion2=$objeto->getObtenerInformacionGeneral($sql2);
				$jason['indicadorInformacion2']=$indicadorInformacion2;

				foreach ($indicadorInformacion2 as $row2){
					$nombreEscenario= $row2["nombreEscenario"];
					$agua= $row2["agua"];
						$idSumi= $row2["idSumi"];
					if ($agua == 'N/A' ||  $agua == '0') {

					}else{
						echo "<tr>";
						echo "<td>$nombreEscenario</td>";
						echo "<td>$agua</td>";		
					//	echo "<td><button type='button' onclick='nuevo_suministro($idSumi,1)' class='btn btn-primary' data-toggle='modal' d//ata-target='.bd-example-modal-lg'>Nuevo</button></td>";	
						echo "</tr>";
					}

				}
			}

			if ($tipoServicio == 2) {
	# code...

				 
			}
			?>



		</tbody>
	</table>



</div>
</div>


