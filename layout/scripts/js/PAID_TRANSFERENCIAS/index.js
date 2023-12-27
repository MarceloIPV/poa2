$(document).ready(function () {

    $("#divTablaAdaptado").hide();
    
    $.getScript("layout/scripts/js/validacionesGenerales.js",function(){

        sumarNumeross(".sumar_obra_fiscalizacion","#totalValores");

    });




    $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/datatables.js",function(){

        

    });




    $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/inserciones.js",function(){

      
    });


    
    $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/eliminaciones.js",function(){
       
    });



    $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/actualizaciones.js",function(){

    });


   $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/selector.js",function(){

  

    });



    $.getScript("layout/scripts/js/PAID_TRANSFERENCIAS/metodos.js",function(){

    });
    
   
   


    

  
    
      

});


