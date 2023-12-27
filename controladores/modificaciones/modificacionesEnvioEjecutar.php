<?php 

session_start();
$idOrganismo = $_SESSION["idOrganismoSession"];

require_once "../../config/config2.php";


/* ************************Origen******************* */


	$objeto1= new usuarioAcciones();
	$cantidad=$objeto1->getObtenerInformacionGeneral("SELECT * FROM poa_modificacion_organismo_actividades where idOrganismo='$idOrganismo' AND estado='0';");
	foreach ($cantidad as $row)
	{

		$idModificacionOr= $row["idModificacionOr"];		
		$idSueldo= $row["idSueldo"];			
		$idHonorario= $row["idHonorario"];


		$actividadOrigen= $row["actividadOrigen"];				
		$itemOrigen= $row["idFinancieroOrigen"];
		$itemOrigeniniciall = substr($itemOrigen, 0, 2);
		

		$mesOrigenTabla= $row["mesOrigen"];	
		$mesOrigen = strtolower($mesOrigenTabla);	
		$disminucionOrigen= $row["disminucionOrigen"];	
		$estadoOrigen= $row["estadoOrigen"];		
		$itemOrigeniniciall = substr($itemOrigen, 0, 2);
		


		$actividadDestino= $row["actividadDestino"];		
		$itemDestino= $row["idFinancieroDestino"];	
		$itemDestinoniciall = substr($itemDestino, 0, 2);
		

		$mesDestinoTabla= $row["mesDestino"];	
		$mesDestino = strtolower($mesDestinoTabla);		
		$estadoDestino= $row["estadoDestino"];	


			$objeto2= new usuarioAcciones();			
			$sql="SELECT itemPreesupuestario as grupo57,nombreItem,idProgramacionFinanciera,$mesOrigen as mesPlanificacion,totalTotales 
			from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
			 and itemPreesupuestario='$itemOrigen' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%57%')";

	
			$grupo57=$objeto2->getObtenerInformacionGeneral($sql);
			if (!empty($grupo57[0][grupo57])) {				
				 $itemPresupuestario=$grupo57[0][grupo57];
				 $idProgramacionFinanciera=$grupo57[0][idProgramacionFinanciera];
				 $valorMesOrigen=$grupo57[0][mesPlanificacion];		
				 $totalTotales= $grupo57[0]["totalTotales"];
				 $total=$totalTotales-$disminucionOrigen;
				 $cambioValorMes=$valorMesOrigen-$disminucionOrigen;
			
		    	 $sql1 ="UPDATE `poa_sueldossalarios2022` SET `$mesOrigen` = '$cambioValorMes' WHERE (`idSueldos` = '$idSueldo');";
				 echo $sql1;
				 //$grupo57=$objeto2->getObtenerInformacionGeneral($sql);
				 //echo $itemPresupuestario," - ",$idProgramacionFinanciera," - ",$valorMesOrigen," - ",$totalTotales," - ",$total," - ",$cambioValorMes;
				echo "<br>";
			}
	


/*



				
			$grupo57=$objeto2->getObtenerInformacionGeneral($sql);
			foreach ($grupo57 as $row1)
			{
				echo $idModificacionOr;
				echo "<br>";
				echo "<br>";
				$idProgramacionFinanciera= $row1["idProgramacionFinanciera"];				
				$mesPlanificacion= $row1["mesPlanificacion"];			
				$totalTotales= $row1["totalTotales"];
				$total=$totalTotales-$disminucionOrigen;
				$cambioValorMes=$mesPlanificacion-$disminucionOrigen;
				echo $cambioValorMes;
				echo "<br>";
				$objetoCambio= new usuarioAcciones();
				$sql2 ="UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
				echo $sql2;
				$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql2);
				echo "<br>";
				
				$objetoCambioPrincipal= new usuarioAcciones();
				$sql3 ="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO ORIGEN',`estadoOrigen` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
				echo $sql3;
				$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql3);
				echo "ok";
				echo "<br>";
			}



			$objeto2_1= new usuarioAcciones();
			$sql2_1="SELECT itemPreesupuestario as grupo57,nombreItem,idProgramacionFinanciera,$mesDestino as mesPlanificacion,totalTotales 
			from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
			 and itemPreesupuestario='$itemDestino' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%57%')";

			$grupo57_2_1=$objeto2_1->getObtenerInformacionGeneral($sql2_1);
			foreach ($grupo57_2_1 as $row)
			{
				echo $idModificacionOr;
				echo "<br>";
				
				echo "<br>";
				$idProgramacionFinanciera= $row["idProgramacionFinanciera"];				
				$mesPlanificacion= $row["mesPlanificacion"];			
				$totalTotales= $row["totalTotales"];
				$total=$totalTotales-$disminucionOrigen;
				$cambioValorMes=$mesPlanificacion+$disminucionOrigen;
				echo $cambioValorMes;
				echo "<br>";


				$objetoCambio= new usuarioAcciones();
				$sql22_1= "UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
				echo $sql2;
				$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql22_1);
				echo "<br>";
				
				$objetoCambioPrincipal= new usuarioAcciones();
				$sql32_1="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO DESTINO',`estadoDestino` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
				echo $sql32_1;
				$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql32_1);
				echo "ok";
				echo "<br>";

			}

				if( $actividadOrigen == 1 && $itemOrigeniniciall == 53){

					$objeto2_53= new usuarioAcciones();
					$sql="SELECT itemPreesupuestario as grupo53,nombreItem,idProgramacionFinanciera,$mesOrigen as mesPlanificacion,totalTotales 
					from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
					 and itemPreesupuestario='$itemOrigen' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%53%')";
		
						
					$grupo53=$objeto2_53->getObtenerInformacionGeneral($sql);
					foreach ($grupo53 as $row1)
					{
						echo $idModificacionOr;
						echo "<br>";
						echo "<br>";
						$idProgramacionFinanciera= $row1["idProgramacionFinanciera"];				
						$mesPlanificacion= $row1["mesPlanificacion"];			
						$totalTotales= $row1["totalTotales"];
						$total=$totalTotales-$disminucionOrigen;
						$cambioValorMes=$mesPlanificacion-$disminucionOrigen;

						echo $cambioValorMes;
						echo "<br>";
						$objetoCambio= new usuarioAcciones();
						$sql2 ="UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
						echo $sql2;
						$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql2);
						echo "<br>";
						
						$objetoCambioPrincipal= new usuarioAcciones();
						$sql3 ="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO ORIGEN',`estadoOrigen` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
						echo $sql3;
						$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql3);

						$objetoCambioadministrativas= new usuarioAcciones();
						$sql4 ="UPDATE `poa_actividadesadministrativas` SET `cantidadBien` = '$cambioValorMes' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera')";
						echo $sql4;
						$cambioTres=$objetoCambioadministrativas->getObtenerInformacionGeneral($sql4);
						echo "ok";
						echo "<br>";
		
					}
				}

					if( $actividadOrigen == 1 && $itemOrigeniniciall == 51){

						$objeto2_51= new usuarioAcciones();
						$sql="SELECT itemPreesupuestario as grupo51,nombreItem,idProgramacionFinanciera,$mesOrigen as mesPlanificacion,totalTotales 
						from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
						 and itemPreesupuestario='$itemOrigen' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%51%')";
			
							
						$grupo51=$objeto2_51->getObtenerInformacionGeneral($sql);
						foreach ($grupo51 as $row1)
						{
							echo $idModificacionOr;
							echo "<br>";
							echo "<br>";
							$idProgramacionFinanciera= $row1["idProgramacionFinanciera"];				
							$mesPlanificacion= $row1["mesPlanificacion"];			
							$totalTotales= $row1["totalTotales"];
							$total=$totalTotales-$disminucionOrigen;
							$cambioValorMes=$mesPlanificacion-$disminucionOrigen;
	
							echo $cambioValorMes;
							echo "<br>";
							$objetoCambio= new usuarioAcciones();
							$sql2 ="UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
							echo $sql2;
							$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql2);
							echo "<br>";
							
							$objetoCambioPrincipal= new usuarioAcciones();
							$sql3 ="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO ORIGEN',`estadoOrigen` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
							echo $sql3;
							$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql3);
	
							$objetoCambioadministrativas= new usuarioAcciones();
							$sql4 ="UPDATE `poa_sueldossalarios2022` SET `$mesOrigen` = '$cambioValorMes' WHERE (`idSueldos` = '$idSueldo');";
							echo $sql4;
							$cambioTres=$objetoCambioadministrativas->getObtenerInformacionGeneral($sql4);
							echo "ok";
							echo "<br>";
			
						}




						if( $actividadOrigen == 1 && $itemOrigeniniciall == 57){

							$objeto2_57= new usuarioAcciones();
							$sql="SELECT itemPreesupuestario as grupo51,nombreItem,idProgramacionFinanciera,$mesOrigen as mesPlanificacion,totalTotales 
							from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
							 and itemPreesupuestario='$itemOrigen' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%57%')";
				
								
							$grupo57=$objeto2_57->getObtenerInformacionGeneral($sql);
							foreach ($grupo57 as $row1)
							{
								echo $idModificacionOr;
								echo "<br>";
								echo "<br>";
								$idProgramacionFinanciera= $row1["idProgramacionFinanciera"];				
								$mesPlanificacion= $row1["mesPlanificacion"];			
								$totalTotales= $row1["totalTotales"];
								$total=$totalTotales-$disminucionOrigen;
								$cambioValorMes=$mesPlanificacion-$disminucionOrigen;
		
								echo $cambioValorMes;
								echo "<br>";
								$objetoCambio= new usuarioAcciones();
								$sql2 ="UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
								echo $sql2;
								$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql2);
								echo "<br>";
								
								$objetoCambioPrincipal= new usuarioAcciones();
								$sql3 ="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO ORIGEN',`estadoOrigen` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
								echo $sql3;
								$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql3);
		
								$objetoCambioadministrativas= new usuarioAcciones();
								$sql4 ="UPDATE `poa_honorarios2022` SET `mayo` = '601' WHERE (`idHonorarios` = '$idHonorario');";
								echo $sql4;
								$cambioTres=$objetoCambioadministrativas->getObtenerInformacionGeneral($sql4);
								echo "ok";
								echo "<br>";
				
							}



							if( $actividadOrigen == 2 ){

								$objeto2_57= new usuarioAcciones();
								$sql="SELECT itemPreesupuestario as grupo51,nombreItem,idProgramacionFinanciera,$mesOrigen as mesPlanificacion,totalTotales 
								from poa_programacion_financiera as a, poa_item as b where idOrganismo='$idOrganismo'
								 and itemPreesupuestario='$itemOrigen' and a.idItem=b.idItem AND (b.itemPreesupuestario LIKE '%57%')";
					
									
								$grupo57=$objeto2_57->getObtenerInformacionGeneral($sql);
								foreach ($grupo57 as $row1)
								{
									echo $idModificacionOr;
									echo "<br>";
									echo "<br>";
									$idProgramacionFinanciera= $row1["idProgramacionFinanciera"];				
									$mesPlanificacion= $row1["mesPlanificacion"];			
									$totalTotales= $row1["totalTotales"];
									$total=$totalTotales-$disminucionOrigen;
									$cambioValorMes=$mesPlanificacion-$disminucionOrigen;
			
									echo $cambioValorMes;
									echo "<br>";
									$objetoCambio= new usuarioAcciones();
									$sql2 ="UPDATE `poa_programacion_financiera` SET `$mesOrigen` = '$cambioValorMes', `totalTotales` = '$total' WHERE (`idProgramacionFinanciera` = '$idProgramacionFinanciera');";
									echo $sql2;
									$cambioUo=$objetoCambio->getObtenerInformacionGeneral($sql2);
									echo "<br>";
									
									$objetoCambioPrincipal= new usuarioAcciones();
									$sql3 ="UPDATE `poa_modificacion_organismo_actividades` SET `estado` = 'MODIFICADO ORIGEN',`estadoOrigen` = 'MODIFICADO' WHERE (`idModificacionOr` = '$idModificacionOr')";
									echo $sql3;
									$cambioDos=$objetoCambioPrincipal->getObtenerInformacionGeneral($sql3);
									
									echo "ok";
									echo "<br>";

								}
				}*/
}
?>
