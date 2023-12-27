<?php $componentes= new componentes();?>

<?php $componentes__modificaciones= new componentes__modificaciones();?>

<div class="content-wrapper d d-flex flex-column align-items-center">

	<?=$componentes->getComponentes(1,"ETAPA DE MODIFICACIÓN");?>

	<?=$componentes->getLinksConfiguracion__parametros__ver(["origen__destino"],["Modificación de montos"],"idModificacionMontos",["modificacionMontosMe"],'idmodificacionMontosME');?>

	<?=$componentes->getLinksConfiguracion__parametros__ver(["sueldos__salarios__modificaciones"],["Modificación de montos sueldos y salarios"],"idModificacion__sueldos",["modificacion__sueldosMe"],'idmodificacion__montosME');?>



</div>

<!--=====================================
=            Modales sección            =
======================================-->

<?=$componentes__modificaciones->getModalModificacion("origen__destino","Sección de modificaciones","modificacion__nuevos");?>

<?=$componentes__modificaciones->getModalModificacion__sueldos("sueldos__salarios__modificaciones","Sección de modificaciones sueldos y salarios","modificacion__nuevos__sueldos");?>


<?=$componentes__modificaciones->getModalModificacion__sueldos_new("sueldos__salarios__modificaciones_new","Sección de modificaciones 2 --pruebas","modificacion__nuevos__sueldos");?>




 

<?=$componentes__modificaciones->getModalModificacion__ingreso__valores__sueldos__origen("modalModificarSueldos","Sección disminuye valores orígen","modificacion__valores__iniciales__sueldos");?>

<?=$componentes__modificaciones->getModalModificacion__ingreso__valores__sueldos__origen__meses("modalModificarSueldos__meses","Sección disminuye valores orígen meses","modificacion__valores__iniciales__sueldos__meses");?>


<!--====  End of Modales sección  ====-->

<!--====================================
=            Modal ediciòn             =
=====================================-->

<?=$componentes__modificaciones->getModalModificacion__editas("modificacionMontosMe","Sección de modificaciones (ver)","modificacion__nuevos__editas");?>

<!--====  End of Modal ediciòn   ====-->
