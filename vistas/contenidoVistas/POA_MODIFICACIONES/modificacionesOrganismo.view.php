<?php $objetoInformacion= new usuarioAcciones();?>
<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();

$idOrganismoSession =$idOrganismoSession=$objetoInformacion->get__idOrganismo__sesiones();?> 



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

<?php $componentes= new componentes();?>

<body onload="origen_sueldo(3),destino_sueldo()"></body>

<div class="content-wrapper d d-flex flex-column align-items-center"> 

<input type="hidden" id="identificadorPaginaReal" name="identificadorPaginaReal" value="diferentes" />

<div class="col-md-12">


<div class="col col-12 text-center">
  <a href="estadoTramitesModificaciones" class="d d-flex justify-content-center" style="font-weight: bold;">USTED TIENE <?=$contadorModificaciones[0][contador]?> MODIFICACIONES INGRESADAS</a> 
</div> 

<div class="col col-12 text-center">
  <?=$componentes->getComponentes(1,"MODIFICACIÓN ORÍGEN")?> 
</div> 
  
<input type="hidden" id="actividad__modificaciones" name="actividad__modificaciones" />
<input type="hidden" id="actividad__modificaciones__destinos" name="actividad__modificaciones__destinos" />

<input type="hidden" id="identificadorPagina" name="identificadorPagina" value="1" />

<!--======================================
=            Inputs generados            =
=======================================-->

<input type="hidden" id="eneroOrigen" name="eneroOrigen" value="0"/>
<input type="hidden" id="febreroOrigen" name="febreroOrigen" value="0"/>
<input type="hidden" id="marzoOrigen" name="marzoOrigen" value="0"/>
<input type="hidden" id="abrilOrigen" name="abrilOrigen" value="0"/>
<input type="hidden" id="mayoOrigen" name="mayoOrigen" value="0"/>
<input type="hidden" id="junioOrigen" name="junioOrigen" value="0"/>
<input type="hidden" id="julioOrigen" name="julioOrigen" value="0"/>
<input type="hidden" id="agostoOrigen" name="agostoOrigen" value="0"/>
<input type="hidden" id="septiembreOrigen" name="septiembreOrigen" value="0"/>
<input type="hidden" id="octubreOrigen" name="octubreOrigen" value="0"/>
<input type="hidden" id="noviembreOrigen" name="noviembreOrigen" value="0"/>
<input type="hidden" id="diciembreOrigen" name="diciembreOrigen" value="0"/>
<input type="hidden" id="totalOrigen" name="totalOrigen" value="0"/>


<input type="hidden" id="eneroOrigen__restando" name="eneroOrigen__restando" value="0"/>
<input type="hidden" id="febreroOrigen__restando" name="febreroOrigen__restando" value="0"/>
<input type="hidden" id="marzoOrigen__restando" name="marzoOrigen__restando" value="0"/>
<input type="hidden" id="abrilOrigen__restando" name="abrilOrigen__restando" value="0"/>
<input type="hidden" id="mayoOrigen__restando" name="mayoOrigen__restando" value="0"/>
<input type="hidden" id="junioOrigen__restando" name="junioOrigen__restando" value="0"/>
<input type="hidden" id="julioOrigen__restando" name="julioOrigen__restando" value="0"/>
<input type="hidden" id="agostoOrigen__restando" name="agostoOrigen__restando" value="0"/>
<input type="hidden" id="septiembreOrigen__restando" name="septiembreOrigen__restando" value="0"/>
<input type="hidden" id="octubreOrigen__restando" name="octubreOrigen__restando" value="0"/>
<input type="hidden" id="noviembreOrigen__restando" name="noviembreOrigen__restando" value="0"/>
<input type="hidden" id="diciembreOrigen__restando" name="diciembreOrigen__restando" value="0"/>




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


<!--====  End of Inputs generados  ====-->


<section class='content row mt-1' style="width:100%; overflow-y: scroll;">

  <table class='col col-12 table__bordes__ejecutados mt-4'>

    <thead>

      <tr class=''>
        <th class='vertical__aign'><center>Actividad</center></th> 
        <th class='vertical__aign ocultar__fila__eventos texto__columna__eventos'><center>Eventos/ Infraestructura</center></th>
        <th class='vertical__aign'><center>Ítem</center></th>
        <th class='vertical__aign'><center>Código<br>item<br>presupuestario</center></th>
        <th class='vertical__aign'><center>Monto</center></th>
      </tr>

    </thead>

    <tbody>

      <tr>

        <td>
          <select id='actividad__modificaciones__destino__modificaciones2_o' class='ancho__total__input obligatorios origen__actividades__modificaciones'></select>
        </td>

        <td class="ocultar__fila__eventos">
          <select id='eventos_intervencion_o'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <select id='item__modificaciones__destino__modificaciones2_o'  class='ancho__total__input obligatorios'></select>
        </td>

        <td>
          <input id='codigo__presupuestarios__destino__new2_o' class='ancho__total__input obligatorios' readonly='' />
        </td>

        <td id='meses2_o'></td>

      </tr>

    </tbody>

  </table>

</section>


<div class="col col-12 text-center oculto__tabla__destino">
  <?=$componentes->getComponentes(1,"MODIFICACIÓN DESTINO");?> 
</div> 

<div id="origen"></div> 

<section class='content row mt-1 oculto__tabla__destino' style="width:100%; overflow-y: scroll;">

  <table class='col col-12 table__bordes__ejecutados mt-4' style="width:100%!important;">

    <thead>

      <tr class=''>

        <th class='vertical__aign' style="width:20%!important;"><center>Actividad</center></th> 
        <th class='vertical__aign ocultar__fila__eventos__dos texto__columna__eventos__dos oculto__desvinculacion__o' style="width:10%!important;"><center>Eventos/ Infraestructura</center></th>
        <th class='vertical__aign oculto__desvinculacion__o' style="width:10%!important;"><center>Ítem</center></th>
        <th class='vertical__aign oculto__desvinculacion__o' style="width:5%!important;"><center>Código item presupuestario</center></th>
         <th class='vertical__aign ocultar__fila__eventos__dos__intervenci texto__columna__eventos__dos oculto__desvinculacion__o' style="width:10%!important;"><center>Intervención</center></th>
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

         <td class="ocultar__fila__eventos__dos oculto__desvinculacion__o" align="center">

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

        <td class="oculto__desvinculacion__o">

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

        <td class="oculto__desvinculacion__o">
          <input id='codigo__presupuestarios__destino__new2__seleccion' class='ancho__total__input obligatorios' readonly='' />
        </td>

        <td class="ocultar__fila__eventos__dos__intervenci oculto__desvinculacion__o">
          <input id='tipoIntervencion' class='ancho__total__input obligatorios' readonly='' style="width: 100%!important;" />
        </td>

        <td id='meses2__seleccion' class="oculto__desvinculacion__o">


        </td>

        <td class="oculto__desvinculacion__o__mostrar">

          <table class='col col-12 table__bordes__ejecutados mt-4' style="width:100%!important;">

            <thead>

              <tr class=''>

                <th class='vertical__aign' style="width:30%!important;"><center>Desvinculación</center></th> 
                <th class='vertical__aign' style="width:30%!important;"><center>Mes</center></th>

              </tr>

            </thead>

            <tbody>

              <tr>

                <td>
                  <select id='desvinculacion__modificaciones' class='ancho__total__input obligatorios'>
                    <option value="0">--Seleccione una desvinculación--</option>
                    <option value="49">Compensación por Desahucio</option>
                    <option value="156">Despido Intempestivo</option>
                    <option value="94">Por Renuncia Voluntaria</option>
                    <option value="50">Compensación por Vacaciones no Gozadas por Cesación de Funciones</option>
                  </select>
                </td>

                <td>

                    <table class="col col-12">

                      <thead>

                        <tr>

                          <th align="center">Mes</th>
                          <th align="center">Monto</th>
                          <th align="center">Monto<br>+<br>Modificación</th>
                          <th align="center">Modificación</th>

                        </tr>

                      </thead>

                      <tbody>

                     <tr>

                        <td class="vertical__aign">
                          <center>Enero</center>
                        </td>

                        <td>
                            <input id="eneroDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="eneroDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="eneroDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Febrero</center>
                        </td>

                        <td>
                            <input id="febreroDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="febreroDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="febreroDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                      <tr>

                        <td class="vertical__aign">
                          <center>Marzo</center>
                        </td>


                        <td>
                            <input id="marzoDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>


                        <td>
                            <input id="marzoDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="marzoDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Abril</center>
                        </td>


                        <td>
                            <input id="abrilDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="abrilDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="abrilDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Mayo</center>
                        </td>

                        <td>
                            <input id="mayoDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="mayoDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="mayoDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Junio</center>
                        </td>


                        <td>
                            <input id="junioDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>


                        <td>
                            <input id="junioDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="junioDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                      <tr>

                        <td class="vertical__aign">
                          <center>Julio</center>
                        </td>

                        <td>
                            <input id="julioDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="julioDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="julioDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Agosto</center>
                        </td>

                        <td>
                            <input id="agostoDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="agostoDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="agostoDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Septiembre</center>
                        </td>

                        <td>
                            <input id="septiembreDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="septiembreDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="septiembreDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Octubre</center>
                        </td>

                        <td>
                            <input id="octubreDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="octubreDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="octubreDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Noviembre</center>
                        </td>

                        <td>
                            <input id="noviembreDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="noviembreDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled=""/>
                        </td>

                        <td>
                            <input id="noviembreDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Diciembre</center>
                        </td>

                        <td>
                            <input id="diciembreDesvinculacion__sumando__monto__inicial" class="ancho__total__input form-control" value="0" disabled="" />
                        </td>

                        <td>
                            <input id="diciembreDesvinculacion__sumando__modificado" class="ancho__total__input form-control" value="0" disabled="" />
                        </td>

                        <td>
                            <input id="diciembreDesvinculacion__sumando" class="ancho__total__input form-control enlazados__desvinculaciones" value="0"/>
                        </td>

                      </tr>

                     <tr>

                        <td class="vertical__aign">
                          <center>Total</center>
                        </td>

                        <td>
                            <input id="totalDesvinculacion__sumar__monto__inicial" class="ancho__total__input form-control" value="0"  disabled=""/>
                        </td>

                        <td></td>

                        <td>
                            <input id="totalDesvinculacion__sumar" class="ancho__total__input form-control" value="0" readonly="" />
                        </td>

                      </tr>

                      </tbody>

                    </table>

                </td>

              </tr>

            </tbody>

          </table>

        </td>


        <td>
          <textarea id='origen_justificacion' class='ancho__total__input obligatorios__finales ancho__total__textareas obligatorios__iniciales'></textarea>
        </td>

        <td>
          <input type="file" id="documento__justificacion"  />
        </td>

        <td>
         <button class="form-control btn btn-primary" id="guardarModificaciones__enviadas">Guardar</button>
        </td>

      </tr>

    </tbody>

  </table>

</section>

<div id="data"></div>
<div id="destino"></div>
<div id="origen"></div>

</div> 

<div id="mensaje"></div>


<div class="col-md-12 oculto___tabla__visual">

  <div class="row">

    <div class="col-md-12">
      <div id="origen_sueldo" class="mt-4"></div>
    </div>

    <div class="col-md-6">
      <div id="destino_sueldo" class="mt-4"></div>
    </div>  

  </div>   

</div>

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


