<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>


<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<div class="contenedor__tabla__total">

		<table id="seguimiento__bloqueosTablaTrimestres" class="col col-12 cell-border">

			<thead>

				<tr>

					<th rowspan="2" style="vertical-align: middle!important;"><center>RUC</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PROVINCIA</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>CANTÓN</center></th>
					<th rowspan="2" style="vertical-align: middle!important;"><center>PARROQUIA</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE I</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE II</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE III</center></th>
					<th rowspan="1" colspan="2"><center>TRIMESTRE IV</center></th>

				</tr>

				<tr>

					<th rowspan="1" colspan="1"><center>BLOQUEAR</center></th>

					<th rowspan="1" colspan="1" style="height: 130px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__1" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__1" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">BLOQUEAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__1" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">DESBLOQUEAR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>
	

					<th rowspan="1" colspan="1"><center>BLOQUEAR</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__2" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__2" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">BLOQUEAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__2" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">DESBLOQUEAR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>


					<th rowspan="1" colspan="1"><center>BLOQUEAR</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__3" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__3" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">BLOQUEAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__3" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">DESBLOQUEAR</button></li>
							            </ul>
							        </li>
							    </ul>
							</nav>							
							
						</center>
					
					</th>

					<th rowspan="1" colspan="1"><center>BLOQUEAR</center></th>

					<th rowspan="1" colspan="1" style="height: 120px;">

						<center>

							<nav id="colorNav" style="position: relative; top: -5em!important;">
							    <ul>
							        <li class="green">
							            <a href="#" class="fa fa-windows" style="text-align: center!important; display: flex; justify-content: center!important; padding: .5em;"><div style="position: relative;left: -7px; font-weight:  bold; color: white; width: 100%;">+</div></a>
										<ul class="vertice__seguimiento__top">
							                <li><button class="btn btn-warning" id="seleccionarTodos__4" style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">SELECCIONAR TODOS</button></li>
							                <li><button class="btn btn-success seleccionarTodos__enviar__4" botonClass='bloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">BLOQUEAR</button></li>
							                <li><button class="btn btn-info seleccionarTodos__enviar__4" botonClass='desbloquear' style="font-size:8px; width: 100%; padding-top:1em;padding-bottom: .5em;">DESBLOQUEAR</button></li>
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


<script>
$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
  datatabletsSeguimientoRevisorVacio($("#seguimiento__bloqueosTablaTrimestres"),"seguimiento__bloqueosTablaTrimestres","Reporte de Bloqueos",objetos([5,6,7,8,9,10,11,12],["texto__separadores__2","chekeds__2","texto__separadores__2","chekeds__2","texto__separadores__2","chekeds__2","texto__separadores__4","chekeds__2"],[6,5,7,5,8,5,9,5],[false],[false]),[$("#idUsuarioPrincipal").val(),$("#zonalUsuario").val(),$("#idRolAd").val()],["funcion__bloqueos__seguimientos2023"]);

  
});


</script>