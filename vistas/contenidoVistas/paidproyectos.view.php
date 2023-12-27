<?php $componentes= new componentes();?>

<form id="formulario__proyecto" class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Ficha de Proyecto");?>

		<br>

		<br>


		<div class="col col-2 mt-2">

			Programa:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="programa__creado" name="progra__creado" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Proyecto de Inversión:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="proyecto__inversion" name="proyecto__inversion" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Código:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="codigo__proyecto__solo" name="codigo__proyecto__solo" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Fecha de Inicio:

		</div>

		<div class="col col-10 mt-2">

			<input type="date" id="fecha__inicioProyecto" name="fecha__inicioProyecto" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Fecha de Fin:

		</div>

		<div class="col col-10 mt-2">

			<input type="date" id="fecha__finProyecto" name="fecha__finProyecto" class="ancho__total__input obligatorios" />

		</div>


		<div class="col col-2 mt-2">

			Área responsable

		</div>

		<div class="col col-10 mt-2">

			<select  id="area__responsable" name="area__responsable" class="ancho__total__input obligatorios"></select>

		</div>

		<div class="col col-2 mt-2">

			Líder del proyecto

		</div>

		<div class="col col-10 mt-2">

			<select  id="lider__proyecto" name="lider__proyecto" class="ancho__total__input obligatorios"></select>

		</div>


		<div class="col col-2 mt-2">

			CUP:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="cup__proyecto" name="cup__proyecto" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Objetivos Estratégicos:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="objetivos__proyectos" name="objetivos__proyectos" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-2 mt-2">

			Objetivo General:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="general__proyecto" name="general__proyecto" class="ancho__total__input obligatorios" />

		</div>

		<div class="col col-12 mt-4 negrilla__titulosEnlazados">

			Objetivos Específicos/Componentes:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="especificos__proyectos" name="especificos__proyectos" class="ancho__total__input obligatorios objetivo__especificos" placeholder="Ingrese objetivo específico"/>

		</div>

		<div class="col col-2 mt-2">

			<a id="agregar__especificos" name="agregar__especificos" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>

	</section>

	<section class="content row contenedor__especificos d d-flex justify-content-center"></section>

	<section class="content row d d-flex justify-content-center">
		
		<div class="col col-12 mt-4 negrilla__titulosEnlazados">

			Ítems:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="items__proyecto" name="items__proyecto" class="ancho__total__input obligatorios items__proyecto" placeholder="Ingrese ítem"/>

		</div>

		<div class="col col-2 mt-2">

			<a id="agregar__item" name="agregar__item" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>

	</section>

	<section class="content row contenedor__item d d-flex justify-content-center"></section>

	<section class="content row d d-flex justify-content-center">
		
		<div class="col col-12 mt-4 negrilla__titulosEnlazados">

			Código ítem presupuestario:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="codigo__proyecto" name="codigo__proyecto" class="ancho__total__input obligatorios codigo__proyecto solo__numero" placeholder="Ingrese código ítem presupuestario"/>

		</div>

		<div class="col col-2 mt-2">

			<a id="agregar__item__codigo" name="agregar__item__codigo" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>

	</section>

	<section class="content row contenedor__item__presupuestario d d-flex justify-content-center"></section>

	<section class="content row d d-flex justify-content-center">
		
		<div class="col col-12 mt-4 negrilla__titulosEnlazados">

			Indicador

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="indicador__proyecto" name="indicador__proyecto" class="ancho__total__input obligatorios indicador__proyecto" placeholder="Ingrese indicador del proyecto"/>

		</div>

		<div class="col col-2 mt-2">

			<a id="agregar__indicador" name="agregar__indicador" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>

	</section>

	<section class="content row contenedor__indicador d d-flex justify-content-center"></section>

	<section class="content row d d-flex justify-content-center">

		<div class="col col-12 mt-4 negrilla__titulosEnlazados text-center mt-4">
		
			<button type="button" class="btn btn-primary" id="guardarRegistro__proyectos" name="guardarRegistro__proyectos"><i class="fas fa-save"></i>&nbsp;&nbsp;REGISTRAR</button>

		</div>

	</section>

</form>

