<?php 
	session_start();
	$objetoInformacion= new usuarioAcciones();
	$objeto= new usuarioAcciones();
	$conexionRecuperada= new conexion();
	$conexionEstablecida=$conexionRecuperada->cConexion();	
	$aniosPeriodos__ingesos=$_SESSION["selectorAniosA"];
	date_default_timezone_set("America/Guayaquil");
	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
	$dia_actual = date('d');
?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<?php

	$consultaOrganismos=$objeto->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_organismo;");

	if (intval($dia_actual)>=16) {
		foreach ($consultaOrganismos as $valor) {

			$consultaOrganismos__2=$objeto->getObtenerInformacionGeneral("SELECT idCierreAnio FROM poa_cierre_fiscal_paid_modificaciones WHERE DAY(fecha)>=16 AND estado='no' AND idOrganismo='".$valor["idOrganismo"]."' AND periodo='$aniosPeriodos__ingesos';");

			if (!empty($consultaOrganismos__2[0][idCierreAnio])) {
			
				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_cierre_fiscal_paid_modificaciones` (`idCierreAnio`, `periodo`, `motivo`, `fecha`, `idOrganismo`, `estado`) VALUES (NULL, '$aniosPeriodos__ingesos', 'N/A', '$fecha_actual', '".$valor["idOrganismo"]."', 'no');";
				$resultado= $conexionEstablecida->exec($query);

			}else{

				$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_cierre_fiscal_paid_modificaciones` (`idCierreAnio`, `periodo`, `motivo`, `fecha`, `idOrganismo`, `estado`) VALUES (NULL, '$aniosPeriodos__ingesos', 'N/A', '$fecha_actual', '".$valor["idOrganismo"]."', 'si');";
				$resultado= $conexionEstablecida->exec($query);

			}

		}
	}else{
		foreach ($consultaOrganismos as $valor) {
			$query="INSERT INTO `ezonshar_mdepsaddb`.`poa_cierre_fiscal_paid_modificaciones` (`idCierreAnio`, `periodo`, `motivo`, `fecha`, `idOrganismo`, `estado`) VALUES (NULL, '$aniosPeriodos__ingesos', 'N/A', '$fecha_actual', '".$valor["idOrganismo"]."', 'no');";
			$resultado= $conexionEstablecida->exec($query);
		}
	}




?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="contenedor__tabla__total">

		<table id="seguimiento__bloqueosTablaTrimestres__2" class="col col-12 cell-border">

			<thead>

				<tr>

					<th rowspan="2" style="vertical-align: middle!important;"><center>RUC</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>ORGANISMO DEPORTIVO</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PROVINCIA</center></th>
					<th rowspan="1" colspan="2"><center>ASIGNACIÓN</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>MOTIVO</center></th>
					<th rowspan="1" colspan="2"><center>MODIFICACIONES</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>MOTIVO</center></th>
				</tr>

				<tr>

					<th rowspan="1" colspan="1"><center>ESTADO</center></th>

					<th rowspan="1" colspan="1" style="height: 130px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">ACCIONES</br>+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__1__segundasoz" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__1__periodos__cierres" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">CERRAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__1__periodos__cierres" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">ABRIR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>


					<th rowspan="1" colspan="1"><center>ESTADO</center></th>

					<th rowspan="1" colspan="1" style="height: 130px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">ACCIONES</br>+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__1__segundasoz__3" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__1__periodos__cierres__3" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">CERRAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__1__periodos__cierres__3" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">ABRIR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>


				</tr>

			</thead>

		</table>

		</div>

	</section>

</div>


