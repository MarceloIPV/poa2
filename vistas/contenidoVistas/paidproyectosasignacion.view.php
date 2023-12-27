<?php $componentes= new componentes();?>


<form id="formulario__proyecto" class="content-wrapper">

	<input type="hidden" id="parametrosTomarCuenta" name="parametrosTomarCuenta">

	<section class="content row d d-flex justify-content-center contenedor__paids">

		<?=$componentes->getComponentes(1,"Planificación Anual de Inversión Deportiva PAID");?>

		<div class="col col-12 text-left negrilla__titulosEnlazados">

			Proyectos de Inversión con dictamen de prioridad:

		</div>

		<div class="col col-11 mt-2">

			<select id="proyectos__creados" name="proyectos__creados" class="ancho__total__input proyectos__creados"></select>

		</div>

		<div class="col col-1 mt-2">

			<a id="agregar__proyectos__paids" name="agregar__proyectos__paids" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>


	</section>

</form>

