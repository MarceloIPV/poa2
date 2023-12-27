<?php $objetoInformacion= new usuarioAcciones();?>

<?php $componentes= new componentes();?>
<?php $componentes__modificaciones= new componentes__modificaciones();

$idOrganismoSession =$objetoInformacion->get__idOrganismo__sesiones();?> 



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

<div class="content-wrapper d d-flex flex-column align-items-center"> 

<div class="col col-12 text-center">
  <a href="estadoTramitesModificaciones" class="d d-flex justify-content-center" style="font-weight: bold;">USTED TIENE <?=$contadorModificaciones[0][contador]?> MODIFICACIONES INGRESADAS</a> 
</div> 

  
<input type="hidden" id="actividad__modificaciones" name="actividad__modificaciones" />
<input type="hidden" id="actividad__modificaciones__destinos" name="actividad__modificaciones__destinos" />

<input type="hidden" id="identificadorPagina" name="identificadorPagina" value="1" />

<input type="hidden" id="identificadorPaginaReal" name="identificadorPaginaReal" value="desvinculacion" />


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
            <select id="persona_sueldos_data" class="ancho__total__input obligatorios__2 form-control"></select>
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
                  <th align="center">Aporte</br>patronal</th>
                  <th align="center">Décimo</br>Tercero</th>
                  <th align="center">Décimo</br>Cuarto</th>
                  <th align="center">Fondos</br>de</br>reserva</th>
                  <th align="center">Salario</th>
                  <th align="center">Salario<br>+<br>Bonificación</th>

                </tr>

              </thead>

              <tbody>

             <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Enero (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>

              </tr>

             <tr>

                <td align="center">Enero (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Enero (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="enero__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__enero__origen" value="0"/>
                </td>

                <td style='font-weight:bold;'></td>

              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Febrero (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Febrero (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Febrero (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="febrero__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__febrero__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Marzo (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Marzo (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Marzo (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="marzo__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__marzo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>              

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Abril (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Abril (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Abril (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="abril__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__abril__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Mayo (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Mayo (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Mayo (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="mayo__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__mayo__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Junio (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Junio (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Junio (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="junio__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__junio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Julio (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Julio (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Julio (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="julio__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__julio__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Agosto (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Agosto (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Agosto (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="agosto__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__agosto__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Septiembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Septiembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Septiembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="septiembre__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__septiembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>


              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Octubre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Octubre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Octubre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="octubre__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__octubre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Noviembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>


              </tr>


             <tr>

                <td>Noviembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Noviembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="noviembre__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__noviembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

              <tr>

                <td class="vertical__aign" style='font-weight:bold;'>
                  <center>Diciembre (Monto inicial)</center>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal" class="ancho__total__input form-control origen__aporte__patronal__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero" class="ancho__total__input form-control origen__decimo__tercero__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto" class="ancho__total__input form-control origen__decimo__cuarto__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva" class="ancho__total__input form-control origen__fondos__de__reserva__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__salarios" class="ancho__total__input form-control origen__salarios__clase" readonly=""/>
                </td>


                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen" class="ancho__total__input obligatorios__2 form-control origen__clase" readonly=""/>
                </td>

              </tr>


             <tr>

                <td>Diciembre (Monto restante)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal__restante" class="ancho__total__input form-control origen__aporte__patronal__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero__restante" class="ancho__total__input form-control origen__decimo__tercero__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto__restante" class="ancho__total__input form-control origen__decimo__cuarto__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva__restante" class="ancho__total__input form-control origen__fondos__de__reserva__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__salarios__restante" class="ancho__total__input form-control origen__salarios__restante__clase" readonly=""/>
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__restante" class="ancho__total__input obligatorios__2 form-control origen__restante__clase" readonly=""/>
                </td>

              </tr>



             <tr>

                <td>Diciembre (Monto modificado)</td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__aporte__patronal__ingresar" class="ancho__total__input form-control solo__numero__montos origen__aporte__patronal__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__tercero__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__tercero__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__decimo__cuarto__ingresar" class="ancho__total__input form-control solo__numero__montos origen__decimo__cuarto__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__fondos__de__reserva__ingresar" class="ancho__total__input form-control solo__numero__montos origen__fondos__de__reserva__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'>
                  <input style="font-size:10px!important;" id="diciembre__origen__salarios__ingresar" class="ancho__total__input form-control solo__numero__montos origen__salarios__ingresar__clase enlace__diciembre__origen" value="0" />
                </td>

                <td style='font-weight:bold;'></td>


              </tr>

               <tr>

                <th></th>
                <th>Aporte patronal</th>
                <th>Décimo tercero</th>
                <th>Décimo cuarto</th>
                <th>Fondos de reserva</th>
                <th>Sueldo</th>
                <th>Total Modificación</th>

              </tr>

              <tr>

                <td class="vertical__aign" style="font-weight: bold;">
                  <center>Total Modificación</center>
                </td>

                <td>
                  <input style="font-size:10px!important;" id="total__origen__patronal__totales__ingresados" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0" />
                </td>
                <td>
                  <input style="font-size:10px!important;" id="total__origen__decimo__tercero__totales__ingresados" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
                <td>
                  <input style="font-size:10px!important;" id="total__origen__decimo__cuarto__totales__ingresados" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
                <td>
                   <input style="font-size:10px!important;" id="total__origen__fondos__de__reserva__totales__ingresados" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>
                <td>
                   <input style="font-size:10px!important;" id="total__origen__salarios__totales__ingresados" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                </td>

                <td>
                  <div style="display:flex; flex-direction: column;">
                    <input style="font-size:10px!important;" id="totalOrigen" class="ancho__total__input obligatorios__2 form-control" readonly="" value="0"/>
                    <button type="button" id="calcularTotales" name="calcularTotales" class="btn btn-primary">Calcular</button>
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

<div class="col col-12 text-center oculto__tabla__destino__salarios">
  <?=$componentes->getComponentes(1,"MODIFICACIÓN DESTINO");?> 
</div> 

<div id="origen"></div> 

<section class='content row mt-1 oculto__tabla__destino__salarios' style="width:100%; overflow-y: scroll;">

  <table class='col col-12 table__bordes__ejecutados mt-4' style="width:100%!important;">

    <thead>

      <tr class=''>

        <th class='vertical__aign' style="width:30%!important;"><center>Desvinculación</center></th> 
        <th class='vertical__aign' style="width:30%!important;"><center>Mes</center></th>
        <th class='vertical__aign'style="width:25%!important;"><center>Justificación</center></th>
        <th class='vertical__aign' style="width:10%!important;"><center>Documento Justificación</center></th>
        <th class='vertical__aign' style="width:5%!important;"><center>Acción</center></th>

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


