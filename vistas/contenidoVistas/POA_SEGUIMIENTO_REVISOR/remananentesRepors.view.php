<div class="content-wrapper d d-flex flex-column align-items-center">

    <div id="resumen" class="table-responsive">
        <table class="table table-hover" id="tablaResumenRemanente__2"  name="tablaResumenRemanente__2">
            <thead>
                <th class="bg-warning">Jurisdicción</th>
                <th class="bg-warning">RUC</th>
                <th class="bg-warning">Organización Deportiva</th>
                <th class="bg-warning">Tipo de Organismo</th>
                <th class="bg-warning">Provincia</th>
                <th class="bg-warning">Cantón</th>
                <th class="bg-warning">Email</th>
                
                
                <th class="bg-warning">Representante</th>
                <th class="bg-warning">Fecha de Envio</th>
                <th class="bg-warning">Monto POA</th>
                <th class="bg-warning">Remanente POA</th>
                <th class="bg-warning">Remanente años anteriores</th>
                <th class="bg-warning">Monto a descontar</th>
                <th class="bg-warning">Formulario Remanentes</th>
                <th class="bg-warning">Estado de Cuenta</th>
            </thead>
        </table>
    </div>
        
</div>

<script>

$.getScript("layout/scripts/js/POA_SEGUIMIENTO_REVISOR/datatables.js",function(){
  
    datatabletsSeguimientoRevisorVacio($("#tablaResumenRemanente__2"),"tablaResumenRemanente__2","Reporte de Remanentes",objetos([13,14],["enlace","enlace"],['documento','documento2'],["documentos/remanentes/organismoRemanentes/","documentos/remanentes/estadosRemanentes/"],["documento","documento2"]),[$("#idOrganismoPrincipal").val(), $("#idUsuarioC").val()],false);

    

});



   
</script>