<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<section class="content__configuraciones row d d-flex justify-content-center">

		<?=$componentes->getLinksConfiguracion__parametros(["modificacionActividades"],["Modificación de actividades"],"idModificacionesActividades");?>

		<?=$componentes->getLinksConfiguracion__parametros(["modificacionFecha"],["Fechas de inicio de modificación"],"idModificacionesFechas");?>

	</section>

</div>

<!--=====================================
=            Sección modales            =
======================================-->
<!--=======================================
=            modales iniciales            =
========================================-->

<?=$componentes__modificaciones->getModalConfiguracion("modificacionActividades","Modificación de actividades","body__modificaciones__actividades");?>

<?=$componentes__modificaciones->getModalConfiguracion__fechas("modificacionFecha","Modificación de fechas","body__modificaciones__fechas");?>

<!--====  End of modales iniciales  ====-->


<!--==============================================
=            Modales de configuración            =
===============================================-->

<?=$componentes__modificaciones->getModalConfiguracion__restriccion__items("modal__itemsRestringidos","Ítems restringidos","body__restriccion__items__actividades");?>

<!--====  End of Modales de configuración  ====-->


<!--====  End of Sección modales  ====-->
