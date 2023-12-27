$(document).ready(function () {

    $(".oculto__calificaciones__infraestructura").hide();

    
    $.getScript("layout/scripts/js/validacionBasica.js",function(){

        


    });




    $.getScript("layout/scripts/js/PAID_REVISOR_JS/datatablets.js",function(){

        
        
        agregarDatatablets($("#idIndicadoresGenera__tablets"),$(".paidIndicadores__revisor"),"paidIndicadores__revisor");
        agregarDatatablets($("#idPaidGenera__tablets"),$(".paidGeneral__revisor"),"paidGeneral__revisor");
        agregarDatatablets($("#idVinculacionGenera__tablets"),$(".paidEventos__revisor"),"paidEventos__revisor");
        agregarDatatablets($("#idInterdisciplinarioGenera__tablets"),$(".paidInterdiciplinarios__revisor"),"paidInterdiciplinarios__revisor");
        agregarDatatablets($("#idIndividualesGenera__tablets"),$(".paidIndividuales__revisor"),"paidIndividuales__revisor");
        agregarDatatablets($("#idVinculacionGenera__generales__tablets"),$(".paidNecesidadesGenerales__revisor"),"paidNecesidadesGenerales__revisor");
       
        agregarDatatablets($("#idEncuentroActivoMedallas__tablets"),$(".paidEncuentroMedallas__revisor"),"paidEncuentroMedallas__revisor");
        agregarDatatablets($("#idEncuentroActivoGenera__tablets"),$(".paidEncuentroAc__revisor"),"paidEncuentroAc__revisor");
        agregarDatatablets($("#idEncuentroActivoHospAli__tablets"),$(".paidEncuentroHospAli__revisor"),"paidEncuentroHospAli__revisor");
        agregarDatatablets($("#idEncuentroActivoMatricesAux__tablets"),$(".paidEncuentroMatricesAux__revisor"),"paidEncuentroMatricesAux__revisor");
        agregarDatatablets($("#idEncuentroActivoPersonalTecnico__tablets"),$(".paidEncuentroPersonalTecnico__revisor"),"paidEncuentroPersonalTecnico__revisor");
        agregarDatatablets($("#idEncuentroActivoBonoDeportivo__tablets"),$(".paidEncuentroBonoDeportivo__revisor"),"paidEncuentroBonoDeportivo__revisor");
        agregarDatatablets($("#idEncuentroActivoUniformes__tablets"),$(".paidEncuentroUniformes__revisor"),"paidEncuentroUniformes__revisor");
        agregarDatatablets($("#idEncuentroActivoSeguros__tablets"),$(".paidEncuentroSeguros__revisor"),"paidEncuentroSeguros__revisor");
        agregarDatatablets($("#idEncuentroActivoTransporte__tablets"),$(".paidEncuentroTransporte__revisor"),"paidEncuentroTransporte__revisor");
        agregarDatatablets($("#idEncuentroActivoPasajesAereos__tablets"),$(".paidEncuentroPasajesAereos__revisor"),"paidEncuentroPasajesAereos__revisor");
        
        
        agregarDatatabletsObjetosPaid($("#matrizEjecucionObra__tablets"),$("#paidEjecucionObraInfraestructura__revisor"),"paidEjecucionObraInfraestructura__revisor");
        agregarDatatabletsObjetosPaid2($("#matrizFiscalizacion__tablets"),$("#paidFiscalizacionInfraestructura__revisor"),"paidFiscalizacionInfraestructura__revisor");
        
    });




    $.getScript("layout/scripts/js/PAID_REVISOR_JS/inserciones.js",function(){

      

    });


    
    $.getScript("layout/scripts/js/PAID_REVISOR_JS/eliminaciones.js",function(){
        
        
    });



    $.getScript("layout/scripts/js/PAID_REVISOR_JS/actualizaciones.js",function(){
        
     

    });




   $.getScript("layout/scripts/js/PAID_REVISOR_JS/selector.js",function(){

   
        
    });



    $.getScript("layout/scripts/js/PAID_REVISOR_JS/metodos.js",function(){

        checkObligacionesOrganismo("#cerrarObligacionesOD");
        checkObligacionesMinisterio("#cerrarObligacionesM");
        

        MostrarModalObligaciones("#obligacionesMD","#modalObligacionesMinisterio")
        MostrarModalObligaciones("#obligacionesOD","#modalObligacionesOrganismo")
        
    });

  
    
});
