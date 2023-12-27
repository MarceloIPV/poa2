
<?php $objetoInformacion= new usuarioAcciones();?>

<?php $informacionObjeto=$objetoInformacion->getInformacionCompletaOrganismoDeportivo();?>


<form id="formulario__remanentes" style="width: 100%!important;" class="d d-flex flex-column align-items-center"  action='modelosBd/pdf/pdf.modelo.php' method='post'>

    <input type='hidden' class='tipoPdf' id='tipoPdf' name='tipoPdf' value='remanentes__organismos__2'/>

    <input type='hidden' class='tipoPdf' id='idOrganismo' name='idOrganismo' value='<?=$informacionObjeto[0][idOrganismo]?>'/>

    <button type="submit" class="btn btn-info" id="generadorPdfRemanentes">
       Generar pdf
    </button>

    </brs>

    <div class="content-wrapper d d-flex flex-column align-items-center">

        <div id="resumen" class="table-responsive">
            <table class="table table-hover" id="tablaResumenRemanente"  name="tablaResumenRemanente">
                <thead>
                    <th class="bg-warning">RUC</th>
                    <th class="bg-warning">Organismo Deportivo</th>
                    <th class="bg-warning">Email</th>
                    <th class="bg-warning">Teléfonos</th>
                    <th class="bg-warning">Tipo de Organismo</th>
                    <th class="bg-warning">Representante</th>
                    <th class="bg-warning">Fecha de Envio</th>
                    <th class="bg-warning">Monto POA</th>
                    <th class="bg-warning">Remanente POA</th>
                    <th class="bg-warning">Remanente años anteriores</th>
                    <th class="bg-warning">Monto a descontar</th>
                    <th class="bg-warning">Documento</th>
                </thead>
            </table>
        </div>
            
    </div>

</form>