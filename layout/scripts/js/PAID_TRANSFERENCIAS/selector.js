var agregarDatatablets__paid__administrativo__2023=function(parametro1,parametro3,parametro5,objetos,classBtnEditar,classBtnEliminar){
  
    $(parametro1).click(function (e){

        $("#"+parametro3).DataTable().destroy();

        datatabletsSeguimientoPaidAdminstradorVacio($("#"+parametro3),parametro3,parametro5,objetos,[$("#idOrganismo").val(),$("#trimestreN").val(),parametro5],false);

        funcion__editar_tabla_paid_administrador("#"+parametro3+" tbody",classBtnEditar,$("#"+parametro3));
        funcion__eliminar_tabla_paid_administrador("#"+parametro3+" tbody",classBtnEliminar, $("#"+parametro3),classBtnEliminar);
    });

}

var AsignarMontoPAIDInfraestructura = function (tipo) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("idComponente", $("#JuegosNacionalesIDCOMPONENTE").val());
    paqueteDeDatos.append("idRubro", $("#JuegosNacionalesIDRUBRO").val()); 

    $.ajax({
        
        type:"POST",
        url:"modelosBd/PAID_INFRAESTRUCTURA/selector.md.php",
        contentType: false,
        data:paqueteDeDatos,
        processData: false,
        cache: false, 
        async: false,
        success:function(response){

            let elementos=JSON.parse(response);

            let informacion=elementos['indicadorInformacion'];

            for (z of informacion) {

            

                if(z.TotalPlanificado==null){
                    $("#MontoAsignadoInfraestructura").text("$ 0");
                    $("#MontoAsignadoInfraestructura").attr("valor",0);
    
                    
    
                    var val = parseFloat( $("#MontoJN").attr("valor"));
    
                    var sum = 0;
    
                    var res = val - sum;
    
                   
    
                    $("#MontoPorAsignarInfraestructura").attr("valor", res.toFixed(2));
    
                    $("#MontoPorAsignarInfraestructura").text("$ " + res.toLocaleString());
    
    
                }else{
    
                    let num=parseFloat(z.TotalPlanificado)
    
                    $("#MontoAsignadoInfraestructura").text("$ "+num.toLocaleString());
                    $("#MontoAsignadoInfraestructura").attr("valor",z.TotalPlanificado);
    
                    var val = parseFloat(z.montos);
    
                    var res = val - z.TotalPlanificado;
    
                    $("#MontoPorAsignarInfraestructura").attr("valor", res.toFixed(2));
    
                    $("#MontoPorAsignarInfraestructura").text("$ " + res.toLocaleString());
                    
    
                }
            }
            
            


        

        },
        error:function(){

        }
                
    });	

    

}

var agregarInformacion_Informes_PAID_Infraestructura=function(boton){
  
    $(boton).click(function (e){

              e.preventDefault();
        
              var paqueteDeDatos = new FormData();
        
              paqueteDeDatos.append('tipo','obtenerInformacionODPAIDInfraestructura');
        
            
            $.ajax({
        
                type:"POST",
                url:"modelosBd/PAID_INFRAESTRUCTURA/selector.md.php",
                contentType: false,
                data:paqueteDeDatos,
                processData: false,
                cache: false, 
                success:function(response){
        
                    let elementos=JSON.parse(response);
        
                    let informacion=elementos['indicadorInformacion'];
                    
                    for (w of informacion) {
        
                        $(".nombre__organizacion__deportivas").text(w.nombreOrganismo);
                        $("#nombre__organizacion__deportivas").val(w.nombreOrganismo);

                        $(".ruc__organizacion__deportivas").text(w.ruc);
                        $("#ruc__organizacion__deportivas").val(w.ruc);

                        $(".acuerdo__ministerial__organizacion__deportivas").text(w.numeroDeAcuerdo + ' ' + w.fechaDeAcuerdoMinisterial);
                        $("#acuerdo__ministerial__organizacion__deportivas").val(w.numeroDeAcuerdo + ' ' + w.fechaDeAcuerdoMinisterial);

                        $(".presidente__organizacion__deportivas").text(w.presidente);
                        $("#presidente__organizacion__deportivas").val(w.presidente);

                        $(".direccion__organizacion__deportivas").text(w.direccion);
                        $("#direccion__organizacion__deportivas").val(w.direccion);
        
                        $(".correo__organizacion__deportivas").text(w.correo);
                        $("#correo__organizacion__deportivas").val(w.correo);
        
        
                    }
        
                
        
                },
                error:function(){
        
                }
                        
            });	  	
        
          
    });

}


var AsignarMontoPlanificadosGENERALTOTALInfraestructura = function (tipo,valoren0, identificador, valorPlanificado,valorporPlanificar) {

    let paqueteDeDatos = new FormData();

    paqueteDeDatos.append("tipo", tipo);
    paqueteDeDatos.append("identificador", identificador);

    $.ajax({
        
        type:"POST",
        url:"modelosBd/PAID_INFRAESTRUCTURA/selector.md.php",
        contentType: false,
        data:paqueteDeDatos,
        processData: false,
        cache: false, 
        async: false,
        success:function(response){

            let elementos=JSON.parse(response);

            let informacion=elementos['indicadorInformacion'];
            
            for (z of informacion) {

           

                if(z.TotalPlanificado==null){
                   
                    $("#"+valorPlanificado).text("Monto Planificado $ 0");
                    $("#"+valorPlanificado).attr("valor",0);
    
                    var val = ($("#montoPaidGeneralDesarrollo").attr("valor"));
    
                    var sum = 0;
    
                    var res = val - sum;
    
                    $("#"+valorporPlanificar).attr("valor", res.toFixed(2));
    
                    $("#"+valorporPlanificar).text("Monto Por Planificar $ " + res.toLocaleString());
    
                   
                }else{
    
                  
    
                    var totalPlanificado = parseFloat(z.TotalPlanificado);
    
                    $("#"+valorPlanificado).text("Monto Planificado $ "+totalPlanificado.toLocaleString());
                    $("#"+valorPlanificado).attr("valor",totalPlanificado.toFixed(2));
                    
                    var val = ($("#montoPaidGeneralDesarrollo").attr("valor"));
    
                    var res = val - z.TotalPlanificado;
    
                    $("#"+valorporPlanificar).attr("valor", res.toFixed(2));
    
                    $("#"+valorporPlanificar).text("Monto Por Planificar $ " + res.toLocaleString());
    
    
                }
            }

        

        },
        error:function(){

        }
                
    });	 

   


}



