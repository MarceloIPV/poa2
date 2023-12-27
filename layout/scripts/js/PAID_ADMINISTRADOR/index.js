$(document).ready(function () {


    
    $.getScript("layout/scripts/js/validacionBasica.js",function(){

          
      
    });




    $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/datatables.js",function(){

        

    });




    $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/inserciones.js",function(){

       
    });


    
    $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/eliminaciones.js",function(){
        
        
    });



    $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/actualizaciones.js",function(){

        funcion__editar__paid__administrador($("#editaTipoInfraestructuraPaid"),"editarTipoInfraestructura","#inputTipoInfra");
        funcion__editar__paid__administrador($("#editaEstadoPropiedad"),"editarEstadoPropiedad","#inputEstadoPropiedad");

    });


   $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/selector.js",function(){

        agregarDatatablets__paid__administrativo__2023($("#verTipoInfraestructura"),"tablatipoInfraestructura__paid","Reporte Tipo Infraestructura",objetos([1,2],["boton","boton"],["<center><a class='editarTipoInfraPaid estilo__botonDatatablets btn btn-info pointer__botones'data-bs-toggle='modal' data-bs-target='#tipoInfraestructuraEdita' ><i class='fas fa-user-edit'></i></a><center>","<center><a class='eliminarTipoInfraestructura estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>"],[false],[false]),"editarTipoInfraPaid","eliminarTipoInfraestructura"); 

        agregarDatatablets__paid__administrativo__2023($("#verEstPropiedad"),"tablaEstadoPropiedad","Reporte Estado Propiedad",objetos([1,2],["boton","boton"],["<center><a class='editarEstadoPropiedad estilo__botonDatatablets btn btn-info pointer__botones'data-bs-toggle='modal' data-bs-target='#estadoPropiedadEdita' ><i class='fas fa-user-edit'></i></a><center>","<center><a class='eliminarEstadoPropiedadPaid estilo__botonDatatablets btn btn-danger pointer__botones'><i class='fas fa-trash'></i></a><center>"],[false],[false]),"editarEstadoPropiedad","eliminarEstadoPropiedadPaid"); 

    });



    $.getScript("layout/scripts/js/PAID_ADMINISTRADOR/metodos.js",function(){

        segmentosJsPaidInfraestructura($("#agregarTipoIntervencion"),$(".deporteContent"),["input"],["Ingrese Tipo de Infraestructura"],10,"tipoInfraestructura",".contenedorDeporteTabla");

        segmentosJsPaidInfraestructura($("#agregarEstPropiedad"),$(".modalidadContent"),["input"],["Ingrese Estado de Propiedad"],10,"tipoEstadoPropiedad",".contenedorModalidadTabla");

        ocultarVariables($("#verTipoInfraestructura"),$(".conjunto__validas"),$(".contenedorDeporteTabla"));
        ocultarVariables($("#verEstPropiedad"),$(".conjunto__validas"),$(".contenedorModalidadTabla"));

        recargarTablaOnBtn($("#btnCerrarTipoInfraestructura"),$("#tablatipoInfraestructura__paid"));
        recargarTablaOnBtn($("#btnCerrarEstadoPropiedad"),$("#tablaEstadoPropiedad"));

        recargarTablaOnBtn($("#verItemsRubros"),$("#tablaItemsRubros"));


        funcion__habilitar__memo__datable("#asignarPresupuesto__paid tbody",$("#asignarPresupuesto__paid"))
        
    });
    

   


    

  
    
      

});


