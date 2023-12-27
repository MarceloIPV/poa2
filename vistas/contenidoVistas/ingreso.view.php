
<link href='layout/styles/css/styleLogin.css' rel='stylesheet' type='text/css'>

<?php date_default_timezone_set("America/Guayaquil");?>

<?php $anioActual= date('Y');?>

<!--=======================================
=            Sección principal            =
========================================-->

<?php $modal = new modal(); ?>

<input type="hidden" name="anioActual" id="anioActual" value="<?=$anioActual?>"/>

<section class="area">
	<div class="contenedor">
		<div class="contenedor_img">
			<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="3000">
						<img src="images/planificacion.jpg" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-bs-interval="3000">
						<img src="images/ejecucion.jpg" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="images/seguimiento.jpg" class="d-block w-100" alt="...">
					</div>
				</div>
			</div>
		</div>

		<div class="contenedor_contenido">
			<div class="contenedor_formulario">
				<form method="post">
					<div class="input" style="align-items: center;justify-content: center;">
						<div class="imgLogo">
							<img src="images/logoMinisterioAct.png">
						</div>
					</div>

					<div class="input">
						<i class="far fa-user"></i>

						<input type="text" id="username" name="username" placeholder="Ingrese usuario" />
					</div>

					<div class="input">
						<i class="far fa-unlock-alt"></i>

						<input type="password" id="password" name="password" placeholder="Ingrese contraseña" />
					</div>

					<div class="input" data-bs-toggle="modal" data-bs-target="#modalRegistros">

						<a>Seleccione un período</a>

					</div>

					<div class="col col-12 d d-flex align-items-center justify-content-center mt-4">

						<i class="fa fa-address-card-o" aria-hidden="true"></i>

						&nbsp;&nbsp;

						<select id="selector__anios__enteros" name="selector__anios__enteros" class="ancho__total__input__selects text-center">
							
							<option value="0">--Seleccionar período--</option>

						</select>

					</div>

					</br>

					<div class="input" data-bs-toggle="modal" data-bs-target="#modalRegistros">

						<a  id="olvido__cedenciales__les">¿Olvido su contraseña?</a>

					</div>

					<div class="input">

						<button type="submit" class="" name="ingresarUsuario" id="ingresarUsuario">
							<span class="texto_boton">INGRESAR</span>
						</button>

					</div>

					<div class="input" id="contenedorRegistro">
						<a class="nuevoRegistro" data-bs-toggle="modal" data-bs-target="#modalRegistros" id="registrosNuevos">REGISTRARSE</a>

					</div>

					<div class="input" id="contenedorRegistro">

						<a href="capacitacion" target="_blank" class="capacitacion">
							
							<img src="images/capacitacion.png" style="width: 40px;">
							Manuales de usuario
						</a>

					</div>


					<?php

					require_once CONTROLADOR . INICIOSESION . 'ingreso.controlador.php';

					$ingreso = new ingreso();
					$ingreso->ingresoCtr();

					?>
				</form>

				<div class="redes">
					<a href="https://www.facebook.com/MinisterioDeporteEcuador" target="_blank">
						<i class="fab fa-facebook"></i>
					</a>

					<a href="https://twitter.com/DeporteEc" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>

					<a href="https://www.youtube.com/user/DeporteEc" target="_blank">
						<i class="fab fa-youtube"></i>
					</a>
				</div>


			</div>
		</div>
	</div>
</section>


<!--====  End of Sección principal  ====-->

<!--=============================
=            Modales            =
==============================-->

<!--====================================
=            Modal registro            =
=====================================-->

<div class="modal fade" id="modalRegistros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $modal->getModales(1); ?>
</div>

<!--====  End of Modal registro  ====-->

<!--===============================
=            Terminots            =
================================-->

<div class="modal fade" id="terminosCondicionesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $modal->getModales(2); ?>
</div>

<!--====  End of Terminots  ====-->



<!--====  End of Modales  ====-->