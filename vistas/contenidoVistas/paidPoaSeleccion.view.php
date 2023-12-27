<?php
$objetoInformacion = new usuarioAcciones();
?>

<?php
$_SESSION["seleccionPaidPoa"] = null;

?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];
?>


<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo__2(); ?>
<?php $componentes = new componentes(); ?>
<?php $anioActual = date('Y'); ?>

<html lang="en">
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="logoMinisterio" height="60" width="60">
</div>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Seleccion POA PAID -->
	<link rel="stylesheet" href="layout/styles/css/paid-alto-rendimiento/style-par.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Document</title>
</head>

<body>
	<center><img src="././images/paidpoa.PNG" width="100px"></center>

	<div class="continer">

		<section class="content row d d-flex justify-content-center">

			<form id="informacionBasicaOrganismo" class="col-8 row" method="post">

				<!--   Tarjetas-->
				<h4 class="title-cards1">
					<?= $informacionObjeto[0][nombreOrganismo] ?>
					<input type="hidden" id="organismoRucEnviado" name="organismoRucEnviado" value="<?= $informacionObjeto[0][nombreOrganismo] ?>" />

				</h4>
				<div class="title-cards">
					<h5>SELECCIONE POA O PAID <?= $_SESSION["selectorAniosA"] ?></h5>
				</div>
				<div class="container-card">
					<div class="card">
						<figure>
							<center><span class="far fa-file-alt fa-10x iconos_edit"></span></center>
						</figure>
						<div class="contenido-card">
							<h1></h1>
							<h1>POA</h1>
							<button type="submit" name="btnPoa" id="btnPoa" value="1" class="btn btn-warning">Ingresar</button>
						</div>
					</div>
					<div class="card1">
						<figure>
							<center><span class="far fa-file-alt fa-10x iconos_edit1"></span></center>
						</figure>
						<div class="contenido-card">
							<h1></h1>
							<h1>PAID</h1>
							<button type="submit" name="btnPaid" id="btnPaid" value="2" class="btn btn-warning">Ingresar</button>
						</div>
					</div>

					<?php

					require_once CONTROLADOR . SELECCIONPOAPAID . 'seleccion.controlador.php';

					$seleccion = new seleccion();
					$seleccion->seleccionPP();

					?>

				</div>
				<!--Fin   Tarjetas-->


			</form>

		</section>

	</div>
</body>

</html>