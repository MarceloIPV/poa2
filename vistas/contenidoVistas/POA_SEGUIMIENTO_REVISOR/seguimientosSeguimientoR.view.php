<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>

<?php $componentesTablas= new componentesTablas();?>

<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $idOrganismos = $informacionObjeto[0][idOrganismo]; ?>
<?php session_start(); ?>
<?php $aniosPeriodos__ingesos = $_SESSION["selectorAniosA"]; ?>
<?php $idUsuario=$_SESSION["idUsuario"]; ?>
<?php echo "usuariosss"; ?>
<?php echo $idUsuario; 

?>



<?php $idOrganismoCambiosNegacion = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.zonal,b.descripcionZonal FROM th_usuario AS a INNER JOIN th_zonal AS b ON a.zonal=b.id_Zonal WHERE a.id_usuario='$idUsuario';"); ?>

<div class="content-wrapper">

	<section class="content row d d-flex justify-content-center">
	
		<table id="seguimiento__tablas__seguimientos__recomendados2023" class="col col-12 cell-border">

			<thead>

				<tr>
					<th><center>JURISDICCIÓN</center></th>
					<th><center>RUC</center></th>
					<th><center>ORGANIZACIÓN DEPORTIVA</center></th>
					<th><center>TIPO DE<br>ORGANIZACIÓN</center></th>
					<th><center>PROVINCIA</center></th>
					<th><center>CANTÓN</center></th>
					<th><center>PARROQUIA</center></th>
					<th><center>SEMESTRE<br>REPORTADO</center></th>
					<th><center>FECHA ENVÍO<br>SEGUIMIENTO</center></th>
					<th><center>E-SIGEF 2</center></th>
					<th><center>REVISAR</center></th>

				</tr>

			</thead>

		</table>

	</section>

</div>


<!--=============================
=            Modales            =
==============================-->

<?php if($idOrganismoCambiosNegacion[0][descripcionZonal] == "ZONAL 8"){ ?>
	
	
	<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados2023("reasignarSeguimientos__SeguimientosRecomendados","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__seguimientos__recomendados");?>
<?php } else{ ?>

<?=$componentesTablas->get__modal__plantilla__inicios__seguimientos__seguimientos__d__recomendados2023("reasignarSeguimientos__SeguimientosRecomendados","SECCIÓN DE REPORTERÍA","principal__seguimiento__reportes__seguimientos__recomendados");?>
<?php } ?>
<!--====  End of Modales  ====-->



<script>
	 $.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){

		datatabletsSeguimientoRevisorVacio($("#seguimiento__tablas__seguimientos__recomendados2023"),"seguimiento__tablas__seguimientos__recomendados2023","s",objetos([3,4,5,6,7,8,9,10],["texto","texto","texto","texto","texto","texto","texto","boton"],[11,3,4,5,10,7,12,"<center><button class='reasignarTramites__seguimientosSeguimientos__recomendados estilo__botonDatatablets btn btn-info pointer__botones' data-toggle='modal' data-target='#reasignarSeguimientos__SeguimientosRecomendados'><i class='fas fa-user-edit'></i></button><center>"],[false],[false]),[$("#idUsuarioC").val(),$("#idRolAd").val(),$("#fisicamenteE").val()],["funcion__reasignar__seguimientos__unidos__seguimientos__seguimientos__recomendados__formaRe2023"]);

	
	});

</script>