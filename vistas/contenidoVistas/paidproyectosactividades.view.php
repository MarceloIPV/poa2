<?php $componentes= new componentes();?>);?>

<form id="formulario__proyecto" class="content-wrapper">

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"Creación de actividades y mátricez referentes al proyecto");?>

		<br>

		<br>


		<div class="col col-2 mt-2 negrilla__titulosEnlazados">

			Proyecto de Inversión:

		</div>

		<div class="col col-10 mt-2">

			<select type="text" id="proyectos__escogidos__activities" name="proyectos__escogidos__activities" class="ancho__total__input obligatorios"></select>

		</div>

	</section>

	<section class="content row d d-flex justify-content-center">
			
		<div class="col col-2 mt-4 negrilla__titulosEnlazados">

				Actividades/Rubros:

		</div>

		<div class="col col-10 mt-2">

				<input type="text" id="actividades__rubros" name="actividades__rubros" class="ancho__total__input obligatorios actividades__rubros" placeholder="Ingrese actividad/rubro"/>

		</div>

	</section>


	<section class="content row d d-flex justify-content-center">
			
		<div class="col col-2 mt-4 negrilla__titulosEnlazados">

			Mátriz auxiliar:

		</div>

		<div class="col col-10 mt-2">

			<input type="text" id="matriz__auxiliar" name="matriz__auxiliar" class="ancho__total__input obligatorios matriz__auxiliar" placeholder="Ingrese mátriz auxiliar"/>

		</div>

	</section>

	<section class="content row d d-flex justify-content-center mt-4">
		
		<div class="col col-2 mt-4 negrilla__titulosEnlazados contenedor__visualizar__matriz">
			Visualizar Mátriz
		</div>


		<div class="col col-4 mt-2 text-left contenedor__visualizar__matriz">

			<a id="visualiza__matricez" name="visualiza__matricez" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#modal__matricez__administrador"><i class="fa fa-eye" aria-hidden="true"></i></a>

		</div>

		<div class="col col-2 mt-4 negrilla__titulosEnlazados contenedor__visualizar__matriz">
			Guardar Mátriz
		</div>


		<div class="col col-4 mt-2 text-left contenedor__visualizar__matriz">

			<a id="guardaMatriz__enlaces" name="guardaMatriz__enlaces" class="btn btn-primary text-center"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>

		</div>

	</section>

	<section class="content row d d-flex justify-content-center">

		<?=$componentes->getComponentes(1,"GENERACIÓN DE MÁTRIZ");?>
			
	</section>

	<section class="content row d d-flex justify-content-center">

		<div class="col col-2 mt-4 negrilla__titulosEnlazados">

			Nombre columna:

		</div>

		<div class="col col-3 mt-4 text-left">

			<input type="text" id="nombreConombre__columnas__0" name="nombreConombre__columnas__0" value=" " class="nombre__columnas ancho__total__input columnas__tomadas__cuenta" placeholder="Ingrese nombre de la columna" />

		</div>

		<div class="col col-2 mt-4 negrilla__titulosEnlazados">

			Tipo de columna:

		</div>


		<div class="col col-4 mt-4 text-left">

			<select id="tipoColumnas" name="tipoColumnas" class="tipo__columna ancho__total__input" attr="0">
				
				<option value=" ">--Seleccione tipo de columna--</option>
				<option value="numerico">Númerico</option>
				<option value="moneda">Moneda</option>
				<option value="texto">Texto</option>
				<option value="selector">Selector</option>
				<option value="selectorPais">Selector de países</option>
				<option value="formula">Formúla</option>

			</select>

		</div>


		<div class="col col-1 mt-4 text-left">

			<a id="agregar__columnas__paids" name="agregar__columnas__paids" class="btn btn-warning text-center"><i class="fas fa-plus-circle"></i></a>

		</div>

	</section>	

	<section class="content row d d-flex justify-content-center selector__alineados"></section>

	<section class="content row d d-flex justify-content-center formulas__alineados"></section>

	<section class="content row d d-flex justify-content-center columnas__generadas"></section>

	<section class="content row d d-flex justify-content-center columnas__generadas__contenidos"></section>

</form>

<!--=====================================
=            Seccion modales            =
======================================-->

<div class='modal fade modal__ItemsGrup' id='modal__matricez__administrador' aria-hidden='true'>

	<div class='modal-dialog' style='min-width:100%!important;'>

		<form class='modal-content'>

			<div class='modal-header row'>

				<div class='col col-11 text-center'>

					<h5 class='modal-title'>Generador de mátricez</h5>

				</div>
				<div class='col col-1'>

					<button type='button' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal' aria-label='Close'></button>

				</div>

			</div>

			<div class='modal-body row bloque__paid__matriz'>

				<div class='col col-12 text-center d d-flex justify-content-center'>

					<button class='btn btn-danger' class='btn-close cerrar__modalRegistros' data-bs-dismiss='modal'>CERRAR</button>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<button class='btn btn-info' id='enviar__matriz__disenadas'>ENVIAR</button>

				</div>

			</div>

		</form>

	</div>

</div>

<!--====  End of Seccion modales  ====-->


