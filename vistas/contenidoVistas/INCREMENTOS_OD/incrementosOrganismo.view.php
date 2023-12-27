<style>
  #botonFlotanteIncremento {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007BFF;
    color: #fff;
    font-size: larger;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    pointer-events: none;
    z-index: 3;
  }
</style>

<?php $objetoInformacion = new usuarioAcciones(); ?>
<?php $componentes = new componentes(); ?>
<?php $componentes__modificaciones = new componentes__modificaciones();


$idOrganismoSession = $objetoInformacion->get__idOrganismo__sesiones(); ?>

<?php $componentes__indicadores = new componentes__incrementos__v1(); ?>


<?php $informacionObjeto = $objetoInformacion->getInformacionCompletaOrganismoDeportivo(); ?>

<?php $idOrganismo = $informacionObjeto[0][idOrganismo] ?>

<?php $anioActual = date('Y'); ?>

<?php $aniosPeriodos__ingesos = $objetoInformacion->get__obtener__Selector__anios(); ?>

<?php $informacionSeleccionada = $objetoInformacion->getObtenerInformacionGeneral("SELECT idActividades,nombreActividades FROM poa_actividades;"); ?>

<?php $estadoEdicion = $objetoInformacion->getObtenerInformacionGeneral("SELECT a.idObservacion FROM poa_incrementos_observaciones AS a INNER JOIN poa_incrementos_tramites AS b ON a.idTramite = b.idTramiteIncremento WHERE b.idOrganismo ='$idOrganismo' AND b.perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $actividadesSeleccionadas = $objetoInformacion->getObtenerInformacionGeneral("SELECT idActividad FROM poa_poainicial WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idActividad LIMIT 1;"); ?>

<?php $inversionOrganismo = $objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos' ORDER BY b.idInversion DESC LIMIT 1;"); ?>

<?php $inversionOrganismoQueda = $objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;"); ?>

<?php $inversionRestante = $objetoInformacion->getRestar($inversionOrganismo[0][nombreInversion], $inversionOrganismoQueda[0][sumaItemTotal]); ?>


<?php $inversionRestanteDecremento = $objetoInformacion->getRestar($inversionOrganismoQueda[0][sumaItemTotal], $inversionOrganismo[0][nombreInversion]); ?>

<?php $poaPreEn = $objetoInformacion->getObtenerInformacionGeneral("SELECT activo FROM poa_preliminar_envio WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND activo='A' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $observacionOrganismo = $objetoInformacion->getObtenerInformacionGeneral("SELECT estado FROM poa_conclusion_observacion WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND estado='A' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $estadoFinal = $objetoInformacion->getObtenerInformacionGeneral("SELECT idOrganismo FROM poa_documentofinal WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $contadorModificaciones = $objetoInformacion->getObtenerInformacionGeneral("SELECT count(idOrganismo) AS contador FROM poa_modificaciones_origen_destino WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND periodoIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;"); ?>

<?php $inversionRestante = $objetoInformacion->getRestar($inversionOrganismo[0][nombreInversion], $inversionOrganismoQueda[0][sumaItemTotal]); ?>


<?php $inversionOrganismoQueda = $objetoInformacion->getObtenerInformacionGeneral("SELECT SUM(totalSumaItem) AS sumaItemTotal FROM poa_programacion_financiera WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' GROUP BY idOrganismo;"); ?>

<?php $EstadoIncrementos = $objetoInformacion->getObtenerInformacionGeneral("SELECT a1.incrementoDecremento  FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo='$idOrganismoSession' AND a1.perioIngreso='$aniosPeriodos__ingesos' ORDER BY a2.idInversion DESC LIMIT 1;");
?>


<?php $montoIncrementoAsignado = $inversionIncremento[0][totalInversion] - $inversionRestante ?>

<?php $montoDecrementoAsignado = $inversionIncremento[0][totalInversion] - $inversionRestanteDecremento ?>

<?php
if ($EstadoIncrementos[0][incrementoDecremento] == "incremento") {
  $signo = "+";
  $tipoTramite = "Incremento";
} else if ($EstadoIncrementos[0][incrementoDecremento] == "decremento") {
  $signo = "-";
  $tipoTramite = "Decremento";
}
?>

<?php
// Valor del Poa Aprobado antes de cualquier incremento/decremento
$poaAprobado = $objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='$idOrganismo' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.estado='I' ORDER BY b.idInversion DESC LIMIT 1")
?>

<?php
// Monto total incremento/Decremento
$inversionIncremento = $objetoInformacion->getObtenerInformacionGeneral("SELECT a2.totalInversion FROM poa_inversion_usuario AS a1 INNER JOIN poa_inversion AS a2 ON a1.idInversion=a2.idInversion WHERE a1.idOrganismo='$idOrganismo' AND a1.perioIngreso='$aniosPeriodos__ingesos' AND a2.estado='A' ORDER BY a2.idInversion DESC LIMIT 1;");
?>

<?php
//Monto del Poa +- Incremento/Decremento
$poaActualIncremento = $objetoInformacion->getObtenerInformacionGeneral("SELECT b.nombreInversion FROM poa_inversion_usuario AS a INNER JOIN poa_inversion AS b ON a.idInversion=b.idInversion WHERE a.idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND a.perioIngreso='$aniosPeriodos__ingesos' AND b.estado='A' ORDER BY b.idInversion DESC LIMIT 1;"); ?>
<?php
//Monto del Incremento/Decremento ya asignado para las actividades
$totalIncrementoEjecutado = $objetoInformacion->getObtenerInformacionGeneral("SELECT IFNULL(SUM(totalIncrementoEje),0) AS totalEjecutado FROM poa_incrementos_tramites WHERE idOrganismo='$idOrganismo' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>


<?php
function RestaValoresAsignados($valor1, $valor2)
{
  $valorResta = 0;

  $valorResta = round(floatval($valor1) - floatval($valor2), 2);

  return $valorResta;
}

$valorIncrementoSinEjecutar = RestaValoresAsignados($inversionIncremento[0][totalInversion], $totalIncrementoEjecutado[0][totalEjecutado]);

?>

<?php
//Verifica si existe un registro en la tabla de poa_incrementos_ingreso
$compartativos = $objetoInformacion->getObtenerInformacionGeneral("SELECT idIncrementos FROM poa_incrementos_ingreso WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>
<?php
$compartativosI = $objetoInformacion->getObtenerInformacionGeneral("SELECT idPoaIncremento FROM poa_incrementos_preliminar_envio WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos';"); ?>

<?php $componentes = new componentes(); ?>

<?php

//Verificar numero de ingresos de trámites de incrementos
$numeroTramites = $objetoInformacion->getObtenerInformacionGeneral("SELECT COUNT(idTramiteIncremento) AS contador FROM poa_incrementos_tramites WHERE idOrganismo='" . $informacionObjeto[0][idOrganismo] . "' AND perioIngreso='$aniosPeriodos__ingesos' AND estado IN ('G','E');"); ?>

<div class="content-wrapper d d-flex flex-column align-items-center">

  <input type="hidden" id="identificadorPaginaReal" name="identificadorPaginaReal" value="diferente" />

  <div class="col-md-12">

    <div class="col col-12 text-center">

      <div clas='row text-center d d-flex justify-content-center'>

        <div class='col col-12 text-center mt-2 titulo__enfasis' style='font-size: large;'>

          ASIGNACIÓN MONTOS <?= strtoupper($EstadoIncrementos[0][incrementoDecremento]) ?>
        </div>

      </div>

    </div>

    <br>
    <div class="container">
      <div class="row justify-content-center" style="font-size: 1.20em;">
        <div class="col-md-3 text-center">
          <label>Monto POA Aprobado:</label>
          <center><input type="text" readonly style="text-align: center;" value="<?= number_format((float)$poaAprobado[0][nombreInversion], 2, '.', ',') ?>" class="form-control" /></center>
        </div>
        <div class="col-md-1 d-flex align-items-end justify-content-center">
          <span class="form-control-static text-center" style="font-size: 1.20em; font-weight: bold;"><?= $signo ?></span>
        </div>
        <div class="col-md-3 text-center">
          <label><?= $tipoTramite ?>:</label>
          <center><input type="text" readonly style="text-align: center;" value="<?= number_format((float)$inversionIncremento[0][totalInversion], 2, '.', ',') ?>" class="form-control" /></center>
        </div>
        <div class="col-md-1 d-flex align-items-end justify-content-center">
          <span class="form-control-static text-center" style="font-size: 1.20em; font-weight: bold;">=</span>
        </div>
        <div class="col-md-3 text-center">
          <label>Monto POA Aprobado <?= $signo . " " . $tipoTramite; ?></label>
          <center><input type="text" readonly style="text-align: center;" value="<?= number_format((float)$poaActualIncremento[0][nombreInversion], 2, '.', ',') ?>" class="form-control" /></center>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col col-6 text-center" style="font-size: 1.20em;">
        <?php if ($EstadoIncrementos[0][incrementoDecremento] == "incremento") { ?>
          <label>Monto Por Asignar:</label>
          <center><input type="text" readonly style="text-align: center; width: 20%;" value="<?= number_format((float)$valorIncrementoSinEjecutar, 2, '.', '') ?>" id="MontoPorAsignar__Incremento" class="form-control" /></center>
        <?php } else { ?>
          <label>Monto Por Asignar:</label>
          <center><input type="text" readonly style="text-align: center; width: 20%;" value="<?= number_format((float)$valorIncrementoSinEjecutar, 2, '.', '') ?>" id="MontoPorAsignar__Incremento" class="form-control" /></center>
        <?php } ?>

      </div>
      <div class="col col-6 text-center" style="font-size: 1.20em;">

        <?php if ($EstadoIncrementos[0][incrementoDecremento] == "incremento") { ?>
          <label>Monto Asignado <?= $tipoTramite ?>:</label>
          <center><input type="text" readonly style="text-align: center; width: 20%;" value="<?= number_format((float)$totalIncrementoEjecutado[0][totalEjecutado], 2, '.', ',') ?>" class="form-control" /></center>
        <?php } else { ?>
          <label>Monto Asignado <?= $tipoTramite ?>:</label>
          <center><input type="text" readonly style="text-align: center; width: 20%;" value="<?= number_format((float)$totalIncrementoEjecutado[0][totalEjecutado], 2, '.', ',') ?>" class="form-control" /></center>
        <?php } ?>

      </div>
    </div>




    <input type="hidden" id="actividad__modificaciones" name="actividad__modificaciones" />
    <input type="hidden" id="actividad__modificaciones__destinos" name="actividad__modificaciones__destinos" />

    <input type="hidden" id="identificadorPagina" name="identificadorPagina" value="1" />

    <input type="hidden" id="idActividad_Env" name="idActividad_Env" />

    <input type="hidden" id="idProgramacion_Guardar_Incremento" name="idProgramacion_Guardar_Incremento" />

    <input type="hidden" id="tipoTramite" name="tipoTramite" value="<?= $EstadoIncrementos[0][incrementoDecremento] ?>" />

    <input type="hidden" id="tipoTramiteF" name="tipoTramiteF" value="<?= $tipoTramite ?>" />

    <button id="botonFlotanteIncremento"></button>

    <!--======================================
=            Inputs generados            =
=======================================-->

    <input type="hidden" id="eneroOrigen" name="eneroOrigen" value="0" />
    <input type="hidden" id="febreroOrigen" name="febreroOrigen" value="0" />
    <input type="hidden" id="marzoOrigen" name="marzoOrigen" value="0" />
    <input type="hidden" id="abrilOrigen" name="abrilOrigen" value="0" />
    <input type="hidden" id="mayoOrigen" name="mayoOrigen" value="0" />
    <input type="hidden" id="junioOrigen" name="junioOrigen" value="0" />
    <input type="hidden" id="julioOrigen" name="julioOrigen" value="0" />
    <input type="hidden" id="agostoOrigen" name="agostoOrigen" value="0" />
    <input type="hidden" id="septiembreOrigen" name="septiembreOrigen" value="0" />
    <input type="hidden" id="octubreOrigen" name="octubreOrigen" value="0" />
    <input type="hidden" id="noviembreOrigen" name="noviembreOrigen" value="0" />
    <input type="hidden" id="diciembreOrigen" name="diciembreOrigen" value="0" />
    <input type="hidden" id="totalOrigen" name="totalOrigen" value="0" />


    <input type="hidden" id="eneroOrigen__restando" name="eneroOrigen__restando" value="0" />
    <input type="hidden" id="febreroOrigen__restando" name="febreroOrigen__restando" value="0" />
    <input type="hidden" id="marzoOrigen__restando" name="marzoOrigen__restando" value="0" />
    <input type="hidden" id="abrilOrigen__restando" name="abrilOrigen__restando" value="0" />
    <input type="hidden" id="mayoOrigen__restando" name="mayoOrigen__restando" value="0" />
    <input type="hidden" id="junioOrigen__restando" name="junioOrigen__restando" value="0" />
    <input type="hidden" id="julioOrigen__restando" name="julioOrigen__restando" value="0" />
    <input type="hidden" id="agostoOrigen__restando" name="agostoOrigen__restando" value="0" />
    <input type="hidden" id="septiembreOrigen__restando" name="septiembreOrigen__restando" value="0" />
    <input type="hidden" id="octubreOrigen__restando" name="octubreOrigen__restando" value="0" />
    <input type="hidden" id="noviembreOrigen__restando" name="noviembreOrigen__restando" value="0" />
    <input type="hidden" id="diciembreOrigen__restando" name="diciembreOrigen__restando" value="0" />




    <input type="hidden" id="eneroDestino" name="eneroDestino" value="0" />
    <input type="hidden" id="febreroDestino" name="febreroDestino" value="0" />
    <input type="hidden" id="marzoDestino" name="marzoDestino" value="0" />
    <input type="hidden" id="abrilDestino" name="abrilDestino" value="0" />
    <input type="hidden" id="mayoDestino" name="mayoDestino" value="0" />
    <input type="hidden" id="junioDestino" name="junioDestino" value="0" />
    <input type="hidden" id="julioDestino" name="julioDestino" value="0" />
    <input type="hidden" id="agostoDestino" name="agostoDestino" value="0" />
    <input type="hidden" id="septiembreDestino" name="septiembreDestino" value="0" />
    <input type="hidden" id="octubreDestino" name="octubreDestino" value="0" />
    <input type="hidden" id="noviembreDestino" name="noviembreDestino" value="0" />
    <input type="hidden" id="diciembreDestino" name="diciembreDestino" value="0" />
    <input type="hidden" id="totalDestino" name="totalDestino" value="" />


    <input type="hidden" id="eneroDestino__sumando" name="eneroDestino__sumando" value="0" />
    <input type="hidden" id="febreroDestino__sumando" name="febreroDestino__sumando" value="0" />
    <input type="hidden" id="marzoDestino__sumando" name="marzoDestino__sumando" value="0" />
    <input type="hidden" id="abrilDestino__sumando" name="abrilDestino__sumando" value="0" />
    <input type="hidden" id="mayoDestino__sumando" name="mayoDestino__sumando" value="0" />
    <input type="hidden" id="junioDestino__sumando" name="junioDestino__sumando" value="0" />
    <input type="hidden" id="julioDestino__sumando" name="julioDestino__sumando" value="0" />
    <input type="hidden" id="agostoDestino__sumando" name="agostoDestino__sumando" value="0" />
    <input type="hidden" id="septiembreDestino__sumando" name="septiembreDestino__sumando" value="0" />
    <input type="hidden" id="octubreDestino__sumando" name="octubreDestino__sumando" value="0" />
    <input type="hidden" id="noviembreDestino__sumando" name="noviembreDestino__sumando" value="0" />
    <input type="hidden" id="diciembreDestino__sumando" name="diciembreDestino__sumando" value="0" />

    <input type="hidden" name="idOrganismo_S" id="idOrganismo_S" value="<?= $idOrganismo ?>">

    <input type="hidden" name="idTramite_I" id="idTramite_I" />

    <input type="hidden" name="estadoEnvioTramites" id="estadoEnvioTramites" value="<?= $compartativos[0][idIncrementos] ?>" />

    <input type="hidden" name="estadoEnvioTramitesI" id="estadoEnvioTramitesI" value="<?= $compartativosI[0][idPoaIncremento] ?>" />

    <input type="hidden" name="estadoEdicionObservacion" id="estadoEdicionObservacion" value="<?= $estadoEdicion[0][idObservacion] ?>" />

    <input type="hidden" name="actividad__modificaciones__destino__modificaciones2__seleccion" id="actividad__modificaciones__destino__modificaciones2__seleccion" />
    <!--====  End of Inputs generados  ====-->


    <div class="content row mt-1">
      <section class="content row mt-1">

        <div class="col col-12" id="contenedorObservaciones" name="contenedorObservaciones"></div>

        <div class="col col-12" id="contenedorObservacionesTabla" name="contenedorObservacionesTabla"></div>

        <table class='col col-12 table__bordes__ejecutados mt-4'>

          <thead>

            <tr class=''>
              <th class='vertical__aign' style="width: 40%!important;">
                <center>Actividad</center>
              </th>
              <th class='vertical__aign' id="fila_eventos_od" style="width: 10%!important; display: none;">
                <center>Eventos/ Intervención</center>
              </th>
              <th class='vertical__aign' id="fila_infraestructura_od" style="width: 10%!important; display: none;">
                <center>Infraestructura</center>
              </th>
              <th class='vertical__aign' id="fila_sueldos_od" style="width: 40%!important; display: none;">
                <center>Sueldos</center>
              </th>
              <th class='vertical__aign' id="fila_honorarios_od" style="width: 40%!important; display: none;">
                <center>Honorarios</center>
              </th>
              <th class='vertical__aign' id="fila_desvinculación_od" style="width: 40%!important; display: none;">
                <center>Desvinculación</center>
              </th>
              <th class='vertical__aign' id="fila_item_od" style="width: 20%!important;">
                <center>Ítem</center>
              </th>
              <th class='vertical__aign' id="fila_presupuestario" style="width: 10%!important;">
                <center>Código<br>item<br>presupuestario</center>
              </th>
              <th class='vertical__aign' style="width: 30%!important;">
                <center>Justificación</center>
              </th>
              <th class='vertical__aign' style="width: 5%!important;">
                <center>Documento Justificación</center>
              </th>
              <th class='vertical__aign' style="width: 5%!important;">
                <center>Acción</center>
              </th>
            </tr>

          </thead>

          <tbody>

            <tr>

              <td id="actividades_od_c">
                <select id='actividades__incremento__od' class='ancho__total__input obligatorios form-select'></select>

                <div id="contedorProyectoInfra" name="contedorProyectoInfra"></div>
              </td>

              <td style="display: none;" id='eventos_intervencion_od_c'>
                <select id='eventos_intervencion_od' class='ancho__total__input obligatorios form-select'></select>

                <form class="" style="display: block !important;">

                  <input type="hidden" id="actividad__determinantes" name="actividad__determinantes">

                  <input type="hidden" id="planificados__ocultos" name="planificados__ocultos">

                  <input type="hidden" id="actividadGeneral__id" name="actividadGeneral__id" />

                  <input type="hidden" id="estadoFinal" name="estadoFinal" value="<?= $estadoFinal[0][idOrganismo] ?>">

                  <input type="hidden" id="poaActividad" name="poaActividad" value="<?= $actividadesSeleccionadas[0][idActividad] ?>">

                  <input type="hidden" id="observacionOr" name="observacionOr" value="<?= $observacionOrganismo[0][estado] ?>">

                  <input type="hidden" id="envioPreliminar" name="envioPreliminar" value="<?= $poaPreEn[0][activo] ?>">

                  <input type="hidden" id="montoAsginadoFe" name="montoAsginadoFe" value="<?= number_format((float)$inversionOrganismo[0][nombreInversion], 2, '.', '') ?>">

                  <input type="hidden" id="montoDisponible" name="montoDisponible" value="<?= number_format((float)$inversionOrganismoQueda[0][sumaItemTotal], 2, '.', '') ?>">


                  <input type="hidden" id="nombreEventoNormal" name="nombreEventoNormal">


                  <!--==================================
            =            Sección poas            =
            ===================================-->

                  <input type='hidden' id='despejar__montoP' name='despejar__montoP' value='<?= $inversionRestante ?>'>

                  <table style="width:100%!important;" id="tablaPoaInicial" class="col col-12 mt-4 cell-border table table-dark table-striped">
                    <thead>
                    </thead>
                    <tbody class="body__actividadesEs__modificaciones__insertar"> </tbody>
                  </table>

                  <!--====  End of Sección poas  ====-->

                </form>


              </td>

              <td style="display: none;" id='infraestructura_od_c'>
                <select id='infraestructura_od' class='ancho__total__input obligatorios form-select'></select>
              </td>
              <td style="display: none;" id='sueldos_od_c'>
                <select id='sueldos_od' class='ancho__total__input obligatorios form-select'></select>
              </td>
              <td style="display: none;" id='honorarios_od_c'>
                <select id='honorarios_od' class='ancho__total__input obligatorios form-select'></select>

                <table style="width:100%!important;" id="tablaPoaHonorarios" class="col col-12 mt-4 cell-border table table-dark table-striped">
                  <thead>
                  </thead>
                  <tbody class="body__actividadesEs__incrementos__honorarios"> </tbody>
                </table>

              </td>
              <td style="display: none;" id='desvinculacion_od_c'>
                <select id='desvinculacion_od' class='ancho__total__input obligatorios form-select'></select>
              </td>
              <td id="items_od_c">
                <select id='items__incrementos__od' class='ancho__total__input obligatorios form-select'></select>
              </td>

              <td id="codigo_presupuestario_od_c">
                <input id='codigo__presupuestarios__incrementos' class='ancho__total__input obligatorios text-center' readonly='' />
              </td>

              <td>
                <textarea id="incrementos_justificacion" class="ancho__total__input obligatorios__finales ancho__total__textareas obligatorios__iniciales form-floating"></textarea>
              </td>
              <td id='meses_incrementos'>
                <input type="file" id="documento__justificacion__incremento">
              </td>
              <td id='meses_incrementos'>
                <button class="form-control btn btn-primary" id="guardarIncrementos__OD__">Guardar</button>
              </td>

            </tr>

          </tbody>

        </table>

      </section>

      <section class="content row d d-flex justify-content-center" id="sectionTablaIncrementos" style="display: none;">
        <div>
          <div class="row">
            <div class="col-md-2" id="sueldosCampos">

            </div>
            <div class="col-md-10" id="contenedorTablaSueldos">
              <table style="display: none;" id="tablaSueldos__">
                <thead>
                  <tr>
                    <th>Mes</th>
                    <th>Aporte patronal</th>
                    <th>Décimo Tercero</th>
                    <th>Décimo Cuarto</th>
                    <th>Fondos<br>de<br>reserva</th>
                    <th>Salario</th>
                    <th>Salario<br>+<br>Bonificaciones</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <table class='col col-4 table__bordes__ejecutados mt-4' id="valores__Incrementos__Meses" style="display: none;">
          <thead>
            <tr>
              <th class='vertical__aign'>Mes</th>
              <th class='vertical__aign'>Monto</th>
              <th class='vertical__aign'>Monto <?= $signo ?> <?= $tipoTramite ?></th>
              <th class='vertical__aign'><?= $tipoTramite ?></th>
            </tr>
          </thead>
          <tbody>

          </tbody>

          <section id="valores__Incrementos__Meses__script"></section>
      </section>

      <section class="content row mt-1">

          <div class="col col-12 text-center" style="font-size:larger; font-weight: bold;"><?= strtoupper($EstadoIncrementos[0][incrementoDecremento]."s")?> INGRESADOS</div>
          <div class="col col-12 text-center mt-3" style="font-size:larger">TIENE INGRESADOS <?= $numeroTramites[0][contador]." ". strtoupper($EstadoIncrementos[0][incrementoDecremento]."s")?></div>

        <div class="row">

          <table id='incrementos_Tramites_Guardados__OD' class="col col-12 cell-border">
            <thead>
              <tr>
                <th align='center' rowspan='2'>Actividad</th>
                <th align='center' rowspan='2'>Evento</th>
                <th align='center' rowspan='2'>Infraestructura</th>
                <th align='center' rowspan='2'>Item</th>
                <th align='center' rowspan='2'>Trámite</th>
                <th align='center' rowspan='2'>Meses de Cambio</th>
                <th align='center' rowspan='2'>Monto<br>Incremento<br>por<br>Actividad</th>
                <th align='center' rowspan='2'>Justificacion</th>
                <th align='center' rowspan='2'>Documento</th>
                <th align='center' rowspan='2'>Estado</th>
                <th align='center' colspan='2' rowspan='1'>POA</th>
                <th align='center' rowspan='2'>Acciones</th>
              </tr>
              <tr>
                <th align='center'>Aprobado</th>
                <th align='center'>Incremento</th>
              </tr>
            </thead>
          </table>

        </div>

      </section>

      <div class="col col-12 text-center mt-4" style="padding-bottom: 2%;">
        <button class="btn btn-primary" id="enviarFinalTramiteIncremento" disabled="disabled"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Enviar Solicitud</button>
      </div>
    </div>


    <div id="origen"></div>



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

<?php foreach ($informacionSeleccionada as $clave => $valor) : ?>

  <?php foreach ($valor as $clave2 => $valor2) : ?>

    <?= $componentes->getModalAtributos("modalActividad" . $valor2, "formModalActividades" . $valor2, $informacionSeleccionada[$clave]['idActividades'] . ".-" . $informacionSeleccionada[$clave]['nombreActividades'], "insertar" . $informacionSeleccionada[$clave]['idActividades'], ["PLANIFICACIÓN DE INDICADORES", "I Trimestre", "II Trimestre", "III Trimestre", "IV Trimestre", "Meta Anual del indicador"], ["planificacionIndicadores", "primerTrimestre" . $valor2, "segundoTrimestre" . $valor2, "tercerTrimestre" . $valor2, "cuartoTrimestre" . $valor2, "metaAnualIndicador" . $valor2, "botonItems" . $valor2], ["textos", "input", "input", "input", "input", "input", "boton"], ["textos", "numero", "numero", "numero", "numero", "disabled", "boton"], "<i class='fas fa-save'></i>&nbsp;&nbsp;GUARDAR"); ?>




  <?php endforeach ?>

  <?= $componentes->getModalMatricez__editar__modificaciones("modalMatriz" . $informacionSeleccionada[$clave]['idActividades'], "formMatriz" . $informacionSeleccionada[$clave]['idActividades'], $informacionSeleccionada[$clave]['idActividades'] . ".-" . $informacionSeleccionada[$clave]['nombreActividades'], "tablaHead" . $informacionSeleccionada[$clave]['idActividades'], "cuerpoMatriz" . $informacionSeleccionada[$clave]['idActividades']); ?>





<?php endforeach ?>

<?= $componentes->get__contraloria__variables("contrataciones__variables"); ?>

<?= $componentes->get__contraloria__variables__2("contrataciones__variables__2"); ?>

<?= $componentes->get__contraloria__variables__3("contrataciones__variables__3"); ?>

<?= $componentes->getModalMeses("editarMesesItems", "formMesesNece", "Organismo", ["input__1", "select__tipoOrga"], ["Correo", "Tipo de organismo"], "editarOrganismoC"); ?>

<?= $componentes->get__eventos__ingresados__totales__modificaciones("modal__editarEventos"); ?>

<?= $componentes->get__editar__eventos__modales__totales("modalEventos__editados"); ?>

<?= $componentes->get__editar__eventos__modales__totales__montos("modalEventos__editados__3"); ?>

<?= $componentes->get__editar__eventos__modales__totales__montos__items__relacionados("modalEventos__editados__2"); ?>


<?= $componentes__indicadores->getModalMeses_Tramites("modalVerValoresMeses", "$tipoTramite", "poa__incrementos", ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Total"], 80); ?>

<?= $componentes__indicadores->modal_Instalaciones_Deportivas("modalInstalacionesProyecto", 3) ?>

<?= $componentes__indicadores->modal_valores_Incremento("modalMatrizIncremento")?>

<!--====  End of Sección modales  ====-->

<script type="text/javascript" src="layout/scripts/js/incrementosDecrementos/index.js?v=1.0.3"></script>