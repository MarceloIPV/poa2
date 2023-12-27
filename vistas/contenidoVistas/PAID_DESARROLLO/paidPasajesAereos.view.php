<?php $componentes = new componentes();
$componentesPaid = new componentesPaid();

session_start();


$tipoProyecto = 1;

$aniosPeriodos__ingesos = $_SESSION["selectorAniosA"];

$idOrganismoSession = $_SESSION["idOrganismoSession"];

$json_variable = json_encode($aniosPeriodos__ingesos, JSON_HEX_TAG);


$objeto = new usuarioAcciones(); ?>

<input type="hidden" style="width:10%" id="JuegosNacionalesIDAsignacion" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDComponentes" name="JuegosNacionalesIDComponentes">
<input type="hidden" style="width:10%" id="JuegosNacionalesIDRubro" name="JuegosNacionales">
<input type="hidden" id="identificador" name="identificador" value="1">


<div class="content-wrapper">
    <input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
    <input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">
    <section class="content row d d-flex justify-content-center">
        <h3 id='tituloComponenteJN' align='center'></h3>
        <h3 id='tituloJN' align='center'></h3>

        <div class="row">
            <div class="container-fluid pt-2 px-2">
                <div class="row g-2">
                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <h4 class="mb-0">Monto Rubro:</h4>
                            <div class="ms-3">
                                <h4 id='MontoJN' class="mb-0"></h4>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <h4 class="mb-0">Monto Planificado:</h4>
                            <div class="ms-3">
                                <h4 id='MontoAsignadoJN' class="mb-0 restar__montos"></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <h4 class="mb-0">Monto Por Planificar:</h4>
                            <div class="ms-3">
                                <h4 id='MontoPorAsignarJN' class="mb-0"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-2 px-2 ">
                <div class="row g-2 justify-content-center align-items-center">
                    <div class="col-sm-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="d-flex align-items-center"><i class="fas fa-user" style="color: #057f46;"></i>
                                <div class="ms-3">
                                    <p class="mb-0">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Número de Deportistas<font id="numDeportistasPasajesAereos"></font>
                                            </font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="d-flex align-items-center"><i class="fas fa-user" style="color: #057f46;"></i>
                                <div class="ms-3">
                                    <p class="mb-0">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Número de Entrenadores<font id="numEntrenadoresPasajesAereos"></font>
                                            </font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="d-flex align-items-center"><i class="fas fa-users" style="color: #057f46;"></i>
                                <div class="ms-3">
                                    <p class="mb-0">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Total Personas<font id="numTotalPersonasPasajesAereos"></font>
                                            </font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                                <div class="ms-3">
                                    <p class="mb-0">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Valor Total<font id="TotalPasajaesAereos"></font>
                                            </font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">

                    </div>
                    <div class="col-md-2">
                        <button id="btnNuevoPasajesAereos" type="button" class="btn btn-success rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#modalNuevoJN"> Nuevo <i class="fal fa-plus-circle"></i> </button>
                    </div>
                </div>
            </div>


            <table id="paidPasajesAereos">

                <thead>
                    <tr align="center">
                        <th COLSPAN=1>
                            <center>Nro</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Item</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Deporte</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Pasajes</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Nro de Deportistas</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Nro de Entrenadores</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Total Personas</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Nro de Días</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Total</center>
                        </th>
                        <th COLSPAN=1>
                            <center>Evento</center>
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>

            </table>

        </div>

    </section>

</div>



<!-- Small modal -->
<div class='modal fade modal__ItemsGrup' id='modalNuevoJN' aria-hidden='true' data-backdrop='static' data-keyboard='false' tabindex='-1'>

    <div class="modal-dialog modal-lg">

        <form class='modal-content' id='$parametro2'>

            <div class='modal-header row'>

                <div class='col' style='z-index: 1;'>
                    <h5 class='modal-title' id='    '>Pasajes Aereos<br><span class='asignado__titulos'></span></h5>
                </div>

                <div class='col col-1' style='z-index: 2;'>
                    <button type='button' id='btnCerrarPasajesAereos' class='btn-close modales_reload pointer_botones' data-bs-dismiss='modal' aria-label='Close'><i class='far fa-times-circle'></i></button>
                </div>

            </div>



            <div id=' ' class='modal-body row'>

                <div class="row">
                    <div class='col-sm-12'>
                        <div class='col-sm-12'>
                            <label>Item</label>
                        </div>
                        <div class='col-sm-12'>
                            <input id='itemPasajesAereos' type='text' readonly required class='form-control' value='(530302) - Pasajes al Exterior' idItem='215'>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label>Deporte</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" id="idSelectDeportePasajesAereos" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label>Pasajes</label>
                        </div>
                        <div class="col-md-12">
                            <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                    <span class='input-group-text'>$</span>
                                </div>
                                <input id="pasajesAereos" type="text" required class="form-control suma_montos_pasajes_aereos solo__numero__montos" placeholder='0.00'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <label>Nro de Deportistas
                        </div>
                        <div class="col-md-12">
                            <input id="nDeportistasPasajesAereos" type="text" required class="form-control sumador__entrenadores__deportistas__pasajes__aereos" placeholder='00' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <label>Nro de Entrenadores</label>
                        </div>
                        <div class="col-md-12">
                            <input id="nEntrenadoresPasajesAereos" type="text" required class="form-control sumador__entrenadores__deportistas__pasajes__aereos" placeholder='00' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <label>Total Personas</label>
                        </div>
                        <div class="col-md-12">
                            <input id="numeroTotalPersonasPasajesAereos" type="text" value="0" required class="form-control solo__numero__montos suma_montos_pasajes_aereos" readonly placeholder='00'>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label>Nro de Días</label>
                        </div>
                        <div class="col-md-12">
                            <input id="nDiasPasajesAereos" type="text" required class="form-control suma_montos_pasajes_aereos" placeholder='00' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label>Valor Total</label>
                        </div>
                        <div class="col-md-12">
                            <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                    <span class='input-group-text'>$</span>
                                </div>
                                <input id="valorTotalPasajesAereos" type="text" required class="form-control solo__numero__montos" readonly placeholder='0.00'>
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                                 
                        <div class="col-sm-8">
                                        
                            <label>Evento</label>
                                        
                            <select id="eventoPasajesAereosJN"  class="form-control" >
                                            
                            </select>
                                    
                        </div>
					</div>
                </div>

            </div>

            <div class='modal-footer d d-flex justify-content-center row'>

                <div class='col col-12 d d-flex justify-content-center flex-wrap'>

                    <a id='guardarDatosPasajesAereos' type='button' class='btn btn-primary' data-bs-dismiss='modal'>Guardar</a>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                </div>

                <div class='col col-1 reload__Enviosrealizados text-center'></div>

            </div>

    </div>
    </form>

</div>

</div>

<script>
    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
    $("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));
    var anoIngreso = <?php echo $json_variable; ?>;
    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/datatablets.js", function() {

        datatabletsDesarollo($("#paidPasajesAereos"), "paidPasajesAereos");

    });
    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js", function() {

        AsignarIdRubroJN("obtener_idRubro_JN", $("#identificador").val());
        AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

    });
</script>