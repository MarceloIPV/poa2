<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();

$idOrganismoSession = $objetoInformacion->get__idOrganismo__sesiones();?> 



<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>

<?php $anioActual = date('Y');?>

<?php $aniosPeriodos__ingesos=$objetoInformacion->get__obtener__Selector__anios();?>

<?php $informacionSeleccionada=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividades,nombreActividades FROM poa_actividades;");?>

<?php $actividadesSeleccionadas=$objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad LIMIT 1;");?>

<?php $inversionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;");?>

<?php $inversionOrganismoQueda=$objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");?>

<?php $inversionRestante=$objetoInformacion->getRestar($inversionOrganismo[0][nombreInversion],$inversionOrganismoQueda[0][sumaItemTotal]);?>


<?php $poaPreEn=$objetoInformacion->getObtenerInformacionGeneral("SELECT activo FROM poa_preliminar_envio WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND activo='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $observacionOrganismo=$objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $estadoFinal=$objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND perioIngreso='$aniosPeriodos__ingesos';");?>

<?php $contadorModificaciones=$objetoInformacion->getObtenerInformacionGeneral("SELECT count(idOrganismo) AS contador FROM poa_modificaciones_origen_destino WHERE idOrganismo='".$informacionObjeto[0][idOrganismo]."' AND periodoIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;");?>

<style type="text/css">
  
.tabla__sueldos__anadidos thead {
    position: sticky;
    top: 0;
}

</style>

<div class="content-wrapper d d-flex flex-column align-items-center"> 

<div class="col col-12 text-center">
  <a href="estadoTramitesModificaciones" class="d d-flex justify-content-center" style="font-weight: bold;">USTED TIENE <?=$contadorModificaciones[0][contador]?> MODIFICACIONES INGRESADAS</a> 
</div> 

  
<input type="hidden" id="actividad__modificaciones" name="actividad__modificaciones" />
<input type="hidden" id="actividad__modificaciones__destinos" name="actividad__modificaciones__destinos" />

<input type="hidden" id="identificadorPagina" name="identificadorPagina" value="1" />

<input type="hidden" id="identificadorPaginaReal" name="identificadorPaginaReal" value="origenDesvinculacion" />

<!--==============================
=            Destinos            =
===============================-->

<input type="hidden" id="eneroDestino" name="eneroDestino" value="0"/>
<input type="hidden" id="febreroDestino" name="febreroDestino" value="0"/>
<input type="hidden" id="marzoDestino" name="marzoDestino" value="0"/>
<input type="hidden" id="abrilDestino" name="abrilDestino" value="0"/>
<input type="hidden" id="mayoDestino" name="mayoDestino" value="0"/>
<input type="hidden" id="junioDestino" name="junioDestino" value="0"/>
<input type="hidden" id="julioDestino" name="julioDestino" value="0"/>
<input type="hidden" id="agostoDestino" name="agostoDestino" value="0"/>
<input type="hidden" id="septiembreDestino" name="septiembreDestino" value="0"/>
<input type="hidden" id="octubreDestino" name="octubreDestino" value="0"/>
<input type="hidden" id="noviembreDestino" name="noviembreDestino" value="0"/>
<input type="hidden" id="diciembreDestino" name="diciembreDestino" value="0"/>
<input type="hidden" id="totalDestino" name="totalDestino" value=""/>


<input type="hidden" id="eneroDestino__sumando" name="eneroDestino__sumando" value="0"/>
<input type="hidden" id="febreroDestino__sumando" name="febreroDestino__sumando" value="0"/>
<input type="hidden" id="marzoDestino__sumando" name="marzoDestino__sumando" value="0"/>
<input type="hidden" id="abrilDestino__sumando" name="abrilDestino__sumando" value="0"/>
<input type="hidden" id="mayoDestino__sumando" name="mayoDestino__sumando" value="0"/>
<input type="hidden" id="junioDestino__sumando" name="junioDestino__sumando" value="0"/>
<input type="hidden" id="julioDestino__sumando" name="julioDestino__sumando" value="0"/>
<input type="hidden" id="agostoDestino__sumando" name="agostoDestino__sumando" value="0"/>
<input type="hidden" id="septiembreDestino__sumando" name="septiembreDestino__sumando" value="0"/>
<input type="hidden" id="octubreDestino__sumando" name="octubreDestino__sumando" value="0"/>
<input type="hidden" id="noviembreDestino__sumando" name="noviembreDestino__sumando" value="0"/>
<input type="hidden" id="diciembreDestino__sumando" name="diciembreDestino__sumando" value="0"/>



<input type="hidden" id="sueldoDestino" name="sueldoDestino" value="0"/>
<input type="hidden" id="aportePatronalDestino" name="aportePatronalDestino" value="0"/>
<input type="hidden" id="decimoTerceraDestino" name="decimoTerceraDestino" value="0"/>
<input type="hidden" id="decimoCuartaDestino" name="decimoCuartaDestino" value="0"/>
<input type="hidden" id="fondosReservaDestino" name="fondosReservaDestino" value="0"/>

<input type="hidden" id="sueldoDestino__sumando" name="sueldoDestino__sumando" value="0"/>
<input type="hidden" id="aportePatronalDestino__sumando" name="aportePatronalDestino__sumando" value="0"/>
<input type="hidden" id="decimoTerceraDestino__sumando" name="decimoTerceraDestino__sumando" value="0"/>
<input type="hidden" id="decimoCuartaDestino__sumando" name="decimoCuartaDestino__sumando" value="0"/>
<input type="hidden" id="fondosReservaDestino__sumando" name="fondosReservaDestino__sumando" value="0"/>


<!--====  End of Destinos  ====-->


<?=$componentes->getComponentes(1,"ORÍGEN");?> 

<section class="content row mt-4" style="width:100%; overflow-y: scroll;">

<table class="col col-12">

  <thead>

    <tr>

      <th class="vertical__aign">
          <center>Apellidos y nombres</center>
      </th>
      <th class="vertical__aign">
          <center> Nro.cédula <br /> ciudadanía / pasaporte </center>
      </th>
      <th class="vertical__aign">
          <center>Cargo</center>
      </th>
      <th class="vertical__aign">
          <center>Tipo de cargo</center>
      </th>
      <th class="vertical__aign">
          <center>Tiempo de trabajo en meses</center>
      </th>
      <th class="vertical__aign">
          <center>Mensualiza décimo tercer sueldo</center>
      </th>
      <th class="vertical__aign">
          <center>Mensualiza décimo cuarto sueldo</center>
      </th>
      <th class="vertical__aign">
          <center>Asignación Orígen </br> (Programación mensual)</center>
      </th>

    </tr>

  </thead>

  <tbody>

      <tr>

          <td>
            <select id="persona_sueldos_data__origen__desvinculacion" class="ancho__total__input obligatorios__2 form-control"></select>
          </td>
          <td>
            <input style="font-size:10px!important;" id="cedula"  class="ancho__total__input obligatorios__2 form-control" readonly />
            <input type="hidden" id="idHonorarios" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input style="font-size:10px!important;" id="cargo" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input style="font-size:10px!important;" id="tipo__cargo" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td>
          <td>
            <input style="font-size:10px!important;" id="honorarioMensual" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td> 
          <td>
            <input style="font-size:10px!important;" id="mensualizaDecimoTercero" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td> 
          <td>
            <input style="font-size:10px!important;" id="mensualizaDecimoCuarto" class="ancho__total__input obligatorios__2 form-control" readonly />
          </td> 

          <td>
            
            <table class="col col-12 tabla__sueldos__anadidos">

              <thead>

                <tr>

                  <th align="center">Mes</th>
                  <th align="center">Compensación</br>por</br>desahucio</th>
                  <th align="center">Despido</br>Intempestivo</th>
                  <th align="center">Por</br>renuncia<br>voluntaria</th>
                  <th align="center">Compensación por<br>Vacaciones no Gozadas<br>por Cesación de Funciones</th>


                </tr>

              </thead>

              <tbody>

             <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Enero (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>

             <tr>

                <td align="center">Enero (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>


              </tr>



             <tr>

                <td>Enero (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__enero__origen" value="0"/>
                </td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Febrero (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Febrero (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>

             <tr>

                <td>Febrero (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Marzo (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Marzo (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Marzo (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

              </tr>              

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Abril (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Abril (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Abril (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__abril__origen" value="0" />
                </td>

              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Mayo (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Mayo (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>


              </tr>



             <tr>

                <td>Mayo (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__mayo__origen" value="0" />
                </td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Junio (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Junio (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Junio (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__junio__origen" value="0" />
                </td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Julio (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Julio (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>

             <tr>

                <td>Julio (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__julio__origen" value="0" />
                </td>

              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Agosto (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Agosto (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>

             <tr>

                <td>Agosto (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__agosto__origen" value="0" />
                </td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Septiembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Septiembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Septiembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Octubre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Octubre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Octubre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__octubre__origen" value="0" />
                </td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Noviembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Noviembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Noviembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Diciembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__desahucio" class="ancho__total__input form-control origen__desahucio__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__despido__intenpestivo" class="ancho__total__input form-control origen__despido__intenpestivo__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__renunia__voluntaria" class="ancho__total__input form-control origen__renunia__voluntaria__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__vacaciones__no__gozadas" class="ancho__total__input form-control origen__vacaciones__no__gozadas__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Diciembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__desahucio__restante" class="ancho__total__input form-control origen__desahucio__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__despido__intenpestivo__restante" class="ancho__total__input form-control origen__despido__intenpestivo__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__renunia__voluntaria__restante" class="ancho__total__input form-control origen__renunia__voluntaria__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__vacaciones__no__gozadas__restante" class="ancho__total__input form-control origen__vacaciones__no__gozadas__restante__clase" readonly=""/>
                </td>

              </tr>

             <tr>

                <td>Diciembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__desahucio__ingresar" class="ancho__total__input form-control solo__numero__montos origen__desahucio__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__despido__intenpestivo__ingresar" class="ancho__total__input form-control solo__numero__montos origen__despido__intenpestivo__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__renunia__voluntaria__ingresar" class="ancho__total__input form-control solo__numero__montos origen__renunia__voluntaria__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__vacaciones__no__gozadas__ingresar" class="ancho__total__input form-control solo__numero__montos origen__vacaciones__no__gozadas__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

              </tr>

               <tr>

                <th>Compensación</br>por</br>desahucio</th>
                <th>Despido</br>Intempestivo</th>
                <th>Por</br>renuncia<br>voluntaria</th>
                <th>Compensación por<br>Vacaciones no Gozadas<br>por Cesación de Funciones</th>
                <th>Total</th>

              </tr>

              <tr>

                <td>
                  <input style="font-size:10px!important;" id="total__origen__compensacion" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0" />
                </td>
                <td>
                  <input style="font-size:10px!important;" id="total__origen__despido__intempestivo" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
                <td>
                  <input style="font-size:10px!important;" id="total__origen__renuncia__voluntaria" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
                <td>
                   <input style="font-size:10px!important;" id="total__origen__vacaciones__no__gozadas" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
   
                <td>
                  <div style="display:flex; flex-direction: column;">
                    <input style="font-size:10px!important;" id="totalOrigen" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                    <button type="button" id="calcularTotalesOrigen__desvinculacion" name="calcularTotalesOrigen__desvinculacion" class="btn btn-primary">Calcular</button>
                  </div>
                </td>

                <td>
                    
                </td>


              </tr>

              </tbody>

            </table>

          </td> 


      </tr>

  </tbody>

</table>

</section>

<div class="col col-12 text-center oculto__tabla__destino__salarios__origen__desvinculaciones">
  <?=$componentes->getComponentes(1,"MODIFICACIÓN DESTINO");?> 
</div> 

<div id="origen"></div> 

<section class='content row mt-1 oculto__tabla__destino__salarios__origen__desvinculaciones' style="width:100%; overflow-y: scroll;">

  <table class='col col-12 table__bordes__ejecutados mt-4' style="width:100%!important;">

    <thead>

      <tr class=''>

        <th class='vertical__aign' style="width:20%!important;"><center>Actividad</center></th> 
        <th class='vertical__aign ocultar__fila__eventos__dos texto__columna__eventos__dos' style="width:10%!important;"><center>Eventos/ Infraestructura/ Sueldos</center></th>
        <th class='vertical__aign oculto__items__sueldos' style="width:10%!important;"><center>Ítem</center></th>
        <th class='vertical__aign oculto__items__sueldos' style="width:5%!important;"><center>Código item presupuestario</center></th>
        <th class='vertical__aign' style="width:5%!important;"><center>Mes</center></th>
        <th class='vertical__aign'style="width:25%!important;"><center>Justificación</center></th>
        <th class='vertical__aign' style="width:10%!important;"><center>Documento Justificación</center></th>
        <th class='vertical__aign' style="width:5%!important;"><center>Acción</center></th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__modificaciones2__seleccion' class='ancho__total__input obligatorios'></select>
        </td>

         <td class="ocultar__fila__eventos__dos soloactividades__ediciones" align="center">

            <select id='eventos_intervencion__seleccion'  class='ancho__total__input obligatorios'></select>

            <form class="content__configuraciones mt-4 formulario__preliminarEnvio formulario__etiquetado__envios">

            <input type="hidden" id="actividad__determinantes" name="actividad__determinantes">

            <input type="hidden" id="planificados__ocultos" name="planificados__ocultos">

            <input type="hidden" id="actividadGeneral__id" name="actividadGeneral__id" />

            <input type="hidden" id="estadoFinal" name="estadoFinal" value="<?=$estadoFinal[0][idOrganismo]?>">

            <input type="hidden" id="poaActividad" name="poaActividad" value="<?=$actividadesSeleccionadas[0][idActividad]?>">

            <input type="hidden" id="observacionOr" name="observacionOr" value="<?=$observacionOrganismo[0][estado]?>">

            <input type="hidden" id="envioPreliminar" name="envioPreliminar" value="<?=$poaPreEn[0][activo]?>">

            <input type="hidden" id="montoAsginadoFe" name="montoAsginadoFe" value="<?=number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '')?>">

            <input type="hidden" id="montoDisponible" name="montoDisponible" value="<?=number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '')?>">


            <!--==================================
            =            Sección poas            =
            ===================================-->

            <input type='hidden' id='despejar__montoP' name='despejar__montoP' value='<?=$inversionRestante?>'>

            <?=$componentes->getContenidoActividadesPoa__modificaciones("tablaPoaInicial","","body__actividadesEs__modificaciones__insertar");?>    
          
            <!--====  End of Sección poas  ====-->

          </form>

        </td>

        <td class="oculto__items__sueldos">

          <select id='item__modificaciones__destino__modificaciones2__seleccion'  class='ancho__total__input obligatorios'></select>

          <form class="content__configuraciones mt-4 formulario__preliminarEnvio formulario__etiquetado__envios__actividad__1">

            <input type="hidden" id="actividad__determinantes" name="actividad__determinantes">

            <input type="hidden" id="planificados__ocultos" name="planificados__ocultos">

            <input type="hidden" id="actividadGeneral__id" name="actividadGeneral__id" />

            <input type="hidden" id="estadoFinal" name="estadoFinal" value="<?=$estadoFinal[0][idOrganismo]?>">

            <input type="hidden" id="poaActividad" name="poaActividad" value="<?=$actividadesSeleccionadas[0][idActividad]?>">

            <input type="hidden" id="observacionOr" name="observacionOr" value="<?=$observacionOrganismo[0][estado]?>">

            <input type="hidden" id="envioPreliminar" name="envioPreliminar" value="<?=$poaPreEn[0][activo]?>">

            <input type="hidden" id="montoAsginadoFe" name="montoAsginadoFe" value="<?=number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '')?>">

            <input type="hidden" id="montoDisponible" name="montoDisponible" value="<?=number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '')?>">


            <!--==================================
            =            Sección poas            =
            ===================================-->

            <input type='hidden' id='despejar__montoP' name='despejar__montoP' value='<?=$inversionRestante?>'>

            <?=$componentes->getContenidoActividadesPoa__modificaciones("tablaPoaInicial__dos__items","","body__actividadesEs__modificaciones__insertar");?>    
          
            <!--====  End of Sección poas  ====-->

          </form>


        </td>

        <td class="oculto__items__sueldos">
          <input style="font-size:10px!important;" id='codigo__presupuestarios__destino__new2__seleccion' class='ancho__total__input obligatorios' readonly='' />
        </td>

        <td id='meses2__seleccion'>


        </td>


        <td>
          <textarea id='origen_justificacion' class='ancho__total__input obligatorios__finales ancho__total__textareas obligatorios__iniciales'></textarea>
        </td>

        <td>
          <input type="file" id="documento__justificacion"/>
        </td>

        <td>
         <button class="form-control btn btn-primary" id="guardarModificaciones__enviadas">Guardar</button>
        </td>

      </tr>

    </tbody>

  </table>

</section>

</div>

<!--=====================================
=            Sección modales            =
======================================-->

<?php foreach ($informacionSeleccionada as $clave => $valor): ?>

  <?php foreach ($valor as $clave2 => $valor2): ?>

    <?=$componentes->getModalAtributos("modalActividad".$valor2,"formModalActividades".$valor2,$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"insertar".$informacionSeleccionada[$clave]['idActividades'],["PLANIFICACIÓN DE INDICADORES","I Trimestre","II Trimestre","III Trimestre","IV Trimestre","Meta Anual del indicador"],["planificacionIndicadores","primerTrimestre".$valor2,"segundoTrimestre".$valor2,"tercerTrimestre".$valor2,"cuartoTrimestre".$valor2,"metaAnualIndicador".$valor2,"botonItems".$valor2],["textos","input","input","input","input","input","boton"],["textos","numero","numero","numero","numero","disabled","boton"],"<i class='fas fa-save'></i>&nbsp;&nbsp;GUARDAR");?>


    <?=$componentes->getModalConfiguracionItemsPoa("modalActividadItem".$valor2,"Items de ".$informacionSeleccionada[$clave]['nombreActividades'],"itemsContents".$valor2,"agregarItems".$valor2,"verItemsActividades".$valor2,"tablaItemsAcModificaInsertas".$valor2,["Código","Item","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Total","Eliminar","Editar"],"contenedorItemsAc","contenedorItemsC".$valor2);?>

  <?php endforeach ?>

  <?=$componentes->getModalMatricez__editar__modificaciones("modalMatriz".$informacionSeleccionada[$clave]['idActividades'],"formMatriz".$informacionSeleccionada[$clave]['idActividades'],$informacionSeleccionada[$clave]['idActividades'].".-".$informacionSeleccionada[$clave]['nombreActividades'],"tablaHead".$informacionSeleccionada[$clave]['idActividades'],"cuerpoMatriz".$informacionSeleccionada[$clave]['idActividades']);?>

  


  
<?php endforeach ?>

<?=$componentes->get__contraloria__variables("contrataciones__variables");?>

<?=$componentes->get__contraloria__variables__2("contrataciones__variables__2");?>

<?=$componentes->get__contraloria__variables__3("contrataciones__variables__3");?>

<?=$componentes->getModalMeses("editarMesesItems","formMesesNece","Organismo",["input__1","select__tipoOrga"],["Correo","Tipo de organismo"],"editarOrganismoC");?>

<?=$componentes->get__eventos__ingresados__totales__modificaciones("modal__editarEventos");?>

<?=$componentes->get__editar__eventos__modales__totales("modalEventos__editados");?>

<?=$componentes->get__editar__eventos__modales__totales__montos("modalEventos__editados__3");?>

<?=$componentes->get__editar__eventos__modales__totales__montos__items__relacionados("modalEventos__editados__2");?>

<?=$componentes->get__desvinculaciones__compensacion("compensacionDModal");?>

<?=$componentes->get__desvinculaciones__despidoIntes("despidoInte");?>

<?=$componentes->get__desvinculaciones__renuncia__volun("reunciaVolunta");?>

<?=$componentes->get__desvinculaciones__vacacionesNoGozadas("vacacionesNoGozadas");?>

<?=$componentes->get__desvinculaciones__compensacion__editas("compensacionDModalEditar");?>



<!--====  End of Sección modales  ====-->


