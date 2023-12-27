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
    <section class="content row d d-flex justify-content-center"></section>
    <h3 id='tituloComponenteJN' align='center'></h3>
    <h3 id='tituloJN' align='center'></h3>

    <input type="hidden" style="width:10%" id="JuegosNacionalesIDRUBRO" name="JuegosNacionalesIDComponentes">
    <input type="hidden" style="width:10%" id="JuegosNacionalesIDCOMPONENTE" name="JuegosNacionalesIDComponentes">

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


        <div class="container-fluid pt-2 px-2">
            <div class="row g-2">

                <div class="col-sm-6">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center"><i class="fas fa-file-alt" style="color: #1E3050;"></i>
                            <div class="ms-3">
                                <p class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Total Nro. Cupos <font id="numCuposTotalHAHI"></font>
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
                                        <font style="vertical-align: inherit;">Valor Total<font id="valorTotalHAHI"></font>
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

            <div class="selectHospAlimHidT" align="center">
                <select id="idSelecHopAlimHid">
                    <option value="0" selected>--Seleccione una opción--</option>
                    <option value="Hospedaje y Alimentación">Hospedaje y Alimentación</option>
                    <option value="Hidratación">Hidratación</option>
                </select>
            </div>

            <div id="selectDIDCT" class="select" align="center">
                <select id="idSelecDIDC">
                    <option value="0" selected>--Seleccione una opción--</option>
                    <option value="Deporte Individual">Deporte Individual</option>
                    <option value="Deporte en Conjunto">Deporte en Conjunto</option>
                    <option value="Deporte-Delegacion-Hosp-Alim-JA">Deporte-Delegación</option>
                </select>
            </div>

            <div id="selectDIDCTHI" class="select" align="center">
                <select id="idSelecDIDCHI">
                    <option value="0" selected>--Seleccione una opción--</option>
                    <option value="Deportes Individual">Deporte Individual</option>
                    <option value="Deportes en Conjunto">Deporte en Conjunto</option>
                    <option value="Deporte-Delegacion-Hidratacion-JA">Deporte-Delegación</option>
                </select>
            </div>
        </div>

        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divHospAlimDI", "btnNuevoHospAlimDI", "modalHospAlimDI", "paidHospAlimDI"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divHospAlimDC", "btnNuevoHospAlimDC", "modalHospAlimDC", "paidHospAlimDC"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divDeporteDelegacionHospAlimJA", "btnNuevoDeporteDelegacionHospAlimJA", "modalDeporteDelegacionHospAlimJA", "paidDeporteDelegacionHospAlimJA"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divHidratacionDI", "btnNuevoHidratacionDI", "modalHidratacionDI", "paidHidratacionDI"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divHidratacionDC", "btnNuevoHidratacionDC", "modalHidratacionDC", "paidHidratacionDC"); ?>
        <?= $componentesPaid->get_matrices_generales_paid_desarrollo("divDeporteDelegacionHidrJA", "btnNuevoDeporteDelegacionHidrJA", "modalDeporteDelegacionHidrJA", "paidDeporteDelegacionHidrJA"); ?>
    </div>
    </section>
</div>

<?= $componentesPaid->getModal_matrices_hosp_alim("modalHospAlimDI", "Hospedaje-Alimentación - Deporte Individual", 'cerrarHospAlimDI', "SelectItemHosp_Alim1", "SelectItemHosp_Alim2", "deporteHospAlimDI", "nroCuposHospAlimDI", "HospAlimDI", "diasHospAlimDI", "valorTotalHospAlimDI", "guardarHospAlimDI","eventoHospAlimDI"); ?>
<?= $componentesPaid->getModal_matrices_hosp_alimDC("modalHospAlimDC", "Hospedaje-Alimentación - Deporte en Conjunto", 'cerrarHospAlimDC', "SelectItemHosp_AlimDC1", "SelectItemHosp_AlimDC2", "deporteHospAlimDC", "nroCuposHospAlimDC", "HospAlimDC", "diasHospAlimDC", "valorTotalHospAlimDC", "guardarHospAlimDC","eventoHospAlimDC"); ?>
<?= $componentesPaid->getModal_matrices_hosp_alim_JA("modalDeporteDelegacionHospAlimJA", "Juegos Ancestrales - Hospedaje-Alimentación", 'cerrarHospAlimJA', "SelectItemHosp_AlimJA1",  "SelectItemHosp_AlimJA2 ", "deporteHospAlimJA", "nroCuposHospAlimJA", "HospAlimJA", "diasHospAlimJA", "valorTotalHospAlimJA", "guardarHospAlimJA","eventoHospAlimJA"); ?>
<?= $componentesPaid->getModal_matrices_hosp_alimHIDI("modalHidratacionDI", "Hidratación - Deporte Individual", 'cerrarHidratacionDI', "SelectItemHidratacionDI", "deporteHidratacionDI", "nroCuposHidratacionDI", "HidratacionDI", "diasHidratacionDI", "valorTotalHidratacionDI", "guardarHidratacionDI","eventoHidratacionDI"); ?>
<?= $componentesPaid->getModal_matrices_HidrDC("modalHidratacionDC", "Hidratación - Deporte en Conjunto", 'cerrarHidratacionDC', "SelectItemHidratacionDC", "deporteHidratacionDC", "nroCuposHidratacionDC", "HidratacionDC", "diasHidratacionDC", "valorTotalHidratacionDC", "guardarHidratacionDC","eventoHidratacionDC"); ?>
<?= $componentesPaid->getModal_matrices_HidrJA("modalDeporteDelegacionHidrJA", "Juegos Ancestrales - Hidratación", 'cerrarHidratacionJA', "SelectItemHidratacionJA", "deporteHidratacionJA", "nroCuposHidratacionJA", "HidratacionJA", "diasHidratacionJA", "valorTotalHidratacionJA", "guardarHidratacionJA","eventoHidratacionJA"); ?>


<script>
    $("#JuegosNacionalesIDRUBRO").val(localStorage.getItem('idrubro'));
    $("#JuegosNacionalesIDCOMPONENTE").val(localStorage.getItem('idComponente'));

    $.getScript("layout/scripts/js/PAID_DESARROLLO_JS/selector.js", function() {

        AsignarIdRubroJN("obtener_idRubro_JN", $("#identificador").val());
        AsignarMontoPlanificadosDesarrollo("obtener_valor_total_matrices_desarrollo")

    });
</script>