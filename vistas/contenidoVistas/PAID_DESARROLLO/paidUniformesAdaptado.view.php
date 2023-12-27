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

    <section class="content row d d-flex justify-content-center"></section>
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

        <div class="container-fluid pt-2 px-2" id="iddivUniformes" value="Uniformes">
            <div class="row g-2 justify-content-center align-items-center">
                <div class="col-sm-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                            <div class="ms-3">
                                <p class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Total Delegaciones<font id="numTotalDelegaciones"></font>
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                            <div class="ms-3">
                                <p class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Valor Total<font id="valorTotalDelegaciones"></font>
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-2 px-2" id="iddivIndumentariaPApoyo" value="Indumentaria Personal Apoyo">
            <div class="row g-2 justify-content-center align-items-center">
                <div class="col-sm-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center"><i class="fas fa-user" style="color: #057f46;"></i>
                            <div class="ms-3">
                                <p class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Total Personal Apoyo<font id="numTotalPApoyo"></font>
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center"><i class="fas fa-dollar-sign" style="color: #057f46;"></i>
                            <div class="ms-3">
                                <p class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Valor Total<font id="valorTotalPApoyo"></font>
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d d-flex flex-column align-items-center">
            <center>
                <h3>Seleccione una opción de Juegos Nacionales</h3>
            </center>

            <div class="divUniformesAdaptadosTotal" align="center">
                <select id="idSelecUnifAdaptados">
                    <option value="0" selected>--Seleccione una opción--</option>
                    <option value="Uniformes">Uniformes</option>
                    <option value="Indumentaria Personal Apoyo">Indumentaria Personal Apoyo</option>
                </select>
            </div>
        </div>

        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divUniformes", "btnNuevoUniformes", "modalUniformes", "paidUniformes"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divIndumentariaPApoyo", "btnNuevoIndumentariaPApoyo", "modalIndumentariaPApoyo", "paidIndumentariaPApoyo"); ?>
        </section>
    </div>

    <?= $componentesPaid->getModal_matrices_uniformes("modalUniformes", "Uniformes", "cerrarUniformes", "itemUniformes", "deporteUniformes", "delegacionesUniformes", "vUnitarioUniformes", "valorTotalUniformes", "guardarUniformes","eventoUniformes"); ?>
    <?= $componentesPaid->getModal_matrices_indumentaria_p_apoyo("modalIndumentariaPApoyo", "Indumentaria Personal Apoyo", "cerrarIndumentariaPApoyo", "itemIndumentariaPApoyo", "deporteIndumentariaPApoyo", "pApoyoIndumentariaPApoyo", "vUnitarioIndumentariaPApoyo", "valorTotalIndumentariaPApoyo", "guardarIndumentariaPApoyo","eventoIndumentaria"); ?>

    <script>
        $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
        $("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));
        var anoIngreso = <?php echo $json_variable; ?>;
        $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js", function() {

            AsignarIdRubroJN("obtener_idRubro_JN", $("#identificador").val());
            AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

        });
    </script>